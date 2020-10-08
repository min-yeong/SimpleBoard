# SimpleBoard

# 개발 환경 구축
##XAMPP (X : 크로스 플랫폼, A : 아파치 웹 서버, M : MariaDB(MySQL), PHP, Perl)
-> Apache(웹 서버) + MySQL(Database) + PHP(서버 프로그램 언어) 가 한번에 묶여있는 소프트웨어
##Visual Studio Code
##MySQL Workbench 8.0 CE

1. XAMPP 다운로드 
2. 설치 후, Control Panel를 실행하여 Apache와 MySQL 정상적인 작동 확인(각 포트 번호 확인)
3. http://localhost/ 접속하여 정상적으로 작동하는 지 확인
4. ...\xampp\php\php.ini 파일 접속 후 해당 사항 변경하기 -> 문자 인코딩, 시간대 설정

- ;default_charset="UTF-8" -> default_charset="UTF-8"
- ;extension=php_fileinfo.dll -> extension=php_fileinfo.dll
- date.timezone=Europe/Berlin -> date.timezone=Asia/Seoul
- ;mbstring.language=Korean -> mbstring.language=Korean
- ;mbstring.internal_encoding=EUC-kr -> mbstring.internal_encoding=UTF-8

5. mysql 비밀번호 설정
cmd 접속 후 
