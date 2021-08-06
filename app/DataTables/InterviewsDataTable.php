<?php

namespace App\DataTables;


use App\Models\Meeting;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class InterviewsDataTable extends DataTable
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
            ->addColumn('edit', 'admin.interviews.btn.edit')
            // ->addColumn('delete', 'admin.interviews.btn.delete')
            ->addColumn('url', 'admin.interviews.btn.url')
            ->addColumn('email', function ($meeting) {
                if(!empty($meeting->application_id)){
                    return $meeting->application->email;
                }
                return 'no Type';
            })
            ->addColumn('group_lead', function ($meeting) {
                if(!empty($meeting->application_id)){
                    return $meeting->application->group_lead_name;
                }
                return 'no Type';
            })
            ->addColumn('application_status', function ($meeting) {
                if(!empty($meeting->application_id)){
                    return $meeting->application->application_case->name;
                }
                return 'no Type';
            })
            ->addColumn('interview_status', function ($meeting) {
                if(!empty($meeting->meeting_case_id )){
                    return $meeting->meeting_case->name;
                }
                return 'no Type';
            })
            ->rawColumns(['interview_status','application_status','group_lead','email','url','edit','delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\InterviewDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       // return Interview::query()->where('id',1);
       return Meeting::query();
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
                    
                ],
                'initComplete'=> "function () {
                        this.api().columns([]).every(function () {
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
                'name'=>'email',
                'data'=>'email',
                'title'=>'email'
            ],
            [
                'name'=>'group_lead',
                'data'=>'group_lead',
                'title'=>'Group Lead'
            ],
            [
                'name'=>'application_status',
                'data'=>'application_status',
                'title'=>'Application Status'
            ],
            [
                'name'=>'interview_status',
                'data'=>'interview_status',
                'title'=>'Interview Status'
            ],
            [
                'name'=>'url',
                'data'=>'url',
                'title'=>'URL Meeting',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
            [
                'name'=>'meeting_date',
                'data'=>'meeting_date',
                'title'=>'Interview Date',
               
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
            // [
            //     'name'=>'delete',
            //     'data'=>'delete',
            //     'title'=>'Delete',
            //     'exportable'=>false,
            //     'printable'=>false,
            //     'orderable'=>false,
            //     'searchable'=>false,
            // ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'interviews_' . date('YmdHis');
    }
}
