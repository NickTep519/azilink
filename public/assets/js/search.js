document.addEventListener("DOMContentLoaded", () => {
    const filterOptions = document.querySelectorAll(".filter-option");
    const resultsContainer = document.getElementById("filtered-results");
  
    let filters = {
      price: null,
      category: null
    };
  
    filterOptions.forEach(option => {
      option.addEventListener("click", (e) => {
        e.preventDefault();
        const filterType = option.dataset.filter;
        const filterValue = option.dataset.value;
  
        // Mettre à jour les filtres actifs
        filters[filterType] = filterValue;
  
        // Appeler l'API pour obtenir les résultats filtrés
        fetchFilteredResults(filters);
      });
    });
  
    function fetchFilteredResults() {
        const price = document.querySelector('#dropdownPrice').value;
        const category = document.querySelector('#dropdownCategory').value;
    
        // Crée l'URL avec les paramètres de filtre
        const url = new URL(offersUrl);
        const params = { price, category };
        Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));
    
        // Utilise fetch avec méthode GET
        fetch(url, {
            method: 'GET',
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('offers-container').innerHTML = data.html;
        })
        .catch(error => console.error('Error:', error));
    }
    
  });
  