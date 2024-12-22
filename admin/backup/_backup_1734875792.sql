

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `role` varchar(11) NOT NULL,
  `amount` float NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` int(11) NOT NULL,
  `admin_user` int(11) NOT NULL,
  `desig` int(11) NOT NULL,
  `incentive` int(11) NOT NULL,
  `salary` float NOT NULL,
  `leavess` int(30) NOT NULL,
  `jdate` date NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO admin VALUES("1","0","shafat21","shafat.mahtab@gmail.com","aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357","Shafat","Alam","Male","","1759247047","Bangladesh                                                      ","shafat.png","2018-04-30","admin","168276","2024-11-30 12:21:36","0","1","0","0","0","0","2024-11-30","2024-11-30");
INSERT INTO admin VALUES("71","1","","tanvirove007@gmail.com","929408425ba3f124ffa07a7ae56d353e17578f45ad059f295db51d426a277c6a","Tanvir","Ove","","","","","","0000-00-00","admin","0","2024-11-30 13:22:52","0","0","0","0","5000","2","2024-11-29","2024-11-30");
INSERT INTO admin VALUES("72","2","","test@gmail.com","278db4a24613a5359624f52ab4105f214522c69087ef2b2d4d66113e1a5787cf","Test","ASdasdjb","","","","","","0000-00-00","admin","0","2024-11-30 13:03:34","0","0","0","0","5000","2","2024-11-06","2024-11-30");
INSERT INTO admin VALUES("73","1","","amirhamzaerp@gmail.com","e78601fb252f7a577d020b46741fe1a6037eb1c3616aa259c654f316c3c770b4","Test","Tsetstse","","","","","","0000-00-00","admin","0","2024-11-30 20:44:56","0","0","0","0","5000","5","2024-12-01","2024-11-30");



CREATE TABLE `borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp` int(11) NOT NULL,
  `amount` float NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO borrow VALUES("7","71","10","December","2024","Stes","2024-12-21","0");



CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `delete_status` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO groups VALUES("1","Leave Manager","Manages leaves","0");
INSERT INTO groups VALUES("2","Salary ","Salary Manager","0");
INSERT INTO groups VALUES("3","Admin","Controls everything","0");



CREATE TABLE `installement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `added_date` date NOT NULL,
  `inv_no` varchar(200) NOT NULL,
  `insta_amt` int(100) NOT NULL,
  `due_total` int(11) NOT NULL,
  `ptype` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) NOT NULL,
  `month` varchar(150) NOT NULL,
  `year` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=paid 2=unpaid',
  `total` int(50) NOT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `delete_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO leaves VALUES("12","71","November","2024","2024-11-30","1","2","1","1","0");
INSERT INTO leaves VALUES("13","72","November","2024","2024-11-14","2","2","1","1","0");
INSERT INTO leaves VALUES("14","73","November","2024","2024-11-29","1","5","0","1","0");



CREATE TABLE `manage_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `short_title` varchar(600) NOT NULL,
  `logo` text NOT NULL,
  `footer` text NOT NULL,
  `currency_code` varchar(600) NOT NULL,
  `currency_symbol` varchar(600) NOT NULL,
  `login_logo` text NOT NULL,
  `invoice_logo` text NOT NULL,
  `background_login_image` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO manage_website VALUES("1","ProManage","Proman","PM-logo_d.svg","Shafat","bdt","BDT.","PM-logo_d.svg","","Untitled6.jpg","0");



CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO month VALUES("1","January");
INSERT INTO month VALUES("2","February");
INSERT INTO month VALUES("3","March");
INSERT INTO month VALUES("4","April");
INSERT INTO month VALUES("5","May");
INSERT INTO month VALUES("6","June");
INSERT INTO month VALUES("7","July");
INSERT INTO month VALUES("8","August");
INSERT INTO month VALUES("9","September");
INSERT INTO month VALUES("10","October");
INSERT INTO month VALUES("11","November");
INSERT INTO month VALUES("12","December");



CREATE TABLE `permission_role` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `permission_id` int(50) NOT NULL,
  `group_id` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO permission_role VALUES("1","25","1");
INSERT INTO permission_role VALUES("2","25","2");
INSERT INTO permission_role VALUES("3","31","2");
INSERT INTO permission_role VALUES("4","24","3");
INSERT INTO permission_role VALUES("5","25","4");
INSERT INTO permission_role VALUES("6","26","4");
INSERT INTO permission_role VALUES("7","29","4");
INSERT INTO permission_role VALUES("8","30","4");
INSERT INTO permission_role VALUES("9","32","4");
INSERT INTO permission_role VALUES("10","33","4");
INSERT INTO permission_role VALUES("11","34","4");
INSERT INTO permission_role VALUES("12","25","0");
INSERT INTO permission_role VALUES("13","26","0");
INSERT INTO permission_role VALUES("14","29","0");
INSERT INTO permission_role VALUES("15","30","0");
INSERT INTO permission_role VALUES("16","32","0");
INSERT INTO permission_role VALUES("17","33","0");
INSERT INTO permission_role VALUES("18","34","0");



CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `operation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO permissions VALUES("25","Leaves","Leaves","Leaves");
INSERT INTO permissions VALUES("26","Salary","Salary","Salary");
INSERT INTO permissions VALUES("29","User","User","User");
INSERT INTO permissions VALUES("30","Role","Role","Role");
INSERT INTO permissions VALUES("32","Settings","Settings","Settings");
INSERT INTO permissions VALUES("33","Author","Author","Author");
INSERT INTO permissions VALUES("34","Backup Database","Backup Database","Backup Database");



CREATE TABLE `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `leave` int(11) NOT NULL,
  `borrow` float NOT NULL,
  `actual` float NOT NULL,
  `final` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO salary VALUES("8","71","November","2024","0","0","5000","150000","2024-11-30");
