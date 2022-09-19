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
        return Schema::create($entity, $this->type, function(Blueprint $table) {
            $table->increment("id");
            $table->string("name");
            $table->string("email",100)->unique();
            $table->string("login",50)->unique();
            $table->string("password,user");
            $table->bool("active")->nullable()->default(1);
            $table->string("occupation",255)->nullable();
            $table->int("company_id")->nullable()->default(1);
            $table->int("group_id")->nullable();
            $table->token();
            $table->timestamps();
            return $table->run();
        });
    }

    public function down(string $entity)
    {
        return Schema::dropIfExists($entity, $this->type);
    }
}
