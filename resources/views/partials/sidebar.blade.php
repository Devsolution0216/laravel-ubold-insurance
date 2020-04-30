@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                @can('users_manage')
                <li>
                    <a href="{{ url('/') }}" class="{{ $request->segment(2) == 'home' ? 'active' : '' }}">
                        <i class="ti-dashboard"></i>
                        <span> @lang('menus.dashboard') </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-users"></i>
                        <span> @lang('menus.customer') </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('customers.create') }}" class="{{ $request->segment(2) == 'customers/add' ? 'active' : '' }}">@lang('menus.add new customer')</a>
                        </li>
                        <li>
                            <a href="{{ route('customers.index') }}">@lang('menus.customer report')</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="/inquiry">
                        <i class="dripicons-question"></i>
                        <span> @lang('menus.payment report') </span>
                    </a>
                </li>
                @endcan
                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-world"></i>
                        <span> @lang('menus.online quotation') </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                        <a href="{{ route('quotations.create') }}">@lang('menus.quotation form')</a>
                        </li>
                        <li>
                            <a href="{{ route('quotations.index') }}">@lang('menus.quotation report')</a>
                        </li>
                    </ul>
                </li>
                @can('users_manage')
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-rocket"></i>
                        <span> @lang('menus.quote parameters') </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('brands.index') }}">@lang('menus.list of brands')</a>
                        </li>
                        <li>
                            <a href="{{ route('models.index') }}">@lang('menus.list of models')</a>
                        </li>
                        <li>
                            <a href="{{ route('insurers.index') }}">@lang('menus.list insurers')</a>
                        </li>
                        <li>
                            <a href="{{ route('tproducts.index') }}">@lang('menus.list type of products')</a>
                        </li>
                        <li>
                            <a href="{{ route('uses.index') }}">@lang('menus.list of type use')</a>
                        </li>
                        <li>
                            <a href="{{ route('statuses.index') }}">@lang('menus.list quotation status')</a>
                        </li>
                        <li>
                            <a href="{{ route('tinsurers.index') }}">@lang('menus.list type of insurers')</a>
                        </li>
                        <li>
                            <a href="{{ route('escenaries.index') }}">@lang('menus.quote escenaries')</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-note"></i>
                        <span> @lang('menus.policies portfolio') </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('policies.create') }}">@lang('menus.add new policies')</a>
                        </li>
                        <li>
                            <a href="{{ route('policies.index') }}">@lang('menus.policies')</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user-plus"></i>
                        <span> @lang('menus.user control') </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.users.index') }}">@lang('menus.users')</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.roles.index') }}">@lang('menus.user roles')</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-settings"></i>
                        <span> @lang('menus.configuration') </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('peoples.index') }}">@lang('menus.type of people')</a>
                        </li>
                        <li>
                            <a href="{{ route('documents.index') }}">@lang('menus.type of documents')</a>
                        </li>
                        <li>
                            <a href="{{ route('professions.index') }}">@lang('menus.type of profession')</a>
                        </li>
                        <li>
                            <a href="{{ route('provinces.index') }}">@lang('menus.list of provinces')</a>
                        </li>
                        <li>
                            <a href="{{ route('subagents.index') }}">@lang('menus.list of sub agents')</a>
                        </li>
                    </ul>
                    @endcan
                </li>
            </ul>
        </div>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
