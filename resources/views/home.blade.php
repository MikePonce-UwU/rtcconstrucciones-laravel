@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Vista principal') }}</h2>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center h1">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Bienvenido, usted es:
                        "@if (!empty(Auth::user()->getRoleNames()))
                            @foreach (Auth::user()->getRoleNames() as $v)
                                {{ $v }}
                            @endforeach
                            @endif"
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
