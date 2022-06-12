<?php include('fungsi.php');

$nik = $_GET['nik'];
$sql = "SELECT * FROM kopetensi WHERE nik = '$nik'";

$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = [
	0 => 'id',
	1 => 'nik',
	2 => 'kegiatan',
	3 => 'tempat',
	4 => 'waktu',
	5 => 'sebagai',
	6 => 'tingkat',
	7 => 'tahunaka',
];

// if(isset($_POST['search']['value']))
// {
// 	$search_value = $_POST['search']['value'];
// 	$sql .= " WHERE nik like '%".$search_value."%'";
// 	$sql .= " OR kegiatan like '%".$search_value."%'";
// 	$sql .= " OR tempat like '%".$search_value."%'";
// 	$sql .= " OR waktu like '%".$search_value."%'";
// 	$sql .= " OR sebagai like '%".$search_value."%'";
// 	$sql .= " OR tingkat like '%".$search_value."%'";
// }

// if(isset($_POST['order']))
// {
// 	$column_name = $_POST['order'][0]['column'];
// 	$order = $_POST['order'][0]['dir'];
// 	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
// }
// else
// {
// 	$sql .= " ORDER BY id desc";
// }

// if($_POST['length'] != -1)
// {
// 	$start = $_POST['start'];
// 	$length = $_POST['length'];
// 	$sql .= " LIMIT  ".$start.", ".$length;
// }	

$query = mysqli_query($conn,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['kegiatan'];
	$sub_array[] = $row['tempat'];
	$sub_array[] = $row['waktu'];
	$sub_array[] = $row['sebagai'];
	$sub_array[] = $row['tingkat'];
	$sub_array[] = $row['tahunaka'];
	$sub_array[] = '<div class="d-flex"><a href="javascript:" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtnK" >Edit</a>  <a href="javascript:" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtnK" >Delete</a></div>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
