<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
    <title>Keep It Simple.</title>
    <meta name="description" content="">  
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/css/default.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/layout.css">  
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/media-queries.css"> 

   <!-- Script
   ================================================== -->
    <script src="<?= base_url() ?>assets/js/modernizr.js"></script>

   <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.png" >

</head>

<body>

   <!-- Header
   ================================================== -->
   <header id="top">

    <div class="row">

        <div class="header-content twelve columns">

              <h1 id="logo-text"><a href="index.html" title="">Keep It Simple.</a></h1>
                <p id="intro">Put your awesome slogan here...</p>

            </div>          

       </div>

       <nav id="nav-wrap"> 

        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
           <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>

        <div class="row">                       

                <ul id="nav" class="nav">
                    <li class="current"><a href="index.html">Home</a></li>
                    <li class="has-children"><a href="#">Dropdown</a>
                      <ul>
                         <li><a href="#">Submenu 01</a></li>
                         <li><a href="#">Submenu 02</a></li>
                         <li><a href="#">Submenu 03</a></li>
                      </ul>
                   </li>
                   <li><a href="demo.html">Demo</a></li>    
                   <li><a href="archives.html">Archives</a></li>
                    <li class="has-children"><a href="single.html">Blog</a>
                            <ul>
                         <li><a href="blog.html">Blog Entries</a></li>
                         <li><a href="single.html">Single Blog</a></li>                      
                      </ul>
                    </li>               
                    <li><a href="page.html">Page</a></li>
                </ul> <!-- end #nav -->              

        </div> 

       </nav> <!-- end #nav-wrap -->         

   </header> <!-- Header End -->