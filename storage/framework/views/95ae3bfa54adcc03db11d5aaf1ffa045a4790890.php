<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <url>
        <loc>
            <?php echo e(urldecode(route('front-index'))); ?>

        </loc>
        <lastmod><?php echo e(date('Y.m.d')); ?></lastmod>
        <changefreq>hourly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>
            <?php echo e(urldecode('https://www.khaneistanbul.com.tr/about-us')); ?>

        </loc>
        <lastmod><?php echo e(date('Y.m.d')); ?></lastmod>
        <changefreq>hourly</changefreq>
        <priority>9</priority>
    </url>
    <url>
        <loc>
            <?php echo e(urldecode('https://www.khaneistanbul.com.tr/contact-us')); ?>

        </loc>
        <lastmod><?php echo e(date('Y.m.d')); ?></lastmod>
        <changefreq>hourly</changefreq>
        <priority>9</priority>
    </url>
    <url>
        <loc>
            <?php echo e(urldecode('https://www.khaneistanbul.com.tr/blogs')); ?>

        </loc>
        <lastmod><?php echo e(date('Y.m.d')); ?></lastmod>
        <changefreq>hourly</changefreq>
        <priority>9</priority>
    </url>
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc>
                <?php echo e(urldecode(route('front.projects.show', $value->slug))); ?>

            </loc>
            <lastmod><?php echo e($value->updated_at); ?></lastmod>
            <changefreq>hourly</changefreq>
            <priority>0.8</priority>
            <image:image>
                

                
                <image:caption><?php echo e($value->brief ? $value->brief : 'بهترین پروژه'); ?></image:caption>
                <image:title><?php echo e($value->name); ?></image:title>
            </image:image>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc>
                <?php echo e(urldecode(route('front-blog-show',$value->slug))); ?>

            </loc>
            <lastmod><?php echo e($value->updated_at); ?></lastmod>
            <changefreq>hourly</changefreq>
            <priority>0.8</priority>
            <image:image>
                <image:loc>
                    <?php echo e(url($value->photo!=null?url($value->photo):'')); ?>

                </image:loc>
                <image:caption><?php echo e($value->title); ?></image:caption>
                <image:title><?php echo e($value->title); ?></image:title>
            </image:image>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset>