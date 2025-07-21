Sistem Informasi Karyawan & Gaji – Laravel 12

Sistem ini adalah aplikasi berbasis web menggunakan Laravel 12 yang dirancang untuk mengelola data karyawan dan informasi gaji secara aman, dengan fitur autentikasi, otorisasi berbasis role, dan perlindungan akses terhadap data sensitif.

🎯 Studi Kasus

Perusahaan skala kecil hingga menengah membutuhkan sistem yang sederhana namun aman untuk menyimpan informasi penting tentang karyawan dan gaji. Karena data gaji bersifat rahasia, tidak semua pengguna boleh mengakses keseluruhan data.

Dalam studi kasus ini, dibuatlah sebuah aplikasi Laravel dengan 2 peran (role):
	•	Admin: memiliki akses penuh terhadap semua data karyawan dan gaji.
	•	User: hanya dapat login, melihat dashboard, dan melihat data gajinya sendiri (tidak bisa mengakses atau mengubah data milik orang lain).

Dengan skenario ini, diharapkan sistem mampu:
	•	Mencatat dan mengelola informasi dasar karyawan (nama, email, no HP).
	•	Mencatat detail gaji tiap karyawan, termasuk tanggal dan jumlah.
	•	Melindungi akses data melalui sistem role dan middleware.
	•	Menyembunyikan UI tertentu berdasarkan hak akses.
	•	Menolak akses tidak sah dengan error message yang ramah pengguna.

🛠️ Fitur Utama
	•	Laravel 12 Framework (PHP 8.2)
	•	Autentikasi bawaan Laravel Breeze
	•	Role-based access control (RBAC)
	•	CRUD Karyawan (admin only)
	•	CRUD Gaji (admin only)
	•	“Gaji Saya” untuk user biasa
	•	Middleware IsAdmin untuk membatasi akses
	•	Flash message jika akses ditolak
	•	Validasi input dan proteksi CSRF
	•	Desain responsif dengan Tailwind CSS

🧪 Akun Uji Coba

Role	Email	Password <br/>
Admin	admin@example.com	password<br/>
User	http://127.0.0.1:8000/register

Kamu bisa ubah atau tambah user baru melalui database.

🚀 Instalasi

Clone repositori dan jalankan perintah berikut:

git clone https://github.com/username/informasi-karyawan.git
cd informasi-karyawan
composer install
cp .env.example .env
php artisan key:generate

Konfigurasi database di file .env:

DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

Lalu migrasi dan seed:

php artisan migrate
php artisan db:seed

Jalankan aplikasi:

php artisan serve

🔐 Keamanan
	•	Role-based UI dan akses route (admin/user)
	•	Middleware isAdmin untuk membatasi akses karyawan dan gaji
	•	Validasi data input
	•	Password terenkripsi menggunakan bcrypt
