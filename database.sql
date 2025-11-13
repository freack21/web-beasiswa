-- Database: beasiswa
CREATE DATABASE IF NOT EXISTS beasiswa;
USE beasiswa;

-- Tabel jenis beasiswa
CREATE TABLE IF NOT EXISTS jenis_beasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_beasiswa VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    min_ipk DECIMAL(3,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel pendaftaran beasiswa
CREATE TABLE IF NOT EXISTS pendaftaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    nomor_hp VARCHAR(15) NOT NULL,
    semester INT NOT NULL,
    ipk DECIMAL(3,2) NOT NULL,
    beasiswa_id INT,
    berkas VARCHAR(255),
    status_ajuan VARCHAR(50) DEFAULT 'belum di verifikasi',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (beasiswa_id) REFERENCES jenis_beasiswa(id)
);

-- Insert data jenis beasiswa
INSERT INTO jenis_beasiswa (nama_beasiswa, deskripsi, min_ipk) VALUES
('Beasiswa Akademik', 'Beasiswa untuk mahasiswa berprestasi dengan IPK minimal 3.0. Diberikan untuk mendukung mahasiswa yang memiliki prestasi akademik tinggi.', 3.00),
('Beasiswa Non-Akademik', 'Beasiswa untuk mahasiswa yang aktif dalam kegiatan non-akademik seperti olahraga, seni, dan organisasi dengan IPK minimal 3.0.', 3.00),
('Beasiswa Prestasi', 'Beasiswa khusus untuk mahasiswa dengan prestasi luar biasa baik akademik maupun non-akademik dengan IPK minimal 3.5.', 3.50);

