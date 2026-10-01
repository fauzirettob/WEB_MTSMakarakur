<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Dokumentasi — MTs MAKARA KUR</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    body {
      background: #f5f9f7;
      color: #10231d;
      min-height: 100vh;
    }

    header {
      background: #073b2d;
      color: #fff;
      padding: .9rem 0;
    }

    .wrap {
      max-width: 1000px;
      margin: 0 auto;
      padding: 0 1.2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      flex-wrap: wrap;
    }

    header strong {
      font-size: 1rem;
    }

    header a {
      color: #f0c34a;
      font-size: .85rem;
      text-decoration: none;
      border: 1px solid #f0c34a;
      padding: .4rem .9rem;
      border-radius: 999px;
    }

    header a:hover {
      background: #f0c34a;
      color: #073b2d;
    }

    main {
      max-width: 1000px;
      margin: 2rem auto;
      padding: 0 1.2rem;
    }

    .upload {
      background: #fff;
      border-radius: 16px;
      border-top: 5px solid #f0c34a;
      padding: 1.6rem;
      box-shadow: 0 8px 24px rgba(16, 35, 29, .06);
    }

    h1 {
      font-size: 1.15rem;
      color: #073b2d;
      margin-bottom: 1rem;
    }

    .row {
      display: grid;
      grid-template-columns: 1fr 1fr auto;
      gap: 1rem;
      align-items: end;
    }

    label {
      display: block;
      font-size: .85rem;
      font-weight: 600;
      margin-bottom: .4rem;
    }

    input[type=text],
    input[type=file] {
      width: 100%;
      padding: .7rem .9rem;
      border: 1.5px solid #e2e9e6;
      border-radius: 10px;
      font-size: .95rem;
      background: #fff;
    }

    button.up {
      padding: .8rem 1.4rem;
      border: none;
      border-radius: 10px;
      background: #0d5c46;
      color: #fff;
      font-weight: 700;
      cursor: pointer;
    }

    button.up:hover {
      background: #0a4b39;
    }

    .error {
      background: #fdecec;
      color: #b23b3b;
      font-size: .85rem;
      padding: .7rem 1rem;
      border-radius: 8px;
      margin-top: 1rem;
    }

    .ok {
      background: #e6f7ee;
      color: #12775a;
      font-size: .85rem;
      padding: .7rem 1rem;
      border-radius: 8px;
      margin-top: 1rem;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
      gap: 1.1rem;
      margin-top: 2rem;
    }

    figure {
      background: #fff;
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid #e2e9e6;
      position: relative;
    }

    figure img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      display: block;
    }

    figcaption {
      padding: .7rem .9rem;
      font-size: .85rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: .5rem;
    }

    figcaption span {
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    form.del button {
      border: none;
      background: #b23b3b;
      color: #fff;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      cursor: pointer;
      flex-shrink: 0;
    }

    .empty {
      grid-column: 1/-1;
      text-align: center;
      color: #6d7d78;
      padding: 2.4rem;
      border: 2px dashed #e2e9e6;
      border-radius: 14px;
    }

    @media (max-width: 700px) {
      .row {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="wrap">
      <strong>Admin Dokumentasi — MTs MAKARA KUR</strong>
      <div style="display:flex; gap:.6rem;">
        <a href="/" target="_blank">Lihat Website</a>
        <form method="POST" action="{{ route('admin.logout') }}">@csrf
          <button type="submit"
            style="all:unset; cursor:pointer; color:#f0c34a; font-size:.85rem; border:1px solid #f0c34a; padding:.4rem .9rem; border-radius:999px;">Keluar</button>
        </form>
      </div>
    </div>
  </header>

  <main>
    <section class="upload">
      <h1>Unggah Foto Dokumentasi</h1>
      <form method="POST" action="{{ route('admin.fotos.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div>
            <label for="foto">Pilih foto (JPG/PNG/WebP, maks 10 MB)</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
          </div>
          <div>
            <label for="caption">Keterangan (opsional)</label>
            <input type="text" id="caption" name="caption" placeholder="cth: Kegiatan apel pagi siswa"
              value="{{ old('caption') }}">
          </div>
          <button class="up" type="submit">Unggah</button>
        </div>
        @error('foto')
        <p class="error">{{ $message }}</p>@enderror
        @error('caption')
        <p class="error">{{ $message }}</p>@enderror
      </form>
      @if (session('success'))
      <p class="ok">{{ session('success') }}</p>@endif
    </section>

    <div class="grid">
      @forelse ($fotos as $foto)
        <figure>
          <img src="{{ $foto->url }}" alt="{{ $foto->caption ?? 'Foto dokumentasi' }}" loading="lazy">
          <figcaption>
            <span title="{{ $foto->caption }}">{{ $foto->caption ?: 'Tanpa keterangan' }}</span>
            <form class="del" method="POST" action="{{ route('admin.fotos.destroy', $foto) }}"
              onsubmit="return confirm('Hapus foto ini?')">
              @csrf @method('DELETE')
              <button type="submit" title="Hapus">×</button>
            </form>
          </figcaption>
        </figure>
      @empty
        <p class="empty">Belum ada foto. Unggah foto pertama di atas — foto langsung tampil di halaman dokumentasi
          website.</p>
      @endforelse
    </div>
  </main>
</body>

</html>