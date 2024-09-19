async function topuser() {
    try {
        const response = await fetch("/php/user.json");
        const topuser = await response.json();
        const dataContainerontopuser = document.getElementById('topuser');

        if (!dataContainerontopuser) {
            throw new Error("Element with id 'topuser' not found.");
        }

        let shownUsers = []; // ইউজারনেম ট্র্যাক করার জন্য অ্যারে

        topuser.forEach(item => {
            // চেক করা হচ্ছে ইউজারনেমটি আগেই দেখানো হয়েছে কিনা
            if (!shownUsers.includes(item.username)) {
                shownUsers.push(item.username); // যদি না থাকে, তাহলে অ্যারেতে যোগ করা হচ্ছে

                const itemElementtopuser = document.createElement('div');
                itemElementtopuser.innerHTML = `
                <div class="user">
                    <img src="/php/data/${item.userimg}" alt="${item.username}" class="userimg">
                    <p style="font-size: large;">&nbsp;&nbsp;&nbsp;<b><span>${item.username}</span></b></p>
                </div>
                `;

                dataContainerontopuser.appendChild(itemElementtopuser);
            }
        });
    } catch (error) {
        console.error('data error', error);
    }
}

topuser();




