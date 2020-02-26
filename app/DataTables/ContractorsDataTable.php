<?php

namespace App\DataTables;

use App\Contractor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

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
        // ->addColumn('created_at', function ($user) {
        //         $created_at = $user->created_at->format('M-d-Y');
        //     return $created_at;
        // })
        ->rawColumns(['action']);
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
