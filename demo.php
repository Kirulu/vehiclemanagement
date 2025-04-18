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
include "header.php";
?>
<h1>Dashboard</h1>
</div>
</div>
</div>

</div>
    <div class="content mt-3">

    </div>
</div>
<?php
include "footer.php";
?>
