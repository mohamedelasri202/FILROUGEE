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
                        primary: '#e53e3e',
                        secondary: '#2b6cb0',
                        accent: '#f6e05e'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="border-b border-gray-200 py-4 px-6 bg-white shadow-sm">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <div class="mr-4">
                    <a href="#" class="flex items-center">
                        <span class="text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-2xl font-bold">Supermark</span>
                    </a>
                </div>
               
            </div>
            <div class="flex-1 mx-10">
                <div class="relative">
                    <input type="text" placeholder="Search for more than 50,000 products" class="w-full border border-gray-300 rounded-md py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            

            <div class="flex items-center space-x-6">
                {{ Auth::check() ? 'User is logged in' : 'User is not logged in' }}
                @auth
                <form method="POST" action="{{ route('logoutt') }}">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-900">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            @endauth
            
            @guest
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>
            @endguest
            
            

                <a href="#" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>
                <a href="#" class="relative text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </a>
            </div>
        </div>
        <!-- Mobile Navigation -->
        <div class="md:hidden flex justify-center mt-4 space-x-4">
            <a href="#products" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-red-700 transition">Products</a>
            <a href="#services" class="px-4 py-2 bg-secondary text-white rounded-md hover:bg-blue-700 transition">Services</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-red-50 to-blue-50">
        <div class="container mx-auto px-4 py-16">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to <span class="text-primary">Supermark</span></h1>
                    <p class="text-lg text-gray-600 mb-8">Your one-stop supermarket for quality products and convenient services.</p>
                    <div class="flex space-x-4">
                        <a href="#products" class="px-6 py-3 bg-primary text-white rounded-md hover:bg-red-700 transition">Shop Products</a>
                        <a href="#services" class="px-6 py-3 bg-secondary text-white rounded-md hover:bg-blue-700 transition">Book Services</a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="/placeholder.svg?height=400&width=600" alt="Supermark Products and Services" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Featured Categories -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">What We Offer</h2>
            
            <!-- Products Section -->
            <div id="products" class="mb-16">
                <h3 class="text-2xl font-semibold mb-8 flex items-center">
                    <span class="text-primary mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </span>
                    Products
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Product Category 1 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="/placeholder.svg?height=200&width=300" alt="Fresh Groceries" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg mb-2">Fresh Groceries</h4>
                            <p class="text-gray-600 text-sm">Quality fruits, vegetables, meats, and dairy products.</p>
                            <a href="#" class="mt-4 inline-block text-primary hover:underline">Shop Now →</a>
                        </div>
                    </div>
                    
                    <!-- Product Category 2 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="/placeholder.svg?height=200&width=300" alt="Household Essentials" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg mb-2">Household Essentials</h4>
                            <p class="text-gray-600 text-sm">Cleaning supplies, paper products, and home necessities.</p>
                            <a href="#" class="mt-4 inline-block text-primary hover:underline">Shop Now →</a>
                        </div>
                    </div>
                    
                    <!-- Product Category 3 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="/placeholder.svg?height=200&width=300" alt="Electronics & Appliances" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg mb-2">Electronics & Appliances</h4>
                            <p class="text-gray-600 text-sm">Latest gadgets and home appliances at competitive prices.</p>
                            <a href="#" class="mt-4 inline-block text-primary hover:underline">Shop Now →</a>
                        </div>
                    </div>
                    
                    <!-- Product Category 4 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="/placeholder.svg?height=200&width=300" alt="Health & Beauty" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg mb-2">Health & Beauty</h4>
                            <p class="text-gray-600 text-sm">Personal care products, cosmetics, and wellness items.</p>
                            <a href="#" class="mt-4 inline-block text-primary hover:underline">Shop Now →</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-8">
                    <a href="#" class="px-6 py-3 bg-primary text-white rounded-md hover:bg-red-700 transition">View All Products</a>
                </div>
            </div>
            
            <!-- Services Section -->
            <div id="services">
                <h3 class="text-2xl font-semibold mb-8 flex items-center">
                    <span class="text-secondary mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    Services
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Service Category 1 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset('images/pizza-home-delivery-logo-design-template-3f389942bb2faa0cfb8327e4aa36949d_screen.jpg') }}" alt="Home Delivery" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg mb-2">Home Delivery</h4>
                            <p class="text-gray-600 text-sm">Fast and reliable delivery of your groceries right to your doorstep.</p>
                            <a href="#" class="mt-4 inline-block text-secondary hover:underline">Learn More →</a>
                        </div>
                    </div>
                    
                    <!-- Service Category 2 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{asset('images/1.jpg') }}" alt="Home Cleaning" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg mb-2">Home Cleaning</h4>
                            <p class="text-gray-600 text-sm">Professional cleaning services for your home or office.</p>
                            <a href="#" class="mt-4 inline-block text-secondary hover:underline">Learn More →</a>
                        </div>
                    </div>
                    
                    <!-- Service Category 3 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset('images/concept-home-appliances-repair-service-worker-with-tools-various-household-appliances-vecto_357257-1149.avif') }}" alt="Home Appliance Repair" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="font-semibold text-lg mb-2">Appliance Repair</h4>
                            <p class="text-gray-600 text-sm">Expert technicians to fix your home appliances quickly.</p>
                            <a href="#" class="mt-4 inline-block text-secondary hover:underline">Learn More →</a>
                        </div>
                    </div>
                    
                    <!-- Service Category 4 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset('images/istockphoto-1283458882-612x612.jpg') }}" alt="Home Appliance Repair" class="w-full h-48 object-cover">



                        <div class="p-4">
                            <h4 class="font-semibold text-lg mb-2">Home Painting</h4>
                            <p class="text-gray-600 text-sm">Professional painters to transform your living spaces.</p>
                            <a href="#" class="mt-4 inline-block text-secondary hover:underline">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-8">
                    <a href="#" class="px-6 py-3 bg-secondary text-white rounded-md hover:bg-blue-700 transition">View All Services</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Offers -->
    <section class="py-12 bg-accent bg-opacity-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Special Offers</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                    <div class="text-primary text-5xl mb-4">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Weekend Sale</h3>
                    <p class="text-gray-600 mb-4">Get up to 25% off on all fresh produce this weekend!</p>
                    <a href="#" class="mt-auto px-6 py-2 bg-primary text-white rounded-md hover:bg-red-700 transition">Shop Now</a>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                    <div class="text-secondary text-5xl mb-4">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Free Delivery</h3>
                    <p class="text-gray-600 mb-4">Free delivery on orders above $50. Limited time offer!</p>
                    <a href="#" class="mt-auto px-6 py-2 bg-secondary text-white rounded-md hover:bg-blue-700 transition">Order Now</a>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                    <div class="text-primary text-5xl mb-4">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Service Discount</h3>
                    <p class="text-gray-600 mb-4">20% off on your first home service booking!</p>
                    <a href="#" class="mt-auto px-6 py-2 bg-primary text-white rounded-md hover:bg-red-700 transition">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="ml-2 text-gray-600">5.0</span>
                    </div>
                    <p class="text-gray-600 italic mb-4">"Supermark has the freshest produce in town. Their delivery service is prompt and the staff is always friendly. My go-to supermarket for all my needs!"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                        <div>
                            <h4 class="font-medium">Robert Johnson</h4>
                            <p class="text-sm text-gray-500">Regular Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="ml-2 text-gray-600">5.0</span>
                    </div>
                    <p class="text-gray-600 italic mb-4">"I used Supermark's home cleaning service and was amazed by the quality. The team was professional, thorough, and finished in record time!"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                        <div>
                            <h4 class="font-medium">Jennifer Smith</h4>
                            <p class="text-sm text-gray-500">Service Client</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="ml-2 text-gray-600">4.5</span>
                    </div>
                    <p class="text-gray-600 italic mb-4">"The convenience of shopping for groceries and booking services all in one place is unmatched. Supermark has made my life so much easier!"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                        <div>
                            <h4 class="font-medium">David Wilson</h4>
                            <p class="text-sm text-gray-500">Products & Services Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Shop Smart with Supermark</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">Join thousands of satisfied customers who enjoy our quality products and convenient services.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#products" class="px-8 py-3 bg-white text-primary font-medium rounded-md hover:bg-gray-100 transition">Shop Products</a>
                <a href="#services" class="px-8 py-3 bg-secondary text-white font-medium rounded-md hover:bg-blue-700 transition">Book Services</a>
                <a href="register.html" class="px-8 py-3 border-2 border-white text-white font-medium rounded-md hover:bg-red-700 transition">Create Account</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white pt-10 pb-6 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Supermark Column -->
                <div>
                    <div class="flex items-center mb-6">
                        <span class="text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-xl font-bold">Supermark</span>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">About us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Store Locations</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Careers</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Our Partners</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Loyalty Program</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Press Releases</a></li>
                    </ul>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-medium mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Weekly Offers</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Gift Cards</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Store Finder</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Track Order</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Shopping Lists</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Recipes</a></li>
                    </ul>
                </div>
                
                <!-- Customer Service -->
                <div>
                    <h3 class="text-lg font-medium mb-4">Customer Service</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Help Center</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Contact Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Returns & Refunds</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Terms & Conditions</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Delivery Information</a></li>
                    </ul>
                </div>
                
                <!-- Subscribe Us -->
                <div>
                    <h3 class="text-lg font-medium mb-4">Subscribe to Our Newsletter</h3>
                    <p class="text-sm text-gray-600 mb-4">Get weekly updates on special offers, new products, and exclusive deals!</p>
                    <div class="flex">
                        <input type="email" placeholder="Email Address" class="flex-1 border border-gray-300 rounded-l-md py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        <button class="bg-primary text-white px-4 py-2 rounded-r-md hover:bg-red-700">Subscribe</button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 mt-10 pt-6">
                <p class="text-center text-sm text-gray-500">© 2025 Supermark. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>