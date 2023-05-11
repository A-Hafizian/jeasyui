<?php
include'../helper/Tools.php';
include'../DB/db.php';
if (!isset($_POST['name'], $_POST['family'], $_POST['phoneNumber'])) {
    echo json_encode(['error']);
    die();
}

$name = Tools::validation($_POST['name']);
$family = Tools::validation($_POST['family']);
$phoneNumber = Tools::validation($_POST['phoneNumber']);

if (empty($name) || empty($family) || empty($phoneNumber) || strlen($phoneNumber) !=10 ) {
    echo json_encode(['error']);
    die();
}

$ans = (new db)->create(['Name'=>$name, 'Family'=>$family, 'PhoneNumber'=>$phoneNumber]);
echo json_encode($ans);
