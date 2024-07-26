<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Web Angkutan | Forgot Password </title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'>
<link href="{{ asset('template') }}/static/style.css" rel="stylesheet">
 <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template') }}/assets/images/logo-dinas-perhubungan.png" width="25">
{{-- <link rel="stylesheet" href="{{ url_for('static', filename='style.css') }}"> --}}
<!-- <link rel="stylesheet" href="./style.css"> -->

</head>
<body>
<!-- partial:index.partial.html -->
<div class="pt-5">
  <!-- <h1 class="text-center"> Login SPDDD</h1> -->
  
<div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">

                        {{-- @if(session()->has('success'))
                        <div class="alert alert-success alert-dimissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dimissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif --}}

                        <div class="card card-body">
                            <form action="{{ route('login-proses') }}" method="POST">
                                @csrf                        
                            {{-- <form id="submitForm" action="/login" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1"> --}}
                                {{-- <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4"> --}}
                                <img width="50px" src="{{ asset('template') }}/assets/images/logo-1.png" alt="logo user" class="type">
                                <img width="40px" src="{{ asset('template') }}/assets/images/logo-dinas-perhubungan.png" align="right" alt="logo user" class="type">
                                <div class="form-group required">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control text-lowercase @error('email') is-invalid @enderror" id="email" placeholder="Email" autofocus required value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>                    
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" for="password">Password </label>
                                        {{-- <a class="ml-auto border-link small-xl" href="/forget-password">Forget?</a> --}}
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                
                                </div>
                                <!-- <div class="form-group mt-4 mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me" data-parsley-multiple="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember me?</label>
                                    </div>
                                </div> -->
                                <div class="form-group pt-3">
                                    {{-- <button class="btn-sm btn-primary btn-block" type="submit" href="/register">Register</button> --}}
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('forget-password') }}">Forgot Password?</a>
                                </div>
                                <!-- <div class="form-group pt-1">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div> -->
                            </form>
                            <!-- <p class="small-xl pt-3 text-center">
                                <span class="text-muted">Not a member?</span>
                                <a href="/signup">Sign up</a>
                            </p> -->
                            {{-- <small class="d-block text-center mt-2">Not registered?<a href="/register">Register Now!</a></small> --}}
                        </div>
                    </div>
                </div>
            </div>
</div>
<!-- partial -->
    <!-- Sweet-Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif

    @if ($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif

</body>
</html>
