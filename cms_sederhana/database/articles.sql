-- Tabel articles untuk CMS Sederhana
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data
INSERT INTO `articles` (`title`, `content`, `created_at`) VALUES
('Pengenalan Framework MVC', 'Framework MVC adalah pola arsitektur yang memisahkan aplikasi menjadi tiga komponen utama: Model, View, dan Controller. Model menangani data dan logika bisnis, View menampilkan data kepada pengguna, dan Controller mengatur alur aplikasi.', '2024-01-15 10:30:00'),
('Cara Membuat Router Sederhana', 'Router adalah komponen penting dalam framework yang menangani routing URL. Router ini akan memetakan URL ke controller dan method yang sesuai. Dalam implementasi sederhana, router dapat membaca URL dan memisahkannya menjadi controller, method, dan parameter.', '2024-01-16 14:20:00'),
('Implementasi BaseController', 'BaseController menyediakan method-method umum yang bisa digunakan oleh semua controller. Method view() untuk memuat file view, method model() untuk memuat model, method redirect() untuk redirect, dan method-method helper lainnya.', '2024-01-17 09:15:00'),
('Membuat Model Database', 'Model adalah komponen yang menangani interaksi dengan database. Model berisi method-method untuk mengambil, menyimpan, mengupdate, dan menghapus data. Model juga dapat berisi logika bisnis yang terkait dengan data.', '2024-01-18 16:45:00'),
('Penerapan MVC di PHP', 'PHP adalah bahasa pemrograman yang sangat fleksibel untuk menerapkan pola MVC. Dengan PHP, kita dapat membuat framework MVC sederhana yang mudah dipahami dan dikembangkan. Framework ini dapat menjadi dasar untuk aplikasi yang lebih kompleks.', '2024-01-19 11:30:00'); 