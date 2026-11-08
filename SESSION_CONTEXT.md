# Context & Catatan Sesi - PRNU Pandansari Website

Dokumen ini mencatat konteks lengkap, keputusan arsitektur, struktur route, dan status proyek untuk dilanjutkan di sesi OpenCode berikutnya.

---

## 1. Ringkasan Proyek
- **Aplikasi**: Website Resmi PRNU (Pengurus Ranting Nahdlatul Ulama) Desa Pandansari.
- **Stack**: Laravel (PHP 8.5+), MariaDB, Tailwind CSS, Vite, Font Awesome 6.5.2.
- **Access Control**: Spatie Permission (`Super Admin`, `Admin`).

---

## 2. Struktur Route (`routes/web.php`)

### Rute Publik (Tanpa Auth)
| Method | URI | Nama Route | Controller & Method | Keterangan |
|---|---|---|---|---|
| `GET` | `/` | `home` | `HomeController@index` | Landing page |
| `GET` | `/berita-publik` | `berita.public` | `BeritaController@publicIndex` | Daftar & filter berita publik |
| `GET` | `/berita-publik/{berita}` | `berita.detail` | `BeritaController@detail` | Detail berita (bind via `slug`) |
| `GET` | `/galeri-publik` | `galeri.public` | `GaleriController@publicIndex` | Dokumentasi galeri |
| `GET` | `/struktur` | `struktur.index` | `StrukturPublicController@index` | Daftar Banom & Lembaga |
| `GET` | `/struktur/{organisasi}/anggota` | `struktur.anggota` | `StrukturPublicController@anggota` | Daftar pengurus per Banom |

### Rute Admin (`auth`, `role:Super Admin|Admin`)
| Method | URI | Nama Route | Controller | Keterangan |
|---|---|---|---|---|
| `RESOURCE` | `/berita` | `berita.*` | `BeritaController` | CRUD berita (Route Key: `slug`) |
| `RESOURCE` | `/pengurus` | `pengurus.*` | `PengurusController` | CRUD pengurus |
| `RESOURCE` | `/galeri-admin` | `galeri-admin.*` | `GaleriController` | CRUD galeri |
| `GET` | `/pengurus/{id}/pdf` | `pengurus.pdf` | `PengurusController@downloadPdf` | Cetak PDF pengurus |

---

## 3. Fitur Utama & Perubahan Terbaru

### A. Fitur Foto Banner Berita
- **Migration**: `2026_11_07_052252_add_foto_to_beritas_table.php` (menambahkan kolom `foto` nullable).
- **Model**: `Berita` (`$fillable` memuat `foto`, `getRouteKeyName()` mengembalikan `'slug'`).
- **Controller**: Upload file maks 2MB (`store('berita', 'public')`), auto-delete foto saat update/destroy.
- **Views**:
  - `resources/views/berita/create.blade.php`: Input file foto.
  - `resources/views/berita/edit.blade.php`: Input file foto + preview foto lama.
  - `resources/views/welcome.blade.php`: Foto banner pada card berita di landing page + Tombol "Lihat Semua Berita" di kanan bawah.
  - `resources/views/berita/show.blade.php`: Foto banner besar di atas konten detail berita (tema terang / light-theme).

### B. Navigasi & Access Control
- **Navigasi Admin** (`resources/views/layouts/navigation.blade.php` & `resources/views/dashboard.blade.php`):
  - Menu & tombol "Kelola Galeri" mengarah ke `route('galeri-admin.index')` (CRUD Admin).
  - Menu "Kelola Berita" mengarah ke `route('berita.index')` (CRUD Admin).
  - Menu "Kelola Pengurus" mengarah ke `route('pengurus.index')` (CRUD Admin).
- **Navigasi Publik** (`resources/views/welcome.blade.php` dll):
  - Navbar publik mengarah ke `home`, `/#berita`, `galeri.public`, `struktur.index`.
  - Tombol "Lihat Semua Berita" di kanan bawah seksi berita mengarah ke `route('berita.public')`.

---

## 4. Status Git & Commit Terakhir
Seluruh perubahan sudah di-commit secara lokal di branch `main`:
- `b9180ac` - `feat: add 'Lihat Semua Berita' button to home news section`
- `bbb2e5d` - `fix: point admin dashboard and navigation galeri links to galeri-admin.index CRUD`
- `0efeb43` - `fix: point dashboard galeri button to public galeri route`
- `9b8bcf7` - `fix: restore berita public route and use slug for admin edit/destroy`
- `b039d66` - `fix: remove stray backslash causing berita banner not to render`
- `0334010` - `feat: add foto banner to berita, update CRUD, and display in home`

---

## 5. Panduan Melanjutkan di Sesi Baru
Jika pindah sesi di OpenCode, agent baru dapat langsung membaca file ini dengan menyapa:
> *"Baca `SESSION_CONTEXT.md` dan lanjutkan pekerjaan..."*
