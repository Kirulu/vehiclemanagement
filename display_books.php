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
    <h1>Search & Display Books</h1>
    </div>
    </div>
    </div>

    </div>

    <div class="content mt-3">
        <form name="form1" action="" method="post">
            <input type="text" name="t1" class="form-control" placeholder="Enter Books Name" >
            <input type="submit" name="submit1" value="Search Books" class="btn btn-dark">
        </form >
        <hr>
        <?php
        if(isset($_POST["submit1"]))
        {
            $res = mysqli_query($link, "select * from add_books where books_name like ('$_POST[t1]%')");
            //$res1=mysqli_query($link,"select fine from fine where books_title like ('$_POST[t1]%')");
            echo "<table class='table table-bordered'>";

            echo "<tr>";
            echo "<th>";
            echo "Books Image";
            echo "</th>";
            echo "<th>";
            echo "Books Name";
            echo "</th>";

            echo "<th>";
            echo "Books Author Name";
            echo "</th>";
            echo "<th>";
            echo "Books Publication Name";
            echo "</th>";
            echo "<th>";
            echo "Books purchase Date";
            echo "</th>";
            echo "<th>";
            echo "Books Price";
            echo "</th>";
            echo "<th>";
            echo "Books Quantity";
            echo "</th>";
            echo "<th>";
            echo "Available Quantity";
            echo "</th>";


            echo "</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>"; ?><img src="<?php echo $row["books_image"]; ?>" height="100"
                                    width="100"><?php echo "</td>";
                echo "<td>";
                echo $row["books_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_author_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_publication_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_purchase_date"];
                echo "</td>";
                echo "<td>";
                echo $row["books_price"];
                echo "</td>";
                echo "<th>";
                echo $row["books_qty"];
                echo "</td>";
                echo "<td>";
                echo $row["available_qty"];
                echo "</td>";

            }
            echo "</table>";
        }
        else {
            $res = mysqli_query($link, "select * from add_books");
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<th>";
            echo "Books Image";
            echo "</th>";
            echo "<th>";
            echo "Books Name";
            echo "</th>";
            echo "<th>";
            echo "Books Author Name";
            echo "</th>";
            echo "<th>";
            echo "Books Publication Name";
            echo "</th>";
            echo "<th>";
            echo "Books purchase Date";
            echo "</th>";
            echo "<th>";
            echo "Books Price";
            echo "</th>";
            echo "<th>";
            echo "Books Quantity";
            echo "</th>";
            echo "<th>";
            echo "Available Quantity";
            echo "</th>";

            echo "</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>"; ?><img src="<?php echo $row["books_image"]; ?>" height="100"
                                    width="100"><?php echo "</td>";
                echo "<td>";
                echo $row["books_name"];
                echo "</td>";

                echo "<td>";
                echo $row["books_author_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_publication_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_purchase_date"];
                echo "</td>";
                echo "<td>";
                echo $row["books_price"];
                echo "</td>";
                echo "<th>";
                echo $row["books_qty"];
                echo "</td>";
                echo "<td>";
                echo $row["available_qty"];
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