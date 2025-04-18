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

function fill_title($link)
{
    $output = '';
    $sql = "select books_name from add_books";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["books_name"].'">'.$row["books_name"].'</option>';
    }
    return $output;
}
function fill_qty($link)
{
    $output = "--Select Book--";
    //$sql = "SELECT available_qty FROM add_books";
   // $result = mysqli_query($link, $sql);
   // while($row = mysqli_fetch_array($result))
   // {

      //  $output .= ''.$row["available_qty"].'';

    //}
    return $output;
}




?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<h1>Issue Books</h1>
</div>
</div>
</div>

</div>
    <div class="content mt-3">
        <form name="form1" action="" method="post" class="col-lg-12">
            <table class="table">
                <tr>
                    <td style="width: 200px;"><label for="" class="control-label mb-1">Select Enrollment No</label></td>
                    <td style="width: 250px" >
                        <select name="enr" class="form-control "  >

                            <?php
                            $res=mysqli_query($link,"select enrolment from member_registration");

                            while ($row=mysqli_fetch_array($res))
                            {
                                //$enrolment1=$row["enrolment"];
                                echo "<option>";
                                echo $row["enrolment"];
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="submit" value="Search" name="submit1" class="form-control btn btn-dark" ></td>

                </tr>
                <?php
                if(isset($_POST["submit1"]))
                {

                    $res2=mysqli_query($link, "select * from member_registration where enrolment='$_POST[enr]'");
                    while ($row2=mysqli_fetch_array($res2))
                     {
                    $firstname=$row2["firstname"];
                    $lastname=$row2["lastname"];
                    $username=$row2["username"];
                    $email=$row2["email"];
                    $contact=$row2["contact"];
                    $rdate=$row2["register_date"];
                    $enrolment=$row2["enrolment"];
                    $_SESSION["enrolment"]=$enrolment;
                    $_SESSION["date"]=$rdate;
                    $_SESSION["username"]=$username;

                    }

                        ?>
                        <?php

                        $month = date('m');
                        $day = date('d');
                        $year = date('Y');

                        $today = $year . '-' . $month . '-' . $day;
                        $date=new DateTime($today);
                        $date->add(new DateInterval('P7D'));
                        $date2=$date->format('Y-m-d');
                        $_SESSION["ereturndate"]=$date2;
                        //$_SESSION["issuedate"]=$today;
                        ?>



            </table>

                    <table class="table table-bordered">
                        <tr>
                            <td><label for="" class="control-label mb-1">Enrollment No</label></td>
                            <td><input type="text" name="enrollment" value="<?php echo $enrolment ?>" class="form-control" disabled></td>
                        </tr>


                        <tr>
                            <td><label for="" class="control-label mb-1">Member Name</label></td>
                            <td ><input type="text" name="name" value="<?php echo $firstname.' '.$lastname ?>" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td><label for="" class="control-label mb-1">Member Registration Date</label></td>
                            <td><input type="date" name="rdate" value="<?php echo $_SESSION["date"] ?>" class="form-control" disabled ></td>
                        </tr>
                        <tr>
                            <td><label for="" class="control-label mb-1">Member Contact</label></td>
                            <td><input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td><label for="" class="control-label mb-1">Member Email</label></td>
                            <td><input type="text" name="email" value="<?php echo $email ?>" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td><label for="" class="control-label mb-1">Books Title</label></td>

                            <td >
                                <select name="title" id="title" class="form-control " onchange='changeOwner();'>
                                   <option value="" disabled selected>--Select Book--</option>
                                        <?php echo fill_title($link); ?>
                                </select>


                            </td>
                            <?php

                            ?>


                        </tr>

                            <td><label for="" class="control-label mb-1">Book Issue Date</label></td>
                            <td><input type="date" value="<?php echo $today; ?>" id="date" name="issuedate" class="form-control" ></td>
                        </tr>
                        </tr>

                        <td><label for="" class="control-label mb-1">Book Expected Return Date</label></td>
                        <td><input type="date" value="<?php echo $today; ?>" id="expected" name="expected" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td><label for="" class="control-label mb-1">Member Username</label></td>
                            <td><input type="text" name="username" value="<?php echo $username ?>" class="form-control" disabled ></td>
                        </tr>
                        <tr>

                        <tr>
                            <td><label for="" class="control-label mb-1">Available Books Copies</label></td>
                            <td><label type="text" id="avlableqty" class="form-control"  >
                                    <?php echo fill_qty($link) ?>
                                </label></td>
                        </tr>
                        <tr><td colspan="2"><input type="submit" value="Issue Books" name="submit2" class="btn btn-lg btn-info btn-block" ></></td></tr>

                        <?php


                }
            ?>


                    </table>


        </form>
        <?php

       // $_SESSION["ereturndate"]=$_POST["ereturndate"];



        ?>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript">

               // var title = $("#title option:selected").val();
                $("#title").change(function () {
                    $.ajax({ url: "getdata.php",

                        data: {'title':$(this).val()},

                        type: "post",

                        success: function(msg){$('.result').val(msg)}
                });

            }
        </script>
        <?php

        ?>

        <?php



        if(isset($_POST["submit2"]))
        {

            $qty=0;
            $res=mysqli_query($link,"select * from add_books where books_name='$_POST[title]'");
            while ($row=mysqli_fetch_array($res))
            {
                $qty=$row["available_qty"];
            }
            if ($qty==0)
            {
                ?>
                <div class="alert alert-danger " align="center">
                    <strong style="...">This book is not available in the stock</strong>
                </div>
                <?php
            }
            else
            {
                $count = 0;
                $issuedate=$_POST["issuedate"];
                $_SESSION["issue_date"]=$issuedate;
                $expected=$_POST["expected"];
                $_SESSION["expected"]=$expected;
                $title=$_POST["title"];
                $_SESSION["title"]=$title;
                $res3=mysqli_query($link,"select member_enrollment,books_name from issue_books where member_enrollment='$_SESSION[enrolment]'");

                $count=mysqli_num_rows($res3);

                $res4=mysqli_query($link,"select books_image from add_books where books_name='$_SESSION[title]'");
                while ($row4=mysqli_fetch_array($res4))
                {
                    $book_image=$row4["books_image"];
                    $_SESSION["books_image"]=$book_image;
                }

                if($count<3)
                {
                mysqli_query($link,"insert into issue_books values('','$_SESSION[enrolment]','$_POST[name]','$_SESSION[date]','$_POST[contact]','$_POST[email]','$_SESSION[title]',' $_POST[issuedate]','NULL','$_SESSION[username]','$_SESSION[expected]')");
                mysqli_query($link,"update add_books set available_qty=available_qty-1 where books_name='$_POST[title]'");
                mysqli_query($link,"insert into remainig_dates_notification values ('','$_SESSION[title]','$_SESSION[books_image]','$_POST[name]','$_SESSION[username]','$_SESSION[enrolment]','$_POST[issuedate]','$_SESSION[expected]','You have a book to return..!','no')");
                ?>
                <script type="text/javascript">
                    alert("Book Issued Successfully..!");
                    window.location.href=window.location.href;
                </script>
                <?php
                }
                else
                {
                ?>
                <div class="alert alert-danger " align="center">
                    <strong style="...">One Members can borrow a maximum of 3 books at a time</strong>
                </div>
            <?php
                }

            }
        }

        ?>
    </div>
</div>

<?php
include "footer.php";
?>
<script>
    $(document).ready(function(){
        $('#title').change(function(){
            var books_name = $(this).val();
            $.ajax({
                url:"getdata.php",
                method:"POST",
                data:{books_name:books_name},
                success:function(data){
                    $('#avlableqty').html(data);
                }
            });
        });
    });
</script>
