<?php declare(strict_types = 1);

namespace Mangoweb\Tester\LogTester\Bridges\Infrastructure;

use Mangoweb\Tester\Infrastructure\MangoTesterExtension;
use Mangoweb\Tester\LogTester\LogTester;
use Mangoweb\Tester\LogTester\TestLogger;
use Nette\DI\CompilerExtension;

class LogTesterExtension extends CompilerExtension
{
	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('logTester'))
			->setClass(LogTester::class);
		$builder->addDefinition($this->prefix('logTesterContainerHook'))
			->setClass(LogTesterContainerHook::class)
			->addTag(MangoTesterExtension::TAG_HOOK);
		$builder->addDefinition($this->prefix('logTesterTestCaseListener'))
			->setClass(LogTesterTestCaseListener::class);

		$builder->addDefinition($this->prefix('logger'))
			->setClass(TestLogger::class)
			->setDynamic()
			->addTag(MangoTesterExtension::TAG_REQUIRE);
	}
}
