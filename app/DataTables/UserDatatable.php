<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;

class UserDatatable extends DataTable
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
        ->addColumn('edit', 'admin.users.btn.edit')
	      ->addColumn('delete', 'admin.users.btn.delete')
			  ->rawColumns([
				'edit',
				'delete',
			]);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::query();
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
        						'text' => '<i class="fa fa-plus"></i> '.trans('admin.create_user'), 'className' => 'btn btn-info', "action" => "function(){
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
				'name'  => 'name',
				'data'  => 'name',
				'title' => 'name',
			],
       [
				'name'  => 'email',
				'data'  => 'email',
				'title' => 'email',
			], [
				'name'  => 'created_at',
				'data'  => 'created_at',
				'title' => 'created_at',
			], [
				'name'  => 'updated_at',
				'data'  => 'updated_at',
				'title' => 'updated_at',
			], [
				'name'  => 'edit',
				'data'  => 'edit',
				'title' => 'Edit',
        'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
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
        return 'User_' . date('YmdHis');
    }
}
