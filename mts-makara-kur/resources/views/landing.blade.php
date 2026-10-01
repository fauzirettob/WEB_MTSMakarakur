<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MTs MAKARA KUR — Madrasah Tsanawiyah</title>
  <meta name="description"
    content="Website resmi MTs MAKARA KUR. Madrasah Tsanawiyah yang unggul dalam ilmu, berakhlak mulia, dan berwawasan global." />
  <meta name="theme-color" content="#0d5c46" />

  <meta property="og:type" content="website" />
  <meta property="og:title" content="MTs MAKARA KUR" />
  <meta property="og:description"
    content="Madrasah Tsanawiyah yang unggul dalam ilmu, berakhlak mulia, dan berwawasan global." />

  <link rel="icon" type="image/png" href="assets/logo-mts.png" />
  <link rel="apple-touch-icon" href="assets/logo-mts.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Amiri:wght@700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('styles.css') }}" />
</head>

<body>
  <!-- ============ TOP BAR ============ -->
  <div class="topbar">
    <div class="container topbar__inner">
      <span class="topbar__item">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path
            d="M12 2a7 7 0 0 0-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5Z" />
        </svg>
        Jl. Pendidikan No. 12, Kec. Makara, Indonesia
      </span>
      <span class="topbar__item">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path
            d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25c1.1.37 2.3.56 3.5.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.2.2 2.4.56 3.5a1 1 0 0 1-.25 1l-2.2 2.2Z" />
        </svg>
        <a href="tel:+6281234567890">0812-3456-7890</a>
      </span>
      <span class="topbar__item topbar__item--mail">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path
            d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Zm8 7L4.3 6.2A1 1 0 0 0 4 7v10h16V7a1 1 0 0 0-.3-.8L12 11Z" />
        </svg>
        <a href="mailto:info@mtsmesmakarukur.sch.id">info@mtsmesmakarukur.sch.id</a>
      </span>
      <a class="topbar__cta" href="#ppdb">Daftar PPDB 2026/2027</a>
    </div>
  </div>

  <!-- ============ NAVBAR ============ -->
  <header class="nav" id="nav">
    <div class="container nav__inner">
      <a href="#home" class="brand">
        <img class="brand__logo" src="{{ asset('assets/logo-mts.png') }}" width="256" height="241" alt="" />
        <span class="brand__text">
          <strong>MTs MAKARA KUR</strong>
          <small>Madrasah Tsanawiyah</small>
        </span>
      </a>
      <nav class="nav__links" id="navLinks" aria-label="Navigasi utama">
        <a href="#home" class="is-active">Beranda</a>
        <a href="#profil">Profil</a>
        <a href="#program">Program</a>
        <a href="#fasilitas">Fasilitas</a>
        <a href="#guru">Struktur Organisasi</a>
        <a href="#berita">Berita</a>
        <a href="#dokumentasi">Dokumentasi</a>
        <a href="#kontak">Kontak</a>
      </nav>
      @auth
        <a href="{{ url('/admin') }}" class="btn btn--primary nav__cta">Kelola Dokumentasi</a>
      @else
        <a href="{{ route('admin.login') }}" class="btn btn--primary nav__cta">Login Admin</a>
      @endauth
      <button class="nav__toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <!-- ============ HERO ============ -->
  <section class="hero" id="home">
    <div class="hero__bg" aria-hidden="true"></div>
    <div class="container hero__inner">
      <div class="hero__content">
        <p class="hero__arabic">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
        <h1>Membentuk Generasi <span>Berilmu &amp; Berakhlak Mulia</span></h1>
        <p class="hero__lead">
          MTs MAKARA KUR adalah madrasah tsanawiyah yang memadukan keunggulan
          akademik, penguatan nilai keislaman, dan keterampilan abad 21 untuk
          melahirkan lulusan yang siap bersaing dan berakhlak.
        </p>
        <div class="hero__actions">
          <a href="#ppdb" class="btn btn--primary btn--lg">Daftar Sekarang</a>
          <a href="#profil" class="btn btn--ghost btn--lg">Kenali Madrasah</a>
        </div>
        <ul class="hero__points">
          <li>✓ Pembelajaran berbasis digital</li>
          <li>✓ Tahfidz &amp; literasi Al-Qur'an</li>
          <li>✓ Kelas kecil, perhatian maksimal</li>
        </ul>
      </div>

      <aside class="hero__card hero__card--photo">
        <img class="hero__principal-photo" src="{{ asset('assets/kepala-madrasah.jpg') }}" width="332" height="601"
          loading="eager" alt="Kepala Madrasah UMUYATI RETTOB, S.Pd." />
        <div class="hero__principal-name">
          <strong>UMUYATI RETTOB, S.Pd.</strong>
          <strong>NIP. 198109072005012015</strong>
          <small>Kepala Madrasah</small>
        </div>
      </aside>
    </div>

  </section>

  <!-- ============ SAMBUTAN KEPALA MADRASAH ============ -->
  <section class="section section--tint" id="sambutan">
    <div class="container sambutan">
      <figure class="principal">
        <img class="principal__photo" src="{{ asset('assets/kepala-madrasah.jpg') }}"
          alt="UMUYATI RETTOB, S.Pd., Kepala MTs MAKARA KUR" width="332" height="601" loading="lazy" />
        <figcaption>
          <strong>UMUYATI RETTOB, S.Pd.</strong>
          <strong>NIP. 198109072005012015
            .</strong>
          <span>Kepala Madrasah</span>
        </figcaption>
      </figure>

      <div class="sambutan__text">
        <span class="eyebrow">Sambutan</span>
        <h2>Sambutan Kepala Madrasah</h2>
        <p class="sambutan__greet">Assalamu'alaikum warahmatullahi wabarakatuh.</p>
        <p>
          Selamat datang di situs resmi MTs MAKARA KUR. Melalui halaman ini kami
          berbagi kabar tentang kegiatan, program, dan capaian madrasah kami.
        </p>
        <p>
          Kami percaya pendidikan yang baik menyeimbangkan ilmu dan akhlak. Karena itu
          pembelajaran akademik kami berjalan bersama pembiasaan ibadah, tahfidz
          Al-Qur'an, serta pembinaan karakter yang kami rawat bersama seluruh guru dan
          wali kelas.
        </p>
        <p>
          Terima kasih atas kepercayaan Bapak/Ibu. Mari bersama membentuk generasi muslim
          yang berilmu, berakhlak mulia, dan bermanfaat bagi sesama.
        </p>
        <p class="sambutan__sign">
          Wassalamu'alaikum warahmatullahi wabarakatuh.
          <span>UMUYATI RETTOB, S.Pd. — Kepala MTs MAKARA KUR</span>
        </p>
      </div>
    </div>
  </section>

  <!-- ============ PROFIL ============ -->
  <section class="section" id="profil">
    <div class="container">
      <header class="section__head">
        <span class="eyebrow">Tentang Kami</span>
        <h2>Profil MTs MAKARA KUR</h2>
        <p class="section__sub">
          Berdiri sejak 1998, kami tumbuh menjadi madrasah rujukan yang mengedepankan
          mutu akademik sekaligus pembinaan karakter islami.
        </p>
      </header>

      <div class="profil">
        <div class="profil__card profil__card--visi">
          <h3>Visi</h3>
          <p>
            Terbentuknya generasi muslim, berilmu, beramal saleh, berakhlakul karimah, bertanggung jawab, terampil dan
            kreatif.

          </p>
        </div>
        <div class="profil__card">
          <h3>Misi</h3>
          <ul>
            <li>Menyelenggarakan pendidikan umum dan agama yang mengedepankan peningkatan kualitas guru dan siswa dalam
              bidang IPTEK dan
              IMTAK.</li>
            <li>MMengembangkan dan mengamalkan nilai-nilai akhlakul karimah yang sesuai dengan ajaran Islam dalam
              kehidupan sehari-hari.</li>
            <li>Meningkatkan kebiasaan perilaku disiplin dan bertanggung jawab dalam kehidupan bermasyarakat baik dalam
              lingkungan
              berkeluarga, madrasah maupun masyarakat.</li>
          </ul>
        </div>
        <div class="profil__card profil__card--quote">
          <blockquote>
            “Pendidikan bukan hanya soal nilai di atas kertas, tetapi tentang
            membentuk manusia yang bermanfaat bagi sesama.”
          </blockquote>
          <p class="profil__author">— UMUYATI RETTOB, S.Pd., Kepala Madrasah</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ PROGRAM ============ -->
  <section class="section section--tint" id="program">
    <div class="container">
      <header class="section__head">
        <span class="eyebrow">Akademik</span>
        <h2>Program Unggulan</h2>
        <p class="section__sub">Kurikulum Merdeka dengan kekhasan madrasah dan penguatan kompetensi abad 21.</p>
      </header>

      <div class="grid grid--3">
        <article class="card">
          <div class="card__icon">
            <svg viewBox="0 0 24 24">
              <path d="M12 3 1 9l11 6 9-4.9V17h2V9L12 3ZM5 13.2V17c0 1.7 3.1 3 7 3s7-1.3 7-3v-3.8l-7 3.8-7-3.8Z" />
            </svg>
          </div>
          <h3>Kelas Tahfidz Al-Qur'an</h3>
          <p>Program hafalan bertingkat dengan target 3–5 juz, dibimbing hafidz/hafidzah dan muroja'ah harian.</p>
        </article>
        <article class="card">
          <div class="card__icon">
            <svg viewBox="0 0 24 24">
              <path d="M9.4 16.6 4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4Zm5.2 0 4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4Z" />
            </svg>
          </div>
          <h3>Literasi &amp; Numerasi</h3>
          <p>Pembiasaan membaca 15 menit, pojok baca, dan bimbingan olimpiade sains serta matematika.</p>
        </article>
        <article class="card">
          <div class="card__icon">
            <svg viewBox="0 0 24 24">
              <path d="M4 4h16v12H4V4Zm2 14h12v2H6v-2Zm3-9h2v5H9V9Zm4-3h2v8h-2V6Z" />
            </svg>
          </div>
          <h3>Bahasa Asing</h3>
          <p>Bahasa Inggris dan Bahasa Arab intensif dengan program percakapan mingguan (English &amp; Arabic Day).</p>
        </article>
        <article class="card">
          <div class="card__icon">
            <svg viewBox="0 0 24 24">
              <path
                d="M12 2a7 7 0 0 1 7 7c0 3.9-3.1 7-7 7s-7-3.1-7-7a7 7 0 0 1 7-7Zm0 16c3.3 0 6.2 1.3 8 3.3V22H4v-.7c1.8-2 4.7-3.3 8-3.3Z" />
            </svg>
          </div>
          <h3>Sains &amp; Teknologi</h3>
          <p>Laboratorium komputer, robotika dasar, dan proyek STEM terintegrasi mata pelajaran.</p>
        </article>
        <article class="card">
          <div class="card__icon">
            <svg viewBox="0 0 24 24">
              <path d="M12 21s-7-4.4-9.3-8.3A5.4 5.4 0 0 1 12 6.5a5.4 5.4 0 0 1 9.3 6.2C19 16.6 12 21 12 21Z" />
            </svg>
          </div>
          <h3>Pembinaan Karakter</h3>
          <p>Sholat berjamaah, mentoring keislaman, kepramukaan, dan program peduli sosial.</p>
        </article>
        <article class="card">
          <div class="card__icon">
            <svg viewBox="0 0 24 24">
              <path
                d="M12 2 3 6v6c0 5 3.8 9.2 9 10 5.2-.8 9-5 9-10V6l-9-4Zm0 5.5 1.6 3.3 3.6.5-2.6 2.5.6 3.6L12 15.7l-3.2 1.7.6-3.6-2.6-2.5 3.6-.5L12 7.5Z" />
            </svg>
          </div>
          <h3>Bimbingan Karier</h3>
          <p>Konseling jurusan, kunjungan kampus, dan persiapan masuk SMA/SMK/MA favorit.</p>
        </article>
      </div>

      <h3 class="subhead">Ekstrakurikuler</h3>
      <div class="chips">
        <span class="chip">Pramuka</span>
        <span class="chip">Futsal</span>
        <span class="chip">Basket</span>
        <span class="chip">Paskibra</span>
        <span class="chip">Marawis</span>
        <span class="chip">Kaligrafi</span>
        <span class="chip">Pidato 3 Bahasa</span>
        <span class="chip">Jurnalistik</span>
        <span class="chip">Robotik</span>
        <span class="chip">Tari Tradisional</span>
        <span class="chip">PMR</span>
        <span class="chip">Catur</span>
      </div>
    </div>
  </section>

  <!-- ============ FASILITAS ============ -->
  <section class="section" id="fasilitas">
    <div class="container">
      <header class="section__head">
        <span class="eyebrow">Sarana &amp; Prasarana</span>
        <h2>Fasilitas Madrasah</h2>
        <p class="section__sub">Lingkungan belajar yang nyaman, aman, dan mendukung tumbuh kembang siswa.</p>
      </header>
      <div class="facilities">
        <figure class="facility facility--lg">
          <img src="{{ asset('assets/fasilitas/gedung-1.jpeg') }}" alt="Gedung sekolah satu" loading="lazy" width="900"
            height="675" />
          <figcaption><strong>2 Gedung Sekolah</strong><span>Masing-masing terdiri dari 3 ruang kelas dan 1 ruang
              guru</span></figcaption>
        </figure>
        <figure class="facility">
          <img src="{{ asset('assets/fasilitas/ruang-kelas-1.jpg') }}" alt="Ruang kelas" loading="lazy" width="900"
            height="675" />
          <figcaption><strong>6 Ruang Kelas</strong><span>3 kelas di gedung satu, 3 kelas di gedung dua</span>
          </figcaption>
        </figure>
        <figure class="facility">
          <img src="{{ asset('assets/fasilitas/ruang-guru-1.jpg') }}" alt="Ruang guru" loading="lazy" width="900"
            height="675" />
          <figcaption><strong>2 Ruang Guru</strong><span>Satu ruang guru di tiap gedung</span></figcaption>
        </figure>
        <figure class="facility">
          <img src="{{ asset('assets/fasilitas/gedung-2.jpg') }}" alt="Gedung sekolah dua" loading="lazy" width="900"
            height="675" />
          <figcaption><strong>Gedung Dua</strong><span>3 ruang kelas dan 1 ruang guru</span></figcaption>
        </figure>
        <figure class="facility">
          <img src="{{ asset('assets/fasilitas/ruang-kelas-2.jpg') }}" alt="Ruang kelas" loading="lazy" width="900"
            height="675" />
          <figcaption><strong>Ruang Kelas Gedung Dua</strong><span>Ruang belajar yang nyaman</span></figcaption>
        </figure>
        <figure class="facility">
          <img src="{{ asset('assets/fasilitas/ruang-guru-2.jpg') }}" alt="Ruang guru" loading="lazy" width="900"
            height="675" />
          <figcaption><strong>Ruang Guru Gedung Dua</strong><span>Tempat guru menyiapkan pembelajaran</span>
          </figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- ============ STRUKTUR ORGANISASI & GURU ============ -->
  <section class="section section--tint" id="guru">
    <div class="container">
      <header class="section__head">
        <span class="eyebrow">Tenaga Pendidik</span>
        <h2>Struktur Organisasi &amp; Guru Pengajar</h2>
        <p class="section__sub">
          Susunan pimpinan, wali kelas, dan guru yang mengajar di MTs MAKARA KUR.
        </p>
      </header>

      <div class="org">
        <!-- Tingkat 1 — Kepala Madrasah &amp; Komite -->
        <div class="org__level org__level--head">
          <article class="org__node org__node--lead">
            <img class="org__avatar org__avatar--photo" src="{{ asset('assets/kepala-madrasah.jpg') }}" alt=""
              aria-hidden="true" width="68" height="68" loading="lazy" />
            <h3>UMUYATI RETTOB, S.Pd.</h3>
            <h3>NIP. 198109072005012015</h3>
            <p class="org__role">Kepala Madrasah</p>
          </article>
          <article class="org__node org__node--komite">
            <span class="org__avatar" aria-hidden="true">SN</span>
            <h3>SALIM NARWAWAN</h3>
            <p class="org__role">Komite Madrasah</p>
          </article>
        </div>

        <div class="org__link" aria-hidden="true"></div>

        <!-- Tingkat 2 — Wakil Kepala &amp; Bendahara -->
        <div class="org__level org__level--waka">
          <article class="org__node">
            <span class="org__avatar" aria-hidden="true">MK</span>
            <h3>MIRNA KABA, S.Pd.</h3>
            <p class="org__role">Waka Kurikulum</p>
          </article>
          <article class="org__node">
            <span class="org__avatar" aria-hidden="true">SR</span>
            <h3>SISABRI RETTOB, S.Pdi</h3>
            <p class="org__role">Waka Kesiswaan</p>
          </article>
          <article class="org__node">
            <span class="org__avatar" aria-hidden="true">DN</span>
            <h3>DANIATI NARWAWAN</h3>
            <p class="org__role">Waka Sarpras</p>
          </article>
          <article class="org__node">
            <span class="org__avatar" aria-hidden="true">SS</span>
            <h3>SALIS SERMAF, S.Pd.</h3>
            <p class="org__role">Waka Humas</p>
          </article>
          <article class="org__node org__node--bendahara">
            <span class="org__avatar" aria-hidden="true">SK</span>
            <h3>SITI KHADIJA RETTOB, S.P.d.</h3>
            <p class="org__role">Bendahara</p>
          </article>
        </div>

        <div class="org__link" aria-hidden="true"></div>

        <!-- Tingkat 3 — Wali Kelas -->
        <div class="org__level org__level--wali">
          <article class="org__node">
            <span class="org__avatar" aria-hidden="true">FL</span>
            <h3>FELI LETSOIN</h3>
            <p class="org__role">Wali Kelas VII</p>
          </article>
          <article class="org__node">
            <span class="org__avatar" aria-hidden="true">SN</span>
            <h3>SITI NURIAH RETTOB, S.Pdi</h3>
            <p class="org__role">Wali Kelas VIII</p>
          </article>
          <article class="org__node">
            <span class="org__avatar" aria-hidden="true">MK</span>
            <h3>MIRNA KABA, S.pd.</h3>
            <p class="org__role">Wali Kelas IX</p>
          </article>
        </div>
      </div>

      <p class="org__note">
        Seluruh wakil kepala, bendahara, dan wali kelas di atas merupakan guru yang mengajar
        di MTs MAKARA KUR. Sebagian nama dapat tercantum pada lebih dari satu jabatan
        sesuai penugasan madrasah.
      </p>
    </div>
  </section>

  <!-- ============ BERITA ============ -->
  <section class="section" id="berita">
    <div class="container">
      <header class="section__head">
        <span class="eyebrow">Informasi</span>
        <h2>Berita &amp; Agenda</h2>
        <p class="section__sub">Kabar terbaru seputar kegiatan dan prestasi siswa-siswi madrasah.</p>
      </header>

      <div class="news">
        <article class="news__item">
          <span class="news__date">12 Sep 2026</span>
          <h3>Siswa MTs MAKARA KUR Raih Juara 1 Olimpiade Matematika</h3>
          <p>Prestasi membanggakan kembali ditorehkan pada ajang Olimpiade Sains tingkat kabupaten.</p>
          <a href="#" class="link">Baca selengkapnya →</a>
        </article>
        <article class="news__item">
          <span class="news__date">28 Agu 2026</span>
          <h3>Peringatan Maulid Nabi &amp; Lomba Marawis Antar Kelas</h3>
          <p>Rangkaian kegiatan diisi ceramah, lomba kaligrafi, dan penampilan grup marawis siswa.</p>
          <a href="#" class="link">Baca selengkapnya →</a>
        </article>
        <article class="news__item">
          <span class="news__date">05 Agu 2026</span>
          <h3>Pembukaan PPDB Tahun Ajaran 2026/2027 Gelombang I</h3>
          <p>Pendaftaran dibuka secara online maupun langsung di kampus madrasah.</p>
          <a href="#" class="link">Baca selengkapnya →</a>
        </article>
        <article class="news__item">
          <span class="news__date">20 Jul 2026</span>
          <h3>Masa Ta'aruf Siswa Baru Berlangsung Meriah</h3>
          <p>Kegiatan pengenalan lingkungan madrasah diikuti 210 siswa baru.</p>
          <a href="#" class="link">Baca selengkapnya →</a>
        </article>
      </div>
    </div>
  </section>

  <!-- ============ DOKUMENTASI (galeri dari database, unggah lewat halaman admin) ============ -->
  <section class="section section--tint" id="dokumentasi">
    <div class="container">
      <div class="section__head">
        <span class="eyebrow">Dokumentasi Kegiatan</span>
        <h2>Galeri Madrasah</h2>
        <p>
          Momen dan kegiatan di MTs MAKARA KUR. Foto dikelola oleh admin
          madrasah melalui halaman admin dan tersimpan di database sekolah.
        </p>
      </div>

      <div class="gallery reveal" id="gallery" aria-live="polite">
        @forelse ($fotos as $foto)
          <figure class="gallery__item">
            <img src="{{ $foto->url }}" alt="{{ $foto->caption ?: 'Foto dokumentasi madrasah' }}" loading="lazy"
              width="800" height="600" data-caption="{{ $foto->caption }}" style="cursor: zoom-in;" />
            <div class="gallery__meta">
              <figcaption>{{ $foto->caption }}</figcaption>
              @if($foto->dateLabel)<span class="gallery__date">{{ $foto->dateLabel }}</span>@endif
            </div>
          </figure>
        @empty
          <p class="gallery__empty" id="galleryEmpty">
            Belum ada foto dokumentasi. Foto yang diunggah admin akan tampil di sini.
          </p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ============ LIGHTBOX ============ -->
  <div class="lightbox" id="lightbox" hidden>
    <button class="lightbox__close" id="lightboxClose" aria-label="Tutup">×</button>
    <figure>
      <img id="lightboxImg" src="" alt="" />
      <figcaption id="lightboxCaption"></figcaption>
    </figure>
  </div>

  <!-- ============ PPDB ============ -->
  <section class="section ppdb" id="ppdb">
    <div class="container ppdb__inner">
      <div class="ppdb__text">
        <span class="eyebrow eyebrow--light">PPDB 2026/2027</span>
        <h2>Bergabunglah bersama kami</h2>
        <p>
          Pendaftaran terbuka untuk lulusan SD/MI sederajat. Isi formulir singkat di
          samping, lalu tim kami akan menghubungi Anda untuk verifikasi berkas.
        </p>
        <ul class="ppdb__list">
          <li><strong>Gelombang I:</strong> 1 Agu – 30 Nov 2026 <span class="tag">Diskon 25%</span></li>
          <li><strong>Gelombang II:</strong> 1 Des 2026 – 30 Jun 2027</li>
          <li><strong>Berkas:</strong> Fotokopi ijazah, KK, akta, foto 3×4</li>
        </ul>
      </div>

      <form class="form" id="ppdbForm" novalidate>
        <h3>Formulir Pendaftaran</h3>
        <div class="field">
          <label for="nama">Nama Lengkap Siswa</label>
          <input type="text" id="nama" name="nama" placeholder="Contoh: Ahmad Fauzan" required />
          <small class="error" data-error-for="nama"></small>
        </div>
        <div class="field-row">
          <div class="field">
            <label for="telepon">No. WhatsApp</label>
            <input type="tel" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" required />
            <small class="error" data-error-for="telepon"></small>
          </div>
          <div class="field">
            <label for="asal">Asal Sekolah</label>
            <input type="text" id="asal" name="asal" placeholder="SD / MI" required />
            <small class="error" data-error-for="asal"></small>
          </div>
        </div>
        <div class="field">
          <label for="programPilihan">Pilihan Program</label>
          <select id="programPilihan" name="program">
            <option value="reguler">Reguler</option>
            <option value="tahfidz">Kelas Tahfidz Al-Qur'an</option>
            <option value="sains">Kelas Sains &amp; Olimpiade</option>
          </select>
        </div>
        <div class="field">
          <label for="pesan">Catatan (opsional)</label>
          <textarea id="pesan" name="pesan" rows="3" placeholder="Pertanyaan atau informasi tambahan"></textarea>
        </div>
        <button type="submit" class="btn btn--gold btn--block">Kirim Pendaftaran</button>
        <p class="form__note">Data Anda hanya digunakan untuk keperluan pendaftaran.</p>
        <p class="form__success" id="formSuccess" hidden>
          ✓ Terima kasih! Pendaftaran Anda tercatat. Tim PPDB akan menghubungi Anda melalui WhatsApp.
        </p>
      </form>
    </div>
  </section>

  <!-- ============ KONTAK ============ -->
  <section class="section" id="kontak">
    <div class="container">
      <header class="section__head">
        <span class="eyebrow">Hubungi Kami</span>
        <h2>Kontak &amp; Lokasi</h2>
        <p class="section__sub">Kunjungi kampus kami atau sampaikan pertanyaan melalui kanal berikut.</p>
      </header>

      <div class="contact">
        <div class="contact__info">
          <div class="contact__item">
            <span class="contact__icon" aria-hidden="true">📍</span>
            <div><strong>Alamat</strong>
              <p>Jl. Pendidikan No. 12, Kec. Makara, Indonesia 12345</p>
            </div>
          </div>
          <div class="contact__item">
            <span class="contact__icon" aria-hidden="true">📞</span>
            <div><strong>Telepon / WhatsApp</strong>
              <p><a href="tel:+6281234567890">0812-3456-7890</a></p>
            </div>
          </div>
          <div class="contact__item">
            <span class="contact__icon" aria-hidden="true">✉️</span>
            <div><strong>Email</strong>
              <p><a href="mailto:info@mtsmesmakarukur.sch.id">info@mtsmesmakarukur.sch.id</a></p>
            </div>
          </div>
          <div class="contact__item">
            <span class="contact__icon" aria-hidden="true">🕘</span>
            <div><strong>Jam Layanan</strong>
              <p>Senin – Jumat, 07.00 – 15.00 WIB</p>
            </div>
          </div>
        </div>
        <div class="contact__map">
          <iframe title="Peta lokasi MTs MAKARA KUR"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.6399092848756!2d131.9822415755185!3d-5.318736953330555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d3affb085c0eeeb%3A0xcbbef60dd99545b9!2sMts.%20Makara%20Kur!5e0!3m2!1sen!2sid!4v1790782577389!5m2!1sen!2sid"
            style="border: 0" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ FOOTER ============ -->
  <footer class="footer">
    <div class="container footer__inner">
      <div class="footer__col">
        <div class="brand brand--light">
          <img class="brand__logo" src="{{ asset('assets/logo-mts.png') }}" width="256" height="241" alt="" />
          <span class="brand__text">
            <strong>MTs MAKARA KUR</strong>
            <small>Madrasah Tsanawiyah</small>
          </span>
        </div>
        <p class="footer__about">
          Madrasah tsanawiyah yang membina generasi berilmu, berakhlak mulia,
          dan berwawasan global sejak 1998.
        </p>
      </div>
      <div class="footer__col">
        <h4>Tautan Cepat</h4>
        <ul>
          <li><a href="#profil">Profil Madrasah</a></li>
          <li><a href="#program">Program &amp; Ekstrakurikuler</a></li>
          <li><a href="#fasilitas">Fasilitas</a></li>
          <li><a href="#ppdb">PPDB 2026/2027</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>Informasi</h4>
        <ul>
          <li><a href="#berita">Berita &amp; Agenda</a></li>
          <li><a href="#dokumentasi">Galeri Dokumentasi</a></li>
          <li><a href="#guru">Struktur &amp; Guru Pengajar</a></li>
          <li><a href="#kontak">Kontak</a></li>
          <li><a href="#">Kalender Akademik</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>Ikuti Kami</h4>
        <div class="social">
          <a href="#" aria-label="Instagram">IG</a>
          <a href="#" aria-label="Facebook">FB</a>
          <a href="#" aria-label="YouTube">YT</a>
          <a href="#" aria-label="TikTok">TT</a>
        </div>
        <p class="footer__addr">Jl. Pendidikan No. 12<br />Kec. Makara, Indonesia 12345</p>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="container footer__bottom-inner">
        <p>© <span id="year">2026</span> MTs MAKARA KUR. Seluruh hak cipta dilindungi.</p>
        <p>Dibuat dengan ❤ untuk pendidikan.</p>
      </div>
    </div>
  </footer>

  <a href="#home" class="to-top" id="toTop" aria-label="Kembali ke atas">↑</a>

  <script src="{{ asset('script.js') }}"></script>
</body>

</html>