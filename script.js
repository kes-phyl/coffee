

//storing the button

let signin = document.querySelector('.sign-up-btn');
let signup = document.querySelector('.sign-in-btn');
let loginPage = document.querySelector('.center');
let signupPage =document.querySelector('.create-account');


signin.addEventListener('click', (e)=>{
    loginPage.style.display='none';
    signupPage.style.display='block';
})

signup.addEventListener('click', (e)=>{
   signupPage.style.display='none';
   loginPage.style.display='block';
})