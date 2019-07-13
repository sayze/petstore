# Pet Store Pet Service

Built on php slim framework

The pet service is responsible for performing actions against a Pet entity. Currently the service exposes 2 endpoints. 

1. `POST api/pet` - Create a new pet
2. `GET api/pet` - List all the pets

## Usage
The above endpoints require a valid token in the header of each request under the key `AUTH_TOKEN` .

An `AUTH_TOKEN` can be obtained by following the [Auth Service](https://www.google.com) instructions. When a token is passed on with a request to the Pet Service it will be validated against using the external [Auth Service](https://www.google.com).