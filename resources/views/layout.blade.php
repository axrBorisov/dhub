<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dance</title>

    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900"
          rel="stylesheet"/>
    <link href="/css/default.css" rel="stylesheet"/>
    <link href="/css/fonts.css" rel="stylesheet"/>

@yield('head')

<body>

<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><a href="/">SimpleWork</a></h1>
        </div>
        <div id="menu">
            <ul>
                <li class="{{ Request::path() === '/' ? 'current_page_item' : ''}}"><a href="/" accesskey="1" title="">Homepage</a>
                </li>
                <li class="{{ Request::path() === 'clients' ? 'current_page_item' : ''}}"><a href="#" accesskey="2"
                                                                                             title="">Our Clients</a>
                </li>
                <li class="{{ Request::is('about') ? 'current_page_item' : ''}}"><a href="/about" accesskey="3"
                                                                                    title="">About Us</a></li>
                <li class="{{ Request::path() === 'articles' ? 'current_page_item' : ''}}"><a href="/articles"
                                                                                              accesskey="4"
                                                                                              title="">Articles</a></li>
                <li class="{{ Request::path() === 'contact' ? 'current_page_item' : ''}}"><a href="#" accesskey="5"
                                                                                             title="">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>

    @yield('header')

</div>

<div class="flex-center position-ref full-height">
    <div id="wrapper">
        @yield('content')
    </div>
</div>

<div id="copyright" class="container">
    <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by
        <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>

</body>

</html>
