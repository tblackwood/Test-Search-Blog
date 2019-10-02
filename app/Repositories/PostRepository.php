<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 6/11/19
 * Time: 2:33 PM
 */

namespace App\Repositories;

use App\Post as Model;
use Illuminate\Database\Eloquent\Collection;


class PostRepository extends CoreRepository
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
    public function getPosts($limit){

        return $this->startConditions()->with(['category','tags'])->paginate($limit);
    }

    public function searchPost($query){

        $posts = $this->startConditions()->where('title', 'LIKE', "% $query%")->paginate();

        return $posts;
    }

    public function getPostsByCategory($catArray){

        $posts = $this->startConditions()->whereIn('category_id', $catArray)->paginate();

        return $posts;

    }

    public function getPostsById($postsArray){
        $posts = $this->startConditions()->whereIn('id', $postsArray)->paginate();

        return $posts;
    }


}