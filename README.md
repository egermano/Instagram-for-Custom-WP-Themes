Instagram for Custom WP Themes
==============================

[![Build Status](https://secure.travis-ci.org/egermano/Instagram-for-Custom-WP-Themes.png?branch=master)](http://travis-ci.org/egermano/Instagram-for-Custom-WP-Themes)

Plugin to get instagram media feed of some user for a custom wordpress themes.

# Dependencies

* [httpful](https://github.com/nategood/httpful), already on submodules

Install 
-------------

* Clone the repository
* Update Submodules
    $ git submodule init
    $ git submodule update

Usage
-------------
    
In ```function.php``` file of your theme load the Instagram file, like this:
```PHP
require_once('Instagram.php');
```

To get a Instagram feed call this function:
```PHP 
Instagram::get_feed('999999', 16);
```

The first argument is a userid of user you want to get a photos and videos, the second is optional, is a limit of media quantity you want to call, the default is 16.

References
-------------

* [Httpful Documentation](http://phphttpclient.com/)
* [Instagram API Documentation](http://instagram.com/developer/)

Fork me
-------------

I have a lot things to do in this plugins, this is a initial beta version, if you want to use and increase this class, fork me and let's do the better world.


See more in: [http://blog.egermano.com/blog/2013/07/30/instagram-wp-plugin/](http://blog.egermano.com/blog/2013/07/30/instagram-wp-plugin/)

Thanks.