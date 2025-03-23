<div class="front-nav poppins-bold">
  <a class="logo" href="/">
    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="40px">
    <div class="logo-text">
      <span class="primary-color">Lov</span>
      <span class="secondary-color">Idea</span>
    </div>
  </a>
  <div class="mobile-nav">
    <button class="burger-menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M4 6l16 0" />
        <path d="M4 12l16 0"/>
        <path d="M4 18l16 0"/>
      </svg>
    </button>
  </div>
  <div class="nav-group">
    <a href="#" class="poppins-semibold">Home</a>
    <a href="#" class="poppins-light">Link</a>
    <a href="#" class="poppins-light">Feedback</a>
  </div>
  <div class="nav-user">
    <button class="login" onclick="loginPage()">Login</button>
    <button class="register" onclick="registerPage()">Register</button>
  </div>
</div>