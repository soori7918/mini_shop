let defaultLanguage = 'en'
if ($('.google_translate_element').length > 0) {
    defaultLanguage = $('.google_translate_element').data('lang')
    $('.google_translate_element').attr('id', 'google_translate_element')
    let script = `<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>`
    $('body').append(script)
    $('head').append(css())
}

function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: defaultLanguage}, 'google_translate_element');
    $('.goog-te-gadget span').remove()
    let text = $('.goog-te-gadget').text()
    $(text).each(function () {
        $(this).html($(this).html().split(text).join(""));
    });

    $('.goog-te-gadget').fadeIn(200)
}

function css() {
    let content = `
<style>
    
    .skiptranslate iframe {
    display: none;
    height: 0;
    }
 
    .goog-te-gadget .goog-te-combo {
    margin: 4px 0;
    display: block;
    width: 150px;
    height: 28px;
}

body {
top:unset!important;
}

.goog-te-gadget > div ~ * {
display: none;
}

.google_translate_element {
height: 35px;
    overflow: hidden;
}
</style>
    `;

    return content;
}
