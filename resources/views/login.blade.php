<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organic - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
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
<body class="min-h-screen flex flex-col">
  <!-- Header -->
  <header class="border-b border-gray-200 py-4 px-6 bg-white shadow-sm">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center">
            <div class="mr-4">
                <a href="{{ route('welcome') }}" class="flex items-center">
                    <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-2xl font-bold">Supermark</span>
                </a>
            </div>
            <!-- Navigation Buttons for Products and Services -->
            
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
            <a href="{{route('login') }}" class="text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
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

  <!-- Main Content -->
  <main class="flex-1 container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-3xl font-bold text-center mb-8">Connexion</h1>

    <div class="border-t border-gray-200 pt-8 mb-8"></div>

    <!-- Social Login -->
    <div class="flex justify-center space-x-4 mb-8">
      <button class="bg-gray-100 p-3 rounded-full">
        <i class="fab fa-facebook-f text-blue-600"></i>
      </button>
      <button class="bg-gray-100 p-3 rounded-full">
        <i class="fab fa-google text-red-500"></i>
      </button>
    </div>
    <div class="text-center text-sm text-gray-500 mb-8">Continuer avec</div>

    <!-- Login Form -->
    <form action="{{ route('login.post') }}" class="space-y-4 max-w-md mx-auto" method="POST">
      @csrf
      <div>
        <label for="email" class="block text-sm mb-1">
          Email <span class="text-red-500">*</span>
        </label>
        <input
          id="email"
          type="email"
          name="email"
          placeholder="email"
          class="w-full px-3 py-2 border border-gray-300 rounded-md"
        />
      </div>

      <div>
        <div class="flex justify-between items-center mb-1">
          <label for="password" class="block text-sm">
            Mot de passe <span class="text-red-500">*</span>
          </label>
          <a href="#" class="text-sm text-gray-600 hover:underline">
            Mot de passe oublié?
          </a>
        </div>
        <input
          id="password"
          type="password"
          name="password"
          placeholder="password"
          class="w-full px-3 py-2 border border-gray-300 rounded-md"
        />
      </div>

      <div class="flex items-center">
        <input id="remember" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded" />
        <label for="remember" class="ml-2 block text-sm text-gray-600">
          Se souvenir de moi
        </label>
      </div>

      <div class="pt-4">
        <button type="submit" class="w-full bg-gray-200 text-black hover:bg-gray-300 py-2 px-4 rounded-md">
          Connexion
        </button>
      </div>

      <div class="text-center text-sm">
        <p>
          Vous n'avez pas de compte?
          <a href="{{ route('register') }}" class="text-gray-600 hover:underline">
            S'inscrire
          </a>
        </p>
      </div>
    </form>
  </main>

  <!-- Footer -->
  <footer class="bg-white pt-12 pb-6 border-t mt-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo and Social -->
        <div>
          <div class="flex items-center mb-4">
            <div class="text-green-500 mr-1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14h-2v-6h2v6zm4 0h-2V7h2v9z" fill="currentColor" />
              </svg>
            </div>
            <span class="font-bold text-xl">Organic</span>
          </div>
          <div class="flex space-x-4 mb-4">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fas fa-envelope"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-youtube"></i>
          </div>
        </div>

        <!-- Organic -->
        <div>
          <h3 class="font-bold mb-4">Organic</h3>
          <ul class="space-y-2 text-sm">
            <li>About us</li>
            <li>Conditions</li>
            <li>Our Journals</li>
            <li>Careers</li>
            <li>Affiliate Programme</li>
            <li>Ultras Press</li>
          </ul>
        </div>

        <!-- Quick Links -->
        <div>
          <h3 class="font-bold mb-4">Quick Links</h3>
          <ul class="space-y-2 text-sm">
            <li>Offers</li>
            <li>Discount Coupons</li>
            <li>Stores</li>
            <li>Track Order</li>
            <li>Shop</li>
            <li>Info</li>
          </ul>
        </div>

        <!-- Customer Service -->
        <div>
          <h3 class="font-bold mb-4">Customer Service</h3>
          <ul class="space-y-2 text-sm">
            <li>FAQ</li>
            <li>Contact</li>
            <li>Privacy Policy</li>
            <li>Returns & Refunds</li>
            <li>Cookie Guidelines</li>
            <li>Delivery Information</li>
          </ul>
        </div>
      </div>

      <!-- Subscribe -->
      <div class="mt-8