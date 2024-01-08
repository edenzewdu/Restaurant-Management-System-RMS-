<?php
include '../include/db.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>TABLE RESERVATION</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/custom-styles.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a  href="../views/index.php"><i class="fa fa-home"></i>Homepage</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">TABLE RESERVATION</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">PERSONAL INFORMATION</div>
                                <div class="panel-body">
                                    <form action="" name="form" method="post">
                                        <div class="form-group">
                                            <label>Title*</label>
                                            <select name="title" class="form-control" class="form-control" required >
                                                <option value selected ></option>
                                                <option value="Miss.">Miss.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="fname" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input name="phone" type ="text" class="form-control" required>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">RESERVATION INFORMATION</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                        <label>No of Guest</label>
					                    <input type="number" placeholder="How many guests" min="1" name="guest" id="guest" class="form-control" required>
					                    </div>
                                        <div class="form-group">
                                            <label>Time</label>
                                            <input name="tme" type ="time" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input name="dte" type ="date" class="form-control">
                                            
                                        </div>
                                        <div class="form_group">
					
                                            <label>Suggestions <small><b>(E.g No of Plates, How you want the setup to be)</b></small></label>
                                            <textarea name="suggestions" placeholder="your suggestions" class="form-control" required></textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 
require 'includes/Book.inc.php';

if(isset($_POST["submit"]))
{
    $controller = new Controller();
    $controller->CheckCode();
}
?>
