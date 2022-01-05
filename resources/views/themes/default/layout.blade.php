<!DOCTYPE html>
<html lang="en" data-theme="system">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEVERDEV</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="index.html">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="{{ asset('assets/theme/assets/css/screen.mineef9.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/theme/assets/css/customize.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
        if(typeof(Storage) !== 'undefined') {
        let themeMode = document.documentElement.getAttribute('data-theme');
        if (themeMode !== null && themeMode === 'system') {
            setSysPrefColor();
        }
        const theme = localStorage.getItem('selected-theme');
        if (theme == 'light') {
            setColorScheme('light');
        }
        else if (theme == 'dark') {
            setColorScheme('dark');
        }
    }
    function setSysPrefColor() {
        if(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches){
            setColorScheme('dark');
        }
        window.matchMedia('(prefers-color-scheme: dark)').addListener(e => {
            if (e.matches) {
                setColorScheme('dark');
            } else {
                setColorScheme('light');
            }
        });
    }
    function setColorScheme(scheme) {
        if (scheme=='dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        } else {
            document.documentElement.removeAttribute('data-theme');
        }
    }
    </script>
    <meta name="description"
        content="Inros is a modern classic blog theme for Ghost. Use this theme for company blog, magazine, niche or personal blog." />
    <link rel="canonical" href="index.html" />
    <meta name="referrer" content="no-referrer-when-downgrade" />
    <link rel="next" href="#" />
    <link rel="shortcut icon" href="{{ asset('assets/theme/images/logo/neverdev_logo.png') }}">
    <meta property="og:site_name" content="Inros" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Inros" />
    <meta property="og:description"
        content="Inros is a modern classic blog theme for Ghost. Use this theme for company blog, magazine, niche or personal blog." />
    <meta property="og:url" content="https://inros.gbjsolution.com/" />
    <meta property="og:image"
        content="https://inros.gbjsolution.com/content/images/2021/09/fakurian-design-jyYAQaUDjzI-unsplash.jpg" />
    <meta property="article:publisher" content="https://www.facebook.com/gbjsolution" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Inros" />
    <meta name="twitter:description"
        content="Inros is a modern classic blog theme for Ghost. Use this theme for company blog, magazine, niche or personal blog." />
    <meta name="twitter:url" content="https://inros.gbjsolution.com/" />
    <meta name="twitter:image"
        content="https://inros.gbjsolution.com/content/images/2021/09/fakurian-design-jyYAQaUDjzI-unsplash.jpg" />
    <meta name="twitter:site" content="@gbjsolution" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1152" />

    <script type="application/ld+json">
        {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "publisher": {
        "@type": "Organization",
        "name": "Inros",
        "url": "https://inros.gbjsolution.com/",
        "logo": {
            "@type": "ImageObject",
            "url": "https://inros.gbjsolution.com/content/images/2021/09/light-theme-logo.svg"
        }
    },
    "url": "https://inros.gbjsolution.com/",
    "image": {
        "@type": "ImageObject",
        "url": "https://inros.gbjsolution.com/content/images/2021/09/fakurian-design-jyYAQaUDjzI-unsplash.jpg",
        "width": 1920,
        "height": 1152
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://inros.gbjsolution.com/"
    },
    "description": "Inros is a modern classic blog theme for Ghost. Use this theme for company blog, magazine, niche or personal blog."
}
    </script>

    <meta name="generator" content="Ghost 4.32" />
    <link rel="alternate" type="application/rss+xml" title="Inros" href="rss/index.html" />
    <style id="gh-members-styles">
        .gh-post-upgrade-cta-content,
        .gh-post-upgrade-cta {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-align: center;
            width: 100%;
            color: #ffffff;
            font-size: 16px;
        }

        .gh-post-upgrade-cta-content {
            border-radius: 8px;
            padding: 40px 4vw;
        }

        .gh-post-upgrade-cta h2 {
            color: #ffffff;
            font-size: 28px;
            letter-spacing: -0.2px;
            margin: 0;
            padding: 0;
        }

        .gh-post-upgrade-cta p {
            margin: 20px 0 0;
            padding: 0;
        }

        .gh-post-upgrade-cta small {
            font-size: 16px;
            letter-spacing: -0.2px;
        }

        .gh-post-upgrade-cta a {
            color: #ffffff;
            cursor: pointer;
            font-weight: 500;
            box-shadow: none;
            text-decoration: underline;
        }

        .gh-post-upgrade-cta a:hover {
            color: #ffffff;
            opacity: 0.8;
            box-shadow: none;
            text-decoration: underline;
        }

        .gh-post-upgrade-cta a.gh-btn {
            display: block;
            background: #ffffff;
            text-decoration: none;
            margin: 28px 0 0;
            padding: 8px 18px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
        }

        .gh-post-upgrade-cta a.gh-btn:hover {
            opacity: 0.92;
        }
    </style>
    <script async src="https://js.stripe.com/v3/"></script>
    <script defer src="{{ asset('assets/theme/assets/js/cards.mineef9.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme/assets/css/cards.mineef9.css') }}">
    <script>
        var apiKey = "718cb58ce71628d126403af9e4";
    </script>
    <!--hide ad -->
    <style>
        iframe[sandbox] {
            display: none;
        }
    </style>
    <style>
        :root {
            --ghost-accent-color: #0066FF;
        }
    </style>
    @stack('styles')
