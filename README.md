### 🎬 API Manajemen Tiket Film – Laravel + JWT
Sistem backend RESTful API untuk manajemen tiket film, mencakup registrasi user, login, pemesanan tiket, jadwal tayang, dan data film menggunakan Laravel dan JWT Authentication.

### Nama kelompok
- Frensen Adriandra (2203030002)
- I Gede Cheehaw Awidiya (2203030021)
- Rafif Thilal (2203030025)
### 🚀 Fitur Utama
Register & Login User dengan JWT

- CRUD Data Film

- CRUD Studio (Theater)

- CRUD Jadwal Penayangan Film (Schedule)

- Pemesanan Tiket oleh User

- Cek Kursi yang Telah Dipesan

- Middleware untuk melindungi endpoint tertentu

### 🛠️ Instalasi & Setup
Clone repositori
```bash
bash
Copy
Edit
git clone https://github.com/username/tiket-film-api.git
cd tiket-film-api
Install dependensi Laravel
```
```bash
bash
Copy
Edit
composer install
Salin file environment
```
```bash
bash
Copy
Edit
cp .env.example .env
Generate App Key & JWT Secret
```
```bash
bash
Copy
Edit
php artisan key:generate
php artisan jwt:secret
Setup Database (Edit .env)
```
```bash
makefile
Copy
Edit
DB_DATABASE=tiketfilm
DB_USERNAME=root
DB_PASSWORD=
Migrasi & Seeder (jika ada)
```
```bash
bash
Copy
Edit
php artisan migrate
php artisan db:seed
Jalankan Server
```
```bash
bash
Copy
Edit
php artisan serve
API tersedia di http://localhost:8000/api
```
### 🔐 Autentikasi (JWT)
- Setelah login berhasil, simpan access_token

- Tambahkan pada setiap request protected:
    Header:
    Authorization: Bearer {access_token}

### 📚 Daftar Endpoint
```bash
Auth
Method	Endpoint	Deskripsi
POST	/register	Registrasi user
POST	/login	Login & dapatkan token
GET	/me	Info user login
POST	/logout	Logout (revoke token)

Film
Method	Endpoint	Deskripsi
GET	/films	Lihat semua film
POST	/films	Tambah film (auth)
GET	/films/{id}	Detail film
PUT	/films/{id}	Update film (auth)
DELETE	/films/{id}	Hapus film (auth)

Theater
Method	Endpoint	Deskripsi
GET	/theaters	Lihat semua studio
POST	/theaters	Tambah studio

Schedule
Method	Endpoint	Deskripsi
GET	/schedules	Semua jadwal film
POST	/schedules	Tambah jadwal tayang

Ticket
Method	Endpoint	Deskripsi
GET	/tickets	Tiket yang dibeli user
POST	/tickets	Pesan tiket (kursi & jadwal)
GET	/tickets/{id}	Lihat tiket tertentu
DELETE	/tickets/{id}	Batalkan tiket
```
### 🧪 Pengujian dengan Postman
- Register user

- Login dan ambil access_token

- Gunakan token JWT di setiap request selanjutnya:
    Header:
    Authorization: Bearer {token}

  menyediakan file .postman_collection.json di folder /postman (jika tersedia).

### 📦 Struktur Folder (Singkat)
- app/Models → Semua model (Film, Theater, User, Schedule, Ticket)

- app/Http/Controllers → Semua controller API

- routes/api.php → Semua route API

- database/migrations → Struktur tabel

- config/jwt.php → Konfigurasi JWT

### 🧑‍💻 Tim & Kontribusi
- Dibuat oleh: [Frensen Adriandra]

- Email: [adriandrafrensen30@gmail.com]

- Pull request dan issue sangat terbuka!

### 📝 Lisensi
- Proyek ini menggunakan lisensi MIT. Silakan gunakan dan modifikasi sesuai kebutuhan

## About Laravel

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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
