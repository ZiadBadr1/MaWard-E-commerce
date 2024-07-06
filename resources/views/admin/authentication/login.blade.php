@extends('admin.authentication.component.main')

@section('content')


    @if(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <form class="auth-form" method="POST" action="{{route('admin.check-login')}}">
        @csrf
                <!-- .form-group -->
        <div class="form-group">
            <div class="form-label-group">
                <input type="email" id="inputUser" name="email" class="form-control" placeholder="Username" autofocus=""
                       value="{{old('email')}}"> <label for="inputUser">Email</label>
            </div>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
            <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                <label for="inputPassword">Password</label>
            </div>
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">
            <div class="custom-control custom-control-inline custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember-me"> <label
                        class="custom-control-label" for="remember-me">Keep me sign in</label>
            </div>
        </div><!-- /.form-group -->
    </form><!-- /.auth-form -->
    <!-- copyright -->

@endsection
