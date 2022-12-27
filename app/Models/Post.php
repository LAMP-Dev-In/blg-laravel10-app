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
        return static::all()->firstWhere('slug', $slug);        
    }


}