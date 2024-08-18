// Function to navigate to booking page
function navigateToBookingPage(itemId) {
    window.location.href = `../bookings.php?id=${itemId}`;
}

// Function to fetch and display data
function fetchData(filePath, containerId) {
    fetch(filePath)
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById(containerId);
            data.forEach(item => {
                const div = document.createElement('div');
                div.className = 'inner';
                div.innerHTML = `
                    <img src="${item.photo}" alt="${item.title}" style="width: 100%; height: 20%;">
                    <h3>${item.title}</h3>
                    <p style="margin: 0;">Rating: ${item.rating}</p>
                    <div style="display: flex; flex-direction: row; width: 100%; justify-content: center; align-items: center; padding: 15px;">
                        <a href="tel:${item.phone_number}" style="padding: 0 10px;"><i class="fa-solid fa-phone" style="color: green;"></i></a>
                        <a href="${item.location}" target="_blank" style="padding: 0 10px;"><i class="fa-solid fa-location-arrow" style="color: black;"></i></a>
                    </div>
                    <a href="#" class="booknow" onclick="navigateToBookingPage('${item.id}')">Book Now</a>`;
                container.appendChild(div);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}

// Fetch data for different categories
fetchData('../marriage_data.json', 'inner1');
fetchData('../sangeet_data.json', 'inner2');
fetchData('../birthday_data.json', 'inner3');
fetchData('../conference_data.json', 'inner4');
