document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchConversations");
    const conversationCards = document.querySelectorAll("#loadConversation");

    searchInput.addEventListener("input", function () {
        const query = this.value.toLowerCase();

        conversationCards.forEach((card) => {
            const pseudo = card.querySelector("h5").textContent.toLowerCase();
            const message = card
                .querySelector(".line-clamp")
                .textContent.toLowerCase();

            if (pseudo.includes(query)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }

            if (pseudo.includes(query) || message.includes(query)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    });
});
