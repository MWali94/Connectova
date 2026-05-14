<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Poll Creation </title>
</head>

<body>

    <h1>Create a Poll</h1>

    <form method="POST">

     <input type="text" name="question" placeholder="Enter poll question">
     <br><br> 
    
     <div id="options-container">

        <input type="text" name="option1" placeholder="Option 1">
     <br><br>
        <input type="text" name="option2" placeholder="Option 2">
     <br><br>
        <input type="text" name="option3" placeholder="Option 3">
     <br><br>
        
     </div>

        <button type="button" onclick="addOption()">Add More Options</button>
        <br><br>

     <button type="submit">Create Poll</button>

    </form>

</body>
</html>