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

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('admins/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">

    <style
        data-emotion-css="0 1w9yb6b j64p7l 1nl879o 1l7k9wm mwwny2 16n9dof kau6op dyoadf 11prviu 6zvpm 1br3txa 1ktnz7v uiw85g 1h3k0x3 9g0g4r mnebl 3o0h5k jazq28 mkkf9p 126zv25 jo2aaq k008qs 1hcy63r 1ta5v59 9a3ihm g4opy9 3usq65 19tzvnq 1wlq5nj 1sg0k8w 1f3l2hr slgx7q 8q80ou 3e0w3e qbrse1 9gbji6 1khs5xc f9pz52 h3oydn ie1780 lkz9sl a14gsd animation-vo2oum ah6yll tw4vmx esfoir 1nvsk3n 1bxmhsp 1xy5o1q squ00q d75zvh zkadht e2vg5q bjn8wh 173p03h p2z5vl kjafn5 ve357d fn2um 105fra2 1a43lhx fhxwc 12og2a1 1labv9h hq14lp 1pgqhx0 2ano4a 1k8t7d9 tp235j 1phd9a0 1ckupud y1wruq 1on5d8d jlll2v 18p0tva 1fjz2rt 169tcl7 6iwp6q x56fes 1vbfap1 16r6smb ti75j2 19v4aip 1hqwqc6 565q9r 1picgnj 1fnsdky l752ox xmjnqu j7w9yw t7psqe 60q7c 1dk7xu7 1euj0wm bqiemi uodor8 1scn9ex 1989ovb 15wj4up rep6x4 shx0pi u2ep48 j7qwjs 14c8jl2">
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
                    src: url('/static/fonts/Kollektif/Kollektif.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Kollektif';
                    font-weight: 400;
                    font-style: italic;
                    font-display: swap;
                    src: url('/static/fonts/Kollektif/Kollektif-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Kollektif';
                    font-weight: 700;
                    font-style: normal;
                    font-display: swap;
                    src: url('/static/fonts/Kollektif/Kollektif-Bold.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Kollektif';
                    font-weight: 700;
                    font-style: italic;
                    font-display: swap;
                    src: url('/static/fonts/Kollektif/Kollektif-Bold-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 100;
                    font-style: normal;
                    font-display: swap;
                    src: url('/static/fonts/Lato/Lato-Hairline.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 100;
                    font-style: italic;
                    font-display: swap;
                    src: url('/static/fonts/Lato/Lato-Hairline-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 300;
                    font-style: normal;
                    font-display: swap;
                    src: url('/static/fonts/Lato/Lato-Light.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 300;
                    font-style: italic;
                    font-display: swap;
                    src: url('/static/fonts/Lato/Lato-Light-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 400;
                    font-style: normal;
                    font-display: swap;
                    src: url('/static/fonts/Lato/Lato-Regular.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 400;
                    font-style: italic;
                    font-display: swap;
                    src: url('/static/fonts/Lato/Lato-Italic.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 700;
                    font-style: normal;
                    font-display: swap;
                    src: url('/static/fonts/Lato/Lato-Bold.woff2') format('woff2');
                }

                @font-face {
                    font-family: 'Lato';
                    font-weight: 700;
                    font-style: italic;
                    font-display: swap;
                    src: url('/static/fonts/Lato/Lato-Bold-Italic.woff2') format('woff2');
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

                .css-a14gsd {
                    max-width: 1200px;
                    width: calc(100% - (16px * 2));
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

                .css-ah6yll {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    padding-top: 32px;
                    padding-bottom: 32px;
                    background-color: hsl(42, 56%, 96%);
                    position: relative;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                }

                @media screen and (min-width: 480px) {
                    .css-ah6yll {
                        padding-top: 32px;
                        padding-bottom: 32px;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-ah6yll {
                        padding-top: 64px;
                        padding-bottom: 64px;
                    }
                }

                .css-tw4vmx {
                    position: relative;
                    z-index: 2;
                }

                .css-esfoir {
                    padding: 0;
                    margin: 0;
                }

                .css-1nvsk3n {
                    display: inline;
                }

                .css-1nvsk3n:not(:last-child)::after {
                    content: " / ";
                    opacity: 0.4;
                }

                .css-1nvsk3n:last-child {
                    font-weight: 700;
                }

                .css-1bxmhsp {
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 14px;
                    font-weight: 400;
                    margin: 0;
                    text-transform: inherit;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                    color: inherit;
                    font-weight: inherit;
                }

                @media screen and (min-width: 768px) {
                    .css-1bxmhsp {
                        font-size: 16px;
                    }
                }

                .css-1bxmhsp:focus {
                    outline: 0;
                    -webkit-text-decoration: underline;
                    text-decoration: underline;
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

                .css-d75zvh {
                    max-width: 768px;
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

                .css-1a43lhx {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    overflow: hidden;
                    z-index: 1;
                }

                .css-fhxwc {
                    width: 120px;
                    height: 120px;
                    background-color: hsl(43, 93%, 68%);
                    position: absolute;
                    right: 50%;
                    top: 50%;
                    -webkit-transform: translate(400px, -30px);
                    -moz-transform: translate(400px, -30px);
                    -ms-transform: translate(400px, -30px);
                    transform: translate(400px, -30px);
                    border-radius: 50%;
                }

                .css-12og2a1 {
                    width: 60px;
                    height: 60px;
                    background-color: hsl(207, 100%, 87%);
                    position: absolute;
                    right: 50%;
                    top: 50%;
                    -webkit-transform: translate(560px, -170px);
                    -moz-transform: translate(560px, -170px);
                    -ms-transform: translate(560px, -170px);
                    transform: translate(560px, -170px);
                    border-radius: 50%;
                }

                .css-1labv9h {
                    width: 30px;
                    height: 30px;
                    background-color: hsl(12, 84%, 66%);
                    position: absolute;
                    right: 50%;
                    top: 50%;
                    -webkit-transform: translate(640px, 140px);
                    -moz-transform: translate(640px, 140px);
                    -ms-transform: translate(640px, 140px);
                    transform: translate(640px, 140px);
                    border-radius: 50%;
                }

                .css-hq14lp {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
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
                    .css-hq14lp {
                        padding-top: 32px;
                        padding-bottom: 32px;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-hq14lp {
                        padding-top: 64px;
                        padding-bottom: 64px;
                    }
                }

                .css-1pgqhx0 {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                }

                @media screen and (min-width: 480px) {
                    .css-1pgqhx0 {
                        grid-gap: 16px;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-1pgqhx0 {
                        grid-gap: 32px;
                    }
                }

                .css-2ano4a {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 22px;
                    font-weight: 700;
                    text-align: left;
                }

                .css-1k8t7d9 {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    width: 100%;
                    height: 100%;
                }

                .css-tp235j {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    margin: 0;
                    border-bottom: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                    height: 140px;
                    overflow: hidden;
                    background-color: hsl(0, 0%, 95%);
                }

                .css-1phd9a0 {
                    object-fit: cover;
                }

                .css-1ckupud {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    padding: 8px;
                }

                .css-y1wruq {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 8px;
                    width: 100%;
                }

                .css-1on5d8d {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 12px;
                    font-weight: 400;
                    text-transform: inherit;
                }

                .css-jlll2v {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    background-color: hsl(192, 50%, 96%);
                    padding: 8px;
                    border-radius: 4px;
                    border: 1px solid;
                    border-color: hsl(207, 100%, 87%);
                    -webkit-flex: 1;
                    -ms-flex: 1;
                    flex: 1;
                }

                .css-18p0tva {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 8px;
                    grid-auto-rows: max-content;
                }

                .css-1fjz2rt {
                    margin: 0;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 14px;
                    font-weight: 400;
                    text-transform: inherit;
                }

                .css-169tcl7 {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: justify;
                    -webkit-justify-content: space-between;
                    justify-content: space-between;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    padding: 8px;
                    margin-top: auto;
                    border-top: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                }

                .css-6iwp6q {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                }

                .css-x56fes {
                    -webkit-column-gap: 32px;
                    column-gap: 32px;
                    -webkit-column-count: 1;
                    column-count: 1;
                }

                @media screen and (min-width: 480px) {
                    .css-x56fes {
                        -webkit-column-count: 1;
                        column-count: 1;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-x56fes {
                        -webkit-column-count: 2;
                        column-count: 2;
                    }
                }

                @media screen and (min-width: 992px) {
                    .css-x56fes {
                        -webkit-column-count: 3;
                        column-count: 3;
                    }
                }

                .css-1vbfap1 {
                    line-height: 1.2;
                }

                .css-1vbfap1 h1,
                .css-1vbfap1 h2,
                .css-1vbfap1 h3 {
                    margin: 16px 0;
                    font-family: Kollektif, Helvetica, Arial, sans-serif;
                    font-weight: 700;
                }

                .css-1vbfap1 h1 {
                    font-size: 22px;
                }

                .css-1vbfap1 h2 {
                    font-size: 22px;
                }

                .css-1vbfap1 h3 {
                    font-size: 20px;
                }

                .css-1vbfap1 p {
                    margin: 16px 0;
                }

                .css-1vbfap1 blockquote {
                    margin: 16px;
                    font-size: 130%;
                    font-weight: 300;
                    color: hsl(8, 86%, 62%);
                }

                .css-1vbfap1 ol,
                .css-1vbfap1 ul {
                    box-sizing: border-box;
                    margin: 16px 0;
                    padding-left: 32px;
                }

                .css-1vbfap1 li {
                    margin: 8px 0;
                }

                .css-1vbfap1 a {
                    color: hsl(190, 100%, 22%);
                    -webkit-text-decoration: underline;
                    text-decoration: underline;
                }

                .css-1vbfap1 a:focus {
                    outline: 0;
                    -webkit-text-decoration: none;
                    text-decoration: none;
                }

                .css-1vbfap1 p {
                    margin-top: 0;
                }

                .css-1vbfap1 h1 {
                    margin-top: 0;
                }

                .css-1vbfap1>h2:before {
                    content: '';
                    width: 100px;
                    height: 6px;
                    background: red;
                    margin-bottom: 32px;
                    margin-top: 32px;
                    display: block;
                    background: hsl(12, 84%, 66%);
                }

                .css-1vbfap1>h2:nth-of-type(1):before {
                    background: hsl(12, 84%, 66%);
                }

                .css-1vbfap1>h2:nth-of-type(2):before {
                    background: hsl(176, 97%, 36%);
                }

                .css-1vbfap1 h2:nth-of-type(3):before {
                    background: hsl(43, 93%, 68%);
                }

                .css-1vbfap1 h2:nth-of-type(4):before {
                    background: hsl(207, 100%, 87%);
                }

                .css-1vbfap1 h2:nth-of-type(5):before {
                    background: hsl(17, 100%, 82%);
                }

                .css-1vbfap1 h2:nth-of-type(6):before {
                    background: hsl(192, 50%, 96%);
                }

                .css-1vbfap1 h2:nth-of-type(7):before {
                    background: hsl(42, 56%, 96%);
                }

                .css-1vbfap1 h2:nth-of-type(8):before {
                    background: hsl(175, 32%, 93%);
                }

                .css-16r6smb {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(12em, 1fr));
                    grid-gap: 16px;
                    padding-left: 0;
                    list-style: none;
                    margin: 0;
                }

                .css-ti75j2 {
                    margin: 0;
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

                .css-1hqwqc6 {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 4px;
                    margin: 0;
                }

                .css-565q9r {
                    display: grid;
                    grid-auto-flow: column;
                    grid-gap: 8px;
                    grid-auto-columns: max-content;
                    -webkit-box-pack: start;
                    -ms-flex-pack: start;
                    -webkit-justify-content: start;
                    justify-content: start;
                }

                @media screen and (min-width: 992px) {
                    .css-565q9r {
                        -webkit-box-pack: end;
                        -ms-flex-pack: end;
                        -webkit-justify-content: end;
                        justify-content: end;
                    }
                }

                .css-1picgnj {
                    margin: 0;
                    font-weight: 300;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 30px;
                    text-transform: inherit;
                }

                .css-1fnsdky {
                    display: grid;
                    grid-auto-flow: column;
                    grid-gap: 4px;
                    grid-auto-columns: max-content;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                }

                .css-l752ox {
                    display: grid;
                    grid-auto-flow: column;
                    grid-gap: 4px;
                    grid-auto-columns: max-content;
                }

                .css-xmjnqu {
                    color: hsl(43, 93%, 68%);
                    width: 22px;
                    height: 22px;
                }

                .css-j7w9yw {
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 14px;
                    font-weight: 400;
                    margin: 0;
                    text-align: start;
                    text-transform: inherit;
                }

                @media screen and (min-width: 992px) {
                    .css-j7w9yw {
                        text-align: end;
                    }
                }

                .css-t7psqe {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                    row-gap: 16px;
                    -webkit-column-gap: 16px;
                    column-gap: 16px;
                    list-style-type: none;
                    padding-left: 0;
                    margin: 0;
                }

                .css-t7psqe>li {
                    margin: 0;
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                }

                .css-60q7c {
                    background-color: white;
                    display: block;
                    border-radius: 4px;
                    border: 1px solid;
                    border-color: hsl(0, 0%, 90%);
                    overflow: hidden;
                    -webkit-transition: box-shadow 150ms ease-in-out;
                    transition: box-shadow 150ms ease-in-out;
                }

                .css-60q7c:hover {
                    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.0168519), 0px 6.48148px 17.5694px rgba(0, 0, 0, 0.0274815), 0px 3.85185px 9.55556px rgba(0, 0, 0, 0.035), 0px 2px 4.875px rgba(0, 0, 0, 0.0425185), 0px 0.814815px 2.44444px rgba(0, 0, 0, 0.0531481), 0px 0.185185px 1.18056px rgba(0, 0, 0, 0.07);
                }

                .css-60q7c:focus {
                    outline: 0;
                    box-shadow: 0 0 2px 2px rgba(0, 132, 255, 0.5);
                }

                .css-60q7c:hover {
                    cursor: pointer;
                }

                .css-60q7c:disabled {
                    cursor: not-allowed;
                }

                .css-1dk7xu7 {
                    color: hsl(43, 93%, 68%);
                    width: 16px;
                    height: 16px;
                }

                .css-1euj0wm {
                    margin: 0;
                    padding-top: 16px;
                    padding-bottom: 16px;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 14px;
                    font-weight: 400;
                    text-transform: inherit;
                }

                .css-bqiemi {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-align-items: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    padding: 8px;
                    margin-top: auto;
                }

                .css-uodor8 {
                    border-radius: 50%;
                }

                .css-1scn9ex {
                    margin: 0;
                    margin-left: 8px;
                    color: hsl(0, 0%, 13%);
                    font-family: Lato, sans-serif;
                    font-size: 16px;
                    font-weight: 400;
                    text-transform: inherit;
                }

                .css-1989ovb {
                    vertical-align: middle;
                }

                .css-15wj4up {
                    display: grid;
                    grid-auto-flow: row;
                    grid-gap: 16px;
                    -webkit-align-items: flex-start;
                    -webkit-box-align: flex-start;
                    -ms-flex-align: flex-start;
                    align-items: flex-start;
                }

                @media screen and (min-width: 480px) {
                    .css-15wj4up {
                        grid-auto-flow: row;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-15wj4up {
                        grid-auto-flow: row;
                    }
                }

                @media screen and (min-width: 992px) {
                    .css-15wj4up {
                        grid-auto-flow: column;
                    }
                }

                @media screen and (min-width: 480px) {
                    .css-15wj4up {
                        -webkit-align-items: flex-start;
                        -webkit-box-align: flex-start;
                        -ms-flex-align: flex-start;
                        align-items: flex-start;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-15wj4up {
                        -webkit-align-items: flex-start;
                        -webkit-box-align: flex-start;
                        -ms-flex-align: flex-start;
                        align-items: flex-start;
                    }
                }

                @media screen and (min-width: 992px) {
                    .css-15wj4up {
                        -webkit-align-items: flex-end;
                        -webkit-box-align: flex-end;
                        -ms-flex-align: flex-end;
                        align-items: flex-end;
                    }
                }

                .css-rep6x4 {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: start;
                    -ms-flex-pack: start;
                    -webkit-justify-content: flex-start;
                    justify-content: flex-start;
                }

                @media screen and (min-width: 480px) {
                    .css-rep6x4 {
                        -webkit-box-pack: start;
                        -ms-flex-pack: start;
                        -webkit-justify-content: flex-start;
                        justify-content: flex-start;
                    }
                }

                @media screen and (min-width: 768px) {
                    .css-rep6x4 {
                        -webkit-box-pack: start;
                        -ms-flex-pack: start;
                        -webkit-justify-content: flex-start;
                        justify-content: flex-start;
                    }
                }

                @media screen and (min-width: 992px) {
                    .css-rep6x4 {
                        -webkit-box-pack: end;
                        -ms-flex-pack: end;
                        -webkit-justify-content: flex-end;
                        justify-content: flex-end;
                    }
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

        footer ul {
            list-style: none;
            color: #0d1619;
        }

        ul li.title p {
            font-weight: 600;
        }

        ul li a {
            color: #0d1619;
            text-decoration: none
        }
.css-1iiv58m {
    max-width: 992px;
    width: calc(100% - (16px * 2));
}
        @media screen and (max-width: 768px) {
            .explore-block .image img {
                height: 230px;
            }.css-1iiv58m { 
    width: 100% ;
    padding: 0 10px;
}

            #banner {
                background-image: url('{{ asset('/images/beyout-banner-mb.jpg') }}');
            }

            footer .col {
                width: 100%;
                flex: auto;
            }
        }

        ._-6pfzC .rtl-icon {
            display: none;
        }

        .FooterLinks_socialIcon__MdMqQ {
            block-size: 20px;
        }

        .FooterLinks_socialIcon__MdMqQ svg {
            transform: rotate(-45deg);
            width: 20px;
        }
        .news-content{
    text-align: justify;
}
.news-content iframe{
    width: 100%;
}
    </style>

</head>

<body>
    <div id="__next">
        <div class="css-j64p7l e15axdxf1">
            <header class="e18e99my1 css-1nl879o ehep9uj0">
                <div class="e18e99my0 css-a14gsd css-1iiv58m e1xmv6f40" >
                    <div class="css-1l7k9wm ehep9uj0">

                        <a href="/" class="e1g407rp0 css-mwwny2 eh0fvrz0">
                            <img style="max-height: 50px;" src="{!! getImageThumb($config_website?->logo) !!}" id="logo"
                                alt="{{ $config_website?->website }}">
                        </a>

                    </div>
                </div>
            </header>

            <div class="css-mkkf9p e15axdxf0">
                <section class="e18e99my1 css-ah6yll ehep9uj0">
                    <div class="e18e99my0 css-a14gsd css-1iiv58m e1xmv6f40">
                        <div class="css-tw4vmx css-1iiv58m e1xmv6f40">
                            <div class="css-jo2aaq elovojj0">
                                <nav>
                                    <ol class="e1n50ka2 css-esfoir e1xmv6f40">
                                        <li class="e1n50ka1 css-1nvsk3n e1xmv6f40"><a href="/"
                                                class="e1n50ka0 css-1bxmhsp eh0fvrz0">Home</a></li>
                                        <li class="e1n50ka1 css-1nvsk3n e1xmv6f40"> <a
                                                href="/venues/hairdressing/melbourne"
                                                class="e1n50ka0 css-1bxmhsp eh0fvrz0">{{ $post->title }}</a>
                                        </li>
                                    </ol>
                                </nav>
                                <h1 class="css-1xy5o1q eh0fvrz0">
                                    <div class="css-1f3l2hr elovojj0">{{ $post->title }}<!-- -->
                                        <div class="css-squ00q eh0fvrz0">{{ $post->description }}</div>
                                    </div>
                                </h1>
                                <div id="collapsible-region_undefined" aria-hidden="false" role="region"
                                    style="overflow:visible;display:block;height:auto" class="css-d75zvh e1xmv6f40">
                                    <div class="css-zkadht e1xmv6f40">

                                        <div class="css-e2vg5q elovojj0">
                                            <div class="css-bjn8wh e1f2m6p01">
                                                <div id="service-category-or-tag-picker-field-group"
                                                    class="e1yxb4jn0 css-173p03h e1xmv6f40">
                                                    <div class="css-p2z5vl elovojj0">
                                                        <div class="css-kjafn5 ehep9uj0"><input type="text"
                                                                id="service-category-or-tag-picker-field-input"
                                                                placeholder="Service or Treatment"
                                                                value="Haircut and Hairdressing" autoComplete="off"
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

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="css-1a43lhx e1xmv6f40">
                            <div transform="translate(400px, -30px)" class="ep2hkag0 css-fhxwc e1xmv6f40"></div>
                            <div transform="translate(560px, -170px)" class="ep2hkag0 css-12og2a1 e1xmv6f40"></div>
                            <div transform="translate(640px, 140px)" class="ep2hkag0 css-1labv9h e1xmv6f40"></div>
                        </div>
                    </div>
                </section>
                <section class="e18e99my1 css-hq14lp ehep9uj0">
                    <div class="e18e99my0 css-a14gsd e1xmv6f40">
                        <div class="css-1pgqhx0 elovojj0">

                            <div class="container css-1iiv58m  flex  ">
                                <div class="w-full lg:w-3/5 xl:w-2/3 xl:pe-20">
                                    <div class="relative">
                                        <div class="nc-SingleContent space-y-10">
                                            <div id="single-entry-content"
                                                class="prose lg:prose-lg !max-w-screen-md mx-auto dark:prose-invert"
                                                data-content-ads-inserted="true">
                                                <div class="news-content">
                                                    {!! $post?->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer id="footer" class="e18e99my1 css-126zv25 ehep9uj0">
                <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                    <div class="css-jo2aaq elovojj0">

                        <div class="FooterLinks_innerContent__8anC0 row">
                            <div class="col col-12 col-lg-2">
                                <a href="/"
                                    class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX"
                                    aria-label="{{ $config_website?->website }}"><img style="max-height: 50px;"
                                        src="{!! getImageThumb($config_website?->logo) !!}" id="logo"
                                        alt="{{ $config_website?->website }}">
                                </a>
                            </div>
                            <div class="col col-12 col-lg-2">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">About Beyout</p>
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
                            <div class="col col-12 col-lg-2">
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
                            <div class="col col-12 col-lg-2">
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
                            <div class="col col-12 col-lg-2">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">Find us on social</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                                target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                        class="_-6pfzC I-8PaC" aria-hidden="true"><span
                                                            class="rtl-icon"><svg fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span><span class="ltr-icon"><svg
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span></span></span>Facebook</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                                target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                        class="_-6pfzC I-8PaC" aria-hidden="true"><span
                                                            class="rtl-icon"><svg fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span><span class="ltr-icon"><svg
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span></span></span>Twitter</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                                target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                        class="_-6pfzC I-8PaC" aria-hidden="true"><span
                                                            class="rtl-icon"><svg fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span><span class="ltr-icon"><svg
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span></span></span>Linkedin</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                                target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                        class="_-6pfzC I-8PaC" aria-hidden="true"><span
                                                            class="rtl-icon"><svg fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span><span class="ltr-icon"><svg
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span></span></span>Instagram</a></p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </footer> 
        </div> 
    </div>
</body>

</html>
