async function displayData() {
    try {
        const response = await fetch("/data/user.json");
        const data = await response.json();
        const dataContainer = document.getElementById('app');

        if (!dataContainer) {
            throw new Error("Element with id 'data-container' not found.");
        }

        // Loop through the data and display it
        data.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.innerHTML = `
           <div class="photo">
            <div class="user">
                <img src="/data/${item.userimg}" alt="${item.username}" class="userimg">
                <p style="font-size: large;">&nbsp;&nbsp;&nbsp;<b><span>${item.username}</span></b></p>
            </div>
            <blockquote>
               ${item.about}
            </blockquote>
            <img src="data/${item.photo}" alt="" class="imgdata">
        </div>
            `;

            dataContainer.appendChild(itemElement);
        });
    } catch (error) {
        console.error('data error', error);
    }
}
displayData();

function loginnext() {
    const username = document.getElementById("username").value;
    if (username) {
        localStorage.setItem("username", username);
        document.getElementById("step1").style.display = "none";
        document.getElementById("step2").style.display = "block";
    } else {
        alert("You Have Not Input User name.");
    }

}


function upimg() {
    const photo = document.getElementById("photo").files[0];

    if (photo) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("showprofile").src = e.target.result;
        };
        reader.readAsDataURL(photo);
        const filePath = photo.name;  
        localStorage.setItem("userimg", filePath); 
    } else {
        alert("Please select an image.");
    }
}


var loadadatadispaly = localStorage.getItem("loginpage");
document.getElementById("account").style.display = loadadatadispaly;
function loginany() {
    localStorage.setItem("loginpage", "none");
    document.getElementById("account").style.display = "none";

}
function uploadphoto() {
    window.location.href = "/upload";
}
