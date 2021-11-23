## Installation 

1. **Clone** the project. 

   ```bash
   git clone https://github.com/ayeolakenny/Eskimi-SSP.git
   ```

2. **Install** packages. 

   ```bash
   cd client 
   yarn
   ```
3. **Migrate**

   ```bash
   /server
   php artisan migrate
   ```
   
4. **Seed DB**

   ```bash
   /server
   php artisan db:seed --class=CampaignSeeder
   ```

5. **Run** the server

   ```bash
   /server
   
   php artisan serve
   ```

6. **Run** the client 

   ```bash
   /client
   
   yarn serve
   ```

## Technologies 

* [tailwindcss](https://tailwindcss.com/) for the styling

* [Laravel](https://laravel.com/) for the backend  

* [Vuejs](https://vuejs.org/) for the Frontend

## Structure

* [client](https://github.com/ayeolakenny/Eskimi-SSP/tree/main/client): With all the Frontend logic
* [server](https://github.com/ayeolakenny/Eskimi-SSP/tree/main/server): Where is the server located
