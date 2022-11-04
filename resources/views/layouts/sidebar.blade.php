<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('deskapp/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('deskapp/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'home') active @endif">
                        <span class="micon bi bi-house"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'category.index') active @endif">
                        <span class="micon dw dw-share2"></span><span class="mtext">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sub-category.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'sub-category.index') active @endif">
                        <span class="micon bi bi-diagram-3"></span><span class="mtext">Sub-Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'product.index') active @endif">
                        <span class="micon fa fa-cubes"></span><span class="mtext">Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('expense.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'expense.index') active @endif">
                        <span class="micon dw dw-bar-chart-1"></span><span class="mtext">Sales Report</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('expense.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'expense.index') active @endif">
                        <span class="micon ion-arrow-graph-down-right"></span><span class="mtext">Expense</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'customer.index') active @endif">
                        <span class="micon fi-torsos-all"></span><span class="mtext">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('supplier.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'supplier.index') active @endif">
                        <span class="micon bi bi-people-fill"></span><span class="mtext">Supplier</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('employee.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'employee.index') active @endif">
                        <span class="micon ion-person-stalker"></span><span class="mtext">Employee</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('salary.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'salary.index') active @endif">
                        <span class="micon dw dw-wall-clock1"></span><span class="mtext">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('salary.index') }}" class="dropdown-toggle no-arrow @if(Route::currentRouteName() == 'salary.index') active @endif">
                        <span class="micon fi-dollar-bill"></span><span class="mtext">Salary</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>