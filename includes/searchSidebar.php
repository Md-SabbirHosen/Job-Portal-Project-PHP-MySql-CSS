<div class="sidebar-container">
  <div class="password-container">
    <div class="headline">
      <h3>Change Password</h3>
    </div>
    <div class="change-password-container">
      <form method="post" action="../process/changePassword.php">
        <div class="input-group">
          <label for="new-password">New Password</label>
          <input name="newPassword" type="password" minlength="6" placeholder="New Password" required>
        </div>
        <div class="input-group">
          <label for="confirm-newPassword">Confirm New Password</label>
          <input type="password" minlength="6" placeholder="Confirm New Password" required>
        </div>
        <button type="submit" name="myPassword" class="btn btn-secondary">Changes Password</button>
      </form>
    </div>
  </div>
</div>