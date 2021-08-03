<?php
require_once('admin/lib/functions.php');

unset($_SESSION['admin']);
// $_SESSION['username'] = NULL;

redirect_to('index.php');
exit;
?>