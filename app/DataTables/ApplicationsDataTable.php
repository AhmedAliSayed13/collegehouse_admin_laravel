<?php

namespace App\DataTables;


use App\Models\Application;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class ApplicationsDataTable extends DataTable
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
            ->addColumn('edit', 'admin.applications.btn.edit')
            ->addColumn('delete', 'admin.applications.btn.delete')
            ->rawColumns(['edit','delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ApplicationDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       // return Application::query()->where('id',1);
       return Application::query();
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
                                window.location.href='/admin/application/create';}"],
                ],
                'initComplete'=> "function () {
                        this.api().columns([0,1,2,3,4,5,6,7]).every(function () {
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
                'title'=>'First Name'
            ],
            [
                'name'=>'last_name',
                'data'=>'last_name',
                'title'=>'Last Name'
            ],
            [
                'name'=>'email',
                'data'=>'email',
                'title'=>'Email'
            ],
            [
                'name'=>'phone',
                'data'=>'phone',
                'title'=>'Phone'
            ],
            [
                'name'=>'graduation_year',
                'data'=>'graduation_year',
                'title'=>'Graduation Year'
            ],
            [
                'name'=>'gpa',
                'data'=>'gpa',
                'title'=>'GPA'
            ],
            [
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=>'Created At'
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
        return 'applications_' . date('YmdHis');
    }
}
