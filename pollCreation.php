<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Additional Features </title>
</head>

<body>

    <h1>Create a Poll</h1>

    <form method="POST" action="save_poll.php">

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

    <!-- Custom Reactions -->

   <div class="reactions">

    <button>Fire 🔥</button>

    <button>Slay ✨</button>

    <button>Ate 🍽️</button>

    <button>Hell Nahhh 💀</button>

    <button>Cooked 🍳</button>

    <button>Bruh 🙄</button>

    <button>Canon 📖</button>

    <button>Peak ⬆️</button>

    <button>Valid ✔️</button>

    <button>Insane ⚠️</button>

    <button>Realll ☁️</button>

    <button>Wild ⚡</button>

   </div>
    <script>
    let optionCount = 3;

    function addOption() {
        optionCount++;
        
        let container = document.getElementById("options-container");
        
        let input = document.createElement("input");
        input.type = "text";
        input.name = "option" + optionCount;
        input.placeholder = "Option " + optionCount;
        
        container.appendChild(input);
    }
   </script>
</body>
</html>