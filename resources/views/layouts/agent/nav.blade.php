<nav id="sidebar" class="sticky-top">
    <div class="sidebar-header">
        <h3>Resturant Logo</h3>

    </div>
    <ul class="list-unstyled components">
        <p>Manager Dashboard</p>
        <li class="{{ Request::is('agent/dashboard') ? 'li-active':'' }}">
            <a href="{{ route('agent.dashboard') }}">Dashboard</a>
        </li>
        <li class="{{ Request::is('agent/categories') || Request::is('agent/add-category') || Request::is('agent/product/*') || Request::is('agent/add-products/*') ? 'li-active':'' }}">
            <a href="{{ route('agent.categories') }}">Menu</a>
        </li>

        <li class="{{ Request::is('agent/orders') ? 'li-active':'' }}">
            <a href="{{ route('agent.orders') }}">Orders</a>
        </li>
        <li>
            <a href="{{ route('agent.promo') }}">Promo</a>
        </li>

        <!-- <li>
            <a href="{{ route('agent.invoice') }}">Invoice</a>
        </li> -->

        <li>
            <a href="#customersMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customers</a>
            <ul class="collapse list-unstyled {{ Request::is('agent/customers')  ? 'show':'' }}" id="customersMenu">
                <li>
                    <a
                        href="{{ route('agent.customers') }}"
                        class="{{ Request::is('agent/customers') ? 'li-active':'' }}"
                    >
                        Customers List
                    </a>
                </li>
                <!-- <li>
                    <a href="{{ route('admin.customers') }}">Customers Review</a>
                </li> -->
            </ul>
        </li>
        <!-- <li>
            <a href="#managerMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Managers</a>
            <ul class="collapse list-unstyled {{ Request::is('admin/managers') || Request::is('admin/add-manager') ? 'show':'' }}" id="managerMenu">
                <li>
                    <a
                        class="{{ Request::is('admin/managers') ? 'li-active':'' }}"
                        href="{{ route('admin.managers') }}">Managers List</a>
                </li>
                <li>
                    <a
                        class="{{ Request::is('admin/add-manager') ? 'li-active':'' }}"
                        href="{{ route('admin.add-manager') }}">Add New Manager</a>
                </li>
            </ul>
        </li> -->

        <li>
            <a href="#RidersMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Riders</a>
            <ul class="collapse list-unstyled {{ Request::is('agent/riders') ? 'show':'' }}" id="RidersMenu">
                <li>
                    <a
                        href="{{ route('agent.riders') }}"
                        class="{{ Request::is('agent/riders') ? 'li-active':'' }}"
                    >
                        Riders List
                    </a>
                </li>
                <!-- <li>
                    <a href="{{ route('admin.riders') }}">Add New Rider</a>
                </li> -->
            </ul>
        </li>
        <li>
            <a href="#ProfileSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile Settings</a>
            <ul class="collapse list-unstyled {{ Request::is('admin/change-email') || Request::is('admin/change-password')  ? 'show':'' }}"  id="ProfileSettings">
                <li>
                    <a
                        class="{{ Request::is('agent/change-password') ? 'li-active':'' }}"
                        href="{{ route('agent.change-password') }}">Change Password</a>
                </li>
                <li>
                    <a
                        class="{{ Request::is('agent/change-email') ? 'li-active':'' }}"
                        href="{{ route('agent.change-email') }}">Change Email</a>
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


