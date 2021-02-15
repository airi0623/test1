if (location.pathname.match("recipes/")){
  document.addEventListener('DOMContentLoaded', function(){
    const ImageList = document.getElementById('box-img-recipe');
    console.log("OK")
    const createImageHTML = (blob) => {
      // 画像を表示するためのdiv要素を生成
      const imageElement = document.createElement('div');
      imageElement.setAttribute('class', "box-img")
      imageElement.setAttribute('id', "box_for_preview")

      // 表示する画像を生成
      const blobImage = document.createElement('img');
      blobImage.setAttribute('src', blob);
      blobImage.setAttribute('class', "img-recipe")

      // 生成したHTMLの要素をブラウザに表示させる
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