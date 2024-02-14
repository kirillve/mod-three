<?php

$rules = [
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'],
    'multiline_whitespace_before_semicolons' => false,
    'echo_tag_syntax' => true,
    'no_unused_imports' => true,
    'not_operator_with_successor_space' => false,
    'no_useless_else' => true,
    'ordered_imports' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_indent' => true,
    'phpdoc_no_package' => true,
    'phpdoc_order' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_trim' => true,
    'phpdoc_var_without_name' => true,
    'phpdoc_to_comment' => true,
    'single_quote' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline' => true,
    'trim_array_spaces' => true,
    'blank_line_before_statement' => true,
    'method_argument_space' => [
        'keep_multiple_spaces_after_comma' => true,
        'on_multiline' => 'ensure_fully_multiline',
    ],
];

return (new PhpCsFixer\Config())
    ->setRules($rules)->setFinder((PhpCsFixer\Finder::create())->exclude([
            'bootstrap/cache',
            'storage',
            'vendors',
        ])->in(__DIR__));
