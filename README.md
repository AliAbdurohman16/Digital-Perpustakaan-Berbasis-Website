# Panduan Menjalankan Program

Ini adalah panduan langkah demi langkah untuk menjalankan aplikasi Laravel dari awal hingga selesai. Ikuti instruksi di bawah ini untuk menginstal dependensi, mengatur database, dan menjalankan server pengembangan Laravel.

## Persyaratan

Sebelum memulai, pastikan Anda memenuhi persyaratan berikut:

- [PHP](https://www.php.net/) versi 8.0 atau lebih baru.
- [Composer](https://getcomposer.org/) terinstal di sistem Anda.
- [MySQL](https://www.mysql.com/) atau database lain yang didukung oleh Laravel.

## Langkah 1: Clone Repositori

1. Buka terminal atau command prompt pada komputer Anda.
2. Pindah ke direktori tempat Anda ingin mengkloning repositori Laravel.
3. Jalankan perintah berikut untuk mengkloning repositori:

   ```shell
   git clone https://github.com/AliAbdurohman16/travel.git
   
4. Setelah selesai, pindah ke direktori proyek yang baru dibuat:
   
    ```shell
    cd repo_program
    
## Langkah Langkah 2: Instal Dependensi

Jalankan perintah berikut untuk menginstal semua dependensi Laravel menggunakan Composer:

    composer install

Perintah ini akan membaca file composer.json dan mengunduh serta menginstal semua paket yang diperlukan untuk menjalankan aplikasi Laravel.

Jika Anda sudah memiliki composer.lock, Anda juga dapat menjalankan perintah berikut untuk memastikan Anda menggunakan versi dependensi yang tepat:

    composer install --prefer-dist --no-interaction

## Langkah 3: Konfigurasi

Salin file .env.example menjadi .env:

    cp .env.example .env

Buka file .env menggunakan editor teks favorit Anda dan konfigurasi koneksi database sesuai kebutuhan Anda:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=nama_pengguna
    DB_PASSWORD=kata_sandi

Ganti nama_database, nama_pengguna, dan kata_sandi dengan detail koneksi database yang sesuai.

Simpan perubahan pada file .env.

## Langkah 4: Migrasi Database

Jalankan perintah berikut untuk membuat tabel database dan memasukkan data awal:

    php artisan migrate --seed

Perintah ini akan menjalankan semua migrasi dan mengisi database dengan data awal jika ada.

## Langkah 5: Simpan Tautan Penyimpanan

Jalankan perintah berikut untuk membuat tautan simbolis ke direktori penyimpanan:

    php artisan storage:link

Ini akan menghubungkan direktori penyimpanan aplikasi ke direktori publik, sehingga file-file yang disimpan dapat diakses melalui web.

## Langkah 6: Jalankan Server Pengembangan

Terakhir, jalankan perintah berikut untuk menjalankan server pengembangan Laravel:

    php artisan serve

Server pengembangan akan memulai aplikasi Laravel di http://localhost:8000 secara default.

Buka browser web dan kunjungi http://localhost:8000 untuk melihat aplikasi Laravel yang berjalan.

Selamat! Anda telah berhasil menjalankan aplikasi Laravel dari awal hingga selesai. Anda sekarang dapat mulai mengembangkan dan menguji aplikasi Anda.
