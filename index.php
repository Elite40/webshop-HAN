<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('init.php');

$page = (isset($_GET['page']) ? strtolower($_GET['page']) : 'home');

$pageToLoad = __DIR__;

switch ($page) {
    case 'home':
        $pageToLoad .= '/views/home.php';
        break;
    case 'over-ons':
        $pageToLoad .= '/views/over-ons.php';
        break;
    case 'acties':
        $pageToLoad .= '/views/acties.php';
        break;
    case 'vacatures':
        $pageToLoad .= '/views/vacatures.php';
        break;
    case 'nieuws':
        $pageToLoad .= '/views/nieuws.php';
        break;
    case 'webshop':
        $pageToLoad .= '/views/Products.view.php';
        break;
    case 'registreren':
        $pageToLoad .= '/views/register.php';
        break;
    default:
        $pageToLoad .= '/views/home.php';
        break;
}

?>

<!DOCTYPE>
<html>
<head>
    <title>...</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="assets/css/master.css" type="text/css">
    <link rel="stylesheet" href="assets/css/ad.css" type="text/css">
    <link rel="stylesheet" href="assets/css/productenoverzicht.css" type="text/css">
    <link rel="stylesheet" href="assets/css/productpagina.css" type="text/css">
    <link rel="stylesheet" href="assets/css/registreren.css" type="text/css">
    <link rel="stylesheet" href="assets/css/winkelwagen.css" type="text/css">
</head>
<body>
<?php require 'views/ad.php'; ?>

<div class="wrapper">

    <?php include 'views/header.php'; ?>

    <?php
    if((@include $pageToLoad) === false)
    {
        echo "<h3> Pagina <i>" . $pageToLoad . "</i> bestaat niet </h3>";
    }else {
         include_once $pageToLoad;
    }
    ?>

</div>

</body>
</html>

<?php $pageToLoad = __DIR__; ?>