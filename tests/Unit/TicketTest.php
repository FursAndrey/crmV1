<?php

namespace Tests\Unit;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    // use RefreshDatabase;
    use DatabaseTransactions;

    public function getTestData()
    {
        return [
            [0, true],
            [1, false],
        ];
    }

    private function createTicketWithStatus($status)
    {
        return Ticket::factory()->create(['status' => $status]);
    }

    /**
     *  @dataProvider getTestData
     */
    public function testIsNew($status, $expectedResult)
    {
        $ticket = $this->createTicketWithStatus($status);
        $this->assertEquals($expectedResult, $ticket->isNew());
    }
}
