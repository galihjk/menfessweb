<?php

include("init.php");

session_destroy();
header('Location: login.php?newlogin=1');
