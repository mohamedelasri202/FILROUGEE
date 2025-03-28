<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account Status</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Georgia', serif;
    }
  </style>
</head>
<body class="bg-stone-100 min-h-screen flex items-center justify-center px-4">

  <div class="max-w-xl w-full bg-white/90 backdrop-blur-md border border-stone-300 rounded-3xl shadow-2xl p-10 text-center space-y-6">

    <!-- Header Icon -->
    <div class="w-16 h-16 mx-auto flex items-center justify-center bg-stone-200 rounded-full shadow-md">
      <svg class="w-8 h-8 text-stone-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
      </svg>
    </div>

    <!-- Dynamic Status -->
    <?php

?>
    @if($status == 'suspended')
      <h2 class="text-3xl font-semibold text-rose-700 tracking-wide">Account Suspended</h2>
      <p class="text-stone-700 leading-relaxed">
        We're sorry, but your account has been suspended. If you believe this is an error, please contact our support team to resolve the issue.
      </p>
    @else
      <h2 class="text-3xl font-semibold text-amber-700 tracking-wide">Pending Approval</h2>
      <p class="text-stone-700 leading-relaxed">
        Thank you for signing up. Your account is currently under review and must be approved by an administrator before access is granted.
      </p>
      <p class="text-sm text-stone-500">You will receive an email once it's approved.</p>
    @endif

    <!-- Call to Action -->
    <div class="mt-6">
      <form action="{{ route('logoutt') }}" method="POST" >
        @csrf
      <button  class="inline-block px-6 py-2 bg-stone-800 text-white rounded-full hover:bg-stone-700 transition">
        Return to Home
      </button>
    </form>
    </div>

    <!-- Footer -->
    <p class="text-xs text-stone-400 mt-8">
      Need help? <a href="mailto:support@yourapp.com" class="text-stone-600 underline">Contact Support</a>
    </p>

  </div>

</body>
</html>
