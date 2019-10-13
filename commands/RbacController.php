<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "getUsers"
        $getUsers = $auth->createPermission('getUsers');
        $getUsers->description = 'Get information about users';
        $auth->add($getUsers);

        // добавляем роль "admin" и даём роли разрешение "getUsers"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $getUsers);

        // Назначение ролей пользователям. 1 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($admin, 1);
    }
}
