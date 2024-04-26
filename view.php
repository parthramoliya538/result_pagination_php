<?php 

	$con = mysqli_connect("localhost","root","","syphp");

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];
		$sql = "delete from result where id=".$id;
		$res = mysqli_query($con,$sql);
	}

	$sql = "select * from result";
	$res = mysqli_query($con,$sql);
	// $data = mysqli_fetch_object($res);

	// echo "<pre>";print_r($data);
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	
 	<table border="2">
 		<tr>
 			<th>Id</th>
 			<th>Name</th>
 			<th>Sub1</th>
 			<th>Sub2</th>
 			<th>Sub3</th>
 			<th>Sub4</th>
 			<th>Sub5</th>
 			<th>Total</th>
 			<th>Per</th>
 			<th>Min</th>
 			<th>Max</th>
 			<th>Grade</th>
 			<th>Result</th>
 			<th>Action</th>
 		</tr>

 		<?php while ($data = mysqli_fetch_assoc($res)) { 	?>

 			<tr>
 				<th><?php echo $data['id'] ?></th>
 				<th><?php echo $data['name'] ?></th>
 				<th><?php echo $data['sub1'] ?></th>
 				<th><?php echo $data['sub2'] ?></th>
 				<th><?php echo $data['sub3'] ?></th>
 				<th><?php echo $data['sub4'] ?></th>
 				<th><?php echo $data['sub5'] ?></th>
 				<th><?php echo $data['total'] ?></th>
 				<th><?php echo $data['per'] ?></th>
 				<th><?php echo $data['min'] ?></th>
 				<th><?php echo $data['max'] ?></th>
 				<th><?php echo $data['grade'] ?></th>
 				<th><?php echo $data['result'] ?></th>
 				<th><a href="view.php?id=<?php echo $data['id'] ?>">Delete</a>||<a href="home.php?id=<?php echo $data['id'] ?>">Edit</a></th>
 			</tr>

 		<?php } ?>

 	</table>

 </body>
 </html>