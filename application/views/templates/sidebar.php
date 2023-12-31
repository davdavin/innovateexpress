<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a class="brand-link">
        <img src="<?php echo base_url(); ?>resources/front/new-assets/logo.png" alt="Logo GKI Perumnas" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Innovate</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'admin/dashboard' ?>" class="nav-link active">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'manageuser' ?>" class="nav-link">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p> User </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'admin' ?>" class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>
                            Content
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Ruangan/list_ruangan' ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Homepage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Ruangan/list_peminjaman' ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Article</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'login/jemaat/logout' ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Logout </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>