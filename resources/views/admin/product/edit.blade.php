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
                                    <a href="{{ route('admin.product.index') }}">
                                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                                        Product Management
                                    </a>
                                </li>
                            </ol>
                        </nav><!-- /.breadcrumb -->
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Update Product </h1><!-- .btn-toolbar -->
                        </div>
                        @include('partials.alert')
                        <!-- /title and toolbar -->
                    </header><!-- /.page-title-bar -->

                    <form method="POST" action="{{ route('admin.product.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="Name" autofocus="">
                                <label for="name">Name</label>
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea id="description" name="description" class="form-control" placeholder="Description">{{ old('description', $product->description) }}</textarea>
                                <label for="description">Description</label>
                            </div>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" placeholder="Price">
                                <label for="price">Price</label>
                            </div>
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" placeholder="Quantity">
                                <label for="quantity">Quantity</label>
                            </div>
                            @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="color" name="color" class="form-control" value="{{ old('color', $product->color) }}" placeholder="Color">
                                <label for="color">Color</label>
                            </div>
                            @error('color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="brand_id">Brand</label>
                            <select id="brand_id" name="brand_id" class="form-control">
                                <option>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="occasion_id">Occasion</label>
                            <select id="occasion_id" name="occasion_id" class="form-control">
                                <option>Select Occasion</option>
                                @foreach($occasions as $occasion)
                                    <option value="{{ $occasion->id }}" {{ old('occasion_id', $product->occasion_id) == $occasion->id ? 'selected' : '' }}>{{ $occasion->name }}</option>
                                @endforeach
                            </select>
                            @error('occasion_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="special_text">Special Text</label>
                            <input type="hidden" name="special_text" value="0"> <!-- Hidden field for false value -->
                            <input type="checkbox" id="special_text" name="special_text" value="1" {{ old('special_text', $product->special_text) ? 'checked' : '' }}>
                            <div class="form-label-group" id="special_text_price_div" style="display: {{ old('special_text', $product->special_text) ? 'block' : 'none' }}">
                                <input type="number" id="special_text_price" name="special_text_price" class="form-control" value="{{ old('special_text_price', $product->special_text_price) }}" placeholder="Special Text Price">
                                <label for="special_text_price">Special Text Price</label>
                            </div>
                            @error('special_text_price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="special_image">Special Image</label>
                            <input type="hidden" name="special_image" value="0"> <!-- Hidden field for false value -->
                            <input type="checkbox" id="special_image" name="special_image" value="1" {{ old('special_image', $product->special_image) ? 'checked' : '' }}>
                            <div class="form-label-group" id="special_image_price_div" style="display: {{ old('special_image', $product->special_image) ? 'block' : 'none' }}">
                                <input type="number" id="special_image_price" name="special_image_price" class="form-control" value="{{ old('special_image_price', $product->special_image_price) }}" placeholder="Special Image Price">
                                <label for="special_image_price">Special Image Price</label>
                            </div>
                            @error('special_image_price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Existing Images</label>
                            <div class="row">
                                @foreach($product->images as $image)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <img src="{{ ($image->image()) }}" class="img-fluid" style="max-height: 150px; object-fit: cover; margin-bottom: 10px;" alt="Product Image">
                                                <button type="button" class="btn btn-danger btn-sm btn-block delete-image" data-id="{{ $image->id }}">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="avatar">Upload New Images</label>
                            <div class="row align-items-center avatar-form-edit-container">
                                <div class="col-md-12 col-sm-12">
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input"
                                               id="images"
                                               name="images[]"
                                               multiple
                                        >
                                        <label class="custom-file-label" for="avatar">Choose file</label>
                                    </div>
                                </div>

                            </div>
                            @error('images')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-start form-button">
                            <button type="submit" class="btn btn-success mt-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('special_text').addEventListener('change', function() {
            var display = this.checked ? 'block' : 'none';
            document.getElementById('special_text_price_div').style.display = display;
        });

        document.getElementById('special_image').addEventListener('change', function() {
            var display = this.checked ? 'block' : 'none';
            document.getElementById('special_image_price_div').style.display = display;
        });

        document.querySelectorAll('.delete-image').forEach(button => {
            button.addEventListener('click', function() {
                var imageId = this.getAttribute('data-id');
                var url = `/admin/product/images/${imageId}`; // Adjust the URL to match your route

                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    if (response.ok) {
                        this.closest('.col-md-3').remove();
                    } else {
                        alert('Failed to delete image');
                    }
                });
            });
        });
    </script>

@endsection
