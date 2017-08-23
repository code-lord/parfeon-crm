<?php

use yii\db\Migration;

class m170823_103902_users extends Migration
{
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('projects', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%projects}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NULL',
                    'title' => 'VARCHAR(255) NULL',
                    'description' => 'MEDIUMTEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('task_statuses', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%task_statuses}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('tasks', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%tasks}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'author_id' => 'INT(11) NULL',
                    'executor_id' => 'INT(11) NULL',
                    'project_id' => 'INT(11) NULL',
                    'status_id' => 'INT(11) NULL',
                    'title' => 'VARCHAR(255) NULL',
                    'description' => 'MEDIUMTEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('users', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%users}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'email' => 'CHAR(60) NULL',
                    'name' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('workday', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%workday}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NULL',
                    'date' => 'DATE NULL',
                    'start' => 'TIME NULL',
                    'end' => 'TIME NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_user_id_976_00','projects','user_id',0);
        $this->createIndex('idx_author_id_988_01','tasks','author_id',0);
        $this->createIndex('idx_executor_id_988_02','tasks','executor_id',0);
        $this->createIndex('idx_project_id_988_03','tasks','project_id',0);
        $this->createIndex('idx_status_id_988_04','tasks','status_id',0);
        $this->createIndex('idx_user_id_999_05','workday','user_id',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_users_976_00','{{%projects}}', 'user_id', '{{%users}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_users_987_01','{{%tasks}}', 'author_id', '{{%users}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_users_987_02','{{%tasks}}', 'executor_id', '{{%users}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_projects_988_03','{{%tasks}}', 'project_id', '{{%projects}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_task_statuses_988_04','{{%tasks}}', 'status_id', '{{%task_statuses}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_users_998_05','{{%workday}}', 'user_id', '{{%users}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function safeDown()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `projects`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `task_statuses`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `tasks`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `users`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `workday`');
        $this->execute('SET foreign_key_checks = 1;');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170823_103902_users cannot be reverted.\n";

        return false;
    }
    */
}
