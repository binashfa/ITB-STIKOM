# CMS Website Kampus ITB STIKOM Bali

Sistem ini merupakan **Content Management System (CMS)** berbasis web yang dibuat untuk mengelola website resmi kampus **ITB STIKOM Bali**.
CMS ini memungkinkan admin untuk mengatur berbagai konten website secara dinamis tanpa perlu mengubah kode secara langsung.

---

## Fitur Utama

### News Management

* Tambah berita
* Edit berita
* Hapus berita
* Publish & Unpublish (Draft)

### Fakultas & Program Studi

* Kelola data fakultas
* Kelola program studi
* Edit langsung (inline edit)

### Kerjasama

* Tambah data kerjasama
* Edit langsung di tabel
* Hapus data

### Sejarah Kampus

* Update judul dan deskripsi sejarah
* Data tersimpan di database (1 record)

### Visi & Misi

* Update visi kampus
* Tambah, edit, dan hapus misi
* Tampilan dinamis di halaman user

### Fasilitas Kampus

* Input fasilitas berbasis list (Enter = 1 data)
* Ditampilkan dalam bentuk grid di halaman user

### Sambutan Rektor

* Input nama rektor
* Input jabatan
* Input isi sambutan
* Upload foto rektor

---

## Teknologi yang Digunakan

* **Framework**: CodeIgniter 4
* **Frontend**: HTML, Tailwind CSS
* **Database**: MySQL
* **JavaScript**: Vanilla JS (fetch API & interactivity)

---

## Struktur Fitur (Admin Panel)

Admin panel terdiri dari beberapa tab:

* News
* Fakultas
* Kerjasama
* Sejarah
* Visi Misi
* Sambutan
* Fasilitas

Semua data dapat dikelola dalam satu dashboard.

---

## Sistem Login

* Admin login melalui `/4dm1n`
* Session digunakan untuk autentikasi
* Logout tersedia di sidebar

---

## Cara Menjalankan Project

1. Clone repository

```bash
git clone <repository-url>
```

2. Masuk ke folder project

```bash
cd project-name
```

3. Jalankan server

```bash
php spark serve
```

4. Akses di browser

```
http://localhost:8080
```

---

## Konfigurasi Database

1. Buat database baru di MySQL
2. Import file database (jika ada)
3. Atur koneksi di file:

```
app/Config/Database.php
```

---

## Konsep CMS

* Data disimpan di database
* View mengambil data secara dinamis
* Admin dapat update tanpa coding
* Beberapa data menggunakan konsep:

  * Single record (sejarah, visi)
  * Multi record (misi, berita, kerjasama)

---

## Tujuan Project

Membuat sistem CMS sederhana untuk:

* Memudahkan pengelolaan website kampus
* Menampilkan informasi kampus secara dinamis
* Melatih implementasi MVC (Model-View-Controller)

---

## Developer

Dikembangkan oleh: Hubbyna Ashfa Isyny

---

## Catatan

* Sistem masih dapat dikembangkan lebih lanjut
* Bisa ditambahkan:

  * Role user
  * Dashboard statistik
  * Upload multiple images
  * Rich text editor

---

## Penutup

CMS ini dibuat sebagai sistem pengelolaan website kampus ITB STIKOM Bali yang sederhana, fleksibel, dan mudah digunakan.

---
