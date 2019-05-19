@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center" style="color: white">E-Career Guidance System</h1>
            <h3 class="text-center" style="color: white">System to suggest for you the best career based on your IQ and Personality Tests</h3>
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body" style="background-color: cyan">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label>
                                    <input type="checkbox"
                                           name="remember">Remember me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn-primary">
                                    Login
                                </button>
                                <a href="{{ route('auth.register') }}"
                                        class="btn btn-default">
                                    Register
                                </a>
                                <br>
                                <a href="{{ route('auth.password.reset') }}">Forgot password</a>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="text-center" style="color: white">Created by <a href="http://laraveldaily.com">Laravel Daily Team</a></div> --}}
            {{-- <div class="text-center" style="color: white">Powered by <a href="https://quickadminpanel.com">QuickAdminPanel.com</a></div> --}}
        </div>
    </div>
@endsection
