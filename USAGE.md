#    SlimLInk Usage

Note: if running tests ensure the port in tests/RoutesTest.php matches the port the site
is running on.


## Run the application

```console
foo@bar:~$ php -S 127.0.0.1:9090
```

### How to use the ShortLink api

#### Encoding
The encode endpoint accepts a base4 encoded hash of a valid url.

##### Examples of base64 encoded urls

- https://google.com aHR0cHM6Ly9nb29nbGUuY29t
- https://facebook.com aHR0cHM6Ly9mYWNlYm9vay5jb20=
- https://www.php.net/ aHR0cHM6Ly93d3cucGhwLm5ldA==
- https://www.php.net/manual/en/function.base64-decode.php aHR0cHM6Ly93d3cucGhwLm5ldC9tYW51YWwvZW4vZnVuY3Rpb24uYmFzZTY0LWRlY29kZS5waHA=

#### Javascript

```javascript
var url = "https://google.com ";
var encodedUrl = btoa(url);

async function fetch() {
  let response = await fetch(`/encode/${encodedUrl}`);

   // handle response
}
```

The api returns a json object in the form:

```javascript
{
    "original":"https://google.com/",
    "short":"1",
    "slimLinkUrl":"127.0.0.1:9090/decode/1"
}
```
- Here the original key represents the decoded base64 hash of the original url.
- Short represents the url key to use
- and the climLinkUrl is the full url which can be shared


### Decoding

The decode endpoint accepts a generated hash that is stored in the system.

### Future changes

- Change hashing algorithmn
- Store hash/url pairs in database
- If not stored in database change to storing data in binary tree or hash table for faster lookups
