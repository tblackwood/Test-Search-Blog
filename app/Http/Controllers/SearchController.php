<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $postRepository;
    private $tagRepository;
    private $categorytRepository;

    public function __construct()
    {
        $this->postRepository = app(PostRepository::class);
        $this->categorytRepository = app(CategoryRepository::class);
        $this->tagRepository = app(TagRepository::class);
    }


    public function search(Request $request){
        $query = htmlspecialchars($request->input('search'));

        if(! isset($query)){
            return redirect('/');
        }

        $posts = $this->postRepository->searchPost($query);

        return view('blog.pages.search', compact('posts'));
    }

    public function filter(Request $request){
        $data = $request->all();

        if(isset($data['categoriesFilter'])){
            session(['categoriesFilter'=>$data['categoriesFilter']]);
            $posts = $this->postRepository->getPostsByCategory($data['categoriesFilter']);
        }else{
            if(isset($data['page']) && !empty(session('categoriesFilter'))){
                $posts = $this->postRepository->getPostsByCategory(session('categoriesFilter'));
            }else{
                $posts = $this->postRepository->getPosts(10);
                session(['categoriesFilter'=>array()]);
            }

        }


        if(isset($data['tagsFilter'])){
            session(['tagsFilter'=>$data['tagsFilter']]);
            $tags = $this->tagRepository->getTagsById($posts->pluck('id'),$data['tagsFilter']);
            $posts = $this->postRepository->getPostsById($tags->pluck('post_id'));
        }else{
            if(isset($data['page']) && !empty(session('tagsFilter'))){
                $tags = $this->tagRepository->getTagsById($posts->pluck('id'),session('tagsFilter'));
                $posts = $this->postRepository->getPostsById($tags->pluck('post_id'));
            }else{
                session(['tagsFilter'=>array()]);
            }
        }

        $categories = $this->categorytRepository->getGategories();

        $tags = $this->tagRepository->getTags();

        return view('blog.pages.search', compact('categories', 'tags', 'posts'));
    }

}
