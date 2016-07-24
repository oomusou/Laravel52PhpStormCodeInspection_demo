<?php

declare(strict_types = 1);

use App\Post;
use App\Services\PostService;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostServiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @var PostService */
    private $target;

    protected function setUp()
    {
        parent::setUp();
        $this->target = app(PostService::class);
    }

    /** @test */
    public function 有資料取title欄位資料()
    {
        /** arrange */
        collect(range(1, 3))->each(function ($value) {
            factory(Post::class)->create([
                'title' => 'title' . $value
            ]);
        });

        /** act */
        $id = 1;
        $default = 'no title';
        $actual = $this->target->showTitle($id, $default);

        /** assert */
        $expected = 'title1';
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 無資料的title欄位資料()
    {
        /** arrange */
        collect(range(1, 3))->each(function ($value) {
            factory(Post::class)->create([
                'title' => 'title' . $value
            ]);
        });

        /** act */
        $id = 4;
        $default = 'no title';
        $actual = $this->target->showTitle($id, $default);

        /** assert */
        $expected = 'no title';
        $this->assertEquals($expected, $actual);
    }
}
