<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//公共方法
/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 */
function is_login(){
	$SC =& get_instance();
	$SC->load->library('session');
    $uid = $SC->session->userdata('uid');
    if (empty($uid)) {
        return 0;
    } else {
        return $uid ? $uid : 0;
    }
}
function is_qlogin(){
    $SC =& get_instance();
    $SC->load->library('session');
    $uid = $SC->session->userdata('quid');
    if (empty($uid)) {
        return 0;
    } else {
        return $uid ? $uid : 0;
    }
}
/**
 * 检测当前用户是否为管理员
 * @return boolean true-管理员，false-非管理员
 */
function is_administrator($uid = null){
    $uid = is_null($uid) ? is_login() : $uid;
    return $uid && (intval($uid) === 1);
}
/**
 * 数据签名认证
 * @param  array  $data 被认证的数据
 * @return string       签名
 */
function data_auth_sign($data) {
    //数据类型检测
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}
/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * @return string
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
    if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    }else{
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice.'...' : $slice;
}
/**
 * 系统加密方法
 * @param string $data 要加密的字符串
 * @param string $key  加密密钥
 * @param int $expire  过期时间 单位 秒
 * @return string
 */
function suny_encrypt($data, $key = '', $expire = 0) {
    $key  = md5(empty($key) ? 'Suny' : $key);
    $data = base64_encode($data);
    $x    = 0;
    $len  = strlen($data);
    $l    = strlen($key);
    $char = '';

    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }

    $str = sprintf('%010d', $expire ? $expire + time():0);

    for ($i = 0; $i < $len; $i++) {
        $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1)))%256);
    }
    return str_replace(array('+','/','='),array('-','_',''),base64_encode($str));
}

/**
 * 系统解密方法
 * @param  string $data 要解密的字符串 （必须是suny_encrypt方法加密的字符串）
 * @param  string $key  加密密钥
 * @return string
 */
