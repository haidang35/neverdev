<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Apps</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-ecommerce">Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.blog.index') }}" key="t-products">List</a></li>
                        <li><a href="{{ route('admin.blog.create') }}" key="t-products">Create</a></li>
                        <li><a href="{{ route('admin.topic.index') }}" key="t-products">Topic</a></li>
                        <li><a href="#" key="t-product-detail">Unpublished</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank" class="waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="view--blog">View Blog</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->