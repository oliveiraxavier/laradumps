<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Rector\Set\ValueObject\DowngradeSetList;
use Rector\Set\ValueObject\DowngradeLevelSetList;
use Rector\Core\ValueObject\PhpVersion;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;



return static function (RectorConfig $rectorConfig): void {

   
	$rectorConfig->phpVersion(PhpVersion::PHP_73);
	// register a single rule
	    //$rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
	//    $rectorConfig->rule(TypedPropertyRector::class);

	// define sets of rules
	//$rectorConfig->sets([
		//LevelSetList::UP_TO_PHP_74
	//	]);
	$rectorConfig->sets([
		DowngradeSetList::PHP_73,
		DowngradeLevelSetList::DOWN_TO_PHP_73
	]);
    	
    	$rectorConfig->paths([
		__DIR__ . '/src'
	]);
	
};
