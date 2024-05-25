<?php

namespace App\Admin\DataTables\Product;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Product\ProductRepositoryInterface;
use App\Admin\Traits\GetConfig;

class ProductDataTable extends BaseDataTable
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
        ProductRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.products.datatable.action',
            'edit_link' => 'admin.products.datatable.edit-link',
            'in_stock' => 'admin.products.datatable.in-stock',
            'status' => 'admin.products.datatable.status',
            'feature_image' => 'admin.products.datatable.feature-image',
            'price' => 'admin.products.datatable.price',
            'categories' => 'admin.products.datatable.categories',
            'checkbox' => 'admin.products.datatable.checkbox',
            'unit' => 'admin.products.datatable.unit'
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
        $this->filterColumnCreatedAt();
        $this->filterColumnCategories();
        $this->editColumnFeatureImage();
        $this->editColumnName();
        $this->editColumnPrice();
        $this->editColumnInStock();
        $this->editColumnStatus();
        $this->editColumnCategoreis();
        $this->editColumnCreatedAt();
        $this->editColumnUnit();
        $this->addColumnCheckbox();
        $this->addColumnAction();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderHasPermissionWithRelations();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('productTable')
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
        $this->customColumns = $this->traitGetConfigDatatableColumns('product');
    }

    protected function filename(): string
    {
        return 'products_' . date('YmdHis');
    }

    protected function filterColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('created_at', function($query, $keyword) {
            
            $query->whereDate('created_at', date('Y-m-d', strtotime($keyword)));

        });
    }
    protected function filterColumnCategories(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('categories', function($query, $keyword) {
            $keyword = explode(',', $keyword);
            $query->whereHas('categories', function($query) use ($keyword){
                $query->whereIn('id', $keyword);
            });

        });
    }
    protected function editColumnId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view['editlink']);
    }
    protected function editColumnFeatureImage(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('feature_image', $this->view['feature_image']);
    }
    protected function editColumnName(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('name', $this->view['edit_link']);
    }
    protected function editColumnInStock(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('in_stock', $this->view['in_stock']);
    }
    protected function editColumnStatus(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('status', $this->view['status']);
    }
    protected function editColumnPrice(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('price', $this->view['price']);
    }
    protected function editColumnCategoreis(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('categories', $this->view['categories']);
    }
    protected function editColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}');
    }
    protected function addColumnCheckbox(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('checkbox', $this->view['checkbox']);
    }
    protected function editColumnUnit(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('unit', $this->view['unit']);
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['checkbox', 'feature_image', 'name', 'in_stock', 'status', 'categories', 'price', 'unit', 'action']);
    }
    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#productTable');

            searchColumsDataTable(this);
        
            addSelect2();
        }";

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
    }
}