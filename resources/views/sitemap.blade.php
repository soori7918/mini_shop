<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <url>
        <loc>
            {{ urldecode(route('front-index')) }}
        </loc>
        <lastmod>{{ date('Y.m.d') }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>
            {{ urldecode('https://www.khaneistanbul.com.tr/about-us') }}
        </loc>
        <lastmod>{{ date('Y.m.d') }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>9</priority>
    </url>
    <url>
        <loc>
            {{ urldecode('https://www.khaneistanbul.com.tr/contact-us') }}
        </loc>
        <lastmod>{{ date('Y.m.d') }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>9</priority>
    </url>
    <url>
        <loc>
            {{ urldecode('https://www.khaneistanbul.com.tr/blogs') }}
        </loc>
        <lastmod>{{ date('Y.m.d') }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>9</priority>
    </url>
    @foreach($projects as $value)
        <url>
            <loc>
                {{ urldecode(route('front.projects.show', $value->slug)) }}
            </loc>
            <lastmod>{{ $value->updated_at }}</lastmod>
            <changefreq>hourly</changefreq>
            <priority>0.8</priority>
            <image:image>
                {{--<image:loc>--}}
{{--                    {{ $value->photos[0]!=null?url($value->photos[0]->path):'' }}--}}
                {{--</image:loc>--}}
                <image:caption>{{$value->brief ? $value->brief : 'بهترین پروژه'}}</image:caption>
                <image:title>{{ $value->name}}</image:title>
            </image:image>
        </url>
    @endforeach
    @foreach($blogs as $value)
        <url>
            <loc>
                {{ urldecode(route('front-blog-show',$value->slug)) }}
            </loc>
            <lastmod>{{ $value->updated_at }}</lastmod>
            <changefreq>hourly</changefreq>
            <priority>0.8</priority>
            <image:image>
                <image:loc>
                    {{ url($value->photo!=null?url($value->photo):'') }}
                </image:loc>
                <image:caption>{{ $value->title }}</image:caption>
                <image:title>{{ $value->title }}</image:title>
            </image:image>
        </url>
    @endforeach
</urlset>