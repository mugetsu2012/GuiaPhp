<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php
                                        echo $_SESSION["nombreusr"];
                                        ?></strong>
                             </span> <span class="text-muted text-xs block"><?php
                                    echo $_SESSION["puesto"];
                                    ?> <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="" class="logOut">Salir</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href=""><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class=""><a href="" id="listarUsuarios">Lista Usuarios</a></li>
                    <li class=""><a href="" id="crearUsuarios">Agregar usuario</a></li>

                </ul>
            </li>
            <li>
                <a href="widgets.html"><i class="fa fa-comment-o"></i> <span class="nav-label">Contactar Técnico/Usuario</span> </a>
            </li>
            <li class="">
                <a href="index.html"><i class="fa fa-ticket"></i> <span class="nav-label">Tickets</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="index.html">Listado Tickets</a></li>
                    <li ><a href="dashboard_2.html">Reasignar Ticket</a></li>

                </ul>
            </li>
            <li class="">
                <a href="index.html"><i class="fa fa-wheelchair"></i> <span class="nav-label">Roles</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class=""><a href="" id="listaroles">Listado Roles</a></li>
                    <li class=""><a href="" id="creaRol">Agregar Rol</a></li>
                    <li ><a href="" id="reasignaRol">Reasignar Rol</a></li>

                </ul>
            </li>
            <li class="">
                <a href="index.html"><i class="fa fa-wrench"></i> <span class="nav-label">Permisos</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class=""><a href="" id="listaPermiso">Listado Permisos</a></li>
                    <li class=""><a href="" id="creaPermiso">Agregar Permiso</a></li>
                    <li ><a href="" id="asignaPermiso">Reasignar Permisos</a></li>

                </ul>
            </li>
            <li class="">
                <a href="index.html"><i class="fa fa-institution"></i> <span class="nav-label">Areas</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class=""><a href="" id="listaroles">Listado Areas</a></li>
                    <li class=""><a href="" id="creaRol">Agregar Area Rol</a></li>
                </ul>
            </li>



        </ul>

    </div>
</nav>

<script src="js/scripts/admin.js"></script>