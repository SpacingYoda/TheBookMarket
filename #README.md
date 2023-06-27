# TheBookMarket

Folder and Purpose:

config:         Store the configuration file such as database configuration;

public:         Store the public files accessed directly by the users;

src:            Store the source files that should not be exposed to the public;

scr/inc:        Store the commonly included files such as the header and footer of a page;

scr/libs:       Store the library files, e.g., validation, sanitization, etc.;

_________________________
File and Purpose:

helpers.php: Dynamic "title".

bootstrap.php: A bridge to include all the necessary files.
_________________________
Why the ".htaccess"?

The TheBookMarket/.htaccess file is for: 
<!--This is to remove the "public" folder tag in the URL-->
<!--Clean = good (also makes it more optimised)-->

The TheBookMarket/public/.htaccess file is for:
<!--This is needed to remove the error after removing the "public" from the URL-->