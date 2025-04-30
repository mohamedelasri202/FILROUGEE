
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermark - Vendor Dashboard</title>
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
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .modal {
            transition: opacity 0.25s ease;
        }
        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    @dd($statistics );
   {{-- @dd($orders_count) --}}
{{-- @dd($orders) --}}
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
                <span class="ml-4 text-sm text-gray-500">Vendor Dashboard</span>
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
                            @php
                            $user = Auth::user();
                            $initials = strtoupper(substr($user->name, 0, 1) . substr($user->lastname, 0, 1));
                             @endphp
                            <span class="text-sm font-medium text-gray-600">{{$initials}}</span>
                        </div>
                        <span class="text-sm text-gray-700"> {{ auth()->user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded shadow-lg py-1 z-10 hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Settings</a>
                        <div class="border-t border-gray-100"></div>
                        <form action="{{ route('logoutt') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent" method ="POST">
                            @csrf
                            <button type="submit">Sign out</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Tabs -->
    <div class="bg-white border-b border-gray-100">
        <div class="container mx-auto px-6">
            <div class="flex overflow-x-auto">
                <button class="tab-button px-4 py-4 text-sm font-medium text-primary border-b-2 border-primary" data-tab="products">Products</button>
                <button class="tab-button px-4 py-4 text-sm font-medium text-gray-500 hover:text-primary" data-tab="orders">Orders</button>
                <button class="tab-button px-4 py-4 text-sm font-medium text-gray-500 hover:text-primary" data-tab="customers">Customers</button>
                <button class="tab-button px-4 py-4 text-sm font-medium text-gray-500 hover:text-primary" data-tab="analytics">Analytics</button>
                <button class="tab-button px-4 py-4 text-sm font-medium text-gray-500 hover:text-primary" data-tab="settings">Settings</button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="py-8">
        <div class="container mx-auto px-6">
            <!-- Products Tab Content -->
            <div id="products" class="tab-content active">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-light">Products</h1>
                    <button id="add-product-button" class="px-4 py-2 bg-primary text-white text-sm hover:bg-gray-700 transition flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Product
                    </button>
                </div>

                <!-- Filters -->
                <div class="bg-white p-4 rounded border border-gray-100 mb-6">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex-1 min-w-[200px]">
                            <input type="text" placeholder="Search products..." class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                        </div>
                        <div class="flex items-center space-x-4">
                            <select class="border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                                <option>All Categories</option>
                                <option>Fresh Groceries</option>
                                <option>Household Essentials</option>
                                <option>Electronics</option>
                                <option>Health & Beauty</option>
                            </select>
                            <select class="border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                                <option>All Status</option>
                                <option>In Stock</option>
                                <option>Low Stock</option>
                                <option>Out of Stock</option>
                            </select>
                            <button class="text-primary hover:text-gray-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Table -->
            <!-- Product Table -->
<div class="bg-white rounded border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="bg-accent">
                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @if($products->isEmpty())
            <tr>
                <td colspan="6" class="py-3 px-4 text-center text-sm text-gray-500">No products found.</td>
            </tr>
            @else
            @foreach ($products as $product)
            <tr>
                <td class="py-3 px-4">
                    <div class="flex items-center">
                        <div class="h-10 w-10 flex-shrink-0 mr-3">
                            <img src="{{ asset($product->image) }}" alt="{{$product->title}}" class="h-10 w-10 object-cover">
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900">{{$product->title}}</div>
                        </div>
                    </div>
                </td>
                <td class="py-3 px-4 text-sm text-gray-500">{{$product->category}}</td>
                <td class="py-3 px-4 text-sm text-gray-500">{{$product->price}}</td>
                <td class="py-3 px-4 text-sm text-gray-500">120</td>
                <td class="py-3 px-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-green-100 text-green-800">In Stock</span>
                </td>
                <td class="py-3 px-4 text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                        <!-- Edit Button with data attributes -->
                        <button type="button"
                            class="text-primary hover:text-gray-700 edit-button"
                            data-id="{{ $product->id }}"
                            data-title="{{ $product->title }}"
                            data-price="{{ $product->price }}"
                            data-category="{{ $product->category }}"
                            data-description="{{ $product->description }}"
                            data-action="{{ route('updateproduct', $product->id) }}">
                            Edit
                        </button>

                        <form action="{{ route('deleteproduct', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-red-600">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="edit-modal" class="fixed inset-0 bg-black bg-opacity-30 flex justify-center items-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
        <form id="edit-form" method="POST" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="product_id" id="modal-product-id">

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                <input type="text" name="title" id="modal-product-title" class="w-full border py-2 px-3">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                <input type="number" name="price" id="modal-product-price" class="w-full border py-2 px-3">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select name="category" id="modal-product-category" class="w-full border py-2 px-3">
                    <option value="fresh-groceries">Fresh Groceries</option>
                    <option value="household-essentials">Household Essentials</option>
                    <option value="electronics">Electronics</option>
                    <option value="health-beauty">Health & Beauty</option>
                    <option value="beverages">Beverages</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="modal-product-description" class="w-full border py-2 px-3" rows="3"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="button" id="close-modal" class="mr-2 px-4 py-2 border text-gray-700">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white">Update Product</button>
            </div>
        </form>
    </div>
</div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-500">
                        Showing 1 to 5 of 24 products
                    </div>
                    <div class="flex space-x-1">
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <a href="#" class="px-3 py-1 border border-primary text-primary text-sm">1</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">2</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">3</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Orders Tab Content -->
            <div id="orders" class="tab-content">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-light">Orders</h1>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:text-primary hover:border-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export
                        </button>
                        <button class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:text-primary hover:border-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="bg-white rounded border border-gray-100 overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-accent">
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                            
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Order 1 -->
                            @foreach ($usersWithOrders as $usersWithOrder )
                                
                       
                              
                         
                            <tr>
                                <td class="py-3 px-4 text-sm text-gray-900">#ORD-2023.{{$usersWithOrder->id}}</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-gray-200 flex-shrink-0 mr-3 flex items-center justify-center">
                                            <span class="text-xs font-medium text-gray-600">JD</span>
                                        </div>
                                        <div class="text-sm text-gray-900">{{$usersWithOrder->name}} {{$usersWithOrder->lastname}}</div> 
                                     </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">{{$usersWithOrder->created_at}}</td>
                                <td class="py-3 px-4 text-sm text-gray-900">${{$usersWithOrder->total}}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-green-100 text-green-800">{{$usersWithOrder->status}}</span>
                                </td>
                                <td class="py-3 px-4 text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-primary hover:text-gray-700">View</button>
                                        <button class="text-gray-500 hover:text-gray-700">Invoice</button>
                                    </div>
                                </td>
                            </tr>
             @endforeach
                            
                           
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-500">
                        Showing 1 to 5 of 28 orders
                    </div>
                    <div class="flex space-x-1">
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <a href="#" class="px-3 py-1 border border-primary text-primary text-sm">1</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">2</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">3</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Customers Tab Content -->
            <div id="customers" class="tab-content">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-light">Customers</h1>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:text-primary hover:border-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export
                        </button>
                        <button class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:text-primary hover:border-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="bg-white p-4 rounded border border-gray-100 mb-6">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex-1 min-w-[200px]">
                            <input type="text" placeholder="Search customers..." class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                        </div>
                    </div>
                </div>

                <!-- Customers Table -->
                <div class="bg-white rounded border border-gray-100 overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-accent">
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Spent</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Order</th>
                                <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        
                            
                            <!-- Customer 2 -->
                            <tr>     
                          @foreach ($customers as $customer )
                           
                                    
                                
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-gray-200 flex-shrink-0 mr-3 flex items-center justify-center">
                                            <span class="text-xs font-medium text-gray-600">MS</span>
                                        </div>
                                        <div class="text-sm text-gray-900">{{$customer->name}} {{$customer->lastname}}</div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">{{$customer->email}}</td>
                                <td class="py-3 px-4 text-sm text-gray-500">{{$customer->orders_count}}</td>
   
                              <td class="py-3 px-4 text-sm text-gray-900">${{$customer->orders_sum_total}}</td>
                                <td class="py-3 px-4 text-sm text-gray-500">{{$customer->orders_max_created_at}}</td>
                                
                                
                                <td class="py-3 px-4 text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-primary hover:text-gray-700">View</button>
                                        <button class="text-gray-500 hover:text-gray-700">Email</button>
                                    </div>
                                </td>
                        @endforeach
                            </tr>
                            
                          
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-500">
                        Showing 1 to 5 of 42 customers
                    </div>
                    <div class="flex space-x-1">
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <a href="#" class="px-3 py-1 border border-primary text-primary text-sm">1</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">2</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">3</a>
                        <a href="#" class="px-3 py-1 border border-gray-200 text-gray-500 text-sm hover:border-primary hover:text-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Analytics Tab Content -->
            <div id="analytics" class="tab-content">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-light mb-2">Analytics</h1>
                    <p class="text-gray-500">View your store performance and customer insights</p>
                </div>

                <!-- Time Period Selector -->
                <div class="bg-white p-4 rounded border border-gray-100 mb-6">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center space-x-4">

                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:text-primary hover:border-primary transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Export Report
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 border border-gray-100 rounded">
                        <div class="flex items-center justify-between">

                                @foreach ($statistics as $statistic)
                                    
                             
                                <p class="text-sm text-gray-500"></p>
                                <p class="text-2xl font-light mt-1">$12,845</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <span class="inline-block">↑ 12.5%</span> vs previous period
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-primary bg-opacity-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 border border-gray-100 rounded">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Orders</p>
                                <p class="text-2xl font-light mt-1">142</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <span class="inline-block">↑ 8.2%</span> vs previous period
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-primary bg-opacity-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 border border-gray-100 rounded">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Customers</p>
                                <p class="text-2xl font-light mt-1">89</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <span class="inline-block">↑ 5.1%</span> vs previous period
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-primary bg-opacity-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 border border-gray-100 rounded">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Avg. Order Value</p>
                                <p class="text-2xl font-light mt-1">$90.46</p>
                                <p class="text-xs text-red-600 mt-1">
                                    <span class="inline-block">↓ 2.3%</span> vs previous period
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-primary bg-opacity-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Top Products -->
                <div class="bg-white rounded border border-gray-100 overflow-hidden mb-8">
                    <div class="p-4 border-b border-gray-100">
                        <h2 class="text-lg font-light">Top Selling Products</h2>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="bg-accent">
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Units Sold</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Revenue</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 mr-3">
                                            <img src="/placeholder.svg?height=40&width=40" alt="Premium Coffee" class="h-10 w-10 object-cover">
                                        </div>
                                        <div class="text-sm text-gray-900">Premium Coffee</div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">Beverages</td>
                                <td class="py-3 px-4 text-sm text-gray-500">245</td>
                                <td class="py-3 px-4 text-sm text-gray-900">$3,182.55</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 mr-3">
                                            <img src="/placeholder.svg?height=40&width=40" alt="Wireless Earbuds" class="h-10 w-10 object-cover">
                                        </div>
                                        <div class="text-sm text-gray-900">Wireless Earbuds</div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">Electronics</td>
                                <td class="py-3 px-4 text-sm text-gray-500">187</td>
                                <td class="py-3 px-4 text-sm text-gray-900">$11,219.13</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 mr-3">
                                            <img src="/placeholder.svg?height=40&width=40" alt="Organic Skincare Set" class="h-10 w-10 object-cover">
                                        </div>
                                        <div class="text-sm text-gray-900">Organic Skincare Set</div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">Health & Beauty</td>
                                <td class="py-3 px-4 text-sm text-gray-500">156</td>
                                <td class="py-3 px-4 text-sm text-gray-900">$5,459.44</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 mr-3">
                                            <img src="/placeholder.svg?height=40&width=40" alt="Eco-Friendly Detergent" class="h-10 w-10 object-cover">
                                        </div>
                                        <div class="text-sm text-gray-900">Eco-Friendly Detergent</div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">Household Essentials</td>
                                <td class="py-3 px-4 text-sm text-gray-500">132</td>
                                <td class="py-3 px-4 text-sm text-gray-900">$1,120.68</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 mr-3">
                                            <img src="/placeholder.svg?height=40&width=40" alt="Organic Apples" class="h-10 w-10 object-cover">
                                        </div>
                                        <div class="text-sm text-gray-900">Organic Apples</div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">Fresh Groceries</td>
                                <td class="py-3 px-4 text-sm text-gray-500">124</td>
                                <td class="py-3 px-4 text-sm text-gray-900">$618.76</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Customer Acquisition -->
                <div class="bg-white rounded border border-gray-100 overflow-hidden">
                    <div class="p-4 border-b border-gray-100">
                        <h2 class="text-lg font-light">Customer Acquisition</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <h3 class="text-sm font-medium text-gray-700 mb-4">Traffic Sources</h3>
                                <div class="space-y-4">
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">Direct</span>
                                            <span class="text-sm text-gray-700">45%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">Search</span>
                                            <span class="text-sm text-gray-700">30%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 30%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">Social</span>
                                            <span class="text-sm text-gray-700">15%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 15%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">Referral</span>
                                            <span class="text-sm text-gray-700">10%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 10%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-700 mb-4">Device Type</h3>
                                <div class="space-y-4">
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">Mobile</span>
                                            <span class="text-sm text-gray-700">65%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 65%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">Desktop</span>
                                            <span class="text-sm text-gray-700">30%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 30%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">Tablet</span>
                                            <span class="text-sm text-gray-700">5%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 5%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-700 mb-4">Customer Demographics</h3>
                                <div class="space-y-4">
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">18-24</span>
                                            <span class="text-sm text-gray-700">15%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 15%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">25-34</span>
                                            <span class="text-sm text-gray-700">40%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 40%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">35-44</span>
                                            <span class="text-sm text-gray-700">25%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 25%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm text-gray-500">45+</span>
                                            <span class="text-sm text-gray-700">20%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 20%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Tab Content -->
            <div id="settings" class="tab-content">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-light mb-2">Settings</h1>
                    <p class="text-gray-500">Manage your store settings and preferences</p>
                </div>

                <!-- Settings Navigation -->
                <div class="bg-white rounded border border-gray-100 overflow-hidden mb-8">
                    <div class="flex border-b border-gray-100">
                        <button class="px-6 py-3 text-sm font-medium text-primary border-b-2 border-primary">Store Profile</button>
                        <button class="px-6 py-3 text-sm font-medium text-gray-500 hover:text-primary">Payment Methods</button>
                        <button class="px-6 py-3 text-sm font-medium text-gray-500 hover:text-primary">Shipping</button>
                        <button class="px-6 py-3 text-sm font-medium text-gray-500 hover:text-primary">Tax</button>
                        <button class="px-6 py-3 text-sm font-medium text-gray-500 hover:text-primary">Notifications</button>
                    </div>

                    <!-- Store Profile Settings -->
                    <div class="p-6">
                        <form>
                            <!-- Store Information -->
                            <div class="mb-8">
                                <h2 class="text-lg font-light mb-4">Store Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="store-name" class="block text-sm font-medium text-gray-700 mb-2">Store Name</label>
                                        <input type="text" id="store-name" name="store-name" value="Supermark" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                    </div>
                                    <div>
                                        <label for="store-email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                        <input type="email" id="store-email" name="store-email" value="info@supermark.com" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                    </div>
                                    <div>
                                        <label for="store-phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                        <input type="tel" id="store-phone" name="store-phone" value="+1 (555) 123-4567" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                    </div>
                                    <div>
                                        <label for="store-currency" class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                                        <select id="store-currency" name="store-currency" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                            <option value="USD" selected>USD - US Dollar</option>
                                            <option value="EUR">EUR - Euro</option>
                                            <option value="GBP">GBP - British Pound</option>
                                            <option value="CAD">CAD - Canadian Dollar</option>
                                            <option value="AUD">AUD - Australian Dollar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Store Address -->
                            <div class="mb-8">
                                <h2 class="text-lg font-light mb-4">Store Address</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="md:col-span-2">
                                        <label for="store-address" class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                                        <input type="text" id="store-address" name="store-address" value="123 Market Street, Suite 10" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                    </div>
                                    <div>
                                        <label for="store-city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                        <input type="text" id="store-city" name="store-city" value="San Francisco" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                    </div>
                                    <div>
                                        <label for="store-state" class="block text-sm font-medium text-gray-700 mb-2">State/Province</label>
                                        <input type="text" id="store-state" name="store-state" value="CA" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                    </div>
                                    <div>
                                        <label for="store-zip" class="block text-sm font-medium text-gray-700 mb-2">ZIP/Postal Code</label>
                                        <input type="text" id="store-zip" name="store-zip" value="94103" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                    </div>
                                    <div>
                                        <label for="store-country" class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                                        <select id="store-country" name="store-country" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                            <option value="US" selected>United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="UK">United Kingdom</option>
                                            <option value="AU">Australia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Store Logo -->
                            <div class="mb-8">
                                <h2 class="text-lg font-light mb-4">Store Logo</h2>
                                <div class="flex items-center">
                                    <div class="h-16 w-16 flex-shrink-0 mr-4 bg-gray-100 flex items-center justify-center">
                                        <span class="text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div>
                                        <button type="button" class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:text-primary hover:border-primary transition duration-300">
                                            Change Logo
                                        </button>
                                        <p class="mt-1 text-xs text-gray-500">Recommended size: 512x512px</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-primary text-white hover:bg-gray-700 transition duration-300">
                                    Save Changes
                                </button>
                            </div>
                        </form>
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

    <!-- Add Product Modal -->
    <div id="add-product-modal" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-50">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto max-h-[90vh]">
            <!-- Modal Header -->
            <div class="modal-header flex justify-between items-center p-4 border-b border-gray-100">
                <h3 class="text-lg font-light">Add New Product</h3>
                <button class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-gray-500 hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Content -->
            <div class="modal-content p-4">
        <form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data">  
            @csrf                
                    <!-- Product Image Upload -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                        <div class="border-2 border-dashed border-gray-200 rounded-md p-4 flex flex-col items-center justify-center">
                            <div class="mb-3 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-1 text-xs text-gray-500">Click to browse</p>
                            </div>
                            <input type="file" id="modal-product-image" class="hidden" name="image" accept="image/*">
                            <button type="button" onclick="document.getElementById('modal-product-image').click()" class="px-3 py-1 border border-gray-200 text-gray-700 text-xs hover:text-primary hover:border-primary transition duration-300">
                                Select Image
                            </button>
                        </div>
                    </div>

                    <!-- Product Name -->
                    <div class="mb-4">
                        <label for="modal-product-name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                        <input type="text" id="modal-product-name" name="title" placeholder="Enter product name" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <!-- Price -->
                        <div>
                            <label for="modal-product-price" class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                            <input type="number" id="modal-product-price" name="price" placeholder="0.00" step="0.01" min="0" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                        </div>

                        <!-- Quantity -->
                        {{-- <div>
                            <label for="modal-product-quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                            <input type="number" id="modal-product-quantity" name="product-quantity" placeholder="0" min="0" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                        </div> --}}
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="modal-product-category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="modal-product-category" name="category" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                            <option value="">Select a category</option>
                            <option value="fresh-groceries">Fresh Groceries</option>
                            <option value="household-essentials">Household Essentials</option>
                            <option value="electronics">Electronics</option>
                            <option value="health-beauty">Health & Beauty</option>
                            <option value="beverages">Beverages</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="modal-product-description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="modal-product-description" name="description" rows="3" placeholder="Enter product description" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary bg-transparent"></textarea>
                    </div>
                    <div class="modal-footer flex justify-end p-4 border-t border-gray-100">
                        <button class="modal-close px-4 py-2 border border-gray-200 text-gray-700 hover:text-primary hover:border-primary transition mr-2">
                            Cancel
                        </button>
                        <button type="submit " id="save-product-button" class="px-4 py-2 bg-primary text-white hover:bg-gray-700 transition">
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
           
        </div>
        <div class="modal-content p-4">
           
        </div>
    </div>
  

    <script>
    // Tab switching functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => {
                btn.classList.remove('text-primary', 'border-b-2', 'border-primary');
                btn.classList.add('text-gray-500');
            });
            tabContents.forEach(content => {
                content.classList.remove('active');
            });
            
            // Add active class to clicked button and corresponding content
            button.classList.add('text-primary', 'border-b-2', 'border-primary');
            button.classList.remove('text-gray-500');
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });

    // Add Product Modal functionality
    const addProductModal = document.getElementById('add-product-modal');
    const openModalButton = document.getElementById('add-product-button');
    const closeModalButtons = document.querySelectorAll('.modal-close');

    openModalButton.addEventListener('click', () => {
        addProductModal.classList.remove('opacity-0', 'pointer-events-none');
        document.body.classList.add('modal-active');
    });

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            addProductModal.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('modal-active');
        });
    });

    // Edit Product Modal functionality
    const editModal = document.getElementById('edit-modal');
    const editButtons = document.querySelectorAll('.edit-button');
    const editForm = document.getElementById('edit-form');
    const closeEditModal = document.getElementById('close-modal');

    // Show edit modal
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            editForm.action = button.dataset.action;
            document.getElementById('modal-product-title').value = button.dataset.title;
            document.getElementById('modal-product-price').value = button.dataset.price;
            document.getElementById('modal-product-category').value = button.dataset.category;
            document.getElementById('modal-product-description').value = button.dataset.description;
            
            editModal.classList.remove('hidden');
        });
    });

    // Close edit modal
    closeEditModal.addEventListener('click', () => {
        editModal.classList.add('hidden');
    });

    // Close modals when clicking outside
    window.addEventListener('click', (event) => {
        if (event.target === addProductModal) {
            addProductModal.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('modal-active');
        }
        if (event.target === editModal) {
            editModal.classList.add('hidden');
        }
    });
</script>
</body>
</html>

   
    
    
