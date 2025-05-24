// alert.js
(function(){
  if (!document.getElementById('alert-container')) {
    const div = document.createElement('div');
    div.id = 'alert-container';
    document.body.appendChild(div);
  }
})();

function renderAlert(type, title, message, duration = 5000) {
  const container = document.getElementById('alert-container');
  const alert = document.createElement('div');
  alert.className = 'alert ' + type;
  alert.innerHTML =` <strong>${title}</strong><p>${message}</p>`;
  container.appendChild(alert);

  setTimeout(() => {
    alert.style.opacity = '0';
    setTimeout(() => container.removeChild(alert), 500);
  }, duration);
}