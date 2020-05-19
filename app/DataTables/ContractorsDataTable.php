<?php

namespace App\DataTables;

use App\Contractor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon\Carbon;
use yajra\Datatables\Facades\Datatables;
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
        ->editColumn('seller_name', function ($contractor) {
            return view('_partials.contractor_title',compact('contractor'));
        })
        ->editColumn('buyer_name', function ($contractor) {
            return view('_partials.contractor_buyer',compact('contractor'));
        })
        ->editColumn('lc_opener_name', function ($contractor) {
            return view('_partials.contractor_opener',compact('contractor'));
        })
        ->editColumn('comm_deadline', function($con) {
            return $con->comm_deadline ? $con->comm_deadline->format('M-d-Y') : Null;
        })
        ->editColumn('date', function($con) {
            return $con->date ? $con->date->format('M-d-Y') : Null;
        })
        ->editColumn('etd', function($con) {
            return $con->etd ? $con->etd->format('M-d-Y') : Null;
        })
        ->editColumn('eta', function($con) {
            return $con->eta ? $con->eta->format('M-d-Y') : Null;
        })
        ->editColumn('status', function($con) {

            $nowDate        =  Carbon::now();
            $last7Days      = $con->comm_deadline->subDays(7);
            $comm_deadline  = $con->comm_deadline;
            if($nowDate >= $last7Days && $nowDate <= $comm_deadline){
                return "last 7 days";
            }else if($con->commission_status == 'Recieved'){
                return "Completed";
            }else if($nowDate > $comm_deadline){
                return "Overdue";
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
        ->setTableId('customers-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->parameters([
            'buttons' => [
                [
                    'extend' => 'pdfHtml5',
                    'text' => __('Export PDF'),
                    'orientation' => 'landscape',
                    'pageSize' => 'LEGAL',
                    'exportOptions' =>  [
                        'columns'=> [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
                    ]
                ]
            ],
            'order' => [
                0, 'desc'
            ]
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
//            'Id'=> [
//                'data'=>'id'
//            ],
            'Date'=>[
                'data'=>'date',
                'orderable' => false
            ],
            'contract #'=>[
                'data'=> 'contractor_number',
                'orderable' => false
            ],
            'Item'=>[
                'data' => 'item',
                'orderable' => false
            ],

            'Price'=>[
                'data' => 'price_per_dollar',
                'orderable' => false
            ],

            'Qty'=>[
                'data' => 'qty',
                'orderable' => false
            ],

            'Item2'=>[
                'data' => 'item_2',
                'orderable' => false
            ],

            'Item 2 Price'=>[
                'data' => 'item_2_price_per_dollar',
                'orderable' => false
            ],

            'Item 2 Qty'=>[
                'data' => 'item_2_qty',
                'orderable' => false
            ],

            'Seller'=>[
                'data' => 'seller_name',
                'orderable' => false
            ],
            'Buyer'=>[
                'data' => 'buyer_name',
                'name' => 'buyer_name',
                'orderable' => false
            ],
            'Lc Opener'=>[
                'data' => 'lc_opener_name',
                'orderable' => false
            ],
            'Comm'=>[
                'data'=>'comm_deadline',
                'orderable' => false
            ],
            'Comm Status'=>[
                'data'=>'commission_status',
                'orderable' => false
            ],
            'Cont Status'=>[
                'data'=>'status',
                'orderable' => false
            ],
            'action' =>[
            'orderable' => false
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
        return 'Contractors_' . date('YmdHis');
    }
}
