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
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-share2"></span><span class="mtext">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-cubes"></span><span class="mtext">Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fi-torsos-all"></span><span class="mtext">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('supplier.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-people-fill"></span><span class="mtext">Supplier</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('employee.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon ion-person-stalker"></span><span class="mtext">Employee</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('salary.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fi-dollar-bill"></span><span class="mtext">Salary</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('expense.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-graph-down-arrow"></span><span class="mtext">Expense</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>