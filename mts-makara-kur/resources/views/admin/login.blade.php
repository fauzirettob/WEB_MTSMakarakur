<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin — MTs MAKARA KUR</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    body {
      min-height: 100vh;
      display: grid;
      place-items: center;
      background: linear-gradient(140deg, #073b2d, #0d5c46);
      padding: 1rem;
    }

    .card {
      background: #fff;
      border-radius: 16px;
      padding: 2.4rem;
      width: 100%;
      max-width: 380px;
      border-top: 5px solid #f0c34a;
      box-shadow: 0 24px 60px rgba(0, 0, 0, .35);
    }

    h1 {
      font-size: 1.25rem;
      color: #073b2d;
      text-align: center;
      margin-bottom: .3rem;
    }

    p.sub {
      font-size: .85rem;
      color: #6d7d78;
      text-align: center;
      margin-bottom: 1.6rem;
    }

    label {
      display: block;
      font-size: .85rem;
      font-weight: 600;
      color: #10231d;
      margin-bottom: .4rem;
    }

    input[type=email],
    input[type=password] {
      width: 100%;
      padding: .8rem 1rem;
      border: 1.5px solid #e2e9e6;
      border-radius: 10px;
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    input:focus {
      outline: none;
      border-color: #0d5c46;
    }

    .check {
      display: flex;
      align-items: center;
      gap: .5rem;
      font-size: .85rem;
      color: #4b5d57;
      margin-bottom: .4rem;
    }

    button {
      width: 100%;
      margin-top: .8rem;
      padding: .85rem;
      border: none;
      border-radius: 10px;
      background: #0d5c46;
      color: #fff;
      font-size: 1rem;
      font-weight: 700;
      cursor: pointer;
    }

    button:hover {
      background: #0a4b39;
    }

    .error {
      background: #fdecec;
      color: #b23b3b;
      font-size: .85rem;
      padding: .7rem 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
    }

    a.reg {
      display: block;
      text-align: center;
      margin-top: 1.2rem;
      font-size: .88rem;
      color: #0d5c46;
      font-weight: 600;
    }

    a.back {
      display: block;
      text-align: center;
      margin-top: .6rem;
      font-size: .85rem;
      color: #6d7d78;
    }
  </style>
</head>

<body>
  <form method="POST" action="{{ route('admin.login.post') }}" class="card">
    @csrf
    <h1>Admin Madrasah</h1>
    <p class="sub">MTs MAKARA KUR — kelola galeri dokumentasi</p>
    @error('email')
    <p class="error">{{ $message }}</p>@enderror
    <label for="email">Email admin</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <label class="check"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
    <button type="submit">Masuk</button>
    <a class="reg" href="{{ route('admin.register') }}">Belum punya akun? Daftar admin</a>
    <a class="back" href="/">← Kembali ke website</a>
  </form>
</body>

</html>