<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #f5f7fb;
      }

      .page {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      .card {
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 380px;
      }

      .card-title {
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
      }

      .form-group {
        margin-bottom: 15px;
      }

      .form-label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
      }

      .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
      }

      .btn {
        display: inline-block;
        width: 100%;
        padding: 10px;
        text-align: center;
        font-size: 15px;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        background-color: #4188c9;
        color: #fff;
        cursor: pointer;
        transition: 0.3s;
      }

      .btn:hover {
        background-color: #316da5;
      }

      .text-center {
        text-align: center;
      }

      .text-muted {
        color: #888;
        font-size: 14px;
        margin-top: 15px;
      }

      .logo {
        display: block;
        margin: 0 auto 15px auto;
        height: 40px;
      }

      /* خطأ تحت input */
      .text-danger {
        color: #b30000;
        font-size: 13px;
        margin-top: 5px;
      }
    </style>
  </head>
  <body>
    <div class="page">
      <div class="card">
        <div class="card-title">Create New Account</div>

        <form method="POST" action="{{ route('handleregister') }}">
          @csrf
          <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" value="{{ old('name') }}">
            @error('name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="email" value="{{ old('email') }}">
            @error('email')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password">
            @error('password')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn">Create new account</button>
        </form>

        <div class="text-center text-muted">
          Already have an account? <a href="{{ route('login') }}">Sign in</a>
        </div>
      </div>
    </div>
  </body>
</html>
