USE webshop;

SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE PRODUCT_GERELATEERD_PRODUCT;
TRUNCATE PRODUCT;
TRUNCATE GEBRUIKER;
TRUNCATE PRODUCT;
TRUNCATE CATEGORIE;

SET FOREIGN_KEY_CHECKS = 1;

INSERT categorie VALUES ('Uitlaatsysteem');
INSERT categorie VALUES ('Autoradio\'s');
INSERT categorie VALUES ('Motordelen & toebehoren');
INSERT categorie VALUES ('Sensoren & elektronica');

/** SET IDENTITY_INSERT PRODUCT ON -- this is always set in mysql by default */

INSERT INTO product VALUES (10, 'Einddemper', 'uitlaatsysteem: voor einddemper serienummer: 58.7063', 'Uitlaatsysteem',
                            CAST(45.57 AS DECIMAL(8, 2)), NULL, 'plaatjes/afbeeldingA.jpg',
                            'plaatjes/afbeeldingA-klein.jpg');
INSERT INTO product VALUES (11, 'Achterdemper',
                            'Dit zijn blauwe naaldhakken. Sed vitae purus sit amet tortor porta gravida sed ut massa. Quisque non arcu ut lectus adipiscing adipiscing a vel elit. Quisque pharetra eget velit sed fringilla. Sed nisl elit, interdum in elit id, sollicitudin eleifend metus. Sed et venenatis purus, at fringilla leo. Maecenas vestibulum euismod enim, sollicitudin bibendum mi consectetur id. Donec a turpis ac lorem aliquam cursus eget ac sem. Mauris eu tellus augue. Phasellus non risus massa. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi a fermentum libero ',
                            'Uitlaatsysteem', CAST(75.57 AS DECIMAL(8, 2)), 33, 'plaatjes/achterdemper.jpg',
                            'plaatjes/achterdemper-klein.jpg');
INSERT INTO product VALUES (13, 'Uitlaatpijp',
                            'Kwaliteit: OEM pasvorm Garantie: 2 jaar Montage: Uitlaatpijp Keurmerk: Met E-keur. Sed et venenatis purus, at fringilla leo. Maecenas vestibulum euismod enim, sollicitudin bibendum mi consectetur id. Donec a turpis ac lorem aliquam cursus eget ac sem. Mauris eu tellus augue. Phasellus non risus massa. ',
                            'Uitlaatsysteem', CAST(90.95 AS DECIMAL(8, 2)), 3, 'plaatjes/uitlaatpijp.jpg',
                            'plaatjes/uitlaatpijp-klein.jpg');
INSERT INTO product VALUES (14, 'Middendemper',
                            'Kwaliteit: OEM pasvorm Garantie: 2 jaar Montage: Middendemper Keurmerk: Met E-keur. Donec ante orci, fermentum a dui et, tempus faucibus risus. Aenean porta dapibus quam sodales eleifend. Donec congue mauris sit amet neque sodales varius. Integer vehicula vel lacus in consequat. Pellentesque et magna pharetra, mollis dolor eu, consectetur turpis. Nam porttitor, leo ac mattis blandit',
                            'Uitlaatsysteem', CAST(51.20 AS DECIMAL(8, 2)), 993, 'plaatjes/middendemper.jpg',
                            'plaatjes/middendemper-klein.jpg');

INSERT INTO product VALUES (15, 'USB/SD - FM/AM tuner en AUX-ingang (zonder CD speler)',
                            'Compacte en voordelige radio geschikt voor USB en MP3 met slechts 100 mm inbouwdiepte. Phasellus viverra molestie sagittis. Sed est odio, lacinia vel nisl et, vestibulum lacinia ',
                            'Autoradio\'s', CAST(44.95 AS DECIMAL(8, 2)), 45, 'plaatjes/autoradio-aux-ingang.jpg',
                            'plaatjes/autoradio-aux-ingang-klein.jpg');
