import { getRecipesUrl } from "../config.js";

function fetchRecipes(url, method, body){
    return fetch(url, buildOptions(method, body))
}