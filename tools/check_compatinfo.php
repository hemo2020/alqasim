<?php
// Diagnostic helper for PHP_CompatInfo_Parser availability
// Run: php tools\check_compatinfo.php

echo "=== PHP CompatInfo diagnostic ===\n";
echo "PHP version: " . PHP_VERSION . "\n";
$ini = php_ini_loaded_file();
echo "Loaded php.ini: " . ($ini ?: '(none)') . "\n";
echo "openssl.cafile: " . ini_get('openssl.cafile') . "\n";
echo "curl.cainfo: " . ini_get('curl.cainfo') . "\n";

// Try to load Composer autoload so shim (if added) is available
$autoload = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
if (file_exists($autoload)) {
    require $autoload;
    echo "Loaded Composer autoload: $autoload\n";
} else {
    echo "Composer autoload not found at: $autoload\n";
}

// Check class existence
$target = 'PHP_CompatInfo_Parser';
echo "\nChecking class_exists('$target')... ";
if (class_exists($target)) {
    echo "FOUND\n";
} else {
    echo "NOT FOUND\n";
}

// Check composer.json for bartlett/php-compatinfo
$root = __DIR__ . DIRECTORY_SEPARATOR . '..';
$composerJson = $root . DIRECTORY_SEPARATOR . 'composer.json';
if (file_exists($composerJson)) {
    $cj = json_decode(file_get_contents($composerJson), true);
    $reqs = isset($cj['require']) ? $cj['require'] : [];
    echo "\ncomposer.json contains bartlett/php-compatinfo? ";
    if (isset($reqs['bartlett/php-compatinfo'])) {
        echo "YES => " . $reqs['bartlett/php-compatinfo'] . "\n";
    } else {
        echo "NO\n";
    }
} else {
    echo "\ncomposer.json not found in project root\n";
}

// Scan vendor for compatinfo
$vendorDir = $root . DIRECTORY_SEPARATOR . 'vendor';
$found = [];
if (is_dir($vendorDir)) {
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($vendorDir));
    foreach ($it as $file) {
        if ($file->isFile()) {
            $fn = strtolower($file->getFilename());
            $p = strtolower($file->getPathname());
            if (strpos($p, 'compatinfo') !== false || strpos($fn, 'compatinfo') !== false) {
                $found[] = $file->getPathname();
            }
        }
    }
}

echo "\nVendor scan for 'compatinfo' found: " . (count($found) ? count($found) : 0) . " matches\n";
if (count($found)) {
    foreach (array_slice($found, 0, 20) as $f) {
        echo " - " . $f . "\n";
    }
    if (count($found) > 20) echo " - and more...\n";
}

// Quick suggestions
echo "\nNext steps (choose one):\n";
echo "1) Fix PHP/cURL CA bundle so Composer can download packages:\n";
echo "   - Copy the project's cacert.pem to a permanent location, e.g. C:\\xampp\\php\\extras\\ssl\\cacert.pem\n";
echo "   - Edit your php.ini (see Loaded php.ini above) and set these lines:\n";
echo "       [curl]\n       curl.cainfo = \"C:\\\\xampp\\\\php\\\\extras\\\\ssl\\\\cacert.pem\"\n";
echo "       [openssl]\n       openssl.cafile = \"C:\\\\xampp\\\\php\\\\extras\\\\ssl\\\\cacert.pem\"\n";
echo "   - Restart Apache / PHP and run in PowerShell in project root:\n";
echo "       composer require bartlett/php-compatinfo\n";

echo "2) If you can't modify php.ini, run Composer in PowerShell with COMPOSER_CAFILE env var (temporary):\n";
echo "       \$env:COMPOSER_CAFILE = 'C:\\\\path\\\\to\\\\cacert.pem'; composer require bartlett/php-compatinfo\n";

echo "3) If the project already references the class and you need a fast guard, open the file that instantiates 'PHP_CompatInfo_Parser' and add:\n";
echo "       if (!class_exists('PHP_CompatInfo_Parser')) { throw new \RuntimeException('PHP_CompatInfo_Parser not found. Run: composer require bartlett/php-compatinfo'); }\n";

echo "\nIf you want, paste the stack trace or the file path that triggers the 'Use of unknown class: PHP_CompatInfo_Parser' message and I'll prepare a small patch to add a guard or correct the namespaced class name.\n";

echo "\nDone.\n";
