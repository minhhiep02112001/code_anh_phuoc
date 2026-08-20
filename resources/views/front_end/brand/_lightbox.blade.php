@if ($hasMenuGallery)
    <script type="application/json" id="mjMenuGalleryData">
        {!! json_encode(
            $menuGallery->map(function ($image, $i) use ($post) {
                return [
                    'src' => convertPathImage($image->thumbnail),
                    'alt' => $post->title . ' Menu ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                ];
            })->values(),
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
        ) !!}
    </script>
    <div class="mj-lightbox" id="mjLightbox" role="dialog" aria-modal="true" aria-hidden="true"
        aria-label="Menu photo viewer">
        <button type="button" class="mj-lightbox-prev" aria-label="Previous menu photo">
            <i class="bi bi-arrow-left"></i>
        </button>
        <div class="mj-lightbox-stage">
            <img class="mj-lightbox-img" src="" alt="" />
            <span class="mj-lightbox-counter" id="mjLightboxCounter" aria-live="polite"></span>
            <button type="button" class="mj-lightbox-close" aria-label="Close menu viewer">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <button type="button" class="mj-lightbox-next" aria-label="Next menu photo">
            <i class="bi bi-arrow-right"></i>
        </button>
    </div>
@endif

@if ($hasPhotoGallery)
    <script type="application/json" id="mjPhotoGalleryData">
        {!! json_encode(
            $photoGallery->map(function ($image, $i) use ($post) {
                return [
                    'src' => convertPathImage($image->thumbnail),
                    'alt' => $post->title . ' Photo ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                ];
            })->values(),
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
        ) !!}
    </script>
    <div class="mj-lightbox" id="mjPhotoLightbox" role="dialog" aria-modal="true" aria-hidden="true"
        aria-label="Photo viewer">
        <button type="button" class="mj-lightbox-prev" aria-label="Previous photo">
            <i class="bi bi-arrow-left"></i>
        </button>
        <div class="mj-lightbox-stage">
            <img class="mj-lightbox-img" src="" alt="" />
            <span class="mj-lightbox-counter" id="mjPhotoLightboxCounter" aria-live="polite"></span>
            <button type="button" class="mj-lightbox-close" aria-label="Close photo viewer">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <button type="button" class="mj-lightbox-next" aria-label="Next photo">
            <i class="bi bi-arrow-right"></i>
        </button>
    </div>
@endif
