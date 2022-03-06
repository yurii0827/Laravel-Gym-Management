@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <div class="container-fluid pt-5">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                {{-- # ======================================= # Total Revenue # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $revenueInDollars }}</h3>
                            <p>Total Revenue</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign text-white" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Cities # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $cities }}</h3>
                            <p>Cities</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city text-white" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Cities Managers # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $citiesManagers }}<sup style="font-size: 20px"></sup></h3>
                            <p>Cities Managers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-white" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Gyms # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $gyms }}</h3>
                            <p>Gyms</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dumbbell text-white" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Gyms Managers # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $gymsManagers }}<sup style="font-size: 20px"></sup></h3>
                            <p>Gyms Managers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-dark" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Coaches # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $coaches }}<sup style="font-size: 20px"></sup></h3>
                            <p>Coaches</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-dark" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Users # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>{{ $users }}</h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-white" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
@endsection
