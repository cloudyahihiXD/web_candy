-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2024 lúc 06:36 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_candy`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`) VALUES
(1, 'Candy', ''),
(2, 'Themes', ''),
(3, 'Party Supplies', ''),
(4, 'Holidays', ''),
(5, 'Stickers', ''),
(6, 'Occasions', ''),
(7, 'Toys & Accessories', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `shipping_address` longtext NOT NULL,
  `contact` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `email`, `shipping_address`, `contact`) VALUES
(2, 'Melody', 'e10adc3949ba59abbe56e057f20f883e', 'melody@gmail.com', 'Hanoi', 3226662638),
(3, 'Kuromi', 'e10adc3949ba59abbe56e057f20f883e', 'Kuromi@gmail.com', 'Hanoi', 0985727274);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `PaymentMethod` varchar(50) NOT NULL,
  `OrderStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `UserId`, `ProductId`, `Quantity`, `OrderDate`, `PaymentMethod`, `OrderStatus`) VALUES
(1, 2, 5, 1, '2024-04-23 14:57:24', 'COD', 'Delivered'),
(2, 3, 4, 1, '2024-05-04 12:36:50', 'COD', 'Delivered'),
(3, 3, 5, 1, '2024-05-04 12:34:42', 'VNPay', 'Confirm'),
(5, 2, 4, 1, '2024-05-04 12:34:49', 'COD', 'Confirm'),
(6, 2, 5, 1, '2024-05-04 12:34:55', 'COD', 'Confirm'),
(7, 2, 1, 1, '2024-05-04 12:35:00', 'COD', 'Confirm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategoryid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productCompany` varchar(255) NOT NULL,
  `productPrice` float NOT NULL,
  `productDescription` longtext NOT NULL,
  `productImage1` varchar(255) NOT NULL,
  `productImage2` varchar(255) NOT NULL,
  `productImage3` varchar(255) NOT NULL,
  `productAvailability` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `categoryid`, `subcategoryid`, `productName`, `productCompany`, `productPrice`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `productAvailability`) VALUES
