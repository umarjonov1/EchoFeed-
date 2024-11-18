<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('personal.main.index') }}" class="nav-link">
                            <i class="fas fa-home"></i>
                            <p>
                                Main
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('personal.liked.index') }}" class="nav-link">
                            <i class="nav-icon far fa-heart"></i>
                            <p>
                                Liked posts
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('personal.comment.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Comments
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
</aside>
