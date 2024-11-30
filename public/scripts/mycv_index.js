const toastElList = [].slice.call(document.querySelectorAll('.toast'))
const toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl, "delay", 5000);
})
console.log('mycv_index.js');
const myToastEl = document.getElementById('successfulToast');
const myToast = bootstrap.Toast.getInstance(myToastEl);
const myToastEl2 = document.getElementById('failedToast');
const myToast2 = bootstrap.Toast.getInstance(myToastEl2);

document.querySelector('.button-create').onclick = function() {
    window.location.href = '/CV-Template/public/mycv/create_cv';
}

function editCV(id) {
    if (id === '' || id < 0)
        return;

    let url = '/CV-Template/public/mycv/edit_cv/' + id;
    window.location.href = url;
}

function shareCV(id) {
    if (id === '' || id < 0)
        return;

    let url = '/CV-Template/public/mycv/share_cv/' + id;
    window.location.href = url;
}

function deleteCV(id) {
    if (id === '' || id < 0)
        return;

    let url = '/CV-Template/public/mycv/deleteCV/' + id;
    fetch(url, {
        method: "POST", // Specify the method
		headers: {
			// Specify any needed headers. This is how you tell the server you're sending JSON.
			"Content-Type": "application/json",
		},
		body: JSON.stringify({}), // Convert the JavaScript object to a JSON string
    }).then((response) => {
        // The server responds with the data in JSON format, parse it to create a JavaScript object
        if (!response.ok) {
            // If the response has HTTP status code which is not successful, throw an error
            throw new Error("Network response was not ok " + response.statusText);
        }
        return response.text(); // parses JSON response into native JavaScript objects
    })
    .then((data) => {
        // Handle the response data
        console.log("Success post:", JSON.parse(data));
        const row = document.querySelector('#row_' + id);
        row.remove();
        myToast.show();
    })
    .catch((error) => {
        // Handle any errors here
        console.error("Error:", error);
        myToast2.show();
    });
}
