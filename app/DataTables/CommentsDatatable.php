<?php

namespace App\DataTables;

use App\Comment;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CommentsDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
      return datatables($query)
      ->addColumn('delete', 'admin.comments.btn.delete')
      ->rawColumns([
      'delete',
      ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Comment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
     public function query()
     {
         return Comment::query();
     }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
      return $this->builder()
        ->columns($this->getColumns())
        ->minifiedAjax()
        // ->addAction(['width' => '80px'])
        // ->parameters($this->getBuilderParameters());
        ->parameters([
          'dom'        => 'Blfrtip',
          'buttons'    => [
            [
        'text' => '<i class="fa fa-plus"></i> '.trans('users.create_comment'), 'className' => 'btn btn-info', "action" => "function(){
          window.location.href = '".\URL::current()."/create';
        }"],
            ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
          ],

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
          'name'  => 'id',
          'data'  => 'id',
          'title' => '#',
        ], [
          'name'  => 'post_id',
          'data'  => 'post_id',
          'title' => 'post_id',
        ], [
          'name'  => 'body',
          'data'  => 'body',
          'title' => 'body',
        ], [
          'name'  => 'user_id',
          'data'  => 'user_id',
          'title' => 'user_id',
        ],[
          'name'  => 'created_at',
          'data'  => 'created_at',
          'title' => 'created_at',
        ], [
          'name'  => 'updated_at',
          'data'  => 'updated_at',
          'title' => 'updated_at',
        ], [
          'name'       => 'delete',
          'data'       => 'delete',
          'title'      => 'Delete',
          'exportable' => false,
          'printable'  => false,
          'orderable'  => false,
          'searchable' => false,
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
        return 'commentsdatatable_' . time();
    }
}
