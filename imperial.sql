-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 10:29 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imperial`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_ques`
--

CREATE TABLE `add_ques` (
  `id` int(11) NOT NULL,
  `ques_no` varchar(255) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `catergory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_ques`
--

INSERT INTO `add_ques` (`id`, `ques_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `catergory`) VALUES
(3, '1', 'First IOS Was Written In1', '1986', '1950', '1975', '1980', '1986', 'Java Programming Masterclass covering Java 11 & Java 17'),
(4, '1', 'what does UX stand for', 'User Exchange', 'User Expression', 'User Interface', 'User Exerience', 'User Exerience', 'User Experience Design Essentials - Adobe XD UI UX Design'),
(5, '1', 'To Create Mutable Object __ Is Used', 'Let', 'Var', 'Both A&B', 'none', 'Var', 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(12, '2', 'Which of these elements is present in user experience design?', 'Interaction design', ' Visual design', 'Information architecture', ' Financial planning', ' Financial planning', 'User Experience Design Essentials - Adobe XD UI UX Design'),
(13, '3', 'Which of these is not an abbreviated form of user experience design?', 'UD', 'UX', ' UXD', 'UED', 'UD', 'User Experience Design Essentials - Adobe XD UI UX Design'),
(14, '4', 'What does the haptic feedback system of interaction design reduce? ', 'Confusion', 'Congestion', 'Conviction', 'Coincedence', 'Confusion', 'User Experience Design Essentials - Adobe XD UI UX Design'),
(15, '5', 'What is the extent to which a product can be used to achieve specified goals with effectiveness?', 'Speed', 'Efficiency', ' Usability', 'Findability', ' Usability', 'User Experience Design Essentials - Adobe XD UI UX Design'),
(20, '1', 'Which of the following is correct about PHP?', 'PHP can access cookies variables and set cookies.', 'Using PHP, you can restrict users to access some pages of your website.', 'It can encrypt data.', 'All of the above.', 'All of the above.', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(21, '2', 'Which of the following type of variables have only two possible values either true or false?', 'Integers', 'Doubles', 'Booleans', 'Strings', 'Booleans', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(22, '3', 'Which of the following array represents an array containing one or more arrays?', 'Numeric Array', 'Associative Array', 'Multidimentional Array', 'None of the above.', 'Multidimentional Array', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(23, '4', 'Which of the following function can be used to get an array in the reverse order?', 'array_reverse()', 'array_search()', 'array_shift()', 'array_slice()', 'array_reverse()', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(24, '5', 'Which of the following function is used to read the content of a file?', 'fopen()', 'fread()', 'filesize()', 'file_exist()', 'fread()', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(25, '6', 'Which of the following is used to declare a constant', 'const', 'constant', 'define', '#pragma', 'define', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(26, '7', 'Which of the following is the way to create comments in PHP?', '// commented code to end of line', '/* commented code here */', '# commented code to end of line', 'all of the above', 'all of the above', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(27, '8', 'What is the strpos() function used for?', 'Find the last character of a string', 'Both b and c', 'Search for character within a string', 'Locate position of a stringâ€™s first character', 'Search for character within a string', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(28, '9', 'Which of the following differences are valid between PHP 4 and PHP 5?', 'Built-in native support for SQLite', 'Both a and c', 'improved MySQL support', 'Support for inheritance', 'Both a and c', 'PHP with Laravel for beginners - Become a Master in Laravel'),
(29, '10', 'What is array_keys() used for?', 'Compares array keys, and returns the matches', 'Checks if the specified key exists in the array', 'Returns all the keys of an array', 'Both b and c above', 'Returns all the keys of an array', 'PHP with Laravel for beginners - Become a Master in Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `b_id` int(11) NOT NULL,
  `b_title` text NOT NULL,
  `b_dec` text NOT NULL,
  `b_dec1` text NOT NULL,
  `b_dec2` text NOT NULL,
  `b_dec3` text NOT NULL,
  `b_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `b_title`, `b_dec`, `b_dec1`, `b_dec2`, `b_dec3`, `b_img`) VALUES
(1, 'Programming Logic How To Get Better At It', 'The term programming logic has its roots in the advancement of computer science. Programming logic started only with hard and fast logic compiled into sophisticated algorithms and expressed in programming languages like Prolog.', 'Basic computers developed ways to deal with numbers and logical states, applying specific operators that lead to precise results.', 'In this video, I have received a question from a reader asking how he could become better at programming logic and this is kind of a recurrent question I get almost every day.', 'So, how do you get better at programming logic  Watch this video and find out', '../Images/Blog/Capture.PNG'),
(2, 'Why You Should Use a Geomapping API in Your Next App', 'Geospatial and map-related APIs are a powerful way to harness location data and offer customized products and services to consumers around the globe.  This method of programming helps developers create location-aware applications and interactive maps that can be used in a variety of settings, offering relevancy that can’t be provided without knowing where they are in the world.  The cutting-edge technology can help programmers when working on complex map and location-based projects. Here is a look at some of the main benefits of utilizing geomapping API for web developers.', 'A huge benefit of APIs, in general, is that they accelerate software development.  An Application Programming Interface – or API – is a set of routines and protocols that seek to simplify the process of developing software. Rather than creating an entirely new program from scratch, developers can build off code that’s already been written and tweak it to meet the demands of the project they are working on.  This can be especially vital for mapping projects. If you are creating an application that is capable of scanning a large geographic area – such as the entire globe – it’s going to take a long time to develop a program capable of absorbing all that data from scratch. Map APIs give you a place to start by including worldwide map data with built-in tools that have already been developed and tested.  With a map API, important standard features like route-finding and point-to-point navigation will have already been refined, so you can focus on developing the unique aspects of your project.', 'Interactive content is the latest trend in digital media that is changing how brands and customers interact online.  Location APIs give developers more power to create interactive maps with features that encourage engagement by presenting more relevant experiences.  With a map API, developers can easily add graphics, widgets, and pop-ups at specific locations worldwide to make the user experience more engaging, pleasant, and memorable.  The geospatial platform APIs and software development tools give developers a more robust set of features when it comes to building out map interactions that will attract attention and drive traffic.', 'Geospatial APIs can also easily retrieve location data to power applications.  Geocoding is the process of taking a description of a location, such as an address, and turning it into coordinates that can be easily mapped. Likewise, taking a coordinate latitude and longitude and turning it into an address or other location description is called reverse geocoding.  These geocoding APIs give developers a set of protocols that can extract this data and use it to fulfill customer requests.  Say a user wants to search for the location of the nearest store to them.  A geocoding API can help determine the location of the customer, the location of the nearest store to them, and create an up-to-date map that uses a routing API result to get them from where they are to where they want to be.', '../Images/Blog/Why-You-Should-Use-a-Geomapping-API-in-Your-Next-App-square-1.png'),
(3, 'The Ultimate Rise and Growing Trends of IoT', 'Two decades ago, the rise of the internet gave birth to several tech advancements. Most of those advancements simplified life by making a lot of things go smoothly. IoT is one of those advancements that took the world by storm.  IoT was merely a technological concept some years ago, and today, it has become an influential part of our life!  IoT is a blend of sensors, software, devices, and networks that suppress human intervention to the minimum for accumulating data.  Technological upgrades and the introduction of new devices have given a boost to IoT technology. Today, people are purchasing devices equipped with sensor-based technology. Be it hom', 'A gamut of appliances, gadgets, and sensors that gather & exchange data/information over the internet are called IoT devices. Such devices are specially programmed to embed into other devices, and via IoT devices, other applications and gadgets can be controlled from any corner of the world.  Before proceeding to the main part of the article, here’s a look at some key statistics that deserve your attention.', 'All these statistics point toward the adoption of the internet of things at a speedy pace. Not just the adoption of IoT, but the economy will also upsurge due to vast investments expected ahead.  IoT has been playing a significant role in the development of technologies like 5G networking, artificial intelligence, etc., and it is evident that we’ll be witnessing the rise of IoT in the future.', 'Gone are the days when the concept of the application of IoT in business was a topic of discussion. Today, numerous business realms have integrated IoT while making continuous improvements. Customized software for purposes like marking attendance, tracking workflow of employees, cams for residential/corporate security, smoke sensors, etc.  Laptops, smartwatches, smart bulbs, smartphones, etc., can be connected to the internet effortlessly! They are simply examples of IoT devices that people use daily.', '../Images/Blog/Iot-trends-square.png'),
(4, '7 Basic Steps to Start a Freelance Development Career', 'How would you like to work from a place that you love, while wearing the comfiest of clothes?  Yes, freelance work can help you do this and much more.  The remote working trend is increasing and so is the popularity of freelancing as a career choice. If you are an experienced developer or aspiring to be one, becoming a freelance developer might be a great career choice.  For this piece, I’ll be defining freelance developers as self-employed professionals who code for a living. Since they don’t code for one specific employer, they get to choose their projects and prices.  To be a successful freelance developer, you’ll need a balance of business and coding skills.  There are different types of developers that possess varied skills as per their area of expertise. The most common types of developers are web developers, app developers, Blockchain developers, NFT developers, Full stack developers, Android developers, iOS developers, and game developers but there are many more.', 'Imagine making money from the comforts of your own home. As a freelance developer, you get to be your boss. You’ll also get more control over what clients you want to work with and when you wish to work.  It also helps to add to your career holistically, as you will be playing multiple roles including that of a project manager, salesperson, customer support, bookkeeper, Chief Cook and Bottlewasher, etc.  Better work-life balance is another perk of being a freelancer. Being able to pick your working hours and projects works wonders for your mental and physical health.', 'This is usually the easiest type of freelance development work to start with. But don’t hop on the freelance web development bandwagon just because it is the next big thing!  Web development is not a piece of cake and establishing yourself as a freelancer might take some time and effort. The process might take months, or even years, to start earning well as a freelance developer. To stick with something for a long time consistently, it helps if you are passionate about it.', 'If web development isn’t the path you want to take, finding your niche will be the next step when you plan to become a freelance developer. Being a jack of all trades and master of none is not going to bear any fruits for you. Y  Your personal value will increase as you begin gaining expertise in a particular area. To build your niche skills and gain foundational knowledge, look into different online courses and learning modules.', '../Images/Blog/7-Basic-Steps-to-Start-a-Freelance-Development-Career-square.png');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `certificate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `certificate`) VALUES
(1, 'Certificate.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email` text NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_desc` text NOT NULL,
  `course_author` varchar(255) NOT NULL,
  `course_img` text NOT NULL,
  `course_duration` int(11) NOT NULL,
  `course_price` float NOT NULL,
  `course_lessons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_lessons`) VALUES
(1, 'Java Programming Masterclass covering Java 11 & Java 17', 'Are you aiming to get your first Java Programming job but struggling to find out what skills employers want and which course will give you those skills?  This course is designed to give you the Java skills you need to get a job as a Java developer.  By the end of the course, you will understand Java extremely well and be able to build your own Java apps and be productive as a software developer.  Lots of students have been successful in getting their first job or promotion after going through the course.  Here is just one example of a student who lost her job and despite having never coded in her life previously, got a full-time software developer position in just a few months after starting this course.  She didnt even complete the course', 'Aaron M. Garrison', '../Images/CourseImages/java_logo_640.jpg', 80, 12.99, 401),
(2, 'The Complete JavaScript Course 2022: From Zero to Expert!', 'This is the most complete JavaScript course on Udemy. Its an all-in-one package that will take you from the very fundamentals of JavaScript, all the way to building modern and complex applications.  You will learn modern JavaScript from the very beginning, step-by-step. I will guide you through practical and fun code examples, important theory about how JavaScript works behind the scenes, and beautiful and complete projects.  You will also learn how to think like a developer, how to plan application features, how to architect your code, how to debug code, and a lot of other real-world skills that you will need on your developer job.  And unlike other courses, this one actually contains beginner, intermediate, advanced, and even expert topics, so you dont have to buy any other course in order to master JavaScript from the ground up  But... You dont have to go into all these topics.  ', 'Terry C. Borden', '../Images/CourseImages/javascript-1567486564472.jpg', 69, 8.99, 320),
(3, 'Build Responsive Real-World Websites with HTML and CSS', 'This course is for both beginners and seasoned developers that want to learn how to build responsive websites and user interfaces with modern HTML5 and CSS3+ technologies like Flexbox and CSS Grid as well as the Sass pre-compiler. This course includes hours of both learning & studying sections along with real life projects. Stop having to rely on frameworks like Bootstrap for your user interface and learn how to create your own layouts and utility classes to build custom responsive websites and app UIs.  The first few sections are tailored for beginners so even if you have never built anything before, you will learn all of the basics. If you already have experience with basic HTML & CSS, just move to section 3 or 4 and get started.', 'John G. Marshall', '../Images/CourseImages/html-basic.png', 37, 0, 150),
(4, 'User Experience Design Essentials - Adobe XD UI UX Design', 'Are you excited to get into the world of UI/UX but you dont know where to start? This course will allow you to add UX designer to your CV & start getting paid for your new skills.  Hi there! My name is Dan & Im an Adobe Certified Instructor. Im here to help you learn Adobe XD efficiently and comprehensively. XD is a fantastic design tool used by industry professionals to product high quality & functional mockups. By the end of this course, you will be able to produce practical and effective User Experience (UX) and User Interface (UI) designs.  Throughout the course Ill invite you to participate in a real-life freelance project which Im working on. Its a project that requires a fresh website and mobile app interface. This will prepare you for dealing with real world projects if you choose to move towards a UX/UI career path.', 'Keith S. Berens', '../Images/CourseImages/JttI6YpmPGI-HD.jpg', 9, 10.99, 25),
(5, 'The Complete SQL Bootcamp 2022: Go from Zero to Hero', 'This is course that puts you in control, having you set up and restore databases right at the start of the course, instead of watching someone else code. Every section comes with fresh challenge questions and tasks, modeled after real world tasks and situations.  Ive spent years as an instructor both online and in-person at Fortune 500 companies, and this course is built to combine the best of both worlds, allowing you to learn at your own pace through an interactive environment. You will start with the basics and soon find yourself working with advanced commands, dealing with timestamp data and variable character information like a seasoned professional.  SQL is one of the most in demand skills for business analysts, data scientists, and anyone who finds themselves working with data! Upgrade your skill set quickly and add SQL to your resume by joining today!  I see you inside the course!  Check out the free preview videos for more information', 'William K. Marshall', '../Images/CourseImages/asset-v1_BDU+DB0101EN+v1+type@asset+block@course_card.png', 9, 15.99, 20),
(6, 'The Complete Front-End Web Development Course!', 'Simple text site - We will use what we learned in the HTML sections to create a simple text site. This project will help you learn HTML structure and the essential elements.  Fallout inspired Pip-Boy - We will take what we learned in the CSS and Bootstrap sections of the course to code a Pip-Boy from the game Fallout. This project will help you learn the design elements of modern web development.  Google Chrome extension - We will finish the course by programming a JavaScript based Google Chrome extension. This project will help you understand the logical parts of web development.  This course covers the most popular web development frameworks, and will get you started on your path towards becoming a full-stack web developer', 'John J. Harper', '../Images/CourseImages/front-end-web-development.jpg', 17, 0, 126),
(7, 'The Complete 2022 Web Development Bootcamp', 'Welcome to the Complete Web Development Bootcamp, the only course you need to learn to code and become a full-stack web developer. With 150,000+ ratings and a 4.8 average, my Web Development course is one of the HIGHEST RATED courses in the history of Udemy!   At 65+ hours, this Web Development course is without a doubt the most comprehensive web development course available online. Even if you have zero programming experience, this course will take you from beginner to mastery.', 'John P. Riley', '../Images/CourseImages/web-dev.jpg', 65, 19.99, 490),
(8, 'Android App Development with Kotlin | Beginner to Advanced', 'Welcome to Android App Development with Kotlin | Beginner to Advanced course.  Android App Development, Android, Kotlin, Android Kotlin, Kotlin Android, Android 11, Android 12, Android app projects, Java Kotlin Android 11 App Development with Kotlin, Android Studio, Object-Oriented Programming, Android App Project, and Android 12  Kotlin is popular for both Android developers and Java developers. Whether you want to learn Kotlin in order to build your next Android app, or simply need an introduction to the language, Udemy has a top-rated course to help you achieve your goals. Android app development, android, android studio, android 11, android development, android 11 app development, android studio java, oak academy, android app, full android course with 14 real apps, android java, android app development java, full android course with 14 real apps, java android, full android course, android full course, android studio course, kotlin, app development, android apps, android apps, android 11 development, android java masterclass  Kotlin is a very new and up-to-date programming language. Kotlin android is accepted by Google as the official language for Android development. Therefore, it is a language that everyone who wants to be an android developer should know. In this course, we teach Kotlin programming language from beginner to advanced level, considering the importance of Kotlin.', 'Jason I. Frazier', '../Images/CourseImages/mobile-app-development-process-2.png', 23, 5.99, 119),
(9, 'iOS & Swift - The Complete iOS App Development Bootcamp', 'Welcome to the Complete iOS App Development Bootcamp. With over 39,000 5 star ratings and a 4.8 average my iOS course is the HIGHEST RATED iOS Course in the history of Udemy!  At 55+ hours, this iOS 13 course is the most comprehensive iOS development course online!  This Swift 5.1 course is based on our in-person app development bootcamp in London, where we ve perfected the curriculum over 4 years of in-person teaching.  Our complete app development bootcamp teaches you how to code using Swift 5.1 and build beautiful iOS 13 apps for iPhone and iPad. Even if you have ZERO programming experience.  I ll take you step-by-step through engaging and fun video tutorials and teach you everything you need to know to succeed as an iOS app developer.  The course includes 55+ hours of HD video tutorials and builds your programming knowledge while making real world apps. e.g. Pokemon Go, Whatsapp, QuizUp and Yahoo Weather.', 'Jason I. Frazier', '../Images/CourseImages/guidelines-for-ios-app-development-process.jpg', 59, 0, 542),
(10, 'Full Stack-site complet Front REACT & Back PHP/MySQL/MVC/POO', 'Although the evolution is progressive and each step is detailed, the course is not intended for beginners and it is necessary to have solid skills in PHP programming, in POO and to know how to develop with REACT.  If necessary, do not hesitate to take the courses I offer to help you acquire the necessary level (details are presented in the H2PROG training course).', 'Jonathan L. Varney', '../Images/CourseImages/1-Iq_xUySrcOf8k4ZwSeMzDw.jpeg', 10, 9.99, 59),
(11, 'Build an app with ASPNET Core and Angular from scratch', 'Have you learnt the basics of ASP.NET Core and Angular?  Not sure where to go next?  This course should be able to help with that.  In this course we start from nothing and incrementally build up our API and Angular front end until we have a fully functional Web Application that we then publish to IIS and a Linux server.  These are 2 of the hottest frameworks right now for the back-end (Microsoft ASP.NET Core) and the front-end (Google Angular) and are well worth spending the time to learn.  In this course we build a complete application from start to finish and every line of code is demonstrated and explained.  This course is right up to date as at November 2021 using .Net 6.0 and Angular v12 and as these frameworks evolve, this course will evolve with it.  ', 'Albert D. Larson', '../Images/CourseImages/img-angular.png', 30, 0, 265),
(12, 'PHP with Laravel for beginners - Become a Master in Laravel', 'Laravel has become one of the most popular if not the most popular PHP framework. Employers are asking for this skill for all web programming jobs and in this course we have put together all of them, to give you the best chance of landing that job or taking it to the next level.  Why is Laravel so popular Because once you learn it, creating complex applications are easy to do, because thousands of other people have created code we can plug (packages) into our Laravel application to make it even better.   There are many reasons why Laravel is on the top when it comes to PHP frameworks but we are not here to talk about that, right   You are here because you want to learn Laravel, and find out what course to take, right Alright, let s list what this course has to offer so that you can make your decision ', 'Forrest E. Banker', '../Images/CourseImages/laravel-blog.png', 43, 0, 409);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_name`, `stu_email`, `course_id`, `course_name`, `amount`, `date`) VALUES
(1, '62758f25b3dba', 'madura', 'maduraprasad.lk@gmail.com', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp', '$0', '2022-05-07'),
(2, '62762ca7b8fc5', 'madura', 'maduraprasad.lk@gmail.com', 12, 'PHP with Laravel for beginners - Become a Master in Laravel', '$0', '2022-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `exam_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`id`, `exam_name`, `exam_time`) VALUES
(2, 'PHP with Laravel for beginners - Become a Master in Laravel', '15'),
(4, 'User Experience Design Essentials - Adobe XD UI UX Design', '10');

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `total_question` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `wrong_answer` varchar(255) NOT NULL,
  `exam_time` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`id`, `email`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`, `mark`) VALUES
(4, 'maduraprasad.lk@gmail.com', 'User Experience Design Essentials - Adobe XD UI UX Design', '5', '4', '1', '2022-05-07 11:16:38', 80),
(5, 'maduraprasad.lk@gmail.com', 'User Experience Design Essentials - Adobe XD UI UX Design', '5', '4', '1', '2022-05-07 12:04:49', 80),
(6, 'maduraprasad.lk@gmail.com', 'User Experience Design Essentials - Adobe XD UI UX Design', '5', '4', '1', '2022-05-07 15:39:48', 80),
(7, 'maduraprasad.lk@gmail.com', 'User Experience Design Essentials - Adobe XD UI UX Design', '5', '4', '1', '2022-05-08 04:45:32', 80),
(8, 'maduraprasad.lk@gmail.com', 'User Experience Design Essentials - Adobe XD UI UX Design', '5', '4', '1', '2022-05-08 04:46:17', 80),
(9, 'maduraprasad.lk@gmail.com', 'User Experience Design Essentials - Adobe XD UI UX Design', '5', '4', '1', '2022-05-08 04:47:16', 80),
(10, 'maduraprasad.lk@gmail.com', 'User Experience Design Essentials - Adobe XD UI UX Design', '5', '4', '1', '2022-05-08 05:03:06', 80);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(1, 'Awesome Educational Site ', 1),
(2, 'That Site Helps to Learning for me Programming Language', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `l_id` int(11) NOT NULL,
  `l_name` text NOT NULL,
  `l_design` text NOT NULL,
  `l_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`l_id`, `l_name`, `l_design`, `l_img`) VALUES
(1, 'Aaron M. Garrison', 'JAVA', '../Images/Lectures/download.jpg'),
(2, 'John G. Marshall', 'HTML', '../Images/Lectures/photo-1542909168-82c3e7fdca5c.jpg'),
(3, 'Terry C. Borden', 'Javascript', '../Images/Lectures/141228f682285b6d43348a07c40e2f8a.jpg'),
(4, 'Keith S. Berens', 'UX', '../Images/Lectures/download (1).jpg'),
(5, 'William K. Marshall', 'SQL', '../Images/Lectures/de67a7e8-b6e0-47ba-9866-e824cdd416d3.1743dcbc286cdd8f50d4e2d78b6d1baf.jpeg'),
(6, 'John J. Harper', 'Front-end', '../Images/Lectures/4b3484286bd5e8feb32e51a5a77e3263.jpg'),
(7, 'John P. Riley', 'Full-Stack Web Developer', '../Images/Lectures/business_alloy_glasses_frame_men_flexible_tr90_temples_legs_optical_eyeglasses_frames_for_men_square_1547996812_741b28b5_progressive.jpg'),
(8, 'Jason I. Frazier', 'App Developer', '../Images/Lectures/s-l400.jpg'),
(9, 'Jonathan L. Varney', 'REACT Development', '../Images/Lectures/Titanium_Alloy_Flexible_Rimless_Nonprescription_Eyeglasses_1.webp'),
(10, 'Albert D. Larson', 'Angular Developer', '../Images/Lectures/TB1.41rKpXXXXauXVXXXXXXXXXX_!!0-item_pic.jpg'),
(11, 'Forrest E. Banker', 'Laravel', '../Images/Lectures/TB1cGi.kInI8KJjSsziXXb8QpXa_!!0-item_pic.jpg_640x640q90.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_link` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_link`, `course_id`, `course_name`) VALUES
(1, 'iOS - #1.1. iOS & Swift Bootcamp', 'qLnZVZp4UQ0', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(2, 'iOS - #1.2. What is App and How it Works', 'A_FhKE0u8Vc', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(3, 'iOS - #1.3. Steps to Make iOS App', 'V0zNMmMKXhY', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(4, 'iOS - #1.4. Tools Needed for This Course', 'TLPydlFAIaI', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(5, 'iOS - #1.5. Installation of Xcode', 'kjG4JyAzkZU', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(6, 'iOS - #1.6. How to Get The Best Out of This Course', '9pBVOGfjnAI', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(7, 'iOS - #2.1. Matrix App - What You Will Learn', 'Cx7N__SgJro', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(8, 'iOS - #2.2. Matrix App - Create Swift Project ', 'b8d17izC2wo', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(9, 'iOS - #2.3. Matrix App - Design User Interface', 'o-mh5PRu-wo', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(10, 'iOS - #2.4. Matrix App - Prepare App Icon', 'nO2G83LrJLk', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(11, 'iOS - #2.5. Run iOS App on Simulator', '1dR99WyfPYk', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(12, '1dR99WyfPYk', '5fZYLLhIrX0', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(13, 'iOS - #2.7. Ahlan App - What You Will Learn', 'DaJGA5u6GIg', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(14, 'iOS - #2.8. Ahlan App - Design User Interface and Launch Screen', 'KYJE-3CX5ic', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(15, 'iOS - #2.9. Ahlan App - Link User Interface With View Controller', 'GMCDRz8LrHk', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp'),
(16, 'Why take this Java Course?', 'VHbSopMyc4M', 1, 'Java Programming Masterclass covering Java 11 & Java 17'),
(17, 'Programs and Programming Languages', '-C88r0niLQQ', 1, 'Java Programming Masterclass covering Java 11 & Java 17'),
(18, 'Introduction to Java Programming', 'mG4NLNZ37y4', 1, 'Java Programming Masterclass covering Java 11 & Java 17'),
(19, 'Anatomy of Java Program', 'sxYucdzimA', 1, 'Java Programming Masterclass covering Java 11 & Java 17'),
(20, 'Displaying Messages in Java', 'ifirpBZLeCk', 1, 'Java Programming Masterclass covering Java 11 & Java 17'),
(21, 'javaScript promises explained tutorial', 's6SH72uAn3Q', 2, 'The Complete JavaScript Course 2022: From Zero to Expert!'),
(22, 'Javascript Closure tutorial ( Closures Explained )', '71AtaJpJHw0', 2, 'The Complete JavaScript Course 2022: From Zero to Expert!'),
(23, 'javascript callback functions tutorial', 'pTbSfCT42_M', 2, 'The Complete JavaScript Course 2022: From Zero to Expert!'),
(24, 'javaScript call apply and bind', 'c0mLRpw-9rI', 2, 'The Complete JavaScript Course 2022: From Zero to Expert!'),
(25, 'JavaScript object creation patterns tutorial - factory , constructor pattern, prototype pattern', 'xizFJHKHdHw', 2, 'The Complete JavaScript Course 2022: From Zero to Expert!'),
(26, 'HTML & CSS Crash Course Tutorial #1 - Introduction', 'hu-q2zYwEYs', 3, 'Build Responsive Real-World Websites with HTML and CSS'),
(27, 'HTML & CSS Crash Course Tutorial #2 - HTML Basics', 'mbeT8mpmtHA', 3, 'Build Responsive Real-World Websites with HTML and CSS'),
(28, 'HTML & CSS Crash Course Tutorial #3 - HTML Forms', 'YwbIeMlxZAU', 3, 'Build Responsive Real-World Websites with HTML and CSS'),
(29, 'HTML & CSS Crash Course Tutorial #4 - CSS Basics', 'D3iEE29ZXRM', 3, 'Build Responsive Real-World Websites with HTML and CSS'),
(30, 'HTML & CSS Crash Course Tutorial #5 - CSS Classes & Selectors', 'FHZn6706e3Q', 3, 'Build Responsive Real-World Websites with HTML and CSS'),
(31, 'What is User Experience (UX)', 'SbS1jwm4U4o', 4, 'User Experience Design Essentials - Adobe XD UI UX Design'),
(32, 'User Experience Research', 'OdSgDir6XKs', 12, 'User Experience Design Essentials - Adobe XD UI UX Design'),
(33, 'User Experience Research', 'OdSgDir6XKs', 4, 'User Experience Design Essentials - Adobe XD UI UX Design'),
(34, 'SQL Tutorial - Full Database Course for Beginners', 'HXV3zeQKqGY', 5, 'The Complete SQL Bootcamp 2022: Go from Zero to Hero'),
(35, 'The 2020 Frontend Developer Crash Course for Absolute Beginners', 'QA0XpGhiz5w', 6, 'The Complete Front-End Web Development Course!'),
(36, 'Web Development Full Course (Front End) | HTML,CSS,JavaScript', 'TdqQqyc7pfU', 7, 'The Complete 2022 Web Development Bootcamp'),
(37, 'Kotlin Course - Tutorial for Beginners', 'F9UC9DY-vIU', 8, 'Android App Development with Kotlin | Beginner to Advanced'),
(38, 'React JS - React Tutorial for Beginners', 'Ke90Tje7VS0', 10, 'Full Stack-site complet Front REACT & Back PHP/MySQL/MVC/POO'),
(39, 'Step-by-step ASP.NET MVC Tutorial for Beginners | Mosh', 'E7Voso411Vs&t=2s', 11, 'Build an app with ASPNET Core and Angular from scratch');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_pass` varchar(255) NOT NULL,
  `stu_occ` varchar(255) NOT NULL,
  `stu_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(1, 'madura', 'maduraprasad.lk@gmail.com', 'e17d8767639a3363ff57f2de9e5bcb17', 'mobile developer', '../Images/Student/download (1).jpg'),
(3, 'madra', 'maduraprasa00@gmail.com', 'e17d8767639a3363ff57f2de9e5bcb17', '', '../Images/Student/141228f682285b6d43348a07c40e2f8a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_ques`
--
ALTER TABLE `add_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_ques`
--
ALTER TABLE `add_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
