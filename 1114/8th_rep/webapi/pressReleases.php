<?php
 include $_SERVER['DOCUMENT_ROOT']."/webapi/naver_header.php";
?>
		<div class="sitemap_dimmed"></div>
		<!-- Contents -->
		




<script type="text/javascript" src="https://navercorp.com/js/util.js"></script>
<script type="text/javascript">		

$(document).ready(function() {
	var select_box = 	$(".btn_select");

	select_box.bind("click",function(){ 				// 셀렉트 박스 열고 닫기
		select_box.attr("aria-expanded","true");		
		$(".select_item").attr("aria-selected","false");					// 열려있는 모든 셀렉트박스 닫기
		//$(this).children(".select_item").toggleClass("on"); 	// 선택된 셀렉트 박스의 option 토글
		$(window).bind("click",function(){ 					// 셀렉트 박스가 선택되면 모든 윈도우에 이벤트 추가
			select_box.attr("aria-expanded","false");				// 모든윈도우가 클릭되면 옵션 박스 의 on 삭제
			$(window).unbind("click");							// 윈도우의 클릭이벤트 삭제
		});
		return false;
	});
	$('.select_item').bind('click', function(){ 				// 옵션 리스트 선택시 텍스트 교체
		$(this).attr("aria-selected","true");
		$('.btn_select').text($(this).text());		
		$('#regYear').val($(this).attr("data-regYear"));
		$('#currentPage').val('0');
		select_box.attr("aria-expanded","false");	
		$(window).unbind("click");	
		search();
		return false;
	});
	
	var selecteditem = $(".select_item[aria-selected='true']")
	if(selecteditem.length > 0){
		$('.btn_select').text(selecteditem.text());
	}
});

function search() {
	searchForm.action ="https://navercorp.com/promotion/pressReleases"
	searchForm.submit();
}

function view(id) {
	var form = document.getElementById("searchForm");
	var url = "https://navercorp.com/promotion/pressReleasesView/" + id;
	form.elements["seq"].value = id;
	form.action = url;
	form.submit();
}


function nextPageAdd(){
	var report_container = $('#report_container');
	var currentPage = $('#currentPage');
	var pdata = $('#searchForm').serialize();	
	UT.ajaxCall({	url: 'https://navercorp.com/promotion/pressReleases/getMoreReport',
		data : pdata, //전송 Data
		successCallbackFn : function(data, status) {
			if(data.length > 0){
				var prObj = null;
				var htmlString = '';
				for(var i=0 ; i <data.length ; i++){
					
					htmlString = '<li class="report_list">';
					prObj = data[i];
					htmlString += '<a href="javascript:;" onclick="view(\'' + prObj.seq + '\')">';
					if(prObj.thumbnailFilePath !=null && prObj.thumbnailFilePath != ''){
						htmlString += '<div class="report_img_box" style="background-image: url('+prObj.thumbnailFilePath+');"><span class="blind">썸네일 이미지</span></div>';	
					}else{
						htmlString += '<div class="report_img_box" style="background-image: url(https://navercorp.com/img/ko/promotion/img_promotion_no_image.png);"><span class="blind">썸네일 이미지</span></div>';
					}
					
					htmlString += '<div class="report_info_box">';
					if(prObj.newYN=="Y"){
						htmlString += '<span class="icon_now"><span class="blind">신규</span></span>';
					}
					htmlString += '<h3 class="report_info_title">';
					htmlString += prObj.title;
					htmlString += '</h3><p class="report_info_text">';
					htmlString += prObj.content;
					htmlString += '</p><span class="report_info_date">';
					htmlString += prObj.regDTStr;
					htmlString += '</span></div></a></li>';
					
					report_container.append(htmlString);
				}				
				currentPage.val(parseInt(currentPage.val())+1);
			}
			if( data == null || data.length == 0 || prObj.endCount >=  prObj.rowCount ){
				$('#more_btn_area').hide();
			}
		}
	});
	
	
}

