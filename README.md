# Create a Blueprint draft file from a MySQL source

As per Blueprint's README:

> Blueprint is an open-source tool for rapidly generating multiple Laravel components from a single, human readable definition.

This add-on will read your existing database schema and create a [Blueprint draft](https://github.com/laravel-shift/blueprint/#defining-components) file based on said schema.
It's ultimate goal is to port existing (legacy) projects to the Laravel framework with as little effort as possible.

## Available Column Types

As per the [Laravel documentation](https://laravel.com/docs/7.x/migrations#creating-columns) the following column types are supported.

- [x] `bigIncrements`
- [x] `bigInteger`
- [ ] `binary`
- [x] `boolean`
- [ ] `char`
- [x] `date`
- [x] `dateTime`
- [x] `dateTimeTz` Due to limitations it's rendered as `dateTime`
- [ ] `decimal`
- [ ] `double`
- [ ] `enum`
- [ ] `float`
- [ ] `geometry`
- [ ] `geometryCollection`
- [x] `increments`
- [x] `integer`
- [x] `ipAddress` Rendered as `string`
- [x] `json`
- [x] `jsonb` Rendered as `json`
- [ ] `lineString` Due to limitations in DBAL it's not supported
- [x] `longText`
- [x] `macAddress` Rendered as `string`
- [ ] `mediumIncrements`
- [x] `mediumInteger`
- [x] `mediumText`
- [ ] `morphs`
- [ ] `uuidMorphs`
- [ ] `multiLineString`
- [ ] `multiPoint`
- [ ] `multiPolygon`
- [ ] `nullableMorphs`
- [ ] `nullableUuidMorphs`
- [ ] `point`
- [ ] `polygon`
- [ ] `set`
- [x] `smallIncrements`
- [x] `smallInteger`
- [x] `string`
- [x] `text`
- [x] `time`
- [x] `timeTz`  Due to limitations it's rendered as `time`
- [x] `timestamp`
- [x] `timestampTz`
- [x] `tinyIncrements` Rendered as `boolean`
- [x] `tinyInteger` Rendered as `boolean`
- [x] `unsignedBigInteger` Rendered as `biginteger unsigned`
- [ ] `unsignedDecimal`
- [x] `unsignedInteger` Rendered as `integer unsigned`
- [x] `unsignedMediumInteger` Rendered as `integer unsigned`
- [x] `unsignedSmallInteger` Rendered as `smallinteger unsigned`
- [x] `unsignedTinyInteger` Rendered as `boolean unsigned`
- [x] `uuid` Rendered as `string`
- [x] `year` Rendered as `date`

## Aliases

- [x] `id` See `bigIncrements`
- [ ] `foreignId` See `unsignedBigInteger`
- [x] `nullableTimestamps` See `timestamp`
- [x] `timestamps` See `timestamps`
- [x] `timestampsTz` See `timestamp`
- [x] `softDeletes` See `timestamp`
- [x] `softDeletesTz` See `timestampTz`
- [ ] `rememberToken`

## Modifiers

- [ ] autoIncrement
- [ ] charset
- [ ] collation
- [ ] default
- [ ] nullable
- [ ] unsigned
- [ ] useCurrent
- [ ] always
- [ ] unique
- [ ] index
- [ ] primary
- [ ] foreign

## Example MySQL input and YAML output

```mysql
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(400) NOT NULL,
  `content` longtext NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

This YAML has been taken from [Blueprint's README](https://github.com/laravel-shift/blueprint#defining-components).

```yaml
models:
  Post:
    title: string:400
    content: longtext
    published_at: nullable timestamp
```

### Example relationships

```mysql
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(400) NOT NULL,
  `content` longtext NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `content` longtext NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_author_id_foreign` (`author_id`),
  KEY `comments_post_id_foreign` (`post_id`),
  CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```yaml
models:
  User:
    name: string
    created_at: nullable timestamp
    updated_at: nullable timestamp
  Post:
    title: string:400
    content: longtext
    published_at: nullable timestamp
  Comment:
    author_id: id:user
    post_id: id
    content: longtext
    published_at: nullable timestamp
```
