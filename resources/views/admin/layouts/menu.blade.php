<li class="header"><i class="fa fa-window-maximize" aria-hidden="true"></i>
MAIN NAVIGATION</li>
<li class="nav-item {{ (Request::is('admin/dashboard*')) ? 'active open' : '' }}">
  <a href="{{ route('admin.dashboard') }}">
    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
  </a>
</li>

@if(\Laratrust::hasRole('admin'))
<li class="header">QUẢN LÝ POSTS</li>
<li class="nav-item {{ (Request::is('admin/posts*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.posts.index') }}" class="nav-link ">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="title">Posts</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/categories*') ? 'active open' : '' }} ">
    <a href="{{ route('admin.categories.index') }}" class="nav-link ">
        <i class="fa fa-briefcase" aria-hidden="true"></i> <span class="title">Categories</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/tags*') ? 'active open' : '' }} ">
    <a href="{{ route('admin.tags.index') }}" class="nav-link ">
        <i class="fa fa-tags" aria-hidden="true"></i> <span class="title">Tags</span>
    </a>
</li>
<li class="header">QUẢN LÝ USERS</li>
<li class="nav-item {{ (Request::is('admin/users*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.users.index') }}" class="nav-link ">
        <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Users</span>
    </a>
</li>
<li class="header"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;QUẢN LÝ RECYCLE BIN</li>
<li class="nav-item {{ (Request::is('admin/recycle-bin/posts*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.recycleBin.posts') }}" class="nav-link ">
        <i class="fa fa-bitbucket" aria-hidden="true"></i> <span class="title">Posts Trash</span>
    </a>
</li>
<li class="nav-item {{ (Request::is('admin/recycle-bin/categories*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.recycleBin.categories') }}" class="nav-link ">
        <i class="fa fa-bitbucket" aria-hidden="true"></i> <span class="title">Categories Trash</span>
    </a>
</li>
<li class="nav-item {{ (Request::is('admin/recycle-bin/tags*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.recycleBin.tags') }}" class="nav-link ">
        <i class="fa fa-bitbucket" aria-hidden="true"></i> <span class="title">Tags Trash</span>
    </a>
</li>
@endif
