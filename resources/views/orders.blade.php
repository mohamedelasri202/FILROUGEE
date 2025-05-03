<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermark - My Orders</title>
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
        .order-card {
            transition: all 0.3s ease;
        }
        .order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .tab-button.active {
            border-bottom: 2px solid #6a7280;
            color: #6a7280;
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Success toast notification -->
    <div id="successToast"
        class="fixed z-50 top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg hidden opacity-0 transition-opacity duration-300">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span>Order status updated successfully!</span>
        </div>
    </div>

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
                    <input type="text" placeholder="Search for products" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
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
                <a href="cart.html" class="relative text-gray-500 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-primary transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="py-12 bg-accent">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-light">My Orders</h1>
            <div class="flex items-center text-sm text-gray-500 mt-2">
                <a href="index.html" class="hover:text-primary">Home</a>
                <span class="mx-2">/</span>
                <span>My Orders</span>
            </div>
        </div>
    </section>

    <!-- Orders Section -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="max-w-5xl mx-auto">
                <!-- Tabs -->
                <div class="flex border-b border-gray-200 mb-8">
                    <button class="tab-button active py-3 px-6 text-sm font-medium focus:outline-none" data-tab="orders">
                        Product Orders
                    </button>
                    <button class="tab-button py-3 px-6 text-sm font-medium focus:outline-none" data-tab="services">
                        Service Bookings
                    </button>
                </div>

                <!-- Orders Tab Content -->
                <div id="orders-tab" class="tab-content">
                    <div class="space-y-6">
                        <!-- Order 1 -->
                        <div class="order-card bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Order #ORD-12345</p>
                                    <p class="text-xs text-gray-500">Placed on May 1, 2023</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                        Delivered
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div class="flex flex-wrap gap-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                    <img src="https://via.placeholder.com/150" alt="Organic Apples" class="h-full w-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">Organic Apples</p>
                                                    <p class="text-xs text-gray-500">Qty: 2 × $3.99</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                    <img src="https://via.placeholder.com/150" alt="Fresh Milk" class="h-full w-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">Fresh Milk</p>
                                                    <p class="text-xs text-gray-500">Qty: 1 × $2.49</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 md:mt-0 md:ml-6">
                                        <p class="text-sm font-medium text-gray-900">Total: $10.47</p>
                                        <div class="mt-2 flex space-x-2">
                                            <a href="#" class="text-xs text-primary hover:text-gray-700 font-medium">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order 2 -->
                        <div class="order-card bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Order #ORD-12346</p>
                                    <p class="text-xs text-gray-500">Placed on May 5, 2023</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                        Processing
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div class="flex flex-wrap gap-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                    <img src="https://via.placeholder.com/150" alt="Whole Grain Bread" class="h-full w-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">Whole Grain Bread</p>
                                                    <p class="text-xs text-gray-500">Qty: 1 × $4.99</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                    <img src="https://via.placeholder.com/150" alt="Organic Eggs" class="h-full w-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">Organic Eggs</p>
                                                    <p class="text-xs text-gray-500">Qty: 1 × $5.49</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 md:mt-0 md:ml-6">
                                        <p class="text-sm font-medium text-gray-900">Total: $10.48</p>
                                        <div class="mt-2 flex space-x-2">
                                            <a href="#" class="text-xs text-primary hover:text-gray-700 font-medium">View Details</a>
                                            <button class="text-xs text-red-600 hover:text-red-800 font-medium">Cancel Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order 3 -->
                        <div class="order-card bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Order #ORD-12347</p>
                                    <p class="text-xs text-gray-500">Placed on May 10, 2023</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-800">
                                        Shipped
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div class="flex flex-wrap gap-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                    <img src="https://via.placeholder.com/150" alt="Coffee Beans" class="h-full w-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">Premium Coffee Beans</p>
                                                    <p class="text-xs text-gray-500">Qty: 1 × $12.99</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                    <img src="https://via.placeholder.com/150" alt="Chocolate Bar" class="h-full w-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">Dark Chocolate Bar</p>
                                                    <p class="text-xs text-gray-500">Qty: 2 × $3.99</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 md:mt-0 md:ml-6">
                                        <p class="text-sm font-medium text-gray-900">Total: $20.97</p>
                                        <div class="mt-2 flex space-x-2">
                                            <a href="#" class="text-xs text-primary hover:text-gray-700 font-medium">View Details</a>
                                            <button class="text-xs text-red-600 hover:text-red-800 font-medium">Cancel Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services Tab Content -->
                <div id="services-tab" class="tab-content hidden">
                    <div class="space-y-6">
                        <!-- Service 1 -->
                        <div class="order-card bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Booking #SRV-5678</p>
                                    <p class="text-xs text-gray-500">Booked on April 28, 2023</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                        Completed
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                <img src="https://via.placeholder.com/150" alt="Home Cleaning" class="h-full w-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Home Cleaning Service</p>
                                                <p class="text-xs text-gray-500">Provider: Elite Cleaning Services</p>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    <span class="inline-flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        May 2, 2023 at 10:00 AM
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 md:mt-0 md:ml-6">
                                        <p class="text-sm font-medium text-gray-900">Price: $80.00</p>
                                        <div class="mt-2 flex space-x-2">
                                            <a href="#" class="text-xs text-primary hover:text-gray-700 font-medium">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Service 2 -->
                        <div class="order-card bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Booking #SRV-5679</p>
                                    <p class="text-xs text-gray-500">Booked on May 5, 2023</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                        Confirmed
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                <img src="https://via.placeholder.com/150" alt="Lawn Mowing" class="h-full w-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Lawn Mowing Service</p>
                                                <p class="text-xs text-gray-500">Provider: Green Thumb Landscaping</p>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    <span class="inline-flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        May 15, 2023 at 2:00 PM
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 md:mt-0 md:ml-6">
                                        <p class="text-sm font-medium text-gray-900">Price: $50.00</p>
                                        <div class="mt-2 flex space-x-2">
                                            <a href="#" class="text-xs text-primary hover:text-gray-700 font-medium">View Details</a>
                                            <button class="text-xs text-red-600 hover:text-red-800 font-medium">Cancel Booking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Service 3 -->
                        <div class="order-card bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Booking #SRV-5680</p>
                                    <p class="text-xs text-gray-500">Booked on May 8, 2023</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-800">
                                        In-Progress
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                <img src="https://via.placeholder.com/150" alt="Plumbing Repair" class="h-full w-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Plumbing Repair Service</p>
                                                <p class="text-xs text-gray-500">Provider: Quick Fix Plumbing</p>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    <span class="inline-flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        May 12, 2023 at 9:30 AM
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 md:mt-0 md:ml-6">
                                        <p class="text-sm font-medium text-gray-900">Price: $95.00</p>
                                        <div class="mt-2 flex space-x-2">
                                            <a href="#" class="text-xs text-primary hover:text-gray-700 font-medium">View Details</a>
                                            <button class="text-xs text-red-600 hover:text-red-800 font-medium">Cancel Booking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-12 bg-accent">
        <div class="container mx-auto px-6">
            <div class="max-w-lg mx-auto text-center">
                <h2 class="text-2xl font-light mb-6">Stay Updated</h2>
                <p class="text-gray-600 mb-8">Subscribe to our newsletter to receive updates on new products, special offers, and exclusive deals.</p>
                <div class="flex">
                    <input type="email" placeholder="Your email address" class="flex-1 border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                    <button class="bg-transparent text-primary px-4 py-2 hover:text-gray-700">Subscribe</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toast notification
            const toast = document.getElementById('successToast');
            if (toast) {
                toast.classList.remove('hidden');
                toast.classList.add('opacity-0');
                toast.classList.add('opacity-100');
                toast.classList.add('transition-opacity');
                setTimeout(function() {
                    toast.classList.remove('opacity-100');
                    setTimeout(function() {
                        toast.classList.add('hidden');
                    }, 300);
                }, 5000);
            }

            // Tab switching
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    button.classList.add('active');
                    
                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.add('hidden'));
                    
                    // Show the selected tab content
                    const tabId = button.getAttribute('data-tab') + '-tab';
                    document.getElementById(tabId).classList.remove('hidden');
                });
            });
        });
    </script>
</body>
</html>