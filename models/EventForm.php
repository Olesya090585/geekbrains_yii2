<?php

namespace app\models;

use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class EventForm extends Model
{
    public $title;
    public $description;
    public $location;
    public $time;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // title, description, location and time are required
            [['title', 'description', 'location', 'time'], 'required'],
        ];
    }

}
