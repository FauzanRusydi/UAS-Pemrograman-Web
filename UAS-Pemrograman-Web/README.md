# CMS Portal  
**Proyek UAS Pemrograman Web**

CMS Portal adalah aplikasi **Content Management System sederhana** yang dibuat menggunakan **CodeIgniter 3**.  
Aplikasi ini digunakan untuk mengelola artikel dan kategori, serta memiliki halaman admin dan halaman publik.

Project ini dibuat untuk memenuhi kebutuhan **Ujian Akhir Semester (UAS)** mata kuliah Pemrograman Web.

---

## Fitur Utama

### 1. Autentikasi Admin
- Login dan logout admin
- Session untuk membatasi akses halaman admin

### 2. Manajemen Artikel
- CRUD artikel (tambah, lihat, edit, hapus)
- Status artikel: Draft / Published
- Artikel bisa memiliki lebih dari satu kategori

### 3. Kategori
- Menambah, mengedit, dan menghapus kategori
- Filter artikel berdasarkan kategori

### 4. Halaman Publik
- Menampilkan daftar artikel
- Halaman detail artikel
- Pencarian artikel berdasarkan judul/konten

### 5. Dashboard Admin
- Melihat daftar artikel
- Aksi cepat: edit dan hapus artikel

---

## Teknologi yang Digunakan

- **PHP 8.1**
- **CodeIgniter 3**
- **MariaDB / MySQL**
- **Bootstrap 4**
- **Docker & Docker Compose**

---

## Struktur Database (Singkat)

- `users` → data admin
- `artikel` → data artikel
- `kategori` → data kategori
- `artikel_kategori` → relasi artikel dan kategori

---

## Cara Menjalankan Aplikasi

### 1. Clone Repository
```bash
git clone https://github.com/maulanrizky/UAS-Pemrograman-Web.git
cd UAS-Pemrograman-Web-Rizky
```

### 2. Jalankan Docker
`docker compose up -d --build`

### 3. Akses Aplikasi
Website:
`http://localhost:8080`
Admin Panel:
`http://localhost:8080/auth/login`
Akun Admin:
- Username: admin
- Password: admin123

## Struktur Direktori Utama
```bash
application/
├── controllers/
├── models/
├── views/
system/
docker-compose.yml
Dockerfile
```

## Catatan
- Project ini menggunakan konsep MVC (Model View Controller)
- Validasi form dan session dikelola oleh CodeIgniter
- Database sudah disiapkan otomatis saat container dijalankan

## Identitas Mahasiswa
- Nama: Maulana Rizky
- NIM: 2410054
- Mata Kuliah: Pemrograman Web
- Tahun: 2026
