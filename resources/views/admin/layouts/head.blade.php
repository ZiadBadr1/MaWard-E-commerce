<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> @yield('title','Dashboard') | Pikyhost Panel</title>
    <meta property="og:title" content="Dashboard">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Pikyhost Dashboard Management System">
    <meta property="og:description" content="Pikyhost Dashboard Management System">
    <link rel="canonical" href="https://www.pikyhost.com/">
    <meta property="og:url" content="https://www.pikyhost.com/">
    <meta property="og:site_name" content="@yield('title','Dashboard') | Pikyhost Panel">
    <script type="application/ld+json">
      {
        "name": "Pikyhost Dashboard Management System",
        "description": "Responsive admin theme build on top of Bootstrap 4",
        "author":
        {
          "@type": "Company",
          "name": "Ahmed Labib"
        },
        "@type": "WebSite",
        "url": "",
        "headline": "Dashboard",
        "@context": "http://schema.org"
      }


    </script><!-- End SEO tag -->
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/vendor/flatpickr/flatpickr.min.css')}}"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/stylesheets/theme.min.css')}}" data-skin="default">
    <link rel="stylesheet" href="{{asset('assets/dashboard/stylesheets/theme-dark.min.css')}}" data-skin="dark">
    <link rel="stylesheet" href="{{asset('assets/dashboard/stylesheets/custom.css')}}">
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        // Disable unused skin immediately
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        // add flag class to html immediately
        if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
    </script><!-- END THEME STYLES -->

</head>
