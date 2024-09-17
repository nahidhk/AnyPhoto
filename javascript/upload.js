
function displydatalopmuo(){
    var userimg = localStorage.getItem("userimg");
    var username = localStorage.getItem("username");
    let nameuser = document.getElementById("nameuser");
    let imguser = document.getElementById("imguser");
    nameuser.value=username;
    imguser.value=userimg;
   document.getElementById("usernameshow").innerHTML=username;
}
displydatalopmuo();
function noteditmass(){
    alert("This Account Info is Not Edit!")
}
function showimgfx(){
    var input = document.getElementById("photofa");
    var file = input.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById("myimge").src = e.target.result;
      };
      reader.readAsDataURL(file);
    } else {
      alert("Please select an image.");
    }
}