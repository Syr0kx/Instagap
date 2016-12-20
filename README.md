#Instagap [![Coverage Status](https://coveralls.io/repos/github/boennemann/badges/badge.svg?branch=master)](https://coveralls.io/github/boennemann/badges?branch=master)

Instagap is a social helper, executing daily tasks for you.
So you can spend more time on the really important things.

Use this for Reference: [Realtimeboard](https://realtimeboard.com/app/board/o9J_k0ytgTs=/ "Whiteboard")

#Tabellenstruktur für die Tabelle instagram:

CREATE TABLE `instagram` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


# ![logo](/examples/assets/instagram.png) Instagram PHP [![Latest Stable Version](https://poser.pugx.org/mgp25/instagram-php/v/stable)](https://packagist.org/packages/mgp25/instagram-php) [![Total Downloads](https://poser.pugx.org/mgp25/instagram-php/downloads)](https://packagist.org/packages/mgp25/instagram-php) ![compatible](https://img.shields.io/badge/PHP%207-Compatible-brightgreen.svg) [![License](https://poser.pugx.org/mgp25/instagram-php/license)](https://packagist.org/packages/mgp25/instagram-php)

This is Instagram's private API. It has all the features the Instagram app has, including media upload.

**Read the [wiki](https://github.com/mgp25/Instagram-API/wiki)** and previous issues before opening a new one! Maybe your issue is already answered.

**Frequently Asked Questions:** [F.A.Q.](https://github.com/mgp25/Instagram-API/wiki/FAQ)

**Do you like this project? Support it by donating**
- ![Paypal](https://raw.githubusercontent.com/reek/anti-adblock-killer/gh-pages/images/paypal.png) Paypal: [Donate](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5ATYY8H9MC96E)
- ![btc](https://camo.githubusercontent.com/4bc31b03fc4026aa2f14e09c25c09b81e06d5e71/687474703a2f2f7777772e6d6f6e747265616c626974636f696e2e636f6d2f696d672f66617669636f6e2e69636f) Bitcoin: 1DCEpC9wYXeUGXS58qSsqKzyy7HLTTXNYe 

----------
## Installation

### Composer

```sh
composer require mgp25/instagram-php
```

```php
require("../vendor/autoload.php");
$instagram = new \InstagramAPI\Instagram();
```

If you want to test code that is in the master branch, which hasn't been pushed as a release, you can use master.

```
composer require mgp25/instagram-php dev-master
```


### Don't have Composer?

You can download it here: [https://getcomposer.org/](https://getcomposer.org/)

## Examples

All examples can be found [here](https://github.com/mgp25/Instagram-API/tree/master/examples)


## Legal

This code is in no way affiliated with, authorized, maintained, sponsored or endorsed by Instagram or any of its affiliates or subsidiaries. This is an independent and unofficial API. Use at your own risk.