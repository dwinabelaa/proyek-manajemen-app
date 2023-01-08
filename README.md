
## Tentang Projek

Sebuah projek web sederhana yang digunakan untuk memanajemen proyek dengan memantau beberapa atribut seperti :
- Nama Proyek
- Nama Klien
- Profil Leader Proyek
- Tanggal Proyek dimulai
- Tanggal Proyek berakhir
- Progres Proyek

Proyek web sederhana ini dibuat menggunakan [Laravel](https://laravel.com/docs) dan framework [Tailwind css](https://tailwindcss.com/) dengan bantuan plugin [DaisyUI](https://daisyui.com/)

Beberapa fitur utama dalam proyek :
- Menambah data
- Menghapus data
- Mengubah(edit) data
- Pagination
## Instalasi Proyek

Untuk dapat menginstal proyek ini di lokal komputer, pertama kita harus memiliki beberapa kriteria berikut :
- [Node JS](https://nodejs.org/en/download/) versi >=18 
- [PHP](https://www.php.net/downloads.php) versi >=8.1 
- [MySQL atau MariaDB](https://www.mysql.com/) versi >=8.0
- [Compsoer](https://getcomposer.org/) versi >=2.5

setelah semua persayratan terpenuhi Kemudian jalankan perintah berikut.
1. Jalankan `cp .env.example .env` untuk membuat file konfigurasi
2. Jalankan `php artisan key:generate` untuk membuat `APP_KEY` laravel
3. Kemudian jalankan perintah `php artisan migrate:fresh --seed`. perintah tadi akan menjalankan migrasi untuk membuat table di database dan membuat 8 data dummy untuk tampilan awal.
4. Terakhir jalankan perintah `npm run dev` dan `php artisan serve` maka aplikasi akan berjalan di `localhost:8080`
5. untuk membuka aplikasi masuk ke route `/projects`

## Screenshoot
![Screenshot 1](https://user-images.githubusercontent.com/49960993/211170558-c0ccea78-0f60-4ddb-944c-b5524d211a85.png)
![Screenshot  2023-01-08 05-11-04](https://user-images.githubusercontent.com/49960993/211170560-7c919818-64c3-4a21-928d-21651ddb8ff1.png)
![Screenshot  2023-01-08 05-12-20](https://user-images.githubusercontent.com/49960993/211170562-8a75b5d7-8467-46d1-bef3-8cf8be19863e.png)
![Screenshot  2023-01-08 05-12-25](https://user-images.githubusercontent.com/49960993/211170563-a1af041b-137e-4a44-83ad-bb18e1f4a02d.png)
![Screenshot  2023-01-08 05-12-40](https://user-images.githubusercontent.com/49960993/211170565-e37093c4-3d62-43ba-b9d6-6a0bb82b4b6e.png)
![Screenshot  2023-01-08 05-12-52](https://user-images.githubusercontent.com/49960993/211170566-b18aa42c-4ca9-430e-8be7-0e4d9a660285.png)



