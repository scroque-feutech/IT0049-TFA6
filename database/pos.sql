CREATE TABLE users (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  full_name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id), UNIQUE KEY users_username_unique (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE customers (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users (username, full_name) VALUES
('michael', 'Michael De Santa'),
('franklin', 'Franklin Clinton'),
('trevor', 'Trevor Philips'),
('lamar', 'Lamar Davis'),
('lester', 'Lester Crest');

INSERT INTO customers (full_name, email, phone) VALUES
('Michael De Santa', 'michael@vangelico.example', '09170000001'),
('Franklin Clinton', 'franklin@vagos.example', '09170000002'),
('Trevor Philips', 'trevor@trevors.example', '09170000003'),
('Lamar Davis', 'lamar@h_customs.example', '09170000004'),
('Lester Crest', 'lester@bleeter.example', '09170000005');
