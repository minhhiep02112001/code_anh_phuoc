@php
    $menus_header = getMenuParent(0, 0);
@endphp

<div id="NavDrawer" class="drawer drawer--left">
    <div id="html-section-drawer-menu" class="html-section">
        <div data-section-id="drawer-menu" data-section-type="drawer-menu-section">
            <div class="drawer__fixed-header">
                <div class="drawer__header">
                    <div class="drawer__close drawer__close--left">
                        <button type="button" class="icon-fallback-text drawer__close-button js-drawer-close">
                            <span class="icon icon-x" aria-hidden="true"></span>
                            <span class="fallback-text">Close menu</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="drawer__inner">
                <ul class="mobile-nav">
                    @foreach($menus_header as $menu)
                        @php
                            $childs =  getMenuParent($menu->id, 0);
                        @endphp
                        @if(!empty($childs))
                            <li class="mobile-nav__item">
                                <a href="{{$menu->link}}" class="mobile-nav__link">{{$menu->title}}</a>
                            </li>
                        @else
                            <li class="mobile-nav__item">
                                <div class="mobile-nav__has-sublist">
                                    <a href="{{$menu->link}}" class="mobile-nav__link"
                                       id="Label-mega-menu">{{$menu->title}}</a>
                                    <div class="mobile-nav__toggle">
                                        <button type="button" class="mobile-nav__toggle-btn icon-fallback-text"
                                                data-aria-controls="Linklist-mega-menu-{{$menu->id}}" aria-expanded="false"
                                                aria-controls="Linklist-mega-menu-{{$menu->id}}">
										<span class="icon-fallback-text mobile-nav__toggle-open">
										<span class="icon icon-plus" aria-hidden="true"></span>
										<span class="fallback-text">Expand submenu</span>
										</span>
                                            <span class="icon-fallback-text mobile-nav__toggle-close">
										<span class="icon icon-minus" aria-hidden="true"></span>
										<span class="fallback-text">Collapse submenu</span>
										</span>
                                        </button>
                                    </div>
                                </div>
                                <ul class="mobile-nav__sublist megamenu__dropdown megamenu_1" id="Linklist-mega-menu-{{$menu->id}}"
                                    aria-labelledby="Label-mega-menu">
                                    @foreach($childs as $child)
                                        <li class="mobile-nav__item">
                                            <a href="{{$child->link}}" class="mobile-nav__link">{{$child->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach

                    <li class="mobile-nav__item">
                        <a href="./page-contact.html" class="mobile-nav__link">Contact us</a>
                    </li>
                    <li class="mobile-nav__item mobile-nav__item--secondary">
                        <a href="./account-login.thml" id="customer_login_link">Log In</a>
                    </li>
                    <li class="mobile-nav__item mobile-nav__item--secondary">
                        <a href="./account-register.html" id="customer_register_link">Create Account</a>
                    </li>
                </ul>
                <form action="./search" method="get" class="input-group search-bar search-bar--drawer"
                      role="search" style="position: relative;">
                    <input type="search" name="q" value="" placeholder="Search something" class="input-group-field"
                           aria-label="Search something" autocomplete="off">
                    <span class="input-group-btn">
								<button type="submit" class="btn--secondary icon-fallback-text">
									<span class="icon icon-search" aria-hidden="true"></span>
									<span class="fallback-text">Search</span>
								</button>
							</span>
                </form>
            </div>
        </div>
    </div>
</div>
