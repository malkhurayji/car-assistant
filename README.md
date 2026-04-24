# 🚗 Car Assistant

A full-stack web application that helps car owners diagnose vehicle issues, find nearby mechanics, and get AI-powered engine health recommendations.

Built as a graduation project using **PHP**, **MySQL**, **Python**, and a trained **Random Forest** machine learning model.

---


## ✨ Features

### For Car Owners (Users)
- Register and manage their vehicle profile
- Report car symptoms with descriptions and images
- Get AI-powered engine health recommendations based on sensor readings
- Find nearby mechanics filtered by city
- Rate mechanics after service

### For Mechanics
- Browse all reported symptoms from users
- Diagnose issues and log solutions with severity levels
- Manage their own activity history
- Update their profile and services

### For Admins
- Full CRUD management of users, mechanics, vehicles, parts, and categories
- View and manage all recommendations and reported issues

### 🤖 AI Engine (Random Forest)
- User inputs **engine temperature**, **oil pressure**, and **engine cycles**
- Data is saved to the database with `status = processing`
- A background Python script (`Link.py`) picks up the request, runs it through a trained **Random Forest classifier** (with a fitted scaler), and writes the prediction result back
- The PHP page auto-refreshes every 3 seconds until the result is ready
- Model files: `optimized_random_forest5.1.pkl` + `scaler5.1.pkl`

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML, CSS, Bootstrap 4, JavaScript, jQuery |
| Backend | PHP (procedural) |
| Database | MySQL |
| AI / ML | Python 3, scikit-learn (Random Forest, StandardScaler) |
| Local Dev | XAMPP (Apache + MySQL) |

---

## 🗂️ Project Structure

```
car-assistant/
├── AI/
│   ├── Link.py                        # Background script: reads DB, runs prediction, writes result
│   ├── optimized_random_forest5.1.pkl # Trained Random Forest model
│   └── scaler5.1.pkl                  # Fitted feature scaler
├── database/
│   └── car_assistant.sql              # Full database schema + seed data
├── images/                            # Uploaded images (symptoms, profiles)
├── css/                               # Custom stylesheets
├── fonts/                             # Font Awesome, Poppins, Material Icons
├── vendor/                            # Bootstrap, jQuery, Select2, Animate.css
├── style/                             # Landing page assets
├── conn.php                           # Database connection + session start
├── index.php                          # Entry point (redirects to home)
├── home.php                           # Public landing page
├── login.php                          # Shared login (admin / user / mechanic)
├── logout.php                         # Session destroy + redirect
│
├── user_signup.php                    # Car owner registration
├── user_update.php                    # Update user profile
├── user_activities.php                # User's issue history
├── symptoms.php                       # User: browse/report symptoms
├── symptom.php                        # User: view single symptom detail
├── add_symptom.php                    # User: submit new symptom
├── add_issue.php                      # User/Mechanic: log a diagnosis
├── add_recommendation.php             # User: submit engine sensor data for AI
├── recommendation.php                 # User: view AI prediction result
├── near_mechanics.php                 # User: find mechanics in their city
├── add_rate.php                       # User: rate a mechanic
│
├── mechanic_signup.php                # Mechanic registration
├── mechanic_update.php                # Update mechanic profile
├── mechanic_activities.php            # Mechanic's activity log
├── mechanic_symptoms.php              # Mechanic: browse assigned symptoms
├── all_symptoms.php                   # Mechanic: all symptoms in system
│
├── users.php / users-delete.php       # Admin: manage users
├── mechanics.php / mechanics-delete.php # Admin: manage mechanics
├── vehicles.php / vehicles-delete.php # Admin: manage vehicles
├── parts.php / parts-delete.php       # Admin: manage car parts
├── categories.php / categories-delete.php # Admin: manage symptom categories
├── recommendations.php / recommendations-delete.php # Admin: view AI results
├── add_vehicle.php / update_vehicle.php
├── add_category.php / update_category.php
├── add_part.php / update_part.php
│
├── header.php                         # Authenticated user nav header
└── visitor_header.php                 # Public nav header
```

---

## 🚀 Running Locally (XAMPP)

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) installed
- Python 3.x installed
- `scikit-learn`, `pymysql` (or `mysql-connector-python`) installed

```bash
pip install scikit-learn pymysql
```

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/car-assistant.git
   ```

2. **Copy web files to XAMPP**
   ```
   Copy everything except the AI/ folder into:
   C:/xampp/htdocs/car_assistant/
   ```

3. **Import the database**
   - Open `http://localhost/phpmyadmin`
   - Create a new database called `car_assistant`
   - Import `database/car_assistant.sql`

4. **Start the AI background script**
   ```bash
   cd AI/
   python Link.py
   ```
   > Keep this running in a terminal. It polls the database for pending recommendations and processes them.

5. **Open the app**
   ```
   http://localhost/car_assistant/home.php
   ```

### Default Login
| Role | Email | Password |
|---|---|---|
| Admin | _(check your DB `admins` table)_ | — |
| User | _(register via signup)_ | — |
| Mechanic | _(register via signup)_ | — |

---

## 🐳 Running with Docker (One Command)

If you have Docker installed, you can run the entire web app + database without XAMPP:

```bash
docker compose up
```

Then open: `http://localhost:8080/home.php`

> **Note:** The AI Python script still needs to run separately:
> ```bash
> cd AI && python Link.py
> ```

---

## ⚠️ Known Limitations

This is an academic project. The following are known issues that would be addressed in a production version:

- SQL queries use string interpolation (vulnerable to SQL injection) — prepared statements would be used in production
- Passwords are stored in plain text — bcrypt hashing would be used in production  
- The AI script polls the database on a fixed interval rather than using a proper job queue
- No input validation on several forms beyond basic HTML `required` attributes

---

## 🧠 How the AI Works

```
User submits:
  engine_temperature, oil_pressure, engine_cycles
         │
         ▼
  Saved to DB with status = 0 (pending)
         │
         ▼
  Link.py polls DB every few seconds
         │
         ▼
  Features scaled with StandardScaler (scaler5.1.pkl)
         │
         ▼
  Random Forest model predicts engine health status
         │
         ▼
  Result written back to DB (status = 1)
         │
         ▼
  recommendation.php auto-refreshes → shows result
```

---

## 👨‍💻 Author

**Mohammed Alkhurayji**  
Graduation Project — Taibah University, 2025

---

## 📄 License

This project is for educational purposes.
