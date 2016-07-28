<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 19:19
 */

namespace Application\DTO;


class UserDTO
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function id()
    {
        return $this->id;
    }
}