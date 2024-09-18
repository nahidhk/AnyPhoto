async function videoshow() {
    try {
        const response1 = await fetch("/php/video.json");
        const data1 = await response1.json();
        const dataContainer1 = document.getElementById('videoapp');

        if (!dataContainer1) {
            throw new Error("Element with id 'videoapp' not found.");
        }


        data1.forEach(item => {
            const itemElement1 = document.createElement('div');
            itemElement1.innerHTML = `
         <div class="photo">
                    <div class="user">
                        <img src="/php/data/${item.userimg}" alt="${item.username}" class="userimg">
                        <p style="font-size: large;">&nbsp;&nbsp;&nbsp;<b><span>${item.username}</span></b></p>
                    </div>
                    <blockquote>
                       ${item.title}
                    </blockquote>
                  <video class="imgdata" controls>
                    <source src="php/video/${item.video}">
                  </video>
                </div>
            `;

            dataContainer1.appendChild(itemElement1);
        });
    } catch (error) {
        console.error('data error', error);
    }
}
videoshow();