<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUuid extends Migration
{
    public function up()
    {
         $table = $this->db->DBPrefix . 'Currency';
        $this->db->simpleQuery("ALTER table ". $table." MODIFY COLUMN id varchar(36) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT uuid() NOT NULL COMMENT 'ID ';");
    }

    public function down()
    {
        //
    }
}
