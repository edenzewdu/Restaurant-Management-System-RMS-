<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book</title>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../files/stylejew.css">
   <!--- <link rel="scriptsheet" href="Untitled-1.js">-->
  

</head>
<body>
<?php include("header.php"); 
    ?>

<section>
    <h2 class="headings"> Books</h2>  
  <div class="MAIN">
  <div class="First">
  <img src="../images/images (6).jpeg"  width="200 px"  height="250px" alt="books" />
  <br>
  <p><b>Ethiopian role in African History</b><br>
    Availability: out stock<br>
   <b>price:200birr </b> <br><br>
    <span></span>
    <button>	
          Add to cart
          </button>
  <br><br>    
        </div>
        <br><br>                                              
                          
        <div class="secound">
          <img src="../images/images (4).jpeg"  width="200 px"  height="250px" alt="books" />
          <br>
          <p><b><big>Ethiopa</big></b><br>
              Availability: in stock<br>
            <b>price:150birr </b> <br><br>
            <span></span>
            <button type="button" class="buttons">	
                  Add to cart
                  </button>
                <br><br>
          
          </div>
  <br><br>                
  <div class="third">
  <img src="../images/emegua.jpg " width="200 px"  height="250px" alt="books" />
  <p><b><big>Emegua</big></b><br>
    Availability: in stock<br>
    <b>price:150birr </b> <br><br>
    <span></span>
    <button type="button">	
          Add to cart
          </button>
        <br><br>
  
  </div>
  <br><br>    
    <div class="forth">
  <img src="../images/images (2).jpeg"  width="200 px"  height="250px" alt="cultural Books"/>
  <br>
  <p><b><big>Ke admas beashager</big></b><br>
      Availability: in stock<br>
    <b>price:200birr </b> <br><br>
    <span></span>
    <button type="button">	
          Add to cart
          </button>
        <br><br>
  </div>
  <br><br>    
  <div class="fifth">
  <img src="../images/download (8).jpeg"   width="200 px"  height="250px" alt="book" />
  <br>
  <p><b><big>Merara Enet</big></b><br>
    Availability: in stock<br>
    <b>price:250birr </b> <br><br>
    <span></span>
    <button type="button">	
          Add to cart
          </button>
        <br><br>
  </div>
  <br><br>    
  <div class="six">
  <img src="../images/download (7).jpeg"  width="200 px"  height="250px" alt="Books" />
  <br>
  <p><b><big>Temsalet</big></b><br>
    Availability: out stock<br>
    <b>price:200birr </b> <br><br>
    <span></span> 
    <button type="button">	
          Add to cart
          </button>
        <br><br>
  
  </div>                         
  <br><br>                                                
    
  <div class="seven">
    <img src="../images/images (7).jpeg"  width="200 px"  height="250px" alt="Books" />
    <br>
    <p><b><big>Lelasew</big></b><br>
      Availability: in stock<br>
      <b>price:100birr </b> <br><br>
      <span></span>
      <button type="button">	
            Add to cart
            </button>
          <br><br>
    
    </div>                         
    <br><br>   
    
    <div class="eight">
      <img src="../images/images (8).jpeg"  width="200 px"  height="250px" alt="Baltina products" />
      <br>
    <p><b><big>Oromaye</big></b><br>
      Availability: in stock<br>
      <b>price:300birr </b> <br><br>
      <span></span>
      <button type="button">	
            Add to cart
            </button>
          <br><br>
      
      </div>                         
      <br><br> 
                          
              <br><br> 
            </section>
            <div class="select"> </div>
            


            <?php include("footer.php");?>
<?php include("signup.php");?>
</body>
</html>
<script type="text/javascript">

  var noti= document.querySelector('h1');
  var select= document.querySelector('.select');
  var button = document.getElementsByTagName('button');
  for(but of button)
  {
    but.addEventListener('click', (e) =>{
      var add = Number(noti.getAttribute('data-count')||0);
      noti.setAttribute('data-count',add + 1);
      noti.classList.add('zero');

var parent = e.target.parentNode;
var clone = parent.cloneNode(true);
select.appendChild(clone);
clone.lastElementChild.innerText = "Buy-now";
if(clone){
  noti.onclick =()=>{
    select.classList.toggle('display');
  }
}

/*var image = e.target.parentNode.querySelector('img');
var image = e.target.parentNode.querySelector('span');
var s_image = image.cloneNode(false);
span.appendChild(s_image);
span.classList.add('active');
setTimeout(()=>{
  span.appendChild(s_image);
  span.classList.remove('active');
}, 500)*/

         })
  }
</script>