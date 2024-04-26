<?php 
    $con = mysqli_connect("localhost", "root", "", "syphp");

    $limit = 5;

    if(isset($_GET['page'])) 
    {
        $page = $_GET['page'];
    } 
    else
    {
        $page = 1;
    }

    $start = ($page - 1) * $limit;


    if (isset($_GET['search'])) 
    {	
    	$search = $_GET['search'];
	    $sql = "select * from pagination where name like '%$search%'  limit $start, $limit";
        $sql_page = "select * from pagination where name like '%$search%'";
    }
    else
    {
        $sql = "select * from pagination limit $start, $limit";
	    $sql_page = "select * from pagination";
    }
	    
    $res1 = mysqli_query($con, $sql_page);
    $total_r = mysqli_num_rows($res1);
    $total_page = ceil($total_r / $limit);

    $res = mysqli_query($con, $sql);
   
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pagination Example</title>
</head>
<body>

	<form method="get">
		<input type="text" name="search">
		<input type="submit" name="submit" value="search">
	</form>

	<br>

    <table border="2" style="">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Val1</th>
            <th>Val2</th>
            <th>Sum</th>
        </tr>
        <?php 
            while ($data = mysqli_fetch_assoc($res)) 
        { ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['val1']; ?></td>   
                <td><?php echo $data['val2']; ?></td>   
                <td><?php echo $data['ans']; ?></td>   
            </tr>
        <?php } ?>
    </table>

    <br>

    <?php
    
    if($page>=2) { echo "<a style= ' background-color:blue; border:3px solid black; padding:3px 10px; color:white;' href='pagination.php?page=".($page-1)."'>  Prev </a>"; }  

     for ($i = 1; $i <= $total_page; $i++) { ?>
    
        <a style="border: 2px solid black; padding: 3px 10px; text-decoration: none; color: black;" 
        href="pagination.php?page=<?php echo $i; if(isset($_GET['search'])) { ?> &search=<?php echo $_GET['search']; }?> "><?php echo $i ?></a>
    

    <?php } 

    if($page<$total_page){ echo "<a style= 'background-color:blue; border:3px solid black; padding:3px 10px; color:white;' href='pagination.php?page=".($page+1) ."'> Next </a>"; }   

    ?>
</body>
</html>