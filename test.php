<?php
    require_once("C:/xampp/htdocs/test/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>게시판</title>

	<style> 
		table {
			border-collapse: collapse;
			height : 100px;
			margin : auto;
			text-align: center;
		}

		.tb_name {
			background-color : #E2E2E2;
		}
		
		table, th, td {
			border: 1px solid black;
		}

		#bt1 {
			position: relative;
			top : 10px;
   			left: 1335px;
			background-color : #FF1493;
			color : white; 
		}
	</style>
</head>
<body>
	<article>
		<table>
		<thead class="tb_name">
			<tr>
				<th scope="col"><input type = "checkbox" class="check"></th> 
				<th scope="col" class="no">번호</th>
				<th scope="col" class="title">제목</th>
				<th scope="col" class="location">소속</th>
				<th scope="col" class="name">작성자</th>
				<th scope="col" class="id">아이디</th>
				<th scope="col" class="date">작성일</th>
				<th scope="col" class="hit">조회</th>
				<th scope="col" class = "button">관리</th> 
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = 'select * from testdb order by Usernumber desc';
				$result = $db->query($sql);

				while($row = $result->fetch_assoc())	{
			?>
			<tr>
				<td class="check"><input type="checkbox" name="" value=""></td> 
		        <td class="no"><?php echo $row['Usernumber']?></td>
				<td class="title"><?php echo $row['title']?></td>
				<td class="location"><?php echo $row['location']?></td>
				<td class="name"><?php echo $row['Username']?></td>
				<td class="id"><?php echo $row['id']?></td>
				<td class="date"><?php echo $row['date']?></td>
				<td class="hit"><?php echo $row['hit']?></td>
				<td class="button"><input type="button" name="수정" value="수정"></td> 
			</tr>
		        <?php
				}
				?>
		</tbody>
		</table>
		<input type="button" id="bt1" name="등록" value="등록">
	</article>	
</body>
</html>