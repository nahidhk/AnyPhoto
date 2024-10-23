console.log("Hello Word!")

fetch('api.php')
.then(response => response.json())
.then(data => {
    const headerLinksContainer = document.getElementById('headerLinks');
    const mainContentContainer = document.getElementById('mainContent');
    data[0].hadersLink.forEach(link => {
        const listItem = document.createElement('li');
        listItem.textContent = link;
        headerLinksContainer.appendChild(listItem);
        const content = data[0].main[link];
        mainContentContainer.innerHTML += `<h2>${content.title}</h2>${content.htmlcode}`;
    });
});



function gobackio(){
    window.history.back();
}
