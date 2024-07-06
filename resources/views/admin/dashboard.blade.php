@extends('admin.layouts.master')

@section('content')
    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <h1 class="page-title">Dashboard</h1>
                    </header>
                    <div class="page-section">
                        <div class="row">
                            <!-- Total Orders -->
                            <div class="col-md-3">
                                <a href="{{ route('admin.order.index') }}" class="card card-body bg-primary text-white mb-4 text-decoration-none">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">Total Orders</h6>
                                            <div class="display-4">{{ $totalOrders }}</div>
                                        </div>
                                        <div>
                                            <i class="fas fa-shopping-cart fa-2x"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Total Users -->
                            <div class="col-md-3">
                                <a href="{{ route('admin.clients.index') }}" class="card card-body bg-secondary text-white mb-4 text-decoration-none">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">Total Users</h6>
                                            <div class="display-4">{{ $totalUsers }}</div>
                                        </div>
                                        <div>
                                            <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Total Products -->
                            <div class="col-md-3">
                                <a href="{{ route('admin.product.index') }}" class="card card-body bg-success text-white mb-4 text-decoration-none">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">Total Products</h6>
                                            <div class="display-4">{{ $totalProducts }}</div>
                                        </div>
                                        <div>
                                            <i class="fas fa-boxes fa-2x"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Net Profit -->
                            <div class="col-md-3">
                                <div class="card card-body bg-info text-white mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">Net Profit</h6>
                                            <div class="display-4">${{ number_format($netProfit, 2) }}</div>
                                        </div>
                                        <div>
                                            <i class="fas fa-dollar-sign fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Pending Orders -->
                            <div class="col-md-3">
                                <a href="{{ route('admin.order.index', ['status' => 'pending']) }}" class="card card-body bg-warning text-white mb-4 text-decoration-none">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">Pending Orders</h6>
                                            <div class="display-4">{{ $pendingOrders }}</div>
                                        </div>
                                        <div>
                                            <i class="fas fa-clock fa-2x"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Shipped Orders -->
                            <div class="col-md-3">
                                <a href="{{ route('admin.order.index', ['status' => 'shipped']) }}" class="card card-body bg-primary text-white mb-4 text-decoration-none">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">Shipped Orders</h6>
                                            <div class="display-4">{{ $shippedOrders }}</div>
                                        </div>
                                        <div>
                                            <i class="fas fa-truck fa-2x"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Delivered Orders -->
                            <div class="col-md-3">
                                <a href="{{ route('admin.order.index', ['status' => 'delivered']) }}" class="card card-body bg-success text-white mb-4 text-decoration-none">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title">Delivered Orders</h6>
                                            <div class="display-4">{{ $deliveredOrders }}</div>
                                        </div>
                                        <div>
                                            <i class="fas fa-check fa-2x"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Latest Orders -->
                        <div class="card card-fluid">
                            <div class="card-header">
                                <h6 class="card-title">Latest Orders</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Client Name</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($latestOrders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->client->name ?? 'N/A' }}</td>
                                                <td>{{ ucfirst($order->status) }}</td>
                                                <td>{{ $order->total_amount }}</td>
                                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.order.show', $order) }}" class="btn btn-sm btn-icon btn-secondary">
                                                        <i class="fas fa-eye"></i> <span class="sr-only">View</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- Charts -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-fluid">
                                    <div class="card-header">
                                        <h6 class="card-title">Orders by Month</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="ordersChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-fluid">
                                    <div class="card-header">
                                        <h6 class="card-title">Revenue by Month</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="revenueChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ordersCtx = document.getElementById('ordersChart').getContext('2d');
            var revenueCtx = document.getElementById('revenueChart').getContext('2d');

            var ordersChart = new Chart(ordersCtx, {
                type: 'bar',
                data: {
                    labels: [@foreach(range(1, 12) as $month) "{{ DateTime::createFromFormat('!m', $month)->format('F') }}", @endforeach],
                    datasets: [{
                        label: 'Orders',
                        data: [@foreach(range(1, 12) as $month) {{ $ordersByMonth[$month] ?? 0 }}, @endforeach],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: [@foreach(range(1, 12) as $month) "{{ DateTime::createFromFormat('!m', $month)->format('F') }}", @endforeach],
                    datasets: [{
                        label: 'Revenue',
                        data: [@foreach(range(1, 12) as $month) {{ $revenueByMonth[$month] ?? 0 }}, @endforeach],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        function downloadPDF() {
            document.querySelectorAll('.btn-toolbar').forEach(el => el.style.display = 'none');
            const element = document.querySelector('.page');
            html2pdf().from(element).save('dashboard.pdf').then(() => {
                document.querySelectorAll('.btn-toolbar').forEach(el => el.style.display = '');
            });
        }
    </script>

@endsection
