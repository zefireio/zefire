## About Zefire

Zefire is a web application framework which attempts to provides an elegant and easy to use set of features common to most of web projects, such as:

- Inversion Of Control.
- ORM and Database layer.
- Routing.
- Template Engine.
- Queueing.
- Events.
- Console.
- Middlewares.
- Conventional back-end features, (such as Sessions, caching, storage, etc).


Zefire was designed to be fairly light yet powerful enough to provide tools needed for most projects.

## Getting Started

Download this package to your web folder.

> **Note:** The following step is optional.

Create a database and run the following query to create the basic user table to match the default settings and model:

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


## Learning Zefire

Please visit Zefire's website for full [documentation](http://zefire.io/documentation) with examples and full [API documentation](http://zefire.io/api-documentation).

## Contributing

Thank you for considering contributing to the Zefire framework! As the project is still in its early stage, no contribution plan as yet been defined. However any contribution will be welcome.

## Security Vulnerabilities

If you discover a security vulnerability within Zefire, please send an e-mail to Zefire via [Zefire](mailto:zefireframework@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Zefire framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
