<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Exception;
use Tests\TestCase;


class Test extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_Home()
    {

        $this->get('/')->assertSee('Laraveggffjgfgxfl');
    }
}
/*
 *
 */
