# Rickshaw Garage - Smart Inventory Management System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.0-red.svg" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue.svg" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License">
  <img src="https://img.shields.io/badge/Status-Active-brightgreen.svg" alt="Status">
</p>

A modern, responsive inventory management system specifically designed for rickshaw garages. Built with Laravel 12 and featuring a beautiful Tailwind CSS interface, this system helps garage owners efficiently track parts, monitor stock levels, and manage their inventory operations.

## ✨ Features

### 🎯 Core Functionality
- **Smart Inventory Tracking** - Add, edit, update, and delete inventory items
- **Real-time Stock Monitoring** - Automatic low stock alerts (items with quantity < 5)
- **Multi-location Support** - Track items across different storage locations
- **Price Management** - Individual and total price calculations
- **Search & Filter** - Advanced search by item name, location, or status

### 🎨 User Experience
- **Responsive Design** - Works seamlessly on desktop, tablet, and mobile
- **Interactive Dashboard** - Dynamic banner slider with inventory statistics
- **Modern UI** - Clean, professional interface with Tailwind CSS
- **Toast Notifications** - Real-time feedback for user actions
- **Confirmation Modals** - Safe deletion with confirmation dialogs

### 📊 Dashboard Analytics
- Total items count
- Total stock quantity
- Storage locations overview
- Low stock items alert
- Total inventory value calculation

### 🏪 Storage Locations
- Main Workshop
- Storage Room
- Parts Counter
- Tool Shed
- Office
- Outdoor Storage

## 🚀 Technology Stack

- **Backend Framework:** Laravel 12.0
- **Frontend:** Blade Templates + Tailwind CSS
- **Database:** SQLite (configurable)
- **JavaScript:** Vanilla JS with modern ES6+
- **Notifications:** Toastify.js
- **Icons:** Heroicons (via Tailwind)
- **PHP Version:** 8.2+

## 📦 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM (for asset compilation)
- SQLite (or your preferred database)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd rickshaw-garage
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install and build frontend assets**
   ```bash
   npm install
   npm run build
   ```

4. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   # Create SQLite database file
   touch database/database.sqlite
   
   # Run migrations
   php artisan migrate
   
   # (Optional) Seed test data
   php artisan db:seed
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   Open your browser and visit: `http://localhost:8000`

## 🗄️ Database Schema

### Inventories Table
| Column | Type | Description |
|--------|------|-------------|
| id | Primary Key | Auto-incrementing ID |
| item_name | String | Name of the inventory item |
| quantity | Integer | Current stock quantity |
| price | Decimal(10,2) | Individual item price |
| total_price | Decimal(10,2) | Total price (quantity × price) |
| location | String | Storage location |
| created_at | Timestamp | Record creation time |
| updated_at | Timestamp | Last update time |

## 🛣️ Routes

| Method | URI | Action | Name |
|--------|-----|--------|------|
| GET | `/` | Show dashboard with all inventory items | home |
| GET | `/create` | Show add new item form | - |
| POST | `/store` | Store new inventory item | store |
| GET | `/edit/{id}` | Show edit form for specific item | edit |
| POST | `/update/{id}` | Update specific inventory item | update |
| DELETE | `/delete/{id}` | Delete specific inventory item | delete |

## 🎛️ Key Components

### Controllers
- **InventoryController** - Handles all CRUD operations for inventory management

### Models
- **Inventory** - Eloquent model for inventory items
- **User** - Default Laravel user model (for future authentication features)

### Views
- **welcome.blade.php** - Main dashboard with inventory listing
- **create.blade.php** - Add new inventory item form
- **edit.blade.php** - Edit existing inventory item form

### Features in Detail

#### 🔍 Search Functionality
- Real-time search as you type
- Search across item names, locations, and stock status
- Instant results with no page reload

#### 📱 Responsive Design
- Mobile-first approach
- Optimized for all screen sizes
- Touch-friendly interface

#### 🚨 Smart Alerts
- Automatic low stock detection
- Visual indicators for stock status
- Toast notifications for user actions

#### 🎠 Interactive Banner
- Auto-rotating promotional banners
- Manual navigation with dots and arrows
- Pause on hover functionality

## 🔧 Configuration

### Environment Variables
Key environment variables in your `.env` file:
```env
APP_NAME="Rickshaw Garage"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

### Customization Options

#### Adding New Storage Locations
Update the location options in both `create.blade.php` and `edit.blade.php`:
```html
<option>Your New Location</option>
```

#### Modifying Low Stock Threshold
Currently set to 5 items. To change, update the condition in:
- Dashboard statistics
- Status indicators
- Any related calculations

## 🧪 Development & Testing

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
./vendor/bin/pint
```

### Development Server with Watching
```bash
composer run dev
```

This starts:
- Laravel development server
- Queue worker
- Application logs
- Vite asset watcher

## 📝 Usage Examples

### Adding a New Item
1. Click "Add New Item" button
2. Fill in the form:
   - Item Name: "Brake Pads"
   - Quantity: 10
   - Price: 50.00
   - Location: "Main Workshop"
3. Total price is calculated automatically
4. Click "Add Item" to save

### Searching Inventory
- Use the search box to find items by name, location, or status
- Results update in real-time as you type
- Clear search to show all items

### Managing Stock
- Items with quantity < 5 are automatically marked as "Low Stock"
- Use the dashboard stats to monitor overall inventory health
- Edit items to update quantities and prices

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Create a Pull Request

## 📋 TODO / Future Enhancements

- [ ] User authentication and role-based access
- [ ] Inventory reporting and analytics dashboard
- [ ] Export functionality (CSV, PDF)
- [ ] Barcode scanning integration
- [ ] Automated reorder points and purchase orders
- [ ] Multi-language support
- [ ] Advanced filtering options
- [ ] Inventory history tracking
- [ ] API endpoints for mobile app integration
- [ ] Email notifications for low stock

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**
```bash
# Ensure SQLite file exists and is writable
touch database/database.sqlite
chmod 664 database/database.sqlite
```

**Asset Loading Issues**
```bash
# Rebuild assets
npm run build
php artisan config:clear
```

**Permission Errors**
```bash
# Set proper permissions
chmod -R 755 storage bootstrap/cache
```

## 🔒 Security

- CSRF protection on all forms
- Input validation on all user inputs
- SQL injection prevention through Eloquent ORM
- XSS protection through Blade templating

## 📄 License

This project is open-sourced software.

## 👨‍💻 Developer

**Shakhawat Bijoy**  
*Passionate Frontend Developer*

- 🌐 Website: [shakhawat-bijoy.vercel.app](https://shakhawat-bijoy.vercel.app/)
- 💼 LinkedIn: [linkedin.com/in/shakhawat-bijoy](https://linkedin.com/in/shakhawat-bijoy)
- 📘 Facebook: [facebook.com/bijoy1x](https://www.facebook.com/bijoy1x)

## 📞 Support

For support, please contact:
- 📧 Email: shakhawatbijoy1@gmail.com
- 📱 Phone: +880 1704-446708
- 📍 Address: 932/East Raza Bazar, Dhanmondi, Dhaka 1205, Bangladesh

---

**Built with ❤️ for the rickshaw garage community in Bangladesh**