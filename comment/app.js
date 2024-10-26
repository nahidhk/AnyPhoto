
const chatForm = document.getElementById("sendnet");
chatForm.onsubmit = async (e) => {
    e.preventDefault();
    const formData = new FormData(chatForm);
    const thisLink = window.location.href;
    await fetch(thisLink, {
        method: "POST",
        body: formData
    });
    chatForm.reset();
};