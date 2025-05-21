@php
    $ver = 128;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $config_home = getValueSetting('config_home');

    $menus_header = getMenuParent(0, 0);
    $menus_footer = getMenuParent(0, 1);
@endphp


<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.bookwell.com.au/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 15:23:10 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta name="viewport" content="width=device-width" />
    <meta charSet="utf-8" />
    <meta name="google-site-verification" content="XIP1nLPnmhXza-MULIlMIwPmXZ_m3YxV336RlJt51Ng" />
    <meta name="theme-color" content="white" />
    @include('front_end.block.config_seo_header')
    <style
        data-emotion-css="0 1w9yb6b j64p7l 1nl879o 1l7k9wm mwwny2 16n9dof kau6op dyoadf 11prviu 6zvpm 1br3txa 1ktnz7v uiw85g 1h3k0x3 9g0g4r mnebl 3o0h5k jazq28 mkkf9p 126zv25 jo2aaq k008qs 1hcy63r 1ta5v59 9a3ihm g4opy9 3usq65 19tzvnq 1wlq5nj 1sg0k8w 1f3l2hr slgx7q 8q80ou 3e0w3e qbrse1 9gbji6 1khs5xc f9pz52 h3oydn ie1780 lkz9sl animation-vo2oum 1xy5o1q squ00q zkadht e2vg5q bjn8wh 173p03h p2z5vl kjafn5 ve357d fn2um 105fra2 6iwp6q 19v4aip uodor8 1iiv58m 1g9vjr2 fim7d8 1rruakd ouysy5 sis14u mm5std 9vornv q424i7 1s7dpk1 l951p5 ruw0ik q6wv6b 1i7dxix w8wg2g tvdhho 1tzeee1 1y5e797 1tz8ogm 1lnpsqz 1wcjc1k d65tcr 1a7f7p 1ryz6ze 1yz0o3j n7e2yo qh9ukh 1mu8hzh 1g1q0hs 1o52x4a bk7e3w 1600jh 42crao 1q886t9 1l4w6pd x3j6co 1sddqb5 15frxp ccv1m5 smptyk 142foij 1hqpjkr 1cjvpa3 1hgunyx 12ci84q 1jsxf2a shx0pi u2ep48 j7qwjs 14c8jl2">
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
        }

        main {
            display: block;
        }

        h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }

        hr {
            box-sizing: content-box;
            height: 0;
            overflow: visible;
        }

        pre {
            font-family: monospace, monospace;
            font-size: 1em;
        }

        a {
            background-color: transparent;
        }

        abbr[title] {
            border-bottom: none;
            -webkit-text-decoration: underline;
            text-decoration: underline;
            -webkit-text-decoration: underline dotted;

            text-decoration:underline dotted;}b,strong{font-weight:bolder;}code,kbd,samp{font-family:monospace,monospace;font-size:1em;}small{font-size:80%;}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline;}sub{bottom:-0.25em;}sup{top:-0.5em;}img{border-style:none;}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;line-height:1.15;margin:0;}button,input{overflow:visible;}button,select{text-transform:none;}button,[type='button'],
            [type='reset'],
            [type='submit'] {
                -webkit-appearance: button;
            }

            button::-moz-focus-inner,
            [type='button']::-moz-focus-inner,
            [type='reset']::-moz-focus-inner,
            [type='submit']::-moz-focus-inner {
                border-style: none;
                padding: 0;
            }

            button:-moz-focusring,
            [type='button']:-moz-focusring,
            [type='reset']:-moz-focusring,
            [type='submit']:-moz-focusring {
                outline: 1px dotted ButtonText;
            }

            fieldset {

                padding:0.35em 0.75em 0.625em;}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal;}progress{vertical-align:baseline;}textarea{overflow:auto;}[type='checkbox'],
                [type='radio'] {
                    box-sizing: border-box;
                    padding: 0;
                }

                [type='number']::-webkit-inner-spin-button,
                [type='number']::-webkit-outer-spin-button {
                    height: auto;
                }

                [type='search'] {
                    -webkit-appearance: textfield;
                    outline-offset: -2px;
                }

                [type='search']::-webkit-search-decoration {
                    -webkit-appearance: none;
                }

                ::-webkit-file-upload-button {
                    -webkit-appearance: button;
                    font: inherit;
                }

                details {
                    display: block;
                }

                summary {
                    display: -webkit-box;
                    display: -webkit-list-item;
                    display: -ms-list-itembox;
                    display: list-item;
                }

                template {
                    display: none;
                }

                [hidden] {
                    display: none;
                }

                @font-face {
                    font-family: 'Kollektif';
                    font-weight: 400;
                    font-style: normal;
                    font-display: swap;
                    src: url('static/fonts/Kollektif/Kollektif.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Kollektif';
                    font-weight: 400;
                    font-style: italic;
                    font-display: swap;
                    src: url('static/fonts/Kollektif/Kollektif-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Kollektif';
                    font-weight: 700;
                    font-style: normal;
                    font-display: swap;
                    src: url('static/fonts/Kollektif/Kollektif-Bold.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Kollektif';
                    font-weight: 700;
                    font-style: italic;
                    font-display: swap;
                    src: url('static/fonts/Kollektif/Kollektif-Bold-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 100;
                    font-style: normal;
                    font-display: swap;
                    src: url('static/fonts/Lato/Lato-Hairline.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 100;
                    font-style: italic;
                    font-display: swap;
                    src: url('static/fonts/Lato/Lato-Hairline-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 300;
                    font-style: normal;
                    font-display: swap;
                    src: url('static/fonts/Lato/Lato-Light.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 300;
                    font-style: italic;
                    font-display: swap;
                    src: url('static/fonts/Lato/Lato-Light-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 400;
                    font-style: normal;
                    font-display: swap;
                    src: url('static/fonts/Lato/Lato-Regular.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 400;
                    font-style: italic;
                    font-display: swap;
                    src: url('static/fonts/Lato/Lato-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 700;
                    font-style: normal;
                    font-display: swap;
                    src: url('static/fonts/Lato/Lato-Bold.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 700;
                    font-style: italic;
                    font-display: swap;
                    src: url('static/fonts/Lato/Lato-Bold-Italic.woff2') format('woff2');
                }

                :root {
                    --bookwell-error-hue: 4;
                    --bookwell-error-saturation: 90%;
                    --bookwell-error-lightness: 58%;
                    --bookwell-line-height: 1.3;
                }

                html {
                    box-sizing: border-box;
                    height: 100%;
                    font-family: Lato, sans-serif;
                    color: hsl(0, 0%, 13%);
                    background-color: white;
                    overflow-wrap: break-word;
                    touch-action: manipulation;
                    -webkit-tap-highlight-color: transparent;
                }

                body {
                    -webkit-overflow-scrolling: touch;
                    min-height: 100%;
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
                }

                a {
                    color: inherit;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                }

                *,
                *:before,
                *:after {
                    box-sizing: inherit;
                }

                img {
                    max-width: 100%;
                }

                address {
                    font-style: normal;
                }

                .css-j64p7l {
                    min-height: 100vh;
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    max-width: 100%;
                    position: relative;
                }

                .css-1nl879o {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    border-bottom: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                }

                .css-1l7k9wm {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    -webkit-box-pack: justify;
                    -webkit-justify-content: space-between;
                    justify-content: space-between;
                    padding-top: 16px;
                    padding-bottom: 16px;
                }

                .css-mwwny2 {
                    margin: 0;
                    border-radius: 4px;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: hsl(190, 100%, 22%);
                    text-align: left;
                    border: none;
                    background: none;
                    display: inline;
                    padding: 0;
                    color: hsl(190, 100%, 22%);
                }

                .css-mwwny2:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-mwwny2:hover {
                    cursor: pointer;
                }

                .css-mwwny2:disabled {
                    cursor: not-allowed;
                }

                .css-16n9dof {
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 30px;
                    font-weight: 700;
                    margin: 0;
                    text-align: left;
                    font-family: Kollektif, Helvetica, Arial, sans-serif;
                    color: hsl(8, 86%, 62%);
                    font-weight: normal;
                    line-height: 1;
                }

                @media screen and (min-width: 768px) {
                    .css-16n9dof {
                        font-size: 40px;
                    }
                }

                .css-kau6op {
                    font-style: normal;
                    color: hsl(12, 84%, 66%);
                }

                .css-dyoadf {
                    display: grid;
                    grid-auto-flow: column;
                    grid-gap: 16px;
                    grid-auto-columns: max-content;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                }

                .css-11prviu {
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    display: -webkit-inline-box;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    box-sizing: border-box;
                    width: 40px;
                    border-width: 1px;
                    border-style: solid;
                    font-family: Lato, sans-serif;
                    font-weight: 400;
                    border-color: hsl(0, 0%, 90%);
                    border-radius: 4px;
                    background: white;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: hsl(0, 0%, 100%);
                    border-color: hsl(190, 100%, 22%);
                    background-color: hsl(190, 100%, 22%);
                    font-size: 16px;
                    height: 40px;
                    padding-left: 16px;
                    padding-right: 16px;
                }

                .css-11prviu:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-11prviu:hover {
                    cursor: pointer;
                }

                .css-11prviu:disabled {
                    cursor: not-allowed;
                }

                .css-11prviu:disabled,
                .css-11prviu.disabled {
                    background-color: hsl(0, 0%, 46%);
                    border-color: hsl(0, 0%, 46%);
                    cursor: not-allowed;
                }

                .css-6zvpm {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-flex-direction: row;
                    -ms-flex-direction: row;
                    flex-direction: row;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    margin-left: -4px;
                    margin-right: -4px;
                }

                .css-1br3txa {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    margin-left: 4px;
                    margin-right: 4px;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                }

                .css-1ktnz7v {
                    width: 22px;
                    height: 22px;
                }

                .css-uiw85g {
                    position: fixed;
                    left: 0;
                    right: 0;
                    top: 0;
                    bottom: 0;
                    z-index: 200;
                    overflow: hidden;
                    visibility: hidden;
                    background-color: hsla(0, 0%, 0%, 0.35);
                    opacity: 0;
                    -webkit-backdrop-filter: blur(1px);
                    backdrop-filter: blur(1px);
                    -webkit-transition: visibility 250ms 0ms, opacity 250ms;
                    transition: visibility 250ms 0ms, opacity 250ms;
                }

                .css-1h3k0x3 {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    width: 24em;
                    max-width: 90vw;
                    background-color: white;
                    -webkit-transform: translate3d(100%, 0, 0);
                    -moz-transform: translate3d(100%, 0, 0);
                    -ms-transform: translate3d(100%, 0, 0);
                    transform: translate3d(100%, 0, 0);
                    -webkit-transition: -webkit-transform 250ms;
                    transition: transform 250ms;
                }

                .css-9g0g4r {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    border-bottom: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                    padding: 16px;
                }

                .css-mnebl {
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    display: -webkit-inline-box;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    box-sizing: border-box;
                    border-width: 1px;
                    border-style: solid;
                    font-family: Lato, sans-serif;
                    font-weight: 400;
                    border-color: hsl(0, 0%, 90%);
                    border-radius: 4px;
                    background: white;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: hsl(190, 100%, 22%);
                    border-color: transparent;
                    background-color: transparent;
                    font-size: 16px;
                    height: 40px;
                    padding-left: 16px;
                    padding-right: 16px;
                }

                .css-mnebl:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-mnebl:hover {
                    cursor: pointer;
                }

                .css-mnebl:disabled {
                    cursor: not-allowed;
                }

                .css-mnebl:disabled,
                .css-mnebl.disabled {
                    border-color: transparent;
                    color: hsl(0, 0%, 46%);
                    cursor: not-allowed;
                }

                .css-3o0h5k {
                    width: 16px;
                    height: 16px;
                }

                .css-jazq28 {
                    overscroll-behavior-y: contain;
                    -ms-overflow-style: -ms-autohiding-scrollbar;
                    -webkit-overflow-scrolling: touch;
                    overflow-x: hidden;
                    overflow-y: auto;
                }

                .css-mkkf9p {
                    -webkit-flex: 1 1 auto;
                    -ms-flex: 1 1 auto;
                    flex: 1 1 auto;
                }

                .css-126zv25 {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    background-color: hsl(42, 56%, 96%);
                    padding-top: 32px;
                    padding-bottom: 32px;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    border-top: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                }

                @media screen and (min-width: 480px) {
                    .css-126zv25 {
                        padding-top: 64px;
                        padding-bottom: 64px;
                    }
                }

                .css-jo2aaq {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 32px;
                }

                .css-k008qs {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                }

                .css-1hcy63r {
                    margin: 0;
                    border-radius: 4px;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: hsl(190, 100%, 22%);
                    text-align: left;
                    border: none;
                    background: none;
                    display: inline;
                    padding: 0;
                    color: hsl(190, 100%, 22%);
                    display: block;
                }

                .css-1hcy63r:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-1hcy63r:hover {
                    cursor: pointer;
                }

                .css-1hcy63r:disabled {
                    cursor: not-allowed;
                }

                .css-1ta5v59 {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 30px;
                    font-weight: 700;
                    text-align: left;
                    font-family: Kollektif, Helvetica, Arial, sans-serif;
                    color: hsl(8, 86%, 62%);
                    font-weight: normal;
                    line-height: 1;
                }

                .css-9a3ihm {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                    grid-auto-columns: max-content;
                }

                @media screen and (min-width: 480px) {
                    .css-9a3ihm {
                        grid-auto-flow: row;
                        grid-gap: 16px;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-9a3ihm {
                        grid-auto-flow: column;
                        grid-gap: 64px;
                    }
                }

                .css-g4opy9 {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 16px;
                    font-weight: 700;
                    text-align: left;
                }

                .css-3usq65 {
                    list-style: none;
                    padding: 0;
                    font-family: Lato, sans-serif;
                }

                .css-19tzvnq {
                    margin: 0.5em 0;
                    font-size: 14px;
                }

                .css-1wlq5nj {
                    margin: 0;
                    -webkit-text-decoration: underline;
                    text-decoration: underline;
                    color: hsl(190, 100%, 22%);
                    text-align: left;
                    border: none;
                    background: none;
                    display: inline;
                    padding: 0;
                    color: hsl(190, 100%, 22%);
                    color: hsl(0, 0%, 13%);
                    -webkit-text-decoration: none;
                    text-decoration: none;
                }

                .css-1wlq5nj:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-1wlq5nj:hover {
                    cursor: pointer;
                }

                .css-1wlq5nj:disabled {
                    cursor: not-allowed;
                }

                .css-1sg0k8w {
                    position: fixed;
                    left: 0;
                    top: 0;
                    right: 100%;
                    z-index: 10003;
                    height: 2px;
                    background-color: hsl(190, 100%, 22%);
                    box-shadow: 0 1px 8px hsla(0, 0%, 0%, 0.12);
                    opacity: 0;
                    transition-property: right, opacity;
                    transition-duration: 0s;
                    pointer-events: none;
                }

                .css-1sg0k8w.loading {
                    right: 5%;
                    opacity: 0.95;
                    transition-timing-function: cubic-bezier(0.075, 0.82, 0.165, 1);
                    transition-duration: 8s, 0s;
                }

                .css-1sg0k8w.done {
                    right: 0;
                    transition-duration: 250ms;
                    transition-delay: 0s, 250ms;
                }

                .css-1f3l2hr {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 4px;
                }

                .css-slgx7q {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    border-bottom: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                    padding-top: 8px;
                    padding-bottom: 8px;
                    padding-left: 16px;
                    padding-right: 16px;
                }

                .css-8q80ou {
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    display: -webkit-inline-box;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    box-sizing: border-box;
                    width: auto;
                    border-width: 1px;
                    border-style: solid;
                    font-family: Lato, sans-serif;
                    font-weight: 400;
                    border-color: hsl(0, 0%, 90%);
                    border-radius: 4px;
                    background: white;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: hsl(190, 100%, 22%);
                    border-color: transparent;
                    background-color: transparent;
                    font-size: 16px;
                    height: 40px;
                    padding-left: 16px;
                    padding-right: 16px;
                }

                .css-8q80ou:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-8q80ou:hover {
                    cursor: pointer;
                }

                .css-8q80ou:disabled {
                    cursor: not-allowed;
                }

                .css-8q80ou:disabled,
                .css-8q80ou.disabled {
                    border-color: transparent;
                    color: hsl(0, 0%, 46%);
                    cursor: not-allowed;
                }

                .css-3e0w3e {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-flex-direction: row-reverse;
                    -ms-flex-direction: row-reverse;
                    flex-direction: row-reverse;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    margin-left: -4px;
                    margin-right: -4px;
                }

                .css-qbrse1 {
                    margin-left: 4px;
                    margin-right: 4px;
                }

                .css-9gbji6 {
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    display: -webkit-inline-box;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    box-sizing: border-box;
                    -webkit-box-pack: justify;
                    -webkit-justify-content: space-between;
                    justify-content: space-between;
                    background: none;
                    border: none;
                    border-bottom: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                    padding-top: 16px;
                    padding-bottom: 16px;
                    padding-left: 32px;
                    padding-right: 32px;
                    text-align: left;
                    width: 100%;
                    position: relative;
                }

                .css-9gbji6:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-9gbji6:hover {
                    cursor: pointer;
                }

                .css-9gbji6:disabled {
                    cursor: not-allowed;
                }

                .css-9gbji6 svg {
                    position: absolute;
                    right: 16px;
                    margin-left: 16px;
                }

                .css-1khs5xc {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 16px;
                    font-weight: 700;
                    text-transform: inherit;
                }

                .css-f9pz52 {
                    color: hsl(190, 100%, 22%);
                    width: 16px;
                    height: 16px;
                    -webkit-transform: rotate(90deg);
                    -moz-transform: rotate(90deg);
                    -ms-transform: rotate(90deg);
                    transform: rotate(90deg);
                }

                .css-h3oydn {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(15em, 1fr));
                    border-bottom: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                    grid-gap: 16px;
                    list-style: none;
                    margin: 0;
                    padding-top: 16px;
                    padding-bottom: 16px;
                    padding-left: 32px;
                    padding-right: 32px;
                }

                .css-ie1780 {
                    margin: 0;
                    -webkit-text-decoration: underline;
                    text-decoration: underline;
                    color: hsl(190, 100%, 22%);
                    text-align: left;
                    border: none;
                    background: none;
                    display: inline;
                    padding: 0;
                    color: hsl(190, 100%, 22%);
                }

                .css-ie1780:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-ie1780:hover {
                    cursor: pointer;
                }

                .css-ie1780:disabled {
                    cursor: not-allowed;
                }

                .css-lkz9sl {
                    color: hsl(190, 100%, 22%);
                    width: 16px;
                    height: 16px;
                    -webkit-transform: rotate(0);
                    -moz-transform: rotate(0);
                    -ms-transform: rotate(0);
                    transform: rotate(0);
                }

                @-webkit-keyframes animation-vo2oum {

                    0%,
                    80%,
                    100% {
                        opacity: 0;
                    }

                    40% {
                        opacity: 1;
                    }
                }

                @keyframes animation-vo2oum {

                    0%,
                    80%,
                    100% {
                        opacity: 0;
                    }

                    40% {
                        opacity: 1;
                    }
                }

                .css-1xy5o1q {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 26px;
                    font-weight: 700;
                    text-align: left;
                }

                .css-squ00q {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 16px;
                    font-weight: 400;
                    text-transform: inherit;
                }

                .css-zkadht {
                    background-color: hsl(0, 0%, 100%);
                    padding: 4px;
                    border-radius: 4px;
                    box-shadow: 0px 100px 80px rgba(0, 0, 0, 0.0168519), 0px 64.8148px 46.8519px rgba(0, 0, 0, 0.0274815), 0px 38.5185px 25.4815px rgba(0, 0, 0, 0.035), 0px 20px 13px rgba(0, 0, 0, 0.0425185), 0px 8.14815px 6.51852px rgba(0, 0, 0, 0.0531481), 0px 1.85185px 3.14815px rgba(0, 0, 0, 0.07);
                }

                .css-e2vg5q {
                    display: grid;
                    grid-gap: 4px;
                    grid-template-columns: auto;
                }

                @media screen and (min-width: 480px) {
                    .css-e2vg5q {
                        grid-template-columns: auto;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-e2vg5q {
                        grid-template-columns: auto auto min-content;
                    }
                }

                .css-bjn8wh {
                    position: relative;
                }

                .css-173p03h {
                    padding: 0;
                    margin: 0;
                    border: none;
                }

                .css-p2z5vl {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 8px;
                }

                .css-kjafn5 {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    position: relative;
                }

                .css-ve357d {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    width: 1200px;
                    height: 1200px;
                    font-size: 16px;
                    font-family: Lato, sans-serif;
                    font-weight: normal;
                    color: hsl(0, 0%, 13%);
                    overflow: hidden;
                    text-overflow: ellipsis;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    width: 100%;
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    -ms-appearance: none;
                    appearance: none;
                    box-sizing: border-box;
                    padding: 8px;
                    outline: none;
                    cursor: pointer;
                    border-radius: 4px;
                    border: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                    height: 53px;
                }

                .css-ve357d::-webkit-input-placeholder {
                    color: hsl(0, 0%, 46%);
                }

                .css-ve357d::-moz-placeholder {
                    color: hsl(0, 0%, 46%);
                }

                .css-ve357d:-ms-input-placeholder {
                    color: hsl(0, 0%, 46%);
                }

                .css-ve357d::placeholder {
                    color: hsl(0, 0%, 46%);
                }

                .css-ve357d:disabled {
                    background-color: hsl(0, 0%, 95%);
                    color: hsl(0, 0%, 46%);
                }

                .css-ve357d:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-ve357d:hover {
                    cursor: pointer;
                }

                .css-ve357d:disabled {
                    cursor: not-allowed;
                }

                .css-fn2um {
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    display: -webkit-inline-box;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    box-sizing: border-box;
                    border-width: 1px;
                    border-style: solid;
                    font-family: Lato, sans-serif;
                    font-weight: 400;
                    border-color: hsl(0, 0%, 90%);
                    border-radius: 4px;
                    background: white;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: hsl(0, 0%, 100%);
                    border-color: hsl(190, 100%, 22%);
                    background-color: hsl(190, 100%, 22%);
                    font-size: 22px;
                    height: 53px;
                    padding-left: 64px;
                    padding-right: 64px;
                }

                .css-fn2um:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-fn2um:hover {
                    cursor: pointer;
                }

                .css-fn2um:disabled {
                    cursor: not-allowed;
                }

                .css-fn2um:disabled,
                .css-fn2um.disabled {
                    background-color: hsl(0, 0%, 46%);
                    border-color: hsl(0, 0%, 46%);
                    cursor: not-allowed;
                }

                .css-105fra2 {
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    display: -webkit-inline-box;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    box-sizing: border-box;
                    border-width: 1px;
                    border-style: solid;
                    font-family: Lato, sans-serif;
                    font-weight: 400;
                    border-color: hsl(0, 0%, 90%);
                    border-radius: 4px;
                    background: white;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: hsl(190, 100%, 22%);
                    border-color: hsl(190, 100%, 22%);
                    background-color: white;
                    font-size: 16px;
                    height: 40px;
                    padding-left: 16px;
                    padding-right: 16px;
                }

                .css-105fra2:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-105fra2:hover {
                    cursor: pointer;
                }

                .css-105fra2:disabled {
                    cursor: not-allowed;
                }

                .css-105fra2:disabled,
                .css-105fra2.disabled {
                    border-color: hsl(0, 0%, 46%);
                    color: hsl(0, 0%, 46%);
                    cursor: not-allowed;
                }

                .css-6iwp6q {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                }

                .css-19v4aip {
                    margin: 0;
                    color: inherit;
                    font-family: Lato, sans-serif;
                    font-size: 16px;
                    font-weight: 400;
                    text-transform: inherit;
                    font-size: inherit;
                    font-weight: 700;
                }

                .css-uodor8 {
                    border-radius: 50%;
                }

                .css-1iiv58m {
                    max-width: 992px;
                    width: calc(100% - (16px * 2));
                }

                .css-1g9vjr2 {
                    display: grid;
                    grid-auto-rows: max-content;
                    grid-gap: 16px;
                    grid-template-columns: 1fr;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                }

                @media screen and (min-width: 480px) {
                    .css-1g9vjr2 {
                        grid-template-columns: 1fr 1fr;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-1g9vjr2 {
                        grid-template-columns: 1fr 1fr 1fr;
                    }
                }

                @media screen and (min-width: 992px) {
                    .css-1g9vjr2 {
                        grid-template-columns: 1fr 1fr 1fr 1fr;
                    }
                }

                .css-fim7d8 {
                    width: 100%;
                    -webkit-background-size: 100%;
                    background-size: 100%;
                    background-image: url('static/images/home/categories-sprite.png');
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    border-radius: 4px;
                    -webkit-background-position: 0 40%;
                    background-position: 0 40%;
                }

                .css-fim7d8:hover {
                    opacity: 0.8;
                }

                .css-1rruakd {
                    width: 100%;
                    -webkit-background-size: 100%;
                    background-size: 100%;
                    background-image: url('static/images/home/categories-sprite.png');
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    border-radius: 4px;
                    -webkit-background-position: 0 50%;
                    background-position: 0 50%;
                }

                .css-1rruakd:hover {
                    opacity: 0.8;
                }

                .css-ouysy5 {
                    width: 100%;
                    -webkit-background-size: 100%;
                    background-size: 100%;
                    background-image: url('static/images/home/categories-sprite.png');
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    border-radius: 4px;
                    -webkit-background-position: 0 20%;
                    background-position: 0 20%;
                }

                .css-ouysy5:hover {
                    opacity: 0.8;
                }

                .css-sis14u {
                    width: 100%;
                    -webkit-background-size: 100%;
                    background-size: 100%;
                    background-image: url('static/images/home/categories-sprite.png');
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    border-radius: 4px;
                    -webkit-background-position: 0 60%;
                    background-position: 0 60%;
                }

                .css-sis14u:hover {
                    opacity: 0.8;
                }

                .css-mm5std {
                    width: 100%;
                    -webkit-background-size: 100%;
                    background-size: 100%;
                    background-image: url('static/images/home/categories-sprite.png');
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    border-radius: 4px;
                    -webkit-background-position: 0 70%;
                    background-position: 0 70%;
                }

                .css-mm5std:hover {
                    opacity: 0.8;
                }

                .css-9vornv {
                    width: 100%;
                    -webkit-background-size: 100%;
                    background-size: 100%;
                    background-image: url('static/images/home/categories-sprite.png');
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    border-radius: 4px;
                    -webkit-background-position: 0 30%;
                    background-position: 0 30%;
                }

                .css-9vornv:hover {
                    opacity: 0.8;
                }

                .css-q424i7 {
                    width: 100%;
                    -webkit-background-size: 100%;
                    background-size: 100%;
                    background-image: url('static/images/home/categories-sprite.png');
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    border-radius: 4px;
                    -webkit-background-position: 0 0%;
                    background-position: 0 0%;
                }

                .css-q424i7:hover {
                    opacity: 0.8;
                }

                .css-1s7dpk1 {
                    width: 100%;
                    -webkit-background-size: 100%;
                    background-size: 100%;
                    background-image: url('static/images/home/categories-sprite.png');
                    -webkit-transition: all 0.3s;
                    transition: all 0.3s;
                    border-radius: 4px;
                    -webkit-background-position: 0 10%;
                    background-position: 0 10%;
                }

                .css-1s7dpk1:hover {
                    opacity: 0.8;
                }

                .css-l951p5 {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                }

                @media screen and (min-width: 992px) {
                    .css-l951p5 {
                        grid-auto-flow: column;
                    }
                }

                .css-ruw0ik {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                    grid-auto-rows: max-content;
                }

                .css-q6wv6b {
                    max-width: 768px;
                    width: calc(100% - (16px * 2));
                }

                .css-1i7dxix {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    background-color: hsl(207, 100%, 87%);
                    position: relative;
                    overflow: hidden;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                }

                .css-w8wg2g {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                    max-width: 250px;
                    padding-bottom: 120px;
                    padding-top: 32px;
                    position: relative;
                    z-index: 15;
                }

                @media screen and (min-width: 768px) {
                    .css-w8wg2g {
                        padding-bottom: 70px;
                        max-width: 360px;
                    }
                }

                .css-tvdhho {
                    color: hsl(0, 0%, 100%);
                    font-family: Kollektif, Helvetica, Arial, sans-serif;
                    font-size: 52px;
                    font-weight: 700;
                    margin: 0;
                    text-align: left;
                    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);
                }

                @media screen and (min-width: 768px) {
                    .css-tvdhho {
                        font-size: 72px;
                    }
                }

                .css-1tzeee1 {
                    opacity: 0.5;
                }

                .css-1y5e797 {
                    color: hsl(0, 0%, 100%);
                    font-family: Lato, sans-serif;
                    font-size: 22px;
                    font-weight: 700;
                    margin: 0;
                    text-align: left;
                    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);
                }

                @media screen and (min-width: 768px) {
                    .css-1y5e797 {
                        font-size: 26px;
                    }
                }

                .css-1tz8ogm {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    bottom: 0;
                    left: 50%;
                    margin-left: 240px;
                    position: absolute;
                    width: 589px;
                    z-index: 10;
                    -webkit-transform: translate(-50%, 0);
                    -moz-transform: translate(-50%, 0);
                    -ms-transform: translate(-50%, 0);
                    transform: translate(-50%, 0);
                }

                @media screen and (min-width: 768px) {
                    .css-1tz8ogm {
                        margin-left: 300px;
                    }
                }

                .css-1lnpsqz {
                    background-color: hsl(8, 86%, 62%);
                    height: 720px;
                    left: 50%;
                    margin-left: -240px;
                    margin-top: -60px;
                    position: absolute;
                    top: 50%;
                    width: 720px;
                    z-index: 1;
                    -webkit-transform: translate(-50%, -50%);
                    -moz-transform: translate(-50%, -50%);
                    -ms-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
                    border-radius: 50%;
                }

                @media screen and (min-width: 992px) {
                    .css-1lnpsqz {
                        margin-left: -360px;
                    }
                }

                .css-1wcjc1k {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                }

                .css-d65tcr {
                    position: relative;
                    z-index: 20;
                }

                .css-1a7f7p {
                    position: absolute;
                    width: 100%;
                    -webkit-transform: translate(0, -50%);
                    -moz-transform: translate(0, -50%);
                    -ms-transform: translate(0, -50%);
                    transform: translate(0, -50%);
                }

                .css-1ryz6ze {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    background-color: hsl(42, 56%, 96%);
                    padding-bottom: 32px;
                    padding-top: 128px;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    border-top: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                }

                @media screen and (min-width: 768px) {
                    .css-1ryz6ze {
                        padding-top: 84px;
                    }
                }

                @media screen and (min-width: 992px) {
                    .css-1ryz6ze {
                        padding-bottom: 64px;
                    }
                }

                .css-1yz0o3j {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 32px;
                }

                @media screen and (min-width: 992px) {
                    .css-1yz0o3j {
                        grid-auto-flow: column;
                    }
                }

                .css-n7e2yo {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 4px;
                    grid-auto-rows: max-content;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                }

                .css-qh9ukh {
                    display: grid;
                    grid-auto-flow: column;
                    grid-gap: 8px;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                }

                .css-1mu8hzh {
                    color: hsl(8, 86%, 62%);
                    width: 32px;
                    height: 32px;
                }

                .css-1g1q0hs {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 26px;
                    font-weight: 400;
                    text-transform: inherit;
                }

                .css-1o52x4a {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 16px;
                    text-align: center;
                    font-weight: 400;
                    text-transform: inherit;
                }

                .css-bk7e3w {
                    border-bottom: 1px solid hsl(0, 0%, 90%);
                    border-left: none;
                    border-right: none;
                    border-top: 1px solid hsl(0, 0%, 90%);
                    padding-bottom: 32px;
                    padding-left: 0;
                    padding-right: 0;
                    padding-top: 32px;
                }

                @media screen and (min-width: 992px) {
                    .css-bk7e3w {
                        border-left: 1px solid hsl(0, 0%, 90%);
                        border-right: 1px solid hsl(0, 0%, 90%);
                        border-top: none;
                        border-bottom: none;
                        padding-left: 32px;
                        padding-right: 32px;
                        padding-top: 0;
                        padding-bottom: 0;
                    }
                }

                .css-1600jh {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    padding-bottom: 32px;
                    padding-top: 32px;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    border-top: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                }

                @media screen and (min-width: 992px) {
                    .css-1600jh {
                        padding-top: 64px;
                        padding-bottom: 64px;
                    }
                }

                .css-42crao {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    padding-bottom: 32px;
                    padding-top: 32px;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    border-top: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                }

                @media screen and (min-width: 768px) {
                    .css-42crao {
                        padding-top: 64px;
                        padding-bottom: 64px;
                    }
                }

                .css-1q886t9 {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 40px;
                    font-weight: 400;
                    text-transform: inherit;
                    font-weight: 700;
                    text-align: center;
                    padding-left: 30px;
                    max-width: 640px;
                    justify-self: center;
                }

                .css-1q886t9>span {
                    color: hsl(8, 86%, 62%);
                    position: relative;
                }

                .css-1q886t9>span:before {
                    content: "";
                    color: hsl(8, 86%, 62%);
                    background: url("static/images/home/quotes.svg") no-repeat;
                    position: absolute;
                    left: -35px;
                    top: -5px;
                    width: 29px;
                    height: 25px;
                    -webkit-background-size: contain;
                    background-size: contain;
                }

                .css-1l4w6pd {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                }

                .css-x3j6co {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 22px;
                    text-align: center;
                    font-weight: 700;
                    text-transform: inherit;
                }

                .css-1sddqb5 {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    justify-self: center;
                }

                .css-15frxp {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    background-color: hsl(175, 32%, 93%);
                    padding-bottom: 32px;
                    padding-top: 32px;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    border-top: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                }

                @media screen and (min-width: 768px) {
                    .css-15frxp {
                        padding-top: 64px;
                        padding-bottom: 64px;
                    }
                }

                .css-ccv1m5 {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 32px;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                }

                @media screen and (min-width: 768px) {
                    .css-ccv1m5 {
                        grid-auto-flow: column;
                    }
                }

                .css-smptyk {
                    border-radius: 50%;
                    background-color: hsl(8, 86%, 62%);
                    box-shadow: 29.5396px 52.2246px 80px rgba(0, 0, 0, 0.0168519), 19.146px 33.8493px 46.8519px rgba(0, 0, 0, 0.0274815), 11.3782px 20.1162px 25.4815px rgba(0, 0, 0, 0.035), 5.90791px 10.4449px 13px rgba(0, 0, 0, 0.0425185), 2.40693px 4.25534px 6.51852px rgba(0, 0, 0, 0.0531481), 0.547029px 0.967123px 3.14815px rgba(0, 0, 0, 0.07);
                    object-fit: cover;
                }

                .css-142foij {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                    -webkit-box-pack: left;
                    -ms-flex-pack: left;
                    -webkit-justify-content: left;
                    justify-content: left;
                }

                .css-1hqpjkr {
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 30px;
                    font-weight: 700;
                    margin: 0;
                    text-align: center;
                }

                @media screen and (min-width: 768px) {
                    .css-1hqpjkr {
                        text-align: left;
                    }
                }

                .css-1cjvpa3 {
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 16px;
                    font-weight: 400;
                    margin: 0;
                    text-align: center;
                    text-transform: inherit;
                }

                @media screen and (min-width: 768px) {
                    .css-1cjvpa3 {
                        text-align: left;
                    }
                }

                .css-1hgunyx {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                }

                @media screen and (min-width: 768px) {
                    .css-1hgunyx {
                        -webkit-box-pack: left;
                        -ms-flex-pack: left;
                        -webkit-justify-content: left;
                        justify-content: left;
                    }
                }

                .css-12ci84q {
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    display: -webkit-inline-box;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    box-sizing: border-box;
                    border-width: 1px;
                    border-style: solid;
                    font-family: Lato, sans-serif;
                    font-weight: 400;
                    border-color: hsl(0, 0%, 90%);
                    border-radius: 4px;
                    background: white;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    overflow: hidden;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: hsl(0, 0%, 100%);
                    border-color: hsl(190, 100%, 22%);
                    background-color: hsl(190, 100%, 22%);
                    font-size: 16px;
                    height: 40px;
                    padding-left: 16px;
                    padding-right: 16px;
                    box-shadow: 29.5396px 52.2246px 80px rgba(0, 0, 0, 0.0168519), 19.146px 33.8493px 46.8519px rgba(0, 0, 0, 0.0274815), 11.3782px 20.1162px 25.4815px rgba(0, 0, 0, 0.035), 5.90791px 10.4449px 13px rgba(0, 0, 0, 0.0425185), 2.40693px 4.25534px 6.51852px rgba(0, 0, 0, 0.0531481), 0.547029px 0.967123px 3.14815px rgba(0, 0, 0, 0.07);
                }

                .css-12ci84q:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-12ci84q:hover {
                    cursor: pointer;
                }

                .css-12ci84q:disabled {
                    cursor: not-allowed;
                }

                .css-12ci84q:disabled,
                .css-12ci84q.disabled {
                    background-color: hsl(0, 0%, 46%);
                    border-color: hsl(0, 0%, 46%);
                    cursor: not-allowed;
                }

                .css-1jsxf2a {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 30px;
                    font-weight: 700;
                    text-align: left;
                }

                .css-shx0pi {
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    display: -webkit-inline-box;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    box-sizing: border-box;
                    -webkit-box-pack: justify;
                    -webkit-justify-content: space-between;
                    justify-content: space-between;
                    background: none;
                    border: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                    padding-top: 16px;
                    padding-bottom: 16px;
                    border-radius: 100em;
                    padding-left: 32px;
                    padding-right: 64px;
                    text-align: left;
                    width: 100%;
                    position: relative;
                }

                .css-shx0pi:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-shx0pi:hover {
                    cursor: pointer;
                }

                .css-shx0pi:disabled {
                    cursor: not-allowed;
                }

                .css-shx0pi svg {
                    position: absolute;
                    right: 32px;
                    margin-left: 16px;
                }

                .css-u2ep48 {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 20px;
                    font-weight: 700;
                    text-transform: inherit;
                }

                .css-j7qwjs {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
                }

                .css-14c8jl2 {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(15em, 1fr));
                    grid-gap: 16px;
                    list-style: none;
                    margin: 0;
                    padding-top: 32px;
                    padding-left: 32px;
                    padding-right: 32px;
                }

                .row {
                    display: flex;
                }

                .col-6 {
                    width: 50%;
                }

                @media screen and (max-width: 768px) {
                    .col-6 {
                        width: 100%;
                    }
                }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .explore-block {
            position: relative;
            margin-bottom: 30px;
        }

        .explore-block .inner-box {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
        }

        .explore-block .image {
            position: relative;
            overflow: hidden;
            margin-bottom: 0;
        }

        figure {
            margin: 0 0 1rem;
        }

        .explore-block .inner-box:hover .image img {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        .explore-block .image img {
            height: 300px;
            display: block;
            width: 100%;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            max-width: 100%;
            vertical-align: middle;
            border-style: none;
        }

        .explore-block .overlay-box {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
        }

        .explore-block .overlay-box .content {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 30px 30px 25px;
            z-index: 9;
        }

        .explore-block .overlay-box:before {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255, 0)), to(#1b2032));
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0, #1b2032 100%);
            content: "";
        }

        .explore-block .overlay-box h5 {
            font-size: 18px;
            color: #fff;
            font-weight: 500;
            display: block;
            margin-bottom: 3px;
        }

        .explore-block .overlay-box .locations {
            display: block;
            font-size: 14px;
            color: #fff;
        }

        .overlay-link {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            z-index: 9;
        }

        .listing-block {
            position: relative;
            margin-bottom: 30px;
        }

        .listing-block .inner-box {
            position: relative;
            background-color: #e3e3e3;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 4px rgba(0, 0, 0, .09);
        }

        .listing-block .image-box {
            position: relative;
        }

        .listing-block .image img {
            width: 420px !important;
            height: 220px !important;
            object-fit: cover;
        }

        .listing-block .lower-content {
            min-height: 130px;
            position: relative;
            padding: 10px;
            z-index: 2;
        }

        .sec-title h2 {
            position: relative;
            display: block;
            font-size: 32px;
            line-height: 1.2em;
            color: #1b2032;
            font-weight: 700;
        }

        .sec-title.text-center .divider {
            margin: 12px auto;
        }

        .sec-title .text {
            position: relative;
            margin-top: 15px;
        }

        .sec-title .divider {
            position: relative;
            display: block;
            width: 100px;
            background-color: #9fa9b8;
            height: 2px;
            margin-top: 12px;
        }

        .listing-block .bottom-box {
            position: relative;
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
            border-top: 1px solid #e6e8ed;
            padding: 10px 25px;
        }

        .listing-block .places {
            position: relative;
            display: -webkit-box;
            display: flex;
        }

        .listing-block .place {
            position: relative;
            color: #4cbfd8;
            font-size: 14px;
            margin-right: 30px;
        }

        .listing-block .status {
            position: relative;
            font-size: 14px;
            color: #5c6770;
        }

        .listing-block .text {
            position: relative;
            margin-bottom: 10px;
        }

        .text {
            font-size: 16px;
            line-height: normal;
            color: #5c6770;
            font-weight: 400;
            margin: 0;
        }

        .listing-block h3 {
            position: relative;
            font-size: 18px;
            line-height: 1.2em;
            color: #1b2032;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .listing-block h3 a {
            display: -webkit-box;
            text-decoration: none;
            cursor: pointer;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            color: #1b2032;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
        }

        #banner {
            background-image: url('{{ asset('/images/beyout-banner-pc.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            /* tùy chọn */
            background-position: center;
            /* tùy chọn */
        }

        @media screen and (max-width: 768px) {
            .explore-block .image img {
                height: 230px;
            }

            #banner {
                background-image: url('{{ asset('/images/beyout-banner-mb.jpg') }}');
            }
        }

        .FooterLinks_self__1NbYV .FooterLinks_gridItem__SwRrK:nth-child(2) {
            grid-area: about;
        }

        ._-wKyRQ.rfrdHQ {
            color: #0d1619;
        }

        ._-wKyRQ.rfrdHQ {
            color: #0d1619;
        }

        [dir] ._-wKyRQ {
            text-align: inherit;
        }
        footer ul{
            list-style: none;
             color: #0d1619;
        }
         ul li.title p{
            font-weight: 600;
         }
        ul li a{
             color: #0d1619;
            text-decoration:none
        }
        @media (min-width: 1440px) {
            .FooterLinks_gridItem__SwRrK {
                inline-size: 227px;
                min-inline-size: 227px;
            }
        }
    </style>
</head>

<body>
    <div id="__next">
        <div class="css-j64p7l e15axdxf1">
            <header class="e18e99my1 css-1nl879o ehep9uj0">
                <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                    <div class="css-1l7k9wm ehep9uj0">
                        <a href="/" class="e1g407rp0 css-mwwny2 eh0fvrz0">
                            <img style="max-height: 50px;" src="{!! getImageThumb($config_website?->logo) !!}" id="logo"
                                alt="{{ $config_website?->website }}">
                        </a>
                        <div class="css-dyoadf elovojj0">
                            <a class=" e46r4ae0 css-11prviu eqqze3d0" id="open_menu" href="#main-menu"
                                title="Open menu">
                                <div class="css-6zvpm ehep9uj0">
                                    <div class="css-1br3txa ehep9uj0"><svg viewBox="0 0 24 24"
                                            class="css-1ktnz7v e1jjwqut0">
                                            <path
                                                d="M24 20H0V17.3333H24V20ZM24 13.3333H0V10.6667H24V13.3333ZM24 6.66667H0V4H24V6.66667Z"
                                                fill="currentColor"></path>
                                        </svg></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </header>



            <section id="main-menu" class="css-uiw85g e1ia6iam0">
                <div class="ee94ukk1 css-zmt40d ehep9uj0">
                    <div class="css-9g0g4r ehep9uj0"><button class=" e46r4ae0 css-mnebl eqqze3d0" title="Close"><svg
                                viewBox="0 0 24 24" class="css-3o0h5k e1jjwqut0">
                                <rect x="2.10059" y="4.92871" width="4" height="24"
                                    transform="rotate(-45 2.10059 4.92871)" fill="currentColor"></rect>
                                <rect x="19.0713" y="2.10059" width="4" height="24"
                                    transform="rotate(45 19.0713 2.10059)" fill="currentColor"></rect>
                            </svg> </button></div>
                    <div class="ee94ukk0 css-jazq28 e1xmv6f40">
                        <nav>
                            <ul class="css-h3oydn eq3vq2v1">
                                @if (!empty($menus_header))
                                    @foreach ($menus_header as $item)
                                        <li><a href="{{ $item->link }}"
                                                class="e1g407rp0 css-ie1780 eh0fvrz0">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
            <div class="css-mkkf9p e15axdxf0">

                <section class="e18e99my1 css-1i7dxix ehep9uj0" id="banner">
                    @if (!empty($banners))
                        @foreach ($banners as $banner)
                            <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                                <div class="css-w8wg2g elovojj0">
                                    <h6 class="css-tvdhho eh0fvrz0">
                                        <div>Discover<span class="css-1tzeee1 e1xmv6f40">.</span></div>
                                        <div>Reserve<span class="css-1tzeee1 e1xmv6f40">.</span></div>
                                        <div>Relax<span class="css-1tzeee1 e1xmv6f40">.</span></div>
                                    </h6>
                                    <h1 class="css-1y5e797 eh0fvrz0">Instant booking for beauty, haircuts, and
                                        relaxation</h1>
                                </div>
                                {{-- <picture transform="translate(-50%, 0)" class="css-1tz8ogm ehep9uj0">
                                    <source
                                        srcSet="{{ asset('/images/beyout-banner-pc.jpg') }} 2x, {{ asset('/images/beyout-banner-pc.jpg') }} 1x"
                                        type="image/webp" />
                                    <source srcSet="{{ asset('/images/beyout-banner-pc.jpg') }} 2x, {{ asset('/images/beyout-banner-pc.jpg') }} 1x"
                                        type="image/png" /><img src="{{ asset('/images/beyout-banner-pc.jpg') }}" alt="" />
                                </picture>
                                <div transform="translate(-50%,-50%)" class="ep2hkag0 css-1lnpsqz e1xmv6f40"></div> --}}
                            </div>
                        @endforeach
                    @endif
                </section>


                <section class="e18e99my1 css-1wcjc1k ehep9uj0">
                    <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                        <div class="css-d65tcr e1xmv6f40">
                            <div transform="translate(0, -50%)" class="css-1a7f7p e1xmv6f40">
                                <div class="css-zkadht e1xmv6f40">
                                    <form>
                                        <div class="css-e2vg5q elovojj0">
                                            <div class="css-bjn8wh e1f2m6p01">
                                                <div id="service-category-or-tag-picker-field-group"
                                                    class="e1yxb4jn0 css-173p03h e1xmv6f40">
                                                    <div class="css-p2z5vl elovojj0">
                                                        <div class="css-kjafn5 ehep9uj0"><input type="text"
                                                                id="service-category-or-tag-picker-field-input"
                                                                placeholder="Service or Treatment" value=""
                                                                autoComplete="off"
                                                                class="exhzwka0 css-ve357d ehep9uj0" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-bjn8wh e1f2m6p01">
                                                <div id="suburb-or-venue-picker-field-group"
                                                    class="e1yxb4jn0 css-173p03h e1xmv6f40">
                                                    <div class="css-p2z5vl elovojj0">
                                                        <div class="css-kjafn5 ehep9uj0"><input type="text"
                                                                id="suburb-or-venue-picker-field-input"
                                                                placeholder="Postcode, Suburb or Venue" value=""
                                                                autoComplete="off"
                                                                class="exhzwka0 css-ve357d ehep9uj0" /></div>
                                                    </div>
                                                </div>
                                            </div><button class="disabled e46r4ae0 css-fn2um eqqze3d0" disabled=""
                                                type="submit">Search<!-- --> </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="e18e99my1 css-1ryz6ze ehep9uj0">
                    <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                        <div class="css-1yz0o3j elovojj0">
                            <div class="css-n7e2yo elovojj0">
                                <div class="css-qh9ukh elovojj0"><svg viewBox="0 0 24 24"
                                        class="css-1mu8hzh e1jjwqut0">
                                        <path
                                            d="M23.8812 8.07028L22.6208 2.82459C22.3568 1.74424 21.4205 1 20.3281 1H3.65474C2.57439 1 1.62609 1.75624 1.374 2.82459L0.113599 8.07028C-0.174494 9.29467 0.0895916 10.5431 0.857839 11.5274C0.95387 11.6594 1.08591 11.7555 1.19395 11.8755V20.2062C1.19395 21.5266 2.27429 22.607 3.59472 22.607H20.4001C21.7206 22.607 22.8009 21.5266 22.8009 20.2062V11.8755C22.9089 11.7675 23.041 11.6594 23.137 11.5394C23.9053 10.5551 24.1813 9.29467 23.8812 8.07028V8.07028ZM13.1978 3.40077H15.5506L16.1988 8.82652C16.2588 9.29467 16.1147 9.76282 15.8026 10.1109C15.5386 10.423 15.1544 10.6031 14.6623 10.6031C13.858 10.6031 13.1978 9.89486 13.1978 9.03058V3.40077ZM7.78407 8.82652L8.44428 3.40077H10.797V9.03058C10.797 9.89486 10.1368 10.6031 9.24854 10.6031C8.84041 10.6031 8.46829 10.423 8.18019 10.1109C7.8801 9.76282 7.73605 9.29467 7.78407 8.82652V8.82652ZM2.74245 10.0389C2.43034 9.64278 2.32231 9.12661 2.44235 8.63446L3.65474 3.40077H6.0195L5.32328 9.23465C5.22724 10.0149 4.60304 10.6031 3.87081 10.6031C3.27062 10.6031 2.9105 10.255 2.74245 10.0389V10.0389ZM20.4001 20.2062H3.59472V12.9679C3.69075 12.9799 3.77478 13.0039 3.87081 13.0039C4.91514 13.0039 5.86345 12.5717 6.55967 11.8635C7.27991 12.5837 8.24021 13.0039 9.33257 13.0039C10.3769 13.0039 11.3132 12.5717 12.0094 11.8875C12.7177 12.5717 13.678 13.0039 14.7583 13.0039C15.7666 13.0039 16.7269 12.5837 17.4472 11.8635C18.1434 12.5717 19.0917 13.0039 20.136 13.0039C20.2321 13.0039 20.3161 12.9799 20.4121 12.9679V20.2062H20.4001ZM21.2524 10.0389C21.0843 10.255 20.7242 10.6031 20.124 10.6031C19.3918 10.6031 18.7556 10.0149 18.6716 9.23465L17.9753 3.40077L20.2921 3.38877L21.5525 8.63446C21.6725 9.13862 21.5645 9.65478 21.2524 10.0389Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <div class="css-1g1q0hs eh0fvrz0"><strong
                                            class="ejmi5p50 css-19v4aip eh0fvrz0">Discover</strong></div>
                                </div>
                                <div class="css-1o52x4a eh0fvrz0">Uncover the best nearby beauty & wellness places.
                                </div>
                            </div>
                            <div class="css-bk7e3w e1xmv6f40">
                                <div class="css-n7e2yo elovojj0">
                                    <div class="css-qh9ukh elovojj0"><svg viewBox="0 0 24 24"
                                            class="css-1mu8hzh e1jjwqut0">
                                            <path
                                                d="M17.4535 13.1951C18.3532 13.1951 19.1449 12.7033 19.5527 11.9596L23.8471 4.17445C24.291 3.38274 23.7152 2.39911 22.8035 2.39911H5.05012L3.92254 0H0V2.39911H2.39911L6.71751 11.5037L5.09811 14.4306C4.22243 16.038 5.374 17.9933 7.19733 17.9933H21.592V15.5942H7.19733L8.51684 13.1951H17.4535ZM6.1897 4.79822H20.7643L17.4535 10.796H9.03265L6.1897 4.79822ZM7.19733 19.1929C5.87782 19.1929 4.81021 20.2725 4.81021 21.592C4.81021 22.9115 5.87782 23.9911 7.19733 23.9911C8.51684 23.9911 9.59644 22.9115 9.59644 21.592C9.59644 20.2725 8.51684 19.1929 7.19733 19.1929ZM19.1929 19.1929C17.8734 19.1929 16.8058 20.2725 16.8058 21.592C16.8058 22.9115 17.8734 23.9911 19.1929 23.9911C20.5124 23.9911 21.592 22.9115 21.592 21.592C21.592 20.2725 20.5124 19.1929 19.1929 19.1929Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <div class="css-1g1q0hs eh0fvrz0"><strong
                                                class="ejmi5p50 css-19v4aip eh0fvrz0">Reserve</strong></div>
                                    </div>
                                    <div class="css-1o52x4a eh0fvrz0">Effortless online reservations – anytime,
                                        anywhere.</div>
                                </div>
                            </div>
                            <div class="css-n7e2yo elovojj0">
                                <div class="css-qh9ukh elovojj0"><svg viewBox="0 0 24 24"
                                        class="css-1mu8hzh e1jjwqut0">
                                        <path
                                            d="M17.4 1C15.312 1 13.308 1.972 12 3.508C10.692 1.972 8.688 1 6.6 1C2.904 1 0 3.904 0 7.6C0 12.136 4.08 15.832 10.26 21.448L12 23.02L13.74 21.436C19.92 15.832 24 12.136 24 7.6C24 3.904 21.096 1 17.4 1ZM12.12 19.66L12 19.78L11.88 19.66C6.168 14.488 2.4 11.068 2.4 7.6C2.4 5.2 4.2 3.4 6.6 3.4C8.448 3.4 10.248 4.588 10.884 6.232H13.128C13.752 4.588 15.552 3.4 17.4 3.4C19.8 3.4 21.6 5.2 21.6 7.6C21.6 11.068 17.832 14.488 12.12 19.66Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <div class="css-1g1q0hs eh0fvrz0"><strong
                                            class="ejmi5p50 css-19v4aip eh0fvrz0">Relax</strong></div>
                                </div>
                                <div class="css-1o52x4a eh0fvrz0">Sit back and relax, we’ll take care of the rest
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                @if ($categories->isNotEmpty())
                    <div class="css-1iiv58m m-auto">
                        <div class="sec-title text-center mt-3 mb-3">
                            <h2>Explore Treatments</h2> <span class="divider"></span>

                        </div>
                        <div class="row">
                            @if (!empty($categories) && $categories->count() > 0)
                                @foreach ($categories as $item)
                                    <div class="explore-block col-lg-3 col-6">
                                        <div class="inner-box">
                                            <figure class="image">
                                                {!! getThumbnail($item, 300, 400, 'css-fim7d8 e10gmdwn0') !!}
                                            </figure>
                                            <div class="overlay-box">
                                                <div class="content">
                                                    <h5>{{ $item->title }}</h5><a href="#"
                                                        class="overlay-link"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
                @if (!empty($posts) && $posts->count() > 0)



                    <section class="e18e99my1 css-1600jh ehep9uj0">
                        <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                            <div class="auto-container">
                                <div class="sec-title text-center">
                                    <h2>Explore Places</h2> <span class="divider"></span>

                                </div>
                                <div class="row">
                                    @foreach ($posts as $item)
                                        <div class="listing-block col-lg-4 col-md-6 col-sm-12">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image">
                                                        {!! getThumbnail($item, 600, 400) !!}
                                                    </figure>
                                                </div>
                                                <div class="lower-content">
                                                    <h3 class="title-brand"><a
                                                            href="{{ route('post', ['slug' => $item->slug]) }}"
                                                            title="{{ $item->title }}">{{ $item->title }}</a>
                                                    </h3>
                                                    <div class="text">
                                                        {{ $item->address }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
            <footer id="footer" class="e18e99my1 css-126zv25 ehep9uj0">
                <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                    <div class="css-jo2aaq elovojj0">

                        {{-- <div class="css-9a3ihm elovojj0 row">
                            <section class="col-6">
                                <h4 class="css-g4opy9 eh0fvrz0">Company</h4>
                                <p>{!! $config_website->content_footer !!}</p>
                            </section>
                            <section class="col-6">
                                <ul class="css-3usq65 e1ypdq852">
                                    @if (!empty($menus_footer))
                                        @foreach ($menus_footer as $item)
                                            <li class="css-19tzvnq e1ypdq851"><a href="{{ $item->link }}"
                                                    class="e1ypdq850 e1g407rp0 css-1wlq5nj eh0fvrz0">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </section>

                        </div> --}}

                        <div class="FooterLinks_innerContent__8anC0 row">
                            <div class="col">
                                <a href="/"
                                    class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX"
                                    aria-label="{{ $config_website?->website }}"><img style="max-height: 50px;"
                                        src="{!! getImageThumb($config_website?->logo) !!}" id="logo"
                                        alt="{{ $config_website?->website }}">
                                </a>
                            </div>
                            <div class="col">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">About Fresha</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-careers" id="footer-careers"
                                                target="_blank">Careers</a>
                                        </p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-customer-support" id="footer-customer-support"
                                                target="_blank">Customer Support</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-blog" id="footer-blog" target="_self">Blog</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-sitemap" id="footer-sitemap">Sitemap</a></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">For business</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-partners" id="footer-partners" target="_self">For
                                                partners</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-pricing" id="footer-pricing"
                                                target="_self">Pricing</a>
                                        </p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-partners-support" id="footer-partners-support"
                                                target="_blank">Support</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-status" id="footer-status" target="_blank">Status</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">Legal</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-privacy-policy" id="footer-privacy-policy"
                                                target="_blank">Privacy Policy</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-service-terms" id="footer-service-terms"
                                                target="_blank">Terms of service</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-use-terms" id="footer-use-terms"
                                                target="_blank">Terms of
                                                use</a></p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <div class=" css-1sg0k8w esj4ej70"></div>
    </div>
    <script src="{{ asset('admins/vendor/jquery-3.2.1.min.js') }}"></script>

    <style>
        .css-zmt40d {
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            width: 24em;
            max-width: 90vw;
            background-color: white;
            transform: translate3d(0%, 0px, 0px);
            transition: transform 250ms;
        }

        .css-1hd6k1h {
            position: fixed;
            inset: 0px;
            z-index: 200;
            overflow: hidden;
            visibility: visible;
            background-color: rgba(0, 0, 0, 0.35);
            opacity: 1;
            backdrop-filter: blur(1px);
            transition: opacity 250ms;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#open_menu, button.eqqze3d0").click(function() {
                $("#main-menu").toggleClass('css-1hd6k1h')

            })
        });
    </script>
</body>

</html>
