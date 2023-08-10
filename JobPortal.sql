-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 10:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` text DEFAULT NULL,
  `profile_pic` text DEFAULT 'user.png',
  `email` text NOT NULL,
  `createdat` date NOT NULL,
  `gender` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `contactno` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `password`, `fullname`, `profile_pic`, `email`, `createdat`, `gender`, `dob`, `address`, `role_id`, `contactno`) VALUES
(1, '$2y$10$N/k4/DWuDzTXBrpiYDsO1.59tXkKQuLXcxB.eSrvdknLyMssxZYii', 'admin sabbir', '21560ff720ef5c73fa38ae6923adf1c5shreemangal.jpg', 'adminsabbir@gmail.com', '0000-00-00', 'Male', '1995-06-07', 'Dhaka', 3, '01510151265');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobposts`
--

CREATE TABLE `applied_jobposts` (
  `id_applied` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied_jobposts`
--

INSERT INTO `applied_jobposts` (`id_applied`, `id_jobpost`, `id_user`, `id_company`, `status`, `createdat`) VALUES
(0, 6, 8, 4, NULL, '2023-07-31 00:00:00'),
(0, 6, 9, 4, NULL, '2023-07-31 00:00:00'),
(0, 6, 10, 4, NULL, '2023-08-01 00:00:00'),
(0, 3, 8, 1, NULL, '2023-08-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `name`) VALUES
(1, 'High School Student'),
(2, 'Undergraduate'),
(3, 'Graduate'),
(4, 'Senior Executive(President, CFO, etc)'),
(5, 'Manager/Supervisor of Staff'),
(6, 'Executive(SVP, VP, Department Head, etc)');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `companyname` text NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `address` text DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `contactno` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `aboutme` text DEFAULT NULL,
  `hash` varchar(255) NOT NULL,
  `createdAt` date NOT NULL,
  `active` int(3) DEFAULT 0,
  `esta_date` date DEFAULT NULL,
  `empno` int(11) DEFAULT NULL,
  `profile_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `industry_id`, `companyname`, `role_id`, `address`, `state_id`, `city_id`, `contactno`, `website`, `email`, `password`, `aboutme`, `hash`, `createdAt`, `active`, `esta_date`, `empno`, `profile_pic`) VALUES
