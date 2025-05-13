document.getElementById('sub-btn').addEventListener('click', function () {
    // Get data from the form
    const fullName = document.getElementById('full-name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const address = document.getElementById('address').value;
    const eventList = document.getElementById('event-list').selectedOptions[0].text;
    const quantity = document.getElementById('quantity').value;
    const total = document.getElementById('total').value;
    const eventDate = document.getElementById('event-date').value;
    const message = document.getElementById('message').value;

    // Create the file content
    const fileContent = `
        New orders\n\n
        Full Name: ${fullName}\n
        Email: ${email}\n
        Phone No: ${phone}\n
        Address: ${address}\n
        Food: ${eventList}\n
        Quantity: ${quantity}\n
        Total Price: $${total}\n
        Day Order: ${eventDate}\n
        Message: ${message}
    `;

    // Create a Blob object with the file content
    const blob = new Blob([fileContent.trim()], { type: 'text/plain' });

    // Create a URL for the Blob
    const url = URL.createObjectURL(blob);

    // Create an <a> element and trigger the download
    const a = document.createElement('a');
    a.href = url;
    a.download = 'order_request.txt';
    document.body.appendChild(a);
    a.click();

    // Revoke the Blob URL
    URL.revokeObjectURL(url);
});

// Calculate total price when quantity or event list changes
document.getElementById('quantity').addEventListener('input', calculateTotal);
document.getElementById('event-list').addEventListener('change', calculateTotal);

function calculateTotal() {
    const quantity = document.getElementById('quantity').value;
    const selectedOption = document.getElementById('event-list').selectedOptions[0];
    const price = selectedOption ? parseFloat(selectedOption.getAttribute('data-price')) : 0;

    if (quantity && price) {
        const total = quantity * price;
        document.getElementById('total').value = total.toFixed(2);
    } else {
        document.getElementById('total').value = '';
    }
}
