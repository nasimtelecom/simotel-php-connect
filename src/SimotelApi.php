<?php

namespace Hsy\Simotel;

use Hsy\Simotel\SimotelApi\BaseApiGroups;

class SimotelApi
{
    /**
     *
     * simotel api config
     *
     * @var array
     */
    private $config;

    /**
     * SimotelApi constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     *
     * return instance of called api group class
     *
     * @param $name
     * @param $arguments
     * @return __anonymous|BaseApiGroups|__anonymous@1023
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        $name = ucfirst($name);
        $groupClasses = ["Pbx", "Autodialer", "Call", "Reports", "Voicemails"];

        if (!in_array($name, $groupClasses))
            throw new \Exception("api group class not found: '{$name}'");

        return $this->makeApiGroupClass($name, $this->config);
    }

    /**
     *
     * create and return the dynamic class of api group
     *
     * @param $className
     * @param $config
     * @return BaseApiGroups|__anonymous@923
     */
    private function makeApiGroupClass($className, $config)
    {
        return new class ($className, $config) extends BaseApiGroups {

            protected $namespace;

            public function __construct($className, array $config = [])
            {
                $this->namespace = "\\Hsy\\Simotel\\SimotelApi\\ApiGroups\\$className\\";
                parent::__construct($config);
            }
        };
    }
}
