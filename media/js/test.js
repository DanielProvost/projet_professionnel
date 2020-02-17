
const test1 =window.location.pathname;
const size= document.body.clientWidth;
console.log(test1);
if(test1 ==='/' && size > 800){
    let test=document.getElementById('nav');

    console.log(test)
    test.classList.remove('back_nav');
    let test2 = document.querySelector('#pre-nav');
    test2.classList.remove('bg_pre-nav');
    }