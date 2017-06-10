USE webshop;

SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE PRODUCT_GERELATEERD_PRODUCT;
TRUNCATE PRODUCT;
TRUNCATE GEBRUIKER;
TRUNCATE PRODUCT;
TRUNCATE CATEGORIE;

SET FOREIGN_KEY_CHECKS = 1;

INSERT categorie VALUES ("Autoradio's");
INSERT categorie VALUES ('Uitlaatsysteem');
INSERT categorie VALUES ('Motordelen & toebehoren');
INSERT categorie VALUES ('Sensoren & elektronica');

/** SET IDENTITY_INSERT PRODUCT ON -- this is always set in mysql by default */

INSERT INTO product VALUES (10, 'Einddemper', 'uitlaatsysteem: voor einddemper serienummer: 58.7063', 'Uitlaatsysteem', CAST(45.57 AS Decimal(8, 2)), NULL, 'plaatjes/afbeeldingA.jpg', 'plaatjes/afbeeldingA-klein.jpg');
INSERT INTO product VALUES (11, 'Achterdemper', 'Dit zijn blauwe naaldhakken. Sed vitae purus sit amet tortor porta gravida sed ut massa. Quisque non arcu ut lectus adipiscing adipiscing a vel elit. Quisque pharetra eget velit sed fringilla. Sed nisl elit, interdum in elit id, sollicitudin eleifend metus. Sed et venenatis purus, at fringilla leo. Maecenas vestibulum euismod enim, sollicitudin bibendum mi consectetur id. Donec a turpis ac lorem aliquam cursus eget ac sem. Mauris eu tellus augue. Phasellus non risus massa. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi a fermentum libero ', 'Uitlaatsysteem', CAST(75.57 AS Decimal(8, 2)), 33, 'plaatjes/achterdemper.jpg', 'plaatjes/achterdemper-klein.jpg');
INSERT INTO product VALUES (13, 'Uitlaatpijp', 'Kwaliteit: OEM pasvorm Garantie: 2 jaar Montage: Uitlaatpijp Keurmerk: Met E-keur. Sed et venenatis purus, at fringilla leo. Maecenas vestibulum euismod enim, sollicitudin bibendum mi consectetur id. Donec a turpis ac lorem aliquam cursus eget ac sem. Mauris eu tellus augue. Phasellus non risus massa. ', 'Uitlaatsysteem', CAST(90.95 AS Decimal(8, 2)), 3, 'plaatjes/uitlaatpijp.jpg', 'plaatjes/uitlaatpijp-klein.jpg');
INSERT INTO product VALUES (14, 'Middendemper', 'Kwaliteit: OEM pasvorm Garantie: 2 jaar Montage: Middendemper Keurmerk: Met E-keur. Donec ante orci, fermentum a dui et, tempus faucibus risus. Aenean porta dapibus quam sodales eleifend. Donec congue mauris sit amet neque sodales varius. Integer vehicula vel lacus in consequat. Pellentesque et magna pharetra, mollis dolor eu, consectetur turpis. Nam porttitor, leo ac mattis blandit', 'Uitlaatsysteem', CAST(51.20 AS Decimal(8, 2)), 993, 'plaatjes/middendemper.jpg', 'plaatjes/middendemper-klein.jpg');

