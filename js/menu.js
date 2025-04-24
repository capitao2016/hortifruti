const frutas = document.getElementById('frutas')
const modal = document.getElementById('container-modal')
const fechar = document.getElementById('fechar')

frutas.addEventListener('click', () =>{
    modal.classList.toggle('open')    
})
fechar.addEventListener('click', () =>{
    modal.classList.toggle('open')    
})