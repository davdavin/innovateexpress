<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a class="brand-link">
        <img src="<?php echo base_url(); ?>resources/front/new-assets/logo.png" alt="Logo GKI Perumnas" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Innovate</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a <?= $this->uri->segment(1) == "admin" || $this->uri->segment(1) == "" ? "class='nav-link active'" : "class='nav-link'" ?> href="<?php echo base_url() . 'admin/dashboard' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a <?php if ($this->uri->segment(1) == "manageuser") {
                            echo "class='nav-link active'";
                        } else {
                            echo "class='nav-link'";
                        } ?> href="<?php echo base_url() . 'manageuser' ?>">
                        <!-- class nav link itu bisa dihapus(?)-->
                        <i class="nav-icon fas fa-user"></i>
                        <p> User </p>
                    </a>
                </li>
                <li <?php if ($this->uri->segment(1) == "managekonten") {
                        echo "class='nav-item menu-open'";
                    } else {
                        echo "class='nav-item'";
                    } ?>>
                    <a <?php if ($this->uri->segment(1) == "managekonten") {
                            echo "class='nav-link active'";
                        } else {
                            echo "class='nav-link'";
                        } ?>>
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Content
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a <?php if ($this->uri->segment(2) == "managehomepage") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                } ?> href="<?php echo base_url() . '' ?>">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Homepage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a <?php if (($this->uri->segment(1) == "managekonten"  && $this->uri->segment(2) == "managea") || $this->uri->segment(2) == "addarticle" || $this->uri->segment(2) == "editarticle") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                } ?> href="<?php echo base_url() . 'managekonten/managea' ?>">
                                <i class="fas fa-align-justify nav-icon"></i>
                                <p>Article</p>
                            </a>
                        </li>
                    </ul>

                </li>


                <li class="nav-item">
                    <a href="<?php echo base_url() . 'login/4dm1n/logout' ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Logout </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>