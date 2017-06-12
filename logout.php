<?php

session_start();
session_destroy();

echo 'Je wordt uitgelogd...';

sleep(2);

header('Location: ' . $_SERVER['HTTP_REFERER']);