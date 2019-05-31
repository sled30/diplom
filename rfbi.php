<?php
require 'function.php';
$data_rfbr= file_get_contents('https://www.rfbr.ru/rffi/ru/contest');
/*данные прилетают в вин1251 нужно перевести в утф-8*/
parser_rfbr($data_rfbr);

 ?>
