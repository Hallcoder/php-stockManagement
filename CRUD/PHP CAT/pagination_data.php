<?php
include_once("connect.php");
$sql = "SELECT  p.provinceName, d.districtName, s.sectorName , c.cellId ,c.cellName , COUNT(villageId) as NumberOfVillages from provinces as p join districts as d on p.provinceId = d.provinceId join sectors as s on d.districtId = s.districtId join cells as c on c.sectorId = s.sectorId join villages as v on v.cellId = c.cellId GROUP BY c.cellName;";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$data[] = $rows;
}
$results = array(
	"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
  "aaData"=>$data);
echo json_encode($results);
exit;
?>