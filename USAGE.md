#    SlimLInk Usage

Note: if running tests ensure the port in tests/RoutesTest.php matches the port the site
is running on.

SlimLink converts a url into a smaller base36 encoded string;


## Run the application

```console
foo@bar:~$ php -S 127.0.0.1:8080
```

### How to use the ShortLink api

#### Encoding
The encode endpoint accepts a base4 encoded string of a valid url.


#### Javascript

```javascript
var url = "https://google.com ";

async function fetch() {
  let response = await fetch(`/encode?url=${encodedUrl}`);

   // handle response
}
```

The api returns a json object in the form:

```javascript
{
    "original":"https://google.com/",
    "short":"1",
    "slimLink_decode_url":"127.0.0.1:9090/decode/1"
}
```
- Here the original key represents the original url.
- The short key represents the url key to use
- and the slimLink_decode_url key is the full url which can be shared


### Decoding

The decode endpoint accepts a generated encoded string that is stored in the system.

### Run tests

From root of project

```bash

$ vendor/bin/phpunit ./tests
```

