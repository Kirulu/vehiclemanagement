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
include  "header.php";
?>
    <h1>Member Info</h1>
    </div>
    </div>
    </div>

    </div>

    <div class="content mt-3">
        <?php
        $res=mysqli_query($link,"select * from member_registration");
        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<th>";echo "Firstname";echo "</th>";
        echo "<th>";echo "Lastname";echo "</th>";
        echo "<th>";echo "Username";echo "</th>";
        echo "<th>";echo "Email";echo "</th>";
        echo "<th>";echo "Contact";echo "</th>";
        echo "<th>";echo "Registration Date";echo "</th>";
        echo "<th>";echo "Enrollment No";echo "</th>";
        echo "<th>";echo "Status";echo "</th>";
        echo "<th>";echo "Approve";echo "</th>";
        echo "<th>";echo "Not Approve";echo "</th>";
        echo "</tr>";
        while ($row=mysqli_fetch_array($res))
        {
            echo "<tr>";
            echo "<td>";echo $row["firstname"];echo "</td>";
            echo "<td>";echo $row["lastname"];echo "</td>";
            echo "<td>";echo $row["username"];echo "</td>";
            echo "<td>";echo $row["email"];echo "</td>";
            echo "<td>";echo $row["contact"];echo "</td>";
            echo "<td>";echo $row["register_date"];echo "</td>";
            echo "<th>";echo $row["enrolment"];echo "</td>";
            echo "<td>";echo $row["status"];echo "</td>";
            echo "<td>";?> <a href="approve.php?id=<?php echo $row["id"];?>">Approve</a> <?php echo "</td>";
            echo "<td>";?> <a href="notapprove.php?id=<?php echo $row["id"];?>">Not Approve</a> <?php echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</div>

<?php
include "footer.php";
?>