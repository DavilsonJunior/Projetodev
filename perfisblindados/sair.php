<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['usuario']);
unset($_SESSION['funcio']);
header("Location: login.php");