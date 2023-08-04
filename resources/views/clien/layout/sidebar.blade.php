<div class="header-bottom sticky-header">
    <div class="container">
        <div class="header-left">
            <div class="dropdown category-dropdown">
                <a href="{{ route('product.home') }}" class="dropdown-toggle" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                    Food Categories <i class="icon-angle-down"></i>
                </a>
                <div class="dropdown-menu">
                    <nav class="side-nav">
                        <ul class="menu-vertical sf-arrows">
                            <li class="item-lead"><a href="#">Daily offers</a></li>
                            <li class="item-lead"><a href="#">Gift Ideas</a></li>
                            <li><a href="#">Chicken</a></li>
                            <li><a href="#">Bread</a></li>
                            <li><a href="#">Noodles</a></li>
                            <li><a href="#">Cream</a></li>
                            {{-- <li><a href="#">Sport</a></li>
                            <li><a href="#">More...</a></li> --}}

                        </ul><!-- End .menu-vertical -->
                    </nav><!-- End .side-nav -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .category-dropdown -->
        </div><!-- End .header-left -->

        <div class="header-center">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="megamenu-container active">
                        <a href="http://127.0.0.1:8000/game/home" class="">Home</a>
                    </li>
                    <li>
                        <a href="#">Shop</a>
                    </li>
                    <li>
                        <a href="#" class="">Product</a>
                    </li>
                    <li>
                        <a href="#" class="">Pages</a>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                    </li>
                    <li>
                        <a href="#">Elements</a>
                    </li>

                    @if (auth()->user()->role_id == 3 || auth()->user()->role_id == 1)
                        <li>
                            <a href="{{ route('admin.home') }}">Manager</a>
                        </li>

                        </li>
                    @endif
                </ul>
            </nav><!-- End .main-nav -->
        </div><!-- End .header-center -->
    </div><!-- End .container -->
</div><!-- End .header-bottom -->
<\