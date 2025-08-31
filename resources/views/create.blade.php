<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Rickshaw Garage</title>
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="my-auto mx-8">
        <!-- Header -->
        <div class="flex justify-between items-center my-4 mb-10">
            <a class="text-2xl font-bold" href="/">Welcome to the Rickshaw Garage</a>
            <a class="text-blue-600 font-medium hover:underline" href="/">Back to Home</a>
        </div>

            <!-- Add New Item Form -->
            <div class="bg-white shadow rounded-2xl p-6 mb-10">
                <h3 class="text-xl font-semibold mb-4">Add New Inventory Item</h3>
                <form method="post" action="{{ route('store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                        <div>
                            <label for="item_name" class="block text-sm font-medium mb-1">Item Name</label>
                            <input type="text" id="item_name" name="item_name" required
                                placeholder="e.g., Brake Pads, Engine Oil, Tire"
                                class="w-full rounded-xl border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium mb-1">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="0" required
                                placeholder="0"
                                class="w-full rounded-xl border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium mb-1">Price</label>
                            <input type="number" id="price" name="price" min="0" step="0.01" required
                                placeholder="e.g., 100.00"
                                class="w-full rounded-xl border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="total_price" class="block text-sm font-medium mb-1">Total Price</label>
                            <input type="number" id="total_price" name="total_price" readonly
                                class="w-full rounded-xl border border-gray-300 p-2 bg-gray-100">
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium mb-1">Location</label>
                            <select id="location" name="location" required
                                class="w-full rounded-xl border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Location</option>
                                <option>Main Workshop</option>
                                <option>Storage Room</option>
                                <option>Parts Counter</option>
                                <option>Tool Shed</option>
                                <option>Office</option>
                                <option>Outdoor Storage</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                        class="mt-6 px-6 py-2 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700">
                        Add Item
                    </button>
                </form>

                <script>
                    const quantityInput = document.getElementById('quantity');
                    const priceInput = document.getElementById('price');
                    const totalInput = document.getElementById('total_price');

                    function calculateTotal() {
                        const quantity = parseFloat(quantityInput.value) || 0;
                        const price = parseFloat(priceInput.value) || 0;
                        totalInput.value = (quantity * price).toFixed(2);
                    }

                    quantityInput.addEventListener('input', calculateTotal);
                    priceInput.addEventListener('input', calculateTotal);
                </script>

            </div>

   


        </div>
    </div>
</body>

</html>