INSERT INTO product VALUES (16, 'USB/SD/AUX - FM tuner and internal speakers',
                            'Deze compacte FM-tuner beschikt over een set ingebouwde 25W luidsprekers, waardoor het ideaal is voor gebruik in voertuigen/locaties waar er geen plaats is voor externe luidsprekers – maar de unit is daarnaast ook nog voorzien van externe luidspreker uitgangen met 4x75W vermogen. De specificaties omvatten 18 FM voorkeuze zenders, MP3-muziek afspelen, USB en SD-compatibiliteit, en leest ID3 tags voor artiest, titel, album en genre. De AUX-ingang maakt het mogelijk draagbare MP3-apparaten aan te sluiten. Voor extra gemak voorzien van ACC logica,voor een uur spelen zonder dat het contact AAN hoeft te staan. Ook met EEPROM dat ervoor zorgt dat alle geheugen en instellingen worden bewaard, zelfs wanneer alle stoomtoevoer wordt losgekoppeld. Slechts 125mm diep, past dus in ondiepe ISO-slots en het is geschikt voor 12V en 24V voertuigen spanningen.',
                            'Autoradio\'s', CAST(74.64 AS DECIMAL(8, 2)), 47,
                            'plaatjes/aux-fm-tuner-and-internal-speakers.jpg',
                            'plaatjes/aux-fm-tuner-and-internal-speakers-klein.jpg');

INSERT INTO product VALUES (17, 'DVD/USB/SD - FM/AM tuner, navigatie en draadloze Bluetooth® technologie ',
                            'Speciaal ontworpen om te passen in vele Volkswagen, Skoda en Seat dashboards,
                             dit prachtige gecombineerde navigatiesysteem en DVD speler/tuner brengt je waar je moet zijn
                             met behulp van het heldere 7-inch touch-screen. De toetsverlichting is ook aanpasbaar
                             naar het dashboard van uw auto. iGo navigatiesoftware voor West-en Oost-Europa en
                             een CANBUS interface voor plug-and-play verbinding met de stuurbediening van uw auto,
                             klimaatregeling en andere functies zijn inclusief. Het heeft Bluetooth voor hifi-kwaliteit
                             audio streaming (A2DP) en is uitgerust met een Parrot® hands-free kit, te koppelen met
                             maximaal 5 apparaten. Verder is er 4x75W vermogen, 18FM en 12AM presets, dubbele RCA-uitgangen,
                             camera-ingang, een afstandsbediening en meer. Canbus interface:
                             Externe canbus module voor 100% plug\'n play en functionaliteit.(Stuurwielbediening,
                             climate control, stoelverwarming, parkingsensor, camera,
                             telefoon bediening etc.(incl.scherm info:radio, nummer, telefoon, navigatie-instructies op MFD)',
                            'Autoradio\'s', CAST(677.60 AS DECIMAL(8, 2)), 45, 'plaatjes/FM-AM-tuner-en-AUX-ingang.jpg',
                            'FM-AM-tuner-en-AUX-ingang-klein.jpg');

INSERT INTO product VALUES (34, 'Tandriem 14362 FEBI',
                            'Gewicht (kg): 0,1 Aanvullende artikelen / Aanvullende info 2: Voor nokkenas . Etiam libero nulla, sagittis vitae tellus at, ornare varius ante. Nunc leo nisi, placerat non convallis id, fermentum in metus. Nunc sollicitudin eleifend hendrerit. Nam neque velit, vehicula vel egestas ac, blandit feugiat leo. Morbi ',
                            'Motordelen & toebehoren', CAST(8.75 AS DECIMAL(8, 2)), 5, 'plaatjes/distributieriem-tandriem.jpg',
                            'plaatjes/distributieriem-tandriem-klein.jpg');


