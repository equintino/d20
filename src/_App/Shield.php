<?php

namespace _App;

use Core\Safety;
use Core\Session;

class Shield extends Controller
{
    private string $page = "shield";

    public function init(): void
    {
        $groups = $this->removeGroup();
        $screens = Safety::screens("/pages");
        foreach ($screens as $screen) {
            $pages[] = Safety::renameScreen($screen);
        }
        $login = (new Session())->getUser();

        $this->render($this->page, [ compact("groups", "screens", "login", "pages") ]);
    }

    public function removeGroup(): array
    {
        $groups = (new \Models\Group())->activeAll();
        array_shift($groups);
        return $groups;
    }
}
