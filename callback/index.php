<?php
// 
// This is Music Utopia Callback File
// Handle responses from Spotify API
//
// Code by Gilberto Cortez
//


if (!empty($_GET['code'])) include '../_inc/requestLogIn.inc.php';
else {
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';
}
