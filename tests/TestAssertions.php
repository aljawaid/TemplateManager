<?php

/**
 * Provides dependency-free assertions for TemplateManager's focused test suite.
 *
 * Related test files: every *Test.php file in this directory.
 */

function templateManagerAssertTrue($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function templateManagerAssertFalse($condition, $message)
{
    templateManagerAssertTrue(!$condition, $message);
}

function templateManagerAssertSame($expected, $actual, $message)
{
    if ($expected !== $actual) {
        throw new RuntimeException(
            $message . ' Expected ' . var_export($expected, true) . ', got ' . var_export($actual, true) . '.'
        );
    }
}

function templateManagerAssertContains($needle, $haystack, $message)
{
    templateManagerAssertTrue(strpos($haystack, $needle) !== false, $message);
}

function templateManagerAssertNotContains($needle, $haystack, $message)
{
    templateManagerAssertTrue(strpos($haystack, $needle) === false, $message);
}
