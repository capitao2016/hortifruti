const closedModal = document.getElementById('fechar')
const openModal = document.getElementById('modal_produtos')

const produtos = document.querySelectorAll('#container_item')
for(let i = 0; i < produtos.length; i++){
    produtos[i].addEventListener('click', () =>{
        openModal.classList.toggle('openModal')
    })
}
closedModal.addEventListener('click', () =>{
    openModal.classList.toggle('openModal')
})
const modal_menu = document.querySelector('.modal_menu')
const open_modal = document.querySelector('.menu').addEventListener('click', () =>{
    modal_menu.classList.toggle('open_modal_menu')
})
const fechar_menu = document.querySelector('.fechar_menu').addEventListener('click', () =>{
    modal_menu.classList.toggle('open_modal_menu')
})
