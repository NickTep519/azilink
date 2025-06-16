// Sélectionner tous les champs avec la classe 'cityInput'
const cityInputs = document.querySelectorAll('.cityInput');
      
cityInputs.forEach(cityInput => {
    const suggestions = cityInput.nextElementSibling; // Récupère le ul juste après le champ

    cityInput.addEventListener('input', async function() {
        const query = cityInput.value.trim();
        if (query.length > 2) { // Commencer la recherche après 2 caractères
            try {
                const response = await fetch(`https://api.locationiq.com/v1/autocomplete.php?key=pk.86921e70717280748f0c71cabd9526ce&q=${query}&limit=5&format=json`);
                const data = await response.json();
                showSuggestions(data, suggestions, cityInput);
            } catch (error) {
                console.error("Erreur lors de la récupération des données:", error);
            }
        } else {
            suggestions.innerHTML = ''; // Vider les suggestions si l'utilisateur efface le texte
        }
    });
});

function showSuggestions(cities, suggestionsContainer, inputField) {
    suggestionsContainer.innerHTML = ''; // Vider la liste des suggestions
    cities.forEach(city => {
        if (city.type === "city") { // Filtrer pour ne garder que les villes
            const li = document.createElement('li');
            li.textContent = `${city.display_name.split(",")[0]} (${city.address.country})`;
            li.style.cursor = 'pointer';
            li.addEventListener('click', () => {
                inputField.value = `${city.display_name.split(",")[0]} (${city.address.country})`;
                suggestionsContainer.innerHTML = ''; // Effacer les suggestions une fois sélectionnée
            });
            suggestionsContainer.appendChild(li);
        }
    });
}

const shareButton = document.querySelector('.share-button');
const shareOptions = document.querySelector('.share-options');
  
// Toggle des options de partage
shareButton.addEventListener('click', () => {
    shareOptions.style.display = shareOptions.style.display === 'block' ? 'none' : 'block';
});
  
// Fermer le menu si on clique ailleurs
document.addEventListener('click', (e) => {
    if (!e.target.closest('.share-container')) {
        shareOptions.style.display = 'none';
    }
});