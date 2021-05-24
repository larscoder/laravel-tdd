<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testHasManyRepositories()
    {
        $user = new User;

        $this->assertInstanceOf(Collection::class, $user->repositories);
    }
}
