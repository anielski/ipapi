<?php


namespace App;

/**
 * Define client interface.
 * @author Adam Nielski
 * @license MIT
 * @copyright Adam Nielski
 * Interface ClientInterface
 * @package App
 */
interface ClientInterface {
    public function getInfo(string $ip);
}