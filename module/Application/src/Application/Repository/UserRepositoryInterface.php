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

interface UserRepositoryInterface
{
    public function persist(User $user);
    public function getUserWithId(ID $id);
}