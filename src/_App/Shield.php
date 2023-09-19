<?php

namespace _App;

use Core\Safety;

class Shield extends Controller
{
    protected string $page = 'shield';

    public function _init(): void
    {
        $this->group = new Group();
        $groups = $this->removeGroup();
        $screens = Safety::screens("/pages");
        foreach ($screens as $screen) {
            $pages[] = Safety::renameScreen($screen);
        }
        $login = $this->getUser();
        $this->render($this->page, compact("groups", "screens", "login", "pages"));
    }

    public function removeGroup(): array
    {
        $groups = $this->group->getListGroup();
        array_shift($groups);
        return $groups;
    }
}
