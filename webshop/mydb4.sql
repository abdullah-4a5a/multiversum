-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 jun 2017 om 00:03
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb4`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `ProductNaam` varchar(45) DEFAULT NULL,
  `Vooraad` varchar(45) DEFAULT NULL,
  `Prijs` decimal(9,2) DEFAULT NULL,
  `Plaatje` varchar(75) NOT NULL,
  `Detail` text NOT NULL,
  `Platform` text NOT NULL,
  `Eigen display` text NOT NULL,
  `Resolutie` text NOT NULL,
  `Refresh rate` text NOT NULL,
  `Gezichtsveld` text NOT NULL,
  `Functies` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`idProduct`, `ProductNaam`, `Vooraad`, `Prijs`, `Plaatje`, `Detail`, `Platform`, `Eigen display`, `Resolutie`, `Refresh rate`, `Gezichtsveld`, `Functies`) VALUES
(1, 'Oculus Rift', '234', '588.73', '2000898912.png', 'De Oculus Rift geeft jouw de beste game ervaring die er is. Deze virtual reality bril laat jou het spel spelen alsof jij er echt in zit. Dit komt doordat de Oculus Rift gebruik maakt van twee OLED displays en een kijkhoek heeft van 110 graden. Gezamenlijke hebben de displays een resolutie van 2160 bij 1200 en een refresh rate van 90Hz. Hierdoor zie jij bijna alles wat er om je heen gebeurd. Met een geavanceerde en fijn ontwerp, zit deze bril erg comfortabel op je hoofd. De bril is voorzien van een headset, waardoor het geluid direct op je oor zit. Met de meegeleverde afstandsbediening kan je makkelijk door het menu navigeren.', 'PC\n', 'Ja', '2160x1200', '90Hz', '110°', 'Accelerometer, Gyroscoop, Koptelefoon, Magnetometer'),
(2, 'HTC Vive', '4', '899.00', '2000965529.jpeg', 'Baanbrekende visuele technologie\nHeeft 2160x1200 dubbelscherm technologie (1080 x 1200 per oog), die 90bps weergeeft, speciaal ontworpen voor een optimale virtual reality ervaring, in combinatie met speciaal ontworpen optiek voor heldere en levendige beelden die je elke keer weer van je stoel zullen blazen.', 'PC', 'Ja', '2160x1200', '90Hz', '110°', 'Accelerometer, Gyroscoop, Koptelefoon, Magnetometer'),
(3, 'Sony PlayStation VR', '2', '379.00', '2000774356.png', 'Met de Carl Zeiss VR One Plus duik je in combinatie met je smartphone in een virtuele wereld. Door het ontwerp van de lenzen is het beeld altijd scherp. Mede dankzij de universele smartphone lade is de VR headset geschikt voor ieder Android of Apple toestel tussen de 4,7 en 5,5 inch. De virtual reality-bril is inclusief transparante achterkant, zodat hij ook gebruikt kan worden voor augmented reality toepassingen. Iets te veel virtuele achtbaanritjes gehad? Je kunt het schuim aan de binnenkant makkelijk vervangen voor een frisse start.', 'PlayStation 4', 'Ja', '1920x1080', '90Hz', '100°', 'Accelerometer, Gyroscoop'),
(4, 'Samsung Galaxy Gear VR (v2)', '125', '59.00', '2000774349.jpeg', 'De Samsung Gear VR is een verbeterde voortzetting van de eerdere VR-brillen van Samsung. Met deze Virtual Reality-headset word je zelf onderdeel van je games en video’s. Door je Samsung Galaxy-smartphone te gebruiken als scherm, geniet je van haarscherpe beeldkwaliteit. Voor meer video’s en games kun je terecht in de Oculus Store, waar je de beschikking hebt over een ruime keus aan 360-gradenfilms en games die virtual reality ondersteunen. Bovendien biedt deze Samsung Gear je een virtueel keyboard dat beschikbaar is in meerdere talen, zodat ook communiceren via je VR-headset extra gemakkelijk is.', 'Smartphone', 'Nee', '	1920x1080', '90Hz', '96°', 'Accelerometer, Gyroscoop'),
(5, 'Samsung Gear VR 2', '31', '64.95', '2001229257.jpeg', 'Met de Samsung New Gear VR brengen Samsung en Oculus de wereld van VR games en video\'s naar je telefoon. Klik je (geschikte) Samsung telefoon in de voorkant van de bril, waarna deze als scherm dient. Je bedient de bril met het trackpad aan de zijkant. Nieuw aan het trackpad is de fysieke \'home\' knop, waardoor je makkelijk naar het menu schakelt. Ook de lens is verbeterd, hierdoor is hij beter af te stellen en zijn de graphics scherper. Jouw kijkrichting bepaalt wat je op dat moment ziet: kijk je omhoog dan zie je bijvoorbeeld de lucht, kijk je naar beneden dan zie je grond waar je op \'staat\'. Dit laat je films en games vanuit elke hoek beleven.', 'Smartphone', 'Nee', '1920x1080', '90Hz', '101°', 'Accelerometer, Gyroscoop'),
(6, 'HTC Vive Business Edition', '32', '1399.00', '2001357491.jpeg', 'Baanbrekende visuele technologie Heeft 2160x1200 dubbelscherm technologie (1080 x 1200 per oog), die 90bps weergeeft, speciaal ontworpen voor een optimale virtual reality ervaring, in combinatie met speciaal ontworpen optiek voor heldere en levendige beelden die je elke keer weer van je stoel zullen blazen.', '	PC', 'Ja', '2160x1200', '90Hz', '110°', 'Accelerometer, Camera, Gyroscoop, Verstelbare lenzen'),
(7, 'OSVR Hacker Development Kit 2', '11', '379.99', '2001139019.png', 'Baanbrekende visuele technologie\nHeeft 2160x1200 dubbelscherm technologie (1080 x 1200 per oog), die 90bps weergeeft, speciaal ontworpen voor een optimale virtual reality ervaring, in combinatie met speciaal ontworpen optiek voor heldere en levendige beelden die je elke keer weer van je stoel zullen blazen.', 'Pc', 'Ja', '2160x1200', '90Hz', '101°', 'Accelerometer, Gyroscoop, Koptelefoon, Magnetometer'),
(8, 'Samsung Galaxy Gear VR', '18', '132.00', '2000611042.jpeg', 'De Samsung Gear VR is een verbeterde voortzetting van de eerdere VR-brillen van Samsung. Met deze Virtual Reality-headset word je zelf onderdeel van je games en video’s. Door je Samsung Galaxy-smartphone te gebruiken als scherm, geniet je van haarscherpe beeldkwaliteit. Voor meer video’s en games kun je terecht in de Oculus Store, waar je de beschikking hebt over een ruime keus aan 360-gradenfilms en games die virtual reality ondersteunen. Bovendien biedt deze Samsung Gear je een virtueel keyboard dat beschikbaar is in meerdere talen, zodat ook communiceren via je VR-headset extra gemakkelijk is.', 'Smartphone', 'Nee', '2160x1200', '90Hz', '101°', 'Accelerometer, Gyroscoop'),
(9, 'VR BOX VR-bril', '44', '10.95', '2000949925.jpeg', 'Beleef jouw favoriete speelfilm of videogame nog intenser met de VR BOX Virtual Reality Bril. De VR BOX is speciaal ontworpen voor smartphones van 4.7 tot en met 6 inch. Je plaatst het toestel in de VR BOX smartphone houder en jou telefoon wordt omgetoverd naar een eigen 3D bioscoop. De VR BOX Virtual Reality bril beschikt over een comfortabele hoofdband met zacht schuimen randen. Daarnaast is de VR BOX eenvoudig te verstellen naar de meest optimale afstand voor je ogen. Bevind je elke keer in een uitzonderlijke omgeving, dankzij de VR BOX Virtual Reality bril.', 'Smartphone', 'Nee', '1920x1080', '90Hz', '101°', 'Accelerometer, Gyroscoop'),
(10, 'Samsung Gear VR 2', '72', '64.95', '2001229257.jpeg', 'Met de Samsung New Gear VR brengen Samsung en Oculus de wereld van VR games en video\'s naar je telefoon. Klik je (geschikte) Samsung telefoon in de voorkant van de bril, waarna deze als scherm dient. Je bedient de bril met het trackpad aan de zijkant. Nieuw aan het trackpad is de fysieke \'home\' knop, waardoor je makkelijk naar het menu schakelt. Ook de lens is verbeterd, hierdoor is hij beter af te stellen en zijn de graphics scherper. Jouw kijkrichting bepaalt wat je op dat moment ziet: kijk je omhoog dan zie je bijvoorbeeld de lucht, kijk je naar beneden dan zie je grond waar je op \'staat\'. Dit laat je films en games vanuit elke hoek beleven', 'Smartphone', 'Nee', '1920x1080', '90Hz', '96°', 'Accelerometer, Gyroscoop'),
(11, 'Zeiss VR One Plus', '2', '97.50', '2001122203.jpeg', 'Niet te vergelijken met de veel min­der realistische 3D-ervaring op een tv. Met deze bril maakt u namelijk zelf deel uit van de actie. Adembenemend echt: u bent niet langer slechts een toeschouwer. Door naar voren, naar boven of opzij te kijken, ziet u zonder vertraging wat er om u heen gebeurt. Dit effect wordt versterkt door de extra grote 100 °-kijkhoek. En dat alles voor een aan­trekkelijke prijs.', 'Smartphone', 'Nee', '1920x1080', '90Hz', '	100°', 'Verstelbare lenzen'),
(12, 'Google Daydream View', '5', '119.00', '2001253193.jpeg', 'De Daydream View is de VR-headset die Google heeft uitgebracht voor het mobiele Daydream virtual reality-platform. Daydream View is ontwikkeld voor smartphones die Daydream VR ondersteunen, zoals de nieuwe Google Pixel of Pixel XL, of andere smartphones die Daydream-ready zijn. De bril meet 166,8 x 106,2 x 98,6mm en weegt 220 gram. In feite is de Daydream View VR-bril de perfecte match voor de nieuwe Google Pixel Smartphones.', 'Smartphone', 'Nee', '2160x1200', '90Hz', '110°', 'Accelerometer, Gyroscoop'),
(13, 'Homido Virtual Reality Headset', '23', '30.65', '2000566018.png', 'Met deze Homido VR Headset V2 stap je comfortabel en relatief goedkoop in de wereld van virtual reality. Schuif je 4 tot 6 inch Android of iOS smartphone in de VR bril en plaats je jezelf in een virtuele wereld. Maak gebruik van de vele afstelmogelijkheden en zet de VR bril helemaal naar jouw hoofd. Stel de afstelbare lenzen nauwkeurig af en plaats ze recht voor je ogen. Zo heb je geen last van een dubbele weergave. Span de hoofdband aan zodat de VR bril tijdens het gebruik niet van je hoofd af valt.', 'Smartphone', 'Nee', '1920x1080', '90Hz', '101°', 'Accelerometer, Gyroscoop, Verstelbare lenzen'),
(14, 'LG R100 360 VR', '11', '52.50', '2001081273.jpeg', 'LG 360 VR. Type: Dedicated displaySichtwinkel: 80°. USB-connector: USB-type een, USB type-C, USB versie: 2.0 minimale scherm grootte compatibiliteit: 4.78 cm (1,88 inch). Grootte van de glazen: 16.4 cm, diepte: 18.6 cm, hoogte: 4.59 cmVirtual reality bril voor LG G5Darstellung van beelden, video\'s en spelletjes in een virtuele ruimte in 360° GradKompatibel met Google karton, 360 van YouTube en Google StreetviewPerfekt in combinatie met LG 360 cam: vertegenwoordiging van eigen 360 ° afbeeldingen in de virtuele RaumGeringes gewicht voor meer gebruiksgemak dankzij de compacte constructie, meer beheersbaar in vergelijking met andere VR SystemePraktische aansluitkabel : Geen inbrengen van smartphones nötigSeparate weergegeven voor elk oog met hoge resolutie (639 PPI)', 'Smartphone\n', 'Ja', '1920x720', '90Hz', '80°', 'Accelerometer, Gyroscoop'),
(15, 'Aukey Cortex 4K VR', '7', '234.69', '2001462165.jpeg', 'Baanbrekende visuele technologie Heeft 2160x1200 dubbelscherm technologie (1080 x 1200 per oog), die 90bps weergeeft, speciaal ontworpen voor een optimale virtual reality ervaring, in combinatie met speciaal ontworpen optiek voor heldere en levendige beelden die je elke keer weer van je stoel zullen blazen.', 'Pc', 'Ja', '3840x2160 (Ultra-HD)', '90Hz', '110°', 'Gyroscoop, Koptelefoon Alles openen'),
(16, 'Vuzix iWear', '53', '604.69', '2001317733.png', 'Beleef jouw favoriete speelfilm of videogame nog intenser met de VR BOX Virtual Reality Bril. De VR BOX is speciaal ontworpen voor smartphones van 4.7 tot en met 6 inch. Je plaatst het toestel in de VR BOX smartphone houder en jou telefoon wordt omgetoverd naar een eigen 3D bioscoop. De VR BOX Virtual Reality bril beschikt over een comfortabele hoofdband met zacht schuimen randen. Daarnaast is de VR BOX eenvoudig te verstellen naar de meest optimale afstand voor je ogen. Bevind je elke keer in een uitzonderlijke omgeving, dankzij de VR BOX Virtual Reality bril.', 'PC, PlayStation 4, Smartphone, Xbox One', 'Ja', '1280x720', '60Hz', '55°', 'Accelerometer, Gyroscoop, Koptelefoon, Magnetometer, Microfoon Alles openen'),
(17, 'Carl Zeiss VR One', '34', '134.65', '2000609556.png', 'Niet te vergelijken met de veel min­der realistische 3D-ervaring op een tv. Met deze bril maakt u namelijk zelf deel uit van de actie. Adembenemend echt: u bent niet langer slechts een toeschouwer. Door naar voren, naar boven of opzij te kijken, ziet u zonder vertraging wat er om u heen gebeurt. Dit effect wordt versterkt door de extra grote 100 °-kijkhoek. En dat alles voor een aan­trekkelijke prijs.', 'Smartphone', 'Nee', '1280x720', '90Hz', '100°', 'Accelerometer, Gyroscoop');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
