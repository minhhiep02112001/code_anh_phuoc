
 
@if (!empty($config_social))
    <ul class="socials">
        @if (!empty($config_social->yelp))
            <li>
                <a href="{{ $config_social->yelp }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/yelp.png" alt="yelp" width="30px" height="30px">
                </a>
            </li>
        @endif
        @if (!empty($config_social->tripadvisor))
            <li>
                <a href="{{ $config_social->tripadvisor }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/tripadvisor.png" alt="tripadvisor" width="30px" height="30px">
                </a>
            </li>
        @endif
        @if (!empty($config_social->facebook))
            <li>
                <a href="{{ $config_social->facebook }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/facebook-1.png" alt="facebook" width="30px" height="30px">
                </a>
            </li>
        @endif
        @if (!empty($config_social->pinterest))
            <li>
                <a href="{{ $config_social->pinterest }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/Pinterest-icon.png" alt="pinterest" width="30px" height="30px">
                </a></li>
        @endif
        
        @if (!empty($config_social->instagram))
            <li>
                <a href="{{ $config_social->instagram }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/instagram.png" alt="pinterest" width="30px" height="30px">
                </a></li>
        @endif

        @if (!empty($config_social->twitter))
            <li><a href="{{ $config_social->twitter }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/twitter.png" alt="twitter" width="30px" height="30px">
                </a></li>
        @endif
        @if (!empty($config_social->telegram))
            <li><a href="{{ $config_social->telegram }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/telegram.png" alt="twitter" width="30px" height="30px">
                </a></li>
        @endif
        @if (!empty($config_social->tiktok))
            <li><a href="{{ $config_social->tiktok }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/tiktok.png" alt="tiktok" width="30px" height="30px">
                </a></li>
        @endif
        @if (!empty($config_social->zalo))
            <li><a href="{{ $config_social->zalo }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/zalo.png" alt="zalo" width="30px" height="30px">
                </a></li>
        @endif
        @if (!empty($config_social->whatsapp))
            <li><a href="{{ $config_social->whatsapp }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/whatsapp.png" alt="whatsapp" width="30px" height="30px">
                </a></li>
        @endif

        @if (!empty($config_social->youtobe))
            <li><a href="{{ $config_social->youtobe }}" rel="nofollow" target="_blank">
                    <img src="/assets/images/youtube.png" alt="youtube" width="30px" height="30px">
                </a></li>
        @endif

    </ul>
@endif

