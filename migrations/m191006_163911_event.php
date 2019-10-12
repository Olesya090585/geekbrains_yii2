<?php

use yii\db\Migration;

/**
 * Class m191006_163911_event
 */
class m191006_163911_event extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('event', 'user_id', $this->integer()->notNull());
        $this->addForeignKey(
            'fk-event-user_id',
            'event',
            'user_id',
            'user',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191006_163911_event cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191006_163911_event cannot be reverted.\n";

        return false;
    }
    */
}
