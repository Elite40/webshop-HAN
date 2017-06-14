<?php

function config($array, $field){
    return $GLOBALS[$array][$field];
}

function prettyPrint($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}