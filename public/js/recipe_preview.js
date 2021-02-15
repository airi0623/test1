if (location.pathname.match("recipes/")){
  document.addEventListener('DOMContentLoaded', function(){
    const ImageList = document.getElementById('box-img-recipe');
    console.log("OK")
    const createImageHTML = (blob) => {
      // div要素生成
      const imageElement = document.createElement('div');
      imageElement.setAttribute('class', "box-img")
      imageElement.setAttribute('id', "box_for_preview")

      // 画像生成
      const blobImage = document.createElement('img');
      blobImage.setAttribute('src', blob);
      blobImage.setAttribute('class', "img-recipe")

      // appendでHTMLに反映
      imageElement.appendChild(blobImage);
      ImageList.appendChild(imageElement);
    };

    document.getElementById('input-file').addEventListener('change', function(e){

      const imageContent = document.getElementById('box_for_preview');
      if (imageContent){
        imageContent.remove();
      }

      const file = e.target.files[0];
      const blob = window.URL.createObjectURL(file);
      console.log(file.name)
      createImageHTML(blob);
    });
  });
};