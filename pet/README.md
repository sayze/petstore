# Pet Service

Built on php slim framework

The pet service is responsible for performing actions against a Pet entity. Currently the service exposes an endpoint for pet creation. `POST api/pet`

## Usage
The above endpoint requires a valid token in the header of each request under the key `AUTH-TOKEN` .

An `AUTH-TOKEN` can be obtained by following the [Auth Service](https://bitbucket.org/sayeds/petstore/src/master/auth/) instructions. When a token is passed on with a request to the Pet Service it will be validated against using the external [Auth Service](https://bitbucket.org/sayeds/petstore/src/master/auth/).