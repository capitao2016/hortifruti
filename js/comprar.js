let kilos = document.querySelector('.peso').textContent.replace(',','.')
let input_qnt = document.querySelector('.input_qnt')
let preco = document.querySelector('.price').textContent.replace(',','.')
let contador = 1
function incrementar(){
    contador++
    contador = (contador < 100) ? contador : contador
    let soma = input_qnt.value = contador
    let total = soma * preco
    let total_peso = soma * kilos
    let imprimir = document.querySelector('.price')
    imprimir.textContent = total.toFixed(2).replace('.',',')
    let imprimir_peso = document.querySelector('.peso')
    imprimir_peso.textContent = total_peso.toFixed(3)

}
function decrementar(){
    if(contador > 1){
        contador--
        contador = (contador < 100) ? + contador : contador
        let soma = input_qnt.value = contador
        let total = soma * preco
        let total_peso = soma * kilos
        let imprimir = document.querySelector('.price')
        imprimir.textContent = total.toFixed(2).replace('.',',')
        let imprimir_peso = document.querySelector('.peso')
        imprimir_peso.textContent = total_peso.toFixed(3)
    }
}
const mais = document.querySelector('.mais').addEventListener('click', () => incrementar())
const menos = document.querySelector('.menos').addEventListener('click', () => decrementar())

console.log(kilos)