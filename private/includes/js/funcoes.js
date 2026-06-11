//CALCULA IMC
const pesoInput = document.getElementById("peso");
const alturaInput = document.getElementById("altura");
const indicadorIMC = document.getElementById("indicadorIMC");

function calcularIMC(peso, altura) { return peso / (altura * altura); }

function verificarIMC(imc) {
    if (imc < 18.5) {
        return { texto: "Abaixo do peso", cor: "abaixoPeso" };
    } else if (imc < 24.9) {
        return { texto: "Peso normal", cor: "pesoNormal" };
    } else if (imc < 29.9) {
        return { texto: "Sobrepeso", cor: "sobrepeso" };
    } else {
        return { texto: "Obeso", cor: "obeso" };
    }
}

function atualizarIndicadorIMC() {
    const peso = parseFloat(pesoInput.value);
    const altura = parseFloat(alturaInput.value);
    if (isNaN(peso) || isNaN(altura) || altura === 0) {
        indicadorIMC.textContent = "";
        indicadorIMC.className = "";
        return;
    }
    const imc = calcularIMC(peso, altura);
    const resultadoIMC = verificarIMC(imc);
    indicadorIMC.textContent = resultadoIMC.texto;
    indicadorIMC.className = resultadoIMC.cor;
}

pesoInput.addEventListener("input", atualizarIndicadorIMC);
alturaInput.addEventListener("input", atualizarIndicadorIMC);

//ENCAMINHAMENTO
function avaliarCondicoes() {
    // Ler os estados das checkboxes
    const problemasCostas = document.getElementById("temProblemasCostas").checked;
    const gravida = document.getElementById("estaGravida").checked;
    const diabetico = document.getElementById("temDiabetes").checked;
    const mensagemElement = document.getElementById("mensagem");

    // Avaliar as combinações e apresentar a recomendação
    if (gravida) {
        mensagemElement.textContent = "Encaminhar para o Professor João Faria (Especialista em exercício para grávidas).";
    } else if (problemasCostas && diabetico) {
        mensagemElement.textContent = "Necessário plano adaptado. Agendar consulta com especialista.";
    } else if (problemasCostas || diabetico) {
        mensagemElement.textContent = "Recomenda-se avaliação personalizada antes de iniciar o treino.";
    } else {
        mensagemElement.textContent = "Sem restrições. Pode iniciar o plano de treino geral.";
    }
}

//PREÇARIO
function selecionarServico(servico) {
    document.getElementById('opcoesPT').style.display = 'none';
    document.getElementById('opcoesAG').style.display = 'none';
    document.getElementById('resultadoPT').innerHTML = '';
    document.getElementById('resultadoAG').innerHTML = '';
    if (servico === 'PT') {
        document.getElementById('opcoesPT').style.display = 'block';
    } else {
        document.getElementById('opcoesAG').style.display = 'block';
    }
}
function mostrarPrecoPT(vezes) {
    const precos = [54, 103, 150, 198];
    const preco = precos[vezes - 1];
    document.getElementById('resultadoPT').innerText = `Preço: ${preco} EUR / quinzena`;
}
function mostrarPrecoAG(freq) {
    let preco = '';
    if (freq == 1) preco = '16.9 EUR / quinzena';
    else if (freq == 2) preco = '26 EUR / quinzena';
    else preco = '31.9 EUR / quinzena';
    document.getElementById('resultadoAG').innerText = 'Preço: ' + preco;
}
