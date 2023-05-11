<?php
include'../helper/Tools.php';
include'../DB/db.php';

$ans = (new db)->get_all();
file_put_contents('../datagrid_data.json', json_encode($ans));
