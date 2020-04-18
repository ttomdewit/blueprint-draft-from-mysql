# Create a Blueprint draft file from a MySQL source

As per Blueprint's README:

> Blueprint is an open-source tool for rapidly generating multiple Laravel components from a single, human readable definition.

This add-on will read your existing database schema and create a [Blueprint draft](https://github.com/laravel-shift/blueprint/#defining-components) file based on said schema.
It's ultimate goal is to port existing codebases to the Laravel framework with as little effort as possible.

## Available Column Types

As per the [Laravel documentation](https://laravel.com/docs/7.x/migrations#creating-columns) the following column types are supported.

- [x] `bigIncrements`
- [ ] `bigInteger`
- [ ] `binary`
- [ ] `boolean`
- [ ] `char`
- [x] `date`
- [x] `dateTime`
- [ ] `dateTimeTz`
- [ ] `decimal`
- [ ] `double`
- [ ] `enum`
- [ ] `float`
- [ ] `geometry`
- [ ] `geometryCollection`
- [x] `increments`
- [ ] `integer`
- [ ] `ipAddress`
- [ ] `json`
- [ ] `jsonb`
- [ ] `lineString`
- [x] `longText`
- [ ] `macAddress`
- [ ] `mediumIncrements`
- [ ] `mediumInteger`
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
- [ ] `rememberToken`
- [ ] `set`
- [x] `smallIncrements`
- [ ] `smallInteger`
- [ ] `softDeletes`
- [ ] `softDeletesTz`
- [x] `string`
- [x] `text`
- [x] `time`
- [ ] `timeTz`
- [ ] `timestamp`
- [ ] `timestampTz`
- [ ] `timestamps`
- [ ] `timestampsTz`
- [ ] `tinyIncrements`
- [ ] `tinyInteger`
- [ ] `unsignedBigInteger`
- [ ] `unsignedDecimal`
- [ ] `unsignedInteger`
- [ ] `unsignedMediumInteger`
- [ ] `unsignedSmallInteger`
- [ ] `unsignedTinyInteger`
- [ ] `uuid`
- [ ] `year`

## Aliases

- [x] `id` See `bigIncrements`
- [ ] `foreignId` See `unsignedBigInteger`
- [ ] `nullableTimestamps` See `timestamps`