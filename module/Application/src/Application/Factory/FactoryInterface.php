<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 00:16
 */

namespace Application\Factory;

/**
 * Interface FactoryInterface
 * @package Application\Factory
 */
interface FactoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function build(array $data);
}