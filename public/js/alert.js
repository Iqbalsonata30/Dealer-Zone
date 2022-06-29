const alert = document.getElementById('alert');
const deleteAlert = document.getElementById('alertDelete');
const editAlert = document.getElementById('edit');
if(alert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    text: 'Data berhasil ditambahkan!.',
  }) 
} 
if(deleteAlert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    text: 'Data berhasil dihapus!.',
  }) 
} 
if(editAlert){
  Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    text: 'Data berhasil diubah!.',
  }) 
}