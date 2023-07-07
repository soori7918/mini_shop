<footer class="footer mt-2">
    <div class="container">
        <p class="float-left"><?php echo e($_SERVER['SERVER_NAME']); ?></p>
        <p class="float-right" data-direction="ltr">Copyright © <?php echo e(date('Y')); ?>, All rights reserved.</p>
    </div>
</footer>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/ripple.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jgrowl.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/panel.js')); ?>"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'fa'}, 'google_translate_element');
    }
</script>

<script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
  
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php VisitLog::save();?>