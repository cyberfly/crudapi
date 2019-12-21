<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use WithFaker;
    use RefreshDatabase;

    protected $admin_user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin_user = factory(User::class)->create([
            'type' => 'a',
        ]);
    }
}
