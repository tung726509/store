<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Category;
use App\Option;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    function __construct(){
        $this->category_m = new Category();
        $this->option_m = new Option();
        $this->tag_m = new Tag();
    }
    
    public function register(){
        //
    }

    
    public function boot(){
        $categories = $this->category_m->withCount(['products'])->get();
        $options = $this->option_m->getOption();
        $tags = $this->tag_m->get();
        // dd($tags);

        View::share(['categories' => $categories,'options' => $options,'tags' => $tags]);
    }
}
