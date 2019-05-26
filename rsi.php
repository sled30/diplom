<?php
require 'function.php';
$data_rsi= file_get_contents('http://rsci.ru/grants/');
parser_rsi($data_rsi);

//echo $data_rsi;
 ?>
