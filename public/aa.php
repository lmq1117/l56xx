<?php
$data = [
	['name' => '风清扬', 'sex' => 1, 'age' => 109],
	['name' => '令狐冲', 'sex' => 1, 'age' => 28],
	['name' => '任我行', 'sex' => 1, 'age' => 58],
	['name' => '不可不戒', 'sex' => 0, 'age' => 55],
];
echo json_encode($data);

// phpinfo();
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: *");
//header("Access-Control-Allow-Headers: *");
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers", "GET, PUT, POST, OPTIONS, DELETE, X-XSRF-TOKEN, hrjkToken");
// header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
// header('content-Type:text/html;charset=utf-8;');
//header('content-Type:text/html;charset=utf-8;');
//echo "<pre>";
//print_r($_SERVER);
//print_r($_REQUEST);
//echo "</pre>";

// $arr = ['1', '2'];
// if ( $request_method = 'OPTIONS' ) {
// add_header Access-Control-Allow-Origin $http_origin;
// add_header Access-Control-Allow-Headers Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,X-Data-Type,X-Requested-With;
// add_header Access-Control-Allow-Methods GET,POST,OPTIONS,HEAD,PUT;
// add_header Access-Control-Allow-Credentials true;
// add_header Access-Control-Allow-Headers X-Data-Type,X-Auth-Token;
// }
// echo json_encode($arr);
//
//
//
//
//
// if ( $request_method = 'OPTIONS' ) {
// 	add_header Access-Control-Allow-Origin $http_origin;
// 	add_header Access-Control-Allow-Headers Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-M    x-ReqToken,X-Data-Type,X-Requested-With;
// 	add_header Access-Control-Allow-Methods GET,POST,OPTIONS,HEAD,PUT;
// 	add_header Access-Control-Allow-Credentials true;
// 	add_header Access-Control-Allow-Headers X-Data-Type,X-Auth-Token;
// }

// if ($request_method = 'OPTIONS') {
// 	add_header Access-Control-Allow-Origin *;
// 	add_header Access-Control-Allow-Credentials true;
// 	add_header Access-Control-Allow-Methods *;
// 	add_header Access-Control-Allow-Headers *;
// 	return 200;
// }

?>
