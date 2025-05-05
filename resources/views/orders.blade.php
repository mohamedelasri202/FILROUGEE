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
        /* Modal styles */
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
            max-width: 600px;
            animation: modalFadeIn 0.3s;
            max-height: 90vh;
            overflow-y: auto;
        }
        @keyframes modalFadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        /* Star rating styles */
        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            font-size: 1.5rem;
            padding: 0 0.1rem;
            cursor: pointer;
        }
        .star-rating input:checked ~ label {
            color: #ffb700;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffb700;
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
            <span>Review submitted successfully!</span>
        </div>
    </div>

    <!-- Header -->
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
                @foreach ($myorders as $orderId => $items)
    <div class="order-card bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
            <div>
                <p class="text-sm font-medium text-gray-900">Order #ORD-{{ $orderId }}</p>
                <p class="text-xs text-gray-500">
                    Placed on {{ date('F j, Y', strtotime($items->first()->created_at)) }}
                </p>
                
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
                        @foreach ($items as $item)
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="h-full w-full object-cover">
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $item->title }}</p>
                                    <p class="text-xs text-gray-500">Qty: {{ $item->quantity }} × ${{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4 md:mt-0 md:ml-6">
                    <p class="text-sm font-medium text-gray-900">Total: ${{ number_format($items->first()->order_total, 2) }}</p>
               
                </div>
            </div>
        </div>
    </div>
@endforeach
                    </div>
                </div>

                <!-- Services Tab Content -->
                <div id="services-tab" class="tab-content hidden">
                    <div class="space-y-6">
                        <!-- Service 1 -->
                        @foreach ($myservices as $orderId => $services)
                        @foreach ($services as $service)
                            <div class="order-card bg-white border border-gray-200 rounded-lg overflow-hidden mb-4">
                                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Booking #SRV-{{ $orderId }}</p>
                                        <p class="text-xs text-gray-500">
                                            Booked on {{ \Carbon\Carbon::parse($service->created_at)->format('F d, Y') }}
                                        </p>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="px-3 py-1 text-xs rounded-full
                                            {{ $service->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($service->status) }}
                                        </span>
                                    </div>
                                </div>
                
                                <div class="p-6">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded-md overflow-hidden">
                                                    <img src="{{ asset( $service->image) }}" alt="{{ $service->title }}" class="h-full w-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ $service->title }}</p>
                                                    <p class="text-xs text-gray-500">Provider: {{ $service->provider_name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 md:mt-0 md:ml-6 text-right">
                                            <p class="text-sm font-medium text-gray-900">Price: ${{ number_format($service->price, 2) }}</p>
                                            <div class="mt-2 flex space-x-2">
                                                <a href="{{ route('booking',$service->id) }}" class="text-xs text-primary hover:text-gray-700 font-medium">View Details</a>
                                                
                                                <!-- Add review button for completed services -->
                                                @if($service->status === 'completed')
                                                    <button onclick="openReviewModal('SRV-{{ $orderId }}', '{{ $service->title }}', {{ $service->id }})" class="text-xs text-blue-600 hover:text-blue-800 font-medium">
                                                        Leave a Review
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Display existing review if there is one -->
                                    @if(isset($service->review))
                                    <div class="mt-4 pt-4 border-t border-gray-100">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <span class="text-xs font-medium text-gray-600">{{ substr(auth()->user()->name ?? 'User', 0, 2) }}</span>
                                                </div>
                                            </div>
                                            {{-- <div class="ml-3 flex-1">
                                                <div class="flex items-center">
                                                    <div class="flex text-yellow-400 text-sm">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $service->review->rating)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <span class="ml-2 text-xs text-gray-500">Posted on {{ \Carbon\Carbon::parse($service->review->created_at)->format('M d, Y') }}</span>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ $service->review->comment }}
                                                </p>
                                            </div> --}}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Review Modal -->
    <div id="review-modal" class="modal">
        <div class="modal-content">
            <div class="p-6 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-medium">Leave a Review</h2>
                </div>
                <button id="close-review-modal" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="review-form" action="{{ route('review') }}" method="POST" class="p-6">
                @csrf
                @foreach ($myservices as $orderId => $services)
                @foreach ($services as $service)
                 <input type="hidden" id="service-id" name="service_id" value="{{ $service->id }}">
          
                 @endforeach
                 @endforeach
              
                 <button type="submit">add a revi</button>
                <!-- Service Name -->
                <div class="mb-6">
                    <h3 id="service-name" class="text-lg font-medium text-gray-900 mb-2"></h3>
                    <p class="text-sm text-gray-600">Share your experience with this service</p>
                </div>
                
                <!-- Rating -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <div class="star-rating">
                        <input type="radio" id="star5" name="stars" value="5" required />
                        <label for="star5" title="5 stars">★</label>
                        <input type="radio" id="star4" name="stars" value="4" />
                        <label for="star4" title="4 stars">★</label>
                        <input type="radio" id="star3" name="stars" value="3" />
                        <label for="star3" title="3 stars">★</label>
                        <input type="radio" id="star2" name="stars" value="2" />
                        <label for="star2" title="2 stars">★</label>
                        <input type="radio" id="star1" name="stars" value="1" />
                        <label for="star1" title="1 star">★</label>
                    </div>
                </div>
                
                <!-- Review Text -->
                <div class="mb-6">
                    <label for="review-text" class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                    <textarea id="review-text" name="content" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Share your experience with this service..." required></textarea>
                </div>
                
                <!-- Submit Button -->
       
              
          
            </form>
        </div>
    </div>

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

            // Review modal functionality
            const reviewModal = document.getElementById('review-modal');
            const closeReviewModal = document.getElementById('close-review-modal');
            
            // Close modal when clicking the close button
            closeReviewModal.addEventListener('click', function() {
                reviewModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            });
            
            // Close modal when clicking outside of it
            window.addEventListener('click', function(event) {
                if (event.target == reviewModal) {
                    reviewModal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            });

           
        });

        // Function to open the review modal
        function openReviewModal(bookingId, serviceName, serviceId) {
            const modal = document.getElementById('review-modal');
            const serviceNameElement = document.getElementById('service-name');
            const serviceIdInput = document.getElementById('service-id');
            // const bookingIdInput = document.getElementById('booking-id');
            
            // Set the service details in the modal
            serviceNameElement.textContent = serviceName;
            serviceIdInput.value = serviceId;
            // bookingIdInput.value = bookingId;
            
            // Show the modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
    </script>
</body>
</html>
