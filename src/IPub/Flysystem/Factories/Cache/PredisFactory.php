<?php
/**
 * PredisFactory.php
 *
 * @copyright      More in license.md
 * @license        http://www.ipublikuj.eu
 * @author         Adam Kadlec http://www.ipublikuj.eu
 * @package        iPublikuj:Flysystem!
 * @subpackage     Cache
 * @since          1.0.0
 *
 * @date           26.04.16
 */

namespace IPub\Flysystem\Factories\Cache;

use Nette;
use Nette\DI;
use Nette\Utils;

use League\Flysystem;
use League\Flysystem\Cached;

use Predis;

/**
 * Redis cache
 *
 * @package        iPublikuj:Flysystem!
 * @subpackage     Cache
 *
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 */
class PredisFactory
{
	/**
	 * @param Utils\ArrayHash $parameters
	 * @param DI\Container $container
	 *
	 * @return Cached\Storage\Predis
	 */
	public static function create(Utils\ArrayHash $parameters, DI\Container $container)
	{
		/** @var Predis\Client $client */
		$client = $parameters->client ? $container->getService($parameters->client) : NULL;

		return new Cached\Storage\Predis($client, $parameters->key, $parameters->expires);
	}
}
