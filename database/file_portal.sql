--
-- Database: `file_portal`
--
-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `ID` int(4) NOT NULL,
  `Subject_id` int(2) NOT NULL,
  `Caption` text DEFAULT NULL,
  `filename` text NOT NULL,
  `filename_org` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `owner` varchar(255) DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` int(2) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_1`
--

CREATE TABLE `user_1` (
  `ID` int(11) NOT NULL,
  `college` text NOT NULL,
  `std_name` text NOT NULL,
  `subject` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(259) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `verified` int(1) DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_1`
--

INSERT INTO `user_1` (`ID`, `college`, `std_name`, `subject`, `email`, `password`, `admin`, `verified`) VALUES
(1, 'Sagarmatha Engineering College', 'Admin', 1, 'admin@root.admim.com', 'e492b465b7d50387eb821ee3d4ae37a4', 1, 1);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);
 
--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_1`
--
ALTER TABLE `user_1`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user_1`
--
ALTER TABLE `user_1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


COMMIT;