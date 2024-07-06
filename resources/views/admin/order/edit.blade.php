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
                                    <a href="{{ route('admin.order.index') }}">
                                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                                        Order Management
                                    </a>
                                </li>
                            </ol>
                        </nav><!-- /.breadcrumb -->
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> Update Order </h1><!-- .btn-toolbar -->
                        </div>
                        @include('partials.alert')
                        <!-- /title and toolbar -->
                    </header><!-- /.page-title-bar -->

                    <form method="POST" action="{{ route('admin.order.update', $order) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $order->first_name." ".$order->last_name) }}" placeholder="Name" disabled>
                                <label for="name">Name</label>
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $order->phone) }}" placeholder="Phone" disabled>
                                <label for="phone">Phone</label>
                            </div>
                            @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $order->address) }}" placeholder="Address" disabled>
                                <label for="address">Address</label>
                            </div>
                            @error('address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="payment_method" name="payment_method" class="form-control" value="{{ old('payment_method', $order->payment_method) }}" placeholder="Payment Method" disabled>
                                <label for="payment_method">Payment Method</label>
                            </div>
                            @error('payment_method')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', $order->quantity) }}" placeholder="Quantity" disabled>
                                <label for="quantity">Quantity</label>
                            </div>
                            @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="number" id="total_amount" name="total_amount" class="form-control" value="{{ old('total_amount', $order->total_amount) }}" placeholder="Total Amount" disabled>
                                <label for="total_amount">Total Amount</label>
                            </div>
                            @error('total_amount')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option>Select Status</option>
                                @foreach(App\Models\Order::STATUSES as $status)
                                    <option value="{{ $status }}" {{ old('status', $order->status) == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="payment_status">Payment Status</label>
                            <select id="payment_status" name="payment_status" class="form-control">
                                <option>Select Payment Status</option>
                                @foreach(App\Models\Order::PAYMENT_STATUS as $payment_status)
                                    <option value="{{ $payment_status }}" {{ old('payment_status', $order->payment_status) == $payment_status ? 'selected' : '' }}>{{ ucfirst($payment_status) }}</option>
                                @endforeach
                            </select>
                            @error('payment_status')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($order->attachment)
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <div class="attachment-link">
                                    <a href="{{ $order->attachment() }}" target="_blank">View Attachment</a>
                                </div>
                            </div>
                        @endif

                        <div class="d-flex justify-content-start form-button">
                            <button type="submit" class="btn btn-success mt-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
<style>
    .attachment-link a {
        font-size: 1.2rem; /* Larger font size */
        font-weight: bold;
        color: #007bff; /* Blue color for the link */
        text-decoration: underline;
    }

    .attachment-link a:hover {
        color: #0056b3; /* Darker blue on hover */
    }
</style>
