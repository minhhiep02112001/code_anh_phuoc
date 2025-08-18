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
            font-family: 'Nunito', sans-serif;
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

            text-decoration: underline dotted;
        }

        b,
        strong {
            font-weight: bolder;
        }

        code,
        kbd,
        samp {
            font-family: monospace, monospace;
            font-size: 1em;
        }

        small {
            font-size: 80%;
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        img {
            border-style: none;
        }

        button,
        input,
        optgroup,
        select,
        textarea {

            font-family: 'Nunito',
                sans-serif;
            ;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
        }

        button,
        input {
            overflow: visible;
        }

        button,
        select {
            text-transform: none;
        }

        button,
        [type='button'],
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

            padding: 0.35em 0.75em 0.625em;
        }

        legend {
            box-sizing: border-box;
            color: inherit;
            display: table;
            max-width: 100%;
            padding: 0;
            white-space: normal;
        }

        progress {
            vertical-align: baseline;
        }

        textarea {
            overflow: auto;
        }

        [type='checkbox'],
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



        :root {
            --bookwell-error-hue: 4;
            --bookwell-error-saturation: 90%;
            --bookwell-error-lightness: 58%;
            --bookwell-line-height: 1.3;
        }

        html {
            box-sizing: border-box;
            height: 100%;
            font-family: 'Nunito', sans-serif;
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
            font-size: 30px;
            font-weight: 700;
            margin: 0;
            text-align: left;
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
            font-size: 30px;
            font-weight: 700;
            text-align: left;
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
            font-family: 'Nunito', sans-serif;
            font-size: 16px;
            font-weight: 700;
            text-align: left;
        }

        .css-3usq65 {
            list-style: none;
            padding: 0;
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
            font-size: 26px;
            font-weight: 700;
            text-align: left;
        }

        .css-squ00q {
            margin: 0;
            color: hsl(0, 0%, 13%);
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
            font-size: 26px;
            font-weight: 400;
            text-transform: inherit;
        }

        .css-1o52x4a {
            margin: 0;
            color: hsl(0, 0%, 13%);
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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
            font-family: 'Nunito', sans-serif;
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

            background-repeat: no-repeat;
            background-size: cover;
            /* tùy chọn */
            background-position: center;
            /* tùy chọn */
        }

        h4.title-brand {
            font-size: 18px;
            font-weight: 600;
        }

        h4.title-brand a {
            text-decoration: none;
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

        .menu-toggle {
            float: right;
            font-size: 13px;
            line-height: 1.2;
            display: none;
            text-transform: uppercase;
            font-weight: 700;
            color: rgb(52, 52, 52);
            -webkit-text-fill-color: rgb(52, 52, 52);
            letter-spacing: 0.05em;
            background: transparent;
            text-decoration: none;
            transition: 0.2s;
            border-width: 2px;
            border-style: solid;
            border-color: rgb(52, 52, 52);
            padding: 5px 10px;
        }

        .menu-toggle:hover {
            background: #d6dee6 !important;
        }

        @media screen and (max-width: 768px) {
            .explore-block .image img {
                height: 230px;
            }

            .menu-toggle {
                display: inline-block;
            }

            #banner {
                margin-top: 80px;

            }

            footer .col {
                width: 100%;
                flex: auto;
            }

            header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 9999;
                background: #fff;
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

        .inner-box h4 {
            color: #fff;
        }
    </style>
</head>

<body>
    <h1 style="display: none;"> {{ $config_seo->meta_title ?? '' }}</h1>
    <div id="__next">
        <div class="css-j64p7l e15axdxf1">
            <header class="e18e99my1 css-1nl879o ehep9uj0">
                <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                    <div class="css-1l7k9wm ehep9uj0">
                        <a href="/" class="e1g407rp0 css-mwwny2 eh0fvrz0">
                            <img style="max-height: 50px;" src="{!! getImageThumb($config_website?->logo) !!}" id="logo"
                                alt="{{ $config_website?->website }}">
                        </a>
                        <button class="menu-toggle"> Menu</span></button>
                    </div>
                </div>
            </header>

            <div class="css-mkkf9p e15axdxf0">

                <section class="e18e99my1 css-1i7dxix ehep9uj0" id="banner">
                    @if (!empty($banners))
                        @foreach ($banners as $k => $banner)
                            <div class="e18e99my0 css-1iiv58m e1xmv6f40 ">
                                <div class="css-w8wg2g elovojj0">
                                    <div class="css-tvdhho eh0fvrz0">
                                        <div>Explore<span class="css-1tzeee1 e1xmv6f40">.</span></div>
                                        <div>Book<span class="css-1tzeee1 e1xmv6f40">.</span></div>
                                        <div>Unwind<span class="css-1tzeee1 e1xmv6f40">.</span></div>
                                    </div>
                                    <h2 class="css-1y5e797 eh0fvrz0">Quick reservations for beauty, haircuts, and
                                        relaxation services.</h2>
                                </div>
                            </div>
                            <style>
                                #banner {
                                    background: url('{{ convertPathImage($banner->thumbnail) }}')
                                }

                                @media screen and (max-width: 768px) {
                                    #banner {
                                        background: url('{{ convertPathImage($banner->thumbnail_mobile) }}')
                                    }
                                }
                            </style>
                        @endforeach
                    @endif
                </section>


                <section class="e18e99my1 css-1wcjc1k ehep9uj0">
                    <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                        <div class="css-d65tcr e1xmv6f40">
                            <div transform="translate(0, -50%)" class="css-1a7f7p e1xmv6f40">
                                <div class="css-zkadht e1xmv6f40">

                                    <div class="css-e2vg5q elovojj0">
                                        <div class="css-bjn8wh e1f2m6p01">
                                            <div id="service-category-or-tag-picker-field-group"
                                                class="e1yxb4jn0 css-173p03h e1xmv6f40">
                                                <div class="css-p2z5vl elovojj0">
                                                    <div class="css-kjafn5 ehep9uj0"><input type="text"
                                                            id="service-category-or-tag-picker-field-input"
                                                            placeholder="Service or Treatment" value=""
                                                            autoComplete="off" class="exhzwka0 css-ve357d ehep9uj0" />
                                                    </div>
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
                                                            autoComplete="off" class="exhzwka0 css-ve357d ehep9uj0" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div><button class="disabled e46r4ae0 css-fn2um eqqze3d0" disabled=""
                                            type="submit">Search<!-- --> </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="e18e99my1 css-1ryz6ze ehep9uj0">
                    <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                        <div class="css-1yz0o3j elovojj0">
                            <div class="css-n7e2yo elovojj0">
                                <div class="css-qh9ukh elovojj0">
                                    <img style="max-height: 50px;" src="{!! asset('images/discover.png') !!}">
                                    <div class="css-1g1q0hs eh0fvrz0"><strong
                                            class="ejmi5p50 css-19v4aip eh0fvrz0">Explore</strong></div>
                                </div>
                                <div class="css-1o52x4a eh0fvrz0">
                                    <h3>Find the top beauty & wellness spots near you.</h3>
                                </div>
                            </div>
                            <div class="css-bk7e3w e1xmv6f40">
                                <div class="css-n7e2yo elovojj0">
                                    <div class="css-qh9ukh elovojj0">
                                        <img style="max-height: 50px;" src="{!! asset('images/reserve.png') !!}">
                                        <div class="css-1g1q0hs eh0fvrz0"><strong
                                                class="ejmi5p50 css-19v4aip eh0fvrz0">Book</strong></div>
                                    </div>
                                    <div class="css-1o52x4a eh0fvrz0">
                                        <h3>Make your reservation easily, wherever you are.</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="css-n7e2yo elovojj0">
                                <div class="css-qh9ukh elovojj0"> <img style="max-height: 50px;"
                                        src="{!! asset('images/relax.png') !!}">
                                    <div class="css-1g1q0hs eh0fvrz0"><strong
                                            class="ejmi5p50 css-19v4aip eh0fvrz0">Unwind</strong></div>
                                </div>
                                <div class="css-1o52x4a eh0fvrz0">
                                    <h3>Sit back and relax, we’ve got everything covered for
                                        you.</h3>
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
                                                    <h4>{{ $item->title }}</h4><a href="#"
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
                                                    <h4 class="title-brand"><a
                                                            href="{{ route('post', ['slug' => $item->slug]) }}"
                                                            title="{{ $item->title }}">{{ $item->title }}</a>
                                                    </h4>
                                                    @if ($item->category)
                                                        <div class="text" style="font-size:14px;margin-bottom:5px;">
                                                            <i class="fa fa-tag" aria-hidden="true"></i>
                                                            {{ $item->category?->title }}
                                                        </div>
                                                    @endif


                                                    @if ($item->phone)
                                                        <div class="text" style="font-size:14px;margin-bottom:5px;">
                                                            <i class="fa fa-phone"></i> {{ $item->phone }}
                                                        </div>
                                                    @endif


                                                    <div class="text" style="font-size:13px;">
                                                        <i class="fa fa-map-marker"></i>
                                                        {{ replaceAddress($item->address) }}
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
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold"> About
                                            {{ $config_website->website ?? '' }}</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                                href="{{ route('page', ['about-us']) }}"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                title="About Us" data-qa="footer-careers" id="footer-careers"
                                                target="_blank">About Us</a>
                                        </p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                                href="{{ route('page', ['contact-us']) }}"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-customer-support" id="footer-customer-support"
                                                title="Contact Us " target="_blank">Contact Us</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-blog" id="footer-blog" target="_self">Blog</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="/sitemap.xml"
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
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                                href="{{ route('page', ['terms-of-use']) }}"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-privacy-policy" id="footer-privacy-policy"
                                                target="_blank">Terms of Use </a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                                href="{{ route('page', ['privacy-policy']) }}"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-service-terms" id="footer-service-terms"
                                                target="_blank">Privacy Policy</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                                href="{{ route('page', ['terms-of-service']) }}"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-service-terms" id="footer-service-terms"
                                                target="_blank">Terms of
                                                service</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                                href="{{ route('page', ['faq']) }}"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-use-terms" id="footer-use-terms"
                                                target="_blank">FAQ</a></p>
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
        <div class=" css-1sg0k8w esj4ej70"></div>
    </div>

    <div id="menu_mb">
        <ul class="menu">
            <li class="menu_mb__close">X</li>
            @foreach ($menus_header as $menu)
                <li class="menu__item is-leaf first leaf menu-mlid-18681">
                    <a href="{{ $menu->link }}" title="{{ $menu->title }}"
                        class="menu__link">{{ $menu->title }}
                    </a>
                </li>
            @endforeach
        </ul>
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

        #menu_mb {
            display: none ;
            position: fixed;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 1000000;
            background: #333;
            right: 0px;
        }

        #menu_mb {
            position: fixed;

            z-index: 10000;
            pointer-events: none;
            /* ẩn thì không bắt sự kiện */
        }

        /* overlay mờ */
        #menu_mb::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            opacity: 0;
            transition: opacity .28s ease;
        }

        /* panel menu (chính là ul.menu hiện có) */
        #menu_mb .menu {
            position: relative;

            width: 100%;
            height: 100%;
            /* hoặc 85vw nếu muốn linh hoạt */

            padding-top: 40px;
            list-style: none;
            overflow-y: auto;
            background: #2c2e33;
        }

        /* khi mở */
        #menu_mb.show {
            pointer-events: auto;
        }

        #menu_mb.show::before {
            opacity: 1;
        }

        #menu_mb.show .menu {
            transform: translateX(0);
        }

        /* ========= Item & Link ========= */
        #menu_mb .menu__item {
            margin: 0;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        #menu_mb .menu__item:last-child {
            border-bottom: 0;
        }

        #menu_mb .menu__link {
            display: block;
            padding: 14px 16px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            line-height: 1.2;
        }

        #menu_mb .menu__link:hover {
            background: #b794940f;
        }

        /* trạng thái active */
        #menu_mb .menu__item.active>.menu__link,
        #menu_mb .is-active>.menu__link {
            color: #ffd166;
        }

        /* ========= Submenu (nếu có ul.menu lồng nhau) ========= */
        #menu_mb .menu .menu {
            position: static;
            width: auto;
            max-height: 0;
            overflow: hidden;
            margin: 0;
            background: #23252a;
            border-left: 3px solid rgba(255, 255, 255, .06);
            transition: max-height .25s ease;
        }

        #menu_mb .menu__item.open>.menu {
            max-height: 600px;
        }

        /* hoặc giá trị lớn hơn */

        /* ========= Nút đóng (nếu bạn thêm .menu_mb__close trong #menu_mb) ========= */
        #menu_mb .menu_mb__close {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2c2e33;
            color: #fff;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .3);
            cursor: pointer;
        }

        @media (max-width: 760px) {
            #menu_mb.show {
                display: block !important;
            }

            #menu_mb.hide {
                display: none !important;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#open_menu, button.eqqze3d0").click(function() {
                $("#main-menu").toggleClass('css-1hd6k1h')

            })
        });
    </script>
    <script>
        (() => {
            const root = document.getElementById('menu_mb');
            const panel = root.querySelector('.menu');
            const btn = root.querySelector('.menu_mb__close');
            const btn_open = document.querySelector('.menu-toggle');
            const body = document.querySelector('body');

            const open = () => {
                root.classList.add('show');
                document.documentElement.classList.add('mb-lock');
            };
            const close = () => {
                root.classList.remove('show');
                document.documentElement.classList.remove('mb-lock');
            };

            // Nút X
            btn && btn.addEventListener('click', (e) => {
                e.preventDefault();
                close();
            });

            btn_open.addEventListener('click', (e) => {
                e.preventDefault();
                open();
            });



            // Click ra ngoài panel (overlay) => đóng
            root.addEventListener('click', (e) => {
                if (!panel.contains(e.target)) close();
            });
            // Chặn sự kiện nổi bọt khi click trong panel
            panel.addEventListener('click', (e) => e.stopPropagation());

            // Phím ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && root.classList.contains('show')) close();
            });


            // Expose để mở/toggle từ icon hamburger
            window.menuMb = {
                open,
                close,
                toggle: () => root.classList.toggle('show')
            };
        })();
    </script>
</body>

</html>
