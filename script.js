
/*indezx */
function toggleSection(id) {
    var submenu = document.getElementById(id);
    if (submenu.style.display === "block") {
        submenu.style.display = "none";
    } else {
        // Close other submenus if open
        var allSubmenus = document.querySelectorAll('.submenu');
        allSubmenus.forEach(function(s) {
            if (s.id !== id) {
                s.style.display = "none";
            }
        });
        submenu.style.display = "block";
    }
}

// Close submenu when clicking outside
window.onclick = function(event) {
    if (!event.target.matches('.menu-button')) {
        var submenus = document.getElementsByClassName("submenu");
        for (var i = 0; i < submenus.length; i++) {
            var openSubmenu = submenus[i];
            if (openSubmenu.style.display === "block") {
                openSubmenu.style.display = "none";
            }
        }
    }
}





























function filterTable() {
  const input = document.getElementById("searchName").value.toLowerCase();
  const table = document.getElementById("citizenTable");
  const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

  for (let i = 0; i < rows.length; i++) {
    const nameCell = rows[i].getElementsByTagName("td")[1]; // Name column
    if (nameCell) {
      const nameText = nameCell.textContent.toLowerCase();
      if (nameText.includes(input)) {
        rows[i].style.display = ""; // show
      } else {
        rows[i].style.display = "none"; // hide
      }
    }
  }
}














  const table = document.getElementById("citizenTable");
  const modal = document.getElementById("detailsModal");
  const closeModal = document.getElementById("closeModal");

  table.addEventListener("click", function (e) {
    const row = e.target.closest("tr");
    if (!row || row.rowIndex === 0) return; // Skip header

    const cells = row.getElementsByTagName("td");

    document.getElementById("modalName").textContent = cells[1].textContent;
    document.getElementById("modalDOB").textContent = cells[2].textContent;
    document.getElementById("modalPOB").textContent = cells[3].textContent;
    document.getElementById("modalSex").textContent = cells[4].textContent;
    document.getElementById("modalStatus").textContent = cells[5].textContent;

    modal.style.display = "block";
  });

  closeModal.addEventListener("click", function () {
    modal.style.display = "none";
  });

  // Optional: click outside modal to close
  window.addEventListener("click", function (e) {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });

//still citizen
  function openResidentForm(id) {
    window.location.href = 'personalInfo.php?id=' + id;
  }















  





// personal info 

  function previewProfile(event) {
    const placeholder = document.querySelector('.brgy-profile-image-placeholder');
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = () => {
        placeholder.innerHTML = `<img src="${reader.result}" style="width: 100%; height: 100%; object-fit: cover;">`;
      };
      reader.readAsDataURL(file);
    }
  }
 

function addEmergencyRow() {
    const table = document.getElementById("emergency_contact").getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    newRow.innerHTML = `
        <td><input type="text" name="emergency_name[]" required></td>
        <td><input type="text" name="emergency_relationship[]" required></td>
        <td><input type="text" name="emergency_contact[]" required></td>
        <td><input type="text" name="emergency_address[]" required></td>
    `;
}

















  //personlinfo //

function addHouseholdRow() {
  const tbody = document.querySelector("#household_member tbody");
  const row = document.createElement("tr");

  row.innerHTML = `
    <td><input type="text" name="household_member_name[]"></td>
    <td><input type="number" name="household_member_age[]"></td>
    <td>
      <select name="household_member_sex[]">
        <option value="">--Select--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </td>
    <td>
      <select name="household_member_civil_status[]">
        <option value="">--Select--</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
      </select>
    </td>
    <td><input type="text" name="household_member_occupation[]"></td>
    <td><input type="text" name="household_member_education[]"></td>
    <td><input type="text" name="household_member_place_of_work[]"></td>
  `;
  tbody.appendChild(row);
}

function addEmergencyRow() {
  const tbody = document.querySelector("#emergency_contact tbody");
  const row = document.createElement("tr");
  row.innerHTML = `
    <td><input type="text" name="emergency_name[]"></td>
    <td><input type="text" name="emergency_relationship[]"></td>
    <td><input type="text" name="emergency_contact[]"></td>
    <td><input type="text" name="emergency_address[]"></td>
  `;
  tbody.appendChild(row);
}



















//-----about us --------//

document.addEventListener('DOMContentLoaded', () => {

    // --- Star Rating Logic ---
    const starContainer = document.getElementById('star-rating-container');
    const stars = starContainer.querySelectorAll('.fa-star');
    let currentRating = 0;

    // Function to set the visual state of stars
    const setStars = (rating) => {
        stars.forEach(star => {
            if (star.dataset.value <= rating) {
                star.classList.remove('fa-regular');
                star.classList.add('fa-solid');
            } else {
                star.classList.remove('fa-solid');
                star.classList.add('fa-regular');
            }
        });
    };

    // Handle mouseover to show potential rating
    starContainer.addEventListener('mouseover', (e) => {
        if (e.target.classList.contains('fa-star')) {
            const ratingValue = e.target.dataset.value;
            setStars(ratingValue);
        }
    });

    // Handle mouseout to revert to the selected rating
    starContainer.addEventListener('mouseout', () => {
        setStars(currentRating);
    });

    // Handle click to set the final rating
    starContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('fa-star')) {
            currentRating = e.target.dataset.value;
            setStars(currentRating);
        }
    });


    // --- Modal Logic ---
    const modal = document.getElementById('feedback-modal');
    const modalMessage = document.getElementById('modal-message');
    const closeBtn = document.querySelector('.close-btn');

    const showModal = (message) => {
        modalMessage.textContent = message;
        modal.style.display = 'block';
    };

    const closeModal = () => {
        modal.style.display = 'none';
    };

    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });


    // --- Form Submission Logic ---
    const generalFeedbackBtn = document.getElementById('general-feedback-btn');
    const generalFeedbackText = document.getElementById('general-feedback-text');

    const ratingSubmitBtn = document.getElementById('rating-submit-btn');
    const ratingFeedbackText = document.getElementById('rating-feedback-text');

    const contactSubmitBtn = document.getElementById('contact-submit-btn');
    const contactText = document.getElementById('contact-text');

    // Handle general feedback submission
    generalFeedbackBtn.addEventListener('click', () => {
        const message = generalFeedbackText.value.trim();

        if (message === '') {
            showModal('Please enter your feedback before submitting.');
            return;
        }

        // In a real application, you would send this data to a server.
        console.log(`General Feedback: ${message}`);
        showModal('Thank you for your feedback!');

        // Reset the form
        generalFeedbackText.value = '';
    });

    // Handle rating and feedback submission
    ratingSubmitBtn.addEventListener('click', () => {
        const feedback = ratingFeedbackText.value.trim();

        if (currentRating === 0) {
            showModal('Please select a star rating before submitting.');
            return;
        }

        if (feedback === '') {
            showModal('Please provide some feedback before submitting.');
            return;
        }

        // In a real application, you would send this data to a server.
        console.log(`Rating: ${currentRating}, Feedback: ${feedback}`);
        showModal('Thank you for your rating and feedback!');

        // Reset the form
        ratingFeedbackText.value = '';
        currentRating = 0;
        setStars(0);
    });

    // Handle contact message submission
    contactSubmitBtn.addEventListener('click', () => {
        const message = contactText.value.trim();

        if (message === '') {
            showModal('Please enter a message before submitting.');
            return;
        }

        // In a real application, you would send this data to a server.
        console.log(`Contact Message: ${message}`);
        showModal('Thank you for your message! The developer will get back to you shortly.');

        // Reset the form
        contactText.value = '';
    });
});
