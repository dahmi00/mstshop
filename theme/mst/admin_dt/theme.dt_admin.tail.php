<?php 
if($is_member){
	$sql = " select count(*) as cnt from {$g5['auth_table']} where mb_id = '{$member['mb_id']}' ";
	$row = sql_fetch($sql);
	if ($row['cnt'])	$is_auth_t = true;
}

if(($is_admin == 'super' || $is_auth_t) && !preg_match("/\/admin_dt\//", $_SERVER['PHP_SELF']) && !preg_match("/\/adm\//", $_SERVER['PHP_SELF'])){?>
<style>
	.btn_top_admin_bt{position:fixed; right:10px; top:10px; z-index:9999; color:red; font-weight:700;background:rgba(0,0,0,0.8); padding:15px; border-radius:10px; height:60px; transition: 0.5s all ease; -webkit-transition: 0.5s all ease; -moz-transition: 0.5s all ease; -ms-transition: 0.5s all ease; -o-transition: 0.5s all ease; text-align:center; overflow:hidden;}
	.btn_top_admin_bt.de{height:120px; transition: 0.5s all ease; -webkit-transition: 0.5s all ease; -moz-transition: 0.5s all ease; -ms-transition: 0.5s all ease; -o-transition: 0.5s all ease;}
	.btn_top_admin_bt .se_btn{font-size:20px; cursor:pointer; color:red; display:block; font-weight:600;}
	.btn_top_admin_bt a{color:#fff;  font-weight:500; display:block; width:100%; text-align:center; font-size:13px;}
	.btn_top_admin_bt button{color:#aaa; background:none; border:0px; height:30px; font-size:11px;}
	@media all and (max-width:1000px){	
		.btn_top_admin_bt{display:none;}
	}
	.btn_top_admin_bt_mfp  .mfp-iframe-holder .mfp-content{max-width:1500px; height:90%; }
	<?php if($is_admin == "super"){?>
	.btn_top_admin_bt.de{height:180px;}
	<?php }?>
</style>
<div class="btn_top_admin_bt">
	<div class="se_btn"><i class="fa fa-cog fa-spin fa-fw"></i>설정</div>
	<div style="padding-top:10px;">
	<a href="<?php echo G5_ADMIN_URL?>/" target="_blank">관리자모드</a>
	<?php if($is_admin == "super"){?>
	<!-- 테마전용 설정이 필요없으시면 아래 2개 버튼을 주석처리해 주세요.-->
	<a href="<?php echo G5_THEME_URL?>/admin_dt/theme.install.php" class="dt_iframe_link">DB INSTALL</a>
	<a href="<?php echo G5_THEME_URL?>/admin_dt/banner_list.php" class="dt_iframe_link">테마배너설정</a>
	<!-- 
	위 버튼이 작동하지 않을 때 주석을 해제하고 사용하세요.
	<a href="#none" onclick="WpopupCenter('<?php echo G5_THEME_URL?>/admin_dt/theme.install.php?btn=true',800,800);">DB INSTALL</a>
	<a href="#none" onclick="WpopupCenter('<?php echo G5_THEME_URL?>/admin_dt/banner_list.php',800,800);">테마배너설정</a>
	-->
	<a href="#none" class="dt_setting_off_btn"><?php if($_COOKIE['dt_setting'] == "off"){?>설정ON<?php }else{?>설정OFF<?php }?></a> <!-- 이 라인의 설정ON 설정OFF 글자를 수정하지 마세요. -->	
	<?php }?>
	<button type="button" class="btn_top_admin_bt_close">X CLOSE</button>	
	</div>
</div>
<script>	
	function setCookie_T_Banner( name, value) { 
		document.cookie = name + "=" + escape( value ) + "; path=/;" 
	}

	$(document).ready(function() {		
		$('.btn_top_admin_bt .se_btn').hover(function(){
			$(".btn_top_admin_bt").addClass("de");
		});
		$('.btn_top_admin_bt_close').click(function(){
			$(".btn_top_admin_bt").removeClass("de");
		});
		$('.dt_iframe_link').magnificPopup({			
			type: 'iframe',	
			mainClass: 'btn_top_admin_bt_mfp'
		});
		$('.dt_setting_off_btn').click(function(){				
			var o_t_x =  $(this).text();
			if(o_t_x == "설정ON"){
				$(".banner_modify_btn").attr('style','display: inline-block !important');
				$(".btn_admin_dt").attr('style','display: inline-block !important');
				setCookie_T_Banner( "dt_setting", "on"); 		
				$(this).text("설정OFF");
			}else{		
				$(".banner_modify_btn").attr('style','display: none !important');
				$(".btn_admin_dt").attr('style','display: none !important');
				setCookie_T_Banner( "dt_setting", "off"); 		
				$(this).text("설정ON");
			}
			
		});
		
	});
	function WpopupCenter(href, w, h) {
		var xPos = (document.body.offsetWidth/2) - (w/2); 
		xPos += window.screenLeft; 
		var yPos = (document.body.offsetHeight/2) - (h/2);
		yPos=100;
		window.open(href, "", "width="+w+", height="+h+", left="+xPos+", top="+yPos+", menubar=no, status=no, titlebar=no, resizable=no,status=no");
	}
	$('.magnificPopup_close').click(function(){
		$.magnificPopup.close();
	 });
</script>
<?php }?>