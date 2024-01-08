<?php 
session_start();
include "includes/ideasforall.php" ;
include "includes/db.php";
 

    if(!isset($_SESSION['isLoggedIn'])) {
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

    <!--Book reservation-->
    <section class="order">
        <div class="row">
            <div id="bookTable" class="book">
                <h2 id="bookNow">Book your table</h2>
                <p><?php echo $msg;?></p>
                <p>We offer you the best reservation service </p>
                <div class="time">
                    <!-- <h3>Time open</h3>
                    <h4 id="heading-time">Monday-Sunday</h4>
                    <p>7am-11am(Breakfast)</p>
                    <p>11am-9pm(Lunch/Dinner)</p> -->
                </div>
            </div>
            <div class="form-book">
                <form id="form-table" action="Book.php" method="POST">
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
                                            <input name="time" type ="time" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input name="date" type ="date" class="form-control">
                                            
                                        </div>
                                        <div class="form_group">
					
                                            <label>Suggestions <small><b>(E.g No of Plates, How you want the setup to be)</b></small></label><br/>
                                            <textarea name="suggestions" rows="2" cols="3" placeholder="your suggestions" class="form-control" required></textarea><br><br>
                                            <button style=' color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px;' name="submit" value="submit">RESERVE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
         <div class="row">
</div>
<div class="row">
</div>
<div class="row">
</div>
           <!-- <div id="takeAway"class="book">
                <h2 >TAKE AWAY</h2>
                 <p>TAke home and enjoy with our delicious Ethiopian Food</p>
            </div>
            <div class="form-book">
                <form action="" method="get">
                     
                    <label for="pickup">Time to pickup</label>
                    <input type="time" name="pickup" id="">
                    <div class="continer">
                        <button onclick = "window.locatin.href='menuu.html'">Menu</button>
                    </div>
                    <input type="submit" value="Submit">


                </form>
            </div>
        </div>
        <div class="row">
            <div id="delivery" class="book">
                <h2>DELIVERY</h2>
                <p>Your favorite food delivered to your door</p>
            </div>
            <div class="form-book">
                <form action="" method="get">
                     
                     
                    <label for="address">Enter your address</label>
                    <input type="text" name="address" id="">
                    <div class="continer">
                        <button onclick = "window.location.href='menuu.html'">Menu</button>
                    </div>
                    <input type="submit" value="Submit">

                </form>
            </div>
        </div> -->


    </section>
    
<?php include "includes/footer1.php" ?>