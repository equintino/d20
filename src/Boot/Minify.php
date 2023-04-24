<?php
/** css */
$minCSS = new MatthiasMullie\Minify\CSS();

/** theme */
$themes = "/../../themes/";
$cssDir = scandir(__DIR__ . $themes . CONF_VIEW_THEME . "/assets/css");
foreach ($cssDir as $css) {
    $cssFiles = __DIR__ . $themes . CONF_VIEW_THEME . "/assets/css/{$css}";
    if (is_file($cssFiles) && pathinfo($cssFiles)["extension"] === "css") {
        $minCSS->add($cssFiles);
    }
}

$minCSS->add(__DIR__ . "/../../shared/styles/style-home.css");
$minCSS->add(__DIR__ . "/../../shared/styles/style-character.css");
$minCSS->add(__DIR__ . "/../../shared/styles/style-mission.css");
$minCSS->add(__DIR__ . "/../../shared/styles/style-avatar.css");

/** MinifyCss */
$minCSS->minify(__DIR__ . $themes . CONF_VIEW_THEME . "/assets/style.css");

/** js */
$minJS = new MatthiasMullie\Minify\JS();

/** theme */
$jsDir = scandir(__DIR__ . $themes . CONF_VIEW_THEME . "/assets/js");
foreach ($jsDir as $js) {
    $jsFiles = __DIR__ . $themes . CONF_VIEW_THEME . "/assets/js/{$js}";
    if (is_file($jsFiles) && pathinfo($jsFiles)["extension"] === "js") {
        $minJS->add($jsFiles);
    }
}

$minJS->add(__DIR__ . "/../../shared/scripts/bootstrap.js");
$minJS->add(__DIR__ . "/../../shared/scripts/functions.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-user.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-character.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-breed.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-category.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-mission.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-player.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-avatar.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-avatar.list.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-shield.js");
$minJS->add(__DIR__ . "/../../shared/scripts/script-menu.js");

/** MinifyCss */
$minJS->minify(__DIR__ . $themes . CONF_VIEW_THEME . "/assets/scripts.js");
