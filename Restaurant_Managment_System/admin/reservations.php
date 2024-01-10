<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
session_start();
// require "includes/functions.php";
require "../includes/db.php";
if (!isset($_SESSION['adminLoggedIn'])) {
    header("location: ../includes/logout.inc.php");
    exit; // Add exit to prevent further execution
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = "";
$pagenum = "";
$per_page = 20;

$count = $conn->query("SELECT * FROM reservation");

$pages = ceil((mysqli_num_rows($count)) / $per_page);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $per_page;

$reserve = $conn->query("SELECT * FROM reservation LIMIT $start, $per_page");

if ($reserve->num_rows > 0) {
    $result = "<table class='table table-hover'>
                <thead>
                    <th>S/N</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>No of Guests</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Suggestions</th>
                    <th>Action</th>
                </thead>
                <tbody>";

    $x = 1;

    while ($row = $reserve->fetch_assoc()) {
        $reserve_id = $row['reserve_id'];
        $no_of_guest = $row['guest'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $phone = $row['phone'];
        $date_res = $row['date_res'];
        $time = $row['time'];
        $suggestions = $row['suggestions'];

        $result .=  "<tr>
                        <td>$x</td>
                        <td>$fname</td> 
                        <td>$lname</td>
                        <td>$no_of_guest</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$date_res</td>
                        <td>$time</td>
                        <td>$suggestions</td>
                        <td>
                            <a href=\"?approve=" . $row['reserve_id'] . "\">Approve</a>
                            <a href=\"?reject=" . $row['reserve_id'] . "\">Reject</a>
						</td>
                    </tr>";

        $x++;
    }

    $result .= "</tbody>
                </table>";
} else {
    $result = "<p style='color:red; padding: 10px; background: #ffeeee;'>No Table reservations available yet</p>";
}

// Approve action
if (isset($_GET['approve'])) {
    $approve = preg_replace("#[^0-9]#", "", $_GET['approve']);
    if ($approve != "") {
        $sql = $conn->query("UPDATE reservation SET status='Approved' WHERE reserve_id='" . $approve . "'");
        if ($sql) {
            // Fetch the reservation details
            $reservationDetails = $conn->query("SELECT * FROM reservation WHERE reserve_id='" . $approve . "'");
            if ($reservationDetails->num_rows > 0) {
                $row = $reservationDetails->fetch_assoc();
                $lname = $row['lname'];
                $email = $row['email'];

                // Send an email to the user
                require "mail.php";
                sendReservationApprovalEmail($email, $lname);

                echo "<script>alert('Successfully approved')</script>";
            } else {
                echo "<script>alert('Operation Unsuccessful. Please try again')</script>";
            }
        }
    }
}

// Reject action
if (isset($_GET['reject'])) {
	echo "
		<div id='rejectModal' class='modal'>
			<div class='modal-content'>
				<span class='close'>&times;</span>
				<form method='get' action=''>
					<input type='text' name='reject' id='rejectId'>
					<label for='reason'>Reason:</label>
					<textarea name='reason' id='reason' rows='4' cols='50' required></textarea>
					<input type='submit' value='Reject Reservation'>
				</form>
			</div>
		</div>";
	
    $reject = preg_replace("#[^0-9]#", "", $_GET['reject']);
    $reason = preg_replace("#[^0-9]#", "", $_GET['reason']);
	

	if ($reject != "") {
    // Update the reservation status to "Rejected" and save the rejection reason
    $sql = $conn->query("UPDATE reservation SET status='Rejected' WHERE reserve_id='" . $reject . "'");
    if ($sql) {
        // Fetch the reservation details
        $reservationDetails = $conn->query("SELECT * FROM reservation WHERE reserve_id='" . $reject . "'");
        if ($reservationDetails > 0) {
                $row = $reservationDetails->fetch_assoc();
                $lname = $row['lname'];
                $email = $row['email'];

                // Send an email to the user
                require "mail.php";
                sendReservationRejectionEmail($email, $lname, $reason);

                echo "<script>alert('Reservation rejected and email sent.')</script>";
            } else {
                echo "<script>alert('Operation Unsuccessful. Please try again.')</script>";
            }
        }
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SEN'Q Restaurant</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	
    <link href="assets/css/style.css" rel="stylesheet" />
	
	
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="#000" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<?php require "includes/side_wrapper.php"; ?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background: #3a5968;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #fff;">TABLE RESERVATIONS</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php" style="color: #fff;">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Reservation List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
								<?php echo $result; ?>

    <!-- Pagination links -->
    <?php
    if ($pages >= 1 && $page <= $pages) {
        for ($x = 1; $x <= $pages; $x++) {
            echo ($x == $page) ? "<a href='?page=$x'><strong>$x</strong></a> " : "<a href='?page=$x'>$x</a> ";
        }
    }
    
	
	?>
                            </div>
                        </div>
                    </div>                    

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; 2016 <a href="index.php" style="color: #FF5722;">SEN'Q Restaurant</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<script>
        // Disable button links after rejection or approval
        var buttons = document.getElementsByTagName('button');
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].disabled = true;
        }
    </script>
	
	

</html>
