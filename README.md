# PhotoWordpressAddon

## Description

As part of the Wordpress CMS (PHP, CMB2 library), functionality that allows you to mark a photo with additional information whether it is a drastic photo or not.

The solution is implemented on a test server, which you can log in here:
http://kubawordpress.pl
but you will also need login and password to admin profil to tested it out, send mail to me to receive it.

You can check the operation in the WordPress admin panel:
Menu -> Media -> Library -> Select the uploaded photo -> Edit more information -> Scroll to the very end of the subpage -> Select options regarding the severity of the photo (check or uncheck the checkbox) -> Save changes


## Features

- Field visible in the photo editing view (drastic / not drastic)
- Information saved as photo metadata
- Addon starts from functions.php file


## Screenshots

![App Screenshot](/1.png)


## Roadmap

- All planed funcionality has been implemented.


## Deployment and running

Install Wordpress.

Clone the project.

Copy the CMB2-2.10.1 folder inside the main template folder.

Copy the meta-images.php file inside the main template folder.

Add the following line of code to the functions.php file of the target template:
require_once get_template_directory() . '/meta-images.php';


## Usefull links

 - [CMB2 library](https://github.com/CMB2/CMB2)
