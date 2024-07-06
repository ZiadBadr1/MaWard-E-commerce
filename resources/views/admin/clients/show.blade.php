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
                                <li class="breadcrumb-item"><a href="{{ route('admin.clients.index') }}">Clients</a></li>
                                <li class="breadcrumb-item active">Client Details</li>
                            </ol>
                        </nav>
                        <div class="d-md-flex align-items-md-center justify-content-between">
                            <h1 class="page-title">Client #{{ $user->id }}</h1>
                            <div class="btn-toolbar no-print">
                                <button onclick="window.print()" class="btn btn-primary mr-2"><i class="fas fa-print"></i> Print</button>
                                <button onclick="downloadPDF()" class="btn btn-secondary"><i class="fas fa-file-pdf"></i> Download PDF</button>
                            </div>
                        </div>
                    </header>
                    <div class="page-section">
                        <div class="card card-fluid">
                            <div class="card-header">
                                <h6 class="card-title"> Client Details </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Name:</strong> {{ $user->name }}</p>
                                        <p><strong>Email:</strong> {{ $user->email }}</p>
                                        <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
                                        <p><strong>Address:</strong> {{ $user->address ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Total Orders:</strong> {{ $totalOrders }}</p>
                                        <p><strong>Total Spent:</strong> {{ $totalSpent." $" }}</p>
                                        <p><strong>Average Order Value:</strong> {{ number_format($averageOrderValue, 2) ." $"}}</p>
                                    </div>
                                </div>
                                <h6 class="mt-4">Orders</h6>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>
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
                                                        @default
                                                            badge-secondary
                                                    @endswitch
                                                ">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $order->total_amount." $" }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ route('admin.clients.index') }}" class="btn btn-primary no-print">Back to Clients</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>

    <script>
        function downloadPDF() {
            document.querySelectorAll('.no-print').forEach(el => el.style.display = 'none');
            const element = document.querySelector('.page');
            html2pdf().from(element).save('client_{{ $user->id }}.pdf').then(() => {
                document.querySelectorAll('.no-print').forEach(el => el.style.display = '');
            });
        }
    </script>

@endsection
