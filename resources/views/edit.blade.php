<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Rickshaw Garage</title>
</head>

<body class="bg-gray-50 mx-auto max-w-[1320px]">

    <div class="my-8">
        <div class="flex justify-between mb-10 items-center bg-white shadow rounded-2xl p-6">
            <a href="/" class="text-xl font-bold">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Rickshaw Garage
                    </h1>
                    <p class="text-gray-600 text-sm font-medium">Smart Inventory Management System</p>
                </div>
            </a>
            <a class="text-white font-medium hover:shadow-lg px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 rounded-lg transition-all duration-300 transform hover:scale-105" href="/create">Add New Item</a>
        </div>

        <!-- Edit Item Form -->
        <div class="bg-white shadow rounded-2xl p-6 mb-10">
            <h3 class="text-xl font-semibold mb-4">Edit - {{ $inventory->item_name }}</h3>
            <form method="post" action="{{ route('update', $inventory->id) }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

                    <div>
                        <label for="item_name" class="block text-sm font-medium mb-1">Item Name</label>
                        <input type="text" id="item_name" name="item_name" required value="{{ $inventory->item_name }}"
                            placeholder="e.g., Brake Pads, Engine Oil, Tire"
                            class="w-full rounded-xl border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="quantity" class="block text-sm font-medium mb-1">Quantity</label>
                        <input type="number" id="quantity" name="quantity" min="0" required value="{{ $inventory->quantity }}"
                            placeholder="0"
                            class="w-full rounded-xl border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium mb-1">Price</label>
                        <input type="number" id="price" name="price" min="0" step="0.01" required value="{{ $inventory->price }}"
                            placeholder="e.g., 100.00"
                            class="w-full rounded-xl border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="total_price" class="block text-sm font-medium mb-1">Total Price</label>
                        <input type="number" id="total_price" name="total_price" readonly value="{{ $inventory->total_price }}"
                            class="w-full rounded-xl border border-gray-300 p-2 bg-gray-100">
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium mb-1">Location</label>
                        <select id="location" name="location" required
                            class="w-full rounded-xl border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Location</option>
                            <option value="Main Workshop" {{ $inventory->location == 'Main Workshop' ? 'selected' : '' }}>Main Workshop</option>
                            <option value="Storage Room" {{ $inventory->location == 'Storage Room' ? 'selected' : '' }}>Storage Room</option>
                            <option value="Parts Counter" {{ $inventory->location == 'Parts Counter' ? 'selected' : '' }}>Parts Counter</option>
                            <option value="Tool Shed" {{ $inventory->location == 'Tool Shed' ? 'selected' : '' }}>Tool Shed</option>
                            <option value="Office" {{ $inventory->location == 'Office' ? 'selected' : '' }}>Office</option>
                            <option value="Outdoor Storage" {{ $inventory->location == 'Outdoor Storage' ? 'selected' : '' }}>Outdoor Storage</option>
                        </select>
                    </div>

                </div>

                <button type="submit"
                    class="mt-6 px-6 py-2 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700">
                    Update Item
                </button>
            </form>


            <!-- Footer -->
            <footer class="bg-white rounded-2xl shadow-lg p-8 mt-[300px]">
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
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                                </svg>
                            </a>
                            <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.748-1.378 0 0-.597 2.291-.744 2.869-.267 1.053-1.01 2.375-1.5 3.182C9.516 23.815 10.751 24.001 12.017 24.001c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.017 24.007 5.367 18.641.001 12.017.001z" />
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

            <script>
                const quantityInput = document.getElementById('quantity');
                const priceInput = document.getElementById('price');
                const totalInput = document.getElementById('total_price');

                function calculateTotal() {
                    const quantity = parseFloat(quantityInput.value) || 0;
                    const price = parseFloat(priceInput.value) || 0;
                    totalInput.value = (quantity * price).toFixed(2);
                }

                // Calculate total on page load
                document.addEventListener('DOMContentLoaded', function() {
                    calculateTotal();
                });

                quantityInput.addEventListener('input', calculateTotal);
                priceInput.addEventListener('input', calculateTotal);
            </script>

        </div>

    </div>
</body>

</html>