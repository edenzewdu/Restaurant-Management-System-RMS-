const email= document.getElementById("email");
const pass= document.getElementById("password");
const form= document.getElementById("form");

//let  unaSecc=0;
let  emSecc=0;
let passSecc=0;

var validate = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

form.addEventListener('submit', (e)=>{
   
   e.preventDefault();
   checkInput();
});
function checkInput(){
   const emailValue= email.value.trim();
   const passValue = pass.value.trim();

   if(emailValue==='' ){
       setErrorFor(email, 'Enter your email.');     
   }
       
  else if(!(emailValue.match(validate))){
     
      setErrorFor(email,"Enter the proper format for your email .");
       
       
  }
  else{
   emSecc=1;
   setSuccessFor(email);     
}
if(passValue===''){
   setErrorFor(pass, 'Password can not be left blank.');     
}else if(passValue.length<6 || passValue.length>18){
   setErrorFor(pass, 'Password Must be at least 6 character.');
}
else{
   passSecc=1;
   setSuccessFor(pass);     


}
if(emSecc==1 && passSecc==1 ){
   window.location.href = "../home.php"; 
}
}
function setErrorFor(input, message){
   
   const checker= input.parentElement;// getting .checker class
   
   const small= checker.querySelector("small");
   
   //add error message inside small
   small.innerText=message;
   //add error class
   
   checker.className='checker error';
}
function setSuccessFor(input){
   const checker= input.parentElement;
   checker.className='checker success';
}


