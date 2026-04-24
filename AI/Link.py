import time
import joblib
import pymysql
import pandas as pd
import numpy as np
from sklearn.exceptions import NotFittedError

# Load the trained model and scaler
try:
    model = joblib.load("optimized_random_forest5.1.pkl")
    scaler = joblib.load("scaler5.1.pkl")
except Exception as e:
    print(f"Error loading model or scaler: {e}")
    exit()

# Infinite loop to check new data every 3 seconds
while True:
    try:
        # Connect to the database
        connection = pymysql.connect(
            host='localhost',         # Modify if different
            user='root',              # Your DB user
            password='',              # Your DB password
            db='car_assistant',       # Database name
            charset='utf8mb4',
            cursorclass=pymysql.cursors.DictCursor
        )

        with connection:
            with connection.cursor() as cursor:
                # Get rows with status = 0
                query = "SELECT * FROM recommendations WHERE status = 0"
                cursor.execute(query)
                rows = cursor.fetchall()

                if rows:
                    for row in rows:
                        try:
                            # Extract needed features
                            input_data = pd.DataFrame([{
                                'Engine rpm': row['engine_cycles'],
                                'Lub oil pressure': row['oil_pressure'],
                                'Coolant temp': row['engine_temperature']
                            }])
                            
                            # Scale input
                            scaled_input = scaler.transform(input_data)

                            # Predict using model
                            prediction = model.predict_proba(scaled_input)[0][1]  # Probability of failure

                            # Determine result
                            result = "Yes" if prediction > 0.5 else "No"

                            # Update the result and status in the database
                            update_query = """
                            UPDATE recommendations
                            SET result = %s, status = 1
                            WHERE id = %s
                            """
                            cursor.execute(update_query, (result, row['id']))
                            connection.commit()
                        except Exception as pred_err:
                            print(f"Prediction error for row ID {row['id']}: {pred_err}")
                else:
                    print("No new entries to process.")

    except Exception as db_err:
        print(f"Database connection or query error: {db_err}")

    # Wait 3 seconds before checking again
    time.sleep(3)
