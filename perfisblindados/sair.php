<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['busca']);
header("Location: login.php");