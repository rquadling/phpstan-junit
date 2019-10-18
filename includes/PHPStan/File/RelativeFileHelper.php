<?php

declare(strict_types=1);

namespace PHPStan\File;

if (!interface_exists(RelativePathHelper::class)) {
    interface RelativePathHelper
    {
        public function getRelativePath(string $filename): string;
    }

    return RelativePathHelper::class;
}
