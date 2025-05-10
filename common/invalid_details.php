<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invalid Login Details</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f5f5f5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            
            .error-container {
                background-color: white;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 400px;
                width: 90%;
            }
            
            .error-icon {
                color: #e74c3c;
                font-size: 48px;
                margin-bottom: 20px;
            }
            
            h1 {
                color: #e74c3c;
                margin: 0 0 15px 0;
                font-size: 24px;
            }
            
            p {
                color: #555;
                margin: 0 0 25px 0;
            }
            
            .try-again {
                display: inline-block;
                background-color: #3498db;
                color: white;
                padding: 10px 20px;
                text-decoration: none;
                border-radius: 4px;
                transition: background-color 0.3s;
            }
            
            .try-again:hover {
                background-color: #2980b9;
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <div class="error-icon">✕</div>
            <h1>Invalid Login Details</h1>
            <p>The details you entered is incorrect. Please try again.</p>
            <a href="../index.php" class="try-again">Homepage</a>
        </div>
    </body>
</html>