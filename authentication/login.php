<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login | Warung Averroes POS</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-background": "#191c1e",
                        "on-secondary-fixed": "#0b1c30",
                        "on-secondary-container": "#54647a",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-fixed-variant": "#653e00",
                        "on-tertiary-fixed": "#2a1700",
                        "tertiary-fixed-dim": "#ffb95f",
                        "on-error-container": "#93000a",
                        "background": "#f7f9fb",
                        "secondary-fixed-dim": "#b7c8e1",
                        "tertiary": "#855300",
                        "on-primary-fixed-variant": "#005236",
                        "secondary": "#505f76",
                        "on-tertiary-container": "#523200",
                        "inverse-surface": "#2d3133",
                        "on-primary": "#ffffff",
                        "error": "#ba1a1a",
                        "outline": "#6c7a71",
                        "surface-container-low": "#f2f4f6",
                        "secondary-fixed": "#d3e4fe",
                        "on-tertiary": "#ffffff",
                        "on-secondary-fixed-variant": "#38485d",
                        "inverse-on-surface": "#eff1f3",
                        "surface-dim": "#d8dadc",
                        "surface-container-highest": "#e0e3e5",
                        "primary-fixed-dim": "#4edea3",
                        "primary-container": "#10b981",
                        "on-primary-fixed": "#002113",
                        "surface-variant": "#e0e3e5",
                        "primary-fixed": "#6ffbbe",
                        "on-error": "#ffffff",
                        "inverse-primary": "#4edea3",
                        "tertiary-container": "#e29100",
                        "primary": "#006c49",
                        "surface-container-high": "#e6e8ea",
                        "on-secondary": "#ffffff",
                        "surface": "#f7f9fb",
                        "secondary-container": "#d0e1fb",
                        "error-container": "#ffdad6",
                        "on-primary-container": "#00422b",
                        "tertiary-fixed": "#ffddb8",
                        "on-surface": "#191c1e",
                        "surface-tint": "#006c49",
                        "surface-bright": "#f7f9fb",
                        "on-surface-variant": "#3c4a42",
                        "outline-variant": "#bbcabf",
                        "surface-container": "#eceef0"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xs": "4px",
                        "margin": "24px",
                        "base": "4px",
                        "md": "16px",
                        "lg": "24px",
                        "sm": "8px",
                        "xl": "32px",
                        "gutter": "16px"
                    },
                    "fontFamily": {
                        "headline-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "price-display": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"],
                        "label-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "price-display": ["40px", {
                            "lineHeight": "48px",
                            "letterSpacing": "-0.03em",
                            "fontWeight": "800"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "headline-sm": ["20px", {
                            "lineHeight": "28px",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }],
                        "label-md": ["12px", {
                            "lineHeight": "16px",
                            "fontWeight": "500"
                        }],
                        "label-lg": ["14px", {
                            "lineHeight": "20px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .login-image-overlay {
            background: linear-gradient(to top, rgba(0, 108, 73, 0.8), rgba(0, 108, 73, 0.2));
        }
    </style>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <!-- Split Screen Layout -->
    <main class="w-full flex flex-row min-h-screen">
        <!-- Left Side: Login Form (Canvas) -->
        <section class="w-full lg:w-1/2 flex flex-col justify-center items-center px-lg sm:px-xl py-xl bg-white">
            <div class="max-w-md w-full space-y-xl">
                <!-- Branding Anchor -->
                <header class="space-y-sm">
                    <div class="flex items-center space-x-sm">
                        <div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-on-primary">
                            <span class="material-symbols-outlined" data-icon="store">store</span>
                        </div>
                        <h1 class="font-headline-md text-headline-md text-primary">Warung Averroes</h1>
                    </div>
                    <div class="space-y-xs">
                        <h2 class="font-headline-lg text-headline-lg text-on-surface">Welcome Back</h2>
                        <p class="font-body-md text-body-md text-on-secondary-container">Enter your credentials to access the POS terminal.</p>
                    </div>
                </header>
                <!-- Login Form -->
                <form class="space-y-lg" id="loginForm" onsubmit="event.preventDefault()">
                    <div class="space-y-md">
                        <!-- Email Field -->
                        <div class="space-y-xs">
                            <label class="font-label-lg text-label-lg text-on-surface-variant block" for="email">Email or Username</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-outline">
                                    <span class="material-symbols-outlined" data-icon="mail">mail</span>
                                </div>
                                <input class="w-full h-12 pl-10 pr-4 bg-surface-container-low border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary transition-all duration-200 outline-none font-body-md text-body-md" id="email" name="email" placeholder="owner@averroes.com" type="text" />
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="space-y-xs">
                            <label class="font-label-lg text-label-lg text-on-surface-variant block" for="password">Password</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-outline">
                                    <span class="material-symbols-outlined" data-icon="lock">lock</span>
                                </div>
                                <input class="w-full h-12 pl-10 pr-12 bg-surface-container-low border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary transition-all duration-200 outline-none font-body-md text-body-md" id="password" name="password" placeholder="••••••••" type="password" />
                                <button class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline hover:text-primary transition-colors" onclick="togglePassword()" type="button">
                                    <span class="material-symbols-outlined" data-icon="visibility" id="passwordIcon">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Helpers -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input class="h-5 w-5 rounded border-outline-variant text-primary focus:ring-primary-container cursor-pointer transition-all" id="remember" name="remember" type="checkbox" />
                            <label class="ml-2 block font-label-lg text-label-lg text-on-surface-variant cursor-pointer" for="remember">Remember me</label>
                        </div>
                        <a class="font-label-lg text-label-lg text-primary hover:text-on-primary-fixed-variant transition-colors" href="#">Forgot password?</a>
                    </div>
                    <!-- Actions -->
                    <button class="w-full h-12 bg-primary-container text-on-primary-container font-headline-sm text-headline-sm rounded-lg hover:brightness-110 active:scale-[0.98] transition-all duration-200 shadow-sm flex items-center justify-center space-x-sm" type="submit">
                        <span>Sign In</span>
                        <span class="material-symbols-outlined" data-icon="login">login</span>
                    </button>
                </form>
                <!-- Footer Link -->
                <footer class="text-center pt-md">
                    <p class="font-body-sm text-body-sm text-on-secondary-container">
                        Don't have an account?
                        <a class="text-primary font-label-lg hover:underline" href="./register.php">Register Store</a>
                    </p>
                </footer>
            </div>
        </section>
        <!-- Right Side: Brand Imagery -->
        <section class="hidden lg:block lg:w-1/2 relative overflow-hidden bg-slate-900">
            <img alt="Retail Environment" class="absolute inset-0 w-full h-full object-cover" data-alt="A high-end modern retail store interior captured in crisp daylight. The scene features clean minimalist wooden shelving units filled with artisanal local products. A sleek emerald green point-of-sale terminal sits on a white marble counter. The lighting is bright and airy, creating a professional and welcoming atmosphere that emphasizes reliability and modern efficiency. Subtle green accents throughout the shop floor unify the space with the brand's primary color palette." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCADB-YN8lnvek1eHY70tKiJI-zkZnSd37G8N7dPxFumERSrQqQ0NaHuvOGjOt93VUbNNKW1nHP3AVCcTr0EJc0qiyOgXMXgRV5TLjRyZMNJjBMGh29OuPqJkSsTv4Y9coPM-lV1q-C_FgdnhXdYa1zfOvbX43AFE93y3CZnC6nJL0XXSaCYwXpB2RaSzrLUZLqlzADafgNSB5GUDKJbvOysyyKQYqmGIasZ2bPqbaDRWQJRnEvRMfypNCJ0sylU8D6WuL_Ip0nIuuE" />
            <div class="absolute inset-0 login-image-overlay mix-blend-multiply opacity-40"></div>
            <!-- Floating Branding/Quote -->
            <div class="absolute bottom-12 left-12 right-12 p-lg bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl text-white">
                <blockquote class="space-y-md">
                    <div class="w-12 h-12 rounded-full bg-primary-container/30 border border-primary/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary-fixed" data-icon="format_quote">format_quote</span>
                    </div>
                    <p class="font-headline-sm text-headline-sm leading-relaxed">
                        "The fastest and most reliable terminal for neighborhood businesses. Warung Averroes streamlines our peak hours effortlessly."
                    </p>
                    <footer class="pt-sm">
                        <p class="font-label-lg text-label-lg font-bold">Aria Averroes</p>
                        <p class="font-body-sm text-body-sm opacity-80">Founder, Averroes Enterprises</p>
                    </footer>
                </blockquote>
            </div>
            <!-- Decorative Elements -->
            <div class="absolute top-12 right-12 flex space-x-md">
                <div class="flex items-center space-x-xs px-md py-sm bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-white font-label-md text-label-md">Server Online</span>
                </div>
            </div>
        </section>
    </main>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.innerText = 'visibility_off';
                passwordIcon.setAttribute('data-icon', 'visibility_off');
            } else {
                passwordInput.type = 'password';
                passwordIcon.innerText = 'visibility';
                passwordIcon.setAttribute('data-icon', 'visibility');
            }
        }

        // Simple button press interaction
        const loginBtn = document.querySelector('button[type="submit"]');
        loginBtn.addEventListener('click', function() {
            if (!document.getElementById('email').value || !document.getElementById('password').value) {
                this.classList.add('bg-error');
                setTimeout(() => this.classList.remove('bg-error'), 500);
            }
        });
    </script>
</body>

</html>