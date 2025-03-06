<?php
session_start();
session_destroy();
header("Location: /DE/Homepage/index.html");
exit();
?>
