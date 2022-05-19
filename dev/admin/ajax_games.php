<?php
$conn = mysqli_connect('localhost','u923672343_winner','Winner@123','u923672343_winner');
if(isset($_POST['get_option']))
{
	$fun=mysqli_query($conn,"select * from tbl_game where g_ground='".$_POST['get_option']."' and status='1' order by game_name");
	echo "<option>select Games</option>";
	while($val=mysqli_fetch_array($fun)) 
	{
		$id = $val['id'];
		
		echo "<option value='".$id."'>".$val['game_name']."</option>";

	}
	exit;
}
?>