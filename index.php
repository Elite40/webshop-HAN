<?php
require('init.php');

$page = (isset($_GET['page']) ? strtolower($_GET['page']) : 'home');

switch($page) {
  case 'home':
    require __DIR__ . '/views/over-ons.php';
  break;
  default:
  break;
}
