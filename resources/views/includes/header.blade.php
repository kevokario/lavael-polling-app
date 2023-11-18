<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            =<svg class="icon icon-lg">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
        </button>

        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link">Polling System</a></li>
        </ul>

        <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                                             aria-haspopup="true" aria-expanded="false">
                   {{Auth::user()->name}}
                     <i class="fa fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
{{--                    <div class="dropdown-header bg-light py-2">--}}
{{--                        <div class="fw-semibold">Settings</div>--}}
{{--                    </div>--}}
{{--                    <a class="dropdown-item" href="{{route('profile.edit')}}">--}}
{{--                        <svg class="icon me-2">--}}
{{--                        </svg> Profile</a>--}}

{{--                    <div class="dropdown-divider"></div>--}}

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
