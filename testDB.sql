create table testDB (
   Usernumber Int PRIMARY KEY AUTO_INCREMENT,
   title varchar(100) not null,
    location varchar(30) not null,
    Username varchar(30) not null,
    id varchar(30) not null,
    date datetime,
    hit Int Not null default '0'
);

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