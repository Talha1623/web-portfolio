<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator - Muhammad Talha</title>
    <link rel="shortcut icon" href="my logo.png" type="image/jpeg">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js" defer></script>
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
            max-width: 600px;
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

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
            font-family: inherit;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .generate-btn {
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

        .generate-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .generate-btn:disabled {
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

        .qr-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            display: inline-block;
        }

        .qr-code {
            max-width: 200px;
            height: auto;
        }

        .download-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .download-btn:hover {
            background: #218838;
            transform: translateY(-2px);
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

        .type-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .type-btn {
            padding: 8px 16px;
            border: 2px solid #e1e5e9;
            background: white;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .type-btn.active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }

            .type-selector {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-qrcode"></i> QR Code Generator</h1>
            <p>Generate QR codes for URLs, text, email, phone numbers, and more</p>
        </div>

        <form id="qrForm">
            <div class="type-selector">
                <button type="button" class="type-btn active" data-type="url">URL</button>
                <button type="button" class="type-btn" data-type="text">Text</button>
                <button type="button" class="type-btn" data-type="email">Email</button>
                <button type="button" class="type-btn" data-type="phone">Phone</button>
                <button type="button" class="type-btn" data-type="wifi">WiFi</button>
            </div>

            <div class="form-group" id="urlGroup">
                <label for="urlInput">Enter URL:</label>
                <input type="url" id="urlInput" placeholder="https://example.com" required>
            </div>

            <div class="form-group" id="textGroup" style="display: none;">
                <label for="textInput">Enter Text:</label>
                <textarea id="textInput" placeholder="Enter any text..."></textarea>
            </div>

            <div class="form-group" id="emailGroup" style="display: none;">
                <label for="emailInput">Enter Email:</label>
                <input type="email" id="emailInput" placeholder="example@email.com">
            </div>

            <div class="form-group" id="phoneGroup" style="display: none;">
                <label for="phoneInput">Enter Phone Number:</label>
                <input type="tel" id="phoneInput" placeholder="+1234567890">
            </div>

            <div class="form-group" id="wifiGroup" style="display: none;">
                <label for="wifiSSID">WiFi Network Name (SSID):</label>
                <input type="text" id="wifiSSID" placeholder="MyWiFi">
                <label for="wifiPassword" style="margin-top: 15px;">WiFi Password:</label>
                <input type="text" id="wifiPassword" placeholder="password123">
                <label for="wifiSecurity" style="margin-top: 15px;">Security Type:</label>
                <select id="wifiSecurity" style="width: 100%; padding: 15px; border: 2px solid #e1e5e9; border-radius: 10px; font-size: 1.1rem;">
                    <option value="WPA">WPA/WPA2</option>
                    <option value="WEP">WEP</option>
                    <option value="nopass">No Password</option>
                </select>
            </div>

            <button type="submit" class="generate-btn" id="generateBtn">
                <i class="fas fa-qrcode"></i> <span id="btnText">Generate QR Code</span>
            </button>
        </form>

        <div id="result" class="result">
            <h2 id="resultTitle">Your QR Code</h2>
            <div class="qr-container">
                <canvas id="qrCode" class="qr-code"></canvas>
            </div>
            <button id="downloadBtn" class="download-btn" style="display: none;">
                <i class="fas fa-download"></i> Download QR Code
            </button>
        </div>

        <div class="features">
            <h3><i class="fas fa-star"></i> Features</h3>
            <ul class="feature-list">
                <li><i class="fas fa-check"></i> Multiple QR code types</li>
                <li><i class="fas fa-check"></i> High-quality QR codes</li>
                <li><i class="fas fa-check"></i> Download as PNG</li>
                <li><i class="fas fa-check"></i> Mobile responsive</li>
                <li><i class="fas fa-check"></i> WiFi QR codes</li>
            </ul>
        </div>

        <a href="{{url('/')}}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>

    <script>
        // Wait for DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            let currentType = 'url';
            const typeButtons = document.querySelectorAll('.type-btn');
            const formGroups = {
                url: document.getElementById('urlGroup'),
                text: document.getElementById('textGroup'),
                email: document.getElementById('emailGroup'),
                phone: document.getElementById('phoneGroup'),
                wifi: document.getElementById('wifiGroup')
            };

            // Type selector functionality
            typeButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    typeButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    currentType = this.dataset.type;
                    
                    // Hide all groups
                    Object.values(formGroups).forEach(group => {
                        group.style.display = 'none';
                    });
                    
                    // Show current group
                    formGroups[currentType].style.display = 'block';
                });
            });

            // Form submission
            document.getElementById('qrForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const generateBtn = document.getElementById('generateBtn');
            const btnText = document.getElementById('btnText');
            
            // Show loading state
            generateBtn.disabled = true;
            btnText.textContent = 'Generating...';
            generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Generating...</span>';
            
            let qrData = '';
            
            // Get data based on current type
            switch(currentType) {
                case 'url':
                    qrData = document.getElementById('urlInput').value;
                    break;
                case 'text':
                    qrData = document.getElementById('textInput').value;
                    break;
                case 'email':
                    qrData = `mailto:${document.getElementById('emailInput').value}`;
                    break;
                case 'phone':
                    qrData = `tel:${document.getElementById('phoneInput').value}`;
                    break;
                case 'wifi':
                    const ssid = document.getElementById('wifiSSID').value;
                    const password = document.getElementById('wifiPassword').value;
                    const security = document.getElementById('wifiSecurity').value;
                    qrData = `WIFI:T:${security};S:${ssid};P:${password};H:false;;`;
                    break;
            }
            
            if (!qrData.trim()) {
                alert('Please enter some data to generate QR code!');
                generateBtn.disabled = false;
                btnText.textContent = 'Generate QR Code';
                generateBtn.innerHTML = '<i class="fas fa-qrcode"></i> <span>Generate QR Code</span>';
                return;
            }
            
            // Generate QR code
            const canvas = document.getElementById('qrCode');
            QRCode.toCanvas(canvas, qrData, {
                width: 200,
                margin: 2,
                color: {
                    dark: '#000000',
                    light: '#FFFFFF'
                }
            }, function (error) {
                if (error) {
                    alert('Error generating QR code: ' + error);
                    generateBtn.disabled = false;
                    btnText.textContent = 'Generate QR Code';
                    generateBtn.innerHTML = '<i class="fas fa-qrcode"></i> <span>Generate QR Code</span>';
                    return;
                }
                
                // Show result
                document.getElementById('result').classList.add('show');
                document.getElementById('downloadBtn').style.display = 'inline-block';
                
                // Reset button
                generateBtn.disabled = false;
                btnText.textContent = 'Generate QR Code';
                generateBtn.innerHTML = '<i class="fas fa-qrcode"></i> <span>Generate QR Code</span>';
                
                // Scroll to result
                document.getElementById('result').scrollIntoView({ behavior: 'smooth' });
            });
            });
            
            // Download functionality
            document.getElementById('downloadBtn').addEventListener('click', function() {
                const canvas = document.getElementById('qrCode');
                const link = document.createElement('a');
                link.download = 'qrcode.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        });
    </script>
</body>
</html>
