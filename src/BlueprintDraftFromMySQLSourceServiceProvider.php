<?php

namespace BlueprintDraftFromMySQLSource;

use BlueprintDraftFromMySQLSource\Types\TimestampType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class BlueprintDraftFromMySQLSourceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (!Type::hasType(TimestampType::TIMESTAMP)) {
            Type::addType(TimestampType::TIMESTAMP, TimestampType::class);

            /** @var Connection $connection */
            $connection = DB::connection();

            /** @var AbstractSchemaManager $doctrineSchemaManager */
            $doctrineSchemaManager = $connection->getDoctrineSchemaManager();

            /** @var AbstractPlatform $platform */
            $platform = $doctrineSchemaManager->getDatabasePlatform();

            $platform->registerDoctrineTypeMapping('db_timestamp', TimestampType::TIMESTAMP);
        }
    }
}
