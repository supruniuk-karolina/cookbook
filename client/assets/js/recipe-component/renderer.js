import { fetchRecipes } from "../util/fetcher.js";
import { getRecipesUrl } from "../config.js";

async function renderRecipes(){
    console.log('hello. test!');
    try {
        const recipes = await fetchRecipes(getRecipesUrl(), 'GET');
        console.log(recipes);
    } catch (error) {
        console.error('Error fetching recipes:', error);
        document.querySelector('#recipes-all').textContent = 'Failed to load recipes.';
    }
}

export { renderRecipes };