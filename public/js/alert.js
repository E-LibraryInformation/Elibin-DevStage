document.addEventListener('DOMContentLoaded', function () {
    const deleteBookConfirm = document.querySelectorAll('.deleteBookConfirm');

    deleteBookConfirm.forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Hapus Data',
                text: 'Apakah kamu yakin inign menghapus data buku ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = anchor.getAttribute('href');
                }
            });
        });
    });

});