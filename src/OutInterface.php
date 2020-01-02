<?php


namespace App;

/**
 * Define output from @see \App\Ip
 * @author Adam Nielski
 * @license MIT
 * @copyright Adam Nielski
 * Interface OutInterface
 * @package App
 */
interface OutInterface {

    public function getCountry();
    public function getZip();
    public function getCity();
    public function getCountryCode();
}