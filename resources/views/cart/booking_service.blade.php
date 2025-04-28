<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Supermark - Home Cleaning Service</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#6a7280', // Slate gray as primary
                    secondary: '#d1d5db', // Light gray as secondary
                    accent: '#f3f4f6' // Very light gray as accent
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif']
                }
            }
        }
    }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f9fafb;
    }
    .dropdown-menu {
        opacity: 0;
        transform: translateY(-10px);
        visibility: hidden;
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
    }
    .dropdown:hover .dropdown-menu {
        opacity: 1;
        transform: translateY(0);
        visibility: visible;
    }
    .mobile-menu {
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
    }
    .mobile-menu.active {
        transform: translateX(0);
    }
    .form-input:focus, .form-select:focus, .form-textarea:focus {
        border-color: #6a7280;
        box-shadow: 0 0 0 3px rgba(106, 114, 128, 0.1);
    }
    .feature-item {
        transition: all 0.2s ease;
    }
    .feature-item:hover {
        transform: translateY(-2px);
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 50;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }
    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        border-radius: 0.375rem;
        max-width: 800px;
        animation: modalFadeIn 0.3s;
        max-height: 90vh;
        overflow-y: auto;
    }
    @keyframes modalFadeIn {
        from {opacity: 0; transform: translateY(-20px);}
        to {opacity: 1; transform: translateY(0);}
    }
    .review-card {
        transition: all 0.3s ease;
    }
    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
