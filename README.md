# SimpleBoard

## 개발 환경 구축

XAMPP (X : 크로스 플랫폼, A : 아파치 웹 서버, M : MariaDB(MySQL), PHP, Perl)

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
- use mysql;
- UPDATE user SET password = PASSWORD('비밀번호입력') where user = 'root';
- FLUSH PRIVILEGES;

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
	$db->set_charset('utf8'); //DB 테이블 문자 인코딩 후, $db에 저장 
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

- 테이블 $row 내의 해당 row 변수 깂을 가져와 HTML 형식으로 변환 
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

웹서비스 
- 네트워크 상에서 서로 다른 종류의 컴퓨터들 간에 상호작용을 위한 소프트웨어 시스템 

HTTP 
- Hyper Text Transfer Protocol, 웹 브라우저와 웹 서버가 데이터를 주고 받을 때 사용하는 일종의 규칙

HTML/CSS
- Hyper Text Markup Language, 웹 페이지를 생성 및 구성을 위한 언어

XAMPP
- 웹 서버, 데이터베이스, 서버 프로그램을 통해 웹 개발 환경을 구축하기 위한 소프트웨어

PHP 
- 동적인 웹 사이트 개발을 위한 언어 
- 서버 측에서 실행되는 서버 사이드 스크립트 언어로 HTML/CSS 코드 안에 추가하여 사용

MySQL 
- 오픈 소스의 관계형 데이터베이스(정해진 규격, 관리) 관리 시스템
- 다양한 운영체재, 여러 가지의 언어와 호환

## etc..

JavaScript
- 동적인 객체 기반의 스크립트 언어, 웹의 동작을 구현

JQuery
- HTML 클라이언트 사이드 조작을 단순화 한 자바스크립트 라이브러리
