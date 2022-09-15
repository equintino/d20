<nav id="topHeader" class="navbar navbar-expand-lg navbar-dark" >
    <a class="navbar-brand" href="http://<?= CONF_SITE_NAME ?>" target="_blank">
        <img src="<?= $head["logo"] ?>" alt="logo" height="40" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse pl-4" id="navbarSupportedContent" style="">
        <ul class="nav navbar-nav mr-auto">
            <li class="active">
                <a data-page="home" class="nav-link" href="<?= url("home") ?>" >Home<span class="sr-only">(current)</span></a>
            </li>
            <li>
                <a data-page="character" class="nav-link" href="<?= url("character") ?>" >Personagem</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="tab"
                aria-control="nav-profile" aria-selected="false">Raças</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= url("breed/add") ?>" data-page="breed/add">Nova</a>
                    <a class="dropdown-item" href="<?= url("breed/list") ?>" data-page="breed/list">Lista</a>
                </div>
            </li> -->
            <?php //if(!empty($access) && (in_array("Documentação", $access) || in_array("*", $access))): ?>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="tab" aria-controls="nav-profile" aria-selected="false">Vilões</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= url("villain/add") ?>" data-page="villains/add">Novo</a>
                        <a class="dropdown-item" href="<?= url("villain/list") ?>" data-page="villains/list">Lista</a>
                    </div>
                </li> -->
            <?php //endif ?>
            <?php //if(!empty($access) && (in_array("Lista de Membros", $access) || in_array("*", $access))): ?>
            <li class="nav-item dropdown">
                <a class="nav-item nav-link dropdown-toggle" id="nav-membros-tab" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Missões</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= url("mission/add") ?>" data-page="mission/add">Nova</a>
                    <a class="dropdown-item" href="<?= url("mission/init") ?>" data-page="mission/init">Iniciar</a>
                </div>
            </li>
            <?php //endif ?>
        </ul>
        <div class="navbar navbar-right">
            <ul class="nav navbar">
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle menu-right" href="#" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">Mestre</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= url("breed") ?>" data-page="breed">Raça</a>
                        <a class="dropdown-item" href="<?= url("category") ?>" data-page="category">Classe</a>
                        <a class="dropdown-item" href="<?= url("avatar") ?>" data-page="avatar">Avatar</a>
                        <a class="dropdown-item" href="<?= url("mission") ?>" data-page="mission">Missão</a>
                    </div>
                </li>
                <?php if(!empty($this->access) && (in_array("Login de Acesso", $this->access) || in_array("*", $this->access))): ?>
                    <li>
                        <a data-id="user" class="nav-link icon-login" href="<?= url("user") ?>" >
                            <i class="fa fa-id-card" title="Cadastro de Login"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(!empty($this->access) && (in_array("Segurança", $this->access) || in_array("*", $this->access))): ?>
                    <li>
                        <a data-id="shield" class="nav-link icon-shield" href="<?= url("shield") ?>" >
                            <i class="fa fa-shield" title="Segurança" ></i>
                        </a>
                    </li>
                <?php endif ?>
                <?php if(!empty($this->access) && (in_array("Configuração", $this->access) || in_array("*", $this->access))): ?>
                    <li>
                        <a data-id="config" class="nav-link icon-config" href="<?= url("config") ?>">
                            <i class="fa fa-cog" title="Configuração" ></i>
                        </a>
                    </li>
                <?php endif ?>
                <li>
                    <a data-id="exit" class="nav-link icon-exit" href="<?= url("exit") ?>" >
                        <i class="fa fa-sign-out" title="Sair" ></i>
                    </a>
                </li>
            </ul>
        </div><!-- navbar rigth-->
    </div><!-- navbar-collapse -->
</nav>
<div class="identification"><i>Usuário:</i> <?= ($logged ?? "No user logged in") ?></div>
