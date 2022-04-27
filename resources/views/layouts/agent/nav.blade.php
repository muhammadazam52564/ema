<nav id="sidebar" class="sticky-top">
    <div class="sidebar-header">
        <h3>Resturant Logo</h3>
    </div>
    <ul class="list-unstyled components">
        <b>Manager Dashboard</b>
        <li class="{{ Request::is('agent/dashboard') ? 'li-active':'' }}">
            <a href="{{ route('agent.dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu</a>
            <ul class="collapse list-unstyled {{ Request::is('agent/categories') || Request::is('agent/add-category') || Request::is('agent/product')  || Request::is('agent/add-product')  ? 'show':'' }}" id="homeSubmenu">
                <li>
                    <a
                        class="{{ Request::is('agent/categories') ? 'li-active':'' }}"
                        href="{{ route('agent.categories') }}">Menu Categories</a>
                </li>
                <li>
                    <a
                        class="{{ Request::is('agent/add-category') ? 'li-active':'' }}"
                        href="{{ route('agent.add-category') }}">Add Categories</a>
                </li>
                <li>
                    <a
                        class="{{ Request::is('agent/product') ? 'li-active':'' }}"
                        href="{{ route('agent.product') }}">Menu Products</a>
                </li>
                <li>
                    <a
                        class="{{ Request::is('agent/add-product') ? 'li-active':'' }}"
                         href="{{ route('agent.add-product') }}">Add Products</a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('agent/orders') ? 'li-active':'' }}">
            <a href="{{ route('agent.orders') }}">Orders</a>
        </li>

        <!-- <li>
            <a href="{{ route('admin.sales') }}">Sales</a>
        </li> -->
        <!-- <li class="{{ Request::is('agent/invoice') ? 'li-active':'' }}">
            <a href="{{ route('admin.invoice') }}">Invoice</a>
        </li> -->

        <li>
            <a href="#customersMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customers</a>
            <ul class="collapse list-unstyled {{ Request::is('agent/customers')  ? 'show':'' }}" id="customersMenu">
                <li>
                    <a
                        class="{{ Request::is('agent/customers') ? 'li-active':'' }}"
                        href="{{ route('agent.customers') }}">Customers List</a>
                </li>
                <!-- <li>
                    <a
                        class="{{ Request::is('agent/customers') ? 'li-active':'' }}"
                        href="{{ route('agent.customers') }}">Customers Review</a>
                </li> -->
            </ul>
        </li>
        <li>
            <a href="#RidersMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Riders</a>
            <ul class="collapse list-unstyled {{ Request::is('agent/riders')  ? 'show':'' }}" id="RidersMenu">
                <li>
                    <a
                        class="{{ Request::is('agent/riders') ? 'li-active':'' }}"
                        href="{{ route('agent.riders') }}">Riders List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#ProfileSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Settings</a>
            <ul class="collapse list-unstyled" id="ProfileSettings">
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="{{ route('agent.change-password') }}">Change Password</a>
                </li>
                <li>
                    <a href="{{ route('agent.change-email') }}">Change Email</a>
                </li>
            </ul>
        </li>
    </ul>
    <div  class="mt-4 pt-4">
    </div>
    <div  class="mt-4 pt-4 d-flex justify-content-center">
        <label id="label" for="logout"  style="cursor: pointer">
            <i class="fa fa-sign-out-alt" ></i>Logout
        </label>
    </div>
    <div  class="mt-4 pt-4">
    </div>
</nav>

<form method="post" action="{{ route('logout')}}" class="d-none">
    @csrf
    <input  type="submit" id="logout">
</form>


