@extends('loan.master')

{{--@section('title', 'Dashboard | '.getRoleName('display_name'))--}}
@section('title', 'Dashboard')

@section('content')

    <div class="wrapper wrapper-content">
        <div class="page-dashboard">
            <div class="row list-count">
{{--                <div class="col-12 col-lg-3 col-md-6 space-1">--}}
{{--                    <a href="">--}}
{{--                        <div class="box">--}}
{{--                            <div class="item counter-label">--}}
{{--                                <div class="counter-label">Loan Amount</div>--}}
{{--                                <div class="counter">0</div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="counter-icon">--}}
{{--                                    --}}{{--<img src="https://img.icons8.com/plasticine/100/000000/money.png" class="img-fluid"/>--}}
{{--                                    <img src="{{ asset('img/icons/ico-loan-amount.png') }}" class="img-fluid"/>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="box-link">View <img src="https://img.icons8.com/ios/20/948b96/long-arrow-right.png" class="img-fluid"/></div>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--                <div class="col-12 col-lg-3 col-md-6 space-1">--}}
{{--                    <a href="">--}}
{{--                        <div class="box">--}}
{{--                            <div class="item counter-label">--}}
{{--                                <div class="counter-label">Loan Tenure</div>--}}
{{--                                <div class="counter">0</div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="counter-icon">--}}
{{--                                    --}}{{--<img src="https://img.icons8.com/plasticine/100/000000/money-bag.png" class="img-fluid"/>--}}
{{--                                    <img src="{{ asset('img/icons/ico-loan-tenue.png') }}" class="img-fluid"/>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="box-link">View <img src="https://img.icons8.com/ios/20/948b96/long-arrow-right.png" class="img-fluid"/></div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <div class="col-12 col-lg-3 col-md-6 space-1">
                    <a href="{!! route('loan-report') !!}">
                        <div class="box" id="new-loan-application">
                            <div class="item counter-label">
                                <div class="counter-label">New Loan Application</div>
                                <div class="counter">{{ $counts[0] }}</div>
                            </div>
                            <div class="item">
                                <div class="counter-icon">
                                    {{--<img src="https://img.icons8.com/plasticine/100/000000/online-money-transfer.png" class="img-fluid"/>--}}
                                    <img src="{{ asset('img/icons/ico-loan-application.png') }}" class="img-fluid"/>
                                </div>
                            </div>
                            <div class="box-link">View <img src="https://img.icons8.com/ios/20/948b96/long-arrow-right.png" class="img-fluid"/></div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-3 col-md-6 space-1">
                    <a href="{!! route('loan-report') !!}">
                        <div class="box" id="approve-loans">
                            <div class="item counter-label">
                                <div class="counter-label">Approved Loans This Week</div>
                                <div class="counter">{{ $counts[1] }}</div>
                            </div>
                            <div class="item">
                                <div class="counter-icon">
                                    {{--<img src="https://img.icons8.com/plasticine/100/000000/refund.png" class="img-fluid"/>--}}
                                    <img src="{{ asset('img/icons/ico-approved-loan.png') }}" class="img-fluid"/>
                                </div>
                            </div>
                            <div class="box-link">View <img src="https://img.icons8.com/ios/20/948b96/long-arrow-right.png" class="img-fluid"/></div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-3 col-md-6 space-1">
                    <a href="{!! route('loan-report') !!}">
                        <div class="box">
                            <div class="item counter-label">
                                <div class="counter-label">Declined Loans</div>
                                <div class="counter">{{ $counts[2] }}</div>
                            </div>
                            <div class="item">
                                <div class="counter-icon">
                                    {{--<img src="https://img.icons8.com/plasticine/100/000000/tax.png" class="img-fluid"/>--}}
                                    <img src="{{ asset('img/icons/ico-declined-loan.png') }}" class="img-fluid"/>
                                </div>
                            </div>
                            <div class="box-link">View <img src="https://img.icons8.com/ios/20/948b96/long-arrow-right.png" class="img-fluid"/></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-9 graphs">
                    <div class="box">
                        <canvas id="doughnutChart" height="130"></canvas>
                        {{--<div class="chart-container" style="position: relative; height:40vh;">--}}
                        {{--<canvas id="doughnutChart"></canvas>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="box list-group">
                        <div class="header-label">
                            <div class="row">
                                <div class="col-6 col-lg-6">
                                    <label>Financial products</label>
                                </div>
                                <div class="col-6 col-lg-6">
                                    <label>Total Product</label>
                                </div>
                            </div>
                        </div>

                        <ul>
                            @foreach($loanType as $type)
                                <li>
                                    <div class="row">
                                        <div class="col-6 col-lg-6">
                                            <div class="text">{{ $type->display_name }}</div>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <div class="text">{{ $type->product_count }}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            {{--                            <li>--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-6 col-lg-6">--}}
                            {{--                                        <div class="text">Financial products 2</div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-6 col-lg-6">--}}
                            {{--                                        <div class="text">50</div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-6 col-lg-6">--}}
                            {{--                                        <div class="text">Financial products 3</div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-6 col-lg-6">--}}
                            {{--                                        <div class="text">100</div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}
                        </ul>

                    </div>

                </div>
            </div>
        </div>

        {{--<div class="row">--}}
        {{--<div class="col-12">--}}
        {{--<div class="ibox">--}}
        {{--<div class="ibox-title">--}}

        {{--</div>--}}
        {{--<div class="ibox-content">--}}
        {{--<div class="table-responsive">--}}
        {{--<table class="table table-borderless">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th>Product</th>--}}
        {{--<th colspan="4" class="text-center">Loan Applicants</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach(loanStatInfo(Auth::user()->loan_provider->id) as $info)--}}
        {{--<tr>--}}
        {{--<td>--}}
        {{--<small><strong class="stats-label text-success">{{ $info[0][0] }} </strong></small>--}}
        {{--<h4>{{ $info[0][1] }} <small>total products</small></h4>--}}
        {{--</td>--}}
        {{--<td class="text-right">--}}
        {{--<small class="stats-label">Pending</small>--}}
        {{--<h4>{{ $info[1] }}</h4>--}}
        {{--</td>--}}
        {{--<td class="text-right">--}}
        {{--<small class="stats-label">Active</small>--}}
        {{--<h4>{{ $info[2] }}</h4>--}}
        {{--</td>--}}
        {{--<td class="text-right">--}}
        {{--<small class="stats-label">Completed</small>--}}
        {{--<h4>{{ $info[3] }}</h4>--}}
        {{--</td>--}}
        {{--<td class="text-right">--}}
        {{--<small class="stats-label">Declined</small>--}}
        {{--<h4>{{ $info[4] }}</h4>--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
        {{--</table>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

    </div>

@endsection


@section('styles')
    {{--{!! Html::style('') !!}--}}
@endsection

@section('scripts')
    {{--{!! Html::script('') !!}--}}

    <!-- ChartJS-->
    {!! Html::script('/js/plugins/chartJs/Chart.min.js') !!}

    <script>
        $(document).ready(function(){
            $.get('{!! route('loan-provider-dashboard') !!}', function(data){
                console.log(data);
                // $('#new-loan-application').find('.counter').text(data[1]);
                // $('#approve-loans').find('.counter').text(data[0]);

                var doughnutData = {
                    labels: ["Pending Loans", "Active Loans", "Completed Loans", "Declined Loans", "Cancelled Loans" ],
                    datasets: [{
                        data: [data[1], data[2], data[3], data[4], data[5]],
                        backgroundColor: ["#346815","#3aa615","#5559a8","#d6cc2e","#f5f0ee"]
                    }]
                } ;


                var doughnutOptions = {
                    responsive: true
                };


                var ctx4 = document.getElementById("doughnutChart").getContext("2d");
                new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            });
        });
    </script>
@endsection
