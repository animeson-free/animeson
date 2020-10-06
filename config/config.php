<?php

date_default_timezone_set('America/Fortaleza');

include_once 'constants.php';
include_once 'database.php';
include_once 'functions.php';

session_start();
db_connect(true);