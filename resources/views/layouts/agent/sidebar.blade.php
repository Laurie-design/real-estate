<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="fas fa-arrow-left"></i> 
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="fas fa-ellipsis-v"></i> 
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                
                <li class="nav-item">
                    <a href="{{ route('agent.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#properties">
                        <i class="fas fa-building"></i>
                        <p>Biens</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="properties">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('agent.property.list') }}">
                                    <i class="fas fa-list"></i>
                                    <p>Liste des biens</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('property.create') }}">
                                    <i class="fas fa-plus"></i>
                                    <p>Ajouter un bien</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#requetes">
                        <i class="fas fa-search"></i> <!-- Correction de l'icône ici -->
                        <p>Requêtes</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="requetes">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('agent.requetes.list') }}">
                                    <i class="fas fa-list"></i> <!-- Correction de l'icône ici -->
                                    <p>Liste des requêtes</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#demande">
                        <i class="fas fa-file-alt"></i> <!-- Changement de l'icône ici -->
                        <p>Demandes</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="demande">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('agent.demandes.list') }}">
                                    <i class="fas fa-list"></i>
                                    <p>Liste des demandes</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#owners">
                        <i class="fas fa-users"></i>
                        <p>Propriétaires</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="owners">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('agent.owner.list') }}">
                                    <i class="fas fa-list"></i>
                                    <p>Liste des Propriétaires</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('agent.owner.create') }}">
                                    <i class="fas fa-plus"></i>
                                    <p>Nouveau propriétaire</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#account">
                        <i class="fas fa-user"></i>
                        <p>Compte</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="account">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#"><span class="sub-item">Profil</span></a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"><span class="sub-item">Se déconnecter</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
