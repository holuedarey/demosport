@extends('layouts.main')

@section('content')

    <!--main content wrapper-->
    <div class="content-wrapper">

    <div class="container-fluid">

        <!-- ALERT!!! -->

        <!--page title-->
        <div class="page-title mb-4 d-flex align-items-center">
            <div class="mr-auto">
                <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Admin Dashboard</h4>
            </div>
        </div>
        <!--/page title-->

        <div class="row">
            
                        
        <div class="col-lg-4 col-md-12">
            <div class="card card-inverse card-success animated fadeInDown">
                <div class="card-body">
                    <h4 class="card-title">USERS</h4>
                    <div class="d-flex flex-row">
                        <div class="align-self-center">
                            <span class="display-6 text-white">{{ $user }}</span>
                            <h5 class="text-white"></h5>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-12">
            <div class="card card-inverse card-success animated fadeInDown">
                <div class="card-body">
                    <h4 class="card-title">POSTS</h4>
                    <div class="d-flex flex-row">
                        <div class="align-self-center">
                            <span class="display-6 text-white">{{ $post }}</span>
                            <h5 class="text-white"></h5>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card card-inverse card-success animated fadeInDown">
                <div class="card-body">
                    <h4 class="card-title">COMMENTS</h4>
                    <div class="d-flex flex-row">
                        <div class="align-self-center">
                            <span class="display-6 text-white">{{ $comment }}</span>
                            <h5 class="text-white"></h5>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
                   

                           


            </div>
        </div>

    </div>


    

@endsection