</head>

<body class="home-template" data-nav="sticky-hide">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="global-icons"
        style="display:none">
        <symbol id="i-search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M19.083 17.196l4.526 4.528A1.332 1.332 0 0122.667 24a1.33 1.33 0 01-.943-.39l-4.528-4.527a10.602 10.602 0 01-6.53 2.25C4.787 21.333 0 16.548 0 10.667 0 4.785 4.785 0 10.667 0c5.881 0 10.666 4.785 10.666 10.667 0 2.461-.846 4.724-2.25 6.529zm-8.416-14.53c-4.412 0-8 3.589-8 8 0 4.413 3.588 8 8 8s8-3.587 8-8c0-4.411-3.588-8-8-8z" />
        </symbol>
        <symbol id="i-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M9.036 7.976a.75.75 0 00-1.06 1.06L10.939 12l-2.963 2.963a.75.75 0 101.06 1.06L12 13.06l2.963 2.964a.75.75 0 001.061-1.06L13.061 12l2.963-2.964a.75.75 0 10-1.06-1.06L12 10.939 9.036 7.976z">
            </path>
            <path fill-rule="evenodd"
                d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z">
            </path>
        </symbol>
        <symbol id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="person">
                    <rect opacity="0" />
                    <path d="M12 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z" />
                    <path d="M18 21a1 1 0 0 0 1-1 7 7 0 0 0-14 0 1 1 0 0 0 1 1z" />
                </g>
            </g>
        </symbol>
        <symbol id="i-moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M12.228 23.999l.114.001a12.31 12.31 0 008.762-3.624 12.269 12.269 0 002.803-4.315 1.2 1.2 0 00-1.531-1.557c-3.678 1.339-7.836.426-10.593-2.326a10.078 10.078 0 01-2.33-10.564A1.2 1.2 0 007.899.08a12.271 12.271 0 00-4.792 3.292c-4.24 4.722-4.103 12.278.31 16.843A12.311 12.311 0 0012.227 24zM4.892 4.975a9.882 9.882 0 011.65-1.474c-.475 3.772.797 7.633 3.544 10.376 2.75 2.743 6.62 4.008 10.394 3.538-.32.448-.678.87-1.071 1.262A9.932 9.932 0 0112.34 21.6l-.092-.001a9.928 9.928 0 01-7.109-3.053C1.585 14.868 1.473 8.78 4.892 4.975z" />
        </symbol>
        <symbol id="i-sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M10.8 1.2v2.4a1.2 1.2 0 102.4 0V1.2a1.2 1.2 0 10-2.4 0zM18.876 7.028a1.195 1.195 0 01-1.697-.03 1.2 1.2 0 01.029-1.696l1.727-1.668a1.202 1.202 0 011.668 1.728l-1.727 1.666zM12 16.8c2.647 0 4.8-2.153 4.8-4.8S14.647 7.2 12 7.2A4.805 4.805 0 007.2 12c0 2.647 2.153 4.8 4.8 4.8zM5.124 16.972l-1.727 1.666a1.2 1.2 0 001.668 1.728l1.727-1.668a1.2 1.2 0 00-1.668-1.726zM17.18 17.002c.46-.477 1.22-.49 1.696-.03l1.727 1.666a1.2 1.2 0 01-1.668 1.728l-1.727-1.668a1.2 1.2 0 01-.029-1.696zM12 19.2a1.2 1.2 0 00-1.2 1.2v2.4a1.2 1.2 0 102.4 0v-2.4a1.2 1.2 0 00-1.2-1.2zM5.065 3.634a1.2 1.2 0 00-1.668 1.728l1.727 1.666a1.195 1.195 0 001.697-.03 1.2 1.2 0 00-.029-1.696L5.065 3.634zM3.6 10.8a1.2 1.2 0 110 2.4H1.2a1.2 1.2 0 110-2.4h2.4zM22.8 10.8h-2.4a1.2 1.2 0 100 2.4h2.4a1.2 1.2 0 100-2.4z" />
        </symbol>
        <symbol id="i-twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
            </path>
        </symbol>
        <symbol id="i-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
        </symbol>
    </svg>
    <div class="site-wrap">
        @include('themes.default.layout.header')
        <div class="main">
            @yield('content')
            <button class="btn btn-lg" id="load-more" style="display: none"></button>
        </div>
        @include('themes.default.sections.email_subs')
        @include('themes.default.layout.footer')
    </div>
    @include('themes.default.sections.search_popup')
    @include('themes.default.sections.notifications')
    @include('themes.default.sections.setting_panel')
    @include('themes.default.layout.scripts')
    @stack('scripts')
</body>
</html>