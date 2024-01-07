const form= document.getElementById("form");
const username= document.getElementById("username");
const fullname= document.getElementById("fullname");
const email= document.getElementById("email");
const phone= document.getElementById("phone");
//const account= document.getElementById("bank_account");
const password= document.getElementById("password1");
const Cpassword= document.getElementById("password2"); 
let unaSecc=0;
let fnaSecc=0;
let emSecc=0;
let phoneSecc=0;
let cpasSecc=0; 
let pasSecc=0;
//let accSecc=0;
var validate = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

form.addEventListener('submit', (e)=>{
    
    e.preventDefault();
    checkInput();
});
 function checkInput(){
    const usernameValue= username.value.trim();
    const fullnameValue= fullname.value.trim();
    const emailValue=email.value.trim();
    const phoneValue=phone.value.trim();
    const CpasswordValue=Cpassword.value.trim();
    const passwordValue=password.value.trim();
    //const accountValue= account.value.trim();
    if(usernameValue===''){
        setErrorFor(username, 'Username can not be left blank.');     
    }else{
        unaSecc=1;
        setSuccessFor(username);     
    }
    if(fullnameValue===''){
        console.log("im here");
        setErrorFor(fullname, 'Full Name can not be left blank.');     
    }else{
        fnaSecc=1;
        setSuccessFor(fullname);     
    }
    if (emailValue==''){
        setErrorFor(email, 'email can not be left blank.');
        
   }else if(emailValue.match(validate)){
       emSecc=1;  
       setSuccessFor(email); 
        
   }
   else{
        setErrorFor(email, 'Please fill the email with aproperate email form.');  
       
   }
   if(phoneValue===''){
        
    setErrorFor(phone, 'Phone can not be left blank.');   
 
}
else if(phoneValue==NaN){
    setErrorFor(phone, 'please enter a number.');
}else if(phoneValue.length!=10 ){
    setErrorFor(phone, 'Phone NUmber must be 10 Digit.');
}
else{
    phoneSecc=1;
    setSuccessFor(phone);     

}
/*if(accountValue===''){
        
    setErrorFor(account, 'Account can not be left blank.');   
 
}
else if(accountValue==NaN){
    setErrorFor(account, 'please enter a number.');
}
else if(accountValue.length!=13){
    setErrorFor(account, 'please enter 13 digit number.');
}
else{
    accSecc=1;
    setSuccessFor(account);     

}*/
if(passwordValue===''){
    setErrorFor(password, 'Password can not be left blank.');     
}else if(passwordValue.length<6 || passwordValue.length>18){
    setErrorFor(password, 'Password Must be at least 6 character.');
}
else{
    pasSecc=1;
    setSuccessFor(password);     


}
if(CpasswordValue===''){
        
    setErrorFor(Cpassword, 'Please confirm your password.');
}
else if(passwordValue!=CpasswordValue){
    setErrorFor(Cpassword, 'Password does not match.');
}
else{
    cpasSecc=1;
    setSuccessFor(Cpassword);     

}
    if(unaSecc==1 && fnaSecc==1 && emSecc==1&& phoneSecc==1 && cpasSecc==1 && pasSecc==1){
        window.location.href = "../home.php"; 
       }
}
function setErrorFor(input, message){
    
    const checker= input.parentElement;// getting .checker class
    
    const small= checker.querySelector("small");
    console.log(checker+"username excuted");
    //add error message inside small
    small.innerText=message;
    //add error class
    
    checker.className='checker error';
}
function setSuccessFor(input){
    const checker= input.parentElement;
    checker.className='checker success';
}


