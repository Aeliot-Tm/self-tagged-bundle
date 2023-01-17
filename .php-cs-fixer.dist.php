<?php

declare(strict_types=1);

use PhpCsFixer\Finder;

$finder = (new Finder())
    ->in('src')
    ->in('tests')
    ->append([
        '.php-cs-fixer.dist.php',
    ]);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'class_definition' => [
            'single_item_single_line' => true,
        ],
        'concat_space' => [
            'spacing' => 'none',
        ],
        'declare_strict_types' => true,
        'is_null' => true,
        'no_superfluous_elseif' => true,
        'no_superfluous_phpdoc_tags' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'strict_param' => true,
        'void_return' => true,
    ])
    ->setFinder($finder);
