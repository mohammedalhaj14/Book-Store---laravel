-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2026 at 03:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `genre` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `slug`, `author`, `isbn`, `description`, `price`, `stock_quantity`, `genre`, `cover_image`, `created_at`, `updated_at`, `category_id`, `deleted_at`) VALUES
(1, 'The Great Gatsby', 'the-great-gatsby', 'F. Scott Fitzgerald', '9780743273565', 'A classic novel about the American dream.', 15.99, 10, 'Classic', 'book_covers/cjtPX7IrWU5T0S6EzxJW1uabPxq5dISaxGTDvghu.png', '2026-01-26 15:52:18', '2026-01-26 15:59:05', 1, '2026-01-26 15:59:05'),
(2, 'A Brief History of Time', 'a-brief-history-of-time', 'Stephen Hawking', '9780553380163', 'A landmark volume in scientific writing.', 24.50, 4, 'Science', 'book_covers/hawking_placeholder.jpg', '2026-01-26 15:52:18', '2026-01-30 17:22:04', 2, NULL),
(3, 'Maxime ullam dolore.', 'maxime-ullam-dolore', 'Blanca Ferry', '9799923570738', 'Non voluptatem a occaecati enim. Doloribus dolorem aperiam magnam et magnam. Quos ratione eos nesciunt odit vitae non. Suscipit placeat rerum consequatur perferendis ea et dolores cupiditate.', 14.42, 71, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(4, 'Hic eaque distinctio et.', 'hic-eaque-distinctio-et', 'Aurelie Harvey DDS', '9791812313440', 'Labore laborum pariatur consequuntur laudantium. In voluptas ipsam consequatur dolore. Magnam nesciunt et sit veritatis doloremque totam. Impedit alias a et consequuntur porro.', 14.34, 99, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(5, 'Doloribus non natus.', 'doloribus-non-natus', 'Dr. Lewis Morissette', '9781380793850', 'Et voluptatem repellendus cupiditate sit. Velit quia voluptatum eius ut. Vitae esse debitis qui odit.', 28.04, 100, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(6, 'Tempore quidem quis.', 'tempore-quidem-quis', 'Opal Beer', '9786243869406', 'Aut error qui aut ut. Non facere rerum quasi iusto quo. Dicta consequatur animi totam ducimus repellat hic.', 21.61, 15, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(7, 'Dicta omnis.', 'dicta-omnis', 'Cesar Reichert', '9781077921955', 'Laborum incidunt in atque et. Eum dolorem voluptas voluptatem enim consectetur et. Ullam enim numquam cumque quia ut. Nihil ea in nobis eaque vero.', 48.27, 51, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(8, 'Molestiae aliquam voluptatem perspiciatis.', 'molestiae-aliquam-voluptatem-perspiciatis', 'Mason Brekke', '9790222311428', 'Error excepturi saepe minima reiciendis amet. Ea mollitia et adipisci iure. Molestiae ut iste optio quia eum sequi.', 44.20, 31, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(9, 'Earum eos rerum quod.', 'earum-eos-rerum-quod', 'Kevon Feest', '9796936011708', 'In officia eos sit ut. Omnis exercitationem inventore minima at unde quidem. Officia quas quis eum beatae repellendus.', 17.38, 12, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(10, 'Itaque debitis qui.', 'itaque-debitis-qui', 'Delta Gleichner DDS', '9795463368392', 'Ullam est cupiditate tempore assumenda. Exercitationem aut et accusamus asperiores illo et. Quaerat natus animi excepturi similique molestiae.', 25.28, 14, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(11, 'Et et.', 'et-et', 'Bianka Lang DVM', '9789290373971', 'Eveniet temporibus commodi quis beatae. Eligendi maxime qui et rerum vel repudiandae dolorem. Consectetur consequuntur et asperiores. Praesentium harum alias eos sed in.', 18.83, 32, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(12, 'Quasi quis nostrum rerum.', 'quasi-quis-nostrum-rerum', 'Toy Swaniawski', '9787684103401', 'Qui consequuntur molestiae voluptatem numquam. Odit quas a ut officia corrupti. Omnis quos enim perspiciatis in.', 11.51, 74, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(13, 'Dolores deserunt modi est.', 'dolores-deserunt-modi-est', 'Dr. Oswald Emard', '9785587595682', 'Non velit quibusdam ut quia iure. Quae aut ullam ipsum nisi consectetur. Ut sit sunt reprehenderit sunt minima. Ut modi autem eligendi.', 15.56, 5, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(14, 'Est itaque dolor esse laborum.', 'est-itaque-dolor-esse-laborum', 'Alena Sporer', '9791093718989', 'Quo ea quas temporibus enim quo quis magnam. Est voluptatum molestiae occaecati facilis iusto earum. Blanditiis deleniti cupiditate totam ratione id quae dolores. Eum quidem voluptatibus quia tenetur.', 26.04, 12, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(15, 'Ut autem quidem qui.', 'ut-autem-quidem-qui', 'Obie Lueilwitz', '9785005844132', 'Aut incidunt laboriosam deserunt ad perspiciatis quo sit sit. Velit debitis velit voluptas ut. Tenetur ut doloribus molestias ipsam ut expedita. Aliquam suscipit doloremque et dicta ipsam distinctio. Optio quia excepturi ab eos illum veniam.', 18.09, 36, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(16, 'Qui reprehenderit commodi.', 'qui-reprehenderit-commodi', 'Kristy Hahn', '9799329735571', 'Exercitationem voluptas repellendus voluptatem non occaecati. Ut eius eum odio officiis eaque. Deleniti sed est ipsa pariatur doloribus quaerat eos porro. Neque qui omnis dolores qui quo. Architecto aut voluptates veritatis voluptas quos.', 14.87, 30, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(17, 'Commodi enim deserunt quisquam.', 'commodi-enim-deserunt-quisquam', 'Dr. Noemie Pollich', '9782970490067', 'Aspernatur voluptate dolorem molestiae ea quisquam. Numquam maxime adipisci qui. Qui ducimus rerum provident debitis dolorem cumque ad. Aut eaque voluptates delectus occaecati numquam.', 35.37, 47, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(18, 'Qui repellendus molestiae tenetur.', 'qui-repellendus-molestiae-tenetur', 'Mrs. Alia Lesch', '9781943717422', 'Quia fugit consequatur earum quia molestiae aspernatur. Est est modi velit non quis accusamus. Mollitia quam iure et earum ipsam magnam. Ullam cumque nulla accusamus voluptate fuga est cum.', 17.82, 86, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(19, 'Voluptatum nesciunt molestiae eveniet.', 'voluptatum-nesciunt-molestiae-eveniet', 'Alison Nader', '9782222745426', 'Adipisci rem nesciunt quaerat quis mollitia commodi repudiandae. Accusantium et nulla delectus ullam aspernatur quae. Repellendus omnis maiores voluptatibus velit consectetur mollitia repellendus. Nobis sit est et cum iure nihil.', 30.85, 87, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(20, 'Expedita itaque architecto.', 'expedita-itaque-architecto', 'Isobel Sporer', '9791251971652', 'Ex est ab sint consectetur magnam. Quidem incidunt consequatur quia voluptatem quas. Harum sit fugit et sit rerum in tempore quibusdam.', 34.11, 30, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(21, 'Animi totam ut.', 'animi-totam-ut', 'Berniece Miller', '9785441884051', 'Totam natus nobis est iure ab. Dolore voluptates assumenda amet qui atque et. Dolor in sit ut et nostrum minus.', 32.48, 83, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(22, 'Voluptatem voluptatum reprehenderit.', 'voluptatem-voluptatum-reprehenderit', 'Brielle Schmeler', '9783686188781', 'Cum dolorum aut praesentium. Maiores placeat aliquid ullam qui. Laudantium rem doloribus eum ut explicabo qui optio vitae. Eius iste porro odio totam quas rem.', 12.43, 46, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(23, 'Voluptatum rerum debitis inventore.', 'voluptatum-rerum-debitis-inventore', 'Ashlynn Hackett', '9782620456450', 'Officia est voluptatem cumque non mollitia non ex rem. Nisi corporis qui maiores voluptatem earum quod mollitia. Odio consectetur nisi corrupti numquam sunt.', 40.64, 8, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(24, 'Earum in ut.', 'earum-in-ut', 'Rubye Turner II', '9785412445427', 'Impedit laborum blanditiis animi consequatur quia deserunt. Qui est aut sed. Rem soluta rerum soluta reiciendis. Distinctio consequatur eveniet ratione quo ducimus dolores assumenda.', 35.46, 36, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(25, 'Modi maxime.', 'modi-maxime', 'Cathrine King', '9791540702134', 'Corrupti esse fuga eaque placeat molestias vel cupiditate aut. Possimus et optio error tenetur repellat harum. Optio est sit omnis et. Nesciunt voluptatem repellat culpa iure nemo optio adipisci.', 41.96, 38, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(26, 'Aut quae architecto.', 'aut-quae-architecto', 'Dr. Waylon Runolfsdottir', '9784308411973', 'Rerum tenetur voluptatum nihil aperiam saepe unde. Voluptatem consequatur iusto est.', 41.83, 10, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(27, 'Asperiores aut omnis.', 'asperiores-aut-omnis', 'Felipe Schinner', '9789156275838', 'Deleniti nihil qui rerum est. Est ipsam qui voluptate ex nesciunt maiores recusandae corporis. Sapiente voluptas nam est error. Repellendus ea necessitatibus repudiandae qui. Aliquid praesentium aut et dicta nihil sunt placeat.', 37.29, 96, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(28, 'Ipsam aspernatur earum magni.', 'ipsam-aspernatur-earum-magni', 'Lillie Luettgen', '9795986544662', 'Id unde illum modi magnam atque. Assumenda quia quia enim id consectetur inventore. Iusto omnis quisquam sequi quia doloribus quia. Inventore est esse non consequuntur quos officia temporibus. Vitae rem asperiores eius odit sint necessitatibus reiciendis.', 27.70, 96, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(29, 'A quia distinctio.', 'a-quia-distinctio', 'Prof. Joany Considine', '9780581570161', 'Mollitia voluptatum dignissimos omnis et fugit occaecati. Sapiente ab dolor sequi. Sunt dolor iusto laborum. Pariatur aut distinctio omnis.', 34.88, 69, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(30, 'Sit aut dolorem eum.', 'sit-aut-dolorem-eum', 'Miss Sunny Cole Jr.', '9785397371476', 'Tempore tempore iusto ipsam est. Libero architecto qui voluptas voluptatem. Ab non eligendi nisi reiciendis nulla. In quia dolores quo et tempore.', 42.61, 83, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(31, 'Natus aut tempora.', 'natus-aut-tempora', 'Casper Heidenreich', '9791073073855', 'Odio eum voluptas hic nesciunt ullam. Id fugit aspernatur est in ad fugit. Facere id quia ut totam libero cumque ut.', 44.19, 49, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(32, 'Atque earum harum nulla.', 'atque-earum-harum-nulla', 'Scotty Marks', '9792848457559', 'Nemo accusantium eum nam animi eligendi excepturi. Possimus accusantium porro recusandae molestiae quia dolores itaque.', 27.54, 52, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(33, 'Voluptas quia vel et.', 'voluptas-quia-vel-et', 'Isabelle Gusikowski', '9796558831166', 'Possimus in cupiditate dolorum dolorem laborum. Quia saepe molestiae aliquam voluptatem magnam. Occaecati voluptas sed aspernatur non molestiae dolor. Eum ullam voluptates officiis tempore consequuntur harum. Ipsum quod necessitatibus sunt dolores reiciendis impedit reiciendis.', 17.44, 80, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(34, 'Aut animi facere.', 'aut-animi-facere', 'Kaley Daniel DDS', '9789930195079', 'Officia officiis quo placeat id impedit distinctio. Ut nemo ab deserunt eaque ea possimus. Consequuntur corrupti labore aperiam facere vero incidunt et. Occaecati ab sint qui tempora consectetur asperiores quis.', 40.38, 76, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(35, 'Fugiat perferendis.', 'fugiat-perferendis', 'Magdalen Ruecker', '9783358143728', 'Voluptas deleniti aut nobis quibusdam itaque. Enim reprehenderit exercitationem amet numquam rerum quaerat deleniti voluptas. Sed ipsum quia molestiae et sit harum enim.', 42.88, 30, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(36, 'Voluptatem saepe.', 'voluptatem-saepe', 'Evangeline Langosh DVM', '9793907627470', 'Dolore autem nostrum qui reprehenderit labore sed. Iure consequatur quae consequatur molestias ipsum. Aliquam quis possimus accusantium consectetur ullam sunt vero ut.', 23.44, 100, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(37, 'Et nulla minima pariatur.', 'et-nulla-minima-pariatur', 'Roxane Jaskolski', '9781180208431', 'Atque provident cum ullam aut. Sequi sit numquam praesentium ullam itaque quidem aperiam. Cupiditate maxime dolor qui quia ab esse et.', 31.22, 19, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(38, 'Dolorem et eligendi velit.', 'dolorem-et-eligendi-velit', 'Stacey Hansen V', '9793201837018', 'Aperiam odio dolorum occaecati ab. Quisquam mollitia sit voluptas aut ut. Laudantium rerum tenetur rem impedit corporis officia.', 16.74, 14, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(39, 'Tempora quis itaque neque.', 'tempora-quis-itaque-neque', 'Kianna Marquardt', '9789541153277', 'Quo sed animi explicabo fugiat qui. Nulla porro consequuntur et non ab quisquam velit dolorem. Itaque debitis est sed in illum.', 30.04, 50, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(40, 'Sit quis atque.', 'sit-quis-atque', 'Brice Yost', '9799454774902', 'Corrupti doloremque sed necessitatibus facere quos. Doloribus repellat voluptatem quas ratione. Quo inventore culpa repudiandae neque. Ut autem quidem rerum tenetur.', 37.26, 57, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(41, 'Excepturi officia amet repellendus.', 'excepturi-officia-amet-repellendus', 'Gustave Cole', '9782883149083', 'Sunt rerum ut at et. Harum ut quae aperiam necessitatibus inventore aperiam molestias.', 41.92, 86, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(42, 'Amet enim natus.', 'amet-enim-natus', 'Prof. Jane Hudson', '9790221366610', 'Illo debitis rem voluptatibus explicabo repudiandae eos. Fuga et necessitatibus commodi velit ea error porro. Voluptatem cum possimus nisi sapiente quam ea molestiae. Vitae distinctio molestiae doloribus id corporis.', 32.55, 49, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(43, 'Tempora ipsam labore.', 'tempora-ipsam-labore', 'Brycen Hayes', '9798965483624', 'Voluptas libero consectetur sunt et illo in doloremque. Unde cumque qui a quis. Eos eius tempora sed nostrum rerum ea. Eaque modi quia illo deserunt assumenda totam sed commodi.', 32.70, 75, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(44, 'Ea eos delectus.', 'ea-eos-delectus', 'Creola Herzog', '9783928929707', 'Aut est et odio doloribus distinctio eaque nobis. Reiciendis est autem vero neque cum placeat velit. Ipsa aut a delectus quod rerum soluta est quia.', 20.58, 7, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(45, 'Dolor quo quis eos.', 'dolor-quo-quis-eos', 'Valentina Volkman', '9797493428138', 'Voluptatem eligendi fugiat culpa quia sint recusandae architecto numquam. Id aut vel ab tempora. Ad ab inventore enim beatae. Ipsam odit rerum placeat assumenda et velit repellat. Magni officiis laboriosam quam ut.', 34.98, 32, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(46, 'Quam optio laudantium.', 'quam-optio-laudantium', 'Sherman Hermiston', '9791923020886', 'Ipsa ut at commodi. Qui accusantium iure quibusdam assumenda. Animi ut officiis sed laudantium.', 15.64, 22, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(47, 'Possimus libero veniam.', 'possimus-libero-veniam', 'Yoshiko Williamson', '9799663136256', 'Ipsa itaque tempora distinctio similique autem. Consequatur molestias occaecati placeat consequuntur est saepe molestiae. Illo aut error nihil sint. Voluptatum odio ut est eum labore non atque.', 44.88, 41, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(48, 'Ad placeat.', 'ad-placeat', 'Alec Sauer', '9784599968842', 'Itaque ad sunt est quaerat rem totam vero. Nesciunt voluptatibus sed quidem sunt accusantium. Amet sit qui soluta facilis assumenda.', 21.93, 49, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(49, 'Facere ducimus.', 'facere-ducimus', 'Ms. Angelina Turner', '9793985306984', 'Autem et corporis ea aut iste. Id eum et ad impedit et. Qui laboriosam vero animi.', 16.52, 36, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(50, 'Rem nihil ex qui.', 'rem-nihil-ex-qui', 'Prof. Fanny Wehner', '9784231272146', 'Et quis iste consectetur id quo cumque ratione. Eos autem neque ullam et consequuntur. Corrupti ea officia veniam sapiente cupiditate quia pariatur. Aperiam optio id dolores ducimus nulla. Aut ea iusto enim voluptatum.', 15.14, 92, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(51, 'Nulla earum beatae doloribus.', 'nulla-earum-beatae-doloribus', 'Dewayne Feil', '9798058608347', 'Doloribus aut voluptas veritatis sint qui sed ea tempora. Quas repellendus aliquid dolores blanditiis dolores. Sed ut et dolorum nisi nihil ut. Incidunt ut fugiat et et occaecati quo. Et quisquam officiis mollitia rem voluptate.', 32.87, 82, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(52, 'Quia aut odit id.', 'quia-aut-odit-id', 'Prof. Gabe Ward III', '9788246482316', 'Maxime quod magni impedit dolores dolorem. Aperiam architecto enim nihil dicta. Debitis sed qui recusandae temporibus officiis molestiae.', 22.69, 90, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(53, 'Non non iusto.', 'non-non-iusto', 'Albertha Erdman', '9795346711161', 'Qui nobis nam officia. Quas cupiditate dolor repellendus reprehenderit at. Est quaerat culpa in rerum facere a. Voluptatem temporibus itaque beatae modi voluptatum.', 22.03, 100, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(54, 'Id soluta earum velit facilis.', 'id-soluta-earum-velit-facilis', 'Gerda Thompson', '9794861477705', 'Quia amet quo consequatur dolor et rerum magni blanditiis. Non est et ut. Placeat non voluptate et.', 24.53, 53, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(55, 'Magni vel rerum ipsam.', 'magni-vel-rerum-ipsam', 'Annette Jast', '9798947123012', 'Voluptatibus quaerat qui quos autem ad odit dolore eveniet. Deleniti eos ut non eaque non commodi. Neque eos quia maxime tenetur consequuntur laudantium. Asperiores ipsa est at error ipsam debitis aut quo. Culpa vero distinctio sed iste quis est.', 10.21, 66, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(56, 'Laboriosam est recusandae quidem.', 'laboriosam-est-recusandae-quidem', 'Prof. Willis Jacobson', '9782224544010', 'Enim id ab nihil molestiae sint eius ad. Ad qui est minima repudiandae quo ad. Quo a iure ducimus sit consequatur non nemo. Vel optio quasi quis sint praesentium quod et.', 38.33, 17, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(57, 'Ullam necessitatibus culpa nobis.', 'ullam-necessitatibus-culpa-nobis', 'Prof. Elliot Stanton', '9788897256670', 'Sit quisquam quis qui culpa fugit placeat velit quos. Accusamus fuga omnis molestias optio. Voluptatem rerum aut repellat error molestiae ipsa. Deserunt et tempora aut autem autem.', 17.64, 43, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(58, 'Quam et voluptas.', 'quam-et-voluptas', 'Prof. Dereck Reynolds', '9793832041945', 'Aspernatur omnis non debitis consequatur quae nemo ea. Et sunt et labore odit voluptates. Et sunt impedit iste quibusdam enim laboriosam qui ex.', 22.61, 62, 'History', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(59, 'Iure in et.', 'iure-in-et', 'Hailie Renner', '9783910447905', 'Eos at asperiores porro vel eos. Consequatur rerum qui eligendi. Architecto vero eligendi omnis consectetur dolor velit consequatur. Laborum corrupti quaerat delectus assumenda alias.', 28.72, 40, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(60, 'Dicta aut maiores enim.', 'dicta-aut-maiores-enim', 'Gwen Hirthe', '9785451213964', 'Voluptas alias ut ab harum. Cumque deserunt quas mollitia voluptatem dolor ipsam ex. Id in quod natus quis debitis earum magnam. Molestias aperiam expedita et provident.', 21.59, 2, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(61, 'Hic explicabo vel a.', 'hic-explicabo-vel-a', 'Edd Kuhn', '9791504367072', 'Corporis incidunt quibusdam et voluptas commodi. Qui odit dicta ut in nostrum neque vel. Sit velit repellendus quia laborum cumque sunt ratione.', 38.34, 52, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(62, 'Ab in tenetur velit voluptatem.', 'ab-in-tenetur-velit-voluptatem', 'Jimmy Walsh PhD', '9788394292324', 'Ut nisi necessitatibus et dolores. Non excepturi vel est. Beatae dolor aut minus harum amet accusamus.', 39.78, 37, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(63, 'Non et voluptatem laboriosam.', 'non-et-voluptatem-laboriosam', 'Mr. Jaylan Gutmann II', '9797673583374', 'Doloribus quis quasi harum inventore fuga ut corrupti. Recusandae culpa doloremque vitae ullam nam a dolore. Culpa neque ratione earum laborum. Perferendis consequuntur eligendi nemo excepturi aliquid quasi.', 32.51, 43, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(64, 'Quia modi officiis.', 'quia-modi-officiis', 'Miss Delia Torp V', '9785944064950', 'Id non iure ut vel. Perspiciatis animi sed et quibusdam omnis facilis libero id. Neque sit dolores non corporis sed.', 18.33, 52, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(65, 'Quis quae.', 'quis-quae', 'Erich Cole', '9784623219322', 'Officia nesciunt enim natus quibusdam. Nulla quo occaecati numquam et consequatur excepturi. Amet cumque natus magnam consequuntur. Adipisci quae officia voluptas et.', 27.56, 66, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(66, 'Vitae nihil illo vero sint.', 'vitae-nihil-illo-vero-sint', 'Emilie Miller', '9780781239561', 'Quae rerum odit et tempora. Repellat aut sed voluptate ab. Blanditiis quidem non eaque earum labore est. Ducimus harum rem vel dolores quibusdam voluptas et.', 15.68, 27, 'Fiction', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(67, 'Libero reiciendis eaque corporis.', 'libero-reiciendis-eaque-corporis', 'Sarina Aufderhar', '9786103949347', 'Voluptatem quia esse tempora illo omnis. Doloremque culpa dignissimos et. Illo fuga non rerum non itaque.', 39.37, 6, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL),
(68, 'At consectetur est.', 'at-consectetur-est', 'Otis Hyatt', '9797647790753', 'Unde vel perferendis ad tempore nobis et doloremque. Quod illum perspiciatis atque eveniet non maxime. Mollitia sed ipsum sit. Vero adipisci quibusdam similique itaque et asperiores.', 18.21, 41, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(69, 'Aliquam laborum deserunt minus.', 'aliquam-laborum-deserunt-minus', 'Frances Volkman', '9785937121608', 'Ea mollitia minus sint odio. Nobis nihil rerum temporibus sed. Deleniti id sit magnam qui occaecati vel.', 29.33, 70, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(70, 'Vitae corrupti voluptas.', 'vitae-corrupti-voluptas', 'Dr. Kamren Grady', '9799565098560', 'Ea deserunt officia et quo et. Culpa dolorem dolore et eos mollitia doloremque. Occaecati illo et aut soluta consequatur. Possimus facilis totam distinctio veritatis et est.', 18.08, 55, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(71, 'Et quis dolores nam.', 'et-quis-dolores-nam', 'Adam Smitham III', '9797576848365', 'Et culpa suscipit ut aut. Provident nostrum ad dolorem excepturi eius. Veniam aut facere consequatur vitae necessitatibus vitae.', 46.46, 63, 'Mystery', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 2, NULL),
(72, 'Et quia qui.', 'et-quia-qui', 'Barry Bergnaum', '9783311700142', 'Dicta velit dolores voluptas dolorem aspernatur quo. Minus incidunt pariatur aut quae aliquam. Inventore at reiciendis odit vitae.', 25.59, 65, 'Tech', NULL, '2026-01-26 15:52:18', '2026-01-26 15:52:18', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Fiction', 'fiction', '2026-01-26 15:52:18', '2026-01-26 15:52:18'),
(2, 'Science', 'science', '2026-01-26 15:52:18', '2026-01-26 15:52:18');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_20_145609_create_books_table', 1),
(6, '2026_01_20_194337_create_orders_table', 1),
(7, '2026_01_20_194931_create_order_items_table', 1),
(8, '2026_01_21_144459_create_categories_table', 1),
(9, '2026_01_21_145419_add_category_id_to_books_table', 1),
(10, '2026_01_22_122924_add_role_to_users_table', 1),
(11, '2026_01_23_152355_create_messages_table', 1),
(12, '2026_01_23_164259_make_subject_nullable_in_messages_table', 1),
(13, '2026_01_25_130356_add_user_id_to_orders_table', 1),
(14, '2026_01_26_172205_add_soft_deletes_to_books_table', 1),
(15, '2026_01_26_175013_add_slug_to_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `email`, `address`, `total_amount`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'mohammad Al Haj', 'mohammedalhaj14@gmail.com', 'hmra', 24.50, 'completed', '2026-01-30 17:22:04', '2026-01-30 17:22:04', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `book_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 24.50, '2026-01-30 17:22:04', '2026-01-30 17:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mohammedalhaj14@gmail.com', '$2y$10$C93.4TCf6N.UlEHX5uBi.uk42dvpPKpxlcSb4Awo7hj1wQUbT62xW', '2026-01-28 17:08:33');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'mohammad Al Haj', 'mohammedalhaj14@gmail.com', 1, NULL, '$2y$10$GDFWzVZWyAoPGYER9ovuS.ceKmMmAP/tzehlt6/LtkEkYIIxlqfiC', NULL, '2026-01-26 15:53:17', '2026-01-26 15:53:17'),
(4, 'mido', 'mohdalhaj2000@gmail.com', 0, NULL, '$2y$10$hElOXy3cmFEH3FHQ4PYKuuTEpGf1f5LDSsJuvDUaKVJHbs5ryvmWK', NULL, '2026-01-28 17:26:51', '2026-01-28 17:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`),
  ADD UNIQUE KEY `books_slug_unique` (`slug`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_book_id_foreign` (`book_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
