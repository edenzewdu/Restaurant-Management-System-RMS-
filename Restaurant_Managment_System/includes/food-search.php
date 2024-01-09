
    <?php include('../menu.php'); 
    include('db.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 

                //SQL Query to Get foods based on search keyword
                //$search = burger '; DROP database name;
                // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                $sql = "SELECT * FROM food WHERE food_name LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether food available of not
                if($count>0)
                {
                    //Food Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['food_name'];
                        $price = $row['food_price'];
                        $description = $row['food_description'];
                        //$image_name = $row['image_name'];


                     echo "<div class='single-menu'>
				<img class='food-item-image' src='FoodPics/".$row['id'].".jpg'  />
					<div class='menu-content'>
						<h4 class='food-item-title'>".$row['food_name']."</h4>
						<p >".substr($row['food_description'], 0, 33)."...</p>
						<span class='food-item-price'>#".$row['food_price']."</span>
						<div class='continer'>
						</div>
					</div>
			</div>";}
                             
                                    // Check whether image name is available or not
                                    // if($image_name=="")
                                    // {
                                    //     //Image not Available
                                    //     echo "<div class='error'>Image not Available.</div>";
                                    // }
                                    // else
                                    // {
                                    //     //Image Available
                                    //     

                                    // }
                            //     
                                
                            // </div>

                            // <div class="food-menu-desc">
                            //     <h4><?php echo $title; </h4>
                            //     <p class="food-price"><?php echo $price; </p>
                            //     <p class="food-detail">
                            //         <?php echo $description; 
                            //     </p>
                            //     <br>

                        //         <a href="#" class="btn btn-primary">Order Now</a>
                        //     </div>
                        // </div>

                        
                    
                }
                else
                {
                    //Food Not Available
                    echo "<div class='error'>Food not found.</div>";
                }
            
            ?>

            

            //<div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('footer1.php'); ?>