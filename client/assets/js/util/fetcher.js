function fetchRecipes(url, method, body){
    return fetch(url, buildOptions(method, body))
        .then(response =>  response.json())
        .then(json => {
            if ('errors' in json){
                throw json;
            } else {
                return json;
            }
        });
}

function buildOptions(method, body){
    const options = {
        method: method,
        headers: {
            'Content-Type': 'application/json'
        }
    };
}

export {fetchRecipes};