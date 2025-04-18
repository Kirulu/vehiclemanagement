<?php
include "connection.php";
$output = '';
if(isset($_POST["books_name"]))
{
    //if($_POST["books_name"] != '')
   // {
        $sql = "SELECT * FROM add_books  WHERE books_name = '$_POST[books_name]'";
        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_array($result))
        {
            $output = $row["available_qty"];
        }
        echo $output;
    //}
    //else
    //{
    //    $output="--Select Book--";
    //    echo $output;
   // }

}