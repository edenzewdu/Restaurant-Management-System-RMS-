<?php
session_start();
//require "includes/functions.php";
require "includes/db.php";
if(isset($_SESSION['isLoggedIn'])){ 
    echo "<form action='includes/logout.inc.php' method='post'>
    <button type='submit' name='logout-submit' >Log out</button> 
    </form>";
    }
    
    elseif (!isset($_SESSION['isLoggedIn'])) { 
        header("location: includes/logout.inc.php");
    
    }

$msg = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])) {
			
			$title = $_POST["title"];
            $fname = preg_replace("#[^A-Za-z]#", "",$_POST["fname"]);
            $lname = preg_replace("#[^A-Za-z]#", "",$_POST["lname"]);
			$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			$phone = preg_replace("#[^0-9]#", "", $_POST['phone']);
            $guest = preg_replace("#[^0-9]#", "", $_POST['guest']);
			$date_res = htmlentities($_POST['date'], ENT_QUOTES, 'UTF-8');
			$time = htmlentities($_POST['time'], ENT_QUOTES, 'UTF-8');
			$suggestions = htmlentities($_POST['suggestions'], ENT_QUOTES, 'UTF-8');
			$status = "NOT CONFIRM";

            // mysql_real_escape_string($Title);
            // mysql_real_escape_string($FName);
            // mysql_real_escape_string($LName);
            // mysql_real_escape_string($Email);
            // mysql_real_escape_string($Phone);
            // mysql_real_escape_string($Guest);
            // mysql_real_escape_string($time);
            // mysql_real_escape_string($date);
            // mysql_real_escape_string($suggestions);
            // mysql_real_escape_string($status);


			if($fname !="" && $lname !="" && $guest != "" && $email && $phone != "" && $date_res != "" && $time != "" && $suggestions != "") {
				
				$check = $conn->query("SELECT * FROM reservation WHERE lname='".$lname."' AND fname='".$fname."' AND email='".$email."' AND phone='".$phone."' AND guest='".$guest."' AND date_res='".$date_res."' AND time='".$time."' LIMIT 1");
				
				if($check->num_rows) {
					
					$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>You have already placed a reservation with the same information</p>";
					
				}else{
					
					$insert = $conn->query("INSERT INTO reservation( lname, fname, email, phone,guest, date_res, time, suggestions) VALUES('".$lname."', '".$fname."', '".$email."', '".$phone."', '".$guest."', '".$date_res."', '".$time."', '".$suggestions."')");
                    
					
					if($insert) {
						
						$ins_id = $conn->insert_id;
						
						$reserve_code = "UNIQUE_$ins_id".substr($phone, 3, 8);
						
						$msg = "<p style='padding: 15px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Reservation placed successfully. Your reservation code is $reserve_code. Please Note that reservation expires after one hour</p>";
						
					}else{
						
						$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Could not place reservation. Please try again</p>";
						
					}
					
				}
				
			}else{
				
				$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Incomplete form data or Invalid data type</p>";
				
				print_r($_POST);
				
			}
			
		}
		
	}
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
    <style>
        /* Inline CSS styles */
        .panel-heading {
            background-color: #337ab7;
            color: #fff;
            padding: 10px;
            font-size: 18px;
        }

        .form-control {
            width: 100%;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .center-text {
            text-align: center;
        }

        .reservation-box {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .personal-info,
        .reservation-info {
            width: 50%;
            padding: 20px;
        }

        /* Add more inline CSS styles as needed */
    </style>
</head>
<body>
    <form action='reservation.php'>
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
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12 center-text">
                            <h1 class="page-header">BOOK YOUR TABLE</h1>
                        </div>
                    </div>
                    <div class="row reservation-box">
                        <div class="col-md-6 personal-info">
                            <div class="panel panel-primary">
                                <div class="panel-heading">PERSONAL INFORMATION</div>
                                <div class="panel-body">
                                    <form action="" name="form" method="post">
                                        <div class="form-group">
                                            <label>Title*</label>
                                            <select name="title" class="form-control" required>
                                                <option value selected></option>
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
                                            <input name="phone" type="text" class="form-control" required>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 reservation-info">
                            <div class="panel panel-primary">
                                <div class="panel-heading">RESERVATION INFORMATION</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>No of Guest</label>
                                        <input type="number" placeholder="How many guests" min="1" name="guest" id="guest" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input name="time" type="time" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input name="date" type="date" class="form-control">
                                    </div>
                                        <div class="form_group">
					
                                            <label>Suggestions <small><b>(E.g No of Plates, How you want the setup to be)</b></small></label><br/>
                                            <textarea name="suggestions" placeholder="your suggestions" class="form-control" required></textarea>
                                            <button name="submit" value="submit">RESERVE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
    </body>
</html>

<!-- <?php 
//require ;

// if(isset($_POST["submit"]))
// {
//     $controller = new Controller();
//     $controller->CheckCode();
// }
//?> -->
