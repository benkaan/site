<?php
ob_start();
session_start();
session_destroy();
header('Location: http://localhost/site1.0.5/admin/index.php');
?>