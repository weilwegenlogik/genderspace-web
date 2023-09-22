let currentDate = new Date();
const dateInput = document.getElementById("dateInput");
const datepicker = document.getElementById("datepicker");
const datepickerContainer = document.getElementById("datepicker-cont");

function toggleDatePicker() {
    if (datepicker.classList.contains('hidden')) {
        populateDatePicker(currentDate);
        datepicker.classList.remove('hidden');
        datepickerContainer.style.marginBottom = '40%';
    } else {
        datepicker.classList.add('hidden');
        datepickerContainer.style.marginBottom = '0px';
    }
}

function populateDatePicker(date) {
    datepicker.innerHTML = ''; // Reset the datepicker content

    // Populate month dropdown
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const monthDropdown = document.createElement("select");
    monthDropdown.id = "month-dropdown";
    monthDropdown.classList.add("month-dropdown");
    months.forEach((month, index) => {
        const option = document.createElement("option");
        option.value = index;
        option.textContent = month;
        if (index === date.getMonth()) option.selected = true; // Set the current month as selected
        monthDropdown.appendChild(option);
    });
    monthDropdown.onchange = function() {
        currentDate.setMonth(parseInt(this.value));
        populateDatePicker(currentDate);
    };

    // Populate year dropdown (from 1900 to current year + 10 for future dates)
    const yearDropdown = document.createElement("select");
    yearDropdown.id = "year-dropdown";
    yearDropdown.classList.add("year-dropdown");
    for (let y = 1900; y <= date.getFullYear() + 10; y++) {
        const option = document.createElement("option");
        option.value = y;
        option.textContent = y;
        if (y === date.getFullYear()) option.selected = true; // Set the current year as selected
        yearDropdown.appendChild(option);
    };
    yearDropdown.onchange = function() {
        currentDate.setFullYear(parseInt(this.value));
        populateDatePicker(currentDate);
    };

    // Append the dropdowns
    const monthYearDisplay = document.createElement("div");
    monthYearDisplay.classList.add("month-year-display");
    monthYearDisplay.appendChild(monthDropdown);
    monthYearDisplay.appendChild(yearDropdown);
    datepicker.appendChild(monthYearDisplay);

    // Logic to generate days of the month and add click events
    let daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    for (let i = 1; i <= daysInMonth; i++) {
        let dayElem = document.createElement("span");
        dayElem.classList.add("datepicker-day");
        dayElem.textContent = i;
        dayElem.onclick = function() {
            let formattedDay = String(i).padStart(2, '0');
            let formattedMonth = String(date.getMonth() + 1).padStart(2, '0');
            dateInput.value = `${formattedDay}-${formattedMonth}-${date.getFullYear()}`;
            toggleDatePicker(); // Hide the picker after selecting a date
        };
        datepicker.appendChild(dayElem);
    }

    // Action buttons
    const actionsDiv = document.createElement("div");
    actionsDiv.classList.add("datepicker-actions");

    const todayBtn = document.createElement("button");
    todayBtn.textContent = "Today";
    todayBtn.classList.add("datepicker-btn");
    todayBtn.onclick = function() {
        const today = new Date();
        let formattedDay = String(today.getDate()).padStart(2, '0');
        let formattedMonth = String(today.getMonth() + 1).padStart(2, '0');
        dateInput.value = `${formattedDay}-${formattedMonth}-${today.getFullYear()}`;
        toggleDatePicker(); // Hide the picker
    };
    actionsDiv.appendChild(todayBtn);

    const cancelBtn = document.createElement("button");
    cancelBtn.textContent = "Cancel";
    cancelBtn.classList.add("datepicker-btn-gray");
    cancelBtn.onclick = toggleDatePicker;
    actionsDiv.appendChild(cancelBtn);

    datepicker.appendChild(actionsDiv);
}

// Call the toggleDatePicker() when the page loads to populate it initially
toggleDatePicker();
toggleDatePicker();  // Call it twice to show and then hide the picker
