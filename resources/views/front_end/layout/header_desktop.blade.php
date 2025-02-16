@php
    $menus_header = getMenuParent(0, 0);
@endphp

<header class="header max-width-container">
    <div class="header-items header__container header__container_transparent-border"><a href="{{ url('/') }}"
            class="header__logo"><img src="{{ convertPathImage($config_website->logo ?? '') }}" at-logo alt="MenuPages logo"
                class="header__logo-image"></a>
        <div class="header__burger-menu"><span
                class="header__burger-menu-icon icon-burger-menu-icon header__burger-menu-icon_white"></span>
        </div>
        <nav class="header__navigation">
            <ul class="header__navigation-list">
                @foreach ($menus_header as $menu)
                    <li class="header__navigation-list-item">
                        <a href="{{ $menu->link }}"
                            class="header__navigation-link header__navigation-link_white-color">
                            {{ $menu->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
<div id="modal" class="modal" style="z-index:1006;" aria-hidden="true">
    <div tabindex="-1" class="modal__overlay" style="z-index: 999"></div>
    <div aria-labelledby="modalTitle" role="dialog" class="modal__content modal__content--padded"
        style="z-index: 1000"><button aria-label="Close this dialog window"
            class="modal__close modal__close--right">×</button>
        <div role="document" class="modal__body"><!---->
            <div class="header-modal no-gutters" baseurl="/" state="[object Object]"><a href="https://menupages.com/"
                    class="header__logo"><img src="{{ convertPathImage($config_website->logo ?? '') }}" at-logo=""
                        alt="MenuPages logo" class="header__logo-image"></a>
                <nav class="header__modal__navigation d-flex col no-gutters">
                    <ul class="header__modal__navigation-list">
                        @foreach ($menus_header as $menu)
                            <li class="header__modal__navigation-list-item">
                                <a href="{{ $menu->link }}" class="header__modal__navigation-link active">
                                    {{ $menu->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
