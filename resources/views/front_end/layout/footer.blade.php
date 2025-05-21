@php
    $menus_footer = getMenuParent(0, 1);
@endphp
<style>
    .logo-footer {
        font-size: 35px;
    }

    #footer {
        padding-top: 30px;
    }
</style>
<footer id="footer">
    <div class="wdt-elementor-container-fluid">
        <div id="footer-1265" class="wdt-footer-tpl footer-1265">
            <div data-elementor-type="wp-post" data-elementor-id="1265" class="elementor elementor-1265"
                data-elementor-post-type="wdt_footers">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-e8f5686 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="e8f5686" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-background-overlay"></div>
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ae712bd"
                            data-id="ae712bd" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-56d0b69 elementor-section-content-middle elementor-section-full_width wdt-custom-footer-column-change elementor-section-height-default elementor-section-height-default"
                                    data-id="56d0b69" data-element_type="section"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-no">
                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element "
                                        {{-- elementor-element-99c540d --}}
                                            data-id="99c540d" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-0bb0a07 elementor-align-center elementor-widget elementor-widget-wdt-logo"
                                                    data-id="0bb0a07" data-element_type="widget"
                                                    data-widget_type="wdt-logo.default">
                                                    <div class="elementor-widget-container">
                                                        <div id="lilacbeauty-0bb0a07" class="wdt-logo-container"> 
                                                            <a href="/" rel="home">
                                                                <div class="logo logo-footer"> {{ $post->title ?? '' }}
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="elementor-element elementor-element-1e4b137 elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="1e4b137" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a class="elementor-button elementor-button-link elementor-size-sm"
                                                                href="#">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span class="elementor-button-text">Book
                                                                        appointment</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="elementor-element elementor-element-97c8152 elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="97c8152" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a class="elementor-button elementor-button-link elementor-size-sm"
                                                                href="#">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span class="elementor-button-text">Visit
                                                                        our shop</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-d6b5a38"
                                            data-id="d6b5a38" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-50c5603 elementor-widget elementor-widget-text-editor"
                                                    data-id="50c5603" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="flex max-w-full flex-col flex-grow">
                                                            <div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal break-words [.text-message+&amp;]:mt-5"
                                                                dir="auto" data-message-author-role="assistant"
                                                                data-message-id="ec3c0653-3a99-4f89-a247-8bad019a0e76"
                                                                data-message-model-slug="gpt-4o">
                                                                <div
                                                                    class="flex w-full flex-col gap-1 empty:hidden first:pt-[3px]">
                                                                    <div
                                                                        class="markdown prose w-full break-words dark:prose-invert dark">
                                                                        <div
                                                                            class="flex-shrink-0 flex flex-col relative items-end">
                                                                            <div>
                                                                                <div class="pt-0">
                                                                                    <div
                                                                                        class="gizmo-bot-avatar flex h-8 w-8 items-center justify-center overflow-hidden rounded-full">
                                                                                        <div
                                                                                            class="relative p-1 rounded-sm flex items-center justify-center bg-token-main-surface-primary text-token-text-primary h-8 w-8">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="group/conversation-turn relative flex w-full min-w-0 flex-col agent-turn">
                                                                            <div class="flex-col gap-1 md:gap-3">
                                                                                <div
                                                                                    class="flex max-w-full flex-col flex-grow">
                                                                                    <div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal break-words [.text-message+&amp;]:mt-5"
                                                                                        dir="auto"
                                                                                        data-message-author-role="assistant"
                                                                                        data-message-id="7286533f-4c65-44fa-89e0-4a782b60d50b"
                                                                                        data-message-model-slug="gpt-4o">
                                                                                        <div
                                                                                            class="flex w-full flex-col gap-1 empty:hidden first:pt-[3px]">
                                                                                            <div
                                                                                                class="markdown prose w-full break-words dark:prose-invert dark">
                                                                                                {!! $post->content_footer ?? '' !!}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-a7d4774"
                                            data-id="a7d4774" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-55b31d1 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                    data-id="55b31d1" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <p>Visit Us</p>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-c4cb3b1 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                    data-id="c4cb3b1" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <ul>
                                                            {!! !empty($post->address) ? "<li>$post->address</li>" : '' !!} 
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1b4a9c4 wdt-footer-social-icon-style elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons"
                                                    data-id="1b4a9c4" data-element_type="widget"
                                                    data-widget_type="social-icons.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-social-icons-wrapper elementor-grid">
                                                            @if (!empty($post->config_social))
                                                                @include('front_end.block.share_social', [
                                                                    'config_social' => json_decode(
                                                                        $post->config_social),
                                                                ])
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-ecb3031 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                    data-id="ecb3031" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-0335d44"
                                            data-id="0335d44" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-88848df elementor-widget elementor-widget-text-editor"
                                                    data-id="88848df" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <p>©{{ $config_website->website ?? '' }}. All Rights Reserved.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</footer>
