<?php

use yii\db\Migration;

/**
 * Class m190929_150824_event
 */
class m190929_150824_event extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("event", [
                'id' => $this->primaryKey(),
                'person_id' => $this->integer()->notNull(),
                'title' => $this->string()->notNull(),
                'description' => $this->text(),
                'location' => $this->string(),
                'starts' => $this->dateTime()->notNull(),
                'ends' => $this->dateTime()->notNull()
            ]
        );

        $this->addForeignKey(
            'fk-event-person_id',
            'event',
            'person_id',
            'person',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('event');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190929_150824_event cannot be reverted.\n";

        return false;
    }
    */
}
