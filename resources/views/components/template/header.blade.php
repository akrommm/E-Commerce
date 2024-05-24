<div class="header">
    <div class="logo logo-dark">
        <a href="">
            @php
            $logo = app('App\Http\Controllers\Admin\LogoController')->getLogo();
            @endphp
            @if($logo)
            <img src="{{ url($logo->url_logo) }}" alt="Logo" width="100" height="47" class="mt-2">
            <img class="logo-fold mt-2" src="{{ url($logo->url_logo) }}" alt="Logo" width="72" height="51">
            @else
            <!-- Jika data logo kosong, Anda dapat menampilkan logo default atau pesan lain -->

            @endif
            <!-- <img src="{{ url('/') }}/images/logo.png" alt="Logo" width="100" height="47" class="mt-2">
            <img class="logo-fold mt-2" src="{{ url('/') }}/images/logo.png" alt="Logo" width="72" height="51"> -->
        </a>
    </div>
    <div class="logo logo-white">
        <a href="index.html">
            <img src="{{ url('/') }}/images/logo.png" alt="Logo">
            <img class="logo-fold p-4" src="{{ url('/') }}/images/logo.png" alt="Logo">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <div class="sidebar-header font-weight-bold" style="display: block;background-color: #fff;color: #2A2A2A;width: 100%;padding: 0 20px;padding-left: 20px;clear: both;z-index: 10;position: relative;text-align:center;font-size: 16px;">
                <li class="nav-item">
                    <a href=" {{ url('home') }}">
                        <span class="title" style="font-size: medium;">Halaman Depan</span>
                    </a>
                </li>
            </div>
        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left" style="padding-left: 20px;">
                <div class="pointer" data-toggle="dropdown">
                    <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
                        <span class="semi-bold" style="font-weight: 500 ;">
                            @if (auth()->check())
                            Hallo, {{ auth()->user()->nama }}
                            @endif
                            @if (auth()->user()->foto)
                            <img src="{{url('/'.auth()->user()->foto)}}" alt="User Image" style="width: 60px;height: 60px; padding: 10px; margin: 0px; " class="img-circle">
                            @else
                            <img src="{{url('/')}}/images/profile.jpg" alt="User Avatar" style="width: 60px;height: 60px; padding: 10px; margin: 0px; " class="img-circle">
                            @endif
                        </span>
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-25">
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">
                                    @if (auth()->check())
                                    {{ auth()->user()->nama }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/profile') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                <span class="m-l-10">Edit Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="{{ url('logout') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                <span class="m-l-10">Logout</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>