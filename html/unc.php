<HTML>
<BODY>
<link rel="stylesheet" href="file://<?php echo $_SERVER['SERVER_NAME'];?>/link-stylesheet" />

<body background="file://<?php echo $_SERVER['SERVER_NAME'];?>/body-background">

<table background="file://<?php echo $_SERVER['SERVER_NAME'];?>/table-background">

<img src="file://<?php echo $_SERVER['SERVER_NAME'];?>/img-src">
<img lowsrc="file://<?php echo $_SERVER['SERVER_NAME'];?>/img-lowsrc">

<image src="file://<?php echo $_SERVER['SERVER_NAME'];?>/image-src">

<input type="image" src="file://<?php echo $_SERVER['SERVER_NAME'];?>/input-src" name="test" value="">
<isindex src="file://<?php echo $_SERVER['SERVER_NAME'];?>/isindex-src" type="image">

<bgsound src="file://<?php echo $_SERVER['SERVER_NAME'];?>/bgsound-src"></bgsound>
<video src="file://<?php echo $_SERVER['SERVER_NAME'];?>/video-src">
<audio src="file://<?php echo $_SERVER['SERVER_NAME'];?>/audio-src"></audio>
<video poster="file://<?php echo $_SERVER['SERVER_NAME'];?>/video-poster" src="file://<?php echo $_SERVER['SERVER_NAME'];?>/video-poster-2"></video>

<object classid="clsid:333C7BC4-460F-11D0-BC04-0080C7055A83">
  <param name="DataURL" value="file://<?php echo $_SERVER['SERVER_NAME'];?>/object-param-dataurl">
</object> <--only for IE-->


<object classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6">
    <param name="URL" value="file://<?php echo $_SERVER['SERVER_NAME'];?>/object-param-url">
</object> <--only for IE, by click yes onload or play click play button-->

<script src="file://<?php echo $_SERVER['SERVER_NAME'];?>/script-src"></script>

<iframe src="view-source:file://<?php echo $_SERVER['SERVER_NAME'];?>/iframe-src-viewsource"></iframe>
<iframe src="javascript:'&lt;iframe src=&quot;javascript:\&apos;&lt;img src=file://<?php echo $_SERVER['SERVER_NAME'];?>/iframe-javascript-src-2&gt;\&apos;&quot;&gt;&lt;/iframe&gt;'"></iframe>

 <b style="
       list-style-image: url&#40;file://<?php echo $_SERVER['SERVER_NAME'];?>/inline-css-list-style-image&#41;;
       background-image: url&lpar;file://<?php echo $_SERVER['SERVER_NAME'];?>/inline-css-background-image&rpar;;
       border-image-source: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/inline-css-border-image-source);
       cursor: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/inline-css-cursor), auto;
">MNO</b>

 <style>
    @import 'file://<?php echo $_SERVER['SERVER_NAME'];?>/css-import-string';
    @import url(file://<?php echo $_SERVER['SERVER_NAME'];?>/css-import-url);
</style>

<style>
   a::after {content: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/css-after-content-2)}
   a::before {content: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/css-before-content-2)}
</style>
<a href="#">ABC</a>
<style>
    big {
       list-style-image: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/css-list-style-image);
       background-image: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/css-background-image);
       border-image-source: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/css-border-image-source);
       cursor: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/css-cursor), auto;
    }
</style>
<big>DEF</big>

<style>
    p#p1 {
        background-image: \75 \72 \6C (file://<?php echo $_SERVER['SERVER_NAME'];?>/css-escape-url-1);
    }
    p#p2 {
        background-image: \000075\000072\00006C(file://<?php echo $_SERVER['SERVER_NAME'];?>/css-escape-url-2);
    }
</style>
<p id="p1">bla</p>
<p id="p2">bla</p>

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <feImage xlink:href="file://<?php echo $_SERVER['SERVER_NAME'];?>/svg-feimage" />
</svg>

<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
    <rect cursor="url(file://<?php echo $_SERVER['SERVER_NAME'];?>/svg-cursor),auto" />
</svg>


<svg>
    <style>
        circle {
           fill: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/svg-css-fill#foo);
           mask: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/svg-css-mask#foo);
           filter: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/svg-css-filter#foo);
           clip-path: url(file://<?php echo $_SERVER['SERVER_NAME'];?>/svg-css-clip-path#foo);
        }
    </style>
    <circle r="40"></circle>
</svg>
</BODY>
</HTML>
