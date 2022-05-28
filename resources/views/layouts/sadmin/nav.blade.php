<nav id="sidebar" class="sticky-top">
    <div class="sidebar-header">
        <h3>Resturant Logo</h3>
    </div>
    <ul class="list-unstyled components">
        <p>Main Admin Dashboard</p>
        <li class="{{ Request::is('admin/dashboard') ? 'li-active':'' }}">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="{{ Request::is('sadmin/branches') ? 'li-active':'' }}">
            <a href="{{ route('sadmin.branches') }}">Branches</a>
        </li>
        <li>
            <a href="#ProfileSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile Settings</a>
            <ul class="collapse list-unstyled {{ Request::is('sadmin/change-email') || Request::is('sadmin/change-password')  ? 'show':'' }}"  id="ProfileSettings">
                <li>
                    <a
                        class="{{ Request::is('sadmin/change-password') ? 'li-active':'' }}"
                        href="{{ route('sadmin.change-password') }}">Change Password</a>
                </li>
                <li>
                    <a
                        class="{{ Request::is('sadmin/change-email') ? 'li-active':'' }}"
                        href="{{ route('sadmin.change-email') }}">Change Email</a>
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


