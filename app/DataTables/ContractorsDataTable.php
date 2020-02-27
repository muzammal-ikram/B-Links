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
        ->addColumn('comm_dd', function($con) {
            return $con->comm_dd->format('M-d-Y');
        })
        ->addColumn('date', function($con) {
            return $con->date->format('M-d-Y');
        })
        ->addColumn('etd', function($con) {
            return $con->etd->format('M-d-Y');
        })
        ->addColumn('eta', function($con) {
            return $con->eta->format('M-d-Y');
        })
        ->addColumn('status', function($con) {
            if(Carbon::now()->addDays(1)->isSameDay($con->comm_dd)){
                return "One Day Before";
            }elseif(Carbon::now() < $con->comm_dd){
                return "Pending";
            }else{
                return "Completed";
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
        ->rawColumns(['action', 'status', 'comm_dd', 'date', 'etd', 'eta']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Contractor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contractor $model)
    {
        return $model->newQuery();
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
            'Contractor Number'=>[
                'data'=> 'contractor_number'
            ],
            'Count'=>[
                'data' => 'count'
            ],

            'Seller Name'=>[
                'data' => 'seller_name'
            ],
            'Seller Address'=>[
                'data' => 'seller_address'
            ],
            'Seller Country'=>[
                'data' => 'seller_country'
            ],

            'Buyer Name'=>[
                'data' => 'buyer_name'
            ],
            'Buyer Address'=>[
                'data' => 'buyer_address'
            ],
            'Buyer Country'=>[
                'data' => 'buyer_country'
            ],

            'Lc Opener Name'=>[
                'data' => 'lc_opener_name'
            ],
            'Lc Opener Address'=>[
                'data' => 'lc_opener_country'
            ],
            'Lc Opener Country'=>[
                'data' => 'lc_opener_country'
            ],

            'Fcls'=>[
                'data' => 'fcls'
            ],
            'Price/kg'=>[
                'data' => 'price_per_kg'
            ],
            'Kg'=>[
                'data' => 'kg'
            ],

            'Total Amount'=>[
                'data'=>'total_amount'
            ],
            'Lsd'=>[
                'data'=>'lsd'
            ],
            'Lc Type'=>[
                'data'=>'lc_type'
            ],

            'Lc Number'=>[
                'data'=>'lc_number'
            ],
            'Invoice Number'=>[
                'data'=>'invoice_number'
            ],
            'BL Number'=>[
                'data'=>'bl_number'
            ],

            'Etd'=>[
                'data'=>'etd'
            ],
            'Etd_fcls'=>[
                'data'=>'etd_fcls'
            ],
            'Etd_rest'=>[
                'data'=>'etd_rest'
            ],

            'Eta'=>[
                'data'=>'eta'
            ],
            'Eta_fcls'=>[
                'data'=>'eta_fcls'
            ],
            'Eta_rest'=>[
                'data'=>'eta_rest'
            ],

            'Awb'=>[
                'data'=>'document'
            ],
            'Document'=>[
                'data'=>'document'
            ],
            'Shipment Status'=>[
                'data'=>'shipment_status'
            ],

            'Commission'=>[
                'data'=>'commission'
            ],
            'Commission %'=>[
                'data'=>'commission_percentage'
            ],
            'Com deadline'=>[
                'data'=>'comm_dd'
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
