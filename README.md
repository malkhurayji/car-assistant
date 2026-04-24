# 🚗 Car Diagnostic Assistant

A smart, web-based diagnostic platform that helps car owners identify and troubleshoot vehicle issues — without visiting a service center. Built as a graduation project by **Group YM24 at Taibah University, Yanbu (2024)**.

The platform bridges the gap between everyday users and professional mechanics through **AI-based engine diagnostics**, symptom reporting, nearby mechanic search, and a community-driven support system.

---

## 📋 Abstract

As reliance on cars increases, so does the need to understand how to handle breakdowns. Car breakdowns are not just inconvenient — they can pose a safety risk to drivers and passengers, and affect traffic flow. Due to the increasing complexity of modern vehicles, it has become difficult for ordinary car owners to diagnose and address problems effectively, while also struggling to reach expert mechanics quickly.

**Car Diagnostic Assistant** solves this by providing an intuitive web platform that guides users in identifying symptoms, entering problems, and receiving detailed descriptions and suggested solutions. The platform also connects users directly with specialized mechanics and fosters a community where users can share experiences — ultimately reducing repair costs and improving the overall automotive experience.

---

## 🎯 Objectives

- Reduce the time and cost of traditional vehicle inspections
- Help users diagnose issues quickly using AI-powered predictions
- Provide easy access to nearby mechanic consultations
- Foster community knowledge-sharing between users and mechanics
- Improve road safety and vehicle performance awareness

---

## ✨ Features

### 👤 For Car Owners (Users)
- Register and manage their vehicle profile
- Report car symptoms with descriptions and images
- Get **AI-powered engine health recommendations** based on sensor readings
- Find nearby mechanics filtered by city
- Rate mechanics after service
- Browse parts database and view issue history

### 🧑‍🔧 For Mechanics
- Browse all reported symptoms from users
- Diagnose issues and log solutions with severity levels
- View parts and problem details
- Manage their own activity history and profile

### 🛠️ For Admins
- Full management of users, mechanics, vehicles, parts, and categories
- View and manage all AI recommendations and reported issues
- Browse user and mechanic activity logs

### 🤖 AI Engine (Random Forest)
- User inputs **engine temperature**, **oil pressure**, and **engine cycles**
- Data is saved to the database with `status = processing`
- A background Python script (`Link.py`) picks up the request, runs it through a trained **Random Forest classifier** (with a fitted StandardScaler), and writes the prediction result back
- The page auto-refreshes every 3 seconds until the result is ready
- Model files: `optimized_random_forest5.1.pkl` + `scaler5.1.pkl`

```
User submits: Engine_temperature, Oil_pressure, Engine_cycle
         │
         ▼
  Saved to DB with status = pending
         │
         ▼
  Link.py polls DB → scales features → Random Forest predicts
         │
         ▼
  Result written back to DB (status = done)
         │
         ▼
  recommendation.php auto-refreshes → result displayed to user
```

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML, CSS, Bootstrap 4, JavaScript, jQuery |
| Backend | PHP (procedural) |
| Database | MySQL |
| AI / ML | Python 3, scikit-learn (Random Forest, StandardScaler) |
| Local Dev | XAMPP 8.2 (Apache + MySQL) |
| Containerization | Docker + Docker Compose |

---

## 🗄️ Database Schema

The system uses **10 relational tables**:

| Table | Description |
|---|---|
| `users` | Car owner accounts and profiles |
| `admins` | Admin accounts |
| `mechanics` | Mechanic accounts, specialization, and city |
| `vehicles` | User-registered vehicles |
| `categories` | Symptom/problem categories |
| `symptoms` | Reported car symptoms with images |
| `issues` | Diagnosed problems logged by mechanics or users |
| `parts` | Car parts database with descriptions |
| `rates` | User ratings for mechanics |
| `recommendations` | AI engine analysis requests and results |
| `cities` | City lookup table for mechanic search |

---

## 🗂️ Project Structure

