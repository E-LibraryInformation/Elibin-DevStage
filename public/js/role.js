   // Ambil semua elemen select dan tambahkan event listener untuk perubahan
   const selects = document.querySelectorAll('select');
   selects.forEach(select => {
       select.addEventListener('change', function(event) {
           const userId = this.id.replace('role', ''); // Dapatkan ID pengguna dari ID select
           const form = document.getElementById(`roleForm${userId}`); // Temukan form berdasarkan ID pengguna

           // Saat opsi berubah, kirimkan form secara otomatis
           form.submit();
       });
   });