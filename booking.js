// document.addEventListener('DOMContentLoaded', () => {
//     const customTimeRadio = document.querySelector('input[name="time"][value="custom-time"]');
//     const fullDayRadio = document.querySelector('input[name="time"][value="full-day"]');
//     const customTimeInput = document.getElementById('custom-time-input');

//     customTimeRadio.addEventListener('change', () => {
//         if (customTimeRadio.checked) {
//             customTimeInput.style.display = 'block';
//         }
//     });

//     fullDayRadio.addEventListener('change', () => {
//         if (fullDayRadio.checked) {
//             customTimeInput.style.display = 'none';
//         }
//     });

//     // Function to get the query parameter by name
//     function getQueryParam(name) {
//         const urlParams = new URLSearchParams(window.location.search);
//         return urlParams.get(name);
//     }

//     // Get the item id from the query parameter
//     const itemId = getQueryParam('id');
//     const category = itemId.split('_')[0]; // Get the category from the item id
//     let dataFile;

//     // Determine which data file to fetch based on the category
//     switch (category) {
//         case 'marriage':
//             dataFile = '../planb/marriage_data.json';
//             break;
//         case 'sangeet':
//             dataFile = '../planb/sangeet_data.json';
//             break;
//         case 'birthday':
//             dataFile = '../planb/birthday_data.json';
//             break;
//         case 'conference':
//             dataFile = '../planb/conference_data.json';
//             break;
//         default:
//             console.error('Invalid category');
//             return;
//     }

//     if (itemId) {
//         // Fetch the data from the correct file
//         fetch(dataFile)
//             .then(response => response.json())
//             .then(data => {
//                 // Find the item with the specific id
//                 const item = data.find(item => item.id === itemId);
//                 if (item) {
//                     // Update the booking page with the item data
//                     document.getElementById('booking-photo').src = item.photo;
//                     document.getElementById('booking-photo').alt = item.title;
//                     document.getElementById('booking-title').textContent = item.title;
//                     document.getElementById('booking-rating').textContent = `Rating: ${item.rating}`;
//                     document.getElementById('booking-phone').href = `tel:${item.phone_number}`;
//                     document.getElementById('booking-location').href = item.location;


//                     // Sending Booking data to PHP
//                     const bk_photo = item.photo;
//                     const bk_title = item.title;
//                     const bk_phone = item.phone_number;
//                     const bk_location = item.location;

//                     // Function to send the variable to the PHP script using Fetch API
//                     function sendVariableToPHP() {
//                         fetch('confirmation.php', {
//                             method: 'POST',
//                             headers: {
//                                 'Content-Type': 'application/x-www-form-urlencoded',
//                             },
//                             body: new URLSearchParams({
//                                 bk_photo: bk_photo,
//                                 bk_title: bk_title,
//                                 bk_phone: bk_phone,
//                                 bk_location: bk_location
//                             })
//                         })
//                         .then(response => response.text())
//                         .then(data => console.log(data))
//                         .catch(error => console.error('Error:', error));
//                     }

//                     sendVariableToPHP();

//                 } else {
//                     console.error('Item not found');
//                 }
//             })
//             .catch(error => console.error('Error fetching data:', error));
//     } else {
//         console.error('No item id specified in query parameters');
//     }


// });









document.addEventListener('DOMContentLoaded', () => {
    const customTimeRadio = document.querySelector('input[name="time"][value="custom-time"]');
    const fullDayRadio = document.querySelector('input[name="time"][value="full-day"]');
    const customTimeInput = document.getElementById('custom-time-input');

    customTimeRadio.addEventListener('change', () => {
        if (customTimeRadio.checked) {
            customTimeInput.style.display = 'block';
        }
    });

    fullDayRadio.addEventListener('change', () => {
        if (fullDayRadio.checked) {
            customTimeInput.style.display = 'none';
        }
    });

    // Function to get the query parameter by name
    function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Get the item id from the query parameter
    const itemId = getQueryParam('id');
    const category = itemId.split('_')[0]; // Get the category from the item id
    let dataFile;

    // Determine which data file to fetch based on the category
    switch (category) {
        case 'marriage':
            dataFile = '../planb/marriage_data.json';
            break;
        case 'sangeet':
            dataFile = '../planb/sangeet_data.json';
            break;
        case 'birthday':
            dataFile = '../planb/birthday_data.json';
            break;
        case 'conference':
            dataFile = '../planb/conference_data.json';
            break;
        default:
            console.error('Invalid category');
            return;
    }

    if (itemId) {
        // Fetch the data from the correct file
        fetch(dataFile)
            .then(response => response.json())
            .then(data => {
                // Find the item with the specific id
                const item = data.find(item => item.id === itemId);
                if (item) {
                    const venue_name = item.title;
                    const venue_number = item.phone_number;
                    const location = item.location;
                    const photo = item.photo;
                    
                    

                    // Send the data to the PHP script
                    fetch('store_venuedetails.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `venue_name=${encodeURIComponent(venue_name)}&venue_number=${encodeURIComponent(venue_number)}&location=${encodeURIComponent(location)}&photo=${encodeURIComponent(photo)}`
                    })
                    .then(response => response.text())
                    .then(result => {
                        console.log(result);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });

                    // Update the booking page with the item data
                    document.getElementById('booking-photo').src = item.photo;
                    document.getElementById('booking-photo').alt = item.title;
                    document.getElementById('booking-title').textContent = item.title;
                    document.getElementById('booking-rating').textContent = `Rating: ${item.rating}`;
                    document.getElementById('booking-phone').href = `tel:${item.phone_number}`;
                    document.getElementById('booking-location').href = item.location;
                } else {
                    console.error('Item not found');
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    } else {
        console.error('No item id specified in query parameters');
    }



})
