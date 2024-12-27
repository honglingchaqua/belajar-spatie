<!DOCTYPE html>  
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Laravel Authentication</title>  
    <!-- Fonts -->  
    <link rel="preconnect" href="https://fonts.bunny.net">  
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">  
    <!-- Tailwind CSS -->  
    <script src="https://cdn.tailwindcss.com"></script>  
    <style>  
        body {  
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);  
            background-size: 400% 400%;  
            animation: gradientBG 15s ease infinite;  
        }  
        @keyframes gradientBG {  
            0% {background-position: 0% 50%;}  
            50% {background-position: 100% 50%;}  
            100% {background-position: 0% 50%;}  
        }  
        .glassmorphism {  
            background: rgba(255, 255, 255, 0.2);  
            backdrop-filter: blur(10px);  
            border-radius: 16px;  
            border: 1px solid rgba(255, 255, 255, 0.125);  
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);  
        }  
        .hover-lift {  
            transition: transform 0.3s ease, box-shadow 0.3s ease;  
        }  
        .hover-lift:hover {  
            transform: translateY(-10px);  
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);  
        }  
    </style>  
</head>  
<body class="min-h-screen flex items-center justify-center font-sans overflow-hidden p-4">  
    <div class="glassmorphism w-full max-w-md mx-auto p-6 sm:p-8 relative z-10 transform transition-all duration-500 hover:scale-105">  
        <div class="text-center mb-6">  
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-2 tracking-wide">Inventory Agung Toyota Jambi 2</h1>  
        </div>  

        <div class="space-y-3 sm:space-y-4">  
            @if (Route::has('login'))  
                @auth  
                    <a href="{{ url('/dashboard') }}" class="w-full px-3 py-2 sm:px-4 sm:py-3 bg-blue-600 text-white text-center rounded-lg font-medium shadow-lg hover-lift hover:bg-blue-700 transition-colors duration-300 block">  
                        <span class="flex items-center justify-center text-sm sm:text-base">  
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">  
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />  
                            </svg>  
                            Go to Dashboard  
                        </span>  
                    </a>  
                @else  
                    <a href="{{ route('login') }}" class="w-full px-3 py-2 sm:px-4 sm:py-3 bg-white/20 text-white text-center rounded-lg font-medium shadow-lg hover-lift backdrop-blur-sm hover:bg-white/30 transition-colors duration-300 block">  
                        <span class="flex items-center justify-center text-sm sm:text-base">  
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">  
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.293 1.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />  
                            </svg>  
                            Log In  
                        </span>  
                    </a>  

                    @if (Route::has('register'))  
                        <a href="{{ route('register') }}" class="w-full px-3 py-2 sm:px-4 sm:py-3 bg-white/20 text-white text-center rounded-lg font-medium shadow-lg hover-lift backdrop-blur-sm hover:bg-white/30 transition-colors duration-300 block">  
                            <span class="flex items-center justify-center text-sm sm:text-base">  
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">  
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />  
                                </svg>  
                                Register  
                            </span>  
                        </a>  
                    @endif  
                @endauth  
            @endif  
        </div>  

        {{-- <footer class="mt-4 sm:mt-6 text-center text-xs text-white/50">  
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})  
        </footer>   --}}
    </div>  

    <!-- Decorative Background Elements -->  
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">  
        <div class="absolute top-0 right-0 w-48 sm:w-64 h-48 sm:h-64 bg-purple-500/30 rounded-full blur-3xl animate-pulse"></div>  
        <div class="absolute bottom-0 left-0 w-64 sm:w-80 h-64 sm:h-80 bg-blue-500/30 rounded-full blur-3xl animate-pulse delay-500"></div>  
    </div>  

    <canvas id="particle-canvas" class="fixed top-0 left-0 z-0 pointer-events-none"></canvas>  

<script>  
    const canvas = document.getElementById('particle-canvas');  
    const ctx = canvas.getContext('2d');  

    // Ukuran canvas  
    canvas.width = window.innerWidth;  
    canvas.height = window.innerHeight;  

    // Konfigurasi Mouse  
    const mouse = {  
        x: undefined,  
        y: undefined,  
        radius: 150 // Radius interaksi  
    };  

    // Event listener untuk pergerakan mouse  
    window.addEventListener('mousemove', (event) => {  
        mouse.x = event.x;  
        mouse.y = event.y;  
    });  

    // Kelas Particle dengan interaksi mouse  
    class Particle {  
        constructor() {  
            this.x = Math.random() * canvas.width;  
            this.y = Math.random() * canvas.height;  
            this.size = Math.random() * 3 + 1;  
            this.speedX = Math.random() * 2 - 1;  
            this.speedY = Math.random() * 2 - 1;  
            this.color = `rgba(255, 255, 255, ${Math.random() * 0.5})`;  
        }  

        update() {  
            // Pergerakan dasar  
            this.x += this.speedX;  
            this.y += this.speedY;  

            // Interaksi mouse - dorong partikel  
            if (mouse.x !== undefined && mouse.y !== undefined) {  
                let dx = mouse.x - this.x;  
                let dy = mouse.y - this.y;  
                let distance = Math.sqrt(dx * dx + dy * dy);  

                if (distance < mouse.radius) {  
                    // Partikel didorong menjauh dari mouse  
                    let forceDirectionX = dx / distance;  
                    let forceDirectionY = dy / distance;  
                    let maxDistance = mouse.radius;  
                    let force = (maxDistance - distance) / maxDistance;  
                    let directionX = forceDirectionX * force * 3;  
                    let directionY = forceDirectionY * force * 3;  

                    this.x -= directionX;  
                    this.y -= directionY;  
                }  
            }  

            // Batasi pergerakan dalam canvas  
            if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;  
            if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;  
        }  

        draw() {  
            ctx.beginPath();  
            ctx.fillStyle = this.color;  
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);  
            ctx.fill();  
        }  
    }  

    // Inisialisasi partikel  
    const particlesArray = [];  
    const numberOfParticles = 150;  

    function init() {  
        particlesArray.length = 0;  
        for (let i = 0; i < numberOfParticles; i++) {  
            particlesArray.push(new Particle());  
        }  
    }  

    // Fungsi animasi  
    function animate() {  
        ctx.clearRect(0, 0, canvas.width, canvas.height);  
        
        // Gambar garis koneksi antar partikel  
        for (let a = 0; a < particlesArray.length; a++) {  
            for (let b = a; b < particlesArray.length; b++) {  
                let dx = particlesArray[a].x - particlesArray[b].x;  
                let dy = particlesArray[a].y - particlesArray[b].y;  
                let distance = Math.sqrt(dx * dx + dy * dy);  

                // Gambar garis jika partikel berdekatan  
                if (distance < 80) {  
                    ctx.beginPath();  
                    ctx.strokeStyle = `rgba(255,255,255,${1 - distance/80})`;  
                    ctx.lineWidth = 0.5;  
                    ctx.moveTo(particlesArray[a].x, particlesArray[a].y);  
                    ctx.lineTo(particlesArray[b].x, particlesArray[b].y);  
                    ctx.stroke();  
                }  
            }  
        }  

        // Update dan gambar partikel  
        particlesArray.forEach(particle => {  
            particle.update();  
            particle.draw();  
        });  

        requestAnimationFrame(animate);  
    }  

    // Resize handler  
    window.addEventListener('resize', () => {  
        canvas.width = window.innerWidth;  
        canvas.height = window.innerHeight;  
        init();  
    });  

    // Mulai animasi  
    init();  
    animate();  
</script>
</body>  
</html>