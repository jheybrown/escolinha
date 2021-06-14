<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">

        <div class="navbar-header">

            <ul class="nav navbar-nav flex-row">

                <li class="nav-item mr-auto"><a class="navbar-brand" href="dashboard.php">

                        <div class="brand-logo"><img class="logo" src="../app-assets/images/logo/logo.png" /></div>

                        <h2 class="brand-text mb-0 text-white">SGE</h2>

                    </a></li>

                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon "></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>

            </ul>

        </div>

        <div class="shadow-bottom"></div>

        <div class="main-menu-content">

            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">

                



                <li class=" nav-item"><a href="dashboard.php"><i class="bx bx-bar-chart-alt-2 text-white"></i><span class="menu-title text-white" data-i18n="User Profile">Dashboard</span></a>



                 <li class=" nav-item"><a href="index.html"><i class="bx bx-user text-white"></i><span class="menu-title text-white" data-i18n="Dashboard">Professores</span></a>

                    <ul class="menu-content">

                        <li><a href="teacher_list.php"><i class="bx bxs-user-badge text-white"></i><span class="menu-item text-white" data-i18n="eCommerce">Listar</span></a>

                        </li>

                        <li><a href="medico_list.php"><i class="bx bx-user-plus text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Adicionar</span></a>

                        </li>
                    </ul>

                </li>

                <li class=" nav-item"><a href="index.html"><i class="bx bx-body text-white"></i><span class="menu-title text-white" data-i18n="Dashboard">Alunos</span></a>

                    <ul class="menu-content">

                        <li><a href="student_list.php"><i class="bx bxs-user-badge text-white"></i><span class="menu-item text-white" data-i18n="eCommerce">Listar</span></a>

                        </li>

                        <li><a href="student_add.php"><i class="bx bx-user-plus text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Adicionar</span></a>

                        </li>
                    </ul>

                </li>

                <li class=" nav-item"><a href="index.html"><i class="bx bx-book text-white"></i><span class="menu-title text-white" data-i18n="Dashboard">Disciplinas</span></a>

                    <ul class="menu-content">

                        <li><a href="paciente_list.php"><i class="bx bxs-book-content text-white"></i><span class="menu-item text-white" data-i18n="eCommerce">Listar</span></a>

                        </li>

                        <li><a href="medico_list.php"><i class="bx bx-folder-plus text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Adicionar</span></a>

                        </li>
                    </ul>

                </li>

                <li class=" nav-item"><a href="index.html"><i class="bx bx-group text-white"></i><span class="menu-title text-white" data-i18n="Dashboard">Turmas</span></a>

<ul class="menu-content">

    <li><a href="paciente_list.php"><i class="bx bxs-book-content text-white"></i><span class="menu-item text-white" data-i18n="eCommerce">Listar</span></a>

    </li>

    <li><a href="medico_list.php"><i class="bx bx-folder-plus text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Adicionar</span></a>

    </li>
</ul>

</li>
                
<li class=" nav-item"><a href="index.html"><i class="bx bxs-folder-open text-white"></i><span class="menu-title text-white" data-i18n="Dashboard">Classes</span></a>

<ul class="menu-content">

    <li><a href="paciente_list.php"><i class="bx bxs-book-content text-white"></i><span class="menu-item text-white" data-i18n="eCommerce">Listar</span></a>

    </li>

    <li><a href="medico_list.php"><i class="bx bx-folder-plus text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Adicionar</span></a>

    </li>
</ul>

</li>

<li class=" nav-item"><a href="index.html"><i class="bx bx-time-five text-white"></i><span class="menu-title text-white" data-i18n="Dashboard">Horários</span></a>

<ul class="menu-content">

    <li><a href="paciente_list.php"><i class="bx bxs-book-content text-white"></i><span class="menu-item text-white" data-i18n="eCommerce">Listar</span></a>

    </li>

    <li><a href="medico_list.php"><i class="bx bx-folder-plus text-white"></i><span class="menu-item text-white" data-i18n="Analytics">Adicionar</span></a>

    </li>
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