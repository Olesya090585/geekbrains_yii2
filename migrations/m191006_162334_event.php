<?php

use yii\db\Migration;

/**
 * Class m191006_162334_event
 */
class m191006_162334_event extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> dropForeignKey('fk-event-person_id', 'event');
        $this -> dropColumn('event', 'person_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191006_162334_event cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191006_162334_event cannot be reverted.\n";

        return false;
    }
    */
}
