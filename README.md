# sample
A sample API example using CURL
In this example, I have made a number of assumptions:
1.	Retrieve the entire list if senators
2.	“Print” using standard functionality in PHP means print to console
3.	Autoloading is not in used; hence, using “require_once” instead of “use”

The package “sample” should be able to run without any additional package.  Note that it is using CURL to contact the API endpoint.
To run:
1.	Change directory to /sample
2.	At the command line, enter:	
php driver.php


The results will be something like this:

Senators
{"firstName":"Tammy","lastName":"Baldwin","fullName":"Tammy Baldwin","chartId":":Contents of B001230:","mobile":"(202) 224-5653","address":[{"street":"709 Hart Senate Office","city":"Washington","state":"DC","postal":"20510"}]}
{"firstName":"John","lastName":"Barrasso","fullName":"John Barrasso","chartId":":Contents of B001261:","mobile":"(202) 224-6441","address":[{"street":"307 Dirksen Senate Office","city":"Washington","state":"DC","postal":"20510"}]}
{"firstName":"Michael F.","lastName":"Bennet","fullName":"Michael F. Bennet","chartId":":Contents of B001267:","mobile":"(202) 224-5852","address":[{"street":"261 Russell Senate Office","city":"Washington","state":"DC","postal":"20510"}]}
{"firstName":"Marsha","lastName":"Blackburn","fullName":"Marsha Blackburn","chartId":":Contents of B001243:","mobile":"(202) 224-3344","address":[{"street":"357 Dirksen Senate Office","city":"Washington","state":"DC","postal":"20510"}]}
{"firstName":"Richard","lastName":"Blumenthal","fullName":"Richard Blumenthal","chartId":":Contents of B001277:","mobile":"(202) 224-2823","address":[{"street":"706 Hart Senate Office","city":"Washington","state":"DC","postal":"20510"}]}
