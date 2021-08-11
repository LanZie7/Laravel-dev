<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNewsUpdate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/5/edit')
                    ->select('category_id', 3)
                    ->type('title', 'Some title')
                    ->type('description', 'Some description')
                    ->press('Сохранить')
                    ->assertPathIs('/admin/news/5/edit');
        });
    }
}
