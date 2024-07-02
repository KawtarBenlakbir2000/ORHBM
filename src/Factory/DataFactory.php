<?php

namespace App\Factory;

use App\Entity\Data;
use App\Repository\DataRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Data>
 *
 * @method static Data|Proxy createOne(array $attributes = [])
 * @method static Data[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Data[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Data|Proxy find(object|array|mixed $criteria)
 * @method static Data|Proxy findOrCreate(array $attributes)
 * @method static Data|Proxy first(string $sortedField = 'id')
 * @method static Data|Proxy last(string $sortedField = 'id')
 * @method static Data|Proxy random(array $attributes = [])
 * @method static Data|Proxy randomOrCreate(array $attributes = [])
 * @method static Data[]|Proxy[] all()
 * @method static Data[]|Proxy[] findBy(array $attributes)
 * @method static Data[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Data[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static DataRepository|RepositoryProxy repository()
 * @method Data|Proxy create(array|callable $attributes = [])
 */
final class DataFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'nom' => self::faker()->realText(30),
            'type' => self::faker()->realText(10),
            'description' => self::faker()->realText(100),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Data $data): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Data::class;
    }
}
