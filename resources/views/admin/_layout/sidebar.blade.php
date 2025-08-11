<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <h1>ADMIN</h1>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                {{-- <li class="{{ \Request::route()->getName() == 'admin.dashboard' ? 'active' : '' }}">
                    <a class="js-arrow" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>

                </li> --}}

                <li class="{{ \Request::route()->getName() == 'admin.banner.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.banner.index') }}" title="Quản lý banner"> <i
                            class="fas fa-table"></i><span>Quản lý
                            banner</span></a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.category.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}" title="Quản lý danh mục"> <i
                            class="fas fa-table"></i><span>Quản lý danh
                            mục</span></a>
                </li>

                <li class="{{ \Request::route()->getName() == 'admin.toplist' ? 'active' : '' }}">
                    <a href="{{ route('admin.toplist') }}" title="Quản lý danh mục"> <i
                            class="fas fa-table"></i><span>Quản lý top list</span></a>
                </li>

                <li class="{{ \Request::route()->getName() == 'admin.post.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.post.index') }}" title="Quản lý brand"> <i
                            class="fas fa-table"></i><span>Quản lý
                            brand</span></a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.comment.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.comment.index') }}" title="Quản lý Comment"> <i
                            class="fas fa-table"></i><span>Quản lý
                            Comment</span></a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.page.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.page.index') }}" title="Quản lý page"> <i
                            class="fas fa-table"></i><span>Quản lý
                            page</span></a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.redirect.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.redirect.index') }}" title="Quản lý link 301"> <i
                            class="fas fa-table"></i><span>Quản lý link
                            301</span></a>
                </li>

                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i><span>Cài đặt hệ thống</span></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('admin.setting') }}">Cài đặt</a>
                        </li>
                        <li class="m-menu__item--active">
                            <a href="{{ route('admin.menu.index') }}">Cài đặt menu</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-arrow-down"></i><span>Crawler</span></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="{{ \Request::route()->getName() == 'admin.keyword.index' ? 'active' : '' }}">
                            <a href="{{ route('admin.keyword.index') }}" title="Quản lý page"> <i
                                    class="fas fa-table"></i><span>Keyword</span></a>
                        </li>

                        <li class="{{ \Request::route()->getName() == 'admin.crawler.index' ? 'active' : '' }}">
                            <a href="{{ route('admin.crawler.index') }}" title="Quản lý page"> <i
                                    class="fas fa-table"></i><span>Data Crawler</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
