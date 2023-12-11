<?php
 include $_SERVER['DOCUMENT_ROOT']."/webapi/naver_header.php";
?>

<?php
// 네이버 Papago NMT 기계번역 Open API 예제
$client_id = "hxJIvCiRFUZJJ3YyOPWW"; // 네이버 개발자센터에서 발급받은 CLIENT ID
$client_secret = "uF9fHCkd8M";// 네이버 개발자센터에서 발급받은 CLIENT SECRET

// 함수: 텍스트 번역
function translateText($text) {
  global $client_id, $client_secret;

  $encText = urlencode($text);
  $postvars = "source=en&target=kr&text=".$encText;
  $url = "https://openapi.naver.com/v1/papago/n2mt";
  $is_post = true;

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, $is_post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
  $headers = array();
  $headers[] = "X-Naver-Client-Id: ".$client_id;
  $headers[] = "X-Naver-Client-Secret: ".$client_secret;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($status_code == 200) {
    $result = json_decode($response, true);
    return $result['message']['result']['translatedText'];
  } else {
    return "번역 에러: ".$response;
  }
}

// PHP 파일 내용 가져오기
$fileContents = file_get_contents("company.php");

// 번역 수행
$translation = translateText($fileContents);

// 번역 결과 출력
echo $translation;
?>


		<div class="sitemap_dimmed"></div>
		<!-- Contents -->


<div class="container summary" role="main">
	<ul class="location">
		<li>
			<a href="http://localhost/webapi/company.php" class="location_list">홈<span class="blind">메인 페이지로 이동</span></a>
		</li>
		<li>
			<span class="location_list">네이버 소개<span class="blind">현재 페이지</span></span>
		</li>
	</ul>
	<div class="content">
		<div class="content_head">
			<h2 class="page_title">네이버 소개</h2>
			<p class="page_info">
				네이버는 수많은 SME와 창작자, 파트너들이 미래 기술을 활용해<br>글로벌 시장에서 더 큰 성장을 이룰 수 있도록 지원하는 글로벌 테크 플랫폼입니다.
			</p>
		</div>
		<div class="spot summary">
			<!-- [D] 개발 시, img태그의 인라인 스타일 삭제 부탁드립니다. -->
			<img src="https://navercorp.com/img/ko/naver/img_spot_summary_v2.jpg" alt="네이버 소개 이미지" style="position: absolute; left: 0; bottom: 0;">
		</div>
		<div class="content_container">
			<div class="content_box">
				<dl>
					<dt class="content_box_left">NAVER</dt>
					<dd class="content_box_right">
						<p class="content_box_text">
							네이버(주)는 글로벌 ICT 기업으로서 한국 최대 검색포털 네이버를 서비스하고 있고, 그 계열사에서&nbsp;모바일 메신저 라인, 동영상 카메라 스노우, 디지털 만화 서비스 네이버웹툰,&nbsp;메타버스 서비스 제페토&nbsp;등을 서비스하고 있습니다. 또한, 네이버(주)는 인공지능, 로보틱스, 모빌리티 등 미래 기술에 대한 지속적인 연구개발을 통해 기술 플랫폼의 변화와 혁신을 추구하며 세계 각국의 수많은 이용자와 다양한 파트너들이 함께 성장할 수 있도록 노력하고 있습니다.
						</p>
					</dd>
				</dl>
			</div>
			<div class="content_box">
				<dl>
					<dt class="content_box_left">COMPANY<br>PROFILE</dt>
					<dd class="content_box_right">
						<table class="table">
							<caption>COMPANY PROFILE 설명</caption>
							<colgroup>
								<col style="width: 160px">
								<col style="max-width: 800px">
							</colgroup>
							<tbody>
							<tr>
								<th scope="row">설립연도</th>
								<td>1999년 6월</td>
							</tr>
							<tr>
								<th scope="row">본사 위치</th>
								<td>경기도 성남시 분당구</td>
							</tr>
							<tr>
								<th scope="row">주요서비스</th>
								<td>온라인 검색포털, 모바일 메신저 플랫폼</td>
							</tr>
							<tr>
								<th scope="row">주요사업</th>
								<td>온라인 광고 및 콘텐츠 사업</td>
							</tr>
							<tr>
								<th scope="row">해외 계열 법인</th>
								<td>일본, 미국, 프랑스, 중국, 베트남, 대만, 태국, 인도네시아 외</td>
							</tr>
							<tr>
								<th scope="row">매출액</th>
								<td>8조 2,201억 원 (2022년)</td>
							</tr>
							<tr>
								<th scope="row">전체인력</th>
								<td>4,930명 (본사 기준, 2022년 기준)</td>
							</tr>
							</tbody>
						</table>
					</dd>
				</dl>
			</div>
		</div>
	</div>
</div>
		<!-- //Contents -->
		<div id="map" style="width:100%;height:400px;"></div>

<script>
var mapOptions = {
    center: new naver.maps.LatLng(37.3595704, 127.105399),
    zoom: 10
};
var map = new naver.maps.Map('map', mapOptions);
</script>

<?php
 include $_SERVER['DOCUMENT_ROOT']."/webapi/naver_footer.php";
?>