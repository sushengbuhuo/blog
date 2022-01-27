<?php

//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//die("ERROR");
//}

//$mob=$_POST["user"];
//$password=$_POST["password"];
//$step=$_POST["step"];
$mob=18111759888;
$password='zr889844';
$step=32682;
run($mob,$password,$step);

function login($mob,$pas){
		$url = "https://api-user.huami.com/registrations/+86" . $mob . "/tokens";
		$data_string = array(
			"client_id" => "HuaMi",
			"password" => $pas,
			"redirect_uri" => "https://s3-us-west-2.amazonaws.com/hm-registration/successsignin.html",
			"token" => "access"
		);
		$data_string = http_build_query($data_string);
		$res=post_json_data($url,$data_string,"",3);
		return  $res;
}


function run($mob,$password,$steps){
	$return_contents = login($mob,$password);
	$json=json_decode($return_contents,true);
	$token = $json['token_info']['app_token'];
	if (is_null($token)){
		$data_string = array(
			"code" => 401,
			"message" => "账号或密码错误！"
		);
		$data_string = json_encode($data_string);
		$data_string = decodeUnicode($data_string);
		echo $data_string;
		return $data_string;
		exit();
	}
	$userid = $json['token_info']['user_id'];
	$step = $steps;
	$data = date("Y-m-d");
	$qq = '[{"summary":"{\"slp\":{\"ss\":73,\"lt\":304,\"dt\":0,\"st\":1589920140,\"lb\":36,\"dp\":92,\"is\":208,\"rhr\":0,\"stage\":[{\"start\":269,\"stop\":357,\"mode\":2},{\"start\":358,\"stop\":380,\"mode\":3},{\"start\":381,\"stop\":407,\"mode\":2},{\"start\":408,\"stop\":423,\"mode\":3},{\"start\":424,\"stop\":488,\"mode\":2},{\"start\":489,\"stop\":502,\"mode\":3},{\"start\":503,\"stop\":512,\"mode\":2},{\"start\":513,\"stop\":522,\"mode\":3},{\"start\":523,\"stop\":568,\"mode\":2},{\"start\":569,\"stop\":581,\"mode\":3},{\"start\":582,\"stop\":638,\"mode\":2},{\"start\":639,\"stop\":654,\"mode\":3},{\"start\":655,\"stop\":665,\"mode\":2}],\"ed\":1589943900,\"wk\":0,\"wc\":0},\"tz\":\"28800\",\"stp\":{\"runCal\":1,\"cal\":6,\"conAct\":0,\"stage\":[],\"ttl\":';
	$aa = $step . ',\"dis\":144,\"rn\":0,\"wk\":5,\"runDist\":4,\"ncal\":0},\"v\":5,\"goal\":8000}","data":[{"stop":1439,"value":"WhQAUA0AUAAAUAAAUAAAUAAAUAAAWhQAUAYAcBEAUAYAUA8AUAsAUAYAUDIAUCQAUDkAUCkAUD4AUC0AUFcAUD8AUCkAUCEAUCwAUCsAUB4AUCQAUBsAUCcAUBQAUDcAUBoAUCYAUFcAUCAAUDkAUCEAWhQAWhQAWhQAUBAAUEgAUDsAUAgAWhQAUDwAUCEAUAIAUAsAUDoAUD8AWhQAWhQAWhQAWhQAWhQAWhQAAS0QEAsAWhQAAR8SEBcHYC4AUCoAUBMAUAIAUAYAUAsAUCsAUAUAUBIAUBIAUBsAUBgAUAoAUBsAUBUAUBkAUDIAUC0AUC4AUBAAWhQAUCsAUB8AUAIAUB8AUDUAUEEAUDUAUBkAUCYAUEoAUCYAUBIAUCAAUCkAUDAAUB4AUB0AUDEAUCUAUCgAUAQAWhQAUA8AUDwAUB8AUCUAUBQAUB4AUAUAWhQAUAAAUA8AUBkAUCgAUCwAUCkAUCgAYCIAYCIAYCgAUAoAWhQAUBwAWhQAUBoAUDkAUD4AYAkAYAYAWhQAWhQAUB4AWhQAUAQAUBcAUBAAUAUAWhQAUB0AcBYAehQAcBoAehQAehQAehQAcAMAcAMAehQAcAIAehQAcBIAcA0AehQAehQAcAsAcAYAcAEAcAoAehQAehQAcAwAehQAehQAehQAcAEAehQAehQAcAsAehQAehQAcA8AcBkAcAYAcBkAcC0AcAQAcBsAcAMAWhQAUAMAWhQAUBEAUAIAWhQAWhQAWhQAehQAehQAehQAehQAehQAehQAcAAAcB8AcBMAehQAehQAcDkAcBAAcAEAcAMAcAMAcCwAcA8AcAAAcAAAcCIAcAAAcCcAcB4AehQAcAkAehQAcCMAehQAehQAcAoAehQAehQAehQAcBgAcBgAcAkAehQAcAcAcCgAcBQAcA0AcAwAcCcAcCkAcAAAUAAAUAAAUB4AUBwAUAAAUAAAUCkAUBIAUBMAUCgAUA8AUBEAUD0AUCAAYAMAYCkAUBsAUB4AYCgAahQAUBkAWhQAWhQAUCAAUBcAUA8AUBAAUAcAUB8AUCEAUCMAUCkAYAMAYAAAUBsAUBEAUBgAUAUAUB0AUAAAUAAAUAAAUAAAUAAAUAQAUAAAUAAAUAAAUAAAWwAAUAAAcAAAcAAAcAAAcAAAcAAAcAAAcA0AcAAAcAAAcAAAcAIAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcA8AehQAehQAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAEAeRMAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAsAcAAAcAAAcAAAcAAAcAAAcAoAcAAAcBMAcAAAcAAAcAAAcAAAcAAAcAAAcA4AcAcAehQAehQAcAAAcAAAcAIAehQAehQAcAAAcAAAcAAAcAAAcAAAcAIAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcBcAehQAehQAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAehQAcAMAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcBUAeQAAcAAAcAAAcAAAcFgAcAAAcAAAcAAAcBkAeQAAcAAAcAAAcAAAcAAAcE0AcAQAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAeVAAehQAehQAcAAAcAAAcAAAcAAAcAUAeRwAUAAAUFUAUAAAUAAAUAAAUAAAUAAAUCMAeQAAcAAAcAAAcE0AUAAAUAAAUAAAUAAAUAAAUAAAcAAAcAAAcAAAcE4AcAAAcAAAcAAAcAAAcAgAcBAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAkAcAAAcAAAcAAAcAAAcBwAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAYAcBAAeQAAcB8AeQAAcAAAcAAAcAAAeSoAcAAAcAAAcAAAcAAAcAAAcAsAcAAAeScAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcCAAcAAAUAAAUAAAUAAAUAAAUAAAUBEAehQAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcBwAehQAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcBYAcAAAcAAAcAAAcAYAcAAAcAAAcCsAcAAAcAAAcAgAcAAAcAAAcBsAeRQAcAAAcAAAcAEAcAAAcAAAcAAAcAAAcAAAcAAAcA8AcAAAcAAAcBoAcAAAcAEAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAQAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcBIAcAAAcA0AcBAAcAAAcAAAcAAAcAAAehQAehQAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcAAAcCgAcAAAcBkAcAAAcB0AcAAAcAAAcBgAcAAAUAEAUBsAWhQAUB4AWhQAUCkAWQ8AUCsAUA0AWTUAXBAAWhQAUBMAUAQAUAcAUAoAUA8AUBkAUBcAUCoAUAIAUBQAWhQAWhQAUBIAUBQAUAcAWhQAUBYAWhQAUAgAWhQAWhQAUAkAUE0AUHUAAWMTEEcKYDoAYAgAUAMAWhQAUAUAUAYAUAkAUB4AUAsAUAIAUBMAWhQAAVQdAWAlEDYAYCQAUAQAUBgAUAgAUAUAUBQAUAIAWhQAUAkAUAMAUA4AWhQAehQAcAoAcAIAehQAcB0AcCcAUCsAUAEAUAgAUAoAUAIAUAsAUAIAWhQAWhQAUAgAUA0AWhQAUAYAWhQAUAEAWhQAWhQAUBAAUBQAUBIAUBcAUAoAYBAAYAIAAUkZAUglAVYSYBcAYAoAYCAAYAsAUBUAUB0AUBAAUBEAUCAAUBUAUBYAUA0AUB4AUBcAUBsAUBMAUBUAYAsAYAwAYAsAUB4AUBoAUBoAUBoAUBQAUAcAWhQAUBgAUBkAUBsAUBUAUBAAUCAAUCYAUB8AUB4AUBwAUAcAUBsAUBwAUBwAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAAfgAA","did":"321123","tz":32,"src":17,"start":0}],"data_hr":"\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+\/v7+","summary_hr":"{\"ct\":0,\"id\":[]}","date":"';
	$zz = $data . '"}]';
  	$data_string = $qq . $aa . $zz;
	$data_string = 'userid=' . $userid . '&last_sync_data_time=1589917081&device_type=0&last_deviceid=DA932FFFFE8816E7&data_json=' . $data_string;
	$url = "https://api-mifit-cn.huami.com/v1/data/band_data.json?&t=" . time() . "456";
	$return_content = post_json_data($url,$data_string,$token,1);
	$return_content = json_decode($return_content, true);

	if ($return_content['code'] == 1){
		$data_string = array(
			"code" => 200,
			"message" => "已成功修改为 " . $step . " 步"
		);
		$data_string = json_encode($data_string);
	}else{
		$data_string = array(
			"code" => 401,
			"message" => "修改失败"
		);
		$data_string = json_encode($data_string);
	}
	$data_string=decodeUnicode($data_string);
	echo $data_string;
	return $data_string;
}

