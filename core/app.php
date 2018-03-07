<?php

namespace App\Core;

class App
{
	/**
	 * All registered keys
	 *
	 * @var array
	 */
	protected static $registery = [];

	/**
	 * Bind a new key/value into the container
	 *
	 * @param  string $key
	 * @param  mixed $value
	 */
	public static function bind($key, $value)
	{
		static::$registery[$key] = $value;
	}

	/**
	 * Get the value from the rgistry.
	 *
	 * @param  string $key
	 */
	public static function get($key)
	{
		if (! array_key_exists($key, static::$registery)) {
			throw new Expection("No {$key} is bound in the container.");
		}
		return static::$registery[$key];
	}
}
