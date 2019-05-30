<?php
require 'function.php';
$data_rfbr= file_get_contents('https://www.rfbr.ru/rffi/ru/contest');
parser_rfbr($data_rfbr);
//echo $data_rsi;
 ?>
