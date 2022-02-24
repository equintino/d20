<style>
    /* .hs-wrapper img {
        animation: showMe 2s linear infinite 0s forwards;
    } */
    /* #boxe_main {
        height: 400px;
        /* overflow: hidden; */
    /* }  */

    #imageBreed {
        /* padding: 0 200px; */
        height: 400px;
        width: 300px;
        margin: auto;
        cursor: pointer;
    }

    /* .slick-next {
        right: 0;
    } */

    #content {
        height: 500px;
    }

    #boxe_main {
        /* background: #aeabab; */
    }

    .container {
        /* height: 100px; */
        /* border: 2px solid green; */
    }

    .galery {
        padding: 20px;
        background: black;
        width: 50%;
        margin: auto;
        /* border: 2px solid blue; */
        /* overflow: hidden; */
    }

    /* .slick-next {
        right: 50px;
        z-index: 1;
    }

    .slick-prev {
        left: 50px;
        z-index: 1;
    } */

    .photos {
        cursor: pointer;
        display: flex;
        /* justify-content: center; */
        /* overflow: hidden; */
        /* background: #c52525; */
        border-radius: 5px;
        padding: 10px;
    }

    /* .carousel img { */
        /* position: absolute;
        top: 0;
        margin: 0 33%;
        animation-name: carousel;
        animation-duration: 4s;
        animation-delay: 2s;
        animation-iteration-count: infinite;
        animation-direction: alternate; */

        /* animation-timing-function: velocidade com que a animação é executada (linear/ease/ease-in/ease-out/ease-in-out) */
        /* animation-fill-mode: determina o que acontecerá ao término da animação (se retorna ao ponto original, se fica como terminou etc.) */
        /* animation-play-state: especifica se a animação está acontecendo ou se está pausada. */

        /* top: 0;
        left: 0; */
        /* height: 300px */
        /* border: 1px solid gray; */
    /* } */

    /* @keyframes carousel {
        0%  {left: 0px}
        25% {left: 50px}
        50% {left: 100px}
        75% {left: 150px}
        100%{left: 200px}
    } */

    /* div {
        width: 100px;
        height: 100px;
        background-color: red;
        position: relative;
        animation-name: example;
        animation-duration: 4s;
        animation-delay: 2s;
    } */

    /* @keyframes example {
        0%   {background-color:red; left:0px; top:0px;}
        25%  {background-color:yellow; left:200px; top:0px;}
        50%  {background-color:blue; left:200px; top:200px;}
        75%  {background-color:green; left:0px; top:200px;}
        100% {background-color:red; left:0px; top:0px;}
    } */

    .arrow {
        display: flex;
        justify-content: center;
        font-size: 2em;
        /* position: relative;
        z-index: 2px; */
        /* border: 5px solid black; */
    }

    .arrow i {
        padding: 5px;
        cursor: pointer;
        color: gray;
    }

    .arrow i:hover {
        color: black;
    }

    #edit {
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;

        /* height: 200px;
        display: flex;
        flex-direction: row; */
    }
</style>
<div id="category" class="mt-4">
    <!-- <fieldset class="fieldset" style="background: #e0dede;"> -->
        <!-- <legend>MODO DE EDIÇÃO</legend> -->
        <form id="form-breed" method="POST" action="breed/save" enctype="multipart/form-data" >
        <div id="edit">
            <section>
                <label>Tipo:</label>
                <input type="text" name="name" value="<?= $category->name ?>"/>
                <label>Descrição:</label>
                <textarea rows="5" cols="48" type="text" name="description" style="text-transform: none" ><?= $category->description ?></textarea>
            </section>
            <section class="side-right" style="justify-content: center">
                <img id="thumb_image" src="image/id/<?= $category->image_id ?>" alt="" height="250px"/>
                <input id="image" type="file" name="image" />
            </section>
            <!-- <table class="my-table"></table> -->
        </div>
        </form>
    <!-- </fieldset> -->
    <!-- <div style="text-align: right; margin-right: 40px">
        <button type="reset" class="btn-rpg btn-silver" >Limpar</button>
        <button type="submit" class="btn-rpg btn-green" >Salvar</button>
    </div> -->
</div><!-- contaimer -->

<!-- <script type="text/javascript" src="<?= theme("assets/scripts.js") ?>" ></script> -->

<script>
    // $(document).ready(function() {
        $("#imageBreed").slick({
            infinite: true,
            fade: true,
            // dots: true,
            // speed: 300,
            // slidesToShow: 1,
            // slidesToScroll: 1,
            // centerMode: true,
            // variableWidth: true,
            // adaptiveHeight: true,
            // autoplay: true,
            // cssEase: "linear"
        });
        $("#imageBreed").find("img").on("click", function() {
            let src = $("[aria-hidden=false]").attr("src")
            $(avatar).html("<img src='" + src + "' alt='' />")
            let category = $("[name=class]").val().toUpperCase()
            let selected = $("[name=class]").parent("span")
            // td..remove()
            selected.text(category)
            modal.close()
        })
    // })





    // $(function() {
        // let left = $(".photos").children("img:eq(0)").position("left").left
        // let position = $(".photos").css("margin-left")
        // let end = (position.length-2)
        // let current = parseInt(position.substr(0,end))
        // $(".arrow i").on("click", function() {
        //     let side = $(this).attr("data-side")
        //     current += ($(this).attr("data-side") === "left" ? -25 : +25)
        //     // alert(current)
        //     $(".photos").css("margin-left", current+"%")
        //     // $("photos").css("margin-left", margin)
        //     // alert(left)
        // })
    // });

    // function sleep(ms) {
    //     return new Promise(resolve => setTimeout(resolve, ms));
    // }
    // $(function() {
    //     $("#content").on("mouseover", function() {
    //         $(".carousel").children("img").each(async function(i) {

    //             // setTimeout(function() {
    //                 // $(".carousel").children("img").css("display","none")
    //                 $(".carousel img:eq(" + i + ")").css("display", "block")
    //                 sleep(200000)
    //             // setTimeout(function() {
    //             //     img.css("display","block")
    //             //     console.log(img)
    //             // }, 5)
    //             // }, 500);
    //         })
    //     })
    // })
</script>
