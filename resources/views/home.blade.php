@extends('admin.layout.dashboard')
@section('admin_content')
<section class="content">
    <div class="container-fluid">
        <h5 class="mb-2">Info Box</h5>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New user day</span>
                        <span class="info-box-number">{{count($userDay)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New user the last 7 days</span>
                        <span class="info-box-number">{{ count($userWeek) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New user Month</span>
                        <span class="info-box-number">{{count($userMonth)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fa fa-dollar-sign"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total</span>
                        <span class="info-box-number">{{ $total }} VNĐ</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ url('/home') }}" method="post">
                        <div class="btn-group" id="btn-group-statistic">
                            <input type="button" class="btn bt btn-primary" id="btn-day" value="Day">
                            <input type="button" class="btn bt btn-primary" id="btn-month" value="Month">
                        </div>
                        @csrf
                    </form>
                    <form autocomplete="off" action="{{ url('/home') }}" id="day-search">
                        <div class= "col-lg-6">
                            <label>From date: <input type="date" id="from-date" class="form-control"></label>
                            <label>To date: <input type="date" id="to-date" class="form-control"></label>
                            <input type="button" class="btn btn-primary" id="search-statistic" value="Search">
                        </div>
                        @csrf
                    </form>
                    <div id="container-chart"></div>
                    <div id="container-chart-day"></div>
                    <div id="container-chart-last-seven-day">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
