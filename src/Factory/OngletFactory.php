<?php

namespace App\Factory;

use App\Entity\Onglet;
use App\Repository\OngletRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Onglet>
 *
 * @method static Onglet|Proxy createOne(array $attributes = [])
 * @method static Onglet[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Onglet[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Onglet|Proxy find(object|array|mixed $criteria)
 * @method static Onglet|Proxy findOrCreate(array $attributes)
 * @method static Onglet|Proxy first(string $sortedField = 'id')
 * @method static Onglet|Proxy last(string $sortedField = 'id')
 * @method static Onglet|Proxy random(array $attributes = [])
 * @method static Onglet|Proxy randomOrCreate(array $attributes = [])
 * @method static Onglet[]|Proxy[] all()
 * @method static Onglet[]|Proxy[] findBy(array $attributes)
 * @method static Onglet[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Onglet[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static OngletRepository|RepositoryProxy repository()
 * @method Onglet|Proxy create(array|callable $attributes = [])
 */
final class OngletFactory extends ModelFactory
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
            'nom' => self::faker()->realText(10),
            'description' => self::faker()->realText(100),
            'module'=> ModuleFactory::randomOrCreate(),
            'action' => ActionFactory::randomOrCreate(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Onglet $onglet): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Onglet::class;
    }
}
