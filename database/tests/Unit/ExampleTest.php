<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class ExampleTest extends DuskTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->clickLink('Sign Up')
                    ->type('Your name', 'ahmet yılmaz')
                    ->type('name@domain.com', 'ahmet2@gmail.com')
                    ->type('At least 8 characters', '1234567890')
                    ->type('Confirm Password', '1234567890')
                    ->check('I agree to the Terms & Conditions')
                    ->click('Sign up')
                    ->waitForText('some-expected-text') // Beklenen metni güncelleyin
                    ->assertSee('some-expected-text'); // Beklenen metni güncelleyin
        });
    }
}

// tests/Browser/ExampleTest.php




