<header class="site-header">
    <div class="header-inner flex justify-space-between">
        <div class="header-logo flex">
            <a href="{{ route('home') }}" class="logo-img theme-light-logo">
                <img src="{{ asset('assets/theme/images/logo/neverdev_light_logo.png') }}" alt="Neverdev">
            </a>
            <a href="{{ route('home') }}" class="logo-img theme-dark-logo">
                <img src="{{ asset('assets/theme/images/logo/neverdev_dark_logo.png') }}" alt="Neverdev">
            </a>
        </div>

        <input id="mobile-menu-toggle" class="mobile-menu-checkbox" type="checkbox">
        <label for="mobile-menu-toggle" class="mobile-menu-icon" aria-label="menu toggle button">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
            <span class="sr-only">Menu toggle button</span>
        </label>

        <nav class="nav-wrap flex" role="navigation" aria-label="Main navigation">
            <ul class="nav-left no-style-list" role="menu">
                <li class="nav-item" role="menuitem">
                    <a href="{{ route('home') }}" class="nav-link">Blogs</a>
                </li>
                <li class="nav-item" role="menuitem">
                    <a href="{{ route('page.tags') }}" class="nav-link">Tags</a>
                </li>
                
                <li class="nav-item" role="menuitem">
                    <a href="{{ route('page.contact') }}" class="nav-link">Contact</a>
                </li>
                <li class="has-dropdown"><a href="#" class="nav-link more-link language-link">
                @switch(Session::get('language', config('app.locale')))
                   @case('en')
                      <img id="header-lang-img" src="{{ asset('assets/admin/assets/images/flags/us.jpg') }}"
                        alt="English" height="10" class="flag-icon">
                       @break
                   @case('vi')
                        <img src="{{ asset('assets/admin/assets/images/flags/vietnam.png') }}" alt="Vietnamese"
                        class="me-1 flag-icon" height="10">
                       @break
                   @default
               @endswitch
                 <svg class="arrow-down-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M12 18c-.39 0-.78-.132-1.097-.398L.617 9.03a1.713 1.713 0 112.194-2.633l9.208 7.673 9.192-7.397a1.715 1.715 0 012.15 2.671l-10.286 8.277A1.714 1.714 0 0112 18z" />
                        </svg>
                    </a>
                    <ul class="no-style-list dropdown-menu">
                        <li class="nav-item" role="menuitem">
                            <a href="{{ route('change-language', ['en']) }}" class="language-choose">
                                <img id="header-lang-img" src="{{ asset('assets/admin/assets/images/flags/us.jpg') }}"
                                alt="English" height="10" class="flag-icon">
                                <span class="language-name">English</span>
                            </a>
                        </li>
                        <li class="nav-item" role="menuitem">
                            <a href="{{ route('change-language', ['vi']) }}" class="language-choose">
                                <img src="{{ asset('assets/admin/assets/images/flags/vietnam.png') }}" alt="Vietnamese"
                                class="me-1 flag-icon" height="10">
                                <span class="language-name">Vietnamese</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav-right no-style-list" role="menu">
                {{-- <li class="nav-item" role="menuitem">
                    <a class="nav-link" href="signin/index.html">Sign in</a>
                </li> --}}
                <li class="nav-item" role="menuitem">
                    <a class="btn btn-sm" href="{{ route('page.contact') }}">Contact</a>
                </li>
            </ul>
            <div class="icons-wrap">
                <a href="javascript:;" class="nav-icon search-icon flex js-search-button"
                    aria-label="Open search">
                    <svg>
                        <use xlink:href="#i-search" />
                    </svg>
                </a>
                <a href="javascript:;" class="nav-icon theme-icon flex js-toggle-dark-light"
                    aria-label="Toggle theme">
                    <div class="toggle-mode flex">
                        <span class="light"><svg>
                                <use xlink:href="#i-sun" />
                            </svg></span>
                        <span class="dark"><svg>
                                <use xlink:href="#i-moon" />
                            </svg></span>
                    </div>
                </a>
            </div>
        </nav>
    </div>
</header>