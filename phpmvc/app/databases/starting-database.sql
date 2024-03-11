-- Active: 1709534924571@@127.0.0.1@3306@phpmvc09123
CREATE TABLE employees (
  employee_dbid INT PRIMARY KEY AUTO_INCREMENT,
  employee_id VARCHAR(15),
  name VARCHAR(100),
  civil_id VARCHAR(20),
  email VARCHAR(100),
  department VARCHAR(30)
);

DROP TABLE employees;

INSERT INTO employees VALUES
(NULL, '003185641', 'Karl Innocent', '5103016196550015', 'karlin61@tesla.inc', 'Programmer'),
(NULL, '004148542', 'Martin Damian', '5103096614980016', 'martin66@apple.com', 'Engineer'),
(NULL, '002303596', 'Ralph Kirrily', '5103065340880023', 'ralphk53@apple.com', 'Designer'),
(NULL, '001212428', 'Sharyn Christine', '5103031543510016', 'sharyn15@gmail.com', 'Marketing'),
(NULL, '004167143', 'Shannon Dolores', '5103048332540023', 'shanno83@apple.com', 'Engineer'),
(NULL, '002137568', 'Elfrieda Valentine', '5103092183120026', 'elfrie21@gmail.com', 'Designer'),
(NULL, '003311421', 'Elisabeth Rena', '5103044705930016', 'elisab47@gmail.com', 'Programmer'),
(NULL, '001172681', 'Conrad Quinn', '5103023571240011', 'conrad35@apple.com', 'Marketing'),
(NULL, '004241862', 'Everette Asher', '5103042335910020', 'everet23@tesla.inc', 'Engineer'),
(NULL, '002254722', 'Annice Theresa', '5103081809790011', 'annice18@tesla.inc', 'Designer'),
(NULL, '003248771', 'Nicola Lucius', '5103070824840018', 'nicola08@tesla.inc', 'Programmer'),
(NULL, '002200447', 'Franklin Adam', '5103091176840013', 'frankl11@gmail.com', 'Designer'),
(NULL, '004295716', 'Hector Hadley', '5103080714730012', 'hector07@tesla.inc', 'Engineer'),
(NULL, '003174278', 'Darby Desmond', '5103097764980015', 'darbyd77@tesla.inc', 'Programmer'),
(NULL, '001222897', 'Quincy Chantal', '5103022576940019', 'quincy25@tesla.inc', 'Marketing'),
(NULL, '004182667', 'Linda Mahalia', '5103050519180024', 'lindam05@gmail.com', 'Engineer'),
(NULL, '002247572', 'Beatrice Gabrielle', '5103025633430019', 'beatri56@gmail.com', 'Designer'),
(NULL, '004291878', 'Colleen Norton', '5103099848260016', 'collee98@apple.com', 'Engineer'),
(NULL, '003301172', 'Rian Raphael', '5103038786270016', 'rianra87@gmail.com', 'Programmer'),
(NULL, '003186621', 'Pearl Bryson', '5103061152610025', 'pearlb11@gmail.com', 'Programmer');

SELECT * FROM employees;