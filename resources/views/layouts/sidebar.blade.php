<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                @if (Route::has('home'))
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow @if(Route::is('home')) active @endif">
                        <span class="micon bi bi-house"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                @endif
                @if (Route::has('pos'))
                <li>
                    <a href="{{ route('pos') }}" class="dropdown-toggle no-arrow @if(Route::is('pos')) active @endif">
                        <span class="micon dw dw-shopping-cart1"></span><span class="mtext">POS</span>
                    </a>
                </li>
                @endif
                @if (Route::has('brand.index'))
                <li>
                    <a href="{{ route('brand.index') }}" class="dropdown-toggle no-arrow @if(Route::is('brand.*')) active @endif">
                        <span class="micon bi bi-ui-checks-grid"></span><span class="mtext">Brand</span>
                    </a>
                </li>
                @endif
                @if (Route::has('category.index'))
                <li>
                    <a href="{{ route('category.index') }}" class="dropdown-toggle no-arrow @if(Route::is('category.*')) active @endif">
                        <span class="micon dw dw-share2"></span><span class="mtext">Category</span>
                    </a>
                </li>
                @endif
                @if (Route::has('sub-category.index'))
                <li>
                    <a href="{{ route('sub-category.index') }}" class="dropdown-toggle no-arrow @if(Route::is('sub-category.*')) active @endif">
                        <span class="micon bi bi-diagram-3"></span><span class="mtext">Sub-Category</span>
                    </a>
                </li>
                @endif
                @if (Route::has('product.index'))
                <li>
                    <a href="{{ route('product.index') }}" class="dropdown-toggle no-arrow @if(Route::is('product.*')) active @endif">
                        <span class="micon fa fa-cubes"></span><span class="mtext">Product</span>
                    </a>
                </li>
                @endif
                @if (Route::has('report.index'))
                <li>
                    <a href="{{ route('report.index') }}" class="dropdown-toggle no-arrow @if(Route::is('report.*')) active @endif">
                        <span class="micon dw dw-bar-chart-1"></span><span class="mtext">Sales Report</span>
                    </a>
                </li>
                @endif
                @if (Route::has('expense.index'))
                <li>
                    <a href="{{ route('expense.index') }}" class="dropdown-toggle no-arrow @if(Route::is('expense.*')) active @endif">
                        <span class="micon ion-arrow-graph-down-right"></span><span class="mtext">Expense</span>
                    </a>
                </li>
                @endif
                @if (Route::has('customer.index'))
                <li>
                    <a href="{{ route('customer.index') }}" class="dropdown-toggle no-arrow @if(Route::is('customer.*')) active @endif">
                        <span class="micon fi-torsos-all"></span><span class="mtext">Customer</span>
                    </a>
                </li>
                @endif
                @if (Route::has('supplier.index'))
                <li>
                    <a href="{{ route('supplier.index') }}" class="dropdown-toggle no-arrow @if(Route::is('supplier.*')) active @endif">
                        <span class="micon bi bi-people-fill"></span><span class="mtext">Supplier</span>
                    </a>
                </li>
                @endif
                @if (Route::has('employee.index'))
                <li>
                    <a href="{{ route('employee.index') }}" class="dropdown-toggle no-arrow @if(Route::is('employee.*')) active @endif">
                        <span class="micon ion-person-stalker"></span><span class="mtext">Employee</span>
                    </a>
                </li>
                @endif
                @if (Route::has('attendance.index'))
                <li>
                    <a href="{{ route('attendance.index') }}" class="dropdown-toggle no-arrow @if(Route::is('attendance.*')) active @endif">
                        <span class="micon dw dw-time-management"></span><span class="mtext">Attendance</span>
                    </a>
                </li>
                @endif
                @if (Route::has('salary.index'))
                <li>
                    <a href="{{ route('salary.index') }}" class="dropdown-toggle no-arrow @if(Route::is('salary.*')) active @endif">
                        <span class="micon dw dw-money-2"></span><span class="mtext">Salary</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin'))
                <li><div class="dropdown-divider"></div></li>
                <li class="dropdown @if(Route::is('setting.*')) show @endif">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
                    </a>
                    <ul class="submenu">
                        @if (Route::has('setting.role.index'))
                        <li><a href="{{ route('setting.role.index') }}" class="@if(Route::is('setting.role.*')) active @endif">Roles</a></li>
                        @endif
                        @if (Route::has('setting.permission.index'))
                        <li><a href="{{ route('setting.permission.index') }}" class="@if(Route::is('setting.permission.*')) active @endif">Permissions</a></li>
                        @endif
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>