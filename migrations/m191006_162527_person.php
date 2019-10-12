<?php

use yii\db\Migration;

/**
 * Class m191006_162527_person
 */
class m191006_162527_person extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> dropTable('person');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191006_162527_person cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191006_162527_person cannot be reverted.\n";

        return false;
    }
    */
}
