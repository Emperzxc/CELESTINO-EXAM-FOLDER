# CELESTINO-EXAM FOLDER

## Laravel Exam Installation

### 1. Clone the Git Repository

```bash
git clone https://github.com/Emperzxc/CELESTINO-EXAM-FOLDER
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

### 5. Seed the Database
```bash
php artisan db:seed
```
This will make sure that the data will populate the databse using the CSV file and Faker. 
### 6. Generate Application Key
```bash
php artisan key:generate
```
### 7. Serve the Application
```bash
php artisan serve
```
The application will be available at http://localhost:8000.

