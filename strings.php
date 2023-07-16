<?php 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        header("location: index.php");
        exit();
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body style="background-image:url('./nexTech\ \(3\).png');">
    <main class="sign_up" id="sign_up">
        <div>
            <div class="header">
                <h1>Sign Up</h1>
            </div>
            <form action=""  method="post">
                <div class="inputs">
                    <input type="text" placeholder="username" name="user_name" title="please enter your user name">
                    <input type="email" placeholder="email" name="user_email"  title="please enter a valid email">
                    <input type="password" placeholder="password" name="user_password"  title="please enter your password">
                </div>
                <div class="submit">
                    <button type="submit" id="submit">Sign up</button>
                </div>
                <div style="width:100%">
                    <h3 id="data" style="text-align: center;color:aqua;font-family:sans-serif;">

                    </h3>
                </div>
            </form>
        </div>
    </main>
    <script>
        let dataChange =document.getElementById("data")
        let form =document.querySelector('form')
        form.onsubmit = (e) => {
            e.preventDefault()
            let xhr = new XMLHttpRequest()
            xhr.open("POST","calc.php",true)
            xhr.onload = () =>{
                if(xhr.readyState == 4 && xhr.status ==200){
                    let response = xhr.response;
                    if(response.indexOf("all inputs required") != -1 || response.indexOf('enter a valid email address') != -2 ||response.indexOf("Sorry Failed to send the email") != -3){
                        dataChange.style.color = 'red'

                    }else{
                        form.reset()
                        setTimeout(() => {
                            dataChange.style.display = 'none'
                        },3000)
                    }
                    dataChange.innerText =response
                }
            }
            let formData = new FormData(form);
            xhr.send(formData)
        }
    </script>
</body>
</html>