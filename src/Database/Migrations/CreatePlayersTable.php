<?php

namespace Database\Migrations;

use Config\Config;
use Database\CreateTable;
use Database\Schema;
use Database\Blueprint;

class CreatePlayersTable implements CreateTable
{
    private $type;

    public function __construct()
    {
        $this->type = (new Config())->type();
    }

    public function up(string $entity)
    {
        return Schema::create($entity, $this->type, function (Blueprint $table) {
            $table->increment("id");
            $table->bool("active")->nullable()->default(1);
            $table->int("user_id")->foreign("user_id", "users");
            $table->int("character_id")->foreign("character_id", "characters");
            $table->int("mission_id")->foreign("mission_id", "missions");
            $table->timestamps();
            return $table->run();
        });
    }

    public function down(string $entity)
    {
        return Schema::dropIfExists($entity, $this->type);
    }
}
