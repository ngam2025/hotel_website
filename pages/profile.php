<?php
session_start();
$pageTitle = "Profile";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<div class="profile-card">
    <h2>Profile</h2>
<div id="mainLoader" class="loader" style="display: none;"></div>
<div id="profileData">
</div>
<button class="edit-btn" onclick="window.location.href='edit_profile.php'">Edit Profile</button>
</div><script>
function showLoader() {
    document.getElementById('mainLoader').style.display = 'block';
}
function hideLoader() {
    document.getElementById('mainLoader').style.display = 'none';
}
function fetchProfileData() {
    showLoader();
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_profile.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        hideLoader();
        if (this.status === 200) {
            try {
                var response = JSON.parse(this.responseText);
                if (response.success) {
                    displayProfile(response.data);
                } else {
                    showError(response.message);
                }
            } catch (e) {
                showError('Error parsing data');
            }
        } else {
            showError('Connection error: ' + this.status);
        }
    };
    xhr.onerror = function() {
        hideLoader();
        showError('Failed to connect to server');
    };
    xhr.send();
}
function displayProfile(userData) {
    const profileHtml = `
        <div class="profile-info">
            <div class="avatar">
                <img src="../assets/images/users/${userData.imag || 'default-avatar.png'}" alt="User image">
            </div>
            <div class="info-item">
                <span class="info-label">Username:</span>
                <span class="info-value">${userData.username}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Email:</span>
                <span class="info-value">${userData.email}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Birthdate:</span>
                <span class="info-value">${userData.date || 'Not specified'}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Join Date:</span>
                <span class="info-value">${userData.join_date || 'Not specified'}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Gender:</span>
                <span class="info-value">${userData.gender || 'Not specified'}</span>
            </div>
        </div>
    `;
    document.getElementById('profileData').innerHTML = profileHtml;
}
function showError(message) {
    document.getElementById('profileData').innerHTML = `
        <div class="error-message">
            <i class="fa fa-exclamation-triangle"></i>
            ${message}
        </div>
    `;
}
window.addEventListener('DOMContentLoaded', () => {
    fetchProfileData();
    setInterval(fetchProfileData, 80000);
});
</script><style>
.profile-card {
    background:rgb(236, 235, 235);
    max-width: 600px;
    margin: 20px auto;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.loader {
    border: 6px solid #f3f3f3;
    border-top: 6px solid #4CAF50;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin: 20px auto;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.avatar {
    text-align: center;
    margin-bottom: 20px;
}

.avatar img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #4CAF50;
}

.edit-btn {
    background: #4CAF50;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    transition: background 0.3s;
}

.edit-btn:hover {
    background: #45a049;
}

.info-item {
    padding: 15px;
    margin: 10px 0;
    background: #f8f9fa;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.info-label {
    font-weight: bold;
    color: #333;
}

.info-value {
    color: #666;
}

.error-message {
    color: #dc3545;
    padding: 15px;
    background: #f8d7da;
    border-radius: 5px;
    margin: 20px 0;
}
</style>