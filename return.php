<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
include "connection.php";

$_SESSION["id"]=$_GET["id"];
//$_SESSION["ereturndate"]=$_GET["ereturndate"];

if(isset($_GET['member_username']))
{
$_SESSION["member_username"]=$_GET["member_username"];
}
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
$res=mysqli_query($link,"update issue_books set books_return_date='$today' where id=$_SESSION[id]");

    $booksname="";
$res2=mysqli_query($link,"select * from issue_books where id=$_SESSION[id]");
if(!$res2)
{
    echo ("error").mysqli_error($link);
    exit();
}
while ($row2=mysqli_fetch_array($res2))
{
    $booksname=$row2["books_name"];
    $issue_date=$row2["books_issue_date"];
    $_SESSION["books_name"]=$booksname;
    $ereturn=$row2["books_expecded_return_date"];
    $_SESSION["ereturn"]=$ereturn;
    $_SESSION["issue_date"]=$issue_date;
}
mysqli_query($link,"update add_books set available_qty=available_qty+1 where books_name='$booksname'");

$tday=date_create($today);
$expect_return=date_create($_SESSION["ereturn"]);
$datedi=date_diff($expect_return,$tday);
 $datediff=$datedi->format("%R%a");
//echo $datediff;
if($datediff < 0)
{
    $totalfine=0;
}
elseif($datediff > 0 && $datediff <= 3)
{
    $charge1=10;
    $fine1=$charge1 * $datediff;
    $totalfine=$fine1;
}
elseif ($datediff > 3 && $datediff <= 7)
{
    $charge1=10;
    $fine1=$charge1 * 3;
    $charge2=30;
    $fine2=$charge2 * $datediff;
    $totalfine=$fine1+$fine2;
}
else
{
    $charge1=10;
    $fine1=$charge1 * 3;
    $charge2=30;
    $fine2=$charge2 * 4;
    $charge3=70;
    $fine2=$charge3 * $datediff;
    $totalfine=$charge1+$charge2+$charge3;
}
$_SESSION["totalfine"]=$totalfine;

mysqli_query($link,"insert into fine values ('','$_SESSION[books_name]','$_SESSION[member_username]','$_SESSION[issue_date]','$_SESSION[ereturn]','$today','$_SESSION[totalfine]')");
//mysqli_query($link,"delete from issue_books where  id=$_SESSION[id]");
?>
<script type="text/javascript">
    alert("Book Returned Successfully..!");
    window.location="return_books.php";
</script>
