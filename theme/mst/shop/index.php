<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

if(! defined('_INDEX_')) define('_INDEX_', TRUE);

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>



<?php if(defined('_INDEX_')) { // index에서만 실행
	include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
} ?>


<?php
	/*		
		메인이미지		
		PC용 이미지 크기 w 2000 × h 500 : 높이는 가변적이어도 되나 모든 이미지 높이가 같아야 합니다.
		모바일용 이미지 크기 w 900 × h 600 : 높이는 가변적이어도 되나 모든 이미지 높이가 같아야 합니다.	
	*/	
?>	

<?php echo display_banner_daon2('shop03_메인', 'mainbanner.10.daon.skin.php'); //PC용 배너출력     파일위치 : 루트/theme/테마폴더/skin/shop/daon/mainbanner.10.daon.skin.php ?>
<?php echo display_banner_daon2('shop03_메인', 'mainbanner.mobile.daon.skin.php'); //모바일용 배너출력     파일위치 : 루트/theme/테마폴더/skin/shop/daon/mainbanner.mobile.daon.skin.php ?>


<!-- 콘텐츠 시작 { -->
<div class="container_div" id="index_con"> <?php // id="index_con" 을 삭제하지 마세요.?>


<?php
	/*		
		히트상품
		관리자모드 > 쇼핑몰관리 > 쇼핑몰설정 > 쇼핑몰초기화면 에서 이미지 크기와 출력스킨을 조정하세요.
		히트상품출력 : 스킨 main.30.skin.php 	1줄당 이미지 수 4		출력할 줄 수 2		이미지 폭 300		이미지 높이 300
		참고) 출력할 줄수를 1이상 선택하시더라도 1줄로만 출력됩니다.
		상품진열은 관리자모드 > 쇼핑몰관리 > 상품유형관리 에서 히트상품에 체크 설정하시면 됩니다. 

		파일위치 : 루트/theme/테마폴더/skin/shop/daon/main.30.daon.skin.php
	*/
?>
<?php if($default['de_type1_list_use']) { ?>

<!-- 히트상품 시작 { -->
<section class="sct_wrap">
	<header>
		<h2><a href="<?php echo shop_type_url('1'); ?>">BRAND ITEMS</a><?php if($is_admin){?>&nbsp;<a href="<?php echo G5_ADMIN_URL ?>/shop_admin/configform.php#anc_scf_index" class="btn_admin btn btn_admin_dt"><i class="fa fa-cog fa-spin fa-fw"></i>진열수정</a><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemtypelist.php" class="btn_admin btn btn_admin_dt"><i class="fa fa-cog fa-spin fa-fw"></i>상품변경</a><?php }?></h2>
		<p>MST 브랜드관을 이용해보세요.</p>
	</header>
	<?php
	 //세일퍼센트 아이콘은 it_cust_price 와 it_price 가 둘다 true일때 나타납니다.
	$list = new item_list();
	$list->set_type(1);
	//$list->set_category("40");	//특정카테고리만 사용시 40 대신 카테고리 코드를 입력
	$list->set_view('it_img', true);
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
</section>
<!-- } 히트상품 끝 -->
<?php } ?>


<?php
	/*		
		"배너1", "배너2", "배너3"
		w 420 × h 200
	*/
?>
<div class="bn_3_li" style="margin-bottom:25px;">
	<div class="left"><?php echo display_banner_daon3('shop03_배너1','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?></div>	
	<div class="center"><?php echo display_banner_daon3('shop03_배너2','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?></div>
	<div class="right"><?php echo display_banner_daon3('shop03_배너3','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?></div>
</div>


<?php
	/*		
		"미니 슬라이드"
		PC용 : w 1300 × h 340
		모바일용 : w 600 × h 600
		가로로 긴 1개 배너의 경우 PC용 배너와 모바일용 배너를 구분해서 업로드해야 합니다.
	*/
?>
<div class="bn_1_li">
	<?php echo display_banner_daon1('shop03_배너슬라이드','boxbanner.daon2.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon2.skin.php?>	
</div>


<?php
	/*		
		최신상품
		관리자모드 > 쇼핑몰관리 > 쇼핑몰설정 > 쇼핑몰초기화면 에서 이미지 크기와 출력스킨을 조정하세요.
		최신상품출력 : 스킨 main.40.skin.php 	1줄당 이미지 수 3		출력할 줄 수 2		이미지 폭 200		이미지 높이 200
		상품진열은 관리자모드 > 쇼핑몰관리 > 상품유형관리 에서 최신상품에 체크 설정하시면 됩니다.

		파일위치 : 루트/theme/테마폴더/skin/shop/daon/main.40.daon.skin.php
	*/
?>
<?php if($default['de_type3_list_use']) { ?>
<!-- 신규상품 시작 { -->
<section class="sct_wrap" style="margin-bottom:0px;">
	<header>
		<h2><a href="<?php echo shop_type_url('3'); ?>">NEW PRODUCT</a><?php if($is_admin){?>&nbsp;<a href="<?php echo G5_ADMIN_URL ?>/shop_admin/configform.php#anc_scf_index" class="btn_admin btn btn_admin_dt"><i class="fa fa-cog fa-spin fa-fw"></i>진열수정</a><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemtypelist.php" class="btn_admin btn btn_admin_dt"><i class="fa fa-cog fa-spin fa-fw"></i>상품변경</a><?php }?></h2>
		<p>MST 신제품을 만나보세요</p>
	</header>
	<?php
	 //세일퍼센트 아이콘은 it_cust_price 와 it_price 가 둘다 true일때 나타납니다.
	$list = new item_list();
	$list->set_type(3);
	//$list->set_category("40");	//특정카테고리만 사용시 40 대신 카테고리 코드를 입력
	$list->set_view('it_id', false);
	$list->set_view('it_name', true);
	$list->set_view('it_basic', true);
	$list->set_view('it_cust_price', true);
	$list->set_view('it_price', true);
	$list->set_view('it_icon', true);
	$list->set_view('sns', true);
	$list->set_view('star', false);
	echo $list->run();
	?>
</section>
<!-- } 신규상품 끝 -->
<?php } ?>



<?php
	/*		
		"배너4"
		w 1300 × h 240
		모바일용 : w 600 × h 400
		가로로 긴 1개 배너의 경우 PC용 배너와 모바일용 배너를 구분해서 업로드해야 합니다.
	*/
?>
<div class="bn_1_li" >
	<?php echo display_banner_daon1('shop03_배너4','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?>
</div>



<?php
	/*		
		추천상품
		관리자모드 > 쇼핑몰관리 > 쇼핑몰설정 > 쇼핑몰초기화면 에서 이미지 크기와 출력스킨을 조정하세요.
		추천상품출력 : 스킨 main.10.skin.php 	1줄당 이미지 수 4		출력할 줄 수 2		이미지 폭 300		이미지 높이 300
		상품진열은 관리자모드 > 쇼핑몰관리 > 상품유형관리 에서 추천상품에 체크 설정하시면 됩니다.
		
		파일위치 : 루트/theme/테마폴더/skin/shop/daon/main.10.daon.skin.php
	*/
?>


</div>


<?php
	/*		
		"배너5"
		w 640 × h 640
		
		"배너6", "배너7" , "배너8", "배너9"
		w 310 × h 310
	*/
?>


<!--div class="bn_5">
	<header>
		<h2>EVENT BANNER</h2>
		<P>이벤트 소식받고! 다양한 혜택받고!</p>
	</header>
	<div class="bn_5_list">
		<ul class="bn_5_big">
			<?php echo display_banner_daon3('shop03_배너5','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?>
		</ul>
		<ul class="bn_5_small">
			<li>
				<?php echo display_banner_daon3('shop03_배너6','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?>
			</li>
			<li>
				<?php echo display_banner_daon3('shop03_배너7','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?>
			</li>
			<li>
				<?php echo display_banner_daon3('shop03_배너8','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?>
			</li>
			<li>
				<?php echo display_banner_daon3('shop03_배너9','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php ?>
			</li>
		</ul>
	</div>
</div-->





<?php
	/*		
		인기상품
		관리자모드 > 쇼핑몰관리 > 쇼핑몰설정 > 쇼핑몰초기화면 에서 이미지 크기와 출력스킨을 조정하세요.
		인기상품출력 : 스킨 main.50.skin.php 	1줄당 이미지 수 5		출력할 줄 수 2		이미지 폭 233		이미지 높이 233
		상품진열은 관리자모드 > 쇼핑몰관리 > 상품유형관리 에서 인기상품에 체크 설정하시면 됩니다.		
		
		파일위치 : 루트/theme/테마폴더/skin/shop/daon/main.50.daon.skin.php
	*/
?>
<?php if($default['de_type4_list_use']) { ?>
<!-- 인기상품 시작 { -->
<section class="sct_wrap de_type4">
	<header>
		<h2><a href="<?php echo shop_type_url('4'); ?>">BEST ITEMS</a><?php if($is_admin){?>&nbsp;<a href="<?php echo G5_ADMIN_URL ?>/shop_admin/configform.php#anc_scf_index" class="btn_admin btn btn_admin_dt"><i class="fa fa-cog fa-spin fa-fw"></i>진열수정</a><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemtypelist.php" class="btn_admin btn btn_admin_dt"><i class="fa fa-cog fa-spin fa-fw"></i>상품변경</a><?php }?></h2>
		<p>일년내내 인기있는 베스트 상품</p>
	</header>
	<?php
	 //세일퍼센트 아이콘은 it_cust_price 와 it_price 가 둘다 true일때 나타납니다.
	//상품의 순위는 상품등록의 출력순서에 따릅니다.
	$list = new item_list();
	$list->set_type(4);	
	//$list->set_category("40");	//특정카테고리만 사용시 40 대신 카테고리 코드를 입력x
	$list->set_view('it_id', false);
	$list->set_view('it_name', true);
	$list->set_view('it_basic', true);
	$list->set_view('it_cust_price', false);
	$list->set_view('it_price', true);
	$list->set_view('it_icon', true);
	$list->set_view('sns', true);
	$list->set_view('star', true);
	echo $list->run();
	?>
</section>
<!-- } 인기상품 끝 -->
<?php } ?>




<?php
	/*		
		"배너10", "배너11"
		w 640 × h 290
	*/
?>
<div class="bn_2_li" style="padding-bottom:40px;">
	<div class="left"><?php echo display_banner_daon3('shop03_배너10','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php  ?></div>
	<div class="right"><?php echo display_banner_daon3('shop03_배너11','boxbanner.daon.skin.php'); // 파일위치 : 루트/theme/테마폴더/skin/shop/daon/boxbanner.daon.skin.php  ?></div>
</div>


<?php
	/*		
		할인상품
		관리자모드 > 쇼핑몰관리 > 쇼핑몰설정 > 쇼핑몰초기화면 에서 이미지 크기와 출력스킨을 조정하세요.
		할인상품출력 : 스킨 main.20.skin.php 	1줄당 이미지 수 4		출력할 줄 수 2		이미지 폭 300		이미지 높이 300
		상품진열은 관리자모드 > 쇼핑몰관리 > 상품유형관리 에서 할인상품에 체크 설정하시면 됩니다.	

		사용스킨 : 루트/theme/테마폴더/skin/shop/daon/main.20.skin.php
		세팅은 : /theme/테마폴더명/shop/de_type5_list_ajax.php에서 세팅합니다.
	*/
?>
<?php if($default['de_type5_list_use']) { ?>
<!-- 할인상품 시작 { -->
<!--section class="sct_wrap">
	<header>
		<h2><a href="<?php echo shop_type_url('5'); ?>">SUPER SALES</a><?php if($is_admin){?>&nbsp;<a href="<?php echo G5_ADMIN_URL ?>/shop_admin/configform.php#anc_scf_index" class="btn_admin btn btn_admin_dt"><i class="fa fa-cog fa-spin fa-fw"></i>진열수정</a><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemtypelist.php" class="btn_admin btn btn_admin_dt"><i class="fa fa-cog fa-spin fa-fw"></i>상품변경</a><?php }?></h2>
		<p>품질좋은 상품을 초초초특가로 만나보세요.</p>
	</header>
	<div id="de_type5_list_ajax"></div>
	<?php 
		/*			
		아래 스크립트는 모바일 반응형에서 가로 진열개수를 재조정하기 위한 코드입니다.
		사용스킨 : 루트/theme/테마폴더/skin/shop/daon/main.20.skin.php
		에만 적용되는 코드이므로 수정/삭제하지 마시고 그대로 사용하시면 됩니다.
		*/
	?>
	<script>
		var wi_d_th = $(window).width();		
		var allData = { "w_width": wi_d_th};
		$.ajax({
			url: "<?php echo G5_THEME_URL;?>/shop/de_type5_list_ajax.php",
			type: "POST",
			data: allData,
			success: function(data){
				$("#de_type5_list_ajax").html(data);
			}
		});
	</script>
</section-->
<!-- } 할인상품 끝 -->
<?php } ?>


</div>


<div id="review_wrap">
	<div class="review_area">
		<div class="review_Title">
			<h2 class="tit"><strong>PHOTO REVIEW</strong></h2>
			<p>고객님들의 생생한 포토후기를 만나보세요.</p>
		</div>
		<div class="review_list owl-carousel main_owl-carousel-review">
		
		<?php	
		
		$btn_str = "";
		$limit  = 8; //진열개수
		$sql = " select a.*, b.it_name
					from `{$g5['g5_shop_item_use_table']}` a join `{$g5['g5_shop_item_table']}` b on (a.it_id=b.it_id)
					where a.is_confirm = '1' order by a.is_id desc limit 0, {$limit}";
		$result = sql_query($sql);

		for($i=0; $row=sql_fetch_array($result); $i++) {

			$it_href = G5_SHOP_URL.'/item.php?it_id='.$row['it_id'];
			$review_href = G5_SHOP_URL.'/itemuselist.php?is_id='.$row['is_id'];

			$btn_str .= "<li><a href=\"#r_".$i."\" class=\"rollin_nav_btn_r rr_".$i."\"></a></li>";
		?>
			<div class='item' data-hash="rr_<?php echo $i?>">
				<a href="<?php echo $review_href; ?>">
					<div class="tag">BEST</div>
					<div class="img_box"><?php echo get_itemuselist_thumbnail($row['it_id'], $row['is_content'], "300", "300"); ?></div>
					<div class="txts">
						<p class="review_t1 ellipsis"><?php echo get_text(cut_str($row['it_name'], 15)); ?></p>
						<p class="review_t2 ellipsis">
							<?php echo get_text(cut_str(str_replace("&nbsp;","",strip_tags($row['is_content'])), 60), 1); ?>
						</p>
						<p class="review_t3">
							<span class="review_name"><?php echo get_text(cut_str($row['is_name'], 15)); ?></span><span class="seller-rating-value"><img src="<?php echo G5_SHOP_URL?>/img/s_star<?php echo $row['is_score']?>.png" alt="별점 <?php echo $row['is_score']?>점" class="sit_star"></span>
						</p>
					</div>
				</a>
			</div>
			
		<?php
		}
	
		?>
		
		</div>
		<ul class="nav">
			<?php echo $btn_str?>
		</ul>

	</div>
</div>
<script>
$(document).ready(function(){						
		
	var owl_rolling_reivew = $('.main_owl-carousel-review').owlCarousel({
		items:4,
		loop:true,
		margin:34,
		nav:true,			
		autoplay:true,
        autoplayHoverPause:true,
		autoplayTimeout:5000,   // 5000은 5초
		URLhashListener:true,
        startPosition: 'URLHash',
		onTranslated : init_pg_r,
		responsive:{
			0:{
				items:2,
				margin:15,
			},
			480:{
				items:3,
				margin:15,		
			},
			1000:{
				items:4,
			}
		
		}
	});	
	
	function init_pg_r(event){	
		var tg = $('.review_list ').find('.owl-item.active').find('.item').attr('data-hash');	
		$('.rollin_nav_btn_r').removeClass('active');
		$("."+tg).addClass('active');
	}
	init_pg_r();

});
</script>


<div id="comm_area">
	<h2 class="comm_title">COMMUNITY</h2>
	<div class="comm_notice">
	   <!-- 커뮤니티 최신글 시작 { -->
		<section id="sidx_lat">				
			<div class="lat_wrap">
				<h4 class="lat_tit">공지사항</h4>
				<a href="<?php echo get_pretty_url('news'); ?>"><img src="<?php echo G5_THEME_URL;?>/shop/html/image/btn_more.png"></a>
				<?php echo latest('theme/daon_shop_basic', 'news', 4, 28); ?>
			</div>	
			<div class="lat_wrap">
				<h4 class="lat_tit">질문과답변</h4>
				<a href="<?php echo get_pretty_url('qna'); ?>"><img src="<?php echo G5_THEME_URL;?>/shop/html/image/btn_more.png"></a>
				<?php echo latest('theme/daon_shop_basic', 'qna', 4, 28); ?>
			</div>	
			<div class="lat_wrap">
				<h4 class="lat_tit">포토리뷰</h4>
				<a href="<?php echo get_pretty_url('review'); ?>"><img src="<?php echo G5_THEME_URL;?>/shop/html/image/btn_more.png"></a>
				<?php echo latest('theme/daon_shop_basic', 'review', 4, 28); ?>
			</div>
		</section>
	<!-- } 커뮤니티 최신글 끝 -->		
	</div>
</div>



<div class="service_area">
	<ul>
		<li>
			<a href="<?php echo get_pretty_url('event'); ?>">						
				<div class="txts">
					<div class="icons"><i class="fa fa-gift" aria-hidden="true"></i></div>
					<p class="t1">이벤트</p>
					<p class="txts">
						지금 참여할 수 있는 <br class="lview">
						이벤트를 놓치지 마세요.
					</p>
				</div>
			</a>
		</li>
		<li>
			<a href="#none">
				<div class="txts">
					<div class="icons"><i class="fa fa-youtube-play" aria-hidden="true"></i></div>
					<p class="t1">홍보영상</p>
					<p class="txts">
						다양한 소식을 <br class="lview">
						최신동영상으로 확인해보세요.
					</p>
				</div>
			</a>
		</li>
		<li>
			<a href="<?php echo G5_SHOP_URL; ?>/personalpay.php">
				<div class="txts">
					<div class="icons"><i class="fa fa-address-card" aria-hidden="true"></i></div>
					<p class="t1">개인결제</p>
					<p class="txts">
						주문해 주셔서 감사드립니다. <br class="lview">
						담당자와 통화 후 결제 가능합니다.
					</p>
				</div>
			</a>
		</li>
		<li>
			<a href="<?php echo G5_SHOP_URL; ?>/orderinquiry.php">
				<div class="txts">
					<div class="icons"><i class="fa fa-truck" aria-hidden="true"></i></div>
					<p class="t1">주문배송조회</p>
					<p class="txts">
						고객님께서 주문하신 <br class="lview">
						주문배송조회 안내를 드립니다.
					</p>
				</div>
			</a>
		</li>
		<li>
			<a href="<?php echo G5_BBS_URL; ?>/faq.php">
				<div class="txts">
					<div class="icons"><i class="fa fa-list-ul" aria-hidden="true"></i></div>
					<p class="t1">FAQ</p>
					<p class="txts">
						자주묻는 질문을 통해 <br class="lview">
						궁금하신 사항을 확인하세요. 
					</p>
				</div>
			</a>
		</li>
		<li>
			<a href="<?php echo G5_BBS_URL; ?>/qalist.php">
				<div class="txts">
					<div class="icons"><i class="fa fa-commenting" aria-hidden="true"></i></div>
					<p class="t1">1:1문의</p>
					<p class="txts">
						도움이 필요하시면 <br class="lview">
						언제든지 물어보세요.
					</p>
				</div>
			</a>
		</li>
	</ul>
</div>


<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');