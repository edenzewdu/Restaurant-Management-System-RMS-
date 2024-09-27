<?php 
	
	session_start();
	//require "includes/functions.php";
	require "../includes/db.php";
    if(!isset($_SESSION['adminLoggedIn'])) {
        header("location: ../includes/logout.inc.php");
    }
// Pagination variables
$per_page = 10; // Number of accounts per page

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $per_page;

// Retrieve accounts from the database
$accounts = $conn->query("SELECT * FROM accounts ");

// Generate the user list HTML
if ($accounts->num_rows) {
    $result = "<table class='table table-hover table-striped'>
                <thead>
                    <th>S/N</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </thead>
                <tbody>";

    $x = 1;

    while ($row = $accounts->fetch_assoc()) {
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $phone_No = $row['phone_no'];

        $result .= "<tr>
                        <td>$x</td>
                        <td>$username</td>
                        <td>$email</td>
                        <td>$phone_No</td>
                         </tr>";

        $x++;
    }

    $result .= "</tbody>
                </table>";
} else {
    $result = "<p style='color:red; padding: 10px; background: #ffeeee;'>No records available in the database yet</p>";
}


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sinque Restaurant</title>

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
	
	<script>
	
		function check() {
			
			return confirm("Are you sure you want to delete this record");
			
		}
	
	</script>
	
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
                    <a class="navbar-brand" href="#" style="color: #fff;">FOOD COLLECTION</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../includes/logout.inc.php" style="color: #fff;">
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
                                <h4 class="title">Food List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
								<?php echo $result; ?>
								
								<!-- <?php echo $pagination; ?> -->

                            </div>
                        </div>
                    </div>                    

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; 2022 <a href="#" style="color: #FF5722;">Sinque Restaurant</a>
                </p>
            </div>
        </footer>

    </div>
</div>
