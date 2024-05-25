<?php

namespace App\Admin\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;

abstract class BaseDataTable extends DataTable
{
    protected $repository;
    /**
     * Mảng chứa đường dẫn tới views
     *
     * @var array
     */
    protected $view;
    /**
     * Current Object instance
     *
     * @var object|array|mixed
     */
    protected $instanceDataTable;
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    protected $instanceHtml;
    /**
     * make columns
     *
     * @var array
     */
    protected $buildColumns = [];
    /**
     * config columns
     *
     * @var array
     */
    protected $customColumns = [];
    /**
     * remove columns
     *
     * @var array
     */
    protected $removeColumns = [];
    /**
     * config search columns
     *
     * @var array
     */
    protected $parameters;
    
    public function __construct(){
        
        $this->setView();
        
        $this->setCustomColumns();
        
        $this->setParameters();
        
    }

    public function getParameters(){
        return $this->parameters ?? [
            'responsive' => true,
            'ordering' => false,
            'autoWidth' => false,
            // 'searching' => false,
            // 'searchDelay' => 350,
            // 'lengthMenu' => [ [3, 25, 50, -1], [20, 50, 100, "All"] ],
            'language' => [
                'url' => url('/public/libs/datatables/language.json')
            ]
        ];
    }

    public function getView(){
        return $this->view ?? [];
    }

    public function setParameters(){
        return $this->parameters = $this->getParameters();
    }

    public function setView(){
        $this->view = $this->getView();
    }

    protected function getColumns()
    {
        $this->exportVisiableColumns();

        foreach($this->customColumns as $key => $items){
            if(!in_array($key, $this->removeColumns)){

                $buildColumn = Column::make($key);
                foreach($items as $key => $item){
                    if($key == 'title'){
                        $buildColumn = $buildColumn->$key(__($item));
                    }else{
                        $buildColumn = $buildColumn->$key($item);
                    }
                }
                array_push($this->buildColumns, $buildColumn);
            }
        }
        return $this->buildColumns;

    }
    protected function exportVisiableColumns(){
        if ($this->request && in_array($this->request->get('action'), ['excel', 'csv'])) {
            if ($this->request->get('visible_columns')) {
                foreach ($this->customColumns as $key => $item) {
                    if (!in_array($key, $this->request->get('visible_columns'))) {
                        $this->customColumns[$key]['exportable'] = false;
                    }
                }
            }
        }
    }
    abstract protected function setCustomColumns();
}