function suny_decrypt($data, $key = ''){
    $key    = md5(empty($key) ? 'Suny' : $key);
    $data   = str_replace(array('-','_'),array('+','/'),$data);
    $mod4   = strlen($data) % 4;
    if ($mod4) {
       $data .= substr('====', $mod4);
    }
    $data   = base64_decode($data);
    $expire = substr($data,0,10);
    $data   = substr($data,10);
    if($expire > 0 && $expire < time()) {
        return '';
    }
    $x      = 0;
    $len    = strlen($data);
    $l      = strlen($key);
    $char   = $str = '';
    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }

    for ($i = 0; $i < $len; $i++) {
        if (ord(substr($data, $i, 1))<ord(substr($char, $i, 1))) {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        }else{
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return base64_decode($str);
}
//验证手机
function is_phone($phone){
    if(! preg_match("/^1[345789]{1}[0-9]{9}$/", trim($phone))){
        return FALSE;
    }else{
        return TRUE;
    }
}
//验证密码 type1 字母加数字  2 字母
function is_password($pwd, $type = 1){
    if($type == 1){
        if(! preg_match("/^(?=.*?[a-zA-Z])(?=.*?[0-9])[a-zA-Z0-9]{6,20}$/", trim($pwd))){
            return FALSE;
        }else{
            return TRUE;
        }
    }else{
        if(! preg_match('/^[a-zA-Z]{3,20}$/', trim($pwd))){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
/* 无限极分类获得一维数组 */
function get_son_arr($arr, $pname = '', $pid = 0, $level = '　├ ') {
    $tree = array();
    if(! is_array($arr)){
        return false;
    }
    if(! is_string($pname)){
        return false;
    }
    foreach($arr as $v){
        $pnames = empty($pname) ? 'pid' : $pname;
        if($v[$pnames] == $pid){
            $v['level'] = $level;
            $tree[] = $v;
            $tree = array_merge($tree,get_son_arr($arr, $pnames, $v['id'], '　' . $level));
        }
    }
    return $tree;
}
/* 无限极分类获得多维数组 */
function get_sons_arr($arr, $pname = '', $pid = 0, $level = '　 ') {
    $tree = array();
    if(! is_array($arr)){
        return false;
    }
    if(! is_string($pname)){
        return false;
    }
    foreach($arr as $k => $v){
        $pnames = empty($pname) ? 'pid' : $pname;
        if($v[$pnames] == $pid){
            $v['level'] = $level;
            $v['child'] = get_sons_arr($arr, $pname, $v['id'], '　' . $level);
            $tree[] = $v;
        }
    }
    return $tree;
}
//通过PID获取所有父级id
function get_parents_byid ($cate, $pid) {
    $arr = array();
    if(! is_array($arr)){
        return false;
    }
    foreach ($cate as $v) {
        if ($v['id'] == $pid) {
            $arr[] = $v;
            $arr = array_merge(get_childs_byid($cate, $v['pid']), $arr);
        }
    }
    return $arr;
}
//php数组格式化
function p($arr){
    return '<pre>' . print_r($arr) . '<pre>';
}
function get_user($id){
    $CI =& get_instance();
    $CI->load->model('user/ausers_model');
    return $CI->ausers_model->get_ausers_byuid($id);
}
/**
 * 生成随机字符串
 * @param int $len 生成位数,默认6个字符
 * @param int $type 1所有,2英文,3数字
 * @return string
 */
function salt($len = 6,$type=1){
    switch($type){
        case 1:
            $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&*()';
            break;
        case 2:
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            break;
        case 3:
            $chars = '1234567890';
            break;
    }
    $str = '';
    for( $i = 0; $i < $len; $i++ ){
        $str .= $chars[mt_rand( 0, strlen($chars) -1 )];
    }
    return $str;
}
// 计算身份证校验码，根据国家标准GB 11643-1999
function idcard_verify_number($idcard_base){
	if (strlen($idcard_base) != 17){ 
		return false; 
	}
	// 加权因子
	$factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
	// 校验码对应值
	$verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
	$checksum = 0;
	for ($i = 0; $i < strlen($idcard_base); $i++){
		$checksum += substr($idcard_base, $i, 1) * $factor[$i];
	}
	$mod = strtoupper($checksum % 11);
	$verify_number = $verify_number_list[$mod];
	return $verify_number;
}
// 将15位身份证升级到18位
function idcard_15to18($idcard){
	if (strlen($idcard) != 15){
		return false;
	}else{
		// 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码
		if (array_search(substr($idcard, 12, 3), array('996', '997', '998', '999')) !== false){
			$idcard = substr($idcard, 0, 6) . '18'. substr($idcard, 6, 9);
		}else{
			$idcard = substr($idcard, 0, 6) . '19'. substr($idcard, 6, 9);
		}
	}
	$idcard = $idcard . idcard_verify_number($idcard);
	return $idcard;
}
//18位身份证校验码有效性检查
function idcard_checksum18($idcard){
	if (strlen($idcard) != 18){
		return false;
	}
	$aCity = array(11 => "北京",12=>"天津",13=>"河北",14=>"山西",15=>"内蒙古",
	21=>"辽宁",22=>"吉林",23=>"黑龙江",
	31=>"上海",32=>"江苏",33=>"浙江",34=>"安徽",35=>"福建",36=>"江西",37=>"山东",
	41=>"河南",42=>"湖北",43=>"湖南",44=>"广东",45=>"广西",46=>"海南",
	50=>"重庆",51=>"四川",52=>"贵州",53=>"云南",54=>"西藏",
	61=>"陕西",62=>"甘肃",63=>"青海",64=>"宁夏",65=>"新疆",
	71=>"台湾",81=>"香港",82=>"澳门",
	91=>"国外");
	//非法地区
	if (!array_key_exists(substr($idcard,0,2),$aCity)) {
		return false;
	}
	//验证生日
	if (!checkdate(substr($idcard,10,2),substr($idcard,12,2),substr($idcard,6,4))) {
		return false;
	}
	$idcard_base = substr($idcard, 0, 17);
	if (idcard_verify_number($idcard_base) != strtoupper(substr($idcard, 17, 1))){
		return false;
	}else{
		return true;
	}
}
//订单号
function genRandomString($lens){  
	$chars = array("0", "1", "2","3", "4", "5", "6", "7", "8", "9","0", "1", "2","3", "4", "5", "6", "7", "8", "9","0", "1", "2","3", "4", "5", "6", "7", "8", "9","0", "1", "2","3", "4", "5", "6", "7", "8", "9","0", "1", "2","3", "4", "5", "6", "7", "8", "9", "0", "1", "2","3", "4", "5", "6", "7", "8", "9");
	$charsLen = count($chars) - 1;
	shuffle($chars);
	$output = "";
	for ($i=0; $i<$lens; $i++){
		$output .= $chars[mt_rand(0, $charsLen)];
	}
	return $output;
} 
function getTxNo16(){
	$timePrefix = date("ymdH"); //yyMMddHH
	$randomString = genRandomString(8);
	return $timePrefix.$randomString;
}
function getTxNo20(){
	$timePrefix = date("ymdHi"); //yyMMddHHmm
	$randomString = genRandomString(10);
	return $timePrefix.$randomString;
}
function get_curl($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$output  = curl_exec($ch);
	curl_close($ch);
	return $output ;
}
function post_curl($url,$post_data = '',$header = 0){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_BINARYTRANSFER,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	/* if($header){
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	}
	if(! $header){
		$post_data = http_build_query($post_data);
	} */
	$post_data = http_build_query($post_data);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
	curl_setopt($ch, CURLOPT_URL, $url);
	$output  = curl_exec($ch);
	curl_close($ch);
	return $output ;
}
////////////////银行
/**
 * RSA签名
 * @param $data 待签名数据(按照文档说明拼成的字符串)
 * @param $private_key_path 商户私钥文件路径
 * return 签名结果
 */
function rsaSign($data, $private_key_path) {
    $priKey = file_get_contents($private_key_path);
    $res = openssl_get_privatekey($priKey);
    openssl_sign($data, $sign, $res);
    openssl_free_key($res);
	//base64编码
    $sign = base64_encode($sign);
    return $sign;
}

/**
 * RSA验签
 * @param $data 待签名数据(如果是xml返回则数据为<plain>标签的值,包含<plain>标签，如果为form(key-value，一般指异步返回类的)返回,则需要按照文档中进行key的顺序进行，value拼接)
 * @param $ali_public_key_path 富友的公钥文件路径
 * @param $sign 要校对的的签名结果
 * return 验证结果
 */
function rsaVerify($data, $ali_public_key_path, $sign)  {
	$pubKey = file_get_contents($ali_public_key_path);
    $res = openssl_get_publickey($pubKey);
    $result = (bool)openssl_verify($data, base64_decode($sign), $res);
    openssl_free_key($res);    
    return $result;
}
//短信start
function curlPost($url,$postFields){
	$postFields = json_encode($postFields);
	$ch = curl_init ();
	curl_setopt( $ch, CURLOPT_URL, $url ); 
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json; charset=utf-8'
		)
	);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_POST, 1 );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields);
	curl_setopt( $ch, CURLOPT_TIMEOUT,1); 
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
	$ret = curl_exec ( $ch );
	if (false == $ret) {
		$result = curl_error(  $ch);
	} else {
		$rsp = curl_getinfo( $ch, CURLINFO_HTTP_CODE);
		if (200 != $rsp) {
			$result = "请求状态 ". $rsp . " " . curl_error($ch);
		} else {
			$result = $ret;
		}
	}
	curl_close ( $ch );
	return $result;
}
function sendSMS($mobile, $msg, $needstatus = 'true') {
		$postArr = array (
			'account'  =>  'N0714100',
			'password' => 'pWM8E7r1K3a77e',
			'msg' => urlencode($msg),
			'phone' => $mobile,
			'report' => $needstatus
        );
		$result = curlPost('http://smssh1.253.com/msg/send/json', $postArr);
		return $result;
	}
function send_sms($mobile, $msg, $code = ''){
	$result = sendSMS($mobile, '【伽满优】' . $msg . $code);
	if(! is_null(json_decode($result))){
		$output=json_decode($result,true);
		if(isset($output['code'])  && $output['code']=='0'){
			//echo '短信发送成功！' ;
			return TRUE;
		}else{
			//echo $output['errorMsg'];
			return FALSE;
		}
	}else{
		return FALSE;
	}
}
//短信end