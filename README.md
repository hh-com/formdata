## Contao 5 formdata

Save all frontend form fields serialized in the database.

## Install

Copy to:  
root  
\- src  
\- - hh-com  
\- - - contao-formdata  

Update your contao installation composer.json
``` code
"repositories": [
    {
        "type": "path",
        "url": "src/hh-com/contao-formdata",
        "options": {
                "symlink": true
        }
    }
],
"require": {
    ...
    "hh-com/contao-formdata": "@dev",
    ... 
}
```