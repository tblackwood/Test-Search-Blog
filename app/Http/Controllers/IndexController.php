<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
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

    public function index(){

        $posts = $this->postRepository->getPosts(10);


        $categories = $this->categorytRepository->getGategories();
        //dd($categories);
        $tags = $this->tagRepository->getTags();

        return view('blog.index', compact('posts','categories', 'tags'));
    }
}
