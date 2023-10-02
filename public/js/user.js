// Mendapatkan elemen tombol "Follow"
const followButton = document.getElementById('follow');

followButton.addEventListener('click', () => {
    // Mengirim permintaan AJAX ke endpoint "follow"
    fetch('/follow', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Gantilah dengan cara Anda mendapatkan CSRF token
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({}),
    })
        .then((response) => response.json())
        .then((data) => {
            // Memperbarui tampilan jumlah pengikut dengan data yang diterima dari server
            const followersCount = document.getElementById('followers-count');
            followersCount.textContent = data.followers;

            // Mengganti teks tombol menjadi "Following" atau sesuai kebutuhan
            followButton.textContent = 'Following';
            followButton.disabled = true; // Optional: Menonaktifkan tombol setelah mengklik
        })
        .catch((error) => {
            console.error('Error:', error);
        });
});
