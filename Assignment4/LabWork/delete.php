<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Here You can Delete the Data</h1>
    <form>
        Username : <input type="text" id="username" name="username">
        <button type="button" id="btn">Confirm</button> 
    </form>
    <div></div>
    <script>
        

        async function Delete() {
            let username  = document.getElementById('username').value;
          
            const result  = await fetch(`http://localhost/PHP/DeleteData.php?username=${username}`) ;
            const finalResult = await result.text() ;
            document.querySelector('div').textContent = finalResult ;
        }

        document.getElementById('btn').addEventListener('click', ()=> {
             Delete() ;
        })

    </script>
</body>
</html>