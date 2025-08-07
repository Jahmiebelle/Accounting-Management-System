-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 06:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: accountingsys
--

-- --------------------------------------------------------

--
-- Table structure for table admin_employee_attendance
--

CREATE TABLE admin_employee_attendance (
  attendance_id int(50) NOT NULL,
  department_id int(11) DEFAULT NULL,
  employee_id int(11) DEFAULT NULL,
  employee_date date DEFAULT NULL,
  clock_in time DEFAULT NULL,
  clock_out time DEFAULT NULL,
  employee_overtime time NOT NULL,
  total_hours time NOT NULL,
  employee_name varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table admin_employee_attendance
--

INSERT INTO admin_employee_attendance (attendance_id, department_id, employee_id, employee_date, clock_in, clock_out, employee_overtime, total_hours, employee_name) VALUES
(14, 1, 2, '2025-06-17', '09:12:37', '15:00:37', '00:00:00', '05:48:00', 'Gab Lopez'),
(15, 1, 2, '2025-06-18', '07:00:52', '17:00:21', '01:59:29', '09:59:29', 'Gab Lopez'),
(16, 1, 2, '2025-07-01', '07:02:06', NULL, '00:00:00', '00:00:00', 'Gab Lopez');

-- --------------------------------------------------------

--
-- Table structure for table admin_payroll_summary
--

CREATE TABLE admin_payroll_summary (
  month_year varchar(7) DEFAULT NULL,
  no_of_employee int(255) DEFAULT NULL,
  total_gross int(255) DEFAULT NULL,
  total_overtime int(255) DEFAULT NULL,
  total_tax int(255) DEFAULT NULL,
  total_payroll int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table admin_payslip
--

CREATE TABLE admin_payslip (
  employee_id int(255) DEFAULT NULL,
  employee_date date DEFAULT NULL,
  total_hours time DEFAULT NULL,
  total_overtime time DEFAULT NULL,
  total_working_days int(255) DEFAULT NULL,
  basic_salary decimal(10,2) DEFAULT NULL,
  overtime_pay decimal(10,2) DEFAULT NULL,
  employee_gross_salary decimal(10,2) DEFAULT NULL,
  total_deduction decimal(10,2) DEFAULT NULL,
  employee_net_salary decimal(10,2) DEFAULT NULL,
  status_is tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table admin_table
--

CREATE TABLE admin_table (
  admin_id int(11) NOT NULL,
  company_id int(11) NOT NULL,
  password varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  middle_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table admin_table
--

INSERT INTO admin_table (admin_id, company_id, password, email, first_name, middle_name, last_name) VALUES
(1, 1, '123', 'jam@gmail.com', 'Jam', 'Perlas', 'Laurente');

-- --------------------------------------------------------

--
-- Table structure for table admin_taxation_table
--

CREATE TABLE admin_taxation_table (
  sss_tax decimal(10,3) DEFAULT NULL,
  philhealth_tax decimal(10,3) DEFAULT NULL,
  pagibig_tax decimal(10,3) DEFAULT NULL,
  income_tax decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table admin_taxation_table
--

INSERT INTO admin_taxation_table (sss_tax, philhealth_tax, pagibig_tax, income_tax) VALUES
(0.040, 0.030, 0.020, 0.020);

-- --------------------------------------------------------

--
-- Table structure for table department_table
--

CREATE TABLE department_table (
  department_id int(11) NOT NULL,
  department_name varchar(255) NOT NULL,
  acronym varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table department_table
--

INSERT INTO department_table (department_id, department_name, acronym) VALUES
(1, 'Information Technology', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table employee_table
--

CREATE TABLE employee_table (
  employee_id int(11) NOT NULL,
  company_id int(11) NOT NULL,
  password varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  middle_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  status varchar(255) NOT NULL,
  department varchar(255) NOT NULL,
  gender varchar(255) NOT NULL,
  contact_number varchar(20) NOT NULL,
  employment_type varchar(255) NOT NULL,
  position varchar(255) NOT NULL,
  join_date date NOT NULL,
  birthdate date NOT NULL,
  bank_number varchar(20) NOT NULL,
  sss_number varchar(15) NOT NULL,
  philhealth_number varchar(15) NOT NULL,
  pagibig_number varchar(20) NOT NULL,
  is_active tinyint(1) NOT NULL,
  image varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table employee_table
--

INSERT INTO employee_table (employee_id, company_id, password, first_name, middle_name, last_name, email, status, department, gender, contact_number, employment_type, position, join_date, birthdate, bank_number, sss_number, philhealth_number, pagibig_number, is_active, image) VALUES
(2, 2, '1234', 'Benedict', 'N/A', 'Lopez', 'gab@gmail.com', 'active', 'Information Technology', 'male', '12345678', 'regular', 'instructor', '2025-06-17', '2002-11-28', '12345679', '12345678', '12345678', '12345678', 1, '../../Assets/uploads/IMG_686318b9e7b1d0.60839700.jpeg'),
(3, 3, '12345', 'Glory', 'N/A', 'Alelis', 'glory@gmail.com', 'active', 'Information Technology', 'female', '09123456789', 'regular', 'professor', '2020-07-01', '2002-06-30', '1232334676', '235487687456', '465787699776', '3547687969008', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table employee_work_table
--

CREATE TABLE employee_work_table (
  employee_id int(11) NOT NULL,
  hourly_rate int(11) DEFAULT NULL,
  gross_pay decimal(10,2) DEFAULT NULL,
  total_hours_worked int(11) DEFAULT NULL,
  total_overtime_hours int(11) DEFAULT NULL,
  total_working_days int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table employee_work_table
--

INSERT INTO employee_work_table (employee_id, hourly_rate, gross_pay, total_hours_worked, total_overtime_hours, total_working_days) VALUES
(2, 80, 0.00, 0, 0, 1),
(3, 100, 0.00, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table payroll_history_table
--

CREATE TABLE payroll_history_table (
  payroll_id int(11) NOT NULL,
  month_year date DEFAULT NULL,
  employee_id int(11) DEFAULT NULL,
  first_name varchar(255) DEFAULT NULL,
  last_name varchar(255) DEFAULT NULL,
  basic_salary decimal(10,2) DEFAULT NULL,
  overtime_pay decimal(10,2) DEFAULT NULL,
  gross_pay decimal(10,2) DEFAULT NULL,
  income_tax decimal(10,2) DEFAULT NULL,
  sss decimal(10,2) DEFAULT NULL,
  philhealth decimal(10,2) DEFAULT NULL,
  pagibig decimal(10,2) DEFAULT NULL,
  total_deductions decimal(10,2) DEFAULT NULL,
  net_pay decimal(10,2) DEFAULT NULL,
  is_complete tinyint(1) DEFAULT 0,
  created_at timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table payroll_history_table
--

INSERT INTO payroll_history_table (payroll_id, month_year, employee_id, first_name, last_name, basic_salary, overtime_pay, gross_pay, income_tax, sss, philhealth, pagibig, total_deductions, net_pay, is_complete, created_at) VALUES
(2, '2025-06-17', 2, 'Gab', 'Lopez', 1120.00, 96.00, 1216.00, 24.32, 48.64, 36.48, 24.32, 133.76, 1082.24, 1, '2025-06-17 00:55:40'),
(3, '2025-07-01', 2, 'Benedict', 'Lopez', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, '2025-06-30 23:01:13'),
(4, '2025-07-01', 3, 'Glory', 'Alelis', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, '2025-06-30 23:27:11');

-- --------------------------------------------------------

--
-- Table structure for table role_hourly_rate
--

CREATE TABLE role_hourly_rate (
  role_name varchar(255) NOT NULL,
  hourly_rate int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table role_hourly_rate
--

INSERT INTO role_hourly_rate (role_name, hourly_rate) VALUES
('instructor', 80),
('part_time_staff', 70),
('professor', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table admin_employee_attendance
--
ALTER TABLE admin_employee_attendance
  ADD PRIMARY KEY (attendance_id);

--
-- Indexes for table admin_table
--
ALTER TABLE admin_table
  ADD PRIMARY KEY (admin_id),
  ADD UNIQUE KEY company_id (company_id);

--
-- Indexes for table department_table
--
ALTER TABLE department_table
  ADD PRIMARY KEY (department_id);

--
-- Indexes for table employee_table
--
ALTER TABLE employee_table
  ADD PRIMARY KEY (employee_id),
  ADD UNIQUE KEY company_id (company_id);

--
-- Indexes for table employee_work_table
--
ALTER TABLE employee_work_table
  ADD PRIMARY KEY (employee_id);

--
-- Indexes for table payroll_history_table
--
ALTER TABLE payroll_history_table
  ADD PRIMARY KEY (payroll_id);

--
-- Indexes for table role_hourly_rate
--
ALTER TABLE role_hourly_rate
  ADD PRIMARY KEY (role_name);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table admin_employee_attendance
--
ALTER TABLE admin_employee_attendance
  MODIFY attendance_id int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table employee_table
--
ALTER TABLE employee_table
  MODIFY employee_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025002;

--
-- AUTO_INCREMENT for table payroll_history_table
--
ALTER TABLE payroll_history_table
  MODIFY payroll_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;