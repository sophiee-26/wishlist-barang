<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            
            .bg-gradient-animated {
                background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
            }
            
            .animate-slide-up {
                animation: slideUp 0.6s ease-out;
            }
            
            .animate-float {
                animation: float 3s ease-in-out infinite;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased overflow-x-hidden">
        <div class="min-h-screen bg-gradient-animated flex items-center justify-center pt-6 sm:pt-0 relative overflow-hidden">
            <!-- Decorative shapes -->
            <div class="absolute top-0 left-0 w-96 h-96 bg-white opacity-10 rounded-full -ml-48 -mt-48 animate-float"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white opacity-10 rounded-full -mr-48 -mb-48 animate-float" style="animation-delay: 1s;"></div>
            
            <div class="w-full sm:max-w-md z-10">
                <div class="text-center mb-8 animate-slide-up">
                    <h1 class="text-4xl font-bold text-white mb-2">✨ Wishlist</h1>
                    <p class="text-white text-opacity-80">Kelola barang impian Anda dengan elegan</p>
                </div>

                <div class="w-full px-6 py-8 bg-white shadow-2xl overflow-hidden rounded-2xl backdrop-blur-sm animate-slide-up" style="animation-delay: 0.2s;">
                    {{ $slot }}
                </div>
                
                <p class="text-center text-white text-opacity-80 mt-8 text-sm">
                    {{ config('app.name') }} © 2026
                </p>
            </div>
        </div>
    </body>
</html>
