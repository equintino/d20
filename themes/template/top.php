<style>
    #identification {
        top: 90px;
        position: fixed;
        accent-color: ;
        right: 20px;
        color: var(--cor-primary);
        text-shadow: 1px 1px 1px #ea6060;
    }
</style>
<nav id="topHeader" class="navbar navbar-expand-lg navbar-dark" >
    <a class="navbar-brand" href="http://<?= CONF_SITE_NAME ?>" target="_blank">
        <img src="<?= ($head["logo"] ?? null) ?>" alt="logo" height="40" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse pl-4" id="navbarSupportedContent" >
        <ul class="nav navbar-nav mr-auto">
            <li class="active">
                <a data-page="home" class="nav-link" href="<?= url("home") ?>" >Home
                <span class="sr-only">(current)</span></a>
            </li>
            <li>
                <a data-page="character" class="nav-link" href="<?= url("character") ?>" >Personagem</a>
            </li>
            <li>
                <a data-page="mission/init" class="nav-link" href="<?= url("mission") ?>" >Missões</a>
            </li>
        </ul>
        <div class="navbar navbar-right">
            <ul class="nav navbar">
                <?php if(!empty($this->group) !== null && !empty($this->group->name) &&
                    (strtolower($this->group->name) === "mestre" || preg_match('/\*/', $this->group->access))): ?>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle menu-right" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">Mestre</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= url("breed") ?>" data-page="breed">Raça</a>
                        <a class="dropdown-item" href="<?= url("category") ?>" data-page="category">Classe</a>
                        <a class="dropdown-item" href="<?= url("avatar") ?>" data-page="avatar">Avatar</a>
                        <a class="dropdown-item" href="<?= url("player") ?>" data-page="player">Jogadores</a>
                    </div>
                </li>
                <?php endif ?>
                <?php if(!empty($this->group->access) && (preg_match("/user/", $this->group->access)
                        || preg_match("/\*/", $this->group->access))): ?>
                    <li>
                        <a data-id="user" data-page="user" class="nav-link icon-login" href="<?= url("user") ?>" >
                            <i class="fa fa-id-card" title="Cadastro de Login"></i>
                        </a>
                    </li>
                <?php endif ?>
                <?php if(!empty($this->group->access) && (preg_match("/shield/", $this->group->access)
                        || preg_match("/\*/", $this->group->access))): ?>
                    <li>
                        <a data-id="shield" data-page="shield" class="nav-link icon-shield"
                            href="<?= url("shield") ?>" >
                            <i class="fa fa-shield" title="Segurança" ></i>
                        </a>
                    </li>
                <?php endif ?>
                <?php if(!empty($this->group->access) && (preg_match("/config/", $this->group->access)
                        || preg_match("/\*/", $this->group->access))): ?>
                    <li>
                        <a data-id="config" class="nav-link icon-config" href="<?= url("config") ?>">
                            <i class="fa fa-cog" title="Configuração" ></i>
                        </a>
                    </li>
                <?php endif ?>
                <li>
                    <a data-id="exit" class="nav-link icon-exit" href="<?= url("exit") ?>" >
                        <i class="fa fa-sign-out" title="Sair" href="exit"></i>
                    </a>
                </li>
            </ul>
        </div><!-- navbar rigth-->
    </div><!-- navbar-collapse -->
</nav>
<div id="identification"><i>Usuário:</i> <?= ($logged ?? "No user logged in") ?></div>
