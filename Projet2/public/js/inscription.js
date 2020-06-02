$("#form").validate();

var loadFile = function(event) {
    var output = document.getElementById('images');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src)
        }
      };

document.getElementById("form").addEventListener("submit", function(e){
  alert('bravo');
});
alert('ok');



