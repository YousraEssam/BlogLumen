---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost:8000/docs/collection.json)

<!-- END_INFO -->

#Articles management


APIs for managing articles
<!-- START_4d88adc1b364a9c1d22bf15c71710153 -->
## List All Articles.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/articles" 
```

```javascript
const url = new URL("http://localhost:8000/api/articles");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Main title": "Consectetur minima.",
            "Secondary Title": "Numquam deserunt nam perspiciatis.",
            "Content": "Rerum corrupti omnis dolorem reiciendis qui non maiores nihil perferendis dolorem excepturi ipsam recusandae.",
            "Image": "\/tmp\/81e8ae403b49d032908aca3914f41df1.jpg",
            "Author": {
                "id": 5,
                "name": "Charley Abshire Sr.",
                "email": "conner78@yahoo.com",
                "Github": "cummerata.rafael@yahoo.com",
                "twitter": "egraham@yahoo.com",
                "location": "Haiti",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        },
        {
            "ID": null,
            "Main title": "Consectetur minima.",
            "Secondary Title": "Numquam deserunt nam perspiciatis.",
            "Content": "Rerum corrupti omnis dolorem reiciendis qui non maiores nihil perferendis dolorem excepturi ipsam recusandae.",
            "Image": "\/tmp\/81e8ae403b49d032908aca3914f41df1.jpg",
            "Author": {
                "id": 5,
                "name": "Charley Abshire Sr.",
                "email": "conner78@yahoo.com",
                "Github": "cummerata.rafael@yahoo.com",
                "twitter": "egraham@yahoo.com",
                "location": "Haiti",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        }
    ]
}
```

### HTTP Request
`GET /api/articles`


<!-- END_4d88adc1b364a9c1d22bf15c71710153 -->

<!-- START_a2ede58120e213341054ffdeac11ef38 -->
## Create and Store a newly created Article.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost:8000/api/articles" \
    -H "Content-Type: application/json" \
    -d '{"main_title":"aut","secondary_title":"cupiditate","content":"rerum","image":"repellat","author_id":16}'

```

```javascript
const url = new URL("http://localhost:8000/api/articles");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "main_title": "aut",
    "secondary_title": "cupiditate",
    "content": "rerum",
    "image": "repellat",
    "author_id": 16
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Main title": "Et ad.",
            "Secondary Title": "Perferendis doloribus iure dolorum aut mollitia cumque.",
            "Content": "A placeat reiciendis error aspernatur esse sit qui.",
            "Image": "\/tmp\/33039fa7aa10b7434e8bac61ff83555f.jpg",
            "Author": {
                "id": 2,
                "name": "Deshaun Rempel",
                "email": "everette79@wehner.com",
                "Github": "usauer@hotmail.com",
                "twitter": "klocko.mohamed@wunsch.com",
                "location": "Lesotho",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        },
        {
            "ID": null,
            "Main title": "Et ad.",
            "Secondary Title": "Perferendis doloribus iure dolorum aut mollitia cumque.",
            "Content": "A placeat reiciendis error aspernatur esse sit qui.",
            "Image": "\/tmp\/33039fa7aa10b7434e8bac61ff83555f.jpg",
            "Author": {
                "id": 2,
                "name": "Deshaun Rempel",
                "email": "everette79@wehner.com",
                "Github": "usauer@hotmail.com",
                "twitter": "klocko.mohamed@wunsch.com",
                "location": "Lesotho",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        }
    ]
}
```

### HTTP Request
`POST /api/articles`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    main_title | string |  required  | The title of the Article.
    secondary_title | string |  required  | The title of the post.
    content | string |  required  | The title of the post.
    image | image |  required  | This is required and must be an image.
    author_id | integer |  required  | The ID of an existing author.

<!-- END_a2ede58120e213341054ffdeac11ef38 -->

<!-- START_29e1b04617d14937b31d856ddcc9cf63 -->
## Display a specific Article using Article ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/articles/1" 
```

```javascript
const url = new URL("http://localhost:8000/api/articles/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Main title": "Id nihil.",
            "Secondary Title": "Eius asperiores consequatur ullam officia eius in.",
            "Content": "Vero nesciunt id et distinctio commodi quia.",
            "Image": "\/tmp\/89d039e77ca3132d4d329407325fbcd0.jpg",
            "Author": {
                "id": 1,
                "name": "Johnathan Pacocha",
                "email": "norris.abbott@crist.com",
                "Github": "xzemlak@yahoo.com",
                "twitter": "bettie.herman@reinger.com",
                "location": "Morocco",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        },
        {
            "ID": null,
            "Main title": "Id nihil.",
            "Secondary Title": "Eius asperiores consequatur ullam officia eius in.",
            "Content": "Vero nesciunt id et distinctio commodi quia.",
            "Image": "\/tmp\/89d039e77ca3132d4d329407325fbcd0.jpg",
            "Author": {
                "id": 1,
                "name": "Johnathan Pacocha",
                "email": "norris.abbott@crist.com",
                "Github": "xzemlak@yahoo.com",
                "twitter": "bettie.herman@reinger.com",
                "location": "Morocco",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        }
    ]
}
```

### HTTP Request
`GET /api/articles/{article}`


<!-- END_29e1b04617d14937b31d856ddcc9cf63 -->

<!-- START_86bdc262bdee86686f4b8db56a91e792 -->
## Update a specific Article using Article ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT "http://localhost:8000/api/articles/1" \
    -H "Content-Type: application/json" \
    -d '{"main_title":"eum","secondary_title":"eum","content":"temporibus","image":"necessitatibus","author_id":9}'

```

