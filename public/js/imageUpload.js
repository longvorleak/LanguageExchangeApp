let imagePreview = document.getElementById("image-preview");
let imageUpload = document.getElementById("image-upload");
// let avatarUpload = document.querySelector(".avatar-upload");

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			imagePreview.style.backgroundImage = `url("${e.target.result}")`;
			imagePreview.style.opacity = 0;
			imagePreview.classList.add('fade-in');
		};
		reader.readAsDataURL(input.files[0]);
	}
}

imageUpload.addEventListener("change", () => {
  imagePreview.classList.remove('fade-in');
	readURL(imageUpload);
});

// imagePreview.addEventListener('click', (e) => {
//   // console.log(e.target);
//   avatarUpload.classList.toggle('enlarge');
//   // avatarPreview.classList.toggle('enlarge');
//   // let bigImage = document.createElement
// })
