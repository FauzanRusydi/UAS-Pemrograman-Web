-- Tabel Users untuk sistem login admin
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Artikel untuk konten CMS
CREATE TABLE IF NOT EXISTS artikel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    konten TEXT NOT NULL,
    gambar VARCHAR(255) DEFAULT NULL,
    penulis VARCHAR(100) DEFAULT 'Admin',
    status ENUM('draft', 'published') DEFAULT 'published',
    views INT DEFAULT 0,
    tanggal_dibuat DATETIME DEFAULT CURRENT_TIMESTAMP,
    tanggal_diupdate DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel Kategori
CREATE TABLE IF NOT EXISTS kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    deskripsi TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk relasi artikel dan kategori
CREATE TABLE IF NOT EXISTS artikel_kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artikel_id INT NOT NULL,
    kategori_id INT NOT NULL,
    FOREIGN KEY (artikel_id) REFERENCES artikel(id) ON DELETE CASCADE,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE CASCADE
);

-- Insert default admin user (password: admin123)
INSERT INTO users (username, password, nama_lengkap, email) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin@cms.local');

-- Insert kategori
INSERT INTO kategori (nama, slug, deskripsi) VALUES 
('Teknologi', 'teknologi', 'Artikel seputar teknologi dan programming'),
('Tutorial', 'tutorial', 'Tutorial dan panduan belajar'),
('Berita', 'berita', 'Berita terkini dan update'),
('Tips & Trik', 'tips-trik', 'Tips dan trik berguna');

-- Insert artikel dengan konten yang lebih lengkap
INSERT INTO artikel (judul, slug, konten, penulis, status, views) VALUES 
('Selamat Datang di CMS Kami', 'selamat-datang-di-cms-kami', '<p>Selamat datang di Content Management System (CMS) yang dibangun menggunakan <strong>CodeIgniter 3</strong>. Sistem ini dirancang untuk memudahkan pengelolaan konten website dengan interface yang user-friendly.</p><p>Fitur-fitur yang tersedia:</p><ul><li>Manajemen Artikel dengan CRUD lengkap</li><li>Sistem Autentikasi Admin</li><li>Kategori Artikel</li><li>Dashboard Admin yang Modern</li><li>Responsive Design</li></ul>', 'Admin', 'published', 15),
('Mengenal CodeIgniter 3 Framework', 'mengenal-codeigniter-3-framework', '<p>CodeIgniter adalah framework PHP yang powerful namun ringan, dibangun untuk developer yang membutuhkan toolkit sederhana dan elegan untuk membuat aplikasi web full-featured.</p><p><strong>Keunggulan CodeIgniter:</strong></p><ul><li>Ringan dan cepat</li><li>Dokumentasi lengkap</li><li>MVC Architecture</li><li>Security Features built-in</li><li>Community yang aktif</li></ul><p>Framework ini sangat cocok untuk pemula yang ingin belajar konsep MVC dan pengembangan web modern.</p>', 'Admin', 'published', 42),
('Tutorial Docker untuk Web Development', 'tutorial-docker-untuk-web-development', '<p>Docker adalah platform yang memungkinkan developer untuk mengemas aplikasi beserta dependensinya ke dalam container yang portable.</p><p><strong>Mengapa menggunakan Docker?</strong></p><ol><li>Konsistensi environment development dan production</li><li>Mudah dalam deployment</li><li>Isolasi aplikasi</li><li>Efisien dalam penggunaan resource</li></ol><p>Dengan Docker Compose, kita bisa mendefinisikan dan menjalankan multi-container Docker applications dengan mudah.</p>', 'Admin', 'published', 28),
('Tips Membuat Website yang Responsif', 'tips-membuat-website-yang-responsif', '<p>Website responsif adalah website yang dapat menyesuaikan tampilan dengan baik di berbagai ukuran layar, mulai dari desktop, tablet, hingga smartphone.</p><p><strong>Tips membuat website responsif:</strong></p><ul><li>Gunakan framework CSS seperti Bootstrap</li><li>Implementasikan Mobile-First approach</li><li>Gunakan relative units (%, em, rem)</li><li>Optimize gambar untuk berbagai ukuran</li><li>Test di berbagai device</li></ul><p>Framework seperti Bootstrap 4 sudah menyediakan grid system yang memudahkan pembuatan layout responsif.</p>', 'Admin', 'published', 67),
('Keamanan Aplikasi Web: Best Practices', 'keamanan-aplikasi-web-best-practices', '<p>Keamanan adalah aspek yang sangat penting dalam pengembangan aplikasi web. Berikut adalah beberapa best practices yang harus diterapkan:</p><p><strong>Security Checklist:</strong></p><ul><li>Validasi input dari user</li><li>Gunakan prepared statements untuk query database</li><li>Hash password dengan algoritma yang kuat (bcrypt, argon2)</li><li>Implementasi CSRF protection</li><li>XSS prevention</li><li>HTTPS untuk enkripsi data</li><li>Regular security updates</li></ul><p>CodeIgniter sudah menyediakan banyak fitur security built-in yang bisa langsung digunakan.</p>', 'Admin', 'published', 89);

-- Relasi artikel dengan kategori
INSERT INTO artikel_kategori (artikel_id, kategori_id) VALUES 
(1, 3), -- Selamat datang -> Berita
(2, 1), -- CodeIgniter -> Teknologi
(2, 2), -- CodeIgniter -> Tutorial
(3, 2), -- Docker -> Tutorial
(3, 1), -- Docker -> Teknologi
(4, 4), -- Tips Responsif -> Tips & Trik
(4, 2), -- Tips Responsif -> Tutorial
(5, 1), -- Security -> Teknologi
(5, 4); -- Security -> Tips & Trik
