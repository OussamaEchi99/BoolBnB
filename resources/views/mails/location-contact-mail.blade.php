<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body>
   <h1>Nuovo messaggio</h1>

   <div>Nome: {{$new_lead->name}}</div>
   <div>Email: {{$new_lead->email}}</div>
   <p>Messaggio: {{$new_lead->message}}</p>
</body>
</html>