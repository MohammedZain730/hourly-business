<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>مثال على كلمة المرور</title>
  <style>
    /* أضف بعض الأناقة للعناصر */
    label, input {
      display: block;
      margin: 1px;
    }
    .eye input[type="password"] {
      width: 200px;
    }
    /* أضف خاصية العين لتبديل إظهار كلمة المرور */
    .eye {
      position: relative;
      display: inline-block;
    }
    .eye img {
      position: absolute;
      right: 10px;
      top: 2px;
      width: 20px;
      height: 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>

 
  <form>
    <label for="password">أدخل كلمة المرور:</label>
    <!-- ضع حقل كلمة المرور داخل عنصر العين -->
    <div class="eye">
      <input  type="password" id="password" value="123456">
      <!-- استخدم صورتين للعين المفتوحة والمغلقة -->
      <img src="image/eye.png" alt="إظهار" id="show-password">
      <img src="image/eye_with_line.png" alt="إخفاء" id="hide-password" style="display:none;">
    </div>
  </form>
  <script>
    // احصل على عناصر الإدخال والصور من الوثيقة
    var password = document.getElementById("password");
   
    var showPassword = document.getElementById("show-password");
    var hidePassword = document.getElementById("hide-password");
    

    // تعريف دالة لتبديل نوع الإدخال بين كلمة المرور والنص
    function togglePassword() {
      if (password.type === "password") {
        password.type = "text";
        showPassword.style.display = "none";
        hidePassword.style.display = "inline-block";
      } else {
        password.type = "password";
        showPassword.style.display = "inline-block";
        hidePassword.style.display = "none";
      }
    }

    // إضافة مستمعي الحدث للصور
    showPassword.addEventListener("click", togglePassword);
    hidePassword.addEventListener("click", togglePassword);
  </script>
</body>
</html>
