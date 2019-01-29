;
var slider = jQuery('#slider')
var next = jQuery('#Next')
var prev = jQuery('#Prev')

//Movemos última imagen al primer lugar

jQuery('#slider section:last').insertBefore('#slider section:first')

slider.css('margin-left', '-' + 100 + '%')

function moverD(){
  slider.animate({
    marginLeft: '-' + 200 + '%'
  }, 700, function(){
    jQuery('#slider section:first').insertAfter('#slider section:last')
    slider.css('margin-left', '-' + 100 + '%')
  })
}

function moverI(){
  slider.animate({
    marginLeft: 0
  }, 900, function(){
    jQuery('#slider section:last').insertBefore('#slider section:first')
    slider.css('margin-left', '-' + 100 + '%')
  })
}

next.on('click', function(){
  moverD()
})

prev.on('click', function(){
  moverI()
})

function autoplay(){
  setInterval(function(){
    moverD();
  }, 2000)
}

autoplay();
