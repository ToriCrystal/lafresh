<?php

namespace App\Admin\DataTables\BonusSale;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\BonusSale\BonusSaleRepositoryInterface;
use App\Admin\Traits\GetConfig;

class BonusSaleDataTable extends BaseDataTable
{

    use GetConfig;
    /**
     * Available button actions. When calling an action, the value will be used
     * as the function name (so it should be available)
     * If you want to add or disable an action, overload and modify this property.
     *
     * @var array
     */
    // protected array $actions = ['pageLength', 'excel', 'reset', 'reload'];
    protected array $actions = ['reset', 'reload'];

    public function __construct(
        BonusSaleRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.bonus_sale.datatable.action',
            'edit_link' => 'admin.bonus_sale.datatable.edit-link',
            'user' => 'admin.bonus_sale.datatable.user',
        ];
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $this->instanceDataTable = datatables()->eloquent($query);
        $this->editColumnUserId();
        $this->editColumnReward();
        $this->filterColumnUserId();
        $this->editColumnMonth();
        $this->addColumnAction();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        // return $this->repository->getQueryBuilderWithRelations(['reward' => 0], '>', ['user']);
        return $this->repository->getQueryBuilderWithRelations([], '', ['user']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('bonusSaleTable')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(0)
        ->selectStyleSingle();

        $this->htmlParameters();

        return $this->instanceHtml;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function setCustomColumns(){
        $this->customColumns = $this->traitGetConfigDatatableColumns('bonus_sale');
    }

    protected function filename(): string
    {
        return 'bonus_sale' . date('YmdHis');
    }

    protected function filterColumnUserId(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('user_id', function($query, $keyword) {

            $query->whereHas('user', function($query) use ($keyword){
                return $query->where('fullname', 'like', "%{$keyword}%");
            });
        });
    }

    protected function editColumnUserId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('user_id', $this->view['edit_link']);
    }  
    protected function editColumnReward(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('reward', '{{ format_price($reward) }}');
    }
    protected function editColumnMonth(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('month', '{{ date("n", strtotime($month)) }}');
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['id', 'user_id', 'user', 'action']);
    }
    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#bonusSaleTable');

            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
    }
}