INSERT INTO product VALUES (15, 'Product E', 'tempor suscipit enim ac rhoncus. Phasellus sit amet dapibus erat. Curabitur tempor auctor urna, quis luctus felis vestibulum sed. Vestibulum suscipit bibendum tincidunt. Sed ac condimentum eros. Fusce luctus convallis turpis eu tristique. Nunc metus tortor, imperdiet iaculis turpis sed, scelerisque hendrerit odio. Nunc sit amet ipsum ut turpis fringilla venenatis. Phasellus viverra molestie sagittis. Sed est odio, lacinia vel nisl et, vestibulum lacinia ', 'categorie DD', CAST(44.00 AS Decimal(8, 2)), 45, 'plaatjes/afbeeldingE.jpg', 'plaatjes/afbeeldingE-klein.jpg');
INSERT INTO product VALUES (16, 'Product F', 'Cras tincidunt gravida dignissim. Mauris at commodo augue, ac tristique erat. Proin a adipiscing leo, et volutpat eros. Aenean eros arcu, cursus nec dolor non, aliquam pharetra lectus. Sed feugiat tristique risus eget tristique. Donec pharetra augue justo, sit amet vestibulum erat commodo id. Curabitur a molestie est. Sed a bibendum erat, quis vestibulum lorem. Duis interdum pulvinar enim, quis iaculis erat ullamcorper scelerisque. Nunc vel erat aliquam, vulputate nibh non, sagittis magna. Aliquam egestas posuere purus, vitae tristique risus porta a. Nunc nec elit iaculis, mattis purus nec, sagittis tellus. Maecenas auctor id urna id malesuada. Vivamus pellentesque turpis velit, quis bibendum tortor placerat vitae. Phasellus condimentum ligula vel dignissim tempus. ', 'categorie BB', CAST(66.00 AS Decimal(8, 2)), 47, 'plaatjes/afbeeldingF.jpg', 'plaatjes/afbeeldingF-klein.jpg');
INSERT INTO product VALUES (17, 'Product G', 'Cras sodales placerat imperdiet. Nunc adipiscing, lectus a gravida pulvinar, sapien metus commodo ipsum, at cursus orci est vitae massa. Morbi at enim purus. Etiam luctus massa eu nisi bibendum blandit. Donec tincidunt lorem at justo lacinia viverra. Suspendisse semper nulla vel sollicitudin elementum. Vivamus ac augue urna. Ut et lorem malesuada, vestibulum tellus et, porttitor orci. Phasellus vitae pretium elit. Curabitur diam neque, aliquam quis nunc vel, placerat aliquet tortor. Morbi tempus est at lectus tincidunt, in malesuada nunc aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur malesuada gravida tortor eget iaculis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec facilisis congue sem at fringilla. Quisque adipiscing ante ipsum, in condimentum felis varius eu. Sed ultricies, orci non scelerisque congue, lacus justo blandit felis, sit amet faucibus tellus massa vel libero. In vestibulum mi ut adipiscing vehicula. Aenean pulvinar, sem quis elementum porttitor, massa mauris ultricies risus, eget lobortis lacus turpis non erat. Quisque ornare bibendum aliquam. Sed laoreet ornare laoreet. Nullam et dui accumsan, vulputate mi non, tristique lectus. ', 'categorie BB', CAST(5432.00 AS Decimal(8, 2)), 996, 'plaatjes/afbeeldingG.jpg', 'plaatjes/afbeeldingG-klein.jpg');
INSERT INTO product VALUES (34, 'Product H', 'Sed id ipsum in nisi tempus luctus quis ac mi. In hac habitasse platea dictumst. Donec dapibus sollicitudin quam, vel ultrices orci porttitor ut. Suspendisse potenti. Aliquam et lorem vitae ante porttitor pellentesque. Cras sit amet accumsan nisl. Phasellus quam magna, tincidunt non risus vitae, adipiscing pharetra sapien. In hac habitasse platea dictumst. Morbi lorem urna, luctus eget pellentesque euismod, rutrum a nulla. Curabitur imperdiet facilisis felis, sit amet tincidunt diam venenatis at. Etiam libero nulla, sagittis vitae tellus at, ornare varius ante. Nunc leo nisi, placerat non convallis id, fermentum in metus. Nunc sollicitudin eleifend hendrerit. Nam neque velit, vehicula vel egestas ac, blandit feugiat leo. Morbi ', 'categorie AA', CAST(324.00 AS Decimal(8, 2)), 5, 'plaatjes/afbeeldingH.jpg', 'plaatjes/afbeeldingH-klein.jpg');
INSERT INTO product VALUES (35, 'Product I', 'Ut non sapien vel mauris varius gravida non et leo. Vestibulum vitae nibh porta, blandit nisi a, tincidunt neque. Sed a pretium leo, sit amet consequat felis. Quisque vehicula, mi at semper placerat, massa turpis elementum odio, in gravida lectus nisl eu metus. Duis scelerisque rutrum scelerisque. Sed in ornare mauris. Donec imperdiet, turpis a pellentesque tristique, magna sem tempus tortor, at pharetra libero velit at ante. Integer euismod dolor nec tellus bibendum, porttitor fermentum lectus placerat', 'categorie AA', CAST(789.00 AS Decimal(8, 2)), 33, 'plaatjes/afbeeldingI.jpg', 'plaatjes/afbeeldingI-klein.jpg');
INSERT INTO product VALUES (36, 'Product J', 'Nunc imperdiet est a ligula malesuada, sit amet mollis nisl gravida. Etiam eget fringilla leo. Maecenas dolor eros, pretium eget commodo eget, sagittis aliquet lacus. In tempus suscipit velit sed gravida. Nulla id magna tincidunt, iaculis enim non, egestas mi. Praesent vel est iaculis, semper lacus id, suscipit odio. Phasellus nec lacus tempus, pharetra nunc vitae, congue risus. Nam ut ligula neque. Curabitur vel fermentum massa. Etiam iaculis egestas aliquet', 'categorie AA', CAST(4.00 AS Decimal(8, 2)), 25, 'plaatjes/afbeeldingJ.jpg', 'plaatjes/afbeeldingJ-klein.jpg');
INSERT INTO product VALUES (37, 'Product K', 'Fusce eu lorem nunc. Ut sit amet massa ac est venenatis iaculis sed ut elit. In hac habitasse platea dictumst. Etiam mollis sit amet dolor id iaculis. Vivamus mattis odio eu ultrices elementum. Praesent ac quam turpis. Nulla at est quis dolor dignissim suscipit vitae at dui. Etiam scelerisque venenatis lorem a aliquam. Duis laoreet posuere eros non ultricies. Quisque tempus eu mi in feugiat. Mauris euismod ac sem ut volutpat.', 'categorie AA', CAST(44.00 AS Decimal(8, 2)), NULL, 'plaatjes/afbeeldingK.jpg', 'plaatjes/afbeeldingK-klein.jpg');

INSERT INTO PRODUCT_GERELATEERD_PRODUCT  VALUES (10, 11);
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

INSERT INTO GEBRUIKER VALUES ('barabas', 'Professor', NULL, 'Barabas', 'Bollebozen', 12, '9574EC', 'Amoras', 'barabase@vandersteen.be', 'm', 'teletijdmachine');
INSERT INTO GEBRUIKER VALUES ('franka', 'Frank', NULL, 'Francesca Victoria', 'Museumstraat', 1, '4920DD', 'Groterdam', 'franka@striphelden.eu', 'v', 'Bars');
INSERT INTO GEBRUIKER VALUES ('pietjepuk', 'Pietje', NULL, 'Puk', 'Postlaan', 6, '3453AA', 'Keteldorp ', 'pietjepuk@pttpost.nl', 'm', 'spitsoor');
INSERT INTO GEBRUIKER VALUES ('wdviking', 'Wicky', 'de', 'Viking', 'Whalhalla', 87, '4326BB', 'Flake', 'wicky@halmar.com', 'm', 'ylvi');
