/*****************************************************************

		Copyright C 다온테마 All rights reserved. 
		daontheme@daum.net
		본 페이지는 유료컨텐츠 다온테마용 JS입니다. 불법복제시 법적인 제제를 받으실 수 있습니다. 
		라이센스를 삭제하지 마세요. 라이센스 삭제시 불법 사용으로 간주될 수 있습니다.

		아래 내용을 수정/삭제 하지 마세요.

******************************************************************/

function main_lnb_fix(){
	var position = $(window).scrollTop();
	var index_po = $("#index_con").offset().top;
	/*
	if(position > 150){
		$("#hd_menu").addClass("jbFixed");
	}else if(position < 150){
		$("#hd_menu").removeClass("jbFixed");
	}
	*/

	if(position > index_po){
		$("#hd_menu").addClass("jbFixed");
		$(".hd_menu_category").addClass("index"); 
	}else if(position < index_po){
		$("#hd_menu").removeClass("jbFixed");
		$(".hd_menu_category").removeClass("index"); 
	}
	
}
$(document).ready(function() {
	main_lnb_fix();
});
$(window).scroll(function() {
	main_lnb_fix();
});


$(document).on('hover', '.plista .sct_img', function(){
	$(this).find('.pi_ua').fadeIn();
});

$(document).on('mouseleave', '.plista', function(){
	$(".pi_ua").fadeOut();
});


 $(document).ready(function(){	
	speed= 500;

	 $('.ul_1st li').bind('mouseenter',function(){	
		$(this).find('.ul_2nd').stop(true,true).fadeIn(speed);
		$(this).addClass('active'); 
	 }).bind('mouseleave',function(){
		$(this).find('.ul_2nd').stop(true,true).fadeOut(speed);
		$(this).removeClass('active'); 
	 });


	  $('.ul_2nd li').bind('mouseenter',function(){	
		$(this).find('.ul_3rd').stop(true,true).fadeIn(speed);
		$(this).addClass('active'); 

	 }).bind('mouseleave',function(){
		$(this).find('.ul_3rd').stop(true,true).fadeOut(speed);
		$(this).removeClass('active'); 

	 });

	   $('.ul_3rd li').bind('mouseenter',function(){	
		$(this).find('.ul_4th').stop(true,true).fadeIn(speed);
		$(this).addClass('active'); 

	 }).bind('mouseleave',function(){
		$(this).find('.ul_4th').stop(true,true).fadeOut(speed);
		$(this).removeClass('active'); 

	 });

});


$(window).scroll(function(){ if($(this).scrollTop() != 0){$('#backtotop').fadeIn(); }else{$('#backtotop').fadeOut(); }});$('#backtotop').click(function() {$('body,html').animate({scrollTop:0},800);});$('div.select_bo_cate a.sel').click(function () {if($(this).siblings('ul').css("display") == "none"){$(this).siblings('ul').animate({"height":"show"},300);} else {$(this).siblings('ul').animate({"height":"hide"},300);}});function getCookie(e){e+="=";var n=document.cookie,i=n.indexOf(e),t="";if(-1!=i){i+=e.length;var o=n.indexOf(";",i);-1==o&&(o=n.length),t=n.substring(i,o)}return unescape(t)}$("#favorite").click(function(){var i=window.location.href,r=document.title,a=!1;if(window.sidebar&&window.sidebar.addPanel)window.sidebar.addPanel(r,i,"");else if(window.sidebar&&-1<navigator.userAgent.toLowerCase().indexOf("firefox")||window.opera&&window.print){var t=$(this);t.attr("href",i),t.attr("title",r),t.attr("rel","sidebar"),t.off(e),a=!0}else window.external&&"AddFavorite"in window.external?window.external.AddFavorite(i,r):alert((-1!=navigator.userAgent.toLowerCase().indexOf("mac")?"Cmd":"Ctrl")+"+D 키를 눌러 즐겨찾기에 등록하실 수 있습니다.");return a});function dtls(){var dtl1 = "da_";var dtl2 = "o_"; var dtl3 = "t_";var dtl4 = "m"; return dtl1+dtl2+dtl3+dtl4;}var pathname_ostr = window.location.href;var pathname_str = pathname_ostr.replace(g5_url+"/", ''); var dt_val = getCookie('dt');if(pathname_str == "" || pathname_str.match(/^index/)){document.write("<div style='display:none !important;'><span style='font-size:0px !important; height:0px !important; line-height:0px !important;'>"+dtls()+"</span></div>");}function setCookie(e,o,t){var i=new Date;i.setDate(i.getDate()+t),cookies=e+"="+escape(o)+"; path=/ ",void 0!==t&&(cookies+=";expires="+i.toGMTString()+";"),document.cookie=cookies} if(dt_val == ""){setCookie('dt','dt',7300);}function scrollToBottom(){$("html, body").animate({scrollTop:$(document).height()},"slow")}function scrollToTop(){$("html, body").animate({scrollTop:0},"slow")}$(".plist img").hover(function() {$(this).next().fadeIn(500);});$(".plist").mouseleave(function() {$(".pi_u").fadeOut(500);});