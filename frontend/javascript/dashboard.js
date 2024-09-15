document.addEventListener('DOMContentLoaded', () => {
    const contentElement = document.getElementById('content');
    
    document.querySelectorAll('.sidebar-menu a').forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();
            const content = event.target.getAttribute('data-content');
            
            // Load the content based on the clicked link
            loadContent(content);
        });
    });

    function loadContent(content) {
        let url = '';
        switch (content) {
            case 'overview':
                url = 'php/overview.php'; // URL to fetch content
                break;
            case 'usersettings':
                url = 'php/usersettings.php'; // URL to fetch user settings content
                break;
            case 'services':
                url = 'php/add_service.php'; // URL to fetch user settings content
                break;
            case 'order':
                url = 'php/order.php'; // URL to fetch user settings content
                    break;
            // Add other cases if needed
        }

        fetch(url)
            .then(response => response.text())
            .then(data => {
                contentElement.innerHTML = data;
                // Initialize functions after loading new content
                initializeUserFunctions();
            })
            .catch(error => {
                console.error('Error loading content:', error);
            });
    }

    // Function to initialize edit and delete user functionality
    function initializeUserFunctions() {
        // JavaScript to handle editing users
        window.editUser = function(userId, username, email, role) {
            // Populate the edit modal with the user's data
            document.getElementById('edit-id').value = userId;
            document.getElementById('edit-username').value = username;
            document.getElementById('edit-email').value = email;
            document.getElementById('edit-role').value = role;

            // Display the edit modal
            document.getElementById('edit-modal').style.display = 'block';
        };

        // JavaScript to handle saving users
        window.saveUser = function() {
            const formData = new FormData(document.getElementById('edit-form'));

            fetch('php/usersettings.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                location.reload();  // Reload the page to show updated data
            })
            .catch(error => {
                console.error('Error updating user:', error);
            });
        };

        // JavaScript to handle deleting users
        window.deleteUser = function(userId) {
            if (confirm(`Are you sure you want to delete user with ID: ${userId}?`)) {
                fetch('php/usersettings.php', {  // Explicitly target the usersettings.php URL
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({ id: userId })
                })
                .then(response => response.text())  // Use .text() to inspect the result
                .then(result => {
                    try {
                        const jsonResponse = JSON.parse(result);  // Parse manually
                        alert(jsonResponse.message);
                        location.reload();  // Refresh the page after deletion
                    } catch (e) {
                        console.error('Non-JSON response:', result);  // Log the actual response for debugging
                        alert('Error deleting user. Please check the console for more details.');
                    }
                })
                .catch(error => console.error('Error deleting user:', error));
            }
        };
    }

    // Call initializeUserFunctions initially
    initializeUserFunctions();
});
