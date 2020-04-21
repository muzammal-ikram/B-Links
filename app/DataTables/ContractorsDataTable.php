<?php

namespace App\DataTables;

use App\Contractor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon\Carbon;

class ContractorsDataTable extends DataTable
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
        ->addColumn('action', function($con) {
            return view('_partials.contractor_datatable',['con'=>$con]);
        })
        ->addColumn('seller_name', function ($contractor) {
            return view('_partials.contractor_title',compact('contractor'));
        })
        ->addColumn('buyer_name', function ($contractor) {
            return view('_partials.contractor_buyer',compact('contractor'));
        })
        ->addColumn('lc_opener_name', function ($contractor) {
            return view('_partials.contractor_opener',compact('contractor'));
        })
        ->addColumn('comm_deadline', function($con) {
            return $con->comm_deadline ? $con->comm_deadline->format('M-d-Y') : Null;
        })
        ->addColumn('date', function($con) {
            return $con->date ? $con->date->format('M-d-Y') : Null;
        })
        ->addColumn('etd', function($con) {
            return $con->etd ? $con->etd->format('M-d-Y') : Null;
        })
        ->addColumn('eta', function($con) {
            return $con->eta ? $con->eta->format('M-d-Y') : Null;
        })
        ->addColumn('status', function($con) {

            $nowDate        =  Carbon::now();
            $last7Days      = $con->comm_deadline->subDays(7);
            $comm_deadline  = $con->comm_deadline;
            if($nowDate >= $last7Days && $nowDate <= $comm_deadline){
                return "last 7 days";
            }else if($nowDate > $comm_deadline){
                return "Completed";
            }else{
                return "Pending";
            }
        })
        ->setRowAttr([
            'style' => function($con){
                if(Carbon::now()->addDays(1)->isSameDay($con->comm_dd)){
                    return 'background-color: #ff0000;';
                }elseif(Carbon::now() < $con->comm_dd){
                    return 'background-color: yellow;';
                }else{
                    // return "greater";
                }
            }
        ])
        ->rawColumns(['action', 'status', 'comm_deadline', 'date', 'etd', 'eta']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Contractor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contractor $model)
    {
        return $model->orderBy('id', 'desc')->newQuery();
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
            'Id'=> [
                'data'=>'id'
            ],
            'Date'=>[
                'data'=>'date'
            ],
            'Contract #'=>[
                'data'=> 'contractor_number'
            ],
            'Item'=>[
                'data' => 'item'
            ],

            'Seller'=>[
                'data' => 'seller_name',
            ],
            'Buyer'=>[
                'data' => 'buyer_name'
            ],
            'Lc Opener'=>[
                'data' => 'lc_opener_name'
            ],
            'Commission Due'=>[
                'data'=>'comm_deadline'
            ],
            'Status'=>[
                'data'=>'status'
            ],
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
        return 'Contractors_' . date('YmdHis');
    }
}
