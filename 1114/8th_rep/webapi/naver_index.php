<?php
 include $_SERVER['DOCUMENT_ROOT']."/webapi/naver_header.php";
?>

<script type="text/javascript">

$(document).ready(function(){
	$('.gnb_menu').delegate('.gnb_menu_list', 'mouseenter', function(){
		$(this).find('.gnb_dropMenu_wrap').stop().slideDown(500);
	});
	$('.gnb_menu').delegate('.gnb_menu_list', 'focusin', function(){
		$(this).find('.gnb_dropMenu_wrap').stop().slideDown(500);
	});
	$('.gnb_menu').delegate('.gnb_menu_list', 'mouseleave', function(){
		$(this).find('.gnb_dropMenu_wrap').stop().slideUp(250);
	});
	$('.gnb_menu').delegate('.gnb_menu_list', 'focusout', function(){
		$(this).find('.gnb_dropMenu_wrap').stop().slideUp(250);
	});
	
	$('.btn_sitemap').click(function() {
		$(this).attr("aria-expanded", true);
		$('header').toggleClass('active');
		$('body').toggleClass('hidden');
	});
	
	
	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = $('header').outerHeight();
	
	$(window).scroll(function(event){
	    didScroll = true;
	});
	setInterval(function(){
	    if(didScroll){
	        hasScrolled();
	        didScroll = false;
	    }
	}, 250);
	function hasScrolled(){
	    var st = $(this).scrollTop();
	
	    if(Math.abs(lastScrollTop - st) <= delta)
	    return;
	    if(st > lastScrollTop && st > navbarHeight){
	        $('header').removeClass('header_down').addClass('header_up');
	    }else{
	        if(st + $(window).height() < $(document).height()){
	            $('header').removeClass('header_up').addClass('header_down');
	        }
	    }
	    lastScrollTop = st;
	}
});

</script>

		<div class="sitemap_dimmed"></div>
		<!-- Contents -->
<script type="text/javascript" src="https://navercorp.com/js/swiper.min.js"></script>
<script type="text/javascript">

	$(function () {

		var slideCount = 6;
		var startIdx = Math.floor(Math.random() * slideCount);
		$(".slide_paging .current").empty().html(startIdx + 1);

		var mainSwiper = new Swiper('.main_slide', {
			initialSlide : startIdx,
			effect: 'slide', // 'slide'(default), 'fade'
			autoplay: {
				delay: 5000,
				disableOnInteraction: false, //사용자 상호 작용 후 자동 재생이 중지되지 않으며 매회 다시 시작
			},
			speed: 1000,
			fadeEffect: {
				crossFade: true //이펙트가 'fade'일 경우
			},
			loop: true,
			setWrapperSize: true, //모든 슬라이드의 총 너비/높이 설정
			navigation: {
				prevEl : '.btn_prev',
				nextEl : '.btn_next',
			},
			threshold: 300 // 임계값이 300이상일 때만 스와이퍼 작동
		});

		showSlideInfo(startIdx);
		mainSwiper.autoplay.start(); //자동 재생 시작

		//현재 슬라이드에 맞춰 .slide_info_container 변화
		mainSwiper.on('slideChangeTransitionStart', function() {
			var targetIdx = parseInt($('.swiper-slide-active').attr('data-index'));
			showSlideInfo(targetIdx);
		});

	});

	function showSlideInfo(targetIdx) {
		$(".slide_info_container a").hide();
		$(".slide_info_container a").eq(targetIdx).fadeIn(700);
		$(".current").text(targetIdx + 1); //현재 슬라이드 페이지
		var progress = (targetIdx + 1) * 18;
		$(".fill").css("width", progress+"%"); //현재 슬라이드 진행바
	}

	// 최신보도자료 view
	function recentPressView(id) {
		var form = document.getElementById("recentPressForm");
		var url = "https://navercorp.com/promotion/pressReleasesView/" + id;
		form.elements["seq"].value = id;
		form.action = url;
		form.submit();
	}

</script>