</script>
<div class="container promotion" role="main">
				<ul class="location">
					<li>
						<a href="http://localhost/webapi/company.php" class="location_list">홈<span class="blind">메인 페이지로 이동</span></a>
					</li>
					<li>
						<span class="location_list">홍보<span class="blind">현재 페이지</span></span>
					</li>
				</ul>
				<div class="content">
					<div class="content_head">
						<h2 class="page_title">보도자료</h2>

					<div class="content_container tv">
						<div class="report_wrap">
							<!-- [D] 최대 노출 개수 9개 // 더보기 버튼 클릭 시 .report_list 추가 -->
							<ul class="report_container" id="report_container">
								<!-- [D] 신규 등록 시, .report_list에 now클래스 추가 -->
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31498')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231211095815_1.png);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											네이버제트, UAE 샤르자 미디어 시티와 MOU 체결 … “메타버스 콘텐츠 및 몰입형 기술 분야에서 다각적 협력 추진”
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											네이버제트, UAE 샤르자 미디어 시티와 MOU 체결 … “메타버스 콘텐츠 및 몰입형 기술 분야에서 다각적 협력 추진”

- 알 카시미 부국왕, 알 미드파 미디어 시티 회장 등 샤르자 고위대표단, 네이버제트의 모션캡쳐 스튜디오 및 생성형 AI 체험 후 활용 방안 모색

- 네이버제트, 메타버스 콘텐츠 및 기술 분야 노하우 공유하며 포괄적 협력 이어갈
										</p>
										<span class="report_info_date">
											
											2023.12.11
										</span>
									</div>
									</a>
								</li>									
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31499')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231211100014_1.png);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											네이버페이, 총 5억 원 규모 혜택 담은 연말결산 이벤트 ‘누가 네이버페이 왕인가’ 진행
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											"올해 ‘네이버페이 왕’은 누구?"

네이버페이, 총 5억 원 규모 혜택 담은 연말결산 이벤트 ‘누가 네이버페이 왕인가’ 진행

- 결제•증권•부동산 등 서비스 영역 별로 가장 활발히 활동한 ‘네이버페이 왕’ 선정…이벤트 페이지 오픈 된 지난 6일 이후 하루 만에 약 60만 명 참여

- 12월 한 달 간 네이버페이 5만원 이상 결제자 모두에게 
										</p>
										<span class="report_info_date">
											
											2023.12.11
										</span>
									</div>
									</a>
								</li>									
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31500')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231211114531_1.png);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											네이버 지도, 대중교통 길안내 서비스 출시… 더욱 편리한 이동 경험 지원한다
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											“이번 역에서 하차 후 8호선으로 환승하세요”

네이버 지도, 대중교통 길안내 서비스 출시… 더욱 편리한 이동 경험 지원한다

- 대중교통 탑승부터 하차 후 목적지까지 이동 경로 실시간으로 안내… 네이버 지도, 생활밀착형 ‘올인원 플랫폼’으로서 완결성 높여

- 승하차 알림, 환승 정보 등 대중교통 이용 시 필요한 정보 팝업∙음성으로 제공… 바로
										</p>
										<span class="report_info_date">
											
											2023.12.11
										</span>
									</div>
									</a>
								</li>									
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31497')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231208101100_1.png);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											네이버, ‘2023 널리 웨비나’ 진행 …  “AI 및 첨단 기술로 소외 없는 디지털 환경 구축 이어가”
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											네이버, ‘2023 널리 웨비나’ 진행 …  “AI 및 첨단 기술로 소외 없는 디지털 환경 구축 이어가”

-  AI 기술로 디지털 접근성을 향상한 사례와 연구 내용 발표 … 실무적으로 접근성 개선 도움 주는 개발 전략도 소개

- 네이버, 다양한 기술 통해 누구나 쉽게 디지털 서비스 이용할 수 있도록 노력 예정

 

2023-12-08

										</p>
										<span class="report_info_date">
											
											2023.12.08
										</span>
									</div>
									</a>
								</li>									
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31494')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231207092537_1.jpg);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											팝업스토어 접수한 네이버웹툰, 국내외 굿즈 사업 확장 나선다
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											팝업스토어 접수한 네이버웹툰, 국내외 굿즈 사업 확장 나선다

- 올해 하반기 세 차례 팝업스토어 총 방문객 수 약 17만 명, 판매 상품 수 60만 개 이상… 각 행사장 역대 IP 팝업스토어 중 최대 매출 및 최대 방문객 수 기록

