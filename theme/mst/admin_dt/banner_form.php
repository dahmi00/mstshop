<?php
/*
	다온테마전용 배너설정
	이 페이지를 수정,삭제 하지 마십시오. 수정,삭제시 발생하는 오류는 무료지원 대상이 아닙니다.
*/
include_once('./_common.php');
include_once('./banner_config.php');

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');

$bn_id = isset($_REQUEST['bn_id']) ? preg_replace('/[^0-9]/', '', $_REQUEST['bn_id']) : 0;
$bn = array(
'bn_id'=>0,
'bn_alt'=>'',
'bn_device'=>'',
'bn_position'=>'',
'bn_border'=>'',
'bn_new_win'=>'',
'bn_order'=>''
);

$html_title = '배너';
$g5['title'] = $html_title.'관리';

if ($w=="u")
{
    $html_title .= ' 수정';
    $sql = " select * from {$g5['g5_shop_banner_table']}_daontheme where bn_id = '$bn_id' ";
    $bn = sql_fetch($sql);
}
else
{
    $html_title .= ' 입력';
    $bn['bn_url']        = "http://";
    $bn['bn_begin_time'] = date("Y-m-d 00:00:00", time());
    $bn['bn_end_time']   = date("Y-m-d 00:00:00", time()+(60*60*24*31));
}

