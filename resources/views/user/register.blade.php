<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REGISTER</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
    <script type="text/javascript" src="../../assets/js/script.js"></script>
  </head>
  <body id="page-register">
    <div id="register">
      <div class="container">
        <div class="wrapper-register">
          @if (session('error'))
          <div class="alert alert-danger">
          {{ session('error') }}
          </div>
          @endif
          <img src="../../assets/images/halalin-logo.png" />
          <h1>Daftar disini</h1>

          <div class="field">
            <form class="form-register" action="{{ route('create') }}" method="POST">
            @csrf
            <div class="boxfield">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="4">
                <path
                  d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"
                ></path>
              </svg>
              <input
                type="username"
                required
                class="username"
                name="username"
                placeholder="Username"
                value="{{ Session::get('username') }}"
              />
            </div>
            <div class="boxfield">
              <svg viewBox="-1 -2 12 10" xmlns="http://www.w3.org/2000/svg">
                <path d="m0 0h8v6h-8zm.75 .75v4.5h6.5v-4.5zM0 0l4 3 4-3v1l-4 3-4-3z"/>
              </svg>
              <input type="email" class="email-input" placeholder="Email" name="email" value="{{ Session::get('email') }}" />
            </div>
            <div class="boxfield">
              <svg class="svg-icon" viewBox="0 0 20 20">
                <path
                  d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"
                ></path>
              </svg>
              <input
                type="password"
                class="pass-input"
                placeholder="password"
                name="password"
                value="{{ Session::get('password') }}"
              />
              <i class="fa fa-eye" id="togglePassword" onclick="togglePasswordVisibility()"></i>
            </div>
            <div class="boxfield">
              <svg class="svg-icon" viewBox="0 0 20 20">
                <path
                  d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"
                ></path>
              </svg>
              <input
                type="password"
                class="pass-input"
                placeholder="Confirm Password"
                name="password_confirmation"
              />
            </div>
          <button name="submit" type="submit" class="login-btn">Daftar</button>
          </form>
          <p class="hasil">
            Sudah punya akun?
            <a href="./login" style="text-decoration: none; color: inherit"
              ><strong>Login</strong></a
            >
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