(1, 1, 1, 'Starburst Fruit Chews Candy: 3LB Bag', 'Starburst', 15.5, 'Starbursts candy... a galaxy full of fruity flavor is packed into these stars of the confectionery universe. A chewy burst of refreshing fruit flavor, Starburst Fruit Chews are classic, bite-size, square-shaped taffies that have been making mouths water since 1959. They are easily recognized as the quintessential summertime candy snack, delivering sweet, refreshing fruit flavors in every piece.\r\n\r\nAssorted flavors include:\r\nStrawberry\r\nOrange\r\nCherry\r\nLemon\r\n\r\nThere are approximately 100 pieces per pound.\r\n\r\nBag contains 3 pounds of Starburst Fruit Chews Candy.\r\n\r\nMade in the USA.\r\n\r\nShipping Weight ~ 4 lbs.', '41176dc7b377a4348ab44093a8ba1ba0.png', '46ecb783488865e3f631edb1cfda3d0f.png', '0c480b330fd1191c83c225eb8f3f1890.png', 'In Stock'),
(2, 1, 1, 'Skittles Candy: 54-Ounce Bag', 'Skittles', 15.5, 'Skittles have recently been voted the most popular candy amongst youth in the United States. But did you know that these fruity morsels have also been voted the best chewy candy, as well as the trendiest decorating material, by the mythical creature community? (Though we’re told leprechauns and unicorns may have rigged the mythical polls, as they are rather partial to rainbow-colored sweets.) These bite-sized favorites are all the rage amongst regular people and magical beings alike, so what are you waiting for? Taste the rainbow, become a believer, and join the fandom! Who knows, you might even get to meet a few unicorns at the groupie meetings.\r\n\r\nFlavor assortment includes:\r\nStrawberry\r\nOrange\r\nGreen Apple\r\nLemon\r\nGrape\r\n\r\nResealable bag contains 54 ounces of Skittles Candy.\r\n\r\nMade in the USA.\r\n\r\nShipping Weight ~ 4 lbs.', '7ae4b139686c22007d3d9729a106e143.png', '1f71b24898dae841e4a191ad351d55d4.png', 'bcf845254ea5411dd2f09a55b1330a2d.png', 'In Stock'),
(3, 1, 1, 'Milk Chocolate Peanut M&M\'s Candy: 56-Ounce Jar', 'M&M\'s', 23.5, 'Everybody loves peanut M&M’s. They do. We conducted a poll. Of our office. And the guy at the gas station, selling handicrafts. Well, maybe it wasn’t scientific, but have you ever met anybody can resist the salty sweet combination? Don’t you kind of want some, right now?\r\n\r\nJar contains 56 ounces of Milk Chocolate Peanut M&M\'s Candy.\r\n\r\nMade in the USA.\r\n\r\nShipping Weight ~ 4 lbs.', '5c25c06b653ad532947500339b3ec3da.png', 'c4b5197fc8309dbc013c8f351a098db3.png', '1dc525a1d941cdb6ce3710fa62f37986.png', 'In Stock'),
(4, 1, 2, 'Kopiko Coffee Candy - Cappuccino: 200-Piece Tub', 'Kopiko', 23.5, 'Delicious mini packets of hard cappuccino candy nuggets. Simply a divine combination of the world\'s greatest drink and sugar!\r\n\r\nTub contains 200 pieces of Kopiko Coffee Cappuccino Candy.\r\n\r\nMade in Thailand.\r\n\r\nShipping Weight ~ 3 lbs.', 'f13c3122e16b40eba3dc50bcce26a7ac.png', '2791f0036c8764e6356b3ec112cfb120.png', '1f6539a01586c2bbf62bd221786ed449.png', 'In Stock'),
(5, 3, 12, 'Unicorn Pinata', 'Party Darby', 14.5, 'The rarest of piñatas, many believed the papier-mâché unicorn to be a purely mythical beast, the mere fabrication of a mind typically occupied by rainbows and sunshine.\r\n\r\nHowever, the recent efforts of researchers have proven otherwise. You heard it here, first, people: Unicorn piñatas are real, and we’ve got ‘em!\r\n\r\nThis adorable pink and white creature possesses a multicolored mane to accent its glistening horn. Plus, she’s literally bursting with sweetness when stuffed to the brim with candy (sold seperately). The best part about unicorns is that they really like to share. So invite this majestic creature to your next event, and let her rain sweets, treats, and happiness down upon your party!\r\n\r\n\r\nUnicorn Dimensions-\r\nLength: 13 3/4\r\nTotal Height (hoof to horn): 20 Inches\r\nWidth: 6 1/2 Inches\r\n\r\nNote: Piñata does NOT include candy, so feel free to fill it with any treat of your choice!\r\n\r\nShipping Weight ~ 2 lbs.', 'ed1d36f0894064927f5647b6cce8288e.png', 'faea691d1eccc554c11b635c12160183.png', 'ad8daa40389b7cd11eb3bd5e0b1a2068.png', 'In Stock'),
(7, 2, 5, 'Chocolate Covered Cinnamon Bears: 3LB Bag', 'Sweet Candy Company', 22.05, 'If you listen really closely to a box of chocolate covered cinnamon bears, you’ll swear you can hear singing. Is it the rich milk chocolate, weaving a melodious harmony with the soft and spicy cinnamon chewy bears inside? Or is it just your eagerly growling tummy, humming a tune of sweet anticipation for the delicacies to come? Either way, these are some of the most satisfying (and sonorous) gummy bears you’re ever likely to meet. Prepare your taste buds for some singing.\r\n\r\nThere are approximately 35 pieces per pound.\r\nBear Height: 1 Inch\r\n\r\nBag contains 3 pounds of Chocolate Covered Cinnamon Bears Candy.\r\n\r\nMade in the USA.\r\n\r\nShipping Weight ~ 3.5 lbs.', '45c47f6db67aea655ff23b641656b613.png', '84d139f7c8aaac02f7fb007ada28ecf5.png', '11ffb13ec280789b6ac4910104b4d199.png', 'In Stock'),
(8, 2, 8, 'Jelly Belly Harry Potter Chocolate Magic Wand', 'Jelly Belly', 11.95, 'Mystical, delicious, and fun, the Harry Potter Chocolate Wand is the ultimate gift for any fan of the young and powerful wizard. Professor Dumbledore himself would be impressed by this tasty magic wand sure to cast a yummy spell on your taste buds. Hosting a Harry Potter event? Offer the ultimate party favor or door prize that will make any occasion more enchanting. Packaged in an exquisite gift box, the Harry Potter Milk Chocolate Wand is an excellent present for aspiring magicians everywhere!\r\n\r\nWand Length: 12 Inches\r\n\r\nShipping Weight ~ 1 lb. Kosher Certified.', '4ee16942263b61e029ebf296de22fc1b.png', '9e9f0ee800e0267e4634c2c6e32d41ae.png', '642a9bfb733ac9a96ef9a4cca767b3fd.png', 'In Stock'),
(9, 4, 13, 'Easter Pastels Drizzled Yogurt Mini Pretzels: 14-Ounce Tub', 'Zachary', 10.5, 'Adorned in the colors of the season, salty pretzels are dipped in yogurt and drizzled with frosting of pastel colors to create this decadent treat. Bunnies will hop and chicks will hatch in record time to get a taste of this sweet and salty combination confection!\r\n\r\nTub contains 14 ounces of Easter Pastels Drizzled Yogurt Mini Pretzels Candy.\r\n\r\nMade in the USA.\r\n\r\nShipping Weight ~ 1 lb.', '5f6c095d4efaea9a6d911d61078f8a94.png', '493683c4ea8fb4873449cfccfc7eec89.png', '7b9a1901f342757cb3b0f4d34584daac.png', 'In Stock'),
(10, 4, 14, 'Gummy Internal Organs Candy: 38-Piece Bag', 'Fun Express', 11.5, 'Freshly harvested from deceased giant gummy bears, these chewy internal organs feature an assortment of fruity flavors. Surgeons and anatomy students alike will enjoy munching on these delicious body parts. Perfect for Halloween party treats, this assortment includes brains, kidneys, hearts, and intestinal tracts. Each piece is wrapped.\r\n\r\nBag contains 38 pieces of Gummy Internal Organs Body Parts Candy.\r\n\r\nShipping Weight ~ 1 lb.', '99f25eb8d64bcda32c7fc55cbdf0c306.png', '1d9d7cf3ab28c7dbc500cfaf5bd130c6.png', 'd8cc42efa8ebd23d7e1ad3f62f23016d.png', 'In Stock'),
(11, 6, 18, 'Giant Gummy Prosecco Wine Bottle: 14.1-Ounce Gift Box', 'Toysmith', 23.5, 'Behold the beauty of the Giant Gummy Prosecco Wine Bottle! Featuring a bold grape flavor as big as it\'s jumbo dimensions, this giant chewy candy is sure to surprise and delight any recipient. The perfect gift for the wine connoisseur in your life, this liquor themed candy doesn\'t actually contain any alcohol, but it is sure to impress with it\'s fabulous taste sensation and tender chew. Make your next celebration more festive and fun with the Giant Gummy Prosecco Wine Bottle... weighing in at nearly one pound, it will be the toast of the party!\r\n\r\nBottle Height: 9 Inches\r\n\r\nGift box contains 1 Giant Gummy Prosecco Wine Bottle with a net weight of 14.1 ounces.\r\n\r\nShipping Weight ~ 1.5 lbs.', 'ad0e8280ada4af2670aa7726978639f7.png', '9c3910e156ea21464a8458f13c56a780.png', '224ffff8f557a72a38ced74182b38a18.png', 'In Stock'),
(12, 2, 7, 'Disney Mickey and Minnie Helicopter Candy Fans: 3-Piece Set', 'CandyRific', 22.95, 'You might be tempted to steal this colorful, candy-filled toy from your contented tot when you see him or her living in the lap of luxury -- chilling with their pal Mickey or Minnie, keeping cool with the electric fan on the character’s helicopter (batteries included), and munching on some tasty hard candies stored in the compartment below, all without a care in the world. It’s enough to make you throw a tantrum, but don’t worry: the set comes with three candy fans… so you can keep your cool too.\r\n\r\nSet includes 3 Mickey or Minnie Helicopter Candy Fans - assortment will vary.\r\n\r\nShipping Weight ~ 1 lb.', '36db8b7e183a3b486904e10940f8b578.png', '9b47f3a4d7dccc9fde6e251960b7735f.png', '6c707922eec95a0dab26e70f5a9f29d6.png', 'In Stock'),
(13, 6, 17, 'Whirly Pop 1.5-Ounce Swirl Suckers - Birthday Cake: 24-Piece Display', 'Whirly Pop', 79.5, 'Birthday Envy. We’ve all experienced it. You’re sitting there with a bunch of other guests watching a friend tear into present after present, and suddenly you think, \"Wait a minute. Why am I here? I don’t get to open anything.\" It’s a dangerous notion that can lead to a party guest revolt and the ever-looming all-out cake fight that would leave adversaries on both sides plastered with icing. Don’t let your birthday party get ugly. Keep guests from looting the gift pile or coming at you with gobs of frosting by giving each of them a big lollipop full of sweet cake flavor that’ll keep their appetites in check, their egos from being bruised, and their Birthday Envy at bay. It may just be your last defense against insubordination.\r\n\r\nSucker Specifications-\r\nNet Weight: 1.5 Ounces\r\nCandy Diameter: 2.75 Inches\r\nTotal Height: 7 Inches\r\nFlavor: Cake\r\n\r\nDisplay box contains 24 wrapped Birthday Cake Swirl Whirly Pops.\r\n\r\nShipping Weight ~ 5 lbs. Kosher Certified.', 'a38395968a0cb3cc8b81984191665dd6.png', 'daaea8ba604b8d2263eab372da53aa2e.png', '6f01d3bd3ff882cb45608779b465ac98.png', 'In Stock'),
(14, 3, 12, 'Rainbow Donkey Pinata', 'Party Darby', 14.5, 'The most traditional of Mexican pinata designs, this rainbow donkey pinata will make your next party or event way more fun. Guests will squeal with surprise and delight when they see the pinata burst open and spew forth the sweet bounty hidden inside!\r\n\r\nDonkey Dimensions-\r\nLength: 19 Inches\r\nHeight: 14 Inches\r\nWidth: 6 1/4 Inches\r\n\r\nNote: Piñata does NOT include candy, so feel free to fill it with any treat of your choice!\r\n\r\nShipping Weight ~ 4 lbs.', '901261fd85787da100fbde530dedc081.png', '5069b3cd40b6ac3b570ce06da299b7f6.png', '62a77cfca941f454214415be47217512.png', 'In Stock'),
(15, 3, 12, 'Graduation Hat Pinata', 'Party Darby', 14.5, 'Just as Teddy Roosevelt once said, \"Speak softly, and carry a big stick for smashing piñatas.\"\r\n\r\nOk, we may have inferred the last part, but how else could he have been planning to use that stick? Plus we’ve heard ol’ TR really knew how to throw a good party.\r\n\r\nOn graduation day, it’s officially time to start doing big things. So take Teddy’s words of wisdom with you on this special occasion -- lower your voice, arm yourself with the biggest stick you can find, and get to piñata smashing! While you probably shouldn’t attempt to fill a real graduation hat with candy and take a whack at it, this fancy cardboard version (complete with frilly tassel!) will definitely do the trick. And there’s no better way to celebrate commencement than with the tidal wave of treats and sweets that will greet you upon piñata-smashing success!\r\n\r\nCap Measurements-\r\nWidth: 13 Inches\r\nHeight: 6.5 Inches\r\n\r\nNote: Piñata does NOT include candy, so feel free to fill it with any treat of your choice!\r\n\r\nShipping Weight ~ 2 lbs.', 'b35fc5b8b3cf8982a4fc4a654efe058b.png', '3ed91e0ebfc8de598cfd643e5fa1a820.png', '30712ea60752ac60e99b5626d7abc561.png', 'In Stock'),
(16, 6, 19, 'M&M\'s Milk Chocolate Candy - Baby Boy: 2LB Bag', 'M&M\'s', 35.5, 'Celebrate the arrival of your new little one with Baby Boy customized M&M\'S featuring adorable baby clip-art and colors of light blue and white!\r\n\r\nThere are approximately 500 pieces per pound.\r\n\r\nBag contains 2 pounds of Baby Boy M&M\'s Candy.\r\n\r\nMade in the USA.\r\n\r\nShipping Weight ~ 2.5 lbs. Kosher Certified.', 'b05c12d3997d64034fc3cb04be3d7012.png', '250b7ca2bde1221118a05f684417f2ff.png', '6da55d86a89952e5e014ac9e3da2c8cb.png', 'In Stock'),
(17, 6, 19, 'M&M\'s Milk Chocolate Candy - Baby Girl: 2LB Bag', 'M&M\'s', 35.5, 'Celebrate the arrival of your new little one with customized M&M\'S featuring adorable baby clip-art and colors of pink and white!\r\n\r\nThere are approximately 500 pieces per pound.\r\n\r\nBag contains 2 pounds of Baby Girl M&M\'s Candy.\r\n\r\nMade in the USA.\r\n\r\nShipping Weight ~ 2.5 lbs. Kosher Certified.', '2ba40148252b02ab65a88159201420cf.png', '45999695b9f8d1ce4613cd2507f7bf97.png', 'bfc097a4bd5853ea1b0636f6e5fa3993.png', 'In Stock');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `review` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`) VALUES
(1, 1, 'Bulk Candy'),
(2, 1, 'Asian Candy'),
(3, 1, 'Caramel Candy'),
(4, 1, 'Lego Shaped Candy'),
(5, 2, 'Animal'),
(6, 2, 'Cartoon'),
(7, 2, 'Disney'),
(8, 2, 'Harry Potter'),
(9, 2, 'Peppa Pig'),
(10, 2, 'Sport'),
(11, 3, 'Candy Scoops'),
(12, 3, 'Pinatas'),
(13, 4, 'Easter'),
(14, 4, 'Halloween'),
(15, 4, 'Christmas'),
(16, 5, 'Candy Sticker'),
(17, 6, 'Birthday'),
(18, 6, 'Graduation'),
(19, 6, 'Gender Reveal'),
(20, 7, 'Candy Toys'),
(21, 7, 'Pet Toys'),
(22, 7, 'Candy Fashion'),
(23, 7, 'Candy Plush');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `contact`) VALUES
(1, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'admin1@gmail.com', 0980298471),
(2, 'pogger', 'e10adc3949ba59abbe56e057f20f883e', 'pogger@gmail.com', 0987648653),
(3, 'noobee', 'e10adc3949ba59abbe56e057f20f883e', 'Noobee@gmail.com', 0982736512),
(4, 'Boni', 'e10adc3949ba59abbe56e057f20f883e', 'Boni@gmail.com', 0000000000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
