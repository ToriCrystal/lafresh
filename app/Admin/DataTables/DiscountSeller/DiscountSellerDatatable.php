<?php

namespace App\Admin\DataTables\DiscountSeller;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\DiscountSeller\DiscountSellerRepositoryInterface;
use App\Admin\Traits\GetConfig;

class DiscountSellerDatatable extends BaseDataTable
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
        DiscountSellerRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.discount.datatable.action',
            'feature_image' => 'admin.discount.datatable.feature-image',
            'editlink' => 'admin.discount.datatable.editlink',
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
        $this->editColumnProductId();
        $this->filterColumnProductId();
        $this->editColumnImage();
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
        return $this->repository->getQueryBuilderWithRelations(['product']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('discountSellerTable')
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
        $this->customColumns = $this->traitGetConfigDatatableColumns('discount_seller');
    }

    protected function filename(): string
    {
        return 'Posts_' . date('YmdHis');
    }
    protected function filterColumnProductId(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('product_id', function($query, $keyword) {

            $query->whereHas('product', function($query) use ($keyword){
                return $query->where('name', 'like', "%{$keyword}%");
            });
        });
    }
    protected function editColumnImage(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('feature_image', $this->view['feature_image']);
    }
    protected function editColumnProductId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('product_id', $this->view['editlink']);
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['feature_image', 'product_id', 'status', 'action']);
    }
    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#discountSellerTable');

            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
    }
}