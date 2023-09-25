## 9월 19일 리포트

># CSS 3가지 박스 유형 비교
|인라인 박스(display:block)|인라인 박스(display:inline)|인라인 블록 박스(display:inline-block)|
|---|---|---|
|항상 새라인에서 시작|새라인에서 시작 못함 라인안(inline)에 있음|새라인에서 시작 못함 라인안(inline)에 있음|
|블록박스 내에만 배치|모든 박스 내 배치|모든 박스 내 배치|
|옆에 다른 요소 배치 불가능|옆에 다른 요소 배치 가능|옆에 다른 요소 배치 가능|
|width와 geight으로 크기 조절|width와 height으로 크기 조절 불가능|width와 geight으로 크기 조절|
|padding, border, margin조절 기능|margin-top, margin-bottom조절 불가능|padding, border, margin조절 불가능|

># POSITION
|속성|속성값|설명|
|---|---|---|
|정적배치|static|요소를 문서의 흐름에 맞추어 배치. 위치지정이 필요없음|
|상대배치|relative|이전요소에 저연스럽게 연결해 배치하되 위치를 지정할 수 있음|
|절대배치|absolute|원하는 위치를 지정해 배치|
|고정배치|fixed|지정한 위치에 고정해 배치. 화면에서 요소가 잘릴 수도 있다|

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

![ezgif-2-1dd8d219a0](https://github.com/rhkdtjq0915/cordova/assets/80075223/2649e68b-3781-4eb5-bc65-0b104b693eae)


***

### HTML 태그에 적용된 CSS3 프로퍼티 값의 변화를 서서히 진행시켜 애니메이션 효과 생성

```
.category {
	        transition : font-size 5s;
        }
        .category li:hover {
	        font-size : 200%;
        }
```


![ezgif-2-d3d6f659f7](https://github.com/rhkdtjq0915/cordova/assets/80075223/3f5e60cc-44c8-4e09-b967-4d0609355127)

마우스를 올리면 크기 변환


링크 <https://rhkdtjq0915.github.io//cordova>
