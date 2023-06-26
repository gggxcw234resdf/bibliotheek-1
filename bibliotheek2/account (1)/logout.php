<?php
session_start();
session_destroy();
header('Location: "../crud-php-index.php');
exit;
?>
