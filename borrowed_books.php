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
    <h1>Borrowed Books Details</h1>
    </div>
    </div>
    </div>

    </div>
    <div class="content mt-3">
        <?php
        $res=mysqli_query($link,"select * from issue_books where books_expecded_return_date<books_return_date");

        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<th>";
        echo "Member Name";
        echo "</th>";
        echo "<th>";
        echo "Member Enrollment No";
        echo "</th>";
        echo "<th>";
        echo "Book Title";
        echo "</th>";
        echo "<th>";
        echo "Book Expected Return Date";
        echo "</th>";
        echo "<th>";
        echo "Book Return Date";
        echo "</th>";
        echo "<th>";
        echo "Fine";
        echo "</th>";
        echo "</tr>";

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
            echo "<td>";
            echo $row["books_expecded_return_date"];
            echo "</td>";
            echo "<td>";
            echo $row["books_return_date"];
            echo "</td>";
            echo "<td>";
            $res1=mysqli_query($link,"select fine from fine where books_title='$row[books_name]' and member_username='$row[member_username]'");
            while ($row1=mysqli_fetch_array($res1))
            {
                echo $row1["fine"];
            }
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