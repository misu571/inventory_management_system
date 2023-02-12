@extends('layouts.app')

@section('content')
<div class="row mb-30">
    <div class="col-md mb-5">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{ $products }}</div>
                    <div class="font-14 text-secondary weight-500">
                        Product
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf">
                        <i class="icon-copy fa fa-cubes"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md mb-5">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{ $totalPurchase }}</div>
                    <div class="font-14 text-secondary weight-500">
                        Total Purchase
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#ff5b5b">
                        <i class="icon-copy fa fa-money"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md mb-5">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{ $totalSell }}</div>
                    <div class="font-14 text-secondary weight-500">
                        Total Sell
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06">
                        <i class="icon-copy fa fa-money"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md mb-5">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{ $customers }}</div>
                    <div class="font-14 text-secondary weight-500">
                        Customer
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf">
                        <i class="icon-copy fi-torsos-all"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 mb-20">
        <div class="card-box height-100-p pd-20">
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
                <div class="h5 mb-md-0">Sales Activities</div>
                <div class="form-group mb-md-0">
                    <select class="form-control form-control-sm selectpicker">
                        <option value="">Last Week</option>
                        <option value="">Last Month</option>
                        <option value="">Last 6 Month</option>
                        <option value="">Last 1 year</option>
                    </select>
                </div>
            </div>
            <div id="activities-chart"></div>
        </div>
    </div>
    <div class="col-md-4 mb-20">
        <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#455a64">
            <div class="d-flex justify-content-between pb-20 text-white">
                <div class="icon h1 text-white">
                    <i class="fa fa-cubes" aria-hidden="true"></i>
                </div>
                <div class="font-14 text-right">
                    <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                    <div class="font-12">Since last month</div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="text-white">
                    <div class="font-14">Product</div>
                    <div class="font-24 weight-500">{{ $products }}</div>
                </div>
                <div class="max-width-150">
                    <div id="appointment-chart"></div>
                </div>
            </div>
        </div>
        <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
            <div class="d-flex justify-content-between pb-20 text-white">
                <div class="icon h1 text-white">
                    <i class="fi-torsos-all" aria-hidden="true"></i>
                </div>
                <div class="font-14 text-right">
                    <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                    <div class="font-12">Since last month</div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="text-white">
                    <div class="font-14">Customer</div>
                    <div class="font-24 weight-500">{{ $customers }}</div>
                </div>
                <div class="max-width-150">
                    <div id="surgery-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('deskapp_scripts')
<script src="{{ asset('deskapp/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('deskapp/vendors/scripts/dashboard3.js') }}"></script>
@endsection