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
    <h1>Books With Details</h1>
    </div>
    </div>
    </div>

    </div>
    <div class="content mt-3">
        <?php
        $res=mysqli_query($link,"select * from add_books where available_qty>0");
        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<th>";
        echo "Book Image";
        echo "</th>";
        echo "<th>";
        echo "Book Title";
        echo "</th>";
        echo "<th>";
        echo "Total Book Quantity";
        echo "</th>";
        echo "<th>";
        echo "Available Book Quantity";
        echo "</th>";
        echo "</tr>";

        while ($row=mysqli_fetch_array($res))
        {
            echo "<tr>";
            echo "<td>";
            ?>
            <img src="../librarian/<?php echo $row["books_image"]; ?>" height="100" width="100">
            <?php
            echo "<br>";
            ?><a href="all_member_of_this_books.php?books_name=<?php echo $row["books_name"]; ?>" style="color: red">Member record of this book</a><?php
            echo "</td>";
            echo "<td>";
            echo $row["books_name"];
            echo "</td>";
            echo "<td>";
            echo $row["books_qty"];
            echo "<td>";
            echo $row["available_qty"];
            echo "</td>";

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