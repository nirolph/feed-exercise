<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 18:22
 */

namespace Application\Factory;


use Application\Model\User;

/**
 * User factory
 * Class BaseUserFactory
 * @package Application\Factory
 */
class BaseUserFactory implements FactoryInterface
{
    /**
     * @param array $data
     * @return User
     */
    public function build(array $data)
    {
        $user = new User();

        if (isset($data['id'])) {
            $user->setId($data['id']);
        }

        if (isset($data['name'])) {
            $user->setName($data['name']);
        }

        if (isset($data['group_id'])) {
            $user->setGroups([$data['group_id']]);
        }
        return $user;
    }

}