<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Supermark - Checkout</title>
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
    .payment-method-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .payment-method-card.selected {
        border-color: #6a7280;
        background-color: #f3f4f6;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .payment-method-card.selected::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background-color: #6a7280;
    }
    .payment-method-card:hover:not(.selected) {
        border-color: #d1d5db;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .payment-method-card input[type="radio"] {
        position: absolute;
        opacity: 0;
    }
    .form-input {
        transition: all 0.2s ease;
        border: 1px solid #e5e7eb;
    }
    .form-input:focus {
        border-color: #6a7280;
        box-shadow: 0 0 0 3px rgba(106, 114, 128, 0.1);
    }
    .checkout-card {
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        border: none;
        transition: all 0.3s ease;
    }
    .checkout-card:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .progress-step {
        position: relative;
    }
    .progress-step::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 100%;
        transform: translateY(-50%);
        height: 2px;
        width: 100%;
        background-color: currentColor;
    }
    .progress-step:last-child::after {
        display: none;
    }
    .btn-primary {
        background-color: #6a7280;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #4b5563;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .order-item {
        transition: all 0.2s ease;
    }
    .order-item:hover {
        background-color: #f9fafb;
    }
    .checkout-header {
        border-bottom: 1px solid #f3f4f6;
    }
    .checkout-section {
        border-bottom: 1px solid #f3f4f6;
    }
    .checkout-section:last-child {
        border-bottom: none;
    }
</style>
</head>
<body class="bg-gray-50 text-gray-800">
 
   
{{-- 
    @error('total')
    <div class="text-red-500 text-sm">{{ $message }}</div>
@enderror --}}

    @if (session('success'))
    <div id="successToast"
        class="fixed z-50 top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg hidden opacity-0 transition-opacity duration-300">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif


{{-- @error('status')
    {{ $message }}
@enderror --}}
<div class="container mx-auto p-4">
    {{-- Your main content --}}
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

        <div class="flex items-center space-x-6">
            <a href="#" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </a>
            <div class="relative group">
                <button class="flex items-center space-x-2 focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                        <span class="text-sm font-medium text-gray-600">JD</span>
                    </div>
                    <span class="text-sm text-gray-700">John Doe</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded shadow-lg py-1 z-10 hidden group-hover:block">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Settings</a>
                    <div class="border-t border-gray-100"></div>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Sign out</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Checkout Progress -->