</style>
</head>
<body class="bg-gray-50 text-gray-800">
<!-- Header/Navbar -->
<header class="bg-white shadow-sm sticky top-0 z-40">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and Navigation -->
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="index.html" class="flex items-center">
                        <span class="text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-xl font-light tracking-wide">SUPERMARK</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:ml-8 md:flex md:space-x-8">
                    <a href="products.html" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                        Products
                    </a>
                    <a href="services.html" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-primary border-b-2 border-primary transition duration-150">
                        Services
                    </a>
                    <a href="orders.html" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                        Orders
                    </a>
                    <a href="about.html" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                        About
                    </a>
                    <a href="contact.html" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                        Contact
                    </a>
                </nav>
            </div>
            
            <!-- Right Side Menu -->
            <div class="flex items-center">
                <!-- Cart -->
                <div class="flex items-center mr-4">
                    <a href="cart.html" class="relative p-2 text-gray-500 hover:text-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute top-0 right-0 bg-primary text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">3</span>
                    </a>
                </div>
                
                <!-- User Profile -->
                <div class="relative dropdown">
                    <button class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-600">JD</span>
                        </div>
                        <span class="hidden md:block text-sm text-gray-700">John Doe</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="hidden md:block h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded shadow-lg py-1 z-10">
                        <a href="profile.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Profile</a>
                        <a href="settings.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Settings</a>
                        <div class="border-t border-gray-100"></div>
                        <form action="{{ route('logoutt')}}" method="POST">
                            @csrf
                        <button  type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Sign out</button>
                    </form>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden ml-4">
                    <button id="mobile-menu-button" class="p-2 rounded-md text-gray-500 hover:text-primary hover:bg-gray-100 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="mobile-menu fixed inset-0 bg-gray-800 bg-opacity-75 z-50 md:hidden hidden">
        <div class="fixed inset-y-0 left-0 w-full max-w-xs bg-white shadow-xl overflow-y-auto">
            <div class="px-6 pt-6 pb-4 flex items-center justify-between">
                <a href="index.html" class="flex items-center">
                    <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-xl font-light tracking-wide">SUPERMARK</span>
                </a>
                <button id="close-mobile-menu" class="text-gray-500 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="products.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-accent">Products</a>
                <a href="services.html" class="block px-3 py-2 rounded-md text-base font-medium text-primary bg-accent">Services</a>
                <a href="orders.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-accent">Orders</a>
                <a href="about.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-accent">About</a>
                <a href="contact.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-accent">Contact</a>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="py-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="index.html" class="text-gray-500 hover:text-primary text-sm">Home</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <a href="services.html" class="ml-2 text-gray-500 hover:text-primary text-sm">Services</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="ml-2 text-primary text-sm" aria-current="page">Home Cleaning</span>
                </li>
            </ol>
        </nav>
        
        <!-- Service Details -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Service Header -->
            <div class="relative">
                <img src="/{{ $service->image }}" alt="Home Cleaning" class="w-full h-64 md:h-96 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                    <div class="p-6 md:p-8 w-full">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h1 class="text-3xl font-light text-white mb-2">{{$service->title}}</h1>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="ml-2 text-white text-sm">4.8 (89 reviews)</span>
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <button id="book-now-btn" class="px-6 py-3 bg-primary text-white rounded-md hover:bg-gray-700 transition-colors duration-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Service Info -->
            <div class="p-6 md:p-8">
                <div class="flex flex-wrap -mx-4">
                    <!-- Left Column - Service Details -->
                    <div class="w-full lg:w-2/3 px-4">
                        <!-- Service Highlights -->
                        <div class="flex flex-wrap -mx-2 mb-8">
                            <div class="w-1/2 md:w-1/3 px-2 mb-4">
                                <div class="bg-gray-50 p-4 rounded-lg text-center h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto text-primary mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <h3 class="text-sm font-medium text-gray-900">Duration</h3>
                                    <p class="text-gray-600 text-sm">3-4 hours</p>
                                </div>
                            </div>
                            <div class="w-1/2 md:w-1/3 px-2 mb-4">
                                <div class="bg-gray-50 p-4 rounded-lg text-center h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto text-primary mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <h3 class="text-sm font-medium text-gray-900">Price</h3>
                                    <p class="text-gray-600 text-sm">${{$service->price}}</p>
                                </div>
                            </div>
                            <div class="w-1/2 md:w-1/3 px-2 mb-4">
                                <div class="bg-gray-50 p-4 rounded-lg text-center h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto text-primary mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <h3 class="text-sm font-medium text-gray-900">Guarantee</h3>
                                    <p class="text-gray-600 text-sm">100% Satisfaction</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Service Description -->
                        <div class="mb-8">
                            <h2 class="text-xl font-medium text-gray-900 mb-4">Service Description</h2>
                            <p class="text-gray-600 mb-4">
            {{ $service->description }}
                            </p>
                        </div>
                        
                        <!-- What's Included -->
                        <div class="mb-8">
                            <h2 class="text-xl font-medium text-gray-900 mb-4">What's Included</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-start feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600">Dusting and wiping of all surfaces</span>
                                </div>
                                <div class="flex items-start feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600">Vacuuming and mopping of floors</span>
                                </div>
                                <div class="flex items-start feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600">Bathroom and kitchen deep cleaning</span>
                                </div>
                                <div class="flex items-start feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600">Bed making and linen changing (upon request)</span>
                                </div>
                                <div class="flex items-start feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600">Window sill cleaning</span>
                                </div>
                                <div class="flex items-start feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600">Trash removal and bin cleaning</span>
                                </div>
                                <div class="flex items-start feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600">Appliance exterior cleaning</span>
                                </div>
                                <div class="flex items-start feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600">Cobweb removal</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- How It Works -->
                        <div class="mb-8">
                            <h2 class="text-xl font-medium text-gray-900 mb-4">How It Works</h2>
                            <div class="space-y-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary text-white">
                                            1
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">Book Your Service</h3>
                                        <p class="mt-1 text-gray-600">Select your preferred date and time, and provide your address details.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary text-white">
                                            2
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">Professional Arrives</h3>
                                        <p class="mt-1 text-gray-600">Our vetted and trained cleaning professional arrives at your doorstep.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary text-white">
                                            3
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">Cleaning Service</h3>
                                        <p class="mt-1 text-gray-600">The professional performs the cleaning according to our detailed checklist.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary text-white">
                                            4
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">Satisfaction Check</h3>
                                        <p class="mt-1 text-gray-600">We'll follow up to ensure you're completely satisfied with the service.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Section -->
                        <div class="mb-8">
                            <h2 class="text-xl font-medium text-gray-900 mb-4">Frequently Asked Questions</h2>
                            <div class="space-y-4">
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <button class="flex justify-between items-center w-full px-4 py-3 text-left focus:outline-none">
                                        <span class="font-medium text-gray-900">How long does a typical cleaning take?</span>
                                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    <div class="px-4 pb-3">
                                        <p class="text-gray-600">A standard home cleaning typically takes 3-4 hours, depending on the size of your home and its condition. For larger homes or deep cleaning services, it may take longer.</p>
                                    </div>
                                </div>
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <button class="flex justify-between items-center w-full px-4 py-3 text-left focus:outline-none">
                                        <span class="font-medium text-gray-900">Do I need to provide cleaning supplies?</span>
                                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    <div class="px-4 pb-3">
                                        <p class="text-gray-600">No, our professionals bring all necessary cleaning supplies and equipment. We use eco-friendly products that are safe for your family and pets.</p>
                                    </div>
                                </div>
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <button class="flex justify-between items-center w-full px-4 py-3 text-left focus:outline-none">
                                        <span class="font-medium text-gray-900">Can I be home during the cleaning?</span>
                                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    <div class="px-4 pb-3">
                                        <p class="text-gray-600">Yes, you can be home during the cleaning or you can leave if you prefer. Many of our clients provide access instructions and are not present during the service.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column - Sidebar -->
                    <div class="w-full lg:w-1/3 px-4">
                        <!-- Price Card -->
                        <div class="bg-gray-50 rounded-lg p-6 mb-6 sticky top-24">
                            <h3 class="text-xl font-medium text-gray-900 mb-4">Service Summary</h3>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Standard Cleaning</span>
                                <span class="font-medium">$149.00</span>
                            </div>
                            <div class="border-t border-gray-200 my-4"></div>
                            <div class="flex justify-between mb-4">
                                <span class="font-medium text-gray-900">Total</span>
                                <span class="font-medium text-gray-900">$149.00</span>
                            </div>
                            <button id="book-now-sidebar" class="w-full px-6 py-3 bg-primary text-white rounded-md hover:bg-gray-700 transition-colors duration-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Book Now
                            </button>
                            
                            <!-- Additional Info -->
                            <div class="mt-6 space-y-4">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">100% Satisfaction Guarantee</span>
                                </div>
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">Flexible scheduling</span>
                                </div>
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">Pay after service completion</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Customer Reviews Summary -->
                        <div class="bg-white border border-gray-100 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Reviews</h3>
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-gray-600 text-sm">4.8 out of 5</span>
                            </div>
                            <div class="space-y-4">
                                <div class="review-card p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center mb-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center mr-2">
                                            <span class="text-xs font-medium text-gray-600">JD</span>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Jane Doe</h4>
                                            <div class="flex text-yellow-400 text-xs">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600">The cleaning service was exceptional! The team was thorough, professional, and left my home spotless.</p>
                                </div>
                                <div class="review-card p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center mb-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center mr-2">
                                            <span class="text-xs font-medium text-gray-600">MS</span>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Michael Smith</h4>
                                            <div class="flex text-yellow-400 text-xs">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600">I've been using this service monthly for a year now. Always consistent and high quality. Highly recommend!</p>
                                </div>
                            </div>
                            <a href="#" class="block text-center text-primary hover:underline text-sm mt-4">View all 89 reviews</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Services -->
        <div class="mt-12">
            <h2 class="text-2xl font-light text-gray-900 mb-6">Related Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Service 1 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="relative">
                        <img src="/placeholder.svg?height=200&width=400" alt="Window Cleaning" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Popular</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-light text-lg mb-1">Window Cleaning</h3>
                        <p class="text-gray-500 text-sm mb-3">Crystal clear windows inside and out</p>
                        <div class="flex items-center mb-3">
                            <div class="text-yellow-400 flex">
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                            </div>
                            <span class="ml-2 text-xs text-gray-500">5.0 (42 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-primary font-medium">$99.00</p>
                            <a href="window-cleaning.html" class="text-primary hover:text-gray-700 text-sm font-medium">View Details</a>
                        </div>
                    </div>
                </div>
                
                <!-- Service 2 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="relative">
                        <img src="/placeholder.svg?height=200&width=400" alt="Carpet Cleaning" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-light text-lg mb-1">Carpet Cleaning</h3>
                        <p class="text-gray-500 text-sm mb-3">Professional deep carpet cleaning</p>
                        <div class="flex items-center mb-3">
                            <div class="text-yellow-400 flex">
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="far fa-star text-xs"></i>
                            </div>
                            <span class="ml-2 text-xs text-gray-500">4.0 (18 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-primary font-medium">$129.00</p>
                            <a href="carpet-cleaning.html" class="text-primary hover:text-gray-700 text-sm font-medium">View Details</a>
                        </div>
                    </div>
                </div>
                
                <!-- Service 3 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="relative">
                        <img src="/placeholder.svg?height=200&width=400" alt="Deep Cleaning" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">New</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-light text-lg mb-1">Deep Cleaning</h3>
                        <p class="text-gray-500 text-sm mb-3">Thorough cleaning for every corner</p>
                        <div class="flex items-center mb-3">
                            <div class="text-yellow-400 flex">
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star-half-alt text-xs"></i>
                            </div>
                            <span class="ml-2 text-xs text-gray-500">4.5 (32 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-primary font-medium">$199.00</p>
                            <a href="deep-cleaning.html" class="text-primary hover:text-gray-700 text-sm font-medium">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Booking Modal -->
<div id="booking-modal" class="modal">
    <div class="modal-content">
        <div class="p-6 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-medium">Book Home Cleaning Service</h2>
            </div>
            <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form action="{{ route('addservice') }}" method="POST" class="p-8">
            @csrf
            <input type="hidden" name="service_id" value="1">
            <input type="hidden" name="service_name" value="Home Cleaning">
            <input type="hidden" name="service_price" value="149.00">
            
            <!-- Date and Time Selection -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Date Picker -->
                <div>
                    <label for="booking_date" class="block text-sm font-medium text-gray-700 mb-1">Preferred Date *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="date" id="booking_date" name="booking_date" required min="{{ date('Y-m-d') }}" class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                    </div>
                </div>
                
                <!-- Time Picker -->
                <div>
                    <label for="booking_time" class="block text-sm font-medium text-gray-700 mb-1">Preferred Time *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <select id="booking_time" name="booking_time" required class="w-full pl-10 pr-8 py-3 border border-gray-200 rounded-md focus:outline-none form-select appearance-none">
                            <option value="">Select a time</option>
                            <option value="09:00:00">9:00 AM</option>
                            <option value="10:00:00">10:00 AM</option>
                            <option value="11:00:00">11:00 AM</option>
                            <option value="12:00:00">12:00 PM</option>
                            <option value="13:00:00">1:00 PM</option>
                            <option value="14:00:00">2:00 PM</option>
                            <option value="15:00:00">3:00 PM</option>
                            <option value="16:00:00">4:00 PM</option>
                            <option value="17:00:00">5:00 PM</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Personal Information -->
            <div class="mb-6 p-6 bg-gray-50 rounded-lg border border-gray-100">
                <h3 class="text-sm font-medium text-gray-700 mb-4">Personal Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                        <input type="text" id="first_name" name="first_name" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                        <input type="text" id="last_name" name="last_name" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                        <input type="tel" id="phone" name="phone" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                    </div>
                </div>
            </div>
            
            <!-- Address Information -->
            <div class="mb-6 p-6 bg-gray-50 rounded-lg border border-gray-100">
                <h3 class="text-sm font-medium text-gray-700 mb-4">Service Location</h3>
                
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Street Address *</label>
                    <input type="text" id="address" name="address" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                        <input type="text" id="city" name="city" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                    </div>
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State *</label>
                        <input type="text" id="state" name="state" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                    </div>
                    <div>
                        <label for="zip" class="block text-sm font-medium text-gray-700 mb-1">ZIP Code *</label>
                        <input type="text" id="zip" name="zip" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-input">
                    </div>
                </div>
            </div>
            
            <!-- Special Instructions -->
            <div class="mb-6">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Special Instructions (Optional)</label>
                <textarea id="notes" name="notes" rows="4" class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none form-textarea" placeholder="Any specific requirements or details we should know about?"></textarea>
            </div>
            
            <!-- Terms and Conditions -->
            <div class="mb-6">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-primary hover:underline">Terms and Conditions</a></label>
                        <p class="text-gray-500">You will be charged only after service completion.</p>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-primary text-white rounded-md hover:bg-gray-700 transition-colors duration-300 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Confirm Booking
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="bg-white border-t border-gray-200 mt-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <p class="text-center text-sm text-gray-500">© 2025 Supermark. All rights reserved.</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMobileMenu = document.getElementById('close-mobile-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
        });
        
        closeMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });
        
        // Set minimum date for date picker to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('booking_date').min = today;
        
        // Booking modal
        const modal = document.getElementById('booking-modal');
        const bookNowBtn = document.getElementById('book-now-btn');
        const bookNowSidebar = document.getElementById('book-now-sidebar');
        const closeModal = document.getElementById('close-modal');
        
        function openModal() {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        
        function closeModalFunc() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        
        bookNowBtn.addEventListener('click', openModal);
        bookNowSidebar.addEventListener('click', openModal);
        closeModal.addEventListener('click', closeModalFunc);
        
        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                closeModalFunc();
            }
        });
        
        // FAQ accordion functionality
        const faqButtons = document.querySelectorAll('.border.border-gray-200.rounded-lg.overflow-hidden > button');
        
        faqButtons.forEach(button => {
            button.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('svg');
                
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });
    });
</script>
</body>
</html>