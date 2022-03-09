<?php

namespace Database\Migrations;

use Config\Config;
use Database\CreateTable;
use Database\Schema;
use Database\Blueprint;

class CreateCharactersTable implements CreateTable
{
    private $type;

    public function __construct()
    {
        $this->type = (new Config())->type();
    }

    public function up(string $entity): string
    {
        $schema = Schema::create($entity, $this->type, function(Blueprint $table) {
            $table->increment("id");
            $table->string("name,personage");
            $table->text("story")->nullable();
            $table->string("trend1,trend2")->nullable();
            $table->int("breed_id")->foreign("breed_id","breeds");
            $table->int("category_id")->foreign("category_id","categories");
            $table->int("image_id")->foreign("image_id","images");
            // $table->int("mission_id")->foreign("mission_id","mission");
            $table->timestamps();
            return $table->run();
        });
        return $schema;
    }

    public function down(string $entity)
    {
        return Schema::dropIfExists($entity, $this->type);
    }
}
