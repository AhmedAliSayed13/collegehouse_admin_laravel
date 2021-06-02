<?php

namespace App\DataTables;


use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class UsersDataTable extends DataTable
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
            ->addColumn('edit', 'admin.brands.btn.edit')
            ->addColumn('delete', 'admin.brands.btn.delete')
            ->addColumn('img', 'admin.brands.btn.img')
            ->rawColumns(['parent_id','img','edit','delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\BrandDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::query();
    }
    public static function lang()
    {
        return [];
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
                'lengthMenu'=>[[10,20,50,100,-1],[10,20,50,100,trans('admin.TextAll')]],
                'buttons'      => [
                    ['extend'=>'print','className'=>'btn btn-primary ','text'=>'<i class="fas fa-print"></i> '.'Print'],
                    ['extend'=>'export','className'=>' btn btn-primary ','text'=>'<i class="fas fa-download"></i> '.'Export'],
                    ['extend'=>'reset','className'=>' btn btn-primary ','text'=>'<i class="fas fa-redo-alt"></i> '.'Reset'],
                    ['extend'=>'reload','className'=>' btn btn-primary ','text'=>'<i class="fas fa-sync-alt"></i> '.'Reload'],
                    ['className'=>' btn btn-primary ','text'=>'<i class="fas fa-plus-circle"></i>'.'Create','action'=>"function(){
                                window.location.href='/admin/brand/create';}"],
                ],
                'initComplete'=> "function () {
                        this.api().columns([1,2,4]).every(function () {
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
                'name'=>'first_name',
                'data'=>'first_name',
                'title'=>"first_name",
               
            ],
            [
                'name'=>'last_name',
                'data'=>'last_name',
                'title'=>'last_name'
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
        return 'users_' . date('YmdHis');
    }
}
