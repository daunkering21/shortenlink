<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lovilink</title>
  
  <meta name="google" content="notranslate">
  <meta name="description" content='Tired of long and ugly urls? Feel '>

  <meta property="og:title" content="Lovidea Shorten Link">
  <meta property="og:description" content="Shortening links has never been this simple!">
  <meta property="og:image" content="https://lovilink.com/assets/img/page.png">
  <meta property="og:url" content="https://lovilink.com">
  <meta property="og:type" content="website">
  <meta property="fb:app_id" content="1246995273070330" />

  <meta name="google-site-verification" content="fWnter7hioZcQFqIw4Z3aCd2fCcUHmAYLNnU3uEQMm4" />

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  @livewireStyles
  <link rel="stylesheet" href="{{ asset('assets/css/lovilink.css') }}">
  <link rel="icon" type="image/x-icon" href="https://lovilink.com/root/lovidea.ico">
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
  
      // Restore mobile nav state on Livewire page load
      if (localStorage.getItem('mobileMenuOpen') === 'true') {
        openMobileMenu();
      }
  
      // Toggle menu
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
  
      // Optional: Close when clicking overlay
      $overlay.on('click', function () {
        closeMobileMenu();
        localStorage.setItem('mobileMenuOpen', 'false');
      });
  
      // Optional: auto-close after Livewire navigation (only if you want this behavior)
      // Livewire.on('navigate', () => {
      //   closeMobileMenu();
      //   localStorage.setItem('mobileMenuOpen', 'false');
      // });
    });
  </script>
  
  @livewireScripts
</body>
</html>