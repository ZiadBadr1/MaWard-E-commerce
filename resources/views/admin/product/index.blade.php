@extends('admin.layouts.master')
@section('open-product-management','has-open')
@section('active-product','has-active')

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
                        <!-- floating action -->
                        <a href="{{ route('admin.product.create') }}">
                            <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
                        </a> <!-- /floating action -->
                        <!-- title and toolbar -->
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Products </h1><!-- .btn-toolbar -->
                            <div class="btn-toolbar">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="dropdown"><span>More</span>
                                        <span class="fa fa-caret-down"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-arrow"></div>
                                        <a href="{{ route('admin.product.create') }}" class="dropdown-item">Add Product</a>
                                    </div>
                                </div>
                            </div><!-- /.btn-toolbar -->
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
                                        <a class="nav-link active show" href="{{ route('admin.product.index') }}">
                                        <span class="badge badge-pill badge-danger badge-up">
                                            {{ $products->count() }}
                                        </span>
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
                                        <!-- .input-group-prepend -->
                                        <!-- .input-group -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search record">
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
                                            <th> Name </th>
                                            <th> Description </th>
                                            <th> Price </th>
                                            <th> Quantity </th>
                                            <th> Color </th>
                                            <th> Special Text </th>
                                            <th> Special Text Price </th>
                                            <th> Special Image </th>
                                            <th> Special Image Price </th>
                                            <th> Category </th>
                                            <th> Brand </th>
                                            <th> Occasion </th>
                                            <th> Images </th>
                                            <th> Last Update </th>
                                            <th style="width:100px; min-width:100px;"> &nbsp;Operation </th>
                                        </tr>
                                        </thead><!-- /thead -->
                                        <!-- tbody -->
                                        <tbody>
                                        <!-- tr -->
                                        @foreach($products as $product)
                                            <tr>
                                                <td class="align-content-center">{{ $product->name }}</td>
                                                <td class="align-content-center">{{ $product->excerpt() }}</td>
                                                <td class="align-content-center">{{ $product->price }}</td>
                                                <td class="align-content-center">{{ $product->quantity }}</td>
                                                <td class="align-content-center">{{ $product->color }}</td>
                                                <td class="align-content-center">{{ $product->special_text ? 'Yes' : 'No' }}</td>
                                                <td class="align-content-center">{{ $product->special_text ? $product->special_text_price : 'N/A' }}</td>
                                                <td class="align-content-center">{{ $product->special_image ? 'Yes' : 'No' }}</td>
                                                <td class="align-content-center">{{ $product->special_image ? $product->special_image_price : 'N/A' }}</td>
                                                <td class="align-content-center">{{ $product->category->name }}</td>
                                                <td class="align-content-center">{{ $product->brand->name }}</td>
                                                <td class="align-content-center">{{ $product->occasion->name }}</td>
                                                <td class="align-content-center">
                                                    @foreach($product->images as $image)
                                                        <a href="#" class="tile tile-img mr-1 mb-1">
                                                            <img class="img-fluid" src="{{ $image->image() }}" alt="Product Image">
                                                        </a>
                                                    @endforeach
                                                </td>
                                                <td class="align-content-center">
                                                    <span class="badge {{ $product->updated_at->diffInMinutes() < 60 ? 'badge-warning' : 'badge-info' }}">
                                                        {{ $product->updated_at->diffForHumans() }}
                                                    </span>
                                                </td>
                                                <td class="align-content-center">
                                                    <div style="display: inline-block;">
                                                        <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-sm btn-icon btn-secondary">
                                                            <i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span>
                                                        </a>
                                                    </div>
                                                    <div style="display: inline-block;">
                                                        <form method="POST" action="{{ route('admin.product.destroy', $product) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-icon btn-secondary inline">
                                                                <i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr><!-- /tr -->
                                        @endforeach
                                        </tbody><!-- /tbody -->
                                    </table><!-- /.table -->
                                </div><!-- /.table-responsive -->
                                <!-- .pagination -->
                                {!! $products->links() !!}
                                <!-- /.pagination -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- .app-footer -->
@endsection
