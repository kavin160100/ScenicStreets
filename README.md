🌳 ScenicStreets

ScenicStreets is a lightweight web application that visualizes urban roads with tree count data and scenic ratings. It allows users to load spatial road data from a PostgreSQL/PostGIS database, visualize them with dynamic color gradients, and interactively edit the attributes like tree count and scenic value.



🚀 Features

📍 Map-based visualization using Leaflet.js

🌳 Tree Count Data loaded dynamically from a PostGIS database

🎨 Color-coded Roads based on tree density (red to green gradient)

✏️ Edit Attributes: update tree count and scenic rating for any road

🔍 Filter Roads: Load roads with specific tree counts or ratings

📊 Dynamic Legend with color bar



🛠 Tech Stack

Frontend: HTML, CSS, JavaScript, Leaflet.js, jQuery

Backend: PHP

Database: PostgreSQL with PostGIS extension

Environment: XAMPP (for local development)

📦 Setup Instructions (based on my local dev setup)
These steps assume you're using XAMPP and PostgreSQL with PostGIS locally. You can adapt them for your environment if needed.

1. Clone the repository
[ScenicStreets](https://github.com/kavin160100/ScenicStreets.git)

2. Set up the database

- Create a PostgreSQL database (e.g. postgres)

- Enable PostGIS extension

- Import the required roads table with geom, tree_count, and scenic_rating fields

3. Update database connection

- Edit database credentials in the PHP files (e.g. host, user, password, dbname)

4. Run with XAMPP

- Place project folder inside htdocs

- Start Apache and PostgreSQL

- Access via: http://localhost/ScenicStreets/