
@php
    use Carbon\Carbon;
@endphp



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Supermark - Service Provider Dashboard</title>
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
    .edit-form {
        display: none;
    }
    .edit-form.active {
        display: block;
    }

    /* Modal animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    #edit-service-modal:not(.hidden) {
        animation: fadeIn 0.3s ease-out forwards;
    }

    #edit-service-modal .bg-white {
        animation: slideIn 0.3s ease-out forwards;
    }

    /* Make sure forms in the modal are visible */
    #edit-form-container form {
        display: block !important;
    }

    /* Fix for edit form in modal */
    #edit-service-modal .edit-form {
        display: block !important;
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
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </span>
                <span class="ml-2 text-xl font-light tracking-wide">SUPERMARK</span>
            </a>
            <span class="ml-4 text-sm text-gray-500">Service Provider Dashboard</span>
        </div>

        <div class="flex items-center space-x-6">
            <a href="#" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </a>
            <div class="relative group">
                <button class="flex items-center space-x-2 focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                        <span class="text-sm font-medium text-gray-600">AS</span>
                    </div>
                    <span class="text-sm text-gray-700">Alex Smith</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded shadow-lg py-1 z-10 hidden group-hover:block">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Settings</a>
                    <div class="border-t border-gray-100"></div>
                    <form action="{{ route('logoutt') }}" method="POST">
                        @csrf
                    <button  class="block px-4 py-2 text-sm text-gray-700 hover:bg-accent">Log out</button>
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
            <button class="tab-button px-4 py-4 text-sm font-medium text-primary border-b-2 border-primary" data-tab="services-tab">Services</button>
            <button class="tab-button px-4 py-4 text-sm font-medium text-gray-500 hover:text-primary" data-tab="bookings-tab">Bookings</button>
            <button class="tab-button px-4 py-4 text-sm font-medium text-gray-500 hover:text-primary" data-tab="calendar-tab">Calendar</button>
            <button class="tab-button px-4 py-4 text-sm font-medium text-gray-500 hover:text-primary" data-tab="reviews-tab">Reviews</button>
            <button class="tab-button px-4 py-4 text-sm font-medium text-gray-500 hover:text-primary" data-tab="settings-tab">Settings</button>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="py-8">
    <div class="container mx-auto px-6">
        <!-- Services Tab Content -->
        <div id="services-tab" class="tab-content active">
            <!-- Today's Bookings Summary -->
            <div class="mb-8">
                <h2 class="text-lg font-light mb-4">Today's Bookings</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 border border-gray-100 rounded">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Upcoming</p>
                                <p class="text-2xl font-light mt-1">3</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 border border-gray-100 rounded">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Completed</p>
                                <p class="text-2xl font-light mt-1">2</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 border border-gray-100 rounded">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Cancelled</p>
                                <p class="text-2xl font-light mt-1">0</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-light">My Services</h1>
                <button id="add-service-btn" class="px-4 py-2 bg-primary text-white text-sm hover:bg-gray-700 transition flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Service
                </button>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Service 1 -->
                @if($services->isEmpty())
                    <div class="bg-white border border-gray-100 rounded overflow-hidden">
                        <div class="p-4 text-center">
                            <p class="text-gray-500">No services available.</p>
                        </div>
                    </div>  
                    @else
                    @foreach($services as $service)
                <div class="bg-white border border-gray-100 rounded overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset($service->image) }}" alt="Home Cleaning" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                        </div>
                    </div>
                    
                    <div class="p-4">
                        <h3 class="font-light text-lg mb-1">{{$service->title}}</h3>
                        <p class="text-gray-500 text-sm mb-3">{{$service->category}}</p>
                        <div class="flex items-center mb-3">
                            <div class="text-yellow-400 flex">
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                            </div>
                            <span class="ml-2 text-xs text-gray-500">5.0 (89 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-primary font-medium">{{$service->price}}</p>
                            <div class="flex space-x-2">
                                <form action="{{ route('updateservice',$service->id) }}" Method="POST" class="edit-form" id="edit-form-{{$service->id}}">
                                    @csrf
                                    <!-- Service Image -->
                                
                                    @method('PUT') 
                              
                                
                                    <!-- Service Details -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <!-- Service Name -->
                                        <div class="col-span-2">
                                            <label for="service-name" class="block text-sm font-medium text-gray-700 mb-2">Service Name</label>
                                            <input type="text" id="service-name" name="title" placeholder="Enter service name" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary" value="{{ $service->title }}">
                                        </div>
                                
                                        <!-- Category -->
                                        <div>
                                          
                                            <label for="modal-product-category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                            <select id="modal-product-category" name="category" class="w-full border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent">
                                                <option value="fresh-groceries" {{ $service->category == 'cleaning' ? 'selected' : '' }}>cleaning</option>
                                                <option value="household-essentials" {{ $service->category == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                                                <option value="electronics" {{ $service->category == 'Repair' ? 'selected' : '' }}>Repair</option>
                                                <option value="health-beauty" {{ $service->category == 'installation' ? 'selected' : '' }}>installation</option>
                                                <option value="beverages" {{ $service->category == 'other' ? 'selected' : '' }}>other</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <!-- Price Range -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div>
                                            <label for="min-price" class="block text-sm font-medium text-gray-700 mb-2">Minimum Price ($)</label>
                                            <input type="number" id="min-price" name="price" placeholder="0.00" step="0.01" min="0" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary" value="{{ $service->price }}">
                                        </div>
                                    </div>
                                
                                    <!-- Service Description -->
                                    <div class="mb-6">
                                        <label for="service-description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea id="service-description" name="description" rows="4" placeholder="Enter service description" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary" >{{old('description', $service->description )}}</textarea>
                                    </div>
                                
                                    <!-- Form Actions -->
                                    <div class="flex justify-end space-x-4">
                                        <button type="button" id="cancel-add-service" class="px-6 py-2 border border-gray-200 text-gray-700 hover:text-primary hover:border-primary transition duration-300 rounded">
                                            Cancel
                                        </button>
                                        <button type="submit" class="px-6 py-2 bg-primary text-white hover:bg-gray-700 transition duration-300 rounded">
                                            Update Service
                                        </button>
                                    </div>
                                </form>
                                <button class="text-primary hover:text-gray-700" id="edit-btn-{{$service->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg> 
                                </button>
                            
                                <form action="{{ route('deleteservice', $service->id ) }}" method="Post" >
                                    @csrf
                                    @method('DELETE')
                                    
                                <button class="text-gray-500 hover:text-red-600" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form> 
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

               
            
            </div>

            <!-- Recent Bookings -->
            <div class="mt-12">
                <h2 class="text-lg font-light mb-6">Recent Bookings</h2>
                <div class="bg-white rounded border border-gray-100 overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-accent">
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Booking 1 -->
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-gray-200 flex-shrink-0 mr-3 flex items-center justify-center">
                                            <span class="text-xs font-medium text-gray-600">JD</span>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Jane Doe</div>
                                            <div class="text-xs text-gray-500">jane.doe@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">Home Cleaning</td>
                                <td class="py-3 px-4 text-sm text-gray-500">Today, 2:00 PM</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-blue-100 text-blue-800">Upcoming</span>
                                </td>
                                <td class="py-3 px-4 text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-primary hover:text-gray-700">View</button>
                                        <button class="text-gray-500 hover:text-red-600">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Booking 2 -->
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-gray-200 flex-shrink-0 mr-3 flex items-center justify-center">
                                            <span class="text-xs font-medium text-gray-600">MS</span>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Michael Smith</div>
                                            <div class="text-xs text-gray-500">m.smith@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">Window Cleaning</td>
                                <td class="py-3 px-4 text-sm text-gray-500">Today, 10:00 AM</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-green-100 text-green-800">Completed</span>
                                </td>
                                <td class="py-3 px-4 text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-primary hover:text-gray-700">View</button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Booking 3 -->
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-gray-200 flex-shrink-0 mr-3 flex items-center justify-center">
                                            <span class="text-xs font-medium text-gray-600">AJ</span>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Alice Johnson</div>
                                            <div class="text-xs text-gray-500">alice.j@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">Home Cleaning</td>
                                <td class="py-3 px-4 text-sm text-gray-500">Today, 11:30 AM</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-green-100 text-green-800">Completed</span>
                                </td>
                                <td class="py-3 px-4 text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-primary hover:text-gray-700">View</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-right">
                    <a href="#" class="text-sm text-primary hover:text-gray-700">View all bookings →</a>
                </div>
            </div>
        </div>

        <!-- Bookings Tab Content -->
        <div id="bookings-tab" class="tab-content">
            <!-- Page Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-light">Bookings</h1>
                <div class="flex space-x-2">
                    <div class="relative">
                        <input type="text" placeholder="Search bookings..." class="pl-8 pr-4 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <button class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:border-primary hover:text-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>
                </div>
            </div>

            <!-- Booking Status Tabs -->
            <div class="mb-6 border-b border-gray-200">
                <div class="flex space-x-8">
                    <button class="pb-4 text-sm font-medium text-primary border-b-2 border-primary">All Bookings (24)</button>
                </div>
            </div>

            <!-- Bookings Table -->
            <div class="bg-white rounded border border-gray-100 overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="bg-accent">
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                @if ($bookings->isEmpty())
<tr><td>no booking yet </td></tr>                    
            @else
            @foreach ($bookings as $booking)
                
          
                        <tr>
                            <td class="py-3 px-4 text-sm text-gray-500">#BK-{{$booking->id}}</td>
                            <td class="py-3 px-4">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex-shrink-0 mr-3 flex items-center justify-center">
                                        <span class="text-xs font-medium text-gray-600">JD</span>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">{{$booking->name}}{{$booking->last_name}}</div>
                                </div>
                            </td>
                            <td class="py-3 px-4 text-sm text-gray-500">{{$booking->title}}</td>
                            <td class="py-3 px-4 text-sm text-gray-500">{{$booking->booking_date}} at {{$booking->booking_time}}</td>
                            <td class="py-3 px-4 text-sm text-gray-500">${{$booking->total}}</td>
                            <td class="py-3 px-4">
                                @php
                                $isUpcoming = Carbon::parse($booking->booking_date . ' ' . $booking->booking_time)->greaterThan(Carbon::now());
                            @endphp
                            
                            <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full 
                                {{ $isUpcoming ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800' }}">
                                {{ $isUpcoming ? 'Upcoming' : 'Passed' }}
                            </span>
                            </td>
                            <td class="py-3 px-4 text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <button class="text-primary hover:text-gray-700">View</button>
                                    <button class="text-gray-500 hover:text-red-600">Cancel</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">24</span> results
                </div>
                <div class="flex space-x-1">
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-500 hover:border-primary hover:text-primary">Previous</button>
                    <button class="px-3 py-1 border border-primary bg-primary text-white rounded text-sm">1</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">2</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">3</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">4</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">5</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">Next</button>
                </div>
            </div>
        </div>

        <!-- Calendar Tab Content -->
        <div id="calendar-tab" class="tab-content">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-light">Booking Calendar</h1>
        <div class="flex space-x-2">
            <button class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:border-primary hover:text-primary transition">
                Today
            </button>
            <div class="flex border border-gray-200 rounded">
                <button class="px-3 py-2 text-gray-700 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="px-3 py-2 text-gray-700 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            <span class="px-4 py-2 text-sm font-medium">April 2025</span>
        </div>
    </div>

    <!-- Calendar View Tabs -->
    <div class="mb-6 border-b border-gray-200">
        <div class="flex space-x-8">
                      <button class="pb-4 text-sm font-medium text-primary border-b-2 border-primary">List</button>

        </div>
    </div>

    <!-- Booking Filter -->
    <div class="mb-6 flex flex-wrap gap-2">
        <button class="px-3 py-1.5 bg-primary text-white text-sm rounded-full">All Bookings</button>
   
        <div class="ml-auto">
            <div class="relative">
                <input type="text" placeholder="Search bookings..." class="pl-8 pr-4 py-1.5 border border-gray-200 rounded text-sm focus:outline-none focus:border-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-2.5 top-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white rounded border border-gray-100 overflow-hidden mb-8">
        <table class="w-full">
            <thead>
                <tr class="bg-accent">
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Today's Bookings -->
               @if ($upcomingdate->isEmpty())
               <tr><td>sorry no bookings at the moment</td></tr>
                   @else
                   @foreach ($upcomingdate as $bookings )
                       
             
                <tr>
                    <td class="py-3 px-4 text-sm text-gray-500">{{$bookings->booking_date}}</td>
                    <td class="py-3 px-4 text-sm text-gray-500">{{$bookings->booking_time}}</td>
                    <td class="py-3 px-4">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex-shrink-0 mr-3 flex items-center justify-center">
                                <span class="text-xs font-medium text-gray-600">MS</span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{$bookings->name}}{{$bookings->last_name}}</div>
                                <div class="text-xs text-gray-500">{{$bookings->email}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm text-gray-500">{{$bookings->title}}</td>
                    <td class="py-3 px-4 text-sm text-gray-500">{{$bookings->address}}</td>
                    <td class="py-3 px-4">
                        
                        @php
                        $isUpcoming = Carbon::parse($bookings->booking_date . ' ' . $bookings->booking_time)->greaterThan(Carbon::now());
                    @endphp
                    
                    <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full 
                        {{ $isUpcoming ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800' }}">
                        {{ $isUpcoming ? 'Upcoming' : 'Passed' }}
                    </span>
                    
                    </td>
                    <td class="py-3 px-4 text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <button class="text-primary hover:text-gray-700">View</button>
                            <button class="text-gray-500 hover:text-red-600">Cancel</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
              

        
            
             
            </tbody>
        </table>
    </div>

   
</div>

        <!-- Reviews Tab Content -->
        <div id="reviews-tab" class="tab-content">
            <!-- Page Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-light">Reviews</h1>
                <div class="flex space-x-2">
                    <div class="relative">
                        <input type="text" placeholder="Search reviews..." class="pl-8 pr-4 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <button class="px-4 py-2 border border-gray-200 text-gray-700 text-sm hover:border-primary hover:text-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>
                </div>
            </div>

            <!-- Reviews Summary -->
            <div class="bg-white p-6 border border-gray-100 rounded mb-8">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="flex-1">
                        <div class="flex items-center">
                            <div class="text-4xl font-light">4.8</div>
                            <div class="ml-4">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <div class="text-sm text-gray-500 mt-1">Based on 149 reviews</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 mt-6 md:mt-0">
                        <div class="flex items-center mb-1">
                            <div class="text-xs font-medium w-8">5 ★</div>
                            <div class="flex-1 mx-2">
                                <div class="h-2 bg-gray-200 rounded">
                                    <div class="h-2 bg-yellow-400 rounded" style="width: 80%"></div>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 w-8">80%</div>
                        </div>
                        <div class="flex items-center mb-1">
                            <div class="text-xs font-medium w-8">4 ★</div>
                            <div class="flex-1 mx-2">
                                <div class="h-2 bg-gray-200 rounded">
                                    <div class="h-2 bg-yellow-400 rounded" style="width: 15%"></div>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 w-8">15%</div>
                        </div>
                        <div class="flex items-center mb-1">
                            <div class="text-xs font-medium w-8">3 ★</div>
                            <div class="flex-1 mx-2">
                                <div class="h-2 bg-gray-200 rounded">
                                    <div class="h-2 bg-yellow-400 rounded" style="width: 3%"></div>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 w-8">3%</div>
                        </div>
                        <div class="flex items-center mb-1">
                            <div class="text-xs font-medium w-8">2 ★</div>
                            <div class="flex-1 mx-2">
                                <div class="h-2 bg-gray-200 rounded">
                                    <div class="h-2 bg-yellow-400 rounded" style="width: 1%"></div>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 w-8">1%</div>
                        </div>
                        <div class="flex items-center">
                            <div class="text-xs font-medium w-8">1 ★</div>
                            <div class="flex-1 mx-2">
                                <div class="h-2 bg-gray-200 rounded">
                                    <div class="h-2 bg-yellow-400 rounded" style="width: 1%"></div>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 w-8">1%</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews List -->
            <div class="space-y-6">
                <!-- Review 1 -->
                <div class="bg-white p-6 border border-gray-100 rounded">
                    <div class="flex items-start">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex-shrink-0 mr-4 flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-600">JD</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium">Jane Doe</h3>
                                <span class="text-xs text-gray-500">2 days ago</span>
                            </div>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                </div>
                                <span class="ml-2 text-xs text-gray-500">Home Cleaning</span>
                            </div>
                            <p class="text-sm text-gray-700 mt-3">The cleaning service was exceptional! The team was thorough, professional, and left my home spotless. I'll definitely be booking again.</p>
                            <div class="mt-4 flex justify-end">
                                <button class="text-sm text-primary hover:text-gray-700">Reply</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="bg-white p-6 border border-gray-100 rounded">
                    <div class="flex items-start">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex-shrink-0 mr-4 flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-600">MS</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium">Michael Smith</h3>
                                <span class="text-xs text-gray-500">1 week ago</span>
                            </div>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                </div>
                                <span class="ml-2 text-xs text-gray-500">Window Cleaning</span>
                            </div>
                            <p class="text-sm text-gray-700 mt-3">I'm very impressed with the window cleaning service. Every window is crystal clear, and the technician was punctual and professional. Great job!</p>
                            <div class="mt-4 flex justify-end">
                                <button class="text-sm text-primary hover:text-gray-700">Reply</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="bg-white p-6 border border-gray-100 rounded">
                    <div class="flex items-start">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex-shrink-0 mr-4 flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-600">RB</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium">Robert Brown</h3>
                                <span class="text-xs text-gray-500">2 weeks ago</span>
                            </div>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="far fa-star text-xs"></i>
                                </div>
                                <span class="ml-2 text-xs text-gray-500">Carpet Cleaning</span>
                            </div>
                            <p class="text-sm text-gray-700 mt-3">The carpet cleaning service was good overall. Most stains were removed, but there was one stubborn spot that couldn't be completely eliminated. Still, I'm satisfied with the results.</p>
                            <div class="mt-4 flex justify-end">
                                <button class="text-sm text-primary hover:text-gray-700">Reply</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review with Reply -->
                <div class="bg-white p-6 border border-gray-100 rounded">
                    <div class="flex items-start">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex-shrink-0 mr-4 flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-600">AJ</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium">Alice Johnson</h3>
                                <span class="text-xs text-gray-500">3 weeks ago</span>
                            </div>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                </div>
                                <span class="ml-2 text-xs text-gray-500">Home Cleaning</span>
                            </div>
                            <p class="text-sm text-gray-700 mt-3">Absolutely fantastic service! The team was on time, efficient, and thorough. My home has never looked better. Will definitely use again!</p>
                            
                            <!-- Reply -->
                            <div class="mt-4 ml-6 p-4 bg-gray-50 rounded">
                                <div class="flex items-start">
                                    <div class="h-8 w-8 rounded-full bg-primary flex-shrink-0 mr-3 flex items-center justify-center">
                                        <span class="text-xs font-medium text-white">AS</span>
                                    </div>
                                    <div>
                                        <div class="flex items-center">
                                            <h4 class="text-sm font-medium">Alex Smith</h4>
                                            <span class="ml-2 text-xs text-gray-500">2 weeks ago</span>
                                        </div>
                                        <p class="text-sm text-gray-700 mt-1">Thank you for your kind words, Alice! We're thrilled that you're happy with our service. Looking forward to serving you again soon!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">149</span> reviews
                </div>
                <div class="flex space-x-1">
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-500 hover:border-primary hover:text-primary">Previous</button>
                    <button class="px-3 py-1 border border-primary bg-primary text-white rounded text-sm">1</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">2</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">3</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">...</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">38</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm text-gray-700 hover:border-primary hover:text-primary">Next</button>
                </div>
            </div>
        </div>

        <!-- Settings Tab Content -->
        <div id="settings-tab" class="tab-content">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-light">Settings</h1>
                <p class="text-gray-500 mt-1">Manage your account settings and preferences</p>
            </div>

            <!-- Settings Navigation -->
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-64 mb-6 md:mb-0">
                    <div class="bg-white border border-gray-100 rounded overflow-hidden">
                        <div class="p-4 border-b border-gray-100">
                            <h2 class="font-medium">Settings</h2>
                        </div>
                        <div class="divide-y divide-gray-100">
                            <button class="w-full text-left px-4 py-3 text-sm font-medium text-primary bg-accent">Profile</button>
                            <button class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-accent">Business Information</button>
                            <button class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-accent">Services</button>
                            <button class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-accent">Availability</button>
                            <button class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-accent">Notifications</button>
                            <button class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-accent">Payment Methods</button>
                            <button class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-accent">Security</button>
                        </div>
                    </div>
                </div>
                <div class="flex-1 md:ml-6">
                    <div class="bg-white border border-gray-100 rounded">
                        <div class="p-6 border-b border-gray-100">
                            <h2 class="text-lg font-medium">Profile</h2>
                            <p class="text-sm text-gray-500 mt-1">Update your personal information</p>
                        </div>
                        <div class="p-6">
                            <form>
                                <!-- Profile Photo -->
                                <div class="mb-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                                    <div class="flex items-center">
                                        <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-lg font-medium text-gray-600">AS</span>
                                        </div>
                                        <div class="ml-4">
                                            <button type="button" class="px-3 py-1.5 border border-gray-200 text-sm text-gray-700 hover:border-primary hover:text-primary rounded">Change</button>
                                            <button type="button" class="px-3 py-1.5 border border-gray-200 text-sm text-gray-700 hover:border-primary hover:text-primary rounded ml-2">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Name -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                        <input type="text" id="first-name" name="first-name" value="Alex" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                                    </div>
                                    <div>
                                        <label for="last-name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                        <input type="text" id="last-name" name="last-name" value="Smith" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                                    </div>
                                </div>
                                
                                <!-- Contact Information -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                        <input type="email" id="email" name="email" value="alex.smith@example.com" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                                    </div>
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                        <input type="tel" id="phone" name="phone" value="(555) 123-4567" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                                    </div>
                                </div>
                                
                                <!-- Address -->
                                <div class="mb-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                    <input type="text" id="address" name="address" value="123 Service St" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary mb-2">
                                    <input type="text" id="address-2" name="address-2" value="Suite 456" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                    <div>
                                        <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                        <input type="text" id="city" name="city" value="Serviceville" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                                    </div>
                                    <div>
                                        <label for="state" class="block text-sm font-medium text-gray-700 mb-2">State</label>
                                        <input type="text" id="state" name="state" value="CA" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                                    </div>
                                    <div>
                                        <label for="zip" class="block text-sm font-medium text-gray-700 mb-2">ZIP Code</label>
                                        <input type="text" id="zip" name="zip" value="90210" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                                    </div>
                                </div>
                                
                                <!-- Bio -->
                                <div class="mb-6">
                                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                                    <textarea id="bio" name="bio" rows="4" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">Professional service provider with over 10 years of experience in home and office cleaning services.</textarea>
                                </div>
                                
                                <!-- Form Actions -->
                                <div class="flex justify-end space-x-4">
                                    <button type="button" class="px-6 py-2 border border-gray-200 text-gray-700 hover:text-primary hover:border-primary transition duration-300 rounded">
                                        Cancel
                                    </button>
                                    <button type="submit" class="px-6 py-2 bg-primary text-white hover:bg-gray-700 transition duration-300 rounded">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Add Service Modal -->
<div id="add-service-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg w-full max-w-2xl mx-4">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium">Add New Service</h2>
                <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-6 overflow-y-auto max-h-[60vh]">
           
            
            <form action="{{ route('add_service') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Service Image -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Service Image</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-md p-6 flex flex-col items-center justify-center">
                        <input type="file" id="service-image" name="image">
                    </div>
                </div>
            
                <!-- Service Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Service Name -->
                    <div class="col-span-2">
                        <label for="service-name" class="block text-sm font-medium text-gray-700 mb-2">Service Name</label>
                        <input type="text" id="service-name" name="title" placeholder="Enter service name" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                    </div>
            
                    <!-- Category -->
                    <div>
                        <label for="service-category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="service-category" name="category" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                            <option value="">Select a category</option>
                            <option value="cleaning">Cleaning</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="repair">Repair</option>
                            <option value="installation">Installation</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            
                <!-- Price Range -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="min-price" class="block text-sm font-medium text-gray-700 mb-2">Minimum Price ($)</label>
                        <input type="number" id="min-price" name="price" placeholder="0.00" step="0.01" min="0" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary">
                    </div>
                </div>
            
                <!-- Service Description -->
                <div class="mb-6">
                    <label for="service-description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="service-description" name="description" rows="4" placeholder="Enter service description" class="w-full border border-gray-200 rounded py-2 px-3 focus:outline-none focus:border-primary"></textarea>
                </div>
            
                <!-- Form Actions -->
                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancel-add-service" class="px-6 py-2 border border-gray-200 text-gray-700 hover:text-primary hover:border-primary transition duration-300 rounded">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-primary text-white hover:bg-gray-700 transition duration-300 rounded">
                        Add Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Service Modal -->
<div id="edit-service-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg w-full max-w-2xl mx-4">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium">Edit Service</h2>
                <button id="close-edit-modal" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-6 overflow-y-auto max-h-[60vh]" id="edit-form-container">
            <!-- The edit form will be moved here dynamically -->
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-white py-6 border-t border-gray-100">
    <div class="container mx-auto px-6">
        <p class="text-center text-xs text-gray-400">© 2025 Supermark. All rights reserved.</p>
    </div>
</footer>

<script>
    // Tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        // Tab switching functionality
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => {
                    btn.classList.remove('text-primary', 'border-b-2', 'border-primary');
                    btn.classList.add('text-gray-500', 'hover:text-primary');
                });
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });
                
                // Add active class to clicked button and corresponding content
                button.classList.add('text-primary', 'border-b-2', 'border-primary');
                button.classList.remove('text-gray-500', 'hover:text-primary');
                
                const tabId = button.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Add Service Modal
        const addServiceBtn = document.getElementById('add-service-btn');
        const addServiceModal = document.getElementById('add-service-modal');
        const closeModal = document.getElementById('close-modal');
        const cancelAddService = document.getElementById('cancel-add-service');
        
        if (addServiceBtn && addServiceModal) {
            addServiceBtn.addEventListener('click', () => {
                addServiceModal.classList.remove('hidden');
            });
            
            if (closeModal) {
                closeModal.addEventListener('click', () => {
                    addServiceModal.classList.add('hidden');
                });
            }
            
            if (cancelAddService) {
                cancelAddService.addEventListener('click', () => {
                    addServiceModal.classList.add('hidden');
                });
            }
        }
        
        // Edit Service Modal
        const editServiceModal = document.getElementById('edit-service-modal');
        const closeEditModal = document.getElementById('close-edit-modal');
        const editFormContainer = document.getElementById('edit-form-container');
        
        // Edit form functionality as modal
        document.querySelectorAll('[id^="edit-btn-"]').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const serviceId = button.id.split('-').pop();
                const editForm = document.querySelector(`form[id="edit-form-${serviceId}"]`);
                
                if (editForm && editServiceModal && editFormContainer) {
                    // Clone the form to the modal
                    const clonedForm = editForm.cloneNode(true);
                    
                    // Clear previous content and append the cloned form
                    editFormContainer.innerHTML = '';
                    editFormContainer.appendChild(clonedForm);
                    
                    // Make sure the form is visible
                    clonedForm.style.display = 'block';
                    
                    // Update the cancel button to close the modal
                    const cancelButton = clonedForm.querySelector('button[type="button"]');
                    if (cancelButton) {
                        cancelButton.addEventListener('click', () => {
                            editServiceModal.classList.add('hidden');
                        });
                    }
                    
                    // Show the modal with animation
                    editServiceModal.classList.remove('hidden');
                    const modalContent = editServiceModal.querySelector('.bg-white');
                    if (modalContent) {
                        modalContent.classList.add('modal-content');
                    }
                }
            });
        });
        
        // Close edit modal when clicking the close button
        if (closeEditModal) {
            closeEditModal.addEventListener('click', () => {
                editServiceModal.classList.add('hidden');
            });
        }
        
        // Close modals when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === addServiceModal) {
                addServiceModal.classList.add('hidden');
            }
            if (e.target === editServiceModal) {
                editServiceModal.classList.add('hidden');
            }
        });
    });
</script>
</body>
</html>
