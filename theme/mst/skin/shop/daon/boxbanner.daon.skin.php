<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.bxslider.js"></script>', 10);
?>

<div class="bn_banner_x">
<?php
for ($i=0; $row=sql_fetch_array($result); $i++)
{
    //print_r2($row);
    // 테두리 있는지
    $bn_border  = ($row['bn_border']) ? ' class="sbn_border"' : '';;
    // 새창 띄우기인지
    $bn_new_win = ($row['bn_new_win']) ? ' target="_blank"' : '';

    $bimg = G5_DATA_PATH.'/banner_dt/'.$row['bn_id'];
    if (file_exists($bimg))
    {
        $banner = '';
        $size = getimagesize($bimg);
        if (preg_match("/^#/", $row['bn_url']))
            $banner .= '<a href="'.$row['bn_url'].'">';
        else if ($row['bn_url'] && $row['bn_url'] != 'http://') {
            $banner .= '<a href="'.G5_THEME_URL.'/shop/bannerhit.php?bn_id='.$row['bn_id'].'"'.$bn_new_win.'>';
        }
		echo $banner.'<img src="'.G5_DATA_URL.'/banner_dt/'.$row['bn_id'].'?'.preg_replace('/[^0-9]/i', '', $row['bn_time']).'" alt="'.get_text($row['bn_alt']).'" width="'.$size[0].'" height="'.$size[1].'"'.$bn_border.'>';
        if($banner)
            echo '</a>'.PHP_EOL;
    }else{
		echo '<img src="'.G5_THEME_URL.'/admin_dt/banner_img/'.$row['bn_id'].'?'.preg_replace('/[^0-9]/i', '', $row['bn_time']).'" >';
	}
	if($is_admin) echo '<div class="banner_modify_btn"><a href="'.G5_THEME_URL.'/admin_dt/banner_form.php?w=u&amp;bn_id='.$row['bn_id'].'" class="btn_admin btn dt_iframe_link_bb"><i class="fa fa-cog fa-spin fa-fw"></i> 배너수정</a></div>';
}
?>
</div>