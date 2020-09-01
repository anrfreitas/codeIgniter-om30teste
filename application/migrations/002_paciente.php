<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Paciente extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nome' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'nome_mae' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'dtanasc' => array(
                                'type' => 'DATE',
                        ),
                        'cpf' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'cns' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'cep' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                                'null' => TRUE,
                        ),
                        'endereco' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'imagem_id' => array(
                                'type' => 'INT',
                                'constraint' => '5',
                                'unsigned' => TRUE,
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);

                $this->dbforge->create_table('paciente');
        }

        public function down()
        {
                $this->dbforge->drop_table('paciente');
        }
}