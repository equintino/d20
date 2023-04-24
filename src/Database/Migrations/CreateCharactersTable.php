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
        return Schema::create($entity, $this->type, function (Blueprint $table) {
            $table->increment("id");
            $table->string("personage");
            $table->text("story")->nullable();
            $table->string("trend1,trend2")->nullable();
            $table->bool("active")->nullable()->default(1);
            $table->int("user_id")->foreign("user_id", "users");
            $table->int("breed_id")->foreign("breed_id", "breeds");
            $table->int("category_id")->foreign("category_id", "categories");
            $table->int("image_id")->foreign("image_id", "images");
            $table->timestamps();
            return $table->run();
        });
    }

    public function down(string $entity)
    {
        return Schema::dropIfExists($entity, $this->type);
    }
}
