<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Web Angkutan | Login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'>
  <link href="{{ asset('template') }}/static/style.css" rel="stylesheet">
  <!-- Ikon Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template') }}/assets/images/logo-dinas-perhubungan.png" width="25">
  <style>
    .error-message {
      color: red;
      display: none;
      font-size: 12px; /* Mengatur ukuran huruf lebih kecil */
    }
  </style>
</head>
<body>
<div class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card card-body">
          <form id="loginForm" action="{{ route('login-proses') }}" method="POST" novalidate>
            @csrf                        
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
              <div class="error-message" id="emailError">Email tidak boleh kosong.</div>
            </div>                    
            <div class="form-group required">
              <label class="d-flex flex-row align-items-center" for="password">Password </label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <div class="error-message" id="passwordError">Password tidak boleh kosong.</div>
            </div>
            <div class="form-group pt-3">
              <button class="btn btn-primary btn-block" type="submit">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

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

<script>
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');
    var isValid = true;

    emailError.style.display = 'none';
    passwordError.style.display = 'none';
    
    if (!email.value) {
      isValid = false;
      email.classList.add('is-invalid');
      emailError.style.display = 'block';
    } else {
      email.classList.remove('is-invalid');
    }
    
    if (!password.value) {
      isValid = false;
      password.classList.add('is-invalid');
      passwordError.style.display = 'block';
    } else {
      password.classList.remove('is-invalid');
    }

    if (!isValid) {
      event.preventDefault();
    }
  });

  document.getElementById('email').addEventListener('input', function() {
    this.classList.remove('is-invalid');
    document.getElementById('emailError').style.display = 'none';
  });

  document.getElementById('password').addEventListener('input', function() {
    this.classList.remove('is-invalid');
    document.getElementById('passwordError').style.display = 'none';
  });
</script>

</body>
</html>
