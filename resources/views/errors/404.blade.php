@extends('layouts.guest')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center my-5">
            <div class="col-md-5 col-lg-5 my-5">
                <div class="card my-5">
                    <div class="card-header text-center h1 bg-danger">
                        <i class="fa fa-exclamation-circle text-white"></i>
                    </div>
                    <div class="card-body">
                        <div class="col-md-5 justify-content-center mx-auto text-center">
                            <h2 class="font-bold">ERROR 404</h2>
                            <p class="h6">Seems this page not found</p>
                            <a href="{{ url('/') }}" class="btn btn-danger btn-rounded mt-3 font-bold">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
