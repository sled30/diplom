<?php
require_once 'function.php';
$fpi = file_get_contents('https://fpi.gov.ru/tenders/');
parser_fpi($fpi);
 ?>
