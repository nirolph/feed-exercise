<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 07:25
 */

namespace Application\Repository;

use Application\Model\ID;
use Application\Model\User;

/**
 * Interface UserRepositoryInterface
 * @package Application\Repository
 */
interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return mixed
     */
    public function persist(User $user);

    /**
     * @param ID $id
     * @return mixed
     */
    public function getUserWithId(ID $id);
}