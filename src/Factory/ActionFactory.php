<?php

namespace App\Factory;

use App\Entity\Action;
use App\Repository\ActionRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Action>
 *
 * @method static Action|Proxy createOne(array $attributes = [])
 * @method static Action[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Action[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Action|Proxy find(object|array|mixed $criteria)
 * @method static Action|Proxy findOrCreate(array $attributes)
 * @method static Action|Proxy first(string $sortedField = 'id')
 * @method static Action|Proxy last(string $sortedField = 'id')
 * @method static Action|Proxy random(array $attributes = [])
 * @method static Action|Proxy randomOrCreate(array $attributes = [])
 * @method static Action[]|Proxy[] all()
 * @method static Action[]|Proxy[] findBy(array $attributes)
 * @method static Action[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Action[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ActionRepository|RepositoryProxy repository()
 * @method Action|Proxy create(array|callable $attributes = [])
 */
final class ActionFactory extends ModelFactory
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
            'code_source' => self::faker()->realText(100),
            'description' => self::faker()->realText(100),
            'onglet'=>  OngletFactory :: randomOrCreate(),
            'incident'=>  IncidentFactory :: randomOrCreate(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Action $action): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Action::class;
    }
}
