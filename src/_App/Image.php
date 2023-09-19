<?php

namespace _App;

class Image extends Controller
{
    private int $id;

    public function __construct()
    {
        parent::__construct(new \Models\Image());
    }

    public function init(array $data)
    {
        $this->id = $data["id"];
        $this->showImage();
    }

    public function load(int $id): \Models\Image
    {
        return $this->class->load($id);
    }

    public function fileSave(array $file, int $id = null)
    {
        return $this->class->fileSave($file, $id);
    }

    public function save(array $data)
    {
        $image = $this->class->load($data["id"]);
        $image->fileSave($_FILES["image"], $data["id"]);
        return print json_encode($image->message());
    }

    public function showImage()
    {
        if (isset($this->id)) {
            $image = $this->class->load($this->id);
            header("Content-Type: {$image->type}");
            echo $image->image;
        } else {
            alertLatch("No file found","var(--cor-warning)");
        }
    }

    public function getImage(array $data)
    {
        $file = $data["file"];
        return print "assets/img/{$file}";
    }

    public function delete(array $data)
    {
        $file = $this->class->load($data["id"]);
        $file->destroy();
        return print json_encode($file->message());
    }

}
