<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Isersan - Web Tasarım & Yazılım</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Product+Sans&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f7; /* Mac-like background */
            color: #202124;
        }

        /* Browser Window Container */
        .browser-window {
            width: 1200px;
            height: 800px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid #d1d1d1;
        }

        /* Top Bar (Chrome-like) */
        .browser-toolbar {
            background-color: #dfe3e7;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #d1d1d1;
            gap: 20px;
        }

        /* Window Controls (Traffic Lights) */
        .window-controls {
            display: flex;
            gap: 8px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .dot.red { background-color: #ff5f56; border: 1px solid #e0443e; }
        .dot.yellow { background-color: #ffbd2e; border: 1px solid #dea123; }
        .dot.green { background-color: #27c93f; border: 1px solid #1aab29; }

        /* Navigation Icons */
        .nav-icons {
            display: flex;
            gap: 15px;
            color: #5f6368;
        }

        .nav-icon-btn {
            width: 16px;
            height: 16px;
            fill: currentColor;
            opacity: 0.3; /* Disabled by default */
            cursor: default;
            transition: opacity 0.2s;
            border: none;
            background: none;
            padding: 0;
        }

        .nav-icon-btn.active {
            opacity: 1; /* Active state */
            cursor: pointer;
        }

        .nav-icon-btn.active:hover {
            color: #202124;
        }

        /* Address Bar */
        .address-bar {
            flex-grow: 1;
            background-color: #fff;
            height: 28px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            padding: 0 15px;
            font-size: 13px;
            color: #5f6368;
            border: 1px solid #dcdcdc;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .address-bar .lock-icon {
            width: 12px;
            height: 12px;
            margin-right: 8px;
            fill: #5f6368;
        }

        /* Website Header / Menu */
        .website-header {
            display: flex;
            justify-content: flex-end;
            padding: 24px 50px;
            align-items: center;
            flex-shrink: 0;
            font-family: 'Montserrat', sans-serif;
        }

        .nav-link {
            text-decoration: none;
            color: #5f6368;
            margin-left: 24px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-link:hover {
            color: #202124;
        }

        /* Language Dropdown */
        .lang-container {
            position: relative;
            margin-left: 24px;
            margin-right: 12px;
        }

        .lang-trigger {
            display: flex;
            align-items: center;
            gap: 4px;
            color: #5f6368;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            padding: 6px 8px;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .lang-trigger:hover {
            background-color: #f1f3f4;
            color: #202124;
        }

        .lang-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-radius: 8px;
            padding: 6px 0;
            min-width: 120px;
            display: none;
            z-index: 200;
            border: 1px solid #dadce0;
        }

        .lang-container:hover .lang-dropdown {
            display: block;
        }

        .lang-option {
            display: block;
            padding: 8px 16px;
            text-decoration: none;
            color: #3c4043;
            font-size: 13px;
            transition: background 0.2s;
        }

        .lang-option:hover {
            background-color: #f8f9fa;
            color: #202124;
        }

        /* Highlighted button style - Gray Version */
        .header-btn {
            background-color: #5f6368; /* Dark Gray */
            color: #fff !important;
            padding: 8px 20px;
            border-radius: 4px; /* More standard, slightly rounded */
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 0.1px;
            transition: all 0.2s;
            margin-left: 16px;
            text-decoration: none;
            border: 1px solid transparent;
        }

        .header-btn:hover {
            background-color: #4b4e52; /* Darker Gray on hover */
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
        }

        /* Content Area */
        .window-content {
            flex: 1 1 0; /* Grow, Shrink, Basis 0 - Forces correct sizing for scroll */
            position: relative;
            overflow-y: auto;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Main Center Content (Restored) */
        /* Main Center Content (Restored) */
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* justification removed to allow scrolling */
            padding-bottom: 80px;
            width: 100%;
            height: auto; /* Allow content to dictate height */
            flex-shrink: 0; /* Prevent shrinking */
        }

        /* Search Results View */
        .results-container {
            padding: 20px 15%; /* Google-ish left spacing */
            display: none;
            flex-direction: column;
            gap: 30px;
            animation: fadeIn 0.3s ease;
        }

        .result-item {
            display: flex;
            flex-direction: column;
            max-width: 600px;
        }

        .result-url {
            color: #202124;
            font-size: 14px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }
        
        .result-url img {
            width: 16px;
            height: 16px;
            margin-right: 8px;
            border-radius: 50%;
            background: #f1f3f4;
        }

        .result-title {
            color: #1a0dab;
            font-family: Arial, sans-serif; /* Google uses simple Arial often */
            font-size: 20px;
            text-decoration: none;
            margin-bottom: 3px;
            line-height: 1.3;
        }

        .result-title:hover {
            text-decoration: underline;
        }

        .result-desc {
            color: #4d5156;
            font-size: 14px;
            line-height: 1.58;
            font-family: -apple-system, BlinkMacSystemFont, Arial, sans-serif;
        }

        .domain-result {
            margin-top: 25px;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 580px;
            text-align: center;
            font-size: 16px;
            display: none;
            animation: fadeIn 0.3s;
        }

        .hosting-options {
            display: flex;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .hosting-btn {
            background-color: #fff;
            border: 1px solid #dfe1e5;
            color: #3c4043;
            padding: 18px 30px;
            font-size: 16px;
            border-radius: 12px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            min-width: 220px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            font-weight: 500;
        }

        .hosting-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
            border-color: #1a73e8;
            color: #1a73e8;
        }

        .hosting-btn.active {
            background-color: #e8f0fe;
            border-color: #1a73e8;
            color: #1a73e8;
            font-weight: 600;
        }
        
        /* Pricing Tables */
        .pricing-container {
            display: none; /* Hidden by default */
            display: flex; /* Changed via JS */
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 40px;
            justify-content: center;
            opacity: 0;
            animation: slideUp 0.4s forwards;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .pricing-card {
            background: #fff;
            border: 1px solid #dfe1e5;
            border-radius: 12px;
            padding: 25px;
            width: 220px;
            text-align: center;
            transition: all 0.3s;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .pricing-card:hover {
            border-color: #1a73e8;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            transform: scale(1.02);
            z-index: 2;
        }

        .price-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #202124;
        }

        .price-tag {
            font-size: 28px;
            font-weight: bold;
            color: #1a73e8;
            margin-bottom: 20px;
        }
        
        .price-tag span {
            font-size: 14px;
            color: #5f6368;
            font-weight: normal;
        }

        .price-features {
            list-style: none;
            padding: 0;
            text-align: left;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .price-features li {
            margin-bottom: 8px;
            font-size: 13px;
            color: #5f6368;
            display: flex;
            align-items: center;
        }
        
        .price-features li::before {
            content: '✓';
            color: #137333;
            font-weight: bold;
            margin-right: 8px;
        }

        .price-btn {
            background: #fff;
            color: #1a73e8;
            border: 1px solid #1a73e8;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: 0.2s;
        }

        .price-btn:hover {
            background: #1a73e8;
            color: #fff;
        }
        
        /* Capabilities Grid (Software) */
        .capabilities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-top: 30px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 40px;
        }

        .cap-card {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #dfe1e5;
            text-align: left;
            transition: transform 0.2s;
        }
        
        .cap-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border-color: #1a73e8;
        }

        .cap-title {
            font-weight: 600;
            color: #202124;
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        .cap-desc {
            font-size: 13px; 
            color: #5f6368; 
            line-height: 1.5;
        }

        /* Web Design View Styles */
        .design-hero {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .design-hero h2 {
            font-size: 28px;
            color: #202124;
            margin-bottom: 15px;
            font-weight: 400;
        }
        
        .design-hero p {
            color: #5f6368;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
            font-size: 16px;
        }

        .process-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .process-step {
            background: #fff;
            border: 1px solid #dfe1e5;
            border-radius: 12px;
            padding: 25px;
            width: 200px;
            text-align: center;
            position: relative;
            transition: transform 0.2s;
        }

        .process-step:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border-color: #dadce0;
        }

        .step-number {
            width: 40px;
            height: 40px;
            background: #e8f0fe;
            color: #1a73e8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            margin: 0 auto 15px auto;
        }

        .step-title {
            font-weight: 600;
            color: #202124;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .step-desc {
            font-size: 13px;
            color: #5f6368;
            line-height: 1.5;
        }

        /* Offer Button & Modal */
        .offer-btn {
            background-color: #3c4043; /* Matte Dark Gray */
            color: #fff;
            border: 1px solid transparent;
            padding: 14px 40px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 4px; /* Slightly less rounded for a cleaner look, or keep 50px if preferred. Let's go with standard rounded rect for modern flat look */
            cursor: pointer;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            transition: all 0.2s;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.5px;
        }

        .offer-btn:hover {
            background-color: #202124; /* Darker on hover */
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transform: translateY(-1px);
        }

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; /* Changed to fixed to breakout of browser window */
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.5); 
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s;
        }

        .modal-content {
            background-color: #fefefe;
            padding: 30px;
            border-radius: 16px;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            position: relative;
            animation: slideUp 0.3s;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 15px;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #3c4043;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #dadce0;
            border-radius: 8px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.2s;
            font-family: 'Montserrat', sans-serif;
        }

        .form-control:focus {
            border-color: #1a73e8;
            border-width: 2px;
            padding: 9px 11px; /* adjust for border width */
        }

        .modal-btn {
            width: 100%;
            padding: 12px;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }

        .modal-btn:hover {
            background: #1557b0;
        }
        
        .modal-btn:hover {
            background: #1557b0;
        }

        /* FAQ Section */
        .faq-section {
            margin-top: 60px;
            text-align: left;
            border-top: 1px solid #dfe1e5;
            padding-top: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 80px;
        }

        .faq-title {
            font-size: 22px;
            color: #202124;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 400;
        }

        .faq-item {
            border-bottom: 1px solid #e0e0e0;
        }

        .faq-question {
            padding: 18px 0;
            font-size: 15px;
            font-weight: 500;
            color: #3c4043;
            cursor: pointer;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: color 0.2s;
        }

        .faq-question:hover {
            color: #1a73e8;
        }

        .faq-question::after {
            content: '+';
            font-size: 20px;
            font-weight: 400;
            color: #5f6368;
        }

        .faq-item.active .faq-question::after {
            content: '-';
        }

        .faq-item.active .faq-question {
            color: #1a73e8;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            color: #5f6368;
            font-size: 14px;
            line-height: 1.6;
            padding-right: 20px;
        }

        .faq-item.active .faq-answer {
            max-height: 300px; /* Arbitrary large height */
            padding-bottom: 20px;
        }
            color: #137333;
            border: 1px solid #ceead6;
        }

        .domain-taken {
            background-color: #fce8e6;
            color: #c5221f;
            border: 1px solid #fad2cf;
        }

        .domain-price {
            font-weight: bold;
            font-size: 18px;
            margin-top: 5px;
            display: block;
        }

        .logo {
            margin-bottom: 30px;
            cursor: default;
            /* Font styles removed as logo is now an image */
        }

        /* Branding Colors */
        .c-blue { color: #4285F4; }
        .c-red { color: #EA4335; }
        .c-yellow { color: #FBBC05; }
        .c-green { color: #34A853; }

        /* Search Box */
        .search-area {
            position: relative;
            width: 100%;
            max-width: 500px; /* Slightly narrower */
        }

        .search-box {
            display: flex;
            align-items: center;
            width: 100%;
            height: 44px;
            border: 1px solid #dfe1e5;
            border-radius: 24px;
            padding: 5px 8px 0 14px;
            transition: all 0.3s;
        }

        .search-box:hover, .search-box:focus-within {
            box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
            border-color: rgba(223, 225, 229, 0);
        }

        .search-icon {
            color: #9aa0a6;
            margin-right: 13px;
            display: flex;
            align-items: center;
        }

        .search-input {
            flex-grow: 1;
            border: none;
            outline: none;
            font-size: 16px;
            height: 34px;
            background-color: transparent;
        }

        .mic-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
            margin-right: 10px;
            background: url('data:image/svg+xml;utf8,<svg focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="%234285f4" d="m12 15c1.66 0 3-1.31 3-2.97v-7.02c0-1.66-1.34-3.01-3-3.01s-3 1.34-3 3.01v7.02c0 1.66 1.34 2.97 3 2.97z"/><path fill="%2334a853" d="m11 18.08h2v3.92h-2z"/><path fill="%23fbbc05" d="m7.05 16.87c-1.27-1.33-2.05-2.83-2.05-4.87h2c0 1.45 0.56 2.42 1.47 3.38v0.32l-1.15 1.18z"/><path fill="%23ea4335" d="m12 16.93a4.97 5.25 0 0 1 -3.54 -1.55l-1.41 1.41c1.26 1.32 3.03 2.13 4.95 2.13 3.87 0 6.99-2.92 6.99-7h-1.99c0 2.92-2.24 4.93-5 4.93z"/></svg>') no-repeat center center;
        }

        /* Buttons */
        .buttons-container {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .g-btn {
            background-color: #f8f9fa;
            border: 1px solid #f8f9fa;
            border-radius: 4px;
            color: #3c4043;
            font-family: arial, sans-serif;
            font-size: 14px;
            padding: 0 16px;
            line-height: 27px;
            height: 36px;
            min-width: 54px;
            text-align: center;
            cursor: pointer;
            user-select: none;
        }

        .g-btn:hover {
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            background-color: #f8f9fa;
            border: 1px solid #dadce0;
            color: #202124;
        }

        /* Suggestions */
        .suggestions-list {
            position: absolute;
            top: 46px;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 2px 6px rgba(32, 33, 36, 0.28);
            border-radius: 0 0 24px 24px;
            border-top: none;
            z-index: 100;
            overflow: hidden;
            display: none;
            padding-bottom: 10px;
        }

        .search-box.has-suggestions {
            border-bottom: none;
            border-radius: 24px 24px 0 0;
            box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
        }

        .suggestion-item {
            display: flex;
            align-items: center;
            padding: 6px 14px;
            cursor: pointer;
            font-size: 16px;
            color: #202124;
        }

        .suggestion-item:hover {
            background-color: #eee;
        }

        .suggestion-icon {
            color: #9aa0a6;
            margin-right: 14px;
            width: 16px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="browser-window">
        <!-- Toolbar / Address Bar Section -->
        <div class="browser-toolbar">
            <!-- Traffic Lights -->
            <div class="window-controls">
                <div class="dot red"></div>
                <div class="dot yellow"></div>
                <div class="dot green"></div>
            </div>

            <!-- Navigation Arrows -->
            <div class="nav-icons">
                <svg id="backButton" class="nav-icon-btn" onclick="goBack()" viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path></svg>
                <svg id="forwardButton" class="nav-icon-btn" onclick="goForward()" viewBox="0 0 24 24"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path></svg>
                <svg class="nav-icon-btn active" onclick="location.reload()" viewBox="0 0 24 24"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"></path></svg>
                <svg class="nav-icon-btn active" onclick="navigate('home', 'isersa.com'); return false;" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
            </div>

            <!-- Address Bar -->
            <div class="address-bar">
                <svg class="lock-icon" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-9-2c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"></path></svg>
                <input type="text" id="addressInput" value="isersa.com" style="border:none; outline:none; font-size:13px; color:#3c4043; width:100%; height:100%; background:transparent;" onkeypress="handleAddressBar(event)">
            </div>
            
             <!-- Settings/Menu (Optional) -->
            <div class="nav-icons" style="margin-left:auto;">
                 <svg viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
            </div>
        </div>

        <!-- Content -->
        <div class="window-content">
            <!-- Website Header inside the browser window -->
            <nav class="website-header">
                <a href="#" class="nav-link" id="servicesLink">Hizmetlerimiz</a>
                <a href="#" class="nav-link" id="portfolioLink">Portfolyo</a>
                <a href="#" class="nav-link" id="aboutLink">Hakkımızda</a>
                
                <!-- Language Dropdown -->
                <div class="lang-container">
                    <a href="#" class="lang-trigger">
                        <svg focusable="false" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2 0 .68.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2 0-.68.07-1.35.16-2h4.68c.09.65.16 1.32.16 2 0 .68-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2 0-.68-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"/></svg>
                        TR
                    </a>
                    <div class="lang-dropdown">
                        <a href="#" class="lang-option">Türkçe</a>
                        <a href="#" class="lang-option">English</a>
                    </div>
                </div>

                <a href="#" class="header-btn" id="contactBtn">İletişim</a>
            </nav>

            <div class="main-container" id="homeView" style="flex-grow: 1; justify-content: center; padding-bottom: 0;">
                <!-- Logo -->
                <div class="logo">
                    <img src="/images/logo.png" alt="Isersan" style="height: 150px;">
                </div>

                <!-- Search Area -->
                <div class="search-area">
                    <div class="search-box" id="searchBox">
                        <div class="search-icon">
                            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="#9aa0a6"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                        </div>
                        <input type="text" class="search-input" id="searchInput" autocomplete="off" placeholder="Size nasıl yardımcı olabiliriz?">

                    </div>

                    <!-- Suggestions Dropdown -->
                    <div class="suggestions-list" id="suggestionsList"></div>
                </div>

                <!-- Buttons -->
                <div class="buttons-container">
                    <button class="g-btn" onclick="handleSearchButton()">Ara</button>
                    <button class="g-btn" onclick="navigate('results', 'isersa.com/hizmetlerimiz')">Kendimi Şanslı Hissediyorum</button>
                </div>
            </div>

            <!-- Domain Search View -->
            <div class="main-container" id="domainView" style="display: none; flex-grow: 1; justify-content: center;">
                <div class="logo">
                    <img src="/images/logo.png" alt="Isersan" style="height: 150px;">
                </div>

                <div style="margin-top: 20px; color: #5f6368; font-size: 16px;">
                    Sorgulamak istediğiniz alan adını yukarıdaki adres çubuğuna yazıp Enter'a basın.
                </div>
                
                <div id="domainResult" class="domain-result"></div>
            </div>

            <!-- Hosting View -->
            <div class="main-container" id="hostingView" style="display: none; flex-grow: 1; justify-content: center;">
                <div class="logo">
                    <img src="/images/logo.png" alt="Isersan" style="height: 150px;">
                </div>
                
                <h3 style="color:#5f6368; font-weight:400; margin-top:10px; margin-bottom:5px;">Hosting Çözümlerimiz</h3>
                <p id="hostingDesc" style="color:#5f6368; font-size:14px; max-width:600px; margin:0 auto 20px auto; line-height:1.5;">
                    Web sitenizin ihtiyaçlarına en uygun barındırma çözümünü seçin. Yüksek performanslı sunucularımız, gelişmiş güvenlik önlemlerimiz ve 7/24 teknik desteğimiz ile dijital dünyada kesintisiz yer alın. Lütfen incelemek istediğiniz kategoriyi aşağıdan seçiniz.
                </p>

                <div class="hosting-options">
                    <button class="hosting-btn" onclick="showPackages(this, 'Bireysel')">Bireysel Web Hosting</button>
                    <button class="hosting-btn" onclick="showPackages(this, 'Kurumsal')">Kurumsal Web Hosting</button>
                    <button class="hosting-btn" onclick="showPackages(this, 'NodeJS')">Node JS Hosting</button>
                </div>

                <!-- Use display:none initially, we'll toggle flex in JS but adding inline style to hide first -->
                <div class="pricing-container" id="pricingDisplay" style="display:none;">
                    <!-- Package 1 -->
                    <div class="pricing-card">
                        <div class="price-title">Başlangıç</div>
                        <div class="price-tag">$2.99<span>/ay</span></div>
                        <ul class="price-features">
                            <li>1 Web Sitesi</li>
                            <li>10 GB SSD Disk</li>
                            <li>Sınırsız Trafik</li>
                            <li>Ücretsiz SSL</li>
                            <li>5 E-posta Hesabı</li>
                        </ul>
                        <button class="price-btn">Sepete Ekle</button>
                    </div>
                    <!-- Package 2 -->
                    <div class="pricing-card" style="border-top: 4px solid #1a73e8; transform: scale(1.05);">
                        <div class="price-title" style="color:#1a73e8;">Ekonomik</div>
                        <div class="price-tag">$5.99<span>/ay</span></div>
                        <ul class="price-features">
                            <li>5 Web Sitesi</li>
                            <li>50 GB SSD Disk</li>
                            <li>Sınırsız Trafik</li>
                            <li>Ücretsiz SSL</li>
                            <li>Sınırsız E-posta</li>
                            <li>Haftalık Yedekleme</li>
                        </ul>
                        <button class="price-btn" style="background:#1a73e8; color:white;">Sepete Ekle</button>
                    </div>
                    <!-- Package 3 -->
                    <div class="pricing-card">
                        <div class="price-title">Profesyonel</div>
                        <div class="price-tag">$9.99<span>/ay</span></div>
                        <ul class="price-features">
                            <li>10 Web Sitesi</li>
                            <li>100 GB SSD Disk</li>
                            <li>Sınırsız Trafik</li>
                            <li>Ücretsiz SSL & Domain</li>
                            <li>Özel IP Adresi</li>
                            <li>Günlük Yedekleme</li>
                        </ul>
                        <button class="price-btn">Sepete Ekle</button>
                    </div>
                    <!-- Package 4 -->
                    <div class="pricing-card">
                        <div class="price-title">Ultimate</div>
                        <div class="price-tag">$19.99<span>/ay</span></div>
                        <ul class="price-features">
                            <li>Sınırsız Web Sitesi</li>
                            <li>Sınırsız SSD Disk</li>
                            <li>Limitsiz Trafik</li>
                            <li>Ücretsiz SSL & Domain</li>
                            <li>Öncelikli Destek</li>
                            <li>LiteSpeed Cache</li>
                        </ul>
                        <button class="price-btn">Sepete Ekle</button>
                    </div>
                </div>
            </div>

            <!-- Web Design View -->
            <div class="main-container" id="webDesignView" style="display: none;">
                
                <div class="design-hero">
                    <h2>Hayalinizdeki Web Sitesini Tasarlıyoruz</h2>
                    <p>
                        Markanızı dijital dünyada en iyi şekilde temsil edecek, estetik ve teknolojinin buluştuğu web projeleri üretiyoruz. 
                        Kullanıcı deneyimini (UX) merkeze alan yaklaşımımızla, ziyaretçilerinizi müşteriye dönüştüren dijital çözümler sunuyoruz.
                    </p>
                </div>

                <h3 style="color:#5f6368; font-weight:400; text-align:center; margin-top:30px;">Çalışma Sürecimiz</h3>

                <div class="process-container">
                    <!-- Step 1 -->
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <div class="step-title">Analiz & Planlama</div>
                        <div class="step-desc">
                            İhtiyaçlarınızı dinliyor, hedef kitlenizi belirliyor ve projenin yol haritasını stratejik olarak oluşturuyoruz.
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <div class="step-title">Tasarım & UI/UX</div>
                        <div class="step-desc">
                            Marka kimliğinize uygun, modern, mobil uyumlu ve etkileyici arayüz tasarımları hazırlıyoruz.
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <div class="step-title">Kodlama</div>
                        <div class="step-desc">
                            Onaylanan tasarımları, güncel web teknolojileri ve temiz kod yapısıyla işlevsel bir web sitesine dönüştürüyoruz.
                        </div>
                    </div>
                    <!-- Step 4 -->
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <div class="step-title">Test & Yayına Alma</div>
                        <div class="step-desc">
                            Tüm fonksiyonları test ediyor, gerekli optimizasyonları sağlıyor ve projenizi sorunsuz bir şekilde yayına alıyoruz.
                        </div>
                    </div>
                </div>
                

                
                <div style="text-align:center; margin-top:40px;">
                     <button class="offer-btn" onclick="openOfferModal()">Teklif İste</button>
                </div>

                <!-- Extra Info Text -->
                <div style="margin-top: 50px; text-align:center; color:#5f6368; max-width:700px; margin-left:auto; margin-right:auto; font-size:14px; line-height:1.6;">
                    <p>Modern teknolojiler (HTML5, CSS3, React/Vue) kullanarak, Google ve diğer arama motorlarıyla tam uyumlu, hızlı, güvenli ve ölçeklenebilir web siteleri geliştiriyoruz. Sadece bir web sitesi değil, yaşayan ve size kazanç sağlayan bir dijital varlık sunuyoruz.</p>
                </div>

                <!-- FAQ Section -->
                <div class="faq-section">
                    <h3 class="faq-title">Sıkça Sorulan Sorular</h3>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Web sitesi projesi ne kadar sürede tamamlanır?</div>
                        <div class="faq-answer">
                            Projenin kapsamına ve özelliklerine göre değişmekle birlikte, ortalama bir kurumsal web sitesi 2-4 hafta, kapsamlı e-ticaret siteleri ise 4-8 hafta içerisinde tamamlanmaktadır. Tasarım ve içerik onayı süreçleri bu süreyi etkileyebilir.
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Tasarım mobil cihazlarla uyumlu mu?</div>
                        <div class="faq-answer">
                            Evet, geliştirdiğimiz tüm web siteleri %100 Responsive (Duyarlı) tasarıma sahiptir. Telefon, tablet, laptop ve masaüstü bilgisayarlarda kusursuz görüntülenir ve google mobil uyumluluk kriterlerine tam uyar.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Site bittikten sonra yönetim paneli veriyor musunuz?</div>
                        <div class="faq-answer">
                            Kesinlikle. Sitenizi kod bilgisine ihtiyaç duymadan güncelleyebileceğiniz, Türkçe ve kullanıcı dostu bir yönetim paneli sunuyoruz. Ürünlerinizi, yazılarınızı veya görsellerinizi kolayca yönetebilirsiniz.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">SEO (Arama Motoru Optimizasyonu) yapıyor musunuz?</div>
                        <div class="faq-answer">
                            Tüm projelerimizi SEO altyapısına uygun olarak, temiz kod yapısıyla geliştiriyoruz. Temel SEO ayarları, hızlı açılış optimizasyonları ve sitemap kurulumları standart hizmet paketimiz içerisindedir.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom Software View -->
            <div class="main-container" id="customSoftwareView" style="display: none;">
                
                <div class="design-hero">
                    <h2>İşinize Özel Yazılım Çözümleri</h2>
                    <p>
                        Standart paket programların sınırlarına takılmayın. İş süreçlerinize birebir uyum sağlayan, verimliliğinizi artıran ve tamamen size özel geliştirilen web tabanlı yazılım mimarileri kuruyoruz.
                    </p>
                </div>

                <h3 style="color:#5f6368; font-weight:400; text-align:center; margin-top:30px;">Neler Geliştiriyoruz?</h3>

                <div class="capabilities-grid">
                    <div class="cap-card">
                        <div class="cap-title">CRM & Müşteri Yönetimi</div>
                        <div class="cap-desc">Müşteri ilişkilerinizi, satış süreçlerinizi, teklif ve sözleşmelerinizi tek merkezden yönetebileceğiniz size özel paneller.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">B2B / B2C Portallar</div>
                        <div class="cap-desc">Bayileriniz için sipariş yönetim sistemleri veya son kullanıcılarınız için özelleştirilmiş e-ticaret deneyimleri.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">SaaS Projeleri</div>
                        <div class="cap-desc">Abonelik tabanlı yazılım fikirlerinizi hayata geçiriyor, ölçeklenebilir ve güvenli bulut mimarileri (Cloud) kuruyoruz.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">ERP Entegrasyonları</div>
                        <div class="cap-desc">Muhasebe, stok ve lojistik programlarınızla (Logo, Mikro, Netsis vb.) çift yönlü tam entegre çalışan web arayüzleri.</div>
                    </div>
                </div>

                <h3 style="color:#5f6368; font-weight:400; text-align:center; margin-top:50px;">Geliştirme Sürecimiz</h3>

                <div class="process-container">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <div class="step-title">Analiz & Mimari</div>
                        <div class="step-desc">
                            İş akışlarınızı dinliyor, veritabanı yapısını ve kullanılacak teknoloji stack'ini (Laravel, Node.js, Python) projelendiriyoruz.
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <div class="step-title">Agile Geliştirme</div>
                        <div class="step-desc">
                            Projeyi modüllere bölerek, her aşamada size sunum yapıyor ve geri bildirimlerinizle ilerlemeyi sürdürüyoruz.
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <div class="step-title">Test & Güvenlik</div>
                        <div class="step-desc">
                            Yük testleri, güvenlik taramaları (Penetrasyon) ve kullanıcı kabul testleri (UAT) ile yazılımı zorlu koşullara hazırlıyoruz.
                        </div>
                    </div>
                </div>
                
                <div style="text-align:center; margin-top:50px;">
                        <button class="offer-btn" onclick="openOfferModal()">Teklif İste</button>
                </div>

                <!-- FAQ Section for Software -->
                <div class="faq-section" style="padding-bottom: 80px;">
                    <h3 class="faq-title">Sıkça Sorulan Sorular</h3>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Yazılımın kaynak kodlarını teslim ediyor musunuz?</div>
                        <div class="faq-answer">
                            Evet, özel yazılım projelerinde proje mülkiyeti tamamen size aittir. Proje bitiminde tüm açık kaynak kodları, veritabanı şemaları ve teknik dökümantasyon size teslim edilir.
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Hangi teknolojileri kullanıyorsunuz?</div>
                        <div class="faq-answer">
                            Projenin gereksinimlerine göre en doğru teknolojiyi seçiyoruz. Genellikle Backend'de PHP (Laravel), Node.js veya Python; Frontend'de ise React, Vue.js veya modern Blade şablonları kullanıyoruz.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Mevcut yazılımlarımla entegrasyon yapılabilir mi?</div>
                        <div class="faq-answer">
                            Tabii ki. Kullandığınız API desteği olan tüm 3. parti yazılımlar, banka posları, kargo servisleri veya ERP sistemleri ile entegrasyon sağlayabiliyoruz.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Consultancy View -->
            <div class="main-container" id="consultancyView" style="display: none;">
                
                <div class="design-hero">
                    <h2>Dijital Dönüşüm ve Yazılım Danışmanlığı</h2>
                    <p>
                        Teknoloji yatırımlarınızda doğru kararlar almanızı sağlıyoruz. Karmaşık dijital süreçleri basitleştiriyor, işletmenizin büyüme hedeflerine uygun, sürdürülebilir ve ölçeklenebilir teknoloji haritaları çıkarıyoruz.
                    </p>
                </div>

                <h3 style="color:#5f6368; font-weight:400; text-align:center; margin-top:30px;">Uzmanlık Alanlarımız</h3>

                <div class="capabilities-grid">
                    <div class="cap-card">
                        <div class="cap-title">Teknik Mimari & Analiz</div>
                        <div class="cap-desc">Projelerinizin altyapısını en baştan doğru kurguluyor, veritabanı ve sunucu mimarisi için performans odaklı çözümler üretiyoruz.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">Dijital Dönüşüm</div>
                        <div class="cap-desc">Manuel iş süreçlerinizi dijitalleştirerek operasyonel verimliliğinizi artıracak stratejiler geliştiriyoruz.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">Proje Denetimi (Audit)</div>
                        <div class="cap-desc">Mevcut yazılım projelerinizin kod kalitesini, güvenliğini ve performansını analiz ederek iyileştirme raporları sunuyoruz.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">CTO as a Service</div>
                        <div class="cap-desc">Tam zamanlı bir yöneticiye ihtiyaç duymadan, projeleriniz için üst düzey teknik liderlik ve vizyon sağlıyoruz.</div>
                    </div>
                </div>

                <h3 style="color:#5f6368; font-weight:400; text-align:center; margin-top:50px;">Danışmanlık Yaklaşımımız</h3>

                <div class="process-container">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <div class="step-title">Keşif</div>
                        <div class="step-desc">
                            İşletmenizi, hedeflerinizi ve mevcut teknolojik durumunuzu derinlemesine analiz ediyoruz.
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <div class="step-title">Strateji</div>
                        <div class="step-desc">
                            Size en uygun teknolojileri ve yol haritasını (roadmap) belirleyerek maliyet/fayda analizi yapıyoruz.
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <div class="step-title">Yönetim</div>
                        <div class="step-desc">
                            Uygulama sürecinde ekipleri yönlendiriyor, kalite kontrol süreçlerini yönetiyor ve başarıyı garantiliyoruz.
                        </div>
                    </div>
                </div>
                
                <div style="text-align:center; margin-top:50px;">
                        <button class="offer-btn" onclick="openOfferModal()">Hemen Teklif İste</button>
                </div>

                <!-- FAQ Section for Consultancy -->
                <div class="faq-section" style="padding-bottom: 80px;">
                    <h3 class="faq-title">Sıkça Sorulan Sorular</h3>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Neden bir danışmana ihtiyacım var?</div>
                        <div class="faq-answer">
                            Yanlış teknoloji seçimi veya hatalı mimari kurgusu, projelerin başarısız olmasına ve bütçe kayıplarına neden olabilir. Danışmanlık hizmetimizle bu riskleri minimize eder, kaynaklarınızı en verimli şekilde kullanmanızı sağlarız.
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Mevcut yazılım ekibimle çalışabilir misiniz?</div>
                        <div class="faq-answer">
                            Kesinlikle. Mevcut ekibinize mentorluk yapabilir, kod incelemeleri (code review) ile kalitelerini artırabilir ve onları doğru teknolojilere yönlendirebiliriz.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Hizmet süresi nedir?</div>
                        <div class="faq-answer">
                            Proje bazlı veya aylık düzenli danışmanlık şeklinde çalışabiliyoruz. İhtiyacınıza göre kısa süreli denetimler veya uzun soluklu stratejik ortaklıklar kurabiliriz.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wix View -->
            <div class="main-container" id="wixView" style="display: none;">
                
                <div class="design-hero">
                    <h2>Wix Danışmanlığı ve Kurulum Hizmetleri</h2>
                    <p>
                        Wix platformunun esnekliğini profesyonel tasarım anlayışımızla birleştiriyoruz. Sürükle-bırak kolaylığının ötesine geçerek, markanıza özel, SEO uyumlu ve yüksek performanslı Wix siteleri hazırlıyoruz.
                    </p>
                </div>

                <h3 style="color:#5f6368; font-weight:400; text-align:center; margin-top:30px;">Wix Çözümlerimiz</h3>

                <div class="capabilities-grid">
                    <div class="cap-card">
                        <div class="cap-title">Profesyonel Kurulum</div>
                        <div class="cap-desc">Sıfırdan site kurulumu, domain bağlantıları, SSL aktivasyonu ve kurumsal e-posta entegrasyonlarını yapıyoruz.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">Editor X & Velo</div>
                        <div class="cap-desc">Standart kalıpların dışına çıkmak için Velo kodlama altyapısı ve Editor X ile gelişmiş, interaktif tasarımlar üretiyoruz.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">Wix SEO Uzmanlığı</div>
                        <div class="cap-desc">Google'da üst sıralarda yer almanız için Wix SEO Wiz optimizasyonu, meta etiketleri ve site haritası yapılandırması.</div>
                    </div>
                    <div class="cap-card">
                        <div class="cap-title">Wix E-Ticaret</div>
                        <div class="cap-desc">Ürün yönetimi, ödeme sistemi entegrasyonları (iyzico, vb.) ve kargo ayarları ile mağazanızı satışa hazır hale getiriyoruz.</div>
                    </div>
                </div>

                <h3 style="color:#5f6368; font-weight:400; text-align:center; margin-top:50px;">Nasıl Çalışıyoruz?</h3>

                <div class="process-container">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <div class="step-title">Tasarım Seçimi</div>
                        <div class="step-desc">
                            Sektörünüze uygun şablonu belirliyor veya boş tuval üzerinde markanıza özel tasarımı kurguluyoruz.
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <div class="step-title">İçerik & Özelleştirme</div>
                        <div class="step-desc">
                            Görsellerinizi ve içeriklerinizi yerleştiriyor, mobil uyumluluk ayarlarını (responsive) optimize ediyoruz.
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <div class="step-title">Eğitim & Teslim</div>
                        <div class="step-desc">
                            Siteyi yayına alıyor ve size paneli nasıl kullanacağınızı anlatan kısa bir eğitim vererek teslim ediyoruz.
                        </div>
                    </div>
                </div>
                
                <div style="text-align:center; margin-top:50px;">
                        <button class="offer-btn" onclick="openOfferModal()">Wix Teklifi Al</button>
                </div>

                <!-- FAQ Section for Wix -->
                <div class="faq-section" style="padding-bottom: 80px;">
                    <h3 class="faq-title">Sıkça Sorulan Sorular</h3>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Wix sitesi Google'da çıkar mı?</div>
                        <div class="faq-answer">
                            Kesinlikle. "Wix SEO uyumlu değildir" algısı eskide kaldı. Doğru yapılandırılmış bir Wix sitesi, Google ve diğer arama motorlarında gayet başarılı sonuçlar almaktadır.
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Daha sonra siteyi kendim güncelleyebilir miyim?</div>
                        <div class="faq-answer">
                            Evet, Wix'in en büyük avantajı budur. Kod bilmenize gerek kalmadan yazılarınızı, fotoğraflarınızı veya ürünlerinizi kolayca güncelleyebilirsiniz.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">Aylık ücreti var mı?</div>
                        <div class="faq-answer">
                            Wix altyapısı kullanıldığı için Wix'e ödenmesi gereken yıllık/aylık hosting paket ücretleri vardır. Bizim hizmet bedelimiz ise tasarım ve kurulum için tek seferliktir.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Portfolio View -->
            <div class="results-container" id="portfolioView" style="display: none;">
                <!-- Result 1 -->
                <div class="result-item">
                    <div class="result-url">
                        <img src="/images/atlastelemarketing.png" style="width:16px; height:16px; object-fit:contain; background:none; vertical-align:middle; margin-right:5px;">
                        <span>atlastelemarketing.com</span>
                    </div>
                    <a href="#" class="result-title" onclick="window.updateAddress('/atlastelemarketing.com'); return false;">Atlas Tele Marketing</a>
                    <div class="result-desc">
                        Çağrı merkezi sektöründe hizmet veren Atlas Tele Marketing için hazırladığımız kurumsal web sayfası. Modern tasarım ve kullanıcı dostu arayüz.
                    </div>
                </div>

                <!-- Result 2 -->
                <div class="result-item">
                    <div class="result-url">
                        <img src="/images/atlasenergi.png" style="width:16px; height:16px; object-fit:contain; background:none; vertical-align:middle; margin-right:5px;">
                        <span>atlasenergie.nl</span>
                    </div>
                    <a href="#" class="result-title" onclick="window.updateAddress('/atlasenergie.nl'); return false;">Atlas Energie</a>
                    <div class="result-desc">
                        Enerji yönetimi ve danışmanlığı alanında faaliyet gösteren Atlas Energie için hazırladığımız kurumsal web sitesi.
                    </div>
                </div>
            </div>

            <!-- About View -->
            <div class="main-container" id="aboutView" style="display: none; align-items: stretch; text-align: left; padding: 40px; margin: 0 auto; max-width: 900px; flex-grow: 1; flex-direction: column;">
                
                <!-- Hero Text -->
                <div style="text-align: center; margin-bottom: 50px;">
                    <h2 style="color: #202124; font-size: 32px; margin-bottom: 16px; font-family: 'Product Sans', Arial, sans-serif;">Dijital Geleceğinizi Şekillendiriyoruz</h2>
                    <p style="color: #5f6368; font-size: 18px; line-height: 1.6; max-width: 700px; margin: 0 auto;">
                        Antalya merkezli ofisimizden dünyaya açılan vizyonumuzla, markanızın dijital dönüşüm yolculuğunda güvenilir ortağınız.
                    </p>
                </div>

                <!-- Main Content -->
                <div style="margin-bottom: 50px;">
                     <h3 style="color: #1a73e8; margin-bottom: 20px; font-size: 20px; border-bottom: 2px solid #e8f0fe; padding-bottom: 10px; display: inline-block;">Biz Kimiz?</h3>
                    <p style="color: #4d5156; line-height: 1.8; font-size: 16px; margin-bottom: 20px;">
                        <strong style="color:#202124;">Antalya'da kurulan firmamız</strong>, dijital dünyada işletmelerin büyümesine öncülük etmek amacıyla yola çıkmıştır. 
                        Kurumsal hizmet anlayışımızla, web tasarımından özel yazılım geliştirmeye, dijital dönüşüm danışmanlığından 
                        hosting çözümlerine kadar geniş bir yelpazede profesyonel destek sunmaktayız.
                    </p>
                    <p style="color: #4d5156; line-height: 1.8; font-size: 16px;">
                        Müşteri memnuniyetini ve kaliteyi her zaman ön planda tutarak, teknolojinin sunduğu en yeni imkanları 
                        iş süreçlerinize entegre ediyoruz. Amacımız, sadece bir hizmet sağlayıcı olmak değil, 
                        dijital yolculuğunuzda size değer katan bir iş ortağı olmaktır.
                    </p>
                </div>

                <!-- Cards for Mission & Vision -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                    <!-- Mission -->
                    <div style="background: #fff; padding: 32px; border-radius: 12px; border: 1px solid #dfe1e5; box-shadow: 0 1px 3px rgba(0,0,0,0.05); transition: transform 0.2s;">
                        <div style="width: 48px; height: 48px; background: #e8f0fe; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="#1a73e8"><path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/></svg>
                        </div>
                        <h3 style="color: #202124; margin-bottom: 12px; font-size: 20px;">Misyonumuz</h3>
                        <p style="color: #5f6368; line-height: 1.6;">
                            İşletmelerin dijital potansiyellerini en üst düzeye çıkarmak, süreçlerini optimize etmek ve sürdürülebilir başarılarına teknolojimizle katkı sağlamak.
                        </p>
                    </div>

                    <!-- Vision -->
                    <div style="background: #fff; padding: 32px; border-radius: 12px; border: 1px solid #dfe1e5; box-shadow: 0 1px 3px rgba(0,0,0,0.05); transition: transform 0.2s;">
                         <div style="width: 48px; height: 48px; background: #fce8e6; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="#d93025"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                        </div>
                        <h3 style="color: #202124; margin-bottom: 12px; font-size: 20px;">Vizyonumuz</h3>
                        <p style="color: #5f6368; line-height: 1.6;">
                            Global standartlarda teknoloji çözümleri üreterek, bölgesel liderliğimizi ulusal ve uluslararası arenaya taşımak ve sektörde referans gösterilen bir marka olmak.
                        </p>
                    </div>
                </div>
            </div>

            </div>

            <!-- Contact View (Google Maps Style) -->
            <div class="main-container" id="contactView" style="display: none; padding: 0; flex-direction: row; height: 100%; align-items: stretch; overflow: hidden;">
                <!-- Left Side: Map Simulation -->
                <div style="flex-grow: 1; background-color: #e8eaed; position: relative;">
                     <iframe 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        loading="lazy" 
                        allowfullscreen 
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://maps.google.com/maps?q=Tah%C4%B1lpazar%C4%B1+mh.+471+sk.+no:5/504+Muratpa%C5%9Fa+/+Antalya&t=&z=15&ie=UTF8&iwloc=&output=embed">
                    </iframe>
                </div>

                <!-- Right Side: Business Panel -->
                <div style="width: 400px; background: white; box-shadow: -2px 0 10px rgba(0,0,0,0.1); overflow-y: auto; display: flex; flex-direction: column;">
                    <img src="/images/logo.png" style="height: 120px; object-fit: contain; margin: 20px auto; display: block;">
                    
                    <div style="padding: 0 24px;">
                        <h1 style="font-size: 24px; color: #202124; margin: 0; font-family: 'Product Sans', Arial, sans-serif;">isersa.com</h1>
                        <div style="color: #70757a; font-size: 14px; margin-top: 4px;">Web Tasarım ve Yazılım Ajansı</div>
                        
                        <div style="display: flex; align-items: center; margin-top: 8px;">
                            <span style="color: #e7711b; font-weight: bold; margin-right: 4px;">4.9</span>
                            <div style="display: flex; color: #fbbc04;">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span style="color: #70757a; margin-left: 4px;">(128 yorum)</span>
                        </div>

                        <!-- Action Buttons -->
                        <div style="display: flex; gap: 12px; margin: 20px 0; border-bottom: 1px solid #e8eaed; padding-bottom: 20px;">
                            <div style="display: flex; flex-direction: column; align-items: center; cursor: pointer; color: #1a73e8;" onclick="window.open('https://maps.google.com', '_blank')">
                                <div style="border: 1px solid #dfe1e5; border-radius: 50%; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; margin-bottom: 6px;">
                                    <svg viewBox="0 0 24 24" width="24" height="24" fill="#1a73e8"><path d="M12 2L4.5 20.29l.71.71L12 18l6.79 3 .71-.71z"/></svg>
                                </div>
                                <div style="font-size: 12px; color: #1a73e8;">Yol Tarifi</div>
                            </div>
                            <div style="display: flex; flex-direction: column; align-items: center; cursor: pointer; color: #1a73e8;" onclick="alert('Numara kopyalandı!')">
                                <div style="border: 1px solid #dfe1e5; border-radius: 50%; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; margin-bottom: 6px;">
                                    <svg viewBox="0 0 24 24" width="24" height="24" fill="#1a73e8"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                                </div>
                                <div style="font-size: 12px; color: #1a73e8;">Ara</div>
                            </div>
                            </div>


                        <!-- Details -->
                        <div style="margin-top: 10px;">
                            <div style="display: flex; align-items: center; margin-bottom: 16px;">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="#70757a" style="margin-right: 14px; flex-shrink: 0;"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                <span style="color: #202124; font-size: 14px; line-height: 1.5;">Tahılpazarı mh. 471 sk. no:5/504 Muratpaşa / Antalya</span>
                            </div>
                            
                            <div style="display: flex; align-items: center; margin-bottom: 16px;">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="#70757a" style="margin-right: 14px; flex-shrink: 0;"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2 0 .68.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2 0-.68.07-1.35.16-2h4.68c.09.65.16 1.32.16 2 0 .68-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2 0-.68-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"/></svg>
                                <span style="color: #1a73e8; font-size: 14px; cursor: pointer;">isersa.com</span>
                            </div>

                            <div style="display: flex; align-items: center; margin-bottom: 16px;">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="#70757a" style="margin-right: 14px; flex-shrink: 0;"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                                <span style="color: #202124; font-size: 14px;">0850 123 45 67</span>
                            </div>

                            <div style="display: flex; align-items: flex-start; margin-bottom: 16px;">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="#70757a" style="margin-right: 14px; flex-shrink: 0;"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2 0 .68.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2 0-.68.07-1.35.16-2h4.68c.09.65.16 1.32.16 2 0 .68-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2 0-.68-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"/></svg>
                                <div style="font-size: 14px;">
                                    <span style="display:block; color: #188038;">Açık</span>
                                    <span style="color: #4d5156;"> ⋅ 09:00 - 00:00 (Her Gün)</span>
                                </div>
                            </div>
                        </div>

                        <button style="width: 100%; background: #1a73e8; color: white; border: none; padding: 10px; border-radius: 4px; font-weight: 500; cursor: pointer; margin-top: 10px; margin-bottom: 20px;" onclick="openOfferModal()">İletişim</button>
                    </div>
                </div>
            </div>

            <!-- Modal for Offer -->
            <div id="offerModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeOfferModal()">&times;</span>
                    <h2 style="margin-top:0; margin-bottom:20px; color:#202124; font-size:22px; text-align:center;">İletişim Formu</h2>
                    
                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input type="text" class="form-control" placeholder="Adınız Soyadınız">
                    </div>
                    
                    <div class="form-group">
                        <label>Telefon</label>
                        <input type="tel" class="form-control" placeholder="0555 555 55 55">
                    </div>
                    
                    <div class="form-group">
                        <label>E-posta</label>
                        <input type="email" class="form-control" placeholder="ornek@sirket.com">
                    </div>
                    
                    <div class="form-group">
                        <label>Mesaj</label>
                        <textarea class="form-control" rows="3" placeholder="Mesajınız..."></textarea>
                    </div>
                    
                    <button class="modal-btn" onclick="alert('Mesajınız alındı! En kısa sürede dönüş yapacağız.'); closeOfferModal();">Gönder</button>
                </div>
            </div>

            <!-- Results View (Hidden by default) -->
            <div class="results-container" id="resultsView">
                
                <!-- 1. Alan Adı Kayıt -->
                <div class="result-item">
                    <div class="result-url">
                        <span>isersa.com › alanadi</span>
                    </div>
                    <a href="#" class="result-title" onclick="openDomainSearch(); return false;">Alan Adı Kayıt ve Tescil Hizmetleri</a>
                    <div class="result-desc">
                        En uygun fiyatlarla alan adınızı tescil edin. .com, .net, .org ve yüzlerce uzantı seçeneği ile markanızı internete taşıyın.
                    </div>
                </div>

                <!-- 2. Web Hosting -->
                <div class="result-item">
                    <div class="result-url">
                        <span>isersa.com › webhosting</span>
                    </div>
                    <a href="#" class="result-title" onclick="openHostingView(); return false;">Web Hosting Hizmeti - Hızlı & Güvenli</a>
                    <div class="result-desc">
                        Yüksek performanslı SSD sunucular üzerinde web sitenizi barındırın. %99.9 uptime garantisi, ücretsiz SSL sertifikası ve 7/24 teknik destek ile kesintisiz hizmet.
                    </div>
                </div>

                <!-- 3. Web Tasarım -->
                <div class="result-item">
                    <div class="result-url">
                        <span>isersa.com › webtasarim</span>
                    </div>
                    <a href="#" class="result-title" onclick="openWebDesignView(); return false;">Profesyonel Web Tasarım Çözümleri</a>
                    <div class="result-desc">
                        Mobil uyumlu, SEO dostu ve modern web tasarımları. Kurumsal kimliğinizi yansıtan, kullanıcı deneyimi odaklı arayüzler ile dijital dünyada fark yaratın.
                    </div>
                </div>

                <!-- 4. Web Tabanlı Özel Yazılımlar -->
                <div class="result-item">
                    <div class="result-url">
                        <span>isersa.com › ozelyazilim</span>
                    </div>
                    <a href="#" class="result-title" onclick="openSoftwareView(); return false;">Web Tabanlı Özel Yazılım Geliştirme</a>
                    <div class="result-desc">
                        İş süreçlerinize özel web tabanlı yazılım çözümleri. CRM, ERP, B2B/B2C portallar ve size özel yönetim sistemleri ile verimliliğinizi artırın.
                    </div>
                </div>

                <!-- 5. Web Yazılım Danışmanlığı -->
                <div class="result-item">
                    <div class="result-url">
                        <span>isersa.com › danismanlik</span>
                    </div>
                    <a href="#" class="result-title" onclick="openConsultancyView(); return false;">Web Yazılım ve Dijital Dönüşüm Danışmanlığı</a>
                    <div class="result-desc">
                        Projeleriniz için teknik analiz, mimari planlama ve teknoloji seçimi konularında uzman danışmanlık. Doğru stratejilerle dijital yatırımlarınızı güçlendirin.
                    </div>
                </div>

                <!-- 6. Wix Danışmanlığı -->
                <div class="result-item">
                    <div class="result-url">
                        <span>isersa.com › wixdanismanlik</span>
                    </div>
                    <a href="#" class="result-title" onclick="openWixView(); return false;">Wix Danışmanlığı ve Kurulum Hizmetleri</a>
                    <div class="result-desc">
                        Wix platformunda profesyonel site kurulumu, tasarım özelleştirme ve SEO ayarları. Wix uzmanlarımızla sitenizi en iyi şekilde yapılandırın.
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const suggestionsList = document.getElementById('suggestionsList');
            const searchBox = document.getElementById('searchBox');
            const servicesLink = document.getElementById('servicesLink');
            const homeView = document.getElementById('homeView');
            const resultsView = document.getElementById('resultsView');
            const domainView = document.getElementById('domainView');
            const hostingView = document.getElementById('hostingView');
            const webDesignView = document.getElementById('webDesignView');
            const customSoftwareView = document.getElementById('customSoftwareView');
            const consultancyView = document.getElementById('consultancyView');
            const wixView = document.getElementById('wixView');
            const portfolioView = document.getElementById('portfolioView');
            const aboutView = document.getElementById('aboutView');
            const contactView = document.getElementById('contactView');
            const addressInput = document.getElementById('addressInput');
            const backButton = document.getElementById('backButton');
            const forwardButton = document.getElementById('forwardButton');
            
            // History Stacks
            let historyStack = [];
            let forwardStack = [];
            let currentViewId = 'home';

            function updateUI(state) {
                // Update tracker
                currentViewId = state.view;

                // Reset views
                homeView.style.display = 'none';
                resultsView.style.display = 'none';
                domainView.style.display = 'none';
                hostingView.style.display = 'none';
                webDesignView.style.display = 'none';
                customSoftwareView.style.display = 'none';
                consultancyView.style.display = 'none';
                wixView.style.display = 'none';
                portfolioView.style.display = 'none';
                aboutView.style.display = 'none';
                contactView.style.display = 'none';
                
                // Scroll to top
                const winContent = document.querySelector('.window-content');
                if(winContent) winContent.scrollTop = 0;
                
                // Toggle Header
                const siteHeader = document.querySelector('.website-header');
                if (state.view === 'design' || state.view === 'software' || state.view === 'consultancy' || state.view === 'wix' || state.view === 'portfolio' || state.view === 'contact') {
                    if(siteHeader) siteHeader.style.display = 'none';
                } else {
                    if(siteHeader) siteHeader.style.display = 'flex';
                }

                if (state.view === 'home') {
                    homeView.style.display = 'flex';
                } else if (state.view === 'results') {
                    resultsView.style.display = 'flex';
                } else if (state.view === 'domain') {
                    domainView.style.display = 'flex';
                } else if (state.view === 'hosting') {
                    hostingView.style.display = 'flex';
                } else if (state.view === 'design') {
                    webDesignView.style.display = 'flex'; 
                } else if (state.view === 'software') {
                    customSoftwareView.style.display = 'flex';
                } else if (state.view === 'consultancy') {
                    consultancyView.style.display = 'flex';
                } else if (state.view === 'wix') {
                    wixView.style.display = 'flex';
                } else if (state.view === 'portfolio') {
                    portfolioView.style.display = 'flex';
                } else if (state.view === 'about') {
                    aboutView.style.display = 'flex';
                } else if (state.view === 'contact') {
                    contactView.style.display = 'flex';
                }

                if (addressInput) {
                    addressInput.value = state.url;
                }
                
                // Update Back/Forward Button States
                if (historyStack.length > 0) {
                    backButton.classList.add('active');
                } else {
                    backButton.classList.remove('active');
                }

                if (forwardStack.length > 0) {
                    forwardButton.classList.add('active');
                } else {
                    forwardButton.classList.remove('active');
                }
            }

            // Internal helper to get current state object
            function getCurrentState() {
                let currentUrl = addressInput ? addressInput.value : 'isersa.com';
                return { view: currentViewId, url: currentUrl };
            }

            function navigate(view, url) {
                // Push current state to history
                historyStack.push(getCurrentState());
                // Clear forward stack on new navigation
                forwardStack = [];

                updateUI({ view: view, url: url });
            }
            // Expose navigate to window for inline HTML calls
            window.navigate = navigate;

            window.goBack = function() {
                if (historyStack.length === 0) return;
                
                // Push current state to forward stack
                forwardStack.push(getCurrentState());
                
                // Pop previous state from history
                const prevState = historyStack.pop();
                
                updateUI(prevState);
            };

            window.goForward = function() {
                if (forwardStack.length === 0) return;

                // Push current state to history stack
                historyStack.push(getCurrentState());

                // Pop next state from forward stack
                const nextState = forwardStack.pop();

                updateUI(nextState);
            };
            
            window.openDomainSearch = function() {
                navigate('domain', 'isersa.com/alanadi');
                document.getElementById('domainResult').style.display = 'none';
                return false;
            };

            window.openHostingView = function() {
                navigate('hosting', 'isersa.com/webhosting');
                // Hide pricing on fresh open
                document.getElementById('pricingDisplay').style.display = 'none';
                // Show description
                document.getElementById('hostingDesc').style.display = 'block';
                // Remove active classes
                document.querySelectorAll('.hosting-btn').forEach(b => b.classList.remove('active'));
                return false;
            };

            window.openWebDesignView = function() {
                navigate('design', 'isersa.com/webtasarim');
                return false;
            };

            window.openSoftwareView = function() {
                navigate('software', 'isersa.com/ozelyazilim');
                return false;
            };

            window.openConsultancyView = function() {
                navigate('consultancy', 'isersa.com/danismanlik');
                return false;
            };

            window.openWixView = function() {
                navigate('wix', 'isersa.com/wixdanismanlik');
                return false;
            };

            window.updateAddress = function(path) {
                // For placeholder links, simulate navigation to a generic results view or home, 
                // but just update the address bar to show reaction.
                // In a real app this would go to a specific view.
                navigate('results', 'isersa.com' + path);
                return false;
            };

            // Modal Functions
            window.openOfferModal = function() {
                document.getElementById('offerModal').style.display = 'flex';
            };

            window.closeOfferModal = function() {
                document.getElementById('offerModal').style.display = 'none';
            };

            // Toggle FAQ
            window.toggleFaq = function(el) {
                // Toggle active class on parent
                const item = el.parentElement;
                
                // Optional: Close others
                // document.querySelectorAll('.faq-item').forEach(i => {
                //    if(i !== item) i.classList.remove('active');
                // });

                item.classList.toggle('active');
            };

            // Close modal if clicking outside
            window.onclick = function(event) {
                const modal = document.getElementById('offerModal');
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            };

            window.showPackages = function(btn, type) {
                const container = document.getElementById('pricingDisplay');
                const desc = document.getElementById('hostingDesc');
                
                // Check if already active (toggle off)
                if (btn.classList.contains('active')) {
                    btn.classList.remove('active');
                    container.style.display = 'none';
                    if(desc) desc.style.display = 'block';
                    return;
                }

                // Activate new selection
                document.querySelectorAll('.hosting-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // Hide description and show packages
                if(desc) desc.style.display = 'none';
                
                container.style.display = 'none';
                setTimeout(() => {
                    container.style.display = 'flex';
                }, 10);
            };

            window.checkDomain = function(domainQuery) {
                // Determine value to check
                let val = domainQuery || document.getElementById('addressInput').value.trim();
                
                // If checking from outside domain view (e.g. home), switch to domain view
                if (domainQuery && document.getElementById('domainView').style.display === 'none') {
                    navigate('domain', 'isersa.com/alanadi');
                    // Update address bar to show we are searching this domain effectively or just keep the generic url
                    // Let's keep generic for now or user preference? 
                    // Usually we might want URL to indicate search but for now just switch view.
                }

                if (!val || val === 'isersa.com/alanadi' || !val.includes('.')) return;

                const resultDiv = document.getElementById('domainResult');
                
                // Extract clean domain name (before the last dot)
                let parts = val.split('.');
                let domainName = parts[0]; 
                if(parts.length > 2) { domainName = parts.slice(0, -1).join('.'); } // handle sub.domain.com

                // Simulate loading
                resultDiv.style.display = 'block';
                resultDiv.className = 'domain-result'; 
                // Reset styles for container to separate lists
                resultDiv.style.padding = '0';
                resultDiv.style.backgroundColor = 'transparent';
                resultDiv.style.boxShadow = 'none';
                resultDiv.style.border = 'none';
                
                resultDiv.innerHTML = '<div style="background:#fff; padding:20px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.1); border:1px solid #dadce0;">Sorgulanıyor...</div>';

                setTimeout(() => {
                    const extensions = ['.com', '.net', '.org', '.co'];
                    let mainHtml = '';
                    let alternativesHtml = '<div style="margin-top:15px; text-align:left; background:#fff; padding:15px 20px; border-radius:8px; box-shadow:0 1px 2px rgba(0,0,0,0.1); border:1px solid #dadce0;">';
                    alternativesHtml += '<h4 style="margin:0 0 15px 0; color:#5f6368; font-size:14px; text-transform:uppercase; letter-spacing:0.5px;">Diğer Seçenekler</h4>';
                    
                    // 1. Check Main Domain
                    const isAvailable = Math.random() > 0.3;
                    let price = (Math.random() * 10 + 9).toFixed(2);
                    
                    let bgColor = isAvailable ? '#e6f4ea' : '#fce8e6';
                    let textColor = isAvailable ? '#137333' : '#c5221f';
                    let borderColor = isAvailable ? '#ceead6' : '#fad2cf';
                    let statusText = isAvailable ? 'Müsait' : 'Dolu';
                    
                    // Handle main block
                    mainHtml = `
                        <div style="background:${bgColor}; color:${textColor}; padding:20px; border-radius:8px; border:1px solid ${borderColor}; margin-bottom:0; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <div style="text-align:left;">
                                    <div style="font-size:20px; font-weight:bold;">${val}</div>
                                    <div style="font-size:14px; margin-top:4px; opacity:0.9;">${statusText}</div>
                                </div>
                                <div style="text-align:right;">
                                    ${isAvailable ? `<div style="font-size:18px; font-weight:bold;">$${price}</div>` : ''}
                                    ${isAvailable ? '<button class="g-btn" style="margin-top:5px; background:#1a73e8; color:white; border:none; height:32px; line-height:32px; padding:0 20px;">Sepete Ekle</button>' : ''}
                                </div>
                            </div>
                        </div>
                    `;

                    // 2. Check Alternatives
                    let altCount = 0;
                    extensions.forEach(ext => {
                        let currentDomain = domainName + ext;
                        if(currentDomain.toLowerCase() === val.toLowerCase()) return; // Skip main

                        const extAvailable = Math.random() > 0.3;
                        let extPrice = (Math.random() * 10 + 8).toFixed(2);
                        let extColor = extAvailable ? '#188038' : '#d93025';
                        
                        alternativesHtml += `
                            <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #f1f3f4;">
                                <span style="font-family:'Montserrat', sans-serif; font-weight:500; color:#3c4043; font-size:15px;">${ext, currentDomain}</span>
                                <div style="display:flex; align-items:center; gap:15px;">
                                    <span style="color:${extColor}; font-size:14px; font-weight:600;">${extAvailable ? '$'+extPrice : 'Dolu'}</span>
                                    ${extAvailable ? '<button style="background:#fff; border:1px solid #dadce0; color:#1a73e8; border-radius:4px; padding:6px 16px; cursor:pointer; font-size:13px; font-weight:500;" onmouseover="this.style.background=\'#f8f9fa\'" onmouseout="this.style.background=\'#fff\'">Ekle</button>' : ''}
                                </div>
                            </div>
                        `;
                        altCount++;
                    });
                    alternativesHtml += '</div>';

                    if(altCount === 0) alternativesHtml = ''; // Should not happen usually

                    resultDiv.innerHTML = mainHtml + alternativesHtml;

                }, 800);
            };



            // Fix Services Link Navigation
            if(servicesLink) {
                servicesLink.onclick = function(e) {
                    e.preventDefault();
                    navigate('results', 'isersa.com/hizmetlerimiz');
                };
            }

            const portfolioLink = document.getElementById('portfolioLink');
            if(portfolioLink) {
                portfolioLink.onclick = function(e) {
                    e.preventDefault();
                    navigate('portfolio', 'isersa.com/portfolyo');
                };
            }

            const aboutLink = document.getElementById('aboutLink');
            if(aboutLink) {
                aboutLink.onclick = function(e) {
                    e.preventDefault();
                    navigate('about', 'isersa.com/hakkimizda');
                };
            }

            const contactBtn = document.getElementById('contactBtn');
            if(contactBtn) {
                contactBtn.onclick = function(e) {
                    e.preventDefault();
                    navigate('contact', 'isersa.com/iletisim');
                };
            }
            
            window.handleAddressBar = function(e) {
                if(e.key === 'Enter') {
                    const val = document.getElementById('addressInput').value.trim();
                    
                    // Explicitly handle home domain
                    if(val === 'isersa.com' || val === 'www.isersa.com') {
                        navigate('home', 'isersa.com');
                        e.target.blur();
                        return;
                    }

                    // If simple domain check logic
                    if(val.includes('.') && !val.includes('/')) {
                        // Assume domain search
                        navigate('domain', val); // Keep the domain in the address bar
                        window.checkDomain();
                    } else {
                        // Navigate there (simulation)
                        if(val.includes('alanadi')) { navigate('domain', val); }
                        else if(val.includes('hizmetlerimiz')) { navigate('results', val); }
                        else { navigate('home', 'isersa.com'); }
                    }
                    e.target.blur();
                }
            };

            // Handle Services Click
            if(servicesLink) {
                servicesLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    navigate('results', 'isersa.com/hizmetlerimiz');
                });
            }

            // Handle Back Click
            if(backButton) {
                backButton.addEventListener('click', function() {
                   if(historyStack.length > 0) {
                       const previousState = historyStack.pop();
                       updateUI(previousState);
                   }
                });
            }

            // Expose updateAddress function to window specifically for inline onclicks
            window.updateAddress = function(path) {
                // When clicking a specific service, we are technically still in "results" view layout
                // or we could mock a "detail" view. For now, since we don't have a detail HTML, 
                // we will just push the current state and update the URL, keeping the view as 'results'
                // so the back button works to take us back to the main list address.
                
                let currentUrl = addressBarText.textContent;
                historyStack.push({
                    view: 'results', 
                    url: currentUrl
                });
                
                // Update just the URL and button state, keep view same
                if(addressBarText) {
                    addressBarText.textContent = 'isersa.com' + path;
                }
                backButton.classList.add('active');
                
                return false; 
            };

            // Listen for input
            searchInput.addEventListener('input', function(e) {
                const val = e.target.value.toLowerCase().trim();
                
                // Clear suggestions first
                suggestionsList.innerHTML = '';
                
                if (val === '') {
                    hideSuggestions();
                    return;
                }

                // Domain Regex
                const domainRegex = /^[a-z0-9-]+\.[a-z]{2,}(\.[a-z]{2,})?$/;
                
                // 1. Check for Domain
                if (domainRegex.test(val) || (val.includes('.') && val.length > 3)) {
                    addSuggestion(`<b>${val}</b> - Alan Adı Sorgula`, () => {
                        checkDomain(val);
                    });
                    showSuggestions();
                    return;
                }

                // 2. Check for Services (Hizmetlerimiz)
                // "hizmetlerimiz", "hizmet", "hiz", "h"
                if (['h', 'hi', 'hiz', 'hizm', 'hizme', 'hizmet', 'hizmetl', 'hizmetle', 'hizmetler', 'hizmetleri', 'hizmetlerim', 'hizmetlerimiz'].includes(val)) {
                    addSuggestion('<b>Hizmetlerimiz</b>', () => {
                         navigate('results', 'isersa.com/hizmetlerimiz');
                    });
                    showSuggestions();
                    return;
                }

                // 3. Check for Portfolio
                // "portfolyo", "referans", "port"
                if (val.includes('port') || val.includes('ref') || val.includes('referans')) {
                     addSuggestion('<b>Portfolyo & Referanslar</b>', () => {
                         navigate('portfolio', 'isersa.com/portfolyo');
                    });
                    showSuggestions();
                    return;
                }

                // 4. Check for About (Hakkımızda)
                // "hakkinda", "hakkimizda", "hak", "biz"
                if (val.includes('hak') || val.includes('biz')) {
                    addSuggestion('<b>Hakkımızda</b>', () => {
                         navigate('about', 'isersa.com/hakkimizda');
                    });
                    showSuggestions();
                    return;
                }

                // 5. Check for Contact (İletişim)
                // "iletisim", "ilet", "adres", "tel"
                if (val.includes('ilet') || val.includes('adres') || val.includes('tel')) {
                    addSuggestion('<b>İletişim</b>', () => {
                         navigate('contact', 'isersa.com/iletisim');
                    });
                    showSuggestions();
                    return;
                }

                // Keep existing "Web" check if needed, or remove if user wants ONLY the above logic.
                // Re-adding existing logic as fallback
                if (val.includes('web')) {
                    const items = [
                        'Web Tasarım',
                        'Web Yazılım',
                        'Web Hosting',
                        'Web Domain'
                    ];
                    items.forEach(item => {
                        if(item.toLowerCase().includes(val)) {
                            addSuggestion(item, () => {
                                // Default simple search behavior or specific if needed
                                // For now just general search result simulation
                                navigate('results', 'isersa.com/hizmetlerimiz'); 
                            });
                        }
                    });
                    
                    if (suggestionsList.hasChildNodes()) {
                        showSuggestions();
                    }
                }
            });

            // Handle Enter Key
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    const val = e.target.value.toLowerCase().trim();
                    const domainRegex = /^[a-z0-9-]+\.[a-z]{2,}(\.[a-z]{2,})?$/;

                    if (domainRegex.test(val) || (val.includes('.') && val.length > 3)) {
                        checkDomain(val);
                    } else if (['h', 'hi', 'hiz', 'hizm', 'hizmet', 'hizmetlerimiz'].includes(val)) {
                         navigate('results', 'isersa.com/hizmetlerimiz');
                    } else if (val.includes('port') || val.includes('ref')) {
                         navigate('portfolio', 'isersa.com/portfolyo');
                    } else if (val.includes('hak') || val.includes('biz')) {
                         navigate('about', 'isersa.com/hakkimizda');
                    } else if (val.includes('ilet') || val.includes('adres')) {
                         navigate('contact', 'isersa.com/iletisim');
                    }
                }
            });

            // Focus events to handle aesthetics
            searchInput.addEventListener('focus', function() {
                // If there's text, re-trigger? 
                // For now just shadow
            });
            
            // Click outside to close
            document.addEventListener('click', function(e) {
                if (!document.querySelector('.search-area').contains(e.target)) {
                    hideSuggestions();
                }
            });

            function addSuggestion(text, onClickAction) {
                const div = document.createElement('div');
                div.className = 'suggestion-item';
                div.innerHTML = `
                    <span class="suggestion-icon">
                        <svg focusable="false" style="width:16px;height:16px;margin-top:4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#9aa0a6"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                    </span>
                    <span>${text}</span>
                `;
                div.onclick = function() {
                    if (onClickAction) onClickAction();
                    hideSuggestions();
                };
                suggestionsList.appendChild(div);
            }

            function showSuggestions() {
                suggestionsList.style.display = 'block';
                searchBox.classList.add('has-suggestions');
            }

            function hideSuggestions() {
                setTimeout(() => {
                    suggestionsList.style.display = 'none';
                }, 200);
                searchBox.classList.remove('has-suggestions');
            }

            window.handleSearchButton = function() {
                const val = searchInput.value.toLowerCase().trim();
                const domainRegex = /^[a-z0-9-]+\.[a-z]{2,}(\.[a-z]{2,})?$/;

                if (domainRegex.test(val) || (val.includes('.') && val.length > 3)) {
                    checkDomain(val);
                } else if (['h', 'hi', 'hiz', 'hizm', 'hizme', 'hizmet', 'hizmetl', 'hizmetle', 'hizmetler', 'hizmetleri', 'hizmetlerim', 'hizmetlerimiz'].includes(val)) {
                        navigate('results', 'isersa.com/hizmetlerimiz');
                } else if (val.includes('port') || val.includes('ref')) {
                        navigate('portfolio', 'isersa.com/portfolyo');
                } else if (val.includes('hak') || val.includes('biz')) {
                        navigate('about', 'isersa.com/hakkimizda');
                } else if (val.includes('ilet') || val.includes('adres')) {
                        navigate('contact', 'isersa.com/iletisim');
                } else {
                    // Default fallback
                    navigate('results', 'isersa.com/hizmetlerimiz');
                }
            };
        });
    </script>
</body>
</html>
