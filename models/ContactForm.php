<?php

namespace app\modules\main\models;

use Yii;
use \app\base\CustomModel;


class ContactForm extends CustomModel
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    public function rules() {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            ['email', 'email'],
			['verifyCode', 'captcha', 'captchaAction' => '/main/contact/captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function contact($email) {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
            return true;
        } else {
            return false;
        }
    }
}
