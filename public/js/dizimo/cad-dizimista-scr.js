

function carregaDiv(){

    var estado = document.getElementById("estadoCivil");
    var divCasa = document.getElementsByClassName("div-casamento")[0];

    estado.addEventListener('change', ()=>{
        if(estado.value=="nulo" || estado.value=='solteiro'){
            divCasa.style.display = "none";
            conjugeTxt.value = "Nenhum";
            tipoCasamento.value="Nenhum"
            

        }
        else{
            divCasa.style.display = "inline";
        }
    },false);

}



carregaDiv()
