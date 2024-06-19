@extends('admin.layouts.master')
@section('open-brand-management','has-open')
@section('active-brand','has-active')

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
                                    <a href="{{route('admin.brand.index')}}"><i
                                                class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                                        Brand Management
                                    </a>
                                </li>
                            </ol>
                        </nav><!-- /.breadcrumb -->
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Brand Info </h1><!-- .btn-toolbar -->
                        </div>
                        @include('partials.alert')
                        <!-- /title and toolbar -->
                    </header><!-- /.page-title-bar -->

                    <form method="POST" action="{{route('admin.brand.update',$brand)}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputUser" name="name" class="form-control   "
                                       value="{{old('name',$brand->name)}}"

                                       placeholder="name" autofocus=""> <label for="inputUser">name</label>
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="avatar">Upload Icon</label>
                            <div class="row align-items-center avatar-form-edit-container">
                                <div class="col-md-6 col-sm-12">
                                    <div class="custom-file ">
                                        <input type="file"
                                               class="custom-file-input"
                                               id="icon"
                                               name="icon"
                                        >
                                        <label class="custom-file-label" for="avatar">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-md-6 form-avatar-container col-sm-12 justify-content-sm-center align-items-sm-center">
                                    <img src="{{$brand->icon()}}" alt="icon">
                                </div>
                            </div>
                            @error('icon')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>


                        <div class="d-flex justify-content-start form-button">
                            <button type="submit" class="btn btn-success mt-4">Update</button>
                        </div>
                    </form>

                </div>
            </div>

@endsection

