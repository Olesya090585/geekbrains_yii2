<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegistrationForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegistrationForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username, password and email are required
            [['username', 'password', 'password_repeat','email'], 'required'],
            // email validation
            ['email', 'email'],
            // password validation
            ['password', 'string', 'min' => 3],
            ['password', 'compare', 'compareAttribute' => 'password_repeat', 'on' => 'register'],
            ['password_repeat', 'string', 'min' => 3],
        ];
    }

    public function register()
    {
        $result = false;
        if ($this->validate()) {
            $userModel = new User();
            $userModel->username = $this->username;
            $userModel->email = $this->email;
            $userModel->setPassword($this->password);
            $userModel->generateAuthKey();
            $userModel->save();
            $result = !$userModel->hasErrors();
        }
        return $result;
    }

    public function update($user_id)
    {
        $result = false;
        if ($this->validate()) {
            $userModel = User::findOne($user_id);
            $userModel->username = $this->username;
            $userModel->email = $this->email;
            $userModel->setPassword($this->password);
            $userModel->generateAuthKey();
            $userModel->save();
            $result = !$userModel->hasErrors();
        }
        return $result;
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
