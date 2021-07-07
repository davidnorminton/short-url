# DecodeController

Found in /app/Http/Controllers/DecodeController.php. This inherits from the ShortController.

## Methods

getPage(): This is the basic logic for the encode page content.

responseData(): This method returns a json object if successful in creating a hash to url or null on error. This
takes only 1 parameter which is the hash (string) to decode.

