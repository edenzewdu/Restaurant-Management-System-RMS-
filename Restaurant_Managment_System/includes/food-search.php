<!--  -->

<?php
session_start();
include("ideasforall.php");
include_once('db.php');

// Check if the search form is submitted
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    
    // Prepare the SQL query to search for menus
    $query = "SELECT * FROM food WHERE food_name LIKE '%$search%' OR food_price LIKE '%$search%' OR food_category LIKE '%$search%'";
    
    // Execute the query
    $result = mysqli_query($conn, $query);?>

<h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

</div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
<div class="container">
    <?php
    
    // Check if any menus match the search criteria
    if (mysqli_num_rows($result) > 0) {
        $menuHTML = '';
        
        while ($row = mysqli_fetch_assoc($result)) {
            $menuHTML .= "<div class='single-menu'>
                <img class='food-item-image' src='../FoodPics/".$row['id'].".jpg' />
                <div class='menu-content'>
                    <h4 class='food-item-title'>".$row['food_name']."</h4>
                    <p>".substr($row['food_description'], 0, 33)."...</p>
                    <span class='food-item-price'>#".$row['food_price']."</span>
                    <div class='container'>
                        <button class='food-item-button' onclick=\"window.location.href='#cart'\">Add to Cart</button>
                    </div>
                </div>
            </div>";
        }
        
        echo $menuHTML;
    } else {
        echo "<h3 style='text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>No menus found</h3>";
    }
}
?>

            //<div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include  "footer1.php"; ?>



