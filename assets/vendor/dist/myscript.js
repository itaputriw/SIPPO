
const flashData = $('.flash-data').data('pesan');
// console.log(flashData);
if (flashData) {
    Swal.fire({
        title: 'Selamat Anda',
        text: 'Berhasil ' + flashData,
        icon: 'success'
    });
}
