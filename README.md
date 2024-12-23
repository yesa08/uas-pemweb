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
Web ini mengimplementasikan PHP berbasis OOP, yang dapat dilihat pada file-file seperti `Koneksi.php`, `MatkulController.php`, dan `SessionCookieController.php`.
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
# Bagian Bonus: Hosting Aplikasi Web #
Lihat web yang sudah dihosting disini : [Link Hosting Website](https://uas-pemweb-133.infinityfreeapp.com/)
catatan : web ini mungkin terdeteksi sebagai web berbahaya pada browser chrome dikarenakan pembuatannya yang masih menggunakan php native atau berbagai hal lainnya, namun dapat berjalan lancar di browser lain.
## Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
Pertama, saya membuat akun hosting gratis di `infinityfree.com` dengan domain `https://uas-pemweb-133.infinityfreeapp.com` Setelah itu, saya membuka cPanel yang disediakan oleh infinityfree untuk mengunggah file PHP aplikasi saya. Selanjutnya, saya membuat database melalui cPanel dan melakukan impor tabel yang diperlukan ke dalam database tersebut. Kemudian, saya mengubah kode koneksi database pada aplikasi agar sesuai dengan konfigurasi SQL dari domain yang saya gunakan. Langkah terakhir adalah mendaftarkan sertifikat SSL untuk memastikan koneksi aplikasi web aman.
## Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda.
Saya memilih InfinityFree sebagai penyedia hosting karena menyediakan layanan hosting gratis dengan fitur-fitur dasar yang mencukupi kebutuhan aplikasi web saya, seperti dukungan PHP, MySQL, serta SSL gratis.
## Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
Saat ini, saya telah mengganti username dan password database default dengan yang lebih aman, menghapus semua file yang tidak diperlukan, serta mendaftarkan dan mengaktifkan SSL untuk mendukung koneksi HTTPS dan mengenkripsi data yang ditransmisikan.
## Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda. ##
Saat ini, konfigurasi server yang telah saya terapkan untuk mendukung aplikasi web saya meliputi pendaftaran dan aktivasi SSL guna mendukung koneksi HTTPS dan mengenkripsi data yang ditransmisikan, sehingga meningkatkan keamanan.


