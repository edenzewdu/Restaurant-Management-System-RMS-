<?php


$msg = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])) {
			
			$title = $_POST["title"];
            $fname = preg_replace("#[^A-Za-z]#", "",$_POST["fname"]);
            $lname = preg_replace("#[^A-Za-z]#", "",$_POST["lname"]);
			$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			$phone = preg_replace("#[^0-9]#", "", $_POST['phone']);
            $guest = preg_replace("#[^0-9]#", "", $_POST['guest']);
			$date_res = htmlentities($_POST['dte'], ENT_QUOTES, 'UTF-8');
			$time = htmlentities($_POST['time'], ENT_QUOTES, 'UTF-8');
			$suggestions = htmlentities($_POST['suggestions'], ENT_QUOTES, 'UTF-8');
			$status = "NOT CONFIRM";


			if($fname !="" && $lname !="" && $guest != "" && $email && $phone != "" && $date_res != "" && $time != "" && $suggestions != "") {
				
				$check = $conn->query("SELECT * FROM reservation WHERE lname='".$lname."' AND fname='".$fname."' AND guest='".$guest."' AND email='".$email."' AND phone='".$phone."' AND date_res='".$date_res."' AND time='".$time."' LIMIT 1");
				
				if($check->num_rows) {
					
					$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>You have already placed a reservation with the same information</p>";
					
				}else{
					
					$insert = $conn->query("INSERT INTO reservation( title,lname, fname, email, phone, date_res, time, suggestions) VALUES('".$title."','".$lname."', '".$fname."', '".$email."', '".$phone."', '".$guest."', '".$date_res."', '".$time."', '".$suggestions."')",
                    mysql_real_escape_string($Title),
                    mysql_real_escape_string($FName),
                    mysql_real_escape_string($LName),
                    mysql_real_escape_string($Email),
                    mysql_real_escape_string($Phone),
                    mysql_real_escape_string($Guest),
                    mysql_real_escape_string($time),
                    mysql_real_escape_string($date),
                    mysql_real_escape_string($suggestions),
                    mysql_real_escape_string($status));
					
					if($insert) {
						
						$ins_id = $db->insert_id;
						
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


