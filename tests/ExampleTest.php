<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
        ->assertResponseOk();

    }

    public function testNewUserRegistration()
    {
        $this->visit('/addinfo')
        ->type('Taylor', 'name')
        ->select('male','gender')
        ->type('12345678','phonenum')
        ->type('binod@stha.com','email')
        ->type('Samakhushi', 'address')
        ->type('Nepali', 'nationality')
        ->select('email','modeofcont')
        ->press('Add Info')
        ->seePageIs('/addinfo/matched');
    }

}
