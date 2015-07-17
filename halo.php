<?php 
header("Content-type:text/html;charset=utf-8");
// $a = preg_replace('/0{8,56}$/','2',"1110001111100000000000000000000000000000000000000
// 	");
// echo $a;
// die;
// 		// $b = 3;
// 		// $a = preg_replace("/^0{".$b."}/",'',"00000fa10");
// 		// print_r($a);
// 		// die;
	// $a = str_pad('1000',64,'0',STR_PAD_LEFT);
	// echo strval(intval($a));
	// echo substr('jfkdjfkd',2,4);	
	// die;
class Data{ //用来存各种表
	protected $ip = array( 58,50,42,34,26,18,10,2,60,52,44,36,28,20,12,4,    
        62,54,46,38,30,22,14,6,64,56,48,40,32,24,16,8,    
        57,49,41,33,25,17, 9,1,59,51,43,35,27,19,11,3,    
        61,53,45,37,29,21,13,5,63,55,47,39,31,23,15,7);
	protected $ip_reverse = array( 40,8,48,16,56,24,64,32,39,7,47,15,55,23,63,31,    
	        38,6,46,14,54,22,62,30,37,5,45,13,53,21,61,29,    
	        36,4,44,12,52,20,60,28,35,3,43,11,51,19,59,27,    
	        34,2,42,10,50,18,58,26,33,1,41, 9,49,17,57,25);
	protected $pc_1 =  array(
	57, 49,  41, 33,  25,  17,  9,
		1, 58,  50, 42,  34,  26, 18,
		10,  2,  59, 51,  43,  35, 27,
		19, 11,   3, 60,  52,  44, 36,
		63, 55,  47, 39,  31,  23, 15,
		7, 62,  54, 46,  38,  30, 22,
		14,  6,  61, 53,  45,  37, 29,
		21, 13,   5, 28,  20,  12,  4)
	;
	protected $pc_2 =  array(
	14, 17, 11, 24,  1,  5,
			3, 28, 15,  6, 21, 10,
			23, 19, 12,  4, 26,  8,
			16,  7, 27, 20, 13,  2,
			41, 52, 31, 37, 47, 55,
			30, 40, 51, 45, 33, 48,
			44, 49, 39, 56, 34, 53,
			46, 42, 50, 36, 29, 32)
	;
	protected $pc_3 = array(
	32,  1,  2,  3,  4,  5,
				4,  5,  6,  7,  8,  9,
				8,  9, 10, 11, 12, 13,
				12, 13, 14, 15, 16, 17,
				16, 17, 18, 19, 20, 21,
				20, 21, 22, 23, 24, 25,
				24, 25, 26, 27, 28, 29,
				28, 29, 30, 31, 32,  1)
	;
	protected $s = array(
	array(
	14,  4, 13,  1,  2, 15, 11,  8,  3, 10,  6, 12,  5,  9,  0,  7,
		0, 15,  7,  4, 14,  2, 13,  1, 10,  6, 12, 11,  9,  5,  3,  8,
		4,  1, 14,  8, 13,  6,  2, 11, 15, 12,  9,  7,  3, 10,  5,  0,
		15, 12,  8,  2,  4,  9,  1,  7,  5, 11,  3, 14, 10,  0,  6, 13),
	array(
	15,  1,  8, 14,  6, 11,  3,  4,  9,  7,  2, 13, 12,  0,  5, 10,
		3, 13,  4,  7, 15,  2,  8, 14, 12,  0,  1, 10,  6,  9, 11,  5,
		0, 14,  7, 11, 10,  4, 13,  1,  5,  8, 12,  6,  9,  3,  2, 15,
		13,  8, 10,  1,  3, 15,  4,  2, 11,  6,  7, 12,  0,  5, 14,  9),
	array(
	10,  0,  9, 14,  6,  3, 15,  5,  1, 13, 12,  7, 11,  4,  2,  8,
		13,  7,  0,  9,  3,  4,  6, 10,  2,  8,  5, 14, 12, 11, 15,  1,
		13,  6,  4,  9,  8, 15,  3,  0, 11,  1,  2, 12,  5, 10, 14,  7,
		1, 10, 13,  0,  6,  9,  8,  7,  4, 15, 14,  3, 11,  5,  2, 12),
	array(
	 7, 13, 14,  3,  0,  6,  9, 10,  1,  2,  8,  5, 11, 12,  4, 15,
			13,  8, 11,  5,  6, 15,  0,  3,  4,  7,  2, 12,  1, 10, 14,  9,
			10,  6,  9,  0, 12, 11,  7, 13, 15,  1,  3, 14,  5,  2,  8,  4,
			3, 15,  0,  6, 10,  1, 13,  8,  9,  4,  5, 11, 12,  7,  2, 14),
	array(
	 2, 12,  4,  1,  7, 10, 11,  6,  8,  5,  3, 15, 13,  0, 14,  9,
			14, 11,  2, 12,  4,  7, 13,  1,  5,  0, 15, 10,  3,  9,  8,  6,
			4,  2,  1, 11, 10, 13,  7,  8, 15,  9, 12,  5,  6,  3,  0, 14,
			11,  8, 12,  7,  1, 14,  2, 13,  6, 15,  0,  9, 10,  4,  5,  3),
	array(
	12,  1, 10, 15,  9,  2,  6,  8,  0, 13,  3,  4, 14,  7,  5, 11,
	10, 15,  4,  2,  7, 12,  9,  5,  6,  1, 13, 14,  0, 11,  3,  8,
	9, 14, 15,  5,  2,  8, 12,  3,  7,  0,  4, 10,  1, 13, 11,  6,
	4,  3,  2, 12,  9,  5, 15, 10, 11, 14,  1,  7,  6,  0,  8, 13),
	array(
	 4, 11,  2, 14, 15,  0,  8, 13,  3, 12,  9,  7,  5, 10,  6,  1,
	13,  0, 11,  7,  4,  9,  1, 10, 14,  3,  5, 12,  2, 15,  8,  6,
	1,  4, 11, 13, 12,  3,  7, 14, 10, 15,  6,  8,  0,  5,  9,  2,
	6, 11, 13,  8,  1,  4, 10,  7,  9,  5,  0, 15, 14,  2,  3, 12),
	array(
	13,  2,  8,  4,  6, 15, 11,  1, 10,  9,  3, 14,  5,  0, 12,  7,
	1, 15, 13,  8, 10,  3,  7,  4, 12,  5,  6, 11,  0, 14,  9,  2,
	7, 11,  4,  1,  9, 12, 14,  2,  0,  6, 10, 13, 15,  3,  5,  8,
	2,  1, 14,  7,  4, 10,  8, 13, 15, 12,  9,  0,  3,  5,  6, 11)
	);
	protected $p =   array(
	16,  7, 20, 21,
		29, 12, 28, 17,
		1, 15, 23, 26,
		5, 18, 31, 10,
		2,  8, 24, 14,
		32, 27,  3,  9,
		19, 13, 30,  6,
		22, 11,  4, 25)
	;
	protected $shift_size = array(
	 1, 1, 2, 2, 2, 2, 2, 2, 1, 2, 2, 2, 2, 2, 2, 1 )
	;
}
class DES extends Data{
	function __construct($str){

		$this -> str = $str;
		$this -> q = 5;
	}
	function encode($word){//传入一个明文，转为很多位字符数组
		$hexs = str_split($word);  //如果是中文啊，他是按字节截取  3个字节  截取为3个元素
		$hex= array_map('ord',$hexs);  //把二机制转化为十进制
		$hex  = array_map('decbin',$hex); //十进制转换二进制   3个字节 一个字节8 位  24位
		//print_r($hex);
		$string = "";
		foreach ($hex as $key) {
			$string .= str_pad($key,8,'0',STR_PAD_LEFT);

		}

		return str_split(str_pad($string,64,'0',STR_PAD_LEFT));
	}
	function decode($arr){  //传入一个字符数组,转为字符
		$arr_str = implode("",$arr);
		$arr_str_temp = $arr_str;
		$arr_str_temp = preg_replace('/^0+/','',$arr_str_temp);//正则替换掉前面的0
		$length_all = strlen($arr_str);
		$length_zero = strlen($arr_str_temp);
		$b = $length_all-$length_zero;
		$b = $b-$b%8;
		$arr_str= preg_replace("/^0{".$b."}/",'',$arr_str);
		$recive = array();
		for($i = 0;$i<=strlen($arr_str)-8;$i+=8){
			array_push($recive,substr($arr_str,$i,8));
		}
		echo "<br/>";
		//print_r($recive);
		$hex   = array_map('bindec',$recive); //二进制转换为10进制
		$hex   = array_map('dechex',$hex);  //是十进制转换为16进制
		$hex= join('%',$hex);  //二进制
		$hex = '%'.$hex;  //解码成功 %e5%a6%b
		//echo $hex;
		return urldecode($hex);
	}
	function exchange($form,$arr){//各种表的置换
		$recive = array();
		for($i = 0;$i < count($form);$i++)
			$recive[$i] = $arr[$form[$i] - 1];
		return $recive;
	}
	function shift($arr,$size){ //size为1或者2，arr为要置换的数组
		$count = count($arr);
		if($size == 1){
			$a = $arr[0];
			for($i=0;$i<$count-1;$i++){
				$arr[$i] = $arr[$i+1];
				
			}
			$arr[$count-1] = $a;
		}
		if($size == 2){
			$a = $arr[0];
			$b = $arr[1];
			for($i = 0;$i<$count-2;$i++){
				$arr[$i] = $arr[$i+2];
			}
			$arr[$count-2] = $a;
			$arr[$count-1] = $b;
		}
		return $arr;
	}
	function a_xor($arr1,$arr2){ //两个数组的长度要一致
		$receive = array();
		$count = count($arr1);
		for($i = 0;$i<$count;$i++){
			$store = strval(intval($arr1[$i])^intval($arr2[$i]));
			array_push($receive,$store);
		}
		return $receive;
 	}
 	function get_keys($arr){//输入一个64位数组,然后就输出16个48位子密钥
 		$pc_1 = $this -> exchange($this -> pc_1,$arr);
 		$arr1 = array_slice($pc_1,0,28);
 		$arr2 = array_slice($pc_1,28,28);
 		$receive = array();
 		$shift_form = $this->shift_size;
 		for($i = 0;$i<count($shift_form);$i++){

 			$temp1 = $this->shift($arr1,$shift_form[$i]);
 			$temp2 = $this->shift($arr2,$shift_form[$i]);
 			array_push($receive,$this->exchange($this->pc_2,array_merge($temp1,$temp2)));
 			$a =1;
 		}
 		return $receive;
 	}
 	function one_sbox($arr,$sbox){//输入一个6位长度的二进制字符数组，返回一个4位长度的数组,$sbox位s盒的表
 		$arr = implode('',$arr);
 		$row = bindec(intval(substr($arr,0,1).substr($arr,5,1)));
 		$col = bindec(intval(substr($arr,1,4)));
 		$location = $row*16+$col;
 		$str = str_pad(strval(decbin($sbox[$location])),4,'0',STR_PAD_LEFT);
 		return str_split($str);
 	}
 	function sbox($arr){//输入一个48位长数组，返回一个32位长数组
 		$chunk = array_chunk($arr,6);
 		$receive = array();
 		foreach ($chunk as $key) {
 			$i = 0;
 			$receive = array_merge($receive,$this -> one_sbox($key,$this->s[$i]));
 			$i++;
 		}
 		return $receive;
 	}
 	function F($data,$key){//F函数,data为32位数据，key为48位子密匙，返回32位数组
        $E = $this->exchange($this->pc_3,$data);
        $xor = $this -> a_xor($E,$key);
        $sbox = $this -> sbox($xor);
        $pbox = $this -> exchange($this->p,$sbox); 
        return $pbox;
 	}
 	function Run16($arr,$keys){//64数组,16个48位数组,对称加密和解密相同的流程函数
 		$ip = $this -> exchange($this->ip,$arr);
 		$chunk=array_chunk($ip,32);
 		$L0 = $chunk[0];
 		$R0 = $chunk[1];
 		for($i = 0;$i < 15;$i++){
 			$tmp = $R0;
 			$R0 = $this->a_xor($L0,$this->F($R0,$keys[$i]));
 			$L0 = $tmp;
 		}
 		$L0 = $this->a_xor($L0,$this->F($R0,$keys[15]));
 		return $this->exchange($this->ip_reverse,array_merge($L0,$R0));
 	}
 	function encrypt_base($arr,$key){//加密单个数组
 		return $this -> Run16($arr,$this -> get_keys($key));
 	}
 	function decrypt_base($arr,$key){//解密单个数组,都为64数组
 		$keys = array_reverse($this -> get_keys($key));
 		return $this -> Run16($arr,$keys);
 	}
 	function split_64($arr){//将数组分解为每行64位的二维数组,不足64位的向前补0
 		$chunk = array_chunk($arr, 64);
 		$last = count($chunk) - 1;
 		$count = count($chunk[$last]);
 		if ($count < 64){
 			$chunk[$last] = array_pad($chunk[$last],64,'0');
 		}
 		return $chunk;
 	}
 	function zero_machine($arr){//输入64位数组，将补零的部分消除
 		$arr_str = implode("",$arr);
		$arr_str_temp = $arr_str;
		$arr_str_temp = preg_replace('/0+$/','',$arr_str_temp);//正则替换掉后面的0
		//print_r(strlen($arr_str_temp));
		$length_all = strlen($arr_str);
		$length_zero = strlen($arr_str_temp);
		$b = $length_all-$length_zero;
		$b = $b-$b%8;
		echo $b;
		//print_r($arr_str);
		$arr_str= preg_replace("/0{".$b."}$/",'',$arr_str);
		return str_split($arr_str);
		//return $arr_str;
 	}
 	function merge_64($arr){//把二维64的数组合并，并把添加的0消除
 		$count = count($arr);
 		$last_array = $arr[ $count -1];
 		$arr[$count - 1] = $this -> zero_machine($last_array);

 		$receive = array();
 		foreach ($arr as $key) {
 			$receive = array_merge($receive,$key);
 		}
 		return $receive;
 	}
 	function encrypt($arr,$key){//$arr为二维数组，每行64个，$key为一维64位数组
 		$receive = "";
 		//print_r($arr);
 		foreach ($arr as $value) {//由于bindec最多只能处理32位二进制，所以分两次处理
 			// print_r($arr);exit;
 			$str = implode('',$this -> encrypt_base($value,$key));
 			// print_r(implode($value));
 			// echo "\n".$str;exit;
 			$str1 = dechex(bindec(substr($str,0,32)));
 			$str2 = dechex(bindec(substr($str,32,32)));
 			$receive.= str_pad($str1,8,'0',STR_PAD_LEFT);
 			$receive.= str_pad($str2,8,'0',STR_PAD_LEFT);
 			// echo "\nstr1:".$str1."  str2:".$str2."\n";
 			//echo "\n encrypt前:".implode('',$value);
 			// echo "\n encrypt后:".$str;
 		}
 		echo "\n";
 		return $receive.'x'.strlen($receive);
 	}
 	function decrypt($str,$key){//输入为很长的字符串，64位的密码
 		$receive = array();
 		for($i = 0;$i<strlen($str);$i+=16){
 			$str1 = decbin(hexdec(substr($str,$i,8)));
 			$str2 = decbin(hexdec(substr($str,$i+8,8)));
 			// echo substr($str,$i,64);exit;
 			//echo str_pad($str1,32,'0',STR_PAD_LEFT).str_pad($str2,32,'0',STR_PAD_LEFT)."\n";
 			$array = str_split(str_pad($str1,32,'0',STR_PAD_LEFT).str_pad($str2,32,'0',STR_PAD_LEFT));
 			//print_r($array);exit;
 			//$array = array_pad($array,64,'0');
 			//array_push($receive,$array);
 			// echo "str1:".$str1."  str2:".$str2."\n";
 			// echo "decrypt前: ".implode('',$array)."\n";
 			//echo "decrypt后: ".implode('',$this->decrypt_base($array,$key))."\n";
 			//echo implode($this -> decrypt_base($array,$key));exit;
 			array_push($receive,$this->decrypt_base($array,$key));
 		}
 		//echo "fuck",$i;
 		return $receive;
 	}
	function jie($key){
		$a = array('1','0');
		$b = array('0','1');
		// return $this -> decode($this ->encode($this -> str));
		//return $this->a_xor($a,$b);
		return $this->split_64($key);
	}
}
$word = array('1','0','1','1','0','0','0','1','0','1','0','0','1','0','0','1','1','0','0','0','1','1','1','1','0','0','0','0','1','0','0','1','0','0','0','0','1','0','1','1','1','1','1','0','1','0','0','0','1','1','1','1','0','1','0','0','0','0','0','0','0','0','1','0'
	);
