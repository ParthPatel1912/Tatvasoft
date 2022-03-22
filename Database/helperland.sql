-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 12:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helperland`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityId` int(11) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `StateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityId`, `CityName`, `StateId`) VALUES
(1, 'Anjaw', 3),
(2, 'Changlang', 3),
(3, 'Dibang Valley', 3),
(4, 'East Kameng', 3),
(5, 'East Siang', 3),
(6, 'Itanagar', 3),
(7, 'Kurung Kumey', 3),
(8, 'Lohit', 3),
(9, 'Lower Dibang Valley', 3),
(10, 'Lower Subansiri', 3),
(11, 'Papum Pare', 3),
(12, 'Tawang', 3),
(13, 'Tirap', 3),
(14, 'Upper Siang', 3),
(15, 'Upper Subansiri', 3),
(16, 'West Kameng', 3),
(17, 'West Siang', 3),
(18, 'Barpeta', 4),
(19, 'Bongaigaon', 4),
(20, 'Cachar', 4),
(21, 'Darrang', 4),
(22, 'Dhemaji', 4),
(23, 'Dhubri', 4),
(24, 'Dibrugarh', 4),
(25, 'Goalpara', 4),
(26, 'Golaghat', 4),
(27, 'Guwahati', 4),
(28, 'Hailakandi', 4),
(29, 'Jorhat', 4),
(30, 'Kamrup', 4),
(31, 'Karbi Anglong', 4),
(32, 'Karimganj', 4),
(33, 'Kokrajhar', 4),
(34, 'Lakhimpur', 4),
(35, 'Marigaon', 4),
(36, 'Nagaon', 4),
(37, 'Nalbari', 4),
(38, 'North Cachar Hills', 4),
(39, 'Silchar', 4),
(40, 'Sivasagar', 4),
(41, 'Sonitpur', 4),
(42, 'Tinsukia', 4),
(43, 'Udalguri', 4),
(44, 'Araria', 5),
(45, 'Aurangabad', 5),
(46, 'Banka', 5),
(47, 'Begusarai', 5),
(48, 'Bhagalpur', 5),
(49, 'Bhojpur', 5),
(50, 'Buxar', 5),
(51, 'Darbhanga', 5),
(52, 'East Champaran', 5),
(53, 'Gaya', 5),
(54, 'Gopalganj', 5),
(55, 'Jamshedpur', 5),
(56, 'Jamui', 5),
(57, 'Jehanabad', 5),
(58, 'Kaimur (Bhabua)', 5),
(59, 'Katihar', 5),
(60, 'Khagaria', 5),
(61, 'Kishanganj', 5),
(62, 'Lakhisarai', 5),
(63, 'Madhepura', 5),
(64, 'Madhubani', 5),
(65, 'Munger', 5),
(66, 'Muzaffarpur', 5),
(67, 'Nalanda', 5),
(68, 'Nawada', 5),
(69, 'Patna', 5),
(70, 'Purnia', 5),
(71, 'Rohtas', 5),
(72, 'Saharsa', 5),
(73, 'Samastipur', 5),
(74, 'Saran', 5),
(75, 'Sheikhpura', 5),
(76, 'Sheohar', 5),
(77, 'Sitamarhi', 5),
(78, 'Siwan', 5),
(79, 'Supaul', 5),
(80, 'Vaishali', 5),
(81, 'West Champaran', 5),
(82, 'Chandigarh', 6),
(83, 'Mani Marja', 6),
(84, 'Bastar', 7),
(85, 'Bhilai', 7),
(86, 'Bijapur', 7),
(87, 'Bilaspur', 7),
(88, 'Dhamtari', 7),
(89, 'Durg', 7),
(90, 'Janjgir-Champa', 7),
(91, 'Jashpur', 7),
(92, 'Kabirdham-Kawardha', 7),
(93, 'Korba', 7),
(94, 'Korea', 7),
(95, 'Mahasamund', 7),
(96, 'Narayanpur', 7),
(97, 'Norh Bastar-Kanker', 7),
(98, 'Raigarh', 7),
(99, 'Raipur', 7),
(100, 'Rajnandgaon', 7),
(101, 'South Bastar-Dantewada', 7),
(102, 'Surguja', 7),
(103, 'Amal', 8),
(104, 'Amli', 8),
(105, 'Bedpa', 8),
(106, 'Chikhli', 8),
(107, 'Dadra & Nagar Haveli', 8),
(108, 'Dahikhed', 8),
(109, 'Dolara', 8),
(110, 'Galonda', 8),
(111, 'Kanadi', 8),
(112, 'Karchond', 8),
(113, 'Khadoli', 8),
(114, 'Kharadpada', 8),
(115, 'Kherabari', 8),
(116, 'Kherdi', 8),
(117, 'Kothar', 8),
(118, 'Luari', 8),
(119, 'Mashat', 8),
(120, 'Rakholi', 8),
(121, 'Rudana', 8),
(122, 'Saili', 8),
(123, 'Sili', 8),
(124, 'Silvassa', 8),
(125, 'Sindavni', 8),
(126, 'Udva', 8),
(127, 'Umbarkoi', 8),
(128, 'Vansda', 8),
(129, 'Vasona', 8),
(130, 'Velugam', 8),
(131, 'Brancavare', 9),
(132, 'Dagasi', 9),
(133, 'Daman', 9),
(134, 'Diu', 9),
(135, 'Magarvara', 9),
(136, 'Nagwa', 9),
(137, 'Pariali', 9),
(138, 'Passo Covo', 9),
(139, 'Central Delhi', 10),
(140, 'East Delhi', 10),
(141, 'New Delhi', 10),
(142, 'North Delhi', 10),
(143, 'North East Delhi', 10),
(144, 'North West Delhi', 10),
(145, 'Old Delhi', 10),
(146, 'South Delhi', 10),
(147, 'South West Delhi', 10),
(148, 'West Delhi', 10),
(149, 'Canacona', 11),
(150, 'Candolim', 11),
(151, 'Chinchinim', 11),
(152, 'Cortalim', 11),
(153, 'Goa', 11),
(154, 'Jua', 11),
(155, 'Madgaon', 11),
(156, 'Mahem', 11),
(157, 'Mapuca', 11),
(158, 'Marmagao', 11),
(159, 'Panji', 11),
(160, 'Ponda', 11),
(161, 'Sanvordem', 11),
(162, 'Terekhol', 11),
(163, 'Ahmedabad', 12),
(164, 'Amreli', 12),
(165, 'Anand', 12),
(166, 'Banaskantha', 12),
(167, 'Baroda', 12),
(168, 'Bharuch', 12),
(169, 'Bhavnagar', 12),
(170, 'Dahod', 12),
(171, 'Dang', 12),
(172, 'Dwarka', 12),
(173, 'Gandhinagar', 12),
(174, 'Jamnagar', 12),
(175, 'Junagadh', 12),
(176, 'Kheda', 12),
(177, 'Kutch', 12),
(178, 'Mehsana', 12),
(179, 'Nadiad', 12),
(180, 'Narmada', 12),
(181, 'Navsari', 12),
(182, 'Panchmahals', 12),
(183, 'Patan', 12),
(184, 'Porbandar', 12),
(185, 'Rajkot', 12),
(186, 'Sabarkantha', 12),
(187, 'Surat', 12),
(188, 'Surendranagar', 12),
(189, 'Vadodara', 12),
(190, 'Valsad', 12),
(191, 'Vapi', 12),
(192, 'Ambala', 13),
(193, 'Bhiwani', 13),
(194, 'Faridabad', 13),
(195, 'Fatehabad', 13),
(196, 'Gurgaon', 13),
(197, 'Hisar', 13),
(198, 'Jhajjar', 13),
(199, 'Jind', 13),
(200, 'Kaithal', 13),
(201, 'Karnal', 13),
(202, 'Kurukshetra', 13),
(203, 'Mahendragarh', 13),
(204, 'Mewat', 13),
(205, 'Panchkula', 13),
(206, 'Panipat', 13),
(207, 'Rewari', 13),
(208, 'Rohtak', 13),
(209, 'Sirsa', 13),
(210, 'Sonipat', 13),
(211, 'Yamunanagar', 13),
(212, 'Bilaspur', 14),
(213, 'Chamba', 14),
(214, 'Dalhousie', 14),
(215, 'Hamirpur', 14),
(216, 'Kangra', 14),
(217, 'Kinnaur', 14),
(218, 'Kullu', 14),
(219, 'Lahaul & Spiti', 14),
(220, 'Mandi', 14),
(221, 'Shimla', 14),
(222, 'Sirmaur', 14),
(223, 'Solan', 14),
(224, 'Una', 14),
(225, 'Anantnag', 15),
(226, 'Baramulla', 15),
(227, 'Budgam', 15),
(228, 'Doda', 15),
(229, 'Jammu', 15),
(230, 'Kargil', 15),
(231, 'Kathua', 15),
(232, 'Kupwara', 15),
(233, 'Leh', 15),
(234, 'Poonch', 15),
(235, 'Pulwama', 15),
(236, 'Rajauri', 15),
(237, 'Srinagar', 15),
(238, 'Udhampur', 15),
(239, 'Bokaro', 16),
(240, 'Chatra', 16),
(241, 'Deoghar', 16),
(242, 'Dhanbad', 16),
(243, 'Dumka', 16),
(244, 'East Singhbhum', 16),
(245, 'Garhwa', 16),
(246, 'Giridih', 16),
(247, 'Godda', 16),
(248, 'Gumla', 16),
(249, 'Hazaribag', 16),
(250, 'Jamtara', 16),
(251, 'Koderma', 16),
(252, 'Latehar', 16),
(253, 'Lohardaga', 16),
(254, 'Pakur', 16),
(255, 'Palamu', 16),
(256, 'Ranchi', 16),
(257, 'Sahibganj', 16),
(258, 'Seraikela', 16),
(259, 'Simdega', 16),
(260, 'West Singhbhum', 16),
(261, 'Bagalkot', 17),
(262, 'Bangalore', 17),
(263, 'Bangalore Rural', 17),
(264, 'Belgaum', 17),
(265, 'Bellary', 17),
(266, 'Bhatkal', 17),
(267, 'Bidar', 17),
(268, 'Bijapur', 17),
(269, 'Chamrajnagar', 17),
(270, 'Chickmagalur', 17),
(271, 'Chikballapur', 17),
(272, 'Chitradurga', 17),
(273, 'Dakshina Kannada', 17),
(274, 'Davanagere', 17),
(275, 'Dharwad', 17),
(276, 'Gadag', 17),
(277, 'Gulbarga', 17),
(278, 'Hampi', 17),
(279, 'Hassan', 17),
(280, 'Haveri', 17),
(281, 'Hospet', 17),
(282, 'Karwar', 17),
(283, 'Kodagu', 17),
(284, 'Kolar', 17),
(285, 'Koppal', 17),
(286, 'Madikeri', 17),
(287, 'Mandya', 17),
(288, 'Mangalore', 17),
(289, 'Manipal', 17),
(290, 'Mysore', 17),
(291, 'Raichur', 17),
(292, 'Shimoga', 17),
(293, 'Sirsi', 17),
(294, 'Sringeri', 17),
(295, 'Srirangapatna', 17),
(296, 'Tumkur', 17),
(297, 'Udupi', 17),
(298, 'Uttara Kannada', 17),
(299, 'Alappuzha', 18),
(300, 'Alleppey', 18),
(301, 'Alwaye', 18),
(302, 'Ernakulam', 18),
(303, 'Idukki', 18),
(304, 'Kannur', 18),
(305, 'Kasargod', 18),
(306, 'Kochi', 18),
(307, 'Kollam', 18),
(308, 'Kottayam', 18),
(309, 'Kovalam', 18),
(310, 'Kozhikode', 18),
(311, 'Malappuram', 18),
(312, 'Palakkad', 18),
(313, 'Pathanamthitta', 18),
(314, 'Perumbavoor', 18),
(315, 'Thiruvananthapuram', 18),
(316, 'Thrissur', 18),
(317, 'Trichur', 18),
(318, 'Trivandrum', 18),
(319, 'Wayanad', 18),
(320, 'Agatti Island', 19),
(321, 'Bingaram Island', 19),
(322, 'Bitra Island', 19),
(323, 'Chetlat Island', 19),
(324, 'Kadmat Island', 19),
(325, 'Kalpeni Island', 19),
(326, 'Kavaratti Island', 19),
(327, 'Kiltan Island', 19),
(328, 'Lakshadweep Sea', 19),
(329, 'Minicoy Island', 19),
(330, 'North Island', 19),
(331, 'South Island', 19),
(332, 'Anuppur', 20),
(333, 'Ashoknagar', 20),
(334, 'Balaghat', 20),
(335, 'Barwani', 20),
(336, 'Betul', 20),
(337, 'Bhind', 20),
(338, 'Bhopal', 20),
(339, 'Burhanpur', 20),
(340, 'Chhatarpur', 20),
(341, 'Chhindwara', 20),
(342, 'Damoh', 20),
(343, 'Datia', 20),
(344, 'Dewas', 20),
(345, 'Dhar', 20),
(346, 'Dindori', 20),
(347, 'Guna', 20),
(348, 'Gwalior', 20),
(349, 'Harda', 20),
(350, 'Hoshangabad', 20),
(351, 'Indore', 20),
(352, 'Jabalpur', 20),
(353, 'Jagdalpur', 20),
(354, 'Jhabua', 20),
(355, 'Katni', 20),
(356, 'Khandwa', 20),
(357, 'Khargone', 20),
(358, 'Mandla', 20),
(359, 'Mandsaur', 20),
(360, 'Morena', 20),
(361, 'Narsinghpur', 20),
(362, 'Neemuch', 20),
(363, 'Panna', 20),
(364, 'Raisen', 20),
(365, 'Rajgarh', 20),
(366, 'Ratlam', 20),
(367, 'Rewa', 20),
(368, 'Sagar', 20),
(369, 'Satna', 20),
(370, 'Sehore', 20),
(371, 'Seoni', 20),
(372, 'Shahdol', 20),
(373, 'Shajapur', 20),
(374, 'Sheopur', 20),
(375, 'Shivpuri', 20),
(376, 'Sidhi', 20),
(377, 'Tikamgarh', 20),
(378, 'Ujjain', 20),
(379, 'Umaria', 20),
(380, 'Vidisha', 20),
(381, 'Ahmednagar', 21),
(382, 'Akola', 21),
(383, 'Amravati', 21),
(384, 'Aurangabad', 21),
(385, 'Beed', 21),
(386, 'Bhandara', 21),
(387, 'Buldhana', 21),
(388, 'Chandrapur', 21),
(389, 'Dhule', 21),
(390, 'Gadchiroli', 21),
(391, 'Gondia', 21),
(392, 'Hingoli', 21),
(393, 'Jalgaon', 21),
(394, 'Jalna', 21),
(395, 'Kolhapur', 21),
(396, 'Latur', 21),
(397, 'Mahabaleshwar', 21),
(398, 'Mumbai', 21),
(399, 'Mumbai City', 21),
(400, 'Mumbai Suburban', 21),
(401, 'Nagpur', 21),
(402, 'Nanded', 21),
(403, 'Nandurbar', 21),
(404, 'Nashik', 21),
(405, 'Osmanabad', 21),
(406, 'Parbhani', 21),
(407, 'Pune', 21),
(408, 'Raigad', 21),
(409, 'Ratnagiri', 21),
(410, 'Sangli', 21),
(411, 'Satara', 21),
(412, 'Sholapur', 21),
(413, 'Sindhudurg', 21),
(414, 'Thane', 21),
(415, 'Wardha', 21),
(416, 'Washim', 21),
(417, 'Yavatmal', 21),
(418, 'Bishnupur', 22),
(419, 'Chandel', 22),
(420, 'Churachandpur', 22),
(421, 'Imphal East', 22),
(422, 'Imphal West', 22),
(423, 'Senapati', 22),
(424, 'Tamenglong', 22),
(425, 'Thoubal', 22),
(426, 'Ukhrul', 22),
(427, 'East Garo Hills', 23),
(428, 'East Khasi Hills', 23),
(429, 'Jaintia Hills', 23),
(430, 'Ri Bhoi', 23),
(431, 'Shillong', 23),
(432, 'South Garo Hills', 23),
(433, 'West Garo Hills', 23),
(434, 'West Khasi Hills', 23),
(435, 'Aizawl', 24),
(436, 'Champhai', 24),
(437, 'Kolasib', 24),
(438, 'Lawngtlai', 24),
(439, 'Lunglei', 24),
(440, 'Mamit', 24),
(441, 'Saiha', 24),
(442, 'Serchhip', 24),
(443, 'Dimapur', 25),
(444, 'Kohima', 25),
(445, 'Mokokchung', 25),
(446, 'Mon', 25),
(447, 'Phek', 25),
(448, 'Tuensang', 25),
(449, 'Wokha', 25),
(450, 'Zunheboto', 25),
(451, 'Angul', 26),
(452, 'Balangir', 26),
(453, 'Balasore', 26),
(454, 'Baleswar', 26),
(455, 'Bargarh', 26),
(456, 'Berhampur', 26),
(457, 'Bhadrak', 26),
(458, 'Bhubaneswar', 26),
(459, 'Boudh', 26),
(460, 'Cuttack', 26),
(461, 'Deogarh', 26),
(462, 'Dhenkanal', 26),
(463, 'Gajapati', 26),
(464, 'Ganjam', 26),
(465, 'Jagatsinghapur', 26),
(466, 'Jajpur', 26),
(467, 'Jharsuguda', 26),
(468, 'Kalahandi', 26),
(469, 'Kandhamal', 26),
(470, 'Kendrapara', 26),
(471, 'Kendujhar', 26),
(472, 'Khordha', 26),
(473, 'Koraput', 26),
(474, 'Malkangiri', 26),
(475, 'Mayurbhanj', 26),
(476, 'Nabarangapur', 26),
(477, 'Nayagarh', 26),
(478, 'Nuapada', 26),
(479, 'Puri', 26),
(480, 'Rayagada', 26),
(481, 'Rourkela', 26),
(482, 'Sambalpur', 26),
(483, 'Subarnapur', 26),
(484, 'Sundergarh', 26),
(485, 'Bahur', 27),
(486, 'Karaikal', 27),
(487, 'Mahe', 27),
(488, 'Pondicherry', 27),
(489, 'Purnankuppam', 27),
(490, 'Valudavur', 27),
(491, 'Villianur', 27),
(492, 'Yanam', 27),
(493, 'Amritsar', 28),
(494, 'Barnala', 28),
(495, 'Bathinda', 28),
(496, 'Faridkot', 28),
(497, 'Fatehgarh Sahib', 28),
(498, 'Ferozepur', 28),
(499, 'Gurdaspur', 28),
(500, 'Hoshiarpur', 28),
(501, 'Jalandhar', 28),
(502, 'Kapurthala', 28),
(503, 'Ludhiana', 28),
(504, 'Mansa', 28),
(505, 'Moga', 28),
(506, 'Muktsar', 28),
(507, 'Nawanshahr', 28),
(508, 'Pathankot', 28),
(509, 'Patiala', 28),
(510, 'Rupnagar', 28),
(511, 'Sangrur', 28),
(512, 'SAS Nagar', 28),
(513, 'Tarn Taran', 28),
(514, 'Ajmer', 29),
(515, 'Alwar', 29),
(516, 'Banswara', 29),
(517, 'Baran', 29),
(518, 'Barmer', 29),
(519, 'Bharatpur', 29),
(520, 'Bhilwara', 29),
(521, 'Bikaner', 29),
(522, 'Bundi', 29),
(523, 'Chittorgarh', 29),
(524, 'Churu', 29),
(525, 'Dausa', 29),
(526, 'Dholpur', 29),
(527, 'Dungarpur', 29),
(528, 'Hanumangarh', 29),
(529, 'Jaipur', 29),
(530, 'Jaisalmer', 29),
(531, 'Jalore', 29),
(532, 'Jhalawar', 29),
(533, 'Jhunjhunu', 29),
(534, 'Jodhpur', 29),
(535, 'Karauli', 29),
(536, 'Kota', 29),
(537, 'Nagaur', 29),
(538, 'Pali', 29),
(539, 'Pilani', 29),
(540, 'Rajsamand', 29),
(541, 'Sawai Madhopur', 29),
(542, 'Sikar', 29),
(543, 'Sirohi', 29),
(544, 'Sri Ganganagar', 29),
(545, 'Tonk', 29),
(546, 'Udaipur', 29),
(547, 'Barmiak', 30),
(548, 'Be', 30),
(549, 'Bhurtuk', 30),
(550, 'Chhubakha', 30),
(551, 'Chidam', 30),
(552, 'Chubha', 30),
(553, 'Chumikteng', 30),
(554, 'Dentam', 30),
(555, 'Dikchu', 30),
(556, 'Dzongri', 30),
(557, 'Gangtok', 30),
(558, 'Gauzing', 30),
(559, 'Gyalshing', 30),
(560, 'Hema', 30),
(561, 'Kerung', 30),
(562, 'Lachen', 30),
(563, 'Lachung', 30),
(564, 'Lema', 30),
(565, 'Lingtam', 30),
(566, 'Lungthu', 30),
(567, 'Mangan', 30),
(568, 'Namchi', 30),
(569, 'Namthang', 30),
(570, 'Nanga', 30),
(571, 'Nantang', 30),
(572, 'Naya Bazar', 30),
(573, 'Padamachen', 30),
(574, 'Pakhyong', 30),
(575, 'Pemayangtse', 30),
(576, 'Phensang', 30),
(577, 'Rangli', 30),
(578, 'Rinchingpong', 30),
(579, 'Sakyong', 30),
(580, 'Samdong', 30),
(581, 'Singtam', 30),
(582, 'Siniolchu', 30),
(583, 'Sombari', 30),
(584, 'Soreng', 30),
(585, 'Sosing', 30),
(586, 'Tekhug', 30),
(587, 'Temi', 30),
(588, 'Tsetang', 30),
(589, 'Tsomgo', 30),
(590, 'Tumlong', 30),
(591, 'Yangang', 30),
(592, 'Yumtang', 30),
(593, 'Chennai', 31),
(594, 'Chidambaram', 31),
(595, 'Chingleput', 31),
(596, 'Coimbatore', 31),
(597, 'Courtallam', 31),
(598, 'Cuddalore', 31),
(599, 'Dharmapuri', 31),
(600, 'Dindigul', 31),
(601, 'Erode', 31),
(602, 'Hosur', 31),
(603, 'Kanchipuram', 31),
(604, 'Kanyakumari', 31),
(605, 'Karaikudi', 31),
(606, 'Karur', 31),
(607, 'Kodaikanal', 31),
(608, 'Kovilpatti', 31),
(609, 'Krishnagiri', 31),
(610, 'Kumbakonam', 31),
(611, 'Madurai', 31),
(612, 'Mayiladuthurai', 31),
(613, 'Nagapattinam', 31),
(614, 'Nagarcoil', 31),
(615, 'Namakkal', 31),
(616, 'Neyveli', 31),
(617, 'Nilgiris', 31),
(618, 'Ooty', 31),
(619, 'Palani', 31),
(620, 'Perambalur', 31),
(621, 'Pollachi', 31),
(622, 'Pudukkottai', 31),
(623, 'Rajapalayam', 31),
(624, 'Ramanathapuram', 31),
(625, 'Salem', 31),
(626, 'Sivaganga', 31),
(627, 'Sivakasi', 31),
(628, 'Thanjavur', 31),
(629, 'Theni', 31),
(630, 'Thoothukudi', 31),
(631, 'Tiruchirappalli', 31),
(632, 'Tirunelveli', 31),
(633, 'Tirupur', 31),
(634, 'Tiruvallur', 31),
(635, 'Tiruvannamalai', 31),
(636, 'Tiruvarur', 31),
(637, 'Trichy', 31),
(638, 'Tuticorin', 31),
(639, 'Vellore', 31),
(640, 'Villupuram', 31),
(641, 'Virudhunagar', 31),
(642, 'Yercaud', 31),
(643, 'Agartala', 32),
(644, 'Ambasa', 32),
(645, 'Bampurbari', 32),
(646, 'Belonia', 32),
(647, 'Dhalai', 32),
(648, 'Dharam Nagar', 32),
(649, 'Kailashahar', 32),
(650, 'Kamal Krishnabari', 32),
(651, 'Khopaiyapara', 32),
(652, 'Khowai', 32),
(653, 'Phuldungsei', 32),
(654, 'Radha Kishore Pur', 32),
(655, 'Tripura', 32);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ContactUsId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Subject` varchar(500) DEFAULT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Message` longtext NOT NULL,
  `UploadFileName` varchar(100) DEFAULT NULL,
  `CreatedOn` datetime(3) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`ContactUsId`, `Name`, `Email`, `Subject`, `PhoneNumber`, `Message`, `UploadFileName`, `CreatedOn`, `CreatedBy`) VALUES
