    var imageCount = 0;
    var currentImage = 0;
    var images = new Array();
     
    images[0] = 'imagens/1.jpg';
    images[1] = 'imagens/2.jpg';
    images[2] = 'imagens/3.jpg';
    images[3] = 'imagens/4.jpg';
    images[4] = 'imagens/5.jpg';
    images[5] = 'imagens/6.jpg';
    images[6] = 'imagens/7.jpg';
    images[7] = 'imagens/8.jpg';
    images[8] = 'imagens/9.jpg';
    images[9] = 'imagens/10.jpg';
    images[10] = 'imagens/11.jpg';
     
    var preLoadImages = new Array();
    for (var i = 0; i < images.length; i++){
       if (images[i] == "")
          break;
     
       preLoadImages[i] = new Image();
       preLoadImages[i].src = images[i];
       imageCount++;
    }
    function troca(){
	if (id<imgs.length-1){
            id++;	
	}else{
            id=0
	}
	$("#box").fadeOut(500);
	setTimeout("$('#box').html('<img src=\""+imgs[id]+"\" width=\"100%\" height=\"100%\" />');$('#box').fadeIn(500);",500);
    }
     
    function startSlideShow(){
        if (document.body && imageCount > 0){
            var objeto = "url("+images[currentImage]+")";
            
            
            document.body.style.backgroundImage = objeto;    
            document.body.style.backgroundAttachment = "fixed";
            document.body.style.backgroundRepeat = "repeat";
            document.body.style.backgroundPosition = "left top";
     
            currentImage = currentImage + 1;
            if (currentImage > (imageCount-1)){ 
                currentImage = 0;
            }       
            setTimeout('startSlideShow()', 3600);          
        }
    }
    function fadeIn(element,time){
        processa(element,time,0,100);
    }
   function esconde(){
      document.querySelector('.ocultar').style.display='none';
      document.querySelector('.some').style.display='none';
   }    
    /*  function mudaImagem(max){
         return link;
      }*/


