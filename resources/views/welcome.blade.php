<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Klinik MMC (Mumtaz Medical Center) - Kesehatan Anda, Prioritas Kami</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @livewireScripts
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-padding-top: 80px;
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #004643;
            line-height: 1.6;
            background-color: #F0EDE5;
            position: relative;
            overflow-x: hidden;
            -webkit-tap-highlight-color: rgba(0, 70, 67, 0.1);
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/storage/assets/klinikMMC.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            opacity: 0.1;
            z-index: -1;
            pointer-events: none;
        }
        
        * {
            -webkit-tap-highlight-color: rgba(0, 70, 67, 0.1);
        }
        
        /* Abstract Shapes */
        .abstract-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }
        
        .shape {
            position: absolute;
            opacity: 0.08;
            will-change: transform;
        }
        
        .shape-1 {
            width: 400px;
            height: 400px;
            top: -100px;
            right: -100px;
            background: #004643;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation-delay: 0s;
        }
        
        .shape-2 {
            width: 300px;
            height: 300px;
            bottom: -50px;
            left: -50px;
            background: #004643;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation-delay: -5s;
        }
        
        .shape-3 {
            width: 250px;
            height: 250px;
            top: 50%;
            right: 10%;
            background: #004643;
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            animation-delay: -10s;
        }
        
        .shape-4 {
            width: 200px;
            height: 200px;
            bottom: 20%;
            left: 15%;
            background: #004643;
            border-radius: 40% 60% 60% 40% / 60% 30% 70% 40%;
            animation-delay: -15s;
        }
        
        .shape-5 {
            width: 180px;
            height: 180px;
            top: 20%;
            left: 5%;
            background: #004643;
            border-radius: 50% 50% 50% 50% / 50% 50% 50% 50%;
            animation-delay: -7s;
        }
        
        .shape-6 {
            width: 220px;
            height: 220px;
            bottom: 10%;
            right: 20%;
            background: #004643;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation-delay: -12s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(30px, -30px) rotate(5deg);
            }
            66% {
                transform: translate(-20px, 20px) rotate(-5deg);
            }
        }
        
        /* Combine float animation with cursor effect */
        .shape {
            transform-origin: center center;
        }
        
        /* Ensure content is above shapes */
        .header,
        .hero,
        .section,
        .footer {
            position: relative;
            z-index: 1;
        }
        
        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            line-height: 1.2;
        }
        
        /* Header */
        .header {
            background: #004643;
            border-bottom: 1px solid rgba(240, 237, 229, 0.2);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transform: translateY(0);
            transition: transform 0.3s ease-in-out, background 0.3s ease-in-out, border-bottom 0.3s ease-in-out;
        }
        
        .header.hidden {
            transform: translateY(-100%);
        }
        
        .header.at-top {
            background: transparent;
            border-bottom: 1px solid transparent;
        }
        
        .header.at-top .logo,
        .header.at-top .nav-menu a,
        .header.at-top .mobile-menu-toggle {
            color: #004643;
        }
        
        .header.at-top .mobile-menu {
            background: rgba(240, 237, 229, 0.98);
            backdrop-filter: blur(10px);
        }
        
        .header.at-top .mobile-menu a {
            color: #004643;
            border-bottom-color: rgba(0, 70, 67, 0.1);
        }
        
        .header.at-top .nav-menu a {
            color: #004643;
        }
        
        .header.at-top .nav-menu a::after {
            background: #004643;
        }
        
        .header.at-top .nav-menu a:hover {
            color: #004643;
            transform: translateY(-2px);
        }
        
        .header.at-top .nav-menu a:hover::after {
            width: 100%;
        }
        
        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #F0EDE5;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-img {
            height: 40px;
            width: auto;
        }
        
        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
        }
        
        .nav-menu li {
            position: relative;
        }
        
        .nav-menu a {
            color: #F0EDE5;
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 400;
            position: relative;
            padding: 0.5rem 0;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #F0EDE5;
            transition: width 0.3s ease;
        }
        
        .nav-menu a:hover {
            color: #F0EDE5;
            transform: translateY(-2px);
        }
        
        .nav-menu a:hover::after {
            width: 100%;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Hero Section */
        .hero {
            max-width: 1280px;
            margin: 0 auto;
            padding: 4rem 2rem;
            padding-top: calc(4rem + 80px);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            color: #004643;
        }
        
        .hero-content p {
            font-size: 1.125rem;
            color: #004643;
            margin-bottom: 2rem;
            line-height: 1.6;
            opacity: 0.9;
        }
        
        .hero-cta {
            display: inline-block;
            padding: 1rem 2rem;
            background: #004643;
            color: #F0EDE5;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            transition: background 0.2s;
        }
        
        .hero-cta:hover {
            background: #003d3a;
        }
        
        .hero-images {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        
        .hero-image {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        
        .hero-image-large {
            width: 100%;
            height: auto;
            object-fit: contain;
            margin-top: -40px;
        }
        
        /* Section Titles */
        .section {
            max-width: 1280px;
            margin: 0 auto;
            padding: 4rem 2rem;
            scroll-margin-top: 80px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .section-title {
            font-size: 2rem;
            font-weight: 600;
            color: #004643;
        }
        
        .section-link {
            color: #004643;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9375rem;
        }
        
        .section-link:hover {
            text-decoration: underline;
        }
        
        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        
        .filter-tab {
            padding: 0.5rem 0;
            background: none;
            border: none;
            color: #004643;
            font-size: 0.9375rem;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
            opacity: 0.7;
        }
        
        .filter-tab.active,
        .filter-tab:hover {
            color: #004643;
            border-bottom-color: #004643;
            opacity: 1;
        }
        
        #doctors {
            background-color: #004643 !important;
        }
        
        #doctors .section-title,
        #doctors .section-link {
            color: #F0EDE5 !important;
        }
        
        #doctors .filter-tab {
            color: #F0EDE5 !important;
            opacity: 0.7;
        }
        
        #doctors .filter-tab.active,
        #doctors .filter-tab:hover {
            color: #F0EDE5 !important;
            border-bottom-color: #F0EDE5 !important;
            opacity: 1;
        }
        
        #boutique {
            background-color: #ffffff !important;
        }
        
        #boutique .section-title,
        #boutique .section-link {
            color: #004643 !important;
        }
        
        #boutique .section-title-logo {
            height: 80px;
            margin-top: 1px;
            width: auto;
            display: block;
        }
        
        #boutique .card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(240, 237, 229, 0.1);
            box-shadow: 0 4px 12px rgba(0, 70, 67, 0.15);
        }
        
        #boutique .card-title,
        #boutique .card-location,
        #boutique .card-content p {
            color: #004643 !important;
        }
        
        #boutique .card-image.placeholder-img {
            background: rgba(240, 237, 229, 0.1);
            color: #F0EDE5;
        }
        
        #boutique {
            position: relative;
        }
        
        .boutique-wa-button {
            position: absolute;
            bottom: 2rem;
            right: 2rem;
            background: #25D366;
            color: #ffffff;
            padding: 0.875rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9375rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .boutique-wa-button:hover {
            background: #20BA5A;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.4);
        }
        
        .boutique-wa-button:active {
            transform: translateY(0);
        }
        
        .boutique-wa-button svg {
            width: 20px;
            height: 20px;
        }
        
        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }
        
        .card {
            background: #F0EDE5;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 12px rgba(0, 70, 67, 0.15);
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #e5e5e5;
            box-shadow: 0 4px 12px rgba(0, 70, 67, 0.15);
        }
        
        .doctor-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            object-position: top center;
            border-radius: 10px;
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }
        
        .card-location {
            font-size: 0.875rem;
            color: #4a4a4a;
        }
        
        /* Stories Section */
        .stories-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }
        
        .story-main {
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .story-main-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            background: #F0EDE5;
        }
        
        .story-main-content {
            padding: 2rem;
        }
        
        .story-category {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #004643;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
            opacity: 0.7;
        }
        
        .story-main-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #004643;
        }
        
        .story-date {
            font-size: 0.875rem;
            color: #004643;
            margin-bottom: 1rem;
            opacity: 0.7;
        }
        
        .story-main-text {
            color: #004643;
            line-height: 1.6;
            opacity: 0.9;
        }
        
        .story-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .story-side {
            display: flex;
            gap: 1rem;
        }
        
        .story-side-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            background: #F0EDE5;
            flex-shrink: 0;
        }
        
        .story-side-content {
            flex: 1;
        }
        
        .story-side-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #004643;
        }
        
        .story-side-meta {
            font-size: 0.8125rem;
            color: #004643;
            opacity: 0.7;
        }
        
        /* Highlights Section */
        .highlights-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
        
        .review-card {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
        }
        
        .review-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .review-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #e5e5e5;
        }
        
        .review-info h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .review-location {
            font-size: 0.875rem;
            color: #004643;
            opacity: 0.8;
        }
        
        .review-rating {
            color: #ffc107;
            margin-bottom: 1rem;
        }
        
        .review-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #004643;
        }
        
        .review-text {
            color: #004643;
            line-height: 1.6;
            opacity: 0.9;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .cert-description {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .highlights-media {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .media-card {
            aspect-ratio: 1;
            background: #F0EDE5;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
        }
        
        .media-card.play {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .play-icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Footer */
        .footer {
            background: #1a1a1a;
            color: #ffffff;
            padding: 4rem 2rem 2rem;
        }
        
        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
        }
        
        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1.5fr 1.5fr 2fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }
        
        .footer-map {
            width: 100%;
            height: 250px;
            border-radius: 8px;
            border: none;
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            color: #a0a0a0;
            font-size: 0.875rem;
        }
        
        .contact-item svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            margin-top: 2px;
        }
        
        .contact-item a {
            color: #a0a0a0;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .contact-item a:hover {
            color: #ffffff;
        }
        
        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .footer-logo-img {
            height: 45px;
            width: auto;
        }
        
        .footer-social {
            margin-bottom: 1rem;
        }
        
        .footer-social-text {
            font-size: 0.875rem;
            margin-bottom: 1rem;
            color: #a0a0a0;
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
        }
        
        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #333333;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .social-icon:hover {
            background: #4a4a4a;
        }
        
        .footer-column h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: #a0a0a0;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }
        
        .footer-links a:hover {
            color: #ffffff;
        }
        
        .footer-bottom {
            border-top: 1px solid #333333;
            padding-top: 2rem;
            text-align: center;
            font-size: 0.875rem;
            color: #a0a0a0;
        }
        
        /* Mobile Menu */
        .mobile-menu {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            background: linear-gradient(180deg, #004643 0%, #003d3a 100%);
            z-index: 999;
            padding: 2rem 1.5rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
            max-height: calc(100vh - 70px);
            overflow-y: auto;
            backdrop-filter: blur(10px);
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .mobile-menu.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        .mobile-menu ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .mobile-menu a {
            color: #F0EDE5;
            text-decoration: none;
            font-size: 1.0625rem;
            font-weight: 500;
            display: block;
            padding: 1rem 1.25rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(240, 237, 229, 0.05);
            border: 1px solid rgba(240, 237, 229, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .mobile-menu a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: #F0EDE5;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .mobile-menu a:hover,
        .mobile-menu a:active {
            background: rgba(240, 237, 229, 0.15);
            padding-left: 1.75rem;
            transform: translateX(8px);
            border-color: rgba(240, 237, 229, 0.3);
        }
        
        .mobile-menu a:hover::before,
        .mobile-menu a:active::before {
            transform: scaleY(1);
        }
        
        .mobile-menu a:last-child {
            border-bottom: none;
        }
        
        .header.at-top .mobile-menu {
            background: linear-gradient(180deg, rgba(240, 237, 229, 0.98) 0%, rgba(240, 237, 229, 0.95) 100%);
            backdrop-filter: blur(20px);
        }
        
        .header.at-top .mobile-menu a {
            color: #004643;
            background: rgba(0, 70, 67, 0.05);
            border-color: rgba(0, 70, 67, 0.1);
        }
        
        .header.at-top .mobile-menu a::before {
            background: #004643;
        }
        
        .header.at-top .mobile-menu a:hover,
        .header.at-top .mobile-menu a:active {
            background: rgba(0, 70, 67, 0.15);
            border-color: rgba(0, 70, 67, 0.3);
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .abstract-shapes .shape {
                opacity: 0.03;
            }
            
            .shape-1,
            .shape-2,
            .shape-3,
            .shape-4,
            .shape-5,
            .shape-6 {
                width: 100px;
                height: 100px;
            }
            
            .header-container {
                padding: 1rem 1.25rem;
            }
            
            .logo {
                font-size: 1.25rem;
                font-weight: 700;
            }
            
            .logo .logo-img {
                height: 32px;
            }
            
            .nav-menu {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
                color: #F0EDE5;
                font-size: 1.75rem;
                padding: 0.5rem;
                background: rgba(240, 237, 229, 0.1);
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            
            .mobile-menu-toggle:active {
                transform: scale(0.95);
                background: rgba(240, 237, 229, 0.2);
            }
            
            .header.at-top .mobile-menu-toggle {
                color: #004643;
                background: rgba(0, 70, 67, 0.1);
            }
            
            .header.at-top .mobile-menu-toggle:active {
                background: rgba(0, 70, 67, 0.2);
            }
            
            .header-actions {
                gap: 0.75rem;
            }
            
            .hero {
                grid-template-columns: 1fr;
                padding: 2rem 1.25rem;
                padding-top: calc(2rem + 70px);
                gap: 2.5rem;
                min-height: calc(100vh - 70px);
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            
            .hero-content {
                animation: fadeInUp 0.8s ease-out;
            }
            
            .hero-content h1 {
                font-size: 2.25rem;
                line-height: 1.2;
                margin-bottom: 1.25rem;
                background: linear-gradient(135deg, #004643 0%, #006b66 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .hero-content p {
                font-size: 1.0625rem;
                margin-bottom: 2rem;
                line-height: 1.7;
                color: #004643;
                opacity: 0.9;
            }
            
            .hero-cta {
                padding: 1rem 2rem;
                font-size: 1rem;
                width: 100%;
                text-align: center;
                display: block;
                border-radius: 8px;
                font-weight: 600;
                box-shadow: 0 4px 12px rgba(0, 70, 67, 0.3);
                transition: all 0.3s ease;
            }
            
            .hero-cta:active {
                transform: translateY(2px);
                box-shadow: 0 2px 6px rgba(0, 70, 67, 0.3);
            }
            
            .hero-images {
                order: -1;
                margin-bottom: 1.5rem;
                animation: fadeInDown 0.8s ease-out;
            }
            
            .hero-image-large {
                margin-top: 0;
                border-radius: 16px;
                box-shadow: 0 8px 24px rgba(0, 70, 67, 0.15);
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .section {
                padding: 3rem 1.25rem;
                scroll-margin-top: 70px;
            }
            
            .section-title {
                font-size: 1.875rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                position: relative;
                padding-bottom: 0.75rem;
            }
            
            .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 60px;
                height: 3px;
                background: linear-gradient(90deg, #004643 0%, #006b66 100%);
                border-radius: 2px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                margin-bottom: 2rem;
            }
            
            .section-link {
                font-size: 0.9375rem;
                font-weight: 600;
                padding: 0.5rem 1rem;
                background: rgba(0, 70, 67, 0.1);
                border-radius: 6px;
                transition: all 0.3s ease;
            }
            
            .section-link:active {
                background: rgba(0, 70, 67, 0.2);
                transform: scale(0.98);
            }
            
            .filter-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
                -webkit-overflow-scrolling: touch;
                padding-bottom: 0.75rem;
                margin-bottom: 2rem;
                gap: 0.75rem;
                scrollbar-width: thin;
            }
            
            .filter-tabs::-webkit-scrollbar {
                height: 4px;
            }
            
            .filter-tabs::-webkit-scrollbar-track {
                background: rgba(0, 70, 67, 0.1);
                border-radius: 2px;
            }
            
            .filter-tabs::-webkit-scrollbar-thumb {
                background: rgba(0, 70, 67, 0.4);
                border-radius: 2px;
            }
            
            .filter-tab {
                font-size: 0.875rem;
                white-space: nowrap;
                padding: 0.625rem 1rem;
                border-radius: 20px;
                transition: all 0.3s ease;
            }
            
            .filter-tab.active {
                background: rgba(0, 70, 67, 0.1);
                font-weight: 600;
            }
            
            .cards-grid {
                grid-template-columns: 1fr;
                gap: 1.75rem;
            }
            
            /* 2x2 grid untuk obat, butik, dan layanan di mobile */
            #medicines .cards-grid,
            #boutique .cards-grid,
            #services .cards-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.875rem;
            }
            
            .card {
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 70, 67, 0.1);
                transition: all 0.3s ease;
                background: #ffffff;
            }
            
            .card:active {
                transform: scale(0.98);
                box-shadow: 0 2px 8px rgba(0, 70, 67, 0.15);
            }
            
            .card-image {
                height: 240px;
                object-fit: cover;
            }
            
            /* Ukuran card image lebih kecil untuk 2x2 grid */
            #medicines .card-image,
            #boutique .card-image,
            #services .card-image {
                height: 160px;
            }
            
            /* Padding card content lebih kecil untuk 2x2 grid */
            #medicines .card-content,
            #boutique .card-content,
            #services .card-content {
                padding: 1rem;
            }
            
            /* Font size lebih kecil untuk 2x2 grid */
            #medicines .card-title,
            #boutique .card-title,
            #services .card-title {
                font-size: 0.9375rem;
                margin-bottom: 0.375rem;
            }
            
            #medicines .card-content p,
            #boutique .card-content p,
            #services .card-content p {
                font-size: 0.75rem;
                line-height: 1.4;
            }
            
            .doctor-image {
                height: 340px;
                border-radius: 12px 12px 0 0;
            }
            
            .doctor-info {
                padding: 1.5rem;
            }
            
            .doctor-name {
                font-size: 1.125rem !important;
                font-weight: 700 !important;
                margin-bottom: 0.5rem !important;
            }
            
            .doctor-specialty {
                font-size: 0.9375rem !important;
                opacity: 0.9 !important;
            }
            
            .doctor-hours {
                font-size: 0.875rem !important;
                margin-top: 0.75rem !important;
            }
            
            .card-content {
                padding: 1.5rem;
            }
            
            .card-title {
                font-size: 1.125rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }
            
            .stories-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .story-main {
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 70, 67, 0.1);
            }
            
            .story-main-image {
                height: 260px;
                object-fit: cover;
            }
            
            .story-main-content {
                padding: 1.75rem;
            }
            
            .story-main-title {
                font-size: 1.375rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }
            
            .story-side {
                gap: 1.25rem;
                padding: 1rem;
                background: #ffffff;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0, 70, 67, 0.08);
                transition: all 0.3s ease;
            }
            
            .story-side:active {
                transform: scale(0.98);
                box-shadow: 0 1px 4px rgba(0, 70, 67, 0.12);
            }
            
            .story-side-image {
                width: 110px;
                height: 110px;
                border-radius: 10px;
                object-fit: cover;
            }
            
            .story-side-title {
                font-size: 1rem;
                font-weight: 600;
            }
            
            .highlights-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .review-card {
                padding: 2rem;
                border-radius: 16px;
                box-shadow: 0 4px 12px rgba(0, 70, 67, 0.1);
                background: #ffffff;
            }
            
            .review-header {
                margin-bottom: 1.25rem;
            }
            
            .review-avatar {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                font-size: 1.25rem;
                font-weight: 700;
            }
            
            .review-title {
                font-size: 1.125rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }
            
            .highlights-media {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .media-card {
                aspect-ratio: 1;
                border-radius: 12px;
                overflow: hidden;
            }
            
            .footer {
                padding: 3.5rem 1.25rem 2rem;
            }
            
            .footer-top {
                grid-template-columns: 1fr;
                gap: 2.5rem;
                margin-bottom: 2.5rem;
            }
            
            .footer-logo {
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 1.25rem;
            }
            
            .footer-logo-img {
                height: 38px;
            }
            
            .footer-map {
                height: 240px;
                border-radius: 12px;
            }
            
            .boutique-wa-button {
                bottom: 1.5rem;
                right: 1.5rem;
                padding: 0.75rem 1.25rem;
                font-size: 0.875rem;
            }
            
            .boutique-wa-button svg {
                width: 18px;
                height: 18px;
            }
            
            .contact-info {
                gap: 1.25rem;
            }
            
            .contact-item {
                font-size: 0.875rem;
                line-height: 1.6;
                padding: 0.75rem;
                background: rgba(255, 255, 255, 0.05);
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            
            .contact-item:active {
                background: rgba(255, 255, 255, 0.1);
                transform: translateX(5px);
            }
            
            .social-icons {
                gap: 1rem;
            }
            
            .social-icon {
                width: 44px;
                height: 44px;
                transition: all 0.3s ease;
            }
            
            .social-icon:active {
                transform: scale(0.9);
            }
            
            /* Booking Modal Mobile */
            #bookingModal {
                overflow-x: hidden;
            }
            
            #bookingModal > div {
                width: 95%;
                max-width: 95%;
                padding: 1rem;
                margin: 0.5rem;
                box-sizing: border-box;
                overflow-x: hidden;
            }
            
            #bookingModal form {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                overflow-x: hidden;
            }
            
            #bookingModal form > div {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                overflow-x: hidden;
            }
            
            #bookingModal h2 {
                font-size: 1.125rem;
                margin-bottom: 0.75rem;
            }
            
            #bookingModal label {
                font-size: 0.875rem !important;
                margin-bottom: 0.375rem !important;
            }
            
            #bookingModal form > div {
                margin-bottom: 1rem !important;
            }
            
            #bookingModal small {
                font-size: 0.75rem !important;
            }
            
            #bookingModal input,
            #bookingModal textarea {
                font-size: 0.9375rem;
                padding: 0.625rem;
                box-sizing: border-box;
                max-width: 100%;
            }
            
            #bookingModal select {
                width: 100% !important;
                max-width: 100% !important;
                box-sizing: border-box !important;
                font-size: 0.875rem !important;
                padding: 0.5rem 0.625rem !important;
                overflow: hidden;
                text-overflow: ellipsis;
                word-wrap: break-word;
            }
            
            #bookingModal select option {
                max-width: 100%;
                font-size: 0.875rem !important;
                padding: 0.5rem !important;
                overflow: hidden;
                text-overflow: ellipsis;
                word-wrap: break-word;
                white-space: normal;
            }
            
            #bookingModal #doctorSelect,
            #bookingModal #jamSelect {
                width: 100% !important;
                max-width: 100% !important;
                box-sizing: border-box !important;
                font-size: 0.875rem !important;
                padding: 0.5rem 0.625rem !important;
                min-width: 0 !important;
            }
            
            #bookingModal button {
                padding: 0.75rem;
                font-size: 0.875rem;
            }
            
            /* Ensure select text doesn't overflow */
            #bookingModal select::-ms-expand {
                display: none;
            }
            
            #bookingModal select {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23004643' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
                background-repeat: no-repeat;
                background-position: right 0.5rem center;
                background-size: 1rem;
                padding-right: 2rem !important;
            }
            
            /* Improve touch targets */
            .filter-tab,
            .hero-cta,
            .card,
            .social-icon {
                -webkit-tap-highlight-color: rgba(0, 70, 67, 0.1);
            }
            
            /* Better spacing for doctor cards */
            .cards-grid > div[data-specialty] {
                margin-bottom: 0;
            }
            
            /* Improve readability */
            .story-main-text,
            .review-text {
                font-size: 0.9375rem;
                line-height: 1.7;
            }
            
            /* Sertifikat description di mobile */
            .cert-description {
                -webkit-line-clamp: 2;
            }
            
            .review-text {
                -webkit-line-clamp: 3;
            }
        }
        
        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
                line-height: 1.15;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.625rem;
            }
            
            .hero {
                padding: 1.75rem 1rem;
                padding-top: calc(1.75rem + 70px);
                gap: 2rem;
            }
            
            .section {
                padding: 2.5rem 1rem;
            }
            
            .header-container {
                padding: 1rem;
            }
            
            .logo {
                font-size: 1.125rem;
            }
            
            .logo .logo-img {
                height: 28px;
            }
            
            .mobile-menu {
                padding: 1.5rem 1rem;
            }
            
            .mobile-menu a {
                padding: 0.875rem 1rem;
                font-size: 1rem;
            }
            
            .card-content {
                padding: 1.25rem;
            }
            
            /* Override untuk 2x2 grid di layar kecil */
            #medicines .cards-grid,
            #boutique .cards-grid,
            #services .cards-grid {
                gap: 0.75rem;
            }
            
            #medicines .card-content,
            #boutique .card-content,
            #services .card-content {
                padding: 0.875rem;
            }
            
            .card-image {
                height: 220px;
            }
            
            /* Ukuran card image lebih kecil untuk 2x2 grid di layar kecil */
            #medicines .card-image,
            #boutique .card-image,
            #services .card-image {
                height: 140px;
            }
            
            /* Font size lebih kecil untuk 2x2 grid di layar kecil */
            #medicines .card-title,
            #boutique .card-title,
            #services .card-title {
                font-size: 0.875rem;
            }
            
            #medicines .card-content p,
            #boutique .card-content p,
            #services .card-content p {
                font-size: 0.6875rem;
            }
            
            .doctor-image {
                height: 300px;
            }
            
            .story-main-content {
                padding: 1.5rem;
            }
            
            .story-main-image {
                height: 220px;
            }
            
            .review-card {
                padding: 1.5rem;
            }
            
            .footer {
                padding: 3rem 1rem 1.5rem;
            }
            
            .footer-map {
                height: 200px;
            }
            
            .hero-cta {
                padding: 0.9375rem 1.5rem;
                font-size: 0.9375rem;
            }
        }
        
        /* Placeholder images */
        .placeholder-img {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 0.875rem;
        }
        
        /* Doctor image styles */
        .cards-grid > div[data-specialty] {
            transition: transform 0.2s;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .cards-grid > div[data-specialty]:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <!-- Abstract Shapes Background -->
    <div class="abstract-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
        <div class="shape shape-6"></div>
    </div>
    
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="/" class="logo">
                <img src="{{ asset('storage/assets/logo/logo klinik.png') }}" alt="Logo Klinik MMC" class="logo-img">
                Klinik MMC
            </a>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#doctors">Dokter</a></li>
                    <li><a href="#facilities">Fasilitas</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="#boutique">Butik</a></li>
                    <li><a href="#medicines">Obat</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <button class="mobile-menu-toggle" onclick="toggleMobileMenu()" aria-label="Toggle menu">☰</button>
            </div>
        </div>
        <div class="mobile-menu" id="mobileMenu">
            <ul>
                <li><a href="#doctors" onclick="closeMobileMenu()">Dokter</a></li>
                <li><a href="#facilities" onclick="closeMobileMenu()">Fasilitas</a></li>
                <li><a href="#services" onclick="closeMobileMenu()">Layanan</a></li>
                <li><a href="#boutique" onclick="closeMobileMenu()">Butik</a></li>
                <li><a href="#medicines" onclick="closeMobileMenu()">Obat</a></li>
                <li><a href="#contact" onclick="closeMobileMenu()">Kontak</a></li>
            </ul>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Kesehatan Anda, Prioritas Kami</h1>
            <p>Klinik MMC (Mumtaz Medical Center) menyediakan layanan kesehatan terpercaya dengan dokter spesialis berpengalaman dan fasilitas modern untuk memberikan perawatan terbaik bagi Anda dan keluarga.</p>
            <a href="#" onclick="event.preventDefault(); openBookingModal(); return false;" class="hero-cta">Buat Janji Temu</a>
        </div>
        <div class="hero-images">
            <img src="{{ asset('storage/assets/dokter_hero.png') }}" alt="Dokter Klinik" class="hero-image hero-image-large" onerror="this.src='https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=400&h=600&fit=crop'">
                        </div>
    </section>

    <!-- Doctors Section -->
    <section class="section" id="doctors">
        <div class="section-header">
            <h2 class="section-title">Dokter Spesialis</h2>
            <a href="#all-doctors" class="section-link">Lihat semua dokter</a>
                            </div>
        <div class="filter-tabs">
            @php
                $specialties = $doctors->pluck('spesialisasi')->unique()->take(7);
            @endphp
            <button class="filter-tab active">Semua</button>
            @foreach($specialties as $specialty)
                <button class="filter-tab" data-specialty="{{ $specialty }}">{{ $specialty }}</button>
            @endforeach
        </div>
        <div class="cards-grid">
            @foreach($doctors->take(4) as $doctor)
                <div data-specialty="{{ $doctor->spesialisasi }}">
                    @if($doctor->foto || $doctor->gambar)
                        <img src="{{ asset('storage/' . ($doctor->foto ?: $doctor->gambar)) }}" alt="{{ $doctor->nama }}" class="doctor-image">
                    @else
                        <div class="doctor-image placeholder-img" style="display: flex; align-items: center; justify-content: center; background: #e5e5e5;">
                            <svg width="80" height="80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                    @endif
                    <div class="doctor-info" style="margin-top: 1rem; color: #F0EDE5;">
                        <h3 class="doctor-name" style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">{{ $doctor->nama }}</h3>
                        <p class="doctor-specialty" style="font-size: 0.9375rem; margin-bottom: 0.5rem; opacity: 0.9;">{{ $doctor->spesialisasi }}</p>
                        <div class="doctor-hours" style="font-size: 0.875rem; opacity: 0.8;">
                            @if($doctor->operating_hours && count($doctor->operating_hours) > 0)
                                @php
                                    $days = [
                                        1 => 'Senin',
                                        2 => 'Selasa',
                                        3 => 'Rabu',
                                        4 => 'Kamis',
                                        5 => 'Jumat',
                                        6 => 'Sabtu',
                                        7 => 'Minggu'
                                    ];
                                    $firstDay = array_key_first($doctor->operating_hours);
                                    $firstHours = $doctor->operating_hours[$firstDay];
                                @endphp
                                <p>{{ $days[$firstDay] ?? 'Senin' }}: {{ $firstHours['start'] ?? '08:00' }} - {{ $firstHours['end'] ?? '17:00' }}</p>
                            @elseif($doctor->jadwal)
                                <p>{{ $doctor->jadwal }}</p>
                            @else
                                <p>Senin - Jumat: 08:00 - 17:00</p>
                            @endif
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="section" id="facilities">
        <div class="section-header">
            <h2 class="section-title">Fasilitas Klinik</h2>
            <a href="#all-facilities" class="section-link">Lihat semua fasilitas</a>
        </div>
        <div class="stories-grid">
            @php
                $facilities = [
                    [
                        'image' => asset('storage/assets/fasilitas/ruangPeriksa.png'),
                        'category' => 'Ruang Periksa',
                        'title' => 'Ruang Periksa Modern dan Nyaman',
                        'description' => 'Ruang periksa yang dilengkapi dengan peralatan medis modern untuk memberikan pelayanan terbaik bagi pasien.'
                    ],
                    [
                        'image' => asset('storage/assets/fasilitas/ruangTunggu.png'),
                        'category' => 'Ruang Tunggu',
                        'title' => 'Ruang Tunggu Ber-AC yang Nyaman',
                        'description' => 'Ruang tunggu yang luas dengan fasilitas AC untuk kenyamanan pasien saat menunggu antrian.'
                    ],
                    [
                        'image' => asset('storage/assets/fasilitas/ruangPendaftaran.png'),
                        'category' => 'Pendaftaran',
                        'title' => 'Ruang Pendaftaran yang Terorganisir',
                        'description' => 'Layanan pendaftaran yang cepat dan efisien untuk mempermudah proses administrasi pasien.'
                    ],
                    [
                        'image' => asset('storage/assets/fasilitas/poliGigi.png'),
                        'category' => 'Poli Gigi',
                        'title' => 'Poli Gigi dengan Peralatan Lengkap',
                        'description' => 'Fasilitas perawatan gigi yang modern dengan dokter gigi berpengalaman.'
                    ]
                ];
            @endphp
            <article class="story-main">
                <img src="{{ $facilities[0]['image'] }}" alt="{{ $facilities[0]['title'] }}" class="story-main-image" onerror="this.src='https://via.placeholder.com/800x400?text=Facility+Image'">
                <div class="story-main-content">
                    <p class="story-category">{{ $facilities[0]['category'] }}</p>
                    <h3 class="story-main-title">{{ $facilities[0]['title'] }}</h3>
                    <p class="story-main-text">{{ $facilities[0]['description'] }}</p>
                        </div>
            </article>
            <div class="story-sidebar">
                @foreach(array_slice($facilities, 1, 3) as $facility)
                    <article class="story-side">
                        <img src="{{ $facility['image'] }}" alt="{{ $facility['title'] }}" class="story-side-image" onerror="this.src='https://via.placeholder.com/300x300?text=Facility'">
                        <div class="story-side-content">
                            <p class="story-category">{{ $facility['category'] }}</p>
                            <h4 class="story-side-title">{{ $facility['title'] }}</h4>
                            <p class="story-side-meta">{{ Str::limit($facility['description'], 60) }}</p>
                    </div>
                    </article>
                @endforeach
                        </div>
                    </div>
    </section>

    <!-- Certifications and Awards Section -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Sertifikasi dan Penghargaan</h2>
        </div>
        <div class="highlights-grid">
            <div class="review-card">
                <div class="review-header">
                    <div class="review-avatar placeholder-img" style="background: #004643; color: white; font-weight: bold;">KS</div>
                    <div class="review-info">
                        <h4>Klinik MMC (Mumtaz Medical Center)</h4>
                        <p class="review-location">Terakreditasi & Terpercaya</p>
                    </div>
                </div>
                <div class="review-rating">★★★★★</div>
                <h5 class="review-title">Sertifikasi dan Penghargaan</h5>
                <p class="review-text">Klinik MMC (Mumtaz Medical Center) telah mendapatkan berbagai sertifikasi dan penghargaan sebagai bentuk pengakuan atas komitmen kami dalam memberikan pelayanan kesehatan yang berkualitas tinggi. Kami terus berkomitmen untuk mempertahankan standar pelayanan terbaik untuk kepuasan dan kepercayaan pasien.</p>
            </div>
            <div class="highlights-media" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                @php
                    $certifications = [
                        [
                            'img' => asset('storage/assets/sertifikat/sertifikat.png'),
                            'title' => 'Sertifikat Akreditasi',
                            'description' => 'Klinik MMC (Mumtaz Medical Center) telah mendapatkan sertifikat akreditasi sebagai bentuk pengakuan atas komitmen kami dalam memberikan pelayanan kesehatan yang berkualitas tinggi dan memenuhi standar nasional.'
                        ],
                        [
                            'img' => asset('storage/assets/sertifikat/penghargaan.png'),
                            'title' => 'Penghargaan Pelayanan Terbaik',
                            'description' => 'Klinik MMC (Mumtaz Medical Center) menerima penghargaan sebagai klinik dengan pelayanan terbaik, yang mencerminkan dedikasi kami dalam memberikan perawatan kesehatan yang terpercaya dan berkualitas untuk pasien.'
                        ]
                    ];
                @endphp
                @foreach($certifications as $cert)
                    <div class="card">
                        <img src="{{ $cert['img'] }}" alt="{{ $cert['title'] }}" class="card-image" onerror="this.src='https://via.placeholder.com/400x300?text=Certification'">
                        <div class="card-content">
                            <h3 class="card-title">{{ $cert['title'] }}</h3>
                            <p class="cert-description" style="font-size: 0.875rem; color: #004643; opacity: 0.8; line-height: 1.6; margin-top: 0.5rem;">{{ $cert['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Butik Section -->
    <section class="section" id="boutique">
        <div class="section-header">
            <h2 class="section-title">
                <img src="{{ asset('storage/assets/logo/logo butik.png') }}" alt="Butik Klinik" class="section-title-logo">
            </h2>
            <a href="{{ route('boutiques') }}" class="section-link">Lihat semua produk</a>
        </div>
        <div class="cards-grid">
            @forelse($boutiques->take(6) as $boutique)
                <div class="card">
                    @if($boutique->image)
                        <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}" class="card-image" onerror="this.src='https://via.placeholder.com/400x300?text=Product'">
                    @else
                        <div class="card-image placeholder-img">Gambar Produk</div>
                    @endif
                    <div class="card-content">
                        <h3 class="card-title">{{ $boutique->name }}</h3>
                        <p class="card-location" style="margin-bottom: 0.5rem;">{{ $boutique->category }}</p>
                        @if($boutique->description)
                            <p style="font-size: 0.875rem; opacity: 0.8; margin-bottom: 0.5rem; line-height: 1.5;">{{ Str::limit($boutique->description, 80) }}</p>
                        @endif
                </div>
                        </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #F0EDE5; opacity: 0.7;">Belum ada produk butik tersedia.</p>
            @endforelse
                    </div>
        <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20butik%20Klinik%20MMC" target="_blank" class="boutique-wa-button">
            <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Hubungi Toko
        </a>
    </section>

    <!-- Obat Section -->
    <section class="section" id="medicines">
        <div class="section-header">
            <h2 class="section-title">Obat & Suplemen</h2>
            <a href="{{ route('medicines') }}" class="section-link">Lihat semua obat</a>
                        </div>
        <div class="cards-grid">
            @forelse($medicines->take(6) as $medicine)
                <div class="card">
                    @if($medicine->image)
                        <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->name }}" class="card-image" onerror="this.src='https://via.placeholder.com/400x300?text=Medicine'">
                    @else
                        <div class="card-image placeholder-img">Gambar Obat</div>
                    @endif
                    <div class="card-content">
                        <h3 class="card-title">{{ $medicine->name }}</h3>
                        @if($medicine->description)
                            <p style="font-size: 0.875rem; color: #004643; opacity: 0.8; margin-bottom: 0.5rem; line-height: 1.5;">{{ Str::limit($medicine->description, 80) }}</p>
                        @endif
                        @if(isset($medicine->stock))
                            <div style="margin-top: 0.5rem;">
                                <span style="font-size: 0.875rem; color: #004643; opacity: 0.7;">Stok: {{ $medicine->stock }}</span>
                            </div>
                        @endif
                        </div>
                    </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #004643; opacity: 0.7;">Belum ada obat tersedia.</p>
            @endforelse
                        </div>
    </section>

    <!-- Layanan Section -->
    <section class="section" id="services">
        <div class="section-header">
            <h2 class="section-title">Layanan Klinik</h2>
            <a href="#all-services" class="section-link">Lihat semua layanan</a>
                        </div>
        <div class="cards-grid">
            @forelse($services->take(6) as $service)
                <div class="card">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="card-image" onerror="this.src='https://via.placeholder.com/400x300?text=Service'">
                    @else
                        <div class="card-image placeholder-img">Gambar Layanan</div>
                    @endif
                    <div class="card-content">
                        <h3 class="card-title">{{ $service->name }}</h3>
                        @if($service->description)
                            <p style="font-size: 0.875rem; color: #004643; opacity: 0.8; margin-bottom: 0.5rem; line-height: 1.5;">{{ Str::limit($service->description, 100) }}</p>
                        @endif
                    </div>
                        </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #004643; opacity: 0.7;">Belum ada layanan tersedia.</p>
            @endforelse
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="footer-container">
            <div class="footer-top">
                <div>
                    <div class="footer-logo">
                        <img src="{{ asset('storage/assets/logo/logo klinik.png') }}" alt="Logo Klinik MMC" class="footer-logo-img">
                        Klinik MMC (Mumtaz Medical Center)
                    </div>
                    <p style="color: #a0a0a0; font-size: 0.875rem; margin-bottom: 1.5rem; line-height: 1.6;">Klinik MMC (Mumtaz Medical Center) menyediakan layanan kesehatan terpercaya dengan dokter spesialis berpengalaman dan fasilitas modern untuk memberikan perawatan terbaik bagi Anda dan keluarga.</p>
                    <div class="footer-social">
                        <p class="footer-social-text">Follow us on</p>
                        <div class="social-icons">
                            <div class="social-icon">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </div>
                            <div class="social-icon">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </div>
                            <div class="social-icon">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                </svg>
                            </div>
                            <div class="social-icon">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </div>
                            <div class="social-icon">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Layanan</h4>
                    <ul class="footer-links">
                        @forelse($services->take(6) as $service)
                            <li><a href="#services">{{ $service->name }}</a></li>
                        @empty
                            <li><a href="#services">Konsultasi Dokter</a></li>
                            <li><a href="#services">Pemeriksaan Kesehatan</a></li>
                            <li><a href="#services">Laboratorium</a></li>
                            <li><a href="#services">Farmasi</a></li>
                            <li><a href="#services">Rawat Jalan</a></li>
                            <li><a href="#services">Poli Gigi</a></li>
                        @endforelse
                    </ul>
                </div>
                <div>
                    <h4>Kontak</h4>
                    <div class="contact-info">
                        <div class="contact-item">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <span>Jl. Aipda Jl. KS. Tubun No.44 Sel., 52131, Pekauman Kulon, Randugunting, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52192</span>
                        </div>
                        <div class="contact-item">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <a href="tel:+62212345678">+62 21 2345 6789</a>
                        </div>
                        <div class="contact-item">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <a href="mailto:info@kliniksehat.com">info@kliniksehat.com</a>
                        </div>
                        <div class="contact-item">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                            <span>Senin: 17.00–20.00<br>Selasa: 17.00–20.00<br>Rabu: 17.00–20.00<br>Kamis: 17.00–20.00<br>Jumat: 17.00–20.00<br>Sabtu: 17.00–20.00<br>Minggu: Tutup</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Lokasi</h4>
                    <iframe 
                        src="https://www.google.com/maps?q=Jl.+Aipda+KS.+Tubun+No.44+Sel.,+Pekauman+Kulon,+Randugunting,+Kec.+Tegal+Sel.,+Kota+Tegal,+Jawa+Tengah+52192&output=embed" 
                        class="footer-map"
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Klinik MMC (Mumtaz Medical Center). By Acep dan Adit.</p>
            </div>
        </div>
    </footer>

    <!-- Booking Modal -->
    <div id="bookingModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 9999; align-items: center; justify-content: center;">
        <div style="background: #F0EDE5; background-image: radial-gradient(circle, rgba(0, 70, 67, 0.2) 1px, transparent 1px); background-size: 20px 20px; padding: 2rem; border-radius: 8px; max-width: 500px; width: 90%; max-height: 90vh; overflow-y: auto; position: relative;">
            <button onclick="closeBookingModal()" style="position: absolute; top: 1rem; right: 1rem; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #004643;">&times;</button>
            <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1.5rem; color: #004643;">Buat Janji Temu</h2>
            
            @if(session('success'))
                <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
                    {{ session('success') }}
        </div>
            @endif
            
            @if($errors->any())
                <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
                    <ul style="margin: 0; padding-left: 1.5rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #004643;">Nama Lengkap</label>
                    <input type="text" name="nama_pasien" required style="width: 100%; max-width: 100%; padding: 0.75rem; border: 1px solid #004643; border-radius: 4px; font-size: 1rem; color: #004643; background: #ffffff; box-sizing: border-box;" value="{{ old('nama_pasien') }}">
                            </div>
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #004643;">Keluhan</label>
                    <textarea name="keluhan" required rows="4" style="width: 100%; max-width: 100%; padding: 0.75rem; border: 1px solid #004643; border-radius: 4px; font-size: 1rem; color: #004643; background: #ffffff; resize: vertical; box-sizing: border-box;">{{ old('keluhan') }}</textarea>
                </div>
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #004643;">Nomor Handphone</label>
                    <input type="text" name="nomor_handphone" required placeholder="08xx atau +62xx" style="width: 100%; max-width: 100%; padding: 0.75rem; border: 1px solid #004643; border-radius: 4px; font-size: 1rem; color: #004643; background: #ffffff; box-sizing: border-box;" value="{{ old('nomor_handphone') }}">
            </div>
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #004643;">Pilih Dokter</label>
                    <select name="doctor_id" id="doctorSelect" required style="width: 100%; max-width: 100%; padding: 0.75rem; border: 1px solid #004643; border-radius: 4px; font-size: 1rem; color: #004643; background: #ffffff; box-sizing: border-box;">
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->nama }} - {{ $doctor->spesialisasi }}</option>
                        @endforeach
                    </select>
                    </div>
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #004643;">Pilih Jam</label>
                    <select name="jam" id="jamSelect" required disabled style="width: 100%; max-width: 100%; padding: 0.75rem; border: 1px solid #004643; border-radius: 4px; font-size: 1rem; color: #004643; background: #ffffff; box-sizing: border-box;">
                        <option value="">-- Pilih Dokter Terlebih Dahulu --</option>
                    </select>
                    <small style="display: block; margin-top: 0.25rem; color: #004643; opacity: 0.7; font-size: 0.875rem;">Jam akan tersedia setelah memilih dokter</small>
                    <input type="hidden" id="oldJam" value="{{ old('jam') }}">
                </div>
                
                <div style="display: flex; gap: 1rem; width: 100%; max-width: 100%; box-sizing: border-box;">
                    <button type="button" onclick="closeBookingModal()" style="flex: 1; min-width: 0; padding: 0.75rem; background: transparent; border: 1px solid #004643; border-radius: 4px; color: #004643; font-weight: 500; cursor: pointer; box-sizing: border-box;">Batal</button>
                    <button type="submit" style="flex: 1; min-width: 0; padding: 0.75rem; background: #004643; border: none; border-radius: 4px; color: #F0EDE5; font-weight: 500; cursor: pointer; box-sizing: border-box;">Submit</button>
            </div>
            </form>
        </div>
    </div>

    <script>
        function openBookingModal() {
            document.getElementById('bookingModal').style.display = 'flex';
            // Truncate select options for mobile
            setTimeout(truncateSelectOptions, 100);
        }
        
        function closeBookingModal() {
            document.getElementById('bookingModal').style.display = 'none';
        }
        
        // Close modal when clicking outside
        document.getElementById('bookingModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeBookingModal();
            }
        });
        
        // Function to truncate text in select options for mobile
        function truncateSelectOptions() {
            const isMobile = window.innerWidth <= 768;
            const maxLength = isMobile ? 25 : 50;
            
            const doctorSelect = document.getElementById('doctorSelect');
            const jamSelect = document.getElementById('jamSelect');
            
            [doctorSelect, jamSelect].forEach(select => {
                if (!select) return;
                Array.from(select.options).forEach(option => {
                    if (option.textContent.length > maxLength) {
                        option.textContent = option.textContent.substring(0, maxLength) + '...';
                    }
                });
            });
        }
        
        // Load doctor hours when doctor is selected
        document.getElementById('doctorSelect')?.addEventListener('change', function() {
            const doctorId = this.value;
            const jamSelect = document.getElementById('jamSelect');
            
            // Reset jam select
            jamSelect.innerHTML = '<option value="">-- Memuat jam operasional --</option>';
            jamSelect.disabled = true;
            
            if (!doctorId) {
                jamSelect.innerHTML = '<option value="">-- Pilih Dokter Terlebih Dahulu --</option>';
                truncateSelectOptions();
                return;
            }
            
            // Fetch doctor hours from API
            const oldJamValue = document.getElementById('oldJam')?.value;
            
            fetch(`/api/doctor/${doctorId}/hours`)
                .then(response => response.json())
                .then(hours => {
                    jamSelect.innerHTML = '<option value="">-- Pilih Jam --</option>';
                    
                    if (hours.length > 0) {
                        hours.forEach(hour => {
                            const option = document.createElement('option');
                            option.value = hour.value;
                            let label = hour.label;
                            // Truncate label for mobile
                            if (window.innerWidth <= 768 && label.length > 25) {
                                label = label.substring(0, 25) + '...';
                            }
                            option.textContent = label;
                            if (oldJamValue && hour.value === oldJamValue) {
                                option.selected = true;
                            }
                            jamSelect.appendChild(option);
                        });
                        jamSelect.disabled = false;
            } else {
                        jamSelect.innerHTML = '<option value="">-- Jam tidak tersedia --</option>';
                    }
                    truncateSelectOptions();
                })
                .catch(error => {
                    console.error('Error loading doctor hours:', error);
                    jamSelect.innerHTML = '<option value="">-- Error memuat jam --</option>';
                    truncateSelectOptions();
                });
        });
        
        // Load hours on page load if doctor is already selected (for form validation errors)
        document.addEventListener('DOMContentLoaded', function() {
            truncateSelectOptions();
            
            const doctorSelect = document.getElementById('doctorSelect');
            
            if (doctorSelect && doctorSelect.value) {
                // Trigger change to load hours
                const changeEvent = new Event('change');
                doctorSelect.dispatchEvent(changeEvent);
            }
            
            // Truncate on window resize
            let resizeTimeout;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(truncateSelectOptions, 250);
            });
            
            // Navbar hide/show on scroll
            const header = document.querySelector('.header');
            let lastScrollTop = 0;
            
            // Set initial state
            if (window.pageYOffset === 0) {
                header.classList.add('at-top');
            }
            
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop === 0) {
                    // Di posisi paling atas, transparan dengan teks #004643
                    header.classList.add('at-top');
                    header.classList.remove('hidden');
                } else {
                    // Setelah scroll, tampilkan navbar dengan background normal
                    header.classList.remove('at-top');
                    header.classList.remove('hidden');
                }
                
                lastScrollTop = scrollTop;
            });
            
            // Abstract shapes cursor interaction with float animation
            const shapes = document.querySelectorAll('.shape');
            let mouseX = window.innerWidth / 2;
            let mouseY = window.innerHeight / 2;
            let windowWidth = window.innerWidth;
            let windowHeight = window.innerHeight;
            let startTime = Date.now();
            
            // Animation patterns for each shape (different for variety)
            const animationPatterns = [
                { x: 30, y: -30, x2: -20, y2: 20, rot: 5, rot2: -5 }, // shape-1
                { x: -25, y: 25, x2: 20, y2: -20, rot: -3, rot2: 3 },  // shape-2
                { x: 20, y: 20, x2: -15, y2: -15, rot: 4, rot2: -4 }, // shape-3
                { x: -30, y: 30, x2: 25, y2: -25, rot: -5, rot2: 5 },  // shape-4
                { x: 15, y: -15, x2: -10, y2: 10, rot: 3, rot2: -3 }, // shape-5
                { x: -20, y: -20, x2: 15, y2: 15, rot: -4, rot2: 4 }  // shape-6
            ];
            
            // Cursor speed multipliers for parallax effect
            const cursorSpeeds = [0.3, 0.5, 0.4, 0.6, 0.35, 0.45];
            
            // Update window dimensions on resize
            window.addEventListener('resize', function() {
                windowWidth = window.innerWidth;
                windowHeight = window.innerHeight;
            });
            
            // Animation loop combining float animation with cursor effect
            function animateShapes() {
                const currentTime = Date.now();
                const elapsed = (currentTime - startTime) / 1000; // Convert to seconds
                const animationDuration = 20; // 20 seconds per cycle
                const progress = (elapsed % animationDuration) / animationDuration;
                
                // Calculate center of screen
                const centerX = windowWidth / 2;
                const centerY = windowHeight / 2;
                
                // Calculate cursor offset from center (normalized to -1 to 1)
                const cursorOffsetX = (mouseX - centerX) / centerX;
                const cursorOffsetY = (mouseY - centerY) / centerY;
                
                shapes.forEach((shape, index) => {
                    const pattern = animationPatterns[index] || animationPatterns[0];
                    const cursorSpeed = cursorSpeeds[index] || 0.4;
                    
                    // Calculate float animation position using easing
                    let floatX, floatY, rotation;
                    if (progress < 0.33) {
                        const t = progress / 0.33;
                        const ease = t * t * (3 - 2 * t); // Smoothstep
                        floatX = pattern.x * ease;
                        floatY = pattern.y * ease;
                        rotation = pattern.rot * ease;
                    } else if (progress < 0.66) {
                        const t = (progress - 0.33) / 0.33;
                        const ease = t * t * (3 - 2 * t);
                        floatX = pattern.x + (pattern.x2 - pattern.x) * ease;
                        floatY = pattern.y + (pattern.y2 - pattern.y) * ease;
                        rotation = pattern.rot + (pattern.rot2 - pattern.rot) * ease;
                    } else {
                        const t = (progress - 0.66) / 0.34;
                        const ease = t * t * (3 - 2 * t);
                        floatX = pattern.x2 + (0 - pattern.x2) * ease;
                        floatY = pattern.y2 + (0 - pattern.y2) * ease;
                        rotation = pattern.rot2 + (0 - pattern.rot2) * ease;
                    }
                    
                    // Calculate cursor effect (max 50px movement)
                    const cursorX = cursorOffsetX * 50 * cursorSpeed;
                    const cursorY = cursorOffsetY * 50 * cursorSpeed;
                    
                    // Combine float animation with cursor effect
                    const totalX = floatX + cursorX;
                    const totalY = floatY + cursorY;
                    
                    // Apply transform
                    shape.style.transform = `translate(${totalX}px, ${totalY}px) rotate(${rotation}deg)`;
                });
                
                requestAnimationFrame(animateShapes);
            }
            
            // Track mouse movement
            document.addEventListener('mousemove', function(e) {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });
            
            // Reset cursor position when mouse leaves window
            document.addEventListener('mouseleave', function() {
                mouseX = windowWidth / 2;
                mouseY = windowHeight / 2;
            });
            
            // Start animation loop
            animateShapes();
        });
        
        // Mobile menu toggle functions
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileMenu) {
                mobileMenu.classList.toggle('active');
            }
        }
        
        function closeMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileMenu) {
                mobileMenu.classList.remove('active');
            }
        }
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const toggleButton = document.querySelector('.mobile-menu-toggle');
            
            if (mobileMenu && toggleButton && 
                !mobileMenu.contains(event.target) && 
                !toggleButton.contains(event.target) &&
                mobileMenu.classList.contains('active')) {
                closeMobileMenu();
            }
        });
        
        // Close mobile menu on scroll
        window.addEventListener('scroll', function() {
            closeMobileMenu();
        });

        // Filter tabs functionality for doctors
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                const specialty = this.getAttribute('data-specialty');
                const doctorCards = document.querySelectorAll('[data-specialty]');
                
                doctorCards.forEach(card => {
                    if (!specialty || card.getAttribute('data-specialty') === specialty) {
                        card.style.display = 'block';
                } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Smooth scroll for anchor links with offset for sticky navbar
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                if (href === '#' || href === '#contact') {
                    // For contact/footer, scroll normally
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                } else {
                    // For other sections, use offset
                    const target = document.querySelector(href);
                    if (target) {
                        const headerOffset = 80;
                        const elementPosition = target.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>
