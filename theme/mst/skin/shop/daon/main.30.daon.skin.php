<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
add_javascript('<script src="'.G5_THEME_JS_URL.'/theme.shop.list.js"></script>', 10);

/*
상품리스트가 일정 시간마다 좌로 롤링되는 스킨
롤링되기 위해서는 상품이 2줄 이상이어야 함
*/

$dnum = $this->type;
$per_num = $this->list_mod;
global $_OS_;
?>


<section class="rolling_box" >	
	<div class="owl-carousel main_owl-carousel<?php echo $dnum?>" >
		
		<?php
		$i=0;
		$btn_str = "";
		foreach((array) $list as $row){

			if( empty($row) ) continue;
			$i++;

			$item_link_href = shop_item_url($row['it_id']);
			$star_score = $row['it_use_avg'] ? (int) get_star($row['it_use_avg']) : '';
			$is_soldout = is_soldout($row['it_id'], true);   // 품절인지 체크
		
			$btn_str .= "<li><a href=\"#r_".$i."\" class=\"rollin_nav_btn r_".$i."\"></a></li>";
			echo "<div class='item' data-hash=\"r_".$i."\"><li class=\"sct_li plista \" style='display:block;'> \n";

			if ($this->href) {
				echo "<div class='sct_img'><a href=\"{$item_link_href}\" >\n";
			}

			if ($this->view_it_img) {
				echo get_it_image($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
			}

			if ($this->href) {
				echo "</a>\n";
			}
			if($_OS_ == 'pc'){
?>
	<div class="pi_ua" style="display:none; position:absolute; top:0; width:<?php echo $this->img_width?>px; height:<?php echo $this->img_height?>px;;padding:0;" onclick="location.href='<?php echo $item_link_href;?>';">			
		<?php
			
			$img = get_it_thumbnail($row['it_img2'], $this->img_width, $this->img_height);
			if($img) {	
				echo $img;
			}
		
		?>
	</div>
<?php
			}	
			if ($this->view_it_cust_price && $this->view_it_price) {
				 // 할인율 표시 ( 전화문의가 아니며 판매가격 과 시중가격 이 있을때 표시 (A-B)/A*100 )
				 if ($row['it_cust_price'] && $row['it_price'] && !$row['it_tel_inq']) {

					$sale_per = 100-(round( (get_price($row)/$row['it_cust_price']) * 100 , 0)).'%';

					echo '<span class="sct_disc">'.$sale_per.'<span>SALE</span></span>'.PHP_EOL;
				}
			}

			// 위시리스트 + 공유 버튼 시작 {
			echo "<div class=\"sct_op_btn\">\n";
			if(!$is_soldout && !$row['it_tel_inq'])  echo "<button type=\"button\" class=\"btn_cart\" data-it_id=\"{$row['it_id']}\"><span >장바구니</span><i class=\"fa fa-shopping-basket\" aria-hidden=\"true\"></i></button>\n";
			echo "<button type=\"button\" class=\"btn_wish\" data-it_id=\"{$row['it_id']}\"><span >위시리스트</span><i class=\"fa fa-heart\" aria-hidden=\"true\"></i></button>\n";
			if ($this->view_sns) echo "<button type=\"button\" class=\"btn_share30\"><span >공유하기</span><i class=\"fa fa-share-alt\" aria-hidden=\"true\"></i></button>\n";
			
			if ($this->view_sns) {				
				$sns_top = $this->img_height + 10;
				$sns_url  = $item_link_href;
				$sns_title = get_text($row['it_name']).' | '.get_text($config['cf_title']);
				echo "<div class=\"sct_sns30\" style=\"display:none;\">";
				echo "<h3>SNS 공유</h3>";
				echo get_sns_share_link('facebook', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/facebook.png');
				echo get_sns_share_link('twitter', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/twitter.png');
				if($_OS_ == 'mobile'){
					echo get_sns_share_link('kakaotalk', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/sns_kakao.png');
				}
				echo "<button type=\"button\" class=\"sct_sns_cls30\"><span class=\"sound_only\">닫기</span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></button>";
				echo "</div>\n";			

			}

			echo "</div>\n";
			// } 위시리스트 + 공유 버튼 끝

			echo "<div class=\"cart-layer\"></div>\n";

			 echo "</div>\n";				

		  

			if ($this->view_it_id) {
				echo "<div class=\"sct_id\">&lt;".stripslashes($row['it_id'])."&gt;</div>\n";
			}

			if ($this->href) {
				echo "<div class=\"sct_txt\"><a href=\"{$item_link_href}\" class=\"sct_a\">\n";
			}

			if ($this->view_it_name) {
				echo stripslashes($row['it_name'])."\n";
			}

			if ($this->href) {
				echo "</a></div>\n";
			}

			if ($this->view_it_basic && $row['it_basic']) {
				echo "<div class=\"sct_basic\">".stripslashes($row['it_basic'])."</div>\n";
			}

			 if ($this->view_it_cust_price || $this->view_it_price) {

				echo "<div class=\"sct_cost\">\n";
				
				if ($this->view_it_cust_price && $row['it_cust_price']) {
					echo "<span class=\"sct_dict\">".display_price($row['it_cust_price'])."</span>\n";
				}
				
				if ($this->view_it_price) {
					echo display_price(get_price($row), $row['it_tel_inq'])."\n";
				}
				echo "</div>\n";
			}

			
			if ($this->view_it_icon) {
				echo "<div class=\"sit_icon_li\">".item_icon($row);
				// 품절
				if (is_soldout($row['it_id'], true)) {
					echo '<span class="shop_icon_soldout"><span class="soldout_txt">Sold Out</span></span>';
				}
				echo "</div>\n";
			}


			// 사용후기 평점표시
			if ($this->view_star && $star_score) {
				echo "<div class=\"sct_star\"><span class=\"sound_only\">고객평점</span><img src=\"".G5_SHOP_URL."/img/s_star".$star_score.".png\" alt=\"별점 ".$star_score."점\" class=\"sit_star\"></div>\n";
			}

		  

			echo "</li></div>\n";
		}


		if($i == 1) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
		?>		
	</div>
	<ul class="nav">
		<?php echo $btn_str?>
	</ul>
	
</section>

<script>
$(document).ready(function(){						
		
	var owl_rolling<?php echo $dnum?> = $('.main_owl-carousel<?php echo $dnum?>').owlCarousel({
		items:5,
		loop:<?php if($i < 6) echo "false"; else echo "true";?>,
		margin:34,
		nav:true,			
		autoplay:true,
        autoplayHoverPause:true,
		autoplayTimeout:5000,   // 5000은 5초
		URLhashListener:true,
        startPosition: 'URLHash',
		onTranslated : init_pg,
		responsive:{
			0:{
				items:2,
				margin:15,
				loop:<?php if($i < 3) echo "false"; else echo "true";?>,
			},
			480:{
				items:3,
				margin:15,
				loop:<?php if($i < 4) echo "false"; else echo "true";?>,				
			},
			1000:{
				items:4,
				loop:<?php if($i < 5) echo "false"; else echo "true";?>,
			},
			1300:{
				items:5,
				loop:<?php if($i < 6) echo "false"; else echo "true";?>,
			}
		}
	});
	
	function init_pg(event){	
		var tg = $('.rolling_box ').find('.owl-item.active').find('.item').attr('data-hash');	
		$('.rollin_nav_btn').removeClass('active');
		$("."+tg).addClass('active');
	}
	init_pg();

});
</script>

<?php 


	if ($this->view_sns) {
	echo "<div class=\"sct_sns_wrap30\">";
	
		$sns_top = $this->img_height + 10;
		$sns_url  = $item_link_href;
		$sns_title = get_text($row['it_name']).' | '.get_text($config['cf_title']);
		echo "<div class=\"sct_sns\">";		
		echo "</div>\n";
	
	echo "<div class=\" sct_sns_bg30\"></div>";
	echo "</div>";

	}

?>

<script>
//SNS 공유
$(function (){
	$(".btn_share30").on("click", function() {
		var share30_html = $(this).parent("div").children(".sct_sns30").html();
		$('.sct_sns_wrap30 .sct_sns').html(share30_html);
		$('.sct_sns_wrap30').fadeIn();
	});
	$(document).on('click', '.sct_sns_bg30, .sct_sns_cls30', function(){  
	    $('.sct_sns_wrap30').fadeOut();
	});
	$(document).on('click', '.sct_sns_wrap30 .sct_sns a', function(){  
	    $('.sct_sns_wrap30').fadeOut();
	});
});

$(function() {
    $(document).on('click', '.share-facebook', function(){  
        window.open($(this).attr("href"), "win_facebook", "menubar=1,resizable=1,width=600,height=600");
        return false;
    });	
	$(document).on('click', '.share-twitter', function(){  
        window.open($(this).attr("href"), "win_twitter", "menubar=1,resizable=1,width=600,height=600");
        return false;
    });	
	$(document).on('click', '.share-googleplus', function(){  
        window.open($(this).attr("href"), "win_googleplus", "menubar=1,resizable=1,width=600,height=600");
        return false;
    });
});
</script>
