<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator - Muhammad Talha</title>
    <link rel="shortcut icon" href="my logo.png" type="image/jpeg">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .header p {
            color: #666;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .calculate-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            width: 100%;
        }

        .calculate-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .calculate-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .result {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-top: 20px;
            display: none;
            box-shadow: 0 10px 30px rgba(240, 147, 251, 0.3);
        }

        .result.show {
            display: block;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .result p {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .back-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .back-btn:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .features {
            margin-top: 30px;
            text-align: left;
        }

        .features h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            padding: 8px 0;
            color: #666;
            display: flex;
            align-items: center;
        }

        .feature-list li i {
            color: #667eea;
            margin-right: 10px;
            width: 20px;
        }

        .contact-section {
            margin-top: 30px;
            text-align: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px;
            border-radius: 15px;
            color: white;
        }

        .contact-section h3 {
            color: white;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-item {
            display: flex;
            justify-content: center;
        }

        .contact-item a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .contact-item a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .contact-item a i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .whatsapp-btn:hover {
            background: rgba(37, 211, 102, 0.3) !important;
        }

        .email-btn:hover {
            background: rgba(234, 67, 53, 0.3) !important;
        }

        .phone-btn:hover {
            background: rgba(52, 168, 83, 0.3) !important;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }

            .contact-section {
                padding: 20px 15px;
            }

            .contact-item a {
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .contact-item a i {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-calculator"></i> Age Calculator</h1>
            <p>Calculate your exact age in years, months, and days</p>
        </div>

        <form id="ageForm">
            <div class="form-group">
                <label for="birthDate">Select your birth date:</label>
                <input type="date" id="birthDate" name="birthDate" required>
            </div>

            <button type="submit" class="calculate-btn" id="calculateBtn">
                <i class="fas fa-calculator"></i> <span id="btnText">Calculate Age</span>
            </button>
        </form>

        <div id="result" class="result">
            <h2 id="ageResult">Your Age</h2>
            <p id="ageDetails"></p>
            <p id="nextBirthday"></p>
        </div>

        <div class="features">
            <h3><i class="fas fa-star"></i> Features</h3>
            <ul class="feature-list">
                <li><i class="fas fa-check"></i> Exact age calculation</li>
                <li><i class="fas fa-check"></i> Years, months, and days</li>
                <li><i class="fas fa-check"></i> Next birthday countdown</li>
                <li><i class="fas fa-check"></i> Mobile responsive design</li>
            </ul>
        </div>

        <div class="contact-section">
            <h3><i class="fas fa-phone"></i> Contact Us</h3>
            <div class="contact-info">
                <div class="contact-item">
                    <a href="https://wa.me/923329911276" target="_blank" class="whatsapp-btn">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp: +923329911276</span>
                    </a>
                </div>
                <div class="contact-item">
                    <a href="mailto:itsocial470@gmail.com" class="email-btn">
                        <i class="fas fa-envelope"></i>
                        <span>Email: itsocial470@gmail.com</span>
                    </a>
                </div>
                <div class="contact-item">
                    <a href="tel:+923329911276" class="phone-btn">
                        <i class="fas fa-phone"></i>
                        <span>Phone: +923329911276</span>
                    </a>
                </div>
            </div>
        </div>

        <a href="{{url('/')}}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>

    <script>
        // Wait for DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('ageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const birthDateInput = document.getElementById('birthDate').value;
            const calculateBtn = document.getElementById('calculateBtn');
            const btnText = document.getElementById('btnText');
            
            if (!birthDateInput) {
                alert('Please select your birth date!');
                return;
            }
            
            // Show loading state
            calculateBtn.disabled = true;
            btnText.textContent = 'Calculating...';
            calculateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Calculating...</span>';
            
            const birthDate = new Date(birthDateInput);
            const today = new Date();
            
            // Validate date
            if (isNaN(birthDate.getTime())) {
                alert('Please enter a valid date!');
                return;
            }
            
            if (birthDate > today) {
                alert('Birth date cannot be in the future!');
                return;
            }
            
            // Calculate age more accurately
            let years = today.getFullYear() - birthDate.getFullYear();
            let months = today.getMonth() - birthDate.getMonth();
            let days = today.getDate() - birthDate.getDate();
            
            // Adjust for negative days
            if (days < 0) {
                months--;
                const lastMonth = new Date(today.getFullYear(), today.getMonth(), 0);
                days += lastMonth.getDate();
            }
            
            // Adjust for negative months
            if (months < 0) {
                years--;
                months += 12;
            }
            
            // Calculate total days lived
            const timeDiff = today.getTime() - birthDate.getTime();
            const totalDays = Math.floor(timeDiff / (1000 * 3600 * 24));
            
            // Calculate next birthday
            const nextBirthday = new Date(today.getFullYear(), birthDate.getMonth(), birthDate.getDate());
            if (nextBirthday <= today) {
                nextBirthday.setFullYear(today.getFullYear() + 1);
            }
            
            const daysToNextBirthday = Math.ceil((nextBirthday.getTime() - today.getTime()) / (1000 * 3600 * 24));
            
            // Calculate total hours, minutes, seconds
            const totalHours = Math.floor(timeDiff / (1000 * 3600));
            const totalMinutes = Math.floor(timeDiff / (1000 * 60));
            const totalSeconds = Math.floor(timeDiff / 1000);
            
            // Display results with better formatting
            document.getElementById('ageResult').innerHTML = `
                <i class="fas fa-user"></i> You are <strong>${years}</strong> years old
            `;
            
            document.getElementById('ageDetails').innerHTML = `
                <div style="margin-bottom: 15px;">
                    <strong>${years}</strong> years, <strong>${months}</strong> months, and <strong>${days}</strong> days old
                </div>
                <div style="margin-bottom: 10px;">
                    <i class="fas fa-calendar-alt"></i> You have lived for <strong>${totalDays.toLocaleString()}</strong> days
                </div>
                <div style="font-size: 0.9rem; opacity: 0.8;">
                    <i class="fas fa-clock"></i> That's approximately <strong>${totalHours.toLocaleString()}</strong> hours
                </div>
            `;
            
            // Next birthday message
            if (daysToNextBirthday === 0) {
                document.getElementById('nextBirthday').innerHTML = `
                    <i class="fas fa-birthday-cake"></i> <strong>Happy Birthday! 🎉</strong> It's your birthday today!
                `;
            } else if (daysToNextBirthday === 1) {
                document.getElementById('nextBirthday').innerHTML = `
                    <i class="fas fa-birthday-cake"></i> <strong>Tomorrow is your birthday!</strong> 🎂
                `;
            } else {
                document.getElementById('nextBirthday').innerHTML = `
                    <i class="fas fa-birthday-cake"></i> Next birthday in <strong>${daysToNextBirthday}</strong> days
                `;
            }
            
            // Show result with animation
            document.getElementById('result').classList.add('show');
            
            // Scroll to result
            document.getElementById('result').scrollIntoView({ behavior: 'smooth' });
            
            // Reset button state
            setTimeout(() => {
                calculateBtn.disabled = false;
                btnText.textContent = 'Calculate Age';
                calculateBtn.innerHTML = '<i class="fas fa-calculator"></i> <span>Calculate Age</span>';
            }, 1000);
        });
        
        // Add some interactive features
        document.getElementById('birthDate').addEventListener('change', function() {
            // Clear previous results when date changes
            document.getElementById('result').classList.remove('show');
        });
        
            // Set max date to today
            document.getElementById('birthDate').setAttribute('max', new Date().toISOString().split('T')[0]);
        });
    </script>
</body>
</html>
