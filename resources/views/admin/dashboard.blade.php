@extends('admin.layouts.master')
@section('active-dashboard','has-active')

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
                        <div class="d-flex flex-column flex-md-row">
                            <p class="lead">
                                <span class="font-weight-bold">Supper Admin.</span> <span class="d-block text-muted">Here’s what’s happening with your business today.</span>
                            </p>
                            <div class="ml-auto">
                                <!-- .dropdown -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><span>This Week</span> <i
                                                class="fa fa-fw fa-caret-down"></i></button> <!-- .dropdown-menu -->
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-md stop-propagation">
                                        <div class="dropdown-arrow"></div><!-- .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="dpToday"
                                                   name="dpFilter" data-start="2019/03/27" data-end="2019/03/27"> <label
                                                    class="custom-control-label d-flex justify-content-between"
                                                    for="dpToday"><span>Today</span> <span
                                                        class="text-muted">Mar 27</span></label>
                                        </div><!-- /.custom-control -->
                                        <!-- .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="dpYesterday"
                                                   name="dpFilter" data-start="2019/03/26" data-end="2019/03/26"> <label
                                                    class="custom-control-label d-flex justify-content-between"
                                                    for="dpYesterday"><span>Yesterday</span> <span
                                                        class="text-muted">Mar 26</span></label>
                                        </div><!-- /.custom-control -->
                                        <!-- .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="dpWeek" name="dpFilter"
                                                   data-start="2019/03/21" data-end="2019/03/27" checked> <label
                                                    class="custom-control-label d-flex justify-content-between"
                                                    for="dpWeek"><span>This Week</span> <span
                                                        class="text-muted">Mar 21-27</span></label>
                                        </div><!-- /.custom-control -->
                                        <!-- .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="dpMonth"
                                                   name="dpFilter" data-start="2019/03/01" data-end="2019/03/27"> <label
                                                    class="custom-control-label d-flex justify-content-between"
                                                    for="dpMonth"><span>This Month</span> <span
                                                        class="text-muted">Mar 1-31</span></label>
                                        </div><!-- /.custom-control -->
                                        <!-- .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="dpYear" name="dpFilter"
                                                   data-start="2019/01/01" data-end="2019/12/31"> <label
                                                    class="custom-control-label d-flex justify-content-between"
                                                    for="dpYear"><span>This Year</span> <span
                                                        class="text-muted">2019</span></label>
                                        </div><!-- /.custom-control -->
                                        <!-- .custom-control -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="dpCustom"
                                                   name="dpFilter" data-start="2019/03/27" data-end="2019/03/27"> <label
                                                    class="custom-control-label" for="dpCustom">Custom</label>
                                            <div class="custom-control-hint my-1">
                                                <!-- datepicker:range -->
                                                <input type="text" class="form-control" id="dpCustomInput"
                                                       data-toggle="flatpickr" data-mode="range"
                                                       data-disable-mobile="true" data-date-format="Y-m-d">
                                                <!-- /datepicker:range -->
                                            </div>
                                        </div><!-- /.custom-control -->
                                    </div><!-- /.dropdown-menu -->
                                </div><!-- /.dropdown -->
                            </div>
                        </div>
                    </header><!-- /.page-title-bar -->
                    <!-- .page-section -->
                    <div class="page-section">
                        <!-- .section-block -->
                        <div class="section-block">
                            <!-- metric row -->
                            <div class="metric-row">
                                <div class="col-lg-9">
                                    <div class="metric-row metric-flush">
                                        <!-- metric column -->
                                        <div class="col">
                                            <!-- .metric -->
                                            <a href="user-teams.html" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Total Blogs </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-people"></i></sub> <span class="value">8</span>
                                                </p>
                                            </a> <!-- /.metric -->
                                        </div><!-- /metric column -->
                                        <!-- metric column -->
                                        <div class="col">
                                            <!-- .metric -->
                                            <a href="user-projects.html"
                                               class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Total Tickets </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-fork"></i></sub> <span class="value">12</span>
                                                </p>
                                            </a> <!-- /.metric -->
                                        </div><!-- /metric column -->
                                        <!-- metric column -->
                                        <div class="col">
                                            <!-- .metric -->
                                            <a href="user-tasks.html" class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Total Clients </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="fa fa-tasks"></i></sub> <span class="value">64</span>
                                                </p>
                                            </a> <!-- /.metric -->
                                        </div><!-- /metric column -->
                                    </div>
                                </div><!-- metric column -->
                            </div><!-- /metric row -->
                        </div><!-- /.section-block -->
                        <!-- title -->
                        <h1 class="page-title"> Invoices </h1>
                        <!-- .page-section -->
                        <div class="page-section">
                            <!-- .card -->
                            <div class="card card-fluid">
                                <!-- .card-body -->
                                <div class="card-body">
                                    <!-- .table -->
                                    <table id="dt-responsive" class="table dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Image</th>
                                            <th> Client</th>
                                            <th> invoice date</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Image</th>
                                            <th> Client</th>
                                            <th> invoice date</th>
                                        </tr>
                                        <tr>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Image</th>
                                            <th> Client</th>
                                            <th> invoice date</th>
                                        </tr>
                                        <tr>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Image</th>
                                            <th> Client</th>
                                            <th> invoice date</th>
                                        </tr>
                                        <tr>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Image</th>
                                            <th> Client</th>
                                            <th> invoice date</th>
                                        </tr>
                                        <tr>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Image</th>
                                            <th> Client</th>
                                            <th> invoice date</th>
                                        </tr>
                                        <tr>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Image</th>
                                            <th> Client</th>
                                            <th> invoice date</th>
                                        </tr>
                                        <tr>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Image</th>
                                            <th> Client</th>
                                            <th> invoice date</th>
                                        </tr>
                                    </table><!-- /.table -->
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.page-section -->
                        <div class="col-12 col-lg-6 col-xl-4">
                            <!-- .card -->
                            <div class="card card-fluid">
                                <!-- .card-body -->
                                <div class="card-body">
                                    <h3 class="card-title"> Tickets Performance </h3><!-- easy-pie-chart -->
                                    <div class="text-center pt-3">
                                        <div class="chart-inline-group" style="height:214px">
                                            <div class="easypiechart" data-toggle="easypiechart" data-percent="60"
                                                 data-size="214" data-bar-color="#346CB0" data-track-color="false"
                                                 data-scale-color="false" data-rotate="225"></div>
                                            <div class="easypiechart" data-toggle="easypiechart" data-percent="50"
                                                 data-size="174" data-bar-color="#00A28A" data-track-color="false"
                                                 data-scale-color="false" data-rotate="225"></div>
                                            <div class="easypiechart" data-toggle="easypiechart" data-percent="75"
                                                 data-size="134" data-bar-color="#5F4B8B" data-track-color="false"
                                                 data-scale-color="false" data-rotate="225"></div>
                                        </div>
                                    </div><!-- /easy-pie-chart -->
                                </div><!-- /.card-body -->
                                <!-- .card-footer -->
                                <div class="card-footer">
                                    <div class="card-footer-item">
                                        <i class="fa fa-fw fa-circle text-indigo"></i> 100%
                                        <div class="text-muted small"> Assigned</div>
                                    </div>
                                    <div class="card-footer-item">
                                        <i class="fa fa-fw fa-circle text-purple"></i> 75%
                                        <div class="text-muted small"> Open Ticket</div>
                                    </div>
                                    <div class="card-footer-item">
                                        <i class="fa fa-fw fa-circle text-teal"></i> 60%
                                        <div class="text-muted small"> Solved Ticket</div>
                                    </div>
                                </div><!-- /.card-footer -->
                            </div><!-- /.card -->
                        </div><!-- /grid column -->

                    </div><!-- /.page-inner -->
                </div><!-- /.page -->
            </div>
        </div><!-- /.page-section -->
@endsection
