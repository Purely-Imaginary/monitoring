<?php

namespace App\Interfaces;

interface ExecutableTestInterface {
    public function execute(string $url, string $method = 'GET'): array;
}
