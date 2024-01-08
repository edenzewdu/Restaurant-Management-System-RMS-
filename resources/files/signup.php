<?php
$fname = $lname = $email = $cii = $coo = $phones = $pswo =$rdb= $pswoo = $bd = "";
if($_SERVER["REQUEST METHOD"] == "POST"){
  $fname = test_input($_POST["fns"]);
  $lname = test_input($_POST["lns"]);
  $email = test_input($_POST["email"]);
  $bd = $post["birthdate"];
  $bd = $post["radiobtn"];

  $cii =   test_input($_POST["cis"]);
  $cos  =  test_input($_POST["cos"]);
  $phones= test_input($_POST["phone"]);
  $pswo =  test_input($_POST["psws"]);
  $pswoo = test_input($_POST["pswes"]);
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return data;
}
$pattern="[a-z0-9._%+-]+@[a-z0-9._]+\.[a-z]{2,}$";
if(!preg_match($pattern,$email)){
  echo "invalid email format";}
  else{
    echo "email is invalid";
}
if(!preg_match("+[0-9]{3}-[0-9]{2}-[0-9]{3}-[0-9]{4}",$phone){
  echo "please write as a format";}
  else{
    echo $phone;
}
if($data['psws'] !== $data['pswes']){
  die('password and confirmpassword should match!!!');
}

?>
<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content" method="post" action="<?php echo htmlspecialchars(&_SERVER("PHP_SELF"));?>">
      <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label class="firstlabel"><b>First Name</b></label>
        <input  id="fn" class="firstname" type="text" name="fns" placeholder="Enter first name" required>
        <label class="lastlabel"><b>Last name</b></label>
         <input  id="ln" class="lastname" type="text" name="lns"  placeholder="Enter last name"required>
         <label for="email"><b>Email</b></label>
         <input id="em" type="text" placeholder="example@example.com" name="email"  required>
         <label class="phone-number"><b>Phone Number</b></label>
         <input id="ph" class="number" type="text" name="phone" pattern="+[0-9]{3}-[0-9]{2}-[0-9]{3}-[0-9]{4}" placeholder="+251-91-234-5679" required>
         <label class="lastlabel"><b>Country</b></label>
         <input id="co" class="firstname" type="text" name="cos" placeholder="enter country" required>
         <label class="lastlabel"><b>City</b></label>
         <input id="ci" class="lastname" type="text" name="cis" placeholder="city" required>
            <label for="Bithday"><b>Birthday</b></label><br>
            <input id="bd" class="birthdate" type="date" name="birthdate" min="1900-01-01" max="2009-12-29" required> <br><br>

          
  <label for="choose" ><b>Gender</b></label><br>
  <label class="radio">
  <input id="rd1" class="radio-one" type="radio" checked="checked" name="rdiobtn">
  <span class="checkmark"></span>Female</label>
  <label class="radio"><input class="radio-two" type="radio" name="rdiobtn">
    <span class="checkmark"></span>Male</label>
           <label class="radio">
              <input id="rd2" class="radio-two" type="radio" name="rdiobtn" >
              <span class="checkmark"></span>
                 Prefer not to say
              </label><br><br>
              <label for="psw"><b>Password</b></label>
              <input id="ps1" type="password" placeholder="Enter Password" name="psws" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input id="ps2" type="password" placeholder="Repeat Password" name="pswes" required>

 
  
          
          <label>
            <input id="ch" type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
          </label>
    
          <p>By creating an account you agree to our <a href="#" style="color:rgb(247, 21, 70)">Terms & Privacy</a></p>

          <div class="clearfix">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <button id="bt" type="submit" class="signupbtn">Sign Up</button>
          </div>
        </div>
      </form>
      <?php 
echo "<h2>Your input is :-</h2>"
echo  "<br>"$fname;
echo "<br>";
echo $lname;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $coo;
echo "<br>";
echo $cii;
echo "<br>";
echo $bd;
echo "<br>";
echo $rdb;
echo"<br>";
echo $psws;

?>