<?php
$conn = mysqli_connect('localhost','u923672343_winner','Winner@123','u923672343_winner');
if(isset($_POST['ground_id']))
{
	
	$fun=mysqli_query($conn,"select * from tbl_court where game_id='".$_POST['get_courtoption']."' && ground_id='".$_POST['ground_id']."' && court_status='1' order by court_name");
	
	echo "<option>select Court</option>";
	while($val=mysqli_fetch_array($fun)) 
	{
		$id = $val['court_id'];
		 
		echo "<option value='".$id."'>".$val['court_name']."</option>";

	}
	exit;
}

//  echo $_POST['ground_id'];
?>

<!-- <script>document.write("hello world");</script> -->