<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="dashboard.php">
                        <div class="brand-logo"><img class="logo" src="../app-assets/images/logo/logo.png" /></div>
                        <h2 class="brand-text mb-0 text-white">PGC</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon "></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
                

                <li class=" nav-item"><a href="dashboard.php"><i class="bx bxs-bell text-white"></i><span class="menu-title text-white" data-i18n="User Profile">Info. Geral</span></a>

                 <li class=" nav-item"><a href="index.html"><i class="bx bx-home-alt text-white"></i><span class="menu-title text-white" data-i18n="Dashboard">Hospital</span></a>
                    <ul class="menu-content">
                        <li><a href="paciente_list.php"><i class="bx bxs-user-badge text-white"></i><span class="menu-item text-white" data-i18n="eCommerce">Pacientes</span></a>
                        </li>
                        <li><a href="medico_list.php"><i class="bx bx-user-pin text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Médicos</span></a>
                        </li>
                        <li><a href="quartos_list.php"><i class="bx bxs-buildings text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Quartos</span></a>
                        </li>
                    </ul>
                </li>

                 <li class=" nav-item"><a href="index.html"><i class="bx 
bx-first-aid text-white"></i><span class="menu-title text-white" data-i18n="Dashboard">Farmácia</span></a>
                    <ul class="menu-content">
                        <li><a href="farmacia_list.php"><i class="bx bx-chart text-white"></i><span class="menu-item text-white" data-i18n="eCommerce">Estoque</span></a>
                        </li>
                       <!-- <li><a href="dashboard-analytics.html"><i class="bx bx-git-pull-request text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Pedidos</span></a>
                        </li> -->
                    </ul>
                </li>

                <li class=" nav-item"><a href="report.php"><i class="bx bxs-report text-white"></i><span class="menu-title text-white" data-i18n="User Profile">Relatórios</span></a>
                
                <?php
                if ($_SESSION['acesso']<>'medico'){
                 echo '<li class=" nav-item"><a href="page-user-profile.html"><i class="bx bx-wrench text-white"></i><span class="menu-title text-white" data-i18n="User Profile">Configurações</span></a>';
  
                }
                                ?>
                <li class=" nav-item"><a href="logout.php"><i class="bx bx-power-off text-white"></i><span class="menu-title text-white" data-i18n="User Profile">Sair</span></a>
                
               
               
            </ul>
        </div>
    </div>