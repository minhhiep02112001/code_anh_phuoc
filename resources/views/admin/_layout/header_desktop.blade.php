<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">

                <div class="header-button header-button-left">
                    <div class="show_hide_sidebar">
                        <button class="btn btn-light  btn-hide-sidebar" data-type="hide" type="button"><i
                                class="fa fa-caret-square-o-left" style="font-size: 20px;"></i></button>
                        <button class="btn btn-light hide btn-show-sidebar" data-type="show" type="button"><i
                                class="fa fa-caret-square-o-right" style="font-size: 20px;"></i></button>
                    </div>

                    <div class="noti-wrap">
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary ml-3">Config Menu</a>
                    </div>

                </div>
                <div class="header-button">
                    <div class="noti-wrap">
                        <a href="{{ route('admin.clear.cache') }}" class="btn btn-warning mr-3">Clear cache</a>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ asset('/admins/images/icon/avatar-01.jpg') }}"
                                    alt="{{ auth()->user()->name ?? 'Admin' }}" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ auth()->user()->name ?? 'Admin' }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{ asset('/admins/images/icon/avatar-01.jpg') }}"
                                                alt="{{ auth()->user()->name ?? 'Admin' }}" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ auth()->user()->name ?? 'Admin' }}</a>
                                        </h5>
                                        <span class="email">{{ auth()->user()->email ?? 'admin@gmail.com' }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>

                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('admin.logout') }}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
