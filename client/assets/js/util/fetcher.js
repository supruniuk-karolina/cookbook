async function fetchRecipes(url, method, body){
    const response = await fetch(url, buildOptions(method, body))
    const json = await response.json();

    if ('errors' in json){
        throw json;
    }
    
    return json;
}

function buildOptions(method, body){
    const options = {
        method: method,
        headers: {
            'Content-Type': 'application/json; charset=UTF-8'
        }
    };

    if (body){
        options.body = JSON.stringify(body);
    }

    return options;
}

export {fetchRecipes};