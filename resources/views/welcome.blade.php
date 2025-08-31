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

<body class="bg-gray-50">

    <div class="mx-8 my-8">
        <div class="flex justify-between mb-10">
            <h1 class="text-xl font-bold">Welcome to the Rickshaw Garage</h1>
            <a class="text-blue-500 hover:underline" href="/create">Add New Item</a>
        </div>

        <div class="mx-auto max-w-[1320px] p-6">
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
                <input type="text" id="searchInput" placeholder="Search inventory..."
                    class="w-full rounded-xl border border-gray-300 p-2">
            </div>

            <!-- Inventory Table -->
            <div class="bg-white shadow rounded-2xl overflow-hidden">
                <div class="bg-gray-100 px-6 py-3 text-lg font-semibold">
                    Current Inventory
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse min-w-[600px]">
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
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 font-medium">{{ $inventory->item_name }}</td>
                                <td class="p-3">{{ $inventory->quantity }}</td>
                                <td class="p-3">{{ $inventory->location }}</td>
                                <td class="p-3 font-semibold {{ $inventory->quantity < 5 ? 'text-red-600' : 'text-green-600' }}">
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
                                        <button class="px-3 py-1 text-sm rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                                            Delete
                                        </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

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

    </div>
</body>

</html>