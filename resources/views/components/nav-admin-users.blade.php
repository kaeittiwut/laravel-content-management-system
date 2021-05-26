<li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
    <a class="nav-link {{ request()->is('admin/users*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
        data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fas fa-fw fa-cog"></i>
        <span>Users</span>
    </a>
    <div id="collapseUsers" class="collapse {{ request()->is('admin/users*') ? 'show' : '' }}"
        aria-labelledby="headingUsers" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item {{ request()->is('admin/users') ? 'active' : '' }}"
                href="{{ route('user.index') }}">View all users</a>
        </div>
    </div>
</li>
