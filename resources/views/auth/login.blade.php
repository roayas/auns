<style>


.card-header:first-child {
    color: white;
    background:#008E89;
}

button.btn.btn-primary {
color: #fff;
border-color:#008E89;
background: #008E89;
    
}

a.btn.btn-link{
    color: #008E89;
}

input#remember.form-check-input {
color: #008E89;
    border-color:#008E89;
}

div.card{
    color: #008E89;
}

</style>





@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
 <div class="page-header"style="background-image: url('https://www.nehhc.com/wp-content/uploads/2016/11/ThinkstockPhotos-578806154.jpg%27');
 padding: 90px 0 40px 0;"  >
        <div class="container" >
            <div class="row">
             
                <div class="col-12">
                    <h1 class="page_title">Login</h1>
                </div>
            </div>
    </div>
    </div>
    <!-- Page Header End -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                               <a href=""></a> <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
{{-- 
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
