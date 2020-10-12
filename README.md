# SimpleBoard

## 개발 환경 구축

XAMPP (X : 크로스 플랫폼, A : 아파치 웹 서버, M : MySQL, PHP, Perl)

- Apache(웹 서버) + MySQL(Database) + PHP(서버 프로그램 언어) 가 한 번에 묶여있는 소프트웨어


Visual Studio Code 

- 소스 코드 편집기, 디버깅 지원 및 다양한 프로그래밍 언어 지원 


MySQL Workbench 8.0 CE

- SQL 개발과 관리, 데이터베이스 설계, 생성 그리고 유지를 위한 단일 개발 통합 환경을 제공하는 비주얼 데이터베이스 설계 도구


개발 환경 구축 순서

1. XAMPP 다운로드 
2. 설치 후, Control Panel를 실행하여 Apache와 MySQL 정상적인 작동 확인 (각 포트 번호 확인)
3. http://localhost/ 접속하여 정상적으로 작동하는 지 확인
4. PHP 환경 설정 -> ...\xampp\php\php.ini 파일 접속 후 해당 사항 변경하기 (문자 인코딩, 시간대 설정)

- ;default_charset="UTF-8" -> default_charset="UTF-8"
- ;extension=php_fileinfo.dll -> extension=php_fileinfo.dll
- date.timezone=Europe/Berlin -> date.timezone=Asia/Seoul
- ;mbstring.language=Korean -> mbstring.language=Korean
- ;mbstring.internal_encoding=EUC-kr -> mbstring.internal_encoding=UTF-8

5. MySQL 환경 설정 -> 내 PC의 고급 시스템 변경에서 시스템 환경 변수 PATH 추가

- C:\xampp\mysql\bin\ (MySQL의 bin 폴더 경로)

6. cmd 접속 후, MySQL 접속해 비밀번호 설정하기

- cd (MySQL의 bin 폴더 경로)
- mysql -u root -p
- use mysql;
- UPDATE user SET password = PASSWORD('비밀번호입력') where user = 'root';
- FLUSH PRIVILEGES;
> FLUSH PRIVILEGES : INSERT, DELETE, UPDATE를 통해 사용자에 대한 변경 사항, MySQL의 환경설정을 변경한 경우, 재시작 없이 즉시 반영
바로 GRANT 명령어를 사용하면 실행 필요 X

7. phpMyAdmin 에서도 변경사항 추가, my.ini 파일에서 변경

- $cfg['Servers'][$i]['user'] = '유저이름';
- $cfg['Servers'][$i]['password'] = '유저비밀번호';


## 코드 설명

dbconn.php 

- PHP와 MySQL의 DB 연동
```
<?php
	$db = new mysqli('localhost', 'root', 'mylee1', 'testdb');
	if($db->connect_error) {
	die('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다. // 연결 오류 시
	}
	$db->set_charset('utf8'); //$db에 저장된 테이블 문자 인코딩
?>
```

test.php

- db 연동 하는 외부 파일 dbconn.php 실행
```
<?php
    require_once("C:/xampp/htdocs/test/dbconn.php"); //같은 파일 한 번만 포함, 포함할 파일 없으면 다음 코드 실행 안함 
?>
```

- 쿼리 실행 후, 데이터 값 가져오기 
```
<?php
	$sql = 'select * from testdb order by Usernumber desc'; //Username이 내림차순으로 출력
	$result = $db->query($sql);

	while($row = $result->fetch_assoc())	{ //레코드 값이 없을 때 까지 하나씩 가져옴 
?>
```

- 테이블 $row 내의 해당 row 변수 을 가져와 HTML 형식으로 변환 
```
<?php echo $row['테이블 내의 row 변수']?>
```

testDB.sql