INSERT INTO product VALUES (35, 'Waterpomp 17638 FEBI',
                            'Gewicht (kg): 1,207 Vereist aantal stuks: 1 Aanvullend artikel/aanvullende. lus bibendum, porttitor fermentum lectus placerat',
                            'Motordelen & toebehoren', CAST(51.67 AS DECIMAL(8, 2)), 33, 'plaatjes/waterpomp-FEBI.jpg',
                            'plaatjes/waterpomp-FEBI-klein.jpg');


INSERT INTO product VALUES (36, 'Regensensor 37964 FEBI',
                            'Nunc imperdiet est a ligula malesuada, sit amet mollis nisl gravida. Etiam eget fringilla leo. Maecenas dolor eros, pretium eget commodo eget, sagittis aliquet lacus. In tempus suscipit velit sed gravida. Nulla id magna tincidunt, iaculis enim non, egestas mi. Praesent vel est iaculis, semper lacus id, suscipit odio. Phasellus nec lacus tempus, pharetra nunc vitae, congue risus. Nam ut ligula neque. Curabitur vel fermentum massa. Etiam iaculis egestas aliquet',
                            'Sensoren & elektronica', CAST(139.55 AS DECIMAL(8, 2)), 25, 'plaatjes/regensensor.jpg',
                            'plaatjes/regensensor-klein.jpg');
INSERT INTO product VALUES (37, 'Black&Decker BDV090 Acculader 6V & 12V',
                            'Black&Decker BDV090 Acculader 6V & 12V .Vivamus mattis odio eu ultrices elementum. Praesent ac quam turpis. Nulla at est quis dolor dignissim suscipit vitae at dui. Etiam scelerisque venenatis lorem a aliquam. Duis laoreet posuere eros non ultricies. Quisque tempus eu mi in feugiat. Mauris euismod ac sem ut volutpat.',
                            'Sensoren & elektronica', CAST(27.00 AS DECIMAL(8, 2)), NULL, 'plaatjes/acculader.jpg',
                            'plaatjes/acculader-klein.jpg');
INSERT INTO product VALUES (38, 'Cruise Control MS50',
                            'CruiseControle MS50. snelheid instellen en opnieuw oproepen van de ingestelde snelheid. fijnaanpassing van de rijsnelheid (tap up/tap down). voor alle voertuigen met 12 volt boordspanning. Praesent ac quam turpis. Nulla at est quis dolor dignissim suscipit vitae at dui. Etiam scelerisque venenatis lorem a aliquam. Duis laoreet posuere eros non ultricies. Quisque tempus eu mi in feugiat. Mauris euismod ac sem ut volutpat.',
                            'Sensoren & elektronica', CAST(208.05 AS DECIMAL(8, 2)), NULL, 'plaatjes/cruise-control.jpg',
                            'plaatjes/cruise-control-klein.jpg');



INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (10, 11);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (10, 13);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (11, 10);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (11, 13);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (11, 16);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (17, 10);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (17, 11);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (17, 36);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (36, 34);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (36, 35);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (36, 37);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (38, 35);
INSERT INTO PRODUCT_GERELATEERD_PRODUCT VALUES (38, 36);

INSERT INTO GEBRUIKER VALUES
  ('barabas', 'Professor', NULL, 'Barabas', 'Bollebozen', 12, '9574EC', 'Amoras', 'barabase@vandersteen.be', 'm',
              'teletijdmachine');
INSERT INTO GEBRUIKER VALUES
  ('franka', 'Frank', NULL, 'Francesca Victoria', 'Museumstraat', 1, '4920DD', 'Groterdam', 'franka@striphelden.eu',
             'v', 'Bars');
INSERT INTO GEBRUIKER VALUES
  ('pietjepuk', 'Pietje', NULL, 'Puk', 'Postlaan', 6, '3453AA', 'Keteldorp ', 'pietjepuk@pttpost.nl', 'm', 'spitsoor');
INSERT INTO GEBRUIKER
VALUES ('wdviking', 'Wicky', 'de', 'Viking', 'Whalhalla', 87, '4326BB', 'Flake', 'wicky@halmar.com', 'm', 'ylvi');
