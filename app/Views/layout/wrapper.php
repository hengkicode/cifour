<?php 
$session = \Config\Services::session($config);
// Check session

// Check session
if ($session->get('user_id')) {
    // Lakukan sesuatu jika session user_id tersedia
}

// Gabungin ya semua bagian layout
require_once('head.php');
require_once('header-menu.php');
require_once('content.php');
require_once('footer.php');