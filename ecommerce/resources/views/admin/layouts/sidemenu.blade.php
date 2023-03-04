<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2">SingleEcom</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('admindashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!--Category-->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('addcategory') }}" class="menu-link">
                        <div data-i18n="Account">Add Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('allcategory') }}" class="menu-link">
                        <div data-i18n="Notifications">All Category</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--Sub Category-->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Sub Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('addsubcategory') }}" class="menu-link">
                        <div data-i18n="Account">Add SubCategory</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('allsubcategory') }}" class="menu-link">
                        <div data-i18n="Notifications">All SubCategory</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--Product-->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Product</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('addproduct') }}" class="menu-link">
                        <div data-i18n="Account">Add Product</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('allproduct') }}" class="menu-link">
                        <div data-i18n="Notifications">All Product</div>
                    </a>
                </li>
            </ul>
        </li>

        <!--Orders-->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Orders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('pendingorders') }}" class="menu-link">
                        <div data-i18n="Account">Pending Orders</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
