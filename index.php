<?php
// 
// This is Music Utopia
// Initial app index file
//
// Code by Gilberto Cortez
//

// Include required files
require '_private/global.inc.php';
require '_inc/curl.class.php';

// Check to see if user session has been created
if (!empty($_SESSION['spotify_token'])) {
    include '_inc/dashboard.inc.php';
} else {
    include '_inc/home.inc.php';
}
