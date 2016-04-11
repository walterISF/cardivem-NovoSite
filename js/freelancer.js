/*!
 * Start Bootstrap - Freelancer Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('body').on('click', '.page-scroll a', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

$('#adm').click(function() {
  $('#mdAutenticacao').modal('show');
});

$('.btnAutenticacao').click(function(){
  var senha = $('.senhaAdm').val();

  if(senha != ""){
    //alert('entrou');
  $.ajax({
      url: "mail/autenticacao.php",
      dataType: "json",
      data: {
          senha: senha
      },
      success: function(data){
        //alert(data);
        if(data == 'correta'){
          $('#mdAutenticacao').modal('hide');
          $('#mdUpload').modal('show');
        }else{
          $('.alerta').css('display','block');
          setTimeout(function(){$('.alerta').css('display','none');},2000);
        }
      },
      async: true,
    }).responseText;
    return false;
  }
});
