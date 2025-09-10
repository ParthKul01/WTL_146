<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form> 
      Name : <input type="text" id="name" name="name"> 
      Password : <input type="password" id="password" name="password">
      <button id="btn" type="button">Click</button>
      <button id="get" type="button">Get Data</button>
      
      <a href = "edit.php">
      <button id="edit" type="button">Edit </button>
      </a>

      <a href = "delete.php">
      <button id="delete" type="button">Delete</button> 
      </a>

    </form>

    <br>
    <table id="dataTable" border="2" spacing="2">
        
        <thead><tr> <td>Name</td><td>Password<td> </thead>
        <tbody id="table">

        </tobody>

    </table>

    <script>
        let name  = document.getElementById('name');
        let pass = document.getElementById('password');

        async function Insert() {
                const formData = new FormData();
                formData.append('Name', name.value);
                formData.append('Password', pass.value);

                const res = await fetch('http://localhost/PHP/InsertData.php', {
                    method : "POST",
                    body : formData 
                });

                const result  = await res.text();
                console.log(result);
        }

       

        document.getElementById('btn').addEventListener('click', () => {
                 Insert();  
        }) ;


        async function Fetch(){

            const result = await fetch('http://localhost/PHP/GetData.php') ;
            const  finalResult = await result.json();
            
            for(let i in finalResult) {
                const row  = document.createElement('tr') ;
                for(let k in finalResult[i]) {
                    const cell = document.createElement('td') ;
                    cell.textContent = finalResult[i][k] ;
                      row.append(cell) ;
                }
              
                document.getElementById('table').append(row) ;
            }

           

        }

        document.getElementById('get').addEventListener('click', ()=> {
             Fetch() ;
        })

        // Edit Operation 

        document.getElementById('click' , () => {

        })




    </script>
</body>
</html>
