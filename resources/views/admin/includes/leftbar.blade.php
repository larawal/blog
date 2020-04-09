<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">	
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark m-aside-menu--dropdown " data-menu-vertical="true" m-menu-dropdown="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">		
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item {{ Route::current()->getName() == 'dashboard' ? 'm-menu__item--active' : '' }}">
                <a href="{{url('admin/dashboard')}}" class="m-menu__link">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-text">Dashboard</span>
                </a>
            </li>
            <li class="m-menu__item {{ Route::current()->getName() == 'articles' ? 'm-menu__item--active' : '' }}">
                <a href="{{url('admin/articles')}}" class="m-menu__link">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-book"></i>
                    <span class="m-menu__link-text">Articles</span>
                </a>
            </li>
            <li class="m-menu__item {{ Route::current()->getName() == 'categories' ? 'm-menu__item--active' : '' }}">
                <a href="{{url('admin/categories')}}" class="m-menu__link">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-folder-1"></i>
                    <span class="m-menu__link-text">Categories</span>
                </a>
            </li>
            {{--
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-open-box"></i>
                    <span class="m-menu__link-text">Layouts</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__item-here"></span>
                                <span class="m-menu__link-text">Layouts</span>
                            </span>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a  href="builder.html" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">Layout Builder</span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true" m-menu-link-redirect="1">
                            <a  href="builder.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">Boxed Layout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            --}}
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->