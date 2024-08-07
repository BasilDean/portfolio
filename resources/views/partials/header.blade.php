<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="cleartype" content="on">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="https://dandelions.website/">
    <meta name="copyright" content="https://dandelions.website/">
    <title>Personal portfolio</title>
    @vite('resources/css/app.css')
</head>

<body>
<noscript class="noscript">Чтобы посмотреть сайт включите JavaScript на&nbsp;своём устройстве.</noscript>
<header class="siteHeader">
    <div class="siteHeader__wrapper">
        <a class="siteHeader__logo" href="/build">
            <svg></svg><span>DANDELION</span>
        </a>
        <div class="siteHeader__navigation" id="mobileMenu">
            <nav>
                <ul>
                    <li><a href="/build">HOME</a>
                    </li>
                    <li><a href="#">ABOUT</a>
                    </li>
                    <li><a href="#">PROJECTS</a>
                    </li>
                    <li><a href="#">BLOG</a>
                    </li>
                    <li><a href="#">CONTACT ME</a>
                    </li>
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
