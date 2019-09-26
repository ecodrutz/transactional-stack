<?php

namespace Stack\Tests;

use Stack\TransactionalStack;

class TransactionalStackTest extends BaseTest
{
    public function testTransactions()
    {
        $stack = new TransactionalStack();
        $this->assertFalse($stack->commit());
        $this->assertFalse($stack->rollback());
        $this->assertNull($stack->push(1));
        $this->assertNull($stack->push(2));
        $this->assertNull($stack->start());
        $this->assertNull($stack->push(3));
        $this->assertEquals(3, $stack->peek());
        $this->assertEquals(3, $stack->pop());
        $this->assertNull($stack->push(3));
        $this->assertNull($stack->push(4));
        $this->assertTrue($stack->commit());
        $this->assertFalse($stack->commit());
        $this->assertNull($stack->start());
        $this->assertEquals(4, $stack->peek());
        $this->assertNull($stack->push(5));
        $this->assertTrue($stack->rollback());
        $this->assertFalse($stack->rollback());
        $this->assertEquals(4, $stack->peek());
        $this->assertNull($stack->start());
        $this->assertEquals(4, $stack->pop());
        $this->assertNull($stack->start());
        $this->assertEquals(3, $stack->pop());
        $this->assertTrue($stack->commit());
        $this->assertTrue($stack->commit());
        $this->assertEquals(2, $stack->pop());
    }
}
