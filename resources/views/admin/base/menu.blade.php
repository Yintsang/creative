<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home.detail') }}" data-section="home">
                    <i class="nav-icon icon-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-title">Pages</li>
            @foreach ($config['menus'] as $menu)
                @if(count($menu['sections']) > 1)
                    @if(auth()->user()->hasPermissionIn(array_keys($menu['sections'])))
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="javascript:void(0);">
                            <i class="nav-icon icon-puzzle"></i>
                            <span>{{ $menu['name'] }}</span>
                        </a>
                        <ul class="nav-dropdown-items">
                            @foreach ($menu['sections'] as $section => $sectionName) 
                                @if(auth()->user()->hasPermission($section))
                                    @if(is_string($sectionName))
                                        <li class="nav-item">
                                            <a class="nav-link" data-section="{{ $section }}" href="{{ route('admin.' . $section . '.listing') }}">
                                                <i class="nav-icon icon-pencil"></i>
                                                <span>{{ $sectionName }}</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" data-section="{{ $section }}" href="{{ $sectionName['url'] }}">
                                                <i class="nav-icon icon-pencil"></i>
                                                <span>{{ $sectionName['title'] }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @endif
                @else
                    @foreach ($menu['sections'] as $section => $sectionName) 
                        @if(auth()->user()->hasPermission($section))
                            @if(is_string($sectionName))
                                <li class="nav-item">
                                    <a class="nav-link" data-section="{{ $section }}" href="{{ route('admin.' . $section . '.listing') }}">
                                        <i class="nav-icon icon-pencil"></i>
                                        <span>{{ $sectionName }}</span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" data-section="{{ $section }}" href="{{ $sectionName['url'] }}">
                                        <i class="nav-icon icon-pencil"></i>
                                        <span>{{ $sectionName['title'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach
            <li class="nav-title">Base</li>
            @if(auth()->user()->hasPermission('media_library'))
            <li class="nav-item">
                <a class="nav-link" data-section="media_library" href="{{ route('admin.media_library.index') }}">
                    <i class="nav-icon icon-picture"></i>
                    <span>Media Library</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('translation') && active_langs()->count() > 1)
            <li class="nav-item">
                <a class="nav-link" data-section="translation" href="{{ route('admin.translation.listing') }}">
                    <i class="nav-icon fa fa-language"></i>
                    <span>Translation</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('user'))
            <li class="nav-item">
                <a class="nav-link" data-section="user" href="{{ route('admin.user.listing') }}">
                    <i class="nav-icon icon-user"></i>
                    <span>User</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('role'))
            <li class="nav-item">
                <a class="nav-link" data-section="role" href="{{ route('admin.role.listing') }}">
                    <i class="nav-icon icon-people"></i>
                    <span>Role</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('system_setting'))
            <li class="nav-item">
                <a class="nav-link" data-section="system_setting" href="{{ route('admin.system_setting.listing') }}">
                    <i class="nav-icon icon-settings"></i>
                    <span>System Setting</span>
                </a>
            </li>
            @endif

        </ul>
    </nav>
</div>