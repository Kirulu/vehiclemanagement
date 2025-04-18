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
    <h1>Member List With This Book</h1>
    </div>
    </div>
    </div>

    </div>
    <div class="content mt-3">
        <?php
            $res=mysqli_query($link,"select * from issue_books where books_name='$_GET[books_name]' && books_return_date='0000-00-00'");
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<th>";
            echo "Member Name";
            echo "</th>";
            echo "<th>";
            echo "Member Enrollment";
            echo "</th>";
            echo "<th>";
            echo "Book Name";
            echo  "</th>";
            echo "<th>";
            echo "Member Email";
            echo "</th>";
            echo "<th>";
            echo "Member Contact";
            echo "</th>";
            echo "<th>";
            echo "Book Issue Date";
            echo  "</th>";
            echo "</th>";
            while ($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>";
                echo $row["member_name"];
                echo "</td>";
                echo "<td>";
                echo $row["member_enrollment"];
                echo "</td>";
                echo "<td>";
                echo $row["books_name"];
                echo "</td>";
                echo "<td>";
                echo $row["member_email"];
                echo "</td>";
                echo "<td>";
                echo $row["member_contact"];
                echo "</td>";
                echo "<td>";
                echo $row["books_issue_date"];
                echo "</td>";
                echo "</tr>";

            }
            echo "</table>";
        ?>
    </div>
    </div>
<?php
include "footer.php";
?>