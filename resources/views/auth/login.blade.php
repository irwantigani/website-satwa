<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login</title>
  <meta name="description" content="Login to your account">
  <meta name="keywords" content="login, authentication, STIKMA">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      background-image: url('{{ asset('images/bg.jpg') }}');
      background-size: cover;
      background-position: center;
      font-family: 'Nunito', sans-serif;
      color: #333;
      overflow: hidden;
    }

    .form-card {
      background: rgba(255, 255, 255, 0.85);
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      padding: 30px;
    }

    .form-card h5 {
      font-weight: bold;
      color: #333;
    }

    .form-card input {
      border-radius: 10px;
    }

    .form-card .btn-primary {
      border-radius: 10px;
      background: #007bff;
      border: none;
      transition: all 0.3s;
    }

    .form-card .btn-primary:hover {
      background: #0056b3;
    }

    .form-footer {
      font-size: 14px;
      margin-top: 10px;
    }

    .form-footer a {
      color: #007bff;
      text-decoration: none;
    }

    .form-footer a:hover {
      text-decoration: underline;
    }

    .leaf-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      pointer-events: none;
    }

    .leaf {
      position: absolute;
      width: 50px;
      height: 50px;
      background-image: url('{{ asset('images/laef.png') }}');
      background-size: contain;
      background-repeat: no-repeat;
      animation: fly 10s linear infinite;
    }

    @keyframes fly {
      0% {
        transform: translateY(-100px) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(100vh) rotate(360deg);
        opacity: 0;
      }
    }
  </style>
</head>

<body>
  <!-- Leaf Animation Container -->
  <div class="leaf-container">
    <div class="leaf" style="left: 10%; animation-delay: 0s;"></div>
    <div class="leaf" style="left: 30%; animation-delay: 2s;"></div>
    <div class="leaf" style="left: 50%; animation-delay: 4s;"></div>
    <div class="leaf" style="left: 70%; animation-delay: 6s;"></div>
    <div class="leaf" style="left: 90%; animation-delay: 8s;"></div>
  </div>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <h1><span class="d-none d-lg-block">STIKMA</span></h1>
              </div>
              <!-- Form Card -->
              <div class="form-card">
                <h5 class="text-center">Login to Your Account</h5>
                <p class="text-center small">Enter your username & password to login</p>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                  <div class="d-flex justify-content-between mb-3">
                     <div>
                     <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePassword()">
                    <label class="form-check-label" for="showPassword">Tampilkan Password</label>
                      </div>
                      @if (Route::has('password.request'))
                    
                    @endif
                    </div>
                  <button class="btn btn-primary w-100" type="submit">Login</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <script>
  function togglePassword() {
    const passwordField = document.getElementById('password');
    const showPasswordCheckbox = document.getElementById('showPassword');
    // Ubah tipe input sesuai status checkbox
    passwordField.type = showPasswordCheckbox.checked ? 'text' : 'password';
  }
</script>



  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
