<?php

namespace _App;

class Image extends Controller
{
    private $id;

    public function __construct()
    {
        parent::__construct();
        $this->class = new \Models\Image();
    }

    public function init(array $data)
    {
        $this->id = $data["id"];
        $this->showImage();
    }

    public function showImage()
    {
        if(isset($this->id)) {
            $image = $this->class->load($this->id);
            header("Content-Type: {$image->type}");
            echo $image->image;
        } else {
            alertLatch("No file found","var(--cor-warning)");
        }
    }

    public function delete(array $data)
    {
        var_dump($data);die;
        $file = $this->class->image->load($data["id"]);
        $file->destroy();
        return print(json_encode($file->message()));
    }

}
