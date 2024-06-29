document.addEventListener('DOMContentLoaded', function () {
    fetch('fetchservices.php')
        .then(response => response.json())
        .then(data => displayServices(data))
        .catch(error => console.error('Error fetching services:', error));
});

function displayServices(services) {
    const servicesContainer = document.getElementById('services-container');
    services.forEach(service => {
        const card = document.createElement('div');
        card.className = 'card';
        card.innerHTML = `
            <img src="services/images/${service.service_id}.png" alt="${service.service_name}" style="width:100%">
            <div class="container">
                <h4><b>${service.service_name}</b></h4>
                <p>${service.service_description}</p>
                <button onclick="showServiceDetails(${service.service_id})">View Details</button>
            </div>
        `;
        servicesContainer.appendChild(card);
    });
}

function showServiceDetails(serviceId) {
    fetch('fetchservices.php')
        .then(response => response.json())
        .then(services => {
            const service = services.find(s => s.service_id === serviceId);
            const modalContent = document.getElementById('modal-content');
            const points = service.service_fulldesc.split('\n').filter(Boolean);
            const pointsHtml = points.map(point => `<li>${point}</li>`).join('');
            modalContent.innerHTML = `
                <span onclick="closeModal()" class="close" style="color:red; cursor:pointer; float:right; font-size:24px">&times;</span>
                <h2 style="text-align: center;">${service.service_name}</h2>
                <ul>${pointsHtml}</ul>
                <p><b>Price:</b> RM${service.service_price}</p>
            `;
            document.getElementById('service-modal').style.display = 'block';
        })
        .catch(error => console.error('Error fetching service details:', error));
}

function closeModal() {
    document.getElementById('service-modal').style.display = 'none';
}
