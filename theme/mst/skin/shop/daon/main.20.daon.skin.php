<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);
add_javascript('<script src="'.G5_THEME_JS_URL.'/theme.shop.list.js"></script>', 10);
global $_OS_;
/*
상품리스트가 일정 시간마다 위로 롤링되는 스킨
롤링되기 위해서는 상품이 2줄 이상이어야 함
*/

global $list_mod_re; 
if($list_mod_re) $this->list_mod = $list_mod_re;
?>

<!-- 이전 재생 정지 다음 버튼 시작 { -->
<ul id="btn_smt_<?php echo $this->type; ?>" class="sctrl">
    <li><button type="button" class="sctrl_play">효과재생<span></span></button></li>
    <li><button type="button" class="sctrl_stop">효과정지<span></span></button></li>
</ul>
<!-- } 이전 재생 정지 다음 버튼 끝 -->

<!-- 상품진열 20 시작 { -->
<?php
$i=0;
foreach((array) $list as $row){

    if( empty($row) ) continue;
    $i++;

    $sct_last = '';
    $item_link_href = shop_item_url($row['it_id']);
    $star_score = $row['it_use_avg'] ? (int) get_star($row['it_use_avg']) : '';
	$is_soldout = is_soldout($row['it_id'], true);   // 품절인지 체크

    if($i>1 && $i%$this->list_mod == 0)
        $sct_last = ' sct_last'; // 줄 마지막

    if ($i == 1) {
        if ($this->css) {
            echo "<div id=\"smt_{$this->type}\" class=\"{$this->css}\">\n";
        } else {
            echo "<div id=\"smt_{$this->type}\" class=\"sct smt_20\">\n";
        }
        echo "<ul class=\"sct_ul sct_ul_first\">\n";
    }

    if ($i>1 && $i%$this->list_mod == 1) {
        echo "</ul>\n";
        echo "<ul class=\"sct_ul\">\n";
    }

    echo "<li class=\"sct_li{$sct_last} plista\">";

    if ($this->href) {
        echo "<div class=\"sct_img\"><a href=\"{$item_link_href}\" class=\"sct_a\">\n";
    }

    if ($this->view_it_img) {
        echo get_it_image($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
    }

	  if ($this->href) {
        echo "</a>\n";
    }
	if($_OS_ == 'pc'){
?>
	<div class="pi_ua" style="display:none; position:absolute; top:0; width:<?php echo $this->img_width?>px; height:<?php echo $this->img_height?>px;padding:0;" onclick="location.href='<?php echo $item_link_href;?>';">			
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
	if ($this->view_sns) echo "<button type=\"button\" class=\"btn_share20\"><span >공유하기</span><i class=\"fa fa-share-alt\" aria-hidden=\"true\"></i></button>\n";
	
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
		echo "<button type=\"button\" class=\"sct_sns_cls20\"><span class=\"sound_only\">닫기</span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></button>";
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
	
    echo "</li>\n";
}

if ($i >= 1) {
    echo "</ul>\n";
    echo "</div>\n";
}

if($i == 0) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
?>

<?php 


	if ($this->view_sns) {
	echo "<div class=\"sct_sns_wrap20\">";
	
		$sns_top = $this->img_height + 10;
		$sns_url  = $item_link_href;
		$sns_title = get_text($row['it_name']).' | '.get_text($config['cf_title']);
		echo "<div class=\"sct_sns\">";		
		echo "</div>\n";
	
	echo "<div class=\" sct_sns_bg20\"></div>";
	echo "</div>";

	}

?>

<script>
//SNS 공유
$(function (){
	$(".btn_share20").on("click", function() {
		var share30_html = $(this).parent("div").children(".sct_sns30").html();
		$('.sct_sns_wrap20 .sct_sns').html(share30_html);
		$('.sct_sns_wrap20').fadeIn();
	});
	$(document).on('click', '.sct_sns_bg20, .sct_sns_cls20', function(){  
	    $('.sct_sns_wrap20').fadeOut();
	});
	$(document).on('click', '.sct_sns_wrap20 .sct_sns a', function(){  
	    $('.sct_sns_wrap20').fadeOut();
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


<script>
(function($) {
    var intervals = {};

    var methods = {
        init: function(option)
        {
            if(this.length < 1)
                return false;

            var $smt = this.find("ul.sct_ul");
            var $smt_a = $smt.find("a");
            var height = 0;
            var count = $smt.length;
            var c_idx = o_idx = 0;
            var fx = null;
            var el_id = this[0].id;

            $smt.each(function() {
                var h = $(this).outerHeight(true);
                if(h > height)
                    height = h;
            });
		
			//height = height/2;

            $smt.each(function(index) {
                if($(this).is(":visible")) {
                    o_idx = index;
                    return false;
                }
            });

            this.height(height);
            $smt.eq(o_idx).siblings().css("top", height+"px");

            // 기본 설정값
            var settings = $.extend({
                interval: 5000,
                duration: 800
            }, option);

            if(count < 2)
                return;

            set_interval();

            $smt.hover(
                function() {
                    clear_interval();
                },
                function() {
                    set_interval();
                }
            );

            $smt_a.on("focusin", function() {
                clear_interval();
            });

            $smt_a.on("focusout", function() {
                set_interval();
            });

            function top_rolling() {
                $smt.each(function(index) {
                    if($(this).is(":visible")) {
                        o_idx = index;
                        return false;
                    }
                });

                $smt.eq(o_idx).animate(
                    { top: "-="+height+"px" }, settings.duration,
                    function() {
                        $(this).css("display", "none").css("top", height+"px");
                    }
                );

                c_idx = (o_idx + 1) % count;

                $smt.eq(c_idx).css("display", "block").animate(
                    { top: "-="+height+"px" }, settings.duration,
                    function() {
                        o_idx = c_idx;
                    }
                );
            }

            function set_interval() {
                if(count > 1) {
                    clear_interval();

                    if($("#btn_"+el_id).find("button.sctrl_stop").data("stop") == true)
                        return;

                    intervals[el_id] = setInterval(top_rolling, settings.interval);

                    // control 버튼 class
                    $("#btn_"+el_id).find("button span").removeClass("sctrl_on").html("")
                        .end().find("button.sctrl_play span").addClass("sctrl_on").html("<b class=\"sound_only\">선택됨</b>");
                }
            }

            function clear_interval() {
                if(intervals[el_id]) {
                    clearInterval(intervals[el_id]);

                    // control 버튼 class
                    $("#btn_"+el_id).find("button span").removeClass("sctrl_on").html("")
                        .end().find("button.sctrl_stop span").addClass("sctrl_on").html("<b class=\"sound_only\">선택됨</b>");
                }
            }
        },
        stop: function()
        {
            var el_id = this[0].id;
            if(intervals[el_id])
                clearInterval(intervals[el_id]);
        }
    };

    $.fn.topRolling = function(option) {
        if (methods[option])
            return methods[option].apply(this, Array.prototype.slice.call(arguments, 1));
        else
            return methods.init.apply(this, arguments);
    }
}(jQuery));

$(function() {
    $("#smt_<?php echo $this->type; ?>").topRolling();
    // 기본 설정값을 변경하려면 아래처럼 사용
    //$("#smt_<?php echo $this->type; ?>").topRolling({ interval: 2000, duration: 800 });

    // 애니메이션 play
    $("#btn_smt_<?php echo $this->type; ?> button.sctrl_play").on("click", function() {
        $("#btn_smt_<?php echo $this->type; ?> button.sctrl_stop").data("stop", false);

        var id = $(this).closest(".sctrl").attr("id").replace("btn_", "");
        $("#"+id).topRolling();
        //$("#"+id).topRolling({ interval: 2000, duration: 800 });
    });

    // 애니메이션 stop
    $("#btn_smt_<?php echo $this->type; ?> button.sctrl_stop").on("click", function() {
        if($(this).parent().siblings().find(".sctrl_on").length > 0) {
            $(this).parent().siblings().find("span").removeClass("sctrl_on").html("");
            $(this).children().addClass("sctrl_on").html("<b class=\"sound_only\">선택됨</b>");
            var id = $(this).closest(".sctrl").attr("id").replace("btn_", "");
            $("#"+id).topRolling("stop");

            $(this).data("stop", true);
        }
    });
});
</script>


<!-- } 상품진열 20 끝 -->