```javascript
const url = new URL("http://localhost:8000/api/articles/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "main_title": "eum",
    "secondary_title": "eum",
    "content": "temporibus",
    "image": "necessitatibus",
    "author_id": 9
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Main title": "Qui consequatur voluptatibus.",
            "Secondary Title": "Aut aut dignissimos totam.",
            "Content": "Aut provident omnis nobis magnam molestiae et quidem.",
            "Image": "\/tmp\/1e75d23304985b6a03a72c82611c0eb3.jpg",
            "Author": {
                "id": 2,
                "name": "Deshaun Rempel",
                "email": "everette79@wehner.com",
                "Github": "usauer@hotmail.com",
                "twitter": "klocko.mohamed@wunsch.com",
                "location": "Lesotho",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        },
        {
            "ID": null,
            "Main title": "Qui consequatur voluptatibus.",
            "Secondary Title": "Aut aut dignissimos totam.",
            "Content": "Aut provident omnis nobis magnam molestiae et quidem.",
            "Image": "\/tmp\/1e75d23304985b6a03a72c82611c0eb3.jpg",
            "Author": {
                "id": 2,
                "name": "Deshaun Rempel",
                "email": "everette79@wehner.com",
                "Github": "usauer@hotmail.com",
                "twitter": "klocko.mohamed@wunsch.com",
                "location": "Lesotho",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        }
    ]
}
```

### HTTP Request
`PUT /api/articles/{article}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    main_title | string |  required  | The title of the Article.
    secondary_title | string |  required  | The title of the post.
    content | string |  required  | The title of the post.
    image | image |  required  | This is required and must be an image.
    author_id | integer |  required  | The ID of an existing author.

<!-- END_86bdc262bdee86686f4b8db56a91e792 -->

<!-- START_9c4d38d4572d6bef97cd652c5d9c5a3b -->
## Remove a specific Article using Article ID [Soft Delete].

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/articles/1" 
```

```javascript
const url = new URL("http://localhost:8000/api/articles/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Main title": "Deserunt debitis.",
            "Secondary Title": "Minima odit est quae neque deleniti.",
            "Content": "Libero optio aperiam soluta sapiente inventore omnis necessitatibus amet magni molestias fugiat et non.",
            "Image": "\/tmp\/efebfc3db788554a428ddaa5dfcbd2ad.jpg",
            "Author": {
                "id": 5,
                "name": "Charley Abshire Sr.",
                "email": "conner78@yahoo.com",
                "Github": "cummerata.rafael@yahoo.com",
                "twitter": "egraham@yahoo.com",
                "location": "Haiti",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        },
        {
            "ID": null,
            "Main title": "Deserunt debitis.",
            "Secondary Title": "Minima odit est quae neque deleniti.",
            "Content": "Libero optio aperiam soluta sapiente inventore omnis necessitatibus amet magni molestias fugiat et non.",
            "Image": "\/tmp\/efebfc3db788554a428ddaa5dfcbd2ad.jpg",
            "Author": {
                "id": 5,
                "name": "Charley Abshire Sr.",
                "email": "conner78@yahoo.com",
                "Github": "cummerata.rafael@yahoo.com",
                "twitter": "egraham@yahoo.com",
                "location": "Haiti",
                "latest_article_published": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        }
    ]
}
```

### HTTP Request
`DELETE /api/articles/{article}`


<!-- END_9c4d38d4572d6bef97cd652c5d9c5a3b -->

#Authors management


