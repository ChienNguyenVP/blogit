<li class="header"><i class="fa fa-window-maximize" aria-hidden="true"></i>
MENU THAO TÁC</li>
<li class="nav-item {{ (Request::is('admin/dashboard*')) ? 'active open' : '' }}">
  <a href="{{ route('admin.dashboard') }}">
    <i class="fa fa-dashboard"></i> <span>Thống kê</span>
  </a>
</li>

@if(\Laratrust::hasRole('user'))
{{-- @rolde('admin') --}}
{{-- @role('user') --}}
<li class="header">QUẢN LÝ BÀI VIẾT</li>
<li class="nav-item {{ (Request::is('admin/posts*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.posts.index') }}" class="nav-link ">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="title">Bài Viết Của Bạn</span>
    </a>
</li>

@endif
{{-- @endrole --}}
@if(\Laratrust::hasRole('admin'))
<li class="header">QUẢN LÝ BÀI VIẾT</li>
<li class="nav-item {{ (Request::is('admin/posts*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.posts.index') }}" class="nav-link ">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="title">Bài Viết</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/categories*') ? 'active open' : '' }} ">
    <a href="{{ route('admin.categories.index') }}" class="nav-link ">
        <i class="fa fa-briefcase" aria-hidden="true"></i> <span class="title">Danh Mục</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/tags*') ? 'active open' : '' }} ">
    <a href="{{ route('admin.tags.index') }}" class="nav-link ">
        <i class="fa fa-tags" aria-hidden="true"></i> <span class="title">Tags</span>
    </a>
</li>
<li class="header">QUẢN LÝ CỘNG TÁC VIÊN</li>
<li class="nav-item {{ (Request::is('admin/users*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.users.index') }}" class="nav-link ">
        <i class="fa fa-user-plus" aria-hidden="true"></i><span class="title">Duyệt Thành Viên</span>
    </a>
</li>   
<li class="nav-item {{ (Request::is('admin/userlist*')) ? 'active open' : '' }}"> 
    <a href="{{ asset('admin/userlist') }}" class="nav-link ">
        <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Cộng Tác Viên</span>
    </a>
</li> 
<li class="header"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;DANH SÁCH XÓA</li>
<li class="nav-item {{ (Request::is('admin/recycle-bin/posts*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.recycleBin.posts') }}" class="nav-link ">
        <i class="fa fa-bitbucket" aria-hidden="true"></i> <span class="title">Bài Viết</span>
    </a>
</li>
<li class="nav-item {{ (Request::is('admin/recycle-bin/categories*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.recycleBin.categories') }}" class="nav-link ">
        <i class="fa fa-bitbucket" aria-hidden="true"></i> <span class="title">Danh Mục</span>
    </a>
</li>
<li class="nav-item {{ (Request::is('admin/recycle-bin/tags*')) ? 'active open' : '' }}">
    <a href="{{ route('admin.recycleBin.tags') }}" class="nav-link ">
        <i class="fa fa-bitbucket" aria-hidden="true"></i> <span class="title">Tag</span>
    </a>
</li>
@endif
