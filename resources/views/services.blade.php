<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermark - All Services</title>
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
    <!-- Header -->
    <header class="py-4 px-6 bg-white border-b border-gray-100">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <a href="index.html" class="flex items-center">
                    <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-xl font-light tracking-wide">SUPERMARK</span>
                </a>
            </div>
            
            <div class="flex-1 mx-16 hidden md:block">
                <div class="relative">
                    <input type="text" placeholder="Search for services" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <a href="#" class="text-gray-500 hover:text-gray-700 transition">
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
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                </a>
                <form method="POST" action="{{ route('logoutt') }}">
                    @csrf
                    <button type="submit" class="text-gray-500 hover:text-primary transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="py-12 bg-accent">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-light">All Services</h1>
            <div class="flex items-center text-sm text-gray-500 mt-2">
                <a href="index.html" class="hover:text-primary">Home</a>
                <span class="mx-2">/</span>
                <span>Services</span>
            </div>
        </div>
    </section>

    <!-- Filter and Sort Section -->
    <section class="py-8 border-b border-gray-100">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <span class="text-sm text-gray-500 mr-4">Filter by:</span>
                    <select class="border-b border-gray-200 py-1 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                        <option>All Categories</option>
                        <option>Home Services</option>
                        <option>Delivery</option>
                        <option>Repair & Maintenance</option>
                        <option>Professional Services</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <span class="text-sm text-gray-500 mr-4">Sort by:</span>
                    <select class="border-b border-gray-200 py-1 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Rating</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <!-- Added max-width and centered the grid container -->
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                    <!-- Service 1 -->
                    @if($services->isEmpty())
                    <p>sorry no services availbale please check again later.</p>
                  @else
                    @foreach ($services as $service )

                    <div class="group">
                        <a href="service-detail.html" class="block">
                            <div class="overflow-hidden mb-4">
                                <img src="{{ asset($service->image) }}" alt="{{$service->title  }}" class="w-full h-64 object-cover transition duration-500 group-hover:scale-105">
                            </div>
                            <div class="flex justify-between"> <h4 class="font-light text-base mb-1">{{$service->title}}</h4>
                                <div class="pr-2"><p>{{$service->price}}$</p>
                                </div>
                            </div>
                       
                            <p class="text-gray-500 text-sm mb-2">{{$service->category}}</p>
                            <div class="flex items-center">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star-half-alt text-xs"></i>
                                </div>
                                <span class="ml-2 text-xs text-gray-500">4.5 (120 reviews)</span>
                            </div>
                        </a>
                        <form action="{{ route('addservice') }}" method="POST">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                           
                             <button type="submit" class="mt-3 w-full px-4 py-1.5 border border-gray-200 text-gray-700 text-xs hover:text-primary hover:border-primary transition duration-300">
                            Book Service
                        </button>
                    </form>
                    </div>
                    @endforeach
                    @endif

                    
                   
                    
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-center mt-16">
                <div class="flex space-x-1">
                    <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <a href="#" class="px-3 py-1 border border-primary text-primary text-sm">1</a>
                    <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">2</a>
                    <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-accent">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-light text-center mb-12">How It Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full border border-primary text-primary mb-4">1</div>
                        <h3 class="text-lg font-light mb-2">Choose a Service</h3>
                        <p class="text-gray-500 text-sm">Browse our wide range of professional services and select what you need.</p>
                    </div>
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full border border-primary text-primary mb-4">2</div>
                        <h3 class="text-lg font-light mb-2">Book an Appointment</h3>
                        <p class="text-gray-500 text-sm">Select your preferred date and time for the service.</p>
                    </div>
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full border border-primary text-primary mb-4">3</div>
                        <h3 class="text-lg font-light mb-2">Enjoy Quality Service</h3>
                        <p class="text-gray-500 text-sm">Our professionals will arrive on time and deliver excellent service.</p>
                    </div>
                </div>
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
                
                <!-- Contact -->
                <div>
                    <h3 class="text-sm font-medium mb-6">Contact</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="text-gray-500">123 Market Street, Suite 10</li>
                        <li class="text-gray-500">San Francisco, CA 94103</li>
                        <li class="text-gray-500">info@supermark.com</li>
                        <li class="text-gray-500">+1 (555) 123-4567</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-100 mt-12 pt-8">
                <p class="text-center text-xs text-gray-400">© 2025 Supermark. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>