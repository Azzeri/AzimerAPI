<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Abstract test case class
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }
}
