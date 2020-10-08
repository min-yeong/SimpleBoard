# SimpleBoard

## 개발 환경 구축

XAMPP (X : 크로스 플랫폼, A : 아파치 웹 서버, M : MariaDB(MySQL), PHP, Perl)
-> Apache(웹 서버) + MySQL(Database) + PHP(서버 프로그램 언어) 가 한번에 묶여있는 소프트웨어

Visual Studio Code 
-> 소스 코드 편집기, 디버깅 지원 및 다양한 프로그래밍 언어 지원 

MySQL Workbench 8.0 CE
-> SQL 개발과 관리, 데이터베이스 설계, 생성 그리고 유지를 위한 단일 개발 통합 환경을 제공하는 비주얼 데이터베이스 설계 도구

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

dbcomm.php
```
<?php
	$db = new mysqli('localhost', 'root', 'mylee1', 'testdb');
	if($db->connect_error) {
	die('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.
	}
	$db->set_charset('utf8');
?>
```



