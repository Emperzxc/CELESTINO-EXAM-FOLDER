# CELESTINO-EXAM FOLDER

## Laravel Exam Installation

### 1. Clone the Git Repository

```bash
git clone <repository-url>
cd project-folder
```
### 2. Install Composer Dependencies
```bash
composer install
```
### 3. Set Up Environment Variables
```bash
cp .env.example .env
```
Update the .env file with your database credentials and other settings.

### 4. Migrate the Database
```bash
php artisan migrate
```
### 5. Generate Application Key
```bash
php artisan key:generate
```
### 6. Serve the Application
```bash
php artisan serve
```
The application will be available at http://localhost:8000.

