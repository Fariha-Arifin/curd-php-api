# curd-php-api
This is very simple PHP api's which are use to do CURD operations in web or mobile applications.

The simple api's wriiten in PHP PDO with MySQL database. No framework is used to build this api's

## Setup (Steps)
Change the config.php file with your database user name, password and create a database name simple_curd_system. After that create a table name user_info with six column(User_ID,FirstName,LastName,Email,MobileNumber,Password). User id should be neumeric(AUTO-INCREMENT)

## How to use(sample request)
Register user : [POST]/register.php?User_ID=1&MobileNumber=01234567890&Password=1234&FirstName=fariha&LastName=xyz&Email=xyz@gmail.com if the request is successful than it return {"error":false,"users":{"User_ID":1,"Password":1234,"MobileNumber":"01234567890",FirstName:fariha,LastName:xyz,Email:xyz@gmail.com}}, if user already existed it return {"error":true,"error_msg":"User already existed with 01234567890"}

Login user : [GET]/login.php?MobileNumber=01234567890&password=1234 if request successful it return {"error":false,"users":{"User_ID":1,"Password":1234,"MobileNumber":"01234567890"}} else it return {"error":true,"error_msg":"Login credentials are wrong. Please try again!"}

Delete user : [DELETE]/deleteuserbyid.php?User_ID=1
