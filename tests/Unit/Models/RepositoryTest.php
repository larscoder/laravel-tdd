<?php

namespace Tests\Unit\Models;

use App\Models\Repository;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testBelongsToUser()
    {
        $repository = Repository::factory()->create();

        $this->assertInstanceOf(User::class, $repository->user);
    }
}
