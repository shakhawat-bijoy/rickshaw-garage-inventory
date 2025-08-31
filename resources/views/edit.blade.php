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
        <div class="flex justify-between mb-10">
            <h1 class="text-xl font-bold">Welcome to the Rickshaw Garage</h1>
            <a class="text-black-500 hover:underline px-4 py-2 bg-slate-400" href="/create">Add New Item</a>
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