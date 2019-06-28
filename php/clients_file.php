<?php

$con = mysqli_connect('localhost', 'root', '', 'cms');
if(!$con){
    mysqli_error(con);
}

$query="Select added_by,clients.id,name,project_name,start_date,end_date,work_no,client_date,vendor, bg_no, confirmation, confirm_date, bg_amount,bg_date, bg_expiry, remarks from clients, bg_info WHERE clients.id = bg_info.id";
$result = mysqli_query($con, $query);

$file = fopen("clients.csv", "a");

$string = "Added By,Client ID, Client Name,  Project Name, Start Date, End Date, Work No., Client Date, Vendor, BG No.,Confirmation from Bank, Confirmation Date, BG Amount, BG Date, BG Expiry Date, Remarks\n";

file_put_contents("clients.csv",$string);

while($rows = mysqli_fetch_row($result)){   
    fputcsv($file,$rows);
}

fclose($file);
header("Location: ../vendor.php");
?>