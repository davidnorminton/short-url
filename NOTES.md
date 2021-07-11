good written documentation, docblocks; has basic testing;
persists/reads data to/from a JSON file; 

doesn't use DI, 
- inject path to json file to model


has a helper of sorts, 

wouldn't necessarily say it was a "service" ;

encoding helper does a lot,
- def intention was to refactor json file access to model
- wanted to move file access to a model
- then used the remaining methods as services
- keep private menbers of encodehelper use as public
- reduce method complexity

including reading/writing to the JSON file to persist data, 
no separation of responsibilities. 



Encodes/decodes the JSON file in almost every function call, 
rather than keeping the decoded file in memory and 
- once moved mot of these methods to a model
- then would pass the file to the helper to sort


uses base64_decode/base64_encode to "hash" the URL.
- sorry hash was definately not the correct term to use: ?encoded string
- tried to avoid using a query string ?=
- inhindsight should have gone with the simpler method 
- had issues with url
