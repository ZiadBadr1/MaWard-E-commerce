@extends('admin.layouts.master')
@section('open-client-management', 'has-open')
@section('active-client', 'has-active')

@section('content')

    <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
            <!-- .page -->
            <div class="page">
                <!-- .page-inner -->
                <div class="page-inner">
                    <!-- .page-title-bar -->
                    <header class="page-title-bar">
                        <!-- .breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('admin.dashboard') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Dashboard</a>
                                </li>
                            </ol>
                        </nav><!-- /.breadcrumb -->
                        <!-- title and toolbar -->
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Clients </h1><!-- .btn-toolbar -->
                        </div><!-- /title and toolbar -->
                    </header><!-- /.page-title-bar -->
                    <!-- .page-section -->
                    @include('partials.alert')
                    <div class="page-section">
                        <!-- .card -->
                        <div class="card card-fluid">
                            <!-- .card-header -->
                            <div class="card-header">
                                <!-- .nav-tabs -->
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active show" href="{{ route('admin.clients.index') }}">
                                            <span class="badge badge-pill badge-danger badge-up">{{ $clients->count() }}</span>
                                            All
                                        </a>
                                    </li>
                                </ul><!-- /.nav-tabs -->
                            </div><!-- /.card-header -->
                            <!-- .card-body -->
                            <div class="card-body">
                                <!-- .form-group -->
                                <div class="form-group">
                                    <!-- .input-group -->
                                    <div class="input-group input-group-alt">
                                        <!-- .input-group -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                            </div>
                                            <input type="text" class="form-control table-search" placeholder="Search record">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->
                                <!-- .table-responsive -->
                                <div class="table-responsive">
                                    <!-- .table -->
                                    <table class="table text-center">
                                        <!-- thead -->
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th style="width:100px; min-width:100px;">&nbsp;Operation</th>
                                        </tr>
                                        </thead><!-- /thead -->
                                        <!-- tbody -->
                                        <tbody>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td class="align-content-center">
                                                    {{$client->id}}
                                                </td>

                                                <td class="align-content-center">
                                                    <img src="{{ $client->getAvatarUrl() }}" alt="Avatar" class="img-fluid rounded-circle" width="50" height="50">
                                                    {{ $client->name }}
                                                </td>
                                                <td class="align-content-center">{{ $client->email }}</td>
                                                <td class="align-content-center">{{ $client->phone ?? 'N/A' }}</td>
                                                <td class="align-content-center">{{ $client->address ?? 'N/A' }}</td>
                                                <td class="align-content-center">
                                                    <div style="display: inline-block;">
                                                        <a href="{{ route('admin.clients.show', $client) }}" class="btn btn-sm btn-icon btn-secondary">
                                                            <i class="fas fa-eye"></i> <span class="sr-only">View</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr><!-- /tr -->
                                        @endforeach
                                        </tbody><!-- /tbody -->
                                    </table><!-- /.table -->
                                </div><!-- /.table-responsive -->
                                <!-- .pagination -->
                                {!! $clients->links() !!}
                                <!-- /.pagination -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- .app-footer -->
    </main>

@endsection
