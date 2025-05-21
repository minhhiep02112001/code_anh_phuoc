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
                                            {{-- elementor-element-99c540d --}} data-id="99c540d" data-element_type="column">
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
                                                        <div class="elementor-element elementor-element-1b4a9c4 wdt-footer-social-icon-style elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons"
                                                            data-id="1b4a9c4" data-element_type="widget"
                                                            data-widget_type="social-icons.default">
                                                            <div class="elementor-widget-container">
                                                                <div
                                                                    class="elementor-social-icons-wrapper elementor-grid">
                                                                    <span class="elementor-grid-item">
                                                                        <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-repeater-item-c6c061c"
                                                                            href="#" target="_blank">
                                                                            <span class="elementor-screen-only"></span>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                x="0px" y="0px" viewBox="0 0 100 100"
                                                                                style="enable-background:new 0 0 100 100;"
                                                                                xml:space="preserve">
                                                                                <g>
                                                                                    <path
                                                                                        d="M70,97.5H30C14.8,97.5,2.5,85.2,2.5,70V30C2.5,14.8,14.8,2.5,30,2.5h40c15.2,0,27.4,12.3,27.5,27.5v40  C97.5,85.2,85.2,97.5,70,97.5 M30,12.1c-9.9,0-17.9,8-17.9,17.9v40c0,9.9,8,17.9,17.9,17.9h40c9.9,0,17.9-8,17.9-17.9V30  c0-9.9-8-17.9-17.9-17.9H30z">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M50,74c-13.3,0-24-10.8-24-24s10.8-24,24-24s24,10.8,24,24l0,0C74,63.3,63.3,74,50,74 M50,33.9  c-8.9,0-16.1,7.2-16.1,16.1S41.1,66.1,50,66.1S66.1,58.9,66.1,50l0,0C66,41.1,58.9,34,50,33.9">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M80.1,24.8c0,3.1-2.5,5.6-5.6,5.6s-5.6-2.5-5.6-5.6s2.5-5.6,5.6-5.6l0,0C77.6,19.2,80.1,21.7,80.1,24.8">
                                                                                    </path>
                                                                                </g>
                                                                            </svg> </a>
                                                                    </span>
                                                                    <span class="elementor-grid-item">
                                                                        <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-repeater-item-0abbfb2"
                                                                            href="#" target="_blank">
                                                                            <span class="elementor-screen-only"></span>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                x="0px" y="0px" viewBox="0 0 100 100"
                                                                                style="enable-background:new 0 0 100 100;"
                                                                                xml:space="preserve">
                                                                                <path
                                                                                    d="M67.3,19.2l9.3,0.2V2.5L62.8,2c-13,0-23.5,10.5-23.5,23.5l0,0v15h-16v18.1h16V98h20.1V58.6h14.3l2.9-18.1H59.4 V27C59.4,22.7,63,19.2,67.3,19.2L67.3,19.2">
                                                                                </path>
                                                                            </svg> </a>
                                                                    </span>
                                                                    <span class="elementor-grid-item">
                                                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-whatsapp elementor-repeater-item-56c79bf"
                                                                            href="#"
                                                                            target="_blank">
                                                                            <span
                                                                                class="elementor-screen-only">Whatsapp</span>
                                                                            <svg class="e-font-icon-svg e-fab-whatsapp"
                                                                                viewBox="0 0 448 512"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                                                                                </path>
                                                                            </svg> </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

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
