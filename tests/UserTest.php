<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   
    public function testExample()
    {
    	//
    }


    public function testNewUserRegistration()
    {
    	$this->visit('/addinfo')
    	->type('Taylor', 'name')
    	->select('male','gender')
    	->type('12345678','phonenum')
    	->type('com','email')
    	->type('Samakhushi', 'address')
    	->type('Nepali', 'nationality')
    	->select('email','modeofcont')
    	->press('Add Info')
    	->seePageIs('/addinfo/matched');


       	$this->visit('/addinfo')
    	->type('Taylor', 'name')
    	->select('male','gender')
    	->type('12345678','phonenum')
    	->type('com','email')
    	->type('Samakhushi', 'address')
    	->type('Nepali', 'nationality')
    	->select('email','modeofcont')
    	->press('Add Info')
    	->seePageIs('/addinfo/Added'); 

		
    }
}
