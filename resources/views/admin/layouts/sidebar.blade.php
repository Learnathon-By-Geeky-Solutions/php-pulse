<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <!-- Sidebar Brand -->
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Dashboard Section -->
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ setActive('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Manage Categories Section -->
            <li class="menu-header">Manage</li>
            <li class="dropdown {{ setActive([
                'admin.category.*', 
                'admin.sub-category.*', 
                'admin.child-category.*'
            ]) }}">
               
                <li
                class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                    <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                    <li class="{{ setActive(['admin.child-category.*']) }}"> <a class="nav-link"
                            href="{{ route('admin.child-category.index') }}">Child Category</a></li>

                </ul>
            </li>

            <!-- Manage Products Section -->
            <li
            class="dropdown {{ setActive([
                'admin.brand.*',
                'admin.products.*',
                'admin.products-image-gallery.*',
                'admin.products-variant.*',
                'admin.products-variant-item.*',
                'admin.seller-products.*',
                'admin.seller-pending-products.*',
            ]) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
                <span>Manage Products</span></a>
            <ul class="dropdown-menu">
                <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link"
                        href="{{ route('admin.brand.index') }}">Brands</a></li>
                <li
                    class="{{ setActive([
                        'admin.products.*',
                        'admin.products-image-gallery.*',
                        'admin.products-variant.*',
                        'admin.products-variant-item.*',
                        'admin.reviews.*',
                    ]) }}">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">Products</a>
                </li>
                <li class="{{ setActive(['admin.seller-products.*']) }}"><a class="nav-link"
                        href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                <li class="{{ setActive(['admin.seller-pending-products.*']) }}"><a class="nav-link"
                        href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a></li>

                {{-- <li class="{{ setActive(['admin.reviews.*']) }}"><a class="nav-link"
                        href="{{ route('admin.reviews.index') }}">Product Reviews</a></li> --}}

            </ul>
        </li>

      <!-- Vendor Profile Section -->
<li class="dropdown {{ setActive([
    'admin.vendor-profile.*',
    'admin.coupons.*',
    'admin.shipping-rule.*',
    'admin.payment-settings.*',
]) }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-cogs"></i>
        <span>Ecommerce</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{ setActive(['admin.flash-sale.*']) }}">
            <a class="nav-link" href="{{ route('admin.flash-sale.index') }}">Flash Sale</a>
        </li>
        <li class="{{ setActive(['admin.coupons.*']) }}">
            <a class="nav-link" href="{{ route('admin.coupons.index') }}">Coupons</a>
        </li>
        <li class="{{ setActive(['admin.shipping-rule.*']) }}">
            <a class="nav-link" href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a>
        </li>
        <li class="{{ setActive(['admin.vendor-profile.*']) }}">
            <a class="nav-link" href="{{ route('admin.vendor-profile.index') }}">Vendor Profile</a>
        </li>
        <li class="{{ setActive(['admin.payment-settings.*']) }}">
            <a class="nav-link" href="{{ route('admin.payment-settings.index') }}">Payment Settings</a>
        </li>
    </ul>
</li>

            <!-- Slider Section -->
            <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-images"></i>
                    <span>Manage Website</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.slider.*']) }}">
                        <a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a>
                    </li>
                    <li class="{{ setActive(['admin.slider.*']) }}">
                        <a class="nav-link" href="{{ route('admin.home-page-setting') }}">Home Page Setting</a>
                    </li>

                </ul>

            </li>
            <li><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-wrench"></i>
                <span>Settings</span></a></li>
        </ul>
    </aside>
</div>
