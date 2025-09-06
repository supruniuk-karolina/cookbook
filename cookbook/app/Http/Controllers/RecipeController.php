<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use League\CommonMark\CommonMarkConverter;

class RecipeController extends Controller
{
    public function show($id)
    {
        $recipe = Recipe::all()->firstWhere("id", $id);

        if (! $recipe) {
            abort(404);
        }

        $converter = new CommonMarkConverter();
        $html = $converter->convert($recipe->markdown);

        return view('recipes.show', [
            'recipe' => $recipe,
            'content' => $html,
        ]);
    }
}