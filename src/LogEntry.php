<?php declare(strict_types = 1);

namespace Mangoweb\Tester\LogTester;

use Tester\Assert;

class LogEntry
{
	/** @var string */
	public $level;

	/** @var string */
	public $message;

	/** @var array */
	public $context;


	public function __construct(string $level, string $message, array $context = [])
	{
		$this->level = $level;
		$this->message = $message;
		$this->context = $context;
	}


	public function assertLevel(string $level): self
	{
		Assert::same($level, $this->level);

		return $this;
	}


	public function assertMessage(string $message): self
	{
		Assert::same($message, $this->message);

		return $this;
	}


	public function assertContext(array $context): self
	{
		Assert::equal($context, $this->context);

		return $this;
	}


	public function assertContextItem(string $key, $value): self
	{
		Assert::true(isset($this->context[$key]));
		Assert::equal($value, $this->context[$key]);

		return $this;
	}


	public function assertContextItemType(string $key, string $type): self
	{
		Assert::true(isset($this->context[$key]));
		Assert::type($type, $this->context[$key]);

		return $this;
	}
}
