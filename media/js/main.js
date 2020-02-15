$(function() {
    // Animation
    $('.scrollpoint.sp-effect1').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeInLeft');},{offset:'100%'});
    $('.scrollpoint.sp-effect2').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeInRight');},{offset:'100%'});
    $('.scrollpoint.sp-effect3').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeInDown');},{offset:'100%'});
    $('.scrollpoint.sp-effect4').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeIn');},{offset:'100%'});
    $('.scrollpoint.sp-effect5').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeInUp');},{offset:'100%'});
    
    $('form.ajax').submit(function(event) {
        event.preventDefault();
        var data = new FormData($(this).get(0));
        var target = $(this).attr('data-target');
        //DEBUG
        //console.log(data);
        $.ajax({
            url:            'traitForm.php',    // $form.attr('action'),
            type:           'POST',             // $form.attr('method'),
            contentType:    false,              // obligatoire pour de l'upload
            processData:    false,              // obligatoire pour de l'upload
            dataType:       'html',             // retour attendu
            data:           data,               // ON LIE LES INFOS DU FORMULAIRE DANS LA REQUETE AJAX
            success:        function(result){
                if(target != undefined) $('#' + target).html(result);
                else $(".feedback").html(result);
            }
        });
    });
    
    $('body')
        .on('mouseenter mouseleave','.dropdown',toggleDropdown)
        .on('click', '.dropdown-menu a', toggleDropdown);
});

function feedback(response){
    $(".feedback").html(response);
}

function toggleDropdown (e) {
  const _d = $(e.target).closest('.dropdown'),
    _m = $('.dropdown-menu', _d);
  setTimeout(function(){
    const shouldOpen = e.type !== 'click' && _d.is(':hover');
    _m.toggleClass('show', shouldOpen);
    _d.toggleClass('show', shouldOpen);
    $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
  }, e.type === 'mouseleave' ? 0 : 0);
}