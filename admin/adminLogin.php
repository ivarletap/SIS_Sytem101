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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comp 335</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/basic-template.css" rel="stylesheet" />



    <link href="../css/general.css" rel="stylesheet" type="text/css">
    <link href="../css/navColor.css" rel="stylesheet" type="text/css">
    <!--    <link href="../css/datepicker.css" rel="stylesheet" type="text/css">-->

    <!-- BootstrapValidator CSS -->
    <link href="../css/bootstrapValidator.min.css" rel="stylesheet"/>


    <link href="../css/general.css" rel="stylesheet" type="text/css">
    <link href="../css/navColor.css" rel="stylesheet" type="text/css">

    <!-- jQuery and Bootstrap JS -->
    <script src="../js/jquery.min.js" type="text/javascript"></script>


    <!-- BootstrapValidator -->
    <script src="../js/bootstrapValidator.min.js" type="text/javascript"></script>

    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <script src="../js/bootstrap-datepicker.min.js"></script>
    <script src="../js/formValidation.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <script src="../js/control.js"></script>

</head>
<body>
<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigationAdmin.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Login</div>
        <div class="panel-body">
            <form id="adminLogin" method="post" role="form" class="form-horizontal" action="loginProcess.php">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="username">User Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-2 control-label">PassWord :</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="PassWord" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-md-2 control-label">Confirm PassWord :</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="PassWord Confirmation" value="">
                    </div>
                </div>









                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-offset-2">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-danger" type="reset" onclick="location.reload(); ">reset</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="../js/functions.js"></script>

</body>



<script src="../js/control.js"></script>
</html>
