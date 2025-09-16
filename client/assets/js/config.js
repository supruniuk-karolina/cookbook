const config = {
    baseApiUrl: 'https://server.test/api/',
    recipesEndpoint: 'recipes/',
    token: undefined //TODO!!
};

function getRecipesUrl(){
    return config.baseApiUrl + config.recipesEndpoint;
}

function getToken(){
    return config.token;
}

export { getRecipesUrl, getToken };