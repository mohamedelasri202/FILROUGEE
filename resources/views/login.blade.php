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

  <!-- Footer -->   <footer class="bg-white pt-16 pb-8 border-t border-gray-100">
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
              
              <!-- Subscribe Us -->
              <div>
                  <h3 class="text-sm font-medium mb-6">Newsletter</h3>
                  <p class="text-sm text-gray-500 mb-4">Get updates on special offers and exclusive deals</p>
                  <div class="flex">
                      <input type="email" placeholder="Email Address" class="flex-1 border-b border-gray-200 py-2 px-2 focus:outline-none focus:border-primary bg-transparent text-sm">
                      <button class="bg-transparent text-primary px-4 py-2 hover:text-gray-700">→</button>
                  </div>
              </div>
          </div>
          
          <div class="border-t border-gray-100 mt-12 pt-8">
              <p class="text-center text-xs text-gray-400">© 2025 Supermark. All rights reserved.</p>
          </div>
      </div>
  </footer>

</body>
</html>