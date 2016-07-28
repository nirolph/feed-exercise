<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 19:19
 */

namespace Application\DTO;

/**
 * User data transfer object
 * Class UserDTO
 * @package Application\DTO
 */
class UserDTO
{
    /**
     * @var integer
     */
    private $id;

    /**
     * UserDTO constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }
}