<?php
if (isset($data['INVALID_CV'])) {
    echo '<div id="errorMessageCVName" style="padding-left: 3rem; padding-top: 5%; font-size: 2rem;">' . 'CV NOT FOUND' . '</div>';
    return;
}

$cv_data = json_decode($data['cv_data'], true);
$personalInfo = $cv_data['personalInfo'];
$education = $cv_data['education'];
$experiences = $cv_data['experiences'];
$activities = $cv_data['activities'];
$certificates = $cv_data['certificates'];
$awards = $cv_data['awards'];
$skills = $cv_data['skills'];
$projects = $cv_data['projects'];
$sharing_option = $data['is_public_to_everyone'];
$allowed_users = $data['allowed_users'];
?>

<div class="container mt-5 min-vh-100">
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="successfulToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fas fa-check fa-lg" style="color: #1bee6c;"></i>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body success-toast">
                Update successfully.
            </div>
        </div>
        </div>
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="failedToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fas fa-times fa-lg" style="color: #ff2929;"></i>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body error-toast">
                Update failed.
            </div>
        </div>
    </div>
    <h1 class="mb-2">Share <span class="text-success"><?= $cv_data['cvName'] ?></span></h1>
    <div>
        <p>Link:</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="sharedLink" value="http://localhost/CV-Template/public/share?shared_id=<?= $data['shared_id'] ?>" readonly/>
            <button class="btn btn-outline-secondary" id="copyLinkButton" type="button">Copy Link</button>
        </div>
    </div>

    <form id="shareCVForm" class="d-flex flex-column gap-2">
        <div>
        <div class="mb-3">
            <h4>Sharing Options</h4>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sharing_option" id="public_sharing" value="1" <?php echo $sharing_option === 1 ? 'checked' : ''; ?>>
                <label class="form-check-label" for="public_sharing">Share with everyone</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sharing_option" id="restricted_sharing" value="0" <?php echo $sharing_option === 0 ? 'checked' : ''; ?>>
                <label class="form-check-label" for="restricted_sharing">Share with specific users</label>
            </div>
        </div>

        <div id="restricted_users" class="mb-3" style="display: <?php echo $sharing_option === 0 ? 'block' : 'none'; ?>;">
            <h4>Allowed Users</h4>
            <ul id="allowedUsersList" class="list-group mb-3">
                <?php foreach ($allowed_users as $index => $user): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($user); ?>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeUser(<?php echo $index; ?>)">Delete</button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="input-group mb-3">
                <input type="text" id="newUserInput" class="form-control" placeholder="Enter username">
                <button type="button" id="addUserButton" class="btn btn-primary">Add User</button>
            </div>
        </div>
        </div>

        <button type="submit" class="btn btn-success">Save Sharing Settings</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastElList = [].slice.call(document.querySelectorAll('.toast'))
        const toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl, "delay", 5000);
        })
        const successToastEl = document.getElementById('successfulToast');
        const successToast = bootstrap.Toast.getInstance(successToastEl);
        const errorToastEl = document.getElementById('failedToast');
        const errorToast = bootstrap.Toast.getInstance(errorToastEl);

        const successToastText = document.querySelector('.success-toast');
        const errorToastText = document.querySelector('.error-toast');

        const sharingOptions = document.querySelectorAll('input[name="sharing_option"]');
        const restrictedUsersSection = document.getElementById('restricted_users');
        const newUserInput = document.getElementById('newUserInput');
        const addUserButton = document.getElementById('addUserButton');
        const allowedUsersList = document.getElementById('allowedUsersList');
        const form = document.getElementById('shareCVForm');
        let allowedUsers = <?php echo json_encode($allowed_users); ?>;

        // Toggle the visibility of the restricted users section
        sharingOptions.forEach(option => {
            option.addEventListener('change', function () {
                restrictedUsersSection.style.display = this.value === '0' ? 'block' : 'none';
            });
        });

        // Add user to the allowed users list with duplicate username check
        addUserButton.addEventListener('click', function () {
            const username = newUserInput.value.trim();

            // Check if the username is not empty and if it already exists in the allowedUsers array
            if (username && !allowedUsers.includes(username)) {
                allowedUsers.push(username);
                renderAllowedUsers();
                newUserInput.value = '';
            } else if (allowedUsers.includes(username)) {
                errorToastText.textContent = 'This user is already in the list.';
                errorToast.show();
            } else {
                errorToastText.textContent = 'Please enter a valid username.';
                errorToast.show();
            }
        });

        // Render the allowed users list
        function renderAllowedUsers() {
            allowedUsersList.innerHTML = '';
            allowedUsers.forEach((user, index) => {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                listItem.textContent = user;

                const deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-danger btn-sm';
                deleteButton.textContent = 'Delete';
                deleteButton.addEventListener('click', function () {
                    allowedUsers.splice(index, 1);
                    renderAllowedUsers();
                });

                listItem.appendChild(deleteButton);
                allowedUsersList.appendChild(listItem);
            });
        }

        // Render initial allowed users
        renderAllowedUsers();

        // Handle form submission
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const sharingOption = document.querySelector('input[name="sharing_option"]:checked').value;

            // Prepare the payload
            const payload = {
                sharing_option: parseInt(sharingOption, 10), // Ensure it's an integer
                allowed_users: sharingOption === '0' ? allowedUsers : []
            };
            console.log(payload);

            // Send the API request
            fetch(`/CV-Template/public/mycv/saveShareCV/<?php echo $data['cv_id']; ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(payload)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.Code === 200) {
                        successToastText.textContent = 'Update successfully.';
                        successToast.show();
                    } else {
                        errorToastText.textContent = 'Something went wrong! Please try again.';
                        errorToast.show();
                    }
                })
                .catch(error => {
                    errorToastText.textContent = 'Something went wrong! Please try again.';
                    errorToast.show();
                });
        });
    });

    document.getElementById('copyLinkButton').addEventListener('click', function() {
        const sharedLink = document.getElementById('sharedLink');
        sharedLink.select();
        sharedLink.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand('copy');
        sharedLink.setSelectionRange(0, 0); // Reset the selection
        
        // Optional: Show a toast or alert to notify the user that the link has been copied
        alert("Link copied to clipboard!");
    });

</script>
