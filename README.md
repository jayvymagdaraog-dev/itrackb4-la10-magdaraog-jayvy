LA10 – Eloquent ORM and Lookup Table

<<<<<<< HEAD
G1. Which column did you turn into a table, and why that one and not another?

I turned the genre column into a separate genres table because multiple movies can share the same genre. This avoids repeating genre names in the movies table and makes the database more organized.

G2. What number did Screenshot 6 show, and why exactly that number?

Screenshot 6 showed 6 queries. One query retrieved the five movies, and five additional queries retrieved the genre of each movie because eager loading was not yet used.

G3. Your belongsTo method is named in the singular. What would break if you made it plural?

The relationship method is named genre() because each movie belongs to one genre. If I renamed it to genres() without updating the other code, references such as $movie->genre and with('genre') would no longer work.
=======
F1. Which column did you make nullable, and why that one and not another?
I made genre nullable because a movie can be added before it is classified. The title, rating, year and is_showing are always known, so they must never be empty.

F2. Which step failed first for you, and what did the error say?
The first failure was php artisan migrate:fresh --seed. It said Class "Database\Seeders\Movie" not found because I forgot use App\Models\Movie; in MovieSeeder.php.

F3. You changed no Blade file in Part D, yet your pages still work. Why not?
My controller sends the same variable names ($movies, $movie) to the same views. An Eloquent model gives Blade the same values the old array did, so only the data source changed.
>>>>>>> 4f1b87e5c2d0db55b9c3b02b51fe39dfe679d7e7
