<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name','Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('oauth.login', ['provider' => 'google']) }}" class="text-sm text-gray-700 underline">Log in with Google</a>
                @endauth
            </div>

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 499 106"
                         preserveAspectRatio="xMidYMid meet"
                         fill="none"
                         class="h-16 w-auto text-gray-700 sm:h-20"
                         fill="#EF3B2D">

                        <g transform="translate(0.000000,106.000000) scale(0.100000,-0.100000)"
                           fill="#EF3B2D" stroke="none">
                            <path d="M398 1026 c-60 -24 -88 -47 -119 -100 -36 -63 -39 -138 -9 -205 11
-24 20 -45 20 -47 0 -2 -39 -5 -87 -6 l-88 -3 -42 -285 c-47 -323 -50 -355
-27 -364 26 -10 828 -7 844 4 12 7 8 51 -29 312 -24 167 -48 311 -53 321 -7
14 -22 17 -83 17 -41 0 -75 1 -75 3 0 1 9 26 20 55 34 90 24 161 -35 230 -55
66 -162 96 -237 68z m142 -68 c94 -48 111 -137 50 -260 -41 -81 -113 -198
-122 -198 -11 0 -117 176 -139 233 -34 86 -24 151 33 204 50 47 111 54 178 21z
m-192 -388 c26 -46 27 -50 8 -50 -8 0 -31 -15 -50 -34 -47 -43 -49 -90 -8
-134 30 -32 111 -62 169 -62 l34 0 -3 -107 -3 -108 -204 -3 -203 -2 5 32 c4
18 9 57 13 86 l7 52 123 0 124 0 0 30 0 30 -121 0 c-110 0 -120 2 -115 18 2 9
12 73 21 142 9 69 18 131 20 138 3 8 29 12 82 12 l78 0 23 -40z m412 31 c0 -5
3 -16 6 -25 5 -14 -6 -16 -80 -16 -79 0 -86 -2 -86 -20 0 -11 -7 -20 -15 -20
-20 0 -19 12 6 54 l21 36 74 0 c41 0 74 -4 74 -9z m29 -193 c7 -51 15 -103 18
-115 5 -23 5 -23 -121 -23 -115 0 -126 2 -126 18 0 11 14 24 38 35 38 17 72
61 72 94 0 10 -9 33 -20 51 l-20 32 74 0 73 0 12 -92z m-357 32 c22 -38 42
-38 70 0 26 36 48 38 83 7 31 -26 26 -51 -14 -71 -113 -59 -312 13 -219 78 34
24 61 19 80 -14z m388 -260 c4 -14 10 -44 14 -67 l6 -43 -140 0 -140 0 0 70 0
71 127 -3 c126 -3 127 -3 133 -28z"/>
                            <path d="M422 900 c-87 -53 -53 -180 48 -180 101 0 135 127 48 180 -18 11 -40
20 -48 20 -8 0 -30 -9 -48 -20z m85 -66 c9 -24 -10 -49 -37 -49 -27 0 -46 25
-37 49 9 22 65 22 74 0z"/>
                            <path d="M1765 751 c-108 -28 -175 -113 -175 -221 0 -158 146 -262 304 -216
152 44 211 224 116 354 -47 66 -162 105 -245 83z m126 -96 c44 -23 69 -71 69
-130 0 -90 -54 -145 -144 -145 -83 0 -148 87 -132 174 8 39 48 93 80 106 34
14 95 11 127 -5z"/>
                            <path d="M4725 746 c-62 -23 -95 -66 -95 -125 0 -70 24 -96 113 -122 109 -31
126 -39 133 -62 17 -53 -97 -76 -183 -37 l-43 19 -15 -29 c-8 -16 -15 -33 -15
-39 0 -19 94 -45 164 -45 118 -1 186 50 186 138 0 57 -45 97 -135 121 -38 10
-80 24 -92 32 -27 16 -30 45 -7 67 20 21 103 21 151 1 20 -8 37 -14 38 -13 1
2 7 18 13 36 10 30 9 33 -19 47 -44 23 -146 28 -194 11z"/>
                            <path d="M1160 530 l0 -220 45 0 45 0 0 60 0 60 53 0 52 0 40 -60 c39 -59 41
-60 88 -60 26 0 47 2 47 5 0 2 -20 33 -45 68 l-44 64 30 22 c64 48 75 150 24
217 -35 46 -101 64 -232 64 l-103 0 0 -220z m250 120 c28 -28 27 -93 -2 -120
-17 -16 -35 -20 -90 -20 l-68 0 0 80 0 80 70 0 c57 0 74 -4 90 -20z"/>
                            <path d="M2261 728 c-5 -13 -48 -110 -95 -217 -47 -107 -86 -196 -86 -198 0
-1 21 -3 46 -3 44 0 46 1 65 45 l20 45 105 0 105 0 19 -45 c19 -44 20 -45 65
-45 25 0 45 3 45 8 0 4 -42 102 -93 217 l-93 210 -47 3 c-41 3 -48 0 -56 -20z
m97 -170 l31 -78 -74 0 -73 0 36 85 c19 47 38 82 42 78 4 -4 21 -43 38 -85z"/>
                            <path d="M2610 530 l0 -222 133 4 c119 3 138 6 182 29 30 15 62 42 80 68 27
39 30 50 30 121 0 71 -3 82 -30 121 -18 26 -50 53 -80 68 -44 23 -63 26 -182
29 l-133 4 0 -222z m266 124 c35 -17 74 -81 74 -124 0 -13 -9 -43 -20 -66 -27
-55 -67 -74 -159 -74 l-71 0 0 140 0 140 71 0 c44 0 84 -6 105 -16z"/>
                            <path d="M3130 531 l0 -221 40 0 40 0 0 125 c0 69 3 125 8 125 4 0 34 -45 67
-100 79 -133 83 -133 166 7 l64 108 3 -133 3 -132 44 0 45 0 0 220 0 220 -39
0 -39 0 -78 -135 c-43 -74 -83 -134 -88 -132 -5 2 -43 61 -85 132 -75 126 -78
130 -114 133 l-37 3 0 -220z"/>
                            <path d="M3808 643 c-25 -60 -69 -159 -97 -220 l-50 -113 49 0 c48 0 48 0 66
45 l17 45 108 0 107 0 18 -45 c17 -45 17 -45 66 -45 27 0 48 4 46 9 -1 4 -45
103 -97 220 l-94 211 -46 0 -46 0 -47 -107z m124 -61 c15 -37 30 -75 34 -84 5
-16 -2 -18 -66 -18 -39 0 -70 4 -68 8 2 5 16 43 33 85 16 42 32 77 35 77 3 0
17 -30 32 -68z"/>
                            <path d="M4200 531 l0 -221 45 0 45 0 0 59 0 58 78 5 c135 8 192 55 192 158 0
65 -26 111 -78 136 -28 14 -67 19 -159 22 l-123 4 0 -221z m244 118 c35 -28
36 -80 1 -114 -21 -22 -33 -25 -90 -25 l-65 0 0 80 0 80 64 0 c49 0 69 -5 90
-21z"/>
                        </g>
                    </svg>

                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
