<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Talha | Portfolio</title>
    <link rel="shortcut icon" href="my logo.png" type="image/jpeg">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* ===== GLOBAL STYLES ===== */
        :root {
            --primary: #6C63FF;
            --primary-dark: #564FC7;
            --primary-light: #8B85FF;
            --secondary: #2D3748;
            --light: #F7FAFC;
            --dark: #1A202C;
            --gray: #718096;
            --light-gray: #EDF2F7;
            --success: #48BB78;
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            --card-shadow: 0 10px 30px -15px rgba(0, 0, 0, 0.2);
            --card-shadow-hover: 0 20px 30px -10px rgba(0, 0, 0, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--secondary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        section {
            padding: 5rem 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
            animation: fadeInDown 1s ease;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background: var(--gradient);
            bottom: -10px;
            left: 25%;
            border-radius: 2px;
            animation: stretch 1.5s ease-out infinite alternate;
        }

        @keyframes stretch {
            0% {
                transform: scaleX(1);
            }
            100% {
                transform: scaleX(1.1);
            }
        }

        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
            animation: fadeIn 1.5s ease;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            text-align: center;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.4);
            z-index: 1;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(108, 99, 255, 0.5);
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
            border: 1px solid var(--light-gray);
            box-shadow: 0 4px 15px rgba(203, 213, 224, 0.2);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(108, 99, 255, 0.2);
            color: var(--primary-dark);
        }

        .highlight {
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        /* ===== HEADER & NAVIGATION ===== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.4s ease;
            padding: 1rem 0;
            background-color: rgba(247, 250, 252, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(26, 32, 44, 0.1);
        }

        header.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 4px 20px rgba(26, 32, 44, 0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo span {
            color: var(--dark);
            margin-left: 5px;
        }

        .logo img {
            height: 40px;
            vertical-align: middle;
            margin-right: 8px;
            transition: transform 0.5s ease;
        }

        .logo:hover img {
            transform: rotate(15deg);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 2rem;
            position: relative;
        }

        .nav-links a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            background: var(--gradient);
            bottom: 0;
            left: 0;
            transition: width 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 2px;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* === Projects Dropdown (Desktop) === */
        .nav-links .dropdown {
            position: relative;
        }

        .nav-links .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            padding: 10px 0;
            list-style: none;
            display: none;
            box-shadow: var(--card-shadow);
            border-radius: 8px;
            min-width: 220px;
            z-index: 999;
            animation: fadeInUp 0.3s ease;
        }

        .nav-links .dropdown-menu li a {
            display: block;
            padding: 10px 20px;
            color: var(--dark);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .nav-links .dropdown-menu li a:hover {
            background-color: var(--light-gray);
            color: var(--primary);
            padding-left: 25px;
        }

        /* Show dropdown on desktop hover only */
        @media (min-width: 768px) {
            .nav-links .dropdown:hover .dropdown-menu {
                display: block;
            }
        }

        .hamburger {
            display: none;
            cursor: pointer;
            z-index: 1001;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background: var(--dark);
            margin: 5px;
            transition: all 0.3s ease;
            border-radius: 3px;
        }

        /* ===== HERO SECTION ===== */
        #hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--dark);
            line-height: 1.2;
            animation: fadeInDown 1s ease;
        }

        .hero-content h1 .highlight {
            font-weight: 700;
        }

        .hero-content p {
            font-size: clamp(1.25rem, 3vw, 1.75rem);
            margin-bottom: 2rem;
            min-height: 2.5rem;
            color: var(--gray);
            animation: fadeIn 1.5s ease;
        }

        .typewriter {
            display: inline-block;
            position: relative;
        }

        .typewriter::after {
            content: "|";
            position: absolute;
            right: -8px;
            animation: blink 0.7s infinite;
            color: var(--primary);
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        .hero-btns {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
            animation: fadeInUp 1.5s ease;
        }

        /* Floating animation for hero */
        .hero-content {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* Particles Background */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        /* ===== ABOUT SECTION ===== */
        #about {
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        #about::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 99, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            top: -200px;
            right: -200px;
            z-index: 0;
        }

        #about::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 99, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            bottom: -100px;
            left: -100px;
            z-index: 0;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .about-img {
            display: flex;
            justify-content: center;
            position: relative;
            animation: fadeInLeft 1s ease;
        }

        .profile-img {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: var(--card-shadow);
            transition: all 0.5s ease;
            position: relative;
            z-index: 2;
        }

        .profile-img:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(108, 99, 255, 0.3);
        }

        .about-img::before {
            content: '';
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            border: 2px dashed var(--primary);
            top: -15px;
            left: calc(50% - 160px);
            z-index: 1;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .about-text {
            animation: fadeInRight 1s ease;
        }

        .about-text h3 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .about-text p {
            margin-bottom: 1.5rem;
            color: var(--gray);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-top: 2rem;
        }

        .skill-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            border-radius: 8px;
            background: var(--light);
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .skill-item:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.1);
            background: white;
        }

        .skill-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
            transition: transform 0.3s ease;
        }

        .skill-item:hover .skill-icon {
            transform: scale(1.2);
        }

        .skill-name {
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* ===== SKILLS SECTION ===== */
        #skills {
            background-color: var(--light);
            position: relative;
            overflow: hidden;
        }

        #skills::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 99, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            top: -100px;
            left: -100px;
            z-index: 0;
        }

        .skills-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            position: relative;
            z-index: 1;
        }

        .skill-category {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-top: 3px solid var(--primary);
        }

        .skill-category:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--card-shadow-hover);
        }

        .skill-category h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
        }

        .skill-category h3 i {
            margin-right: 0.5rem;
            color: var(--primary);
        }

        .skill-bar {
            margin-bottom: 1.5rem;
        }

        .skill-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .skill-name {
            font-weight: 500;
        }

        .skill-percent {
            color: var(--gray);
        }

        .progress-bar {
            height: 8px;
            background: var(--light-gray);
            border-radius: 4px;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            background: var(--gradient);
            border-radius: 4px;
            transition: width 1s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .progress::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                to right, 
                rgba(255, 255, 255, 0) 0%, 
                rgba(255, 255, 255, 0.3) 50%, 
                rgba(255, 255, 255, 0) 100%
            );
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .design-tools {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .tool {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0.5rem;
            background: var(--light);
            border-radius: 8px;
            transition: all 0.3s ease;
            width: calc(33.333% - 0.67rem);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .tool:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.1);
            background: white;
        }

        .tool i {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 0.3rem;
            transition: transform 0.3s ease;
        }

        .tool:hover i {
            transform: scale(1.2);
        }

        .tool span {
            font-size: 0.8rem;
        }

        /* ===== SERVICES SECTION ===== */
        #services {
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        #services::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 99, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            bottom: -200px;
            right: -200px;
            z-index: 0;
        }

        .services-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            position: relative;
            z-index: 1;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-align: center;
            border-top: 3px solid var(--primary);
        }

        .service-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--card-shadow-hover);
        }

        .service-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
            transform: scale(1.2) rotate(10deg);
            color: var(--primary-dark);
        }

        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
            transition: color 0.3s ease;
        }

        .service-card:hover h3 {
            color: var(--primary);
        }

        .service-card p {
            color: var(--gray);
        }

        /* ===== CONTACT SECTION ===== */
        #contact {
            background-color: var(--light);
            position: relative;
            overflow: hidden;
        }

        #contact::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 99, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            top: -100px;
            right: -100px;
            z-index: 0;
        }

        .contact-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 3rem;
            position: relative;
            z-index: 1;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            animation: fadeInLeft 1s ease;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: all 0.3s ease;
            padding: 1rem;
            border-radius: 8px;
        }

        .contact-item:hover {
            background: white;
            transform: translateX(10px);
            box-shadow: var(--card-shadow);
        }

        .contact-icon {
            font-size: 1.5rem;
            color: var(--primary);
            margin-top: 0.3rem;
            transition: transform 0.3s ease;
        }

        .contact-item:hover .contact-icon {
            transform: scale(1.2);
        }

        .contact-text h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .contact-text p,
        .contact-text a {
            color: var(--gray);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .contact-text a:hover {
            color: var(--primary);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .social-link:hover {
            background: var(--gradient);
            color: white;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.3);
        }

        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            animation: fadeInRight 1s ease;
        }

        .contact-form:hover {
            box-shadow: var(--card-shadow-hover);
            transform: translateY(-5px);
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--light-gray);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            padding: 0.8rem;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.3);
        }

        .submit-btn:hover::before {
            opacity: 1;
        }

        /* ===== FOOTER ===== */
        footer {
            background: var(--dark);
            color: white;
            padding: 3rem 0 1.5rem;
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 99, 255, 0.1) 0%, rgba(26, 32, 44, 0) 70%);
            top: -100px;
            left: -100px;
            z-index: 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
            margin-bottom: 3rem;
            position: relative;
            z-index: 1;
        }

        .footer-col h3 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            position: relative;
            color: white;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 3px;
            background: var(--primary);
            bottom: -8px;
            left: 0;
        }

        .footer-col p {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .footer-social a:hover {
            background: var(--gradient);
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
            position: relative;
            z-index: 1;
        }

        /* ===== BACK TO TOP BUTTON ===== */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 5px 20px rgba(108, 99, 255, 0.4);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(108, 99, 255, 0.5);
        }

        /* ===== WHATSAPP FLOATING BUTTON ===== */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            left: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .whatsapp-float:hover {
            background-color: #128C7E;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.4);
        }

        .whatsapp-float i {
            margin-top: 5px;
        }

        /* ===== RESPONSIVE STYLES ===== */
        @media (max-width: 992px) {
            .about-content,
            .contact-container {
                grid-template-columns: 1fr;
            }

            .about-img {
                margin-bottom: 2rem;
            }

            .skills-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                right: -100%;
                top: 0;
                background: white;
                width: 80%;
                height: 100vh;
                flex-direction: column;
                align-items: center;
                padding: 5rem 0;
                box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
                transition: right 0.4s ease;
                z-index: 1000;
            }

            .nav-links.active {
                right: 0;
            }

            .nav-links li {
                margin: 1rem 0;
            }

            .hamburger {
                display: block;
            }

            .hamburger.active div:nth-child(1) {
                transform: rotate(-45deg) translate(-5px, 6px);
            }

            .hamburger.active div:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active div:nth-child(3) {
                transform: rotate(45deg) translate(-5px, -6px);
            }

            .skills-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .skills-container {
                grid-template-columns: 1fr;
            }

            .whatsapp-float {
                width: 50px;
                height: 50px;
                bottom: 30px;
                left: 30px;
                font-size: 24px;
            }
        }

        @media (max-width: 576px) {
            section {
                padding: 3rem 0;
            }

            .hero-btns {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 250px;
            }

            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .whatsapp-float {
                width: 45px;
                height: 45px;
                bottom: 20px;
                left: 20px;
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/923329911276" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Header -->
    <header id="header">
        <div class="container">
            <nav class="navbar">
                <!-- Logo Image + Name -->
                <a href="#hero" class="logo">
                    @if($user && $user->logo_image && !empty($user->logo_image))
                        <img src="{{ asset('storage/' . $user->logo_image) }}?v={{ time() }}" alt="Logo">
                    @else
                        <img src="{{ asset('storage/images/my logo.png') }}?v={{ time() }}" alt="Logo">
                    @endif

                    @if($user && $user->name)
                        {{ $user->name }}
                    @else
                        Muhammad<span>Talha</span>
                    @endif
                </a>

                <ul class="nav-links">
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#skills">Skills</a></li>

                    <!-- Projects Dropdown -->
                    <li class="dropdown">
                        <a href="#">Projects ▾</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('portfolio')}}">Portfolio</a></li>
                            <li><a href="{{url('/qr-generator')}}">QR Code Generator</a></li>
                            <li><a href="{{url('/age-calculator')}}">Age Calculator</a></li>
                        </ul>
                    </li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="testimoials.html">Testimonials</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>

                <div class="hamburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero">
        <div id="particles-js"></div>
        <div class="container">
            <div class="hero-content">
                <h1>Hi, I'm <span class="highlight">Muhammad Talha</span></h1>
                <p><span class="typewriter" id="typewriter"></span></p>
                <div class="hero-btns">
                    <a href="#contact" class="btn btn-primary">Hire Me</a>
                    <a href="{{route('portfolio')}}" class="btn btn-secondary">View Projects</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="container">
            <div class="section-title">
                <h2>About Me</h2>
                <p>Professional Laravel Developer & PHP Expert - Specializing in Web Development, SEO Optimization, and Digital Solutions</p>
            </div>
            <div class="about-content">
                <div class="about-img">
                    @if($user && $user->profile_image)
                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}" class="profile-img">
                    @else
                        <img src="{{ asset('storage/images/Hashim.jpeg') }}" alt="Muhammad Talha" class="profile-img">
                    @endif
                </div>
                <div class="about-text">
                    <h3>Who am I?</h3>
                    @if($user && $user->about_text)
                        <p>{!! nl2br(e($user->about_text)) !!}</p>
                    @else
                        <p>I'm a passionate <span class="highlight">Laravel Developer</span> and <span class="highlight">PHP Expert</span> with over 5 years of experience creating robust, scalable, and SEO-optimized web applications. I specialize in backend development, database design, and performance optimization.</p>
                        <p>My expertise includes <span class="highlight">Laravel Framework</span>, <span class="highlight">PHP Development</span>, <span class="highlight">MySQL Database</span>, <span class="highlight">API Development</span>, and <span class="highlight">SEO Optimization</span>. I deliver high-performance web solutions that rank well in search engines and provide exceptional user experiences.</p>
                    @endif
                    <a href="CV.png" download class="btn btn-primary">Download CV</a>

                    <div class="skills-grid">
                        <div class="skill-item">
                            <i class="fab fa-html5 skill-icon"></i>
                            <span class="skill-name">HTML5</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-css3-alt skill-icon"></i>
                            <span class="skill-name">CSS3</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-bootstrap skill-icon"></i>
                            <span class="skill-name">Bootstrap</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-js skill-icon"></i>
                            <span class="skill-name">JavaScript</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-laravel skill-icon"></i>
                            <span class="skill-name">Laravel</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-php skill-icon"></i>
                            <span class="skill-name">PHP</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-database skill-icon"></i>
                            <span class="skill-name">MySQL</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-git-alt skill-icon"></i>
                            <span class="skill-name">Git</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-node-js skill-icon"></i>
                            <span class="skill-name">Node.js</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-react skill-icon"></i>
                            <span class="skill-name">React</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="section">
        <div class="container">
            <div class="section-title">
                <h2>My Skills</h2>
                <p>Professional Laravel & PHP Development Expertise - Full-Stack Web Development Skills and Database Management</p>
            </div>
            <div class="skills-container">
                <div class="skill-category">
                    <h3><i class="fas fa-laptop-code"></i> Frontend</h3>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">HTML/CSS</span>
                            <span class="skill-percent">95%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">JavaScript</span>
                            <span class="skill-percent">90%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">React</span>
                            <span class="skill-percent">85%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">Vue.js</span>
                            <span class="skill-percent">75%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
                <div class="skill-category">
                    <h3><i class="fas fa-server"></i> Backend</h3>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">PHP</span>
                            <span class="skill-percent">95%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">Laravel</span>
                            <span class="skill-percent">90%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">MySQL</span>
                            <span class="skill-percent">85%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">Bootstrap</span>
                            <span class="skill-percent">90%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                <div class="skill-category">
                    <h3><i class="fas fa-paint-brush"></i> Design</h3>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">UI/UX Design</span>
                            <span class="skill-percent">90%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-info">
                            <span class="skill-name">Wireframing</span>
                            <span class="skill-percent">85%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <div class="section-title">
                <h2>My Services</h2>
                <p>Professional Laravel & PHP Development Services - Building Scalable Web Applications with Modern Technologies</p>
            </div>
            <div class="services-container">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fab fa-laravel"></i>
                    </div>
                    <h3>Laravel Development</h3>
                    <p>Professional Laravel web applications with MVC architecture, authentication, database management, and API development using modern PHP frameworks.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fab fa-php"></i>
                    </div>
                    <h3>PHP Development</h3>
                    <p>Custom PHP solutions including backend development, server-side scripting, database integration, and performance optimization for scalable web applications.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3>Database Design</h3>
                    <p>MySQL database design, optimization, and management services including schema design, query optimization, and data migration for efficient data handling.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Responsive Web Design</h3>
                    <p>Mobile-first responsive websites using HTML5, CSS3, Bootstrap, and JavaScript that work perfectly across all devices and screen sizes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Contact Me</h2>
                <p>Have a project in mind or want to discuss potential opportunities? Get in touch!</p>
            </div>
            <div class="contact-container">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email</h3>
                            <a href="mailto:itsocial470@gmail.com">itsocial470@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Phone</h3>
                            <a href="tel:+923329911276">+92 332 9911276</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Location</h3>
                            <p>Peshawar University Road, KPK, Pakistan</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Social Media</h3>
                            <div class="social-links">
                                <a href="https://wa.me/923329911276" class="social-link" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="https://www.linkedin.com/in/hashim-nouman-a2b132320?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                    class="social-link"><i class="fab fa-linkedin-in"></i></a>
                                <a href="http://hashimnouman.free.nf/?i=1" class="social-link"><i
                                        class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                   <form action="{{ route('contact.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Your Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="message">Your Message</label>
        <textarea id="message" name="message" class="form-control" required></textarea>
    </div>
    <button type="submit" class="submit-btn">Send Message</button>
