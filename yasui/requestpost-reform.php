
<?php

//$recaptcha = htmlspecialchars($_POST["g-recaptcha-response"],ENT_QUOTES,'UTF-8');
//
//if(isset($recaptcha)){
//	$captcha = $recaptcha;
//}else{
//	$captcha = "";
//	echo "captchaエラー";
//	exit;
//}
//$secretKey = "6LeXprQUAAAAAF5zilAwBydrRvubYkpOSr4xQwiJ";
//
//$resp = @file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
//$resp_result = json_decode($resp,true);
//
//
//if(intval($resp_result["success"]) !== 1) {
//	echo "captchaエラー";
//	exit;
//
//}else{
	//認証成功時の処理をここに書く
	//ポスト送信  20190821 T2C
	$url = 'https://form.k3r.jp/yasuikensetsu/requestnew';
	$arr = $_POST;
	$param = array(
	  'プライバシーポリシーに同意' => '同意する'
	);

if (isset($_POST['f_item_select4']) && is_array($_POST['f_item_select4'])) {

}else{
	// header('Location: https://www.yasui-shinchiku.com/request');
	header('Location: http://yasuiks.xsrv.jp/request/request-reform');
	exit;
}

if ($_POST['tag'] == 'spam' ) {
	// header('Location: https://www.yasui-shinchiku.com/request');
	header('Location: http://yasuiks.xsrv.jp/request/request-reform');
	exit;
}

$arr = array_merge($arr,array('api_key'=>'8b32762780ac192635644930399590b94ed9cfa7'));


//	foreach($arr as $key => $val) {
//
//		$out = '';
//		if(is_array($val)){
//			foreach($val as $key02 => $item){
//				//連結項目の処理
//				if(is_array($item)){
//					$out .= connect2val($item);
//				}else{
//					$out .= $item . ', ';
//				}
//			}
//			$out = rtrim($out,', ');
//
//		}else{ $out = $val; }//チェックボックス（配列）追記ここまで
//
//
//
//		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
//		$out = nl2br($out);//※追記 改行コードを<br>タグに変換
//		$key = h($key);
//		$out = str_replace($replaceStr['before'], $replaceStr['after'], $out);//機種依存文字の置換処理
//
//		//全角→半角変換
//		if($hankaku == 1){
//			$out = zenkaku2hankaku($key,$out,$hankaku_array);
//		}
//
//    //結合
//		$pitem = str_replace(array("<br />","<br>"),"",mb_convert_kana($out,"K", $encode));
//		$param = array_merge($param,array($key=>$pitem));
//
//	}

	$contents_array = post_request($url, $arr);
	header('Location: http://yasuiks.xsrv.jp/request-reform-thanks');


//}


//----------------------------------------------------------------------
//  POST 20190821 T2C
//----------------------------------------------------------------------
function post_request($url, $param)
{
  //リクエスト時のオプション指定
  $options = array(
    'http' => array(
    'method' => 'POST', //ここでPOSTを指定
    'header' => array(
      'Content-type: application/x-www-form-urlencoded',
      'User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1'
      ),
    'content' => http_build_query($param),
    'ignore_errors' => true,
    'protocol_version' => '1.1'
    ),
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false
      )
    );

  //リクエスト実行
  $contents = @file_get_contents($url, false, stream_context_create($options));

  //ステータスコード抜粋
  preg_match('/HTTP\/1\.[0|1|x] ([0-9]{3})/', $http_response_header[0], $matches);
    $statusCode = (int)$matches[1];

    //配列で返すためにjsonのエンコード
    $contents_array = array();
    if($statusCode === 200){
      $contents_array = json_decode($contents);
    }
    return $contents_array;
}

?>
