<?php

$hello = "HOLA";

?>


<!DOCTYPE html>
<html>
<head>
    <title>Add li Tag Dynamically</title>
    <script>
        function addLi() {
            var li = document.createElement("li");
            var text = document.createTextNode("New List Item");
            li.appendChild(text);
            document.getElementById("list").appendChild(li);
        }
    </script>
</head>
<body>
    <ul id="list" class="your-class">
        <!-- Existing list items will go here -->
    </ul>
    <button onclick="addLi()">Add LI</button>
</body>
</html>
