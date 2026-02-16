<?php

namespace Jane\Component\OpenApiCommon\Naming;

class OperationNamingHelper
{
    private const RESERVED_KEYWORDS = [
        '__halt_compiler', 'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class',
        'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty',
        'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends',
        'final', 'finally', 'fn', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements',
        'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'match',
        'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'readonly', 'require',
        'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var',
        'while', 'xor', 'yield',
    ];

    public static function isReserved(string $name): bool
    {
        return in_array(strtolower($name), self::RESERVED_KEYWORDS, true);
    }

    public static function suffixIfReserved(string $name, string $suffix = 'Endpoint'): string
    {
        if (self::isReserved($name)) {
            return $name . $suffix;
        }

        return $name;
    }
}
