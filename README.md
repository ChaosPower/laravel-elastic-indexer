# WARNING

This package is currently in development stage.
Use at your own risk.

# Laravel Elastic Indexer

TODO: Package Intro

# Requirements

- PHP 5.5
- PHP 5.6
- ElasticSearch 1.7
- ElasticSearch 2.0
- Laravel 5.1

# Features

- Automatic Indexing

# Installation

```
composer require chaospower/laravel-elastic-indexer
```

Go to your project root where artisan.php is found. Then publish the vendor package
```
php artisan vendor:publish
```

Edit your config/app.php then add the provider

```
ElasticEqb\Providers\ElasticProvider::class
```

# Using Elastic Indexer

All models should use and implement DoesElasticIndexer.
Doing so will allow the service to listen to specific models
and CRUD the Elastic side of the model. It will also do the elastic map automatically.

```
/**
 * Class Agency
 *
 * @package Travel\Models
 */
class Agency extends Model implements DoesElasticIndexer
{
    use DoesElasticIndexer;
}
```

# Milestones

- ElasticBuilder
- ElasticSchemaBuilder

# TODOs
Give ability to listen to all models not having the instance of DoesElasticIndexer

# Plans

Convert package as a Laravel Database