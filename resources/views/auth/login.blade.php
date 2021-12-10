@extends('layouts.app')

@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                   <div class="login-brand">
                        <center><img src="{{ asset ('assets/admin/img/stisla-fill.svg') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle"></center>
                    </div>
                    <div class="card card-primary">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                        :value="old('email')" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                    <div class="float-right">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-small">
                                            Forgot Password?
                                        </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                            id="remember-me" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>

<<<<<<< HEAD
                </form>
                <div class="row sm-gutters">
                </div>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="/register">Create One</a>
            </div>
            <div class="simple-footer">
            Copyright &copy; 2021 <a href="/" target="_blank">Sahabatbk </a>
=======
                            </form>
                            <div class="text-center mt-4 mb-3">
                                <div class="text-job text-muted">Masuk Menggunakan Sosial Media</div>
                            </div>
                            <div class="row sm-gutters">
                                <div class="col-12">
                                    <a class="btn btn-block btn-social btn-google">
                                        <span class="fab fa-google"></span>Continue With Google
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="/register">Create One</a>
                    </div> -->
                    <div class="simple-footer">
                        Copyright &copy; 2021 <a href="#" target="_blank">Sahabat BK</a>
                    </div>
                </div>
>>>>>>> 76d632995533fa51cf83f35f28890a34e5481594
            </div>
        </div>
    </section>
</div>
@endsection
