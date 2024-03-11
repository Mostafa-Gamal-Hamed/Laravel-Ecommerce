-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 03:28 PM
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
-- Database: `e-commerce-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `offerPrice` decimal(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'Categories/sRUYTvL6n4XXVVw2ivq0mK7qLaPlgEDRRSl8e84N.jpg', '2024-02-05 13:00:54', '2024-02-05 13:00:54'),
(2, 'Women', 'Categories/SW6fqb4PZpX6dOb0QpY3VMuVOw3qx5mCl3tn0eOg.jpg', '2024-02-05 13:01:09', '2024-02-05 13:01:09'),
(3, 'Kids', 'Categories/cvJ0GFK11qj4iD8CC3rJf0MVK63GKj4XO7pqxead.jpg', '2024-02-05 13:01:27', '2024-02-05 13:01:27'),
(4, 'Baby', 'Categories/0jikeYXlJzwM4xzwWYEIEmTz3U2v5gdRq4oJwsxT.jpg', '2024-02-05 13:01:44', '2024-02-05 13:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `category_children`
--

CREATE TABLE `category_children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_children`
--

INSERT INTO `category_children` (`id`, `name`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Jeans', 'CategoryChild/ReGKxAf54KwP0i5f8LjkuiefvibvupWPZskVQU22.jpg', 1, '2024-02-06 09:28:56', '2024-02-06 09:28:56'),
(2, 'Jackets', 'CategoryChild/x4o26uZqKoVKrD2yrtzt2pghrWVR0ND4eDp4Gl0Q.jpg', 1, '2024-02-06 09:31:40', '2024-02-06 09:31:40'),
(3, 'Suits', 'CategoryChild/1jpcxJL7tdz7IJVo1JAl0Zp7fBZQxhijD4KwPuZB.jpg', 1, '2024-02-06 09:32:11', '2024-02-06 09:32:11'),
(4, 'Sweatshirts', 'CategoryChild/MCdeHSkk4IHyrypuuYysGAjJkiPpxmDfL5Bv9nxF.jpg', 1, '2024-02-06 09:33:39', '2024-02-06 09:33:39'),
(5, 'Dresses', 'CategoryChild/QGG9oxMF6P8OiCqNoMODRQYYNYwO4E9hOLGIGGmL.jpg', 2, '2024-02-06 10:28:58', '2024-02-06 10:33:55'),
(6, 'Blouses', 'CategoryChild/0hXQfAl5JCdltNR6SXhKR6rZwSXpL406Hvl4Lwme.jpg', 2, '2024-02-06 10:32:27', '2024-02-06 10:32:27'),
(7, 'Scarves & Veil', 'CategoryChild/LWKddoaNz0kZR8EtX5zhwLQbop2Ho4bNfxMy6U0T.jpg', 2, '2024-02-06 10:33:08', '2024-02-06 10:33:08'),
(8, 'Abayas', 'CategoryChild/hlk6WZh6GGfCapkcd9YpbMhLJjODBvave7SCcN5t.jpg', 2, '2024-02-06 10:36:07', '2024-02-06 10:36:07'),
(9, 'Jeans', 'CategoryChild/svq5sZF0IjlLmKg3t7Vbd9jl3Wu73JEDALOgYbQP.jpg', 3, '2024-02-06 10:36:44', '2024-02-06 10:36:44'),
(10, 'Jackets', 'CategoryChild/0TUDxRAQ1HzLcI5fn3lHDCN5j43yojRXyZfxtrN9.jpg', 3, '2024-02-06 10:38:33', '2024-02-06 10:38:33'),
(11, 'T-Shirts', 'CategoryChild/iRwPcjBEhluR7Yf2QKJh0LRPw14FRlfQsSn3eGQG.jpg', 3, '2024-02-06 10:39:14', '2024-02-06 10:39:14'),
(12, 'Dresses', 'CategoryChild/IIbLpJzdhi30ZtRX3WKtZlFclMEuPn3eq9fb23DD.jpg', 3, '2024-02-06 10:40:18', '2024-02-06 10:40:18'),
(13, 'T-Shirts', 'CategoryChild/Mpn0BkMeYpAfe2JDiCxi4YfNJqmM9YIXSBtFlM0n.jpg', 4, '2024-02-06 13:43:48', '2024-02-06 13:43:48'),
(14, 'Sweatpants', 'CategoryChild/9TtqHXRZgVG6AxYc1dNb7SHyFZrmsMMs6liACdI8.jpg', 4, '2024-02-06 13:44:33', '2024-02-06 13:44:33'),
(15, 'Shorts', 'CategoryChild/NH8niP7lkG5BT8CRBo1vMAV073wxeKRRAREmw3i6.jpg', 4, '2024-02-06 13:46:42', '2024-02-06 13:46:42'),
(16, 'Pyjamas', 'CategoryChild/i9p0yHbbYrLuujhBETyOnhpF590EFevGF1D2Wm0j.jpg', 4, '2024-02-06 13:48:58', '2024-02-06 13:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cairo', '2024-03-10 09:48:05', '2024-03-10 09:48:11'),
(2, 'Alexandria', '2024-03-10 07:48:45', '2024-03-10 07:48:45');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_28_113506_add_to_users_table', 1),
(6, '2023_11_28_155105_create_categories_table', 1),
(7, '2023_11_29_095330_create_products_table', 1),
(8, '2023_12_02_104648_create_category_children_table', 1),
(9, '2023_12_03_104951_add_to_products_table', 1),
(10, '2023_12_05_172957_add_to_categories_table', 1),
(11, '2023_12_05_173026_add_to_category_children_table', 1),
(12, '2023_12_06_112315_create_orders_table', 1),
(13, '2023_12_06_151353_create_carts_table', 1),
(14, '2023_12_11_180150_add_to_users_table', 1),
(15, '2023_12_11_181950_create_cities_table', 1),
(16, '2023_12_20_140407_add_to_users_table', 1),
(17, '2023_12_22_201609_create_user_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `shippedDate` date DEFAULT NULL,
  `status` enum('notShipped','shipped','delivered','canceled') NOT NULL DEFAULT 'notShipped',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderDate`, `shippedDate`, `status`, `product_id`, `quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2024-03-10 09:44:58', '2024-03-08', 'shipped', 1, 1, 2, '2024-03-07 13:06:46', '2024-03-10 07:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `smallDesc` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `offerPrice` decimal(8,2) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `smallDesc`, `price`, `offerPrice`, `image1`, `image2`, `image3`, `quantity`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Stretch tapered jeans Edit', 'Since 1977, American Eagle has offered an assortment of specialty apparel and accessories for men and women that enables self-expression and empowers our customers to celebrate their individuality. The brand has broadened its leadership in jeans by producing innovative fabric with options for all styles and fits for all at a value. We aren’t just passionate about making great clothing, we’re passionate about making real connections with the people who wear them.\r\nMaterial: 98% Cotton, 2% Elastane\r\nModel\'s height: 185cm / 6\' 1\'\'\r\nModel is wearing: W 32\" L 32\"', 'Slim fit jeans gently hug the body with their flexible fabric structure, while the narrow design of the trousers provides you with a modern look as well as comfort and convenience all day long.', 750.00, 550.00, 'Products/tfdBedx7F5BjrDSC9tC386FinwmVzDvStyrxgkho.png', 'Products/HrdVqd7QsIVePM69JIde7YAYvXh0HvFuHSumX3u1.png', 'Products/2SmHBGX4PHE9VChMAdKhzXhEOI2n6f36raWTundH.png', 10, 1, '2024-03-07 10:40:00', '2024-03-07 12:19:16'),
(2, 'DOTT JEANS WEAR Men 1132 Carrot Fit Jeans', 'Product Dimensions ‏ : ‎ 15 x 12 x 12 cm; 520 Grams.\r\nDate First Available ‏ : ‎ 17 January 2024.\r\nASIN ‏ : ‎ B0CSLQZ33N.\r\nDepartment ‏ : ‎ Men.\r\nColor : Dark Blue.', 'Carrot fit jeans. Five pockets. Faded effect and buttons Closure.', 599.00, 0.00, 'Products/IlPiyugbGquROJr9mJYcmBUwAIXf4bDObVVDl9UH.jpg', 'Products/3lh989z57wGTCbKbl7RrePaEtZCFLM96zvVwZ11I.jpg', 'Products/eCMOTziKSaftICHrZvsK7dIlNUAXjxhWgolZMRwX.jpg', 20, 1, '2024-03-10 07:59:57', '2024-03-10 07:59:57'),
(3, 'DOTT JEANS WEAR Men Chino Pique Slim Fit Pants', 'Normal Size.\r\n\r\nChino&Classic.\r\n\r\nSlim Fit.\r\n\r\nPants.\r\n\r\nProduct Dimensions ‏ : ‎ 7 x 8 x 3 cm; 450 Grams.\r\n\r\nDate First Available ‏ : ‎ 24 January 2023.\r\n\r\nASIN ‏ : ‎ B0BSXC4YMX.\r\n\r\nDepartment ‏ : ‎ Men.\r\ncolor : Beige.', 'DOTT JEANS WEAR Men Chino Pique Slim Fit Pants', 480.00, 450.00, 'Products/lQTmHlUgGqVMtuSiXKtr6pjyddiUG6BKfI5Htwjf.jpg', 'Products/zfKHSpQvLNxwh4L8kMluy2FTmFtCsEjCLMf75HTr.jpg', 'Products/Ughaezk3HMzWfqplQmfR8uhy3MwxclVxWM5UVUj1.jpg', 20, 1, '2024-03-10 08:36:55', '2024-03-10 08:36:55'),
(4, 'Premoda Mens Fancy Vegan Suede Jacket', 'Fancy Vegan Suede Jacket With Sherpa.\r\n\r\nProduct Dimensions ‏ : ‎ 55 x 45 x 20 cm; 550 Grams\r\n\r\n100% Polyester.\r\n\r\nTrendy, Comfortable.\r\n\r\nHight Quality Material.\r\n\r\nDepartment ‏ : ‎ Mens\r\n\r\nDry Clean.\r\n\r\nWe admire culture and character with a young and fresh perspective. PREMODA is a fresh Egyptian fashion brand offering an urban twist to womenswear & menswear. Since 2007, PREMODA has been cuarting and providing the latest trends for everyday and every occasion in the best quality for best prices. Spoil yourself, glow and shine with our newest collection. Let your personality shine in the perfect harmony & power up your daily look with our trendy fresh new styles. Everyone loves an iconic look, all what you need is this contemporary piece for your best day out, if you haven\'t yet then you should! It is time to add some excitement to your wardrobe with this fresh look & with such special piece that stands out and brings you style and comfort in one piece. It has got everything you need to look and feel fabulous.', 'Premoda Mens Fancy Vegan Suede Jacket With Sherpa 800-250-302-64 Jacket', 1600.00, 0.00, 'Products/731chTxX3EjSiXYPQP2HFR9VcwqLUsvklyHakrln.jpg', 'Products/65QdBPh5GsUcdWxifShd4s5HihkPZWeI9x7kXww9.jpg', 'Products/KZmY7OtYkfbh5ee06kdkNEh5NojPv9KwfihTjyMt.jpg', 20, 2, '2024-03-10 09:18:37', '2024-03-10 09:18:37'),
(5, 'American Eagle Graphic Heather', 'Material composition : 80% Cotton, 20% Polyester.\r\n\r\nCare instructions : Machine Wash.\r\n\r\nClosure type : Pull On.\r\n\r\nBrand: AMERICAN EAGLE.\r\n\r\nAMERICAN EAGLE Mens 129491524_AMEC030 Graphic Heather Zip-Up Hoodie XXL Dark Heather Gray.', 'A soft, zip-up hoodie with graphics for extra style points. Layer up!', 2200.00, 0.00, 'Products/6OBQTb6NLOXtpEYln1s2ME4ANbsaOoLIl8xL2baH.jpg', 'Products/hbTGwbGKd0ddW1G4QJt4B1IOyj5XwLA7kxoVwboF.jpg', NULL, 12, 2, '2024-03-10 09:27:09', '2024-03-10 09:27:09'),
(6, 'Dalydress Mens', 'DALYDRESS is a high-end Egyptian fashion brand offering the latest fashionable & elegant trends for women and men who lead a modern dynamic lifestyle. DALYDRESS has various product lines that are designed with an italian inspiration. The brand opened its first store in 1996 in the heart of downtown Cairo and as of 2018, DALYDRESS successfully launched new line for younger generation under the name DALYDRESS-DARE. It all lies in the sophisticated & beautiful details that make your outfit special, so let your personality shine in the perfect harmony with our collection & discover a world of statement pieces tailored to absolute perfection for every occasion. It is time to add some excitement to your wardrobe with this classy look & with such special piece that stands out and brings you style and comfort in one piece. It has got everything you need to look and feel fabulous.\r\nColor: Navy.', 'Dalydress Mens Fancy Basic Down Jacket 220-250-302-183 Jacket', 1475.00, 1400.00, 'Products/3HNiXwRY2pnK06jkUd4wm6hGtsS3yBc4VsFfxIAb.jpg', 'Products/QomfUddwzW3QGmdjMYXtD3isNJDuWpzAqwJU2iSa.jpg', 'Products/RBBlBleJfH8O8qeQDi47Nc6CbIBlLzYNLtiBQ290.jpg', 15, 2, '2024-03-10 09:38:48', '2024-03-10 09:38:48'),
(7, 'Fashion (Navy Blue)Men Business Suit', 'Season:Spring,Autumn Gender:Men Occasion:Daily,Busine,Wedding,Party Material:Cotton Blend Pattern Type:Solid Style:Casual,One Button Sleeve length:Long Sleeve Thickne:Standard How to wash:Hand wash Cold,Hang or Line Dry Colour:Khaki,Black,Grey,Burgundy,Navy blue,Light blue Size Available: S,M,L,XL,2XL,3XL,4XL,5XL,6XL Measurement in CM Size: S, Bust: 91cm, Top Length: 63cm, Waist: 73cm, Hips: 93cm, Pants Length: 104cm Size: M, Bust: 95cm, Top Length: 65cm, Waist: 76cm, Hips: 96cm, Pants Length: 104cm Size: L, Bust: 99cm, Top Length: 67cm, Waist: 79cm, Hips: 99cm, Pants Length: 106cm Size: XL, Bust: 103cm, Top Length: 69cm, Waist: 82cm, Hips: 102cm, Pants Length: 106cm Size: 2XL, Bust: 107cm, Top Length: 71cm, Waist: 85cm, Hips: 105cm, Pants Length: 109cm Size: 3XL, Bust: 111cm, Top Length: 73cm, Waist: 88cm, Hips: 108cm, Pants Length: 109cm Size: 4XL, Bust: 114cm, Top Length: 75cm, Waist: 91cm, Hips: 111cm, Pants Length: 112cm Size: 5XL, Bust: 117cm, Top Length: 75cm, Waist: 94cm, Hips: 114cm, Pants Length: 112cm Size: 6XL, Bust: 121cm, Top Length: 75cm, Waist: 97cm, Hips: 117cm, Pants Length: 112cm Vest size Measurement in CM Size: S, Bust: 88cm, Waist: 81cm, Length: 54cm Size: M, Bust: 92cm, Waist: 85cm, Length: 56cm Size: L, Bust: 96cm, Waist: 89cm, Length: 58cm Size: XL, Bust: 100cm, Waist: 93cm, Length: 60cm Size: 2XL, Bust: 104cm, Waist: 97cm, Length: 62cm Size: 3XL, Bust: 108cm, Waist: 101cm, Length: 64cm Size: 4XL, Bust: 111cm, Waist: 104cm, Length: 66cm Size: 5XL, Bust: 114cm, Waist: 107cm, Length: 66cm Size: 6XL, Bust: 117cm, Waist: 107cm, Length: 66cm Note: Asian size runs smaller than EU/US size. Please check the detailed measurements but not select by habit. Due to the light and screen setting difference, the item\'s color may be slightly different from the pictures. Please allow slight dimension difference due to different manual measurement. Package Included: 1 PC Men Coat+1 PC Pant', 'Fashion (Navy Blue)Men Business Casual Suits Classic Blazers Suit Sets Spring Autumn Wedding Groomsmen Formal Jacket Pants Fashion Male Clothing WEF', 1850.00, 1800.00, 'Products/WutvyMkMpVoMkisgvqc9SSJeOkXMRer0vO5qnAZu.jpg', NULL, NULL, 6, 3, '2024-03-10 09:41:52', '2024-03-10 09:41:52'),
(8, 'Solid Color Slim Bs Mens BusinessBlack', 'Tips: Please Check the Sizes Before the Order! 1. This is Asian Size, it is 2-3 size smaller than EU/US size. If you wear EU/US size 2. If you are not sure about size, you can tell us your height (cm) and weight (kg) before 3. As measured by hand,1-3 cm difference is allowed (1cm=0.39inch). 4 Different computer can display different colors even if it is the same color.please allow reasonable color difference.\r\n\r\n\r\nMaterial:Polyester,Viscose\r\nStyle:Smart Casual\r\nApplicable Season:Four Seasons\r\nOrigin:Maind China\r\nApplicable Scene:Daily\r\nClosure Type:Single Breasted\r\nItem Type:Suit Jackets\r\nSleeve Length(cm):Full\r\nGender:MEN\r\nClothing Length:Regular\r\nCollar:Notched\r\nModel Number:B', '1X New Fall Fashion Solid Color Slim Bs Mens New Business Casual Suit Jackets Men High Quality Formal B Coat Male Fat 4XL', 1370.00, 0.00, 'Products/oMW9LPKrnXVfROt8v8wBEDLiXHPUtEOAIFyV5Nqm.jpg', NULL, NULL, 8, 3, '2024-03-10 09:44:23', '2024-03-10 09:44:23'),
(9, 'Mens Suits Herringbone T Jackets', 'We are factory supplier and 24 hours online .You can contact us at any time , wishing you get a happy shopping .\r\n\r\nWe can make standard size suits and custom size suits, if you want standard size suits ,you can choose the style you wanted and make your order .if you want custom size suits .we need makesure the right measurements and color ,you can measure your body according to following picture.then you can write them on the order remark or you can click Meage Seller sending all measurements and color to me when you make your order .\r\n\r\nApplicable Scene:Wedding\r\nStyle:Formal\r\nOrigin:Maind China\r\nCN:Jiangsu\r\nMaterial:Polyester\r\nApplicable Season:Four Seasons\r\nItem Type:Suit Jackets\r\nPlace Of Origin:China (Maind)\r\nCollar:Notched\r\nClosure Type:Single Breasted\r\nSleeve Length(cm):Full\r\nModel Number:KEYS20220812\r\nGender:MEN\r\nClothing Length:Regular', 'SHARE THIS PRODUCT\r\n\r\n\r\nShipped from abroad\r\nVintage Autumn Mens Suits Herringbone T Jackets Dark Green', 2100.00, 0.00, 'Products/FeHauHdPv27NGcGiVLre60vZK8QPujL2wJCdNGfX.jpg', NULL, NULL, 10, 3, '2024-03-10 09:45:52', '2024-03-10 09:45:52'),
(10, 'Men\'s Drawstring Neck', 'Material composition : 100% Cotton.\r\nCare instructionsHand : Wash Only.\r\nClosure type : Pull On.\r\nFrame material : Cotton.', 'Printonline Men\'s Drawstring Neck Hooded Sweatshirt', 450.00, 370.00, 'Products/APqqCPIJWozc3oFg9XPI6rsjbt4FsN6C6ofWT3Lw.jpg', NULL, NULL, 23, 4, '2024-03-10 09:48:57', '2024-03-10 09:48:57'),
(11, 'Zip Up Hoodie For Unisex', 'color : black.\r\nMaterial composition : 100% Cotton.\r\nClosure type : Zipper.\r\nFrame material : Cotton.\r\n\r\nProduct Dimensions ‏ : ‎ 35 x 30 x 5 cm; 466 Grams.', 'Zip Up Hoodie For Unisex', 350.00, 0.00, 'Products/HMhcyHlfNUGEb3Jx4kTw7cauuP4j5qWKjEp22KxJ.jpg', 'Products/bMyHMWgp5qppmxYMI10bluj85lyKPXoqI3I9eAqo.jpg', NULL, 13, 4, '2024-03-10 09:51:10', '2024-03-10 09:51:10'),
(12, 'Basic Sweatshirt Soft and Hooded', 'color : mint.\r\nSolid color design, chic and trendy.\r\nSlimmer euro fit style in neck/shoulder/sleeves.\r\nPreshrunk for dependable after wash performance.\r\nHeavyweight and durable, yet super-soft ring-spun cotton.\r\nCare instructions : Hand Wash Only. \r\nClosure type : Lace Up.\r\nPackage Dimensions ‏ : ‎ 49.4 x 34.2 x 6.2 cm; 670 Grams.\r\n\r\nWhether you\'re doing your work, walking errands, running or just relaxing at home, this casual hoodie makes you feel always comfortable and secure. Made of loop-back 100% premium cotton fabric inside brushed, comfortable to wear, absorbs water and breathes, slow to dry, resists static electricity build-up wrinkles easily, about 20% stronger when wet than dry, long-staple cotton & easily great to wear for casual outings. Moisture-wicking technology is to keep your body warm and dry. Elasticated cuffs, hem, and hood trim help keep out the cold and provide you a secure fit, dual-sides pockets are enough for convenient storage and to protect your hands from winter effects.', 'Basic Sweatshirt Soft and Hooded, Hoodie for Unisex', 300.00, 0.00, 'Products/hBTw1Kz7nkXJHbHtd5Z7WgNlJcVNvSlskGPJDdTW.jpg', 'Products/oh71DOnPtugytX66EWLchYhbbbPTmKLXzdHv7FkD.jpg', 'Products/1Q73V9kTKlG0OHGFFQtPVJdZeMqkfUrkqsIIFTUQ.jpg', 7, 4, '2024-03-10 09:53:17', '2024-03-10 09:53:17'),
(13, 'SweatShirt Dress', 'Who said you can not waer dress in winter! Our Long Sweatshirt Dress is your Ready to go piece for winter it will keep you warm , Modest and elegant material : Heavy Milton.\r\nDepartment ‏ : ‎ womens.\r\nCare instructions : Dry Clean Only.\r\nClosure type : Zipper.\r\nColor: Grey.', 'Oversized Long SweatShirt Dress with Hoodie and Pocket For Women', 840.00, 800.00, 'Products/8NQrydtjl3UMNdw8QZwSEGb1lMt7fSJq6XR0u6Ak.jpg', 'Products/yL88BXcRDdvNrikXVGzG02YiYnG2lizioxdjpzhS.jpg', 'Products/ZuSVaRd2fuei86lm2xg5ABTwhn4fFd4VVfbOL7cb.jpg', 30, 5, '2024-03-10 10:09:36', '2024-03-10 10:09:36'),
(14, 'Women\'s Dress Elegant', 'This dress exemplifies elegance with its subtle puff sleeves and graceful design, making it fantastic to wear at dinners, Eid, and special occasions!\r\n\r\nFEATURES:\r\n- color nave.\r\n- High neck.\r\n- Maxi.\r\n- Long sleeve.\r\n- Subtle puff sleeves.\r\n- Mesh design over sleeve.\r\n- Vertical lines design.\r\n- Small tier design at bottom of dress.\r\n- Belt included.\r\n- Cuffed sleeve.\r\n- Lined skirt.\r\n\r\nFABRIC:\r\n- 100% Polyester.\r\n- Medium weight.\r\n\r\nCARE:\r\n- Machine wash at cold temperatures or dry clean.\r\n- Do not bleach.\r\n- Iron on low.\r\n- Do not tumble dry. Lay flat to dry.\r\n\r\nMade in Turkey.', 'Modest Women\'s Dress Elegant 9390 - Navy', 1340.00, 0.00, 'Products/DhHAG3t33sC7eA8APowPAr807FWhObaMfJjLrznC.png', NULL, NULL, 17, 5, '2024-03-10 10:14:17', '2024-03-10 10:14:17'),
(15, 'Modest Women\'s Dress Floral 9328 - Black', 'FEATURES:\r\n- High neck.\r\n- Maxi.\r\n- Long sleeve.\r\n- Belt included.\r\n- Closed sleeve.\r\n- Lined skirt.\r\n- Floral pattern.\r\n\r\nFABRIC:\r\n- Polyester.\r\n- Medium weight.\r\n\r\nCARE:\r\n- DRY CLEAN ONLY.\r\n- No spot cleaning.\r\n- Do not bleach.\r\n- Low iron inside out.\r\n- Do not tumble dry.\r\n\r\nMade in Turkey.', 'A beautiful dress enveloped by a floral pattern all around! Flowy and classy, this dress is great to wear for dinners, holidays, and special occasions.', 1390.00, 1290.00, 'Products/A8LzDMSNXDblDtFl5XfAeL5ts0taTho2x0MqNDQh.png', NULL, NULL, 27, 5, '2024-03-10 10:16:09', '2024-03-10 10:16:09'),
(16, 'Pashmina Shawl and Scarf', 'Find Fish Man\'s Features And Benefits:\r\n1. Unique, Various Color Scarves\r\n2. Premium Soft Nice Touch Polyester Scarves\r\n3. Match All Idea and Design for a Better Match to Your Dressing\r\n4. With a soft and silky touch and keep your body warm, this shawl scarf will be the best choice for cold winters\r\n5. Fine weave, rich layers, thick but not bloated, let you maintain elegance and fashion in the cold winter\r\n6. Can be used as a fashionable cloak or unlimited styles, scarves, shawls, blankets, to meet your different needs\r\n\r\nProduct Specifications :\r\nMATERIAL: 30%cashmere70%Polyester\r\nMEASUREMENT:Extra Large 78\"x28\"\r\nOCCASION: Weddings, birthday parties, cocktail parties and can be matched withcoats, jackets, sweaters or dresses for activities.\r\nPERFECT GIFT: Surprise your friends, loved ones, and loverson birthday, Mother\'s Day, Thanksgiving, Christmas, Valentine\'s Day or some special festivals, which will be a beautiful and warm gift.\r\n\r\nScarf Washing Tips:\r\nDry cleaning is strongly recommended\r\nIf washing by hand:\r\n--Do not use the drying machines\r\n--Do not use bleach products\r\n--Use a mild detergent formulated for scarf\r\n--Do not rub or scrub\r\n--Do not bleach\r\n--Gently wring after washing, hang dry\r\n--Do not dry in dryer\r\n--Do not twist or wring', 'Women\'s Pashmina Shawl and Scarf Warm Winter Pashmina Wraps Oversized Cashmere Scarves with Tassels', 420.00, 400.00, 'Products/t2xxbJi6sms0Vj71MuULZOLjIPrydY2KM8OBWL5e.jpg', 'Products/IY2k7X2smfD21yVLIaYfd6nBXe24rXWbrg4iGZhO.jpg', 'Products/30b03JTOpvisBXrnXfGGXjbyGZsTIU15uSyEk5Ht.jpg', 35, 7, '2024-03-10 11:09:13', '2024-03-10 11:09:13'),
(17, 'Le Voile women Linen Gradiant Scarf', 'Gradient Cotton is a perfect blend of comfort and style. Crafted with the finest cotton, these luxurious scarves provide exclusive warmth in soft colors that blend into any wardrobe.\r\nManufacturer ‏ : ‎ Le Voile.\r\nDepartment ‏ : ‎ women.\r\nOne Size\r\nCotton\r\nCare instructions : Hand Wash Only.\r\nClosure type : Pull-On.', 'Gradient Cotton is a perfect blend of comfort and style. Crafted with the finest cotton.', 200.00, 0.00, 'Products/RbG0TstcpQDJYiCBRPYzwgjgERMeWs2K1zRPQm2X.jpg', NULL, NULL, 43, 7, '2024-03-10 11:11:02', '2024-03-10 11:11:02'),
(18, 'Autumn And Winter Casual Mohair Wool Shawl', 'Mohair fabric is known for its durability, softness, shine and luster. moisture wicking, stretch and wrinkle resistance. It is a symbol of elegance, sophistication and luxury. Perfectly designed ensures optimum comfort and warmth.\r\n\r\nMujer is known for its durability, softness, shine and signature sparkle.Moisture wicking and resistant to stretching and wrinkling.\r\nSymbol of style, elegance and luxury.\r\nPerfectly designed for optimal comfort and warmth\r\n\r\nCare instructions : Hand Wash Only.', 'Autumn And Winter Casual Mohair Wool Shawl - Warm Scarf For Women Size (200cm*100cm)', 150.00, 0.00, 'Products/GPdcjKDGfCZYhOs5HXbawM0JTiCnowOw9JTyP3aP.jpg', 'Products/yzoDIQCMy5MbBEeqXt5lUyEJHsAJOoCJbnhtGkVx.jpg', 'Products/Ny2aBOxVe2Hoq5rREfSV2H9RcdpRvd9jThJ72XYu.jpg', 27, 7, '2024-03-10 11:12:18', '2024-03-10 11:12:18'),
(19, 'Abaya Short Design Islamic', 'Material composition : 65% Cotton 35%Polyester.\r\nCare instructions : Machine Wash.\r\nClosure type : Zipper.\r\nM/L from 60 to 85.\r\nXL/xxl from 85 to 120 kg.\r\nThe Alamalshop Abaya has a round-neck , which ensure a breathable and comfortable feel while wearing it. Furthermore, this clothing\'s floral pattern makes it look visually appealing and pleasing. M/L from 60 to 85 KG XL/xxl from 85 to 120 kg', 'Abaya Short Design Islamic Casual Long Sleeve Alamalshop for women', 375.00, 0.00, 'Products/rjSuStPfEPFdQiZmNCsclrNAWQMulpgXktd48WoA.jpg', NULL, NULL, 19, 8, '2024-03-10 11:21:24', '2024-03-10 11:21:24'),
(20, 'Isdal Prayer', 'HIGH QUALITY COTTON: The set is made of high quality cotton, providing a soft and comfortable wearing, and allows for ventilation during prayer.\r\nSimple and elegant design: the set features a simple and elegant solid design, making it suitable for everyday wear and various occasions without weighing the look down.\r\nFits a variety of sizes:Fits sizes from 140 to 45 pounds, ensuring it fits different sizes and styles.\r\nCOMFORT AND DURABILITY: Using the highest quality cotton, the set provides prayer comfort and is durable and long-term durability.\r\nSuitable for the month of Ramadan & Saying: This set is perfect for the blessed month of Ramadan, providing comfort and style during the prayer performing and helping you enjoy the fasting experience with ease and ease.\r\nGet a complete prayer set made of high quality cotton, consisting of a prayer drop with hijab, designed with elegance and simplicity to provide the utmost comfort during prayer. The set comes in a solid design, making it suitable for everyday occasions especially during the holy month of Ramadan.\r\n\r\nFits sizes from size 65 to 120 kg, making it suitable for different sizes and shapes. This prayer set offers simplicity and comfort during prayer, and the premium quality of cotton allows for breathability and comfort during use.\r\n\r\nPrepare for Ramadan in style and ease with this practical and stylish set, and enjoy your prayer with ease and comfort. This set can also be used as a perfect gift for loved ones and friends in this blessed month.', 'Isdal Prayer with Hijab Prayer Set for Women Abaya with a Plain Cotton Size from 65 to 120 Kilo Ramadan Isdal', 720.00, 680.00, 'Products/hiBBskUuxafyCaCMlEe9BmiO9MGZ9FjnGUScvcSq.jpg', 'Products/eXDJGPX45jrBdbMIonzZTSCReiVtczNT8C4iXkVZ.jpg', 'Products/t0ramilfvQ6Td2nUJPr6nlmhfAuVvrkp3KhYYmit.jpg', 23, 8, '2024-03-10 11:22:41', '2024-03-10 11:22:41'),
(21, 'Casual abaya for women', 'Material composition : 100% Cotton.\r\nLens material : Cotton.\r\nItem Weight ‏ : ‎ 11 Grams.\r\nDepartment ‏ : ‎ female.', 'Brand: Generic Type: Abayas Targeted Group: female', 645.00, 610.00, 'Products/MpNmf3OfWsI2qCDeO2aXjU1fp4zosCx9CpbKIjyg.jpg', 'Products/sICi7ka5eSKkCGWi1XWNlkT4u9aQWZlXr9nN08AW.jpg', 'Products/zYBI9jVve2WKw5VOO2UOpUumbnyyJcmMhU9zt2mj.jpg', 18, 8, '2024-03-10 11:23:59', '2024-03-10 11:23:59'),
(22, 'TOLI Unisex Kids Milton Pants', 'Plain blue milton pants.\r\nMaterial composition : Cotton.\r\nCare instructions : Machine Wash.\r\nClosure type : Pull On.\r\n\r\nBrand: TOLI.\r\nMILTON PANTS.\r\nProduct Dimensions ‏ : ‎ 20 x 20 x 20 cm; 240 Grams.\r\nDepartment ‏ : ‎ Unisex Kids.', 'Plain blue milton pants', 350.00, 0.00, 'Products/2RtUsr0AwgEROD2lcCtlQ2o8rixy6zLrJfbtuNv5.jpg', 'Products/VD1n26x0AdmyFm7VZfk5czSiyVMKAo49mHNdFLFB.jpg', 'Products/iw4am1q9Wr7pn9qupr8mDevV8kZGj8dsaaiA3Mdy.jpg', 32, 9, '2024-03-10 11:27:29', '2024-03-10 11:27:29'),
(23, 'Toli Kids sweatpants', 'Gabardine sweatpants.\r\nCare instructions : Machine Wash.\r\nClosure type : Pull On.\r\n\r\nSlim fit.\r\nProduct Dimensions ‏ : ‎ 20 x 20 x 20 cm; 1 Kilograms.\r\nDepartment ‏ : ‎ Unisex Kids.', 'Gabardine sweatpants.', 300.00, 0.00, 'Products/GpDeYD7vCfv8bY5gOA3lsyTlt4NMSJSyYJ81DSBB.jpg', 'Products/f7Tl6pmRFdzuILMdHGLD1sEj7V9GYppTTM5eZyex.jpg', 'Products/uHKctTvxwtaQ25Evp47QCFP7UwJOYXVFJAn8cPMA.jpg', 16, 9, '2024-03-10 11:28:53', '2024-03-10 11:28:53'),
(24, 'Jumpsuit', 'Size: 16.\r\n\r\nCare instructions : Machine Wash.\r\nClosure type : Button.\r\n\r\nGirls Dark Denim Bodysuit.\r\nItem Weight ‏ : ‎ 30 Grams.', 'Jumpsuit dark jeans', 685.00, 0.00, 'Products/PoKS61sxMnuwWrgLsJFauJ2CVDlRGSi51EEiH5Oe.jpg', NULL, NULL, 26, 9, '2024-03-10 11:30:17', '2024-03-10 11:30:17'),
(25, 'Andora Girls Jacket', 'Care instructions : Hand Wash Only.\r\nLining : Polyester.\r\nClosure type : Pull On.\r\n\r\nOur Model Is wearing Size 8.\r\nFur & Polyester Material.\r\nRegular Fit.\r\nLong Sleeves.\r\nSolid Pattern.\r\nColor: black,white.', 'Full White Snap Buttons Closure Notched Collar Jacket', 559.00, 519.00, 'Products/VpczXRpV9V42B8mAGfka8NhHaPZ9dItSZTjzDOTz.jpg', 'Products/xvMAaxyRzaLr9L8VeYppACONdciRlLSOBk8EHe6S.jpg', 'Products/pvN6Zcz8kzlQdHTia8LicI6ymyYAtdJZDnlaLwK7.jpg', 25, 10, '2024-03-10 11:33:38', '2024-03-10 11:33:38'),
(26, 'Andora Boys Long Sleeves', 'Andora fashion store for men and women offer a wide range of clothing, They may have various categories such as tops, bottoms, dresses, suits, and more.\r\n\r\nCare instructions : Hand Wash Only.\r\nLining : Polyester.\r\nClosure type : Zipper.\r\n\r\nOur Model Is wearing Size 8.\r\nPolyester Material.\r\nRegular fit.\r\nLong Sleeves.\r\nQuilted Pattern.', 'Andora fashion store for men and women offer a wide range of clothing,', 255.00, 0.00, 'Products/GnBQ3aJTcJ9JlSHFP8rfo4c77ZMs4lvMQrk9aTSz.jpg', NULL, NULL, 12, 10, '2024-03-10 11:34:50', '2024-03-10 11:34:50'),
(27, 'Andora 36W24B3901 Jacket', 'Care instructions : Hand Wash Only.\r\nLining : Polyester.\r\nClosure type : Zipper.\r\n\r\nRegular fit.\r\nLong Sleeves.\r\nTartan pattern.\r\nHooded Neck.\r\nZipper Closure.', 'Boys Hooded Neck Mustard & Grey Tartan Jacket', 400.00, 0.00, 'Products/4rtaMcIXbhXC3gy6wDHA3xGgg7pMssjMNzcZ0PPm.jpg', 'Products/uq1AOim32VZRKcDQUATEMnX72vhMCTKBRaHkQwIr.jpg', 'Products/PtKjTwPt2LKgTMPAyCK77nRp5jzMOKIztwWdZWR5.jpg', 12, 10, '2024-03-10 11:35:58', '2024-03-10 11:35:58'),
(28, 'kid PIX Girl Cotton Sleeve', 'Relaxed and wide size to ensure maximum comfort Not easy to wrinkle, shrink, or fade in the wash. Soft and lightweight yet durable, skin-friendly and breathable Hand wash gently or machine wash. Ensures unrestricted body movement Suitable for everyday use.\r\n\r\n\r\nMaterial composition : 100% Cotton.\r\nCare instructions : Machine Wash, Hand Wash Only.\r\nClosure type : Pull On.\r\n\r\nMade of soft and comfortable fabric.\r\nPerfect gift for children..\r\nSuitable for summer and easy to store.', 'Relaxed and wide size to ensure maximum comfort Not easy to wrinkle, shrink, or fade in the wash', 190.00, 0.00, 'Products/IuD6gv3gRMeqhoKYLe8lNWfW9h9KUBqEaJptvAmK.jpg', 'Products/iAyTEcjj1kUGhWYph7Ikb9R4B7sMLpsJ769T8oqv.jpg', 'Products/XhUz2J5oAzt3BuaIw47u9rLms5CBwSyDqx1bqgiH.jpg', 10, 11, '2024-03-10 11:39:27', '2024-03-10 11:39:27'),
(29, 'One to Twelve Unisex Kids', 'This T-shirt offer plush softness for everyday basics, given their ultrafine 100% Cotton composition with long lasting durability and comfort in mind.\r\nFASHION & FUNCTION: Premium raw edge seams provide an updated, modern look while keeping the bulk out of the fabric for less rub on your little one\'s sensitive skin.\r\nGIFT REGISTRY-READY: This T-shirt is a wardrobe essential. Easy to grab, wear and wash, this T-shirt makes for a perfect gift for a mom, dad, or growing family.\r\nFABRIC: Super Soft Cotton combed and ring-spun for durability, softness and no-pill washing.', 'One to Twelve Unisex Kids 2101 T-Shirt', 130.00, 110.00, 'Products/K7Hl3bpZXlARvuxJ9KJKgDVOFifXmrBVnOIehVy8.jpg', 'Products/qiAVTHpEWGz3da5b5lt8MNEuc788ZCGYFysDJ5Qf.jpg', 'Products/HaQyLOQBaRew0rsQCjyKwEOY1AqtcOHWQj4OgGg1.jpg', 19, 11, '2024-03-10 11:40:21', '2024-03-10 11:40:21'),
(30, 'Andora Boys T-Shirt', 'This Andora boy\'s patterned tee is perfect for hot summer days. Made of soft cotton material for an extra comfortable fit, it features a stylish self pattern that will make your little one look cool and trendy. With a comfortable round neck design, this t-shirt can be easily paired with anything during summer for an absolutely effortless look.', 'Made of soft cotton material for an extra comfortable fit', 175.00, 140.00, 'Products/tr2wzsYNFbNsvtkxKc42pjUasCmznC7gthidwA8T.jpg', NULL, NULL, 41, 11, '2024-03-10 11:41:18', '2024-03-10 11:41:18'),
(31, 'Girl\'s Prayer Dress', 'HELP AND ENCOURAGE your girl adhere to prayer and to Islamic teachings with this maxi prayer dress set your little girl will be encouraged to follow Islamic teachings. ‍👧‍👧\r\n- PERFECT GIFT for your kids, this Muslim maxi dress for girls can make the perfect gift for your little girl to show her the importance of praying as well as covering. 👧🏻🤲🏻\r\n- LIGHT WEIGHT prayer dress, Our Islamic prayer clothes lightweight deign makes it portable and easy to store. with multiple maxi prayer clothes color options. 🏻👌🏻\r\n- PERFECT FROM 5-13 years old, Our Islamic dresses for kids sizes are designed according to the exact age. we recommend ordering prayer dresses according to age. 📏✔️\r\n- A ROSARY GIFT will be sent alongside your prayer dress. We design our islamic prayer clothes to meet your kid\'s spiritual and religious needs.', 'Girl\'s Prayer Dress Children\'s Hijab Dress Girl\'s Two Piece Floral Printed', 420.00, 400.00, 'Products/RbcZEI2g3tiBhgiRaH5hLTp40BZr8VToViZLPrFC.jpg', 'Products/oyT9j5Ij6oNLoawATTNCD1zeHong3BnhXRsSEcNO.jpg', 'Products/PSW5hA236FtUQq47dCjstpq0jqqEHqQSUPNIz9pO.jpg', 17, 12, '2024-03-10 11:43:26', '2024-03-10 11:43:26'),
(32, 'Girls Chic Summer Casual Dress', 'Sleeve Type: Sleeveless\r\nClosure Type: Zipper\r\nSleeve Type: Sleeveless\r\nClosure Type: Zipper\r\nPattern: Polka Dots', 'Girls Chic Summer Casual Dress Two Piece Dress', 550.00, 0.00, 'Products/l6fb6wGubzVdaz5zT72NRlyALkouB5rEHlOyDhyz.jpg', NULL, NULL, 14, 12, '2024-03-10 11:44:06', '2024-03-10 11:44:06'),
(33, 'Mermaid Tutu Dress Girls', 'Mermaid tutu skirt is made of crochet top and soft nylon tulle, is strech.\r\nHandmade vibrant color mermaid tulle costume decor with starfish and flowers.\r\nAdjustable satin shoulder straps, knitted crochet elastic top bodice, matching a headband.\r\nGreat for mermaid birthday party, princess pageant, Halloween costume, photography. Your little princess will love this dress so much. Her face was priceless when you showed it to her.\r\nHand wash cold separately, No bleach, Line dry, Cool Iron if needed. Do not dry clean.', 'Cotrio Mermaid Tutu Dress Girls Mermaid Birthday Party Princess Dress Halloween Costume Outfits Toddler Kids Mermaid Starfish Tulle Tutu Skirt (4-5 Years, Light Purple)', 1350.00, 1100.00, 'Products/eOCHTXqDpnOMvHs1xNIlLNBwqE2RMLjNsKKbmrRA.jpg', 'Products/ARzUwLo5mk7k87CDLO2vuoBrJ5U7C54deRk7kTT0.jpg', 'Products/8MDUoE92BTcqvksMkHSfMy9nfnIyOcTjC2gIMyiJ.jpg', 11, 12, '2024-03-10 11:45:04', '2024-03-10 11:45:04'),
(34, 'Carrot Baby Girls Printed T-Shirt', '2230255-06-16-Carrot Baby Girls Printed Lime Green T-shirt\r\nBrand: Carrot\r\nMaterial composition: 100% Cotton\r\nSleeve Type: Short Sleeve\r\nFit type: Straight Fit\r\nClosure Type: Pull On', 'Amazing Carrot Baby Girls Printed T-Shirt', 65.00, 0.00, 'Products/vVKUkp6E0zoQyLHJQBaDzDHmXq3xownGQ2WgFn06.jpg', NULL, NULL, 30, 13, '2024-03-10 11:47:02', '2024-03-10 11:47:02'),
(35, 'Carrot  Baby girls printed t-Shirt', 'Brand: Carrot\r\nAge range description: Baby\r\nFit type: Regular Fit\r\nPattern: Printed', 'amazing Carrot  Baby girls printed t-Shirt', 95.00, 90.00, 'Products/T9R1vTtDgqtTDfNJ9fPUp898QN7EboGReu7ZoFWz.jpg', NULL, NULL, 31, 13, '2024-03-10 11:47:52', '2024-03-10 11:47:52'),
(36, 'Baby boys printed t-Shirt', 'Brand: Carrot\r\nAge range description: Baby\r\nFit type: Regular Fit', 'Great Carrot Baby boys printed t-Shirt', 95.00, 0.00, 'Products/arZqTg6gvMKRoCYCn71Oc37OYSnLOImIe0L1juxh.jpg', NULL, NULL, 12, 13, '2024-03-10 11:48:58', '2024-03-10 11:48:58'),
(37, 'Carrot Girls Short', 'Care instructions: Machine Wash\r\nFit type: Relaxed Fit\r\nClosure Type: Drawstring', 'Great Carrot Girls Short', 35.00, 0.00, 'Products/09jcmTtVLwKjnpgBVpqhL3kXnK0RIfRqhkAO9PNz.jpg', NULL, NULL, 12, 15, '2024-03-10 11:50:51', '2024-03-10 11:50:51'),
(38, 'Carrot  Baby Boys Jacket', 'Brand: Carrot\r\nClosure Type: Button\r\nStyle: Wrap\r\nMaterial: 80% Cotton, 20% Polyester\r\nBrand: Carrot\r\nStyle: Wrap', 'Amazing Carrot  Baby Boys Jacket', 55.00, 45.00, 'Products/jcuc4rUrxXH1v99WzYE2EnFOGU99zdeFiqeaoyCd.jpg', NULL, NULL, 38, 15, '2024-03-10 11:51:36', '2024-03-10 11:51:36'),
(39, 'Carrot Baby', 'Care instructions: Machine Wash\r\nStyle: Modern\r\nFit type: Relaxed Fit\r\nClosure Type: Drawstring', 'Carrot Baby Short', 45.00, 0.00, 'Products/RONFzgL5vEs1fx69Nz0UOXYQNOAZTdkJFurJVZCy.jpg', NULL, NULL, 12, 15, '2024-03-10 11:52:46', '2024-03-10 11:52:46'),
(40, 'Baby Shoora Unisex', 'Baby Shoora Velvet Pajama Set Of 2 Pieces Long Sleeves Hooded Sweatshirt&Pants Embroidered Turtle For Unisex-Mint Green-6-12Month.\r\n\r\nPajama Set\r\nBrand: Baby Shoora\r\nMade In: Egypt\r\nMaterial: Velvet\r\nTarget Gender: Unisex', 'Baby Shoora Velvet Pajama Set Of 2 Pieces Long Sleeves Hooded', 410.00, 389.00, 'Products/yYkO7PVwkNeNg4LVqekWAodxP5rfmFFtW2Up42Hf.jpg', 'Products/i7cZ4GXEiVn8F1QyDS3EpvD8VcsjqZjXtdDLhapi.jpg', 'Products/xbVZAPQcMmiiUVbVxFK3KS0gWBCva9MVsODfaQ47.jpg', 33, 16, '2024-03-10 11:56:19', '2024-03-10 11:56:19'),
(41, 'Baby Shoora Girls', 'Baby Shoora Cotton Pajama Set Of 2 Pieces Long Sleeves Hooded Sweatshirt&Pants Embroidered Dog For Girls-Rose-3-6Month.\r\nPajama Set\r\nBrand: Baby Shoora\r\nMade In: Egypt\r\nMaterial: Cotton\r\nTarget Gender: Girls', 'Baby Shoora Cotton Pajama Set Of 2 Pieces Long Sleeves Hooded', 379.00, 0.00, 'Products/gS9H08WOLsnijxsnKBhp4ZHJFKIvR7aezLyeoegG.jpg', 'Products/MJwcRN9gk9R5iMIgDKqEp0ydwqF0GU0Y8Gpk3eDf.jpg', 'Products/eoNj8dpHt1NoOQ60FqwXgfOF1d1qszewzg2GYNGG.jpg', 43, 16, '2024-03-10 11:57:13', '2024-03-10 11:57:13'),
(42, 'Baby Shoora Boys', 'Baby Shoora Cotton Pajama Set Of 2 Pieces Long Sleeves Hooded Sweatshirt&Pants Shape Rabbit For Boys-Baby Blue-6-12Month\r\nPajama Set\r\nBrand: Baby Shoora\r\nMade In: Egypt\r\nMaterial: Cotton\r\nTarget Gender: Boys', 'Baby Shoora Cotton Pajama Set Of 2 Pieces Long Sleeves Hooded', 378.00, 340.00, 'Products/aySYkR3FjyywmAI3EnWQAs9XmFDkUoXkFnxaVC4q.jpg', 'Products/a1vlPXphyBzNstAfc6jxmqUlwewpioWNCnvwzmi1.jpg', 'Products/Wl3oeFpuLvP1oRoccHw60ZA1t5uIccLkslg6lUWY.jpg', 36, 16, '2024-03-10 11:58:04', '2024-03-10 11:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `role` enum('0','1','','') NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `address`, `phone`, `password`, `city`, `role`, `remember_token`, `created_at`, `updated_at`, `provider_id`) VALUES
(1, 'Mostafa', 'mustafagamal35@gmail.com', '2024-02-01 11:19:13', 'ain shames', 1234567890, '$2y$12$re4U2Lsr/Xz3KEUbCXctAetZNJqSYVZEZV8UknR7XqimMaaMlQzdq', 'Cairo', '1', 'MQLIF2FwSy9gFReq97ado9bdk15e06emm9rcKGsAniALCjQKi3pQ95MeJJpA', '2024-02-05 09:18:29', '2024-02-05 09:18:29', NULL),
(2, 'ali ahmed', 'a@a.a', '2024-03-07 15:00:39', 'el maadi', 1141669674, '$2y$12$OwncUGPj7hvqFj6XkCQgxugalNsU7Y12HepeVNw1AV8uN0Yb1dKcy', 'Cairo', '0', NULL, '2024-03-07 12:58:41', '2024-03-10 07:49:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `shippedDate` date DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`id`, `orderDate`, `shippedDate`, `product_id`, `quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2024-03-09 11:49:39', '2024-03-08', 1, 1, 2, '2024-03-09 09:49:46', '2024-03-09 09:49:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_children`
--
ALTER TABLE `category_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_children_category_id_foreign` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryChild_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `city_name` (`city`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_orders_product_id_foreign` (`product_id`),
  ADD KEY `user_orders_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_children`
--
ALTER TABLE `category_children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_children`
--
ALTER TABLE `category_children`
  ADD CONSTRAINT `category_children_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categoryChild_id` FOREIGN KEY (`category_id`) REFERENCES `category_children` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `city_name` FOREIGN KEY (`city`) REFERENCES `cities` (`name`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