<div class="container" role="main">
	<!-- [D] 슬라이드 영역 -->

	<div class="main_content">
		<form id="recentPressForm" method="post">
			<input type="hidden" name="seq" value="0" />
		</form>

		<div class="content_service">
			<ul class="service_list_container">
				<!-- [D] 리스트 순차 노출 1st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content13.png);">
					<a href="https://www.naverlabs.com/nrobot" class="thumbnail_dimmed" target="_blank">
						<dl>
							<dt>N 로봇</dt>
							<dd>가장 최신의 로봇 기술, 네이버 로봇</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 2st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content14.png);">
					<a href="https://clovanote.naver.com/" class="thumbnail_dimmed" target="_blank">
						<dl>
							<dt>클로바노트</dt>
							<dd>눈으로 보며 듣는 음성 기록</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 3st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content15.png);">
					<a href="https://m.post.naver.com/viewer/postView.naver?volumeNo=32134415&memberNo=30633733" class="thumbnail_dimmed" target="_blank">
						<dl>
							<dt>네이버 페이 앱</dt>
							<dd>현장결제, 멤버십적립, 송금까지 한번에</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 4st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content4.png);">
					<a href="https://whale.naver.com/ko/" class="thumbnail_dimmed" target="_blank">
						<dl>
							<dt>네이버 웨일</dt>
							<dd>인터넷의 새로운 시작</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 5st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content18.png);">
					<a href="https://naver.worksmobile.com/" class="thumbnail_dimmed" target="_blank">
						<dl>
							<dt>네이버웍스</dt>
							<dd>네이버웍스는 비즈니스 커뮤니케이션을 넓힙니다.</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 6st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content19.png);">
					<a href="https://www.navercloudcorp.com/" class="thumbnail_dimmed" target="_blank">
						<dl>
							<dt>네이버클라우드</dt>
							<dd>모든 비즈니스를 가능하게 하는 네이버클라우드</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 7st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content7.png);">
					<a href="https://webtoonscorp.com/" class="thumbnail_dimmed" target="_blank">
						<dl>
							<dt>네이버 웹툰</dt>
							<dd>매일매일 새로운 재미</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 8st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content8.png);">
					<a href="/value/projectFlower" class="thumbnail_dimmed">
						<dl>
							<dt>프로젝트 꽃</dt>
							<dd>가치의 발견과 성장</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 9st -->
				<li class="service_thumbnail_box" style="background-image: url(https://navercorp.com/img/ko/main/img_main_content17.png);">
					<a href="https://navernow.onelink.me/o5cK/6fmlycyl" class="thumbnail_dimmed" target="_blank">
						<dl>
							<dt>NOW</dt>
							<dd>We Live NOW</dd>
						</dl>
					</a>
				</li>
			</ul>
		</div>

		<div class="content_support">
			<!-- [D] 리스트 순차 노출 1st -->
			<div class="support_info_top">
				<h3 class="support_title">기술로 다양성을 꽃피우는 플랫폼</h3>
				<p class="support_text">개인의 다양한 가능성이 의미있는 성공으로 꽃 피울 수 있도록<br>네이버가 서비스와 기술플랫폼을 통해 더 가까이 서포트(SUPPORT) 합니다.</p>
			</div>
			<ul class="support_list_container">
				<!-- [D] 리스트 순차 노출 2st -->
				<li class="support_list_box">
					<a href="https://navercorp.com/service/creators" class="creators">
						<dl>
							<dt>Creators With NAVER</dt>
							<dd><span class="text_line">개성과 실력 있는 창작자들이 그들의 이름으로</span>가치를 인정받을 수 있도록 지원합니다.</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 3st -->
				<li class="support_list_box">
					<a href="https://navercorp.com/service/business" class="business">
						<dl>
							<dt>Business With NAVER</dt>
							<dd><span class="text_line">파트너들의 성공적인 창업과</span>지속가능한 사업을 위해 노력합니다.</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 4st -->
				<li class="support_list_box">
					<a href="https://navercorp.com/service/developers" class="developers">
						<dl>
							<dt>Developers With NAVER</dt>
							<dd><span class="text_line">개발자와 개발사들의 지식과 경험을</span>공유하며 함께 성장해 나갑니다.</dd>
						</dl>
					</a>
				</li>
				<!-- [D] 리스트 순차 노출 5st -->
				<li class="support_list_box">
					<a href="https://navercorp.com/value/projectFlower" class="flower">
						<dl>
							<dt>프로젝트 꽃</dt>
							<dd><span class="text_line">전세계의 SME와 창작자들이 기술을 이용해</span>다양성을 꽃 피울 수 있도록 네이버가 함께 합니다.</dd>
						</dl>
					</a>
				</li>
			</ul>

		</div>
	</div>
</div>

<!-- //Contents -->

<?php
 include $_SERVER['DOCUMENT_ROOT']."/webapi/naver_footer.php";
?>