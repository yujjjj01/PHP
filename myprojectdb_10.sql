-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-11-11 09:23:21
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `myprojectdb_10`
--

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `userId` varchar(10) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`id`, `userId`, `pwd`) VALUES
(1, '222', '123'),
(2, '222', '222'),
(3, '333', '333');

-- --------------------------------------------------------

--
-- 資料表結構 `milestone`
--

CREATE TABLE `milestone` (
  `id` int(11) NOT NULL,
  `typeId` int(11) NOT NULL COMMENT '類別代碼',
  `years` char(4) NOT NULL COMMENT '年',
  `months` char(2) NOT NULL COMMENT '月',
  `title` varchar(200) NOT NULL COMMENT '標題',
  `content` varchar(500) NOT NULL COMMENT '內容',
  `point` char(1) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='大事記';

--
-- 傾印資料表的資料 `milestone`
--

INSERT INTO `milestone` (`id`, `typeId`, `years`, `months`, `title`, `content`, `point`, `createTime`) VALUES
(1, 2, '2026', '09', 'AI輔助實作班開課', 'test', 'Y', '2026-11-11 03:00:30');

-- --------------------------------------------------------

--
-- 資料表結構 `milestone_type`
--

CREATE TABLE `milestone_type` (
  `id` int(11) NOT NULL,
  `label` varchar(10) NOT NULL COMMENT '顏色標籤',
  `title` varchar(10) NOT NULL COMMENT '類別名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='大事記類別';

--
-- 傾印資料表的資料 `milestone_type`
--

INSERT INTO `milestone_type` (`id`, `label`, `title`) VALUES
(1, 'gold', '里程碑1'),
(2, '111', 'aaa');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL COMMENT '品名',
  `title` varchar(200) DEFAULT NULL COMMENT '標題',
  `product_no` varchar(30) DEFAULT NULL COMMENT '產品標號',
  `price` int(11) DEFAULT NULL COMMENT '定價',
  `sale_price` int(11) DEFAULT NULL COMMENT '售價',
  `qty` int(11) DEFAULT NULL COMMENT '數量',
  `content` text DEFAULT NULL COMMENT '產品內容',
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `label_id` int(11) DEFAULT NULL COMMENT '標籤代碼',
  `type_id` int(11) DEFAULT NULL COMMENT '類別代碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='產品資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `product_label`
--

CREATE TABLE `product_label` (
  `id` int(11) NOT NULL,
  `label` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='產品標籤';

-- --------------------------------------------------------

--
-- 資料表結構 `product_photo`
--

CREATE TABLE `product_photo` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='產品圖';

-- --------------------------------------------------------

--
-- 資料表結構 `product_spec`
--

CREATE TABLE `product_spec` (
  `id` int(11) NOT NULL,
  `memberId` int(11) DEFAULT NULL COMMENT '產品編號',
  `title` varchar(30) DEFAULT NULL COMMENT '規格名稱',
  `content` int(11) DEFAULT NULL COMMENT '規格內容',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='產品規格';

-- --------------------------------------------------------

--
-- 資料表結構 `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='產品類別';

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `milestone_type`
--
ALTER TABLE `milestone_type`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_label`
--
ALTER TABLE `product_label`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_spec`
--
ALTER TABLE `product_spec`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `milestone`
--
ALTER TABLE `milestone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `milestone_type`
--
ALTER TABLE `milestone_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_label`
--
ALTER TABLE `product_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_spec`
--
ALTER TABLE `product_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
