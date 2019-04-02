<?php

session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['sobrenome'], $_SESSION['password']);


header("Location: ../index.php");