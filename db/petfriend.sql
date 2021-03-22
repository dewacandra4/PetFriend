-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2021 pada 10.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petfriend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `category` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`cid`, `category`) VALUES
(1, 'Cat'),
(2, 'Dog'),
(3, 'Birds'),
(4, 'Small Pets');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cf`
--

CREATE TABLE `cf` (
  `id_cf` int(11) NOT NULL,
  `symptom_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `md` float NOT NULL,
  `mb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cf`
--

INSERT INTO `cf` (`id_cf`, `symptom_id`, `disease_id`, `md`, `mb`) VALUES
(31, 26, 1, 0.2, 0.8),
(32, 27, 1, 0.2, 0.8),
(33, 28, 1, 0.1, 0.9),
(34, 29, 1, 0.3, 0.7),
(36, 30, 4, 0.4, 0.6),
(37, 31, 4, 0.3, 0.7),
(38, 32, 4, 0.4, 0.6),
(39, 33, 34, 0.1, 0.9),
(40, 34, 34, 0.3, 0.7),
(41, 35, 34, 0.3, 0.7),
(42, 36, 34, 0.3, 0.7),
(43, 37, 35, 0.3, 0.7),
(44, 38, 35, 0.3, 0.7),
(45, 39, 35, 0.4, 0.6),
(46, 40, 35, 0.3, 0.7),
(47, 41, 32, 0.4, 0.6),
(48, 42, 32, 0.4, 0.6),
(49, 43, 32, 0.2, 0.8),
(50, 44, 32, 0.4, 0.6),
(51, 45, 33, 0.3, 0.7),
(52, 46, 33, 0.3, 0.7),
(53, 47, 33, 0.4, 0.6),
(54, 48, 33, 0.4, 0.6),
(55, 49, 36, 0.3, 0.7),
(56, 50, 36, 0.2, 0.8),
(57, 51, 36, 0.1, 0.9),
(58, 52, 36, 0.2, 0.8),
(59, 53, 37, 0.2, 0.8),
(60, 54, 37, 0.2, 0.8),
(61, 55, 37, 0.3, 0.7),
(62, 56, 37, 0.3, 0.7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `send_to` int(11) NOT NULL,
  `send_by` int(11) NOT NULL,
  `message` tinytext NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`chat_id`, `send_to`, `send_by`, `message`, `time`) VALUES
