# 2023년 10월 31일 리포트
## JQUERY와 javascript를 활용하여 이미지 갤러리 만들기
### jquery를 이용한 이미지 갤러리

''' 

	<link rel="stylesheet" href="jquery.mobile-1.4.5.min.css"/>
	<script src="jquery-1.11.1.min.js"></script>
	<script src="jquery.mobile-1.4.5.min.js"></script>
	<script src="jquery-3.6.0.min.js"></script>

 	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}


'''
   
![4](https://github.com/rhkdtjq0915/cordova/assets/80075223/c921b29b-9161-498c-b352-ed7045fd0a6f)   
이미지를 클릭하면 클릭한 이미지가 크게 보인다.   

### javascript를 이용한 이미지 갤러리  
   
'''
 <script type="text/javascript">
	$(document).ready(function(){
	   $(".picture2 a").click(function(){
		   $(".main img").attr("src", $(this).attr("href"))
							.attr("alt", $(this).children("img").attr("alt"));
	   return false;
	   });
	});
   </script>

'''
   
![3](https://github.com/rhkdtjq0915/cordova/assets/80075223/5a1c5246-d904-4ff3-9edf-c508063249a9)   
이미지에 마우스를 올리면 이미지가 커지고 클릭한 이미지가 팝업되어 보여진다.

   
   
