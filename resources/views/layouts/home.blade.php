<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Lovilink - Free URL Shortener</title>
  <meta name="description" content='Connecting people and ideas, one link at a time. Lovilink is a free and open-source tool to simplify your digital presence.'>

  <meta name="robots" content="index, follow">
  <meta name="keywords" content="Lovilink, shorten link, bio link, open source marketing, free url shortener, link analytics, digital presence">
  <meta name="author" content="Tev Immanuel">
  <meta name="google" content="notranslate">

  <meta property="og:type" content="website">
  <meta property="og:title" content="Lovilink - Shortenlink & Bio Page Tool">
  <meta property="og:description" content="Connecting people and ideas, one link at a time. Lovilink is a free and open-source tool to simplify your digital presence.">
  <meta property="og:url" content="https://lovilink.com">
  <meta property="og:image" content="https://lovilink.com/assets/img/page.png">
  <meta property="fb:app_id" content="1246995273070330" />

  <meta name="google-site-verification" content="fWnter7hioZcQFqIw4Z3aCd2fCcUHmAYLNnU3uEQMm4" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  @vite(['resources/css/app.css'])
  @livewireStyles
  <link rel="stylesheet" href="{{ asset('assets/css/lovilink.css') }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/lovilink.ico') }}">
</head>
<body>

  @include('partial.topnav')
    {{ $slot }}
  @include('partial.footer')
  
  <script>
    $(document).ready(function () {
      let $nav = $('#mobile-nav');
      let $overlay = $('.mobile-overlay');
  
      function openMobileMenu() {
        $nav
          .removeClass('opacity-0 scale-95 pointer-events-none')
          .addClass('opacity-100 scale-100 pointer-events-auto');
        $overlay
          .removeClass('opacity-0 pointer-events-none')
          .addClass('opacity-100 pointer-events-auto');
      }
  
      function closeMobileMenu() {
        $nav
          .addClass('opacity-0 scale-95 pointer-events-none')
          .removeClass('opacity-100 scale-100 pointer-events-auto');
        $overlay
          .addClass('opacity-0 pointer-events-none')
          .removeClass('opacity-100 pointer-events-auto');
      }
  
      if (localStorage.getItem('mobileMenuOpen') === 'true') {
        openMobileMenu();
      }
  
      $('#menu-toggle').on('click', function () {
        const isOpen = $nav.hasClass('opacity-100');
  
        if (!isOpen) {
          openMobileMenu();
          localStorage.setItem('mobileMenuOpen', 'true');
        } else {
          closeMobileMenu();
          localStorage.setItem('mobileMenuOpen', 'false');
        }
      });
  
      $overlay.on('click', function () {
        closeMobileMenu();
        localStorage.setItem('mobileMenuOpen', 'false');
      });
  
    });
  </script>
  
  @livewireScripts
</body>
</html>