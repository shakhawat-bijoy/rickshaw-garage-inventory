<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <title>Rickshaw Garage Management</title>
</head>

<body class="bg-gray-50 mx-auto max-w-[1320px] mt-5 mb-10">

    <div class=" ">
        <!-- Header -->
        <div class="flex justify-between mb-10 bg-white shadow rounded-2xl p-6 text-center">
            <div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Rickshaw Garage
                </h1>
                <p class="text-gray-600 text-sm font-medium">Smart Inventory Management System</p>
            </div>
            <a class="text-white font-medium hover:shadow-lg px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 rounded-lg transition-all duration-300 transform hover:scale-105" href="/create">Add New Item</a>
        </div>

        <!-- Banner Section -->
        <div class="relative mb-10 overflow-hidden rounded-2xl shadow-lg">
            <div id="bannerContainer" class="flex transition-transform duration-500 ease-in-out">
                <!-- Banner 1 - Inventory Management -->
                <div class="min-w-full relative bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                    <div class="relative px-8 py-16 md:px-16">
                        <div class="max-w-2xl">
                            <h2 class="text-4xl font-bold mb-4">Smart Inventory Management</h2>
                            <p class="text-xl mb-6 opacity-90">Keep track of all your rickshaw parts and supplies with our advanced inventory system. Monitor stock levels and never run out of essential items.</p>
                            <div class="flex items-center space-x-6">
                                <div class="text-center">
                                    <div class="text-2xl font-bold">{{ $inventories->count() }}</div>
                                    <div class="text-sm opacity-75">Total Items</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold">{{ $inventories->sum('quantity') }}</div>
                                    <div class="text-sm opacity-75">Total Stock</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-yellow-300">{{ $inventories->where('quantity', '<', 5)->count() }}</div>
                                    <div class="text-sm opacity-75">Low Stock</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 2 - Real-time Tracking -->
                <div class="min-w-full relative bg-gradient-to-r from-green-600 to-teal-600 text-white">
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                    <div class="relative px-8 py-16 md:px-16">
                        <div class="max-w-2xl">
                            <h2 class="text-4xl font-bold mb-4">Real-time Stock Tracking</h2>
                            <p class="text-xl mb-6 opacity-90">Get instant updates on your inventory levels. Our system automatically alerts you when items are running low, ensuring smooth garage operations.</p>
                            <div class="flex items-center space-x-4">
                                <div class="bg-white bg-opacity-20 rounded-full px-4 py-2">
                                    <span class="text-sm font-medium">✓ Live Updates</span>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-full px-4 py-2">
                                    <span class="text-sm font-medium">✓ Smart Alerts</span>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-full px-4 py-2">
                                    <span class="text-sm font-medium">✓ Easy Management</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 3 - Efficiency Boost -->
                <div class="min-w-full relative bg-gradient-to-r from-orange-500 to-red-500 text-white">
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                    <div class="relative px-8 py-16 md:px-16">
                        <div class="max-w-2xl">
                            <h2 class="text-4xl font-bold mb-4">Boost Your Efficiency</h2>
                            <p class="text-xl mb-6 opacity-90">Streamline your rickshaw garage operations with powerful search, filtering, and management tools. Save time and increase productivity.</p>
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="bg-white bg-opacity-20 rounded-lg p-3 text-center">
                                    <div class="text-2xl font-bold">50%</div>
                                    <div class="text-sm">Time Saved</div>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-lg p-3 text-center">
                                    <div class="text-2xl font-bold">99%</div>
                                    <div class="text-sm">Accuracy</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 4 - Growth & Analytics -->
                <div class="min-w-full relative bg-gradient-to-r from-purple-600 to-pink-600 text-white">
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                    <div class="relative px-8 py-16 md:px-16">
                        <div class="max-w-2xl">
                            <h2 class="text-4xl font-bold mb-4">Grow Your Business</h2>
                            <p class="text-xl mb-6 opacity-90">Make data-driven decisions with comprehensive inventory analytics. Track usage patterns and optimize your stock levels for maximum profitability.</p>
                            <div class="flex items-center space-x-6">
                                <div class="text-center">
                                    <div class="text-2xl font-bold">${{ number_format($inventories->sum('total_price'), 0) }}</div>
                                    <div class="text-sm opacity-75">Total Inventory Value</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold">{{ $inventories->unique('location')->count() }}</div>
                                    <div class="text-sm opacity-75">Storage Locations</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner Navigation Dots -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-200" data-slide="0"></button>
                <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-200" data-slide="1"></button>
                <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-200" data-slide="2"></button>
                <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-200" data-slide="3"></button>
            </div>

            <!-- Banner Navigation Arrows -->
            <button id="prevBanner" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full p-2 transition-all duration-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="nextBanner" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full p-2 transition-all duration-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <div class="mx-auto">
            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                @foreach($inventories as $inventory)
                <div class="bg-white shadow rounded-2xl p-6 text-center">
                    <div class="text-3xl font-bold">{{ $inventory->quantity }}</div>
                    <div class="text-gray-500">{{ $inventory->item_name }}</div>
                </div>
                @endforeach
                <div class="bg-white shadow rounded-2xl p-6 text-center">
                    <div class="text-3xl font-bold">{{ $inventories->sum('quantity') }}</div>
                    <div class="text-gray-500">Total Quantity</div>
                </div>
                <div class="bg-white shadow rounded-2xl p-6 text-center">
                    <div class="text-3xl font-bold">{{ $inventories->unique('location')->count() }}</div>
                    <div class="text-gray-500">Locations</div>
                </div>
                <div class="bg-white shadow rounded-2xl p-6 text-center">
                    <div class="text-3xl font-bold text-red-600">{{ $inventories->where('quantity', '<', 5)->count() }}</div>
                    <div class="text-gray-500">Low Stock Items</div>
                </div>
            </div>

            <!-- Search Box -->
            <div class="mb-6">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Search by item name, location, or status..."
                        class="w-full rounded-xl border border-gray-300 p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Inventory Table -->
            <div class="bg-white shadow rounded-2xl overflow-hidden">
                <div class="bg-gray-100 px-6 py-3 text-lg font-semibold">
                    Current Inventory
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse min-w-[600px]" id="inventoryTable">
                        <thead>
                            <tr class="bg-gray-50 text-left text-sm font-medium text-gray-600">
                                <th class="p-3 border-b">Item Name</th>
                                <th class="p-3 border-b">Quantity</th>
                                <th class="p-3 border-b">Location</th>
                                <th class="p-3 border-b">Status</th>
                                <th class="p-3 border-b">Price</th>
                                <th class="p-3 border-b text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-200">
                            @foreach($inventories as $inventory)
                            <tr class="hover:bg-gray-50 transition inventory-row">
                                <td class="p-3 font-medium item-name">{{ $inventory->item_name }}</td>
                                <td class="p-3">{{ $inventory->quantity }}</td>
                                <td class="p-3 item-location">{{ $inventory->location }}</td>
                                <td class="p-3 font-semibold item-status {{ $inventory->quantity < 5 ? 'text-red-600' : 'text-green-600' }}">
                                    {{ $inventory->quantity < 5 ? 'Low Stock' : 'In Stock' }}
                                </td>
                                <td class="p-3 text-gray-700 font-medium">${{ number_format($inventory->price, 2) }}</td>
                                <td class="p-3 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('edit', $inventory->id) }}">
                                            <button class="px-3 py-1 text-sm rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition">
                                                Update
                                            </button>
                                        </a>
                                        <button onclick="confirmDelete('{{ $inventory->id }}', '{{ $inventory->item_name }}')"
                                            class="px-3 py-1 text-sm rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- No Results Message -->
                <div id="noResults" class="hidden p-6 text-center text-gray-500">
                    <div class="text-lg font-medium mb-2">No items found</div>
                    <div class="text-sm">Try adjusting your search terms</div>
                </div>
            </div>

        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Delete Item</h3>
                    <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete "<span id="itemNameToDelete"></span>"? This action cannot be undone.</p>
                    <div class="flex gap-3 justify-center">
                        <button onclick="closeDeleteModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                            Cancel
                        </button>
                        <form id="deleteForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toast Messages -->
        @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: "#16a34a",
                    stopOnFocus: true,
                    className: "rounded-lg shadow-lg text-white px-4 py-2 font-medium"
                }).showToast();
            });
        </script>
        @endif

        @if(session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Toastify({
                    text: "{{ session('error') }}",
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: "#dc2626",
                    stopOnFocus: true,
                    className: "rounded-lg shadow-lg text-white px-4 py-2 font-medium"
                }).showToast();
            });
        </script>
        @endif




                <!-- Footer -->
        <footer class="bg-white rounded-2xl shadow-lg p-8 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl p-2 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                <circle cx="9" cy="17" r="1"></circle>
                                <circle cx="15" cy="17" r="1"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l2 2"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                Rickshaw Garage
                            </h3>
                            <p class="text-gray-600 text-sm">Smart Inventory Management</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Streamline your rickshaw garage operations with our comprehensive inventory management system. 
                        Track parts, monitor stock levels, and optimize your business efficiency.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                       
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.748-1.378 0 0-.597 2.291-.744 2.869-.267 1.053-1.01 2.375-1.5 3.182C9.516 23.815 10.751 24.001 12.017 24.001c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.017 24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold text-gray-800 mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Dashboard</a></li>
                        <li><a href="/create" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Add Item</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Reports</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Analytics</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Settings</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="font-semibold text-gray-800 mb-4">Support</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Help Center</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Contact Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Documentation</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">API Reference</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Status</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-200 mt-8 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-sm text-gray-600">
                        © 2025 Rickshaw Garage Management System. All rights reserved.
                    </div>
                    <div class="flex items-center space-x-6 text-sm text-gray-600">
                        <a href="#" class="hover:text-blue-600 transition-colors duration-200">Privacy Policy</a>
                        <a href="#" class="hover:text-blue-600 transition-colors duration-200">Terms of Service</a>
                        <a href="#" class="hover:text-blue-600 transition-colors duration-200">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script>
        // Banner Slider functionality
        let currentSlide = 0;
        const totalSlides = 4;
        let slideInterval;

        function updateBanner() {
            const container = document.getElementById('bannerContainer');
            const dots = document.querySelectorAll('.banner-dot');

            // Update banner position
            container.style.transform = `translateX(-${currentSlide * 100}%)`;

            // Update dots
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.add('bg-opacity-100');
                    dot.classList.remove('bg-opacity-50');
                } else {
                    dot.classList.add('bg-opacity-50');
                    dot.classList.remove('bg-opacity-100');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateBanner();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateBanner();
        }

        function goToSlide(slideIndex) {
            currentSlide = slideIndex;
            updateBanner();
        }

        function startAutoSlide() {
            slideInterval = setInterval(nextSlide, 5000); // Change slide every 3 seconds
        }

        function stopAutoSlide() {
            clearInterval(slideInterval);
        }

        // Initialize banner slider
        document.addEventListener('DOMContentLoaded', function() {
            updateBanner();
            startAutoSlide();

            // Add event listeners for manual navigation
            document.getElementById('nextBanner').addEventListener('click', function() {
                stopAutoSlide();
                nextSlide();
                setTimeout(startAutoSlide, 5000); // Restart auto-slide after 5 seconds
            });

            document.getElementById('prevBanner').addEventListener('click', function() {
                stopAutoSlide();
                prevSlide();
                setTimeout(startAutoSlide, 5000); // Restart auto-slide after 5 seconds
            });

            // Add event listeners for dots
            document.querySelectorAll('.banner-dot').forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    stopAutoSlide();
                    goToSlide(index);
                    setTimeout(startAutoSlide, 5000); // Restart auto-slide after 5 seconds
                });
            });

            // Pause auto-slide on hover
            const bannerSection = document.querySelector('.relative.mb-10.overflow-hidden.rounded-2xl.shadow-lg');
            bannerSection.addEventListener('mouseenter', stopAutoSlide);
            bannerSection.addEventListener('mouseleave', startAutoSlide);
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('.inventory-row');
            const noResults = document.getElementById('noResults');
            let visibleRows = 0;

            rows.forEach(row => {
                const itemName = row.querySelector('.item-name').textContent.toLowerCase();
                const itemLocation = row.querySelector('.item-location').textContent.toLowerCase();
                const itemStatus = row.querySelector('.item-status').textContent.toLowerCase();

                const isVisible = itemName.includes(searchTerm) ||
                    itemLocation.includes(searchTerm) ||
                    itemStatus.includes(searchTerm);

                row.style.display = isVisible ? '' : 'none';
                if (isVisible) visibleRows++;
            });

            // Show/hide no results message
            noResults.style.display = visibleRows === 0 && searchTerm !== '' ? 'block' : 'none';
        });

        // Delete confirmation functions
        function confirmDelete(itemId, itemName) {
            document.getElementById('itemNameToDelete').textContent = itemName;
            document.getElementById('deleteForm').action = `/delete/${itemId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>

</body>

</html>