<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Style Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #0d1117;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        #particles-js {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 0;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 35px 40px;
            max-width: 420px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
            z-index: 1;
            color: white;
        }
        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }
        .logo {
            width: 70px; height: 70px; margin: 0 auto 15px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 28px;
            color: white;
        }
        .login-header h2 {
            font-weight: 600;
            font-size: 26px;
            margin-bottom: 5px;
        }
        .login-header p {
            font-size: 14px;
            opacity: 0.8;
        }
        .input-group {
            margin-bottom: 20px;
            position: relative;
        }
        .input-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            font-size: 14px;
        }
        .input-group input {
            width: 100%;
            padding: 12px 15px 12px 40px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }
        .input-group input:focus {
            background: rgba(255, 255, 255, 0.25);
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 38px;
            color: #ddd;
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #4b6cb7, #182848);
            color: white;
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .login-btn:hover {
            background: linear-gradient(90deg, #3558a1, #121f3d);
            transform: translateY(-2px);
            box-shadow: 0px 5px 15px rgba(75, 108, 183, 0.4);
        }
    </style>
</head>
<body>

    <!-- Particle Lines Background -->
    <div id="particles-js"></div>

    <!-- Transparent Glass Login Form -->
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <i class="fas fa-user-lock"></i>
            </div>
            <h2>Welcome Back</h2>
            <p>Sign in to access your portfolio</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

    <!-- Particles.js Library -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 80, "density": { "enable": true, "value_area": 800 } },
                "color": { "value": "#ffffff" },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.5 },
                "size": { "value": 1.5, "random": true },
                "line_linked": { "enable": true, "distance": 150, "color": "#ffffff", "opacity": 0.4, "width": 1 },
                "move": { "enable": true, "speed": 3, "direction": "none", "random": false, "straight": false, "out_mode": "out" }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": { "enable": true, "mode": "grab" },
                    "onclick": { "enable": true, "mode": "push" }
                },
                "modes": {
                    "grab": { "distance": 200, "line_linked": { "opacity": 0.8 } },
                    "push": { "particles_nb": 4 }
                }
            },
            "retina_detect": true
        });
    </script>

</body>
</html>
