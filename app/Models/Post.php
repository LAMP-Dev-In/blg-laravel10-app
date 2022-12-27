<?php

namespace App\Models;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public function __construct
    (
        public string $title,
        public string $excerpt,
        public int $date,
        public string $body,
        public string $slug

    ){}

    public static function all()
    {
        return collect(File::files(resource_path("posts/")))
             ->map(fn($file) => YamlFrontMatter::parseFile($file))
             ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ));
    }

    public static function find($slug)
    {
            
        if(!file_exists($path = resource_path("posts/{$slug}.html"))){
            throw new ModelNotFoundException();
        }


        return cache()->remember("post.{$slug}", 1200, fn() => file_get_contents($path));

    }


}