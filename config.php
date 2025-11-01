<?php
// config.php
declare(strict_types=1);

if (!function_exists('is_active')) {
    function is_active(string $page): string {
        $current = basename($_SERVER['SCRIPT_NAME']);
        return ($current === $page) ? 'active' : '';
    }
}