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
                <a href="index.html"><i class="fa fa-ticket"></i> <span class="nav-label">Tickets</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="index.html">Mis Tickets</a></li>
                    <li ><a href="dashboard_2.html">Nuevo Ticket</a></li>

                </ul>
            </li>
            <li>
                <a href="widgets.html"><i class="fa fa-comment-o"></i> <span class="nav-label">Contactar Técnico/Administrador</span> </a>
            </li>



        </ul>

    </div>
</nav>