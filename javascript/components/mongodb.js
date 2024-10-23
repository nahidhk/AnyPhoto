       
if (localStorage.getItem("install") == "true") {
    
} else {
    document.getElementById("rooting").innerHTML = `
        <section id="darkside" class="darkside">
            <div class="popup">
                <button onclick="darkside()" class="rr"><i class="fa-solid fa-xmark"></i></button>
                <center>
                    <h3>Download PAW</h3>
                    <hr>
                    <div id="os"></div>
                    <button class="systembtn v" id="installBtn">Install <span id="icon"></span> App</button>
                </center>
            </div>
        </section>`; 
}
            

        function darkside() {
            document.getElementById("darkside").style.display = "none";
        }
        let os = "web";
        let icon = '<i class="fa-solid fa-desktop"></i>';
        if (navigator.userAgent.indexOf("Android") !== -1) {
            os = 'Android';
            icon = '<i class="fa-brands fa-google-play"></i>';
        } else if (navigator.userAgent.indexOf("Windows") !== -1) {
            os = 'Windows';
            icon = '<i class="fa-brands fa-windows"></i>';
        } else if (navigator.userAgent.indexOf("Mac") !== -1) {
            os = 'macOS';
            icon = '<i class="fa-brands fa-apple"></i>';
        } else if (navigator.userAgent.indexOf("Linux") !== -1) {
            os = 'Linux';
            icon = '<i class="fa-brands fa-linux"></i>';
        } else if (navigator.userAgent.indexOf("iPhone") !== -1 || navigator.userAgent.indexOf("iPad") !== -1) {
            os = 'iOS';
            icon = '<i class="fa-brands fa-apple"></i>';
        }
        document.getElementById('os').innerHTML = `<span style="font-size:5rem;">${icon}</span> <br> <span style="font-size:15pt;">Install the app on your ${os} device to launch it easily. <span>`;
        document.getElementById("icon").innerHTML = `${os}`;
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            document.getElementById('installBtn').style.display = 'block';
            document.getElementById('installBtn').addEventListener('click', () => {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                        localStorage.setItem("install",true);
                        window.location.href="/"
                    } else {
                        console.log('User dismissed the install prompt');
                        localStorage.setItem("install",flase);
                    }
                    deferredPrompt = null;
                });
            });
        });
