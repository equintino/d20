<?php

namespace Database\Migrations;

use Config\Config;
use Database\CreateTable;
use Database\Schema;
use Database\Blueprint;

class CreateMissionsTable implements CreateTable
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
            $table->string("name,place");
            $table->text("story")->nullable();
            // $table->int("map_id")->foreign("map_id","maps");
            $table->timestamps();
            return $table->run();
        });
    }

    public function down(string $entity)
    {
        return Schema::dropIfExists($entity, $this->type);
    }
}
