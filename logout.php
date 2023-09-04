<?php
  session_start();
  $_SESSION['user'] = [];
  header('Location: /sicah-web/login.php');
