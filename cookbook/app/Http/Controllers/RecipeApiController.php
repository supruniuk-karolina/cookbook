<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;

class RecipeApiController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all()->map(function ($recipe) {
            return [
                'id' => $recipe->id,
                'title' => $recipe->title,
                'meta' => $recipe->meta,
            ];
        });

        return response()->json($recipes);
    }

    public function show($id)
    {
        $recipe = Recipe::all()->firstWhere('id', $id);

        if (! $recipe) {
            return response()->json(['error' => 'Recipe not found'], 404);  
        }

        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new TaskListExtension());
        $converter = new MarkdownConverter($environment);

        $html = $converter->convert($recipe->markdown);

        return response()->json([
            'id' => $recipe->id,
            'title' => $recipe->title,
            'meta' => $recipe->meta,
            'markdown' => $recipe->markdown,
            'html' => $html,
        ]);
    }
}
