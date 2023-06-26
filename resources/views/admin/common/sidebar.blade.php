<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">管理者パネル
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    管理
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>ユーザー管理</span>
        </a>
        <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">ユーザー管理:</h6>
                <a class="collapse-item" href="{{ route('admin.users.index') }}">ユーザー一覧</a>
                <a class="collapse-item" href="{{ route('admin.users.create') }}">新規追加</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-book	"></i>
            <span>レビュー管理</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">レビュー管理</h6>
                <a class="collapse-item" href="{{ route('admin.review.index') }}">レビュー一覧</a>
                {{-- <a class="collapse-item" href="{{ route('review.create') }}">新規追加
</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-pallet	"></i>
            <span>会社管理</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">会社管理:</h6>
                <a class="collapse-item" href="{{ route('admin.company.index') }}">会社一覧</a>
                <a class="collapse-item" href="{{ route('admin.company.create') }}">新規追加</a>
            </div>
        </div>
    </li>
    

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-school"></i>
            <span>保育園管理
            </span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">保育園管理:</h6>
                <a class="collapse-item" href="{{ route('admin.nursery.index') }}">保育園一覧</a>
                <a class="collapse-item" href="{{ route('admin.nursery.create') }}">新しい保育園を追加する</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    @hasrole('Admin')
        <!-- Heading -->
        <!-- <div class="sidebar-heading">
           管理パーネル
        </div> -->

        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>レビュー</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">ロール & 権限</h6>
                    <a class="collapse-item" href="{{ route('admin.roles.index') }}">ロール</a>
                    <a class="collapse-item" href="{{ route('admin.permissions.index') }}">権限</a>
                </div>
            </div>
        </li> -->

        <!-- Divider -->
        <!-- <hr class="sidebar-divider d-none d-md-block"> -->
    @endhasrole

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>ログアウト</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>