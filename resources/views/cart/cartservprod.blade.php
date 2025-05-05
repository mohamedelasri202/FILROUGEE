

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Supermark - Shopping Cart</title>
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
    }
    @keyframes modalFadeIn {
        from {opacity: 0; transform: translateY(-20px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>
</head>
<body class="bg-white text-gray-800">

    
    @if (session('success'))
    <div id="successToast" class="fixed z-[9999] top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg flex items-center space-x-2 hidden opacity-0 transition-opacity duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
    @endif
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
            <a href="" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-primary border-b-2 border-transparent hover:border-primary transition duration-150">
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




<!-- Main Content -->
<main class="py-8">
    <div class="container mx-auto px-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-light mb-2">Shopping Cart</h1>
            <p class="text-gray-500">Review your items before checkout</p>
        </div>

        <!-- Cart Content -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column - Cart Items -->
            <div class="flex-1">
                <!-- Products Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-light mb-4 pb-2 border-b border-gray-100">Products ({{ $product_count }})</h2>
                    
                  @if($products->isEmpty())
                  <div><p>theres no products available now </p></div>
                  @else
                  @foreach ($products as $product )
                      
                
                    <div class="flex flex-col sm:flex-row items-start sm:items-center py-4 border-b border-gray-100">
                        <div class="w-full sm:w-20 h-20 mb-4 sm:mb-0 sm:mr-4">
                            <img src="{{ asset($product->image) }}" alt="Organic Apples" class="w-full h-full object-cover rounded">
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-800">O{{$product->title}}</h3>
                            <p class="text-sm text-gray-500">{{$product->description }}</p>
                        </div>
                       
                        <div class="flex items-center mt-4 sm:mt-0">
                            <div class="flex items-center border border-gray-200 rounded mr-4">
                                <form action="{{ route('updat_quantity',$product->shooping_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')                       
                                    <button type="submit" name="action" value="down" class="px-3 py-1 text-gray-500 hover:text-primary decrease-quantity" >-</button>
                                <input name="quantity" type="number" value="{{ $product->quantity }}" min="1" class="w-12 text-center border-x border-gray-200 py-1 focus:outline-none">
                                <button  type="submit" name="action" value="up" class="px-3 py-1 text-gray-500 hover:text-primary decrease-quantity">+</button>
                                </form>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-800">${{$product->price}}</p>
                                <p class="text-xs text-gray-500">$4.99 / lb</p>
                            </div>
                        </div>
                     
                        <form action="{{ route('r_product_cart', $product->shooping_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 text-red-500 hover:text-red-500">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg> 
                                
                            </button>
                        </form>
                        
                    </div>
                    
                    @endforeach
                    @endif
                    
                    <!-- Products Subtotal -->
                    <div class="flex justify-end mt-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Products Subtotal:</p>
                            <p class="font-medium text-gray-800">${{$totalproduct}}</p>
                        </div>
                    </div>
                </div>
              
                <!-- Services Section -->
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
                            <p class="text-xs text-gray-500 mt-1">{{ $service->booking_date }} • {{$service->booking_time}} PM</p>
                        </div>
                        <div class="text-right mt-4 sm:mt-0">
                            <p class="font-medium text-gray-800">${{$service->price}}</p>
                            <p class="text-xs text-gray-500">Standard package</p>
                        </div>
                       
                        <form action="{{ route('deletecart', $service->servicecart_id) }}" method="POST">
                            @csrf
                            @method('DELETE')                              
                            <button type="submit" class="ml-4 text-red-500 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                           d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                   </svg> 
                                   
                               </button>
                        </form>
                        
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            
            <!-- Right Column - Order Summary -->
            <div class="w-full lg:w-80">
                <div class="bg-white border border-gray-100 rounded p-6 sticky top-6">
                    <h2 class="text-lg font-medium mb-4">Order Summary</h2>
                    
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
                    </div>
                    
                    <div class="border-t border-gray-100 pt-4 mb-6">
                        <div class="flex justify-between font-medium">
                            <span>Total</span>
                            <span>${{$total}}</span>
                        </div>
                    </div>
                 
                    <button onclick="window.location.href='{{ route('checkout') }}'" class="w-full py-3 bg-primary text-white hover:bg-gray-700 transition rounded">
                        Proceed to Checkout
                    </button>
            
                    
                    <div class="mt-4">
                        <div class="flex items-center mb-2">
                            <input type="checkbox" id="save-info" class="mr-2">
                            <label for="save-info" class="text-sm text-gray-700">Save my information for faster checkout</label>
                        </div>
                        
                        <div class="flex justify-center mt-4">
                            <img src="{{ asset('images/payment method.jpg') }}" alt="Payment Methods" class="h-8">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Continue Shopping -->
        <div class="mt-8 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center text-primary hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Continue Shopping
            </a>
            
            <button class="text-gray-500 hover:text-red-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Clear Cart
            </button>
        </div>
        
        <!-- You May Also Like -->
        <div class="mt-16">
            <h2 class="text-xl font-light mb-6">You May Also Like</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Suggestion 1 -->
                @foreach ($tow_services as $tow_service)
                    
               
                <div class="bg-white border border-gray-100 rounded overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset($tow_service->image) }}" alt="Window Cleaning" class="w-full h-40 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-light text-base mb-1">{{$tow_service->title}}</h3>
                        <p class="text-primary font-medium text-sm">Starting at ${{$tow_service->price}}</p>
                    
                          
                           
                        <button  class="mt-2 w-full py-1.5 bg-primary text-white text-xs hover:bg-gray-700 transition rounded">
                          <a href="{{ route('booking',$tow_service->id)  }}">Book Now</a>  
                        </button>
                    </div>
                </div> 
                @endforeach
             
                <!-- Suggestion 3 -->
                @foreach ($tow_products as $tow_product )
                    
               
                <div class="bg-white border border-gray-100 rounded overflow-hidden">
                    <div class="relative">
                        <img src="{{ $tow_product->image }}" alt="Organic Yogurt" class="w-full h-40 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-light text-base mb-1">{{$tow_product->title}}</h3>
                        <p class="text-primary font-medium text-sm">{{$tow_product->price}}</p>
                        <form action="{{ route('addshoopingcart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="product">
                            <input type="hidden" name="product_id"  value="{{ $tow_product->id }}">
                            <input type="hidden" name="quantity" value="1" min="1">
                        <button  type="submit" class="mt-2 w-full py-1.5 bg-primary text-white text-xs hover:bg-gray-700 transition rounded">
                            Add to Cart
                        </button>
                        </form>
                    </div>
                </div>

                @endforeach
                
               
                </div>
                <!-- Suggestion 4 -->
              
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-white py-6 border-t border-gray-100 mt-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-sm font-medium mb-4">About Supermark</h3>
                <p class="text-xs text-gray-500 mb-4">Supermark connects you with quality products and professional services to make your life easier.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-primary">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-4">Shop</h3>
                <ul class="text-xs text-gray-500 space-y-2">
                    <li><a href="#" class="hover:text-primary">All Products</a></li>
                    <li><a href="#" class="hover:text-primary">Groceries</a></li>
                    <li><a href="#" class="hover:text-primary">Household</a></li>
                    <li><a href="#" class="hover:text-primary">Electronics</a></li>
                    <li><a href="#" class="hover:text-primary">Health & Beauty</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-4">Services</h3>
                <ul class="text-xs text-gray-500 space-y-2">
                    <li><a href="#" class="hover:text-primary">Home Cleaning</a></li>
                    <li><a href="#" class="hover:text-primary">Repairs & Maintenance</a></li>
                    <li><a href="#" class="hover:text-primary">Professional Services</a></li>
                    <li><a href="#" class="hover:text-primary">Health & Wellness</a></li>
                    <li><a href="#" class="hover:text-primary">Beauty & Personal Care</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-4">Support</h3>
                <ul class="text-xs text-gray-500 space-y-2">
                    <li><a href="#" class="hover:text-primary">Help Center</a></li>
                    <li><a href="#" class="hover:text-primary">Contact Us</a></li>
                    <li><a href="#" class="hover:text-primary">Shipping & Delivery</a></li>
                    <li><a href="#" class="hover:text-primary">Returns & Refunds</a></li>
                    <li><a href="#" class="hover:text-primary">FAQs</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-100 mt-8 pt-6 text-center">
            <p class="text-xs text-gray-400">© 2025 Supermark. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
   function showToast(toastElement) {
        if (!toastElement) return;

        // Show toast
        toastElement.classList.remove('hidden', 'opacity-0');
        toastElement.classList.add('opacity-100');

        // Auto-hide after 5 seconds
        setTimeout(() => {
            toastElement.classList.remove('opacity-100');
            toastElement.classList.add('opacity-0');
            
            setTimeout(() => {
                toastElement.classList.add('hidden');
            }, 300);
        }, 5000);
    }

    // Initialize toasts on page load
    document.addEventListener('DOMContentLoaded', function() {
        showToast(document.getElementById('successToast'));
        showToast(document.getElementById('errorToast'));
    });
</script>
</body>
</html>
