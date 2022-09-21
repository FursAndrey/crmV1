<?php

namespace Tests\Unit;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_is_new()
    {
        $this->seed();
        $ticket = Ticket::factory()->create(['status' => 0]);
        $this->assertTrue($ticket->isNew());
    }

    public function test_is_not_new()
    {
        $this->seed();
        $ticket = Ticket::factory()->create(['status' => 1]);
        $this->assertFalse($ticket->isNew());
    }
}
