@extends('layouts.app')
@section('content')
<!--===========header start===========-->
    @include('_partials.navbar')

    <!--===========app body start===========-->
    <div class="app-body">

        <!--left sidebar start-->
    @include('_partials.sidebar')
        <!--left sidebar end-->

        <!--main contents start-->
        <main class="main-content">

            <div class="container-fluid">

                <!--page title start-->
                <div class="page-title pl-0">
                    <h4 class="mb-0"> Dashboard 4
                        <small>start your new page</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Layout Box Container</li>
                    </ol>
                </div>
                <!--page title end-->

                <!--state widget start-->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                            <span class="bg-primary rounded-circle text-center wb-icon-box">
                                                <i class="icon-people text-light f24"></i>
                                            </span>
                                    </div>
                                    <div class="col-9">
                                        <h6 class="mt-1 mb-0">New Users</h6>
                                        <p class="f12 mb-0">32 New Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                            <span class="bg-warning rounded-circle text-center wb-icon-box">
                                                <i class="icon-basket-loaded text-light f24"></i>
                                            </span>
                                    </div>
                                    <div class="col-9">
                                        <h6 class="mt-1 mb-0">Order Placed</h6>
                                        <p class="f12 mb-0">123 New Order Placed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                            <span class="bg-danger rounded-circle text-center wb-icon-box">
                                                <i class="icon-badge text-light f24"></i>
                                            </span>
                                    </div>
                                    <div class="col-9">
                                        <h6 class="mt-1 mb-0">Monthly Profits</h6>
                                        <p class="f12 mb-0">$9887 This Month Profit
                                            <span class="float-right text-success"> </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--state widget end-->

                <div class="row">
                    <!--Report widget start-->
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Page Visit
                                    <div class="btn-group float-right task-list-action">
                                        <div class="dropdown ">
                                            <a href="#" class="btn btn-transparent default-color dropdown-hover p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class=" icon-options"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right ">
                                                <a class="dropdown-item" href="#"> <i class="fa fa-calendar-o text-info pr-2"></i> Daily</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-calendar-check-o text-danger pr-2"></i> Weekly</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-calculator text-warning pr-2"></i> Monthly</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vertical-middle">
                                    <thead>
                                    <tr>
                                        <th class="border-0">Page</th>
                                        <th class="border-0 text-right">Pageviews</th>
                                        <th class="border-0 text-right">Page Value </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            /dashboard/home/
                                        </td>
                                        <td class="text-right">
                                            2345
                                        </td>
                                        <td class="text-right">
                                            $ 0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            /dashboard/charts/nice_charts
                                        </td>
                                        <td class="text-right">
                                            2345
                                        </td>
                                        <td class="text-right">
                                            $ 0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            /profile/edit/
                                        </td>
                                        <td class="text-right">
                                            2345
                                        </td>
                                        <td class="text-right">
                                            $ 0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            /dashboard/datatables/responsive
                                        </td>
                                        <td class="text-right">
                                            2345
                                        </td>
                                        <td class="text-right">
                                            $ 0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            /dashboard/charts/nice_charts
                                        </td>
                                        <td class="text-right">
                                            2345
                                        </td>
                                        <td class="text-right">
                                            $ 0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            /profile/edit/
                                        </td>
                                        <td class="text-right">
                                            2345
                                        </td>
                                        <td class="text-right">
                                            $ 0.00
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Report widget end-->

                </div>

            </div>
        </main>
        <!--main contents end-->

    </div>
    <!--===========app body end===========-->
    @include('_partials.footer')
@endsection