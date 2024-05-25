<?php

namespace App\Admin\DataTables\User;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\User\UserLevelRepositoryInterface;
use App\Admin\Traits\GetConfig;
use App\Enums\User\UserLevelTypeDiscount;

class UserLevelDataTable extends BaseDataTable
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
        UserLevelRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.users.levels.datatable.action',
            'edit_link' => 'admin.users.levels.datatable.edit-link',
            'type_discount' => 'admin.users.levels.datatable.type-discount',
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
        $this->editColumnName();
        $this->editColumnTypeDiscount();
        $this->editColumnMinAmount();
        $this->editColumnPlainValue();
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
        return $this->repository->getQueryBuilderOrderBy();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('userLevelTable')
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
        $this->customColumns = $this->traitGetConfigDatatableColumns('user_level');
    }

    protected function filename(): string
    {
        return 'User_Level_' . date('YmdHis');
    }


    protected function editColumnName(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('name', $this->view['edit_link']);
    }
    protected function editColumnTypeDiscount(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('type_discount', function($userLevel){
            return $userLevel->type_discount->description();
        });
    }
    protected function editColumnMinAmount(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('min_amount', '{{ format_price($min_amount) }}');
    }
    protected function editColumnPlainValue(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('plain_value', function($userLevel){
            return $userLevel->type_discount == UserLevelTypeDiscount::Amount ? format_price($userLevel->plain_value) : $userLevel->plain_value.'%';
        });
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['name', 'type_discount', 'action']);
    }
    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
    }
}