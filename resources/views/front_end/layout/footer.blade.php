@php
    $menus_footer = getMenuParent(0, 1);
@endphp
<footer class="main-footer">
    <div class="auto-container">
        <div class="box-footer">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="logo-footer">
                        <a href="{{ route('homepage') }}" title="{{ $config_website->website ?? '' }}">
                            <img src="{{ getImageThumb($config_website->logo_footer ?? '') }}" width="150"
                                alt="{{ $config_website->website ?? '' }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="footer-list">
                        <h5 class="title-footer">About Us</h5>
                        <ul class="footer-nav">
                            @foreach($menus_footer as $menu)
                                <li><a href="{{ $menu->link }}" title="{{ $menu->title }}">{{ $menu->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <h5 class="title-footer">Do Business With Us</h5>
                    <ul class="footer-nav">
                        <li>Email : {{ $config_website->email ?? '' }}</li>
                    </ul>
                    <ul class="social-icon-one">
                        <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fab fa-pinterest"></span></a></li>
                        <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                        <li><a href="#"><span class="fab fa-google"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="text">© 2025 {{ $config_website->website ?? '' }}. All rights reserved.</div>
    </div>
</footer>