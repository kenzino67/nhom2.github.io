<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
        function validateForm() {
            const email = document.forms["registerForm"]["email"].value;
            const password = document.forms["registerForm"]["password"].value;
            const confirmPassword = document.forms["registerForm"]["confirm_password"].value;
            const captcha = document.forms["registerForm"]["captcha"].value;
            const captchaValue = document.getElementById("captchaValue").value;

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            if (captcha !== captchaValue) {
                alert("CAPTCHA is incorrect.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body class="bg-green-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-6">
                <div class="bg-green-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-3xl font-bold">Hi!</span>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Nhóm 2</h1>
            </div>
            <p class="text-center text-gray-600 mb-6">Nhập thông tin để tạo tài khoản </p>
            <div class="bg-gray-100 rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Đăng ký tài khoản </h2>
                <form name="registerForm" action="login.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="mb-4">
                        <input type="text" name="email" placeholder="Nhập email " class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                    </div>
                    <div class="mb-4 relative">
                        <input type="password" name="password" placeholder="Nhập mật khẩu" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        <i class="fas fa-eye absolute right-3 top-3 text-gray-500"></i>
                    </div>
                    <div class="mb-4 relative">
                        <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        <i class="fas fa-eye absolute right-3 top-3 text-gray-500"></i>
                    </div>
                    <div class="mb-4">
                        <input type="file" name="profile_image" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" id="terms" name="terms" class="mr-2" required>
                        <label for="terms" class="text-gray-600">Tôi đồng ý với các điều khoản sử dụng</label>
                    </div>
                    <div class="mb-4">
                        <?php
                            $captchas = [
                                ["src" => "uploads/anh1.png", "value" => "3172"],
                                ["src" => "uploads/anh2.png", "value" => "6907"],
                                ["src" => "uploads/anh3.png", "value" => "5849"]
                            ];
                            $selectedCaptcha = $captchas[array_rand($captchas)];
                        ?>
                        <img src="<?php echo $selectedCaptcha['src']; ?>" alt="CAPTCHA Image" class="mb-2 w-32 h-12">
                        <input type="hidden" id="captchaValue" value="<?php echo $selectedCaptcha['value']; ?>">
                        <input type="text" name="captcha" placeholder="Nhập CAPTCHA" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white p-3 rounded-lg font-bold hover:bg-green-700 transition">
                        Đăng ký
                    </button>

                </form>
            </div>
            <p class="text-center text-gray-600 mt-6">Bạn đã có tài khoản? <a href="#" class="text-green-600">Đăng nhập</a></p>
        </div>
    </div>
</body>
</html>