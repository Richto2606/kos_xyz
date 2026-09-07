# Product Requirements Document

## Sistem Manajemen Kos XYZ

**Versi:** 1.0  
**Tanggal:** 7 September 2026  
**Status:** MVP berjalan

## 1. Ringkasan Produk

Sistem Manajemen Kos XYZ adalah aplikasi web untuk menampilkan informasi kamar dan artikel, menerima booking dari calon penyewa melalui satu pintu, membantu admin mengelola kamar, penyewa, tagihan, artikel, dan booking, serta memberi informasi status booking kepada user.

## 2. Masalah

- Calon penyewa menghubungi admin melalui banyak jalur.
- Data booking berisiko tercecer atau tercatat ganda.
- User tidak memiliki cara terpusat untuk mengetahui status booking.
- Admin membutuhkan pengelolaan data kamar, penyewa, tagihan, dan artikel dalam satu dashboard.
- Informasi foto kamar dan artikel harus dapat tampil konsisten di landing page.

## 3. Tujuan

### Tujuan bisnis

- Meningkatkan jumlah booking yang tercatat.
- Memusatkan proses booking ke satu alur.
- Mengurangi pekerjaan manual admin.
- Menyediakan informasi kos yang lebih lengkap dan terpercaya.

### Tujuan user

- Melihat kamar, harga, fasilitas, foto, dan artikel.
- Mengirim booking melalui form terpusat.
- Mendapat kode booking unik.
- Mengecek status booking secara mandiri.
- Menerima pemberitahuan perubahan status.

### Tujuan admin

- Mengelola seluruh data operasional kos.
- Meninjau booking masuk.
- Mengubah status booking.
- Mengirim atau mensimulasikan notifikasi WhatsApp.
- Mengelola konten artikel dan foto.

## 4. Pengguna dan Hak Akses

### Pengunjung atau calon penyewa

Tidak perlu login. Dapat:

- Melihat landing page.
- Mencari dan memfilter kamar.
- Melihat detail kamar.
- Membaca artikel.
- Mengirim booking.
- Mengecek status dengan kode booking dan nomor HP.

### Admin

Login melalui halaman admin. Dapat:

- Melihat dashboard.
- Mengelola kamar.
- Mengelola penyewa.
- Mengelola tagihan.
- Mengelola artikel.
- Mengelola booking.
- Mengubah status booking.
- Mengirim notifikasi WhatsApp.
- Melihat data ekspor PDF dan Excel.

## 5. Ruang Lingkup MVP

### 5.1 Landing page

Landing page menampilkan:

- Hero section.
- Informasi Kos XYZ.
- Daftar kamar.
- Foto kamar.
- Harga kamar.
- Status kamar.
- Fasilitas kamar.
- Filter dan pencarian kamar.
- Galeri kamar.
- Fasilitas umum.
- Testimoni.
- FAQ.
- Blog dan artikel terbaru.
- Lokasi.
- Tombol booking.
- Navbar dengan menu Cek Status.

### 5.2 Manajemen kamar

Admin dapat:

- Menambah kamar.
- Mengubah kamar.
- Menghapus kamar.
- Mengatur nama, harga, fasilitas, deskripsi, status, dan foto.
- Menggunakan status `Tersedia`, `Penuh`, atau `Maintenance`.

Ketentuan foto:

- Format: JPG, JPEG, PNG, GIF, atau WEBP.
- Ukuran maksimal: 2 MB.
- File disimpan di `storage/app/public/kamar`.
- URL publik menggunakan symbolic link `public/storage`.
- Foto default digunakan jika foto tidak tersedia.

### 5.3 Manajemen artikel

Admin dapat:

- Menambah artikel.
- Mengubah artikel.
- Menghapus artikel.
- Mengatur judul, slug, kategori, penulis, tanggal publikasi, deskripsi, isi, status aktif, dan foto.
- Menjadikan artikel aktif atau draft.

Ketentuan artikel aktif:

- Hanya artikel dengan `is_active = true` yang tampil di halaman publik.
- Landing page menampilkan maksimal tiga artikel terbaru.
- Halaman blog menampilkan artikel aktif secara paginasi.

Ketentuan foto artikel:

- Format: JPG, JPEG, PNG, GIF, atau WEBP.
- Ukuran maksimal: 2 MB.
- File disimpan di `storage/app/public/artikel`.
- Foto default digunakan jika foto tidak tersedia.

### 5.4 Booking satu pintu

Semua tombol booking publik mengarah ke `/booking`.

Form booking berisi:

