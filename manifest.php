<?php
/**
 * Dynamic Manifest - Auto-versioned icons
 */

header('Content-Type: application/json');
header('Cache-Control: no-cache, no-store, must-revalidate');

// Read current version
$versionFile = __DIR__ . '/version.json';
$version = '2.1.0'; // Fallback

if (file_exists($versionFile)) {
    $data = json_decode(file_get_contents($versionFile), true);
    $version = $data['version'] ?? '2.1.0';
}

// Output manifest with versioned icons
$manifest = [
    "name" => "CineShelf",
    "short_name" => "CineShelf",
    "description" => "Physical Media Collection Manager",
    "start_url" => "/",
    "display" => "standalone",
    "background_color" => "#0f0f0f",
    "theme_color" => "#667eea",
    "orientation" => "portrait-primary",
    "icons" => [
        [
            "src" => "/app-icon.png?v=" . $version,
            "sizes" => "512x512",
            "type" => "image/png",
            "purpose" => "any maskable"
        ],
        [
            "src" => "/app-icon.png?v=" . $version,
            "sizes" => "192x192",
            "type" => "image/png"
        ],
        [
            "src" => "/app-icon.png?v=" . $version,
            "sizes" => "144x144",
            "type" => "image/png"
        ]
    ]
];

echo json_encode($manifest, JSON_PRETTY_PRINT);