-- Membuat tabel matkul
CREATE TABLE matkul (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- ID yang auto increment
    nama VARCHAR(100) NOT NULL,         -- Nama mata kuliah
    waktu VARCHAR(50) NOT NULL,          -- Waktu mata kuliah
    dosen VARCHAR(255) NOT NULL,         -- Nama dosen mata kuliah
    ruang VARCHAR(255) NOT NULL,         -- Ruang dosen mata kuliah
    browser VARCHAR(255) NOT NULL,       -- Browser yang digunakan
    ip VARCHAR(255) NOT NULL             -- IP pengguna
);

-- Menyisipkan data ke dalam tabel matkul
INSERT INTO matkul (nama, waktu, dosen, ruang, browser, ip) VALUES 
('Matematika Dasar', 'Senin, 08:00 - 10:00', 'Dosen 1', 'Ruang 1', 'Chrome', '127.0.0.1'),
('Pemrograman Web', 'Selasa, 10:00 - 12:00', 'Dosen 2', 'Ruang 2', 'Firefox', '89.207.132.170'),
('Algoritma dan Struktur Data', 'Rabu, 13:00 - 15:00', 'Dosen 3', 'Ruang 3', 'Chrome', '237.84.2.178'),
('Sistem Operasi', 'Kamis, 08:00 - 10:00', 'Dosen 4', 'Ruang 4', 'Firefox', '237.84.2.178'),
('Jaringan Komputer', 'Jumat, 10:00 - 12:00', 'Dosen 5', 'Ruang 5', 'Chrome', '237.84.2.178');
