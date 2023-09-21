document.addEventListener("DOMContentLoaded", function() {
    const iconSearchInput = document.querySelector('#iconSearch');
    const iconContainer = document.querySelector('.icons-grid');
    
    // Fetch icon names from the JSON file and populate the icon container
    fetch('../list_material_icons_f.json')
    .then(response => response.json())
    .then(data => {
        data.forEach(iconName => {
            const iconDiv = document.createElement('span'); // Changing to 'span' for semantic accuracy
            iconDiv.setAttribute('data-icon-name', iconName);
            iconDiv.setAttribute('title', iconName); // Add the tooltip
            iconDiv.className = 'material-symbols-rounded-iconpicker';
            iconDiv.textContent = iconName;
            iconContainer.appendChild(iconDiv);
        });
    })
    .catch(error => console.error("Error fetching icons:", error));

    // Add a listener to the input to filter icons based on the typed query
    iconSearchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        
        const iconSpans = iconContainer.querySelectorAll('span.material-symbols-rounded-iconpicker');
        iconSpans.forEach(iconSpan => {
            const iconName = iconSpan.getAttribute('data-icon-name').toLowerCase();
            if (iconName.includes(query)) {
                iconSpan.style.display = 'flex';
            } else {
                iconSpan.style.display = 'none';
            }
        });
    });
});
