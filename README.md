<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel
# Media Pembelajaran Interaktif Persamaan Garis Lurus

Aplikasi ini merupakan media pembelajaran interaktif berbasis web yang dikembangkan menggunakan **Laravel** dan telah dikonfigurasi menggunakan **Docker** agar dapat dijalankan tanpa perlu melakukan instalasi PHP, Composer, MySQL, maupun Laragon secara terpisah.

## Persyaratan

Sebelum menjalankan aplikasi, pastikan komputer telah terinstal:

* Docker Desktop
* Browser seperti Google Chrome, Microsoft Edge, atau Mozilla Firefox

## Cara Menjalankan Aplikasi

1. Extract file `media_pgl.zip`.

2. Buka folder:

   ```text
   media_pgl
   ```

3. Buka Terminal, Command Prompt, PowerShell, atau terminal pada Visual Studio Code di dalam folder tersebut.

4. Jalankan perintah:

   ```bash
   docker compose up -d --build
   ```

5. Tunggu hingga proses build dan proses menjalankan container selesai.

   Pada proses pertama kali, waktu yang dibutuhkan dapat lebih lama karena Docker perlu mengunduh dan menyiapkan komponen aplikasi.

6. Untuk memastikan container telah berjalan, jalankan:

   ```bash
   docker compose ps
   ```

   Pastikan container `media_pgl_app` dan `media_pgl_db` berstatus **Up**, serta database berstatus **healthy**.

7. Buka aplikasi melalui browser:

   ```text
   http://localhost:8000
   ```

## Cara Menghentikan Aplikasi

Untuk menghentikan aplikasi, jalankan:

```bash
docker compose down
```

Untuk menjalankan kembali aplikasi tanpa melakukan build ulang:

```bash
docker compose up -d
```

Kemudian buka kembali:

```text
http://localhost:8000
```

## Database

Database aplikasi menggunakan **MySQL 8.0**.

Database awal telah disertakan pada:

```text
docker/mysql/init.sql
```

File tersebut akan digunakan secara otomatis ketika database Docker pertama kali dibuat.

Data yang ditambahkan atau diubah selama aplikasi digunakan akan disimpan pada Docker Volume sehingga tetap tersedia meskipun container dihentikan.

> **Catatan:** Hindari menjalankan `docker compose down -v` apabila tidak ingin menghapus database yang tersimpan pada Docker Volume.

## Teknologi yang Digunakan

* Laravel 12
* PHP 8.2
* MySQL 8.0
* Vite
* Docker
* Docker Compose

## Struktur Konfigurasi Docker

File utama yang digunakan untuk menjalankan aplikasi:

```text
Dockerfile
docker-compose.yml
.env.docker
docker/mysql/init.sql
```

## Troubleshooting

Apabila aplikasi tidak dapat dibuka, periksa status container dengan:

```bash
docker compose ps
```

Untuk melihat log aplikasi Laravel:

```bash
docker compose logs app
```

Untuk melihat log database:

```bash
docker compose logs db
```

Apabila port `8000` sedang digunakan oleh aplikasi lain, tutup aplikasi yang menggunakan port tersebut terlebih dahulu kemudian jalankan kembali Docker.

---

**Catatan:** Aplikasi dapat dijalankan menggunakan Docker Desktop tanpa perlu menjalankan Laragon.

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# media-pgl-linearedu
>>>>>>> 250d0d2db3eb87add9a1e2e07d9d136162fbea55
