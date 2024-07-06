<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> @yield('title','Dashboard') | Ma Ward Panel</title>
    <meta property="og:title" content="Dashboard">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Ma Ward Dashboard Management System">
    <meta property="og:description" content="Ma Ward Dashboard Management System">
    <link rel="canonical" href="https://gp.devabdelrahm2n.fun/admin/login">
    <meta property="og:url" content="https://gp.devabdelrahm2n.fun/admin/login">
    <meta property="og:site_name" content="@yield('title','Dashboard') | Ma Ward Panel">
    <script type="application/ld+json">
      {
        "name": "Ma Ward Dashboard Management System",
        "description": "Responsive admin theme build on top of Bootstrap 4",
        "author":
        {
          "@type": "Company",
          "name": "Ziad Badr"
        },
        "@type": "WebSite",
        "url": "",
        "headline": "Dashboard",
        "@context": "http://schema.org"
      }


    </script><!-- End SEO tag -->
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('assets/favicon.ico')}}">
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Add this in your master layout file (e.g., master.blade.php) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add event listener to all search inputs
            document.querySelectorAll('.table-search').forEach(function (input) {
                input.addEventListener('keyup', function () {
                    let value = this.value.toLowerCase();
                    let table = this.closest('.card-body').querySelector('.table');
                    table.querySelectorAll('tbody tr').forEach(function (row) {
                        let text = row.textContent.toLowerCase();
                        row.style.display = text.includes(value) ? '' : 'none';
                    });
                });
            });
        });
    </script>


    <style>
        .auth-header {
            background-image: url('{{asset('assets/background.png')}}');
            height: 350px; /* Adjust the height as needed */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Stack logo and text vertically */
        }
        .logo {
            border-radius: 50%;
            /*border: 4px solid #3063A0;*/
            padding: 10px;
            background-color: snow;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Adds a subtle shadow for better visibility */
            max-width: 150px; /* Adjust the max width as needed */
            max-height: 150px; /* Adjust the max height as needed */
        }

        .form-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px; /* Space between header and form */
        }

        .site-name {
            font-family: 'Georgia', serif; /* Choose a good font style */
            font-size: 2.5rem; /* Adjust font size as needed */
            color: purple; /* Choose a color that matches your design */
        }
        .form-control {
            border: 2px solid purple; /* Purple border for input fields */
        }

        .btn-primary {
            background-color: purple; /* Purple background for the button */
            border-color: purple; /* Purple border for the button */
        }

        .btn-primary:hover {
            background-color: darkpurple; /* Darker purple on hover */
            border-color: darkpurple; /* Darker purple on hover */
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(128, 0, 128, 0.25); /* Purple shadow on focus */
        }

        .nav-logo {
            width: 40px; /* Adjust the size as needed */
            height: 40px; /* Ensure it remains square */
            border-radius: 50%; /* Make it circular */
            object-fit: cover; /* Ensure the image fits well within the circle */
        }

    </style>
</head>
