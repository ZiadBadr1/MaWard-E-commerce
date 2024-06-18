@if(session('success'))
    <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show text-left">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong> {{session('success')}}</strong>
        </div>
    </div>
@endif

@if(session('info'))
    <div class="col-12">
        <div class="alert alert-info alert-dismissible fade show text-left">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong> {{session('info')}}</strong>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show text-left">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong> {{session('error')}}</strong>
        </div>
    </div>
@endif
