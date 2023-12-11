<!-- footer -->
<script type="text/javascript">

$(document).ready(function() {
	var btn_affiliate = $(".btn_affiliate");
	
	btn_affiliate.bind("click",function(){ 				// 셀렉트 박스 열고 닫기
		btn_affiliate.attr("aria-expanded","true");		
		$(window).bind("click",function(){ 					// 셀렉트 박스가 선택되면 모든 윈도우에 이벤트 추가
			btn_affiliate.attr("aria-expanded","false");				// 모든윈도우가 클릭되면 옵션 박스 의 on 삭제
			$(window).unbind("click");							// 윈도우의 클릭이벤트 삭제
		});
		return false;
	});
	
	$(".affiliate_item").click(function(){
		$(".btn_affiliate").attr('aria-expanded', 'false');
	});
});

</script>

<footer>
	<div class="footer_wrap">
		<strong class="footer_logo"><span class="blind">NAVER</span></strong>
		<ul class="footer_menu">
			<li>
				<a href="" class="footer_menu_item">제휴제안</a>
			</li>
			<li>
				<a href="" class="footer_menu_item">기업윤리 상담센터</a>
			</li>
			<li>
				<a href="" class="footer_menu_item" style="font-weight: bold;">개인정보 처리방침</a>
			</li>
		</ul>
		<p class="footer_copy"><strong>NAVER Corp.</strong></p>
	</div>
</footer>
		<!-- //footer -->
	</div>
</body>
</html>