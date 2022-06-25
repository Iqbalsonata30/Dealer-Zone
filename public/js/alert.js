const alert = document.getElementById('alert');
if(alert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    text: 'Data berhasil ditambahkan!.',
  }) 
} 
const deleteAlert = document.getElementById('alertDelete');
if(deleteAlert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    text: 'Data berhasil dihapus!.',
  }) 
} 