- 팝업스토어 종료 후 20여 개 이상의 브랜드에서 협업 ‘러브콜’ 쏟아져

- 2024년 1월 25일 영등포 타
										</p>
										<span class="report_info_date">
											
											2023.12.07
										</span>
									</div>
									</a>
								</li>									
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31495')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231207095247_1.png);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											이제 해외 65개 국가•지역서 네이버페이 현장결제 된다…”일본서는 연말까지 10% 포인트 적립 제공”
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											이제 해외 65개 국가•지역서 네이버페이 현장결제 된다…”일본서는 연말까지 10% 포인트 적립 제공”

- 네이버페이X유니온페이 해외 현장결제 가능한 국가 및 지역, 23개 신규 추가 확대…총 33개 국가 및 지역서 이용 가능 

- 유니온페이, 알리페이플러스 등 글로벌 제휴 통해 해외 총 65개 국가 및 지역서 네이버페이 현장결제, 포인트 뽑기 혜
										</p>
										<span class="report_info_date">
											
											2023.12.07
										</span>
									</div>
									</a>
								</li>									
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31496')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231207105017_1.jpg);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											팀 네이버, iot squared와 MOU 맺고 사우디 D·X 진전 이어간다
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											팀 네이버, iot squared와 MOU 맺고 사우디 D·X 진전 이어간다

- 네이버클라우드, 사우디 D·X 주축 ‘STC그룹’과 ‘국부펀드(PIF)’간 합작사인 iot squared와 MOU

- 디지털 트윈 기반 도심 모니터링, 스마트시티 구축 등 협력… 장기적 밸류 체인 구축도

2023-12-07

​

지난 10월 수주 소식을
										</p>
										<span class="report_info_date">
											
											2023.12.07
										</span>
									</div>
									</a>
								</li>									
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31490')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231206091015_1.png);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											네이버페이, 우리은행과 ‘금융혁신 위한 전략적 파트너십’ 체결
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											네이버페이, 우리은행과 ‘금융혁신 위한 전략적 파트너십’ 체결

- 데이터와 기술을 활용한 금융혁신에 상호 협력…취약계층을 위한 서비스 개발도 추진

 

2023-12-06

 

 

[사진]5일 서울 중구 우리은행 본점에서 박상진 네이버페이 대표이사(좌)와 조병규 우리은행장(우)이 '전략적 파트너십을 위한 업무협약'을 체결했다. 
										</p>
										<span class="report_info_date">
											
											2023.12.06
										</span>
									</div>
									</a>
								</li>									
							
								<li class="report_list">
									<a href="javascript:;" onclick="view('31491')">
										
										
											<div class="report_img_box" style="background-image: url(https://navercorp.com/navercorp_/promotion/webtoonPressReleases/2023/20231206100933_1.png);"><span class="blind">썸네일 이미지</span></div>
										
									<div class="report_info_box">
										
										<span class="icon_now"><span class="blind">신규</span></span>
										
										<!-- [D] 2줄 이상 말줄임 처리 -->
										<h3 class="report_info_title">
											월 현장결제액 전년 대비 8배 급성장한 네이버페이X삼성페이, 연말엔 혜택까지 더 커진다
										</h3>
										<!-- [D] 3줄 이상 말줄임 처리 -->
										<p class="report_info_text">
											월 현장결제액 전년 대비 8배 급성장한 네이버페이X삼성페이, 연말엔 혜택까지 더 커진다

- 네이버페이X삼성페이 현장결제 이용자, 전체 현장결제 이용자 대비 인당 평균 포인트 혜택 2배 높아

- 네이버페이, 삼성페이 도입 후 현장결제 규모 급성장…11월 현장결제 금액 전년대비 8배 ↑  

- 연말까지 네이버페이X삼성페이 결제혜택 더 커진다…‘
										</p>
										<span class="report_info_date">
											
											2023.12.06
										</span>
									</div>
									</a>
								</li>									
													
							</ul>
						</div>
						<!-- [D] .btn_more 클릭 시, 리스트 추가 -->

						
					</div>
				</div>
			</div>
			
			

		<!-- //Contents -->

<?php
 include $_SERVER['DOCUMENT_ROOT']."/webapi/naver_footer.php";
?>