<?php 
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Ip;
use IpApi\{Client as Client};


/**
 * Get locations from IP.
 * @author Adam Nielski
 * @license MIT
 * @copyright Adam Nielski
 * Class Ip
 * @package App
 */
class TaskOneTest extends TestCase
{

    /**
     * Example test and show how work Ip class.
     */
    public function testIp()
    {
        $client = Ip::getDefault()->getDataForIp("178.43.21.203");
        $this->assertEquals('Bielsko-Biala', $client->getCity());
        $this->assertEquals('Poland', $client->getCountry());
        $this->assertEquals('43-300', $client->getZip());
        $this->assertEquals('PL', $client->getCountryCode());
    }
}