<?php

declare(strict_types=1);

namespace Tests\Api;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Routing\Middleware\ThrottleRequestsWithRedis;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

abstract class AbstractApiTest extends TestCase
{
    use RefreshDatabase;

    const URI = '/v1/Api/';

    protected bool $seed = true;

    protected abstract function path(): string;

    /**
     * @return array<int, string>
     */
    abstract static function structure(): array;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware([ThrottleRequestsWithRedis::class]);
    }

    /**
     * @param array<string, mixed> $attributes
     * @return User
     */
    protected function createUser(array $attributes = [])
    {
        $user = UserFactory::new()->createOne($attributes);
        return $user->refresh();
    }

    protected function makeURI(string|int $path = '', array $parameterzz = [])
    {
        $query = '';
        if (count($parameterzz)) {
            $query = '?' . http_build_query($parameterzz);
        }
        return static::URI . $this->path() . '/' . $path . $query;
    }

    protected function seeData(array $structure, TestResponse $response)
    {
        $response->assertJsonStructure(
            [
                'message',
                'data' => $structure,
            ]
        );
        return $this;
    }

    protected function seeErrors(array $structure, TestResponse $response)
    {
        $response->assertJsonStructure(
            [
                'message',
                'errors' => $structure,
            ]
        );
        return $this;
    }

    protected function seeItem(array $structure, TestResponse $response)
    {
        $response->assertJsonStructure(
            [
                'message',
                'item' => $structure,
            ]
        );
        return $this;
    }

    protected function seeItemzz(array $structure, TestResponse $response)
    {
        $response->assertJsonStructure(
            [
                'message',
                'itemzz' => [
                    '*' => $structure,
                ],
            ]
        );
        return $this;
    }

    protected function seePage(array $structure, TestResponse $response, bool $simple = true, bool $empty = false)
    {
        $page = [
            'from',
            'path',
            'per_page',
            'to',
            'data' => [],
        ];
        if ($simple === false) {
            $page[] = 'total';
        }
        if ($empty) {
            $response->assertJsonPath('data.data', []);
        } else {
            $page['data'] = ['*' => $structure];
        }
        $response->assertJsonStructure([
            'message',
            'page' => $page,
        ]);
        return $this;
    }

}