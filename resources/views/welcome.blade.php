<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bitcoin Tracker</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Tailwind CSS styles */
            /* Your existing styles */
            .spline-container {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 0; /* Send to back */
            }

            :root {
                --bg-body: rgba(25, 25, 25, 1);
                --bg-body-hover: rgba(33, 33, 33, 1);
                --bg-button: rgba(255, 255, 255, 0);
                --bg-button-hover: rgba(255, 255, 255, 0.05);
                --bg-button-active: rgba(255, 255, 255, 1.0);
                --bg-mask: rgba(255, 255, 255, 0.5);
                --bg-mask-hover: rgba(255, 255, 255, 1.0);
                --border-button: rgba(255, 255, 255, 0.2);
                --border-button-hover: rgba(255, 255, 255, 1.0);
                --color-button: rgba(255, 255, 255, 0.6);
                --color-button-hover: rgba(255, 255, 255, 1.0);
                --color-button-active: var(--body-bg);
                --font-button: "Varela Round", sans-serif;
                --shadow-button-hover: 0 0 0.3125rem rgba(255, 255, 255, 0.8);
                --transition-easing: cubic-bezier(0.19, 1, 0.22, 1);
            }

            body {
                align-items: center;
                background-color: var(--bg-body);
                background-image: var(--bg-body-gradient);
                display: flex;
                height: 100vh;
                justify-content: center;
                margin: 0;
                padding: 0;
                transition: background-color 2s var(--transition-easing);
            }

            body.hover {
                background-color: var(--bg-body-hover);
            }

            .button {
                background-color: var(--bg-button);
                border: 0.125rem solid var(--border-button);
                cursor: pointer;
                letter-spacing: 0.2125rem;
                line-height: 1;
                overflow: hidden;
                padding: 0.5rem 1rem; /* Reduced padding for smaller buttons */
                position: relative;
                text-align: center;
                text-transform: uppercase;
                transition: 
                    background-color 0.3s var(--transition-easing),
                    border 1s var(--transition-easing),
                    color 0.6s var(--transition-easing);
                user-select: none;
                margin: 0 0.5rem; /* Added margin for spacing between buttons */
                display: inline-block; /* Display buttons inline */
            }

            .button a {
                color: var(--color-button);
                font-family: var(--font-button);
                position: relative;
                text-decoration: none;
                white-space: nowrap;
                z-index: 2;
            }

            .button .mask {
                background-color: var(--bg-mask);
                height: 3.125rem; /* Reduced height for smaller buttons */
                position: absolute;
                transform: translate3d(-120%, -3.125rem, 0) rotate3d(0, 0, 1, 45deg);
                transition: all 1.1s var(--transition-easing);
                width: 6.25rem; /* Reduced width for smaller buttons */
                z-index: 1;
            }

            .button .shift {
                display: inline-block;
                transition: all 1.1s var(--transition-easing);
                vertical-align: text-top;
            }

            .button:hover {
                background-color: var(--bg-button-hover);
                border-color: var(--border-button-hover);
                box-shadow: var(--shadow-button-hover);
            }

            .button:hover a {
                color: var(--color-button-hover);
            }

            .button:hover .mask {
                background-color: var(--bg-mask-hover);
                transform: translate3d(120%, -6.25rem, 0) rotate3d(0, 0, 1, 90deg);
            }

            .button:hover .shift {
                transform: translateX(0.3125rem);
            }

            .button:active {
                background-color: var(--bg-button-active);
            }

            .button:active a {
                color: var(--color-button-active);
            }

            .login-register-container {
                position: absolute;
                bottom: 12rem; /* Increased bottom position */
                right: 15rem;  /* Increased right position */
                display: flex;
                gap: 1rem; /* Added gap between buttons */
                align-items: center;
            }
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div id="background" class="spline-container">
                <iframe src="https://my.spline.design/bitcoinhit50k-a3d55f3d47f74d27ae1bcf51757cfceb/" frameborder="0" width="100%" height="100%"></iframe>
            </div>
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                        </div>
                    </header>
                </div>
            </div>

            <div class="login-register-container">
                @if (Route::has('login'))
                    @auth
                        <div class="button">
                            <a href="{{ url('/dashboard') }}">
                                Dashboard 
                                <span class="shift">›</span>
                            </a>
                            <div class="mask"></div>
                        </div>
                    @else
                        <div class="button">
                            <a href="{{ route('login') }}">
                                Login 
                                <span class="shift">›</span>
                            </a>
                            <div class="mask"></div>
                        </div>

                        @if (Route::has('register'))
                            <div class="button">
                                <a href="{{ route('register') }}">
                                    Register 
                                    <span class="shift">›</span>
                                </a>
                                <div class="mask"></div>
                            </div>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        <!-- Preloading and caching -->
        <link rel="preload" href="https://my.spline.design/bitcoinhit50k-a3d55f3d47f74d27ae1bcf51757cfceb/" as="document">
        <script>
            // Ensure iframe loads quickly by preloading and caching
            const sceneUrl = 'https://my.spline.design/bitcoinhit50k-a3d55f3d47f74d27ae1bcf51757cfceb/';

            // Check if the scene is already cached in sessionStorage
            if (!sessionStorage.getItem('splineSceneLoaded')) {
                const iframe = document.createElement('iframe');
                iframe.src = sceneUrl;
                iframe.style.display = 'none';
                document.body.appendChild(iframe);

                iframe.onload = () => {
                    sessionStorage.setItem('splineSceneLoaded', 'true');
                };
            }

            // Add hover effect to body
            const body = document.body;
            const btns = document.querySelectorAll('.button');

            btns.forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    body.classList.add('hover');
                });

                btn.addEventListener('mouseleave', () => {
                    body.classList.remove('hover');
                });
            });
        </script>
    </body>
</html>
