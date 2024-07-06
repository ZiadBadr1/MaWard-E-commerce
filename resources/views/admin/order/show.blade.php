@extends('admin.layouts.master')

@section('content')
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Orders</a></li>
                                <li class="breadcrumb-item active">Order Details</li>
                            </ol>
                        </nav>
                        <div class="d-md-flex align-items-md-center justify-content-between">
                            <h1 class="page-title">Order #{{ $order->id }}</h1>
                            <div class="btn-toolbar pdf-exclude">
                                <button onclick="window.print()" class="btn btn-primary mr-2"><i class="fas fa-print"></i> Print</button>
                                <button onclick="downloadPDF()" class="btn btn-secondary"><i class="fas fa-file-pdf"></i> Download PDF</button>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-fluid">
                            <div class="card-header">
                                <h6 class="card-title"> Order Details </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Client Name:</strong> {{ $order->first_name ." ".$order->last_name}}</p>
                                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                        <p><strong>Address:</strong> {{ $order->address }}</p>
                                        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Total Amount:</strong> {{ $order->total_amount }}</p>
                                        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                                        <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
                                    </div>
                                </div>

                                <h6 class="mt-4">Items</h6>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->orderDetails as $detail)
                                        <tr>
                                            <td>{{ $detail->product->name }}</td>
                                            <td>{{ $detail->quantity }}</td>
                                            <td>{{ $detail->price ." $"}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="2" class="text-right">Total Amount:</th>
                                        <th>{{ $totalAmount ." $"}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function downloadPDF() {
            // Hide elements with the class 'pdf-exclude'
            document.querySelectorAll('.pdf-exclude').forEach(el => el.style.display = 'none');

            const element = document.querySelector('.page');
            html2pdf().from(element).save('order_{{ $order->id }}.pdf').then(() => {
                // Show elements with the class 'pdf-exclude' after the PDF is generated
                document.querySelectorAll('.pdf-exclude').forEach(el => el.style.display = '');
            });
        }
    </script>

@endsection
