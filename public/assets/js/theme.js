(function($) {
    "use strict"; // Start of use strict

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
        $('.navbar-collapse').collapse('hide');
    });

    // smooth scrolling
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').not('[data-toggle="tab"]').on('click', function(event) {
        // On-page links
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#mainNav',
        offset: 54
    });

    // Collapse Navbar
    var navbarCollapse = function() {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);

    // process "backcalls" click
    $('#callme').click(function(){
        var name = $('#inputName').val();
        var phone = $('#inputPhone').val();
        var captchaValue = grecaptcha.getResponse();

        if(name.length > 2 && phone.length > 5 && captchaValue.length > 0) {
            $.ajax({
                url: base_url + '/api/backcall',
                data: {
                    name: name,
                    phone: phone,
                    captcha: captchaValue
                },
                success: function(res){
                    if (res.status !== 1) {
                        alert("Произошла ошибка заполнения формы!");
                    } else {
                        alert('Ваш запрос успешно принят. В ближайшее время с вами свяжутся наши специалисты!');
                        grecaptcha.reset();
                        $('#inputPhone').val('');
                        $('#inputName').val('');
                    }
                }
            })
        } else {
            alert('Введены некоректные данные');
        }
    });

})(jQuery); // End of use strict
