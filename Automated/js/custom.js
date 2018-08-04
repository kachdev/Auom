// $(document).ready(function() {
//     $("#sect2").css("display", "none");
//     $("#sect3").css("display", "none");


//     $("#one").click(function() {
//         setTimeout(function() {
//             $("#sect1").css("display", "none");
//         }, 600);
        
//         $("#sect2").css("display", "block");
        
//     });

//     $("#two").click(function () {
//         $("#sect2").css("display", "none");
//         $("#sect3").css("display", "block");
//     });
   
//     $("#hide").css("display","none");

//     $("#outpatient").onclick (function () {
//         $("#hide").css("display","block");
//     });

//     $("#outpatient").blur(function () {
//         $("#hide").css("display","none");
//     })


//     $("#register-alert").click(function () {
//         $('.backdrop, .box').animate({'opacity':'1'}, 300, 'linear');
//         $('.backdrop, .box').css('display','block');
//     });

//     span.onclick = function() {
//         box.style.display = "none";
//     }

    // alert("hello");
;(function () {
     // Page scroll
  	$('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 0
            }, 900);
            return false;
          }
        }
      });

      var goToTop = function() {
        
                $('.js-gotop').on('click', function(event){
                    
                    event.preventDefault();
        
                    $('html, body').animate({
                        scrollTop: $('html').offset().top
                    }, 500, 'easeInOutExpo');
                    
                    return false;
                });
        
                $(window).scroll(function(){
        
                    var $win = $(window);
                    if ($win.scrollTop() > 200) {
                        $('.js-top').addClass('active');
                    } else {
                        $('.js-top').removeClass('active');
                    }
        
                });
            
            };

        $(function(){
            goToTop();
        });

    }());
// });
