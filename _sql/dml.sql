INSERT INTO `categories` (`category_name`) VALUES
('Mawar'),
('Melati'),
('Lavender'),
('Bunga Sepatu');

INSERT INTO `customers` (`customer_name`, `customer_phone`, `customer_email`, `customer_password`) VALUES
-- ('Naufal Alifiansyah', '081234567891', 'naufal@example.com', 'Password@123'),
-- ('Shafy Gunawan', '081234567891', 'shafy@example.com', 'Password@123');
('Naufal Alifiansyah', '081234567891', 'naufal@example.com', '$2y$10$YpsuVarBbWQP9bDd4K4pI.JjpAP.unxUWAsS/XJHofTR/PdcEV8Bu'),
('Shafy Gunawan', '081234567891', 'shafy@example.com', '$2y$10$YpsuVarBbWQP9bDd4K4pI.JjpAP.unxUWAsS/XJHofTR/PdcEV8Bu');

INSERT INTO `roles` (`role_name`) VALUES
('administrator'),
('manager');

INSERT INTO `staffs` (`role_id`, `staff_name`, `staff_phone`, `staff_email`, `staff_password`) VALUES
-- (1, 'Andre Eka', '081234567891', 'andre@example.com', 'Password@123'),
-- (2, 'Umar Muchtar', '081234567891', 'umar@example.com', 'Password@123');
(1, 'Andre Eka', '081234567891', 'andre@example.com', '$2y$10$YpsuVarBbWQP9bDd4K4pI.JjpAP.unxUWAsS/XJHofTR/PdcEV8Bu'),
(2, 'Umar Muchtar', '081234567891', 'umar@example.com', '$2y$10$YpsuVarBbWQP9bDd4K4pI.JjpAP.unxUWAsS/XJHofTR/PdcEV8Bu');

INSERT INTO `suppliers` (`supplier_name`, `supplier_phone`, `supplier_address`) VALUES
('PT Nusa Bangsa', '081234567891', 'Jl. Semarang No. 33 Surabaya'),
('PT Taman Indah', '081234567891', 'Jl. Pahlawan No. 17 Bangkalan'),
('PT Kebun Merdeka', '081234567891', 'Jl. Telang Indah No. 19 Bangkalan'),
('PT Rumput Hijau', '081234567891', 'Jl. Cempaka No. 27 Surabaya');

INSERT INTO `plants` (`supplier_id`, `category_id`, `plant_name`, `plant_price`, `plant_stock`, `plant_photo`) VALUES
(1, 1, 'Mawar Double Delight', 50000, 20, '655eea074f000.jpg'),
(1, 1, 'Mawar Eden', 75000, 15, '655eeb2c4929e.jpg'),
(1, 1, 'Mawar Mega Putih', 20000, 15, '655eed4066c32.jpeg'),
(1, 1, 'Mawar Putri', 25000, 12, '655eed59ed050.jpg'),
(1, 1, 'Mawar Sunsprite', 22000, 13, '655eef0382fe4.jpg'),
(2, 2, 'Melati Gambir', 17000, 16, '655eef3c6c515.jpg'),
(2, 2, 'Melati Putih', 10000, 18, '655eef669e1eb.jpg'),
(2, 2, 'Melati Raja', 18000, 19, '655eef95e2da9.jpg'),
(2, 2, 'Melati Primpose', 27000, 20, '655eefbc9a3b2.jpg'),
(2, 2, 'Melati Spanyol', 35000, 22, '655ef006584e5.jpg'),
(3, 3, 'Lavender English', 32000, 30, '655f09fb45a67.jpg'),
(3, 3, 'Lavender Putih', 50000, 20, '655f184e3e176.jpg'),
(3, 3, 'Lavender Sage', 31000, 23, '65601b3b0fff0.jpg'),
(3, 3, 'Lavendula Pedunculata', 32000, 13, '65601b8dd7bc1.jpeg'),
(4, 4, 'Hibiscus Calyphyllus', 24000, 5, '6560397845cc6.jpg'),
(4, 4, 'Hibiscus Cannabinus', 30000, 11, '656039cc98fdf.jpg'),
(4, 4, 'Hibiscus Coccineus', 23000, 13, '656039f17b993.jpg'),
(4, 4, 'Hibiscus Acetosella', 34000, 14, '65603a5a2c572.jpg'),
(4, 4, 'Hibiscus Genevil', 29000, 17, '65603a9c34bad.jpeg'),
(4, 4, 'Hibiscus Rosa Sinensis', 37000, 29, '65603ac4ddcb0.jpg');

INSERT INTO `payment_methods` (`payment_method_name`, `payment_method_number`, `payment_method_bank`, `payment_method_logo`) VALUES
('PT FloraFavs Indonesia', '673892017384', 'Permata', 'permata.svg'),
('PT FloraFavs Indonesia', '923456129083', 'BCA', 'bca.svg'),
('PT FloraFavs Indonesia', '384789263892', 'Mandiri', 'mandiri.svg');

INSERT INTO `orders` (`customer_id`, `payment_method_id`, `order_date`, `order_status`, `order_total_price`) VALUES
(1, 1, '2023-11-17', 'paid', 40000),
(2, 2, '2023-11-17', 'unpaid', 100000),
(2, 3, '2023-11-19', 'paid', 120000);

INSERT INTO `order_details` (`order_id`, `plant_id`, `order_detail_qty`, `order_detail_unit_price`) VALUES
(1, 3, 1, 20000),
(1, 7, 2, 10000),
(2, 12, 2, 50000),
(3, 2, 1, 75000),
(3, 3, 1, 20000),
(3, 4, 1, 25000);
