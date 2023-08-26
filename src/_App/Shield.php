<?php

namespace _App;

use Core\Safety;

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
        $login = $this->session()->getUser();

        $this->render($this->page, compact("groups", "screens", "login", "pages"));
    }

    public function removeGroup(): array
    {
        $groups = $this->group()->activeAll();
        array_shift($groups);
        return $groups;
    }
}
