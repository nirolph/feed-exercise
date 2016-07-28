<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 18:35
 */

namespace Application\Model;

/**
 * Id value object
 * Class ID
 * @package Application\Model
 */
class ID
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param mixed $id
     * @return ID
     */
    public static function create($id)
    {
        return new self($id);
    }

    /**
     * ID constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $this->validate($id);
    }

    /**
     * Validate the id
     * @param $id
     * @return string
     * @throws Exception
     */
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

    /**
     * Filter id
     * @param $id
     * @return string
     */
    private function filter($id)
    {
        return trim($id);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }


}