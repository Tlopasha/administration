<?php

namespace Stevebauman\Administration\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class SetupTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        $this->artisan('vendor:publish');

        $this->runDatabaseMigrations();
    }

    public function test_setup_welcome()
    {
        $this->visit(route('admin.setup.welcome'))
            ->see('Setup');
    }

    public function test_setup_begin()
    {
        $this->visit(route('admin.setup.begin'))
            ->see('Setup Administration');
    }

    public function test_setup_finish()
    {
        $this->visit(route('admin.setup.begin'))
            ->type('Administrator', 'name')
            ->type('admin@email.com', 'email')
            ->type('Password123', 'password')
            ->type('Password123', 'password_confirmation')
            ->press('Complete Setup')
            ->see('Setup Complete');

        $this->seeInDatabase('users', [
            'name' => 'Administrator',
            'email' => 'admin@email.com',
        ]);
    }

    public function test_setup_middleware_after_finish()
    {
        $this->test_setup_finish();

        $response = $this->call('GET', route('admin.setup.begin'));

        $this->assertEquals(500, $response->getStatusCode());
    }
}