```
car-assistant/
├── AI/
│   ├── Link.py                          # Polls DB, runs prediction, writes result
│   ├── optimized_random_forest5.1.pkl   # Trained Random Forest model
│   └── scaler5.1.pkl                    # Fitted feature scaler
├── database/
│   └── car_assistant.sql                # Full schema + seed data
├── web/
│   ├── css/ fonts/ images/ js/ style/ vendor/
│   ├── conn.php                         # DB connection (env-variable aware)
│   ├── home.php / index.php / login.php / logout.php
│   ├── user_signup.php / user_update.php / user_activities.php
│   ├── symptoms.php / symptom.php / add_symptom.php
│   ├── add_issue.php / add_recommendation.php / recommendation.php
│   ├── near_mechanics.php / add_rate.php
│   ├── mechanic_signup.php / mechanic_update.php
│   ├── mechanic_activities.php / mechanic_symptoms.php / all_symptoms.php
│   └── (admin: users, mechanics, vehicles, parts, categories management)
├── docker-compose.yml
├── README.md
└── .gitignore
```

---

## 🚀 Running Locally (XAMPP)

### Prerequisites
- [XAMPP 8.2](https://www.apachefriends.org/) installed
- Python 3.x installed
- Required Python packages:

```bash
pip install scikit-learn pymysql
```

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/malkhurayji/car-assistant.git
   ```

2. **Copy web files to XAMPP**
   ```
   Copy the contents of web/ into:
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
   > Keep this terminal open. It polls the database for pending recommendations and processes them automatically.

5. **Open the app**
   ```
   http://localhost/car_assistant/home.php
   ```

---

## 🐳 Running with Docker (One Command)

If you have Docker installed, you can run the web app and database with no XAMPP needed:

```bash
docker compose up
```

Then open: `http://localhost:8080/home.php`

> The AI script still runs separately:
> ```bash
> cd AI && python Link.py
> ```

A **phpMyAdmin** interface is also available at `http://localhost:8081`

---

## 🧪 Testing

The following scenarios were validated during development:

| Test | Description |
|---|---|
| TC-01 | Login with empty email field |
| TC-02 | Login with incorrectly formatted email |
| TC-03 | Login with password under 8 characters |
| TC-04 | Login with empty password field |
| TC-05 | Registration with all fields empty |
| TC-06 | Registration with incorrectly formatted email |
| TC-07 | Registration with password under 8 characters |
| TC-08 | Registration with phone number under 10 digits |

---

## ⚠️ Known Limitations

This is an academic project. The following would be addressed in a production version:

- SQL queries use string interpolation — prepared statements would be used in production
- Passwords are stored as plain text — bcrypt hashing would replace this
- The AI script polls the database on a fixed interval rather than using a proper job queue
- No server-side input validation beyond basic HTML `required` attributes
- Mechanic search is city-based rather than GPS/radius-based

---

## 🔮 Future Improvements

- 📱 Mobile app with real-time push notifications and periodic maintenance alerts
- 🧠 Enhanced AI model using historical data and similar-case pattern matching
- 🔌 OBD2 integration for automatic live fault code reading
- 🌍 Multilingual support to reach more users
- 🤝 Partnership system with certified repair shops and spare parts suppliers (booking + purchasing)
- 👮 Forum moderation system to ensure quality and prevent misinformation
- ⭐ Expert and content rating system for credibility

---

## 👨‍💻 Team YM24 — Taibah University, Yanbu (2024)

| Role | Name |
|---|---|
| Team Leader | Mohammed Alkhurayji |
| Member | Khalid Alrehaili |
| Member | Akram Alshanqiti |
| Member | Turki Alfuhaydi |
| Member | Osama Alshanqiti |
| Member | Mohammed Khayyat |
| Member | Othman Althubiti |
| Supervisor | Dr. Abdulhadi Al-Ahmadi |

> 📄 Full project report (system analysis, ER diagrams, DFD, data dictionary) available upon request.

---

## 📄 License & Acknowledgment

This project was developed for academic purposes at **Taibah University — Yanbu**. Special thanks to our supervisor Dr. Abdulhadi Al-Ahmadi, our families, and peers for their support throughout the project.

