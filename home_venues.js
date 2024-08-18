fetch('./home_venues.json')
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById('inner1');
        data.forEach(item => {
            const div = document.createElement('div');
            div.className = 'inner';
            div.innerHTML = `<img src=${item.photo} alt=${item.title} style='width : 100%; height:20%; object-fit: cover;
    border-radius: 25px 25px 0 0;
    max-height: 300px;'>
                                     <h3 style='white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 5px 0;
    max-width: 200px;
    max-height: 30px;'>${item.title}</h3>
                                     <p style='margin:0;'>Rating: ${item.rating}</p>
                                     <div style='display:flex; flex_direction:row; width:100%; justify-content: flex-start; align-items: center; padding: 15px'>
                                        <a href="tel: ${item.phone_number}" style='padding:0 10px;'><i class="fa-solid fa-phone" style='color:green;'></i></a>
                                        <a href="${item.location}" target="_blank"  style='padding:0 10px;'><i class="fa-solid fa-location-arrow" style='color:black;'></i></a>
                                     </div>
                                     <a href='#' class='booknow' style='width: 30%;
    padding: 10px;
    background-color: #f09a49;
    color: white;
    border-radius: 50px;
    text-decoration: none;'>Book Now</a>`;
            container.appendChild(div);
        });
    })
    .catch(error => console.error('Error fetching data:', error));