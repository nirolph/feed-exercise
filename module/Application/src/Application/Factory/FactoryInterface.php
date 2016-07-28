<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 00:16
 */

namespace Application\Factory;


interface FactoryInterface
{
    public function build(array $data);
}