<?php

namespace App\UserBundle\Form\Extension\ChoiceList;

use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

class UserRoles implements ChoiceListInterface
{
    const ADMIN = 'Администратор';
    const USER = 'Пользователь';

    public function getChoices()
    {
        return array(
            'ROLE_ADMIN' => self::ADMIN,
            'ROLE_USER' => self::USER,
        );
    }

}
