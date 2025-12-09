# TrackMyClass

TrackMyClass is a student management system built with Laravel 10 and Tailwind CSS. This application allows teachers to manage student records with a user-friendly interface. Each teacher can only view and manage their own students, ensuring data privacy and security.

## Features

### Authentication System
- User registration with email and password
- User login with "Remember Me" functionality
- Password reset with email verification
- Email verification for enhanced security
- Profile management with password change capability
- Secure session handling with CSRF protection

### Student Management
- Add new student records with name and roll number
- View all students in a paginated dashboard
- Edit existing student information
- Delete student records with confirmation
- User ownership: Each teacher can only see and manage their own students
- Pagination support for large datasets (10 records per page)

### User Interface
- Modern, responsive UI built with Tailwind CSS
- Gradient buttons and backgrounds
- Smooth animations and hover effects
- Password toggle: Eye icon to show/hide passwords in all password fields
- Responsive design for desktop, tablet, and mobile devices
- SVG icons for better visual communication
- Toast notifications for success/error messages
- Empty state design when no records exist

## Technologies Used

### Backend
- Laravel 10 
- Laravel Breeze
- Laravel Sanctum
- MySQL 

### Frontend
- Tailwind CSS 3 
- Alpine.js 
- Vite 
- Blade Templates 


## Installation Instructions

### Step 1: Clone the Repository
```bash
git clone https://github.com/Shahzad-Ali-44/TrackMyClass.git
cd TrackMyClass
```

### Step 2: Install PHP Dependencies
```bash
composer install
```

### Step 3: Install Node Dependencies
```bash
npm install
```

### Step 4: Set Up Environment
Create a `.env` file by copying the example file:
```bash
cp .env.example .env
```

Update the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=trackmyclass
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 5: Generate Application Key
```bash
php artisan key:generate
```

### Step 6: Run Database Migrations
```bash
php artisan migrate
```

This will create the following tables:
- `users` - User authentication
- `student_forms` - Student records 
- `password_reset_tokens` - Password reset functionality
- `personal_access_tokens` - API authentication

### Step 7: Build Frontend Assets

For Development:
```bash
npm run dev
```

For Production:
```bash
npm run build
```

### Step 8: Start the Development Server
```bash
php artisan serve
```

Open your browser and navigate to `http://localhost:8000`.

### Step 9: Create Your First Account
- You'll see the welcome page
- Click "Register" to create your account
- Fill in your name, email, and password
- You'll be automatically logged in and redirected to the dashboard


## Email Configuration 

To enable password reset emails, configure email settings in your `.env` file:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```



## Contributing

Contributions are welcome. Feel free to fork the repository, make improvements, and submit a pull request.

1. Fork the repository
2. Create a new branch for your feature/bug fix:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes and push to your branch:
   ```bash
   git commit -m "Add some amazing feature"
   git push origin feature-name
   ```
4. Open a pull request

## License

This project is licensed under the [MIT License](LICENSE).

## Author

**Shahzad Ali**
- LinkedIn: [Shahzad Ali](https://www.linkedin.com/in/shahzad-ali-8817632ab/)


