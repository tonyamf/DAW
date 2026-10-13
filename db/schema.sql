-- Schema reconstructed from LAB12/application/models/Blog_model.php (the original dump is not in the repo).
-- SAMPLE DATA ONLY: product names/prices/descriptions below are invented placeholders; images are the files in LAB12/imagens.
CREATE TABLE IF NOT EXISTS customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password_digest VARCHAR(32) NOT NULL,
  created_at DATETIME,
  updated_at DATETIME
) DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
) DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cat_id INT NOT NULL,
  name VARCHAR(150) NOT NULL,
  price DECIMAL(8,2) NOT NULL,
  image VARCHAR(255),
  description TEXT,
  FOREIGN KEY (cat_id) REFERENCES categories(id)
) DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT NOT NULL,
  created_at DATETIME,
  total DECIMAL(10,2),
  FOREIGN KEY (customer_id) REFERENCES customers(id)
) DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
) DEFAULT CHARSET=utf8;

INSERT INTO categories (id, name) VALUES (1, 'Fountain pens'), (2, 'Ballpoint pens');
INSERT INTO products (cat_id, name, price, image, description) VALUES
 (1, 'Kaweco Classic Sport', 25.00, '/imagens/KawecoClassicSport.jpg', 'Sample product'),
 (1, 'Kuretake', 12.00, '/imagens/Kuretake.jpg', 'Sample product'),
 (1, 'LAMY 2000', 150.00, '/imagens/LAMY2000.jpg', 'Sample product'),
 (1, 'LAMY Al-Star', 40.00, '/imagens/LAMYAl-Star.jpg', 'Sample product'),
 (2, 'Parker Jotter', 15.00, '/imagens/ParkerJotter.jpg', 'Sample product'),
 (1, 'Pilot Metropolitan', 20.00, '/imagens/PilotMetropolitan.jpg', 'Sample product'),
 (1, 'Wink of Stella', 3.00, '/imagens/Wink-of-Stella.jpg', 'Sample product'),
 (1, 'Ystudio Classic', 60.00, '/imagens/YstudioClassic.jpg', 'Sample product');