</form>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h3>Muhammad Talha</h3>
                    <p>A passionate Laravel Developer and PHP Expert dedicated to creating robust, scalable web applications with modern technologies and exceptional user experiences.</p>
                    <div class="footer-social">
                        <a href="https://wa.me/923329911276" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="mailto:itsocial470@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="tel:+923329911276" target="_blank"><i class="fas fa-phone-alt"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="{{route('portfolio')}}">Projects</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Projects</h3>
                    <ul class="footer-links">
                        <li><a href="{{url('/age-calculator')}}">Age Calculator</a></li>
                        <li><a href="{{url('/qr-generator')}}">QR Code Generator</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">UI/UX Design</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p style="cursor: pointer;"
                    onclick="document.getElementById('hero').scrollIntoView({behavior: 'smooth'})">&copy; <span
                        id="year"></span> Muhammad Talha. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#hero" id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // ===== MOBILE NAVIGATION =====
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const links = document.querySelectorAll('.nav-links li');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        links.forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                hamburger.classList.remove('active');
            });
        });

        // ===== STICKY HEADER =====
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            header.classList.toggle('scrolled', window.scrollY > 0);
        });

        // ===== TYPEWRITER EFFECT =====
        const roles = ["Muhammad Talha", "Laravel Developer", "PHP Developer", "Frontend Developer"];
        const typewriter = document.getElementById("typewriter");
        let roleIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let currentText = "";

        function type() {
            const currentRole = roles[roleIndex];

            if (isDeleting) {
                currentText = currentRole.substring(0, charIndex - 1);
                charIndex--;
            } else {
                currentText = currentRole.substring(0, charIndex + 1);
                charIndex++;
            }

            typewriter.textContent = currentText;

            let typingSpeed = 100;

            if (isDeleting) {
                typingSpeed /= 2;
            }

            if (!isDeleting && charIndex === currentRole.length) {
                typingSpeed = 2000;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                roleIndex = (roleIndex + 1) % roles.length;
                typingSpeed = 500;
            }

            setTimeout(type, typingSpeed);
        }

        // Start typewriter effect
        setTimeout(type, 1000);

        // ===== PARTICLES BACKGROUND =====
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#6C63FF"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#6C63FF",
                    "opacity": 0.2,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });

        // ===== ANIMATE SKILL BARS ON SCROLL =====
        function animateSkillBars() {
            const skillBars = document.querySelectorAll('.progress');
            skillBars.forEach(bar => {
                const width = bar.getAttribute('data-width') || bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        }

        // Animate when skills section is in view
        const skillsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateSkillBars();
                    skillsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        skillsObserver.observe(document.getElementById('skills'));

        // ===== CONTACT FORM =====
        const contactForm = document.getElementById('contactForm');

        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            // Send to WhatsApp
            const whatsappUrl = `https://wa.me/923329911276?text=Name:%20${encodeURIComponent(name)}%0AEmail:%20${encodeURIComponent(email)}%0AMessage:%20${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
            
            // Send to Email (using mailto as fallback)
            const mailtoUrl = `mailto:itsocial470@gmail.com?subject=Message from ${encodeURIComponent(name)}&body=${encodeURIComponent(message)}%0A%0AFrom:%20${encodeURIComponent(email)}`;
            window.location.href = mailtoUrl;

            // Show success message
            alert('Thank you for your message! I will get back to you soon.');

            // Reset form
            contactForm.reset();
        });

        // ===== SET CURRENT YEAR IN FOOTER =====
        document.getElementById('year').textContent = new Date().getFullYear();

        // ===== BACK TO TOP BUTTON =====
        const backToTopBtn = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('active');
            } else {
                backToTopBtn.classList.remove('active');
            }
        });

        backToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ===== ANIMATE ELEMENTS ON SCROLL =====
        const fadeElements = document.querySelectorAll('.section-title, .about-content, .skill-category, .service-card, .contact-container');

        const fadeOnScroll = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        fadeElements.forEach(element => {
            fadeOnScroll.observe(element);
        });
    </script>
</body>

</html>