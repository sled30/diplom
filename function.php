<?php
phpinfo();
function parser_rfbr($data_rfbr){
  $cod = mb_detect_encoding($data_rfbr, $encod_list = mb_detect_order());
  var_dump($cod);
  $central = find_central_rfbr($data_rfbr);
  var_dump($central);
}
function find_central_rfbr($data_rfbr){
$match =  '/<td class="bold"> \W{3,6}_\D{1,2}<\/td>\s{1,9}<td>\s{1,12}<a class="link" href="(\/rffi\/ru\/contest\/o_\d{1,7})">(.{3,})<\/a>\s{2,}<\/td>\s{8}<td class="ta-c"><img src="\/rffi\/pf10_portal\/images\/contest\/cnt-y.png" title="Заявки принимаются" alt="Заявки принимаются"\/> <!--\d{4}--><\/td>\s{8}<td>(\d{2}.\d{2}.\d{4}) (\d{2}:\d{2})/';
preg_match_all($match, $data_rfbr, $list);
return $list;
}
function parser_rsi($data_rsi){
    // code...
  /*  $date = find_date_grant_rsi($data_rsi);
    $url = find_url_grant_rsi($data_rsi);
    $teg = find_teg_grant_rsi($data_rsi);
    var_dump($teg);*/
  $source_data = find($data_rsi);
  //var_dump($source_data);
   for ($i=0; $i < 8; $i++){
     // code...
     $url = 'http://rsci.ru'.$source_data[5][$i];
     $data = file_get_contents($url);
     $dop_info = more_rsi($data);
}
}
function more_rsi($data){
  $match = '/\^{0}.{0,30}участи[е|ю].{0,}/';
  preg_match_all($match, $data, $list);
  return $list;
}
function find($data_rsi){
  // code...
  $match = '/<span>(\d{2}.\d{2})<\/span>
						<span>(\d{4})<\/span>
					<\/time>
								.{0,}
					.{0,}
						<img src="\/upload\/iblock\/\S{3}\/.{3,}.jpg" alt="(.{3,})">
						.{7,}
							.{0,}>(.{4,})<\/a><\/div>
						<\/div>
					<\/div>
					.{8,}
						<a href="(\/grants\/grant_news\/\d{1,}\/\d{3,}.php)" ><h4 class="text-title">(.{3,})\/h4/';
    preg_match_all($match, $data_rsi, $list);
    return $list;
}
function find_teg_grant_rsi($data_rsi){
  // code...
  $match = '/"info-branch"><a href="\/grants\/grant_news\/\d{3}\/">(\D{9,})<\/a><\/div>/';
  preg_match_all($match, $data_rsi, $list);
  var_dump($list);

}
function find_url_grant_rsi($date_rsi){
  // code...
  $match = '/deskription">
						<a href="(\/grants\/grant_news\/\d{1,4}\/\d{1,7}.php)" ><h4/';
  preg_match_all($match, $date_rsi, $list);
  return $list[1];
}
function find_date_grant_rsi($data_rsi){
  // code...
  $match = '/<span>(\d{2}.\d{2})<\/span>
						<span>(\d{4})<\/span>/';
  preg_match_all($match, $data_rsi, $list);
  for ($i=0; $i < 8; $i++) {
    // code...
    $list[3][$i] = $list[1][$i].".".$list[2][$i];
  }
 return $list[3];
}
