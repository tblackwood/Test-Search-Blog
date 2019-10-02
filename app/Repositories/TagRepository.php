<?php


namespace App\Repositories;

use App\Tag as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


class TagRepository extends CoreRepository
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
    public function getTags(){

        return $this->startConditions()->all();
    }


    public function getTagsById($postsIDArr, $tagsIdArr){
        $tags = DB::table('post_tag')->whereIn('post_id', $postsIDArr)->whereIn('tag_id', $tagsIdArr)->get();
        //dd($tags);
        return $tags;
    }

}