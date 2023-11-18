<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <i class="fas fa-vihara me-3 fa-2x"></i>
        Poll App

        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{route('polls.add')}}">
                <i class="fas fa-plus me-3">
                    <sup>
                        <i class="fa fa-vihara fa-xs"></i>
                    </sup>
                </i> Add Poll
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('polls.view')}}">
                <i class="fas fa-folder-open me-3">
                    <sup>
                        <i class="fas fa-vihara fa-xs"></i>
                    </sup>
                </i> View Polls
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('polls.users')}}">
                <i class="fas fa-tasks me-3">
                   <sup>
                       <i class="fas fa-vihara fa-xs"></i>
                   </sup>
                </i> User Polls
            </a>
        </li>

    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
