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
        return \Datatables::eloquent($query)
        ->addColumn('action', function($user) {
            return view('_partials.user_datatable',['user'=>$user]);
        })
        ->addColumn('is_admin', function($user) {
            if($user->is_admin == 0) return "Assistant";
            return "Admin";
        })
        ->addColumn('created_at', function ($user) {
                $created_at = $user->created_at->format('M-d-Y');
            return $created_at;
        })
        ->rawColumns(['action' , 'created_at', 'is_admin']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    { 
        $users = User::where('id', '!=', auth()->user()->id);
        return $users;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
            ->parameters([ 'buttons' => ['excel'] ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',
            'email',
            'user_type' => [ 
                'data'=>'is_admin'
            ],
            'created_at',
            'action'
        ];
        
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
