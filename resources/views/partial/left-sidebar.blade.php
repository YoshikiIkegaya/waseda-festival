<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="javascript:void(0);" class="site_title align-center">
                <span>{{ trans('common.navigator.system-name') }}</span>
            </a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ asset('images/tmp/avatar.jpg' )}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <div class="clearfix"></div>
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{ trans('common.navigator.dashboard') }}</h3>
                <ul class="nav side-menu">
                @if (Auth::user()->isAdmin())
                    <li>
                        {!! gen_link_action_glyphicon(
                            'Admin\UserController@index', [],
                            'fa fa-user',
                            '',
                            trans('admin.user.attributes.user_manage')
                        ) !!}
                    </li>
                    <li>
                        {!! gen_link_action_glyphicon(
                            'Admin\ClientController@index', [],
                            'fa fa-sitemap',
                            '',
                            trans('admin.client.attributes.client_manage')
                        ) !!}
                    </li>
                    <li>
                        {!! gen_link_action_glyphicon(
                            'Admin\RepairerController@index', [],
                            'fa fa-cog',
                            '',
                            trans('admin.repairer-collector.title.list')
                        ) !!}
                    </li>
                    <li>
                        {!! gen_link_action_glyphicon(
                            'Admin\AnkenController@index', [],
                            'fa fa-clipboard',
                            '',
                            trans('admin.anken.attributes.list')
                        ) !!}
                    </li>
                @endif
                @if (auth()->user()->isOperator())
                    <li>
                        {!! gen_link_action_glyphicon(
                            'Operator\AnkenController@index', [],
                            'fa fa-clipboard',
                            '',
                            trans('admin.anken.attributes.list')
                        ) !!}
                    </li>

                     <li>
                         <a>
                             <i class="fa fa-sitemap"></i>{{ trans('admin.operator.collect') }}
                             <span class="fa fa-chevron-down"></span>
                         </a>
                        <ul class="nav child_menu">
                            @foreach(get_collector_selector(false) as $id => $name)
                                <li>
                                    {!! gen_link_action_glyphicon(
                                        'Operator\CollectorController@show',
                                        $id,
                                        '',
                                        '',
                                        $name
                                    ) !!}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                @if (auth()->user()->isRepairer())
                    <li>
                        {!! gen_link_action_glyphicon(
                            'Repairer\ItemController@index', [],
                            'fa fa-clipboard',
                            '',
                            trans('item.list_item')
                        ) !!}
                    </li>
                @endif
                </ul>
            </div>
        </div>
    <!-- /sidebar menu -->
    </div>
</div>
