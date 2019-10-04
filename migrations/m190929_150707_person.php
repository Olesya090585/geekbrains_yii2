<?php

use yii\db\Migration;

/**
 * Class m190929_150707_person
 */
class m190929_150707_person extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("person", [
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('person');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190929_150707_person cannot be reverted.\n";

        return false;
    }
    */
}
