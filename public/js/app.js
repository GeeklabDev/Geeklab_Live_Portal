$('.timeline-content img').click(function(){
   $src = $(this).attr('src');
   $('.zoom-image').fadeIn()
   $('.background-zoom').fadeIn()
    $('.zoom-image img').attr('src', $src)
})

$('.background-zoom').click(function (){
    $('.zoom-image').fadeOut()
    $('.background-zoom').fadeOut()
})
