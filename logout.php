<?php

session_start();
unset ($SESSION['username']);
session_destroy();

header('Location: http://localhost:8888/login2/login.html');

?>