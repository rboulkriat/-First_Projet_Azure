<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    require_once 'composants/CompMenu/compMenu.php'; 
    require_once 'composants/CompMenu/compMenu.php'; 
    $menu = new CompMenu();

    require_once 'composants/CompFooter/composant_footer.php'; 
    $footer = new CompFooter();

    require_once 'template.php';
    
?>

 