<?php

namespace Hsy\Simotel\Tests;

use Hsy\Simotel\Simotel;

class SimotelEventApiTest extends TestCase
{
    public function testEvent()
    {
        $simotel = new Simotel();

        $simotel->eventApi()->addListener('CDR', function ($data) {
            $this->assertEquals($data['data1'], 'testData1');
        });

        $simotel->eventApi()->addListener('CDR', function ($data) {
            $this->assertEquals($data['data2'], 'testData2');
        });

        $simotel->eventApi()->addListener('CDR', function ($data) {
            $this->assertNotEquals($data['data3'], 'wrongData');
        });

        // pass data to CDR listener
        $data = [
            'data1' => 'testData1',
            'data2' => 'testData2',
            'data3' => 'testData3',
        ];
        $simotel->eventApi()->dispatch('CDR', $data);
    }
}
