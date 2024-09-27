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
                        <span title="This is a Post Time" class="dateshow">${item.date}</span>
                    </blockquote>
                    <blockquote>
                        ${item.title}
                    </blockquote>

                    <img onload="loadmyphoto(this)" onerror="loadError(this)" src="/php/data/${item.img}" alt="${item.username}" class="imgdata">
                    <img src="/img/load.gif" class="loadimg" style="display: block;" />

                    <div class="sherarsystem">              
                        <div class="aptmain">
                            <a onclick="opencopycodebox()" class="shearicon"><i class="bi bi-braces-asterisk"></i></a>
                            <a href="/php/data/${item.img}?photo shear apx nodeJs backend photo only apx javascript markup php Zoom#api jsxpio xapi=Servaer AppOn The FaceApp = Shear:${item.username};" class="shearicon"><i class="bi bi-link-45deg"></i></a>
                        </div>
                        <div id="codecopybox" class="vcc">
                            <textarea id="mycode">  
                                <div id="showimg"></div>
                                <script>
                                    const showimg = document.querySelector("#showimg");
                                    const apiimgid = document.createElement("img");
                                    let webserver = "https://anyface.readyoffercareer.com"
                                    let api = "/php/data/";
                                    let photoid = "${item.img}";
                                    apiimgid.src = webserver + api + photoid;
                                    showimg.appendChild(apiimgid);
                                </script>
                            </textarea>
                            <center><br>
                                <button onclick="copycode()" id="copybtn" class="systembtn">copy</button>
                            </center>
                        </div>
                    </div>
                </div>
            `;

            dataContainer.appendChild(itemElement);
        });
    } catch (error) {
        console.error('data error', error);
    }
}

function loadmyphoto(imgElement) {
    const loadingImage = imgElement.nextElementSibling; // Assuming the loading image is right after the main image
    if (loadingImage && loadingImage.classList.contains('loadimg')) {
        loadingImage.style.display = "none"; // Hide the loading image
    }
}

function loadError(imgElement) {
    const loadingImage = imgElement.nextElementSibling;
    if (loadingImage && loadingImage.classList.contains('loadimg')) {
        loadingImage.style.display = "none"; // Hide the loading image if there is an error
        imgElement.style.display = "none"; // Optionally hide the image if it fails to load
    }
}

function searchData() {
    const searchInput1 = document.querySelector("#search1").value;
    const searchInput2 = document.querySelector("#search2").value;
    displayData(searchInput1 + searchInput2);
}

// Initial call to display data
displayData();


function opencopycodebox(){
    document.getElementById("codecopybox").classList="codecopybox";
}

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
            document.getElementById("photo").style.display= "none"
            document.getElementById("showprofile").style.display= "block"
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
function accessbtn() {
    alert("You Have Allow The Server Access");
    window.location.href = "https://github.com/nahidhk/anyphoto"
}

function systemserch() {
    document.getElementById("search2").classList = "search animate__bounceIn animate__animated ";
}

function closepopup() {
    var menuappshowdiv = document.getElementById("myappjstoopenuserlist");
    menuappshowdiv.classList = "animate__backOutUp animate__animated vcc";
}
function closetop(){
    document.getElementById("codecopybox").classList="vcc";
}
function copycode() {
    setTimeout(closetop,500);
    var copyText = document.getElementById("mycode");
    if (!copyText) {
        alert("Element not found.");
        return;
    }
    if (copyText.tagName === "INPUT" || copyText.tagName === "TEXTAREA") {
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value).then(function() {
        document.getElementById("copybtn").innerHTML='<i class="bi bi-clipboard-check" style="font-size: large;"></i>'
        }).catch(function(err) {
            alert("Failed to copy code: " + err);
        });
    } else {
        alert("This code is not copy");
    }
}

window.onload = function() {
    function deleteAllCookies() {
        const cookies = document.cookie.split(";");

        for (let i = 0; i < cookies.length; i++) {
            const cookieName = cookies[i].split("=")[0].trim();
            document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;';
        }
    }

    deleteAllCookies();
};

