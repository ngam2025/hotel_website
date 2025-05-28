<!DOCTYPE html><html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Settings Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="d-flex vh-100">
    <!-- Sidebar -->
    <nav class="flex-shrink-0 p-3 bg-white border-end" style="width: 250px;">
      <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <span class="fs-4 text-primary">Settings</span>
      </a>
      <hr>
      <div class="nav nav-pills flex-column" id="settings-tabs" role="tablist">
        <button class="nav-link active" id="account-tab" data-bs-toggle="pill" data-bs-target="#account" type="button" role="tab">Account Information</button>
        <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button" role="tab">Security & Login</button>
        <button class="nav-link" id="privacy-tab" data-bs-toggle="pill" data-bs-target="#privacy" type="button" role="tab">Privacy</button>
        <button class="nav-link" id="notifications-tab" data-bs-toggle="pill" data-bs-target="#notifications" type="button" role="tab">Notifications</button>
        <button class="nav-link" id="appearance-tab" data-bs-toggle="pill" data-bs-target="#appearance" type="button" role="tab">Appearance & Language</button>
        <button class="nav-link" id="billing-tab" data-bs-toggle="pill" data-bs-target="#billing" type="button" role="tab">Billing & Payments</button>
        <button class="nav-link" id="integrations-tab" data-bs-toggle="pill" data-bs-target="#integrations" type="button" role="tab">Integrations & Apps</button>
        <button class="nav-link" id="support-tab" data-bs-toggle="pill" data-bs-target="#support" type="button" role="tab">Help & Support</button>
      </div>
    </nav><!-- Content -->
<div class="flex-grow-1 p-4 overflow-auto">
  <div class="tab-content" id="settings-tabs-content">
    <!-- Account -->
    <div class="tab-pane fade show active" id="account" role="tabpanel">
      <h3 class="text-primary mb-4">Account Information</h3>
      <form class="row g-3">
        <div class="col-md-6">
          <label for="fullName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" placeholder="user@example.com">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
    <!-- Security -->
    <div class="tab-pane fade" id="security" role="tabpanel">
      <h3 class="text-primary mb-4">Security & Login</h3>
      <form class="row g-3">
        <div class="col-md-6">
          <label for="currentPassword" class="form-label">Current Password</label>
          <input type="password" class="form-control" id="currentPassword" placeholder="••••••••">
        </div>
        <div class="col-md-6">
          <label for="newPassword" class="form-label">New Password</label>
          <input type="password" class="form-control" id="newPassword" placeholder="••••••••">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Update Password</button>
        </div>
      </form>
    </div>
    <!-- Privacy -->
    <div class="tab-pane fade" id="privacy" role="tabpanel">
      <h3 class="text-primary mb-4">Privacy</h3>
      <form class="row g-3">
        <div class="col-md-4">
          <label for="visibility" class="form-label">Account Visibility</label>
          <select id="visibility" class="form-select">
            <option selected>Public</option>
            <option>Private</option>
          </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Save Settings</button>
        </div>
      </form>
    </div>
    <!-- Notifications -->
    <div class="tab-pane fade" id="notifications" role="tabpanel">
      <h3 class="text-primary mb-4">Notifications</h3>
      <form>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="emailNotif">
          <label class="form-check-label" for="emailNotif">Email Notifications</label>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" type="checkbox" id="appNotif">
          <label class="form-check-label" for="appNotif">In-App Notifications</label>
        </div>
        <button type="submit" class="btn btn-primary">Save Preferences</button>
      </form>
    </div>
    <!-- Appearance -->
    <div class="tab-pane fade" id="appearance" role="tabpanel">
      <h3 class="text-primary mb-4">Appearance & Language</h3>
      <form class="row g-3">
        <div class="col-md-4">
          <label for="theme" class="form-label">Theme</label>
          <select id="theme" class="form-select">
            <option selected>Light</option>
            <option>Dark</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="language" class="form-label">Language</label>
          <select id="language" class="form-select">
            <option selected>English</option>
            <option>Arabic</option>
          </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Apply Changes</button>
        </div>
      </form>
    </div>
    <!-- Billing -->
    <div class="tab-pane fade" id="billing" role="tabpanel">
      <h3 class="text-primary mb-4">Billing & Payments</h3>
      <form class="row g-3">
        <div class="col-md-6">
          <label for="cardNumber" class="form-label">Card Number</label>
          <input type="text" class="form-control" id="cardNumber" placeholder="xxxx-xxxx-xxxx-xxxx">
        </div>
        <div class="col-md-6">
          <label for="expiryDate" class="form-label">Expiration Date</label>
          <input type="month" class="form-control" id="expiryDate">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Update Card</button>
        </div>
      </form>
    </div>
    <!-- Integrations -->
    <div class="tab-pane fade" id="integrations" role="tabpanel">
      <h3 class="text-primary mb-4">Integrations & Apps</h3>
      <button class="btn btn-outline-primary me-2">Link with Google</button>
      <button class="btn btn-outline-primary">Link with Facebook</button>
    </div>
    <!-- Support -->
    <div class="tab-pane fade" id="support" role="tabpanel">
      <h3 class="text-primary mb-4">Help & Support</h3>
      <p>For assistance, contact us at <a href="mailto:support@example.com">support@example.com</a> or open a ticket <a href="#">here</a>.</p>
    </div>
  </div>
</div>

  </div>  <!-- Bootstrap JS -->  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script></body>
</html>