//把unicode转化成中文
function decodeUnicode($str){
	return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', function($matches){return iconv("UCS-2BE","UTF-8",pack("H*", $matches[1]));}, $str);
}


function unicode_decode($name){
        $name = strtolower($name);
        // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
        $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
        preg_match_all($pattern, $name, $matches);
        if (!empty($matches))
        {
            $name = '';
            for ($j = 0; $j < count($matches[0]); $j++)
            {
                $str = $matches[0][$j];
                if (strpos($str, '\\u') === 0)
                {
                    $code = base_convert(substr($str, 2, 2), 16, 10);
                    $code2 = base_convert(substr($str, 4), 16, 10);
                    $c = chr($code).chr($code2);
                    $c = iconv('UCS-2', 'UTF-8', $c);
                    $name .= $c;
                }
                else
                {
                    $name .= $str;
                }
            }
        }
        return $name;
}

function convertUrlQuery($query){
	$queryParts = explode('&', $query);
	$params = array();
	foreach ($queryParts as $param) {
		$item = explode('=', $param);
		$params[$item[0]] = $item[1];
	}
	return $params;
}

function post_json_data($url, $data_string, $cookie="", $mode=0) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($cookie){
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'apptoken: ' . $cookie,
			'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 13_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 MicroMessenger/7.0.12(0x17000c2d) NetType/WIFI Language/zh_CN'
		));
    }else{
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
			'User-Agent: MiFit/4.6.0 (iPhone; iOS 14.0.1; Scale/2.00)'
		));
	}
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	switch ($mode) {
		case 1://getlogintoken
			$return_content = curl_exec($ch);
			curl_close($ch);
			return $return_content;
		case 2://getapptoken
			curl_setopt($ch, CURLOPT_POST, 0);
			$return_content = curl_exec($ch);
			curl_close($ch);
			return $return_content;
		case 3:
		default ://login
			curl_exec($ch);
			$Headers =  curl_getinfo($ch);
			$content = curl_exec($ch);
			$url = parse_url($Headers['redirect_url']);
			$param_arr = convertUrlQuery($url['query']);
			if(isset($param_arr['access'])){
				$return_content = $param_arr['access'];
				$url = "https://account.huami.com/v2/client/login";
				$data_string = array(
					"app_name" => "com.xiaomi.hm.health",
					"app_version" => "4.6.0",
					"code" => $return_content,
					"country_code" => "CN",
					"device_id" => "2C8B4939-0CCD-4E94-8CBA-CB8EA6E613A1",
					"device_model" => "phone",
					"grant_type" => "access_token",
					"third_name" => "huami_phone",
				);
				$data_string = http_build_query($data_string);
				$return_content = post_json_data($url,$data_string,"",1);
				}
			curl_close($ch);
			return $return_content;
	}
}
?>