<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);

$max_width = $max_height = 0;
$bn_first_class = ' class="bn_first"';
$bn_slide_btn = '';
$bn_sl = ' class="bn_sl"';
$main_banners = array();

for ($i=0; $row=sql_fetch_array($result); $i++)
{
    $main_banners[] = $row;

    // 테두리 있는지
    $bn_border  = ($row['bn_border']) ? ' class="sbn_border"' : '';;
    // 새창 띄우기인지
    $bn_new_win = ($row['bn_new_win']) ? ' target="_blank"' : '';

    $bimg = G5_DATA_PATH.'/banner_dt/'.$row['bn_id'];
    $item_html = '';

    if (file_exists($bimg))
    {
        $banner = '';
        $size = getimagesize($bimg);

        if($size[2] < 1 || $size[2] > 16)
            continue;

        if($max_width < $size[0])
            $max_width = $size[0];

        if($max_height < $size[1])
            $max_height = $size[1];

        $item_html .= '<div class="swiper-slide swiper-lazy" data-swiper-autoplay="5000">';
        if (preg_match("/^#/", $row['bn_url']))
            $banner .= '<a href="'.$row['bn_url'].'">';
        else if ($row['bn_url'] && $row['bn_url'] != 'http://') {
            $banner .= '<a href="'.G5_THEME_URL.'/shop/bannerhit.php?bn_id='.$row['bn_id'].'"'.$bn_new_win.'>';
        }
        $item_html .= $banner.'<img src="'.G5_DATA_URL.'/banner_dt/'.$row['bn_id'].'?'.preg_replace('/[^0-9]/i', '', $row['bn_time']).'" width="'.$size[0].'" alt="'.get_text($row['bn_alt']).'"'.$bn_border.'>';
        if($banner)
            $item_html .= '</a>';
		$item_html .= '<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>';

		if($is_admin) $item_html .=  '<div class="banner_modify_btn"><a href="'.G5_THEME_URL.'/admin_dt/banner_form.php?w=u&amp;bn_id='.$row['bn_id'].'" class="btn_admin btn dt_iframe_link_bb"><i class="fa fa-cog fa-spin fa-fw"></i> 배너수정</a></div>';

        $item_html .= '</div>';
    }else{
		
		 $item_html .= '<div class="swiper-slide swiper-lazy" data-swiper-autoplay="5000">';
       
        $item_html .= '<img src="'.G5_THEME_URL.'/admin_dt/banner_img/'.$row['bn_id'].'?'.preg_replace('/[^0-9]/i', '', $row['bn_time']).'" >';
       
		$item_html .= '<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>';

		if($is_admin) $item_html .=  '<div class="banner_modify_btn"><a href="'.G5_THEME_URL.'/admin_dt/banner_form.php?w=u&amp;bn_id='.$row['bn_id'].'" class="btn_admin btn dt_iframe_link_bb"><i class="fa fa-cog fa-spin fa-fw"></i> 배너수정</a></div>';

        $item_html .= '</div>';	

	}
    
    $banner_style = $max_height ? 'style="min-height:'.($max_height + 25).'px"' : '';
    if ($i==0) echo '<div id="main_bn_mobile"><div class="swiper-container swiper-container-mobile"><div class="swiper-wrapper">'.PHP_EOL;
    
    echo $item_html;
}

if ($i > 0) {
    echo '</div>'.PHP_EOL;

	
	echo '<div class="swiper-pagination swiper-pagination-mobile"></div><div class="swiper-button-next swiper-button-next-mobile"></div><div class="swiper-button-prev swiper-button-prev-mobile"></div>'.PHP_EOL;

    echo '</div>'.PHP_EOL;
    echo '</div>'.PHP_EOL;
?>

<?php
}

?>
<script>
	/**
	 * Swiper 4.0.7
	 * Most modern mobile touch slider and framework with hardware accelerated transitions
	 * http://www.idangero.us/swiper/
	 *
	 * Copyright 2014-2017 Vladimir Kharlampidi
	 *
	 * Released under the MIT License
	 *
	 * Released on: November 28, 2017
	 */
	//var swiperAnimation_mobile = new SwiperAnimation();
	var swiper_mobile = new Swiper('.swiper-container-mobile', {
		slidesPerView: 1,
		spaceBetween: 0,
		effect:"slide",
		autoHeight: false,
		loop: true, //유투브 영상을 첫번째 컷, 마지막 컷으로 사용하실 경우 false 로 지정하셔야 합니다. 유투브영상이 없거나 두번째이상 컷에 넣으신다면 true 로 바꾸셔도 됩니다.
		pagination: {
			el: '.swiper-pagination-mobile',
			clickable: true,
		},
		preloadImages: false,   
		lazy: true,
		lazy: {
			loadPrevNext: true,
		},
		navigation: {
			nextEl: '.swiper-button-next-mobile',
			prevEl: '.swiper-button-prev-mobile',
		},
		paginationClickable: true,
		speed: 1000,	
		autoplay: {
			delay: 5000,
			disableOnInteraction: false
		},	
		/*
		on: {
		  init: function () {
			swiperAnimation_mobile.init(this).animate();
		  },
		  slideChange: function () {
			swiperAnimation_mobile.init(this).animate();
		  }
		}
		*/
	});

	if($('#bgndVideo_mobile').length) {
		swiper_mobile.on('slideChange', function () {	
			var isVideoa_mobile = swiper_mobile.slides[swiper.activeIndex].querySelector('#bgndVideo1_mobile');
			if (isVideoa_mobile) {		
				$("#bgndVideo_mobile").YTPPlay();	
			}else{
				$("#bgndVideo_mobile").YTPPause();
			}
		});
	}


	$( ".swiper-container-mobile" ).mouseover(function(){
		$(".swiper-button-next-mobile").show();
		$(".swiper-button-prev").show();
	});
	$( ".swiper-container-mobile-mobile" ).mouseleave(function(){
		$(".swiper-button-next-mobile").hide();
		$(".swiper-button-prev-mobile").hide();
	});

</script>