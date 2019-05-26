<?php
function parser_rsi($data_rsi){
    // code...
  /*  $date = find_date_grant_rsi($data_rsi);
    $url = find_url_grant_rsi($data_rsi);
    $teg = find_teg_grant_rsi($data_rsi);
    var_dump($teg);*/
  find($data_rsi);
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
    var_dump($list);
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
