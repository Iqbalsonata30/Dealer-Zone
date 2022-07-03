
const previewProfilePicture = ()=>{
  const ProfilePicture = document.getElementById('profile');
  const previewProfile = document.getElementsByClassName('showcaseProfile')[0];

  const showProfile = new FileReader();
  showProfile.readAsDataURL(ProfilePicture.files[0]);
  showProfile.onload = (e)=>{
    previewProfile.src = e.target.result;
  }
  
}