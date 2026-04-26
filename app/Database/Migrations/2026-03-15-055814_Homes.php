<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Homes extends Migration
{
    public function up()
    {
        	$this->forge->addField([ 
            'id' => [ 
                'type'           => 'INT', 
                'constraint'     => 5, 
                'unsigned'       => true, 
                'auto_increment' => true 
            ], 
            'title_home' => [ 
                'type'           => 'VARCHAR', 
                'constraint'     => '255' 
            ], 
            'author_home' => [ 
                'type'           => 'VARCHAR', 
                'constraint'     => 100, 
                'default'        => 'John Doe', 
            ], 
            'content_home' => [ 
                'type'           => 'TEXT', 
                'null'           => true, 
            ], 
            'status_home' => [ 
                'type'           => 'ENUM', 
                'constraint'     => ['published', 'draft'], 
                'default'        => 'draft', 
            ], 
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP', 
            'slug VARCHAR(100) UNIQUE' 	
	        ]); 
 
        // Membuat primary key 
        $this->forge->addKey('id', TRUE); 
 
        // Membuat tabel news 
        $this->forge->createTable('homes', TRUE); 	

    }

    public function down()
    {
        	$this->forge->dropTable('homes'); 	
    }
}
