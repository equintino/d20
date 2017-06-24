    menos=0;
    PVResta=0;
    PMResta=0;
    ouro1=0;
    ouro2=0;
    function setaVariaveis($variaveis){
        missao=$variaveis;
        return missao;
    }
    function calcDefesa($def){
        var x = $def;
        document.getElementById('def').innerHTML = x;
    }
    function nivel(nivel){
        var nivel;
        document.getElementById('nivel').innerHTML=nivel;
    }
    function mais(id){
        var id;
        var zero;
        if(id == 'PVResta'){
            PVResta++;
            menos=PVResta;
        }else if(id == 'PMResta'){
            PMResta++;
            menos=PMResta; 
        }else if(id == 'ouro1'){
            ouro1++;
            menos=ouro1; 
        }else if(id == 'ouro2'){
            ouro2++;
            menos=ouro2; 
        }
        if(menos < 10){
           zero='0';
        }else{
           zero=null;
        }
            document.getElementById(id).innerHTML=zero+menos;
    }
    function zera(id){
        var id;
        if(id == 'PVResta'){
            PVResta='00';
            menos=PVResta;
        }else if(id == 'PMResta'){
            PMResta='00';
            menos=PMResta; 
        }
        if(id == 'ouro'){
            ouro1='00'; 
            document.getElementById('ouro1').innerHTML=ouro1;
            ouro2='00';
            document.getElementById('ouro2').innerHTML=ouro2;
        }else{
            document.getElementById(id).innerHTML=menos;
         }
    }
    function sairMissao($personagem,id){
        var id;
        var personagem = $personagem;
        var anotacoes = document.getElementById('anotacoes').value;
        var x=confirm('Deseja realmente sair?');
        if(x){
            window.location.assign('sair.php?act=missao&PVResta='+PVResta+'&PMResta='+PMResta+'&ouro1='+ouro1+'&ouro2='+ouro2+'&anotacoes='+anotacoes+'&personagem='+personagem+'&id='+id+'&missao='+missao+'');
        }
    }
    function sairMissaoMestre(missaoMestre){
        var anotacoes = document.getElementById('anotacoes').value;
        var x=confirm('Deseja realmente sair?');
        if(x){
            window.location.assign('sair.php?act=missao&&missao='+missaoMestre+'&anotacoes='+anotacoes+'&missaoMestre=1');
        }
    }
    
   $(document).ready(function(){
    $('.anotacao2').hide();

    $('#anotacao').click(function(event){
        event.preventDefault();
        $(".anotacao2").show("slow");
        //$(".ocultar").show("slower");
    });

    $('.anotacao2').dblclick(function(event){
        event.preventDefault();
        $(".anotacao2").hide("slow");
        //$(".ocultar").hide("slower")
    });
 }); 