- Kamar.
- Nama lengkap.
- Nomor HP atau WhatsApp.
- Email opsional.
- Tanggal masuk.
- Durasi sewa dalam bulan.
- Catatan opsional.

Validasi:

- Kamar wajib ada dan berstatus `Tersedia`.
- Nama wajib diisi.
- Nomor HP wajib diisi.
- Email harus valid jika diisi.
- Tanggal masuk tidak boleh sebelum hari ini.
- Durasi sewa 1 sampai 24 bulan.
- Catatan maksimal 1.000 karakter.

Setelah booking berhasil:

- Sistem membuat kode unik, contoh `BK-20260907-ABCDE`.
- Status awal adalah `Menunggu`.
- User diarahkan ke halaman cek status.
- Kode booking dan nomor HP otomatis diisikan ke form status.

### 5.5 Cek status booking user

Halaman tersedia di `/booking/status`.

User mengisi:

- Kode booking.
- Nomor HP yang dipakai saat booking.

Sistem menampilkan:

- Status booking.
- Kode booking.
- Kamar.
- Nama user.
- Tanggal masuk.
- Alasan penolakan jika status `Ditolak`.
- Indikator status `Menunggu`, `Dikonfirmasi`, `Ditolak`, dan `Selesai`.

### 5.6 Manajemen booking admin

Halaman tersedia di `/admin/booking`.

Admin dapat:

- Melihat seluruh booking.
- Mencari berdasarkan kode booking.
- Mencari berdasarkan nomor HP.
- Memfilter berdasarkan status.
- Mengubah status booking.
- Menulis alasan penolakan.
- Membuka link WhatsApp manual.

Status booking:

| Status | Arti |
|---|---|
| Menunggu | Booking baru, belum diproses admin. |
| Dikonfirmasi | Booking diterima admin. |
| Ditolak | Booking ditolak admin. |
| Selesai | User sudah menyelesaikan proses masuk atau booking. |

## 6. Alur Utama Booking

1. User membuka landing page.
2. User memilih kamar tersedia.
3. User klik `Booking Sekarang`.
4. User mengisi form.
5. Sistem memvalidasi data dan ketersediaan kamar.
6. Sistem menyimpan booking dengan status `Menunggu`.
7. Sistem membuat kode booking unik.
8. User diarahkan ke halaman status.
9. Admin melihat booking di dashboard.
10. Admin mengubah status menjadi `Dikonfirmasi`, `Ditolak`, atau tetap `Menunggu`.
11. Sistem mengirim atau mensimulasikan notifikasi WhatsApp.
12. User mengecek status menggunakan kode booking dan nomor HP.
13. Setelah proses selesai, admin mengubah status menjadi `Selesai`.

## 7. Notifikasi WhatsApp

### Mode dummy

Digunakan untuk pengembangan dan testing lokal.

```env
WHATSAPP_DUMMY=true
```

Perilaku:

- Tidak mengirim pesan sungguhan.
- Mencatat simulasi pesan ke `storage/logs/laravel.log`.
- Menampilkan notifikasi simulasi berhasil di dashboard.
- Link WhatsApp manual tetap tersedia.

### Mode produksi

Menggunakan WhatsApp Cloud API Meta.

Konfigurasi:

```env
WHATSAPP_DUMMY=false
WHATSAPP_ACCESS_TOKEN=
WHATSAPP_PHONE_NUMBER_ID=
WHATSAPP_TEMPLATE_NAME=booking_status
WHATSAPP_TEMPLATE_LANGUAGE=id
```

Persyaratan:

- Akun Meta Business.
- Nomor WhatsApp Business.
- Access token aktif.
- Phone number ID.
- Template pesan disetujui Meta.
- Nomor user menggunakan format yang dapat diterima WhatsApp API.

Isi pesan minimal:

- Nama user.
- Kode booking.
- Nama kamar.
- Status booking.
- Alasan penolakan jika status `Ditolak`.

## 8. Modul Operasional Admin

### Penyewa

Admin dapat mengelola:

- Nama lengkap.
- Nomor KTP.
- Nomor HP.
- Kontak darurat.
- Pekerjaan.
- Kamar.
- Tanggal mulai sewa.
- Tanggal berakhir sewa.
- Status aktif atau nonaktif.
- Catatan.
- Foto penyewa.

### Tagihan

Admin dapat mengelola:

- Penyewa.
- Bulan.
- Tahun.
- Nominal.
- Biaya tambahan.
- Keterangan tambahan.
- Status `Unpaid`, `Pending`, atau `Paid`.
- Jatuh tempo.
- Tanggal bayar.

