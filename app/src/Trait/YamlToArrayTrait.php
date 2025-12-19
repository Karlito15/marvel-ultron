<?php

declare(strict_types=1);

namespace App\Trait;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml as Symfony;

trait YamlToArrayTrait
{
    /**
     * Parses a YAML file into a PHP value.
     *
     * @param string $filepath  The path to the YAML file to be parsed
     * @param int $flags        A bit field of PARSE_* constants to customize the YAML parser behavior
     * @return mixed            The YAML converted to a PHP value
     */
    public static function reader(string $filepath, int $flags = 0): array
    {
        $return = [];
        try {
            $return = Symfony::parseFile($filepath, $flags);
        } catch (ParseException $exception) {
            throw new ParseException($exception->getMessage());
        } finally {
            return $return;
        }
    }
}
