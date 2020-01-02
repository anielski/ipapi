<?php 

namespace App;

use IpApi\{Client as Client, IpInfo as IpInfo};

/**
 * Get locations from IP.
 * @author Adam Nielski
 * @license MIT
 * @copyright Adam Nielski
 * @todo add exceptions and error support
 * Class Ip
 * @package App
 */
class Ip implements OutInterface {

    /** @var ClientInterface  */
    private $_client;

    /** @var IpInfo */
    private $_info;

    /** @var string */
    private $_ip;

    /**
     * Ip constructor.
     * @param ClientInterface $client
     */
    public function __construct( ClientInterface $client ) {
        $this->_client = $client;
    }

    /**
     * Default use IpApi library.
     * @return Ip
     */
    static public function getDefault() {
        $pluginClient = new class() extends Client implements ClientInterface {};
        return new self( $pluginClient );
    }

    /**
     * Load information about IP
     * @param $ip
     * @return $this Ip
     */
    public function getDataForIp( $ip ) {
        $this->_info = $this->_client->getInfo( $ip );
        if (!($this->_info instanceof IpInfo)) {
            throw new Exception("Plugin instance is not required interface!");
        }
        return $this;
    }

    /**
     * Get country
     * @return string
     */
    public function getCountry() {
        return $this->_info->getCountry();
    }

    /**
     * Get zip code
     * @return string
     */
    public function getZip() {
        return $this->_info->getZip();
    }

    /**
     * Get city
     * @return string
     */
    public function getCity() {
        return $this->_info->getCity();
    }

    /**
     * Get country code (ISO)
     * @return string
     */
    public function getCountryCode() {
        return $this->_info->getCountryCode();
    }

}
