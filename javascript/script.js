async function displayData(searchInput = '') {
    try {
        const response = await fetch("/php/user.json");
        const data = await response.json();
        const dataContainer = document.getElementById('app');

        if (!dataContainer) {
            throw new Error("Element with id 'app' not found.");
        }

        dataContainer.innerHTML = '';

        const filteredData = data.filter(item =>
            item.username.toLowerCase().includes(searchInput.toLowerCase()) ||
            item.title.toLowerCase().includes(searchInput.toLowerCase())
        );

        filteredData.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.innerHTML = `
                <div class="photo">
                    <div class="user">
                        <img src="/php/data/${item.userimg}" alt="${item.username}" class="userimg">
                        <p style="font-size: large;">&nbsp;&nbsp;&nbsp;<b><span>${item.username}</span></b></p>
                    </div>
                    <blockquote>
                       ${item.title}
                    </blockquote>
                    <img src="/php/data/${item.img}" alt="${item.username}" class="imgdata">
                </div>
            `;

            dataContainer.appendChild(itemElement);
        });
    } catch (error) {
        console.error('data error', error);
    }
}

function searchData() {
    const searchInput = document.getElementById("search").value;
    displayData(searchInput);
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
function openthephotobox() {
    document.getElementById("app").style.display = "block";
    document.getElementById("videoapp").style.display = "none";
    document.getElementById("photobtn").classList = "systembtn active";
    document.getElementById("videobtn").classList = "systembtn noactive";
    localStorage.setItem("butttontype", "photo");
}
function openthevideobox() {
    document.getElementById("app").style.display = "none";
    document.getElementById("videoapp").style.display = "block";
    document.getElementById("photobtn").classList = "systembtn noactive";
    document.getElementById("videobtn").classList = "systembtn active";
    localStorage.setItem("butttontype", "video");
}
function autobuttonset() {
    const autobtn = localStorage.getItem("butttontype");
    if (autobtn == "video") {
        openthevideobox();
    }
    if (autobtn == "photo") {
        openthephotobox();
    }
}
autobuttonset();
function accessbtn(){
    alert("You Have Allow The Server Access");
    window.location.href="https://github.com/nahidhk/anyphoto"
}

function systemserch(){
    document.getElementById("search").classList="search animate__bounceIn animate__animated ";
}