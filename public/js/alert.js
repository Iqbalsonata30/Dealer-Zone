const alert = document.getElementById('alert');
const createAlert = document.getElementById('createAccount');
const deleteAlert = document.getElementById('alertDelete');
const editAlert = document.getElementById('edit');
const AlertEmpty = document.getElementById('kosong');
const alertAddress = document.getElementById('alamat');
const buy = document.getElementById('beli');
if(alert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    showClass:{
      popup:'animate__animated animate__backInRight'
    },
    text: 'Data berhasil ditambahkan!.',
  }) 
} 
if(deleteAlert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    showClass:{
      popup:'animate__animated animate__lightSpeedInLeft'
    },
    text: 'Data berhasil dihapus!.',
  }) 
} 
if(editAlert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    showClass: {
      popup: 'animate__animated animate__fadeInDown'
    },
    hideClass: {
      popup: 'animate__animated animate__fadeOutUp'
    },
    text: 'Data berhasil diubah!.',
  }) 
}
if(AlertEmpty){
  Swal.fire({
    icon: 'info',
    title: 'Data yang anda cari tidak ada !',
    showClass: {
      popup: 'animate__animated animate__fadeInDown'
    },
    timer:1500
  }) 
}
if(createAlert){
  Swal.fire({
    icon: 'info',
    title: 'Akun anda berhasil terdaftar !',
  }) 
}

if(alertAddress){
  Swal.fire({
    icon: 'info',
    title: 'Alamat anda kosong!!',
    text: 'Isi alamat terlebih dahulu',
    confirmButtonText: 'Tambah Alamat'
  }).then((result)=> {
    if(result.isConfirmed){
      location.href = 'http://localhost:8080/costumers/address';
    }
  });
}

if(buy){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    showClass:{
      popup:'animate__animated animate__backInRight'
    },
    text: 'Pembelian anda akan segera diproses.',
  }) 
} 
