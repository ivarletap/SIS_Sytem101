<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("../lib/config.php");
require("../lib/sqlQueries.php");
?>

<?php
if(!isset($_SESSION["manager"]))
{
    header("location:/comp353/adminLogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<?php require("headerManagement.php");?>

<body>
<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigationManagement.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Admin Home</div>
        <div class="panel-body">

        </div>
    </div>


</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="../js/functions.js"></script>

</body>



<script src="../js/control.js"></script>
</html>