/*jslint devel: true */
function buttonIsClicked() {
    "use strict";
    alert("Clicked!");
}

function changeColor() {
    "use strict";
    var color;
    color = document.getElementById("change").value;
    document.getElementById("div1").style.backgroundColor = color;
}

$document.ready(function(){
    "use strict";
    $("#cbutton").click(function(){
        $("#div1").css("background-color", $("#change").val();
    });
});