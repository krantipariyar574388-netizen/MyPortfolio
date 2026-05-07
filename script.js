// Function to show professional dialog box using SweetAlert2
function showStatusPopup() {
    // URL bata status parameter check garne
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
        Swal.fire({
            title: 'Thank You!',
            text: 'Your message has been sent successfully. I will get back to you soon!',
            icon: 'success',
            confirmButtonColor: '#6366f1', // Tapaiko indigo theme color
            background: '#1e293b', // Dark theme matching style.css
            color: '#f8fafc',
            timer: 5000,
            timerProgressBar: true
        });
    } else if (status === 'error') {
        Swal.fire({
            title: 'Oops!',
            text: 'Something went wrong. Please try again later.',
            icon: 'error',
            confirmButtonColor: '#6366f1',
            background: '#1e293b',
            color: '#f8fafc'
        });
    }

    // Popup dekhaisake pachi URL bata "?status=success" hataune
    if (status) {
        window.history.replaceState({}, document.title, window.location.pathname + "#contact");
    }
}

// Page load hune bittikai function run garne
document.addEventListener('DOMContentLoaded', showStatusPopup);