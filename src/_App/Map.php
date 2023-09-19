<?php

namespace _APP;

use _App\Controller;

class Map extends Controller
{
    public function __construct()
    {
        parent::__construct(new \Models\Map());
        $this->image = new \_App\Image();
    }

    public function getMaps(): array
    {
        return $this->class->activeAll();
    }

    public function search(array $data): array
    {
        return $this->class->search($data);
    }

    public function load(int $id): \Models\Map
    {
        return $this->class->load($id);
    }

    public function save(array $data): string
    {
        $map = $this->class;
        /** Loading map */
        if (!empty($data['id'])) {
            $map = $map->load($data['id']);
        }

        /** Saving image */
        $file = $_FILES["image"];
        if ($file["error"] === 0) {
            $idImage = ($map->image_id ?? null);
            $data["image_id"] = $this->image->fileSave($file, $idImage);
        }

        $map->bootstrap($data);
        $map->save();
        return print json_encode($map->message());
    }
}
