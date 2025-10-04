

























<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Creative Work</title>
        <link rel="shortcut icon" href="my logo.png" type="image/jpeg">
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
        /* ==== GLOBAL STYLES ==== */
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            line-height: 1.5;
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
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background: var(--primary);
            bottom: -10px;
            left: 25%;
            border-radius: 2px;
        }

        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            border: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
            border: 1px solid var(--light-gray);
            box-shadow: 0 4px 15px rgba(203, 213, 224, 0.2);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(203, 213, 224, 0.3);
        }

        .highlight {
            color: var(--primary);
            font-weight: 600;
        }

        /* ===== HEADER & NAVIGATION ===== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
            padding: 1rem 0;
            background-color: rgba(248, 250, 252, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.1);
        }

        header.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.1);
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
        }

        .logo span {
            color: var(--dark);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 2rem;
        }

        .nav-links a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: -5px;
            left: 0;
            transition: width 0.3s ease;
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
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            min-width: 220px;
            z-index: 999;
        }

        .nav-links .dropdown-menu li a {
            display: block;
            padding: 10px 20px;
            color: var(--dark);
            font-weight: 500;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .nav-links .dropdown-menu li a:hover {
            background-color: #f1f1f1;
        }

        /* Show dropdown on desktop hover only */
        @media (min-width: 768px) {
            .nav-links .dropdown:hover .dropdown-menu {
                display: block;
            }
        }

        /* === Mobile Styles: dropdown stays hidden (or handled via JS/hamburger later) === */
        @media (max-width: 767px) {
            .nav-links {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links .dropdown-menu {
                position: static;
                box-shadow: none;
                padding-left: 1rem;
            }

            .nav-links .dropdown:hover .dropdown-menu {
                display: none;
                /* Optional: handle via JS if needed */
            }
        }


        .hamburger {
            display: none;
            cursor: pointer;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background: var(--dark);
            margin: 5px;
            transition: all 0.3s ease;
        }
        

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        section {
            padding: 80px 0;
        }

        /* ==== PROJECTS SECTION ==== */
        .projects-section {
            background-color: white;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .section-header p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        .projects-filter {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .filter-btn {
            padding: 8px 20px;
            border-radius: 6px;
            background: white;
            color: var(--gray);
            border: 1px solid var(--light-gray);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 30px;
        }

        .project-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--light-gray);
            opacity: 1;
            transform: scale(1);
        }
        
        .project-card.hidden {
            opacity: 0;
            transform: scale(0.95);
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .project-image {
            position: relative;
            overflow: hidden;
            height: 220px;
            background-color: #f1f3f5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: var(--transition);
            padding: 20px;
        }

        .project-card:hover .project-image img {
            transform: scale(1.05);
        }

        .project-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            background: var(--primary);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 1;
        }

        .project-content {
            padding: 24px;
        }

        .project-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--dark);
        }

        .project-description {
            color: var(--gray);
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .tech-tag {
            background: var(--light);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .project-actions {
            display: flex;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            border: 1px solid var(--primary);
        }

        .btn-primary:hover {
            background: var(--secondary);
            border-color: var(--secondary);
        }

        .btn-outline {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--light);
        }

        /* ==== RESPONSIVE STYLES ==== */
        
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
                position: absolute;
                right: 0;
                top: 70px;
                background: white;
                width: 100%;
                flex-direction: column;
                align-items: center;
                padding: 1rem 0;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
                transform: translateY(-150%);
                transition: transform 0.3s ease;
                z-index: 999;
            }

            .nav-links.active {
                transform: translateY(0);
            }

            .nav-links li {
                margin: 0.5rem 0;
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

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 992px) {
            .projects-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            section {
                padding: 60px 0;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .section-header p {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .projects-grid {
                grid-template-columns: 1fr;
            }
            
            .project-actions {
                flex-direction: column;
            }
            
            .btn {
                justify-content: center;
            }
        }
    </style>
    </head>
    <body>
         <!-- Header -->
    <header id="header">
        <div class="container">
            <nav class="navbar">
                <a href="{{url('/')}}" class="logo">
                    @if($user && $user->logo_image && !empty($user->logo_image))
                        <img src="{{ asset('storage/' . $user->logo_image) }}?v={{ time() }}" alt="Logo" style="height: 30px; margin-right: 10px;">
                    @else
                        <img src="{{ asset('storage/images/my logo.png') }}?v={{ time() }}" alt="Logo" style="height: 30px; margin-right: 10px;">
                    @endif
                    @if($user && $user->name)
                        {{ $user->name }}
                    @else
                        Muhammad<span>Talha</span>
                    @endif
                </a>
                <ul class="nav-links">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="project.html">Project</a></li>
                    <li><a href="{{url('/age-calculator')}}">Age Calculator</a></li>
                    <li><a href="{{url('/qr-generator')}}">QR Code Generator</a></li>
                    </ul>
                </li>              
            </ul>
           <div class="hamburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
        </div>
    </header>







 <!-- Projects Section -->
    <section class="projects-section">
        <div class="container">
            <div class="section-header">
                <h2>My Creative Work</h2>
                <p>A showcase of my diverse projects in web development and graphic design</p>
            </div>

            <div class="projects-filter">
                <button class="filter-btn active" data-filter="all">All</button>
                @if(isset($categories) && is_iterable($categories))
                    @foreach($categories as $category)
                        @if(is_object($category) && method_exists($category, 'getAttribute'))
                            <button class="filter-btn" data-filter="{{ $category->slug ?? 'uncategorized' }}">
                                {{ $category->name ?? 'Uncategorized' }}
                            </button>
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="projects-grid">
                @forelse($projects as $project)
                <div class="project-card" data-category="{{ $project->category ? $project->category->slug : strtolower($project->attributes['category'] ?? 'uncategorized') }}">
                    <div class="project-image">
                        @if($project->image)
                            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">
                        @else
                            <img src="{{ asset('placeholder.png') }}" alt="no image">
                        @endif
                        @if($project->badge)
                            <span class="project-badge">{{ $project->badge }}</span>
                        @endif
                    </div>
                    <div class="project-content">
                        <h3 class="project-title">{{ $project->title }}</h3>
                        <p class="project-description">{{ $project->description }}</p>

                        <div class="project-tech">
                            @if(!empty($project->tags))
                                @foreach($project->tags as $tag)
                                    <span class="tech-tag">{{ $tag }}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="project-actions">
                            @if($project->link)
                                <a href="{{ $project->link }}" class="btn btn-primary" target="_blank" rel="noopener">
                                    <i class="fas fa-external-link-alt"></i> Live Demo
                                </a>
                            @endif
                            <a href="#" class="btn btn-outline">
                                <i class="fas fa-file-download"></i> Preview
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <p>No projects yet.</p>
                @endforelse
            </div>
        </div>
    </section>
























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
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const projectCards = document.querySelectorAll('.project-card');
            
            // Filter projects based on category
            function filterProjects(category) {
                console.log('Filtering by category:', category);
                let visibleCount = 0;
                
                projectCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    console.log('Card category:', cardCategory, 'Filter:', category);
                    
                    if (category === 'all' || cardCategory === category) {
                        card.classList.remove('hidden');
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.classList.add('hidden');
                        // Hide after animation
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
                
                console.log('Visible projects:', visibleCount);
            }
            
            // Add click event listeners to filter buttons
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Filter projects
                    const filterValue = this.getAttribute('data-filter');
                    console.log('Button clicked, filter value:', filterValue);
                    filterProjects(filterValue);
                    
                    // Add smooth animation
                    projectCards.forEach(card => {
                        card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                    });
                });
            });
            
            // Initialize with all projects showing
            filterProjects('all');
        });
    </script>
    </body>
</html>