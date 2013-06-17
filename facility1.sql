-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2013 at 10:23 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facility1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `email`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'rajsunil1989@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(255) NOT NULL,
  `subtype` varchar(200) NOT NULL,
  `circle_location` varchar(200) NOT NULL,
  `region` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(56) NOT NULL,
  `location` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_contact` varchar(60) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `wonership` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `caddress` varchar(255) NOT NULL,
  `ccontact` varchar(255) NOT NULL,
  `agreement` varchar(255) NOT NULL,
  `cagree_exdate` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `oaddress` varchar(255) NOT NULL,
  `ocontact` varchar(255) NOT NULL,
  `oagr_copy` varchar(255) NOT NULL,
  `owner_agr_exdate` varchar(255) NOT NULL,
  `rent_amount` varchar(255) NOT NULL,
  `rentagree_copy` varchar(255) NOT NULL,
  `rentagr_exdate` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `verifylicense_no` varchar(255) NOT NULL,
  `license_copy` varchar(255) NOT NULL,
  `license_exdate` varchar(255) NOT NULL,
  `tlicense` varchar(255) NOT NULL,
  `tlicense_no` varchar(200) NOT NULL,
  `tlicense_copy` varchar(200) NOT NULL,
  `ticense_exdate` varchar(255) NOT NULL,
  `date` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `type`, `subtype`, `circle_location`, `region`, `address1`, `address2`, `city`, `pincode`, `location`, `area`, `fname`, `mname`, `lname`, `email`, `password`, `user_contact`, `emp_code`, `wonership`, `client_name`, `caddress`, `ccontact`, `agreement`, `cagree_exdate`, `owner_name`, `oaddress`, `ocontact`, `oagr_copy`, `owner_agr_exdate`, `rent_amount`, `rentagree_copy`, `rentagr_exdate`, `license`, `license_no`, `verifylicense_no`, `license_copy`, `license_exdate`, `tlicense`, `tlicense_no`, `tlicense_copy`, `ticense_exdate`, `date`) VALUES
(14, 'Spoke', '', 'sadfsaf', 'South', 'sdf', 'ddd', 'Inderpuri', '110023', 'Motihari', '2010', 'Prem', 'kumar', 'gupta', 'gupta.sunil33@gmail.com', '', '9555833346', '4335', 'Owned', '', '', '', '', '', '', '', '', '', '', '', 'Best Deals.doc', '2/05/2015', 'License', '', '', '', '', '11002', '2536', 'dog.jpg', '20/0/2015', '2013-06-12 11:57:05'),
(15, 'Spoke', '', 'sadfsaf', 'South', 'sdf', 'ddd', 'Inderpuri', '110023', 'Motihari', '2010', 'Prem', 'kumar', 'gupta', 'gupta.sunil33@gmail.com', '', '9555833346', '4335', 'Owned', '', '', '', '', '', '', '', '', '', '', '', 'Best Deals.doc', '2/05/2015', 'License', '', '', '', '', '11002', '2536', 'dog.jpg', '20/0/2015', '2013-06-12 11:59:42'),
(22, 'Corporate', 'Office', '', 'North', 'dsfs', 'asdfsf', 'ganesh nagar', '110023', 'Motihari', '2010', 'Prem', 'kumar', 'gupta', 'rajsunil11989@gmail.com', '9477810', '9555833346', '4335', 'Owned', '', '', '', '', '', '', '', '', '', '', '', 'owner_copy.jpg', '2/05/2015', 'Shop&Establishment', '110', '2000', 'license.jpg', '12/06/2016', '', '', '', '', '2013-06-12 15:40:15'),
(23, 'Corporate', 'Office', '', 'North', 'dsfs', 'asdfsf', 'ganesh nagar', '110023', 'Motihari', '2010', 'Prem', 'kumar', 'gupta', 'rajsunil11989@gmail.com', '9346788', '9555833346', '4335', 'Owned', '', '', '', '', '', '', '', '', '', '', '', 'owner_copy.jpg', '2/05/2015', 'Shop&Establishment', '110', '2000', 'license.jpg', '12/06/2016', '', '', '', '', '2013-06-12 15:42:26');
