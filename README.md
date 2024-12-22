# Ujian Akhir Semester - Yesa Viola (122140133) #
## Screenshot Web
![halaman login](/Screenshot/login.png)
![halaman login gagal](/Screenshot/login-gagal.png)
![validasi server gagal](/Screenshot/validasi-server-gagal.png)
![index](/Screenshot/index.png)
![tambah mata kuliah](/Screenshot/tambah-mata-kuliah.png)
![tambah mata kuliah gagal](/Screenshot/tambah-mata-kuliah-fail.png)
![index setelah hapus](/Screenshot/index-setelah-hapus.png)
## Bagian 1: Client-side Programming ##
### 1.1 Manipulasi DOM dengan JavaScript ###
Web ini melakukan manipulasi DOM dengan mengubah warna border saat event `onfocus` dan `onblur`, serta menambahkan konten berupa tulisan error saat event `onsubmit`.
### 1.2 Event Handling ###
Web ini memiliki tiga event handling, yaitu `onfocus`, `onblur`, dan `onsubmit`, yang kemudian melakukan aksi berupa mengubah warna border dan menambahkan konten pesan error.
## Bagian 2: Server-side Programming ##
### 2.1 Pengelolaan Data dengan PHP ###
Web ini mengimplementasikan pengelolaan data dengan menggunakan metode `POST` dan `GET` untuk melakukan parsing variabel global, validasi sisi server, serta menyimpan data ke database, termasuk informasi browser dan IP pengguna yang dapat dilihat pada `login.php`, `create.php`, dan `update.php`.
### 2.2 Objek PHP Berbasis OOP
Web ini mengimplementasikan PHP berbasis OOP, yang dapat dilihat pada file-file seperti `Koneksi.php`, `MatkulController.php`, `SessionCookieController.php`, `LoginForm.js`, `CreateForm.js`, dan `UpdateForm.js`.
# Bagian 3: Database Management #
## 3.1 Pembuatan Tabel Database ##
Web ini memiliki tabel database `matkul` dengan kolom `id`, `nama`, `waktu`, `dosen`, `ruang`, `browser`, dan `ip`, yang dapat dilihat pada file `db.sql`.
## 3.2 Konfigurasi Koneksi Database ##
Konfigurasi koneksi database web ini dapat dilihat di Koneksi.php
## 3.3 Manipulasi Data pada Database ##
Manipulasi data pada database yang ada pada web ini merupakan operasi CRUD pada tabel `matkul`, yang dapat dilihat pada `MatkulController`
# Bagian 4: State Management #
## 4.1 State Management dengan Session
Pada web ini, session digunakan untuk memantau apakah proses sebelumnya berhasil atau gagal. Hal ini dapat dilihat pada `login.php` ketika login gagal, dan pada `index.php` ketika berhasil menghapus data.
## 4.2 Pengelolaan State dengan Cookie dan Browser Storage
Pada web ini, pengelolaan cookie dapat dilihat pada penggunaan setcookie di `login.php` ketika pengguna berhasil login melalui fungsi yang seolah-olah melakukan login. Untuk getcookie, dapat dilihat pada `index.php`, `create.php`, dan `update.php` saat melakukan pengecekan login dari cookie, serta penghapusan cookie saat logout yang dilakukan di `index.php`.