<div class="bg-white border-b border-gray-100">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-center">
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="ml-2 text-sm font-medium text-gray-700">Cart</span>
            </div>
            <div class="w-16 h-0.5 bg-primary mx-2"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="ml-2 text-sm font-medium text-gray-700">Order Summary</span>
            </div>
            <div class="w-16 h-0.5 bg-primary mx-2"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center">
                    <span class="text-sm font-medium">3</span>
                </div>
                <span class="ml-2 text-sm font-medium text-gray-700">Payment</span>
            </div>
            <div class="w-16 h-0.5 bg-gray-200 mx-2"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                    <span class="text-sm font-medium text-gray-600">4</span>
                </div>
                <span class="ml-2 text-sm font-medium text-gray-500">Confirmation</span>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="py-12">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-light mb-10 text-center">Complete Your Purchase</h1>
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column - Customer Details & Payment -->
            <div class="w-full lg:w-2/3">
                <div class="p-8">
                    
                    <form action="{{ route('CHECK') }}" method="POST" class="space-y-8 bg-white p-8 rounded-lg shadow-lg border border-gray-100">
                        @csrf
                    
                        <!-- Hidden servicecart IDs -->
                        @foreach ($services as $service)
                            <input type="hidden" name="servicecart_id[]" value="{{ $service->servicecart_id }}">
                        @endforeach
                        @error('service_id')
                        {{ $message }}
                            
                        @enderror
                       
                
                        <!-- Hidden shoppingcart IDs (products) -->
                        @foreach ($products as $product)
                            <input type="hidden" name="shoopingcart_id[]" value="{{ $product->shooping_id }}">
                            <input type="hidden" value="{{ $product->quantity }}" name="quantity">
                        @endforeach
                        @error('shoopingcart_id')
                        {{ $message }}
                            
                        @enderror
                    
                        <!-- Form Header -->
                        <div class="border-b border-gray-200 pb-4 mb-6">
                            <h2 class="text-2xl font-light text-gray-700">Complete Your Order</h2>
                            <p class="text-sm text-gray-500 mt-1">Please enter your details below</p>
                        </div>
                    

                        <!-- User info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="transition-all duration-200 focus-within:ring-2 focus-within:ring-primary/20 rounded-md">
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                                <input type="text" name="name" id="first_name" required 
                                    class="w-full border border-gray-200 rounded-md px-4 py-3 focus:outline-none focus:border-primary transition-colors">
                            </div>
                            @error('first_name')
                            {{ $message }}
                                
                            @enderror
                            <div class="transition-all duration-200 focus-within:ring-2 focus-within:ring-primary/20 rounded-md">
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                                <input type="text" name="last_name" id="last_name" required 
                                    class="w-full border border-gray-200 rounded-md px-4 py-3 focus:outline-none focus:border-primary transition-colors">
                            </div>
                            @error('last_name')
                            {{ $message }}
                                
                            @enderror
                        </div>
                        <input type="hidden" name="status" value="confirmed" >
                        <input type="hidden" name="total" value="{{ $total }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="transition-all duration-200 focus-within:ring-2 focus-within:ring-primary/20 rounded-md">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" name="email" id="email" required 
                                    class="w-full border border-gray-200 rounded-md px-4 py-3 focus:outline-none focus:border-primary transition-colors">
                            </div>
                            @error('total')
                            {{ $message }}
                                
                            @enderror
                            @error('status')
                            {{ $message }}
                                
                            @enderror
                            <div class="transition-all duration-200 focus-within:ring-2 focus-within:ring-primary/20 rounded-md">
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type *</label>
                                <div class="relative">
                                    <select name="type" id="type" required class="w-full appearance-none border border-gray-200 rounded-md px-4 py-3 focus:outline-none focus:border-primary transition-colors pr-10">
                                        <option value="">Select type</option>
                                        <option value="service">Service</option>
                                        <option value="product">Product</option>
                                    </select>
                                    @error('type')
                            {{ $message }}
                                
                            @enderror
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="transition-all duration-200 focus-within:ring-2 focus-within:ring-primary/20 rounded-md">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </span>
                                <input type="text" name="phone" id="phone" required 
                                    class="w-full border border-gray-200 rounded-md pl-12 pr-4 py-3 focus:outline-none focus:border-primary transition-colors">
                            </div>
                            @error('phone')
                            {{ $message }}
                                
                            @enderror
                        </div>
                    
                        <!-- Address Section -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100 space-y-6 mt-8">
                            <h3 class="text-lg font-medium text-gray-700">Shipping Information</h3>
                            
                            <div class="transition-all duration-200 focus-within:ring-2 focus-within:ring-primary/20 rounded-md">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address *</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </span>
                                    <input type="text" name="address" id="address" required 
                                        class="w-full border border-gray-200 rounded-md pl-12 pr-4 py-3 focus:outline-none focus:border-primary transition-colors">
                                </div>
                                @error('address')
                            {{ $message }}
                                
                            @enderror
                            </div>
                        
                            <div class="transition-all duration-200 focus-within:ring-2 focus-within:ring-primary/20 rounded-md">
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                                <input type="text" name="city" id="city" required 
                                    class="w-full border border-gray-200 rounded-md px-4 py-3 focus:outline-none focus:border-primary transition-colors">
                            </div>
                            @error('city')
                            {{ $message }}
                                
                            @enderror
                        </div>
                    
                        <!-- Payment Method -->
                        <div class="mt-8">
                            <label class="block text-lg font-medium text-gray-700 mb-4">Payment Method *</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label class="relative border border-gray-200 rounded-lg p-4 cursor-pointer transition-all hover:border-primary hover:shadow-md group">
                                    <input type="radio" name="payment_method" value="credit-card" checked class="absolute opacity-0 peer">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mr-3 group-hover:bg-primary/20 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium group-hover:text-primary transition-colors">Credit Card</span>
                                    </div>
                                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border border-primary hidden peer-checked:flex items-center justify-center">
                                        <div class="w-2 h-2 rounded-full bg-primary"></div>
                                    </div>
                                </label>
                                
                                <label class="relative border border-gray-200 rounded-lg p-4 cursor-pointer transition-all hover:border-primary hover:shadow-md group">
                                    <input type="radio" name="payment_method" value="paypal" class="absolute opacity-0 peer">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mr-3 group-hover:bg-primary/20 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium group-hover:text-primary transition-colors">PayPal</span>
                                    </div>
                                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border border-primary hidden peer-checked:flex items-center justify-center">
                                        <div class="w-2 h-2 rounded-full bg-primary"></div>
                                    </div>
                                </label>
                                
                                <label class="relative border border-gray-200 rounded-lg p-4 cursor-pointer transition-all hover:border-primary hover:shadow-md group">
                                    <input type="radio" name="payment_method" value="cash" class="absolute opacity-0 peer">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mr-3 group-hover:bg-primary/20 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium group-hover:text-primary transition-colors">Cash on Delivery</span>
                                    </div>
                                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border border-primary hidden peer-checked:flex items-center justify-center">
                                        <div class="w-2 h-2 rounded-full bg-primary"></div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @error('payment_method')
                            {{ $message }}
                                
                            @enderror
                    
                        <div class="pt-6 border-t border-gray-100 mt-8">
                            <button type="submit" class="w-full md:w-auto px-8 py-3 bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-300 flex items-center justify-center">
                                <span>Submit Order</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

    
            
            <!-- Right Column - Order Summary -->
            <div class="w-full lg:w-1/3">
                <div class="checkout-card sticky top-6">
                    <div class="p-6 checkout-header bg-gray-50">
                        <h2 class="text-lg font-medium">Order Summary</h2>
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-light mb-4 pb-2 border-b border-gray-100">Products ({{ $product_count }})</h2>
                        <!-- Order Items -->
                        <div class="space-y-4 mb-6">
                            @foreach ($products as $product )
                                
                          {{-- @dd($products) --}}
                            <!-- Item 1 -->
                            <div class="flex items-center p-2 rounded-lg order-item">
                                <div class="h-16 w-16 bg-gray-100 rounded-lg flex-shrink-0 mr-4 overflow-hidden">
                                    <img src="{{ asset($product->image) }}" alt="Organic Apples" class="h-full w-full object-cover">
                                </div>
                               
                                <div class="flex-1">
                                    <h3 class="text-sm font-medium">{{$product->title}}</h3>
                                    <p class="text-xs text-gray-500"> {{ $product->quantity }}b @ ${{$product->price}}/lb</p>
                                </div>
                                <div class="text-sm font-medium">$9.98</div>
                            </div>
                            @endforeach
                            <div>
                  
                                <h2 class="text-xl font-light mb-4 pb-2 border-b border-gray-100">Services ({{ $service_count }})</h2>
                                
                                <!-- Service Item 1 -->
                                @if($services->isEmpty())
                                <p>you haven't added any services </p>
                                @else
                                @foreach ($services as $service )
                                    
                                
                                <div class="flex flex-col sm:flex-row items-start sm:items-center py-4 border-b border-gray-100">
                                    <div class="w-full sm:w-20 h-20 mb-4 sm:mb-0 sm:mr-4">
                                        <img src="{{ asset($service->image) }}" alt="Home Cleaning" class="w-full h-full object-cover rounded">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-medium text-gray-800">{{$service->title}}</h3>
                                        <p class="text-sm text-gray-500">{{$service->description}}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ $service->booking_date }} • {{ $service->booking_time }} PM</p>
                                    </div>
                                    <div class="text-right mt-4 sm:mt-0">
                                        <p class="font-medium text-gray-800">${{$service->price}}</p>
                                        <p class="text-xs text-gray-500">Standard package</p>
                                    </div>
                                   
                                 
                                    
                                </div>
                                @endforeach
                                @endif
                            </div>
                         
                        </div>
                        
                        
                        <!-- Order Totals -->
                        <div class="space-y-3 mb-6 bg-gray-50 p-4 rounded-lg">
                            <div class="space-y-3 mb-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Products Subtotal</span>
                                    <span>${{$totalproduct}}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Services Subtotal</span>
                                    <span>${{ $totalservice}}</span>
                                </div>
                                <div class="flex justify-between">
                                   @if ($product_count > 0)
                                   <span class="text-gray-500">Shipping</span>
                                   <span>$5.00</span>
                                   @endif
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Tax</span>
                                    <span>$1.95</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">service fees</span>
                                    <span>$5</span>
                                </div>
                            </div>
                            
                            <div class="border-t border-gray-100 pt-4 mb-6">
                                <div class="flex justify-between font-medium">
                                    <span>Total</span>
                                    <span>${{$total}}</span>
                                </div>
                            </div>
                        </div>
                        
                     
                        
                        <!-- Secure Checkout -->
                        <div class="mt-4 flex items-center justify-center text-xs text-gray-500 bg-gray-50 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 0 0 2-2v-12a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" />
                            </svg>
                            <span>Secure Checkout - Your data is protected</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-white py-6 border-t border-gray-100">
    <div class="container mx-auto px-6">
        <p class="text-center text-xs text-gray-400">© 2025 Supermark. All rights reserved.</p>
    </div>
</footer>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const toast = document.getElementById('successToast');

        if (toast) {
            toast.classList.remove('hidden');
            toast.classList.remove('opacity-0');
            toast.classList.add('opacity-100', 'transition-opacity');

            setTimeout(function () {
                toast.classList.remove('opacity-100');
                toast.classList.add('opacity-0');

                setTimeout(function () {
                    toast.classList.add('hidden');
                }, 300); // Matches your transition duration
            }, 5000); // Show toast for 5 seconds
        }
    });
</script>


</body>
</html>
