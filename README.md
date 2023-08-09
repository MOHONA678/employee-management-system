# Employee Management System


#### Installation

1. Clone the **Employee Management System** repository to your local machine using the following command:
```bash
git clone https://github.com/shawonk007/learnopia-lms.git
```

2. Navigate to the project directory:
```bash
cd learnopia-lms
```

3. Install the required `PHP` dependencies using Composer:
```bash
composer install
```

4. Install `Node.js` dependencies
###### Using npm:
```bash
npm install
```
or,
###### using Yarn:
```bash
yarn
```

5. Generate `Vite` serve manifest:
###### Using npm:
```bash
npm run build
```
or,
###### using Yarn:
```bash
yarn build
```

6. Create a new MySQL database for Learnopia and update the `.env` file with your database credentials:
```bash
cp .env.example .env
```

7. Generate a unique application key:
```bash
php artisan key:generate
```

8. Run the database migrations and seed the database with initial data:
```bash
php artisan migrate --seed
```

9. Start the development server:
```bash
php artisan serve
```

Congratulations! Employee Management System should now be up and running at `http://localhost:8000`.