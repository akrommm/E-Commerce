<header class="header">
    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="index.html" class="logo">
                    <img src="{{ url('/') }}/front/assets/images/logo.png" alt="Molla Logo" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="nav-link {{request()->is('home') ? 'active' : ''}} ">
                            <a href="{{ url('home') }}">Home</a>
                        </li>
                        <li class="nav-link {{request()->is('shop') ? 'active' : ''}} ">
                            <a href="{{ url('shop') }}">Shop</a>
                        </li>
                        <li class="nav-link {{request()->is('order') ? 'active' : ''}} ">
                            <a href="{{ url('order') }}">Order</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="dropdown cart-dropdown">
                    <a href="{{ url('cart') }}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                    </a>
                </div><!-- End .cart-dropdown -->
                <br>
                <nav class="main-nav ml-7">
                    <ul class="menu sf-arrows">
                        <li class="mr-0 ml-4"><a href="{{ url('login') }} " onclick="return confirm('Apakah anda yakin akan logout ?')">
                                @if(Auth::check())
                                {{request()->user()->nama}}
                                @else
                                Silahkan Login
                                @endif</a>
                        </li>
                    </ul>
                </nav><!-- End .main-nav -->
            </div><!-- End .header-right -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->