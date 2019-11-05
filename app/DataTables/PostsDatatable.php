<?php

namespace App\DataTables;

use App\Post;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PostsDatatable extends DataTable
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

      ->addColumn('edit', 'admin.posts.btn.edit')
      ->addColumn('delete', 'admin.posts.btn.delete')
      ->rawColumns([
              'edit',
              'delete',

          ]);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
     public function query()
     {
         return Post::query();
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
      'text' => '<i class="fa fa-plus"></i> '.trans('admin.create_post'), 'className' => 'btn btn-info', "action" => "function(){
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
                'name'=>'id',
                'data'=>'id',
                'title'=>'#',
            ],[
              'name'=>'title',
              'data'=>'title',
              'title'=>trans('admin.post_title'),
          ],[
            'name'=>'description',
            'data'=>'description',
            'title'=>trans('admin.post_description'),
          ],[
            'name'=>'url',
            'data'=>'url',
            'title'=>trans('admin.post_url'),
          ],[
            'name'=>'view',
            'data'=>'view',
            'title'=>trans('admin.post_view'),
          ],[
            'name'=>'user_id',
            'data'=>'user_id',
            'title'=>trans('admin.user_id'),
          ],[
            'name'=>'category_id',
            'data'=>'category_id',
            'title'=>trans('admin.category_id'),
          ],[
            'name'=>'created_at',
            'data'=>'created_at',
            'title'=>trans('admin.created_at'),
          ],[
            'name'=>'updated_at',
            'data'=>'updated_at',
            'title'=>trans('admin.updated_at'),
          ],[
                'name'=>'edit',
                'data'=>'edit',
                'title'=>trans('admin.post_edit'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],[
                'name'=>'delete',
                'data'=>'delete',
                'title'=>trans('admin.post_delete'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'admin.posts.index' . date('YmdHis');
    }

    public function anyData()
    {
        return Datatables::of(Post::query())->make(true);
    }

}
