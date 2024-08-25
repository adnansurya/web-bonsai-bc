<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop">
                <div class="left-header">
                    <!-- Logo desktop -->		
                    <div class="logo">
                        <a href="index.html"><img src="/LP/assets/images/logo/logo3.png" width="170px" alt="IMG-LOGO"></a>
                    </div>	
                </div>
                    
                <div class="center-header">
                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                            </li>


                            <li >
                                <a class="{{ Request::is('shop') ? 'active' : '' }}" href="/shop">Produk</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('about') ? 'active' : '' }}" href="/about">Tentang Kami</a>
                            </li>


                            <li>
                                <a class="{{ Request::is('contact') ? 'active' : '' }}" href="/contact">Hubungi</a>
                            </li>
                        </ul>
                    </div>
                </div>
                    
                <div class="right-header">
                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click p-t-8">
                        <div class="h-full flex-m">
                            <div class="icon-header-item flex-c-m trans-04 js-show-modal-search">
                                <img src="/LP/assets/images/icons/icon-search.png" alt="SEARCH">
                            </div>
                            <div class="icon-header-item flex-c-m trans-04">
                                <a href="/cart">
                                    <img src="/LP/assets/images/icons/icon-cart-2.png" alt="CART">
                                </a>
                            </div>
                            @auth
                                <div class="dropdown d-inline-block">
                                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        @can('seller')
                                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                        @endcan
                                        <hr>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="/dashboard" class="icon-header-item flex-c-m trans-04">
                                    <img width="13px" src="/LP/assets/images/icons/icon-user.png" alt="Dashboard">
                                </a>
                            @endauth
                            
                        </div>
                    </div>
                </div>
            </nav>
        </div>	
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="/"><img src="/LP/assets/images/logo/logo1.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click m-r-15">
            <div class="h-full flex-m">
                <div class="icon-header-item flex-c-m trans-04 js-show-modal-search">
                    <img src="/LP/assets/images/icons/icon-search.png" alt="SEARCH">
                </div>
            </div>
            <div class="icon-header-item flex-c-m trans-04 icon-header-noti" data-notify="2">
                <a href="/cart">
                    <img src="/LP/assets/images/icons/icon-cart-2.png" alt="CART">
                </a>
            </div>
            <a href="/dashboard" class="icon-header-item flex-c-m trans-04">
                <img width="13px" src="/LP/assets/images/icons/icon-user.png" alt="Dashboard">
            </a>
            
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="/">Beranda</a>
            </li>

            <li>
                <a href="/shop">Produk</a>
            </li>

            <li>
                <a href="/about">Tentang Kami</a>
            </li>

            <li>
                <a href="/contact">Hubungi</a>
            </li>

        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <span class="lnr lnr-cross"></span>
        </button>
        
        <div class="container-search-header">
            <form class="wrap-search-header flex-w" action="/shop" method="GET">
                <button class="flex-c-m trans-04">
                    <span class="lnr lnr-magnifier"></span>
                </button>
                <input class="plh1" type="text" name="search" placeholder="Cari Produk" name="search">
            </form>
        </div>
    </div>
</header>