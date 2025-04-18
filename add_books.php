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
<h1>Insert Books</h1>
</div>
</div>
</div>

</div>


    <div class="content mt-3">
        <form name="form1" action="" method="post" class="col-lg-12" enctype="multipart/form-data">
            <br class="table">
                <tr>
                    <label for="" class="control-label mb-1">Books Title</label>
                </tr>
                <tr>
                    <input type="text"class="form-control" Width="1050px" name="bookname" required pattern="[A-Za-z\s]+">
                </tr>
                <tr>
                    <label for="" class="control-label mb-1">Books Image</label>
                </tr>
                <tr>
                    <div>
                        <div>

                            <input type="file" name="f1" class="form-control" Width="264px" onchange="readURL(this);" required="" >
                        </div>
                        <div align="center">
                            <img id="blah" src="./books_image/Books_528px.png"  align="center" Height="169px" Width="169px"/>
                        </div>
                    </div>
                </tr>


                <tr>
                    <label for="" class="control-label mb-1" Width="1050px">Books Author Name</label>
                </tr>
                <tr>
                    <input type="text"class="form-control" Width="1050px" name="bookauthor" required pattern="[A-Za-z\s]+">
                </tr>
                <tr>
                    <label for="" class="control-label mb-1">Publication Name</label>
                </tr>
                <tr><input type="text"class="form-control" Width="1050px" name="publication" required pattern="[A-Za-z\s]+"></tr>
            <?php

            $month = date('m');
            $day = date('d');
            $year = date('Y');

            $today = $year . '-' . $month . '-' . $day;
            ?>
                <tr><label for="" class="control-label mb-1">Books Purchase Date</label></tr>
                <tr><input type="date"class="form-control" Width="1050px" value="<?php echo $today; ?>" name="purchasedate" required=""></tr>
                <tr><label for="" class="control-label mb-1">Books price</label></tr>
                <tr><input type="text"class="form-control" Width="1050px" name="price" required pattern="[0-9]+"></tr>
                <tr><label for="" class="control-label mb-1">Books Copies</label></tr>
                <tr><input type="text"class="form-control" Width="1050px" name="qty" required pattern="[0-9]+"></tr>
                <tr><label for="" class="control-label mb-1"></label></tr>


                <tr><button type="submit" name="submit1" class="btn btn-lg btn-info btn-block" >Insert Books</button></tr>
            </br>


            </br>
            </table>

        </form>


    </div>
</div>

<?php
    if(isset($_POST["submit1"]))
    {
        $_SESSION["bookname"]=$_POST["bookname"];
        $_SESSION["bookauthor"]=$_POST["bookauthor"];
        $_SESSION["publication"]=$_POST["publication"];
        $_SESSION["purchasedate"]=$_POST["purchasedate"];
        $_SESSION["price"]=$_POST["price"];
        $_SESSION["qty"]=$_POST["qty"];

        $tm=md5(time());
        $fnm=$_FILES["f1"]["name"];
        $dst="./books_image/".$tm.$fnm;
        $dst1="books_image/".$tm.$fnm;
        $dst2="../librarian/books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
        $notfication="New Book Inserted..!";
        $_SESSION["dts2"]=$dst2;
        $_SESSION["notification"]=$notfication;

        mysqli_query($link ,"insert into  add_books values('','$_SESSION[bookname]','$dst1','$_SESSION[bookauthor]','$_SESSION[publication]','$_SESSION[purchasedate]','$_SESSION[price]','$_SESSION[qty]','$_SESSION[qty]','$_SESSION[librarian]')");

        mysqli_query($link,"insert into new_book_notification values ('','$_SESSION[bookname]','$_SESSION[dts2]','$_SESSION[bookauthor]','$_SESSION[publication]','$_SESSION[purchasedate]','$_SESSION[price]','$_SESSION[qty]','$_SESSION[notification]','no')");

        ?>
        <script type="text/javascript">
            //window.location = "new_book_notification.php"
            alert("Books insert successfully..!");
        </script>

<?php

    }
    include "footer.php";
    ?>