$key = array('0','0','1','1','0','0','0','1','0','1','0','0','1','0','0','1','1','0','0','0','1','1','1','1','0','0','0','0','1','0','0','1','0','0','0','0','1','0','1','1','1','1','1','0','1','0','0','0','1','1','1','1','0','1','1','0','0','0','1','0','0','1','1','0'
	);
$b = new DES("jffakfjkadk");
/*$arr = $b -> encode("你好！");
$arr = $b->merge_64($b->split_64($arr));
echo $b->decode($arr);*/ //接口函数实现
// foreach($b->decrypt_base($b->encrypt_base($word,$key),$key) as $hk){
//  	echo "'$hk',";
// }
//------加密
$arr = $b -> encode("你好啊房价肯定就付房间卡积分开了就爱看了房价来看大家看了附近开了大家分开了几克拉加快了附近开了就爱看了附近开了多久附近打卡机付款了就爱看了就分了就打开了房间空间按开了房间快乐健康就分开的健康《NBA 2K16》已经在steam上开启了预购，同步放出的还有《NBA 2K16》的PC配置，作为一款年货游戏，篮球迷们对这一系列的支持已经坚持了多年，本次知名导演斯派克·李的加盟相信会给《NBA 2K16》带来不一样的惊喜。

　　《NBA 2K16》PC配置整体和《NBA 2K15》没有太大的区别，并且还将自带简体中文，还是非常良心的 。

游民星空

最低配置要求：

　　操作系统：Windows 7 64-bit, Windows 8.1 64-bit or Windows 10 64-bit 
　　CPU：Intel Core2 Duo or better (SSE3 or later) 
　　内存：2 GB RAM 
　　硬盘空间：50 GB或更多可用空间
　　显卡：支持DirectX 10.1且拥有512 MB显存或更高 
　　DirectX：Version 10 
　　声卡：DirectX 9.0c 兼容

推荐配置要求：

　　操作系统：Windows 7 64-bit, Windows 8.1 64-bit or Windows 10 64-bit 
　　CPU：Intel Core i5 or better 
　　内存：4 GB RAM 
　　显卡：DirectX 11.0 兼容 (2 GB) 或更高
　　硬盘空间：50 GB或更多可用空间
　　DirectX：Version 11 
　　声卡：DirectX 9.0c 兼容


游民星空

游民星空款");
$split = $b->split_64($arr);
// //var_dump($split);

echo $b->encrypt($split,$key);echo "\n";
//-----解密
//$a = $b -> decrypt('eba0c7dbb1180720260ed4ba832e1ab54e487916c375a84be8eb480797264b6dc179a14ee998788a0b0287ff2089ef48948070b7a4ad81c139f6215eb5fcab77f25c9af9a949acdc0442637ebdbd499586691f1bc7b96616052bdda232d64b282407ff90bdaee52177a9910ce8b525c2797f9d24986519d861dbe0320344b4565b947ed609949773c8a5c285a887dd14523f77dbaea258cc5b947ed609949773e910ef185d1f3360f66843e216b6dd454bf3e5a64187ed4cd52f616b4366cacd69b371f495ab2397a53ef1b5d579f07b59da381c35413d75c4a4bd533de530b7c9c615b98272135db86f4c39cbbc5756047697bdcc566945d0f429796ba001cd6900704dc6e8f4fc0532faa56ed0bacc065d854db0eb1e6c5b7858991e58646d7bbf25d239c12b87f877d80fbe08361b2380baa38df1a3848ed9e8e2b147ab48b1dec745e648aa982fe0b7a60f0077fabf935a3cdbff956e6a1c0fb1a36005eb052084ec53b5712e55a60da198960d5cb3cce162bfd5c97abfd4050d2ba479f423e969a76559cdb6bfad2192a80bb9f5ddeed60d753a2fbb7f7c5a2d6c34a1449640e8623fc51e1ae13d68d3ac850e7afbb1b9fd6a3b4b661c69b984b2b1d86a5d302d8df2772b2436a3a01f9d1c037dfe3427cb723cc32663a25aa9dd7dff136c0dd015e6a32e342e7c1e981578f1bb0ca14f7ebca772b6bd7d5d02d7b466539710f80f8171d0d096948284ad9d576755a60da198960d5cb9dfbf3299188793fff5c6ab213a3c0d7b68662f0c3140e7906ebfa0f761587fed09aeff596af8a0fb0f72d636469cb0cb809a6198e3312aa4023e5ee5fd18f1035a175714c21db593c2b147b624803631df0c3b64d551985118d54a13735118a59ea7f05f8499ac6294b3169f752af08ec85d950a8b54d2a2d983c28591d7c7ec39fa97ed06372c7cb03a9a0f10fcdfd3480dda1939d475f04002920a45aae1d1e40b4557821ffd8a237e8f48f1c1f62a0e41982c4965dfb2f22572f68d2d95609dd4c42d8ee3078b84c583ed767d1843527a8e0fcb33f4db3d8040923c8d31562c900962e9150cbcb81b765f143742563942cbd93e072eca8948709ec1979a55f7848336d9410941fa7f47ebc7f4db257922330d34a8bc3d96e62adb84018dea53daa3ba5c9f8204d02467354418e9daddc0b43f0dd0dff82c7771f976c255ceca9c05cd9f28cd169d4fd056027ba06eccb51dad45aa6dea53daa3ba5c9f821b0e0afbcee826d22eebfb06feea936df0a2759584e43e4349385084f4e41198f626de6e326c8e2cb4e3d20f3994e2c59564151e1650e36f445fff132b114cf2cb5a5aa3a870bf4cfa703274982af8069d279c5597ecd3a917e3d5b2286b06a2c5b47a3aa89c73d8a34587a1ae5425c457920c614079a6a7cc40fdbccdb065204f63e468cf018e6c69fcd9d451a75d490befaf3373a2556f68337463b23b0ad590994d40a87628fd1f7b94f8f77adde875b1f9c72712f9d08a528fdd58ab703f3b23988826e2072f25a07c42ae0f87cacbf0e058a8f68c183e9169ad1c89afc2055c1cd3041c9ee06be9c37e2349b60c1c1164dfd4e49abc24fc26bf2e2e7cf21019426148107cfdebded3a986fffdf15f7dfe779cf3e9f74dfab3e0bda56de8ca8948709ec1979abce3aa27ad723693367c873a04b51ff2d577b8b057dd9823f2a38df1c2e7fa5c08030c469af75d8ececa9c05cd9f28cdea53daa3ba5c9f821b0e0afbcee826d2bacd52ff30d726a4f0a2759584e43e431b41f3ba6321331475b1f9c72712f9d0fdc0fb0643de2db3a05150dff4f6acc6f743acc755defceedbd1776b9d1f7d8c43527a8e0fcb33f486640c0a44d990aaac60e47a4418354b0ba8b4ab0283b697d1deff67f856f57b6cf55a132248b04501598797da459f3c75b0fd086dbf90ffe5e761659c7ea3c74bd75ef02b7ae7445d34fe8f6de9124ba0c2980afc68a7f08586a3c5eb1d36bd209009018233d3286d2a2bbaf00bfe287311c70fcf9d3dbd56618483a6dd6c167311c70fcf9d3dbd91d85f060b7c780b',$key);
// $c = $b -> decode($b->merge_64($a));
// var_dump($c);
//--------test
//var_dump($b->encrypt_base($word,$key));
?>