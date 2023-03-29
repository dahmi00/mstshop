<?php
include "_common.php";
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

//할인상품

// 여기서부터 수정하지 마십시오.
$list_mod_re = '';
if($w_width <= 480) $list_mod_re = 2;
else if($w_width > 480 && $w_width <= 900) $list_mod_re = 3;
else if($w_width > 900) $list_mod_re = 4;

for($ii = 1; $ii<=5; $ii++){
	$default['de_type'.$ii.'_list_skin'] = str_replace(".skin.",".daon.skin.", $default['de_type'.$ii.'_list_skin']);
}
// 여기까지 수정하지 마십시오.


//파일위치 : 루트/theme/테마폴더/skin/shop/daon/main.20.daon.skin.php

 //세일퍼센트 아이콘은 it_cust_price 와 it_price 가 둘다 true일때 나타납니다.
$list = new item_list();
$list->set_type(5);
//$list->set_category("40");	//특정카테고리만 사용시 40 대신 카테고리 코드를 입력
$list->set_view('it_id', false);
$list->set_view('it_name', true);
$list->set_view('it_basic', true);
$list->set_view('it_cust_price', true);
$list->set_view('it_price', true);
$list->set_view('it_icon', true);
$list->set_view('sns', true);
$list->set_view('star', true);
echo $list->run();
?>