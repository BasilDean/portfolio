<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="cleartype" content="on">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="https://dandelions.website/">
    <meta name="copyright" content="https://dandelions.website/">
    <title>{{ __('messages.welcome') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/css/styles.css')
</head>

<body>
<noscript class="noscript">Чтобы посмотреть сайт включите JavaScript на&nbsp;своём устройстве.</noscript>
<header class="siteHeader">
    <div class="siteHeader__wrapper">
        <a class="siteHeader__logo" href="/build">
            <svg></svg>
            <span>DANDELION</span>
        </a>
        <div class="siteHeader__navigation" id="mobileMenu">
            <nav>
                @php
                    $mainPublicMenus = \App\Models\Menu::where('type', 'public')->where('group', 'main-menu')->get();
                @endphp
                <ul>
                    @foreach ($mainPublicMenus as $menu)

                        <li><a href="{{ $menu->url }}">{{ $menu->translated_name }}</a></li>
                    @endforeach

                    @auth
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @endauth
                    <ul>
                        <li><a href="{{ route('lang.switch', 'en') }}">En</a></li>
                        <li><a href="{{ route('lang.switch', 'ru') }}">Ру</a></li>
                    </ul>
                </ul>
            </nav>
        </div>
        <div class="siteHeader__burger">
            <a class="hamburger hamburger--spin-r" href="#">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </a>
        </div>
    </div>
</header>
