<nav id="navbar" class="nav-blur px-6 py-4 shadow-md">
  <div class="container mx-auto flex justify-between items-center">
    <!-- Logo -->
    <div class="flex items-center">
      <a href="{{ route('livewire-home') }}" wire:navigate class="text-2xl font-bold gradient-text">Lovilink</a>
    </div>

    <!-- Desktop Nav -->
    <div class="hidden md:flex space-x-6">
      <a href="{{ route('livewire-features') }}" wire:navigate class="text-gray-700 hover:text-gray-900">Features</a>
      <a href="{{ route('livewire-pages') }}" wire:navigate class="text-gray-700 hover:text-gray-900">Pages</a>
      <a href="{{ route('livewire-news') }}" wire:navigate class="text-gray-700 hover:text-gray-900">News</a>
      <a href="{{ route('livewire-contact') }}" wire:navigate class="text-gray-700 hover:text-gray-900">Contact</a>
    </div>

    <!-- Get Started + Hamburger -->
    <div class="flex items-center md:hidden relative">
      <button id="menu-toggle" class="focus:outline-none">
        <svg class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    <!-- Get Started Desktop -->
    <div class="hidden md:block">
      <a href="{{ route('livewire-register') }}" class="px-6 py-2 rounded-full btn-highlight text-white font-medium">Get Started</a>
    </div>
  </div>

  
</nav>

<div class="mobile-overlay fixed top-[315px] inset-0 bg-black bg-opacity-40 z-30 transition-opacity duration-300 ease-in-out opacity-0 min-h-screen pointer-events-none md:hidden "></div>

<div id="mobile-nav" class="fixed top-[64px] left-0 w-full nav-blur shadow-md z-40 px-6 py-4 transition-all duration-300 ease-in-out
        opacity-0 scale-95 pointer-events-none md:hidden">
  <a href="{{ route('livewire-features') }}" wire:navigate class="block text-gray-700 text-center border-b border-gray-200 py-2 hover:text-gray-900">Features</a>
  <a href="{{ route('livewire-pages') }}" wire:navigate class="block text-gray-700 text-center border-b border-gray-200 py-2 hover:text-gray-900">Pages</a>
  <a href="{{ route('livewire-news') }}" wire:navigate class="block text-gray-700 text-center border-b border-gray-200 py-2 hover:text-gray-900">News</a>
  <a href="{{ route('livewire-contact') }}" wire:navigate class="block text-gray-700 text-center py-2 hover:text-gray-900">Contact</a>
  <a href="{{ route('livewire-register') }}" class="block px-6 py-2 rounded-full btn-highlight mt-4 text-white font-medium text-center">Get Started</a>
</div>