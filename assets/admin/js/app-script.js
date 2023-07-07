const urlMain = $('meta[name=base-url]').attr("content") + '/';
const base_url = $('meta[name=base-url]').attr("content");
$(function () {
    "use strict";


// metismenu

    $(function () {

        $('#menu').metisMenu();

    });


    $(".search-btn-mobile").on("click", function () {
        $(".search-bar").addClass("full-search-bar");
    });

    $(".search-arrow-back").on("click", function () {
        $(".search-bar").removeClass("full-search-bar");
    });

    $(".overlay").on("click", function () {
        $("#wrapper").addClass("toggled");
    });

    $(".close-btn").on("click", function () {
        $("#wrapper").addClass("toggled");
    });


    // toggle menu button

    $("#sidebar-wrapper").hover(
        function () {
            $("#wrapper").addClass("sidebar-hovered");
        },
        function () {
            $("#wrapper").removeClass("sidebar-hovered");
        }
    )

    $(".toggle-menu").click(function () {
        if ($("#wrapper").hasClass("toggled")) {
            // unpin sidebar when hovered
            $("#wrapper").removeClass("toggled");
            $("#sidebar-wrapper").unbind("hover");
        } else {
            $("#wrapper").addClass("toggled");
            $("#sidebar-wrapper").hover(
                function () {
                    $("#wrapper").addClass("sidebar-hovered");
                },
                function () {
                    $("#wrapper").removeClass("sidebar-hovered");
                }
            )

        }
    });


// === sidebar menu activation js

    $(function () {
        for (var i = window.location, o = $(".metismenu li a").filter(function () {
            return this.href == i;
        }).addClass("").parent().addClass("mm-active"); ;) {
            if (!o.is("li")) break;
            o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
        }
    }),


        /* Top Header */

        $(document).ready(function () {
            $(window).on("scroll", function () {
                if ($(this).scrollTop() > 60) {
                    //$('.topbar-nav .navbar').addClass('bg-dark');
                } else {
                    $('.topbar-nav .navbar').removeClass('bg-dark');
                }
            });

        });


    /* Back To Top */

    $(document).ready(function () {
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        $('.back-to-top').on("click", function () {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
    });


    // page loader

    $(window).on('load', function () {

        $('#pageloader-overlay').fadeOut(1000);

    })


    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    // theme setting
    $(".switcher-icon").on("click", function (e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });

    $('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    $('#theme7').click(theme7);
    $('#theme8').click(theme8);
    $('#theme9').click(theme9);
    $('#theme10').click(theme10);
    $('#theme11').click(theme11);
    $('#theme12').click(theme12);
    $('#theme13').click(theme13);
    $('#theme14').click(theme14);
    $('#theme15').click(theme15);

    function theme1() {
        $('body').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
        $('body').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
        $('body').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
        $('body').attr('class', 'bg-theme bg-theme4');
    }

    function theme5() {
        $('body').attr('class', 'bg-theme bg-theme5');
    }

    function theme6() {
        $('body').attr('class', 'bg-theme bg-theme6');
    }

    function theme7() {
        $('body').attr('class', 'bg-theme bg-theme7');
    }

    function theme8() {
        $('body').attr('class', 'bg-theme bg-theme8');
    }

    function theme9() {
        $('body').attr('class', 'bg-theme bg-theme9');
    }

    function theme10() {
        $('body').attr('class', 'bg-theme bg-theme10');
    }

    function theme11() {
        $('body').attr('class', 'bg-theme bg-theme11');
    }

    function theme12() {
        $('body').attr('class', 'bg-theme bg-theme12');
    }

    function theme13() {
        $('body').attr('class', 'bg-theme bg-theme13');
    }

    function theme14() {
        $('body').attr('class', 'bg-theme bg-theme14');
    }

    function theme15() {
        $('body').attr('class', 'bg-theme bg-theme15');
    }
});

$(document).ready(function () {

    $(function () {
        // Multiple images preview in browser
        var imagesPreview = function (input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    let calc = (input.files[i].size) / 1024
                    if (calc > 4000) {
                        $('.gallery-multiple').val('')
                        alert('حجم فایلها بزرگتر از 4 مگابایت می باشد')
                        return false;
                    }
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        let temp = `<div class="gallery-item"><img src="${event.target.result}"></div>`
                        $(temp).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('.gallery_1').on('change', function () {
            imagesPreview(this, 'div.gallery_preview_1');
        });
        $('.gallery_2').on('change', function () {
            imagesPreview(this, 'div.gallery_preview_2');
        });
        $('.gallery_3').on('change', function () {
            imagesPreview(this, 'div.gallery_preview_3');
        });
        $('.gallery_4').on('change', function () {
            imagesPreview(this, 'div.gallery_preview_4');
        });
    });
    $('.gallery_preview_1').sortable({
        tolerance: "pointer",
        update: function (e, ui) {
            let index = ui.item.index()
            let photo_id = ui.item.attr('data-id')
            $.ajax({
                url: urlMain + '/panel/set-photo-sort',
                data: {
                    'photo_id': photo_id,
                    'sort': index
                },
            });
        }
    });
    $('.gallery_preview_2').sortable({
        tolerance: "pointer",
        update: function (e, ui) {
            let index = ui.item.index()
            let photo_id = ui.item.attr('data-id')
            $.ajax({
                url: urlMain + '/panel/set-photo-sort',
                data: {
                    'photo_id': photo_id,
                    'sort': index
                },
            });
        }
    });
    $('.gallery_preview_3').sortable({
        tolerance: "pointer",
        update: function (e, ui) {
            let index = ui.item.index()
            let photo_id = ui.item.attr('data-id')
            $.ajax({
                url: urlMain + '/panel/set-photo-sort',
                data: {
                    'photo_id': photo_id,
                    'sort': index
                },
            });
        }
    });
    $('.gallery_preview_4').sortable({
        tolerance: "pointer",
        update: function (e, ui) {
            let index = ui.item.index()
            let photo_id = ui.item.attr('data-id')
            $.ajax({
                url: urlMain + '/panel/set-photo-sort',
                data: {
                    'photo_id': photo_id,
                    'sort': index
                },
            });
        }
    });

    $('.gallery-item').each(function () {
        let that = $(this)
        let id = that.attr('data-id')
        that.find('.gallery-delete').click(function (e) {
            let btn = $(this)
            btn.html('پردازش...')
            $.ajax({
                url: urlMain + '/panel/set-photo-delete',
                data: {
                    'photo_id': id,
                },
                success: function (response) {
                    that.fadeOut()
                }
            });
        })
    })

    $('.brand-logo .logo-icon').click(function (e) {
        window.location.href = baseUrl + '/panel'
    })

    $('[name=account_status]').change(function () {
        if ($(this).val() == 'rejected') {
            $('.status_message').slideDown(200)
        } else {
            $('.status_message').slideUp(200)
        }
    })

})

//state & city select
$('.select_js').on('change',function () {
    var select_id=$(this).val();
    var select_type=$(this).attr('data-type');
    var select_reply=$(this).attr('data-reply');
    var select_name=$(this).attr('data-name');
    if (select_id == null || select_id == '') {
        $('.city_class').empty();
        $('.city_class').append('<option value="">انتخاب شهر</option>')
        Swal.fire({
            // title: "ناموفق",
            title: "توجه",
            text: "لطفا یک "+select_name+"انتخاب کنید ",
            // text: "لطفا استان را انتخاب کنید",
            icon: "warning",
            timer: 6000,
            timerProgressBar: true,
        })
    } else
    {
        var url=base_url+"/city_ajax_js/"+select_type+"/"+select_id;
        $.get(url, function (data, status) {

            $('.'+select_reply).empty();
            $('.'+select_reply).append('<option value=""> انتخاب کنید</option>')
            $.each(data, function (key, value) {
                $('.'+select_reply).append('<option value="' + value.id + '">' + value.name + '</option>')
            })
            if(select_reply=='city_id')
            {
                $('.zone_id').empty();
                $('.zone_id').append('<option value=""> ابتدا منطقه را انتخاب کنید</option>')
            }
            $('.'+select_reply).trigger('chosen:updated');
            // if(select_reply=='loc_id')
            // {
            //     $('.loc_address').removeClass('d-none')
            // }
            // else
            // {
            //     $('.loc_address').addClass('d-none')
            // }
        })
    }
})

$('.page_select').on('change',function (){
    var val_page=$(this).val()
    if(val_page=='service')
    {
        $('.text-input').removeClass('d-none')
    }
    else
    {
        $('.text-input').addClass('d-none')
    }
})