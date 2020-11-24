<?php
$arr = json_dcode(file_get_contents("php://input"));
if (empty($arr)) {
	exit("Data empty.");
} else {
	$luar = 0.5 * $arr->alas * $arr->tinggi;
	echo json_encode(array("luas" => $luas));
}
