<?php
setcookie('usuario', '', time() - 3600, '/');
setcookie('nivel', '', time() - 3600, '/');
header('Location: login.php');
exit();

?>