(1, 'Parth', 'parth@gmail.com', 'subject', '9998800099', 'ok', NULL, '0000-00-00 00:00:00.000', NULL),
(2, 'ok', 'ok@k.l', '', '987889000', 'ok', NULL, '2022-01-28 13:47:19.000', NULL),
(3, 'patel', 'patel11@gmail.com', 'subject', '9990088877', 'patel', NULL, '2022-01-28 14:01:18.000', NULL),
(4, 'new', 'new@g.c', 'subject', '9989989989', 'new', NULL, '2022-01-28 14:19:32.000', NULL),
(7, 'PKL new', 'pkl1@gmail.com', 'subject', '8887766655', 'pkl', NULL, '2022-01-28 14:34:05.000', NULL),
(8, 'o o', 'o@p.o', 'subject', 'o', 'o', NULL, '2022-01-29 10:28:18.000', NULL),
(9, 'o o', 'ol@gma.com', 'subject', 'o', 'o', NULL, '2022-01-29 10:38:26.000', NULL),
(10, 'o o', 'ol@gma.com', 'subject', 'o', 'o', NULL, '2022-01-29 10:38:26.000', NULL),
(11, 'io i', '9@k.l', 'subject', 'ij', 'o', NULL, '2022-01-29 15:05:24.000', NULL),
(12, '11 ', '', 'subject', '', '', NULL, '2022-01-29 18:02:43.000', NULL),
(13, '11 ', '', 'subject', '', '', NULL, '2022-01-29 18:02:48.000', NULL),
(14, 'alert alert', 'alert@h.l', 'subject', '9998877755', 'alert', NULL, '2022-01-29 18:33:28.000', NULL),
(16, ' ', '', 'subject', '', '', NULL, '2022-01-29 18:50:32.000', NULL),
(17, 'h h', 'h@gmial.com', 'subject', '6666666666', 'h', NULL, '2022-01-30 14:21:48.000', NULL),
(18, 'tt tt', 'tt@jj.ll', 'subject', '5555555555', 'yy', NULL, '2022-01-30 14:31:13.000', NULL),
(19, 'hh hh', 'hh@fg.lk', 'subject', '7777777777', 'uu', NULL, '2022-01-30 14:32:12.000', NULL),
(20, 'ui ui', 'ui@ui.ui', 'subject', '8888888888', 'ui', NULL, '2022-01-31 08:13:04.000', NULL),
(21, 'ff ff', 'ff@uu.ll', 'subject', '5555555555', 'ff', NULL, '2022-01-31 11:49:33.000', NULL),
(22, 'now now', 'now@now.com', 'subject', '7777777777', 'now', NULL, '2022-02-01 14:14:10.000', NULL),
(23, 'new new', 'new@gmail.com', 'subject', '9998844455', 'new', NULL, '2022-02-01 23:11:58.000', NULL),
(24, 'alert alert', 'alert@gmail.com', 'subject', '7777777777', 'alert', NULL, '2022-02-01 23:52:09.000', NULL),
(25, 'i i', 'i@ii.ii', 'subject', '7777777777', 'i', NULL, '2022-02-02 00:32:49.000', NULL),
(26, 'a a', 'a@aa.aa', 'subject', '1111111111', 'a', NULL, '2022-02-02 00:41:19.000', NULL),
(28, 't t', 't@tt.tt', 'subject', '6666666666', 't', NULL, '2022-02-02 00:47:56.000', NULL),
(29, 'p p', 'p@pp.pp', 'subject', '0000000000', 'p', NULL, '2022-02-02 00:53:52.000', NULL),
(30, 'abc abc', 'abc@gmail.com', 'subject', '1231231231', 'abc', NULL, '2022-02-02 00:55:46.000', NULL),
(31, 'ab ab', 'avb@qq.oo', 'subject', '1212121212', 'ab', NULL, '2022-02-02 00:59:38.000', NULL),
(32, 'a a', 'a@aa.aa', 'subject', '1111111111', 'aa', NULL, '2022-02-02 01:09:15.000', NULL),
(33, 'pl pl', 'pl@uop.lol', 'subject', '9900990099', 'pl', NULL, '2022-02-02 01:10:28.000', NULL),
(34, 'pl pl', 'pl@pl.pl', 'subject', '9900990099', 'pl', NULL, '2022-02-02 01:12:26.000', NULL),
(35, 'pl pl', 'pl@pl.pl', 'subject', '9900990099', 'pl', NULL, '2022-02-02 01:14:07.000', NULL),
(36, 'io io', 'io@io.io', 'subject', '8888888888', 'io', NULL, '2022-02-02 01:17:21.000', NULL),
(37, 'io io', 'io@io.io', 'subject', '8888888888', 'io', NULL, '2022-02-02 01:18:16.000', NULL),
(38, 'io io', 'io@io.io', 'subject', '8888888888', 'io', NULL, '2022-02-02 01:18:17.000', NULL),
(39, 'io io', 'io@io.io', 'subject', '8888888888', 'io', NULL, '2022-02-02 01:18:23.000', NULL),
(40, 'io io', 'io@io.io', 'subject', '8888888888', 'io', NULL, '2022-02-02 01:18:38.000', NULL),
(41, 'kkkkk kkkkkk', 'kkkk@kk.kk', 'subject', '8888888888', 'kkkkk', NULL, '2022-02-02 01:21:41.000', NULL),
(42, 'kk kk', 'kk@kk.kk', 'subject', '8888888888', 'kk', NULL, '2022-02-02 01:24:27.000', NULL),
(43, 'ok done ok done', 'ok@ok.done', 'subject', '7777777777', 'ok done', NULL, '2022-02-02 01:30:26.000', NULL),
(44, 'hello yes', 'hello@yes.com', 'subject', '6666666666', 'hello yes', NULL, '2022-02-02 12:24:55.000', NULL),
(45, 'po po', 'po@po.po', 'subject', '9090909090', 'po po', NULL, '2022-02-02 12:59:21.000', NULL),
(46, 'f f', 'f@ff.ff', 'subject', '7777777777', 'ff', NULL, '2022-02-02 13:02:27.000', NULL),
(47, 'fi fi', 'fi@hg.ll', 'subject', '7777777777', 'fi', NULL, '2022-02-02 13:06:18.000', NULL),
(48, 'do do', 'do@do.do', 'subject', '9090909090', 'do', NULL, '2022-02-02 14:01:56.000', NULL),
(49, 't t', 't@tt.tt', 'subject', '6666666666', 't', NULL, '2022-02-02 18:27:13.000', NULL),
(50, 't t', 't@tt.tt', 'subject', '6666666666', 't', NULL, '2022-02-02 18:45:20.000', NULL),
(51, 't t', 't@tt.tt', 'subject', '6666666666', 't', NULL, '2022-02-02 18:45:32.000', NULL),
(52, 'x x', 'x@xx.xx', 'subject', '5555555555', 'x', NULL, '2022-02-02 18:49:32.000', NULL),
(53, 'ff ff', 'ff@ff.ff', 'subject', '6666666666', 'ff', NULL, '2022-02-02 18:50:27.000', NULL),
(54, 'h h', 'h@hh.hh', 'subject', '7777777777', 'hh', NULL, '2022-02-02 18:53:06.000', NULL),
(55, 'h h', 'h@hh.hh', 'subject', '7777777777', 'hh', NULL, '2022-02-02 18:53:45.000', NULL),
(56, 'i i', 'i@ii.ii', 'subject', '9999999999', 'u', NULL, '2022-02-02 19:02:33.000', NULL),
(57, 'ok ok', 'ok@pl.lp', 'subject', '9090909090', 'ok', NULL, '2022-03-04 12:39:46.000', NULL),
(58, 'KLJ opp', 'olol@gmail.com', 'subject', '8956366455', 'ikkh', NULL, '2022-03-07 11:58:47.000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favoriteandblocked`
--

CREATE TABLE `favoriteandblocked` (
  `FavouriteBlockId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `TargetUserId` int(11) NOT NULL,
  `IsFavorite` tinyint(4) NOT NULL,
  `IsBlocked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favoriteandblocked`
--

INSERT INTO `favoriteandblocked` (`FavouriteBlockId`, `UserId`, `TargetUserId`, `IsFavorite`, `IsBlocked`) VALUES
(1, 2, 5, 1, 0),
(5, 2, 3, 1, 0),
(9, 3, 2, 0, 1),
(10, 5, 2, 0, 0),
(11, 3, 6, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingId` int(11) NOT NULL,
  `ServiceRequestId` int(11) NOT NULL,
  `RatingFrom` int(11) NOT NULL,
  `RatingTo` int(11) NOT NULL,
  `Ratings` decimal(2,1) NOT NULL,
  `Comments` varchar(2000) DEFAULT NULL,
  `RatingDate` datetime(3) NOT NULL,
  `OnTimeArrival` decimal(2,1) NOT NULL DEFAULT 0.0,
  `Friendly` decimal(2,1) NOT NULL DEFAULT 0.0,
  `QualityOfService` decimal(2,1) NOT NULL DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingId`, `ServiceRequestId`, `RatingFrom`, `RatingTo`, `Ratings`, `Comments`, `RatingDate`, `OnTimeArrival`, `Friendly`, `QualityOfService`) VALUES
(1, 41, 2, 3, '3.7', 'Very nice', '2022-03-02 16:59:54.000', '4.0', '2.0', '5.0'),
(3, 45, 2, 3, '3.0', '', '2022-03-08 17:20:02.000', '3.0', '4.0', '2.0'),
(4, 48, 2, 3, '3.0', 'Not like this', '2022-03-08 18:11:08.000', '3.0', '5.0', '1.0'),
(5, 54, 2, 5, '2.3', '', '2022-03-10 12:24:18.000', '2.0', '2.0', '3.0'),
(6, 53, 2, 3, '5.0', '', '2022-03-11 18:27:36.000', '5.0', '5.0', '5.0'),
(7, 50, 2, 3, '2.0', '', '2022-03-14 18:26:52.000', '2.0', '1.0', '3.0'),
(8, 51, 2, 3, '2.0', 'jnhdgf', '2022-03-22 14:55:12.000', '2.0', '3.0', '1.0'),
(9, 57, 2, 3, '5.0', 'jnhdgf', '2022-03-22 14:55:33.000', '5.0', '5.0', '5.0');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `ServiceRequestId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ServiceId` int(11) NOT NULL,
  `ServiceStartDate` varchar(20) NOT NULL,
  `SelectTime` varchar(11) NOT NULL,
  `TotalHour` varchar(11) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `ServiceHourlyRate` varchar(10) DEFAULT NULL,
  `ServiceHours` double NOT NULL,
  `ExtraHours` double DEFAULT NULL,
  `SubTotal` decimal(8,2) NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL,
  `TotalCost` decimal(8,2) NOT NULL,
  `Comments` varchar(500) DEFAULT NULL,
  `PaymentTransactionRefNo` varchar(50) DEFAULT NULL,
  `PaymentDue` tinyint(4) NOT NULL DEFAULT 0,
  `ServiceProviderId` int(11) DEFAULT 0,
  `FavouriteServiceProviderId` varchar(100) DEFAULT NULL,
  `ExtraServicesCount` int(11) NOT NULL,
  `SPAcceptedDate` datetime(3) DEFAULT NULL,
  `HasPets` tinyint(4) NOT NULL DEFAULT 0,
  `Status` varchar(11) DEFAULT NULL,
  `CreatedDate` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `ModifiedDate` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `ModifiedBy` int(11) DEFAULT NULL,
  `RefundedAmount` decimal(8,2) DEFAULT NULL,
  `Distance` decimal(18,2) NOT NULL DEFAULT 0.00,
  `HasIssue` varchar(100) DEFAULT NULL,
  `PaymentDone` tinyint(4) DEFAULT NULL,
  `RecordVersion` char(36) DEFAULT NULL,
  `Bed` varchar(10) NOT NULL,
  `Bath` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`ServiceRequestId`, `UserId`, `ServiceId`, `ServiceStartDate`, `SelectTime`, `TotalHour`, `ZipCode`, `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `SubTotal`, `Discount`, `TotalCost`, `Comments`, `PaymentTransactionRefNo`, `PaymentDue`, `ServiceProviderId`, `FavouriteServiceProviderId`, `ExtraServicesCount`, `SPAcceptedDate`, `HasPets`, `Status`, `CreatedDate`, `ModifiedDate`, `ModifiedBy`, `RefundedAmount`, `Distance`, `HasIssue`, `PaymentDone`, `RecordVersion`, `Bed`, `Bath`) VALUES
(41, 6, 0, '08-03-2022', '12:00', '4', '360001', '€19', 3, 1, '76.00', '0.00', '76.00', '', 'Payment222222', 0, 5, NULL, 2, NULL, 0, 'Completed', '2022-02-25 19:38:15.000', '2022-02-28 20:26:06.000', 2, '0.00', '0.00', '', 1, '10', 'bed 1', 'bath 1'),
(43, 2, 0, '08-03-2022', '12:00', '4.5', '360006', '€19', 3, 1.5, '85.50', '0.00', '85.50', 'pkl', 'Payment786868', 0, 0, NULL, 3, NULL, 0, 'Cancelled', '2022-02-25 20:06:05.000', '2022-02-28 21:52:59.000', 2, '0.00', '0.00', '', 1, '4', 'bed 1', 'bath 1'),
(45, 2, 0, '08-03-2022', '12:00', '3', '360002', '€19', 3, 0, '57.00', '0.00', '57.00', 'new', 'Payment878787', 0, 3, NULL, 0, NULL, 0, 'Cancelled', '2022-02-27 00:19:23.000', '2022-03-08 17:07:01.000', 3, '0.00', '0.00', '', 1, '14', 'bed 1', 'bath 1'),
(46, 2, 0, '08-03-2022', '13:30', '3.5', '360002', '€19', 3, 0.5, '66.50', '0.00', '66.50', '', 'Payment556655', 0, 3, NULL, 1, NULL, 0, 'Cancelled', '2022-03-01 11:58:38.000', '2022-03-22 14:53:30.000', 2, '0.00', '0.00', 'not like it', 1, '10', 'bed 1', 'bath 1'),
(47, 2, 0, '08-03-2022', '12:00', '3.5', '360002', '€19', 3, 0.5, '66.50', '0.00', '66.50', 'dffd', 'Payment453343', 0, 3, NULL, 1, NULL, 0, 'Cancelled', '2022-03-01 13:17:02.000', '2022-03-10 14:57:56.000', 3, '0.00', '0.00', '', 1, '4', 'bed 1', 'bath 1'),
(48, 2, 0, '08-03-2022', '12:00', '4', '380001', '€19', 3, 1, '76.00', '0.00', '76.00', 'cd', 'Payment545566', 0, 3, '3', 2, NULL, 0, 'Cancelled', '2022-03-01 13:18:09.000', '2022-03-08 17:01:02.000', 3, '0.00', '0.00', '', 1, '6', 'bed 1', 'bath 1'),
(49, 2, 0, '08-03-2022', '12:00', '3', '380005', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment641561', 0, 0, '3', 0, NULL, 0, 'Cancelled', '2022-03-01 13:30:33.000', '2022-03-01 14:20:39.000', 2, '0.00', '0.00', '', 1, '6', 'bed 1', 'bath 1'),
(50, 2, 0, '08-03-2022', '12:30', '3', '380009', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment541646', 0, 3, '3,5', 0, NULL, 0, 'Reschedule', '2022-03-01 13:33:02.000', '2022-03-22 16:04:19.000', 2, '50.00', '0.00', '', 1, '9', 'bed 1', 'bath 1'),
(51, 2, 0, '08-03-2022', '12:00', '3', '360006', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment897897', 0, 3, '', 0, NULL, 0, 'Refunded', '2022-03-01 14:22:52.000', '2022-03-10 20:50:31.000', 3, '10.00', '0.00', '', 1, '7', 'bed 1', 'bath 1'),
(52, 2, 0, '08-03-2022', '12:00', '3.5', '360003', '€19', 3, 0.5, '66.50', '0.00', '66.50', '', 'Payment656565', 0, 0, '', 1, NULL, 1, 'Pending', '2022-03-01 14:29:53.000', '2022-03-11 17:09:41.000', 2, '0.00', '0.00', '', 1, '26', 'bed 1', 'bath 1'),
(53, 2, 0, '08-03-2022', '12:00', '4.5', '400000', '€19', 3, 1.5, '85.50', '0.00', '85.50', 'new', 'Payment165165', 0, 3, '3,5', 3, NULL, 1, 'Refunded', '2022-03-03 12:23:39.000', '2022-03-10 17:30:21.000', 3, '8.55', '0.00', '', 1, '5', 'bed 1', 'bath 1'),
(54, 2, 0, '08-03-2022', '12:00', '4.5', '400000', '€19', 3, 1.5, '85.50', '0.00', '85.50', 'yy', 'Payment444444', 0, 0, '5', 3, NULL, 1, 'Pending', '2022-03-03 12:30:01.000', '2022-03-09 18:54:30.000', 5, '0.00', '0.00', '', 1, '3', 'bed 1', 'bath 1'),
(55, 2, 0, '08-03-2022', '8:30', '4', '400000', '€19', 3, 1, '76.00', '0.00', '76.00', '', 'Payment556585', 0, 3, '', 2, NULL, 0, 'Approved', '2022-03-03 12:31:10.000', '2022-03-12 12:18:47.000', 3, '0.00', '0.00', '', 1, '6', 'bed 1', 'bath 1'),
(56, 2, 0, '17-03-2022', '8:30', '5.5', '360001', '€19', 3, 2.5, '104.50', '0.00', '104.50', 'uubcfnhnfg', 'Payment756756', 0, 3, '', 5, NULL, 1, 'Cancelled', '2022-03-07 12:14:13.000', '2022-03-17 17:59:02.000', 1, '0.00', '0.00', '', 1, '3', 'bed 2', 'bath 1'),
(57, 2, 0, '08-03-2022', '12:00', '3', '380001', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment355656', 0, 3, '', 0, NULL, 0, 'Refunded', '2022-03-07 19:12:48.000', '2022-03-09 14:18:39.000', 3, '26.94', '0.00', 'new', 1, '3', 'bed 1', 'bath 1'),
(58, 2, 0, '23-03-2022', '9:30', '4', '380005', '€19', 3, 1, '76.00', '0.00', '76.00', 'no', 'Payment464646', 0, 0, '', 2, NULL, 1, 'Pending', '2022-03-22 12:23:45.000', '2022-03-22 12:23:45.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(59, 2, 0, '23-03-2022', '8:00', '3', '400000', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment135132', 0, 3, '', 0, NULL, 0, 'Approved', '2022-03-22 12:28:08.000', '2022-03-22 14:58:57.000', 3, '0.00', '0.00', NULL, 1, '2', 'bed 1', 'bath 1'),
(60, 2, 0, '23-03-2022', '8:00', '3', '400000', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment646541', 0, 0, '', 0, NULL, 0, 'Pending', '2022-03-22 12:34:03.000', '2022-03-22 12:34:03.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(61, 2, 0, '23-03-2022', '8:00', '3', '360001', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment316546', 0, 0, '', 0, NULL, 0, 'Pending', '2022-03-22 12:36:28.000', '2022-03-22 12:36:28.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(62, 2, 0, '23-03-2022', '8:00', '3', '380003', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment613168', 0, 0, '', 0, NULL, 0, 'Pending', '2022-03-22 12:38:30.000', '2022-03-22 12:38:30.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(63, 2, 0, '23-03-2022', '8:00', '3', '360002', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment631354', 0, 0, '', 0, NULL, 0, 'Pending', '2022-03-22 12:41:54.000', '2022-03-22 12:41:54.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(64, 2, 0, '23-03-2022', '8:00', '4.5', '400000', '€19', 3, 1.5, '85.50', '0.00', '85.50', '', 'Payment413516', 0, 0, '5,3', 3, NULL, 0, 'Pending', '2022-03-22 14:02:31.000', '2022-03-22 14:02:31.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(65, 2, 0, '23-03-2022', '8:00', '4.5', '360004', '€19', 3, 1.5, '85.50', '0.00', '85.50', '', 'Payment165163', 0, 0, '5,3', 3, NULL, 1, 'Pending', '2022-03-22 14:06:38.000', '2022-03-22 14:06:38.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(66, 2, 0, '23-03-2022', '15:00', '4', '360002', '€19', 3, 1, '76.00', '0.00', '76.00', '', 'Payment313516', 0, 0, '', 2, NULL, 1, 'Pending', '2022-03-22 14:12:29.000', '2022-03-22 14:12:29.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(67, 2, 0, '23-03-2022', '12:30', '3.5', '400000', '€19', 3, 0.5, '66.50', '0.00', '66.50', '', 'Payment131684', 0, 0, '', 1, NULL, 1, 'Pending', '2022-03-22 14:28:43.000', '2022-03-22 14:28:43.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(68, 2, 0, '23-03-2022', '15:00', '3', '360001', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment616877', 0, 0, '', 0, NULL, 0, 'Pending', '2022-03-22 14:34:28.000', '2022-03-22 16:45:51.000', 2, '0.00', '0.00', NULL, 1, '2', 'bed 1', 'bath 1'),
(69, 2, 0, '23-03-2022', '12:00', '3.5', '400000', '€19', 3, 0.5, '66.50', '0.00', '66.50', '', 'Payment113416', 0, 0, '', 1, NULL, 1, 'Pending', '2022-03-22 14:40:36.000', '2022-03-22 14:40:36.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(70, 2, 0, '23-03-2022', '16:30', '3', '360001', '€19', 3, 0, '57.00', '0.00', '57.00', 'new', 'Payment464144', 0, 0, '', 0, NULL, 1, 'Pending', '2022-03-22 14:47:33.000', '2022-03-22 14:47:33.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(71, 2, 0, '23-03-2022', '18:00', '3', '360005', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment646461', 0, 0, '', 0, NULL, 0, 'Pending', '2022-03-22 15:09:36.000', '2022-03-22 16:44:21.000', 2, '0.00', '0.00', NULL, 1, '25', 'bed 1', 'bath 1'),
(72, 2, 0, '23-03-2022', '8:00', '3', '380008', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment822686', 0, 0, '3', 0, NULL, 0, 'Pending', '2022-03-22 16:36:27.000', '2022-03-22 16:36:27.000', 2, '0.00', '0.00', NULL, 1, '1', 'bed 1', 'bath 1'),
(73, 2, 0, '23-03-2022', '16:30', '3', '360001', '€19', 3, 0, '57.00', '0.00', '57.00', '', 'Payment964264', 0, 0, '3', 0, NULL, 0, 'Pending', '2022-03-22 16:38:48.000', '2022-03-22 16:41:21.000', 2, '0.00', '0.00', NULL, 1, '2', 'bed 1', 'bath 1');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequestaddress`
--

CREATE TABLE `servicerequestaddress` (
  `serviceRequestAddressId` int(11) NOT NULL,
  `ServiceRequestId` int(11) DEFAULT NULL,
  `AddressId` int(11) NOT NULL,
  `AddressLine1` varchar(200) DEFAULT NULL,
  `AddressLine2` varchar(200) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicerequestaddress`
--

INSERT INTO `servicerequestaddress` (`serviceRequestAddressId`, `ServiceRequestId`, `AddressId`, `AddressLine1`, `AddressLine2`, `City`, `State`, `PostalCode`, `Mobile`, `Email`) VALUES
(31, 41, 28, 'XXYYZZ', 'AAA', 'Ahmedabad', 'GUJARAT', '380005', '7856987595', NULL),
(32, 43, 22, 'NNEEWW', 'NNEEWW-123', 'Rajkot', 'GUJARAT', '360005', '9523747687', 'pkl1122@yopmail.com'),
(34, 45, 2, 'Block no - 9', 'Stree no - 1', 'Rajkot', 'GUJARAT', '360005', '9852362130', 'pkl1122@yopmail.com'),
(35, 46, 22, 'new', 'new 10', 'Rajkot', 'GUJARAT', '360005', '1234567890', 'pkl1122@yopmail.com'),
(36, 47, 31, 'now', '11', 'Rajkot', 'GUJARAT', '360001', '8989898988', 'pkl1122@yopmail.com'),
(37, 48, 31, 'now', '11', 'Rajkot', 'GUJARAT', '360001', '8989898988', 'pkl1122@yopmail.com'),
(38, 49, 31, 'now', '11', 'Rajkot', 'GUJARAT', '360001', '8989898988', 'pkl1122@yopmail.com'),
(39, 50, 31, 'now', '11', 'Rajkot', 'GUJARAT', '360001', '8989898988', 'pkl1122@yopmail.com'),
(40, 51, 31, 'now', '11', 'Rajkot', 'GUJARAT', '360001', '8989898988', 'pkl1122@yopmail.com'),
(41, 52, 32, 'xyz', 'block - 90', 'Rajkot', 'GUJARAT', '360003', '9639632145', 'pkl1122@yopmail.com'),
(42, 53, 34, 'new', 'goa', 'Goa', 'GOA', '360001', '9632589632', 'pkl1122@yopmail.com'),
(43, 54, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com'),
(44, 55, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com'),
(45, 56, 34, 'building', 'raja mahel', 'Rajkot', 'GUJARAT', '360001', '9632589632', 'pkl1122@yopmail.com'),
(46, 57, 1, 'street - 4', '2', 'Ahmedabad', 'GUJARAT', '380001', '7777777777', 'pkl1122@yopmail.com'),
(47, 58, 31, 'now', '11', 'Rajkot', 'GUJARAT', '360001', '8989898988', 'pkl1122@yopmail.com'),
(48, 59, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com'),
(49, 60, 32, 'xyz', 'block - 90', 'Goa', 'GOA', '400000', '9639632145', 'pkl1122@yopmail.com'),
(50, 61, 32, 'xyz', 'block - 90', 'Goa', 'GOA', '400000', '9639632145', 'pkl1122@yopmail.com'),
(51, 62, 22, 'new', 'new 10', 'Rajkot', 'GUJARAT', '360005', '1234567890', 'pkl1122@yopmail.com'),
(52, 63, 33, 'state', '39', 'Goa', 'GOA', '400000', '7878787878', 'pkl1122@yopmail.com'),
(53, 64, 31, 'now', '11', 'Rajkot', 'GUJARAT', '360001', '8989898988', 'pkl1122@yopmail.com'),
(54, 65, 22, 'new', 'new 10', 'Rajkot', 'GUJARAT', '360005', '1234567890', 'pkl1122@yopmail.com'),
(55, 66, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com'),
(56, 67, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com'),
(57, 68, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com'),
(58, 69, 2, 'Block no - 9', 'Stree no - 1', 'Rajkot', 'GUJARAT', '360005', '9852362130', 'pkl1122@yopmail.com'),
(59, 70, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com'),
(60, 71, 33, 'state', '39', 'Goa', 'GOA', '400000', '7878787878', 'pkl1122@yopmail.com'),
(61, 72, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com'),
(62, 73, 34, 'new', 'goa', 'Goa', 'GOA', '400000', '9632589632', 'pkl1122@yopmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequestextra`
--

CREATE TABLE `servicerequestextra` (
  `ServiceRequestExtraId` int(11) NOT NULL,
  `ServiceRequestId` int(11) NOT NULL,
  `ServiceExtra` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicerequestextra`
--

INSERT INTO `servicerequestextra` (`ServiceRequestExtraId`, `ServiceRequestId`, `ServiceExtra`) VALUES
(18, 41, 'inside-cabinet'),
(19, 41, 'inside-fridge'),
(20, 43, 'inside-cabinet'),
(21, 43, 'inside-fridge'),
(22, 43, 'inside-oven'),
(23, 46, 'inside-cabinet'),
(24, 47, 'inside-cabinet'),
(25, 48, 'inside-cabinet'),
(26, 48, 'inside-fridge'),
(27, 52, 'inside-fridge'),
(28, 55, 'inside-oven, interior-window'),
(29, 56, 'inside-cabinet, inside-fridge, inside-oven, laundry-wash, interior-window'),
(30, 58, 'inside-fridge, laundry-wash'),
(31, 64, 'inside-cabinet, inside-fridge, laundry-wash'),
(32, 65, 'inside-cabinet, inside-fridge, laundry-wash'),
(33, 66, 'inside-fridge, inside-oven'),
(34, 67, 'inside-oven'),
(35, 69, 'inside-cabinet');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateId`, `StateName`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `TestId` int(11) NOT NULL,
  `TestName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Mobile` varchar(20) NOT NULL,
  `UserTypeId` int(11) NOT NULL,
  `Gender` varchar(11) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `UserProfilePicture` varchar(200) DEFAULT NULL,
  `IsRegisteredUser` varchar(10) NOT NULL DEFAULT '0',
  `PaymentGatewayUserRef` varchar(200) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT '',
  `WorksWithPets` tinyint(4) NOT NULL DEFAULT 0,
  `LanguageId` int(11) DEFAULT NULL,
  `NationalityId` int(11) DEFAULT NULL,
  `CreatedDate` datetime(3) NOT NULL,
  `ModifiedDate` datetime(3) NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `IsApproved` tinyint(4) NOT NULL DEFAULT 0,
  `IsActive` varchar(10) NOT NULL DEFAULT '0',
  `IsDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `Resetkey` varchar(50) DEFAULT NULL,
  `Status` varchar(11) DEFAULT NULL,
  `BankTokenId` varchar(100) DEFAULT NULL,
  `TaxNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `FirstName`, `LastName`, `Email`, `Password`, `Mobile`, `UserTypeId`, `Gender`, `DateOfBirth`, `UserProfilePicture`, `IsRegisteredUser`, `PaymentGatewayUserRef`, `ZipCode`, `WorksWithPets`, `LanguageId`, `NationalityId`, `CreatedDate`, `ModifiedDate`, `ModifiedBy`, `IsApproved`, `IsActive`, `IsDeleted`, `Resetkey`, `Status`, `BankTokenId`, `TaxNo`) VALUES
(1, 'admin', 'admin', 'admin1122@yopmail.com', '$2y$10$8LBX8srMUClvG4F8D4fZ3upwDLW55bR4uWH5Z9LlSGHw/gROnBxNq', '9999955555', 1, '0', NULL, NULL, '0', NULL, '', 0, 1, NULL, '2022-02-02 00:11:48.000', '2022-03-16 13:01:59.000', 1, 0, 'Yes', 0, '72e5ffa42e36ce478362bdcc7cf668', 'Active', NULL, NULL),
(2, 'parth', 'patel', 'pkl1122@yopmail.com', '$2y$10$.vssbtGm/NixWfoFXfTbMebFtwbBQ4dKRGAroA7kviRoWEhwXExRG', '7777777777', 3, NULL, '2005-12-18', NULL, 'yes', NULL, '360001', 0, 1, NULL, '2022-02-02 19:15:42.000', '2022-03-16 16:53:25.000', 2, 0, 'Yes', 0, '4c2196dbf581e6a63f61ef223a28a9', 'Active', NULL, NULL),
(3, 'service', 'ser', 'service1122@yopmail.com', '$2y$10$zRktUsoy5G6kkufVxNI3SuCN41/Ff4I42fc7zrirlClsF5vsoAVye', '8888888888', 2, 'male', '1951-01-14', '4-avtar', 'yes', NULL, '360001', 0, 1, NULL, '2022-02-02 20:05:28.000', '2022-03-22 15:58:05.000', 3, 0, 'Yes', 0, 'ccb1c45ac5f9ad18b4dc64cd3cf3e0', 'Active', NULL, NULL),
(5, 'pan', 'wala', 'panwala@yopmail.com', '$2y$10$ZbkQV2/VXFvJJrS/714ICeQoVcjxwMGINSdjlPGoyLUXdiYQ1tVH6', '7647658365', 2, 'male', '1957-03-01', '6-avtar', 'yes', NULL, '400000', 0, 1, NULL, '2022-02-13 12:13:47.000', '2022-03-22 16:43:32.000', 5, 0, 'Yes', 0, '9aa39bcf3671e2e88f33d317d6b8c0', 'Active', NULL, NULL),
(6, 'xy', 'ab', 'xyab12@yopmail.com', '$2y$10$A9okdneJFj.5vEQBfhZ1k.XY6oB6d9ETOtmvUZGFWgrBWNTTfjaWa', '9975973953', 3, NULL, NULL, NULL, 'yes', NULL, '400000', 0, NULL, NULL, '2022-02-20 13:14:29.000', '2022-03-16 13:02:47.000', 6, 0, 'Yes', 0, '2deec6c58d0c71bed325fb4be507f3', 'Active', NULL, NULL),
(7, 'ppp', 'ooo', 'pppooo@yopmail.com', '$2y$10$nABi3JZEZfqUKHFqO1QYReaRkfY9jL1ymL2RCgBFSjC0868FuhDI2', '9090909090', 2, NULL, NULL, NULL, 'yes', NULL, '', 0, NULL, NULL, '2022-03-07 12:06:34.000', '2022-03-16 16:04:52.000', 7, 0, 'Yes', 0, '54c6d00247c4b81d690c1a20b8e07a', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `AddressId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `AddressLine1` varchar(200) NOT NULL,
  `AddressLine2` varchar(200) DEFAULT NULL,
  `CityId` int(11) NOT NULL,
  `StateId` int(3) DEFAULT NULL,
  `PostalCode` varchar(20) NOT NULL,
  `IsDefault` tinyint(4) NOT NULL DEFAULT 0,
  `IsDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `Mobile` varchar(20) NOT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`AddressId`, `UserId`, `AddressLine1`, `AddressLine2`, `CityId`, `StateId`, `PostalCode`, `IsDefault`, `IsDeleted`, `Mobile`, `Email`) VALUES
(1, 2, 'street - 10', '2', 185, 12, '360001', 0, 0, '7777777777', NULL),
(2, 2, 'Block no - 9', 'Stree no - 1', 185, NULL, '360005', 0, 0, '9852362130', NULL),
(22, 2, 'new', 'new 10', 185, NULL, '360005', 0, 0, '1234567890', NULL),
(24, 2, 'NNEEWW', 'NNEEWW-123', 185, NULL, '360005', 0, 1, '9523747687', NULL),
(31, 2, 'now', '11', 185, NULL, '360001', 0, 0, '8989898988', NULL),
(32, 2, 'xyz', 'block - 90', 153, 11, '400000', 0, 0, '9639632145', NULL),
(33, 2, 'state', '39', 153, 11, '400000', 0, 0, '7878787878', NULL),
(34, 2, 'new', 'goa', 153, 11, '400000', 0, 0, '9632589632', NULL),
(40, 3, 'new york', '0', 185, 12, '360001', 0, 0, '8888888888', NULL),
(41, 5, 'io', '78', 153, 11, '400000', 0, 0, '7647658365', NULL),
(42, 6, 'goa new corner', 'street 5', 153, 11, '400000', 0, 0, '9632587412', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zipcode`
--

CREATE TABLE `zipcode` (
  `ZipcodeId` int(11) NOT NULL,
  `ZipcodeValue` varchar(50) NOT NULL,
  `CityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zipcode`
--

INSERT INTO `zipcode` (`ZipcodeId`, `ZipcodeValue`, `CityId`) VALUES
(1, '380001', 163),
(2, '380002', 163),
(3, '380003', 163),
(4, '380004', 163),
(5, '380005', 163),
(6, '380006', 163),
(7, '380007', 163),
(8, '380008', 163),
(9, '380009', 163),
(10, '360001', 185),
(11, '360002', 185),
(12, '360003', 185),
(13, '360004', 185),
(14, '360005', 185),
(15, '360006', 185),
(16, '360007', 185),
(17, '400000', 153);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityId`),
  ADD KEY `FK_City_State` (`StateId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ContactUsId`);

--
-- Indexes for table `favoriteandblocked`
--
ALTER TABLE `favoriteandblocked`
  ADD PRIMARY KEY (`FavouriteBlockId`),
  ADD KEY `TargetUserId` (`TargetUserId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingId`);

--
-- Indexes for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD PRIMARY KEY (`ServiceRequestId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `servicerequestaddress`
--
ALTER TABLE `servicerequestaddress`
  ADD PRIMARY KEY (`serviceRequestAddressId`),
  ADD KEY `ServiceRequestId` (`ServiceRequestId`);

--
-- Indexes for table `servicerequestextra`
--
ALTER TABLE `servicerequestextra`
  ADD PRIMARY KEY (`ServiceRequestExtraId`),
  ADD KEY `ServiceRequestId` (`ServiceRequestId`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`AddressId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `CityId` (`CityId`);

--
-- Indexes for table `zipcode`
--
ALTER TABLE `zipcode`
  ADD PRIMARY KEY (`ZipcodeId`),
  ADD KEY `CityId` (`CityId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=656;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ContactUsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `favoriteandblocked`
--
ALTER TABLE `favoriteandblocked`
  MODIFY `FavouriteBlockId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `servicerequest`
--
ALTER TABLE `servicerequest`
  MODIFY `ServiceRequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `servicerequestaddress`
--
ALTER TABLE `servicerequestaddress`
  MODIFY `serviceRequestAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `servicerequestextra`
--
ALTER TABLE `servicerequestextra`
  MODIFY `ServiceRequestExtraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `zipcode`
--
ALTER TABLE `zipcode`
  MODIFY `ZipcodeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `FK_City_State` FOREIGN KEY (`StateId`) REFERENCES `state` (`StateId`);

--
-- Constraints for table `favoriteandblocked`
--
ALTER TABLE `favoriteandblocked`
  ADD CONSTRAINT `favoriteandblocked_ibfk_1` FOREIGN KEY (`TargetUserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `favoriteandblocked_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD CONSTRAINT `servicerequest_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `servicerequestaddress`
--
ALTER TABLE `servicerequestaddress`
  ADD CONSTRAINT `servicerequestaddress_ibfk_1` FOREIGN KEY (`ServiceRequestId`) REFERENCES `servicerequest` (`ServiceRequestId`);

--
-- Constraints for table `servicerequestextra`
--
ALTER TABLE `servicerequestextra`
  ADD CONSTRAINT `servicerequestextra_ibfk_1` FOREIGN KEY (`ServiceRequestId`) REFERENCES `servicerequest` (`ServiceRequestId`);

--
-- Constraints for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD CONSTRAINT `useraddress_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `useraddress_ibfk_2` FOREIGN KEY (`CityId`) REFERENCES `city` (`CityId`);

--
-- Constraints for table `zipcode`
--
ALTER TABLE `zipcode`
  ADD CONSTRAINT `zipcode_ibfk_1` FOREIGN KEY (`CityId`) REFERENCES `city` (`CityId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
