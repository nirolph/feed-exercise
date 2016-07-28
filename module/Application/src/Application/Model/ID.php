<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 18:35
 */

namespace Application\Model;


class ID
{
    private $id;

    public static function create($id)
    {
        return new self($id);
    }

    public function __construct($id)
    {
        $this->id = $this->validate($id);
    }

    private function validate($id)
    {
        $id = $this->filter($id);

        if (!is_numeric($id)) {
            throw new Exception('Invalid Id!');
        }

        if ($id <= 0) {
            throw new Exception('Invalid Id!');
        }
        return $id;
    }

    private function filter($id)
    {
        return trim($id);
    }

    public function __toString()
    {
        return $this->id;
    }


}