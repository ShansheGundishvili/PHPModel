CREATE USER 'PHPModel'@'localhost' IDENTIFIED BY 'Pa$$w0rd';
GRANT SELECT, INSERT, UPDATE, DELETE ON `model`.* TO 'PHPModel'@'localhost';