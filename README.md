# Pet Store Api

## Overview

The api is comprised of 2 services (Auth & Pet) which are exposed through an nginx reverse proxy. In a request life cycle both services communicate with eachother in order to satisfy all the requirements of a successful transaction.

## Usage

To test the api the following flow must be adhered to.

1. Generate a token from the `/secret` endpoint

```
curl -X POST \
  http://104.248.30.254/api/auth/secret \
  -H 'cache-control: no-cache' \
  -d '{
 "secret": "my_secret"
}'
```
Response

```
{
    "status": "OK",
    "message": "Authentication successfull.",
    "value": "hashed_secret"
}
```

2. Use the token within `value` to make any further requests for creating a pet.

```
curl -X POST \
  http://104.248.30.254/api/pet \
  -H 'AUTH-TOKEN: hashed_secret' \
  -H 'cache-control: no-cache' \
  -d '{
  "id": 0,
  "category": {
    "id": 0,
    "name": "fat"
  },
  "name": "lil J",
  "photoUrls": [
    "http://google.com"
  ],
  "tags": [
    {
      "id": 0,
      "name": "cuteanimals"
    },
    {
      "id": 1,
      "name": "fluffy"
    }
  ],
  "status": "avaislable"
}'
```
There is also an additional endpint which is used internally by the Pet service to validate tokens. It is also exposed and can be called.

```
curl -X POST \
  http://104.248.30.254/api/auth/token \
  -H 'cache-control: no-cache' \
  -d '{
 "token": "hashed_secret"
}'
```