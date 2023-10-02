// Mendapatkan elemen-elemen input
const fullnameInput = document.getElementById('fullname');
const usernameInput = document.getElementById('username');
const bioInput = document.getElementById('bio');
const gambarInput = document.getElementById('gambar');

// Mendapatkan elemen tombol "Simpan"
const simpanButton = document.getElementById('simpanButton');

// Membuat variabel untuk menyimpan nilai awal dari input
let initialValue = {
    fullname: fullnameInput.value,
    username: usernameInput.value,
    bio: bioInput.value,
    gambar: gambarInput.value,
};

// Fungsi untuk memeriksa perubahan pada input
function checkChanges() {
    const changed =
        fullnameInput.value !== initialValue.fullname ||
        usernameInput.value !== initialValue.username ||
        bioInput.value !== initialValue.bio ||
        gambarInput.value !== initialValue.gambar;

    // Mengubah status disabilitas tombol "Simpan" dan warnanya berdasarkan perubahan
    simpanButton.disabled = !changed;
    // simpanButton.classList.toggle('bg-sky-500', changed);
    // simpanButton.classList.toggle('hover:bg-sky-400', changed);
}

// Memanggil fungsi checkChanges saat input berubah
fullnameInput.addEventListener('input', checkChanges);
usernameInput.addEventListener('input', checkChanges);
bioInput.addEventListener('input', checkChanges);
gambarInput.addEventListener('change', checkChanges);
