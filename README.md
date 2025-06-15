# 📱 IANM Monitoring - Sistem Monitoring RT/RW Net

IANM Monitoring adalah aplikasi backend berbasis Laravel untuk memantau koneksi klien pada jaringan RT/RW Net. Aplikasi ini memungkinkan integrasi langsung dengan perangkat Mikrotik, notifikasi otomatis, serta pemantauan koneksi klien secara real-time.

---

## 🔧 Fitur Utama

### 1. 👥 Manajemen Klien

-   [ ] Tambah, edit, dan hapus data klien
-   [ ] Status aktif / tidak aktif
-   [ ] Jenis langganan

### 1. 👥 Manajemen Perangkat

-   [ ] Tambah, edit, dan hapus data perangkat
-   [ ] Status aktif / tidak aktif

### 2. 🌐 Monitoring Koneksi

-   [ ] Ping otomatis ke perangkat
-   [ ] Deteksi status online / offline
-   [ ] Catatan uptime dan waktu terakhir aktif

### 3. 📊 Dashboard Admin

-   [ ] Statistik jumlah klien
-   [ ] Daftar klien offline
-   [ ] Grafik pemakaian bandwidth
-   [ ] Tabel pemakaian harian

### 4. 🔌 Integrasi Mikrotik

-   [ ] Akses data dari RouterOS via API
-   [ ] Menampilkan:

    -   [ ] Bandwidth (Tx/Rx) uplink
    -   [ ] Bandwidth (Tx/Rx) setiap client
    -   [ ] ARP Table
    -   [ ] Queue status

### 5. 🔔 Notifikasi

-   [ ] Pemberitahuan otomatis jika klien offline terlalu lama
-   [ ] Mendukung:

    -   [ ] Telegram Bot API

### 6. 💰 Fitur Manajemen Keuangan

-   [ ] Catat pengeluaran
-   [ ] Catat pemasukan dari pemasangan perangkat
-   [ ] Catat pemasukan dari biaya langganan
-   [ ] Laporan total pendapatan per bulan dari setiap klien
-   [ ] Laporan total pendapatan

---

## 🧱 Teknologi yang Digunakan

| Komponen            | Teknologi                     |
| ------------------- | ----------------------------- |
| Backend             | Laravel 12 + Sanctum          |
| Frontend (opsional) | React.js                      |
| Database            | PostgreSQL                    |
| Mikrotik API        | RouterOS PHP API Client       |
| Monitoring Ping     | Laravel Scheduler + ICMP Ping |
| Notifikasi          | Telegram Bot API              |
| Monitoring aplikasi |                               |
| Manajemen Log       |                               |
| Deployment          |                               |

---

## 🚀 Cara Deploy

### 1. Clone Repository

```bash
git clone https://github.com/username/ianm-monitoring.git
cd ianm-monitoring
```

### 2. Install Dependensi

```bash
composer install
```

Jika menggunakan frontend berbasis Vite (Vue/React):

```bash
npm install
npm run build
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` untuk mengatur:

-   Konfigurasi database (`DB_*`)
-   Pengaturan Redis
-   Pengaturan email (`MAIL_*`)
-   API token Telegram

### 4. Migrasi Database

```bash
php artisan migrate
```

### 5. Jalankan Laravel Scheduler

Tambahkan ke crontab server Anda:

```bash
* * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
```

### 6. Menjalankan Server

```bash
php artisan serve
```

Atau gunakan Laravel Octane/Supervisor untuk mode produksi.

### 7. (Opsional) Jalankan Queue Worker

```bash
php artisan queue:work
```

Untuk menjalankan queue secara background (disarankan di production):

```bash
php artisan queue:work --daemon
```

---

## 📬 Kontribusi

Pull request dan kontribusi sangat terbuka! Silakan fork repository ini, buat perubahan yang diperlukan, dan ajukan PR. Untuk laporan bug atau permintaan fitur, gunakan tab [Issues](https://github.com/helloinnu/mon-ianm-be/issues).

---

## 📄 Lisensi

Proyek ini dilisensikan dengan **MIT License**.

Silakan digunakan, dimodifikasi, dan disebarluaskan sesuai kebutuhan. Mohon cantumkan atribusi bila memungkinkan.

---
