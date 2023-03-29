<?php
/*
	데모 기준의 테마 메뉴와 게시판을 자동생성합니다.
*/
error_reporting(E_ALL); ini_set("display_errors", 1);
include "_common.php";

if ($is_admin != 'super'){
	alert('최고관리자만 접근 가능합니다.');
}
$_POST['install'] = isset($_POST['install']) ? trim($_POST['install']) : '';
$_POST['board'] = isset($_POST['board']) ? trim($_POST['board']) : '';
$_POST['menu'] = isset($_POST['menu']) ? trim($_POST['menu']) : '';
?>
<html>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Squada+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:100,300,400,500,700,900&display=swap&subset=korean" rel="stylesheet">
<style>
body{padding:30px; background:#323333; background-image: linear-gradient(-45deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 44%, rgba(255, 255, 255, 0.2) 45%, rgba(255, 255, 255, 0.2) 55%, rgba(255, 255, 255, 0) 56%, rgba(255, 255, 255, 0) 100%);background-size: 6px 6px;background-repeat: repeat;}
body,table,tr,td,a{font-size:14px; color:#fff; font-family: 'Noto Sans KR', sans-serif; font-weight:400; }
hr{border:0px; border-top:0px solid #666;}
.btn_submit {border:0;background:#26AB55;color:#fff;cursor:pointer; border-radius:3px; width:100px; margin:0 auto; height:40px; line-height:40px; }
.btn_submit.re {background:#FFCD43; color:#000;}
.btn_submit:hover {background:#000}
.btn_submit.re:hover{color:#fff;}
.con_title div.highlight{display:inline-block;background:linear-gradient(to right,#2BC63E,#1553A3);-webkit-background-clip:text;-webkit-text-fill-color:transparent}	
</style>
<body oncontextmenu="return false">
	
	<?php if(!$_POST['install']){?>
	<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
		<input type="hidden" name="install" value=1>		
		<div style="width:500px; height:450px; position:absolute; top:0; right:0; bottom:0; left:0; margin:auto; border:0; text-align:center; ">
			<div class="con_title">
				<div class="highlight" style="font-family: 'Squada One', cursive; font-size:3em;">DAON THEME 5.5</div><br>
				<span>심플하지만 다 갖춘 다온테마<br>	
				</span>		
			</div><br>	

			<h2>다온테마 데모용 DB INSTALL</h1>
			<input type="checkbox" name="board" value="1" checked> 게시판생성<br><br>
			<button class="btn_submit" type="submit">INSTALL</button> <br><br><br>	
			<span style="color:#FFCD43;">아래 주의사항을 반드시 확인하세요!</span><br>
			<p style="font-size:0.85em; border:1px solid #666; padding:10px 10px; text-align:left; word-break: break-all;">
			1. 데모기준 게시판이 자동 생성됩니다.<br>
			2. 데모기준으로 게시판이 생성되므로 게시판 상세 설정은 직접 수정하셔야 합니다.<br>
			3. 게시판 자료는 포함되어 있지 않습니다.<br>
			4. DB INSTALL 메뉴가 필요치 않으시면 <?php echo G5_THEME_URL?>/admin_dt/theme.dt_admin.tail.php 에서 해당 버튼을 주석처리해 주세요.<br>
			</p>
			 <?php if($btn == true){?><a href="#none" onclick="self.close();">닫기</a><?php }?>
			<br>			
		</div>
	</form>
	<?php }else{?>

		<div style="width:500px; height:600px; position:absolute; top:0; right:0; bottom:0; left:0; margin:auto; border:0px solid #ddd; text-align:center;">
			<div class="con_title">
				<div class="highlight" style="font-family: 'Squada One', cursive; font-size:3em;">DAON THEME 5.5</div><br>
				<span>심플하지만 다 갖춘 다온테마<br>	
				</span>		
			</div><br>	

			<h2>다온테마 데모용 DB INSTALL 완료!</h1>			
			<span style="color:#FFCD43;">아래 메세지를 반드시 확인하세요!</span><br><br>			
			<div style="font-size:0.85em; border:1px solid #666; padding:10px 10px; text-align:left; height:310px; overflow:auto; word-break: break-word;">
		
<?php


if($_POST['install'] == 1){
	
if($_POST['board'] == 1){
	$board_arr = array(
		"event"	=> "이벤트",			
		"news"	=> "공지사항",	
		"qna"	=> "질문과답변",
		"review"	=> "포토리뷰",	
	);
	foreach($board_arr as $k => $v){	

		$sql = "insert into {$g5['board_table']} set  bo_table = '{$k}', bo_subject = '{$v}', ";
		if($k == "event"){
			$sql .= "bo_notice = '', bo_count_write = '', bo_count_comment = '0', gr_id = 'shop', bo_mobile_subject = '', bo_device = 'both', bo_admin = '', bo_list_level = '1', bo_read_level = '1', bo_write_level = '10', bo_reply_level = '10', bo_comment_level = '10', bo_html_level = '10', bo_link_level = '10', bo_count_modify = '1', bo_count_delete = '1', bo_upload_level = '10', bo_download_level = '10', bo_read_point = '0', bo_write_point = '0', bo_comment_point = '0', bo_download_point = '0', bo_use_category = '1', bo_category_list = '진행중 이벤트|종료된 이벤트|당첨자 발표', bo_use_sideview = '0', bo_use_file_content = '0', bo_use_secret = '0', bo_use_dhtml_editor = '1', bo_select_editor = '', bo_use_rss_view = '0', bo_use_good = '0', bo_use_nogood = '0', bo_use_name = '0', bo_use_signature = '0', bo_use_ip_view = '0', bo_use_list_view = '0', bo_use_list_file = '0', bo_use_list_content = '0', bo_use_email = '0', bo_use_cert = '', bo_use_sns = '0', bo_use_captcha = '0', bo_table_width = '100', bo_subject_len = '60', bo_mobile_subject_len = '30', bo_page_rows = '15', bo_mobile_page_rows = '15', bo_new = '24', bo_hot = '100', bo_image_width = '1350', bo_skin = 'theme/daon_event', bo_mobile_skin = 'gallery', bo_include_head = '_head.php', bo_include_tail = '_tail.php', bo_content_head = '', bo_content_tail = '', bo_mobile_content_head = '', bo_mobile_content_tail = '', bo_insert_content = '', bo_gallery_cols = '3', bo_gallery_width = '420', bo_gallery_height = '230', bo_mobile_gallery_width = '125', bo_mobile_gallery_height= '100', bo_upload_count = '2', bo_upload_size = '1048576', bo_reply_order = '1', bo_use_search = '0', bo_order = '0', bo_write_min = '0', bo_write_max = '0', bo_comment_min = '0', bo_comment_max = '0', bo_sort_field = '' ";
		}else if($k == "news"){
			$sql .= "bo_notice = '0', bo_count_write = '0', bo_count_comment = '0', gr_id = 'shop', bo_mobile_subject = '', bo_device = 'both', bo_admin = '', bo_list_level = '1', bo_read_level = '1', bo_write_level = '10', bo_reply_level = '10', bo_comment_level = '10', bo_html_level = '10', bo_link_level = '10', bo_count_modify = '1', bo_count_delete = '1', bo_upload_level = '10', bo_download_level = '10', bo_read_point = '0', bo_write_point = '0', bo_comment_point = '0', bo_download_point = '0', bo_use_category = '0', bo_category_list = '', bo_use_sideview = '0', bo_use_file_content = '0', bo_use_secret = '0', bo_use_dhtml_editor = '1', bo_select_editor = '', bo_use_rss_view = '0', bo_use_good = '0', bo_use_nogood = '0', bo_use_name = '0', bo_use_signature = '0', bo_use_ip_view = '0', bo_use_list_view = '0', bo_use_list_file = '0', bo_use_list_content = '0', bo_use_email = '0', bo_use_cert = '', bo_use_sns = '0', bo_use_captcha = '0', bo_table_width = '100', bo_subject_len = '60', bo_mobile_subject_len = '30', bo_page_rows = '15', bo_mobile_page_rows = '15', bo_new = '24', bo_hot = '100', bo_image_width = '1350', bo_skin = 'theme/daon_basic', bo_mobile_skin = 'basic', bo_include_head = '_head.php', bo_include_tail = '_tail.php', bo_content_head = '', bo_content_tail = '', bo_mobile_content_head = '', bo_mobile_content_tail = '', bo_insert_content = '', bo_gallery_cols = '4', bo_gallery_width = '202', bo_gallery_height = '150', bo_mobile_gallery_width = '125', bo_mobile_gallery_height= '100', bo_upload_count = '2', bo_upload_size = '1048576', bo_reply_order = '1', bo_use_search = '0', bo_order = '0', bo_write_min = '0', bo_write_max = '0', bo_comment_min = '0', bo_comment_max = '0', bo_sort_field = '' ";
		}else if($k == "qna"){
			$sql .= "bo_notice = '', bo_count_write = '0', bo_count_comment = '0', gr_id = 'shop', bo_mobile_subject = '', bo_device = 'both', bo_admin = '', bo_list_level = '1', bo_read_level = '1', bo_write_level = '10', bo_reply_level = '10', bo_comment_level = '10', bo_html_level = '10', bo_link_level = '10', bo_count_modify = '1', bo_count_delete = '1', bo_upload_level = '10', bo_download_level = '10', bo_read_point = '0', bo_write_point = '0', bo_comment_point = '0', bo_download_point = '0', bo_use_category = '1', bo_category_list = '상품문의|배송문의|교환문의|반품문의', bo_use_sideview = '0', bo_use_file_content = '0', bo_use_secret = '2', bo_use_dhtml_editor = '1', bo_select_editor = '', bo_use_rss_view = '0', bo_use_good = '0', bo_use_nogood = '0', bo_use_name = '0', bo_use_signature = '0', bo_use_ip_view = '0', bo_use_list_view = '0', bo_use_list_file = '0', bo_use_list_content = '0', bo_use_email = '0', bo_use_cert = '', bo_use_sns = '0', bo_use_captcha = '0', bo_table_width = '100', bo_subject_len = '60', bo_mobile_subject_len = '30', bo_page_rows = '15', bo_mobile_page_rows = '15', bo_new = '24', bo_hot = '100', bo_image_width = '1350', bo_skin = 'theme/daon_basic', bo_mobile_skin = 'basic', bo_include_head = '_head.php', bo_include_tail = '_tail.php', bo_content_head = '', bo_content_tail = '', bo_mobile_content_head = '', bo_mobile_content_tail = '', bo_insert_content = '', bo_gallery_cols = '4', bo_gallery_width = '202', bo_gallery_height = '150', bo_mobile_gallery_width = '125', bo_mobile_gallery_height= '100', bo_upload_count = '2', bo_upload_size = '1048576', bo_reply_order = '1', bo_use_search = '0', bo_order = '0', bo_write_min = '0', bo_write_max = '0', bo_comment_min = '0', bo_comment_max = '0', bo_sort_field = '' ";
		}else if($k == "review"){
			$sql .= "bo_notice = '', bo_count_write = '0', bo_count_comment = '0', gr_id = 'shop', bo_mobile_subject = '', bo_device = 'both', bo_admin = '', bo_list_level = '1', bo_read_level = '1', bo_write_level = '10', bo_reply_level = '10', bo_comment_level = '10', bo_html_level = '10', bo_link_level = '10', bo_count_modify = '1', bo_count_delete = '1', bo_upload_level = '10', bo_download_level = '10', bo_read_point = '0', bo_write_point = '0', bo_comment_point = '0', bo_download_point = '0', bo_use_category = '0', bo_category_list = '', bo_use_sideview = '0', bo_use_file_content = '0', bo_use_secret = '0', bo_use_dhtml_editor = '1', bo_select_editor = '', bo_use_rss_view = '0', bo_use_good = '0', bo_use_nogood = '0', bo_use_name = '0', bo_use_signature = '0', bo_use_ip_view = '0', bo_use_list_view = '0', bo_use_list_file = '0', bo_use_list_content = '0', bo_use_email = '0', bo_use_cert = '', bo_use_sns = '0', bo_use_captcha = '0', bo_table_width = '100', bo_subject_len = '60', bo_mobile_subject_len = '30', bo_page_rows = '15', bo_mobile_page_rows = '15', bo_new = '24', bo_hot = '100', bo_image_width = '1350', bo_skin = 'theme/daon_review', bo_mobile_skin = 'gallery', bo_include_head = '_head.php', bo_include_tail = '_tail.php', bo_content_head = '', bo_content_tail = '', bo_mobile_content_head = '', bo_mobile_content_tail = '', bo_insert_content = '', bo_gallery_cols = '3', bo_gallery_width = '420', bo_gallery_height = '230', bo_mobile_gallery_width = '125', bo_mobile_gallery_height= '100', bo_upload_count = '2', bo_upload_size = '1048576', bo_reply_order = '1', bo_use_search = '0', bo_order = '0', bo_write_min = '0', bo_write_max = '0', bo_comment_min = '0', bo_comment_max = '0', bo_sort_field = '' ";
		}
		
		$create_table = $g5['write_prefix'] . $k;
		$result  = sql_query("SHOW TABLES LIKE '{$create_table}' ");
		$co = sql_num_rows($result);
		$row = sql_fetch(" select count(*) as cnt from {$g5['board_table']} where bo_table = '{$k}' ");
		if ($row['cnt'] == 0 && $co == 0){		
			if(!sql_query($sql)){
				echo $k. " 게시판 INSTALL error ".sql_error_info();				
			}else{
				// 게시판 테이블 생성
				$file = file('../../../adm/sql_write.sql');
				$file = get_db_create_replace($file);
				$sqla = implode("\n", $file);		
				$source = array('/__TABLE_NAME__/', '/;/');
				$target = array($create_table, '');
				$sqla = preg_replace($source, $target, $sqla);
				sql_query($sqla, FALSE);
				$board_path = G5_DATA_PATH.'/file/'.$k;
				@mkdir($board_path, G5_DIR_PERMISSION);
				@chmod($board_path, G5_DIR_PERMISSION);
				echo "<b style='color:#FFCD43;'>".$k."_".$v." 게시판 생성완료!</b><hr>";
			}
		}else{
			echo $k."_".$v." 게시판이 존재하므로 생성하지 않았습니다.<hr>";
		}
	}

}
}

?>
		</div>
		<br>
		<?php if($btn == true){?><button class="btn_submit" type="button" onclick="self.close();">닫기</button> &nbsp; <?php }?><button class="btn_submit re" type="button" onclick="location.href='<?php $_SERVER['PHP_SELF']?>';">RE INSTALL</button><br>
		</div>
<script language='javascript'>
function noEvent() {
    if (event.keyCode == 116) {
        event.keyCode= 2;
        return false;
    }
    else if(event.ctrlKey && (event.keyCode==78 || event.keyCode == 82))
    {
        return false;
    }
}document.onkeydown = noEvent;
</script>
	<?php }?>

</body>
</html>