(1, 22, 24, 'tes', '2020-11-29 09:22:01'),
(2, 24, 3, 'halo tes', '2020-11-29 09:28:16'),
(3, 24, 3, '', '2020-11-29 09:28:16'),
(4, 24, 3, '', '2020-11-29 09:28:22'),
(5, 24, 3, 'ya', '2020-11-29 09:28:22'),
(6, 3, 24, 'we', '2020-11-29 09:28:57'),
(7, 3, 24, 'kok di kaw ada 2 tu', '2020-11-29 09:29:04'),
(8, 24, 3, 'gtw', '2020-11-29 09:29:40'),
(9, 24, 3, 'eh ni bru mw 1', '2020-11-29 09:29:44'),
(10, 3, 24, 'okok dh fix', '2020-11-29 09:29:55'),
(11, 24, 3, 'tes', '2020-11-29 12:16:46'),
(12, 3, 24, 'hey', '2020-11-29 12:16:54'),
(13, 24, 3, 'ya ada apa ?', '2020-11-29 12:46:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosis_result`
--

CREATE TABLE `diagnosis_result` (
  `user_id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `cf_value` float NOT NULL,
  `information` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diagnosis_result`
--

INSERT INTO `diagnosis_result` (`user_id`, `code`, `name`, `cf_value`, `information`, `created_at`) VALUES
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754148),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754289),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754346),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754730),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754738),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754764),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754868),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754891),
(25, 'D005', 'Canine Parvovirus', 60, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754896),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607754944),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607755425),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607755440),
(25, 'D002', 'Lyme', 20, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1607755667),
(25, 'D002', 'Lyme', 20, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1607755744),
(25, 'D002', 'Lyme', 20, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1607755761),
(25, 'D002', 'Lyme', 20, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1607755840),
(25, 'D001', 'Rabies', 60, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1607757699),
(25, 'D001', 'Rabies', 60, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1607757732),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607757732),
(25, 'D001', 'Rabies', 60, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1607757757),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607757757),
(25, 'D005', 'Canine Parvovirus', 80, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607757760),
(25, 'D005', 'Canine Parvovirus', 80, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607757771),
(25, 'D001', 'Rabies', 60, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1607757774),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607757774),
(25, 'D002', 'Lyme', 20, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1607757805),
(25, 'D008', 'Feline Immunodeficiency Virus', 43.6, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758086),
(25, 'D003', 'Diabetes', 20, 'The initial treatment for diabetic cats is to provide recommended food for diabetic cats. We provide a variety of food for cats that you can find on the PetFriend website.', 1607758098),
(25, 'D004', 'Feline Leukimia Virus', 40, 'This disease is caused by a virus that attacks the immune system. Feline Leukemia Virus can lead to many forms of cancer and other related diseases. This virus comes from sharing food and water in contact with urine, feces and saliva from infected cats.', 1607758098),
(25, 'D007', 'Feline Calici Virus', 80, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758115),
(25, 'D008', 'Feline Immunodeficiency Virus', 37.4, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758115),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758199),
(25, 'D008', 'Feline Immunodeficiency Virus', 37.4, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758199),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758253),
(25, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758253),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758726),
(25, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758726),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758736),
(25, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758736),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758760),
(25, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758760),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758768),
(25, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758768),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758774),
(25, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758774),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758782),
(25, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758782),
(25, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607758786),
(25, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607758786),
(24, 'D005', 'Canine Parvovirus', 80, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607767486),
(24, 'D007', 'Feline Calici Virus', 40, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607767985),
(24, 'D007', 'Feline Calici Virus', 70, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607768445),
(24, 'D008', 'Feline Immunodeficiency Virus', 50, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607768445),
(25, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607775232),
(25, 'D007', 'Feline Calici Virus', 49.8, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1607777804),
(25, 'D008', 'Feline Immunodeficiency Virus', 60, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1607777804),
(25, 'D002', 'Lyme', 30, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1607777905),
(25, 'D005', 'Canine Parvovirus', 60, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1607777905),
(24, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1609329954),
(24, 'D008', 'Feline Immunodeficiency Virus', 37.4, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1609329978),
(24, 'D007', 'Feline Calici Virus', 60, 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and ', 1609330131),
(24, 'D008', 'Feline Immunodeficiency Virus', 43.6, 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately iso', 1609330131),
(24, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1609331213),
(24, 'D001', 'Rabies', 49.8, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1609331247),
(24, 'D001', 'Rabies', 60, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1609331534),
(24, 'D001', 'Rabies', 60, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1609331540),
(24, 'D006', 'Distemper', 20, 'If your dog starts showing symptoms of Distemper disease, immediately have your pet checked by our veterinarian at PetHealth or the nearest veterinarian in your area.', 1609331540),
(24, 'D001', 'Rabies', 49.8, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1609331565),
(24, 'D005', 'Canine Parvovirus', 40, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1609331569),
(24, 'D006', 'Distemper', 40, 'If your dog starts showing symptoms of Distemper disease, immediately have your pet checked by our veterinarian at PetHealth or the nearest veterinarian in your area.', 1609331569),
(24, 'D001', 'Rabies', 49.8, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1609331603),
(24, 'D001', 'Rabies', 60, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1609331612),
(24, 'D006', 'Distemper', 40, 'If your dog starts showing symptoms of Distemper disease, immediately have your pet checked by our veterinarian at PetHealth or the nearest veterinarian in your area.', 1609331612),
(24, 'D002', 'Lyme', 30, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1609331617),
(24, 'D005', 'Canine Parvovirus', 80, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1609331617),
(24, 'D002', 'Lyme', 20, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1609336506),
(24, 'D005', 'Canine Parvovirus', 80, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1609336506),
(24, 'D002', 'Lyme', 20, 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.', 1609336514),
(24, 'D005', 'Canine Parvovirus', 80, 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then reco', 1609336514),
(24, 'D001', 'Rabies', 49.8, 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.', 1609336525);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diseases`
--

CREATE TABLE `diseases` (
  `id` int(128) NOT NULL,
  `code` varchar(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diseases`
--

INSERT INTO `diseases` (`id`, `code`, `name`, `information`) VALUES
(1, 'D001', 'Rabies', 'Vaccinate yourself and your pets. Animals and humans that have been vaccinated are generally safe from rabies even if they are bitten by a rabid dog. Also, get used to washing your hands with soap after playing with the doggy.'),
(4, 'D002', 'Lyme', 'To prevent this, give your pet a flea vaccine. Bathe pets 2-3 times a month with flea medication. Spray insect repellant on the parts of the house that your pets frequent.'),
(32, 'D003', 'Diabetes', 'The initial treatment for diabetic cats is to provide recommended food for diabetic cats. We provide a variety of food for cats that you can find on the PetFriend website.'),
(33, 'D004', 'Feline Leukimia Virus', 'This disease is caused by a virus that attacks the immune system. Feline Leukemia Virus can lead to many forms of cancer and other related diseases. This virus comes from sharing food and water in contact with urine, feces and saliva from infected cats.'),
(34, 'D005', 'Canine Parvovirus', 'If your puppy starts showing symptoms of canine parvovirus you should immediately consult to our veterinarian at Pethealth. They will perform some physical exams, biochemical testing, and urine analysis to determine if your puppy is infected and then recommend the best course of action.'),
(35, 'D006', 'Distemper', 'If your dog starts showing symptoms of Distemper disease, immediately have your pet checked by our veterinarian at PetHealth or the nearest veterinarian in your area.'),
(36, 'D007', 'Feline Calici Virus', 'The initial treatment if your cat shows symptoms of Feline Calici Virus is by first isolating it from other cats. Then feed it soft food that doesn\'t need to be chewed, feeding it if the cat doesn\'t want to eat. Also, clean the dirt on the cat\'s nose and eyes regularly.'),
(37, 'D008', 'Feline Immunodeficiency Virus', 'This cat disease is transmitted by the bite of an infected cat or mother cat which transmits it to the fetus in its womb. House cats have a lower risk of developing the disease than cats who are outside more often. If your cat is affected, immediately isolate it so that the other cats do not get infected.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `symptom_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `user_id`, `code`, `name`, `symptom_id`, `created_at`) VALUES
(1, 24, 'D002', 'Lyme', 10, 1606402932),
(2, 24, 'D002', 'Lyme', 11, 1606402932),
(3, 24, 'D002', 'Lyme', 14, 1606402932),
(4, 24, 'D001', 'Rabies', 10, 1606402940),
(5, 24, 'D001', 'Rabies', 11, 1606402940),
(6, 24, 'D002', 'Lyme', 10, 1606402953),
(7, 24, 'D002', 'Lyme', 11, 1606402953),
(8, 24, 'D002', 'Lyme', 13, 1606402953),
(9, 3, 'D002', 'Lyme', 15, 1606454600),
(10, 3, 'D004', 'Feline Leukimia Virus', 25, 1606463310),
(11, 3, 'D004', 'Feline Leukimia Virus', 24, 1606463310),
(12, 3, 'D004', 'Feline Leukimia Virus', 23, 1606463320),
(13, 3, 'D004', 'Feline Leukimia Virus', 22, 1606463320),
(14, 24, 'D002', 'Lyme', 11, 1607247557),
(15, 24, 'D002', 'Lyme', 10, 1607247557),
(16, 24, 'D002', 'Lyme', 14, 1607247557),
(17, 24, 'D001', 'Rabies', 11, 1607344515),
(18, 24, 'D001', 'Rabies', 10, 1607344515),
(19, 24, 'D002', 'Lyme', 11, 1607410780),
(20, 24, 'D002', 'Lyme', 10, 1607410780),
(21, 24, 'D002', 'Lyme', 15, 1607410780),
(22, 24, 'D002', 'Lyme', 11, 1607410784),
(23, 24, 'D002', 'Lyme', 15, 1607410784),
(24, 24, 'D002', 'Lyme', 14, 1607410784),
(25, 24, 'D002', 'Lyme', 11, 1607410934),
(26, 24, 'D002', 'Lyme', 15, 1607410934),
(27, 24, 'D002', 'Lyme', 14, 1607410934),
(28, 24, 'D002', 'Lyme', 11, 1607410944),
(29, 24, 'D002', 'Lyme', 15, 1607410944),
(30, 24, 'D002', 'Lyme', 14, 1607410944),
(31, 24, 'D002', 'Lyme', 11, 1607410954),
(32, 24, 'D002', 'Lyme', 15, 1607410954),
(33, 24, 'D002', 'Lyme', 14, 1607410954),
(34, 24, 'D002', 'Lyme', 11, 1607410972),
(35, 24, 'D002', 'Lyme', 15, 1607410972),
(36, 24, 'D002', 'Lyme', 14, 1607410972),
(37, 24, 'D002', 'Lyme', 11, 1607411001),
(38, 24, 'D002', 'Lyme', 15, 1607411001),
(39, 24, 'D002', 'Lyme', 14, 1607411001),
(40, 24, 'D002', 'Lyme', 11, 1607411027),
(41, 24, 'D002', 'Lyme', 15, 1607411027),
(42, 24, 'D002', 'Lyme', 14, 1607411027),
(43, 24, 'D002', 'Lyme', 11, 1607411036),
(44, 24, 'D002', 'Lyme', 15, 1607411036),
(45, 24, 'D002', 'Lyme', 14, 1607411036),
(46, 24, 'D002', 'Lyme', 11, 1607411801),
(47, 24, 'D002', 'Lyme', 15, 1607411801),
(48, 24, 'D002', 'Lyme', 14, 1607411801),
(49, 24, 'D002', 'Lyme', 11, 1607411837),
(50, 24, 'D002', 'Lyme', 15, 1607411837),
(51, 24, 'D002', 'Lyme', 14, 1607411837),
(52, 24, 'D002', 'Lyme', 11, 1607411889),
(53, 24, 'D002', 'Lyme', 15, 1607411889),
(54, 24, 'D002', 'Lyme', 14, 1607411889),
(55, 24, 'D005', 'Canine Parvovirus', 33, 1607424320),
(56, 24, 'D005', 'Canine Parvovirus', 32, 1607424320),
(57, 24, 'D005', 'Canine Parvovirus', 30, 1607424320),
(58, 24, 'D005', 'Canine Parvovirus', 33, 1607424337),
(59, 24, 'D005', 'Canine Parvovirus', 32, 1607424337),
(60, 24, 'D005', 'Canine Parvovirus', 30, 1607424337),
(61, 24, 'D005', 'Canine Parvovirus', 34, 1607424484),
(62, 24, 'D005', 'Canine Parvovirus', 33, 1607424484),
(63, 24, 'D005', 'Canine Parvovirus', 31, 1607424484),
(64, 24, 'D005', 'Canine Parvovirus', 30, 1607424484),
(65, 24, 'D005', 'Canine Parvovirus', 34, 1607425050),
(66, 24, 'D005', 'Canine Parvovirus', 33, 1607425050),
(67, 24, 'D005', 'Canine Parvovirus', 31, 1607425050),
(68, 24, 'D005', 'Canine Parvovirus', 30, 1607425050),
(69, 24, 'D005', 'Canine Parvovirus', 34, 1607488050),
(70, 24, 'D005', 'Canine Parvovirus', 33, 1607488057),
(71, 24, 'D005', 'Canine Parvovirus', 32, 1607488057),
(72, 24, 'D005', 'Canine Parvovirus', 31, 1607488057),
(73, 24, 'D005', 'Canine Parvovirus', 33, 1607488065),
(74, 24, 'D005', 'Canine Parvovirus', 32, 1607488065),
(75, 24, 'D005', 'Canine Parvovirus', 31, 1607488065),
(76, 24, 'D005', 'Canine Parvovirus', 34, 1607488072),
(77, 24, 'D005', 'Canine Parvovirus', 34, 1607488092),
(78, 24, 'D005', 'Canine Parvovirus', 34, 1607488103),
(79, 24, 'D005', 'Canine Parvovirus', 34, 1607488119),
(80, 24, 'D005', 'Canine Parvovirus', 33, 1607488119),
(81, 24, 'D005', 'Canine Parvovirus', 30, 1607488119),
(82, 24, 'D005', 'Canine Parvovirus', 34, 1607488142),
(83, 24, 'D005', 'Canine Parvovirus', 33, 1607488142),
(84, 24, 'D005', 'Canine Parvovirus', 30, 1607488142),
(85, 24, 'D005', 'Canine Parvovirus', 34, 1607488187),
(86, 24, 'D005', 'Canine Parvovirus', 34, 1607488203),
(87, 24, 'D005', 'Canine Parvovirus', 34, 1607488222),
(88, 24, 'D005', 'Canine Parvovirus', 34, 1607488235),
(89, 24, 'D005', 'Canine Parvovirus', 33, 1607488235),
(90, 24, 'D005', 'Canine Parvovirus', 32, 1607488235),
(91, 24, 'D005', 'Canine Parvovirus', 31, 1607488235),
(92, 24, 'D005', 'Canine Parvovirus', 30, 1607488235),
(93, 24, 'D005', 'Canine Parvovirus', 34, 1607488273),
(94, 24, 'D005', 'Canine Parvovirus', 33, 1607488273),
(95, 24, 'D005', 'Canine Parvovirus', 32, 1607488273),
(96, 24, 'D005', 'Canine Parvovirus', 31, 1607488273),
(97, 24, 'D005', 'Canine Parvovirus', 30, 1607488273),
(98, 24, 'D005', 'Canine Parvovirus', 34, 1607488282),
(99, 24, 'D005', 'Canine Parvovirus', 33, 1607488282),
(100, 24, 'D005', 'Canine Parvovirus', 32, 1607488282),
(101, 24, 'D005', 'Canine Parvovirus', 31, 1607488282),
(102, 24, 'D005', 'Canine Parvovirus', 30, 1607488282),
(103, 24, 'D005', 'Canine Parvovirus', 34, 1607488297),
(104, 24, 'D005', 'Canine Parvovirus', 34, 1607488321),
(105, 24, 'D005', 'Canine Parvovirus', 33, 1607488321),
(106, 24, 'D005', 'Canine Parvovirus', 32, 1607488321),
(107, 24, 'D005', 'Canine Parvovirus', 34, 1607488332),
(108, 24, 'D005', 'Canine Parvovirus', 33, 1607488332),
(109, 24, 'D005', 'Canine Parvovirus', 31, 1607488332),
(110, 24, 'D002', 'Lyme', 32, 1607488338),
(111, 24, 'D002', 'Lyme', 31, 1607488338),
(112, 24, 'D002', 'Lyme', 30, 1607488338),
(113, 24, 'D003', 'Diabetes', 44, 1607488833),
(114, 24, 'D003', 'Diabetes', 43, 1607488833),
(115, 24, 'D003', 'Diabetes', 42, 1607488833),
(116, 24, 'D003', 'Diabetes', 44, 1607488874),
(117, 24, 'D003', 'Diabetes', 43, 1607488874),
(118, 24, 'D003', 'Diabetes', 42, 1607488874),
(119, 24, 'D003', 'Diabetes', 41, 1607488899),
(120, 24, 'D003', 'Diabetes', 41, 1607488914),
(121, 24, 'D003', 'Diabetes', 44, 1607488925),
(122, 24, 'D003', 'Diabetes', 43, 1607488925),
(123, 24, 'D003', 'Diabetes', 42, 1607488925),
(124, 24, 'D007', 'Feline Calici Virus', 50, 1607488939),
(125, 24, 'D005', 'Canine Parvovirus', 34, 1607572197),
(126, 24, 'D005', 'Canine Parvovirus', 34, 1607572252),
(127, 24, 'D005', 'Canine Parvovirus', 33, 1607572252),
(128, 24, 'D005', 'Canine Parvovirus', 35, 1607572252),
(129, 24, 'D005', 'Canine Parvovirus', 34, 1607572511),
(130, 24, 'D005', 'Canine Parvovirus', 33, 1607572511),
(131, 24, 'D005', 'Canine Parvovirus', 35, 1607572511),
(132, 24, 'D005', 'Canine Parvovirus', 34, 1607588827),
(133, 24, 'D005', 'Canine Parvovirus', 33, 1607588827),
(134, 24, 'D005', 'Canine Parvovirus', 32, 1607588827),
(135, 24, 'D005', 'Canine Parvovirus', 31, 1607588827),
(136, 24, 'D005', 'Canine Parvovirus', 34, 1607588903),
(137, 24, 'D005', 'Canine Parvovirus', 33, 1607588903),
(138, 24, 'D005', 'Canine Parvovirus', 32, 1607588903),
(139, 24, 'D005', 'Canine Parvovirus', 31, 1607588903),
(140, 24, 'D001', 'Rabies', 29, 1607589034),
(141, 24, 'D001', 'Rabies', 28, 1607589034),
(142, 24, 'D001', 'Rabies', 27, 1607589034),
(143, 24, 'D001', 'Rabies', 29, 1607589053),
(144, 24, 'D001', 'Rabies', 28, 1607589053),
(145, 24, 'D001', 'Rabies', 27, 1607589053),
(146, 24, 'D001', 'Rabies', 29, 1607589076),
(147, 24, 'D001', 'Rabies', 28, 1607589076),
(148, 24, 'D001', 'Rabies', 27, 1607589076),
(149, 24, 'D006', 'Distemper', 39, 1607589085),
(150, 24, 'D006', 'Distemper', 38, 1607589085),
(151, 24, 'D006', 'Distemper', 37, 1607589085),
(152, 24, 'D006', 'Distemper', 30, 1607589114),
(153, 24, 'D006', 'Distemper', 28, 1607589114),
(154, 24, 'D006', 'Distemper', 27, 1607589114),
(155, 24, 'D006', 'Distemper', 40, 1607589114),
(156, 24, 'D005', 'Canine Parvovirus', 34, 1607592239),
(157, 24, 'D005', 'Canine Parvovirus', 33, 1607592239),
(158, 20, 'D005', 'Canine Parvovirus', 34, 1607709777),
(159, 20, 'D005', 'Canine Parvovirus', 33, 1607709777),
(160, 20, 'D005', 'Canine Parvovirus', 32, 1607709777),
(161, 20, 'D006', 'Distemper', 29, 1607709802),
(162, 20, 'D006', 'Distemper', 28, 1607709802),
(163, 20, 'D006', 'Distemper', 27, 1607709802),
(164, 20, 'D006', 'Distemper', 38, 1607709802),
(165, 25, 'D005', 'Canine Parvovirus', 34, 1607754148),
(166, 25, 'D005', 'Canine Parvovirus', 34, 1607754289),
(167, 25, 'D005', 'Canine Parvovirus', 34, 1607754346),
(168, 25, 'D005', 'Canine Parvovirus', 34, 1607754730),
(169, 25, 'D005', 'Canine Parvovirus', 34, 1607754738),
(170, 25, 'D005', 'Canine Parvovirus', 34, 1607754764),
(171, 25, 'D005', 'Canine Parvovirus', 34, 1607754868),
(172, 25, 'D005', 'Canine Parvovirus', 34, 1607754891),
(173, 25, 'D005', 'Canine Parvovirus', 34, 1607754896),
(174, 25, 'D005', 'Canine Parvovirus', 33, 1607754896),
(175, 25, 'D005', 'Canine Parvovirus', 34, 1607754944),
(176, 25, 'D005', 'Canine Parvovirus', 34, 1607755425),
(177, 25, 'D005', 'Canine Parvovirus', 34, 1607755440),
(178, 25, 'D002', 'Lyme', 30, 1607755667),
(179, 25, 'D002', 'Lyme', 30, 1607755744),
(180, 25, 'D002', 'Lyme', 30, 1607755761),
(181, 25, 'D002', 'Lyme', 30, 1607755840),
(182, 25, 'D001', 'Rabies', 27, 1607757699),
(183, 25, 'D005', 'Canine Parvovirus', 36, 1607757732),
(184, 25, 'D005', 'Canine Parvovirus', 35, 1607757732),
(185, 25, 'D005', 'Canine Parvovirus', 26, 1607757732),
(186, 25, 'D005', 'Canine Parvovirus', 36, 1607757757),
(187, 25, 'D005', 'Canine Parvovirus', 35, 1607757757),
(188, 25, 'D005', 'Canine Parvovirus', 26, 1607757757),
(189, 25, 'D005', 'Canine Parvovirus', 33, 1607757760),
(190, 25, 'D005', 'Canine Parvovirus', 33, 1607757771),
(191, 25, 'D005', 'Canine Parvovirus', 36, 1607757774),
(192, 25, 'D005', 'Canine Parvovirus', 35, 1607757774),
(193, 25, 'D005', 'Canine Parvovirus', 26, 1607757774),
(194, 25, 'D002', 'Lyme', 30, 1607757805),
(195, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758086),
(196, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758086),
(197, 25, 'D008', 'Feline Immunodeficiency Virus', 53, 1607758086),
(198, 25, 'D004', 'Feline Leukimia Virus', 46, 1607758098),
(199, 25, 'D004', 'Feline Leukimia Virus', 45, 1607758098),
(200, 25, 'D004', 'Feline Leukimia Virus', 44, 1607758098),
(201, 25, 'D004', 'Feline Leukimia Virus', 41, 1607758098),
(202, 25, 'D008', 'Feline Immunodeficiency Virus', 56, 1607758115),
(203, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758115),
(204, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758115),
(205, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758115),
(206, 25, 'D008', 'Feline Immunodeficiency Virus', 56, 1607758199),
(207, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758199),
(208, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758199),
(209, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758199),
(210, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758199),
(211, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758253),
(212, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758253),
(213, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758253),
(214, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758253),
(215, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758726),
(216, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758726),
(217, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758726),
(218, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758726),
(219, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758736),
(220, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758736),
(221, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758736),
(222, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758736),
(223, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758760),
(224, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758760),
(225, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758760),
(226, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758760),
(227, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758768),
(228, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758768),
(229, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758768),
(230, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758768),
(231, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758774),
(232, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758774),
(233, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758774),
(234, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758774),
(235, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758782),
(236, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758782),
(237, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758782),
(238, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758782),
(239, 25, 'D008', 'Feline Immunodeficiency Virus', 55, 1607758786),
(240, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607758786),
(241, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607758786),
(242, 25, 'D008', 'Feline Immunodeficiency Virus', 50, 1607758786),
(243, 24, 'D005', 'Canine Parvovirus', 33, 1607767486),
(244, 24, 'D007', 'Feline Calici Virus', 49, 1607767985),
(245, 24, 'D008', 'Feline Immunodeficiency Virus', 55, 1607768445),
(246, 24, 'D008', 'Feline Immunodeficiency Virus', 54, 1607768445),
(247, 24, 'D008', 'Feline Immunodeficiency Virus', 51, 1607768445),
(248, 24, 'D008', 'Feline Immunodeficiency Virus', 50, 1607768445),
(249, 25, 'D005', 'Canine Parvovirus', 34, 1607775232),
(250, 25, 'D008', 'Feline Immunodeficiency Virus', 54, 1607777804),
(251, 25, 'D008', 'Feline Immunodeficiency Virus', 52, 1607777804),
(252, 25, 'D008', 'Feline Immunodeficiency Virus', 51, 1607777804),
(253, 25, 'D008', 'Feline Immunodeficiency Virus', 49, 1607777804),
(254, 25, 'D005', 'Canine Parvovirus', 34, 1607777905),
(255, 25, 'D005', 'Canine Parvovirus', 33, 1607777905),
(256, 25, 'D005', 'Canine Parvovirus', 31, 1607777905),
(257, 25, 'D005', 'Canine Parvovirus', 30, 1607777905),
(258, 24, 'D005', 'Canine Parvovirus', 34, 1609329954),
(259, 24, 'D008', 'Feline Immunodeficiency Virus', 56, 1609329978),
(260, 24, 'D008', 'Feline Immunodeficiency Virus', 55, 1609329978),
(261, 24, 'D008', 'Feline Immunodeficiency Virus', 54, 1609329978),
(262, 24, 'D008', 'Feline Immunodeficiency Virus', 56, 1609330131),
(263, 24, 'D008', 'Feline Immunodeficiency Virus', 54, 1609330131),
(264, 24, 'D008', 'Feline Immunodeficiency Virus', 53, 1609330131),
(265, 24, 'D008', 'Feline Immunodeficiency Virus', 52, 1609330131),
(266, 24, 'D005', 'Canine Parvovirus', 34, 1609331213),
(267, 24, 'D001', 'Rabies', 29, 1609331247),
(268, 24, 'D001', 'Rabies', 28, 1609331247),
(269, 24, 'D001', 'Rabies', 27, 1609331247),
(270, 24, 'D001', 'Rabies', 29, 1609331534),
(271, 24, 'D001', 'Rabies', 28, 1609331534),
(272, 24, 'D006', 'Distemper', 29, 1609331540),
(273, 24, 'D006', 'Distemper', 28, 1609331540),
(274, 24, 'D006', 'Distemper', 39, 1609331540),
(275, 24, 'D001', 'Rabies', 29, 1609331565),
(276, 24, 'D001', 'Rabies', 28, 1609331565),
(277, 24, 'D001', 'Rabies', 27, 1609331565),
(278, 24, 'D006', 'Distemper', 37, 1609331569),
(279, 24, 'D006', 'Distemper', 36, 1609331569),
(280, 24, 'D006', 'Distemper', 35, 1609331569),
(281, 24, 'D001', 'Rabies', 29, 1609331603),
(282, 24, 'D001', 'Rabies', 28, 1609331603),
(283, 24, 'D001', 'Rabies', 26, 1609331603),
(284, 24, 'D006', 'Distemper', 27, 1609331612),
(285, 24, 'D006', 'Distemper', 40, 1609331612),
(286, 24, 'D006', 'Distemper', 26, 1609331612),
(287, 24, 'D005', 'Canine Parvovirus', 33, 1609331617),
(288, 24, 'D005', 'Canine Parvovirus', 32, 1609331617),
(289, 24, 'D005', 'Canine Parvovirus', 31, 1609331617),
(290, 24, 'D005', 'Canine Parvovirus', 33, 1609336506),
(291, 24, 'D005', 'Canine Parvovirus', 32, 1609336506),
(292, 24, 'D005', 'Canine Parvovirus', 33, 1609336514),
(293, 24, 'D005', 'Canine Parvovirus', 32, 1609336514),
(294, 24, 'D001', 'Rabies', 29, 1609336525),
(295, 24, 'D001', 'Rabies', 28, 1609336525),
(296, 24, 'D001', 'Rabies', 27, 1609336525);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pethealth_order`
--

CREATE TABLE `pethealth_order` (
  `id` int(11) NOT NULL,
  `sorder_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `pet_kind` varchar(128) NOT NULL,
  `pet_complaint` varchar(256) NOT NULL,
  `diagnosis_file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pethealth_order`
--

INSERT INTO `pethealth_order` (`id`, `sorder_id`, `doc_id`, `pet_kind`, `pet_complaint`, `diagnosis_file`) VALUES
(4, 43, 3, 'Dog', ' ', 'report_user4_12-12-2020.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pethotel_order`
--

CREATE TABLE `pethotel_order` (
  `id` int(11) NOT NULL,
  `sorder_id` int(11) NOT NULL,
  `check_in` int(11) NOT NULL,
  `check_out` int(11) NOT NULL,
  `pet_kind` varchar(128) NOT NULL,
  `room_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petsalon_order`
--

CREATE TABLE `petsalon_order` (
  `id` int(11) NOT NULL,
  `sorder_id` int(11) NOT NULL,
  `pet_kind` varchar(128) NOT NULL,
  `service_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petsalon_order`
--

INSERT INTO `petsalon_order` (`id`, `sorder_id`, `pet_kind`, `service_type`) VALUES
(18, 42, 'Dog', 'Grooming'),
(21, 47, 'Dog', 'Grooming');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(10) NOT NULL,
  `sold` int(122) NOT NULL,
  `is_available` int(11) NOT NULL,
  `date_added` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `description`, `img`, `price`, `stock`, `sold`, `is_available`, `date_added`) VALUES
(1, 'Whiskas', 1, 'Lorem ipsum dolor sit amet', 'whiskas_milk2.png', '122.00', 0, 120, 1, 1598354690),
(12, 'Collar', 4, 'Lorem ipsum dolor sit amet', 'collar.jpg', '80.00', 10, 1, 1, 1598354690),
(15, 'Cereal', 4, 'Cereal', 'royal_cat1.png', '90.00', 0, 10, 1, 1598359333),
(35, 'Dog Products 2', 2, 'Dog Products 2', 'cage_dog111.png', '21.00', 5, 120, 1, 1604663293),
(41, 'Dog Products 8', 2, 'Dog Products 8', 'kalvidog11.png', '10.00', 10, 0, 1, 1604663421),
(42, 'Dog Products 9', 2, 'Dog Products 9', 'pedigree_dog3.png', '10.00', 10, 0, 1, 1604663437),
(43, 'Dog Products 10', 2, 'Dog Products 10', 'pet_clipper2.png', '12.00', 10, 0, 1, 1604663456),
(47, 'Small Pet Products', 4, 'Small Pet Products', '3tier_cage_cat11.png', '10.00', 10, 0, 1, 1604667091);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_order`
--

CREATE TABLE `products_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(128) NOT NULL,
  `order_date` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `total_items` int(11) NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `delivery_address` varchar(128) NOT NULL,
  `delivery_note` varchar(256) NOT NULL,
  `payment_proof` varchar(256) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `finish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products_order`
--

INSERT INTO `products_order` (`order_id`, `user_id`, `order_status`, `order_date`, `total_price`, `total_items`, `payment_method`, `delivery_address`, `delivery_note`, `payment_proof`, `delivery_date`, `finish_date`) VALUES
(115, 24, 'Order Complete', 1605417737, '94.50', 1, 'Bank Transfer', 'Jalan Gurita No.22', '', '', 0, '2020-11-14 22:22:22'),
(116, 24, 'Cancelled', 1606290292, '84.00', 1, 'M-Banking', 'Jalan Gurita No.22', '', '', 1605417787, '2020-11-25 07:44:58'),
(117, 24, 'Order Complete', 1605418168, '378.00', 4, 'Bank Transfer', 'Jalan Gurita No.22', '', '', 0, '2020-11-14 22:29:38'),
(118, 24, 'Order Complete', 1605418671, '472.50', 5, 'M-Banking', 'Jalan Gurita No.22', '', '', 0, '2020-11-15 05:55:00'),
(123, 24, 'On Process', 1608619585, '84.00', 1, 'COD', 'Jalan Gurita No.22', '', '', 1608619585, '2020-12-22 06:46:25'),
(124, 24, 'Awaiting Payment', 1608619677, '22.05', 1, 'M-Banking', 'Jalan Gurita No.22', '', '', 0, '2020-12-22 06:47:57'),
(125, 24, 'On Process', 1608619917, '22.05', 1, 'COD', 'Jalan Gurita No.22', '', '', 1608619917, '2020-12-22 06:51:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_order_detail`
--

CREATE TABLE `products_order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products_order_detail`
--

INSERT INTO `products_order_detail` (`id`, `order_id`, `product_id`, `order_qty`, `product_name`, `total_price`, `img`) VALUES
(128, 115, 15, 1, 'Cereal', '90.00', 'royal_cat1.png'),
(129, 116, 12, 1, 'Collar', '80.00', 'collar1.jpg'),
(130, 117, 15, 4, 'Cereal', '360.00', 'royal_cat1.png'),
(131, 118, 15, 5, 'Cereal', '450.00', 'royal_cat1.png'),
(137, 123, 12, 1, 'Collar', '80.00', 'collar.jpg'),
(138, 124, 35, 1, 'Dog Products 2', '21.00', 'cage_dog111.png'),
(139, 125, 35, 1, 'Dog Products 2', '21.00', 'cage_dog111.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` varchar(256) NOT NULL,
  `review_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `img` varchar(128) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `resource` int(10) NOT NULL,
  `is_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `img`, `price`, `resource`, `is_available`) VALUES
(1, 'Pet Hotel', 'Lorem ipsum dolor sit amet, consectetur', 'service_icon_13.png', '15.00', 2, 1),
(2, 'Pet Health', 'Lorem ipsum dolor sit amet dolor\r\n', 'service_icon_21.png', '15.00', 1, 1),
(3, 'Pet Salon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut', 'service_icon_3.png', '10.00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_order`
--

CREATE TABLE `services_order` (
  `sorder_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(128) NOT NULL,
  `order_date` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `payment_proof` varchar(256) NOT NULL,
  `customer_address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `services_order`
--

INSERT INTO `services_order` (`sorder_id`, `service_id`, `user_id`, `order_status`, `order_date`, `total_price`, `payment_method`, `payment_proof`, `customer_address`) VALUES
(42, 3, 24, 'Order Complete', 1605066196, '10.50', 'Bank Transfer', '', 'Jalan Gurita No.22'),
(43, 2, 24, 'Order Complete', 1608533242, '15.00', 'COD', '', 'Jalan Gurita No.22'),
(47, 3, 24, 'Awaiting Payment', 1608564915, '10.50', 'Bank Transfer', '', 'Jalan Gurita No.22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `symptoms`
--

CREATE TABLE `symptoms` (
  `symptom_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `symptom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `symptoms`
--

INSERT INTO `symptoms` (`symptom_id`, `type_id`, `code`, `symptom`) VALUES
(26, 1, 'S001', 'Excessive production of saliva / foam / froth in the mouth'),
(27, 1, 'S002', 'Difficulty swallowing food'),
(28, 1, 'S003', 'Sensitive to sound and touch'),
(29, 1, 'S004', 'Dilated pupils'),
(30, 1, 'S005', 'Swelling of the joints'),
(31, 1, 'S006', 'Sluggish (lack of energy)'),
(32, 1, 'S007', 'Lameness (can be repeated or at certain times, move the limp from one leg to another, and occur at indefinite times)'),
(33, 1, 'S008', 'Diarrhea (may be bleeding)'),
(34, 1, 'S009', 'Vomiting'),
(35, 1, 'S0010', 'Dehydration'),
(36, 1, 'S0011', 'Fever'),
(37, 1, 'S0012', 'High body temperature'),
(38, 1, 'S0013', 'Sudden vomiting'),
(39, 1, 'S0014', 'Depression'),
(40, 1, 'S0015', 'Sneezing, coughing, and breathing problems'),
(41, 2, 'S0016', 'Excessive appetite'),
(42, 2, 'S0017', 'Excessive and unnatural urination'),
(43, 2, 'S0018', 'Weight loss drastically despite eating a lot'),
(44, 2, 'S0019', 'Increasing water intake, cats drink a lot.'),
(45, 2, 'S0020', 'Loss of appetite and weight loss'),
(46, 2, 'S0021', 'Seizures, fatigue, and fever'),
(47, 2, 'S0022', 'Anisocoria or pupil size of the right eye is different from the left pupil'),
(48, 2, 'S0023', 'Infections of the skin, bladder, and respiratory tract'),
(49, 2, 'S0024', 'Watery eyes'),
(50, 2, 'S0025', 'Runny nose'),
(51, 2, 'S0026', 'Sores on the tongue and lips'),
(52, 2, 'S0027', 'Difficulty breathing'),
(53, 2, 'S0028', 'Chronic diarrhea'),
(54, 2, 'S0029', 'Mouth infections'),
(55, 2, 'S0030', 'Loss of appetite'),
(56, 2, 'S031', 'Some breathing problems appear'),
(60, 1, 'S0040', 'Test Delete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`id`, `name`, `information`) VALUES
(1, 'Dog', '-'),
(2, 'Cat', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `phone`, `email`, `username`, `password`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Dewa Candraditya Brata', 'Jalan P. Talaud No.31', 2147483647, 'candrabrata8@gmail.com', 'admin', '$2y$10$n4TZJvmI7hczhltArVPLcOCI/a9NKo7GjAfVuZTKLrdh6rX2JyjlW', '01.png', 1, 1, 1595567257),
(3, 'Rukma Wira', 'Indonesia', 98773, 'kresekman13@gmail.com', 'rukma', '$2y$10$3Sjv9QYnJ7bGWTVDZMTvf.gjXi2niD5HeEc7TUwN3m2FxOaJ/x3fq', '011.png', 3, 1, 1595651377),
(21, 'Geo Rama Bhujangga', 'BR Gede Link no 9 Abianbase', 2147483647, 'geogeabulan32@gmail.com', 'georama', '$2y$10$VvwdzXyZlbv0/4OXk79sBekBhe537C1WuWj8JwrFGgB1m7LGFahVy', 'default.jpg', 2, 1, 1602282301),
(23, 'georamab the admin yb', 'jalan pegangsaan timur no 45 jakarta', 2147483647, 'rifkisamsung48@gmail.com', 'georama123', '$2y$10$z/CHfOiQ9aGkDLLjFvGkwenZ4DV7oqQmOmpCZ6Xb0owobnr7.Taty', 'default.jpg', 2, 1, 1602479827),
(24, 'Luffy', 'Jalan Gurita No.22', 2147483647, 'candrabrata10@gmail.com', 'user3', '$2y$10$yumyh/LbIcpVfjB8oXt0EOyFShv9/2U/t020dqvRePWzW9OqaPTRe', 'default.jpg', 2, 1, 1603020722),
(25, 'Dewa Candra', 'Jalan Bali', 182313122, 'candrabrata2@gmail.com', 'user4', '$2y$10$uFWMM5oJQ0NAhMDmJNlWTOOqybrg2m0DhEAgtZQcmcIPEBF4Wb34y', 'default.jpg', 2, 1, 1607710796),
(27, 'Admin Help', 'Jalan. Address 1 No. 2', 2147483647, 'petfriendadmin@gmail.com', 'admin1', '$2y$10$tBsctJj99g/uInnWWI84YuqUmZ0S4uD8q53Tym9qIxMD0rA9R/JXi', 'default.jpg', 1, 1, 1609654889),
(28, 'customer', 'Jalan. Address 1 No. 4', 2147483647, 'customer@gmail.com', 'customer', '$2y$10$hxHLfqcQLS.DiAG/C6/i0ulQRdKMMh6ewxbnOmQeSltLVVhNbDtve', 'default.jpg', 2, 1, 1609655085);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Veterinarian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(16, 'geogeabulan32@gmail.com', 'ADqKXdXiwd6z0l95BYRGpkYpA2CIhtmD+0br7d0DNBo=', 1602282301),
(17, 'geothegeo@gmail.com', 'swJIxNRbGyybkxpC4iU+xMNpLAGNk1Nbga8y3yrz5rA=', 1602282390),
(18, 'rifkisamsung48@gmail.com', 'kuWQwi2VWmNXo7q2Jc0D7fHIJoKFfZlH8aCSGiebA8s=', 1602479827),
(20, 'candrabrata2@gmail.com', 'l1q3VdfK4LwnJnbUvFtqXltX7ufyhcbEUnBR6vcvQxk=', 1607710796),
(21, 'petfriendadmin@gmail.com', 'Ij2tHmQjMUTyakmHGtYMkz4/H2qseRpxNK0Sd/IZa38=', 1609654889),
(22, 'customer@gmail.com', 'Vj8tA4zBrzUpEwV9WlYYD8QDXmIgvr+l50zztvIg6sU=', 1609655085);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indeks untuk tabel `cf`
--
ALTER TABLE `cf`
  ADD PRIMARY KEY (`id_cf`),
  ADD KEY `symptom_id` (`symptom_id`) USING BTREE,
  ADD KEY `disease_id` (`disease_id`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `send_to` (`send_to`,`send_by`),
  ADD KEY `chat_ibfk_1` (`send_by`);

--
-- Indeks untuk tabel `diagnosis_result`
--
ALTER TABLE `diagnosis_result`
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`symptom_id`);

--
-- Indeks untuk tabel `pethealth_order`
--
ALTER TABLE `pethealth_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s1` (`sorder_id`),
  ADD KEY `docid` (`doc_id`);

--
-- Indeks untuk tabel `pethotel_order`
--
ALTER TABLE `pethotel_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ph_1` (`sorder_id`);

--
-- Indeks untuk tabel `petsalon_order`
--
ALTER TABLE `petsalon_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ps_1` (`sorder_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `products_order`
--
ALTER TABLE `products_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `po_ibfk_1` (`user_id`);

--
-- Indeks untuk tabel `products_order_detail`
--
ALTER TABLE `products_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pod_ibfk_1` (`order_id`),
  ADD KEY `pod_ibfk_2` (`product_id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_re_1` (`product_id`),
  ADD KEY `fk_re_2` (`user_id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services_order`
--
ALTER TABLE `services_order`
  ADD PRIMARY KEY (`sorder_id`),
  ADD KEY `ForeignKey` (`user_id`),
  ADD KEY `ForeignKey2` (`service_id`);

--
-- Indeks untuk tabel `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptom_id`),
  ADD KEY `type_id` (`type_id`) USING BTREE;

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cf`
--
ALTER TABLE `cf`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT untuk tabel `pethealth_order`
--
ALTER TABLE `pethealth_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pethotel_order`
--
ALTER TABLE `pethotel_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `petsalon_order`
--
ALTER TABLE `petsalon_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `products_order`
--
ALTER TABLE `products_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT untuk tabel `products_order_detail`
--
ALTER TABLE `products_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `services_order`
--
ALTER TABLE `services_order`
  MODIFY `sorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cf`
--
ALTER TABLE `cf`
  ADD CONSTRAINT `cf_ibfk_1` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cf_ibfk_2` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`symptom_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`send_by`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pethealth_order`
--
ALTER TABLE `pethealth_order`
  ADD CONSTRAINT `fk_s1` FOREIGN KEY (`sorder_id`) REFERENCES `services_order` (`sorder_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pethotel_order`
--
ALTER TABLE `pethotel_order`
  ADD CONSTRAINT `fk_ph_1` FOREIGN KEY (`sorder_id`) REFERENCES `services_order` (`sorder_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `petsalon_order`
--
ALTER TABLE `petsalon_order`
  ADD CONSTRAINT `fk_ps_1` FOREIGN KEY (`sorder_id`) REFERENCES `services_order` (`sorder_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_order`
--
ALTER TABLE `products_order`
  ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_order_detail`
--
ALTER TABLE `products_order_detail`
  ADD CONSTRAINT `pod_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `products_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pod_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_re_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_re_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `services_order`
--
ALTER TABLE `services_order`
  ADD CONSTRAINT `ForeignKey` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeignKey2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `symptoms`
--
ALTER TABLE `symptoms`
  ADD CONSTRAINT `sympt_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
