<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable ps-theme-dark">
            <br>
            <li class="font-weight-bold ml-3">Menu</li>
            <!-- <li class=" ml-3">Menu</li> -->
            <li class="nav-item">
                <a href=" {{ url('admin/dashboard') }}">
                    <span class="icon-holder">
                        <i class="nav-icon fas fa-home"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="nav-icon fas fas fa-stream"></i>
                    </span>
                    <span class="title">Katalog</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{request()->is('admin/produk') ? 'active' : ''}} ">
                        <a href="{{ url('admin/produk') }}"><i class="fas fa-shopping-bag"></i> Produk</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>