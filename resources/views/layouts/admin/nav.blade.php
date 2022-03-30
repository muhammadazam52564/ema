<nav id="sidebar" class="sticky-top">
    <div class="sidebar-header">
        <h3>Resturant Logo</h3>
    </div>
    <ul class="list-unstyled components">
        <p>Admin Dashboard</p>
        <li>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{ route('admin.categories') }}">Menu Categories</a>
                </li>
                <li>
                    <a href="{{ route('admin.add-category') }}">Add Categories</a>
                </li>
                <li>
                    <a href="{{ route('admin.product') }}">Menu Products</a>
                </li>
                <li>
                    <a href="{{ route('admin.add-product') }}">Add Products</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.orders') }}">Orders</a>
        </li>
        <!-- <li>
            <a href="{{ route('admin.sales') }}">Sales</a>
        </li> -->

        <!-- <li>
            <a href="{{ route('admin.invoice') }}">Invoice</a>
        </li> -->

        <li>
            <a href="#customersMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customers</a>
            <ul class="collapse list-unstyled" id="customersMenu">
                <li>
                    <a href="{{ route('admin.customers') }}">Customers List</a>
                </li>
                <!-- <li>
                    <a href="{{ route('admin.customers') }}">Customers Review</a>
                </li> -->
            </ul>
        </li>
        <li>
            <a href="#managerMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Managers</a>
            <ul class="collapse list-unstyled" id="managerMenu">
                <li>
                    <a href="{{ route('admin.managers') }}">Managers List</a>
                </li>
                <li>
                    <a href="{{ route('admin.add-manager') }}">Add New Manager</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#RidersMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Riders</a>
            <ul class="collapse list-unstyled" id="RidersMenu">
                <li>
                    <a href="{{ route('admin.riders') }}">Riders List</a>
                </li>
                <!-- <li>
                    <a href="{{ route('admin.riders') }}">Add New Rider</a>
                </li> -->
            </ul>
        </li>
        <li>
            <a href="#ProfileSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile Settings</a>
            <ul class="collapse list-unstyled" id="ProfileSettings">
                <li>
                    <a href="{{ route('admin.change-password') }}">Change Password</a>
                </li>
                <li>
                    <a href="{{ route('admin.change-email') }}">Change Email</a>
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


