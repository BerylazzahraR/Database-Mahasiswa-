<div align="center">

<img src="public/images/logo-kampus.png" alt="Sikampus Logo" width="120"/>

# 🎓 Sikampus  
### Sistem Informasi Kampus — Laravel 12

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue)
![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-Ready-38bdf8)
![License](https://img.shields.io/badge/License-MIT-green)

Aplikasi web **Sistem Informasi Kampus (SIAKAD sederhana)**  
untuk **manajemen data mahasiswa** dengan tampilan **clean, modern, dan profesional**.

</div>

---

## 📌 Tentang Project

**Sikampus** adalah aplikasi berbasis web yang dibuat untuk mengelola **data mahasiswa** secara sederhana namun rapi.  
Project ini dibangun menggunakan **Laravel 12** dan **Tailwind CSS**, dengan pendekatan **satu model dan satu tabel** agar mudah dipahami dan dikembangkan.

Project ini cocok untuk:
- 📚 Tugas kuliah / UAS
- 🧪 Latihan Laravel
- 💼 Portofolio dasar backend & frontend

---

## ✨ Fitur Utama

- 📋 **CRUD Mahasiswa**
  - Tambah, lihat, edit, dan hapus data mahasiswa
- 🔍 **Pencarian & Pagination**
  - Cari berdasarkan **Nama / NIM / Jurusan**
- 🗂 **Satu Model & Satu Tabel**
  - Fokus pada entitas `Mahasiswa`
- 🎨 **UI ala SIAKAD**
  - Light theme
  - Tone warna biru kampus
  - Responsive (Tailwind CSS)
- 🧪 **Database Seeder**
  - Generate **25 data mahasiswa random**
  - Format email otomatis:
    ```
    {NIM}@student.pnm.ac.id
    ```

---

## 🧱 Teknologi yang Digunakan

| Teknologi | Keterangan |
|---------|------------|
| Laravel | Framework Backend (v12) |
| PHP | Bahasa pemrograman (≥ 8.2) |
| Tailwind CSS | UI & Styling |
| MySQL / MariaDB | Database |
| Vite | Asset bundler |

---

## 🗃 Struktur Database

### Tabel: `mahasiswas`

| Kolom | Tipe | Keterangan |
|-----|------|-----------|
| nim | string | Nomor Induk Mahasiswa (unique) |
| nama | string | Nama mahasiswa |
| email | string | Email mahasiswa (unique) |
| jurusan | string | Program studi |
| angkatan | integer | Tahun angkatan |
| tanggal_lahir | date | Opsional |
| alamat | text | Opsional |
| created_at | timestamp | Otomatis |
| updated_at | timestamp | Otomatis |

---

## 🚀 Cara Menjalankan Project

### 1️⃣ Clone Repository
```bash
git clone https://github.com/BerylazzahraR/Database-Mahasiswa-
cd sikampus
