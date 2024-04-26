<?php 

	$con = mysqli_connect("localhost","root","","syphp");

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];
		$rec = "select * from result where id=".$id;
		$res = mysqli_query($con,$rec);
		$data = mysqli_fetch_assoc($res);
	}

	if (isset($_POST['submit'])) 
	{
		
		$name = $_POST['name'];
		$sub1 = $_POST['sub1'];
		$sub2 = $_POST['sub2'];
		$sub3 = $_POST['sub3'];
		$sub4 = $_POST['sub4'];
		$sub5 = $_POST['sub5'];
		
		$cnt=0;
		$total = $sub1+$sub2+$sub3+$sub4+$sub5;
		$per = $total/5;
		$min= min($sub1,$sub2,$sub3,$sub4,$sub5);
		$max= max($sub1,$sub2,$sub3,$sub4,$sub5);
	
// grade

		if ($per >90)
		{
			$grade = "A+";
		}
		else if($per > 80)
		{
			$grade = "A";
		}
		else if($per >70)
		{
			$grade = "B";
		}
		else if($per > 60)
		{
			$grade = "C";
		}
		else if($per > 35)
		{
			$grade = "D";
		}
		else
		{
			$grade = "**";
		}
// result
		if ($sub1>35) 
		{
			$cnt += 1;
		}
		if($sub2>35) 
		{
			$cnt += 1;
		}
		if ($sub3>35) 
		{
			$cnt += 1;
		}
		if ($sub4>35) 
		{
			$cnt += 1;
		}
		if ($sub5>35) 
		{
			$cnt += 1;
		}
		if ($cnt==5) {
			$result='PASS';
		}
		else if ($cnt==1 || $cnt==2) {
			$result='ATKT';
		}
		else
		{
			$result='FAIL';
		}
					
		if (isset($_GET['id'])) 
		{
			$sql = "update result set name='$name',sub1='$sub1',sub2='$sub2',sub3='$sub3',sub4='$sub4',sub5='$sub5',total='$total',per='$per',min='$min',max='$max',grade='$grade',result='$result' where id=".$_GET['id'];
		}
		else
		{
			$sql = "insert into result(name,sub1,sub2,sub3,sub4,sub5,total,per,min,max,grade,result)values('$name','$sub1','$sub2','$sub3','$sub4','$sub5','$total','$per','$min','$max','$grade','$result')";
		}
		
		mysqli_query($con,$sql);
		header('location:view.php');
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="post">
		<table border="2">
			<tr>
				<td>Name :</td>
				<td><input type="text" name="name" value="<?php echo @$data['name'] ?>"></td>
			</tr>
			<tr>
				<td>Sub 1:</td>
				<td><input type="text" name="sub1" value="<?php echo @$data['sub1'] ?>"></td>
			</tr>
			<tr>
				<td>Sub 2:</td>
				<td><input type="text" name="sub2" value="<?php echo @$data['sub2'] ?>"></td>
			</tr>
			<tr>
				<td>Sub 3:</td>
				<td><input type="text" name="sub3" value="<?php echo @$data['sub3'] ?>"></td>
			</tr>
			<tr>
				<td>Sub 4:</td>
				<td><input type="text" name="sub4" value="<?php echo @$data['sub4'] ?>"></td>
			</tr>
			<tr>
				<td>Sub 5:</td>
				<td><input type="text" name="sub5" value="<?php echo @$data['sub5'] ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>