APIs for managing authors
<!-- START_39f8580c5453a9c195376f67d364defc -->
## List All Authors.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/authors" 
```

```javascript
const url = new URL("http://localhost:8000/api/authors");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Name": "Aurore King",
            "Email Address": "madge38@hotmail.com",
            "GitHub Account": null,
            "Twitter Account": "katelyn.keeling@kuhic.com",
            "Location": "Martinique"
        },
        {
            "ID": null,
            "Name": "Aurore King",
            "Email Address": "madge38@hotmail.com",
            "GitHub Account": null,
            "Twitter Account": "katelyn.keeling@kuhic.com",
            "Location": "Martinique"
        }
    ]
}
```

### HTTP Request
`GET /api/authors`


<!-- END_39f8580c5453a9c195376f67d364defc -->

<!-- START_92db2c495ad40c50efa5ed9e84fd2362 -->
## Create and Store a newly created Author.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost:8000/api/authors" \
    -H "Content-Type: application/json" \
    -d '{"name":"perspiciatis","email":"magni","password":"illum","location":"ullam"}'

```

```javascript
const url = new URL("http://localhost:8000/api/authors");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "perspiciatis",
    "email": "magni",
    "password": "illum",
    "location": "ullam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Name": "Lela Hyatt",
            "Email Address": "skiles.aylin@yahoo.com",
            "GitHub Account": null,
            "Twitter Account": "rmuller@hotmail.com",
            "Location": "Ethiopia"
        },
        {
            "ID": null,
            "Name": "Lela Hyatt",
            "Email Address": "skiles.aylin@yahoo.com",
            "GitHub Account": null,
            "Twitter Account": "rmuller@hotmail.com",
            "Location": "Ethiopia"
        }
    ]
}
```

### HTTP Request
`POST /api/authors`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the author.
    email | email |  required  | The email of the author.
    password | string |  required  | The password of the author.
    location | string |  required  | The location of the author.

<!-- END_92db2c495ad40c50efa5ed9e84fd2362 -->

<!-- START_8d43228880451a267c473e1a09e763a9 -->
## Display a specific Author using Author ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/authors/1" 
```

```javascript
const url = new URL("http://localhost:8000/api/authors/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Name": "Miss Daphne King II",
            "Email Address": "gmaggio@yahoo.com",
            "GitHub Account": null,
            "Twitter Account": "marquardt.janelle@klocko.com",
            "Location": "Greece"
        },
        {
            "ID": null,
            "Name": "Miss Daphne King II",
            "Email Address": "gmaggio@yahoo.com",
            "GitHub Account": null,
            "Twitter Account": "marquardt.janelle@klocko.com",
            "Location": "Greece"
        }
    ]
}
```

### HTTP Request
`GET /api/authors/{author}`


<!-- END_8d43228880451a267c473e1a09e763a9 -->

<!-- START_c0ddb2e291adb39b416e0e63e0ddb734 -->
## Update a specific Author using Author ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT "http://localhost:8000/api/authors/1" \
    -H "Content-Type: application/json" \
    -d '{"name":"provident","email":"itaque","password":"aut","location":"quia"}'

```

```javascript
const url = new URL("http://localhost:8000/api/authors/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "provident",
    "email": "itaque",
    "password": "aut",
    "location": "quia"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Name": "Ms. Martina Macejkovic",
            "Email Address": "bauch.amparo@gmail.com",
            "GitHub Account": null,
            "Twitter Account": "emely93@berge.com",
            "Location": "Macao"
        },
        {
            "ID": null,
            "Name": "Ms. Martina Macejkovic",
            "Email Address": "bauch.amparo@gmail.com",
            "GitHub Account": null,
            "Twitter Account": "emely93@berge.com",
            "Location": "Macao"
        }
    ]
}
```

### HTTP Request
`PUT /api/authors/{author}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the author.
    email | email |  required  | The email of the author.
    password | string |  required  | The password of the author.
    location | string |  required  | The location of the author.

<!-- END_c0ddb2e291adb39b416e0e63e0ddb734 -->

<!-- START_00ff0e50c58abe4f5df36931794ec68c -->
## Remove a specific Author using Author ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/authors/1" 
```

```javascript
const url = new URL("http://localhost:8000/api/authors/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "ID": null,
            "Name": "Camron O'Reilly",
            "Email Address": "harmon.bogisich@gaylord.org",
            "GitHub Account": null,
            "Twitter Account": "bjacobs@fisher.com",
            "Location": "Pitcairn Islands"
        },
        {
            "ID": null,
            "Name": "Camron O'Reilly",
            "Email Address": "harmon.bogisich@gaylord.org",
            "GitHub Account": null,
            "Twitter Account": "bjacobs@fisher.com",
            "Location": "Pitcairn Islands"
        }
    ]
}
```

### HTTP Request
`DELETE /api/authors/{author}`


<!-- END_00ff0e50c58abe4f5df36931794ec68c -->

#Login routes


<!-- START_ac6527c96d4b9793a4c77ff1e22a8906 -->
## /auth/login
> Example request:

```bash
curl -X POST "http://localhost:8000/auth/login" 
```

```javascript
const url = new URL("http://localhost:8000/auth/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /auth/login`


<!-- END_ac6527c96d4b9793a4c77ff1e22a8906 -->


