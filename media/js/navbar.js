function change_bg(){
  const location_win =window.location.pathname;
  const size= document.body.clientWidth;
  if(location_win ==='/' && size > 800){
      let nav=document.getElementById('nav');
      nav.classList.remove('back_nav');
      let pre_nav = document.querySelector('#pre-nav');
      pre_nav.classList.remove('bg_pre-nav');
      window.addEventListener('scroll',function(e){
      let y = window.pageYOffset;
      let nav_change =document.getElementById('nav');
        if(y > 550){
          nav_change.classList.add('back_nav');
        }
        else{
          nav_change.classList.remove('back_nav');
        }
    })
  }
}
change_bg();
