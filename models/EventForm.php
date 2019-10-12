<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class EventForm extends ActiveRecord
{
    static public function tableName()
    {
        return "event";
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // title and starts are required
            [['title', 'starts'], 'required'],
            // title, description and location must be a string
            [['title', 'description', 'location'], 'string'],
            // starts and ends must be a string
            [['starts', 'ends'], 'string'],
        ];
    }


    public function create_or_edit()
    {
        $result = false;
        $user_id = Yii::$app->user->getId();

        if ($this->validate()) {
            if (!$this->ends){
                $this->ends = $this->starts;
            }
            $this->user_id = $user_id;
            $this->save();
            $result = !$this->hasErrors();
        }
        return $result;
    }

}
