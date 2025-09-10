<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Here You can Edit the Data</h1>
    <form>
        Oldusername : <input type="text" id="old" name="oldusername">
        username : <input type = "text" id="name" name="name">
        Password : <input type = "password" id="password" name="password"> 
        <button type="button" id="btn">Confirm</button> 
    </form>
    <div></div>
    <script>
        

        async function Edit() {
            let Oldname  = document.getElementById('old').value;
            let name  = document.getElementById('name').value;
            let pass = document.getElementById('password').value;
            
            const result  = await fetch(`http://localhost/PHP/EditData.php?name=${name}&password=${pass}&oldusername=${Oldname}`) ;
            const finalResult = await result.text() ;
            document.querySelector('div').textContent = finalResult ;
        }

        document.getElementById('btn').addEventListener('click', ()=> {
             Edit() ;
        })

    </script>
</body>
</html>