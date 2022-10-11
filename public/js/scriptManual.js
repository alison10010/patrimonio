// FECHA MODAL
function fechaModal(){
    document.getElementById("alert").classList.toggle("fechar");
}

// PEGA OS DADOS DO FORM E PASSA VIA URL PARA O IFRAME DO PATRIMONIO
function framePatrimonio(){

    document.getElementById("frame").classList.remove("frame");

    var form = document.getElementById('signup-form');

    var DataOne = form.elements['dataOne'];
    var dataOne = DataOne.value;

    var DataTwo = form.elements['dataTwo'];
    var dataTwo = DataTwo.value;
    
    var link = 'relatorioPDF?dataOne='+dataOne+'&dataTwo='+dataTwo;

    document.getElementById('frame').src = link;
}

// MOSTRA CAMPO PARA RELATORIO DE MOVIMENTACAO ESPECIFICO
function relatorioOpcao(opcao){

    document.getElementById('num_patrimonio').value='';
    if(opcao === 'todos'){
        document.getElementById("num_patrimonio").style.display = "none";
    }
    if(opcao === 'especifico'){
        document.getElementById("num_patrimonio").style.display = "block";
    }    
}

// PEGA OS DADOS DO FORM E PASSA VIA URL PARA O IFRAME DAS MOVIMENTACOES
function frameMovimentacao(){

    document.getElementById("frame").classList.remove("frame");

    var form = document.getElementById('signup-form');
    
    var Num_patrimonio = form.elements['num_patrimonio'];
    var num_patrimonio = Num_patrimonio.value;

    var DataOne = form.elements['dataOne'];
    var dataOne = DataOne.value;

    var DataTwo = form.elements['dataTwo'];
    var dataTwo = DataTwo.value;
    
    var link = 'relatorioPDFMovimentacao?num_patrimonio='+num_patrimonio+'&dataOne='+dataOne+'&dataTwo='+dataTwo;

    document.getElementById('frame').src = link;
}

