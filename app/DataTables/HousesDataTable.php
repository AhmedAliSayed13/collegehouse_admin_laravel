<?php

namespace App\DataTables;


use App\Models\House;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class HousesDataTable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.houses.btn.edit')
            ->addColumn('delete', 'admin.houses.btn.delete')
            ->addColumn('house_type_id', function ($house) {
                if(!empty($house->house_type)){
                    return $house->house_type->name;
                }
                return 'no Type';
            })
            ->addColumn('owner_id', function ($house) {
                if(!empty($house->owner)){
                    return $house->owner->first_name .' '.$house->owner->last_name ;
                }
                return 'no Owner';
            })
            ->addColumn('house_status_id', function ($house) {
                if(!empty($house->house_state)){
                    return $house->house_state->name;
                }
                return 'no Value';
            })
            ->rawColumns(['house_type_id','owner_id','house_status_id','edit','delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\HouseDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       // return House::query()->where('id',1);
       return House::query();
    }
    public static function lang()
    {
        $language=[];
        
        return $language;
    }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('storedatatable-table')
            ->columns($this->getColumns())

            ->minifiedAjax()
            ->orderBy(1)
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu'=>[[10,20,50,100,-1],[10,20,50,100,trans('All Record')]],
                'buttons'      => [
                    ['extend'=>'print','className'=>'btn btn-primary ','text'=>'<i class="fa fa-print"></i> '.'Print'],
                    ['extend'=>'export','className'=>' btn btn-primary ','text'=>'<i class="fa fa-download"></i> '.'Export'],
                    ['extend'=>'reset','className'=>' btn btn-primary ','text'=>'<i class="fa fa-redo-alt"></i> '.'Reset'],
                    ['extend'=>'reload','className'=>' btn btn-primary ','text'=>'<i class="fa fa-sync-alt"></i> '.'Reload'],
                    ['className'=>' btn btn-primary ','text'=>'<i class="fa fa-plus-circle"></i>'.'Create','action'=>"function(){
                                window.location.href='/admin/house/create';}"],
                ],
                'initComplete'=> "function () {
                        this.api().columns([0,1,2,3,4,5]).every(function () {
                            var column = this;
                            var input = document.createElement(\"input\");
                            $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                        });
                    }",
                'language'=>self::lang(),
            ]);

    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
            ],
            [
                'name'=>'owner_id',
                'data'=>'owner_id',
                'title'=>'Owner'
            ],
            [
                'name'=>'name',
                'data'=>'name',
                'title'=>'Name'
            ],
            [
                'name'=>'address',
                'data'=>'address',
                'title'=>'Address'
            ],
            [
                'name'=>'house_status_id',
                'data'=>'house_status_id',
                'title'=>'House Status'
            ],
            
            [
                'name'=>'house_type_id',
                'data'=>'house_type_id',
                'title'=>'House Type'
            ],
            [
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=>'Date'
            ],
            [
                'name'=>'edit',
                'data'=>'edit',
                'title'=>'Edit',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
            [
                'name'=>'delete',
                'data'=>'delete',
                'title'=>'Delete',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'houses_' . date('YmdHis');
    }
}
