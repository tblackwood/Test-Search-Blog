<?php


namespace App\Repositories;

use App\Category as Model;
use Illuminate\Database\Eloquent\Collection;


class CategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        // TODO: Implement getModelClass() method.
        return Model::class;
    }



    /**
     * @param $post
     * @return mixed
     */
    public function getGategories(){

        return $this->startConditions()->with('posts')->get();
    }


}