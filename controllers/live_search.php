<?php

$connect = mysqli_connect("localhost", "root", "", "docwebox");
// $output = '';
$data = array();

if(isset($_POST["input"])) {
	
	$input=$_POST["input"];
    $query = "
    SELECT * FROM doctor 
    WHERE specialization  LIKE '".$input."%'  
    ";
} else {
    $query = "
    SELECT * FROM doctor ORDER BY id
    ";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) <= 0) {
    echo '<span class="text-danger">Data Not Found</span>';
} 
else {
    while($row = mysqli_fetch_array($result)) {
        array_push($data, array('id'=>$row['id'],'full_name'=>$row['full_name']));
    }
    echo json_encode($data);   
    exit();

//     $output .= '
//     <div class="table-responsive">
//      <table class="table table bordered">
//       <tr>
//        <th>Full_name</th>
//        <th>Specialization</th>
//       </tr>
//    ';
//    while($row = mysqli_fetch_array($result)) {
//     $output .= '
//      <tr>
//       <td>'.$row["full_name"].'</td>
//       <td>'.$row["specialization"].'</td>
//      </tr>
//     ';
//    }
//    echo $output;
}      

?>