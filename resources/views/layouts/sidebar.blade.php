<div id="sidebar" class="sidebar">
    <ul class="nav">
        <li class="nav-header">Danh mục</li>
        @role('admin')
        <li class="has-sub">
            <a href="/roles">
                <i class="fa fa-key"></i>
                <span>Quản lý nhóm tài khoản</span>
            </a>
        </li>
        @endrole
        @role('admin')
        <li class="has-sub">
            <a href="/users">
                <i class="fa fa-user"></i>
                <span>Quản lý users</span>
            </a>
        </li>
        @endrole
        @role(['admin', 'teacher'])
        <li class="has-sub">
            <a href="/hocvien">
                <i class="fa fa-users"></i>
                <span>Quản lý Học Viên</span>
            </a>
        </li>
        @endrole
        @role(['admin', 'teacher'])
        <li class="has-sub">
            <a href="/lop">
                <i class="fa fa-inbox"></i>
                <span>Quản lý Lớp</span>
            </a>
        </li>
        <li class="has-sub">
            <a href="/huyen">
                <i class="fa fa-suitcase"></i>
                <span>Quản lý Huyện</span>
            </a>
        </li>
        <li class="has-sub">
            <a href="/tinh">
                <i class="fa fa-file-o"></i>
                <span>Quản lý Tỉnh</span>
            </a>
        </li>
        <li class="has-sub">
            <a href="/khoahoc">
                <i class="fa fa-star"></i>
                <span>Quản lý Khóa Học</span>
            </a>
        </li>
        @endrole
        @role('admin')
        <li class="has-sub">
            <a href="/congty">
                <i class="fa fa-th"></i>
                <span>Quản lý CTy Tiếp Nhận</span>
            </a>
        </li>
        <li class="has-sub">
            <a href="#">
                <i class="fa fa-money"></i>
                <span>Quản lý Thu</span>
            </a>
        </li>
        <li class="has-sub">
            <a href="#">
                <i class="fa fa-money"></i>
                <span>Quản lý Chi</span>
            </a>
        </li>
        @endrole
    </ul>
</div>