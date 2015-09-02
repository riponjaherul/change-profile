<?php
session_start();
session_destroy();
session_start();
$_SESSION['message'] = '<span style="color:green;">You are successfully logout</span>';
header('Location:index.php');