<?php
namespace Modules\Article\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Article\Entities\Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'created_by' => $this->faker->unique()->name(),
            'title' => $this->faker->sentence(),
            'description'=>$this->faker->paragraph(2),
        ];
    }
}