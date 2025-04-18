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
include "header.php";
?>
<h1>Return Books</h1>
</div>
</div>
</div>

</div>
<div class="content mt-3">
    <form name="form1" action="" method="post">
        <table class="table ">
            <tr>
                <td style="width: 200px;"><label for="" class="control-label mb-1">Select Enrollment No</label></td>
                <td width="250"><select class="form-control" name="enr">
                        <?php
                        $res=mysqli_query($link,"select distinct member_enrollment from issue_books where books_return_date='0000-00-00'");

                        while ($row=mysqli_fetch_array($res))
                        {
                            //$enrolment1=$row["enrolment"];
                            echo "<option>";
                            echo $row["member_enrollment"];
                            echo "</option>";
                        }
                        ?>
                    </select></td>
                <td><input type="submit" name="submit1" value="Search" class="btn btn-dark form-control"></td>
            </tr>
        </table>
    </form >
    <?php
        if(isset($_POST["submit1"]))
        {
            $res=mysqli_query($link,"select * from issue_books where member_enrollment='$_POST[enr]'and books_return_date='0000-00-00'");
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<th>";
            echo "Member Enrollment";
            echo "</th>";
            echo "<th>";
            echo "Member Name";
            echo "</th>";
            echo "<th>";
            echo "Member Registration Date";
            echo "</th>";
            echo "<th>";
            echo "Member Contact";
            echo "</th>";
            echo "<th>";
            echo "Member Email";
            echo "</th>";
            echo "<th>";
            echo "Book Title";
            echo "</th>";
            echo "<th>";
            echo "Book Issue Date";
            echo "</th>";

            echo "<th>";
            echo "Return Book";
            echo "</th>";
            echo "</tr>";
            while ($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>";
                echo  $row["member_enrollment"];
                echo "</td>";
                echo "<td>";
                echo $row["member_name"];
                echo "</td>";
                echo "<td>";
                echo $row["member_registration_date"];
                echo "</td>";
                echo "<td>";
                echo $row["member_contact"];
                echo "</td>";
                echo "<td>";
                echo $row["member_email"];
                echo "</td>";
                echo "<td>";
                echo $row["books_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_issue_date"];
                echo "</td>";

                echo "<td>";
                ?><a href="return.php?id=<?php echo $row["id"]; ?>&member_username=<?php echo $row["member_username"]; ?> ">Return Books</a><?php
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

    ?>

</div>
</div>

<?php
include "footer.php";
?>