(1, 14, 'Brain Station', 2, 'Bangladesh', 3, 18, '01404-055220', 'https://brainstation-23.com', 'brainstation@gmail.com', '$2y$10$LIMkadRxBHTFTjxyp52jMOOUCcAU9v9a2YcUlhD6T3caeSAlU4KGG', 'It was in 2006, with little capital but a pocketful of belief our CEO, Raisul Kabir started Brain Station 23, a software company, right after graduating from BUET. The new company initially focused on the international market with the local market added in 2010. Since then the company has shown a continuous growth and currently employs over 700+ software engineers. Brain Station 23 is now not only an established name in Bangladesh but also in countries like the USA, UK, Netherlands, Denmark, Japan, Norway, Sweden, Germany, Canada, Switzerland, Turkey and the Middle East etc.', '', '2023-06-27', 0, '2006-11-14', 800, '75ef2589822c79bbc9c343bb255ca5aasundarban.jpg'),
(4, 7, 'Bashundhara Group', 2, 'Plot # 125/A, Block# A, Bashundhara R/A, Road No - 2 Baridhara, Dhaka-1229', 3, 18, '+880 2 8432008-17', 'https://www.bashundharagroup.com/', 'bashundhara@gmail.com', '$2y$10$DYLcqXt.dJJQ7YuPS6Ug8ubjc8wJ51GvEHiwapuqLL8ajGE13ZQP2', 'THE BASHUNDHARA GROUP HAS STARTED OPERATION AS A REAL ESTATE VENTURE KNOWN AS BASHUNDHARA UNDER THE AEGIS OF THE GROUP  FIRST CONCERN - THE EAST-WEST PROPERTY DEVELOPMENT (PVT) LTD IN 1987.', '', '2023-07-04', 0, '1987-10-07', 12000, '14495f1d1b0af572ffce16b16f4b2606FindJobsWallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company_reviews`
--

CREATE TABLE `company_reviews` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `review` text NOT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_reviews`
--

INSERT INTO `company_reviews` (`id`, `company_id`, `createdby`, `review`, `createdat`) VALUES
(9, 4, 8, 'This company is superb. it has a very good working culture.', '2023-08-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts_or_cities`
--

CREATE TABLE `districts_or_cities` (
  `id` int(11) NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts_or_cities`
--

INSERT INTO `districts_or_cities` (`id`, `division_id`, `name`) VALUES
(1, 1, 'Barguna'),
(2, 1, 'Barisal'),
(3, 1, 'Bhola'),
(4, 1, 'Jhalokati'),
(5, 1, 'Patuakhali'),
(6, 1, 'Pirojpur'),
(7, 2, 'Bandarban'),
(8, 2, 'Brahmanbaria'),
(9, 2, 'Chandpur'),
(10, 2, 'Chittagong'),
(11, 2, 'Comilla'),
(12, 2, 'Cox\'s Bazar'),
(13, 2, 'Feni'),
(14, 2, 'Khagrachhari'),
(15, 2, 'Lakshmipur'),
(16, 2, 'Noakhali'),
(17, 2, 'Rangamati'),
(18, 3, 'Dhaka'),
(19, 3, 'Faridpur'),
(20, 3, 'Gazipur'),
(21, 3, 'Gopalganj'),
(22, 3, 'Kishoreganj'),
(23, 3, 'Madaripur'),
(24, 3, 'Manikganj'),
(25, 3, 'Munshiganj'),
(26, 3, 'Narayanganj'),
(27, 3, 'Narsingdi'),
(28, 3, 'Rajbari'),
(29, 3, 'Shariatpur'),
(30, 3, 'Tangail'),
(31, 4, 'Bagerhat'),
(32, 4, 'Chuadanga'),
(33, 4, 'Jessore'),
(34, 4, 'Jhenaidah'),
(35, 4, 'Khulna'),
(36, 4, 'Kushtia'),
(37, 4, 'Magura'),
(38, 4, 'Meherpur'),
(39, 4, 'Narail'),
(40, 4, 'Satkhira'),
(41, 5, 'Jamalpur'),
(42, 5, 'Mymensingh'),
(43, 5, 'Netrakona'),
(44, 5, 'Sherpur'),
(45, 6, 'Bogra'),
(46, 6, 'Joypurhat'),
(47, 6, 'Naogaon'),
(48, 6, 'Natore'),
(49, 6, 'Nawabganj'),
(50, 6, 'Pabna'),
(51, 6, 'Rajshahi'),
(52, 6, 'Sirajganj'),
(53, 7, 'Dinajpur'),
(54, 7, 'Gaibandha'),
(55, 7, 'Kurigram'),
(56, 7, 'Lalmonirhat'),
(57, 7, 'Nilphamari'),
(58, 7, 'Panchagarh'),
(59, 7, 'Rangpur'),
(60, 7, 'Thakurgaon'),
(61, 8, 'Habiganj'),
(62, 8, 'Moulvibazar'),
(63, 8, 'Sunamganj'),
(64, 8, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`) VALUES
(1, 'Diploma Degree'),
(2, 'Bachelor\'s Degree'),
(3, 'Master\'s Degree'),
(4, 'Professional Degree'),
(5, 'Doctoral Degree'),
(6, 'Higher Secondary Education'),
(7, 'Undergraduate'),
(8, 'Secondary Education');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`) VALUES
(1, 'Accounting/Finance'),
(2, 'Bank/ Non-Bank Fin. Institution'),
(3, 'Supply Chain/ Procurement'),
(4, 'Education/Training'),
(5, 'Engineer/Architects'),
(6, 'Garments/Textile'),
(7, 'HR/Org. Development'),
(8, 'Gen Mgt/Admin'),
(9, 'Design/Creative'),
(10, 'Production/Operation'),
(11, 'Hospitality/ Travel/ Tourism'),
(12, 'Commercial'),
(13, 'Beauty Care/ Health & Fitness'),
(14, 'IT & Telecommunication'),
(15, 'Marketing/Sales'),
(16, 'Customer Service/Call Centre'),
(17, 'Media/Ad./Event Mgt.'),
(18, 'Medical/Pharma'),
(19, 'Agro (Plant/Animal/Fisheries)'),
(20, 'NGO/Development'),
(21, 'Research/Consultancy'),
(22, 'Secretary/Receptionist'),
(23, 'Data Entry/Operator/BPO'),
(24, 'Driving/Motor Technician'),
(25, 'Security/Support Service'),
(26, 'Law/Legal'),
(27, 'Electrician/ Construction/ Repair');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `jobtitle` text NOT NULL,
  `industry_id` int(11) NOT NULL,
  `job_status` int(11) NOT NULL,
  `description` text NOT NULL,
  `minimumsalary` decimal(10,2) NOT NULL,
  `maximumsalary` decimal(10,2) NOT NULL,
  `state_id` int(3) NOT NULL,
  `city_id` int(3) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `experience` int(2) NOT NULL,
  `edu_qualification` text NOT NULL,
  `skills_ability` text NOT NULL,
  `responsibility` text NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `industry_id`, `job_status`, `description`, `minimumsalary`, `maximumsalary`, `state_id`, `city_id`, `createdat`, `experience`, `edu_qualification`, `skills_ability`, `responsibility`, `deadline`) VALUES
(3, 1, 'Front End Developer (Angular)', 14, 1, 'We hire Front End developers (Angular) with experience in enterprise systems. You will work with, learn from, and contribute to a talented international software team. We build enterprise trading and financial applications. Our team is composed of experts in multiple disciplines working remotely from anywhere in the world. You should be an expert in Angular or similar front end technologies and excel at working through the full development cycle, from concept and design to coding, testing, software implementation and maintenance. This is a full-time position, working from home', '23000.00', '37000.00', 3, 18, '2023-06-30 15:50:04', 1, '2', 'Fluent in HTML5, CSS3 and JavaScript (ES5 / ES6)\r\nFluent in Angular10 and above JavaScript framework\r\nIn-depth understanding of OOP and SOLID programming\r\nFluent in rxjs and ngrx\r\nFluent in working with forms\r\nFamiliarity with dynamic loading\r\nFamiliarity with Responsive design concepts\r\nFamiliarity with at least one CSS framework such as Bootstrap, Material\r\nFull familiarity with RESTful API concepts\r\nFamiliarity and experience working with Git', 'Mentoring and guiding other engineers to best software industry practices, tools and processes.\r\nYour role in the company will be to join our full-stack development group and work in scrum teams to accomplish your teams goals.\r\nA great opportunity for career development and growth. We provide training and mentorship as well as grow your development skills in advanced programming languages and technologies.\r\nMust provide own work environment: Windows machine, highspeed Internet, and a quiet work area at home.', '2023-08-25'),
(4, 1, 'Video Editor & Digital Marketer', 9, 1, 'This position will be responsible for regularly editing and creating videos for our Company. In addition, the position will be in charge of launching campaigns with digital marketing strategy to drive traffic and revenue. Candidates must be fully proficient in English & Bangla.', '30000.00', '50000.00', 3, 18, '2023-07-01 11:46:45', 2, '2', 'The applicants should have experience in the following area(s): Digital Marketing, Digital Marketing (Social Media Marketing), video editing, Video Editor, Video Editor & Graphics designer', 'Develop digital marketing strategies to enhance branding, implement digital marketing sales plans, creative planning, and execution of all the digital marketing campaigns, including good knowledge of content writing.\r\nDevelop and execute digital marketing strategies across multiple channels, including social media, email marketing, search engine marketing, and display advertising.\r\nManage Facebook page (Example: Comments reply, Checking inbox), Instagram etc.\r\nDesign visually appealing graphics and marketing materials, such as banners, info graphics, and social media visuals.', '2023-07-25'),
(6, 4, 'Filed Operator (Operation), BOGCL', 15, 1, 'Bashundhara Oil and Gas Company Ltd., a subsidiary of Bashundhara Group, is looking for some competent candidates for the position of \"Filed Operator (Operation)- BOGCL\" for its Bitumen Plant in Keranigonj.', '70000.00', '100000.00', 3, 18, '2023-07-04 15:07:20', 5, '2', 'Minimum 5 years experience in Process Plant as Field Operator. Experience in Fuel or Edible oil refinery are preferred. For more experienced personnel, educational qualification could be relaxed.', 'Receiving shift information from previous shift personnel properly and act accordingly.\r\nTake data & monitor process parameter. Inform shift engineer about any anomaly & take proper steps to maintain process parameter within standard value as per instruction from shift engineer.\r\nTake proper actions at the time of plant start up, shut down and emergency situation according to the standard operating procedure as per instruction from shift engineer.\r\nHanding over responsibilities to the next shift personnel.', '2023-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `type`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Internship');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobposts`
--

CREATE TABLE `saved_jobposts` (
  `id_saved` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_jobposts`
--

INSERT INTO `saved_jobposts` (`id_saved`, `id_jobpost`, `id_user`, `createdat`) VALUES
(6, 5, 8, '2023-07-17 00:00:00'),
(7, 6, 0, '2023-07-28 00:00:00'),
(8, 4, 0, '2023-07-28 00:00:00'),
(9, 6, 8, '2023-07-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Barisal Division'),
(2, 'Chittagong Division'),
(3, 'Dhaka Division'),
(4, 'Khulna Division'),
(5, 'Mymensingh Division'),
(6, 'Rajshahi Division'),
(7, 'Rangpur Division'),
(8, 'Sylhet Division');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` text DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `city_id` int(3) DEFAULT NULL,
  `state_id` int(3) DEFAULT NULL,
  `contactno` varchar(15) DEFAULT NULL,
  `education_id` int(3) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `active` int(3) DEFAULT 0,
  `aboutme` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `profile_pic` text DEFAULT 'user.png',
  `createdat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `email`, `password`, `address`, `headline`, `role_id`, `city_id`, `state_id`, `contactno`, `education_id`, `dob`, `age`, `resume`, `hash`, `active`, `aboutme`, `skills`, `gender`, `profile_pic`, `createdat`) VALUES
(8, 'Jawwad Al Sabbir', 'mdsabbirhosen926@gmail.com', '$2y$10$vqsDy25Rx1B/2n3Z/6KI..oTMF2AwAXwIZHwsfiSqw.lC2q71lhGm', 'Patuakhali Science and Technology University,Dumki-8602,Pirtola Bazar,Patuakhali.', 'Software Engineer', 1, 5, 1, '01710151265', 7, '1999-10-13', NULL, '9bbb5f8aa2c4d5ac9ef31dec610ba406New-York-Resume-Template-Creative.pdf', NULL, 0, 'I am a web developer.', 'HTML, CSS, javascript.', 'male', '9bbb5f8aa2c4d5ac9ef31dec610ba406IMG_8791.JPG', '2023-07-02'),
(9, 'kallol', 'kallol@gmail.com', '$2y$10$.gbGBrPH41jG2TYanuPqc.YrNO/LEzUDrG14H54JOmZ9rz35jSpUm', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, 'user.png', '2023-07-16'),
(10, 'Hasan Farazi', 'hasaanfarazi17@gmail.com', '$2y$10$Q6iEm.hgdXZunxa5WBjmlOJyyBfFJ1yK30KPvdP4y60JzbBQ0/1qu', 'Dumki,Patuakhali.', 'Entrepreauner', 1, 4, 1, '01736022148', 7, '2000-12-27', NULL, '50ccf2730e312c8f5d73f9eb1a400062Grace-ResumeViking-15-1.pdf', NULL, 0, 'i am a billionaire', 'speaking, influencing.', 'male', '50ccf2730e312c8f5d73f9eb1a400062Man-DRAWING-–-STEP-10.jpg', '2023-08-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `company_reviews`
--
ALTER TABLE `company_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts_or_cities`
--
ALTER TABLE `districts_or_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id_jobpost`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobposts`
--
ALTER TABLE `saved_jobposts`
  ADD PRIMARY KEY (`id_saved`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company_reviews`
--
ALTER TABLE `company_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id_jobpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saved_jobposts`
--
ALTER TABLE `saved_jobposts`
  MODIFY `id_saved` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
