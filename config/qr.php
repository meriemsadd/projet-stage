<?php

return [

    /*
    |--------------------------------------------------------------------------
    | QR Code Backend
    |--------------------------------------------------------------------------
    |
    | Le backend utilisé pour générer les QR codes. Options possibles :
    | - 'gd' : utilise la librairie GD (recommandé si Imagick n'est pas installé)
    | - 'imagick' : utilise Imagick (doit être installé sur le serveur)
    |
    */

    'backend' => env('QR_CODE_BACKEND', 'gd'),

    /*
    |--------------------------------------------------------------------------
    | Taille par défaut du QR Code
    |--------------------------------------------------------------------------
    |
    | La taille en pixels du QR code généré.
    |
    */

    'size' => 300,

    /*
    |--------------------------------------------------------------------------
    | Format d'image
    |--------------------------------------------------------------------------
    |
    | Le format de l'image générée : 'png', 'jpg', 'svg', etc.
    |
    */

    'format' => 'png',

    /*
    |--------------------------------------------------------------------------
    | Qualité de compression (pour PNG/JPG)
    |--------------------------------------------------------------------------
    |
    | Définir la qualité de l'image générée (0-100)
    |
    */

    'quality' => 100,

];
