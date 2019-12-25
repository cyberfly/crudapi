<?php

namespace Tests;

use App\User;
use Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use WithFaker;
    use RefreshDatabase;

    protected $admin_user;
    protected $normal_user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin_user = factory(User::class)->create([
            'type' => 'a',
        ]);

        $this->normal_user = factory(User::class)->create();

        // passport setup

        Artisan::call('passport:install',['-vvv' => true]);
    }
}
