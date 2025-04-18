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
$id=$_GET["id"];
mysqli_query($link,"update member_registration set status='no' where id=$id");
?>
<script type="text/javascript">
    window.location="display_member_info.php";
</script>