
// book rooms 
document.getElementById("bookingForm").addEventListener("submit", function (e) {
    e.preventDefault();
  
    const formData = new FormData(this);
  
    fetch("../actions/book-room.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        // Check if the response is OK and has the correct content type
        if (!response.ok) {
          throw new Error('Network response was not ok: ' + response.statusText);
        }
        return response.json(); // Attempt to parse JSON
      })
      .then((data) => {
        alert(data.message); // Display success or failure message
        if (data.success) {
          // Close the modal if booking was successful
          const modal = bootstrap.Modal.getInstance(
            document.getElementById("bookingModal")
          );
            modal.hide();
            location.reload();
        }
      })
      .catch((error) => {
        console.error('There was a problem with the fetch operation:', error);
        alert('An error occurred: ' + error.message); // Display error message
      });
  });
  