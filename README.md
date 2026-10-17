Lab Activity 9

F1. Which column did you make nullable, and why that one and not another?
I made genre nullable because a movie can be added before it is classified. The title, rating, year and is_showing are always known, so they must never be empty.

F2. Which step failed first for you, and what did the error say?
The first failure was php artisan migrate:fresh --seed. It said Class "Database\Seeders\Movie" not found because I forgot use App\Models\Movie; in MovieSeeder.php.

F3. You changed no Blade file in Part D, yet your pages still work. Why not?
My controller sends the same variable names ($movies, $movie) to the same views. An Eloquent model gives Blade the same values the old array did, so only the data source changed.
