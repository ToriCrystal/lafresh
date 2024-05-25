<?php

namespace App\Admin\DataTables\Menu;

use App\Admin\DataTables\BaseUpgradeDataTable;
use App\Admin\Repositories\Menu\MenuRepositoryInterface;
use App\Enums\DefaultStatus;

class MenuDataTable extends BaseUpgradeDataTable
{

    protected $nameTable = 'menuTable';

    public function __construct(
        MenuRepositoryInterface $repository
    ){
        $this->repository = $repository;

        parent::__construct();
    }

    public function setView(){
        $this->view = [
            'action' => 'admin.menus.datatable.action',
            'edit_link' => 'admin.menus.datatable.edit-link',
            'status' => 'admin.menus.datatable.status'
        ];
    }

    public function setColumnSearch(){

        $this->columnAllSearch = [0, 1, 2];

        $this->columnSearchDate = [2];

        $this->columnSearchSelect = [
            [
                'column' => 1,
                'data' => DefaultStatus::asSelectArray()
            ]
        ];
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

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.menu', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'name' => $this->view['edit_link'],
            'status' => $this->view['status'],
            'created_at' => '{{ date("d-m-Y", strtotime($created_at)) }}'
        ];
    }

    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['name', 'status', 'action'];
    }
}
