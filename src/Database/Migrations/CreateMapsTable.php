<?php

namespace Database\Migrations;

use Config\Config;
use Database\CreateTable;
use Database\Schema;
use Database\Blueprint;

class CreateMapsTable implements CreateTable
{
    private $type;

    public function __construct()
    {
        $this->type = (new Config())->type();
    }

    public function up(string $entity): string
    {
        return Schema::create($entity, $this->type, function(Blueprint $table) {
            $table->increment("id");
            $table->string("name");
            $table->text("description");
            $table->int("mission_id")->foreign("mission_id","missions");
            $table->int("image_id")->foreign("image_id","images");
            $table->timestamps();
            return $table->run();
        });
    }

    public function down(string $entity)
    {
        return Schema::dropIfExists($entity, $this->type);
    }
}
