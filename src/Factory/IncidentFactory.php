<?php

namespace App\Factory;

use App\Entity\Incident;
use App\Repository\IncidentRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Incident>
 *
 * @method static Incident|Proxy createOne(array $attributes = [])
 * @method static Incident[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Incident[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Incident|Proxy find(object|array|mixed $criteria)
 * @method static Incident|Proxy findOrCreate(array $attributes)
 * @method static Incident|Proxy first(string $sortedField = 'id')
 * @method static Incident|Proxy last(string $sortedField = 'id')
 * @method static Incident|Proxy random(array $attributes = [])
 * @method static Incident|Proxy randomOrCreate(array $attributes = [])
 * @method static Incident[]|Proxy[] all()
 * @method static Incident[]|Proxy[] findBy(array $attributes)
 * @method static Incident[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Incident[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static IncidentRepository|RepositoryProxy repository()
 * @method Incident|Proxy create(array|callable $attributes = [])
 */
final class IncidentFactory extends ModelFactory
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
            'description' => self::faker()->realText(100),
            'type' => self::faker()->realText(10),
            'identifiant' => self::faker()->realText(10),
            'action' => ActionFactory::randomOrCreate(),

        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Incident $incident): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Incident::class;
    }
}
