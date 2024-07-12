<nav class="navbar navbar-expand-lg bg-body-tertiary shadow mb-1">
    <div class="container">
        <a class="navbar-brand bold fonts-28" href="/home">
            <img src="/../assets/logo/lovidea_purple.png" style="width:37px" alt="kosong">
            <span class="text-warning">Lov</span><span class="text-purple">Idea</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('home*') ? 'bold' : '' }}" href="/home"><span class="text-secondary">Home</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('articles*') ? 'bold' : '' }}" href="/articles"><span class="text-secondary">Articles</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('links*') ? 'bold' : '' }}" href="/links"><span class="text-secondary">Link</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('features*') ? 'bold' : '' }}" href="/features"><span class="text-secondary">Features</span></a>
                </li>
                @if(auth()->user() !== null)
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('dashboard*') ? 'bold' : '' }}" href="/dashboard"><span class="text-secondary">Dashboard</span></a>
                </li>
                @endif
            </ul>
            @if(auth()->user() === null)
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item gap-3">
                        <div class="d-inline-flex gap-2">
                            <a href="/login" class="none">
                                <button type="button" class="btn {{ Request::is('login') ? 'btn-purple' : 'btn-outline-purple' }}"><span class="bold">Login</span></button>
                            </a>
                            <a href="/register" class="none">
                                <button type="button" class="btn {{ Request::is('register') ? 'btn-warning' : 'btn-outline-warning' }}"><span class="bold">Sign Up</span></button>
                            </a>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item gap-3">
                        <div class="d-inline-flex gap-2">
                            <a href="/logout" class="none">
                                <button type="button" class="btn btn-warning d-flex justify-content-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"  fill="none" stroke="#5b387b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" /><path d="M15 12h-12l3 -3" />
                                        <path d="M6 15l-3 -3" />
                                    </svg>
                                    <span class="text-purple bold">Log out</span>
                                </button>
                            </a>
                        </div>
                    </li>
                </ul>
            @endif
            

        </div>
    </div>
</nav>