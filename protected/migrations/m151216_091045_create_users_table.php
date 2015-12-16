<?php

use yii\db\Schema;
use yii\db\Migration;

class m151216_091045_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('users',
            [
                'user_id' => Schema::TYPE_PK,
                'username' => Schema::TYPE_STRING. ' NOT NULL',
                'password_hash' => Schema::TYPE_STRING. ' NOT NULL',
                'auth_key' => Schema::TYPE_STRING. ' NOT NULL',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('users');

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
