-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 05:08 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ladglobal`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(50) NOT NULL,
  `country` varchar(5) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `interested_in` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0:new, 1:read',
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `first_name`, `last_name`, `email`, `company`, `country`, `phone`, `interested_in`, `message`, `status`, `created_time`) VALUES
(1, 'asdasdasd', 'asdasdasd', 'sdf@asd.asd', 'asdas a asdasdas asda', 'AR', '622222222222', 'asdasdasd', 'asdasdasd !,.', 0, '2017-08-01 11:17:09'),
(2, 'ascasc', 'ascasc', 'asd@asd.asd', 'ascasc', 'AW', '', 'asdasacas', 'why this not working?', 0, '2017-08-01 11:18:50'),
(3, 'ascasc', 'ascasca', 'asd@asd.asc', 'ascasc', 'BD', '', 'ascasca', 'ascasc', 0, '2017-08-01 11:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `coursecode` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'Course Code',
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` text COMMENT 'comma separated',
  `price` decimal(11,2) DEFAULT '0.00',
  `currency_id` int(11) DEFAULT NULL COMMENT 'refer to currencies',
  `rating` decimal(5,2) DEFAULT '0.00' COMMENT 'Course rating',
  `subscription` int(11) NOT NULL DEFAULT '0',
  `image` text COMMENT 'path to image file',
  `detail_image` text,
  `start_date` datetime DEFAULT NULL,
  `duration` decimal(7,2) DEFAULT '0.00' COMMENT 'in minutes',
  `end_date` datetime DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0:offline,1:online',
  `overview` text,
  `info` text COMMENT 'comma separated',
  `offline_progress` decimal(5,2) DEFAULT '0.00',
  `level` int(11) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_time` datetime DEFAULT NULL,
  `sfc` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT '1' COMMENT '0:inactive,1:active, 2: deleted, 3:completed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coursecode`, `title`, `category`, `price`, `currency_id`, `rating`, `subscription`, `image`, `detail_image`, `start_date`, `duration`, `end_date`, `type`, `overview`, `info`, `offline_progress`, `level`, `created_by`, `created_time`, `approved_by`, `approved_time`, `sfc`, `status`) VALUES
