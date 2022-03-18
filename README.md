# lumen-generator

- base on [ biliboobrian/lumen-angular-code-generator](https://github.com/biliboobrian/lumen-angular-code-generator)


Model, controller provider and service generator for lumen 5+ from DB schema.

## Installation

Use composer to install it in your lumen project.

`composer require xiashaung/lumen-generator`

Modify your bootstrap/app.php providers to add generators to Artisan.


```php
$app->register(Xiashaung\lumenGenerator\Provider\GeneratorServiceProvider::class);
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