// 접속기기 필드 추가
if(!sql_query(" select bn_device from {$g5['g5_shop_banner_table']}_daontheme limit 0, 1 ")) {
    sql_query(" ALTER TABLE `{$g5['g5_shop_banner_table']}_daontheme`
                    ADD `bn_device` varchar(10) not null default '' AFTER `bn_url` ", true);
    sql_query(" update {$g5['g5_shop_banner_table']}_daontheme set bn_device = 'pc' ", true);
}


$g5['title'] = "테마전용 배너설정";
include_once(G5_PATH.'/head.sub.php');

$colspan = 7;

?>
<link rel="stylesheet" href="./admin.css">
<style type="text/css" title="">
	.d3_list, .d3_sub_div{margin:5px 0px;}
	.fa{cursor:pointer;font-size:12pt;}
</style>

<div id="wrapper" >
    <div id="container" class="" >
        <h1 id="container_title">테마전용 배너설정</h1>
        <div class="container_wr" >		

			<form name="fbanner" action="./banner_formupdate.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="w" value="<?php echo $w; ?>">
			<input type="hidden" name="bn_id" value="<?php echo $bn_id; ?>">

			<div class="tbl_frm01 tbl_wrap">
				<table>
				<caption><?php echo $g5['title']; ?></caption>
				<colgroup>
					<col class="grid_4">
					<col>
				</colgroup>
				<tbody>
				<tr>
					<th scope="row">이미지</th>
					<td>
						<input type="file" name="bn_bimg">
						<?php
						$bimg_str = "";
						$bimg = G5_DATA_PATH."/banner_dt/{$bn['bn_id']}";
						if (file_exists($bimg) && $bn['bn_id']) {
							$size = @getimagesize($bimg);
							if($size[0] && $size[0] > 750)
								$width = 750;
							else
								$width = $size[0];

							echo '<input type="checkbox" name="bn_bimg_del" value="1" id="bn_bimg_del"> <label for="bn_bimg_del">삭제</label>';
							echo "<br><br><strong style='font-size:1.3em;'>등록된 배너 크기 : 가로 ".$size[0]."px × 세로 ".$size[1]."px (배너에 따라 세로 사이즈는 가변적이어도 됩니다.)</strong><br>";
							$bimg_str = '<img src="'.G5_DATA_URL.'/banner_dt/'.$bn['bn_id'].'?'.preg_replace('/[^0-9]/i', '', $bn['bn_time']).'" width="'.$width.'">';
						}else{
							if($w == "u"){

								$bimga = G5_THEME_PATH.'/admin_dt/banner_img/'.$bn['bn_id'];
								$size = @getimagesize($bimga);
								if($size[0] && $size[0] > 1200)
									$width = 1200;
								else
									$width = $size[0];
																
								echo '새로 등록할 이미지 파일을 선택해 주세요.';
								echo "<br><br><strong style='font-size:1.3em;'>등록된 배너 크기 : 가로 ".$size[0]."px × 세로 ".$size[1]."px (배너에 따라 세로 사이즈는 가변적이어도 됩니다.)</strong><br>";
								$bimg_str = '<img src="'.G5_THEME_URL.'/admin_dt/banner_img/'.$bn['bn_id'].'?'.preg_replace('/[^0-9]/i', '', $bn['bn_time']).'" width="'.$width.'">';
							}
						}
						if ($bimg_str) {
							echo '<div class="banner_or_img">';
							echo $bimg_str;
							echo '</div>';
						}
						?>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_alt">이미지 설명</label></th>
					<td>
						<?php echo help("img 태그의 alt, title 에 해당되는 내용입니다.\n배너에 마우스를 오버하면 이미지의 설명이 나옵니다."); ?>
						<input type="text" name="bn_alt" value="<?php echo get_text($bn['bn_alt']); ?>" id="bn_alt" class="frm_input" size="80">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_url">링크</label></th>
					<td>
						<?php echo help("배너클릭시 이동하는 주소입니다."); ?>
						<input type="text" name="bn_url" size="80" value="<?php echo get_sanitize_input($bn['bn_url']); ?>" id="bn_url" class="frm_input">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_device">접속기기</label></th>
					<td>
						<div style="margin:auto; border:0; text-align:left; color:red; font-weight:bold;">
							★주의사항★  탑배너와 메인 배너는 PC용과 모바일용을 구분하여 각각 등록해야 합니다.
						</div>
						<?php echo help('배너를 표시할 접속기기를 선택합니다.'); ?>
						<select name="bn_device" id="bn_device">
							<option value="both"<?php echo get_selected($bn['bn_device'], 'both', true); ?>>PC와 모바일</option>
							<option value="pc"<?php echo get_selected($bn['bn_device'], 'pc'); ?>>PC</option>
							<option value="mobile"<?php echo get_selected($bn['bn_device'], 'mobile'); ?>>모바일</option>
					</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_position">출력위치</label></th>
					<td>						
						<select name="bn_position" id="bn_position">	
							<option value="<?php echo $dt_banner_prefix?>메인" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'메인'); ?>><?php echo $dt_banner_prefix?>메인</option>
							<option value="<?php echo $dt_banner_prefix?>탑배너" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'탑배너'); ?>><?php echo $dt_banner_prefix?>탑배너</option>
							<option value="<?php echo $dt_banner_prefix?>배너슬라이드" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너슬라이드'); ?>><?php echo $dt_banner_prefix?>배너슬라이드</option>
							<option value="<?php echo $dt_banner_prefix?>배너1" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너1'); ?>><?php echo $dt_banner_prefix?>배너1</option>
							<option value="<?php echo $dt_banner_prefix?>배너2" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너2'); ?>><?php echo $dt_banner_prefix?>배너2</option>
							<option value="<?php echo $dt_banner_prefix?>배너3" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너3'); ?>><?php echo $dt_banner_prefix?>배너3</option>							
							<option value="<?php echo $dt_banner_prefix?>배너4" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너4'); ?>><?php echo $dt_banner_prefix?>배너4</option>
							<option value="<?php echo $dt_banner_prefix?>배너5" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너5'); ?>><?php echo $dt_banner_prefix?>배너5</option>
							<option value="<?php echo $dt_banner_prefix?>배너6" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너6'); ?>><?php echo $dt_banner_prefix?>배너6</option>
							<option value="<?php echo $dt_banner_prefix?>배너7" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너7'); ?>><?php echo $dt_banner_prefix?>배너7</option>
							<option value="<?php echo $dt_banner_prefix?>배너8" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너8'); ?>><?php echo $dt_banner_prefix?>배너8</option>
							<option value="<?php echo $dt_banner_prefix?>배너9" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너9'); ?>><?php echo $dt_banner_prefix?>배너9</option>
							<option value="<?php echo $dt_banner_prefix?>배너10" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너10'); ?>><?php echo $dt_banner_prefix?>배너10</option>
							<option value="<?php echo $dt_banner_prefix?>배너11" <?php echo get_selected($bn['bn_position'], $dt_banner_prefix.'배너11'); ?>><?php echo $dt_banner_prefix?>배너11</option>	
					</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_border">테두리</label></th>
					<td>
						 <?php echo help("배너이미지에 테두리를 넣을지를 설정합니다.", 50); ?>
						<select name="bn_border" id="bn_border">
							<option value="0" <?php echo get_selected($bn['bn_border'], 0); ?>>사용안함</option>
							<option value="1" <?php echo get_selected($bn['bn_border'], 1); ?>>사용</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_new_win">새창</label></th>
					<td>
						<?php echo help("배너클릭시 새창을 띄울지를 설정합니다.", 50); ?>
						<select name="bn_new_win" id="bn_new_win">
							<option value="0" <?php echo get_selected($bn['bn_new_win'], 0); ?>>사용안함</option>
							<option value="1" <?php echo get_selected($bn['bn_new_win'], 1); ?>>사용</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_begin_time">시작일시</label></th>
					<td>
						<?php echo help("배너 게시 시작일시를 설정합니다.  시작일시가 지나야 배너가 출력됩니다."); ?>
						<input type="text" name="bn_begin_time" value="<?php echo $bn['bn_begin_time']; ?>" id="bn_begin_time" class="frm_input"  size="21" maxlength="19">
						<input type="checkbox" name="bn_begin_chk" value="<?php echo date("Y-m-d 00:00:00", time()); ?>" id="bn_begin_chk" onclick="if (this.checked == true) this.form.bn_begin_time.value=this.form.bn_begin_chk.value; else this.form.bn_begin_time.value = this.form.bn_begin_time.defaultValue;">
						<label for="bn_begin_chk">오늘</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_end_time">종료일시</label></th>
					<td>
						<?php echo help("배너 게시 종료일시를 설정합니다. 종료일시가 지나면 배너가 출력되지 않습니다."); ?>
						<input type="text" name="bn_end_time" value="<?php echo $bn['bn_end_time']; ?>" id="bn_end_time" class="frm_input" size=21 maxlength=19>
						<input type="checkbox" name="bn_end_chk" value="<?php echo date("Y-m-d 23:59:59", time()+60*60*24*31); ?>" id="bn_end_chk" onclick="if (this.checked == true) this.form.bn_end_time.value=this.form.bn_end_chk.value; else this.form.bn_end_time.value = this.form.bn_end_time.defaultValue;">
						<label for="bn_end_chk">오늘+31일</label>
						&nbsp;&nbsp;
						<input type="checkbox" name="bn_end_chk1" value="<?php echo date("2099-m-d 23:59:59"); ?>" id="bn_end_chk1" onclick="if (this.checked == true) this.form.bn_end_time.value=this.form.bn_end_chk1.value; else this.form.bn_end_time.value = this.form.bn_end_time.defaultValue;">
						<label for="bn_end_chk1">종료없음</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="bn_order">출력 순서</label></th>
					<td>
					   <?php echo help("배너를 출력할 때 순서를 정합니다. 숫자가 작을수록 먼저 출력됩니다."); ?>
					   <?php echo order_select("bn_order", $bn['bn_order']); ?>
					</td>
				</tr>
				</tbody>
				</table>
			</div>

			<div class="btn_fixed_top">
				<a href="./banner_list.php?bn_position=<?php echo $bn_position; ?>&amp;bn_device=<?php echo $bn_device; ?>&amp;bn_time=<?php echo $bn_time; ?>&amp;page=<?php echo $page; ?>" class="btn_02 btn">목록</a>
				<input type="submit" value="확인" class="btn_submit btn" accesskey="s">
			</div>

			</form>


		</div>
	</div>
</div>



<?php
include_once(G5_PATH.'/tail.sub.php');
