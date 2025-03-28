<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermark - Service Detail</title>
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

    <!-- Breadcrumb -->
    <section class="py-4 bg-white border-b border-gray-100">
        <div class="container mx-auto px-6">
            <div class="flex items-center text-sm text-gray-500">
                <a href="index.html" class="hover:text-primary">Home</a>
                <span class="mx-2">/</span>
                <a href="services.html" class="hover:text-primary">Services</a>
                <span class="mx-2">/</span>
                <span>Home Cleaning</span>
            </div>
        </div>
    </section>

    <!-- Service Detail -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row -mx-6">
                <!-- Service Images -->
                <div class="md:w-1/2 px-6 mb-8 md:mb-0">
                    <div class="mb-6">
                        <img src="/placeholder.svg?height=600&width=600" alt="Home Cleaning Service" class="w-full h-auto">
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="border border-primary">
                            <img src="/placeholder.svg?height=150&width=150" alt="Home Cleaning Thumbnail 1" class="w-full h-auto">
                        </div>
                        <div class="border border-gray-200 hover:border-primary cursor-pointer">
                            <img src="/placeholder.svg?height=150&width=150" alt="Home Cleaning Thumbnail 2" class="w-full h-auto">
                        </div>
                        <div class="border border-gray-200 hover:border-primary cursor-pointer">
                            <img src="/placeholder.svg?height=150&width=150" alt="Home Cleaning Thumbnail 3" class="w-full h-auto">
                        </div>
                    </div>
                </div>
                
                <!-- Service Info -->
                <div class="md:w-1/2 px-6">
                    <div class="mb-2">
                        <span class="text-xs text-gray-500">Home Services</span>
                    </div>
                    <h1 class="text-3xl font-light mb-4">Home Cleaning Service</h1>
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                        </div>
                        <span class="ml-2 text-xs text-gray-500">5.0 (89 reviews)</span>
                    </div>
                    <p class="text-xl text-primary mb-6">Starting from $99</p>
                    <p class="text-gray-600 text-sm mb-6">Our professional home cleaning service provides thorough cleaning of your living spaces. Our trained staff uses eco-friendly products to ensure your home is spotless and healthy.</p>
                    
                    <div class="mb-6">
                        <h3 class="text-sm font-medium mb-2">Service Type</h3>
                        <div class="flex space-x-2">
                            <button class="px-4 py-1.5 border border-primary text-primary text-xs">Standard Cleaning</button>
                            <button class="px-4 py-1.5 border border-gray-200 text-gray-700 text-xs hover:border-primary hover:text-primary">Deep Cleaning</button>
                            <button class="px-4 py-1.5 border border-gray-200 text-gray-700 text-xs hover:border-primary hover:text-primary">Move-in/Move-out</button>
                        </div>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-sm font-medium mb-2">Home Size</h3>
                        <div class="flex space-x-2">
                            <button class="px-4 py-1.5 border border-primary text-primary text-xs">Small (< 1000 sq ft)</button>
                            <button class="px-4 py-1.5 border border-gray-200 text-gray-700 text-xs hover:border-primary hover:text-primary">Medium (1000-2000 sq ft)</button>
                            <button class="px-4 py-1.5 border border-gray-200 text-gray-700 text-xs hover:border-primary hover:text-primary">Large (> 2000 sq ft)</button>
                        </div>
                    </div>
                    
                    <!-- Date and Time Picker -->
                    <div class="mb-8">
                        <h3 class="text-sm font-medium mb-2">Select Date & Time</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-500 mb-1 block">Date</label>
                                <input type="date" class="w-full border border-gray-200 py-1.5 px-2 text-sm                                <input type="date" class="w-full border border-gray-200 py-1.5 px-2 text-sm focus:outline-none focus:border-primary">
                            </div>
                            <div>
                                <label class="text-xs text-gray-500 mb-1 block">Time</label>
                                <select class="w-full border border-gray-200 py-1.5 px-2 text-sm focus:outline-none focus:border-primary">
                                    <option>09:00 AM</option>
                                    <option>10:00 AM</option>
                                    <option>11:00 AM</option>
                                    <option>12:00 PM</option>
                                    <option>01:00 PM</option>
                                    <option>02:00 PM</option>
                                    <option>03:00 PM</option>
                                    <option>04:00 PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-8">
                        <button class="w-full px-6 py-2 bg-primary text-white text-sm hover:bg-gray-700 transition">Book Now</button>
                    </div>
                    
                    <div class="border-t border-gray-100 pt-6">
                        <div class="flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm">Service duration: 2-3 hours</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span class="text-sm">Vetted and background-checked professionals</span>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                            </svg>
                            <span class="text-sm">100% satisfaction guarantee</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details Tabs -->
    <section class="py-12 bg-accent">
        <div class="container mx-auto px-6">
            <div class="border-b border-gray-200 mb-6">
                <div class="flex -mb-px">
                    <button class="text-sm py-3 px-4 border-b-2 border-primary text-primary mr-4">Service Details</button>
                    <button class="text-sm py-3 px-4 text-gray-500 hover:text-primary mr-4">What's Included</button>
                    <button class="text-sm py-3 px-4 text-gray-500 hover:text-primary">Reviews (89)</button>
                </div>
            </div>
            
            <div class="text-sm text-gray-600 leading-relaxed">
                <p class="mb-4">Our professional home cleaning service is designed to give you a spotless home without the hassle. Our trained and vetted cleaning professionals use eco-friendly products and follow a detailed checklist to ensure every corner of your home is properly cleaned.</p>
                
                <p class="mb-4">Whether you need a regular cleaning service or a one-time deep clean, our team can accommodate your needs. We pride ourselves on our attention to detail and commitment to customer satisfaction.</p>
                
                <h3 class="text-base font-medium text-gray-800 mb-2 mt-6">Standard Cleaning Includes:</h3>
                <ul class="list-disc pl-5 space-y-1 mb-4">
                    <li>Dusting all accessible surfaces</li>
                    <li>Vacuuming floors and carpets</li>
                    <li>Mopping hard floors</li>
                    <li>Cleaning kitchen countertops and appliance exteriors</li>
                    <li>Cleaning and sanitizing bathrooms</li>
                    <li>Making beds (linens must be provided)</li>
                    <li>Emptying trash bins</li>
                </ul>
                
                <h3 class="text-base font-medium text-gray-800 mb-2 mt-6">Before Your Service:</h3>
                <p>To ensure the best possible service, please secure any valuables and provide clear access to areas that need cleaning. Our team will arrive with all necessary cleaning supplies and equipment.</p>
            </div>
        </div>
    </section>

    <!-- Our Professionals -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-light mb-8">Our Cleaning Professionals</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Professional 1 -->
                <div class="text-center">
                    <div class="mb-4">
                        <img src="/placeholder.svg?height=200&width=200" alt="Sarah Johnson" class="w-24 h-24 rounded-full mx-auto object-cover">
                    </div>
                    <h4 class="font-light text-base mb-1">Sarah Johnson</h4>
                    <p class="text-gray-500 text-sm mb-2">5 years experience</p>
                    <div class="flex justify-center">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                        </div>
                        <span class="ml-2 text-xs text-gray-500">5.0</span>
                    </div>
                </div>
                
                <!-- Professional 2 -->
                <div class="text-center">
                    <div class="mb-4">
                        <img src="/placeholder.svg?height=200&width=200" alt="Michael Chen" class="w-24 h-24 rounded-full mx-auto object-cover">
                    </div>
                    <h4 class="font-light text-base mb-1">Michael Chen</h4>
                    <p class="text-gray-500 text-sm mb-2">3 years experience</p>
                    <div class="flex justify-center">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star-half-alt text-xs"></i>
                        </div>
                        <span class="ml-2 text-xs text-gray-500">4.5</span>
                    </div>
                </div>
                
                <!-- Professional 3 -->
                <div class="text-center">
                    <div class="mb-4">
                        <img src="/placeholder.svg?height=200&width=200" alt="Emily Rodriguez" class="w-24 h-24 rounded-full mx-auto object-cover">
                    </div>
                    <h4 class="font-light text-base mb-1">Emily Rodriguez</h4>
                    <p class="text-gray-500 text-sm mb-2">4 years experience</p>
                    <div class="flex justify-center">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                        </div>
                        <span class="ml-2 text-xs text-gray-500">5.0</span>
                    </div>
                </div>
                
                <!-- Professional 4 -->
                <div class="text-center">
                    <div class="mb-4">
                        <img src="/placeholder.svg?height=200&width=200" alt="David Wilson" class="w-24 h-24 rounded-full mx-auto object-cover">
                    </div>
                    <h4 class="font-light text-base mb-1">David Wilson</h4>
                    <p class="text-gray-500 text-sm mb-2">2 years experience</p>
                    <div class="flex justify-center">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                        </div>
                        <span class="ml-2 text-xs text-gray-500">5.0</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <section class="py-12 bg-accent">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-light mb-8">Related Services</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Related Service 1 -->
                <div class="group bg-white">
                    <a href="service-detail.html" class="block">
                        <div class="overflow-hidden">
                            <img src="/placeholder.svg?height=300&width=300" alt="Deep Cleaning" class="w-full h-48 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h4 class="font-light text-base mb-1">Deep Cleaning Service</h4>
                            <p class="text-gray-500 text-sm mb-2">Thorough cleaning for neglected areas</p>
                            <div class="flex items-center">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star-half-alt text-xs"></i>
                                </div>
                                <span class="ml-2 text-xs text-gray-500">4.5</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Related Service 2 -->
                <div class="group bg-white">
                    <a href="service-detail.html" class="block">
                        <div class="overflow-hidden">
                            <img src="/placeholder.svg?height=300&width=300" alt="Window Cleaning" class="w-full h-48 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h4 class="font-light text-base mb-1">Window Cleaning</h4>
                            <p class="text-gray-500 text-sm mb-2">Crystal clear windows inside and out</p>
                            <div class="flex items-center">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                </div>
                                <span class="ml-2 text-xs text-gray-500">5.0</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Related Service 3 -->
                <div class="group bg-white">
                    <a href="service-detail.html" class="block">
                        <div class="overflow-hidden">
                            <img src="/placeholder.svg?height=300&width=300" alt="Carpet Cleaning" class="w-full h-48 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h4 class="font-light text-base mb-1">Carpet Cleaning</h4>
                            <p class="text-gray-500 text-sm mb-2">Professional deep carpet cleaning</p>
                            <div class="flex items-center">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="far fa-star text-xs"></i>
                                </div>
                                <span class="ml-2 text-xs text-gray-500">4.0</span>
                            </div>
                        </div>
                    </a>
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