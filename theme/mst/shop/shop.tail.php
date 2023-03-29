<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
    return;
}

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>




<?php if (!defined("_INDEX_")) { ?>       
		</div>  <!-- } .shop-content 끝 -->
	</div>  <!-- } #container 끝 -->
<?php }?>	
</div> <!-- } #wrapper 전체 콘텐츠 끝 -->


<div id="ft">
	<div class="ft_copyright">
		<div class="copy_right">
			<dl>
				<dd>
					<div class="ft_cs">
						<h2>CS CENTER<!-- 고객센터 --></h2>
						<?php if($_OS_ == "mobile"){?><a href="tel:<?php echo $default['de_admin_company_tel']; ?>"><?php }?><strong><?php echo $default['de_admin_company_tel']; ?></strong><?php if($_OS_ == "mobile"){?></a><?php }?>
						<p>
							Mon - Fri. 09:00 - 18:00<br>
							Lunch. 12:00 - 13:00<br>
							SAT, SUN, HOLIDAY OFF
						</p>
					</div>
				</dd>
				<dd>
					<div class="ft_bank">
						<h2>BANK INFO<!-- 무통장입금정보 --></h2>
						<p><span class="bank_name">농협</span><span class="bank_num">301-0320-7676-21</span></p>
						<p class="txts">예금주 : 주식회사엠에스티</p>
					</div>
				</dd>
				<dd>
					<div class="ft_return">
						<h2>RETURN / EXCHANGE<!-- 반품주소안내 --></h2>
						<?php if($_OS_ == "mobile"){?><a href="tel:<?php echo $default['de_admin_company_addr']; ?>"><?php }?><strong><?php echo $default['de_admin_company_addr']; ?></strong><?php if($_OS_ == "mobile"){?></a><?php }?>
						<p>자세한 교환·반품절차 안내는<br>상품 상세페이지 하단을 참고해주세요.</p>
					</div>
				</dd>
				<dd>
					<div class="ft_sns">
						<h2>SNS INFO</h2>
						<ul class="copy_sns">
							<li class="blog"><a href="https://blog.naver.com/mushontea" target="_blank"><i class="fa fa-bold" aria-hidden="true"></i></a></li>
							<li class="instagram"><a href="https://www.instagram.com/mushontea/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</dd>
			</dl>
		</div>
		<div class="copy_left">
			<div class="ft_menu">
				<ul class="ft_ul">
					<li><a href="<?php echo G5_SHOP_URL; ?>/">홈으로</a></li>
					<li><a href="<?php echo get_pretty_url('content', 'company'); ?>">회사소개</a></li>
					<li><a href="<?php echo get_pretty_url('content', 'provision'); ?>">이용약관</a></li>
					<li><a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a></li>
					<!-- <li><a href="<?php echo get_device_change_url(); ?>">모바일버전</a></li> --><?php /* 반응형으로 모바일버전은 사용하지 않습니다. */?>
				</ul>
			</div> 
			<div class="ft_info">
				<h2><?php echo $default['de_admin_company_name']; ?></h2>
				<span><b>대표</b> <?php echo $default['de_admin_company_owner']; ?></span><br>
				<span><b>사업자등록번호</b> <?php echo $default['de_admin_company_saupja_no']; ?></span><br>
				<span><b>통신판매업신고번호</b> <?php echo $default['de_admin_tongsin_no']; ?></span>
				<?php if ($default['de_admin_buga_no']) echo '<span><b>부가통신사업신고번호</b> '.$default['de_admin_buga_no'].'</span>'; ?><br>
				<span><b>주소</b> <?php echo $default['de_admin_company_addr']; ?></span><br>
				<span><b>전화</b> <?php echo $default['de_admin_company_tel']; ?></span><br>
				<span><b>이메일</b> <?php echo $default['de_admin_info_email']; ?></span><br>
				<!-- <span><b>운영자</b> <?php echo $admin['mb_name']; ?></span><br> -->
				<span><b>개인정보책임관리자</b> <?php echo $default['de_admin_info_name']; ?></span><br>
				<p>COPYRIGHT &copy; 2023 <?php echo $default['de_admin_company_name']; ?> ALL RIGHTS RESERVED.</p>
			</div>
		</div>
	</div>


	<script>
	
	$(function() {
		$("#top_btn").on("click", function() {
			$("html, body").animate({scrollTop:0}, '500');
			return false;
		});
	});
	</script>

</div>


<div id="ft_bnk"></div>

<script src="<?php echo G5_THEME_SHOP_URL; ?>/html/css_js/common.js"></script>
<?php	
	$sql  = " select * from {$g5['g5_shop_wish_table']} where mb_id = '{$member['mb_id']}' ";
	$result = sql_query($sql);
	$w_reset = array();
	for ($i=0; $row = sql_fetch_array($result); $i++) {
		$w_reset[] = $row['it_id'];
	}	
	$w_reset_t = @implode(",",$w_reset);
	
	
	$cart_id_r = get_session("ss_cart_id");
	$sql  = " select * from {$g5['g5_shop_cart_table']} where od_id = '$cart_id_r' ";
	$result = sql_query($sql);
	$b_reset = array();
	for ($i=0; $row = sql_fetch_array($result); $i++) {
		$b_reset[] = $row['it_id'];
	}	
	$b_reset_t = @implode(",",$b_reset);	
?>
<script>
	$('button.btn_wish').each(function (index, item) { 		
		var stringVal = "<?php echo $w_reset_t?>",
		substring = $(this).attr('data-it_id');
		if(stringVal.indexOf(substring) !== -1){
			$(this).find('i').css("color","#C53428");
		}		
	});
	<?php if($member['mb_id']){?>
	$("button.btn_wish").click(function() {
		$(this).find('i').css("color","#C53428");
	});
	<?php }?>

	$('button.btn_cart').each(function (index, item) { 		
		var stringVal = "<?php echo $b_reset_t?>",
		substring = $(this).attr('data-it_id');
		if(stringVal.indexOf(substring) !== -1){
			$(this).find('i').css("color","#C53428");
		}		
	});
</script>





<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<!-- } 하단 끝 -->

<script>
$(document).ready(function() {	
	$('.dt_iframe_link_bb').magnificPopup({			
		type: 'iframe',	
		mainClass: 'btn_top_admin_bt_mfp',
		callbacks: {				
			afterClose: function() {
			location.reload();
		  },
		 }
	});		
});
</script>

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');