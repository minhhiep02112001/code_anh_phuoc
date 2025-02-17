@php
    $ver = 128;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $config_social = getValueSetting('config_social');
@endphp
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from ishabeauty.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Feb 2025 01:24:58 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script>
        document.documentElement.className = document.documentElement.className + ' yes-js js_active js'
    </script>

    @include('front_end.block.config_seo_header')

    <!-- #region -->

    <style id='wp-emoji-styles-inline-css' type='text/css'>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style id='safe-svg-svg-icon-style-inline-css' type='text/css'>
        .safe-svg-cover {
            text-align: center
        }

        .safe-svg-cover .safe-svg-inside {
            display: inline-block;
            max-width: 100%
        }

        .safe-svg-cover svg {
            height: 100%;
            max-height: 100%;
            max-width: 100%;
            width: 100%
        }
    </style>
    <link rel='stylesheet' id='jquery-selectBox-css'
        href='/wp-content/plugins/yith-woocommerce-wishlist/assets/css/jquery.selectBox7359.css?ver=1.2.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce_prettyPhoto_css-css'
        href='/wp-content/plugins/woocommerce/assets/css/prettyPhoto005e.css?ver=3.1.6' type='text/css'
        media='all' />
    <link rel='stylesheet' id='yith-wcwl-main-css'
        href='/wp-content/plugins/yith-woocommerce-wishlist/assets/css/styleae82.css?ver=4.2.0' type='text/css'
        media='all' />
    <style id='yith-wcwl-main-inline-css' type='text/css'>
        :root {
            --rounded-corners-radius: 16px;
            --feedback-duration: 3s
        }

        :root {
            --rounded-corners-radius: 16px;
            --feedback-duration: 3s
        }
    </style>
    <style id='classic-theme-styles-inline-css' type='text/css'>
        /*! This file is auto-generated */
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>
    <style id='global-styles-inline-css' type='text/css'>
        :root {
            --wp--preset--aspect-ratio--square: 1;
            --wp--preset--aspect-ratio--4-3: 4/3;
            --wp--preset--aspect-ratio--3-4: 3/4;
            --wp--preset--aspect-ratio--3-2: 3/2;
            --wp--preset--aspect-ratio--2-3: 2/3;
            --wp--preset--aspect-ratio--16-9: 16/9;
            --wp--preset--aspect-ratio--9-16: 9/16;
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--color--primary: #ecdec1;
            --wp--preset--color--secondary: #000000;
            --wp--preset--color--tertiary: #b6713e;
            --wp--preset--color--body-bg: #fcf7ee;
            --wp--preset--color--body-text: #202020;
            --wp--preset--color--alternate: #000000;
            --wp--preset--color--transparent: rgba(0, 0, 0, 0);
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--font-family--inter: "Inter", sans-serif;
            --wp--preset--font-family--cardo: Cardo;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flex {
            display: flex;
        }

        .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        .is-layout-flex> :is(*, div) {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        .is-layout-grid> :is(*, div) {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :root :where(.wp-block-pullquote) {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel='stylesheet' id='contact-form-7-css'
        href='/wp-content/plugins/contact-form-7/includes/css/styles1eb7.css?ver=6.0.3' type='text/css'
        media='all' />
    <link rel='stylesheet' id='lilacbeauty-plus-elementor-css'
        href='/wp-content/plugins/lilac-beauty-plus/elementor/assets/css/elementor20b9.css?ver=1.0.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='lilacbeauty-plus-common-css'
        href='/wp-content/plugins/lilac-beauty-plus/assets/css/common20b9.css?ver=1.0.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='lilacbeauty-pro-widget-css'
        href='/wp-content/plugins/lilac-beauty-pro/assets/css/widget8a54.css?ver=1.0.0' type='text/css'
        media='all' />

    <link rel='stylesheet' id='woocommerce-layout-css'
        href='/wp-content/plugins/woocommerce/assets/css/woocommerce-layoutc2dd.css?ver=9.6.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'
        href='/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreenc2dd.css?ver=9.6.2' type='text/css'
        media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'
        href='/wp-content/plugins/woocommerce/assets/css/woocommercec2dd.css?ver=9.6.2' type='text/css'
        media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='jquery-colorbox-css'
        href='/wp-content/plugins/yith-woocommerce-compare/assets/css/colorbox13ac.css?ver=1.4.21' type='text/css'
        media='all' />

    <style id='yith-quick-view-inline-css' type='text/css'>
        #yith-quick-view-modal .yith-quick-view-overlay {
            background: rgba(0, 0, 0, 0.8)
        }

        #yith-quick-view-modal .yith-wcqv-main {
            background: #ffffff;
        }

        #yith-quick-view-close {
            color: rgb(0, 0, 0);
        }

        #yith-quick-view-close:hover {
            color: #ff0000;
        }
    </style>
    <link rel='stylesheet' id='brands-styles-css'
        href='/wp-content/plugins/woocommerce/assets/css/brandsc2dd.css?ver=9.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'
        href='/wp-content/uploads/elementor/css/custom-frontend.min4d29.css?ver=1739556394' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-post-11-css'
        href='/wp-content/uploads/elementor/css/post-111de5.css?ver=1739556579' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-pro-css'
        href='/wp-content/uploads/elementor/css/custom-pro-frontend.min1de5.css?ver=1739556579' type='text/css'
        media='all' />
    <link rel='stylesheet' id='widget-heading-css'
        href='/wp-content/plugins/elementor/assets/css/widget-heading.min3830.css?ver=3.27.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='widget-divider-css'
        href='/wp-content/plugins/elementor/assets/css/widget-divider.min3830.css?ver=3.27.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='widget-text-editor-css'
        href='/wp-content/plugins/elementor/assets/css/widget-text-editor.min3830.css?ver=3.27.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='widget-image-css'
        href='/wp-content/plugins/elementor/assets/css/widget-image.min3830.css?ver=3.27.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='widget-icon-box-css'
        href='/wp-content/uploads/elementor/css/custom-widget-icon-box.min4d29.css?ver=1739556394' type='text/css'
        media='all' />
    <link rel='stylesheet' id='e-animation-fadeInLeft-css'
        href='/wp-content/plugins/elementor/assets/lib/animations/styles/fadeInLeft.min3830.css?ver=3.27.4'
        type='text/css' media='all' />
    <link rel='stylesheet' id='e-animation-fadeIn-css'
        href='/wp-content/plugins/elementor/assets/lib/animations/styles/fadeIn.min3830.css?ver=3.27.4'
        type='text/css' media='all' />
    <link rel='stylesheet' id='e-animation-fadeInRight-css'
        href='/wp-content/plugins/elementor/assets/lib/animations/styles/fadeInRight.min3830.css?ver=3.27.4'
        type='text/css' media='all' />
    <link rel='stylesheet' id='widget-spacer-css'
        href='/wp-content/plugins/elementor/assets/css/widget-spacer.min3830.css?ver=3.27.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-post-2632-css'
        href='/wp-content/uploads/elementor/css/post-26321de5.css?ver=1739556579' type='text/css' media='all' />
    <link rel='stylesheet' id='a971fbc1c37daacff709eb88c7fe0bfb-css'
        href='http://fonts.googleapis.com/css?family=Outfit:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext'
        type='text/css' media='all' />
    <link rel='stylesheet' id='5cd0f13a13e08b32463ada5c2a99c92b-css'
        href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&amp;subset=latin-ext' type='text/css'
        media='all' />
    <link rel='stylesheet' id='141462b284efd146b647f40304e42bf9-css'
        href='http://fonts.googleapis.com/css?family=Mrs+Saint+Delafield:400&amp;subset=latin-ext' type='text/css'
        media='all' />
    <link rel='stylesheet' id='lilac-beauty-css' href='/wp-content/themes/lilac-beauty/stylece14.css?ver=1.0.8'
        type='text/css' media='all' />
    <style id='lilac-beauty-inline-css' type='text/css'>
        :root {
            --wdtPrimaryColor: #ecdec1;
            --wdtPrimaryColorRgb: 236, 222, 193;
            --wdtSecondaryColor: #000000;
            --wdtSecondaryColorRgb: 0, 0, 0;
            --wdtTertiaryColor: #b6713e;
            --wdtTertiaryColorRgb: 182, 113, 62;
            --wdtBodyBGColor: #fcf7ee;
            --wdtBodyBGColorRgb: 252, 247, 238;
            --wdtBodyTxtColor: #202020;
            --wdtBodyTxtColorRgb: 32, 32, 32;
            --wdtHeadAltColor: #000000;
            --wdtHeadAltColorRgb: 0, 0, 0;
            --wdtLinkColor: #000000;
            --wdtLinkColorRgb: 0, 0, 0;
            --wdtLinkHoverColor: #b6713e;
            --wdtLinkHoverColorRgb: 182, 113, 62;
            --wdtBorderColor: #b7b7b7;
            --wdtBorderColorRgb: 183, 183, 183;
            --wdtAccentTxtColor: #ffffff;
            --wdtAccentTxtColorRgb: 255, 255, 255;
            --wdtFontTypo_Base: "Lato", sans-serif;
            --wdtFontWeight_Base: 400;
            --wdtFontSize_Base: 16px;
            --wdtLineHeight_Base: 1.64;
            --wdtFontTypo_Alt: "Outfit", sans-serif;
            --wdtFontWeight_Alt: 700;
            --wdtFontSize_Alt: 60px;
            --wdtLineHeight_Alt: 1.28;
            --wdtFontTypo_H1: "Outfit", sans-serif;
            --wdtFontWeight_H1: 700;
            --wdtFontSize_H1: 60px;
            --wdtLineHeight_H1: 1.28;
            --wdtFontTypo_H2: "Outfit", sans-serif;
            --wdtFontWeight_H2: 700;
            --wdtFontSize_H2: 50px;
            --wdtLineHeight_H2: 1.28;
            --wdtFontTypo_H3: "Outfit", sans-serif;
            --wdtFontWeight_H3: 500;
            --wdtFontSize_H3: 44px;
            --wdtLineHeight_H3: 1.28;
            --wdtFontTypo_H4: "Outfit", sans-serif;
            --wdtFontWeight_H4: 500;
            --wdtFontSize_H4: 30px;
            --wdtLineHeight_H4: 1.28;
            --wdtFontTypo_H5: "Outfit", sans-serif;
            --wdtFontWeight_H5: 500;
            --wdtFontSize_H5: 26px;
            --wdtLineHeight_H5: 1.28;
            --wdtFontTypo_H6: "Outfit", sans-serif;
            --wdtFontWeight_H6: 500;
            --wdtFontSize_H6: 20px;
            --wdtLineHeight_H6: 1.28;
            --wdtFontTypo_Ext: "Mrs Saint Delafield", cursive;
            --wdtFontWeight_Ext: 600;
            --wdtFontSize_Ext: 12px;
            --wdtLineHeight_Ext: 1.1;
        }
    </style>
    <link rel='stylesheet' id='lilacbeauty-icons-css'
        href='/wp-content/themes/lilac-beauty/assets/css/iconsce14.css?ver=1.0.8' type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-base-css'
        href='/wp-content/themes/lilac-beauty/assets/css/basece14.css?ver=1.0.8' type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-grid-css'
        href='/wp-content/themes/lilac-beauty/assets/css/gridce14.css?ver=1.0.8' type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-layout-css'
        href='/wp-content/themes/lilac-beauty/assets/css/layoutce14.css?ver=1.0.8' type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-widget-css'
        href='/wp-content/themes/lilac-beauty/assets/css/widgetce14.css?ver=1.0.8' type='text/css' media='all' />
    <link rel='stylesheet' id='site-breadcrumb-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/breadcrumb/assets/css/breadcrumbd1c0.css?ver=6.7.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='site-header-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/header/assets/css/headerd1c0.css?ver=6.7.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='site-loader-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/site-loader/layouts/custom-loader/assets/css/custom-loader20b9.css?ver=1.0.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='site-to-top-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/site-to-top/assets/css/totop20b9.css?ver=1.0.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='site-sidebar-css'
        href='/wp-content/plugins/lilac-beauty-pro/modules/sidebar/assets/css/sidebar8a54.css?ver=1.0.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='wdt-blog-css'
        href='/wp-content/themes/lilac-beauty/modules/blog/assets/css/blogce14.css?ver=1.0.8' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wdt-blog-archive-simple-css'
        href='/wp-content/themes/lilac-beauty/modules/blog/templates/simple/assets/css/blog-archive-simplece14.css?ver=1.0.8'
        type='text/css' media='all' />
    <link rel='stylesheet' id='jquery-bxslider-css'
        href='/wp-content/themes/lilac-beauty/modules/blog/assets/css/jquery.bxsliderce14.css?ver=1.0.8'
        type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-breadcrumb-css'
        href='/wp-content/themes/lilac-beauty/modules/breadcrumb/assets/css/breadcrumbce14.css?ver=1.0.8'
        type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-comments-css'
        href='/wp-content/themes/lilac-beauty/modules/comments/assets/css/commentsce14.css?ver=1.0.8' type='text/css'
        media='all' />
    <link rel='stylesheet' id='lilacbeauty-footer-css'
        href='/wp-content/themes/lilac-beauty/modules/footer/assets/css/footerce14.css?ver=1.0.8' type='text/css'
        media='all' />
    <link rel='stylesheet' id='lilacbeauty-header-css'
        href='/wp-content/themes/lilac-beauty/modules/header/assets/css/headerce14.css?ver=1.0.8' type='text/css'
        media='all' />
    <link rel='stylesheet' id='lilacbeauty-pagination-css'
        href='/wp-content/themes/lilac-beauty/modules/pagination/assets/css/paginationce14.css?ver=1.0.8'
        type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-magnific-popup-css'
        href='/wp-content/themes/lilac-beauty/modules/post/assets/css/magnific-popupce14.css?ver=1.0.8'
        type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-secondary-css'
        href='/wp-content/themes/lilac-beauty/modules/sidebar/assets/css/sidebarce14.css?ver=1.0.8' type='text/css'
        media='all' />
    <link rel='stylesheet' id='sp-style-css'
        href='/wp-content/plugins/lilac-beauty-pro/modules/woocommerce/others/suggested-products/assets/css/styled1c0.css?ver=6.7.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-woo-css'
        href='/wp-content/themes/lilac-beauty/modules/woocommerce/assets/css/defaultce14.css?ver=1.0.8'
        type='text/css' media='all' />

    <link rel='stylesheet' id='lilacbeauty-plus-blog-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/blog/assets/css/blog20b9.css?ver=1.0.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='dtplugin-nav-menu-animations-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/menu/assets/css/nav-menu-animations20b9.css?ver=1.0.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='dtplugin-nav-menu-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/menu/assets/css/nav-menu20b9.css?ver=1.0.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='lilacbeauty-pro-blog-css'
        href='/wp-content/plugins/lilac-beauty-pro/modules/blog/assets/css/blog8a54.css?ver=1.0.0' type='text/css'
        media='all' />

    <link rel='stylesheet' id='lilacbeauty-theme-css'
        href='/wp-content/themes/lilac-beauty/assets/css/themece14.css?ver=1.0.8' type='text/css' media='all' />
    <style id='lilacbeauty-admin-inline-css' type='text/css'>
        @font-face {
            font-family: "Caramello";
            src: url(/wp-content/themes/lilac-beauty/assets/font/caramello.woff) format("woff");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
    </style>
    <link rel='stylesheet' id='bdt-uikit-css'
        href='/wp-content/plugins/bdthemes-prime-slider-lite/assets/css/bdt-uikit4ecf.css?ver=3.21.7' type='text/css'
        media='all' />
    <link rel='stylesheet' id='prime-slider-site-css'
        href='/wp-content/plugins/bdthemes-prime-slider-lite/assets/css/prime-slider-site8864.css?ver=3.17.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css'
        href='https://fonts.googleapis.com/css?family=Outfit%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CLato%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CPlayfair+Display%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=auto&amp;ver=6.7.2'
        type='text/css' media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script type="text/javascript" src="wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1" id="jquery-core-js"></script>
    <script type="text/javascript" src="wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1" id="jquery-migrate-js">
    </script>
    <script type="text/javascript" src="/wp-content/plugins/revslider/public/js/libs/tptoolse9af.js?ver=6.7.15" id="_tpt-js"
        async="async" data-wp-strategy="async"></script>

    <script type="text/javascript"
        src="/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min9e57.js?ver=2.7.0-wc.9.6.2"
        id="jquery-blockui-js" defer="defer" data-wp-strategy="defer"></script>


    <script type="text/javascript"
        src="/wp-content/plugins/bdthemes-prime-slider-lite/assets/js/bdt-uikit.min4ecf.js?ver=3.21.7" id="bdt-uikit-js">
    </script>
    <style class='wp-fonts-local' type='text/css'>
        @font-face {
            font-family: Inter;
            font-style: normal;
            font-weight: 300 900;
            font-display: fallback;
            src: url('/wp-content/plugins/woocommerce/assets/fonts/Inter-VariableFont_slnt%2cwght.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: Cardo;
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: url('/wp-content/plugins/woocommerce/assets/fonts/cardo_normal_400.woff2') format('woff2');
        }
    </style>


    <style type="text/css" id="wp-custom-css">
        .product-thumb-overlay {
            width: 300px;
            /* Set your desired width */
            height: 300px;
            /* Set your desired height */
            display: flex;
            justify-content: center;
            /* Center the content horizontally */
            align-items: center;
            /* Center the content vertically */
            overflow: hidden;
            /* Hide any overflow content */
            box-sizing: border-box;
            /* Include padding and border in the size */
        }
    </style>
</head>

<body
    class="home page-template page-template-elementor_header_footer page page-id-2632 wp-custom-logo theme-lilac-beauty has-go-to-top lilacbeauty-plus-1.0.2 lilacbeauty-pro-1.0.0 woocommerce-no-js elementor-default elementor-template-full-width elementor-kit-11 elementor-page elementor-page-2632">

    <!-- **Wrapper** -->
    <div class="wrapper">

        <!-- ** Inner Wrapper ** -->
        <div class="inner-wrapper">


            <!-- ** Header Wrapper ** -->
            @include('front_end.layout.header')
            <!-- ** Header Wrapper - End ** -->

            <!-- **Main** -->
            <div id="main">
                <!-- ** Container ** -->
                @yield('content')
                <!-- ** Container End ** -->
            </div><!-- **Main - End ** -->


            <!-- **Footer** -->
            @include('front_end.layout.footer')
            <!-- **Footer - End** -->
        </div><!-- **Inner Wrapper - End** -->

    </div><!-- **Wrapper - End** -->



    <link rel='stylesheet' id='wc-ppcp-blocks-styles-css'
        href='/wp-content/plugins/pymntpl-paypal-woocommerce/packages/blocks/build/stylesfe23.css?ver=1.0.55'
        type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-css'
        href='/wp-content/plugins/woocommerce/assets/client/blocks/wc-blocks15b4.css?ver=wc-9.6.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wdt-elementor-icons-css'
        href='/wp-content/uploads/elementor/css/custom-widget-icon-list.mind1c0.css?ver=6.7.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-post-1594-css'
        href='/wp-content/uploads/elementor/css/post-15941de5.css?ver=1739556579' type='text/css' media='all' />
    <link rel='stylesheet' id='wdt-logo-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/menu/elementor/widgets/assets/css/logo20b9.css?ver=1.0.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='wdt-header-icons-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/menu/elementor/widgets/assets/css/header-icons20b9.css?ver=1.0.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='wdt-header-carticons-css'
        href='/wp-content/plugins/lilac-beauty-plus/modules/menu/elementor/widgets/assets/css/header-carticon20b9.css?ver=1.0.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-16-css'
        href='/wp-content/uploads/elementor/css/post-16b5a8.css?ver=1739559964' type='text/css' media='all' />
    <link rel='stylesheet' id='widget-social-icons-css'
        href='/wp-content/plugins/elementor/assets/css/widget-social-icons.min3830.css?ver=3.27.4' type='text/css'
        media='all' />
    <link rel='stylesheet' id='e-apple-webkit-css'
        href='/wp-content/uploads/elementor/css/custom-apple-webkit.min4d29.css?ver=1739556394' type='text/css'
        media='all' />
    <link rel='stylesheet' id='e-animation-grow-css'
        href='/wp-content/plugins/elementor/assets/lib/animations/styles/e-animation-grow.min3830.css?ver=3.27.4'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-1265-css'
        href='/wp-content/uploads/elementor/css/post-12651579.css?ver=1739559579' type='text/css' media='all' />
    <link rel='stylesheet' id='widget-icon-list-css'
        href='/wp-content/uploads/elementor/css/custom-widget-icon-list.min4d29.css?ver=1739556394' type='text/css'
        media='all' />
    <link rel='stylesheet' id='photoswipe-css'
        href='/wp-content/plugins/woocommerce/assets/css/photoswipe/photoswipe.minc2dd.css?ver=9.6.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='photoswipe-default-skin-css'
        href='/wp-content/plugins/woocommerce/assets/css/photoswipe/default-skin/default-skin.minc2dd.css?ver=9.6.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-2-css'
        href='https://fonts.googleapis.com/css?family=Lexend+Giga%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=auto&amp;ver=6.7.2'
        type='text/css' media='all' />
    <script type="text/javascript"
        src="/wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.selectBox.min7359.js?ver=1.2.0"
        id="jquery-selectBox-js"></script>
    <script type="text/javascript"
        src="/wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min005e.js?ver=3.1.6"
        id="prettyPhoto-js" data-wp-strategy="defer"></script>
    <script type="text/javascript" id="jquery-yith-wcwl-js-extra">
        /* <![CDATA[ */
        var yith_wcwl_l10n = {

        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="/wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.yith-wcwl.minae82.js?ver=4.2.0"
        id="jquery-yith-wcwl-js"></script>
    <script type="text/javascript" src="wp-includes/js/dist/hooks.min4fdd.js?ver=4d63a3d491d11ffd8ac6" id="wp-hooks-js">
    </script>
    <script type="text/javascript" src="wp-includes/js/dist/i18n.minc33c.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js">
    </script>


    <script type="text/javascript"
        src="/wp-content/plugins/yith-woocommerce-compare/assets/js/woocompare.min3d99.js?ver=2.47.0"
        id="yith-woocompare-main-js"></script>
    <script type="text/javascript"
        src="/wp-content/plugins/yith-woocommerce-compare/assets/js/jquery.colorbox-min13ac.js?ver=1.4.21"
        id="jquery-colorbox-js"></script>



    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script type="text/javascript"
        src="/wp-content/plugins/lilac-beauty-pro/modules/woocommerce/others/suggested-products/assets/js/jquery.cookie.mind1c0.js?ver=6.7.2"
        id="sp-cookies-js"></script>
    <script type="text/javascript"
        src="/wp-content/plugins/lilac-beauty-pro/modules/woocommerce/single/modules/custom-template/elementor/assets/js/jquery.nicescrolld1c0.js?ver=6.7.2"
        id="jquery-nicescroll-js"></script>

    <script type="text/javascript" src="wp-includes/js/underscore.min3ab8.js?ver=1.13.7" id="underscore-js"></script>
    <script type="text/javascript" id="wp-util-js-extra">
        /* <![CDATA[ */
        var _wpUtilSettings = {
            "ajax": {
                "url": "\/wp-admin\/admin-ajax.php"
            }
        };
        /* ]]> */
    </script>
    <script type="text/javascript" src="wp-includes/js/wp-util.mind1c0.js?ver=6.7.2" id="wp-util-js"></script>


    <script type="text/javascript"
        src="/wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe.min258b.js?ver=4.1.1-wc.9.6.2"
        id="photoswipe-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript"
        src="/wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe-ui-default.min258b.js?ver=4.1.1-wc.9.6.2"
        id="photoswipe-ui-default-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript" id="wc-single-product-js-extra">
        /* <![CDATA[ */
        var wc_single_product_params = {
            "i18n_required_rating_text": "Please select a rating",
            "i18n_product_gallery_trigger_text": "View full-screen image gallery",
            "review_rating_required": "yes",
            "flexslider": {
                "rtl": false,
                "animation": "slide",
                "smoothHeight": true,
                "directionNav": false,
                "controlNav": "thumbnails",
                "slideshow": false,
                "animationSpeed": 500,
                "animationLoop": false,
                "allowOneSlide": false
            },
            "zoom_enabled": "",
            "zoom_options": [],
            "photoswipe_enabled": "1",
            "photoswipe_options": {
                "shareEl": false,
                "closeOnScroll": false,
                "history": false,
                "hideAnimationDuration": 0,
                "showAnimationDuration": 0
            },
            "flexslider_enabled": "1"
        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="/wp-content/plugins/woocommerce/assets/js/frontend/single-product.minc2dd.js?ver=9.6.2"
        id="wc-single-product-js" defer="defer" data-wp-strategy="defer"></script>

    <script type="text/javascript" src="/wp-content/plugins/elementor/assets/js/webpack.runtime.min3830.js?ver=3.27.4"
        id="elementor-webpack-runtime-js"></script>
    <script type="text/javascript" src="/wp-content/plugins/elementor/assets/js/frontend-modules.min3830.js?ver=3.27.4"
        id="elementor-frontend-modules-js"></script>

    <script type="text/javascript" src="/wp-content/plugins/elementor-pro/assets/js/frontend.min44b4.js?ver=3.24.3"
        id="elementor-pro-frontend-js"></script>
    <script type="text/javascript" src="wp-includes/js/jquery/ui/core.minb37e.js?ver=1.13.3" id="jquery-ui-core-js">
    </script>
    <script type="text/javascript" id="elementor-frontend-js-before">
        /* <![CDATA[ */
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false,
                "wpPreview": false,
                "isScriptDebug": false
            },
            "i18n": {
                "shareOnFacebook": "Share on Facebook",
                "shareOnTwitter": "Share on Twitter",
                "pinIt": "Pin it",
                "download": "Download",
                "downloadImage": "Download image",
                "fullscreen": "Fullscreen",
                "zoom": "Zoom",
                "share": "Share",
                "playVideo": "Play Video",
                "previous": "Previous",
                "next": "Next",
                "close": "Close",
                "a11yCarouselPrevSlideMessage": "Previous slide",
                "a11yCarouselNextSlideMessage": "Next slide",
                "a11yCarouselFirstSlideMessage": "This is the first slide",
                "a11yCarouselLastSlideMessage": "This is the last slide",
                "a11yCarouselPaginationBulletMessage": "Go to slide"
            },
            "is_rtl": false,
            "breakpoints": {
                "xs": 0,
                "sm": 480,
                "md": 480,
                "lg": 1025,
                "xl": 1440,
                "xxl": 1600
            },
            "responsive": {
                "breakpoints": {
                    "mobile": {
                        "label": "Mobile Portrait",
                        "value": 479,
                        "default_value": 767,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "mobile_extra": {
                        "label": "Mobile Landscape",
                        "value": 767,
                        "default_value": 880,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "tablet": {
                        "label": "Tablet Portrait",
                        "value": 1024,
                        "default_value": 1024,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "tablet_extra": {
                        "label": "Tablet Landscape",
                        "value": 1280,
                        "default_value": 1200,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "laptop": {
                        "label": "Laptop",
                        "value": 1540,
                        "default_value": 1366,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "widescreen": {
                        "label": "Widescreen",
                        "value": 2400,
                        "default_value": 2400,
                        "direction": "min",
                        "is_enabled": false
                    }
                },
                "hasCustomBreakpoints": true
            },
            "version": "3.27.4",
            "is_static": false,
            "experimentalFeatures": {
                "e_font_icon_svg": true,
                "additional_custom_breakpoints": true,
                "container": true,
                "e_swiper_latest": true,
                "e_onboarding": true,
                "theme_builder_v2": true,
                "home_screen": true,
                "landing-pages": true,
                "nested-elements": true,
                "editor_v2": true,
                "e_element_cache": true,
                "link-in-bio": true,
                "floating-buttons": true,
                "display-conditions": true,
                "form-submissions": true,
                "mega-menu": true
            },
            "urls": {
                "assets": "/wp-content\/plugins\/elementor\/assets\/",
            },
            "nonces": {
                "floatingButtonsClickTracking": "78ff9cb260"
            },
            "swiperClass": "swiper",
            "settings": {
                "page": [],
                "editorPreferences": []
            },
            "kit": {
                "viewport_mobile": 479,
                "viewport_tablet": 1024,
                "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
                "global_image_lightbox": "yes",
                "lightbox_enable_counter": "yes",
                "lightbox_enable_fullscreen": "yes",
                "lightbox_enable_zoom": "yes",
                "lightbox_enable_share": "yes",
                "lightbox_title_src": "title",
                "lightbox_description_src": "description",
                "woocommerce_notices_elements": []
            },
            "post": {
                "id": 2632,
                "title": "Isha%20Beauty",
                "excerpt": "",
                "featuredImage": false
            }
        };
        /* ]]> */
    </script>
    <script type="text/javascript" src="/wp-content/plugins/elementor/assets/js/frontend.min3830.js?ver=3.27.4"
        id="elementor-frontend-js"></script>
    <script type="text/javascript" src="/wp-content/plugins/elementor-pro/assets/js/elements-handlers.min44b4.js?ver=3.24.3"
        id="pro-elements-handlers-js"></script>
    <a id="back-to-top" href="#">
        <span id="back-to-top-hover"></span>
        <span class="back-to-top-icon"><i class="wdticon-angle-up"></i></span>
    </a>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style>
        span.ti-stars {
            display: flex;
            margin-bottom: 5px;
            margin-top: 5px;
        }

        .ti-review-header {
            display: flex;
            align-content: center;
            justify-content: flex-start;
        }
        img.ti-star{
            width: 12px;
            margin-right: 2px;
        }
        .ti-profile-details {
            padding-left: 10px;
        }

        .ti-widget.ti-goog .ti-widget-container .ti-name {
            font-weight: bold;
            font-size: 14px;
            overflow: hidden;
            padding-right: 25px;
            white-space: nowrap;
            text-overflow: ellipsis;
            color: #000000;
            margin-bottom: 2px;
        }

        .ti-widget.ti-goog .ti-review-item>.ti-inner {
            border-style: solid !important;
            border-color: #f4f4f4 !important;
            background: #f4f4f4 !important;
            border-radius: 4px !important;
            padding: 20px !important;
            margin: 10px !important;
            display: block;
            position: relative;
        }
    </style>
    <script>
        jQuery(document).ready(function() {
            // Khởi tạo Slick Slider
            jQuery('.sliders').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000, // Chuyển ảnh sau mỗi 2 giây
                arrows: true,
                infinite: true,
                responsive: [{
                        breakpoint: 800, // Khi màn hình nhỏ hơn hoặc bằng 1000px
                        settings: {
                            slidesToShow: 4, // Hiển thị 5 ảnh
                        },
                    },
                    {
                        breakpoint: 600, // Khi màn hình nhỏ hơn hoặc bằng 600px
                        settings: {
                            slidesToShow: 2, // Hiển thị 4 ảnh
                        },
                    },
                    {
                        breakpoint: 400, // Khi màn hình nhỏ hơn hoặc bằng 400px
                        settings: {
                            slidesToShow: 1, // Hiển thị 3 ảnh
                        },
                    },
                ],
            });
            jQuery('.sliders-brands').slick({
                slidesToShow: 6,
                slidesToScroll: 2,
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000, // Chuyển ảnh sau mỗi 2 giây
                arrows: true,
                infinite: true,
                responsive: [{
                        breakpoint: 800, // Khi màn hình nhỏ hơn hoặc bằng 1000px
                        settings: {
                            slidesToShow: 4, // Hiển thị 5 ảnh
                        },
                    },
                    {
                        breakpoint: 600, // Khi màn hình nhỏ hơn hoặc bằng 600px
                        settings: {
                            slidesToShow: 2, // Hiển thị 4 ảnh
                        },
                    },
                    {
                        breakpoint: 400, // Khi màn hình nhỏ hơn hoặc bằng 400px
                        settings: {
                            slidesToShow: 1, // Hiển thị 3 ảnh
                        },
                    },
                ],
            });
        });
    </script>
</body>

</html>

<!-- Page cached by LiteSpeed Cache 6.5.4 on 2025-02-14 19:50:31 -->
