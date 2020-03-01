<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /** {@test} */
    public function testLogin()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
                ->type('email','reception@reception.com')
                ->type('password','secret')
                ->press('button[type="submit"]')
                ->pause(1000)
                ->assertPathIs('/reception')
                ->assertSee('Dashboard');
        });
    }
    /** {@test} */
    public function testLoginFailed()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
                ->type('email','reception12@reception.com')
                ->type('password','secret')
                ->press('button[type="submit"]')
                ->assertPathIs('/login')
                ->assertSee('Email or Password is invalid');
        });
    }
}
