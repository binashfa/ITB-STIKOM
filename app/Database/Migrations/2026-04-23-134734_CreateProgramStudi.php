<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgramStudi extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],

            'fakultas_id' => [
                'type' => 'INT'
            ],

            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true
            ],

            // 🔥 TAMBAHAN PENTING
            'visi' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'misi' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'profil_lulusan' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'capaian' => [
                'type' => 'TEXT',
                'null' => true
            ],

            // optional tambahan
            'akreditasi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],

            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);

        // FOREIGN KEY
        $this->forge->addForeignKey(
            'fakultas_id',
            'fakultas',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('program_studi');
    }

    public function down()
    {
        $this->forge->dropTable('program_studi');
    }
}