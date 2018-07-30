<?php
ini_set('max_execution_time', 300000);

$con = mysqli_connect("localhost","root","") or die ("Unable to connect");
mysqli_select_db($con,'csvtosql');

// Create connection

// Check connection
// if ($conn->connect_error) 
// {
//     die("Connection failed: " . $conn->connect_error);
// }
// else
// {
	$file = fopen("Latest_Park_Mark_Car_Parks.csv","r");
	echo "<pre>";
	// print_r(fgetcsv($file));
	$i=2;
	while(! feof($file))
	  {
	  // print_r(fgetcsv($file));
		$arr=fgetcsv($file);

		if($arr[0]=="autoID" || $arr[0]==null || $arr[0]=='')
		{

		}
		else
		{
			echo $i.'....... '.$arr[0].' ';
			echo $arr[3].' ';
			echo $arr[5].'<br>';
			// print_r($arr);
			// $sql = "INSERT INTO tableName(name,email,address) VALUES ($arr[1], $arr[3], $arr[5])";
			
			$created=date("Y-m-d h:i:sa");

			$parking_detail=$arr[6].' '.$arr[7].' '.$arr[8].' '.$arr[9].' '.$arr[10];
			
			$sql="insert into test(parking_id,parking_name,location,town,phone,parking_detail,number_of_space,latitude,longitude,created_date) values('','$arr[1]','$arr[11]','$arr[9]','$arr[5]','$parking_detail','$arr[14]','$arr[51]','$arr[52]','$created')";
			
			if(mysqli_query($con,$sql))
			{
				$i++;
			} 
		}

		// $sql="select * from test where name='$arr[1]'";
		// $query_run=mysqli_query($con,$sql);
		// if(mysqli_num_rows($query_run)<1)
		// {
		// 	echo $i."<br>";
		// 	$i++;
		// }
			


	  }

	fclose($file);

	echo "Connected successfully ".$i;
// }

?>



<?php
// $file = fopen("Latest_Park_Mark_Car_Parks.csv","r");
// echo "<pre>";
// // print_r(fgetcsv($file));

// while(! feof($file))
//   {
//   // print_r(fgetcsv($file));
//   $arr=fgetcsv($file);
//   echo $arr[0].'<br>';
//   }

// fclose($file);
?> 