<?php

namespace Hsy\Simotel\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Hsy\Simotel\Simotel;
use Hsy\Simotel\SimotelApi\Parameters;

class SimotelApiTest extends TestCase
{
    private $simotel;

    public function __construct()
    {
        $this->simotel = new Simotel();
        parent::__construct();
    }

    /*
        public function testPbxUsers()
        {
            $number = "testNumber";

            $parameters = new Parameters;
            $parameters->name = "test name ";
            $parameters->number = "$number";
            $parameters->secret = "secret";

            $result = $this->simotel->connect()->pbx()->users()->create($parameters);
            $this->assertEquals(1, $result->success);

            $newName = "new name";

            $parameters = new Parameters;
            $parameters->id = "$number";
            $parameters->name = $newName;

            $result = $this->simotel->connect()->pbx()->users()->update($parameters);
            $this->assertEquals(1, $result->success);

            $parameters = new Parameters;
            $parameters->conditions = ["number" => "$number"];
            $parameters->alike = 1;

            $result = $this->simotel->connect()->pbx()->users()->search($parameters);
            $this->assertEquals(1, $result->success);
            $this->assertEquals($result->data[0]->name, $newName);

            $parameters = new Parameters;
            $parameters->id = "$number";

            $result = $this->simotel->connect()->pbx()->users()->remove($parameters);
            $this->assertEquals(1, $result->success);
        }
    */

    public function testAllMethods()
    {


        $namespaces = [
            'pbx' => [
                'users' => ['add','update','remove','search'],
                'trunks' => ['add','update','remove','search'],
                'queues' => ['add','update','remove','search','addagent','removeagent','pauseagent','resumeagent'],
                'blacklists' => ['add','update','remove','search'],
                'whitelists' => ['add','update','remove','search'],
                'announcements' => ['upload','add','update','remove','search'],
                'musicOnHolds' => ['search'],
                'faxes' => ['upload','add','search','download'],
            ],
            'call' => [
                'originate' => ['act'],
            ],
            'voicemails' => [
                'voicemails' => ['add','update','remove','search'],
                'audio' => ['download'],
                'inbox' => ['search'],
            ],
            'reports' => [
                'quick' => ['search','info'],
                'audio' => ['download'],
                'cdr' => ['search'],
                'queue' => ['search'],
                'queueDetails' => ['search'],
                'agent' => ['search'],
                'poll' => ['search'],
            ],
            'autodialer' => [
                'announcements' => ['upload','add','update','remove','search'],
                'campaigns' => ['add','update','remove','search'],
                'contacts' => ['add','update','remove','search'],
                'groups' => ['upload','add','update','remove','search'],
                'reports' => ['search','info'],
                'trunks' => ['update','search'],
            ],

        ];

        foreach ($namespaces as $namespace => $groups) {
            foreach ($groups as $group => $methods) {
                array_walk($methods, $this->executeMethods($namespace, $group));
            }
        }
    }

    public function executeMethods($namespace, $group)
    {
        return function ($method) use ($namespace, $group) {
            $result = $this->simotel->connect()->$namespace()->$group(null, $this->createHttpClient())->$method();
            self::assertEquals(1, $result->success);
        };
    }

    public function createHttpClient()
    {
        $res = json_encode(['success' => 1, 'message' => 'message', 'data' => ['data']]);
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], $res),
        ]);

        $handlerStack = HandlerStack::create($mock);

        return new Client(['handler' => $handlerStack]);
    }
}