Sistem mendukung generate tagihan untuk penyewa aktif.

### Fasilitas

Data fasilitas menyimpan:

- Nama fasilitas.
- Ikon Font Awesome.
- Deskripsi.
- Status aktif.
- Urutan tampil.

### Pengaturan

Data pengaturan menyimpan pasangan key-value seperti:

- Nama kos.
- Alamat.
- Nomor WhatsApp.
- Email.
- Deskripsi kos.

## 9. Model Data

### `kamars`

Menyimpan data kamar dan foto kamar.

### `penyewas`

Menyimpan data penghuni dan relasi kamar.

### `tagihans`

Menyimpan tagihan penyewa.

### `artikels`

Menyimpan konten blog, status aktif, dan foto artikel.

### `bookings`

Menyimpan:

- `kode`
- `kamar_id`
- `nama_lengkap`
- `no_hp`
- `email`
- `tanggal_masuk`
- `durasi_bulan`
- `status`
- `catatan`
- `alasan_penolakan`

## 10. Kebutuhan Non-Fungsional

- Framework: Laravel 12.
- PHP minimal: 8.2.
- Database: MySQL atau SQLite untuk testing.
- Frontend asset build: Vite.
- Validasi input pada semua trust boundary.
- CSRF protection untuk form POST, PUT, PATCH, dan DELETE.
- File upload tervalidasi berdasarkan tipe dan ukuran.
- Token API tidak boleh masuk source code atau repository.
- Halaman publik responsif di desktop dan mobile.
- Status booking tidak boleh dapat diubah oleh user publik.
- Data status hanya dapat dicari dengan kombinasi kode booking dan nomor HP.

## 11. Kriteria Penerimaan MVP

### Booking

- User dapat memilih kamar tersedia.
- User dapat mengirim form booking valid.
- Booking invalid ditolak dengan pesan validasi.
- Sistem membuat kode booking unik.
- Status awal booking adalah `Menunggu`.
- User diarahkan ke halaman status setelah submit.

### Status user

- Kode booking dan nomor HP dapat digunakan untuk mencari booking.
- Data booking yang cocok tampil.
- Data tidak tampil jika kode atau nomor HP salah.
- Semua empat status dapat ditampilkan.
- Alasan penolakan tampil pada status `Ditolak`.

### Admin

- Admin dapat melihat booking.
- Admin dapat mencari booking.
- Admin dapat memfilter booking.
- Admin dapat mengubah status.
- Admin dapat mengisi alasan penolakan.
- Menu booking tampil di sidebar admin.

### WhatsApp

- Mode dummy tidak memanggil API eksternal.
- Mode dummy mencatat pesan ke log.
- Mode API memakai token dari environment.
- Kegagalan API tidak menyebabkan aplikasi crash.
- Link WhatsApp manual tersedia sebagai fallback.

### Konten dan foto

- Admin dapat upload foto kamar.
- Foto kamar tampil di landing page.
- Admin dapat upload foto artikel.
- Foto artikel tampil di landing page dan halaman blog.
- Foto lama terhapus saat diganti.
- Foto default tampil jika file tidak tersedia.

## 12. Status Implementasi Saat Ini

| Fitur | Status |
|---|---|
| Landing page | Selesai |
| CRUD kamar | Selesai |
| Upload foto kamar | Selesai |
| CRUD artikel | Selesai |
| Upload foto artikel | Selesai |
| Data dummy | Selesai |
| Booking satu pintu | Selesai |
| Cek status user | Selesai |
| Cek dan filter status admin | Selesai |
| WhatsApp dummy | Selesai |
| WhatsApp Cloud API | Kode siap, kredensial Meta diperlukan |
| Test otomatis lengkap | Belum, masih perlu test booking khusus |

## 13. Pengembangan Berikutnya

Prioritas berikutnya:

1. Tambahkan test feature untuk submit booking.
2. Tambahkan test pencarian status booking.
3. Tambahkan pencegahan double booking berdasarkan tanggal dan kamar.
4. Tambahkan notifikasi email sebagai fallback.
5. Pindahkan pengiriman WhatsApp ke queue agar request admin tetap cepat.
6. Tambahkan audit log perubahan status.
7. Tambahkan autentikasi admin berbasis user database, bukan kredensial hardcode.
8. Tambahkan pagination pada daftar booking admin.
9. Tambahkan dashboard metrik booking.
10. Tambahkan rate limit pada endpoint cek status.
