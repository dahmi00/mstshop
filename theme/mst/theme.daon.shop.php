<?php

/*
	
	이 페이지는 절대, 수정, 삭제하지 마세요.

*/

if(!sql_query(" DESCRIBE {$g5['g5_shop_banner_table']}_daontheme ", false)) {
	 sql_query("CREATE TABLE IF NOT EXISTS `{$g5['g5_shop_banner_table']}_daontheme` (
					  `bn_id` int(11) NOT NULL AUTO_INCREMENT,
					  `bn_alt` varchar(255) NOT NULL DEFAULT '',
					  `bn_url` varchar(255) NOT NULL DEFAULT '',
					  `bn_device` varchar(10) NOT NULL DEFAULT '',
					  `bn_position` varchar(255) NOT NULL DEFAULT '',
					  `bn_border` tinyint(4) NOT NULL DEFAULT '0',
					  `bn_new_win` tinyint(4) NOT NULL DEFAULT '0',
					  `bn_begin_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
					  `bn_end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
					  `bn_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
					  `bn_hit` int(11) NOT NULL DEFAULT '0',
					  `bn_order` int(11) NOT NULL DEFAULT '0',
					  PRIMARY KEY (`bn_id`)
					 ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ", true);

	sql_query("INSERT INTO `{$g5['g5_shop_banner_table']}_daontheme` VALUES
					(50,'','#none','pc','shop03_탑배너',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-11 11:52:00',0,50),
					(52,'관리자모드에서 손쉽게','#none','pc','shop03_메인',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-11 12:28:45',0,1),
					(53,'코어수정이 필요없는','#none','pc','shop03_메인',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-11 12:31:51',0,3),
					(54,'상단메뉴 카테고리 4차지원','#none','pc','shop03_메인',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-11 11:55:47',0,2),
					(56,'','#none','pc','shop03_배너슬라이드',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-17 17:11:16',0,1),
					(58,'','#none','mobile','shop03_메인',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-11 12:39:25',0,1),
					(59,'','#none','mobile','shop03_메인',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-11 12:39:15',0,3),
					(60,'','#none','mobile','shop03_메인',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-11 12:39:35',0,2),
					(61,'','#none','mobile','shop03_탑배너',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2022-12-28 17:48:14',0,1),
					(66,'어떤 쇼핑몰에도 잘 어울리는 다온테마 shop#03','/shop/1554444703','pc','shop03_배너4',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-17 17:45:26',63,5),
					(67,'','','both','shop03_배너3',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-12 16:53:38',1,1),
					(71,'','#none','both','shop03_배너10',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-19 14:40:56',13,50),
					(72,'','#none','both','shop03_배너11',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-19 14:41:03',12,50),
					(73,'','/shop/event.php?ev_id=1556590820','both','shop03_배너5',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-19 13:54:50',1,50),
					(74,'NO마진! 아이폰 Series','#none','both','shop03_배너6',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-12 11:42:10',3,50),
					(75,'','#none','both','shop03_배너7',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-12 11:48:04',0,50),
					(76,'','/shop/1577346886','both','shop03_배너8',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-12 11:48:23',3,50),
					(77,'','#none','both','shop03_배너1',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-13 17:09:37',0,50),
					(78,'','#none','both','shop03_배너2',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-12 16:40:09',0,1),
					(79,'','#none','pc','shop03_배너슬라이드',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-17 17:11:25',0,2),
					(80,'','#none','both','shop03_배너9',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-12 11:48:39',0,50),
					(81,'','#none','pc','shop03_배너슬라이드',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-17 17:11:40',0,50),
					(82,'','#none','mobile','shop03_배너슬라이드',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-18 11:40:10',0,50),
					(83,'','#none','mobile','shop03_배너슬라이드',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-18 10:46:05',0,50),
					(84,'','#none','mobile','shop03_배너슬라이드',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-18 10:46:19',0,50),
					(85,'','#none','mobile','shop03_배너4',0,0,'2023-01-01 00:00:00','2099-12-31 00:00:00','2023-01-18 10:58:30',0,50); ");
				
}



$display_banner_daon_fun_exists = function_exists('display_banner_daon2');

if(!$display_banner_daon_fun_exists){

// 배너출력
function display_banner_daon2($position, $skin='')
{
    global $g5, $arrow_remote_addr, $REMOTE_ADDR, $arrow_server_name, $is_admin; //daontheme

    if (!$position) $position = '왼쪽';
    if (!$skin) $skin = 'boxbanner.skin.php';

    $skin_path = G5_SHOP_SKIN_PATH.'/'.$skin;  

    if(file_exists($skin_path)) {
        // 접속기기
        $sql_device = " and ( bn_device = 'pc' ) ";
        if(preg_match("/mobile/",$skin))
            $sql_device = " and ( bn_device = 'mobile' ) ";

        // 배너 출력
        $sql = " select * from {$g5['g5_shop_banner_table']}_daontheme where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = '$position' order by bn_order, bn_id desc ";
        $result = sql_query($sql);

        include $skin_path;
    } else {
        echo '<p>'.str_replace(G5_PATH.'/', '', $skin_path).'파일이 존재하지 않습니다.</p>';
    }
}

}


$display_banner_daon_fun_exists1 = function_exists('display_banner_daon3');

if(!$display_banner_daon_fun_exists1){

// 배너출력
function display_banner_daon3($position, $skin='')
{
    global $g5, $arrow_remote_addr, $REMOTE_ADDR, $arrow_server_name, $is_admin; //daontheme

    if (!$position) $position = '왼쪽';
    if (!$skin) $skin = 'boxbanner.skin.php';


    $skin_path = G5_SHOP_SKIN_PATH.'/'.$skin;
    if(G5_IS_MOBILE)
        $skin_path = G5_MSHOP_SKIN_PATH.'/'.$skin;

    if(file_exists($skin_path)) {
        // 접속기기
        $sql_device = " and ( bn_device = 'both' or bn_device = 'pc' ) ";
        if(G5_IS_MOBILE)
            $sql_device = " and ( bn_device = 'both' or bn_device = 'mobile' ) ";

        // 배너 출력
        $sql = " select * from {$g5['g5_shop_banner_table']}_daontheme where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = '$position' order by bn_order, bn_id desc ";
        $result = sql_query($sql);
	
        include $skin_path;
    } else {
        echo '<p>'.str_replace(G5_PATH.'/', '', $skin_path).'파일이 존재하지 않습니다.</p>';
    }
}

}

$display_banner_daon_fun_exists2 = function_exists('display_banner_daon1');

if(!$display_banner_daon_fun_exists2){

// 긴배너출력   긴배너의 경우 모바일일때 모바일 이미지, PC일때 pc 이미지를 불러온다.
function display_banner_daon1($position, $skin='')
{
    global $g5, $arrow_remote_addr, $REMOTE_ADDR, $arrow_server_name, $is_admin, $_OS_; //daontheme

    if (!$position) $position = '왼쪽';
    if (!$skin) $skin = 'boxbanner.skin.php';


    $skin_path = G5_SHOP_SKIN_PATH.'/'.$skin;
    if(G5_IS_MOBILE)
        $skin_path = G5_MSHOP_SKIN_PATH.'/'.$skin;


    if(file_exists($skin_path)) {
        // 접속기기
        $sql_device = " and ( bn_device = 'both' or bn_device = 'pc' ) ";
        if(G5_IS_MOBILE || $_OS_ == "mobile")
            $sql_device = " and ( bn_device = 'both' or bn_device = 'mobile' ) ";

        // 배너 출력
        $sql = " select * from {$g5['g5_shop_banner_table']}_daontheme where '".G5_TIME_YMDHIS."' between bn_begin_time and bn_end_time $sql_device and bn_position = '$position' order by bn_order, bn_id desc ";
        $result = sql_query($sql);
	
        include $skin_path;
    } else {
        echo '<p>'.str_replace(G5_PATH.'/', '', $skin_path).'파일이 존재하지 않습니다.</p>';
    }
}

}

include G5_THEME_PATH."/admin_dt/_common_.php";	
$optimize_t = true;
$MobileArray_d  = array("iphone","lgtelecom","skt","mobile","samsung","nokia","blackberry","android","android","sony","phone");
$checkCount = 0; 
for($i=0; $i<sizeof($MobileArray_d); $i++){ 
	if(preg_match("/".$MobileArray_d[$i]."/", strtolower($_SERVER['HTTP_USER_AGENT']))){ $checkCount++; break; } 
} 
if($checkCount >= 1){
	$_OS_ =  "mobile";
}else{
	$_OS_ = "pc";
}