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

<body class="bg-gray-50 mx-auto max-w-[1320px]">

    <div class="my-8">
        <div class="flex justify-between mb-10">
            <h1 class="text-xl font-bold">Welcome to the Rickshaw Garage</h1>
            <a class="text-black-500 hover:underline px-4 py-2 bg-slate-400" href="/create">Add New Item</a>
        </div>

        <div class="mx-auto max-w-[1320px]">
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

    </div>

    <script>
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