(1, 'SBS01', 'Science Behind Success', '7,8,10,1', '0.00', 1, '4.80', 0, 'course/1/sciencebehindsuccess-min.png', NULL, '2017-06-01 00:00:00', '110.00', '2017-11-13 23:59:59', 1, 'The Science Behind Success&#8482; method is used by leaders of different levels to create cultures of high performance.\r\n<br><br>\r\nWe specialize in growing your leadership pipeline. Your emerging leaders and middle managers will be exposed to the mindset and tools to be enterprise leaders. You will learn how to accelerate results, build engagement, influence others and create the conditions for success in your company.\r\n<br><br>\r\nLet''s make leadership make sense. You will gain a greater awareness of what you want to create as a leader in your business. You will walk away armed with the skills, tools and resources to make it happen.\r\n<br><br>\r\n<strong>The Leader Brain</strong>: How do you develop new skills? We introduce the neuroscience of leadership so you can understand things like why change is hard and why people don’t leave bad organizations, they leave bad bosses. You''ll also learn the critical ingredients to developing yourself and the people in your business.\r\n<br><br>\r\n<strong>The Leader Muscle</strong>: The laws of growth help participants understand the bio-mechanical ingredients for maximal development. How physiology plays a significant role in helping you shape the mindset needed to navigate modern organizational turbulence, build resiliency and drive innovation.\r\n<br><br>\r\n<strong>The Leader Virus</strong>: There is a science and structure to the behaviors that spread throughout your organization. Using the science behind social influence and contagion, we enable leaders like you to create deliberate impact through helping clarify your leadership brand and demonstrating behaviors that have a positive ripple effect through the business.\r\n<br><br>\r\n<strong>The Leader Solution</strong>: The fast emerging science of epigenetics acts as a backdrop for you to fully understand the necessary ingredients for creating high-performance cultures. Through understanding the basic mechanism of your environment, you gain an enhanced awareness and accountability of team ownership that drives excellence. You’ll leave with the confidence to shape your environment, the skills to move things forward and the knowledge, awareness and ability to keep assessing, responding and creating results.', '15 Supplemental Resources, Full lifetime access, Access on mobile and TV, Certificate of Completion', '0.00', 2, 55, '2017-06-03 12:19:49', 1, '2017-06-05 12:29:39', 0, 1),
(2, 'PM001', 'Performance Management', '5,7,8,10', '850.00', 0, '3.25', 0, '/img/courses/performancemanagement-min.png', NULL, '2017-02-06 00:00:00', '60.00', '2017-11-16 23:59:59', 0, 'Management vestibulum dolor orci, pulvinar sit amet ullamcorper quis, aliquam vel mi. Vivamus venenatis ligula in ante pulvinar consectetur. Mauris semper molestie tempus. Pellentesque mollis libero eu lacinia consectetur. Phasellus quis varius eros, a mollis ipsum. Morbi commodo lorem eu elit aliquet convallis. Donec eu euismod augue. Curabitur scelerisque consectetur ipsum, eget ornare ante eleifend non. Cras in ligula quis est facilisis condimentum nec vitae nisi. Aenean varius placerat cursus. Proin dictum erat nisl, non elementum nibh faucibus eget. Integer et faucibus nunc, at hendrerit ligula. Donec posuere imperdiet nibh, eu varius nibh venenatis ut. Proin elit nisl, viverra eu erat at, convallis fringilla lectus. Nam at lorem et metus tristique molestie quis et lacus.', '5 Supplemental Resources, Certificate of Completion', '0.00', 1, 1, '2017-06-04 12:19:49', 1, '2017-06-05 12:29:49', 0, 1),
(3, 'CM001', 'Change Management', '3,4,6,7,10,1', '0.00', 1, '4.13', 0, '/img/courses/changemanagement-min.png', NULL, '2017-06-01 00:00:00', '96.00', '2017-11-30 23:59:59', 1, 'Learn Accounting and the Language of Business from the #1 accounting university in the world.', '10 Supplemental Resources, Full lifetime access', '0.00', 2, 1, '2017-06-05 12:19:49', 1, '2017-06-05 12:29:59', 0, 1),
(4, 'COA01', 'Coaching', '5,8,10,1', '1700.00', NULL, '2.95', 0, '/img/courses/works_slider1-min.jpg', NULL, '2017-09-01 00:00:00', '96.00', '1970-01-01 00:00:00', 1, 'A Complete Life Coach Certification Course in the Main Concepts, Methodologies & Core Principles of Life Coaching', '10 Supplemental Resources, Full lifetime access', '0.00', 1, 1, '2017-06-05 12:19:49', 1, '2017-06-05 12:39:59', 0, 1),
(5, 'DTB01', 'Design Thinking for Business Growth', '1,3,6,9,10', '650.00', NULL, '4.60', 0, '/img/courses/works_slider2-min.jpg', NULL, '2017-09-01 12:00:00', '100.00', '2017-12-31 23:59:59', 1, 'Learn a proven system used to start, manage and grow business, fast. Get MBA knowledge without the expensive price tag.', '15 Supplemental Resources, Full lifetime access, Access on mobile and TV, Certificate of Completion', '0.00', 1, 1, '2017-06-05 12:29:49', 1, '2017-06-05 13:39:59', 0, 1),
(6, 'CEL01', 'Certificate in Experiental Learning', '1,7,8,10', '535.00', NULL, '1.30', 0, '/img/courses/sciencebehindsuccess-min.png', NULL, '2017-06-01 12:00:00', '96.00', '2017-12-31 23:59:59', 1, 'How to Become a Leader and Increase Your Leadership Influence, Loyalty, & Income-Leadership Training, Qualities & Traits', '9 Supplemental Resources, Full lifetime access, Access on mobile and TV, Certificate of Completion', '0.00', 3, 1, '2017-06-03 12:19:49', 1, '2017-06-05 12:29:39', 0, 1),
(7, 'LDE01', 'L&D Entrepreneurship', '1,3,5,11', '850.00', NULL, '4.20', 0, '/img/courses/works_slider1-min.jpg', NULL, '2017-06-02 11:21:18', '110.00', '2017-12-31 23:59:59', 1, 'Learn SQL one of the most in demand IT skills requested by employers. SQL is useful to Businesses and Entrepreneurs.', '5 Supplemental Resources, Certificate of Completion', '0.00', 3, 1, '2017-06-02 12:19:49', 1, '2017-06-05 11:39:59', 0, 1),
(8, 'TA001', 'Talent Analytics', '4,8,10', '640.00', NULL, '4.80', 0, '/img/courses/changemanagement-min.png', NULL, '2017-06-01 12:00:00', '96.00', '2017-12-31 23:59:59', 1, 'The course aims to introduce absolute beginners to the fundamentals of analythics, using simple examples from daily life.', '9 Supplemental Resources, Certificate of Completion', '0.00', 3, 1, '2017-06-02 12:19:49', 1, '2017-06-05 11:49:59', 0, 1),
(9, 'FOL01', 'Facilitation of Learning', '2', '850.00', 2, '3.90', 0, '/img/courses/works_slider2-min.jpg', '/img/courses/coursedetail1-min.png', '2018-01-01 00:00:00', '48.00', '2018-01-31 23:59:59', 0, 'Facilitation of Learning. Vestibulum dolor orci, pulvinar sit amet ullamcorper quis, aliquam vel mi. Vivamus venenatis ligula in ante pulvinar consectetur. Mauris semper molestie tempus. Pellentesque mollis libero eu lacinia consectetur.', '15 Supplemental Resources, Full lifetime access, Access on mobile and TV, Certificate of Completion', '0.00', 2, 1, '2017-06-02 00:19:49', 1, '2017-06-02 10:19:49', 0, 1),
(10, 'ITM01', 'Integrated Talent Management', '4,8,10,1', '2001.00', 0, '4.80', 0, '/img/courses/performancemanagement-min.png', '/img/courses/coursedetail1-min.png', '2018-01-01 00:00:00', '144.00', '2017-08-31 23:59:59', 1, 'Integrated Talent Management by Yeo Chet Tem. Integrated Talent Management by Yeo Chet Tem. Integrated Talent Management by Yeo Chet Tem. Integrated Talent Management by Yeo Chet Tem. Integrated Talent Management by Yeo Chet Tem.', '25 Supplemental Resources, Full lifetime access, Access on mobile and TV, Certificate of Completion', '0.00', 1, 1, '2017-06-02 00:19:49', 1, '2017-06-02 10:19:49', 0, 1),
(11, 'AI001', 'Artificial Intelligence A-Z?: Learn How To Build An AI', '2', '200.00', NULL, '4.50', 0, '/img/courses/ai1-min.png', NULL, '2017-06-01 00:00:00', '780.00', '2017-12-31 23:59:59', 1, 'Learn key AI concepts and intuition training to get you quickly up to speed with all things AI. Covering:\r\n\r\nHow to start building AI with no previous coding experience using Python\r\nHow to merge AI with OpenAI Gym to learn as effectively as possible\r\nHow to optimize your AI to reach its maximum potential in the real world\r\nHere is what you will get with this course:\r\n\r\n\r\n1. Complete beginner to expert AI skills – Learn to code self-improving AI for a range of purposes. In fact, we code together with you. Every tutorial starts with a blank page and we write up the code from scratch. This way you can follow along and understand exactly how the code comes together and what each line means.\r\n\r\n2. Code templates – Plus, you’ll get downloadable Python code templates for every AI you build in the course. This makes building truly unique AI as simple as changing a few lines of code. If you unleash your imagination, the potential is unlimited.\r\n\r\n3. Intuition Tutorials – Where most courses simply bombard you with dense theory and set you on your way, we believe in developing a deep understanding for not only what you’re doing, but why you’re doing it. That’s why we don’t throw complex mathematics at you, but focus on building up your intuition in coding AI making for infinitely better results down the line.\r\n\r\n4. Real-world solutions – You’ll achieve your goal in not only 1 game but in 3. Each module is comprised of varying structures and difficulties, meaning you’ll be skilled enough to build AI adaptable to any environment in real life, rather than just passing a glorified memory “test and forget” like most other courses. Practice truly does make perfect.\r\n\r\n5. In-course support – We’re fully committed to making this the most accessible and results-driven AI course on the planet. This requires us to be there when you need our help. That’s why we’ve put together a team of professional Data Scientists to support you in your journey, meaning you’ll get a response from us within 48 hours maximum.', '13 hours on-demand video,10 Articles,Full lifetime access,Access on mobile and TV,Certificate of Completion', '0.00', 3, 1, '2017-06-21 00:00:00', 1, '2017-06-21 02:00:00', 0, 1),
(12, 'py001', 'Python A-Z?: Python For Data Science With Real Exercises!', '8,2', '200.00', NULL, '4.60', 0, '/img/courses/python-min.png', NULL, '2017-05-01 00:00:00', '660.00', '2017-12-31 23:59:59', 1, 'Learn Python Programming by doing!\r\n\r\nThere are lots of Python courses and lectures out there. However, Python has a very steep learning curve and students often get overwhelmed. This course is different!\r\n\r\nThis course is truly step-by-step. In every new tutorial we build on what had already learned and move one extra step forward.\r\n\r\nAfter every video you learn a new valuable concept that you can apply right away. And the best part is that you learn through live examples.\r\n\r\nThis training is packed with real-life analytical challenges which you will learn to solve. Some of these we will solve together, some you will have as homework exercises.\r\n\r\nIn summary, this course has been designed for all skill levels and even if you have no programming or statistical background you will be successful in this course!\r\n\r\nI can''t wait to see you in class,\r\n\r\nSincerely,\r\n\r\nKirill Eremenko', '11 hours on-demand video,1 Article,Full lifetime access,Access on mobile and TV,Certificate of Completion', '0.00', 2, 1, '2017-06-18 00:00:00', 1, '2017-06-19 00:00:00', 0, 1),
(13, 'BW001', 'Science-Based Bodyweight Workout: Build Muscle Without A Gym', '1,2', '40.00', NULL, '4.10', 0, '/img/courses/pushup-min.png', NULL, '2017-06-18 00:00:00', '60.00', '2017-12-31 23:59:59', 1, 'The "Build Muscle Without A Gym" program is designed for people who are looking for an alternative to the traditional gym. Bodyweight exercises are great for that. You need nothing but your own body, can choose your own workout location and train whenever you want.  \r\n\r\nBut this program does more than teach you a few exercises and workout tips. In the course I go over the science behind building muscle and successful dieting, the perfect beginner workout plan and show you how to set clear and well-defined fitness goals that keep you motivated.\r\n\r\nBy giving you the necessary tools to reach your fitness goals, I will also have to debunk certain training myths that have been around for decades. How many times have you been told that if in order to build muscle you need to…\r\n\r\nExercise at least five times per week…\r\nTrain two or even three hours…\r\nDrink two or more protein shakes per day…\r\nAnd perfectly time your meals no more than three hours apart.\r\n\r\n\r\nAs you will see in the course, most of these “tips” are nonsense and some will even work against you in the long run. Instead I will show you the exact training methods that are scientifically proven to work. \r\n\r\nHere is what''s inside the program:\r\n\r\nThe Step-By-Step Muscle Bulding Formula\r\nThe Step-By-Step Fat Loss Formula\r\nThe Full Bodyweight Workout Program\r\nExercise Videos To Help You Train With Perfect Form\r\nEverything You Need To Know About Nutrition And Dieting \r\nMy 100 page ebook "Bodyweight Basics", with 44 Additional Bodyweight Exercises (Pictures Included) \r\nA Lesson On How To Stay Motivated Through Clear Goals  ', '1 hour on-demand video,1 Article,5 Supplemental Resources,Full lifetime access,Access on mobile and TV,Certificate of Completion', '0.00', 1, 1, '2017-06-11 00:00:00', 1, '2017-06-12 00:00:00', 0, 1),
(14, 'DS001', 'Introduction To Data Science', '8,2', '50.00', NULL, '4.50', 0, '/img/courses/ds-min.png', NULL, '2017-06-01 00:00:00', '360.00', '1970-01-01 00:00:00', 1, 'Use the R Programming Language to execute data science projects and become a data scientist. Implement business solutions, using machine learning and predictive analytics.\r\n\r\nThe R language provides a way to tackle day-to-day data science tasks, and this course will teach you how to apply the R programming language and useful statistical techniques to everyday business situations.\r\n\r\nWith this course, you''ll be able to use the visualizations, statistical models, and data manipulation tools that modern data scientists rely upon daily to recognize trends and suggest courses of action.\r\n\r\nUnderstand Data Science to Be a More Effective Data Analyst\r\n\r\nUse R and RStudio\r\n\r\nMaster Modeling and Machine Learning\r\n\r\nLoad, Visualize, and Interpret Data\r\n\r\nUse R to Analyze Data and Come Up with Valuable Business Solutions\r\n\r\nThis course is designed for those who are analytically minded and are familiar with basic statistics and programming or scripting. Some familiarity with R is strongly recommended; otherwise, you can learn R as you go.\r\n\r\nYou''ll learn applied predictive modeling methods, as well as how to explore and visualize data, how to use and understand common machine learning algorithms in R, and how to relate machine learning methods to business problems.\r\n\r\nAll of these skills will combine to give you the ability to explore data, ask the right questions, execute predictive models, and communicate your informed recommendations and solutions to company leaders.', '6 hours on-demand video,1 Supplemental Resource,Full lifetime access,Access on mobile and TV,Certificate of Completion', '0.00', 2, 1, '2017-05-01 00:00:00', 1, '2017-05-02 00:00:00', 0, 1),
(15, 'T15', 'testing', '12', '123.00', NULL, '0.00', 0, NULL, NULL, '2017-08-24 00:00:00', '100.00', '2017-09-05 23:59:59', 0, 'asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf', '', '0.00', 2, 55, '2017-08-23 15:52:19', NULL, NULL, 1, 2),
(16, 'Q16', 'qwer', '6', '12.00', NULL, '0.00', 0, NULL, NULL, '2017-08-24 00:00:00', '100.00', '2017-09-05 23:59:59', 0, 'testing testing  testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting testingtesting', '', '0.00', 1, 55, '2017-08-23 18:21:35', NULL, NULL, 0, 2),
(17, 'T17', 'testings', '14', '1223.00', 1, '0.00', 0, NULL, NULL, '2017-08-25 00:00:00', '0.00', '2017-09-29 23:59:59', 0, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', 'testing,testing0', '0.00', 2, 55, '2017-08-24 11:54:19', NULL, NULL, 0, 2),
(18, 'T18', 'testing2', '12', '0.00', 1, '0.00', 0, NULL, NULL, '2017-09-15 00:00:00', '0.00', '2017-10-08 23:59:59', 0, 'test \r\ntest test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test', 'test,test', '0.00', 1, 55, '2017-09-08 13:00:29', NULL, NULL, 1, 3),
(19, 'T19', 'testing sfc', '5', '120.00', 2, '0.00', 0, NULL, NULL, '2017-09-19 00:00:00', '0.00', '2018-02-06 23:59:59', 0, 'testing \ntesting testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', 'testing, testing 2', '0.00', 1, 55, '2017-09-12 17:34:50', NULL, NULL, 0, 1),
(20, 'T20', 'testing bar', '14', '34.00', 2, '0.00', 0, NULL, NULL, '2017-09-14 00:00:00', '0.00', '2017-09-26 23:59:59', 0, 'ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok', '', '0.00', 2, 55, '2017-09-12 17:47:40', NULL, NULL, 1, 1),
(21, 'T21', 'testing', '14', '0.00', 1, '0.00', 0, NULL, NULL, '2017-09-14 00:00:00', '0.00', '2017-12-23 23:59:59', 0, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', '', '0.00', 2, 55, '2017-09-13 17:18:30', NULL, NULL, 1, 1),
(22, 'T22', 'testing SGD currency', '14', '12.00', 2, '0.00', 0, NULL, NULL, '2017-09-20 00:00:00', '0.00', '2018-08-31 23:59:59', 0, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', '', '0.00', 1, 55, '2017-09-18 17:57:34', NULL, NULL, 0, 1),
(23, 'T23', 'topic testing', '14', '2.00', 2, '0.00', 0, NULL, NULL, '2017-09-21 00:00:00', '0.00', '2018-01-22 23:59:59', 0, 'ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok', '', '0.00', 1, 55, '2017-09-19 17:23:55', NULL, NULL, 1, 1),
(24, 'T24', 'topic testing 2', '10', '12.00', 2, '0.00', 0, 'course/24/1507871542.jpg', 'course/24/1507871542.jpg', '2017-09-20 00:00:00', '0.00', '2018-04-21 23:59:59', 0, 'ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok ngok', '', '0.00', 1, 55, '2017-09-19 17:25:22', NULL, NULL, 1, 1),
(25, 'T25', 'testings duration', '9', '123.00', 1, '0.00', 0, NULL, NULL, '2017-10-24 00:00:00', '0.00', '2017-10-28 23:59:59', 0, 'testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration', '', '0.00', 1, 55, '2017-10-24 11:02:30', NULL, NULL, 1, 1),
(26, 'T26', 'testing duration 2', '13', '23.00', 1, '0.00', 0, NULL, NULL, '2017-10-24 00:00:00', '0.00', '2017-10-28 23:59:59', 0, 'testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration testing duration', '', '0.00', 1, 55, '2017-10-24 11:03:21', NULL, NULL, 1, 1),
(27, 'T27', 'testing duration 3', '13', '123.00', 2, '0.00', 0, NULL, NULL, '2017-10-24 00:00:00', '0.00', '2017-10-28 23:59:59', 0, 'echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;echo date(''d'', strtotime($selected_course->start_date)). ''-'' . date(''d F, Y'', strtotime($selected_course->end_date)) ;', '', '0.00', 1, 55, '2017-10-24 11:08:57', NULL, NULL, 1, 1),
(28, '128', '1', '12', '12.00', 2, '0.00', 0, NULL, NULL, '2017-10-26 00:00:00', '0.00', '2018-02-25 23:59:59', 0, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', '', '0.00', 1, 64, '2017-10-26 15:33:23', NULL, NULL, 1, 1),
(29, '229', '2', '14', '2.00', 2, '0.00', 0, NULL, NULL, '2017-10-26 00:00:00', '0.00', '2018-02-25 23:59:59', 0, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', '', '0.00', 1, 64, '2017-10-26 15:33:49', NULL, NULL, 0, 1),
(30, '330', '3', '13', '3.00', 2, '0.00', 0, NULL, NULL, '2017-10-26 00:00:00', '0.00', '2018-02-25 23:59:59', 0, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', '', '0.00', 1, 64, '2017-10-26 15:34:16', NULL, NULL, 0, 1),
(31, '431', '4', '14', '4.00', 2, '0.00', 0, NULL, NULL, '2017-10-26 00:00:00', '0.00', '2018-02-25 23:59:59', 0, '2018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:59', '', '0.00', 1, 64, '2017-10-26 15:35:56', NULL, NULL, 0, 1),
(32, '532', '5', '14', '5.00', 2, '0.00', 0, NULL, NULL, '2017-10-26 00:00:00', '0.00', '2018-02-25 23:59:59', 0, '2018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 2018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:5923:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:59', '', '0.00', 1, 64, '2017-10-26 15:36:41', NULL, NULL, 0, 1),
(33, '633', '6', '13', '6.00', 2, '0.00', 0, NULL, NULL, '2017-10-26 00:00:00', '0.00', '2018-02-25 23:59:59', 0, '2018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:59', '', '0.00', 2, 64, '2017-10-26 15:38:33', NULL, NULL, 0, 1),
(34, '734', '7', '12', '7.00', 2, '0.00', 0, NULL, NULL, '2017-10-26 00:00:00', '0.00', '2021-03-12 23:59:59', 0, '2018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:592018-02-25 23:59:59', '', '0.00', 1, 64, '2017-10-26 15:41:28', NULL, NULL, 0, 1);
INSERT INTO `courses` (`id`, `coursecode`, `title`, `category`, `price`, `currency_id`, `rating`, `subscription`, `image`, `detail_image`, `start_date`, `duration`, `end_date`, `type`, `overview`, `info`, `offline_progress`, `level`, `created_by`, `created_time`, `approved_by`, `approved_time`, `sfc`, `status`) VALUES
(35, 'T35', 'testing wrap', '13', '8.00', 2, '0.00', 0, NULL, NULL, '2017-10-27 00:00:00', '0.00', '2018-10-28 23:59:59', 0, 'Search Inside Yourself 2017 is a two-day leadership programme that will bring your career to the next level. Backed by world experts in neuroscience, mindfulness and emotional intelligence, Search Inside Yourself has already changed thousands of lives across the globe. Here are some of the survey results from the 350+ people who attended a recent SIY training in Sydney:\r\n- 89% reported improved ability to reduce stress\r\n- 91% reported enhanced clarity of mind\r\n- 79% reported increased energy levels\r\n- 91% reported improved ability to remain calm\r\n- 85% reported increased ability to connect with others\r\n\r\n<b>THE PROGRAMME DESIGN:</b>\r\n- Overview of the neuroscience of emotion, perception and behavior change\r\n- Definition of emotional intelligence and its personal and professional benefits\r\n- Attention training to enable greater emotional intelligence, including self-awareness, self-mastery, motivation, and connection with self and others\r\n- Principles and practices for developing healthy mental habits that accelerate well-being, including effective listening, generosity, empathy, communication and social skills\r\n- Mindfulness and reflection practices that support happiness, thriving and overall well-being\r\n- Exercises include attention training practice, dyad conversations, writing, walking and group conversations\r\n\r\n<b>PROGRAMME TRAINERS:</b>\r\n<b>Rich Fernandez, CEO of SIYLI</b>\r\nHe was previously the director of executive education and people development at Google, where he was also one of the first SIY teachers. Rich previously founded Wisdom Labs and has also served in senior roles at eBay, J.P. Morgan Chase and Bank of America. He received his PhD in Psychology from Columbia University and is a frequent contributor to the Harvard Business Review.\r\n\r\n<b>Michelle Maldonado</b>\r\nMichelle is a former attorney, turned business leader with more than two decades of experience across the nonprofit, legal, online media and online learning communities. She brings compassion and wisdom cultivated from her professional experience and over 30 years of meditation practice to her work with teams and organizations to help them lead with focus, resiliency and sustainability. Michelle is passionate about transformation and growth and avidly reflects this in her keynotes, workshops and writings. A graduate of Barnard College and George Washington University Law School, she is co-founder of the Northern Virginia Conscious Business Alliance and has received Top Corporate Leader & Woman of the Year awards.\r\n\r\n<b>TESTIMONIALS:</b>\r\n<b>Fiona Hathaway, Microsoft Services Asia HR Leader, Microsoft Asia</b>\r\n"The content is a strong introduction to mindfulness in a secular non- spiritual application that can be used and applied both in a corporate sense and also for personal application and transformation."\r\n \r\n<b>Jenny Dearborn Chief Learning Officer SAP</b>\r\n“This is not about making employees happy,” she said. “It’s about how to get out of a rut ... There is incredible science and research behind the value of opening your mind, daydreaming and forgetting and reremembering.” [We] plan to bring the course to all 6,000 managers, who oversee the majority of SAP employees. [I] encourage all employees to partake and plan for all new hires to be exposed to the concepts during onboarding.\r\n \r\n<b>WHO SHOULD ATTEND</b>\r\n- HR and learning & development professionals\r\n- Managers & executives\r\n- Coaches & mental health professionals\r\n- And anyone who is interested in emotional intelligence\r\n\r\n<b>REFUND POLICY:</b>\r\nIf you''re unable to attend a program that you''ve registered and paid for, there are a couple of options:\r\n<i>Transfer to another participant:</i> Tickets are fully transferable to another person at any time. Contact Centre for Future-ready Graduates to give us the name and email of the attendee in your place.\r\n \r\n<i>Full or partial refund:</i> You are eligible for a full refund until one month prior to the event. If you cancel between one to three weeks before the program, you can receive a refund less a 25% processing fee. If you cancel within 1 week of the program you are not eligible for a refund.\r\nUnfortunately, registrations are not transferable between programs and we are unable to provide credit for future programs.\r\nRefunds will be processed within 15 days of notification of cancellation.\r\n \r\n<b>DISCLAIMER:</b>\r\nBy submitting this form, I as a participant of the ‘Search Inside Yourself 2017’ consent to National University of Singapore (NUS) collecting, using and/or disclosing my personal data to third parties (including any third party located outside of Singapore, for the', '', '0.00', 1, 55, '2017-10-27 12:09:53', NULL, NULL, 0, 1),
(36, 'T36', 'testing html', '13', '0.00', 2, '0.00', 0, NULL, NULL, '2017-10-31 00:00:00', '0.00', '2018-05-18 23:59:59', 0, '<b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b>', '<b>testing</b> \r\n<b>testing</b>', '0.00', 2, 55, '2017-10-31 14:29:49', NULL, NULL, 1, 1),
(37, 'T37', 'testing html2', '11', '1.00', 1, '0.00', 0, NULL, NULL, '2017-10-31 00:00:00', '0.00', '2017-11-22 23:59:59', 0, '<b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> \r\n\r\n<b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b> <b>testing</b>', '<b>testing</b><b>testing</b>', '0.00', 1, 55, '2017-10-31 14:43:34', NULL, NULL, 1, 1),
(38, 'T38', 'testing 1 course', '4', '23.00', 1, '0.00', 0, NULL, NULL, '2017-10-31 00:00:00', '0.00', '2017-12-31 23:59:59', 0, 'asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf', NULL, '0.00', 1, 55, '2017-10-31 15:13:01', NULL, NULL, 1, 1),
(39, '?39', '?? ??', '3', '12.00', 2, '0.00', 0, NULL, NULL, '2017-11-13 00:00:00', '0.00', '2017-11-24 23:59:59', 0, '?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ??', '?? ??', '0.00', 1, 55, '2017-11-13 10:56:04', NULL, NULL, 1, 1),
(40, '?40', '?? ??', '4', '23.00', 2, '0.00', 0, NULL, NULL, '2017-11-14 00:00:00', '0.00', '2017-12-06 23:59:59', 0, '?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ??', '?? ??', '0.00', 1, 55, '2017-11-13 10:56:29', NULL, NULL, 1, 1),
(41, '正41', '正确 ', '4', '12.00', 2, '0.00', 0, NULL, NULL, '2017-11-13 00:00:00', '0.00', '2017-12-14 23:59:59', 0, '??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ???', '???', '0.00', 1, 55, '2017-11-13 11:02:23', NULL, NULL, 1, 1),
(42, '正42', '正', '11', '2.50', 2, '0.00', 0, NULL, NULL, '2017-11-13 00:00:00', '0.00', '2017-12-27 23:59:59', 0, '? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?', '? ?', '0.00', 1, 55, '2017-11-13 11:07:13', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses_categories`
--

CREATE TABLE `courses_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_categories`
--

INSERT INTO `courses_categories` (`id`, `name`, `priority`) VALUES
(1, 'FEATURED', 2),
(2, 'Others', 0),
(3, 'Employee Engagement', 1),
(4, 'Core Value Deployment', 1),
(5, 'Leadership', 1),
(6, 'Organizational Change', 1),
(7, 'Performance Management/ Productivity', 1),
(8, 'Professionalism', 1),
(9, 'Organizational Design', 1),
(10, 'Grooming/Career Development', 1),
(11, 'Entrepreneurship', 1),
(12, 'Finance', 1),
(13, 'Sales/Marketing', 1),
(14, 'Team Building & Personal Development', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_levels`
--

CREATE TABLE `course_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT 'easy' COMMENT 'beginner/intermediate/expert',
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_levels`
--

INSERT INTO `course_levels` (`id`, `name`, `icon`) VALUES
(1, 'Beginner', '/img/courses/beginner-min.png'),
(2, 'Intermediate', '/img/courses/intermediate-min.png'),
(3, 'Expert', '/img/courses/expert-min.png');

-- --------------------------------------------------------

--
-- Table structure for table `course_proposals`
--

CREATE TABLE `course_proposals` (
  `id` int(11) NOT NULL,
  `course_request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `pdf` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `appointment_location` varchar(255) DEFAULT NULL,
  `appointment_postal` varchar(10) DEFAULT NULL,
  `feedback` text,
  `status` tinyint(3) DEFAULT NULL COMMENT '0: new 1: accepted 2:rejected 3:removed',
  `appointment_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_proposals`
--

INSERT INTO `course_proposals` (`id`, `course_request_id`, `user_id`, `title`, `description`, `pdf`, `created_time`, `appointment_location`, `appointment_postal`, `feedback`, `status`, `appointment_time`) VALUES
(1, 12, 2, 'testing', 'qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe qwe', 'course/proposals/9/1504160529_draft-suggested-algorithms.pdf', '2017-08-31 14:22:09', 'qwer', '1234', NULL, 3, '2017-09-08 04:03:00'),
(2, 12, 2, 'gibberish', 'gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish gibberish', NULL, '2017-08-31 15:35:23', NULL, NULL, 'testing', 0, NULL),
(3, 12, 2, 'werw', 'wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer wer', 'course/proposals/11/1504063799_Membership+Renewal+Flyer.pdf', '2017-08-31 17:29:48', NULL, NULL, NULL, 0, NULL),
(4, 5, 55, 'testing', '1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1', NULL, '2017-09-20 11:27:05', NULL, NULL, NULL, 3, NULL),
(5, 9, 55, 'proposal 2', '2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2', NULL, '2017-09-20 11:27:49', NULL, NULL, NULL, 3, NULL),
(6, 9, 55, 'proposal 3', '3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3', 'course/proposals/11/1504063799_Membership+Renewal+Flyer.pdf', '2017-09-20 11:29:49', NULL, NULL, NULL, 0, NULL),
(7, 16, 55, 'testing issues', 'testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues testing issues', 'course/proposals/11/1504063799_Membership+Renewal+Flyer.pdf', '2017-09-22 16:03:01', NULL, NULL, NULL, 0, NULL),
(8, 9, 55, 'testing', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', 'course/proposals/9/1506315362_feedback_8june2017.pdf', '2017-09-25 12:56:02', NULL, NULL, NULL, 0, NULL),
(9, 14, 2, 'testingg', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', 'course/proposals/14/1506315896_feedback8june2017Copy.pdf', '2017-09-25 13:04:56', NULL, NULL, NULL, 0, NULL),
(10, 17, 55, 'testing prop', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', NULL, '2017-11-07 16:09:54', NULL, NULL, NULL, 0, NULL),
(11, 17, 55, 'testing prop2', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', NULL, '2017-11-07 16:10:33', NULL, NULL, NULL, 0, NULL),
(12, 25, 55, 'testing', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', 'course/proposals/25/1514955143_invoice2.pdf', '2018-01-03 12:52:23', NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_requests`
--

CREATE TABLE `course_requests` (
  `id` int(11) NOT NULL,
  `requester_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `budget` decimal(11,2) NOT NULL DEFAULT '0.00',
  `currency_id` int(11) DEFAULT NULL COMMENT 'refer to currencies',
  `participants` int(11) NOT NULL DEFAULT '1',
  `confidentiality` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0:no,1:yes',
  `budget_confidentiality` int(2) NOT NULL DEFAULT '0' COMMENT '0: no ; 1: yes',
  `area_of_training` varchar(255) NOT NULL DEFAULT '1' COMMENT 'refer to course_categories',
  `create_time` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `additional_info` text,
  `pdf` text COMMENT 'URL to pdf file',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0:new, 1: accepted, 2: rejected',
  `created_time` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_requests`
--

INSERT INTO `course_requests` (`id`, `requester_id`, `description`, `budget`, `currency_id`, `participants`, `confidentiality`, `budget_confidentiality`, `area_of_training`, `create_time`, `start_date`, `end_date`, `additional_info`, `pdf`, `status`, `created_time`, `approved_by`, `approved_time`) VALUES
(2, 1, 'test2', '222.00', NULL, 123, 1, 0, '4', NULL, '2017-07-21 00:00:00', NULL, 'asdasdasd', 'course/proposals/11/1504063799_Membership+Renewal+Flyer.pdf', 0, NULL, NULL, NULL),
(3, 1, 'asdasd', '123.00', NULL, 123, 1, 0, '4', NULL, NULL, NULL, 'asda', NULL, 0, NULL, NULL, NULL),
(4, 1, 'asdasd', '123123.00', NULL, 1231, 1, 0, '4', NULL, '2017-07-21 00:00:00', NULL, 'qqqqqqq', NULL, 0, NULL, NULL, NULL),
(5, 17, 'Dummy Course', '10.00', NULL, 5, 1, 0, '4', NULL, '2017-07-21 00:00:00', '2017-07-31 23:59:59', 'This course aims to help dummy user practicing dummy course for several weeks', '', 0, NULL, NULL, NULL),
(6, NULL, 'test final', '121212.00', NULL, 11111, 0, 0, '12', NULL, '2017-07-25 00:00:00', '2017-07-31 23:59:59', 'test final 123123123123123', 'course/requests/20170725/6/1500971840_draft-suggested-algorithms.pdf', 0, NULL, NULL, NULL),
(7, 1, 'testaws', '12.00', NULL, 12, 1, 0, '2', NULL, NULL, NULL, NULL, 'course/requests/20170801/7/1501561616_testpdf.pdf', 0, '2017-08-01 12:26:56', NULL, NULL),
(8, 55, '1233', '123.00', 2, 123, 0, 0, '13', NULL, '2017-08-31 00:00:00', '2017-09-07 23:59:59', NULL, 'course/requests/20170831/8/1504153754_feedback_8june2017.pdf', 0, '2017-08-31 12:27:50', NULL, NULL),
(9, 2, 'qwe', '12.00', NULL, 23, 0, 0, '6', NULL, '2017-08-31 00:00:00', '2017-09-01 23:59:59', NULL, NULL, 0, '2017-08-31 12:34:11', NULL, NULL),
(10, 55, 'asdf', '123.00', NULL, 123, 0, 0, '13', NULL, '2017-08-31 00:00:00', '2017-09-08 23:59:59', NULL, 'course/requests/20170831/10/1504154480_feedback_8june2017.pdf', 0, '2017-08-31 12:41:20', NULL, NULL),
(11, 55, 'zxcv', '0.00', NULL, 123, 0, 0, '7', NULL, '2017-09-01 00:00:00', '2017-09-04 23:59:59', NULL, NULL, 0, '2017-08-31 12:42:07', NULL, NULL),
(12, 55, '123', '12.00', 2, 123, 0, 0, '13', NULL, '2017-09-07 00:00:00', '2017-09-07 23:59:59', NULL, NULL, 0, '2017-08-31 13:58:17', NULL, NULL),
(13, 55, 'testing testing', '2.00', NULL, 2, 0, 0, '6', NULL, '2017-09-20 00:00:00', '2017-09-21 23:59:59', '123', NULL, 0, '2017-09-19 11:30:16', NULL, NULL),
(14, 55, 'testing sgd', '1.00', 2, 2, 0, 0, '13', NULL, '2017-09-19 00:00:00', '2017-09-22 23:59:59', NULL, NULL, 0, '2017-09-19 14:08:24', NULL, NULL),
(15, 55, 'testing logg', '2.00', 2, 2, 0, 0, '7', NULL, NULL, NULL, NULL, NULL, 0, '2017-09-20 17:25:01', NULL, NULL),
(16, 2, 'issues', '2.00', 2, 3, 0, 0, '7', NULL, '2017-09-22 00:00:00', '2017-09-28 23:59:59', NULL, 'course/proposals/11/1504063799_Membership+Renewal+Flyer.pdf', 0, '2017-09-22 15:57:04', NULL, NULL),
(17, 63, 'testing', '23.00', 2, 212, 0, 0, '7', NULL, NULL, NULL, NULL, NULL, 0, '2017-10-09 14:57:07', NULL, NULL),
(18, 55, 'testingasd', '123.00', 2, 123, 0, 0, '7', NULL, NULL, NULL, NULL, NULL, 0, '2017-10-09 15:35:41', NULL, NULL),
(19, 55, 'qrqw', '123.00', 2, 213, 0, 0, '11', NULL, '2017-10-11 00:00:00', NULL, NULL, NULL, 0, '2017-10-09 15:42:59', NULL, NULL),
(20, 55, '1234', '123.00', 2, 123, 0, 0, '13', NULL, NULL, NULL, NULL, NULL, 0, '2017-10-09 15:44:08', NULL, NULL),
(21, 55, 'qwe', '123.00', 2, 123, 0, 0, '10', NULL, NULL, NULL, NULL, NULL, 0, '2017-10-09 15:46:07', NULL, NULL),
(22, 55, '12345', '123.00', 2, 213, 0, 0, '7', NULL, NULL, NULL, NULL, NULL, 0, '2017-10-09 15:48:57', NULL, NULL),
(23, 55, 'finaltest', '0.00', 2, 123, 0, 0, '13', NULL, NULL, NULL, NULL, NULL, 0, '2017-10-09 15:51:47', NULL, NULL),
(24, 55, 'test request', '0.00', 2, 12, 0, 1, '6', NULL, '2018-01-02 00:00:00', '2018-01-26 23:59:59', NULL, NULL, 0, '2018-01-02 16:55:01', NULL, NULL),
(25, 71, 'testing budget', '0.00', 2, 1, 0, 0, '10', NULL, NULL, NULL, NULL, NULL, 0, '2018-01-03 12:13:43', NULL, NULL),
(26, 55, 'testing no sign in', '0.00', 2, 999, 0, 0, '7', NULL, NULL, NULL, NULL, NULL, 0, '2018-01-03 13:56:36', NULL, NULL),
(27, 55, 'testing req', '123.00', 2, 2, 0, 0, '10', NULL, NULL, NULL, NULL, NULL, 0, '2018-01-03 14:06:29', NULL, NULL),
(28, 55, 'testingcust', '12.00', 2, 123, 0, 0, '13', NULL, '2018-03-15 00:00:00', '2018-03-28 23:59:59', 'testingcust', 'course/requests/20180314/28/1521019571_Letter+to+Global+L%26D+Community+by+Robert+Yeo.pdf', 0, '2018-03-14 17:26:11', NULL, NULL),
(29, 64, 'testingtesting', '12.00', 1, 3, 0, 0, '7', NULL, NULL, NULL, '1234', 'course/requests/20180314/29/1521021992_LettertoGlobalLDCommunitybyRobertYeo.pdf', 0, '2018-03-14 18:06:32', NULL, NULL),
(30, 55, 'Ted', '123.00', 2, 12, 0, 0, '4', NULL, '2018-09-06 00:00:00', '2018-09-15 23:59:59', 'Test', NULL, 0, '2018-09-04 18:46:46', NULL, NULL),
(31, 55, 'Ttr', '123.00', 2, 12, 0, 0, '4', NULL, '2018-09-04 00:00:00', '2018-09-21 23:59:59', NULL, NULL, 0, '2018-09-04 19:25:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(5) NOT NULL COMMENT 'currency name',
  `symbol` varchar(5) NOT NULL COMMENT 'currency price symbol'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`) VALUES
(1, 'USD', 'US$'),
(2, 'SGD', 'S$');

-- --------------------------------------------------------

--
-- Table structure for table `home_contents`
--

CREATE TABLE `home_contents` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` text COMMENT 'path to image file',
  `linked_url` text COMMENT 'linked URL',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:"trusted by",2:"our knowledge partner",3:"redefining workplace learning"',
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT '1',
  `created_time` datetime DEFAULT NULL,
  `related_user` int(11) DEFAULT NULL COMMENT 'used for testimony'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_contents`
--

INSERT INTO `home_contents` (`id`, `name`, `image`, `linked_url`, `type`, `description`, `created_by`, `priority`, `created_time`, `related_user`) VALUES
(4, 'Certis Cisco', '/img/trusted/certis cisco-min.png', 'https://www.hp.com', 1, NULL, 1, 1, '2017-06-06 11:48:29', NULL),
(5, 'PSA', '/img/trusted/PSA-min.png', 'https://www.takeda.com', 1, NULL, 1, 2, '2017-06-06 11:48:29', NULL),
(6, 'Tokio Marine', '/img/trusted/CGG Logo-min.jpg', 'http://www.tokiomarine.com', 1, NULL, 1, 3, '2017-06-06 11:48:29', NULL),
(7, 'P&G', '/img/trusted/ISCA Logo-min.jpg', 'http://www.us.pg.com', 1, NULL, 1, 4, '2017-06-06 11:48:29', NULL),
(8, 'SUSS', '/img/trusted/suss-logo.png', 'https://www.suss.edu.sg', 1, NULL, 1, 5, '2017-06-06 11:48:29', NULL),
(9, 'Oracle', '/img/trusted/oracle-logo-min.png', 'https://www.twitter.com', 1, NULL, 1, 6, '2017-06-06 11:48:29', NULL),
(10, 'Human Capital Leadership Institute', '/img/trusted/logo-hcli-min.png', 'https://www.smu.edu.sg', 1, NULL, 1, 7, '2017-06-06 11:48:29', NULL),
(11, 'The Association for Talent Development', '/img/atd-min.png', NULL, 2, 'The Association for Talent Development (ATD) is a professional membership organization supporting those who develop the knowledge and skills of employees in organizations around the world. The association was previously known as the American Society for Training & Development (ASTD).', 1, 1, '2017-06-06 11:48:29', NULL),
(12, 'Association of Chartered Certified Accountants', '/img/acca-logo.jpg', 'http://www.accaglobal.com/sg/en.html', 2, 'Association of Chartered Certified Accountants (ACCA) is the global professional accounting body offering the Chartered Certified Accountant qualification (ACCA or FCCA). From June 2016, ACCA recorded that it has 188,000 members and 480,000 students in 178 countries.', 1, 2, '2017-06-06 11:48:29', NULL),
(13, 'Tailored Experience', '/img/benefit1-min.png', NULL, 3, 'All contents are customized to ensure a highly relevant learning journey for each user', 1, 1, '2017-06-06 11:48:29', NULL),
(14, 'Professional Achievements', '/img/benefit2-min.png', NULL, 3, 'Build your portfolio of learning and highlight your project accomplishments', 1, 2, '2017-06-06 11:48:29', NULL),
(15, 'Discover Insights', '/img/benefit3-min.png', NULL, 3, 'Benchmark your competencies or your staff''s capabilities with the industry to remain competitive', 1, 3, '2017-06-06 11:48:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_settings`
--

CREATE TABLE `home_settings` (
  `id` int(11) NOT NULL,
  `dashboard_title` varchar(50) NOT NULL,
  `dashboard_image` text NOT NULL COMMENT 'path to image file',
  `dashboard_title_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_settings`
--

INSERT INTO `home_settings` (`id`, `dashboard_title`, `dashboard_image`, `dashboard_title_description`) VALUES
(1, 'Lighting Your Pathway', '/img/sliderimage-min.png', 'Stay ahead of today''s competition through latest industry courses and data-driven contents.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_07_19_105336_create_social_accounts_table', 1),
(2, '2017_10_05_031402_create_contactus_table', 0),
(3, '2017_10_05_031402_create_course_levels_table', 0),
(4, '2017_10_05_031402_create_course_proposals_table', 0),
(5, '2017_10_05_031402_create_course_requests_table', 0),
(6, '2017_10_05_031402_create_courses_table', 0),
(7, '2017_10_05_031402_create_courses_categories_table', 0),
(8, '2017_10_05_031402_create_currencies_table', 0),
(9, '2017_10_05_031402_create_home_contents_table', 0),
(10, '2017_10_05_031402_create_home_settings_table', 0),
(11, '2017_10_05_031402_create_modules_table', 0),
(12, '2017_10_05_031402_create_reset_password_table', 0),
(13, '2017_10_05_031402_create_social_accounts_table', 0),
(14, '2017_10_05_031402_create_transaction_carts_table', 0),
(15, '2017_10_05_031402_create_transactions_table', 0),
(16, '2017_10_05_031402_create_user_courses_table', 0),
(17, '2017_10_05_031402_create_user_industries_table', 0),
(18, '2017_10_05_031402_create_user_occupations_table', 0),
(19, '2017_10_05_031402_create_user_reputations_table', 0),
(20, '2017_10_05_031402_create_user_roles_table', 0),
(21, '2017_10_05_031402_create_user_wishlists_table', 0),
(22, '2017_10_05_031402_create_users_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text,
  `module_number` int(11) DEFAULT '1' COMMENT 'module sequence number',
  `video` text COMMENT 'path to video file',
  `duration` decimal(7,2) DEFAULT '0.00' COMMENT 'in minutes',
  `preview` tinyint(2) DEFAULT '0' COMMENT 'preview-able?0:no,1:yes',
  `status` tinyint(4) DEFAULT '1' COMMENT '0:inactive,1:active',
  `created_by` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `course_id`, `title`, `description`, `module_number`, `video`, `duration`, `preview`, `status`, `created_by`, `created_time`) VALUES
(1, 1, 'Intro', 'Basic introduction to course 1.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet tincidunt magna eget dignissim. Nulla gravida suscipit ex, blandit sollicitudin arcu consequat in. Aliquam a nisi mattis, euismod ex ac, molestie augue. Nunc eget dui ut tellus cursus pulvinar. Sed iaculis rhoncus dignissim. Praesent dignissim massa orci, non iaculis magna semper quis. Donec sed risus non orci eleifend condimentum a mattis nisl. Pellentesque laoreet enim ac sollicitudin scelerisque. Suspendisse suscipit aliquet massa, ac venenatis ligula tempor a.', 1, 'course/1/01_sbs_intro.mp4', '45.00', 1, 1, 1, '2017-06-05 12:20:39'),
(2, 1, 'Contents Myelin', 'Maecenas porttitor dui nunc, non fringilla neque suscipit vel. Cras ut urna in sem interdum aliquam sed vel magna. Curabitur tempus mattis justo auctor vulputate. Fusce aliquet orci a dui laoreet, vitae gravida turpis fringilla. Proin convallis, metus id ullamcorper sodales, nulla purus commodo risus, non rutrum diam lectus consequat eros. Vestibulum enim libero, hendrerit iaculis dui in, iaculis consectetur neque. Pellentesque hendrerit nibh sit amet massa rutrum, vel molestie magna commodo. Nullam ac lacinia leo, eu mattis magna. Cras at purus vitae lorem pretium luctus. Vivamus vitae placerat dolor. Curabitur ut vestibulum risus, sit amet euismod ex. Mauris egestas luctus gravida. Donec blandit quam sed ligula porta porttitor. Nunc finibus metus at ullamcorper pellentesque. Pellentesque efficitur, dolor id pharetra gravida, magna felis rutrum libero, eu lobortis orci ipsum ac mauris.', 2, 'course/1/02_sbs_contents_myelin.mp4', '0.00', 0, 1, 1, '2017-06-05 12:20:39'),
(3, 1, 'Contents Hypertrophy', 'The conclusion is Donec et consectetur libero, id facilisis eros. In laoreet massa vitae venenatis pharetra. Aenean posuere orci eu elit suscipit, a euismod purus imperdiet. Duis sed interdum erat, in tempor eros. Pellentesque bibendum elit id orci ultrices pellentesque. Aliquam aliquam suscipit felis quis scelerisque. Curabitur condimentum massa in venenatis molestie. Cras vel urna varius, scelerisque ante quis, faucibus est.', 3, 'course/1/03_sbs_contents_hypertrophy.mp4', '0.00', 0, 1, 1, '2017-06-05 12:20:39'),
(4, 1, 'Contents Memetics', 'Contents Memetics. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, 'course/1/04_sbs_contents_memetics.mp4', '0.00', 0, 1, 1, '2017-06-05 12:20:39'),
(5, 1, 'Contents Epigenetics', 'Contents Epigenetics. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 5, 'course/1/05_sbs_contents_epigenetics.mp4', '0.00', 0, 1, 1, '2017-06-05 12:20:39'),
(6, 1, 'Conclusion', 'Conclusion. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text.', 6, 'course/1/06_sbs_conclusion.mp4', '0.00', 0, 1, 1, '2017-06-05 12:20:39'),
(7, 11, 'AI - Intro', 'Basic introduction to course 1.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet tincidunt magna eget dignissim. Nulla gravida suscipit ex, blandit sollicitudin arcu consequat in. Aliquam a nisi mattis, euismod ex ac, molestie augue. Nunc eget dui ut tellus cursus pulvinar. Sed iaculis rhoncus dignissim. Praesent dignissim massa orci, non iaculis magna semper quis. Donec sed risus non orci eleifend condimentum a mattis nisl. Pellentesque laoreet enim ac sollicitudin scelerisque. Suspendisse suscipit aliquet massa, ac venenatis ligula tempor a.', 1, 'course/1/intro2.mp4', '15.00', 1, 1, 1, '2017-06-05 12:20:39'),
(8, 11, 'AI - Contents Myelin', 'Maecenas porttitor dui nunc, non fringilla neque suscipit vel. Cras ut urna in sem interdum aliquam sed vel magna. Curabitur tempus mattis justo auctor vulputate. Fusce aliquet orci a dui laoreet, vitae gravida turpis fringilla. Proin convallis, metus id ullamcorper sodales, nulla purus commodo risus, non rutrum diam lectus consequat eros. Vestibulum enim libero, hendrerit iaculis dui in, iaculis consectetur neque. Pellentesque hendrerit nibh sit amet massa rutrum, vel molestie magna commodo. Nullam ac lacinia leo, eu mattis magna. Cras at purus vitae lorem pretium luctus. Vivamus vitae placerat dolor. Curabitur ut vestibulum risus, sit amet euismod ex. Mauris egestas luctus gravida. Donec blandit quam sed ligula porta porttitor. Nunc finibus metus at ullamcorper pellentesque. Pellentesque efficitur, dolor id pharetra gravida, magna felis rutrum libero, eu lobortis orci ipsum ac mauris.', 2, 'course/1/intro2.mp4', '75.00', 0, 1, 1, '2017-06-05 12:20:39'),
(9, 11, 'AI - Contents Hypertrophy', 'The conclusion is Donec et consectetur libero, id facilisis eros. In laoreet massa vitae venenatis pharetra. Aenean posuere orci eu elit suscipit, a euismod purus imperdiet. Duis sed interdum erat, in tempor eros. Pellentesque bibendum elit id orci ultrices pellentesque. Aliquam aliquam suscipit felis quis scelerisque. Curabitur condimentum massa in venenatis molestie. Cras vel urna varius, scelerisque ante quis, faucibus est.', 3, 'course/1/intro2.mp4', '20.00', 0, 1, 1, '2017-06-05 12:20:39'),
(10, 11, 'AI - Contents Memetics', 'Contents Memetics. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, 'course/1/intro2.mp4', '20.00', 0, 1, 1, '2017-06-05 12:20:39'),
(11, 11, 'AI - Contents Epigenetics', 'Contents Epigenetics. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 5, 'course/1/intro2.mp4', '60.00', 0, 1, 1, '2017-06-05 12:20:39'),
(12, 11, 'AI - Conclusion', 'Conclusion. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text.', 6, 'course/1/intro2.mp4', '10.00', 0, 1, 1, '2017-06-05 12:20:39'),
(13, 11, 'AI - Final Exercise', 'Final Exercise. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text.', 7, 'course/1/intro2.mp4', '10.00', 0, 1, 1, '2017-06-05 12:20:39'),
(31, 17, 'testing1', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-08-24 12:00:45'),
(32, 17, 'testing2', NULL, 2, NULL, '0.00', 0, 1, 55, '2017-08-24 12:00:45'),
(33, 17, 'testing', NULL, 3, NULL, '0.00', 0, 1, 55, '2017-08-24 12:00:45'),
(34, 18, 'delete', NULL, 1, NULL, '0.00', 0, 1, 58, '2017-09-04 12:16:29'),
(35, 18, 'delete', NULL, 2, NULL, '0.00', 0, 1, 58, '2017-09-04 12:16:29'),
(36, 18, 'delete', NULL, 3, NULL, '0.00', 0, 1, 58, '2017-09-04 12:16:29'),
(38, 18, 'ngok', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-09-08 13:00:29'),
(39, 18, 'ngokq', NULL, 2, NULL, '0.00', 0, 1, 55, '2017-09-08 13:00:29'),
(40, 19, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing ', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-09-12 17:34:50'),
(41, 19, ' testing testing testin', NULL, 2, NULL, '0.00', 0, 1, 55, '2017-09-12 17:34:50'),
(49, 24, 'testing', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-09-29 15:42:52'),
(50, 28, '1', NULL, 1, NULL, '0.00', 0, 1, 64, '2017-10-26 15:33:23'),
(51, 29, '2', NULL, 1, NULL, '0.00', 0, 1, 64, '2017-10-26 15:33:49'),
(52, 30, '3', NULL, 1, NULL, '0.00', 0, 1, 64, '2017-10-26 15:34:16'),
(53, 31, '4', NULL, 1, NULL, '0.00', 0, 1, 64, '2017-10-26 15:35:56'),
(54, 32, '5', NULL, 1, NULL, '0.00', 0, 1, 64, '2017-10-26 15:36:41'),
(55, 33, '6', NULL, 1, NULL, '0.00', 0, 1, 64, '2017-10-26 15:38:33'),
(56, 34, '7', NULL, 1, NULL, '0.00', 0, 1, 64, '2017-10-26 15:41:28'),
(57, 35, 'testing wrap\r\ntesting wrap', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-10-27 12:27:52'),
(58, 35, ' normal one', NULL, 2, NULL, '0.00', 0, 1, 55, '2017-10-27 12:27:52'),
(62, 37, '<b>testing</b> ', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-10-31 14:44:05'),
(63, 37, '<b>testing</b> \r\n<b>testing</b> ', NULL, 2, NULL, '0.00', 0, 1, 55, '2017-10-31 14:44:05'),
(64, 37, '<b>testing</b><b>testing</b> \r\n<b>testing</b>', NULL, 3, NULL, '0.00', 0, 1, 55, '2017-10-31 14:44:05'),
(65, 39, '?? ??', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-11-13 10:56:04'),
(66, 39, ' ?? ??', NULL, 2, NULL, '0.00', 0, 1, 55, '2017-11-13 10:56:04'),
(67, 40, '?? ??', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-11-13 10:56:29'),
(68, 41, '???', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-11-13 11:02:23'),
(69, 42, '? ?', NULL, 1, NULL, '0.00', 0, 1, 55, '2017-11-13 11:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `new_key` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `request_time` datetime NOT NULL,
  `completed_time` datetime DEFAULT NULL,
  `deactivated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_accounts`
--

INSERT INTO `social_accounts` (`id`, `user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 17, '10208785536108941', 'facebook', '2017-07-31 03:42:57', '2017-07-31 03:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT '0.00',
  `status` tinyint(4) DEFAULT '0' COMMENT '0:new,1:paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `time`, `amount`, `status`) VALUES
(1, 1, '2017-06-06 11:13:50', '1500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_carts`
--

CREATE TABLE `transaction_carts` (
  `id` int(11) NOT NULL COMMENT 'Start from 10000000001',
  `transaction_id` int(11) DEFAULT NULL COMMENT 'filled as transaction is paid',
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `time_added` datetime DEFAULT NULL,
  `time_completed` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0:awaiting payment, 1:paid, 2:deleted',
  `payment_option` int(5) NOT NULL DEFAULT '0' COMMENT '0: wire, 1: credit card, 2: SFC, 3: free',
  `detail` varchar(100) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `participant` int(11) NOT NULL COMMENT 'user participate in course',
  `total_amount` decimal(11,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_carts`
--

INSERT INTO `transaction_carts` (`id`, `transaction_id`, `user_id`, `course_id`, `time_added`, `time_completed`, `status`, `payment_option`, `detail`, `quantity`, `participant`, `total_amount`) VALUES
(1000000001, 1, 1, 1, '2017-06-05 11:40:54', '2017-06-06 11:13:50', 1, 0, NULL, 1, 2, '1500.00'),
(1000000021, NULL, 55, 17, '2017-09-07 19:22:31', NULL, 0, 0, NULL, 1, 2, '1223.00'),
(1000000022, NULL, 55, 18, '2017-09-08 14:24:44', NULL, 0, 0, NULL, 1, 2, '1234.00'),
(1000000023, NULL, 55, 1, '2017-09-12 14:28:57', NULL, 0, 0, NULL, 1, 63, '1500.00'),
(1000000024, NULL, 55, 1, '2017-09-22 16:08:19', NULL, 0, 0, NULL, 1, 63, '1500.00'),
(1000000025, NULL, 55, 21, '2017-10-24 11:28:20', NULL, 0, 0, NULL, 1, 0, '0.00'),
(1000000026, NULL, 56, 21, '2017-10-24 11:44:08', NULL, 0, 0, NULL, 1, 0, '0.00'),
(1000000027, NULL, 55, 23, '2017-10-26 12:27:54', NULL, 0, 0, NULL, 1, 0, '2.00'),
(1000000028, NULL, 55, 23, '2017-10-26 12:30:01', NULL, 0, 0, NULL, 1, 0, '2.00'),
(1000000029, NULL, 55, 23, '2017-10-26 12:30:12', NULL, 0, 1, NULL, 1, 0, '2.00'),
(1000000030, NULL, 55, 21, '2017-10-26 12:30:55', NULL, 0, 0, NULL, 1, 0, '0.00'),
(1000000031, NULL, 55, 23, '2017-10-26 12:32:09', NULL, 0, 0, NULL, 1, 0, '2.00'),
(1000000032, NULL, 55, 23, '2017-10-26 12:33:06', NULL, 0, 0, NULL, 1, 0, '2.00'),
(1000000033, NULL, 55, 23, '2017-10-26 12:35:15', NULL, 0, 2, NULL, 1, 0, '2.00'),
(1000000034, NULL, 63, 28, '2017-11-01 15:29:00', NULL, 0, 1, NULL, 1, 0, '12.00'),
(1000000035, NULL, 63, 28, '2017-11-01 15:29:32', NULL, 0, 1, NULL, 1, 0, '12.00'),
(1000000036, NULL, 63, 28, '2017-11-01 15:32:50', NULL, 0, 1, NULL, 1, 0, '12.00'),
(1000000037, NULL, 63, 28, '2017-11-01 15:33:24', NULL, 0, 1, NULL, 1, 0, '12.00'),
(1000000038, NULL, 63, 28, '2017-11-01 15:38:14', NULL, 2, 1, NULL, 1, 0, '12.00'),
(1000000039, NULL, 55, 29, '2017-11-01 16:32:40', NULL, 0, 0, NULL, 1, 58, '2.00'),
(1000000040, NULL, 63, 28, '2017-11-01 16:46:14', NULL, 0, 1, NULL, 1, 63, '12.00'),
(1000000041, NULL, 55, 1, '2017-11-02 10:40:28', NULL, 0, 3, NULL, 1, 63, '0.00'),
(1000000042, NULL, 56, 28, '2017-11-02 16:33:08', NULL, 0, 1, NULL, 1, 56, '12.00'),
(1000000043, NULL, 56, 21, '2017-11-02 16:49:08', NULL, 0, 3, NULL, 1, 56, '0.00'),
(1000000044, NULL, 56, 35, '2017-11-02 16:53:56', NULL, 0, 0, NULL, 1, 56, '8.00'),
(1000000045, NULL, 66, 1, '2017-11-15 13:16:24', '2017-11-15 13:38:16', 1, 3, NULL, 1, 66, '1.00'),
(1000000046, NULL, 55, 1, '2017-11-20 12:41:10', NULL, 0, 3, NULL, 1, 55, '0.00'),
(1000000048, NULL, 55, 35, '2017-11-24 15:35:11', NULL, 0, 1, NULL, 1, 58, '8.00'),
(1000000049, NULL, 55, 35, '2017-11-24 15:36:03', NULL, 0, 0, NULL, 1, 58, '8.00'),
(1000000052, NULL, 55, 35, '2017-11-24 15:51:48', NULL, 0, 1, NULL, 1, 58, '8.00'),
(1000000053, NULL, 55, 35, '2017-11-24 15:53:26', NULL, 2, 0, NULL, 1, 63, '8.00'),
(1000000054, NULL, 69, 1, '2017-12-05 15:54:01', NULL, 0, 3, NULL, 1, 69, '0.00'),
(1000000055, NULL, 55, 1, '2017-12-05 15:55:56', NULL, 0, 3, NULL, 1, 55, '0.00'),
(1000000056, NULL, 55, 1, '2017-12-05 15:56:53', NULL, 0, 3, NULL, 1, 55, '0.00'),
(1000000057, NULL, 55, 1, '2017-12-05 15:57:32', NULL, 0, 3, NULL, 1, 55, '0.00'),
(1000000058, NULL, 55, 3, '2017-12-05 15:59:04', NULL, 0, 3, NULL, 1, 55, '0.00'),
(1000000059, NULL, 55, 3, '2017-12-05 16:02:05', NULL, 0, 3, NULL, 1, 58, '0.00'),
(1000000060, NULL, 55, 28, '2017-12-05 16:33:13', NULL, 0, 1, NULL, 1, 55, '12.00'),
(1000000061, NULL, 55, 9, '2017-12-05 16:34:36', NULL, 0, 1, NULL, 1, 55, '850.00'),
(1000000062, NULL, 55, 19, '2017-12-05 16:37:16', NULL, 0, 1, NULL, 1, 55, '120.00'),
(1000000063, NULL, 55, 19, '2017-12-05 16:38:07', NULL, 0, 1, NULL, 1, 55, '120.00'),
(1000000064, NULL, 55, 19, '2017-12-05 16:38:39', NULL, 0, 1, NULL, 1, 55, '120.00'),
(1000000065, NULL, 55, 19, '2017-12-05 16:40:30', NULL, 0, 1, NULL, 1, 55, '120.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `web_url` varchar(50) DEFAULT NULL,
  `user_desc` text NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `google_credential` text COMMENT 'Hashed Google Credentials',
  `facebook_credential` text COMMENT 'Hashed Facebook Credentials',
  `password` varchar(100) DEFAULT NULL COMMENT 'Hashed password (when not using Google or Facebook)',
  `mailing_address` text NOT NULL,
  `country` varchar(5) NOT NULL DEFAULT 'SG',
  `interest` int(11) DEFAULT NULL COMMENT 'based on course_categories',
  `industry` int(11) DEFAULT NULL COMMENT 'based on user_industries',
  `occupation` int(11) DEFAULT NULL COMMENT 'based on user_occupations',
  `organization` varchar(200) DEFAULT NULL COMMENT 'Organization for individual, corporate_company_name for corporate',
  `type` tinyint(3) DEFAULT '0' COMMENT '0:individual,1:corporate,2:employee',
  `type_premium` tinyint(3) DEFAULT '0' COMMENT '0:free,1:premium',
  `corporate_company_email` varchar(100) DEFAULT NULL,
  `corporate_phone_number` varchar(20) DEFAULT NULL COMMENT 'including individual phone number',
  `corporate_admin_occupation` int(11) DEFAULT NULL COMMENT 'based on user_occupations',
  `photo` text COMMENT 'path to profile avatar',
  `reputation_id` int(11) NOT NULL DEFAULT '1',
  `role` int(11) NOT NULL DEFAULT '1',
  `newsletters` tinyint(2) DEFAULT '0' COMMENT 'Receive LAD newsletters?',
  `employee_of` int(11) DEFAULT NULL COMMENT 'Refer to user>id',
  `course_credits` int(11) DEFAULT NULL COMMENT 'maximum course that can be made',
  `proposal_credits` int(11) NOT NULL DEFAULT '3' COMMENT 'maximum proposals submitted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0:inactive,1:active,2:suspended'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `web_url`, `user_desc`, `title`, `google_credential`, `facebook_credential`, `password`, `mailing_address`, `country`, `interest`, `industry`, `occupation`, `organization`, `type`, `type_premium`, `corporate_company_email`, `corporate_phone_number`, `corporate_admin_occupation`, `photo`, `reputation_id`, `role`, `newsletters`, `employee_of`, `course_credits`, `proposal_credits`, `created_at`, `updated_at`, `status`) VALUES
(2, 'jaysonk', 'Jayson Krause', 'jayson@a.b.c', NULL, '', 'Mr', NULL, NULL, '34ca82e9ba68b112d36e82a4e024bf439d2517b345b617feb45e223e7d6c4526', '', 'DE', NULL, NULL, 2, 'STADA', 2, 0, NULL, NULL, NULL, 'images/2/profpic/profpic-min.png', 3, 2, 1, NULL, NULL, 3, '2017-06-05 12:21:31', '2017-09-05 16:52:19', 1),
(3, 'jimmychew', 'Jimmy Chew', 'jimmy@a.b.c', NULL, '', 'Mr', NULL, NULL, '435ad5e6da2e8c955d45254d6ac33130d1f0c2840a5ef581031f06bacad0b600', '', 'CN', NULL, NULL, 5, 'Parahyangan', 1, 0, NULL, NULL, NULL, NULL, 2, 2, 0, NULL, NULL, 3, '2017-06-06 12:21:31', '0000-00-00 00:00:00', 1),
(4, 'ningsm', 'Ning See Meng', 'ning@abc.def', NULL, '', 'Mr', NULL, NULL, '5f65b28cd37412cb70608e2e23ceda9c688f18f78734ca21cecca71ed8316027', '', 'SG', NULL, NULL, 3, 'NUS', 1, 1, NULL, NULL, NULL, NULL, 2, 2, 1, NULL, NULL, 3, '2017-06-07 12:21:31', '0000-00-00 00:00:00', 1),
(5, 'adrianteo', 'Adrian Teo', 'adrian@qqqqq.com', NULL, '', 'Mr', NULL, NULL, '348ae0841d192d3b04c3b88db2f9cadd9551d18b8a8806f3408a8ad23906356e', '', 'SG', NULL, NULL, 2, 'MoE Singapore', 1, 1, NULL, NULL, NULL, NULL, 3, 2, 1, NULL, NULL, 3, '2017-06-07 12:21:31', '0000-00-00 00:00:00', 1),
(6, 'limpengsoon', 'Lim Peng Soon', 'lim@peng.soon', NULL, '', 'Dr', NULL, NULL, 'f6bf0e598454cd9611f25065fffa0d9404ad42373c358c40da09db9548556113', '', 'MY', NULL, NULL, 15, 'NTU', 1, 0, NULL, NULL, NULL, NULL, 2, 2, 0, NULL, NULL, 3, '2017-06-07 12:21:31', '0000-00-00 00:00:00', 1),
(7, 'yeoct123', 'Yeo Chet Tem', 'yeo@ct123.com', NULL, '', 'Mr', NULL, NULL, '7cee9cf3b90682ae4829b7e7cd5a39505d02c4731cc63ba7346b3a589890cc6a', '', 'IN', NULL, NULL, 14, 'SMU', 1, 0, NULL, NULL, NULL, NULL, 3, 2, 0, NULL, NULL, 3, '2017-06-05 12:21:31', '0000-00-00 00:00:00', 1),
(8, 'jinsheng', 'Ng Jinsheng', 'jinsheng@gmail.com', NULL, '', 'Mr', NULL, NULL, 'bf8f27cbced907a7cd05a358e813009b2ea7a79398f662dc093cbf3b68105ab8', '', 'TW', NULL, NULL, 14, 'Sony', 1, 1, NULL, NULL, NULL, NULL, 3, 2, 1, NULL, NULL, 3, '2017-06-07 12:21:31', '0000-00-00 00:00:00', 1),
(9, 'alfred', 'Alfred Tan', 'alfred@a.b.c', NULL, '', 'Prof', NULL, NULL, '7b2b547ab5377906300c69cd065aa48ecc143ddcd9501ef2b7c6408cc3592ac3', '', 'MY', NULL, NULL, 13, 'SMU', 1, 1, NULL, NULL, NULL, NULL, 2, 2, 0, NULL, NULL, 3, '2017-06-07 12:21:31', '0000-00-00 00:00:00', 1),
(10, 'kenkwan', 'Ken Kwan', 'ken@kwan.com', NULL, '', 'Mr', NULL, NULL, '390262cc4369ebeca0194ae31fab37fdf103a6404098778908f47b3c4c768025', '', 'MY', NULL, NULL, 12, 'NTU', 1, 1, NULL, NULL, NULL, NULL, 2, 2, 1, NULL, NULL, 3, '2017-06-07 13:21:31', '0000-00-00 00:00:00', 1),
(11, 'stadaadmin', 'Stada & Scouts Association', 'admin@stada.com', NULL, '', NULL, NULL, NULL, '54ad902fca9641533b98bd90f3d3daf8b98129e8c308baedf9e8a3740a3725fd', '', 'SG', NULL, NULL, 11, 'STADA', 1, 1, NULL, NULL, NULL, NULL, 3, 2, 1, NULL, NULL, 3, '2017-06-07 13:21:31', '0000-00-00 00:00:00', 1),
(12, 'tanst', 'Tan Swee Tiong', 'tanst@test.com', NULL, '', 'Mr', NULL, NULL, '6a2ff16a561a5f859d2ab98428041f27b7bbc863504d8afb5873f84e326835fd', '', 'CN', NULL, NULL, 10, 'STADA', 1, 1, NULL, NULL, NULL, NULL, 3, 2, 0, NULL, NULL, 3, '2017-06-07 13:21:31', '0000-00-00 00:00:00', 1),
(13, 'user_ivan', 'Ivan Testing 2', 'ivan2@senja.co.uk', NULL, '', NULL, NULL, NULL, '37da39487b1674de0eb82bc3e6057639dc1111a75ca1773bda87772fc0a70a3c', '', 'ID', NULL, NULL, 9, 'senja', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-06-21 04:05:40', '0000-00-00 00:00:00', 1),
(14, 'user_ivan3', 'User Ivan 3', 'ivan3@senja.co.uk', NULL, '', NULL, NULL, NULL, '148d91626c5bd73c624303fa6a40fbad0921c5fe6e315effec7126a1990b2759', '', 'ID', NULL, NULL, 7, 'senja', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-06-21 12:22:14', '0000-00-00 00:00:00', 1),
(15, 'user_kraukman', 'Kraukman LAD', 'kraukman@lad.com', NULL, '', NULL, NULL, NULL, '4480b3ec446ed5dffa62f98cc3decab58fe591358f144b22a60a56ab217a6f9f', '', 'SG', 14, NULL, 8, 'LADGlobal', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-07-10 16:56:39', '0000-00-00 00:00:00', 1),
(16, NULL, 'Dummy Ivan', 'ivandummy123a@gmail.com', NULL, '', NULL, NULL, NULL, '0f413c17f8b84636f15733ec7dc3fcfbdc1058f23e3202e720bf1eee338b5639', '', 'LH', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'images/1/profpic/photo-min.png', 1, 1, 0, NULL, NULL, 3, '2017-07-31 12:46:56', '0000-00-00 00:00:00', 1),
(17, 'user_silver_fire_boo', 'Ivan Lukman', 'silver_fire_boost@rocketmail.com', NULL, '', NULL, NULL, '1727ea9b6f3f54ff459c60bbbbbe166e561df1980b1c53c9c6c7ecb13d406005', NULL, '', 'LH', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'images/32/profpic/1502098053.png', 1, 1, 0, NULL, NULL, 3, '2017-07-31 10:42:57', '2017-07-31 10:42:57', 1),
(19, 'user_testivan', 'Àlexander Kolarov', 'testivan@adas.asd', NULL, '', NULL, NULL, NULL, 'd8a928b2043db77e340b523547bf16cb4aa483f0645fe0a290ed1f20aab76257', '', 'asdas', NULL, NULL, 6, 'asdasdasd', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-07-25 18:35:38', '0000-00-00 00:00:00', 1),
(20, NULL, 'Test Individual', 'individual@gmail.com', NULL, '', NULL, NULL, NULL, '221d0ef708a325a85210fedcaabcaa71dfe93243a71a73cdf29d37f0489e5d5a', '', 'BD', NULL, NULL, 4, 'Blahsasd', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-07-27 14:30:14', '0000-00-00 00:00:00', 1),
(21, NULL, 'Test Corporate', 'corporate@gmail.com', NULL, '', NULL, NULL, NULL, 'b6a11fc5c177995bd6016bb40620d579339106239381b38324ded5f4cdcd33f5', '', 'VA', NULL, NULL, NULL, 'Test Corporate123', 1, 0, 'corporate@gmail.com', '123123123', 12, 'images/32/profpic/1502098053.png', 1, 1, 0, NULL, NULL, 3, '2017-07-27 15:25:47', '0000-00-00 00:00:00', 1),
(22, 'user_fabian', 'Fabian Kaeser', 'fabian@senja.co.uk', NULL, '', NULL, NULL, NULL, '616287e011c49549147b8a82e654c013e785c73b7b3d50785d8e5ae3960f0916', '', 'CHE', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-07-25 17:02:46', '0000-00-00 00:00:00', 1),
(30, NULL, 'test autologin', 'autologin@gmail.com', NULL, '', NULL, NULL, NULL, 'd064552dcb36e17935370271872f084fea47efee5faac180bab064c4fa255803', '', 'IS', NULL, NULL, 5, 'ladglobal', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-07-31 12:35:17', '0000-00-00 00:00:00', 1),
(31, NULL, 'autologincorporate', 'autologincorp@gmail.com', NULL, '', NULL, NULL, NULL, '2735edc1d8e7d65a0e472c6e55edb5c78f5e3cecc22f68352d9f0d769293cf89', '', 'SH', NULL, NULL, NULL, 'autologin', 1, 0, 'autologin@gmail.com', '123123123', 10, NULL, 1, 1, 0, NULL, NULL, 3, '2017-07-31 12:37:29', '0000-00-00 00:00:00', 1),
(32, NULL, 'test ivan reset', 'ivandummy123@gmail.com', NULL, '', NULL, NULL, NULL, '0f413c17f8b84636f15733ec7dc3fcfbdc1058f23e3202e720bf1eee338b5639', '', 'ID', NULL, NULL, 3, 'LADGlobal', 3, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-08-14 13:32:13', '0000-00-00 00:00:00', 1),
(33, NULL, 'testindividual1', 'individual1@gmail.com', NULL, '', NULL, NULL, NULL, 'd68fcee68fb704d4d7421070b31292dfe75799af60f793155843006b74fd8617', '', 'IN', 14, 18, 14, 'LADTest', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 3, '2017-08-16 11:38:37', '0000-00-00 00:00:00', 1),
(34, NULL, 'corporate2', 'corporate2@gmail.com', NULL, '', NULL, NULL, NULL, 'e28559a0cb76c10229a227408dc4bb55bd139f1d53916942defc6af79b5cc254', '', 'TP', 13, 16, NULL, 'corporate 2', 1, 0, 'corporate2@gmail.com', '123123123', 14, NULL, 1, 1, 0, NULL, NULL, 3, '2017-08-16 11:47:02', '0000-00-00 00:00:00', 1),
(55, 'testivan', 'Ivan Testing', 'ivan@senja.co.uk', 'www.senja.co.uk', 'Testing User\r\ntesting wrap\r\n\r\ntesting again', 'Mr', NULL, NULL, '0f413c17f8b84636f15733ec7dc3fcfbdc1058f23e3202e720bf1eee338b5639', '{"address":"23","postal":"2347","city":"2345"}', 'SG', 4, 18, 1, 'Senja', 1, 1, NULL, '2345', 2, 'images/55/profpic/1508494045.png', 1, 1, 0, NULL, 1, 8, '2017-06-05 12:21:31', '0000-00-00 00:00:00', 1),
(56, NULL, 'testing', 'testing@testing.com', NULL, '', NULL, NULL, NULL, 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', '', 'AL', 3, 2, 2, 'qwe', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, 3, 3, '2017-08-30 11:06:51', '0000-00-00 00:00:00', 1),
(57, NULL, 'testing company', 'testing@testingcomp.com', NULL, '', NULL, NULL, NULL, 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', '', 'BB', 13, 17, NULL, 'testing', 1, 0, 'testing@asdf.com', '123', 13, NULL, 1, 1, 0, NULL, 6, 3, '2017-08-30 11:11:08', '0000-00-00 00:00:00', 1),
(58, NULL, 'testingemp', 'asdf@asdf.com', NULL, '', NULL, NULL, NULL, 'f969fdbe811d8a66010d6f8973246763147a2a0914afc8087839e29b563a5af0', '', 'BD', 13, 3, 5, NULL, 2, 0, NULL, NULL, NULL, NULL, 1, 2, 0, 55, 0, 3, '2017-09-06 12:08:13', '0000-00-00 00:00:00', 1),
(59, NULL, 'testingemp2', 'testing@testing5.com', NULL, '', NULL, NULL, NULL, '9a9979488be88f7ea38f133d538ad5bb78b0cf8b8557c4ce8c2ec86ecbce20ca', '', 'AF', 13, 11, 5, 'Senja', 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, 0, 3, '2017-09-07 12:17:45', '0000-00-00 00:00:00', 1),
(63, NULL, 'Abraham Rendy Hermawan', 'aeroponse@gmail.com', NULL, '', NULL, '6c1cd805c1b339e276d47a58a77259d68c287a7809635b9a32f1d942c418b6e4', NULL, NULL, '', 'LH', NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, NULL, 1, 1, 0, 55, 3, 3, '2017-09-14 16:37:13', '0000-00-00 00:00:00', 1),
(64, NULL, 'testing', 'testing@corp.com', '', '', NULL, NULL, NULL, 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', '', 'SG', 4, 1, NULL, 'testing', 1, 0, 'testing@corp.com', '01234', 1, NULL, 1, 1, 0, NULL, 7, 0, '2017-10-26 15:32:39', '0000-00-00 00:00:00', 1),
(65, 'testivan', 'Superadmin', 'abraham@senja.co.uk', 'www.senja.co.uk', 'Testing User\r\ntesting wrap\r\n\r\ntesting again', 'Mr', NULL, NULL, '0f413c17f8b84636f15733ec7dc3fcfbdc1058f23e3202e720bf1eee338b5639', '', 'SG', 4, 18, 1, 'Senja', 3, 1, NULL, NULL, 2, 'images/65/profpic/1509613060.png', 1, 1, 0, NULL, 1, 3, '2017-06-05 12:21:31', '0000-00-00 00:00:00', 1),
(66, NULL, 'testing address', 'testingaddress@testing.com', NULL, '', NULL, NULL, NULL, 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', '123', 'BD', 12, 18, 14, '1234', 0, 0, NULL, '+628986806006', NULL, NULL, 1, 1, 0, NULL, 3, 3, '2017-11-13 17:44:32', '0000-00-00 00:00:00', 1),
(67, NULL, 'testing address 2', 'testingaddress2@testing.com', NULL, '', NULL, NULL, NULL, 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', '""', 'BB', 8, 18, 11, '1234', 0, 0, NULL, '12345', NULL, NULL, 1, 1, 0, NULL, 3, 3, '2017-11-13 17:52:53', '0000-00-00 00:00:00', 1),
(68, NULL, 'testing address 2', 'testingaddress3@testing.com', NULL, '', NULL, NULL, NULL, 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', 'null', 'BB', 8, 18, 11, '1234', 0, 0, NULL, '12345', NULL, NULL, 1, 1, 0, NULL, 3, 3, '2017-11-13 17:54:25', '0000-00-00 00:00:00', 1),
(69, NULL, 'testing address 2', 'testingaddress4@testing.com', NULL, '', NULL, NULL, NULL, 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', '{"address":"123","postal":"1234","city":"12345"}', 'BB', 8, 18, 11, '1234', 0, 0, NULL, '12345', NULL, NULL, 1, 1, 0, NULL, 3, 3, '2017-11-13 17:54:53', '0000-00-00 00:00:00', 1),
(71, NULL, 'testingcompaddress', 'testingcompaddress@test.com', NULL, '', NULL, NULL, NULL, 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', '{"address":"123","postal":"1234","city":"12345"}', 'BD', 6, 13, NULL, '123', 1, 0, 'testingcompaddress@test.com', '12345', 9, NULL, 1, 1, 0, NULL, 5, 3, '2017-11-13 17:58:23', '0000-00-00 00:00:00', 1),
(72, NULL, 'test', 'testing123@testing.com', NULL, '', NULL, NULL, NULL, '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '{"address":"12345","postal":"12345"}', 'BB', 13, 18, NULL, '(password12345)', 1, 0, 'testing@testing.com', '12345', 8, NULL, 1, 1, 0, NULL, 5, 3, '2018-04-25 16:57:18', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0:user,1:lecturer',
  `course_id` int(11) NOT NULL,
  `progress` decimal(5,2) NOT NULL DEFAULT '0.00',
  `registration_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`id`, `user_id`, `type`, `course_id`, `progress`, `registration_time`) VALUES
(2, 15, 1, 1, '0.00', '2017-06-05 10:23:43'),
(3, 3, 1, 9, '0.00', '2017-06-05 10:23:43'),
(4, 4, 1, 2, '0.00', '2017-06-05 10:23:43'),
(5, 5, 1, 4, '0.00', '2017-06-05 10:33:43'),
(6, 7, 1, 10, '0.00', '2017-06-05 10:33:43'),
(7, 3, 1, 7, '0.00', '2017-06-05 10:33:43'),
(8, 8, 1, 8, '0.00', '2017-06-05 10:33:43'),
(9, 9, 1, 5, '0.00', '2017-06-05 10:33:43'),
(10, 10, 1, 5, '0.00', '2017-06-05 10:33:43'),
(11, 11, 1, 6, '0.00', '2017-06-05 10:33:43'),
(14, 3, 1, 3, '0.00', '2017-06-05 10:33:43'),
(15, 13, 1, 11, '0.00', '2017-06-21 00:00:00'),
(16, 13, 1, 12, '0.00', '2017-06-21 00:00:00'),
(17, 10, 1, 13, '0.00', '2017-06-20 00:00:00'),
(18, 10, 1, 14, '0.00', '2017-06-20 00:00:00'),
(19, 11, 1, 11, '0.00', '2017-06-20 00:00:00'),
(20, 55, 1, 15, '25.00', '2017-08-23 15:52:19'),
(21, 55, 1, 16, '0.00', '2017-08-23 18:21:35'),
(27, 58, 0, 5, '0.00', NULL),
(28, 58, 0, 5, '0.00', '2017-09-07 11:54:54'),
(34, 59, 0, 17, '0.00', '2017-09-07 14:23:50'),
(36, 55, 1, 17, '0.00', '2017-09-07 11:41:06'),
(41, 58, 0, 17, '0.00', '2017-09-07 15:28:28'),
(44, 55, 1, 18, '0.00', '2017-09-08 13:00:29'),
(45, 55, 2, 18, '0.00', '2017-09-08 13:05:40'),
(46, 58, 0, 18, '0.00', '2017-09-08 14:24:44'),
(47, 58, 0, 1, '0.00', '2017-09-12 14:28:57'),
(49, 55, 1, 19, '0.00', '2017-09-12 17:34:50'),
(50, 55, 1, 20, '0.00', '2017-09-12 17:47:40'),
(51, 55, 1, 21, '0.00', '2017-09-13 17:18:30'),
(52, 55, 1, 22, '0.00', '2017-09-18 17:57:34'),
(53, 55, 1, 23, '0.00', '2017-09-19 17:23:55'),
(54, 55, 1, 24, '0.00', '2017-09-19 17:25:22'),
(55, 63, 2, 1, '0.00', '2017-09-22 16:08:19'),
(56, 63, 2, 19, '0.00', '2017-10-10 18:01:25'),
(57, 55, 1, 25, '0.00', '2017-10-24 11:02:30'),
(58, 55, 1, 26, '0.00', '2017-10-24 11:03:21'),
(59, 55, 1, 27, '0.00', '2017-10-24 11:08:57'),
(60, 58, 0, 21, '0.00', '2017-10-24 11:28:20'),
(61, 58, 0, 19, '0.00', '2017-10-24 11:29:38'),
(63, 58, 0, 23, '0.00', '2017-10-26 12:27:54'),
(66, 63, 0, 21, '0.00', '2017-10-26 12:30:55'),
(67, 63, 2, 23, '0.00', '2017-10-26 12:32:09'),
(68, 63, 0, 23, '0.00', '2017-10-26 12:33:06'),
(69, 63, 2, 23, '0.00', '2017-10-26 12:35:15'),
(70, 64, 1, 28, '0.00', '2017-10-26 15:33:23'),
(71, 64, 1, 29, '0.00', '2017-10-26 15:33:49'),
(72, 64, 1, 30, '0.00', '2017-10-26 15:34:16'),
(73, 64, 1, 31, '0.00', '2017-10-26 15:35:56'),
(74, 64, 1, 32, '0.00', '2017-10-26 15:36:41'),
(75, 64, 1, 33, '0.00', '2017-10-26 15:38:33'),
(76, 64, 1, 34, '0.00', '2017-10-26 15:41:28'),
(77, 55, 1, 35, '0.00', '2017-10-27 12:09:53'),
(78, 55, 1, 36, '0.00', '2017-10-31 14:29:49'),
(79, 55, 1, 37, '0.00', '2017-10-31 14:43:34'),
(80, 55, 1, 38, '0.00', '2017-10-31 15:13:01'),
(81, 63, 2, 28, '0.00', '2017-11-01 15:29:00'),
(82, 63, 2, 28, '0.00', '2017-11-01 15:29:32'),
(83, 63, 2, 28, '0.00', '2017-11-01 15:32:50'),
(84, 63, 2, 28, '0.00', '2017-11-01 15:38:14'),
(85, 58, 2, 29, '0.00', '2017-11-01 16:32:40'),
(86, 63, 0, 28, '0.00', '2017-11-01 16:46:14'),
(87, 63, 0, 1, '0.00', '2017-11-02 10:40:28'),
(89, 56, 0, 21, '0.00', '2017-11-02 16:49:08'),
(90, 56, 0, 35, '0.00', '2017-11-02 16:53:56'),
(91, 55, 1, 39, '0.00', '2017-11-13 10:56:04'),
(92, 55, 1, 40, '0.00', '2017-11-13 10:56:29'),
(93, 55, 1, 41, '0.00', '2017-11-13 11:02:23'),
(94, 55, 1, 42, '0.00', '2017-11-13 11:07:13'),
(95, 66, 0, 1, '0.00', '2017-11-15 13:16:24'),
(96, 55, 0, 1, '16.67', '2017-11-20 12:41:10'),
(103, 63, 2, 35, '0.00', '2017-11-24 15:53:26'),
(104, 69, 0, 1, '0.00', '2017-12-05 15:54:01'),
(108, 55, 0, 3, '0.00', '2017-12-05 15:59:04'),
(109, 58, 0, 3, '0.00', '2017-12-05 16:02:05'),
(115, 55, 0, 19, '0.00', '2017-12-05 16:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_industries`
--

CREATE TABLE `user_industries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `priority` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_industries`
--

INSERT INTO `user_industries` (`id`, `name`, `priority`) VALUES
(1, 'Aerospace Engineering', 1),
(2, 'Chemicals', 1),
(3, 'Cities, Infrastructure & Industrial Solutions', 1),
(4, 'Clean Energy', 1),
(5, 'Consumer Business/Goods', 1),
(6, 'Content and Media', 1),
(7, 'Electronics', 1),
(8, 'Energy', 1),
(9, 'Environment and Water', 1),
(10, 'Healthcare', 1),
(11, 'Non-Profit', 1),
(12, 'Information Technology', 1),
(13, 'Logistics and Supply Chain Management', 1),
(14, 'Marine and Offshore Engineering', 1),
(15, 'Medical Technology', 1),
(16, 'Pharmaceuticals and Biotechnology', 1),
(17, 'Precision Engineering', 1),
(18, 'Professional Services', 1),
(19, 'Others', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_occupations`
--

CREATE TABLE `user_occupations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `priority` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_occupations`
--

INSERT INTO `user_occupations` (`id`, `name`, `priority`) VALUES
(1, 'Accounting', 1),
(2, 'Administrative', 1),
(3, 'Business Development', 1),
(4, 'Human Resources', 1),
(5, 'Consulting', 1),
(6, 'Finance', 1),
(7, 'Information Technology', 1),
(8, 'Legal', 1),
(9, 'Marketing', 1),
(10, 'Media & Communications', 1),
(11, 'Operations', 1),
(12, 'Purchasing', 1),
(13, 'Quality Assurance', 1),
(14, 'Research', 1),
(15, 'Others', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_reputations`
--

CREATE TABLE `user_reputations` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT 'Expert'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reputations`
--

INSERT INTO `user_reputations` (`id`, `name`) VALUES
(1, 'Beginner'),
(2, 'Advanced'),
(3, 'Expert');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'Tester');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlists`
--

CREATE TABLE `user_wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `wishlist_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wishlists`
--

INSERT INTO `user_wishlists` (`id`, `user_id`, `course_id`, `wishlist_time`) VALUES
(1, 1, 1, '2017-06-06 08:22:21'),
(2, 1, 2, '2017-06-06 08:22:21'),
(4, 1, 13, '2017-06-06 08:22:21'),
(9, 1, 5, '2017-08-16 13:22:29'),
(10, 55, 5, '2017-09-18 18:16:42'),
(11, 55, 1, '2017-09-18 18:16:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_categories`
--
ALTER TABLE `courses_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_levels`
--
ALTER TABLE `course_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_proposals`
--
ALTER TABLE `course_proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_requests`
--
ALTER TABLE `course_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_contents`
--
ALTER TABLE `home_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_settings`
--
ALTER TABLE `home_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_carts`
--
ALTER TABLE `transaction_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_industries`
--
ALTER TABLE `user_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_occupations`
--
ALTER TABLE `user_occupations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reputations`
--
ALTER TABLE `user_reputations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wishlists`
--
ALTER TABLE `user_wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `courses_categories`
--
ALTER TABLE `courses_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `course_levels`
--
ALTER TABLE `course_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_proposals`
--
ALTER TABLE `course_proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `course_requests`
--
ALTER TABLE `course_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `home_contents`
--
ALTER TABLE `home_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `home_settings`
--
ALTER TABLE `home_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaction_carts`
--
ALTER TABLE `transaction_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Start from 10000000001', AUTO_INCREMENT=1000000066;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `user_industries`
--
ALTER TABLE `user_industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_occupations`
--
ALTER TABLE `user_occupations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_reputations`
--
ALTER TABLE `user_reputations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_wishlists`
--
ALTER TABLE `user_wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
