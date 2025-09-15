<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Mail\Markdown;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;

class RecipeController extends Controller
{
    public function show($id)
    {
        $recipe = Recipe::all()->firstWhere('id', $id);

        if (! $recipe) {
            abort(404);
        }

        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new TaskListExtension());

        $converter = new MarkdownConverter($environment);

        $html = $converter->convert($recipe->markdown);

        return view('recipes.show', [
            'recipe' => $recipe,
            'content' => $html,
        ]);
    }
}
