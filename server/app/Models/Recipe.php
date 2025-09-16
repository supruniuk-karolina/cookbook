<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Recipe
{
    public $id;
    public $title;
    public $meta;
    public $markdown;

    public static function all()
    {
        $files = Storage::files('Recipes');

        return collect($files)->map(function ($file) {
            return self::fromFile($file);
        });
    }

    public static function fromFile($file)
    {
        $note = Storage::get($file);
        $object = YamlFrontMatter::parse($note);

        $recipe = new static();
        $recipe->id = $object->matter('id');
        $recipe->title = $object->matter('title');
        $recipe->meta = $object->matter();
        $recipe->markdown = $object->body();

        return $recipe;
    }
}