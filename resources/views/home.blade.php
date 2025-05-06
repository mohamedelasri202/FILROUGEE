<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermark - Home</title>
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
        }
    </style>
</head>
<body class="bg-white text-gray-800">
   
    <header class="py-4 px-6 bg-white border-b border-gray-100 fixed w-full z-50">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Left side: Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-xl font-light tracking-wide">SUPERMARK</span>
                </a>
            </div>
    
            <!-- Center: Navigation Links -->
            <nav class="hidden md:flex md:space-x-8 absolute left-1/2 transform -translate-x-1/2">
                <a href="{{ route('products') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                    Products
                </a>
                <a href="{{ route('services') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                    Services
                </a>
                <a href="{{ route('myorders') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                    Orders
                </a>
                <a href="" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                    About
                </a>
                <a href="" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
                    Contact
                </a>
            </nav>
    
            <!-- Right side: Auth Icons -->
            <div class="flex items-center space-x-6">
                @auth
                <!-- Authenticated User Icons -->
                <a href="#" class="text-gray-500 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>
                <a href="{{ route('cart') }}" class="relative text-gray-500 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">{{$cart_count ?? 0}}</span>
                </a>
                <!-- Logout Button -->
                <form method="POST" action="{{ route('logoutt') }}">
                    @csrf
                    <button type="submit" class="px-4 py-1.5 border border-gray-200 text-gray-500 text-xs hover:text-primary hover:border-primary transition duration-300">
                        Logout
                    </button>
                </form>
                @else
                <!-- Guest Links -->
                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>
                <a href="#" class="relative text-gray-500 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                </a>
                @endauth
            </div>
        </div>
    </header>
    

    <!-- Hero Section - Full Width -->
    <section class="relative w-full h-screen">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/stephanie-sun-boY8MdP-xOM-unsplash.jpg') }}" alt="Supermark Hero" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        </div>
        <div class="relative z-10 h-full flex items-center">
            <div class="container mx-auto px-6">
                <div class="max-w-lg">
                    <h1 class="text-4xl md:text-5xl font-light text-white mb-4 leading-tight">Quality products for your everyday needs</h1>
                    <p class="text-lg text-white text-opacity-90 mb-8 font-light">Your one-stop supermarket for quality products and convenient services.</p>
                    <div class="flex space-x-4">
                        <a href="{{ route('products') }}" class="px-6 py-2 border border-white text-white hover:bg-white hover:text-gray-900 transition duration-300 text-sm">Shop Products</a>
                        <a href="{{ route('services') }}" class="px-6 py-2 bg-white bg-opacity-20 text-white hover:bg-opacity-30 transition duration-300 text-sm">Our Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-light text-center mb-16">What We Offer</h2>
            
            <!-- Products Section -->
            <div id="products" class="mb-20">
                <h3 class="text-xl font-light mb-10 flex items-center">
                    <span class="text-primary mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </span>
                    Products
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Product Category 1 -->
                    <div class="group">
                        <div class="overflow-hidden mb-4">
                            <img src="{{ asset('images/selin-keskin-VnOVZtik3pE-unsplash.jpg') }}" alt="Fresh Groceries" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <h4 class="font-light text-base mb-1">Fresh Groceries</h4>
                        <p class="text-gray-500 text-sm mb-3">Quality fruits, vegetables, and dairy</p>
                        <a href="#" class="text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">View Collection</a>
                    </div>
                    
                    <!-- Product Category 2 -->
                    <div class="group">
                        <div class="overflow-hidden mb-4">
                            <img src="{{ asset('images/michal-balog-SXGjsXBkWnY-unsplash.jpg') }}" alt="Household Essentials" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <h4 class="font-light text-base mb-1">Household Essentials</h4>
                        <p class="text-gray-500 text-sm mb-3">Cleaning supplies and necessities</p>
                        <a href="#" class="text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">View Collection</a>
                    </div>
                    
                    <!-- Product Category 3 -->
                    <div class="group">
                        <div class="overflow-hidden mb-4">
                            <img src="{{ asset('images/63405b67aa71b74c6d7c3f24-amazon-pallets-of-returned-items-bulk.jpg') }}" alt="Electronics" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <h4 class="font-light text-base mb-1">Electronics</h4>
                        <p class="text-gray-500 text-sm mb-3">Latest gadgets and appliances</p>
                        <a href="#" class="text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">View Collection</a>
                    </div>
                    
                    <!-- Product Category 4 -->
                    <div class="group">
                        <div class="overflow-hidden mb-4">
                            <img src="{{ asset('images/poko-skincare-hZ7wSMMWGMA-unsplash.jpg') }}" alt="Health & Beauty" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <h4 class="font-light text-base mb-1">Health & Beauty</h4>
                        <p class="text-gray-500 text-sm mb-3">Personal care and wellness items</p>
                        <a href="#" class="text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">View Collection</a>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <a href="{{ route('products') }}" class="inline-block px-8 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 transition duration-300 text-sm">View All Products</a>
                </div>
            </div>
            
            <!-- Services Section -->
            <div id="services">
                <h3 class="text-xl font-light mb-10 flex items-center">
                    <span class="text-primary mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    Services
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Service Category 1 -->
                    <div class="group">
                        <div class="overflow-hidden mb-4">
                            <img src="{{ asset('images/kira-auf-der-heide-IPx7J1n_xUc-unsplash.jpg') }}" alt="Home Delivery" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <h4 class="font-light text-base mb-1">Home Delivery</h4>
                        <p class="text-gray-500 text-sm mb-3">Fast and reliable delivery service</p>
                        <a href="#" class="text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">Learn More</a>
                    </div>
                    
                    <!-- Service Category 2 -->
                    <div class="group">
                        <div class="overflow-hidden mb-4">
                            <img src="{{ asset('images/josue-michel-MwxsRSG1A2s-unsplash.jpg') }}" alt="Home Cleaning" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <h4 class="font-light text-base mb-1">Home Cleaning</h4>
                        <p class="text-gray-500 text-sm mb-3">Professional cleaning services</p>
                        <a href="#" class="text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">Learn More</a>
                    </div>
                    
                    <!-- Service Category 3 -->
                    <div class="group">
                        <div class="overflow-hidden mb-4">
                            <img src="{{ asset('images/premium_photo-1661342406124-740ae7a0dd0e.avif') }}" alt="Appliance Repair" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <h4 class="font-light text-base mb-1">Appliance Repair</h4>
                        <p class="text-gray-500 text-sm mb-3">Expert technicians for quick fixes</p>
                        <a href="#" class="text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">Learn More</a>
                    </div>
                    
                    <!-- Service Category 4 -->
                    <div class="group">
                        <div class="overflow-hidden mb-4">
                            <img src="{{ asset('images/premium_photo-1680297038160-89157d0c56d4.avif') }}" alt="Home Painting" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <h4 class="font-light text-base mb-1">Home Painting</h4>
                        <p class="text-gray-500 text-sm mb-3">Transform your living spaces</p>
                        <a href="#" class="text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">Learn More</a>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <a href="{{ route('services') }}" class="inline-block px-8 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 transition duration-300 text-sm">View All Services</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Offers -->
    <section class="py-20 bg-accent">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-light text-center mb-16">Special Offers</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-10 flex flex-col items-center text-center">
                    <div class="text-primary text-3xl mb-6">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h3 class="text-lg font-light mb-3">Weekend Sale</h3>
                    <p class="text-gray-500 text-sm mb-6">Get up to 25% off on all fresh produce this weekend</p>
                    <a href="#" class="mt-auto text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">Shop Now</a>
                </div>
                
                <div class="bg-white p-10 flex flex-col items-center text-center">
                    <div class="text-primary text-3xl mb-6">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="text-lg font-light mb-3">Free Delivery</h3>
                    <p class="text-gray-500 text-sm mb-6">Free delivery on orders above $50. Limited time offer</p>
                    <a href="#" class="mt-auto text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">Order Now</a>
                </div>
                
                <div class="bg-white p-10 flex flex-col items-center text-center">
                    <div class="text-primary text-3xl mb-6">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-lg font-light mb-3">Service Discount</h3>
                    <p class="text-gray-500 text-sm mb-6">20% off on your first home service booking</p>
                    <a href="#" class="mt-auto text-xs text-primary border-b border-primary pb-0.5 hover:text-gray-700 transition">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
   n>

    <!-- Call to Action -->
    <section class="py-20 bg-primary bg-opacity-10">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-2xl font-light mb-6">Shop Smart with Supermark</h2>
            <p class="text-gray-600 mb-10 max-w-2xl mx-auto">Join thousands of satisfied customers who enjoy our quality products and convenient services.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="#products" class="px-8 py-2 border border-primary text-primary hover:bg-primary hover:text-white transition duration-300 text-sm">Shop Products</a>
                <a href="#services" class="px-8 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 transition duration-300 text-sm">Book Services</a>
                <a href="register.html" class="px-8 py-2 bg-white text-gray-700 hover:bg-gray-50 transition duration-300 text-sm">Create Account</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white pt-16 pb-8 border-t border-gray-100">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Supermark Column -->
                <div>
                    <div class="flex items-center mb-8">
                        <span class="text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-base font-light">SUPERMARK</span>
                    </div>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">About us</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Store Locations</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Careers</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Our Partners</a></li>
                    </ul>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-gray-600 text-sm">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600 text-sm">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600 text-sm">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-sm font-medium mb-6">Quick Links</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Weekly Offers</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Gift Cards</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Store Finder</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Track Order</a></li>
                    </ul>
                </div>
                
                <!-- Customer Service -->
                <div>
                    <h3 class="text-sm font-medium mb-6">Customer Service</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Help Center</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Contact Us</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-gray-700">Returns & Refunds</a></li>
                    </ul>
                </div>
                
                <!-- Subscribe Us -->
                <div>
                    <h3 class="text-sm font-medium mb-6">Newsletter</h3>
                    <p class="text-sm text-gray-500 mb-4">Get updates on special offers and exclusive deals</p>
                    <div class="flex">
                        <input type="email" placeholder="Email Address" class="flex-1 border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                        <button class="bg-transparent text-primary px-4 py-2 hover:text-gray-700">→</button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-100 mt-12 pt-8">
                <p class="text-center text-xs text-gray-400">© 2025 Supermark. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>