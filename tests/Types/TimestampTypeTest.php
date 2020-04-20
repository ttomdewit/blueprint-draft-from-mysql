<?php

namespace Tests\Types;

use Carbon\Carbon;
use DateTime;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class TimestampTypeTest extends TestCase
{
    /**
     * @var AbstractPlatform|MockObject
     */
    private $platform;

    /**
     * @var Type
     */
    private $type;

    protected function setUp(): void
    {
        parent::setUp();

        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);

        $this->type = Type::getType('timestamp');
    }

    public function test_it_returns_correct_sql_declaration(): void
    {
        // Given
        $sqlDeclaration = 'TIMESTAMP';
        
        // Then
        $this->assertEquals($this->type->getSQLDeclaration([], $this->platform), $sqlDeclaration);
    }

    public function test_it_returns_correct_name(): void
    {
        // Given
        $name = 'timestamp';

        // Then
        $this->assertEquals($name, $this->type->getName());
    }

    public function test_it_returns_null_php_value(): void
    {
        $this->assertNull($this->type->convertToPHPValue(null, $this->platform));
    }

    public function test_it_returns_correct_php_value(): void
    {
        Carbon::setTestNow('2020-04-20 00:00:00');

        // Given
        $value = '2020-04-20 00:00:00';

        // Then
        $this->assertInstanceOf(DateTime::class, $this->type->convertToPHPValue($value, $this->platform));
        $this->assertEquals(DateTime::createFromFormat('Y-m-d H:i:s', $value), $this->type->convertToPHPValue($value, $this->platform));
    }

    public function test_it_throws_exception_when_incorrect_format_is_used(): void
    {
        $this->expectException(ConversionException::class);

        // Given
        $value = 'incorrect format';

        // Then
        $this->type->convertToPHPValue($value, $this->platform);
    }

    public function test_it_returns_correctly_converted_database_value(): void
    {
        Carbon::setTestNow('2020-04-20 00:00:00');

        // Given
        $value = '2020-04-20 00:00:00';

        // Then
        $this->assertEquals($value, $this->type->convertToDatabaseValue(Carbon::make('2020-04-20 00:00:00'), $this->platform));
    }
}
