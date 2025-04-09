<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic - Registration</title>
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
                <!-- Navigation Buttons for Products and Services -->
              
            </div>
            
        <!-- Mobile Navigation -->
        <div class="md:hidden flex justify-center mt-4 space-x-4">
            <a href="#products" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-red-700 transition">Products</a>
            <a href="#services" class="px-4 py-2 bg-secondary text-white rounded-md hover:bg-blue-700 transition">Services</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 px-4 max-w-3xl">
        <h1 class="text-3xl font-bold text-center mb-8">Rejoignez-nous</h1>

        <div class="border-t border-gray-200 mb-8"></div>

        <!-- Social Login -->
        <div class="flex justify-center space-x-4 mb-8">
            <a href="#" class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 hover:bg-gray-200">
                <i class="fab fa-facebook-f text-blue-600"></i>
            </a>
            <a href="#" class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 hover:bg-gray-200">
                <i class="fab fa-google text-red-500"></i>
            </a>
        </div>

        <p class="text-center text-sm text-gray-500 mb-8">Continuer avec</p>
        
        <!-- Registration Form -->
        <form class="space-y-6" action="{{route('register.post') }}" method= "POST">
            @csrf
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">Prénom *</label>
                <input type="text" name="name" id="firstname" placeholder="first name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Nom *</label>
                <input type="text" id="lastname" name="lastname" placeholder="last name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                <input type="email" id="email" name="email" placeholder="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe *</label>
                <input type="password" id="password" name="password" placeholder="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500">
            </div>
           
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmé Mot de pass *</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500">
            </div>
           

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role *</label>
                <input type="role" id="role" name="role" placeholder="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
            <a href="{{ route('login') }}"><p class="text-sm text-gray-700">Vous avez déjà un compte ?</p></a> 
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-8 rounded-md">Register</button>
            </div>
        </form>
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-16 pt-10 pb-6 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Organic Column -->
                <div>
                    <div class="flex items-center mb-6">
                        <span class="text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </span>
                        <span class="ml-2 text-xl font-bold">Organic</span>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">About us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Conditions</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Our Journals</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Careers</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Affiliate Programme</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Ultras Press</a></li>
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
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Offers</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Discount Coupons</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Stores</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Track Order</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Shop</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Info</a></li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div>
                    <h3 class="text-lg font-medium mb-4">Customer Service</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Contact</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Returns & Refunds</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Cookie Guidelines</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Delivery Information</a></li>
                    </ul>
                </div>

                <!-- Subscribe Us -->
                <div>
                    <h3 class="text-lg font-medium mb-4">Subscribe Us</h3>
                    <p class="text-sm text-gray-600 mb-4">Subscribe to our newsletter to get updates about our great offers.</p>
                    <div class="flex">
                        <input type="email" placeholder="Email Address" class="flex-1 border border-gray-300 rounded-l-md py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500">
                        <button class="bg-black text-white px-4 py-2 rounded-r-md hover:bg-gray-800">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>