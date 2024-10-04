var userimg = localStorage.getItem("userimg");
 var showuserimg = document.getElementById("userimg");
showuserimg.src=`/php/data/${userimg}`

//  Edit profile photo 

function editimg() {
    const chosephoto = document.getElementById("editprofile").files[0]; 
    if (chosephoto) {
      var reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("userimg").src = e.target.result; 
      };
      reader.readAsDataURL(chosephoto); 
      
      const filePath = chosephoto.name;
      sessionStorage.setItem("userimg", filePath);
    } else {
      alert("Please select an image.");
    }
  }
  