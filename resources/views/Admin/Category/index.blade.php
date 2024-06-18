@extends('admin.layouts.master')
@section('open-category-management','has-open')
@section('active-category','has-active')

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
                                    <a href="{{route('admin.dashboard')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Dashboard</a>
                                </li>
                            </ol>
                        </nav><!-- /.breadcrumb -->
                        <!-- floating action -->
                        <a href="{{route('admin.category.create')}}">
                            <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span>
                            </button>
                        </a> <!-- /floating action -->
                        <!-- title and toolbar -->
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Categories </h1><!-- .btn-toolbar -->
                            <div class="btn-toolbar">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="dropdown"><span>More</span>
                                        <span class="fa fa-caret-down"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-arrow"></div>
                                        <a href="{{route('admin.category.create')}}" class="dropdown-item">Add
                                            Category</a>
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
                                        <a class="nav-link active show" href="{{route('admin.category.index')}}">
                                              <span class="badge badge-pill badge-danger badge-up">
                                                {{$categories->count()}}
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
                                                <span class="input-group-text"><span
                                                        class="oi oi-magnifying-glass"></span></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search record">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->
                                <!-- .table-responsive -->
                                <div class="table-responsive">
                                    <!-- .table -->
                                    <table class="table">
                                        <!-- thead -->
                                        <thead>
                                        <tr>
                                            <th> Name</th>
                                            <th> Last Update</th>
                                            <th style="width:100px; min-width:100px;"> &nbsp;operation</th>
                                        </tr>
                                        </thead><!-- /thead -->
                                        <!-- tbody -->
                                        <tbody>
                                        <!-- tr -->
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>
                                                    <a href="#" class="tile tile-img mr-1">
                                                        <img class="img-fluid" src="{{$category->icon()}}"
                                                             alt="Card image cap"></a>
                                                    <a href="#">{{$category->name}}</a>
                                                </td>
                                                <td class="align-middle">
                                                    <span
                                                        class="badge {{$category->updated_at->diffInMinutes() < 60 ? "badge-warning" : "badge-info" }}">
                                                    {{$category->updated_at->diffForHumans()}}
                                                    </span>

                                                </td>
                                                <td class="align-middle text-right">
                                                    <div style="display: inline-block;">
                                                        <a href="{{route('admin.category.edit',$category)}}"
                                                           class="btn btn-sm btn-icon btn-secondary">
                                                            <i class="fa fa-pencil-alt"></i> <span
                                                                class="sr-only">Edit</span>
                                                        </a>
                                                    </div>
                                                    <div style="display: inline-block;">
                                                        <form method="POST"
                                                              action="{{route('admin.category.destroy',$category)}}">
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

                                {!! $categories->links() !!}
                                <!-- /.pagination -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- .app-footer -->
@endsection
