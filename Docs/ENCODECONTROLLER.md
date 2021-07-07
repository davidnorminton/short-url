# EncodeController

Found in /app/Http/Controllers/EncodeController.php. This inherits from the ShortController.

## Methods

getPage(): This is the basic logic for the encode page content.

responseData(): This method returns a json object if successful in creating a hash to url or null on error. This
takes only 1 parameter which is the url (string) to encode.

