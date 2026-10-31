LA10 – Eloquent ORM and Lookup Table

G1. Which column did you turn into a table, and why that one and not another?

I turned the genre column into a separate genres table because multiple movies can share the same genre. This avoids repeating genre names in the movies table and makes the database more organized.

G2. What number did Screenshot 6 show, and why exactly that number?

Screenshot 6 showed 6 queries. One query retrieved the five movies, and five additional queries retrieved the genre of each movie because eager loading was not yet used.

G3. Your belongsTo method is named in the singular. What would break if you made it plural?

The relationship method is named genre() because each movie belongs to one genre. If I renamed it to genres() without updating the other code, references such as $movie->genre and with('genre') would no longer work.