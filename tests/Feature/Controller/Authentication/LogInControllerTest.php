<?php

declare(strict_types=1);

namespace Tests\Feature\Controller\Authentication;

use App\Infrastructure\User\Persistence\Eloquent\Model\User;
use Illuminate\Support\Facades\Hash;
use Tests\Helpers\AbstractDbTestCase;

/**
 * Class testing login operation
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class LogInControllerTest extends AbstractDbTestCase
{
    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function setUp(): void
    {
        $this->revokeAuthenticationToken();
        parent::setUp();
    }

    /**
     * Case: Valid login data
     * Expected: Valid response returned, user has a token
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function testControllerSuccessfulLogin(): void
    {
        // Arrange
        $password = 'test';
        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);
        $requestData = [
            'email' => $user->email,
            'password' => $password,
        ];

        // Act
        $response = $this->postJson('/api/login', $requestData);

        // Assert
        $response->assertOk();
        $this->assertDatabaseHas('personal_access_tokens', [
            'name' => $user->email,
        ]);
    }

    /**
     * Case: Invalid password
     * Expected: Failed response, token not created
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function testControllerIncorrectPassword(): void
    {
        // Arrange
        $password = 'test';
        $user = User::factory()->create([
            'password' => 'anotherPassword',
        ]);
        $requestData = [
            'email' => $user->email,
            'password' => $password,
        ];

        // Act
        $response = $this->postJson('/api/login', $requestData);

        // Assert
        $response->assertForbidden();
        $this->assertDatabaseMissing('personal_access_tokens', [
            'name' => $user->email,
        ]);
    }
}
