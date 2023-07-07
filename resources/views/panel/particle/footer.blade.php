<footer class="footer mt-2">
    <div class="container">
        <p class="float-left">{{ $_SERVER['SERVER_NAME'] }}</p>
        <p class="float-right" data-direction="ltr">Copyright © {{ date('Y') }}, All rights reserved.</p>
    </div>
</footer>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ripple.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jgrowl.min.js') }}"></script>
<!-- Chosen -->
<script src="{{ asset('user/chosen/js.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/panel.js') }}"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'fa'}, 'google_translate_element');
    }
</script>

<script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
  
</script>
@stack('scripts')
</body>
</html>
<?php VisitLog::save();?>