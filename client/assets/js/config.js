const config = {
    baseApiUrl: 'https://server.test/api/',
    recipesEndpoint: 'recipes/',
};

function getRecipesUrl(){
    return config.baseApiUrl + config.recipesEndpoint;
}

export { getRecipesUrl };