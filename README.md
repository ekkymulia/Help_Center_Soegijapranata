# Soegijapranata Catholic University AI HELP CENTER

## FICPACT CUP 2024

### Contributors:
- Ekky Mulia Lasardi
- Luthfi Dika Chandra

## Project Setup

### Laravel Installation
1. Run the following command in the shell:
   ```
   $ composer install
   ```
2. Copy the `.env.example` file to `.env`:
   ```
   $ cp .env.example .env
   ```
   
### Database Configuration
1. Create a new database in PHPMyAdmin:
   - Database name: `hc_soegija`
2. Import the SQL file `hc_soegija.sql` from the project directory into the created database.

### Running the Project
1. Run the following command to start the Laravel development server:
   ```
   $ php artisan serve
   ```

## Project Configuration

### Versions
1. PHP Version: 8.3.3 | 8.1.17
2. PHPMyAdmin Server Version: 10.4.28-MariaDB
3. Laravel Version: 10

## Default User Accounts

1. **Admin:**
   - User: admin@gmail.com
   - Password: password

2. **Keuangan:**
   - User: keuangan@gmail.com
   - Password: password

3. **Pimpinan Keuangan:**
   - User: pimpinan_keuangan@gmail.com
   - Password: password

4. **Akademik:**
   - User: akademik@gmail.com
   - Password: password

5. **Pimpinan Akademik:**
   - User: pimpinan_akademik@gmail.com
   - Password: password

6. **Mahasiswa:**
   - User: mahasiswa2@gmail.com
   - Password: password


## notes
untuk project ini tidak disarankan memakai php artisan migrate, karena db:seed tidak sempat dikonfigurasi
lebih cepat mengimport database

Jika terdapat error saat penginstalan dependency composer install, boleh mencoba menghapus file composer.lock kemudian mencoba composer install kembali. Jika tetap tidak bisa, baru menyamakan versi php.