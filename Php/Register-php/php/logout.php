<?php

session_start();

session_destroy();

unset($_SESSION['user_rid']);

header('location: ../index.php');
die();
