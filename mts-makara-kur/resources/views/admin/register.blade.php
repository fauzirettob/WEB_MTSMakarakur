<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Admin — MTs MAKARA KUR</title>
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
      max-width: 400px;
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

    input {
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

    .hint {
      font-size: .75rem;
      color: #6d7d78;
      margin-top: -.8rem;
      margin-bottom: 1rem;
    }

    button {
      width: 100%;
      margin-top: .4rem;
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

    a.login {
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
  <form method="POST" action="{{ route('admin.register.post') }}" class="card">
    @csrf
    <h1>Daftar Admin Baru</h1>
    <p class="sub">Buat akun untuk mengelola galeri dokumentasi madrasah</p>
    @error('name')
    <p class="error">{{ $message }}</p>@enderror
    <label for="name">Nama lengkap</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
    @error('email')
    <p class="error">{{ $message }}</p>@enderror
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    @error('password')
    <p class="error">{{ $message }}</p>@enderror
    <label for="password">Password (minimal 8 karakter)</label>
    <input type="password" id="password" name="password" required minlength="8">
    <label for="password_confirmation">Ulangi password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8">
    <button type="submit">Buat Akun Admin</button>
    <a class="login" href="{{ route('admin.login') }}">Sudah punya akun? Masuk</a>
    <a class="back" href="/">← Kembali ke website</a>
  </form>
</body>

</html>