- 테이블 생성 
```
create table testDB (
   Usernumber Int PRIMARY KEY AUTO_INCREMENT,
   title varchar(100) not null,
    location varchar(30) not null,
    Username varchar(30) not null,
    id varchar(30) not null,
    date datetime,
    hit Int Not null default '0'
);
```
> PK를 AUTO_INCREMENT로 사용한 이유 -> 데이터베이스의 성능 최적화
>>1. Insert 시 재정렬이 필요 없음 
>>2. 데이터 낭비가 준다 

- 데이터 입력
```
insert into testdb (title, location, Username, id, date)
values 
('푸드밸런스에서 쥬비스전지점 vip고객분들에게 선날 선물을 보내드립니다.!!', '쥬비스푸드', '조현호', 'fd3936', now()),
('2016.1.17 대표이사 공지사항입니다', '본사', '대표이사', 'juvis-main', now()),
('2017 승진 합격 기준', '본사', '양소영', 'sayyang', now()),
('[연말정산] 2016년 연말정산 서류 제출 안내 - 2월 10일까지', '본사', '김혜림', ' snb123', now()),
('푸드밸런스 전체 휴무 관련', '쥬비스푸드', '조현호', 'fd3936', now()),
('지점푸드 주문방법 및 주문일자 관련 공지', '쥬비스푸드', '조현호', 'fd3936', now()),
('2017.02월 웰컴차(고객상담용 차) 주문안내', '쥬비스푸드', '정현주', 'junghj', now()),
('8월 휴가기간 내 지점푸드 배송관련 공지', '본사', '민찬호', 'chhmin', now()),
('2018.6.21 총괄대표 공지입니다.', '본사', '대표이사', 'juvis-main', now()),
('2018년 6월 25일 총괄대표 공지입니다.', '본사', '대표이사', 'juvis-main', now());
```


## 사용 기술의 설명

웹 서비스 
- 웹 서버가 사용자에게 제공하는 서비스

웹 서버
- 클라이언트로부터 요청받은 URL을 브라우저형식으로 보여주기 위해 HTTP요청을 받아드리고 요청한 서비스를 반환하는 서비스 프로그램 

HTTP 
- Hyper Text Transfer Protocol, 웹 브라우저와 웹 서버가 데이터를 주고 받을 때 사용하는 일종의 규칙

HTML/CSS
- Hyper Text Markup Language(태그를 이용한 기본 구조), Cascading Style Sheets(사용자에게 보여지는 화면 구성), 웹 페이지를 생성 및 구성을 위한 언어
> HTML, CSS 분리의 장점 
>> 태그로 Style 속성을 주기 때문에 유지보수, 가독성이 증가

PHP 
- 동적인 웹 사이트 개발을 위한 언어 
- 서버 측에서 실행되는 서버 사이드 스크립트 언어로 HTML/CSS 코드 안에 추가하여 사용

MySQL 
- 오픈 소스의 관계형 데이터베이스(정해진 규격, 관리) 관리 시스템
- 다양한 운영체제, 여러 언어와 호환

## etc..

정적 웹 페이지
- 서버에 미리 저장된 파일이 그대로 전달되는 웹 페이지
- 서버는 사용자가 요청에 해당하는 저장된 웹 페이지를 보냄 
- 속도 빠름, 저비용, 한정적, 관리 비효율적

동적 웹 페이지
- 서버에 있는 데이터들을 스크립트에 의해 가공처리 후 전달되는 웹 페이지
- 서버는 사용자의 요청을 해석하여 데이터를 가공 후, 생성되는 웹 페이지를 보냄
- 속도 느림, 추가비용(웹 어플리케이션 서버 필요), 서비스의 다양성, 관리 효율적

DNS (Domain Name Server)
- 호스트의 메인 이름을 호스트의 네트워크 주소로 바꾸거나 그 반대의 변환을 수행할 수 있도록 하기 위한 것
- 사람이 읽고 사용하기에 편리한 도메인 이름의 주소를 IP주소로 변환해줌

localhost
- 컴퓨터 네트워크에서 사용하는 호스트 명, 자신의 컴퓨터를 의미함

<img src="C:\Users\JUVIS_LMY\Desktop\캡처.png" width="450px" height="300px"></img><br/>
