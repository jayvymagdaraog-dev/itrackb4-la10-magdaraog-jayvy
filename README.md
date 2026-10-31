1. Which column did you turn into a table, and why that one and not another?

I turned the genre column into a separate genres table because several movies can have the same genre. This makes the database more organized, avoids repeating genre names, and makes it easier to manage movie categories.

2. What number did screenshot 6 show, and why exactly that number?

Screenshot 6 showed 6 queries in total. One query retrieved all five movies, while the other five queries separately retrieved the genre of each movie because eager loading was not yet applied.

3. Your belongsTo method is named in the singular. What would break if you made it plural?

I used genre() in the belongsTo relationship because each movie belongs to only one genre. If I changed it to genres(), the existing references like with('genre') and $movie->genre would no longer work unless I updated them to match the new method name.
