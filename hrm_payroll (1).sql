-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 07:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm_payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `absentpayments`
--

CREATE TABLE `absentpayments` (
  `id` int(11) NOT NULL,
  `emId` int(11) NOT NULL,
  `adjust_month` varchar(50) DEFAULT NULL,
  `absent_days` int(11) DEFAULT NULL,
  `payment_days` int(11) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absentpayments`
--

INSERT INTO `absentpayments` (`id`, `emId`, `adjust_month`, `absent_days`, `payment_days`, `companyId`, `amount`, `created_by`, `updated_by`, `status`, `approver_name`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-08', NULL, 15, NULL, 456.00, NULL, NULL, NULL, NULL, NULL, '2023-08-07 07:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `academicinfos`
--

CREATE TABLE `academicinfos` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `exam_title` text DEFAULT NULL,
  `institute` text DEFAULT NULL,
  `result` decimal(10,2) DEFAULT NULL,
  `passing_year` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academicinfos`
--

INSERT INTO `academicinfos` (`id`, `employeeId`, `exam_title`, `institute`, `result`, `passing_year`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL),
(2, 1, 'S.S.C or Equivalent', 'Motijeel Ideal School', 5.00, 2010, NULL, NULL, '2023-08-11 22:50:49', '2023-08-11 22:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `acl_access_types`
--

CREATE TABLE `acl_access_types` (
  `id` int(11) NOT NULL,
  `access_name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acl_access_types`
--

INSERT INTO `acl_access_types` (`id`, `access_name`, `type`) VALUES
(1, 'Full Control', 1),
(2, 'Add', 2),
(3, 'Edit', 3),
(4, 'View', 4),
(5, 'Delete', 5),
(6, 'None', 6),
(7, 'Approval1', 7),
(8, 'Approval2', 8),
(9, 'Approval3', 9),
(10, 'Approval4', 10),
(11, 'Hide', 11);

-- --------------------------------------------------------

--
-- Table structure for table `acl_item_lists`
--

CREATE TABLE `acl_item_lists` (
  `id` int(11) NOT NULL,
  `root_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `default_select` int(4) NOT NULL DEFAULT 11
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acl_item_lists`
--

INSERT INTO `acl_item_lists` (`id`, `root_id`, `item_name`, `default_select`) VALUES
(1, 1, 'Dashboard', 11),
(2, 2, 'Active Emolyee', 11),
(3, 2, 'Resigned Employee', 11),
(4, 2, 'Terminated Employee', 11);

-- --------------------------------------------------------

--
-- Table structure for table `acl_root_items`
--

CREATE TABLE `acl_root_items` (
  `id` int(11) NOT NULL,
  `root_item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acl_root_items`
--

INSERT INTO `acl_root_items` (`id`, `root_item`) VALUES
(1, 'Dashboard'),
(2, 'Employee'),
(3, 'Leave'),
(4, 'Attendance'),
(5, 'Payroll'),
(6, 'Reports'),
(7, 'Settings'),
(8, 'Notice'),
(9, 'Profile'),
(10, 'Materials');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `date` date NOT NULL,
  `timeIn` datetime NOT NULL,
  `timeOut` datetime DEFAULT NULL,
  `overTime` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `approvel` varchar(255) DEFAULT NULL,
  `approvel_id` int(11) DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL,
  `change_status` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employeeId`, `date`, `timeIn`, `timeOut`, `overTime`, `remarks`, `status`, `approvel`, `approvel_id`, `approver_name`, `change_status`) VALUES
(2, 1, '2023-08-08', '2023-08-08 13:09:00', '2023-08-08 13:11:00', NULL, NULL, 'Present', NULL, NULL, NULL, NULL),
(3, 2, '2023-08-09', '2023-08-09 13:09:00', '2023-08-09 13:10:00', NULL, 'test234', 'Present', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_account` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `bank_type` varchar(100) DEFAULT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `routing_number` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `company_account`, `branch_name`, `bank_type`, `company_id`, `routing_number`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'test', 'eee', 'test1', 'tess', 1, '344', NULL, NULL, NULL, '2023-08-05 21:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `circularrequisitions`
--

CREATE TABLE `circularrequisitions` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `no_of_recruitment` int(11) DEFAULT NULL,
  `requisitor_name` varchar(255) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `approve_date` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Pending',
  `date_required` datetime DEFAULT NULL,
  `basic_pay` decimal(10,2) DEFAULT NULL,
  `house_rent` decimal(10,2) DEFAULT NULL,
  `other_allowance` decimal(10,2) DEFAULT NULL,
  `gross_salary` decimal(10,2) DEFAULT NULL,
  `consolidated_pay` decimal(10,2) DEFAULT NULL,
  `justification` text DEFAULT NULL,
  `replacement_name` varchar(255) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `pf` varchar(50) DEFAULT NULL,
  `replacement_reason` text DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `temporary_duration` int(11) DEFAULT NULL,
  `contract_duration` int(11) DEFAULT NULL,
  `vacancy_filed_source` varchar(255) DEFAULT NULL,
  `education` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `major_responsibilities` text DEFAULT NULL,
  `existing_manpower` int(11) DEFAULT NULL,
  `pay_scale` varchar(255) DEFAULT NULL,
  `adder_id` int(11) DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `salary_grade` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `short_name` varchar(30) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `code`, `name`, `address`, `phone`, `email`, `logo`, `short_name`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`, `updated_at`) VALUES
(10, 'ddd', 'dddd', 'dd', '44544', 'test@gmail.com', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-08-05 21:22:22'),
(11, 'c-3455', '4axiz IT LTD.', 'Mirpur,Dhaka', '01920933650', 'admin@4axiz.com', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(12, 'k-345', 'Karimgroup', 'Mohakhali,Dhaka', '0987665443', 'karimgroup@gmail.com', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `confirmattendances`
--

CREATE TABLE `confirmattendances` (
  `id` int(11) NOT NULL,
  `emId` int(11) NOT NULL,
  `month` varchar(50) DEFAULT NULL,
  `working_days` int(2) DEFAULT NULL,
  `present_days` int(2) DEFAULT NULL,
  `absent_days` int(2) DEFAULT NULL,
  `total_leave` int(2) DEFAULT NULL,
  `absent_reduce` int(2) DEFAULT NULL,
  `cl_deduction` int(2) DEFAULT NULL,
  `ml_deduction` int(2) DEFAULT NULL,
  `absent_for_early` int(2) DEFAULT NULL,
  `absent_for_late` int(2) DEFAULT NULL,
  `companyId` int(2) DEFAULT NULL,
  `holiday` int(2) DEFAULT NULL,
  `payable_days` int(2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmattendances`
--

INSERT INTO `confirmattendances` (`id`, `emId`, `month`, `working_days`, `present_days`, `absent_days`, `total_leave`, `absent_reduce`, `cl_deduction`, `ml_deduction`, `absent_for_early`, `absent_for_late`, `companyId`, `holiday`, `payable_days`, `updated_at`) VALUES
(2, 2, '2023-07', 31, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, '2023-08-06 22:58:20'),
(3, 1, '2023-07', 15, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_short_name` varchar(50) DEFAULT NULL,
  `dep_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `dept_short_name`, `dep_description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'test', 'test', 'test', NULL, NULL, NULL, NULL),
(3, 'Engineering', 'Engineering', 'Engineering', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `desig_name` varchar(255) NOT NULL,
  `desig_description` text DEFAULT NULL,
  `desig_short_name` varchar(50) DEFAULT NULL,
  `desig_rank` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `desig_name`, `desig_description`, `desig_short_name`, `desig_rank`, `company_id`, `created_by`, `created_date`, `updated_date`, `updated_by`, `updated_at`) VALUES
(1, 'Senior Software Engineer', 'Senior Software Engineer', 'SSEddd', 1, 1, NULL, NULL, NULL, NULL, '2023-08-07 02:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `ref_number` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employeematerials`
--

CREATE TABLE `employeematerials` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `material_name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `issueDate` date DEFAULT NULL,
  `warranty` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeematerials`
--

INSERT INTO `employeematerials` (`id`, `employeeId`, `material_name`, `qty`, `description`, `issueDate`, `warranty`, `price`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'khata', 1, 'test', '2023-08-12', '2023-08-26', NULL, NULL, NULL, '2023-08-12 01:06:00', '2023-08-12 01:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `motherName` varchar(255) DEFAULT NULL,
  `employeeId` varchar(50) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `sub_section` int(11) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `shift` int(11) DEFAULT NULL,
  `joinDate` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `permanentAddress` text DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `salary` decimal(14,2) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `bloodGroup` varchar(30) DEFAULT NULL,
  `workerType` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `maritial_status` varchar(9) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `ot_rate` decimal(10,2) DEFAULT NULL,
  `key_skill` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `metarials` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `presentAddress` text DEFAULT NULL,
  `voterId` varchar(100) DEFAULT NULL,
  `voterImage` varchar(255) DEFAULT NULL,
  `weekend` varchar(30) DEFAULT NULL,
  `mark` decimal(10,2) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `confirmation` varchar(5) DEFAULT NULL,
  `home_phone` varchar(50) DEFAULT NULL,
  `office_phone` varchar(50) DEFAULT NULL,
  `office_tnt1` varchar(50) DEFAULT NULL,
  `office_tnt2` varchar(50) DEFAULT NULL,
  `office_tnt3` varchar(50) DEFAULT NULL,
  `tin_no` varchar(255) DEFAULT NULL,
  `bank_acct_no` varchar(100) DEFAULT NULL,
  `pabx` varchar(255) DEFAULT NULL,
  `serialNo` varchar(100) DEFAULT NULL,
  `meal_member_status` tinyint(2) DEFAULT NULL,
  `salary_unit` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `resign_date` date DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `rank` tinyint(4) DEFAULT NULL,
  `bank_portion` decimal(14,2) DEFAULT NULL,
  `cash_portion` decimal(14,2) DEFAULT NULL,
  `salary_held_up` varchar(50) DEFAULT NULL,
  `one_punch` varchar(30) DEFAULT NULL,
  `distribution_type` varchar(30) DEFAULT NULL,
  `basic_percent` decimal(10,2) DEFAULT NULL,
  `house_rent_percent` decimal(10,2) DEFAULT NULL,
  `medical_percent` decimal(10,2) DEFAULT NULL,
  `e_category` varchar(100) DEFAULT NULL,
  `meal_deduction` varchar(10) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `first_approver_name` varchar(255) DEFAULT NULL,
  `second_approver_name` varchar(255) DEFAULT NULL,
  `third_approver_name` varchar(255) DEFAULT NULL,
  `fourth_approver_name` varchar(255) DEFAULT NULL,
  `shift_name` varchar(255) DEFAULT NULL,
  `bonus_type` varchar(30) DEFAULT NULL,
  `activationDate` date DEFAULT NULL,
  `is_approver` varchar(30) DEFAULT NULL,
  `bonus_held_up` varchar(10) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `fatherName`, `motherName`, `employeeId`, `gender`, `department`, `section`, `sub_section`, `designation`, `shift`, `joinDate`, `dob`, `phone`, `permanentAddress`, `company`, `salary`, `grade`, `bloodGroup`, `workerType`, `email`, `maritial_status`, `photo`, `resume`, `qualification`, `ot_rate`, `key_skill`, `note`, `metarials`, `status`, `presentAddress`, `voterId`, `voterImage`, `weekend`, `mark`, `nationality`, `religion`, `confirmation`, `home_phone`, `office_phone`, `office_tnt1`, `office_tnt2`, `office_tnt3`, `tin_no`, `bank_acct_no`, `pabx`, `serialNo`, `meal_member_status`, `salary_unit`, `bank_id`, `resign_date`, `reason`, `rank`, `bank_portion`, `cash_portion`, `salary_held_up`, `one_punch`, `distribution_type`, `basic_percent`, `house_rent_percent`, `medical_percent`, `e_category`, `meal_deduction`, `user_name`, `first_approver_name`, `second_approver_name`, `third_approver_name`, `fourth_approver_name`, `shift_name`, `bonus_type`, `activationDate`, `is_approver`, `bonus_held_up`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_active`) VALUES
(1, 'Mr. Kamal', NULL, NULL, '22', NULL, 3, 2, 3, 1, NULL, '2023-08-08', NULL, NULL, NULL, 11, NULL, NULL, NULL, 'Employee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, 'Saturday', NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, '11', NULL, '22', NULL, NULL, 11, 1, NULL, NULL, NULL, 10000.00, 500.00, 'yes', NULL, 'fixed', NULL, NULL, NULL, 'Worker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-09', NULL, NULL, NULL, NULL, NULL, '2023-08-07 13:41:59', 1),
(2, 'Mr. Javed', NULL, NULL, 'e-345', NULL, 3, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-12', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ofice staf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-11 22:59:23', 1),
(3, 'Mr. Khairul', NULL, NULL, '33', NULL, 3, 2, 3, 1, 2, '2023-08-10', NULL, NULL, NULL, 11, NULL, NULL, NULL, 'Worker Type', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Terminated', NULL, NULL, NULL, 'Sunday', NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, '44', NULL, NULL, '444', NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, 'Category', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-09', NULL, NULL, NULL, '2023-08-07 22:40:43', NULL, '2023-08-07 22:41:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeesalaries`
--

CREATE TABLE `employeesalaries` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `Basic` decimal(10,2) DEFAULT NULL,
  `dearness_allow` decimal(10,2) DEFAULT NULL,
  `house_rent` decimal(10,2) DEFAULT NULL,
  `special_allow` decimal(10,2) DEFAULT NULL,
  `mobile_allow` decimal(10,2) DEFAULT NULL,
  `incentive_allow` decimal(10,2) DEFAULT NULL,
  `food_allow` decimal(10,2) DEFAULT NULL,
  `performance_allow` decimal(10,2) DEFAULT NULL,
  `ot_rate` decimal(10,2) DEFAULT NULL,
  `salaryGrad` int(11) DEFAULT NULL,
  `medical_allow` decimal(10,2) DEFAULT NULL,
  `attendance_bonus` int(11) DEFAULT NULL,
  `meal_deduction` decimal(10,2) DEFAULT NULL,
  `house_deduction` decimal(10,2) DEFAULT NULL,
  `transport_deduction` decimal(10,2) DEFAULT NULL,
  `TDS` decimal(10,2) DEFAULT NULL,
  `provident_fund` decimal(10,2) DEFAULT NULL,
  `benefit_value` varchar(255) DEFAULT NULL,
  `deduction_value` varchar(255) DEFAULT NULL,
  `HouseRent` decimal(10,2) DEFAULT NULL,
  `Medical` decimal(10,2) DEFAULT NULL,
  `Transport` decimal(10,2) DEFAULT NULL,
  `Others` int(11) DEFAULT NULL,
  `Lunch` decimal(10,2) DEFAULT NULL,
  `Stamp` decimal(10,2) DEFAULT NULL,
  `submit` varchar(50) DEFAULT NULL,
  `gross` decimal(10,2) DEFAULT NULL,
  `Tax` decimal(10,2) DEFAULT NULL,
  `net_gross` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `security_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeesalaries`
--

INSERT INTO `employeesalaries` (`id`, `employeeId`, `Basic`, `dearness_allow`, `house_rent`, `special_allow`, `mobile_allow`, `incentive_allow`, `food_allow`, `performance_allow`, `ot_rate`, `salaryGrad`, `medical_allow`, `attendance_bonus`, `meal_deduction`, `house_deduction`, `transport_deduction`, `TDS`, `provident_fund`, `benefit_value`, `deduction_value`, `HouseRent`, `Medical`, `Transport`, `Others`, `Lunch`, `Stamp`, `submit`, `gross`, `Tax`, `net_gross`, `status`, `approver_id`, `security_amount`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3000.00, 600.00, 400.00, 500, NULL, 10.00, NULL, 10000.00, NULL, 10500.00, NULL, NULL, 4567, NULL, NULL, '2023-08-07 06:13:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `id` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `disbursement_date` date NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genaratedsalaries`
--

CREATE TABLE `genaratedsalaries` (
  `id` int(11) NOT NULL,
  `company` int(11) DEFAULT NULL,
  `emId` int(11) DEFAULT NULL,
  `designationId` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `departmentId` int(11) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `working_days` int(11) DEFAULT NULL,
  `absent_days` int(11) DEFAULT NULL,
  `payable_days` int(11) DEFAULT NULL,
  `gross` int(11) DEFAULT NULL,
  `Basic` decimal(10,2) DEFAULT NULL,
  `HouseRent` decimal(10,2) DEFAULT NULL,
  `Medical` decimal(10,2) DEFAULT NULL,
  `Transport` decimal(10,2) DEFAULT NULL,
  `Others` decimal(10,2) DEFAULT NULL,
  `arrear` decimal(10,2) DEFAULT NULL,
  `Stamp` decimal(10,2) DEFAULT NULL,
  `TDS` decimal(10,2) DEFAULT NULL,
  `absent_amount` decimal(10,2) DEFAULT NULL,
  `other_deduction` decimal(10,2) DEFAULT NULL,
  `general_loan` decimal(10,2) DEFAULT NULL,
  `salary_advance` decimal(10,2) DEFAULT NULL,
  `total_deduction` decimal(10,2) DEFAULT NULL,
  `net_payable` decimal(10,2) DEFAULT NULL,
  `perday_salary` decimal(10,2) DEFAULT NULL,
  `meal` decimal(10,2) DEFAULT NULL,
  `month` varchar(30) DEFAULT NULL,
  `net_gross` decimal(10,2) DEFAULT NULL,
  `bank_amount` decimal(10,2) DEFAULT NULL,
  `cash_amount` decimal(10,2) DEFAULT NULL,
  `bank_payable_amount` decimal(10,2) DEFAULT NULL,
  `cash_payable_amount` decimal(10,2) DEFAULT NULL,
  `salary_held_up` varchar(30) DEFAULT NULL,
  `lwp_amount` decimal(10,2) DEFAULT NULL,
  `overtime_hours` decimal(10,2) DEFAULT NULL,
  `overtime_rate` decimal(10,2) DEFAULT NULL,
  `overtime_amount` decimal(10,2) DEFAULT NULL,
  `night_allowance_amount` decimal(10,2) DEFAULT NULL,
  `attendance_bonus` decimal(10,2) DEFAULT NULL,
  `food_allowance_amount` decimal(10,2) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `security_amount` decimal(10,2) DEFAULT NULL,
  `mobile_deduction` decimal(10,2) DEFAULT NULL,
  `car_loan` decimal(10,2) DEFAULT NULL,
  `arear` decimal(10,2) DEFAULT NULL,
  `increment_arrear` decimal(10,2) DEFAULT NULL,
  `salary_arrear` decimal(10,2) DEFAULT NULL,
  `absent_arrear` decimal(10,2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halfleaves`
--

CREATE TABLE `halfleaves` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halfleaves`
--

INSERT INTO `halfleaves` (`id`, `employeeId`, `date`, `startTime`, `endTime`, `reason`, `status`, `approver_name`, `approver_id`, `updated_at`) VALUES
(2, 1, '2023-08-01', '2023-08-01 04:39:00', '2023-08-01 01:43:00', 'test', 'Pending', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `day` tinyint(4) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `category` varchar(150) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `the_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `day`, `startDate`, `endDate`, `category`, `remarks`, `company`, `the_date`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, 'Gove Holiday', NULL, NULL, '2023-08-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `increments`
--

CREATE TABLE `increments` (
  `id` int(11) NOT NULL,
  `emId` int(11) NOT NULL,
  `gross` int(11) DEFAULT NULL,
  `Basic` decimal(10,2) DEFAULT NULL,
  `HouseRent` decimal(10,2) DEFAULT NULL,
  `Medical` decimal(10,2) DEFAULT NULL,
  `Transport` decimal(10,2) DEFAULT NULL,
  `Others` decimal(10,2) DEFAULT NULL,
  `Stamp` decimal(10,2) DEFAULT NULL,
  `Tax` decimal(10,2) DEFAULT NULL,
  `increment_date` date DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `designation_to` int(11) DEFAULT NULL,
  `salary_increment_amount` decimal(10,2) DEFAULT NULL,
  `others_increment_amount` decimal(10,2) DEFAULT NULL,
  `net_gross` decimal(10,2) DEFAULT NULL,
  `bank_amount` decimal(10,2) DEFAULT NULL,
  `cash_amount` decimal(10,2) DEFAULT NULL,
  `effective_month` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `total_increment_amount` decimal(10,2) DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `adjust_month` varchar(50) DEFAULT NULL,
  `reject_reason` text DEFAULT NULL,
  `first_approver_id` int(11) DEFAULT NULL,
  `second_approver_id` int(11) DEFAULT NULL,
  `third_approver_id` int(11) DEFAULT NULL,
  `fourth_approver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `increments`
--

INSERT INTO `increments` (`id`, `emId`, `gross`, `Basic`, `HouseRent`, `Medical`, `Transport`, `Others`, `Stamp`, `Tax`, `increment_date`, `created_date`, `designation_id`, `designation_to`, `salary_increment_amount`, `others_increment_amount`, `net_gross`, `bank_amount`, `cash_amount`, `effective_month`, `created_by`, `updated_by`, `updated_date`, `type`, `status`, `approver_id`, `companyId`, `total_increment_amount`, `approver_name`, `effective_date`, `adjust_month`, `reject_reason`, `first_approver_id`, `second_approver_id`, `third_approver_id`, `fourth_approver_id`, `created_at`, `updated_at`) VALUES
(2, 1, 50000, NULL, NULL, NULL, NULL, 4566.00, NULL, NULL, '2023-08-05', NULL, NULL, NULL, 234.00, 4555.00, 3456.00, 4567.00, 3456.00, 'February', NULL, NULL, NULL, 'Fixed Amount', NULL, NULL, NULL, 58245.00, NULL, '2023-08-15', 'January', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `leave_type` int(11) NOT NULL,
  `startDateLeave` date NOT NULL,
  `endDateLeave` date NOT NULL,
  `leaveDay` decimal(4,2) NOT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `year` int(4) DEFAULT NULL,
  `applicant_designation` int(11) DEFAULT NULL,
  `applicant_department` int(11) DEFAULT NULL,
  `leave_reason` text DEFAULT NULL,
  `applicant_address` text DEFAULT NULL,
  `applicant_contact_no` varchar(50) DEFAULT NULL,
  `applicant_name` varchar(255) DEFAULT NULL,
  `responsibility_name` varchar(255) DEFAULT NULL,
  `responsibilty_employee_id` int(11) DEFAULT NULL,
  `responsibilty_designation` int(11) DEFAULT NULL,
  `responsibility_contact_no` varchar(50) DEFAULT NULL,
  `appliedDate` date DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `medical_doc` varchar(255) DEFAULT NULL,
  `reject_reason` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employeeId`, `leave_type`, `startDateLeave`, `endDateLeave`, `leaveDay`, `remarks`, `status`, `year`, `applicant_designation`, `applicant_department`, `leave_reason`, `applicant_address`, `applicant_contact_no`, `applicant_name`, `responsibility_name`, `responsibilty_employee_id`, `responsibilty_designation`, `responsibility_contact_no`, `appliedDate`, `approver_name`, `approver_id`, `medical_doc`, `reject_reason`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 1, 2, '2023-08-01', '2023-08-05', 4.00, NULL, 'Pending', NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 1, '2023-08-09', '2023-08-10', 2.00, NULL, 'Pending', NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leavetypes`
--

CREATE TABLE `leavetypes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `allowedLeave` tinyint(2) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavetypes`
--

INSERT INTO `leavetypes` (`id`, `name`, `short_name`, `description`, `allowedLeave`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_active`) VALUES
(1, 'Annual Leave', 'AL', 'Annual Leave', 10, NULL, NULL, NULL, NULL, 1),
(2, 'Medical Leave', 'ML', 'Medical Leave', 10, NULL, NULL, NULL, NULL, 1),
(3, 'Casual Leave', 'CL', 'Casual Leave', 10, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loaninstallments`
--

CREATE TABLE `loaninstallments` (
  `id` int(11) NOT NULL,
  `loanId` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `installmentAmount` decimal(14,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `dateOfTaken` date DEFAULT NULL,
  `amount` decimal(14,2) DEFAULT NULL,
  `totalInstallment` int(11) DEFAULT NULL,
  `perInstallment` decimal(10,2) DEFAULT NULL,
  `takenInstallment` int(11) DEFAULT NULL,
  `paidAmount` decimal(14,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `approver_name` varchar(100) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `paidDate` date DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movementregisterdeatials`
--

CREATE TABLE `movementregisterdeatials` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `movement_id` int(11) DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movementregisters`
--

CREATE TABLE `movementregisters` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `approver_name` varchar(255) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `task_status` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `reject_reason` text DEFAULT NULL,
  `first_approver_id` int(11) DEFAULT NULL,
  `second_approver_id` int(11) DEFAULT NULL,
  `third_approver_id` int(11) DEFAULT NULL,
  `fourth_approver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movementregisters`
--

INSERT INTO `movementregisters` (`id`, `employeeId`, `date`, `startTime`, `endTime`, `reason`, `status`, `approver_name`, `approver_id`, `fromDate`, `toDate`, `address`, `task_status`, `remarks`, `reject_reason`, `first_approver_id`, `second_approver_id`, `third_approver_id`, `fourth_approver_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, NULL, 'test22', 'Pending', NULL, NULL, '2023-08-02', '2023-08-09', 'test1', 'complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-06 20:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `notice` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `employee_id` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `notice_type` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performances`
--

CREATE TABLE `performances` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `year` decimal(4,2) DEFAULT NULL,
  `puntuality` decimal(4,2) DEFAULT NULL,
  `job_knowledge` decimal(4,2) DEFAULT NULL,
  `initiative` decimal(4,2) DEFAULT NULL,
  `attendace` decimal(4,2) DEFAULT NULL,
  `ednQualification` decimal(4,2) DEFAULT NULL,
  `honesty` decimal(4,2) DEFAULT NULL,
  `sincerity` decimal(4,2) DEFAULT NULL,
  `lengthOfService` decimal(4,2) DEFAULT NULL,
  `customerFocus` decimal(4,2) DEFAULT NULL,
  `CommSkill` decimal(4,2) DEFAULT NULL,
  `professionalism` decimal(4,2) DEFAULT NULL,
  `behaviour` decimal(4,2) DEFAULT NULL,
  `goal` decimal(4,2) DEFAULT NULL,
  `pdd` decimal(4,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaryarrears`
--

CREATE TABLE `salaryarrears` (
  `id` int(11) NOT NULL,
  `emId` int(11) NOT NULL,
  `adjust_month` varchar(30) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `companyId` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payable_days` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `department` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `section_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `department`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_active`, `section_name`) VALUES
(2, 3, 'Engineering', NULL, NULL, NULL, NULL, 1, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` int(11) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `shiftCode` varchar(255) NOT NULL,
  `startTime` time(6) NOT NULL,
  `endTime` time(6) NOT NULL,
  `weekend` tinyint(1) NOT NULL DEFAULT 1,
  `toShift` tinyint(4) DEFAULT NULL,
  `intimeRange` time(6) DEFAULT NULL,
  `outtimeRange` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shortleaves`
--

CREATE TABLE `shortleaves` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shortleaves`
--

INSERT INTO `shortleaves` (`id`, `employeeId`, `date`, `startTime`, `endTime`, `reason`, `status`, `approver_name`, `approver_id`) VALUES
(2, 2, '2023-08-12', '2023-08-12 11:29:00', '2023-08-12 23:29:00', 'test', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shortmovementregisters`
--

CREATE TABLE `shortmovementregisters` (
  `id` int(11) NOT NULL,
  `emId` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `reason` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `approver_name` varchar(255) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `count` tinyint(2) DEFAULT NULL,
  `reject_reason` text DEFAULT NULL,
  `first_approver_id` int(11) DEFAULT NULL,
  `second_approver_id` int(11) DEFAULT NULL,
  `third_approver_id` int(11) DEFAULT NULL,
  `fourth_approver_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `task_status` varchar(30) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shortmovementregisters`
--

INSERT INTO `shortmovementregisters` (`id`, `emId`, `date`, `startTime`, `endTime`, `reason`, `status`, `approver_name`, `approver_id`, `created_date`, `count`, `reject_reason`, `first_approver_id`, `second_approver_id`, `third_approver_id`, `fourth_approver_id`, `address`, `task_status`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 1, '2023-08-06', '2023-08-06 16:30:00', '2023-08-06 21:36:00', 'test1', 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-06 20:26:47'),
(4, 2, '2023-08-09', '2023-08-09 08:37:00', '2023-08-09 08:35:00', 'test', 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subsections`
--

CREATE TABLE `subsections` (
  `id` int(11) NOT NULL,
  `section` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subsections`
--

INSERT INTO `subsections` (`id`, `section`, `name`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_active`) VALUES
(3, 2, 'tst', 'www', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transferemloyees`
--

CREATE TABLE `transferemloyees` (
  `id` int(11) NOT NULL,
  `ttr_id` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `shift` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `from_company` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `user_type` tinyint(2) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `approver1` int(11) DEFAULT NULL,
  `approver2` int(11) DEFAULT NULL,
  `userRole` text DEFAULT NULL,
  `userMenu` text DEFAULT NULL,
  `approver3` int(11) DEFAULT NULL,
  `approver4` int(11) DEFAULT NULL,
  `assign_company` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workprograms`
--

CREATE TABLE `workprograms` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `concern_type` varchar(255) DEFAULT NULL,
  `concern_employee` int(11) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `creatd_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workprograms`
--

INSERT INTO `workprograms` (`id`, `employee_id`, `date`, `time`, `subject`, `job`, `organization`, `venue`, `status`, `concern_type`, `concern_employee`, `others`, `deadline`, `creatd_at`, `updated_at`) VALUES
(1, 1, '2023-08-08', NULL, NULL, 'test', NULL, NULL, 'Done', 'Employee', NULL, NULL, '2023-08-17', NULL, '2023-08-08 00:17:15'),
(2, 1, '2023-08-09', NULL, NULL, 'dddd', NULL, NULL, 'Pending', 'Employee', NULL, NULL, '2023-08-17', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absentpayments`
--
ALTER TABLE `absentpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academicinfos`
--
ALTER TABLE `academicinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acl_access_types`
--
ALTER TABLE `acl_access_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acl_item_lists`
--
ALTER TABLE `acl_item_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acl_root_items`
--
ALTER TABLE `acl_root_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circularrequisitions`
--
ALTER TABLE `circularrequisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`,`code`);

--
-- Indexes for table `confirmattendances`
--
ALTER TABLE `confirmattendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeematerials`
--
ALTER TABLE `employeematerials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeesalaries`
--
ALTER TABLE `employeesalaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genaratedsalaries`
--
ALTER TABLE `genaratedsalaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halfleaves`
--
ALTER TABLE `halfleaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `increments`
--
ALTER TABLE `increments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavetypes`
--
ALTER TABLE `leavetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaninstallments`
--
ALTER TABLE `loaninstallments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movementregisterdeatials`
--
ALTER TABLE `movementregisterdeatials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movementregisters`
--
ALTER TABLE `movementregisters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `performances`
--
ALTER TABLE `performances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salaryarrears`
--
ALTER TABLE `salaryarrears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`,`shiftCode`);

--
-- Indexes for table `shortleaves`
--
ALTER TABLE `shortleaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortmovementregisters`
--
ALTER TABLE `shortmovementregisters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsections`
--
ALTER TABLE `subsections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transferemloyees`
--
ALTER TABLE `transferemloyees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workprograms`
--
ALTER TABLE `workprograms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absentpayments`
--
ALTER TABLE `absentpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academicinfos`
--
ALTER TABLE `academicinfos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `acl_access_types`
--
ALTER TABLE `acl_access_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `acl_item_lists`
--
ALTER TABLE `acl_item_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `acl_root_items`
--
ALTER TABLE `acl_root_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `circularrequisitions`
--
ALTER TABLE `circularrequisitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `confirmattendances`
--
ALTER TABLE `confirmattendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeematerials`
--
ALTER TABLE `employeematerials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employeesalaries`
--
ALTER TABLE `employeesalaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genaratedsalaries`
--
ALTER TABLE `genaratedsalaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `halfleaves`
--
ALTER TABLE `halfleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `increments`
--
ALTER TABLE `increments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leavetypes`
--
ALTER TABLE `leavetypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loaninstallments`
--
ALTER TABLE `loaninstallments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movementregisterdeatials`
--
ALTER TABLE `movementregisterdeatials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movementregisters`
--
ALTER TABLE `movementregisters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performances`
--
ALTER TABLE `performances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaryarrears`
--
ALTER TABLE `salaryarrears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortleaves`
--
ALTER TABLE `shortleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shortmovementregisters`
--
ALTER TABLE `shortmovementregisters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subsections`
--
ALTER TABLE `subsections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transferemloyees`
--
ALTER TABLE `transferemloyees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workprograms`
--
ALTER TABLE `workprograms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
