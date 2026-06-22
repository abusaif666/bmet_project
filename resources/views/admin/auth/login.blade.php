<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BMET LMS Login</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f4f4;
    font-family: Arial, sans-serif;
}

/* Header */
.topbar{
    height:85px;
    background:#fff;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
}

.logo-text{
    font-size:24px;
    font-weight:700;
    color:#2f2b8f;
}

.search-box{
    position:relative;
    width:320px;
}

.search-box input{
    height:50px;
    border-radius:30px;
    padding-left:60px;
}

.search-icon{
    position:absolute;
    left:10px;
    top:50%;
    transform:translateY(-50%);
    width:40px;
    height:40px;
    background:#18a7ff;
    color:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

.login-btn-top{
    background:#168cff;
    color:#fff;
    border:none;
    padding:12px 30px;
    border-radius:12px;
    font-weight:600;
}

/* Login Section */
.login-wrapper{
    max-width:450px;
    margin-top:80px;
    margin-left:280px;
}

.title{
    color:#27b6f5;
    font-size:34px;
    font-weight:700;
}

.subtitle{
    color:#68768f;
    font-size:18px;
    margin-bottom:40px;
}

.form-label{
    font-size:18px;
    font-weight:600;
    margin-bottom:10px;
}

.form-control{
    height:64px;
    border-radius:8px;
    border:1px solid #d8d8d8;
}

.login-btn{
    width:100%;
    height:55px;
    border:none;
    border-radius:12px;
    color:#fff;
    font-weight:700;
    font-size:22px;
    background:linear-gradient(90deg,#2ec0ee,#2574ff);
    box-shadow:0 4px 10px rgba(0,0,0,.15);
}

.register-link,
.forgot-link{
    text-decoration:none;
    color:#1494ff;
    font-weight:500;
}

/* Custom Toggle */
.toggle-switch{
    position:relative;
    display:inline-block;
    width:54px;
    height:28px;
}

.toggle-switch input{
    opacity:0;
    width:0;
    height:0;
}

.slider{
    position:absolute;
    cursor:pointer;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background:#d7dbe0;
    transition:.4s;
    border-radius:30px;
}

.slider:before{
    position:absolute;
    content:"";
    height:22px;
    width:22px;
    left:3px;
    bottom:3px;
    background:white;
    transition:.4s;
    border-radius:50%;
}

input:checked + .slider{
    background:#2196F3;
}

input:checked + .slider:before{
    transform:translateX(26px);
}

@media(max-width:992px){
    .login-wrapper{
        margin:50px auto;
        padding:0 15px;
    }

    .search-box{
        display:none;
    }
}
</style>
</head>
<body>

<!-- Header -->
<nav class="topbar d-flex align-items-center px-4">

    <div class="d-flex align-items-center me-5">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Government_Seal_of_Bangladesh.svg/1200px-Government_Seal_of_Bangladesh.svg.png"
             width="55" class="me-3">
        <div class="logo-text">BMET LMS</div>
    </div>

    <div class="search-box me-4">
        <span class="search-icon">🔍</span>
        <input type="text" class="form-control" placeholder="Search.....">
    </div>

    <div class="dropdown me-auto">
        <button class="btn btn-link text-dark text-decoration-none fs-5">
            Download ▼
        </button>
    </div>

    <select class="form-select w-auto me-3">
        <option>English</option>
        <option>বাংলা</option>
    </select>

    <button class="login-btn-top">LOGIN</button>

</nav>

<!-- Login Form -->
<div class="login-wrapper">

    <h1 class="title">Welcome to BMET</h1>

    <p class="subtitle">
        Enter your email and password to login
    </p>

    <form>

        <div class="mb-4">
            <label class="form-label">Email *</label>
            <input type="email" class="form-control">
        </div>

        <div class="mb-4">
            <label class="form-label">Password *</label>
            <input type="password" class="form-control">
        </div>

        <div class="d-flex align-items-center mb-5">

            <label class="toggle-switch me-3">
                <input type="checkbox" id="rememberMe">
                <span class="slider"></span>
            </label>

            <span class="fs-4 me-auto">Remember me</span>

            <a href="#" class="forgot-link fs-4">
                Forgot Password
            </a>

        </div>

        <button type="submit" class="login-btn">
            LOGIN
        </button>

    </form>

    <div class="text-center mt-5 fs-3">
        Don't have an account?
        <a href="#" class="register-link">
            Register Now
        </a>
    </div>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function(){

    $("#rememberMe").change(function(){

        if($(this).is(":checked")){
            console.log("Remember Me ON");
        }else{
            console.log("Remember Me OFF");
        }

    });

});
</script>

</body>
</html>