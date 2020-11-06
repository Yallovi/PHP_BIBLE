<?php
session_start();
unset($_SESSION['session_login']);
unset($_SESSION['user_id']);
unset($_SESSION['access']);
session_destroy();
header("location: ../guest/index.php");