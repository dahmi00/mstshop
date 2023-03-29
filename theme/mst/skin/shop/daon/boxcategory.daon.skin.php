<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);

$mshop_categories = get_shop_category_array(true);


if($top_view_category){
	$top_v_c_arr = @explode("|",$top_view_category);
}else{
	foreach($mshop_categories as $cate1) {
		$row = $cate1['text'];
		$top_v_c_arr[] = $row['ca_id'];
	}
}
?>

<!-- 쇼핑몰 카테고리 시작 { -->

	<?php
	// 1단계 분류 판매 가능한 것만
	$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
	$i = 0;
	foreach($mshop_categories as $cate1) {
		if( empty($cate1) ) continue;

		$row = $cate1['text'];
		$gnb_zindex -= 1; // html 구조에서 앞선 gnb_1dli 에 더 높은 z-index 값 부여
		// 2단계 분류 판매 가능한 것만
		$count = ((int) count($cate1)) - 1;

		if(in_array($row['ca_id'], $top_v_c_arr)){ 
	?>
	<li >
		<a href="<?php echo $row['url']; ?>" ><?php echo $row['ca_name']; ?><?php if ($count && $top_2nd == true) echo '<i class="fa fa-angle-right" aria-hidden="true"></i>'; ?></a>
		<?php
		$j=0;
		foreach($cate1 as $key=>$cate2) {
		if( empty($cate2) || $key === 'text' ) continue;
		
		$row2 = $cate2['text'];
		
		if($top_2nd == true){
		if ($j==0) echo '<ul class="ul_2nd">';
		?>
			<li>
				<a href="<?php echo $row2['url']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $row2['ca_name']; ?></a>
				
				<?php			
					// 3단계 분류 판매 가능한 것만
					$sql3 = " select ca_id, ca_name from {$g5['g5_shop_category_table']} where LENGTH(ca_id) = '6' and SUBSTRING(ca_id,1,4) = '{$row2['ca_id']}' and ca_use = '1' order by ca_order, ca_id ";
					$result3 = sql_query($sql3);
					$count = sql_num_rows($result3);
					

					for ($k=0; $row3=sql_fetch_array($result3); $k++)	{

					
						if($top_3rd == true){
						if ($k==0) echo '<ul class="ul_3rd" style="display: none;">';
					
					?>
						<li>
							<a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=<?php echo $row3['ca_id']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $row3['ca_name']; ?></a>

							<?php				
							// 4단계 분류 판매 가능한 것만
							$sql4 = " select ca_id, ca_name from {$g5['g5_shop_category_table']} where LENGTH(ca_id) = '8' and SUBSTRING(ca_id,1,6) = '{$row3['ca_id']}' and ca_use = '1' order by ca_order, ca_id ";
							$result4 = sql_query($sql4);
							$count = sql_num_rows($result4);

								for ($l=0; $row4=sql_fetch_array($result4); $l++){

									if($top_4th == true){
									if ($l==0) echo '<ul class="ul_4th" style="display: none;">';

							?>
									<li>
										<a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=<?php echo $row4['ca_id']; ?>" ><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $row4['ca_name']; ?></a>							
									</li>

							<?php }
								}

								if ($l>0 && $top_4th == true) echo '</ul>';

								?>
						</li>
				<?php	
					}
					}

					if ($k>0 && $top_3rd == true) echo '</ul>';
					
				?>
			
			</li>
		<?php $j++; }   //end for

		}

		if ($j>0 && $top_2nd == true) echo '</ul>';
	
		?>
	</li>
	<?php }
	$i++;	}//end for ?>
    
<!-- } 쇼핑몰 카테고리 끝 -->