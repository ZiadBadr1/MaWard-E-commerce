@extends('admin.layouts.master')
@section('open-order-management', 'has-open')
@section('active-order', 'has-active')

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
                                    <a href="{{ route('admin.dashboard') }}"><i
                                                class="breadcrumb-icon fa fa-angle-left mr-2"></i>Dashboard</a>
                                </li>
                            </ol>
                        </nav><!-- /.breadcrumb -->
                        <!-- floating action -->

                        <!-- title and toolbar -->
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Orders </h1><!-- .btn-toolbar -->
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
                                        <a class="nav-link {{ request()->routeIs('admin.order.index') && !request()->has('status') ? 'active show' : '' }}"
                                           href="{{ route('admin.order.index') }}">
                                                <span class="badge badge-pill badge-danger badge-up">
                                                    {{ $all}}
                                                </span>
                                            All
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->get('status') == 'pending' ? 'active show' : '' }}"
                                           href="{{ route('admin.order.index', ['status' => 'pending']) }}">
                <span class="badge badge-pill badge-danger badge-up">
                    {{ $pending }}
                </span>
                                            Pending
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->get('status') == 'shipped' ? 'active show' : '' }}"
                                           href="{{ route('admin.order.index', ['status' => 'shipped']) }}">
                <span class="badge badge-pill badge-danger badge-up">
                    {{ $shipped }}
                </span>
                                            Shipped
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->get('status') == 'delivered' ? 'active show' : '' }}"
                                           href="{{ route('admin.order.index', ['status' => 'delivered']) }}">
                <span class="badge badge-pill badge-danger badge-up">
                    {{ $delivered }}
                </span>
                                            Delivered
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->get('status') == 'cancelled' ? 'active show' : '' }}"
                                           href="{{ route('admin.order.index', ['status' => 'cancelled']) }}">
                <span class="badge badge-pill badge-danger badge-up">
                    {{ $cancelled }}
                </span>
                                            Cancelled
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
                                                <span class="input-group-text"><span
                                                            class="oi oi-magnifying-glass"></span></span>
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
                                            <th> Order ID</th>
                                            <th> Client Name</th>
                                            <th> Phone</th>
                                            <th> Address</th>
                                            <th> Payment Method</th>
                                            <th> Total Amount</th>
                                            <th> Status</th>
                                            <th> Payment Status</th>
                                            <th> Last Update</th>
                                            <th style="width:100px; min-width:100px;"> &nbsp;Operation</th>
                                        </tr>
                                        </thead><!-- /thead -->
                                        <!-- tbody -->
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td class="align-content-center">{{ $order->id }}</td>
                                                <td class="align-content-center">{{ $order->first_name }}</td>
                                                <td class="align-content-center">{{ $order->phone }}</td>
                                                <td class="align-content-center">{{ $order->address }}</td>
                                                <td class="align-content-center">{{ $order->payment_method }}</td>
                                                <td class="align-content-center">{{ $order->total_amount }}</td>
                                                <td class="align-content-center">
            <span class="badge
            @switch($order->status)
                @case('pending')
                    badge-warning
                    @break
                @case('shipped')
                    badge-primary
                    @break
                @case('delivered')
                    badge-success
                    @break
                @case('cancelled')
                    badge-danger
                    @break
                @case('refunded')
                    badge-info
                    @break
                @case('failed')
                    badge-dark
                    @break
                @default
                    badge-secondary
            @endswitch">
                {{ ucfirst($order->status) }}
            </span>
                                                </td>
                                                <td class="align-content-center">
            <span class="badge
            @switch($order->payment_status)
                @case('pending')
                    badge-warning
                    @break
                @case('payed')
                    badge-success
                    @break
                @case('unpayed')
                    badge-danger
                    @break
                @default
                    badge-secondary
            @endswitch">
                {{ ucfirst($order->payment_status) }}
            </span>
                                                </td>
                                                <td class="align-content-center">
            <span class="badge {{ $order->updated_at->diffInMinutes() < 60 ? 'badge-warning' : 'badge-info' }}">
                {{ $order->updated_at->diffForHumans() }}
            </span>
                                                </td>
                                                <td class="align-content-center">
                                                    <div style="display: inline-block;">
                                                        <a href="{{ route('admin.order.show', $order) }}" class="btn btn-sm btn-icon btn-secondary">
                                                            <i class="fas fa-eye"></i> <span class="sr-only">View</span>
                                                        </a>
                                                    </div>
                                                    <div style="display: inline-block;">
                                                        <a href="{{ route('admin.order.edit', $order) }}" class="btn btn-sm btn-icon btn-secondary">
                                                            <i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr><!-- /tr -->
                                        @endforeach
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.table-responsive -->
                                <!-- .pagination -->
                                {!! $orders->links() !!}
                                <!-- /.pagination -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- .app-footer -->
    </main>

@endsection
