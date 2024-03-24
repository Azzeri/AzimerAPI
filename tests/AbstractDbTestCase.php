<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Abstract test class for tests using database
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
abstract class AbstractDbTestCase extends TestCase
{
    use RefreshDatabase;
}
