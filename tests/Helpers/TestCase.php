<?php

declare(strict_types=1);

namespace Tests\Helpers;

use App\Infrastructure\User\Persistence\Eloquent\Model\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

/**
 * Abstract test case class
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    private bool $withGrantedToken = true;

    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();

        if ($this->withGrantedToken) {
            Sanctum::actingAs(User::factory()->create(), ['*']);
        }
    }

    /**
     * Grant user a token to authorize sanctum requests
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function grantAuthenticationToken(): void
    {
        $this->withGrantedToken = true;
    }

    /**
     * Revoke user a token to authorize sanctum requests
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function revokeAuthenticationToken(): void
    {
        $this->withGrantedToken = false;
    }
}
