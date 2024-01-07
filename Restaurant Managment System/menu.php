<?php 
	
	session_start();
	include("includes/ideasforall.php");
	//require "admin/includes/functions.php";
	require "includes/db.php";
	
	$bfast = "";
	$lunch = "";
	$snack = "";
	$beverage = "";
	
	$get_recent = $conn->query("SELECT * FROM food");
	
	if($get_recent->num_rows) {
		
		while($row = $get_recent->fetch_assoc()) {
			
			if($row['food_category'] == "breakfast") {
				
				$bfast .= "<div class='single-menu'>
				<img class='food-item-image' src='FoodPics/".$row['id'].".jpg'  />
								<div class='menu-content'>
									<h4 class='food-item-title'>".$row['food_name']."</h4>
									<p >".substr($row['food_description'], 0, 33)."...</p>
									<span class='food-item-price'>#".$row['food_price']."</span>
									<div class='continer'>
										<button class='food-item-button' onclick='window.location.href='#cart' '>Add to Cart</button>             
									</div>
								</div>
							</div>";
				
			}elseif($row['food_category'] == "lunch") {
				
				$lunch .="<div class='single-menu'>
				<img class='food-item-image' src='FoodPics/".$row['id'].".jpg'  />
					<div class='menu-content'>
						<h4 class='food-item-title'>".$row['food_name']."</h4>
						<p >".substr($row['food_description'], 0, 33)."...</p>
						<span class='food-item-price'>#".$row['food_price']."</span>
						<div class='continer'>
							<button class='food-item-button' onclick='window.location.href='#cart' '>Add to Cart</button>             
						</div>
					</div>
			</div>";
	
			}elseif($row['food_category'] == "snacks") {
				
				$snack .= "<div class='single-menu'>
				<img class='food-item-image' src='FoodPics/".$row['id'].".jpg'  />
					<div class='menu-content'>
						<h4 class='food-item-title'>".$row['food_name']."</h4>
						<p >".substr($row['food_description'], 0, 33)."...</p>
						<span class='food-item-price'>#".$row['food_price']."</span>
						<div class='continer'>
							<button class='food-item-button' onclick='window.location.href='#cart' '>Add to Cart</button>             
						</div>
					</div>
			</div>";
	
				
			}elseif($row['food_category'] == "beverage") {
				
				$beverage .= "<div class='single-menu'>
				<img class='food-item-image' src='FoodPics/".$row['id'].".jpg'  />
					<div class='menu-content'>
						<h4 class='food-item-title'>".$row['food_name']."</h4>
						<p >".substr($row['food_description'], 0, 33)."...</p>
						<span class='food-item-price'>#".$row['food_price']."</span>
						<div class='continer'>
							<button class='food-item-button' onclick='window.location.href='#cart' '>Add to Cart</button>             
						</div>
					</div>
			</div>";
	
			}
			
		}
		
	}else{
		
		
		
	}
	
?>
<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>
	
<title>SINQUE Restaurant</title>
</head>

<body>

<div class="breakfast">
   
    <div class="sub-title">
        <h3><span>Breakfast </span> Menu</h3>
    </div>
    <div class="all-menu">
			<?php echo ($bfast == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>" : $bfast; ?>

	</div>
</div>
<!-------------Breakfast Menu Ends------------->
<!-----Lunch and snack starts------------------>
<div class="lunchsnack">
    <div class="sub-title">
        <h3><span>Lunch </span> Menu</h3>
    </div>
    <div class="all-menu">
				<?php echo ($lunch == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>" : $lunch; ?>

	</div>
</div>

<!------------------Lunch and diiner menu ends--------------->



<!-------------------Snack menu starts----------------------->

<div class="snack">
    <div class="sub-title">
        <h3><span>Snack </span> menu</h3>
    </div>
    <div class="all-menu">
			<?php echo ($snack == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>" : $snack; ?>
			
        </div> 
    
</div>

<!-------------------Snack menu ends------------------------->
<!-------------------Beverage menu starts-------------------->
<div class="beverage">
    <div class="sub-title">
        <h3><span>Beverage </span> Menu</h3>
    </div>
    <div class="all-menu">
        
			<?php echo ($beverage == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>" : $beverage; ?>
			
    </div>
   
</div>

<!-------------------Beverage menu ends---------------------->
<!--service ends-->
 
<div class="cart" id="cart">
    <h2 class="section-header">CART</h2>
    <div class="cart-row">
        <span class="cart-item cart-header cart-column">ITEM</span>
        <span class="cart-price cart-header cart-column">PRICE</span>
        <span class="cart-quantity cart-header cart-column">QUANTITY</span>
    </div>

    <div class="cart-items">
    </div>
    <div class="cart-total">
        <strong class="cart-total-title">Total</strong>
        <span class="cart-total-price">0birr</span>
    </div>
    <button class="btn btn-primary btn-purchase" type="button">ORDER</button>
</div> 


<?php include  "includes/footer1.php"; ?>



