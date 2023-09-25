## 9월 19일 리포트

### CSS3 스타일로 태그에 동적 변화 만들기
자바스크립트로 구현하던 것을 CSS3로 작성 가능
   
3가지 기법 지원
* 애니메이션
* 전환
* 변환

***

### 10초를 주기로 p태그의 글자색을 파란색, 초록색, 빨간색으로 바꾸는 애니메이션 무한 반복

```
@keyframes textColorAnimation {
	0% { color : blue; }
	30% { color : green; } 
	100% { color : red; }
}
p {
	animation-name : textColorAnimation; 
	animation-duration : 10s;
	animation-iteration-count : infinite; 
}
```


넷트리파이 <https://rhkdtjq.netlify.app/>
깃허브 <https://rhkdtjq0915.github.io/HTMLHardCoding/>
