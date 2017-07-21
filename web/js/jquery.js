$(document).ready(function(){
    var personagem;
    $('#cabecalho > span').addClass('logo');
    $('#sair')
        .addClass('saudacao1')
        .click(function(){
            var x=confirm('Deseja realmente sair do jogo?');
            if(x){
               $(location).attr('href','../web/sair.php');
            }
        })  
     var result = location.search.substr(1).split('&');
      for(var i=0;i < result.length; i++ ){
         var y = result[i].split('=');
         if(y[0]=='act'){
            var act=y[1];
         }
      }
     var x = "DICA... \r\n     Use sua imaginação. A primeira coisa a fazer é escolher um conceito, uma idéia básica. O que seu personagem vai ser? Um guerreiro bárbaro com um machado mágico e uma pele de pantera jogada sobre os ombros? Um feiticeiro caçador de monstros? Um lutador de rua em busca de vingança? Um elfo caçador de recompensas? Você pode ser tudo isso e qualquer outra coisa que imaginar.";
     var descricao = 'Humanos uma raça muito comum e muitas vezes escolhida, boa para iniciantes no RPG, é uma raça neutra, sem benefícios ou malefícios, os humanos não tem nenhuma vantagem ou poder melhor que as outras raças, mas também não tem nenhuma desvantagem.Podem ter várias cores de pele, cabelos e olhos e chegar até 2,20m ';
     if(act=='cad'){
      alert(x);
     }
     $('#aquiTexto').addClass('texto');
     $('select[name=raca]').change(function(){
         raca = ($(':selected').val());
         switch(raca){
            case 'humano':
               var texto = 'Humanos uma raça muito comum e muitas vezes escolhida, boa para iniciantes no RPG, é uma raça neutra, sem benefícios ou malefícios, os humanos não tem nenhuma vantagem ou poder melhor que as outras raças, mas também não tem nenhuma desvantagem.Podem ter várias cores de pele, cabelos e olhos e chegar até 2,20m ';
               break;
            case 'anao':
               var texto = 'Os anões demoram a sorrir, ou a brincar e suspeitam muito de estranhos, mas são generosos com os poucos que ganham sua confiança. Eles valorizam o ouro, as gemas, as jóias e os objetos de arte feitos com esses materiais preciosos e muitos já sucumbiram ao poder da ambição. Eles não combatem nem tímida, nem temerariamente, mas com coragem e tenacidade cuidadosas. Seu senso de justiça é forte, mas pode se transformar em uma sede de vingança. Entre os gnomos, que são conhecidos por se darem bem com os anões, é comum dizerem o seguinte juramento: “Se estou mentindo, que eu enraiveça um anão?.';
               break;
            case 'elfo':
               var texto = 'Elfos  são pessoas de uma raça mística com aparência humanóide geralmente belos e loiros. São mais baixos e menos fortes, porém mais rápidos e habilidosos que os humanos. Há quem diga que são Semi-Deuses e Imortais.São seres mágicos, ligados à natureza, o que os diferencia de Magos e Feiticeiros, que advém do estudo das artes arcanas por outras raças.São excelentes arqueiros e possuem natural aptidão para as magias da Natureza.';
               break;
            case 'halfling':
               var texto = 'Como raça amigável, tentam se dar bem com todas as outras raças, mesmo assim, não que dizer que considerem todos amigos, no geral consideram amigos verdadeiros apenas os de sua própria raça; porém quando fazem amigos sem ser de sua espécie, são extremamente leais, mostrando ferocidade quando esse amigo está em perigo. Vivem no geral em comunidades pacificas, com grandes fazendas e bosques, nunca construíram um reino próprio, nem reconhecem qualquer tipo de nobreza dos de sua espécie, procurando sempre os anciões de sua família em busca de orientação, essa base construída em cima da família ajudou os halflings a mantes suas tradições por milhares de anos, independente do que estivesse ocorrendo no reino. Criaturas que querem se dar bem com todos, possuem no geral alinhamento leal e bom, não gostando de ver os outros sofrerem ou passar por opressão, mantendo sempre um forte as suas tradições, assim como os velhos hábitos e conforto. A divindade dos Halflings é Yondalla O Abençoado, o protetor dos halflings, a língua usada por ele é um idioma próprio. Como dito anteriormente, eles se aventuram mais com propósitos de proteger a comunidade, família e amigos, porém em uma batalha, por seu tamanho reduzido, usam mais de astúcia e furtividade do que força bruta ou mágia.';
               break;
         }
         $('#aquiTexto').html(texto);  
         verAvatar();  
     });
     $('select[name=classe]').change(function(){
         classe = $('select[name=classe]').on(':selected').val(); 
         verAvatar(); 
     }); 
     $(':radio').change(function(){
         sexo = ($(this).on(':selected').val()); 
         verAvatar();      
     })
    $('#trocaAvatar').click(function(){
         link = mudaImagem();
         bnt = 1;
         verAvatar(bnt); 
    })
     function verAvatar(bnt){
         if(bnt!=1){
            idavatar=1;
         }
         link = '../web/imagens/personagens/'+raca+'/'+classe+'/'+sexo+'/'+idavatar+'.png';
         $('#aqui img')
             .attr('src',link)
             .hide()
             .fadeIn('slow'); 
         document.cookie = "avatar="+link+"; path=/";       
     } 
      $('#habilidade input').click(function(){
         if($.isNumeric($(this).attr('name').slice(-2))){
            var posicao = ($(this).val());
            var requisito = $(this).attr('name').slice(-2);
            if(requisito==1){
               if($(':checkbox')[posicao].checked==true){
                  $(':checkbox')[posicao-1].checked=true;
                  alert('Requisito necessário');
               }
            }else if(requisito==2){
               $(':checkbox')[posicao-2].checked=true;
               if($(':checkbox')[posicao].checked==true){
                 $(':checkbox')[posicao-1].checked=true;
                 alert('Requisito necessário');
               }
            }else if(requisito==3){
               $(':checkbox')[posicao-2].checked=true;
               $(':checkbox')[posicao-3].checked=true;
            }
         }
         if($(':checked').on(':checked').length > 3){
            alert('Só são permitido marcar três habilidades');
            $(this).prop('checked',false);
         }
      }) 
      $('.armasCorp').change(function(){
            if(this.checked){
                recurso = recurso - $(this).val();
                if(recurso < 0){
                    alert('Você não tem o valor necessário.');
                    this.checked=false;
                    recurso = parseInt(recurso) + parseInt($(this).val());
                }
            }else{
                recurso = parseInt(recurso) + parseInt($(this).val());
            }
            $('#moeda').text(recurso);
      })
      
      $(":file").on('change', function() {
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#aqui");
      image_holder.empty();
      if (extn == "gif" || extn == "png"){
         if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) {
               var reader = new FileReader();
               reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
               }
               image_holder.show();
               reader.readAsDataURL($(this)[0].files[i]);
            }
         } else {
            alert("Este navegador não suporta envio de arquivos.");
         }
      } else {
         alert("Selecione somente imagem png ou gif");
      }
   }); 
      var z=0;
      var i=($('#exp0 img').attr('title'));
      while(z < i){
         $('#exp'+z+' img').attr({
              src:'../web/imagens/experiencia.png',
            title:''
         })
         z++;
      }
    var numero=0;
    $('.trocaAvatar').click(function(){
        numero++;
        var link='imagens/personagens/viloes/'+numero+'.png'
        $('#aqui img').attr({
            src:link,
            height:'300px'
        });
        if(numero == totalViloes){
            numero=0;
        }
        document.cookie = "avatar="+link+"; path=/";
    })
   $('#avaVilao').on('change', function() {  
      $('.ocultar').hide();     
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#aqui");
      //image_holder.empty();
      if (extn == "gif" || extn == "png"){
         if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) {
               var reader = new FileReader();
               reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
               }
               image_holder.show();
               reader.readAsDataURL($(this)[0].files[i]);
            }
         } else {
            alert("Este navegador não suporta envio de arquivos.");
         }
      } else {
         alert("Selecione somente imagem png ou gif");
      }
   }); 
    
      
           $('.armasCorp').prop('checked',false); 
           $('#moeda').text(recurso);
           
})


