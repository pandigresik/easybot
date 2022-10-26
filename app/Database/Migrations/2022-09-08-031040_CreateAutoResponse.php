<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAutoResponse extends Migration
{
    private $table = 'auto_responses';
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'int',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'message' => [
                'type'       => 'varchar',
                'constraint' => 120,
                'null'       => false,
            ],
            'chat_type' => [
                'type'       => 'enum',
                'constraint' => ['personal', 'group', 'all'],
                'null'       => false,
            ],
            'destination' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'default'    => '*',
                'comment'    => 'jika diisi id contact maka akan dibatasi response terhadap contact tersebut saja'               
            ],
            'response' => [
                'type'       => 'text'                
            ],
            'description' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => false,
            ],
            'created_by' => [
                'type'       => 'int',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,   
            ],
        ]);
        $this->forge->addPrimaryKey('id');        
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