INSERT INTO salary VALUES("9","73","November","2024","0","0","5000","15000","2024-11-30");



CREATE TABLE `tbl_alerts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_alerts VALUES("1","001","Invalid email or password","warning");
INSERT INTO tbl_alerts VALUES("2","002","Settings are updated","success");
INSERT INTO tbl_alerts VALUES("3","003","Record Added Successfully","success");
INSERT INTO tbl_alerts VALUES("4","004","Record Successfully Updated","success");
INSERT INTO tbl_alerts VALUES("5","005","Record Sudccessfully Deleted","success");
INSERT INTO tbl_alerts VALUES("6","006","Class has been registered","success");
INSERT INTO tbl_alerts VALUES("7","007","Class has been deleted","success");
INSERT INTO tbl_alerts VALUES("8","008","Class has been updated","success");
INSERT INTO tbl_alerts VALUES("9","009","Subject has been registered","success");
INSERT INTO tbl_alerts VALUES("10","010","Subject have been deleted","success");
INSERT INTO tbl_alerts VALUES("11","011","Subject has been updated","success");
INSERT INTO tbl_alerts VALUES("12","012","Email address is already registered","warning");
INSERT INTO tbl_alerts VALUES("13","013","Student have been registered","success");
INSERT INTO tbl_alerts VALUES("14","014","Student have been deleted","success");
INSERT INTO tbl_alerts VALUES("15","015","Student have been updated","success");
INSERT INTO tbl_alerts VALUES("16","016","School info has been updated","success");
INSERT INTO tbl_alerts VALUES("17","017","Logo image must be 400 X 400 Pixels","warning");
INSERT INTO tbl_alerts VALUES("18","018","Exam have been registered","success");
INSERT INTO tbl_alerts VALUES("19","019","Enroll number has been deleted","success");
INSERT INTO tbl_alerts VALUES("20","020","Exam has been updated","success");
INSERT INTO tbl_alerts VALUES("21","021","Question has been added","success");
INSERT INTO tbl_alerts VALUES("22","022","Profile have been updated","success");
INSERT INTO tbl_alerts VALUES("23","023","Password has been updated","success");
INSERT INTO tbl_alerts VALUES("24","024","Account was not found","danger");
INSERT INTO tbl_alerts VALUES("25","025","Open your email to continue","info");
INSERT INTO tbl_alerts VALUES("26","026","An error occurred while sending e-mail","warning");
INSERT INTO tbl_alerts VALUES("27","027","Assessment have been re-activated","success");
INSERT INTO tbl_alerts VALUES("28","028","All assessments have been re-acativate","success");
INSERT INTO tbl_alerts VALUES("29","029","Exam have been deleted","success");
INSERT INTO tbl_alerts VALUES("30","030","Notice have been pinned","success");
INSERT INTO tbl_alerts VALUES("31","031","Notice have been deleted","success");
INSERT INTO tbl_alerts VALUES("32","032","Please add some question before activating the exam","warning");
INSERT INTO tbl_alerts VALUES("33","033","Exam has been set active","success");
INSERT INTO tbl_alerts VALUES("34","034","Exam has been set inactive","success");
INSERT INTO tbl_alerts VALUES("35","035","Question has been deleted","success");
INSERT INTO tbl_alerts VALUES("36","036","Question has been updated","success");



CREATE TABLE `tbl_deduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `deduct_quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_deduct VALUES("1","30","1","2024-09-30","2024-09-30 18:17:37");



CREATE TABLE `tbl_email_config` (
  `id` int(21) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int(50) NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL,
  `approvestatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `delete_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO unit VALUES("1","ttttttttt","Deactive","1");
INSERT INTO unit VALUES("2","test","Active","1");
INSERT INTO unit VALUES("3","Set","Active","0");
INSERT INTO unit VALUES("4","Pair","Active","0");
INSERT INTO unit VALUES("5","Piece","Active","0");
INSERT INTO unit VALUES("6","Meter","Active","0");
INSERT INTO unit VALUES("7","1 Meter","Active","1");
INSERT INTO unit VALUES("8","10 Meter","Active","1");
INSERT INTO unit VALUES("9","XL","Active","1");



CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO year VALUES("1","2020");
INSERT INTO year VALUES("2","2021");
INSERT INTO year VALUES("3","2022");
INSERT INTO year VALUES("4","2023");
INSERT INTO year VALUES("5","2024");
INSERT INTO year VALUES("6","2025");
INSERT INTO year VALUES("7","2026");
INSERT INTO year VALUES("8","2027");
INSERT INTO year VALUES("9","2028");
INSERT INTO year VALUES("10","2029");
INSERT INTO year VALUES("11","2030");
INSERT INTO year VALUES("12","2031");
INSERT INTO year VALUES("13","2032");
INSERT INTO year VALUES("14","2033");
INSERT INTO year VALUES("15","2034");
INSERT INTO year VALUES("16","2035");
INSERT INTO year VALUES("17","2036");
INSERT INTO year VALUES("18","2037");
INSERT INTO year VALUES("19","2038");
INSERT INTO year VALUES("20","2039");
INSERT INTO year VALUES("21","2040");

