let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

// window.addEventListener('resize', () => {
//   let vh = window.innerHeight * 0.01;
//   document.documentElement.style.setProperty('--vh', `${vh}px`);
// });

// Form Validation
function valForm(data) {

    // Fields
    for (var i = 0; i < data['fields'].length; i++) {

        var field_id = data['fields'][i].id;
        var field_required = data['fields'][i].required;
        var field_message = data['fields'][i].required_message;
        var field_filter = data['fields'][i].required_filter;
        var field_filter_message = data['fields'][i].required_filter_message;

        var valEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var valPhone = /^[0-9-]+$/;

        if (field_required) {

            if ($('form[id="'+ data.id+'"] [name="'+field_id+'"]').val() == '') {
                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').addClass('is-invalid');
                if ($('form[id="'+ data.id+'"] [name="'+field_id+'"]').parent().find('.invalid-feedback').length == 0) {
                    $('form[id="'+ data.id+'"] [name="'+field_id+'"]').parent().append('<div class="invalid-feedback">'+field_message+'</div>');
                }

                return false
            } else if(field_filter == 'phone' && !valPhone.test($('form[id="'+ data.id+'"] [name="'+field_id+'"]').val()) && $('form[id="'+ data.id+'"] [name="'+field_id+'"]').val().length < 5){
                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').removeClass('is-invalid');
                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').siblings().remove('.invalid-feedback');

                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').addClass('is-invalid');
                if ($('form[id="'+ data.id+'"] [name="'+field_id+'"]').parent().find('.invalid-feedback').length == 0) {
                    $('form[id="'+ data.id+'"] [name="'+field_id+'"]').parent().append('<div class="invalid-feedback">'+field_filter_message+'</div>');
                }

                return false;
            } else if(field_filter == 'email' && !valEmail.test($('form[id="'+ data.id+'"] [name="'+field_id+'"]').val())){
                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').removeClass('is-invalid');
                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').siblings().remove('.invalid-feedback');

                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').addClass('is-invalid');
                if ($('form[id="'+ data.id+'"] [name="'+field_id+'"]').parent().find('.invalid-feedback').length == 0) {
                    $('form[id="'+ data.id+'"] [name="'+field_id+'"]').parent().append('<div class="invalid-feedback">'+field_filter_message+'</div>');
                }

                return false;
            } else {
                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').removeClass('is-invalid');
                $('form[id="'+ data.id+'"] [name="'+field_id+'"]').siblings().remove('.invalid-feedback');
            }

        }

    }

    // Captcha
    if (data['captcha']['enabled']) {

        var response = grecaptcha.getResponse();

        if(response.length == 0) {
            $('#captcha').addClass('is-invalid');
//            if (!$('#captcha').find('.nocaptcha').length) {             
                $('#captcha').append('<div class="nocaptcha">'+data['captcha']['message']+'</div>');
  //          }

            return false
        } else {
            $('#captcha').removeClass('.is-invalid');
            $('#captcha').remove('.nocaptcha');
        }
    }

    return true;
}

// Form
function contactForm(data) {

    var form = $('form[id="'+data.id+'"]');

    $(form).submit(function(e) {
        e.preventDefault();

        if(valForm(data)){
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
            }).done(function(response) {
                if (!$(form).find('.alert-success').length){
                    $(form).append('<div class="form-group col-12 mt-4 text-center alert alert-success">'+data.thanks+'</div>');
                }
                $(form).find('.files').html('');
                $(form).find($('.form-control')).val('');
            }).fail(function(data) {
                $(form).remove('alert-sucess');
            });
        }

    });
    
}

function dataOpen() {

    width = $(window).width();


    // Menu
    $('[data-open="menu"]').click(function(e){
        e.preventDefault();

        $('body').toggleClass('overh')

        $('.nav-menu').toggleClass('active');
        $('.header').toggleClass('active');
        $('.navigation').toggleClass('active');
    });


    // Filter
    $('[data-open="filter"]').click(function(e){
        e.preventDefault();

        $('.filter').toggleClass('active');
    });


    // Submenu
    $('[data-open="submenu"]').click(function (e) {
        e.preventDefault()
        $(this).parent().toggleClass('active')
        $(this).siblings('.submenu').toggleClass('active')
    })

    // Submenu
    $('.header .navigation .menu li.menu-item-has-children > a').click(function(e){
        if (width < 1200) {
            e.preventDefault()

            if ($('.header .navigation .menu li').hasClass('open-menu')) {
                $('.header .navigation .menu li').removeClass('open-submenu');
            }

            $(this).parent().toggleClass('open-submenu')
        }
    })

}


function slides() {

    $('.partners .slider .slides').slick({
        mobileFirst: true,
        arrows: true,
        dots: false,
        appendArrows: $('.partners .slider .arrows'),
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 6,
                },
            },
        ],
    });

}


// Scroll
function scroll() {
    width = $(window).width()
    scrollTop = $(window).scrollTop()

    presentation = $('.presentation').outerHeight()

    if (scrollTop > 300) {
        $('body, .header').addClass('fixed')
    } else {
        $('body, .header').removeClass('fixed');
    }
}

function parallaxBackground(){
    scrollTop = $(window).scrollTop()

    $('.banner').css({
        'background-position': 'right calc(50% - -' + (scrollTop + 100) * 0.1 + 'px)'
    });
}

function modalVideo() {

    $('.video-player.allowed').click(function(e) {
        e.preventDefault();

        $(this).addClass('active');

        id = $(this).attr('data-id');
        type = $(this).attr('data-type');

        $('#modalVideo .player').html('');

        if (type == 'youtube') {
            $('#modalVideo .player').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+id+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        }

        $('#modalVideo').modal('show');

    });

    $('#modalVideo').on('hidden.bs.modal', function (e) {
        $('.video-player').removeClass('active');
        $('#modalVideo .player').html('');
    })

}

function moduleStats(){

    scrollTop = $(window).scrollTop();

    if ($('.stats').length > 0) {
        stats = $('.stats').offset().top - $('.stats').outerHeight() - $('.stats').outerHeight();

        if (scrollTop > stats) {
            $('.stats .counter').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).attr('data-number')
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }
    }
}

function datascroll(){

    // Scroll
    $('[data-scroll], .data-scroll a').on('click',function (e) {
        e.preventDefault();

        width = $(window).width();

        var target = this.hash,
        $target = $(target);

        if (width < 768) {
            $offset = 110;
        } else{
            $offset = 220;
        }

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - $offset
        }, 900, 'swing', function () {
            //window.location.hash = target;
        });
    });

    // Scroll
    $('[home-data-scroll], .home-data-scroll a').on('click',function (e) {
        e.preventDefault();

        width = $(window).width();

        var target = this.hash,
        $target = $(target);

        if (width < 768) {
            $offset = 80;
        } else{
            $offset = 80;
        }

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - $offset
        }, 900, 'swing', function () {
            //window.location.hash = target;
        });
    });

}

$(document).ready(function(){

    slides();
    scroll();
    dataOpen();
    parallaxBackground();
    modalVideo();
    moduleStats();
    datascroll();

    $(window).bind('scroll', function (){
        moduleStats();
    });

    $(window).bind('scroll resize', function () {
        scroll();
        parallaxBackground();
    });



    $('input[type="file"]').bind('change', function(e){

//      if (e.target.files.length < 10) { // define max files
            var files = [];
            for (var i = 0; i < e.target.files.length; i++) {
                files.push('<span>'+ e.target.files[i].name +'</span>');
            }
            $(this).next('.files').html(files);
//      }else{
            // alert maximum files
            // disable button submit
//      }

    });



});